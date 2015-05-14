<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
//require 'lib/Stripe.php';
require 'inc/config.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input, true);

$StripeWebhookHandler = new StripeWebhookHandler($db,$event_json);

$StripeWebhookHandler->DisplayData();   ///disable for live testing

//$DataObject->MailData();    //enable for live testing
////update customer id
if($StripeWebhookHandler->getEventType()=="customer.created"){

    /// get the user email from stripe webhook
    $subscriberEmail = $StripeWebhookHandler->getSubscriberEmail();

    //if the users email address in our database, listed in the stripe data has no id, add the id to the database
    if($StripeWebhookHandler->getUserHasId($subscriberEmail)['subscriber_id']==""){
        /// get the user email and the user id from the datastream and set the subscriber_id in usertable
        $subscriberID = $StripeWebhookHandler->getSubscriberId();
        $StripeWebhookHandler->updateUserSubscriberId($subscriberEmail, $subscriberID);
        $StripeWebhookHandler->updateSubscriberId($subscriberEmail, $subscriberID);
    }
}

if($StripeWebhookHandler->getEventType()=="invoice.payment_succeeded"){
    $StripeWebhookHandler->updateSubscriberIsActive($StripeWebhookHandler->getSubscriberId());
}

////invoice reject email user using mail method

http_response_code(200); // PHP 5.4 or greater
?>