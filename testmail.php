<?php
require 'inc/config.php';

//require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('yj_MPJb4VNSohdk8kKdUMA');
$user_email = 'jmct0425@gmail.com';
$message = new stdClass();
$message->html = file_get_contents('http://www.sportsguiders.com/email/subscription/signup/congratulations.php');;

$message->subject = EMAIL_VERIFICATION_SUBJECT;
$message->from_email = EMAIL_VERIFICATION_FROM;
$message->from_name  = EMAIL_VERIFICATION_FROM_NAME;
$message->to = array(array("email" => $user_email));
$message->track_opens = true;                        // Enable encryption, 'ssl' also accepted

$response = $mandrill->messages->send($message);

if($response[0]['status'] = 'sent'){
    echo 'Mail Sent to '.$user_email;
}else{
    echo 'Error:'.$response->reject_reason;
}
/*
try{
    // please look into the config/config.php for much more info on how to use this!
    // use SMTP or use mail()
    if (EMAIL_USE_SMTP) {
        // Set mailer to use SMTP
        $mail->IsSMTP();
        //useful for debugging, shows full SMTP errors
        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        // Enable SMTP authentication
        $mail->SMTPAuth = tre;
        // Enable encryption, usually SSL/TLS
        if (defined(EMAIL_SMTP_ENCRYPTION)) {
            $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
        }
        // Specify host server
        $mail->Host = EMAIL_SMTP_HOST;
        $mail->Username = 'nathankunst@gmail.com';
        $mail->Password = 'yj_MPJb4VNSohdk8kKdUMA';
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = '587';
    } else {
        $mail->IsMail();

    }
    $mail->SMTPDebug  = 2;
    $mail->From = EMAIL_VERIFICATION_FROM;
    $mail->FromName = EMAIL_VERIFICATION_FROM_NAME;
    $mail->AddAddress('jmct0425@gmail.com');
    $mail->Subject = EMAIL_VERIFICATION_SUBJECT;
    //$link = EMAIL_VERIFICATION_URL.'?id='.urlencode($user_id).'&verification_code='.urlencode($user_activation_hash);

    // the link to your register.php, please set this value in config/email_verification.php

    $mail->IsHTML(true);
    echo "start";
    $mail->Body=file_get_contents('http://www.sportsguiders.com/email/subscription/signup/congratulations.php');
    echo "end";
    //$mail->Body = 'test data';

    if(!$mail->Send()) {
        $this->errors[] = MESSAGE_VERIFICATION_MAIL_NOT_SENT . $mail->ErrorInfo;
        echo "failure";
        return false;
    } else {
        echo "mail sent....";
        return true;
    }
} catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}
*/


?>

