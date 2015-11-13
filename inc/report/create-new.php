<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/14/15
 * Time: 10:00 AM
 */

include('../config.php');

$ReportDAO = new ReportDAO($db);

$createReport = $ReportDAO->createNewReport();

if($createReport){
    header('Location: '.$webPath.'report/tp-qb.php?report='.$createReport);
}