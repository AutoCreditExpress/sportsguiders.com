<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:11 PM
 */

class Waiver {

    protected $ID = 0;
    protected $reportID = 0;
    protected $playerID = 0;
    protected $type = '';
    protected $value = '';

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
     * @return int
     */
    public function getReportID()
    {
        return $this->reportID;
    }

    /**
     * @param int $reportID
     */
    public function setReportID($reportID)
    {
        $this->reportID = $reportID;
    }

    /**
     * @return int
     */
    public function getPlayerID()
    {
        return $this->playerID;
    }

    /**
     * @param int $playerID
     */
    public function setPlayerID($playerID)
    {
        $this->playerID = $playerID;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }



}