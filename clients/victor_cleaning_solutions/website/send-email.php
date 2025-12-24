<?php
// send-email.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: contact.html");
  exit;
}

// 1) Recoger y sanitizar
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? 'Website Contact Form');
$message = trim($_POST['message'] ?? '');

// 2) Validaciones básicas
if ($name === '' || $email === '' || $message === '') {
  http_response_code(400);
  echo "Please fill in required fields.";
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  echo "Invalid email address.";
  exit;
}

// 3) Config SMTP (Hostinger / tu proveedor)
$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host       = 'smtp.hostinger.com';   // o el SMTP que te da Hostinger
  $mail->SMTPAuth   = true;
  $mail->Username   = 'info@victorscleaningsolutions.com'; // tu correo
  $mail->Password   = 'TU_PASSWORD_DEL_CORREO';            // contraseña del correo
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  // 4) Headers
  $mail->setFrom('info@victorscleaningsolutions.com', 'Victor Cleaning Solutions'); // mismo dominio
  $mail->addAddress('info@victorscleaningsolutions.com'); // a dónde llegan los mensajes

  // Para poder responder directo al cliente:
  $mail->addReplyTo($email, $name);

  // 5) Contenido
  $mail->isHTML(true);
  $mail->Subject = $subject;

  $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
  $safeName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

  $mail->Body = "
    <h3>New message from website contact form</h3>
    <p><strong>Name:</strong> {$safeName}</p>
    <p><strong>Email:</strong> {$safeEmail}</p>
    <p><strong>Subject:</strong> " . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . "</p>
    <p><strong>Message:</strong><br>{$safeMessage}</p>
  ";

  $mail->AltBody = "Name: {$name}\nEmail: {$email}\nSubject: {$subject}\n\nMessage:\n{$message}";

  $mail->send();

  // 6) Redirigir con éxito (puedes cambiar a contact.php?sent=1)
  header("Location: contact.html?sent=1");
  exit;

} catch (Exception $e) {
  http_response_code(500);
  echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
  exit;
}