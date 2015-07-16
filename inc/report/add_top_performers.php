<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$PlayerDAO = new PlayerDAO($db);
$addPlayers = $PlayerDAO->addTopPerformersToReport($_POST['player'],$_POST['position'],$_POST['report']);

if($_POST['position'] == 16 && $addPlayers){
 header('Location: '.$webPath.'report/tp-wr.php?qb=success');
}

if($_POST['position'] == 1 && $addPlayers){
    header('Location: '.$webPath.'report/tp-rb.php?wr=success');
}

if($_POST['position'] == 2 && $addPlayers){
    header('Location: '.$webPath.'report/tp-te.php?rb=success');
}

if($_POST['position'] == 7 && $addPlayers){
    header('Location: '.$webPath.'report/tp-k.php?te=success');
}

if($_POST['position'] == 20 && $addPlayers){
    header('Location: '.$webPath.'report/tp-dst.php?=success');
}