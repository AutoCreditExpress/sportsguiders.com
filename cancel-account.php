<?php
include('inc/config.php');

if ($login->isUserLoggedIn() != true) {
    header("Location: ".$webPath);
}

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
                            <h1 style="color:#717d90;">Sorry to see you go</h1>
                            <p style="font-size:22px;">By clicking Cancel you acknowledge the cancellation of your account.  If you wish to restore your account you must contact support.  This account cancelation will also remove your active subscription.</p>
                            <form method="post">
                                <input type="hidden" name="dummy" value="1">
                                <button class="btn btn-danger cancelSubscription" style="float:left;margin-top:10px;">Cancel</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div style="width:50%;margin:0px auto;">
                                <img style ="width:100%;" src="<?=$webPath;?>img/sadface.jpeg">
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#submitFeedback').click(function(){
                                        $('#feedbackSection').fadeOut(function(){
                                            $('#feedbackLoading').fadeIn(function(){
                                                $.ajax({
                                                    url:'<?=$webPath?>sendFeedback.php',
                                                    data:$('#feedbackSection').serialize(),
                                                    type:'POST',
                                                    success:function(result){
                                                        $('#feedbackLoading').fadeOut(function(){
                                                            $('#feedbackContainer').html('<p>Thank You for your Feedback!!</p>'+result);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    });
                                });
                            </script>
                            <div id="feedbackContainer" style="margin-top:10px;border:1px solid #e3e3e3;border-radius:4px;padding:19px;padding-bottom:50px;background-color: #f5f5f5;margin">
                                <form id="feedbackSection">
                                    <p style="color:#717d90;font-size:22px;">What could we have done better??</p>
                                    <input type="hidden" name="userEmail" value="<?php echo $_SESSION['user_email'];?>">
                                    <input type="hidden" name="userName" value="<?php echo $_SESSION['user_name'];?>">
                                    <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'];?>">
                                    <textarea type="text" placeholder="Message" name="message" style="width:100%;"></textarea>
                                    <input type="button" id="submitFeedback" class="btn btn-red btn-lg btn-rounded payNow" value="Send" style="float:right;">
                                </form>
                                <div id="feedbackLoading" style="display:none;"><img src="<?=$webPath;?>img/loading.gif"></div>
                            </div>
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