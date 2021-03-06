<?php
include('inc/config.php');

include($docPath.'inc/header.php');
?>
<!-- Main -->
    <main role="main">
    
        <!-- Breadrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
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
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-bookmark"></span>
                                </div>
                                <h4>1. The Recap Archive</h4>
                                <p>See all your previous reports</p>
                            </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                </div>
                                <h4>2. Billing Information</h4>
                                <p>LEdit your billing information</p>
                            </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </div>
                                <h4>3. Reset Password</h4>
                                <p>Rest your password here</p>
                                </div>
                        </div>
                        <!-- End Step -->

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="icon-caution"></span>
                                </div>
                                <h4>4. Cancel Your Account</h4>
                                <p></p>
                            </div>
                        </div>
                        <!-- End Step -->

                    </div>
                    <!-- End Steps -->

                </div>

                <div class="row">

                    <!-- Steps -->
                    <div class="steps">

                        <!-- Step -->
                        <div class="col-md-3 col-sm-6">
                            <div class="step">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </div>
                                <h4>1. Create Report</h4>
                                <p>Create a new report</p>
                            </div>
                        </div>
                        <!-- End Step -->


                    </div>
                    <!-- End Steps -->

                </div>

            </div>
            <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->

<div class="row">\
        <input type="text">
</div>



    </main>
    <!-- End Main -->

<?php include($docPath.'inc/footer.php');?>