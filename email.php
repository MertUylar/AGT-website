<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.agtracingteam.com';               // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@agtracingteam.com';               // SMTP username
    $mail->Password   = 'EnsarPassat06';                        // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@agtracingteam.com', $_POST['name']);
    $mail->addAddress('info@agtracingteam.com', 'İletişim');     // Add a recipient
    $mail->addReplyTo($_POST['email'], $_POST['name']);


    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'İletişim formu';
    $mail->Body    = 'Ad: ' . $_POST['name'] . "E-posta: " . $_POST['email'] . "\n" .  "Mesaj: " . $_POST['message'];

    $mail->send();
    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
