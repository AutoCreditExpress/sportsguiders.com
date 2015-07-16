<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$WaiverDAO = new WaiverDAO($db);
$ReportDAO = new ReportDAO($db);

$reportID = $ReportDAO->getPendingReportID();

//add each waiver

if($_POST['player1']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player1'],$_POST['player1note']);
}

if($_POST['player2']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player2'],$_POST['player2note']);
}

if($_POST['player3']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player3'],$_POST['player3note']);
}

if($_POST['player4']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player4'],$_POST['player4note']);
}

if($_POST['player5']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player5'],$_POST['player5note']);
}

if($_POST['player6']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player6'],$_POST['player6note']);
}

if($_POST['player7']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player7'],$_POST['player7note']);
}

if($_POST['player8']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player8'],$_POST['player8note']);
}

if($_POST['player9']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player9'],$_POST['player9note']);
}

if($_POST['player10']){
    $add = $WaiverDAO->addWaiver($reportID,$_POST['player10'],$_POST['player10note']);
}

header('Location: '.$webPath.'report/injury.php?waiver=success');