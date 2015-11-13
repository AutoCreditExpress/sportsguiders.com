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

$ScoreDAO = new ScoreDAO($db);

if($_POST['1home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['1home'],$_POST['1homescore'],$_POST['1away'],$_POST['1awayscore']);
}

if($_POST['2home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['2home'],$_POST['2homescore'],$_POST['2away'],$_POST['2awayscore']);
}

if($_POST['3home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['3home'],$_POST['3homescore'],$_POST['3away'],$_POST['3awayscore']);
}

if($_POST['4home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['4home'],$_POST['4homescore'],$_POST['4away'],$_POST['4awayscore']);
}

if($_POST['5home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['5home'],$_POST['5homescore'],$_POST['5away'],$_POST['5awayscore']);
}

if($_POST['6home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['6home'],$_POST['6homescore'],$_POST['6away'],$_POST['6awayscore']);
}

if($_POST['7home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['7home'],$_POST['7homescore'],$_POST['7away'],$_POST['7awayscore']);
}

if($_POST['8home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['8home'],$_POST['8homescore'],$_POST['8away'],$_POST['8awayscore']);
}

if($_POST['9home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['9home'],$_POST['9homescore'],$_POST['9away'],$_POST['9awayscore']);
}

if($_POST['10home']){
    $add = $ScoreDAO->addScores($reportID,$_POST['10home'],$_POST['10homescore'],$_POST['4away'],$_POST['10awayscore']);
}







header('Location: '.$webPath.'report/publish.php?score=success');

