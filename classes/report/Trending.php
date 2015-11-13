<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:09 PM
 */

class Trending {

    protected $ID = 0;
    protected $playerID = 0;
    protected $positionID = 0;
    protected $points = 0;
    protected $average = 0;
    protected $type = '';
    protected $reportID = '';

    /**
     * @return string
     */
    public function getReportID()
    {
        return $this->reportID;
    }

    /**
     * @param string $reportID
     */
    public function setReportID($reportID)
    {
        $this->reportID = $reportID;
    }


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
     * @return int
     */
    public function getPositionID()
    {
        return $this->positionID;
    }

    /**
     * @param int $positionID
     */
    public function setPositionID($positionID)
    {
        $this->positionID = $positionID;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return int
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @param int $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
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




}