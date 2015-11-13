<?php
include('inc/config.php');

$Mailchimp = new Mailchimp('3edb9f9ccd6c3a0e1745e73a2fd75766-us9');

try {
$passedEmail = $_GET['email'];

    $result = $Mailchimp->call('lists/subscribe', array(
        'id' => '145d134313',
        'email' => array('email' => $passedEmail)
    ));

    $success = "complete";

}
catch (Exception $e) {
    $error = '<div class="alert alert-danger">
			  <strong>Error!</strong> '.$e->getMessage().'
			  </div>';
}

echo $error.$success;