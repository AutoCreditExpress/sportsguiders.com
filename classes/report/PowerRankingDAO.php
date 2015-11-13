<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class PowerRankingDAO {

    protected $db = '';

    function __construct(PDO $pdo){

        $this->db = $pdo;
    }

 function addPowerRanking($reportID,$playerID,$position,$points,$trend){
     $add = $this->db->prepare("
        INSERT INTO report_power_rankings (rpr_report_id,rpr_player_id,rpr_position_id,rpr_points,rpr_trend)
        VALUES (:reportID,:playerID,:positionID,:points,:trend)");

     try{

         $add->execute(array(
             ':reportID' => $reportID,
             ':playerID' => $playerID,
             ':positionID' => $position,
             ':points'  => $points,
             ':trend'   => $trend
         ));
     }catch(PDOException $e){
         echo $e;
         return FALSE;
     }
 }

    function addPowerRankingTeam($reportID,$teamID){
        $add = $this->db->prepare("
        INSERT INTO report_power_ranking_team (rprt_report_id,rprt_team_id)
        VALUES (:reportID,:teamID)");

        try{

            $add->execute(array(
                ':reportID' => $reportID,
                ':teamID' => $teamID
            ));
        }catch(PDOException $e){
            echo $e;
            return FALSE;
        }
    }

    function mapPowerRankingToObjects(PDOStatement $stmt){

        $pr = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $prArray = array();

            do{
                if(!in_array($aRow['rpr_id'],$prArray)){
                    $pr = new PowerRankings();
                    $pr->setID($aRow['rpr_id']);
                    $pr->setReportID($aRow['rpr_id']);
                    $pr->setPosition($aRow['rpr_position_id']);
                    $pr->setPoints($aRow['rpr_points']);
                    $pr->settrend($aRow['rpr_trend']);

                    $prs[] = $pr;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($prs);

        if($count == 1){
            return $prs[0];
        }
        else{
            return $prs ;
        }

    }


}