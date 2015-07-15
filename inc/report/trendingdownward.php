<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$TrendingDAO = new TrendingDAO($db);
$ReportDAO = new ReportDAO($db);
$PlayerDAO = new PlayerDAO($db);

$reportID = $ReportDAO->getPendingReportID();

//add each waiver

if($_POST['player1']){

    $Player = $PlayerDAO->getPlayerFromID($_POST['player1']);

    $position = $PlayerDAO->getPositionIDFromPositionShortName($Player->getPosition());

    $add = $TrendingDAO->createTrending($reportID,$_POST['player1'],$position,$_POST['player1currentpoints'],$_POST['player1averagepoints'],'down');
}

if($_POST['player2']){

    $Player = $PlayerDAO->getPlayerFromID($_POST['player2']);

    $position = $PlayerDAO->getPositionIDFromPositionShortName($Player->getPosition());

    $add = $TrendingDAO->createTrending($reportID,$_POST['player2'],$position,$_POST['player2currentpoints'],$_POST['player2averagepoints'],'down');
}

if($_POST['player3']){

    $Player = $PlayerDAO->getPlayerFromID($_POST['player3']);

    $position = $PlayerDAO->getPositionIDFromPositionShortName($Player->getPosition());

    $add = $TrendingDAO->createTrending($reportID,$_POST['player3'],$position,$_POST['player3currentpoints'],$_POST['player3averagepoints'],'down');
}

if($_POST['player4']){

    $Player = $PlayerDAO->getPlayerFromID($_POST['player4']);

    $position = $PlayerDAO->getPositionIDFromPositionShortName($Player->getPosition());

    $add = $TrendingDAO->createTrending($reportID,$_POST['player4'],$position,$_POST['player4currentpoints'],$_POST['player4averagepoints'],'down');
}

if($_POST['player5']){

    $Player = $PlayerDAO->getPlayerFromID($_POST['player5']);

    $position = $PlayerDAO->getPositionIDFromPositionShortName($Player->getPosition());

    $add = $TrendingDAO->createTrending($reportID,$_POST['player5'],$position,$_POST['player5currentpoints'],$_POST['player5averagepoints'],'down');
}

header('Location: '.$webPath.'report/funfacts-life.php?down=success');