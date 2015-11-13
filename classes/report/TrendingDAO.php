<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 10:39 PM
 */

class TrendingDAO {

    protected $db = "";

    function __construct(pdo $db){
      $this->db = $db;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Find
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Create
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createTrending($reportID,$playerID,$position,$points,$average,$type){

    $add = $this->db->prepare("
        INSERT INTO report_trending (rt_report_id,rt_player_id,rt_position_id,rt_points,rt_average_points,rt_type)
        VALUES (:reportID,:playerID,:positionID,:points,:average,:trendType)
        ");

    try{
        $add->execute(array(
            ':reportID' => $reportID,
            ':playerID' => $playerID,
            ':positionID'   => $position,
            ':points' => $points,
            ':average'  => $average,
            ':trendType'    => $type
        ));

        return TRUE;
    }catch(PDOException $e){
        return FALSE;
    }
}

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

    }