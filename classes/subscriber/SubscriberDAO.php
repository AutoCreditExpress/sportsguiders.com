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
    function fetchSql($sql){

        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapEntertainerToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    public function mapEntertainerToObjects(PDOStatement $stmt){
        $entertainers = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $entertainerArray = array();

            do{

                if(!in_array($aRow['id'],$entertainerArray)){
                    $entertainer = new Entertainer();
                    $entertainer->setID($aRow['entertainer_id']);
                    $entertainerArray[] = $aRow['entertainer_id'];
                    $entertainer->setCompanyID($aRow['company_id']);
                    $entertainer->setFirstName($aRow['first_name']);
                    $entertainer->setLastName($aRow['last_name']);
                    $entertainer->setPhone1($aRow['phone1']);
                    $entertainer->setPhone2($aRow['phone2']);
                    $entertainer->setEmail($aRow['email']);
                    $entertainer->setAddress($aRow['address']);
                    $entertainer->setCity($aRow['city']);
                    $entertainer->setState($aRow['state']);
                    $entertainer->setZip($aRow['zip']);
                    $entertainer->setEmergencyContactName($aRow['emergency_contact_name']);
                    $entertainer->setEmergencyContactPhone($aRow['emergency_contact_phone']);
                    $entertainer->setEmergencyContactRelationship($aRow['emergency_contact_relationship']);
                    $entertainer->setVehicleMake($aRow['vehicle_make']);
                    $entertainer->setVehicleYear($aRow['vehicle_year']);
                    $entertainer->setVehicleModel($aRow['vehicle_model']);
                    $entertainer->setVehicleLicense($aRow['vehicle_license']);
                    $entertainer->setHeight($aRow['height']);
                    $entertainer->setWaist($aRow['waist']);
                    $entertainer->setDressSize($aRow['dress_size']);
                    $entertainer->setHeadShot($aRow['head_shot']);
                    $entertainer->setGender($aRow['gender']);
                    $entertainer->setDob($aRow['dob']);
                    $entertainer->setCreateUser($aRow['create_user']);
                    $entertainer->setCreateDate($aRow['create_date']);
                    $entertainer->setUpdateUser($aRow['update_user']);
                    $entertainer->setUpdateDate($aRow['update_date']);
                    $entertainer->setStatus($aRow['status']);
                    $entertainers[] = $entertainer;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($entertainers);

        if($count == 1){
            return $entertainers[0];
        }
        else{
            return $entertainers;
        }

    }

}