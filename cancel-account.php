<?php
include('inc/config.php');

include($docPath.'inc/header.php');
$cancelAccountMessage='';
$cancelButton='';
if($_POST){
    $cancelAccountMessage = 'Please confirm the cancellation of your account.';
    $cancelButton='<button class="btn btn-danger cancelSubscription" style="float:right;">Confirm</button>';
}
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
                        <div class="col-md-6">
                            <?php
                            if($cancelAccountMessage) {
                                echo '<form method="post" action="'.$webPath.'cancel.php"><div class="alert alert-danger" style="height:100px;">
                                 ' . $cancelAccountMessage.'<br>' .$cancelButton. '
                            </div></form>';
                            }
                            ?>
                            <p style="font-size:22px;">By clicking Cancel you acknowledge the cancellation of your account.  If you wish to restore your account you must contact support.  This account cancelation will also remove your active subscription.</p>
                            <form method="post">
                                <input type="hidden" name="dummy" value="1">
                                <button class="btn btn-danger cancelSubscription" style="float:left;margin-top:10px;">Cancel</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img style ="width:100%;" src="<?=$webPath;?>img/sadface.jpeg">
                        </div>
                        <!-- End Step -->

                    </div>

                </div>
                <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->
    </main>
    <!-- End Main -->

<?php include($docPath.'inc/footer.php');?>