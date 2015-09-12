<?php
class StripeWebhookHandler{
    public $WorkingData;
    protected $db = '';

    public function __construct($pdo,$input){
        $this->db = $pdo;
        if($input){
            $this->WorkingData = $input;
        }else{

            //test invoice payment succeeded
            //$this->WorkingData = json_decode('{ "id": "evt_16241uHVN63nCqTYNVjLY9bm", "created": 1431539546, "livemode": true, "type": "invoice.payment_succeeded", "data": { "object": { "date": 1431539544, "id": "in_16241sHVN63nCqTYwzmgKwWt", "period_start": 1431539544, "period_end": 1431539544, "lines": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/invoices/in_16241sHVN63nCqTYwzmgKwWt/lines", "data": [ { "id": "sub_6EX6PrsaaXIA5p", "object": "line_item", "type": "subscription", "livemode": true, "amount": 100, "currency": "usd", "proration": false, "period": { "start": 1431539544, "end": 1434217944 }, "subscription": null, "quantity": 1, "plan": { "interval": "month", "name": "Basic Plan", "created": 1431433306, "amount": 100, "currency": "usd", "id": "test", "object": "plan", "livemode": true, "interval_count": 1, "trial_period_days": null, "metadata": { }, "statement_descriptor": "Sub Test" }, "description": null, "discountable": true, "metadata": { } } ] }, "subtotal": 100, "total": 100, "customer": "cus_6ac72GXyg01xSW", "object": "invoice", "attempted": true, "closed": true, "forgiven": false, "paid": true, "livemode": true, "attempt_count": 1, "amount_due": 100, "currency": "usd", "starting_balance": 0, "ending_balance": 0, "next_payment_attempt": null, "webhooks_delivered_at": null, "charge": "ch_16241sHVN63nCqTYBbRBRMkz", "discount": null, "application_fee": null, "subscription": "sub_6EX6PrsaaXIA5p", "tax_percent": null, "tax": null, "metadata": { }, "statement_descriptor": null, "description": null, "receipt_number": null } }, "object": "event", "pending_webhooks": 1, "request": "iar_6EX6SCgaMwzi8g", "api_version": "2015-04-07" }',true);

            //test customer.created
            //$this->WorkingData = json_decode('{ "id": "evt_16241uHVN63nCqTYGnvllEqk", "created": 1431539546, "livemode": true, "type": "customer.created", "data": { "object": { "object": "customer", "created": 1431539544, "id": "cus_6ac72GXyg01xSW", "livemode": true, "description": null, "email": "jmct0425@gmail.com", "delinquent": false, "metadata": { }, "subscriptions": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/customers/cus_6ac72GXyg01xSW/subscriptions", "data": [ { "id": "sub_6EX6PrsaaXIA5p", "plan": { "interval": "month", "name": "Basic Plan", "created": 1431433306, "amount": 100, "currency": "usd", "id": "test", "object": "plan", "livemode": true, "interval_count": 1, "trial_period_days": null, "metadata": { }, "statement_descriptor": "Sub Test" }, "object": "subscription", "start": 1431539544, "status": "active", "customer": "cus_6ac72GXyg01xSW", "cancel_at_period_end": false, "current_period_start": 1431539544, "current_period_end": 1434217944, "ended_at": null, "trial_start": null, "trial_end": null, "canceled_at": null, "quantity": 1, "application_fee_percent": null, "discount": null, "tax_percent": null, "metadata": { } } ] }, "discount": null, "account_balance": 0, "currency": "usd", "sources": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/customers/cus_6ac72GXyg01xSW/sources", "data": [ { "id": "card_16241qHVN63nCqTYdik5XfHW", "object": "card", "last4": "4343", "brand": "MasterCard", "funding": "debit", "exp_month": 10, "exp_year": 2016, "fingerprint": "wMaFTiiStV9bJnjF", "country": "US", "name": "Justin McTaggart", "address_line1": "7495 grand blanc rd", "address_line2": null, "address_city": "swartz creek", "address_state": "Michigan", "address_zip": "48473", "address_country": "US", "cvc_check": "pass", "address_line1_check": "pass", "address_zip_check": "pass", "dynamic_last4": null, "metadata": { }, "customer": "cus_6ac72GXyg01xSW" } ] }, "default_source": "card_16241qHVN63nCqTYdik5XfHW" } }, "object": "event", "pending_webhooks": 1, "request": "iar_6EX6SCgaMwzi8g", "api_version": "2015-04-07" }',true);

            //test customer.source.created
            //$this->WorkingData = json_decode('{ "id": "evt_166sXPHVN63nCqTYF91TgJ1V", "created": 1432687011, "livemode": true, "type": "customer.source.created", "data": { "object": { "id": "card_166sXLHVN63nCqTYjomybbPy", "object": "card", "last4": "7757", "brand": "MasterCard", "funding": "debit", "exp_month": 11, "exp_year": 2020, "fingerprint": "9xLH1tNmsraGFw3H", "country": "US", "name": "Justin McTaggart", "address_line1": "7495 grand blanc rd", "address_line2": null, "address_city": "swartz creek", "address_state": "Michigan", "address_zip": "48473", "address_country": "US", "cvc_check": "pass", "address_line1_check": "fail", "address_zip_check": "pass", "dynamic_last4": null, "metadata": { }, "customer": "cus_6ac72GXyg01xSW" } }, "object": "event", "pending_webhooks": 1, "request": "iar_6JVY88b5VqYq68", "api_version": "2015-04-07" }',true);

            //test payment failed
/*
            $this->WorkingData = json_decode('{
  "created": 1326853478,
  "livemode": false,
  "id": "evt_00000000000000",
  "type": "invoice.payment_failed",
  "object": "event",
  "request": null,
  "pending_webhooks": 1,
  "api_version": "2015-04-07",
  "data": {
    "object": {
      "date": 1437314821,
      "id": "in_00000000000000",
      "period_start": 1437314821,
      "period_end": 1437314821,
      "lines": {
        "data": [
          {
            "id": "sub_6u5o7Et1WNDqoX",
            "object": "line_item",
            "type": "subscription",
            "livemode": true,
            "amount": 1,
            "currency": "usd",
            "proration": false,
            "period": {
              "start": 1468937221,
              "end": 1500473221
            },
            "subscription": null,
            "quantity": 1,
            "plan": {
              "interval": "month",
              "name": "Gold Special",
              "created": 1437314821,
              "amount": 2000,
              "currency": "usd",
              "id": "gold",
              "object": "plan",
              "livemode": false,
              "interval_count": 1,
              "trial_period_days": null,
              "metadata": {},
              "statement_descriptor": null
            },
            "description": null,
            "discountable": true,
            "metadata": {}
          }
        ],
        "total_count": 1,
        "object": "list",
        "url": "/v1/invoices/in_16QIRVHVN63nCqTYWT1dcW86/lines"
      },
      "subtotal": 0,
      "total": 0,
      "customer": "cus_6u5o7HZZ5z1MbD",
      "object": "invoice",
      "attempted": true,
      "closed": false,
      "forgiven": false,
      "paid": false,
      "livemode": false,
      "attempt_count": 0,
      "amount_due": 0,
      "currency": "usd",
      "starting_balance": 0,
      "ending_balance": null,
      "next_payment_attempt": 1437318421,
      "webhooks_delivered_at": null,
      "charge": null,
      "discount": null,
      "application_fee": null,
      "subscription": null,
      "tax_percent": null,
      "tax": null,
      "metadata": {},
      "statement_descriptor": null,
      "description": null,
      "receipt_number": null
    }
  }
}',true);
*/
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Find
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getEventType(){
        ////events returned from new subscriber
        //invoice.created
        //charge.succeeded
        //customer.subscription.created
        //customer.created   ////contains email and userId
        //customer.source.created
        //invoice.payment_succeeded   //contains charge Id and amount and billing details
        return $this->WorkingData['type'];
    }

    public function getSubscriberEmail(){
        return $this->WorkingData['data']['object']['email'];
    }

    public function getSubscriberCardId(){
        return $this->WorkingData['data']['object']['default_source'];
    }

    public function getSubscriberSubscriptionId(){
        return $this->WorkingData['data']['object']['lines']['data'][0]['id'];
    }

    public function getSubscriberId(){
        if($this->getEventType()=="customer.created"){
            return $this->WorkingData['data']['object']['id'];
        }elseif($this->getEventType()=="invoice.payment_succeeded" or $this->getEventType()=="customer.source.created" or $this->getEventType()=="invoice.payment_failed"){
            return $this->WorkingData['data']['object']['customer'];
        }

    }

    public function getUserHasId($subscriberEmail){
        $Subscriber = $this->db->prepare("SELECT * FROM users WHERE user_email = '".$subscriberEmail."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results[0];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    public function getSubscriberIsActive($subscriberEmail){
        $Subscriber = $this->db->prepare("SELECT isActive FROM subscriber WHERE subscriber_id = '".$subscriberEmail."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results[0]['isActive'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    public function getSubscriberSubscriberId($subscriberID){
        $Subscriber = $this->db->prepare("SELECT subscriber_id FROM subscriber WHERE subscriber_id = '".$subscriberID."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results[0]['subscriber_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    public function checkSubscriberCardId($subscriberEmail){
        $Subscriber = $this->db->prepare("SELECT card_id FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results[0]['card_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    public function checkSubscriberCardIdBySubscriberID($subscriberID){
        $Subscriber = $this->db->prepare("SELECT subscriber_id FROM subscriber WHERE subscriber_id = '".$subscriberID."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results['subscriber_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    public function checkSubscriberSubscriptionId($subscriberEmail){
        $Subscriber = $this->db->prepare("SELECT subscription_id FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $Subscriber->execute();
            $results = $Subscriber->fetchAll();
            return $results['subscription_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function checkSubscriberIsActiveBySubscriberID($subscriberID){
        $qSubscriber = $this->db->prepare("SELECT isActive FROM isactive WHERE subscriber_id = '".$subscriberID."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            if($results=="1"){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Update
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function updateUserSubscriberId($subscriberEmail,$subscriberID){
        $qUpdateSubscriber = $this->db->prepare("UPDATE users SET subscriber_id = '".$subscriberID."' WHERE user_email = '".$subscriberEmail."'");
        try{
            $qUpdateSubscriber->execute();

            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberId($subscriberEmail,$subscriberID){
        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET subscriber_id = '".$subscriberID."' WHERE email = '".$subscriberEmail."'");
        try{
            $qUpdateSubscriber->execute();

            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberIsActive($subscriberID){
        echo "tying update on...".$subscriberID."...";
        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET isActive = '1' WHERE subscriber_id = '".$subscriberID."'");
        try{

            $qUpdateSubscriber->execute();
            echo "update successful...";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberCardId($subscriberEmail,$cardID){
        echo "tying update on...".$subscriberEmail."...";
        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET card_id = '".$cardID."' WHERE email = '".$subscriberEmail."'");
        try{

            $qUpdateSubscriber->execute();
            echo "update successful";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberCardIdBySubscriptionID($subscriberID,$cardID){
        echo "tying update on...".$subscriberID."...";
        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET card_id = '".$cardID."' WHERE subscriber_id = '".$subscriberID."'");
        try{
            $qUpdateSubscriber->execute();
            echo "update successful";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberSubscriptionId($subscriberID,$subscriptionID){
        echo "tying update on...".$subscriberID."...";
        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET subscription_id = '".$subscriptionID."' WHERE subscriber_id = '".$subscriberID."'");
        try{

            $qUpdateSubscriber->execute();
            echo "using ".$subscriptionID."...update successful";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberIsActiveTable($subscriberID,$subscriptinID){
        echo "tying update on...".$subscriberID."...";
        $qUpdateSubscriber = $this->db->prepare("INSERT INTO isactive (id,isActive, subscriber_id,subscription_id) VALUES ('','1','".$subscriberID."','".$subscriptionID."')");
        //$qUpdateSubscriber = $this->db->prepare("UPDATE isActive SET isActive='1', subscriber_id='".$subscriberID."' WHERE id='1'");
        try{
            $qUpdateSubscriber->execute();
            echo "update successful...";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Create
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Delete
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function delSubscriberIsActiveInTable($subscriberID){
        echo "tying delete on...".$subscriberID."...";
        $qUpdateSubscriber = $this->db->prepare("DELETE FROM isactive WHERE subscriber_id = '".$subscriberID."'");
        try{
            $qUpdateSubscriber->execute();
            echo "using ".$subscriptionID."...delete successful";
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Mapping
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Output
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function MailData(){
        $message = $this->WorkingData;
        if($message){
            // Do something with $event_json

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <info@geekinoff.com>' . "\r\n";

            mail("jmct0425@gmail.com","WebHook",$message,$headers);
        }
    }

    public function DisplayData(){
        echo "<pre>";
        var_dump($this->WorkingData);
        echo "</pre>";
    }
}
?>