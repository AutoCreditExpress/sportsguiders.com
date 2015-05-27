<?php
require 'inc/config.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");
$_SESSION['User_Email']="jmct0425@gmail.com";

$SubscriberDAO = new SubscriberDAO($db);

//grab customer from stripe using subscriber id
$cu = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberIdByEmail($_SESSION['User_Email']));

//cancel subscription on stripe using subscription id
$cu->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['User_Email']))->cancel();

//disable subscription in table
$SubscriberDAO->updateSubscriberIsActive($_SESSION['User_Email'],"0");

//remove subscription_id from subscriber table
$SubscriberDAO->updateSubscriberSubscriptionId($_SESSION['User_Email'],null);
?>