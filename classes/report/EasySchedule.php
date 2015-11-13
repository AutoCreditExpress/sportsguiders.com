<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 11:02 PM
 */

class EasySchedule {

    protected $ID = 0;
    protected $reportID = 0;
    protected $homeTeamID = 0;
    protected $awayTeamID = 0;
    protected $awayTeamScore = 0;
    protected $homeTeamScore = 0;

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
    public function getHomeTeamID()
    {
        return $this->teamID;
    }

    /**
     * @param int $teamID
     */
    public function setHomeTeamID($teamID)
    {
        $this->teamID = $teamID;
    }

    /**
     * @return int
     */
    public function getAwayTeamID()
    {
        return $this->awayTeamID;
    }

    /**
     * @param int $awayTeamID
     */
    public function setAwayTeamID($awayTeamID)
    {
        $this->awayTeamID = $awayTeamID;
    }

    /**
     * @return int
     */
    public function getAwayTeamScore()
    {
        return $this->awayTeamScore;
    }

    /**
     * @param int $awayTeamScore
     */
    public function setAwayTeamScore($awayTeamScore)
    {
        $this->awayTeamScore = $awayTeamScore;
    }

    /**
     * @return int
     */
    public function getHomeTeamScore()
    {
        return $this->homeTeamScore;
    }

    /**
     * @param int $homeTeamScore
     */
    public function setHomeTeamScore($homeTeamScore)
    {
        $this->homeTeamScore = $homeTeamScore;
    }





}