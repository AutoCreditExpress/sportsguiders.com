<?php require 'inc/config.php';

$couponCode = $_GET['code'];
//$couponCode = 'MHS';

$SubscriberDAO = new SubscriberDAO($db);

$couponResponse = $SubscriberDAO->getPlanUsingCoupon($couponCode,true);

//print_r($couponResponse);

if($couponResponse==null){
    $returnData = "Sorry, No discount found for this code!!";
}else{
    $returnData = "Good news, we found a coupon code that matches.\n";
    $returnData .= "Code Entered:  ".$couponCode."\n";
    $returnData .= "Description:  ".$couponResponse."\n";
}

echo $returnData;
?>