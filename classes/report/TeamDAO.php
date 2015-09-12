<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 5/25/15
 * Time: 10:39 PM
 */

class TeamDAO {

    protected $db = "";

    function __construct(pdo $db){
      $this->db = $db;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                  Find
//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getAllTeams(){
    $sql = "SELECT * from team";

    $results = $this->fetchSql($sql);

    return $results;
}
    function getTeamColor1ByTeamShortName($teamName){
        $sql = "SELECT team_hex_color1 FROM team WHERE team_short_name='".$teamName."'";
        $pendingReport = $this->db->prepare($sql);

        try{
            $pendingReport->execute();
            $results = $pendingReport->fetchAll();

            return $results[0]['team_hex_color1'];
        }catch(PDOException $e){
            //echo $e;
            return FALSE;
        }
    }

    function getTeamFromID($teamID){
        $sql = "SELECT * FROM team WHERE team_id='".$teamID."'";
        $pendingReport = $this->db->prepare($sql);

        try{
            $pendingReport->execute();
            $results = $pendingReport->fetchAll();

            return $results[0];
        }catch(PDOException $e){
            //echo $e;
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
            $results = $this->mapTeamToObjects($query);

            return $results;

        }
        catch(PDOException $e){
            return FALSE;
        }
    }



    function mapTeamToObjects(PDOStatement $stmt){
        $teams = array();
        try{

            if( ($aRow = $stmt->fetch()) === false) {
                return array();
            }

            $teamsArray = array();

            do{

                if(!in_array($aRow['team_id'],$teamsArray)){
                    $team = new Team();
                    $team->setID($aRow['team_id']);
                    $team->setFullName($aRow['team_full_name']);
                    $team->setConference($aRow['team_conference']);
                    $team->setShortName($aRow['team_short_name']);
                    $team->setColor1($aRow['team_hex_color1']);
                    $team->setColor2($aRow['team_hex_color2']);
                    $teams[] = $team;
                }

            } while(($aRow = $stmt->fetch()) !== false);

        } catch(\Exception $e){
            return false;
        }

        $count = count($teams);

        if($count == 1){
            return $teams[0];
        }
        else{
            return $teams ;
        }
    }

    }