<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class PlayerDAO {

    protected $db = '';

    function __construct(PDO $pdo){

        $this->db = $pdo;
    }

    function getAllPlayers(){
        $sql = "SELECT * FROM player;";

        $player = $this->db->prepare($sql);
        try{
            $player->execute();

            $results = $this->mapPlayerToObjects($player);

            return $results;


        }catch(PDOException $e){
            return false;
        }
    }

    function getPlayerFromID($playerID){
        $sql = "select * from player where player_id = '".$playerID."'";

        $player = $this->db->prepare($sql);
        try{
            $player->execute();

            $results = $this->mapPlayerToObjects($player);

            return $results;


        }catch(PDOException $e){
            return false;
        }
    }

    function getPositionIDFromPositionShortName($position){
        $sql = $this->db->prepare("SELECT position_id from position where position_short_name = '".$position."'");

        try{

            $sql->execute();
            $result = $sql->fetchColumn();

            return $result;

        }catch(PDOException $e){
            return FALSE;
        }
    }

    function addTopPerformersToReport($players, $position, $reportID){

        foreach($players as $player) {

            $tp = $this->db->prepare("INSERT into report_top_performers (rtp_report_id, rtp_position_id, rtp_player_id) VALUES (:reportID, :positionID, :playerID)");

            try {
                $tp->execute(array(
                    ':reportID' => $reportID,
                    ':positionID' => $position,
                    ':playerID' => $player
                ));

                return TRUE;

            } catch (PDOException $e) {

                return FALSE;
            }
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
                    $player->setNumber($aRow['player_number']);
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