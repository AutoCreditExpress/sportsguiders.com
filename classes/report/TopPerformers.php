<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/26/15
 * Time: 10:07 PM
 */

class TopPerformers {

    protected $ID = 0;
    protected $reportID = 0;
    protected $playerID = 0;
    protected $positionID = 0;

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



}