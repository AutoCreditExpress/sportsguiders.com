<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:13 PM
 */

class Subscriber {

    protected $ID = 0;
    protected $email = '';
    protected $subscriberID = '';
    protected $subscriptionID = '';
    protected $cardID = '';
    protected $address = '';
    protected $city = '';
    protected $state = '';
    protected $zip ='';
    protected $phone1 = '';
    protected $phone2 = '';
    protected $companyID = 0;
    protected $createUser = '';
    protected $createDate = '00-00-00 00:00:00';
    protected $updateUser = '';
    protected $updateDate = '00-00-00 00:00:00';
    protected $status = 0;

    /**
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSubscriberID()
    {
        return $this->subscriberID;
    }

    /**
     * @param string $subscriberID
     */
    public function setSubscriberID($subscriberID)
    {
        $this->subscriberID = $subscriberID;
    }

    /**
     * @return string
     */
    public function getSubscriptionID()
    {
        return $this->subscriptionID;
    }

    /**
     * @param string $subscriptionID
     */
    public function setSubscriptionID($subscriptionID)
    {
        $this->subscriptionID = $subscriptionID;
    }

    /**
     * @return string
     */
    public function getCardID()
    {
        return $this->cardID;
    }

    /**
     * @param string $cardID
     */
    public function setCardID($cardID)
    {
        $this->cardID = $cardID;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * @param string $phone1
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    }

    /**
     * @return int
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * @param int $companyID
     */
    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
    }

    /**
     * @return string
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }

    /**
     * @param string $createUser
     */
    public function setCreateUser($createUser)
    {
        $this->createUser = $createUser;
    }

    /**
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string
     */
    public function getUpdateUser()
    {
        return $this->updateUser;
    }

    /**
     * @param string $updateUser
     */
    public function setUpdateUser($updateUser)
    {
        $this->updateUser = $updateUser;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param string $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}