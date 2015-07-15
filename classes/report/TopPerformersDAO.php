<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 10:39 PM
 */

class TopPerformersDAO {

    protected $db = "";

    function __construct(pdo $db){
      $this->db = $db;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Find
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getTopPerformersForReport($reportID){
    $sql = "SELECT * FROM report_top_performers WHERE rtp_report_id = '".$reportID."'";

    $resutls = $this->fetchSql($sql);

    return $resutls;
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
            $results = $this->mapTPToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }



    function mapTPToObjects(PDOStatement $stmt){
        $topPerformers = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $tpArray = array();

            do{

                if(!in_array($aRow['rtp_id'],$tpArray)){
                    $tp = new TopPerformers();
                    $tp->setID($aRow['rtp_id']);
                    $tp->setReportID($aRow['rtp_report_id']);
                    $tp->setPositionID($aRow['rtp_position_id']);
                    $tp->setPlayerID($aRow['rtp_player_id']);
                    $topPerformers[] = $tp;
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

    }