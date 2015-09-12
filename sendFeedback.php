<?php
include('inc/config.php');

$mandrill = new Mandrill('yj_MPJb4VNSohdk8kKdUMA');

$message = new stdClass();
//$message->html = file_get_contents('http://www.sportsguiders.com/email/subscription/signup/congratulations.php');;
$message->html = "<h1>".$_POST['userName']."</h1>";
$message->html .= "<h2>Email: ".$_POST['userEmail']."</h2>";
$message->html .= "<h3>ID: ".$_POST['userId']."</h3>";
$message->subject = 'Feedback from:'.$_POST['userEmail'];
$message->from_email = EMAIL_VERIFICATION_FROM;
$message->from_name  = EMAIL_VERIFICATION_FROM_NAME;
$message->to = array(array("email" => 'support@sportsguiders.com'));
$message->track_opens = true;                        // Enable encryption, 'ssl' also accepted

$response = $mandrill->messages->send($message);

if($response[0]['status'] = 'sent'){
echo 'Message Sent';
}else{
echo 'Error:'.$response->reject_reason;
}
?>