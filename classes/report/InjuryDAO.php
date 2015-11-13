<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class InjuryDAO
{

    protected $db = '';

    function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    function addInjury($reportID,$playerID,$quarter, $duration,$description){

        $addInjury = $this->db->prepare("INSERT INTO report_injuries (ri_report_id,ri_player_id, ri_quarter, ri_duration, ri_description) VALUES (:reportID,:playerID,:quarter,:duration,:description)");

        try{

            $addInjury->execute(array(
                ':reportID' => $reportID,
                ':playerID' => $playerID,
                ':quarter'  => $quarter,
                ':duration' => $duration,
                ':description' => $description
            ));

            return TRUE;

        }catch(PDOException $e){
            echo $e;
            return FALSE;
        }

    }

    function getInjuryForReport($reportID){
        $sql = "select * from report_injuries where ri_report_id = '".$reportID."'";

        $results = $this->fetchSql($sql);

        return $results;


    }

    function fetchSql($sql){

        $query = $this->db->prepare($sql);
        $query->execute();
        try{
            $results = $this->mapInjuryToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    function mapInjuryToObjects(PDOStatement $stmt){

        $injuries = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $injuryArray = array();

            do{
                if(!in_array($aRow['ri_id'],$injuryArray)){
                    $injury = new Injuries();
                    $injury->setID($aRow['ri_id']);
                    $injury->setReportID($aRow['ri_report_id']);
                    $injury->setPlayerID($aRow['ri_player_id']);
                    $injury->setQuarter($aRow['ri_quarter']);
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