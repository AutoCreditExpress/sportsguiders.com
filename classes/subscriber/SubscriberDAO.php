<?php
/*
CALL ME

$SubscriberDAO = new SubscriberDAO($db);
$SubscriberInfo = $SubscriberDAO->getSubscriberInfo();
*/


/**
 * Created by PhpStorm.
 * User: jmct0425
 * Date: 5/12/15
 * Time: 12:16 PM
 */

class SubscriberDAO{

    protected $db = '';

    function __construct($pdo){
       $this->db = $pdo;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Find
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @param $customberID
     * @return array|bool
     */
    function getSubscriberByID($subscriberID){

        $qSubscriber = $this->db->prepare("SELECT * FROM subscriber WHERE subscriber_id = '".$subscriberID."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }


    function getSubscriberByEmail($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT * FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function checkSubscriberIsActive($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT isActive FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();

            if($results[0]['isActive']=="1"){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function getSubscriberIdByEmail($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT subscriber_id FROM users WHERE user_email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0]['subscriber_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function getSubscriptionIdByEmail($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT subscription_id FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0]['subscription_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    function getSubscriberCardIdByEmail($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT card_id FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0]['card_id'];
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    /**
     * @param $subscriberID
     * @return Stripe subscription Id - String
     */
    function getSubscriptionId($subscriberID){
        try{
            $customer = Stripe_Customer::retrieve($subscriberID);
            return $customer['subscriptions']['data'];
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

    function createSubscriber(array $subscriberArray){
        $qCreateSubscriber = $this->db->prepare("
            INSERT INTO subscriber (email,address,city,state,zip,create_date)
            VALUES('".strtolower($subscriberArray['email'])."','".$subscriberArray['address']."','".$subscriberArray['city']."','".$subscriberArray['state']."','".$subscriberArray['zip']."','".$subscriberArray['create_date']."')
        ");

       try{
            $qCreateSubscriber->execute();
            return TRUE;
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

    //TODO: finish this method
    function updateUserSubscriberId($subscriberEmail,$subscriberID){

        $sql = "UPDATE users SET subscriber_id = '".$subscriberID."' WHERE email = ".$subscriberEmail."";
    }

    //TODO: finish this method
    function updateSubscriber(array $subscriberArray){

        $sql = "UPDATE subscriber SET address = '".$subscriberArray['address']."',
        city = '".$subscriberArray['city']."', state='".$subscriberArray['state']."', zip='".$subscriberArray['zip']."', update_date=CURDATE()
        WHERE subscriber_id = ".$subscriberArray['subscriber_id']."";
    }

    function updateSubscriberIsActive($subscriberEmail, $value){
        $qSubscriber = $this->db->prepare("UPDATE subscriber SET isActive='".$value."', update_date=CURDATE() WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberSubscriptionId($subscriberEmail, $value){
        $qSubscriber = $this->db->prepare("UPDATE subscriber SET subscription_id='".$value."', update_date=CURDATE() WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Delete
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    //TODO: add delete method

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Mapping
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}