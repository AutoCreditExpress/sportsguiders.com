<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:08 PM
 */

class Team {

    protected $ID = '';
    protected $fullName = '';
    protected $conference = '';
    protected $shortName = '';
    protected $color1 = '';
    protected $color2 = '';

    /**
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param string $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getConference()
    {
        return $this->conference;
    }

    /**
     * @param string $conf  erence
     */
    public function setConference($conference)
    {
        $this->conference = $conference;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getColor1()
    {
        return $this->color1;
    }

    /**
     * @param string $color1
     */
    public function setColor1($color1)
    {
        $this->color1 = $color1;
    }

    /**
     * @return string
     */
    public function getColor2()
    {
        return $this->color2;
    }

    /**
     * @param string $color2
     */
    public function setColor2($color2)
    {
        $this->color2 = $color2;
    }




}