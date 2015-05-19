<?php
require 'inc/config.php';
Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");
$customer = Stripe_Customer::retrieve("cus_6GiWyernrdD6u8");


echo "<pre>";
echo $customer;
echo "</pre>";
?>