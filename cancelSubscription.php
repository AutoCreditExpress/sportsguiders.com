<?php
require 'inc/config.php';

Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");

    $SubscriberDAO = new SubscriberDAO($db);

    //grab customer from stripe using subscriber id
    $cu = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberIdByEmail($_SESSION['user_email']));

    //cancel subscription on stripe using subscription id
    $cu->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']))->cancel();

    //disable subscription in table
    //$SubscriberDAO->updateSubscriberIsActive($_SESSION['user_email'], "1");

    //remove subscription_id from subscriber table and replace with generic
    //$SubscriberDAO->updateSubscriberSubscriptionId($_SESSION['user_email'], 'sub_'.uniqid());

//remove subscription_id from subscriber table and replace with generic
//this was changed on 9/1/15 so that counting users with active subs and sub ids is the actually sub count
    $SubscriberDAO->updateSubscriberSubscriptionId($_SESSION['user_email'], '');