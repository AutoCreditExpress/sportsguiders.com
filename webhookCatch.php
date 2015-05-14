<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
require 'lib/Stripe.php';

require 'inc/config.php';

require 'classes/stripe_webhook/StripeWebhookHandler.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input, true);

$StripeWebhookHandler = new StripeWebhookHandler($event_json);

$StripeWebhookHandler->DisplayData();

$StripeWebhookHandler->processEvent();

//$DataObject->MailData();

http_response_code(200); // PHP 5.4 or greater
?>