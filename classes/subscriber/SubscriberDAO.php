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

    function getUserById($id){

        $qSubscriber = $this->db->prepare("SELECT * FROM users WHERE user_id = '".$id."'");
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

    function getRoleId($email){
    $q = $this->db->prepare("SELECT * FROM users WHERE user_email = '".$email."'");
    try{
        $q->execute();
        $results = $q->fetchAll();
        if($results[0]['role_id']==1){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        //TODO: add logging
        return FALSE;
    }
}

    function getPlanUsingCoupon($coupon, $getDesc = null){
        $q = $this->db->prepare("SELECT * FROM coupon WHERE BINARY code='".$coupon."'");
        try{
            $q->execute();
            $results = $q->fetchAll();
            if($results[0]['plan_name']!=null and $getDesc!=true) {
                return $results[0]['plan_name'];
            }elseif($getDesc){
                //if getDesc = true then the method is being called from the check-coupon module
                //and it is asking for the external description of the internal coupon
                return $results[0]['ex_desc'];
            }else{
                return '';
            }
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function validateUserToMakePayment($userEmail, $subID){
        $q = $this->db->prepare("SELECT * FROM subscriber WHERE email='".$userEmail."' and subscriber_id='".$subID."'");
        try{
            $q->execute();
            $results = $q->fetchAll();
            if($results[0]!=null) {
                return $results[0];
            }
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function getUserIsActiveByEmail($email){
        $q = $this->db->prepare("SELECT * FROM users WHERE user_email = '".$email."'");
        try{
            $q->execute();
            $results = $q->fetchAll();
            if($results[0]['user_active']==1){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function getNumberOfActiveSubscribers($noFormat=null){
        $q = $this->db->prepare("SELECT COUNT(isActive) as Total FROM subscriber WHERE isActive='1' AND subscription_id!='' and create_date LIKE '2015%'");
        try{
            $q->execute();
            $results = $q->fetchAll();
            $baseNumber = 3000;
            if($noFormat) {
                $totalSubsLeft = ($baseNumber - $results[0]['Total']);
                return $totalSubsLeft;
            }elseif($results[0]['Total']!=null){
                $totalSubs = ($baseNumber - $results[0]['Total']);
                $formattedNum = number_format($totalSubs);
                return $formattedNum;
            }else{
                return $baseNumber;
            }
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
    function updateSubscriberBillingInfo(array $subscriberArray){
        $qCreateSubscriber = $this->db->prepare("UPDATE subscriber SET address='".$subscriberArray['address']."',city='".$subscriberArray['city']."',state='".$subscriberArray['state']."',zip='".$subscriberArray['zip']."',update_date='".$subscriberArray['update_date']."' WHERE email='".$_SESSION['user_email']."'");

        try{
            $qCreateSubscriber->execute();
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberId($table,$subscriberEmail,$subscriberID){
        if($table=='users'){
            $sql = $this->db->prepare("UPDATE users SET subscriber_id='".$subscriberID."' WHERE user_email = '".$subscriberEmail."'");
        }else{
            $sql = $this->db->prepare("UPDATE subscriber SET subscriber_id='".$subscriberID."', update_date=CURDATE() WHERE email = '".$subscriberEmail."'");
        }
        try{
            $sql->execute();
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateSubscriberCardId($subscriberEmail,$cardID){

        $qUpdateSubscriber = $this->db->prepare("UPDATE subscriber SET card_id = '".$cardID."' WHERE email = '".$subscriberEmail."'");
        try{

            $qUpdateSubscriber->execute();

            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
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

    function updateSubscriberIsActiveUsersTable($subscriberEmail, $value){
        $qSubscriber = $this->db->prepare("UPDATE users SET user_active='".$value."' WHERE user_email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            return TRUE;
        }catch(PDOException $e){
            //TODO: add logging
            return FALSE;
        }
    }

    function updateUserActiveUsingIdHash($id, $hash){

        $qSubscriber = $this->db->prepare("UPDATE users SET user_active='1' WHERE user_id = '".$id."' and user_activation_hash='".$hash."'");
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

    function updateNewletterTable($email){
        $qSubscriber = $this->db->prepare("INSERT INTO newsletter (id, email, create_date) VALUES ('','".$email."','".date("Y-m-d h:i:s")."')");
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