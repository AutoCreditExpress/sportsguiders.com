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

            return TRUE;
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

    function getSubscriberIsActive($subscriberEmail){
        $qSubscriber = $this->db->prepare("SELECT isActive FROM subscriber WHERE email = '".$subscriberEmail."'");
        try{
            $qSubscriber->execute();
            $results = $qSubscriber->fetchAll();
            return $results[0];
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


    function updateUserSubscriberId($subscriberEmail,$subscriberID){

        $sql = "UPDATE users SET subscriber_id = '".$subscriberID."' WHERE email = ".$subscriberEmail."";
    }

    function updateSubscriber(array $subscriberArray){

        $sql = "UPDATE subscriber SET address = '".$subscriberArray['address']."',
        city = '".$subscriberArray['city']."', state='".$subscriberArray['state']."', zip='".$subscriberArray['zip']."', update_date=CURDATE()
        WHERE subscriber_id = ".$subscriberArray['subscriber_id']."";
    }

    function updateSubscriberIsActive($subscriberEmail){
        $qSubscriber = $this->db->prepare("UPDATE subscriber SET isActive='1', update_date=CURDATE() WHERE email = '".$subscriberEmail."'");
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

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //                                                  Mapping
    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}