<?php require 'inc/config.php';

echo $_GET['email'];
$SubscriberDAO = new SubscriberDAO($db);
$SubscriberDAO->updateNewletterTable($_GET['email']);
?>