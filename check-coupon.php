<?php require 'inc/config.php';
Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");
$error = '';
$success = '';

$couponCode = $_GET['code'];
//$couponCode = 'MHS';

$SubscriberDAO = new SubscriberDAO($db);
try {
    $couponResponse = \Stripe_Coupon::retrieve($couponCode);
}
catch (Exception $e) {
    $error = 'Coupon not found(Error): '.$couponCode;
}
//print_r($couponResponse);

if($couponResponse){
    $returnData = "Good news, we found a coupon code that matches.\n";
    $returnData .= "Code Entered:  ".$couponCode."\n";
    if($couponResponse['percent_off']){
        $returnData .= "Description:  percentage discount - ".$couponResponse['percent_off']."% \n";
    }elseif($couponResponse['amount_off']){
        $returnData .= "Description:  amount discount - $".substr($couponResponse['amount_off'],0,-2)."\n";
    }
}

echo $returnData.$error;
?>