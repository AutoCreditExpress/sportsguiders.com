<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:07 PM
 */

class PowerRankings {

    protected $ID = '';
    protected $reportID = '';
    protected $playerID = '';
    protected $position = '';
    protected $points = '';
    protected $trend = '';

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
     * @return string
     */
    public function getPlayerID()
    {
        return $this->playerID;
    }

    /**
     * @param string $playerID
     */
    public function setPlayerID($playerID)
    {
        $this->playerID = $playerID;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param string $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return string
     */
    public function getTrend()
    {
        return $this->trend;
    }

    /**
     * @param string $trend
     */
    public function setTrend($trend)
    {
        $this->trend = $trend;
    }



}