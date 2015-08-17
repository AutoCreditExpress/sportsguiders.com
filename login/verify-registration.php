<?php
require '../inc/config.php';
$SubscriberDAO = new SubscriberDAO($db);

if($SubscriberDAO->updateUserActiveUsingIdHash($_GET['id'],$_GET['verification_code'])==true){

//load the user ingo
$UserInfo = $SubscriberDAO->getUserById($_GET['id']);

//Create a new PHPMailer instance
    $mail = new PHPMailer;
//Set who the message is to be sent from
    //$mail->setFrom('sportguiders.com', 'INFO');
$mail->From = 'info@sportsguiders.com';
$mail->FromName = 'Sportsguiders';
//Set an alternative reply-to address
    $mail->addReplyTo('info@sportguiders.com', 'sportsguiders.com');
//Set who the message is to be sent to
    $mail->addAddress($UserInfo['user_email'], $UserInfo['user_name']);
//Set the subject line
    $mail->Subject = 'New Registration';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->isHTML(true);
$mail->msgHTML(file_get_contents('http://www.sportsguiders.com/email/subscription/signup/congratulations.php'), dirname(__FILE__));
//Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

    echo "
    <script>
        location.assign('http://www.sportsguiders.com/login/');
    </script>";
}else{
    echo "<h1>You are not authorized to access this page!!</h1>";
}

?>