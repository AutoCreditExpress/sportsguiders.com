<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$PowerRankingsDAO = new PowerRankingDAO($db);
$ReportDAO = new ReportDAO($db);

$reportID = $ReportDAO->getPendingReportID();

if($_POST['player1']){
    $addPR = $PowerRankingsDAO->addPowerRanking($reportID,$_POST['player1'],$_POST['position'],$_POST['player1points'],$_POST['player1trend']);
}

if($_POST['player2']){
    $addPR = $PowerRankingsDAO->addPowerRanking($reportID,$_POST['player2'],$_POST['position'],$_POST['player2points'],$_POST['player2trend']);
}

if($_POST['player3']){
    $addPR = $PowerRankingsDAO->addPowerRanking($reportID,$_POST['player3'],$_POST['position'],$_POST['player3points'],$_POST['player3trend']);
}


if($_POST['position'] == 16){
    header('Location: '.$webPath.'report/power_ranking_player_wr?qb=success');
}

if($_POST['position'] == 1){
    header('Location: '.$webPath.'report/power_ranking_player_rb?wr=success');
}

if($_POST['position'] == 2){
    header('Location: '.$webPath.'report/power_ranking_player_te?rb=success');
}

if($_POST['position'] == 7){
    header('Location: '.$webPath.'report/power_ranking_player_k?te=success');
}

if($_POST['position'] == 20){
    header('Location: '.$webPath.'report/power_ranking_player_dst?k=success');
}

if($_POST['position'] == 29){
    header('Location: '.$webPath.'report/trendingupward.php?dst=success');
}
