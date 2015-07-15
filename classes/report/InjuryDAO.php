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

}