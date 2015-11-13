<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
//require 'lib/Stripe.php';
require 'inc/config.php';

Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input, true);

$StripeWebhookHandler = new StripeWebhookHandler($db,$event_json);

$StripeWebhookHandler->DisplayData();   ///enable for local testing

//$DataObject->MailData();    //enable for live testing
/*
if($StripeWebhookHandler->getEventType()=="customer.created"){

    /// get the users email addrss from stripe webhook data
    $subscriberEmail = $StripeWebhookHandler->getSubscriberEmail();

    /// get the user id from stripe data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    ///get cardId from stripe data
    $subscriberCardID = $StripeWebhookHandler->getSubscriberCardId();

    //if the users email address is in our database and has no subscriber id add the id to the database
    if($StripeWebhookHandler->getUserHasId($subscriberEmail)['subscriber_id']==""){

        //update user table with id
        $StripeWebhookHandler->updateUserSubscriberId($subscriberEmail, $subscriberID);

        //update subscriber table with id
        $StripeWebhookHandler->updateSubscriberId($subscriberEmail, $subscriberID);
    }

    echo $subscriberCardID;
    //if the users card id is not in the database add it
    if($StripeWebhookHandler->checkSubscriberCardId($subscriberEmail)==""){
        //update subscribe table user card id
        $StripeWebhookHandler->updateSubscriberCardId($subscriberEmail,$subscriberCardID);
    }

    //if members table isActive=0
    if($StripeWebhookHandler->getSubscriberIsActive($subscriberID)!=1) {
        echo "member not active<br>";
        //if isactive Table isActive=1 then update memberstable
        if($StripeWebhookHandler->checkSubscriberIsActiveBySubscriberID($subscriberID)!=null) {
            echo "customer active in active table<br>";
            $StripeWebhookHandler->updateSubscriberIsActive($subscriberID);
            //delete record from isActive table
            echo "deleting isActive record<br>";
            $StripeWebhookHandler->delSubscriberIsActiveInTable($subscriberID);
        }
    }

}


if($StripeWebhookHandler->getEventType()=="invoice.payment_succeeded"){
    //get the subscriberId from the stripe data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    //get subscription id from stripe data
    $subscriptionID = $StripeWebhookHandler->getSubscriberSubscriptionId();

    //check the subscriber table for subscriberID
    if($StripeWebhookHandler->getSubscriberSubscriberId($subscriberID)!=null){
        echo "subscriber found";
        //if the user doesnt have an active subscription after payment, update the table
        if($StripeWebhookHandler->getSubscriberIsActive($subscriberID)!=1) {

            //if the isActiveTable==1
            //if ($StripeWebhookHandler->checkSubscriberIsActiveBySubscriberID($subscriberID) == 1) {
            //update memebers table
            $StripeWebhookHandler->updateSubscriberIsActive($subscriberID);

            //update suscription id in the the table
            $StripeWebhookHandler->updateSubscriberSubscriptionId($subscriberID);
            //}
        }
    }else{  //subscriberID was not found in table, write the action to isActiveTable
        echo "updating isActive table..";
        echo $subscriberID."<br>";
        $StripeWebhookHandler->updateSubscriberIsActiveTable($subscriberID,$subscriptionID);
    }
}

if($StripeWebhookHandler->getEventType()=="customer.source.created"){

    // get users subscriber id from webhook data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    //grab customer card id from database
    $subscriberOriginalCardID = $StripeWebhookHandler->getSubscriberSubscriberId($subscriberID);

    ///get cardId from stripe data
    $subscriberCardID = $StripeWebhookHandler->getSubscriberCardId();

    //update subscriber card id in database
    if($subscriberOriginalCardID!=$subscriberCardID){
        $StripeWebhookHandler->updateSubscriberCardIdBySubscriptionID($subscriberID,$subscriberCardID);
    }

}

if($StripeWebhookHandler->getEventType()=="invoice.payment_failed"){

    // get users subscriber id from webhook data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    //grab customer card id from database
    $subscriberOriginalCardID = $StripeWebhookHandler->getSubscriberSubscriberId($subscriberID);

    ///get cardId from stripe data
    $subscriberCardID = $StripeWebhookHandler->getSubscriberCardId();

    //update subscriber card id in database
    if($subscriberOriginalCardID!=$subscriberCardID){
        $StripeWebhookHandler->updateSubscriberCardIdBySubscriptionID($subscriberID,$subscriberCardID);
    }

}
//*/

if($StripeWebhookHandler->getEventType()=="invoice.payment_failed"){

    //get the subscriberId from the stripe data
    $subscriberID = $StripeWebhookHandler->getSubscriberId();

    //get user id based on stripe subscriber id
    $SubscriberDAO = new SubscriberDAO($db);

    //load customer email address
    $subscriberEmail = $SubscriberDAO->getSubscriberByID($subscriberID)['email'];

    //get subscription id from stripe data
    $subscriptionID = $StripeWebhookHandler->getSubscriberSubscriptionId();
    echo $subscriberEmail.'...';
    echo $subscriberID.'...';
    echo $subscriptionID.'...';
    //check the subscriber table for subscriberID
    if($StripeWebhookHandler->getSubscriberSubscriberId($subscriberID)!=null){
        echo "subscriber found...";

        //disable user account
        $SubscriberDAO->updateSubscriberIsActiveUsersTable($subscriberEmail,'0');
        echo "disabling user...";

        $mandrill = new Mandrill('yj_MPJb4VNSohdk8kKdUMA');

        $message = new stdClass();
        //$message->html = file_get_contents('http://www.sportsguiders.com/email/subscription/signup/congratulations.php');;
        $message->html = "Your recent payment has failed, and your account has been deactivated.<br>Please update your billing information by clicking the <a href=\"http://www.sportsguiders.com/make-Payment/?subscriber_id=".$subscriberID."&user_email=".$subscriberEmail."\">link</a>.";
        $message->subject = 'Payment has failed';
        $message->from_email = EMAIL_VERIFICATION_FROM;
        $message->from_name  = EMAIL_VERIFICATION_FROM_NAME;
        $message->to = array(array("email" => $subscriberEmail));
        $message->track_opens = true;                        // Enable encryption, 'ssl' also accepted

        $response = $mandrill->messages->send($message);

        if($response[0]['status'] = 'sent'){
            echo 'Mail Sent';
        }else{
            echo 'Error:'.$response->reject_reason;
        }

        //on success enable the user account
        //on fail resend new email

    }
}

/////leave the http response code of 200 for the stripe webhook
http_response_code(200); // PHP 5.4 or greater
?>