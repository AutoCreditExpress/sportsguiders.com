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
            //$this->WorkingData = json_decode('{ "id": "evt_16241uHVN63nCqTYNVjLY9bm", "created": 1431539546, "livemode": true, "type": "invoice.payment_succeeded", "data": { "object": { "date": 1431539544, "id": "in_16241sHVN63nCqTYwzmgKwWt", "period_start": 1431539544, "period_end": 1431539544, "lines": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/invoices/in_16241sHVN63nCqTYwzmgKwWt/lines", "data": [ { "id": "sub_6EX6PrsaaXIA5p", "object": "line_item", "type": "subscription", "livemode": true, "amount": 100, "currency": "usd", "proration": false, "period": { "start": 1431539544, "end": 1434217944 }, "subscription": null, "quantity": 1, "plan": { "interval": "month", "name": "Basic Plan", "created": 1431433306, "amount": 100, "currency": "usd", "id": "test", "object": "plan", "livemode": true, "interval_count": 1, "trial_period_days": null, "metadata": { }, "statement_descriptor": "Sub Test" }, "description": null, "discountable": true, "metadata": { } } ] }, "subtotal": 100, "total": 100, "customer": "cus_6EX687yQ3S7eC0", "object": "invoice", "attempted": true, "closed": true, "forgiven": false, "paid": true, "livemode": true, "attempt_count": 1, "amount_due": 100, "currency": "usd", "starting_balance": 0, "ending_balance": 0, "next_payment_attempt": null, "webhooks_delivered_at": null, "charge": "ch_16241sHVN63nCqTYBbRBRMkz", "discount": null, "application_fee": null, "subscription": "sub_6EX6PrsaaXIA5p", "tax_percent": null, "tax": null, "metadata": { }, "statement_descriptor": null, "description": null, "receipt_number": null } }, "object": "event", "pending_webhooks": 1, "request": "iar_6EX6SCgaMwzi8g", "api_version": "2015-04-07" }',true);

            //test customer.created
            //$this->WorkingData = json_decode('{ "id": "evt_16241uHVN63nCqTYGnvllEqk", "created": 1431539546, "livemode": true, "type": "customer.created", "data": { "object": { "object": "customer", "created": 1431539544, "id": "cus_6EX687yQ3S7eC0", "livemode": true, "description": null, "email": "jmct0425@gmail.com", "delinquent": false, "metadata": { }, "subscriptions": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/customers/cus_6EX687yQ3S7eC0/subscriptions", "data": [ { "id": "sub_6EX6PrsaaXIA5p", "plan": { "interval": "month", "name": "Basic Plan", "created": 1431433306, "amount": 100, "currency": "usd", "id": "test", "object": "plan", "livemode": true, "interval_count": 1, "trial_period_days": null, "metadata": { }, "statement_descriptor": "Sub Test" }, "object": "subscription", "start": 1431539544, "status": "active", "customer": "cus_6EX687yQ3S7eC0", "cancel_at_period_end": false, "current_period_start": 1431539544, "current_period_end": 1434217944, "ended_at": null, "trial_start": null, "trial_end": null, "canceled_at": null, "quantity": 1, "application_fee_percent": null, "discount": null, "tax_percent": null, "metadata": { } } ] }, "discount": null, "account_balance": 0, "currency": "usd", "sources": { "object": "list", "total_count": 1, "has_more": false, "url": "/v1/customers/cus_6EX687yQ3S7eC0/sources", "data": [ { "id": "card_16241qHVN63nCqTYdik5XfHW", "object": "card", "last4": "4343", "brand": "MasterCard", "funding": "debit", "exp_month": 10, "exp_year": 2016, "fingerprint": "wMaFTiiStV9bJnjF", "country": "US", "name": "Justin McTaggart", "address_line1": "7495 grand blanc rd", "address_line2": null, "address_city": "swartz creek", "address_state": "Michigan", "address_zip": "48473", "address_country": "US", "cvc_check": "pass", "address_line1_check": "pass", "address_zip_check": "pass", "dynamic_last4": null, "metadata": { }, "customer": "cus_6EX687yQ3S7eC0" } ] }, "default_source": "card_16241qHVN63nCqTYdik5XfHW" } }, "object": "event", "pending_webhooks": 1, "request": "iar_6EX6SCgaMwzi8g", "api_version": "2015-04-07" }',true);
        }
    }

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

    public function getSubscriberId(){
        echo "grabbing subscriber id...";
        if($this->getEventType()=="customer.created"){
            return $this->WorkingData['data']['object']['id'];
        }elseif($this->getEventType()=="invoice.payment_succeeded"){
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