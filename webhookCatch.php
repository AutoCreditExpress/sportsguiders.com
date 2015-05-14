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

$StripeWebhookHandler->DisplayData();   ///enable for local testing

//$DataObject->MailData();    //enable for live testing

if($StripeWebhookHandler->getEventType()=="customer.created"){

    /// get the user email from stripe webhook data
    $subscriberEmail = $StripeWebhookHandler->getSubscriberEmail();

    //if the users email address is in our database and has no subscriber id add the id to the database
    if($StripeWebhookHandler->getUserHasId($subscriberEmail)['subscriber_id']==""){

        /// get the user id from stripe data
        $subscriberID = $StripeWebhookHandler->getSubscriberId();

        //update user table with id
        $StripeWebhookHandler->updateUserSubscriberId($subscriberEmail, $subscriberID);

        //update subscriber table with id
        $StripeWebhookHandler->updateSubscriberId($subscriberEmail, $subscriberID);
    }
}


if($StripeWebhookHandler->getEventType()=="invoice.payment_succeeded"){
    //get the subscriberId from the stripe data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    //if the user doesnot have an active subscription after payment, update the table
    if($StripeWebhookHandler->getSubscriberIsActive($subscriberID)!=1) {
        $StripeWebhookHandler->updateSubscriberIsActive($StripeWebhookHandler->getSubscriberId());
    }
}


/////leave the http response code of 200 for the stripe webhook
http_response_code(200); // PHP 5.4 or greater
?>