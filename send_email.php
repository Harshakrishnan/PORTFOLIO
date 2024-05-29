<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';  // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your@example.com'; // SMTP username
        $mail->Password = 'yourpassword'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('harshakrishnan1204@gmail.com');

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "Name: $name\nEmail: $email\n\n$message";

        $mail->send();
        echo json_encode(array('success' => true, 'message' => 'Message has been sent successfully.'));
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Method not allowed.'));
}
?>
