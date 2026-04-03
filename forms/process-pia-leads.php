<?php

declare(strict_types=1);

// =====================================
// PIA Lead Form Processor
// PHPMailer + Hostinger SMTP + Anti-Spam
// =====================================

// ---------- PHPMailer ----------
// Opción A: Composer
require __DIR__ . '/../vendor/autoload.php';

// Opción B: Manual (si no usas Composer)
// require __DIR__ . '/../vendor/phpmailer/src/Exception.php';
// require __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php';
// require __DIR__ . '/../vendor/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ---------- CONFIG ----------
const SMTP_HOST = 'smtp.hostinger.com';
const SMTP_PORT = 465; // Si falla, prueba 587 con STARTTLS
const SMTP_USERNAME = 'contact@piainsights.com';
const SMTP_PASSWORD = 'YOUR_HOSTINGER_EMAIL_PASSWORD';
const SMTP_FROM_EMAIL = 'contact@piainsights.com';
const SMTP_FROM_NAME = 'PIA Website';
const DESTINATION_EMAIL = 'contact@piainsights.com';
const DESTINATION_NAME = 'PIA';
const MIN_FORM_FILL_MS = 3000;
const MAX_MESSAGE_LENGTH = 3000;

// Bloquea algunos dominios desechables comunes
$blockedDomains = [
    'mailinator.com',
    '10minutemail.com',
    'guerrillamail.com',
    'tempmail.com',
    'yopmail.com',
    'sharklasers.com',
];

// ---------- HELPERS ----------
function respondJson(bool $success, string $message, int $statusCode = 200): never
{
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
    ]);
    exit;
}

function post(string $key): string
{
    return trim((string)($_POST[$key] ?? ''));
}

function containsSuspiciousLinks(string $text): bool
{
    return (bool) preg_match('/https?:\/\/|www\.|<a\s+href=|\[url=|bit\.ly|tinyurl|t\.co/i', $text);
}

function hasTooManyUrls(string $text): bool
{
    preg_match_all('/https?:\/\/|www\./i', $text, $matches);
    return count($matches[0]) > 0;
}

function emailDomain(string $email): string
{
    $parts = explode('@', $email);
    return strtolower($parts[1] ?? '');
}

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respondJson(false, 'Invalid request method.', 405);
}

// ---------- ANTI-SPAM ----------

// Honeypot
$honeypot = post('website_url');
if ($honeypot !== '') {
    respondJson(false, 'Spam detected.', 403);
}

// Timestamp
$formStartedAt = post('form_started_at');
if ($formStartedAt === '' || !ctype_digit($formStartedAt)) {
    respondJson(false, 'Invalid form submission.', 400);
}

$startedAtMs = (int) $formStartedAt;
$nowMs = (int) round(microtime(true) * 1000);

if (($nowMs - $startedAtMs) < MIN_FORM_FILL_MS) {
    respondJson(false, 'Form submitted too quickly.', 403);
}

// ---------- INPUTS ----------
$fullName       = post('full_name');
$userEmail      = post('user_email');
$projectSubject = post('project_subject');
$projectDetails = post('project_details');

// ---------- VALIDATION ----------
if ($fullName === '' || $userEmail === '' || $projectSubject === '' || $projectDetails === '') {
    respondJson(false, 'Please complete all required fields.', 422);
}

if (mb_strlen($fullName) < 2 || mb_strlen($fullName) > 120) {
    respondJson(false, 'Please enter a valid name.', 422);
}

if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    respondJson(false, 'Please enter a valid email address.', 422);
}

if (mb_strlen($projectSubject) < 3 || mb_strlen($projectSubject) > 180) {
    respondJson(false, 'Please enter a valid subject.', 422);
}

if (mb_strlen($projectDetails) < 10 || mb_strlen($projectDetails) > MAX_MESSAGE_LENGTH) {
    respondJson(false, 'Please enter a valid message.', 422);
}

// Bloqueo por links en mensaje
if (containsSuspiciousLinks($projectDetails) || hasTooManyUrls($projectDetails)) {
    respondJson(false, 'Links are not allowed in the message.', 403);
}

// Bloqueo de emails desechables
$domain = emailDomain($userEmail);
if (in_array($domain, $blockedDomains, true)) {
    respondJson(false, 'Please use a business or personal email address.', 403);
}

// Sanitización básica para salida/correo
$safeName = htmlspecialchars($fullName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safeEmail = htmlspecialchars($userEmail, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safeSubject = htmlspecialchars($projectSubject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safeMessage = htmlspecialchars($projectDetails, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// ---------- SEND EMAIL ----------
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->Port       = SMTP_PORT;

    // Si cambias a 587, usa STARTTLS:
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    $mail->CharSet = 'UTF-8';

    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress(DESTINATION_EMAIL, DESTINATION_NAME);
    $mail->addReplyTo($userEmail, $fullName);

    $mail->Subject = '[PIA Lead] ' . $projectSubject;

    $mailBodyHtml = "
        <h2>New Lead from PIA Website</h2>
        <p><strong>Name:</strong> {$safeName}</p>
        <p><strong>Email:</strong> {$safeEmail}</p>
        <p><strong>Subject:</strong> {$safeSubject}</p>
        <p><strong>Message:</strong></p>
        <p>" . nl2br($safeMessage) . "</p>
        <hr>
        <p style='font-size:12px;color:#666;'>
            Sent from the PIA website contact form.
        </p>
    ";

    $mailBodyText = 
        "New Lead from PIA Website\n\n" .
        "Name: {$fullName}\n" .
        "Email: {$userEmail}\n" .
        "Subject: {$projectSubject}\n\n" .
        "Message:\n{$projectDetails}\n";

    $mail->isHTML(true);
    $mail->Body    = $mailBodyHtml;
    $mail->AltBody = $mailBodyText;

    $mail->send();

    respondJson(true, "Your message has been sent successfully. We'll get back to you shortly.");
} catch (Exception $e) {
    // En producción, no muestres detalles internos al usuario
    respondJson(false, 'We could not send your message right now. Please try again later.', 500);
}