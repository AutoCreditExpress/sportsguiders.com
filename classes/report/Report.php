<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/19/15
 * Time: 10:33 PM
 */

class Report {
    protected $ID = '';
    protected $createDate = '0000-00-00 00:00:00';
    protected $status = 0;
    protected $easySchedule = array();
    protected $facts = array();
    protected $injuries = array();
    protected $topPerformers = array();
    protected $waiver = array();
    protected $trendingUp = array();
    protected $trendingDown = array();
    protected $playerPowerRanking = array();
    protected $teamPowerRanking = array();
    protected $standings = array();
    protected $scores = array();

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

    /**
     * @return array
     */
    public function getEasySchedule()
    {
        return $this->easySchedule;
    }

    /**
     * @param array $easySchedule
     */
    public function setEasySchedule($easySchedule)
    {
        $this->easySchedule = $easySchedule;
    }

    /**
     * @return array
     */
    public function getFacts()
    {
        return $this->facts;
    }

    /**
     * @param array $facts
     */
    public function setFacts($facts)
    {
        $this->facts = $facts;
    }

    /**
     * @return array
     */
    public function getInjuries()
    {
        return $this->injuries;
    }

    /**
     * @param array $injuries
     */
    public function setInjuries($injuries)
    {
        $this->injuries = $injuries;
    }

    /**
     * @return array
     */
    public function getTopPerformers()
    {
        return $this->topPerformers;
    }

    /**
     * @param array $topPerformers
     */
    public function setTopPerformers($topPerformers)
    {
        $this->topPerformers = $topPerformers;
    }

    /**
     * @return array
     */
    public function getWaiver()
    {
        return $this->waiver;
    }

    /**
     * @param array $waiver
     */
    public function setWaiver($waiver)
    {
        $this->waiver = $waiver;
    }

    /**
     * @return array
     */
    public function getTrendingUp()
    {
        return $this->trendingUp;
    }

    /**
     * @param array $trendingUp
     */
    public function setTrendingUp($trendingUp)
    {
        $this->trendingUp = $trendingUp;
    }

    /**
     * @return array
     */
    public function getTrendingDown()
    {
        return $this->trendingDown;
    }

    /**
     * @param array $trendingDown
     */
    public function setTrendingDown($trendingDown)
    {
        $this->trendingDown = $trendingDown;
    }



    /**
     * @return array
     */
    public function getPlayerPowerRanking()
    {
        return $this->playerPowerRanking;
    }

    /**
     * @param array $playerPowerRanking
     */
    public function setPlayerPowerRanking($playerPowerRanking)
    {
        $this->playerPowerRanking = $playerPowerRanking;
    }

    /**
     * @return array
     */
    public function getTeamPowerRanking()
    {
        return $this->teamPowerRanking;
    }

    /**
     * @param array $teamPowerRanking
     */
    public function setTeamPowerRanking($teamPowerRanking)
    {
        $this->teamPowerRanking = $teamPowerRanking;
    }

    /**
     * @return array
     */
    public function getStandings()
    {
        return $this->standings;
    }

    /**
     * @param array $standings
     */
    public function setStandings($standings)
    {
        $this->standings = $standings;
    }

    /**
     * @return array
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * @param array $standings
     */
    public function setScores($scores)
    {
        $this->scores = $scores;
    }


}