<?php
include('inc/config.php');

include($docPath.'inc/header.php');


Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");

$SubscriberDAO = new SubscriberDAO($db);

//grab customer from stripe using subscriber id
$cu = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberIdByEmail($_SESSION['user_email']));

//cancel subscription on stripe using subscription id
if($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email'])) {
    $cu->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']))->cancel();
}
//disable subscription in subscriber table
$SubscriberDAO->updateSubscriberIsActive($_SESSION['user_email'], "0");

//disable subscription in users table
$SubscriberDAO->updateSubscriberIsActiveUsersTable($_SESSION['user_email'], "0");

//remove subscription_id from subscriber table
$SubscriberDAO->updateSubscriberSubscriptionId($_SESSION['user_email'], null);

session_destroy();
?>
    <main role="main">
        <!-- Breadrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="splash-backup/index.html">Home</a></li>
                    <li class="active"><?php echo $_SESSION['user_first'].' '.$_SESSION['user_last'].'s';?> Account</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- Shop Process -->
        <section id="process" class="section-light">

            <!-- Shop Process Container -->
            <div class="container">

                <div class="row">

                    <!-- Steps -->
                    <div class="steps">

                        <!-- Step -->
                        <div class="col-md-6">
                            <h1>Removing account......</h1>
                        </div>
                        <!-- End Step -->

                    </div>

                </div>
                <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->
    </main>
    <!-- End Main -->
<script>
    $(document).ready(function(){
        location.assign('<?php echo $webPath;?>');
    });
</script>
<?php include($docPath.'inc/footer.php');?>