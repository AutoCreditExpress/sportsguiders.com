<?php
require 'inc/config.php';

Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

    $SubscriberDAO = new SubscriberDAO($db);

    //grab customer from stripe using subscriber id
    $cu = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberIdByEmail($_SESSION['user_email']));

    //cancel subscription on stripe using subscription id
    $cu->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']))->cancel();

    //disable subscription in table
    //$SubscriberDAO->updateSubscriberIsActive($_SESSION['user_email'], "1");

    //remove subscription_id from subscriber table and replace with generic
    $SubscriberDAO->updateSubscriberSubscriptionId($_SESSION['user_email'], 'sub_'.uniqid());
