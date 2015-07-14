<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:03 PM
 */

class Injuries {

    protected $ID = 0;
    protected $reportID = 0;
    protected $playerID = 0;
    protected $quarter = 'NA';
    protected $duration = 'NA';
    protected $description = '';

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
    public function getQuarter()
    {
        return $this->quarter;
    }

    /**
     * @param string $quarter
     */
    public function setQuarter($quarter)
    {
        $this->quarter = $quarter;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}