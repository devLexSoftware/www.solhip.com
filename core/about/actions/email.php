<?php
include("../../config/conexion.php");

//Load composer's autoloader
require_once '../../../componentes/PHPMailer/PHPMailerAutoload.php';

$cliEmail = $_POST[cliEmail];
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // GMail
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'desarrollolexsoftware@gmail.com';                 // SMTP username
    $mail->Password = 'Admin123456789';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('desarrollolexsoftware@gmail.com', 'Solidez Hipotecaria');
    $mail->AddAddress('soportelexsoftware@gmail.com', 'Soporte Lex');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solidez Hipotecaria, comunicarse';
    $mail->Body    = $cliEmail."  Mensaje enviado desde sistema";
    $mail->AltBody = 'Mensaje enviado desde sistema';

    $mail->send();
    header("Location: ../../templates/index.php?p=inM");
} catch (Exception $e) {
    header("Location: ../../templates/index.php?p=in");
}



?>
