<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$ReportDAO = new ReportDAO($db);
$EasyScheduleDAO = new EasyScheduleDAO($db);

$reportID = $ReportDAO->getPendingReportID();

if($_POST['1home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['1away'],$_POST['1home']);
}

if($_POST['2home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['2away'],$_POST['2home']);
}

if($_POST['3home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['3away'],$_POST['3home']);
}

if($_POST['4home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['4away'],$_POST['4home']);
}

if($_POST['5home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['5away'],$_POST['5home']);
}

if($_POST['6home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['6away'],$_POST['6home']);
}

if($_POST['7home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['7away'],$_POST['7home']);
}

if($_POST['8home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['8away'],$_POST['8home']);
}

if($_POST['9home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['9away'],$_POST['9home']);
}

if($_POST['10home"']){
    $addUpcoming = $EasyScheduleDAO->createEasySchedule($reportID,$_POST['10away'],$_POST['10home']);
}

header('Location: '.$webPath.'report/team_power_rankings.php?sch=success');