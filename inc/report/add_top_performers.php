<?php
/**
 * Created by PhpStorm.
 * User: brianslaght
 * Date: 7/13/15
 * Time: 9:28 PM
 */

include('../config.php');

$PlayerDAO = new PlayerDAO($db);
$addPlayers = $PlayerDAO->addTopPerformersToReport($_POST['player'],$_POST['position'],2);

var_dump($_POST); exit;