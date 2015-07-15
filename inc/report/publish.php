<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/14/15
 * Time: 10:00 AM
 */

include('../config.php');

$ReportDAO = new ReportDAO($db);
$reportID = $ReportDAO->getPendingReportID();

$updateReport = $ReportDAO->publishReport($reportID);

if($updateReport){
    header('Location: '.$webPath.'the-recap.php');
}