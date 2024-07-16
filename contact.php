<?php
// Importa la clase PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga la biblioteca PHPMailer
require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Instancia PHPMailer
$mail = new PHPMailer(true);
$customerName = $_POST['name'];
$customerEmail = $_POST['email'];
$customerPhone = $_POST['phone'];
$sentEmail = 'hello@piainsights.com';

$htmlContent = '<h1>Customer: '.$_POST['name'].'</h1>
<p>Information Provided.</p>';
$tabla = "<table>
    <tr><td>Name: </td><td>".$_POST['name']."</td></tr>  
    <tr><td>Email</td><td>".$_POST['email']."</td></tr>  
    <tr><td>Phone</td><td>".$_POST['phone']."</td></tr>  
    <tr><td>Message</td><td>".$_POST['message']."</td></tr>  
          </table>";
$htmlContent .= $tabla;
$htmlContent .= "<p>The Customer requests a call to provide a visit and a quote for a service with Panameño Insights & Analytics</p>";

$message = "<!DOCTYPE html>
<html>
<head>
<title>Email Quote Notification</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #000203;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #000203;
}
</style>
</head>
<body>
".$htmlContent."
</body>
</html>";

try {
    // Configura el servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info.piainsights@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password = 'mriq kvgu qyur rorb'; // Tu contraseña de Gmail o contraseña de aplicación generada
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configura el remitente y el destinatario
    $mail->setFrom($sentEmail, 'New Quote Requested');
    $mail->addAddress($sentEmail, $customerName);

    // Configura el asunto y el cuerpo del mensaje
    $mail->IsHTML(true);
    $mail->Subject = 'New Quote Requested';
    $mail->Body = $message;

    $result = $mail->send();
    
    

} catch (Exception $e) {
  echo '<div class="error-message">Error sending the email: ' . $mail->ErrorInfo . '</div>';
}
}
?>
