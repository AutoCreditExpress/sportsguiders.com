<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 6/1/15
 * Time: 5:10 PM
 */

class WaiverDAO
{

    protected $db = '';

    function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    function addWaiver($reportID,$playerID,$note){

        $addWaiver = $this->db->prepare("INSERT INTO report_waiver (rw_report_id,rw_player_id,rw_type,rw_value) VALUES (:reportID,:playerID,:waiverType,:note)");

        try{

            $addWaiver->execute(array(
                ':reportID' => $reportID,
                ':playerID' => $playerID,
                ':waiverType' => 'add',
                ':note' => $note
            ));

            return TRUE;

        }catch(PDOException $e){
            return FALSE;
        }

    }

}