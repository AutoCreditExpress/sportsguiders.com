<?php
include('inc/config.php');

if ($login->isUserLoggedIn() == true) {
    //header("Location: ".$webPath."sample-recap/");// temp until report platform is complete, remove once completed
    //check to see if the report called is a valid one
    $ReportDAO = new ReportDAO($db);
    if($_GET['id']){
        if($ReportDAO->checkReportIsValid($_GET['id'])){
            $Report = $ReportDAO->getLatestReport(null,$_GET['id']);
        }else{
            header("Location: ".$webPath."recap-archive/?Message=Report_Not_Found");
        }
    }else{
        $Report = $ReportDAO->getLatestReport();
    }
} else {
    header("Location: ".$webPath."login/");
}
$PlayerDAO = new PlayerDAO($db);
$TeamDAO = new TeamDAO($db);
$FactsDAO = new FactsDAO($db);
echo '<pre>';
var_dump($ReportDAO->getReportStandings($_GET['id']));
echo '</pre>';
?>