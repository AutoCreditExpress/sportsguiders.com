<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$InjuryDAO = new InjuryDAO($db);
$ReportDAO = new ReportDAO($db);

$reportID = $ReportDAO->getPendingReportID();

if($_POST['player1']){
    $add = $InjuryDAO->addInjury($reportID,$_POST['player1'],$_POST['player1quarter'],$_POST['player1duration'],$_POST['player1note']);
}

if($_POST['player2']){
    $add = $InjuryDAO->addInjury($reportID,$_POST['player2'],$_POST['player2quarter'],$_POST['player2duration'],$_POST['player2note']);
}

if($_POST['player3']){
    $add = $InjuryDAO->addInjury($reportID,$_POST['player3'],$_POST['player3quarter'],$_POST['player3duration'],$_POST['player3note']);
}

if($_POST['player4']){
    $add = $InjuryDAO->addInjury($reportID,$_POST['player4'],$_POST['player4quarter'],$_POST['player4duration'],$_POST['player4note']);
}

if($_POST['player5']){
    $add = $InjuryDAO->addInjury($reportID,$_POST['player5'],$_POST['player5quarter'],$_POST['player5duration'],$_POST['player5note']);
}


header('Location: '.$webPath.'report/injury.php?waiver=success');