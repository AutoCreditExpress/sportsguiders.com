<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class ScoreDAO {

    protected $db = '';

    function __construct(PDO $pdo){

        $this->db = $pdo;
    }

    function addScores($reportID,$homeID,$homeScore,$awayID,$awayScore){

        $sql = $this->db->prepare("INSERT Into score (score_report_id,score_home_team_id,score_home,score_away_team_id,score_away) VALUES (:reportID,:home,:homeScore,:away,:awayScore)");

        try{
            $sql->execute(array(
                ':reportID' => $reportID,
                ':home' => $homeID,
                ':homeScore' => $homeScore,
                ':away' => $awayID,
                ':awayScore'    => $awayScore
            ));

            return TRUE;
        }catch(PDOException $e){
            return FALSE;
        }

    }
    function checkScore1ForWinner($score1,$score2){
        try{
            if($score1>$score2){
             $results = 'win';
            }else{
             $results = 'loss';
            }
            return $results;

        }
        catch(PDOException $e){
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