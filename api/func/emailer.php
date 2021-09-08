<?php 



//Include required PHPMailer files
require '../../libraries/phpmailer/PHPMailer.php';
require '../../libraries/phpmailer/SMTP.php';
require '../../libraries/phpmailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer


function send_mail($message, $subject, $sendTo)
{

    $status = '';

    $username = "kdl.071219@gmail.com";
    $password = "K1ng1n@m0";

    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    //Define smtp host
    $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
    $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
    //Port to connect smtp
    $mail->Port = "587";
    //Set gmail username
    $mail->Username = $username;
    //Set gmail password
    $mail->Password = $password;
    //Email subject
    $mail->Subject = $subject;
    //Set sender email
    $mail->setFrom($username);
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    //Email body
    $mail->Body = $message;
    //Add recipient
    $mail->addAddress($sendTo);
    //Finally send email
    if ( $mail->send() ) {
        $status = true;
    }else{
        // $status = "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
        $status = false;
    }
    //Closing smtp connection
    $mail->smtpClose();

    return $status;
}
