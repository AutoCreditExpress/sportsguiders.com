<?php
$message = "Hello World";
// Do something with $event_json

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@geekinoff.com>' . "\r\n";

mail("jmct0425@gmail.com","WebHook",$message,$headers);
?>