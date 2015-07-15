<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class EasyScheduleDAO {

    protected $db = '';

    function __construct(PDO $pdo){

        $this->db = $pdo;
    }

    function createEasySchedule($reportID,$awayTeam,$homeTeam){
        $sql = $this->db->prepare("INSERT INTO report_easy_schedule (res_report_id,res_away_team_id,res_home_team_id) VALUES (:reportID,:awayTeam,:homeTeam)");

        try{
            $sql->execute(array(
                ':reportID' => $reportID,
                ':awayTeam' => $awayTeam,
                ':homeTeam' => $homeTeam
            ));

            return TRUE;
        }catch(PDOException $e){
            return FALSE;
        }
    }

    function mapPlayerToObjects(PDOStatement $stmt){

        $players = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $playersArray = array();

            do{
                if(!in_array($aRow['player_id'],$playersArray)){
                    $player = new Player();
                    $player->setID($aRow['player_id']);
                    $player->setPosition($aRow['player_position']);
                    $player->setTeam($aRow['player_team']);
                    $player->setName($aRow['player_name']);
                    $players[] = $player;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($players);

        if($count == 1){
            return $players[0];
        }
        else{
            return $players ;
        }

    }


}