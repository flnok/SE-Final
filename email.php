<?php
require_once("Controller/check_online.php");

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'flnokbin@gmail.com';                     // SMTP username
    $mail->Password   = 'ThienLong99';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('flnokbin@gmail.com', 'from Canh Nguyen-Huu');

    require_once("conn.php");


    $user = $_SESSION["username"];
    // echo $user;

    // $sql = "SELECT * FROM receipt WHERE email='$user'";
    // $result = $conn->query($sql);
    // if ($result->num_rows == 1) {
    //     $row = $result->fetch_assoc();
    //     $email = $row["email"];
    //     echo $email;
    // }
    // echo $email;

    $mail->addAddress($user);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Ban vua dat phong o EAT homestay';
    $mail->Body    = '<b>Ban da dat phong thanh cong, vui long giu dien thoai, nhan vien se goi dien cho ban ngay </b>';
    $mail->AltBody = 'Ban da dat phong thanh cong, vui long giu dien thoai, nhan vien se goi dien cho ban ngay';

    $mail->send();
    echo 'Message has been sent';
    header("Location: index.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
