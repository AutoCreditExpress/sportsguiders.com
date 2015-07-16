<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$ReportDAO = new ReportDAO($db);
$FactDAO = new FactsDAO($db);
$reportID = $ReportDAO->getPendingReportID();

$addFantasy = $FactDAO->createFact($reportID,$_POST['fantasy'],'fantasy');
$addHistory = $FactDAO->createFact($reportID,$_POST['history'],'history');
$addLife= $FactDAO->createFact($reportID,$_POST['life'],'life');

header('Location: '.$webPath.'report/upcoming_schedule.php?facts=success');

