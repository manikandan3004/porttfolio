<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {

    // SMTP SETTINGS
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'manikandan590130@gmail.com'; 
    $mail->Password   = 'cltt ngij xetu teqy'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // SENDER + RECEIVER
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('manikandan590130@gmail.com');

    // EMAIL CONTENT
    $mail->isHTML(true);
    $mail->Subject = 'New Portfolio Contact Message';

    $mail->Body = "
        <h3>New Message Received</h3>
        <b>Name:</b> {$_POST['name']} <br>
        <b>Email:</b> {$_POST['email']} <br>
        <b>Message:</b><br> {$_POST['message']}
    ";

    $mail->send();

    echo "<script>
            alert('Thanks for your message. Have a Good Day 😊');
            window.location.href='index.html';
          </script>";

} catch (Exception $e) {
    echo "Mail not sent. Error: {$mail->ErrorInfo}";
}

?>
