<?php
include('inc/config.php');
if ($login->isUserLoggedIn() == true) {
} else {
    header("Location: ".$webPath."login/");
}
include($docPath.'inc/header.php');

$SubscriberDAO = new SubscriberDAO($db);

$showReport=$SubscriberDAO->getRoleId($_SESSION['user_email']);

?>
<!-- Main -->
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
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>recap-archive/" style="text-decoration:none;">
                                <div class="step animated fadeInLeft">
                                    <div class="icon">
                                        <span class="glyphicon glyphicon-bookmark"></span>
                                    </div>
                                    <h4>1. The Recap Archive</h4>
                                    <p>See all your previous reports</p>
                                </div>
                            </a>
                        </div>
                        <!-- End Step -->
                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>advice/" style="text-decoration:none;">
                                <div class="step animated fadeInLeft">
                                    <div class="icon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <h4>2. Advice</h4>
                                    <p>Chat now, to get advice from a pro</p>
                                </div>
                            </a>
                        </div>
                        <!-- End Step -->
                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>billing_info/" style="text-decoration:none;">
                            <div class="step animated fadeInLeft">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                </div>
                                <h4>3. Billing Information</h4>
                                <p>Edit your billing information</p>
                            </div>
                                </a>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->

                            <div class="col-md-3 col-sm-6" >
                            <a href = "<?php echo $webPath;?>edit-password/" style = "text-decoration:none;" >
                            <div class="step animated fadeInLeft" >
                                <div class="icon" >
                                    <span class="glyphicon glyphicon-lock" ></span >
                                </div >
                                <h4 > 4. Reset Password </h4 >
                                <p > Reset your password here </p >
                                </div >
                            </a >
                        </div >
                        <!--End Step-->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>cancel-account/" style="text-decoration:none;">
                            <div class="step animated fadeInLeft">
                                <div class="icon">
                                    <span class="icon-caution"></span>
                                </div>
                                <h4>5. Cancel Your Account</h4>
                                <p></p>
                            </div>
                            </a>
                        </div>
                        <!-- End Step -->

                    </div>
                    <!-- End Steps -->


                    <!-- Steps -->
                    <div class="steps">
                        <?php if($showReport) {
                        ?>
                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>report/create-new/" style="text-decoration:none;">
                                <div class="step animated fadeInLeft">
                                    <div class="icon">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </div>
                                    <h4>Create Report</h4>
                                    <p>Create a new report</p>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Step -->
                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo $webPath;?>login/logout/" style="text-decoration:none;">
                            <div class="step animated fadeInLeft">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-new-window"></span>
                                </div>
                                <h4>Logout</h4>
                                <p>Logout of SportsGuiders</p>
                            </div>
                            </a>
                        </div>
                        <!-- End Step -->

                    </div>
                    <!-- End Steps -->

                </div>

            </div>
            <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->
    </main>
    <!-- End Main -->

<?php include($docPath.'inc/footer.php');?>