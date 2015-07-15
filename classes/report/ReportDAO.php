<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 10:39 PM
 */

class ReportDAO {

    protected $db = "";

    function __construct(pdo $db){
      $this->db = $db;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Find
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function createNewReport(){
        $new = $this->db->prepare("INSERT INTO report (report_create_date,report_status) VALUES (:reportDate,:reportStatus)");

        try{
            $new->execute(array(
                ':reportDate' => date('Y-m-d H:i:s'),
                ':reportStatus' => 0
            ));

            return $this->db->lastInsertId();
        }catch(PDOException $e){
            return FALSE;
        }

    }

    function getPendingReportID(){
        $pendingReport = $this->db->prepare("SELECT report_id from report where report_status = '0' order by report_create_date desc");

        try{
            $pendingReport->execute();
            $results = $pendingReport->fetchColumn();

            return $results;
        }catch(PDOException $e){
            //echo $e;
            return FALSE;
        }
    }

    function getLatestReport(){

        $getReport = $this->db->prepare("SELECT report_id from report order by report_create_date desc");

        $getReport->execute();
        $reportResult = $getReport->fetch();
        $reportID = $reportResult['report_id'];

        $Waivers = $this->getReportWaivers($reportID);
        $TrendingUp = $this->getRepotTrending($reportID, 'up');
        $TrendingDown = $this->getRepotTrending($reportID, 'down');

        $Report = new Report();
        $Report->setWaiver($Waivers);
        $Report->setTrendingUp($TrendingUp);
        $Report->setTrendingDown($TrendingDown);
        //var_dump($Waivers);

        return $Report;
    }

    function getReportWaivers($reportID){
        $sql = "Select * from report_waiver where rw_report_id = '".$reportID."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapWaiverToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function getReportFacts($reportID){
        $sql = "Select * from report_facts where rf_report_id = '".$reportID."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapFactsToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function getReportTopPerformers($reportID){
        $sql = "Select * from report_top_performers where rtp_report_id = '".$reportID."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapTopPerformersToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function getReportTopInjuries($reportID){
        $sql = "Select * from report_injuries where ri_report_id = '".$reportID."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapInjuriesToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function getRepotTrending($reportID,$type){
        $sql = "Select * from report_trending where rt_report_id = '".$reportID."' and tr_type = '".$type."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapTrendingToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function getRepotEasySchedule($reportID){
        $sql = "Select * from report_easy_schedule where res_report_id = '".$reportID."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapEasyScheduleToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Create
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Update
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Delete
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Mapping
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function fetchSql($sql){

        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapCharacterToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function mapFactsToObjects(PDOStatement $stmt){
        $facts = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $factsArray = array();

            do{

                if(!in_array($aRow['rf_id'],$factsArray)){
                    $fact = new Facts();
                    $fact->setID($aRow['rf_id']);
                    $fact->setFact($aRow['rf_value']);
                    $fact->setType($aRow['rf_type']);
                    $facts[] = $fact;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($facts);

        if($count == 1){
            return $facts[0];
        }
        else{
            return $facts ;
        }
    }

    function mapInjuriesToObjects(PDOStatement $stmt){
        $injuries = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $injuriesArray = array();

            do{

                if(!in_array($aRow['ri_id'],$injuriesArray)){
                    $injury = new Injuries();
                    $injury->setID($aRow['ri_id']);
                    $injury->setReportID($aRow['ri_report_id']);
                    $injury->setPlayerID($aRow['ri_player_id']);
                    $injury->setDuration($aRow['ri_duration']);
                    $injury->setDescription($aRow['ri_description']);
                    $injuries[] = $injury;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($injuries);

        if($count == 1){
            return $injuries[0];
        }
        else{
            return $injuries ;
        }
    }

    function mapTopPerformersToObjects(PDOStatement $stmt){
        $topPerformers = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $topPerformersArray = array();

            do{

                if(!in_array($aRow['rtp_id'],$topPerformersArray)){
                    $topPerformer = new TopPerformers();
                    $topPerformer->setID($aRow['rtp_id']);
                    $topPerformer->setReportID($aRow['rtp_report_id']);
                    $topPerformer->setPositionID($aRow['rtp_position_id']);
                    $topPerformer->setPlayerID($aRow['rtp_player_id']);
                    $topPerformers[] = $topPerformer;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($topPerformers);

        if($count == 1){
            return $topPerformers[0];
        }
        else{
            return $topPerformers ;
        }
    }

    function mapWaiverToObjects(PDOStatement $stmt){
        $waivers = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $waiverArray = array();

            do{

                if(!in_array($aRow['rw_id'],$waiverArray)){
                    $waiver = new Waiver();
                    $waiver->setID($aRow['rw_id']);
                    $waiver->setReportID($aRow['rw_report_id']);
                    $waiver->setType($aRow['rw_type']);
                    $waiver->setValue($aRow['rw_value']);
                    $waiver->setPlayerID($aRow['rw_player_id']);
                    $waivers[] = $waiver;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($waivers);

        if($count == 1){
            return $waivers[0];
        }
        else{
            return $waivers ;
        }
    }

    function mapTrendingToObjects(PDOStatement $stmt){
        $trendingPlayers = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $trendingArray = array();

            do{
                if(!in_array($aRow['rt_id'],$trendingArray)){
                    $trending = new Trending();
                    $trending->setID($aRow['rt_id']);
                    $trending->setReportID($aRow['rt_report_id']);
                    $trending->setType($aRow['rt_type']);
                    $trending->setPlayerID($aRow['rt_player_id']);
                    $trending->setPositionID($aRow['rt_player_id']);
                    $trending->setPoints($aRow['rt_points']);
                    $trending->setAverage($aRow['rt_average_points  ']);
                    $trendingPlayers[] = $trending;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($trendingPlayers);

        if($count == 1){
            return $trendingPlayers[0];
        }
        else{
            return $trendingPlayers ;
        }
    }

    function mapEasyScheduleToObjects(PDOStatement $stmt){

        $easySche = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $easyScheArray = array();

            do{
                if(!in_array($aRow['rt_id'],$easyScheArray)){
                    $sch = new EasySchedule();
                    $sch->setID($aRow['rt_id']);
                    $sch->setReportID($aRow['rt_report_id']);
                    $sch->setHomeTeamID($aRow['res_home_team_id']);
                    $sch->setAwayTeamID($aRow['res_away_team_id']);
                    $easySche[] = $sch;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($easySche);

        if($count == 1){
            return $easySche[0];
        }
        else{
            return $easySche ;
        }

    }

    function mapReportToObjects(PDOStatement $stmt){

    }

}