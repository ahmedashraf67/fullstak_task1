<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
   
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'guide.me.create@gmail.com';                 
    $mail->Password   = 'iikkemaedfxuuuul
';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = 587;                                    

   
    $mail->setFrom('guide.me.create@gmail.com', 'Ahmed Ashraf Elgaml');
    $mail->addAddress('ahmedabubakr148@gmail.com', 'Ahmed Abobakr');

    
    $mail->isHTML(true);                                        
    $mail->Subject = 'Test Email via PHPMailer';
    $mail->Body    = 'This is the <b>HTML body</b> of the email.';
    $mail->AltBody = 'This is the plain text version of the email.';

    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
