<?php
require 'inc/config.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

$SubscriberDAO = new SubscriberDAO($db);


/**
 * Destroy old card and create new card and apply it to the subscription
 */

echo "<pre>";
echo $customer;
echo "</pre>";

//$cu = Stripe_Customer::retrieve("cus_6GiWyernrdD6u8");
$card = $cu->sources->retrieve("card_161gfGHVN63nCqTYJT1MiRTN");
$card->name = "Jane Austen";
$card->save();

/*
 * Stripe\Card JSON: {
  "id": "card_161gfGHVN63nCqTYJT1MiRTN",
  "object": "card",
  "last4": "4242",
  "brand": "Visa",
  "funding": "credit",
  "exp_month": 8,
  "exp_year": 2016,
  "country": "US",
  "name": "Jane Austen",
  "address_line1": null,
  "address_line2": null,
  "address_city": null,
  "address_state": null,
  "address_zip": null,
  "address_country": null,
  "cvc_check": null,
  "address_line1_check": null,
  "address_zip_check": null,
  "dynamic_last4": null,
  "metadata": {
  },
  "customer": "cus_6GoDzCMhV5pMeR"
}
 * */
?>