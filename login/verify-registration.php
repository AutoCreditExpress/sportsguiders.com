<?php
require '../inc/config.php';
$SubscriberDAO = new SubscriberDAO($db);

if($SubscriberDAO->updateUserActiveUsingIdHash($_GET['id'],$_GET['verification_code'])==true){

//load the user ingo
$UserInfo = $SubscriberDAO->getUserById($_GET['id']);

    echo "
    <script>
        location.assign('http://www.sportsguiders.com/login/');
    </script>";
}else{
    echo "<h1>You are not authorized to access this page!!</h1>";
}

?>