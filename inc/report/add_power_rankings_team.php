 <?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');


$ReportDAO = new ReportDAO($db);

$reportID = $ReportDAO->getPendingReportID();

if($_POST['team1']){
    $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team1']);
}

 if($_POST['team2']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team2']);
 }

 if($_POST['team3']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team3']);
 }

 if($_POST['team4']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team4']);
 }

 if($_POST['team5']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team5']);
 }

 if($_POST['team6']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team6']);
 }

 if($_POST['team7']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team7']);
 }

 if($_POST['team8']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team8']);
 }

 if($_POST['team9']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team9']);
 }

 if($_POST['team10']){
     $addPR = $PowerRankingsDAO->addPowerRankingTeam($reportID,$_POST['team10']);
 }

 header('Location: '.$webPath.'report/nflscores.php?team=success');


