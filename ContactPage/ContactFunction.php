<?php

session_start();
if(!isset($_SESSION['user'])){
header("Location: http://localhost/Tattoo-Studio/LoginPage/loginform.php");
exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';
require '../PHPmailer/src/Exception.php';

// echo "<pre>";
// print_r( $_POST );

$mail = new PHPMailer(true);
if(isset($_POST['submit'])){
   
try {
    $mail->isSMTP();                       
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '19202@uktc-bg.com';                    
    $mail->Password   = 'voxeuasjsvjhojxi';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                   

    $mail->setFrom('from@example.com', 'Mailer');
 
    $mail->addAddress('19202@uktc-bg.com');

    $mail->isHTML(true);
    $mail->Subject = 'Inquiry from-'.$_POST['firstname'];
    $mail->Body    = '<p>About sender :'.$_POST['firstname'].'-'.$_POST['lastname'].'</p><br>Mail : '.$_POST['email'].', <br>Mobile :'.$_POST['mobile'].'<br>About :'.$_POST['message'].'<br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("You have successfully sent your inquiry")</script>';
    header("Location: http://localhost/TattoStudio/IndexPage/indexpage.php");
    exit();
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '<script>alert("Error...Try again!")</script>';
}
}
?>