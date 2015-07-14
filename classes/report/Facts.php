<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 11:04 PM
 */

class Facts {

    protected $ID = 0;
    protected $reportID = 0;
    protected $fact = '';
    protected $type = '';

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
     * @return string
     */
    public function getFact()
    {
        return $this->fact;
    }

    /**
     * @param string $fact
     */
    public function setFact($fact)
    {
        $this->fact = $fact;
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