<?php
require 'inc/config.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

$SubscriberDAO = new SubscriberDAO($db);

$customer = Stripe_Customer::retrieve('cus_6GiWyernrdD6u8');

//delete customer from stripe
//$customer->delete();

//TODO: add user email
//$SubscriberDAO->updateSubscriberIsActive({user_email},"0");  //disable subscription in table
?>