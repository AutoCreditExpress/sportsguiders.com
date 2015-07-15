<?php
include('inc/config.php');

include($docPath.'inc/header.php');
$resetError='';
if($_POST){

    if (empty($_POST['oldpass']) || empty($_POST['newpass']) || empty($_POST['newpass2'])) {
        $resetError = MESSAGE_PASSWORD_EMPTY;
        // is the repeat password identical to password
    } elseif ($_POST['newpass'] !== $_POST['newpass2']) {
        $resetError = MESSAGE_PASSWORD_BAD_CONFIRM;
        // password need to have a minimum length of 6 characters
    } elseif (strlen($_POST['newpass']) < 6) {
        $resetError = MESSAGE_PASSWORD_TOO_SHORT;
        // all the above tests are ok
    }else{
        $login->editUserPassword($_POST['oldpass'],$_POST['newpass'],$_POST['newpass2']);
    }
}
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
                        <div class="col-md-6">
                            <?php
                            if($resetError) {
                                echo '<div class="alert alert-danger">
                                <strong>Error!</strong> ' . $resetError . '
                            </div>';
                            }
                            ?>
                            <p style="font-size:22px;">Please fill out the form and click 'reset' to change your password.</p>
                        </div>
                        <div class="col-md-6">
                            <form method="post">
                                <label>Old Password:</label>
                                <input type="password" pattern=".{6,}" title="Min 6 chars" class="form-control" name="oldpass" required>
                                <label>New Password:</label>
                                <input type="password" pattern=".{6,}" title="Min 6 chars" class="form-control" name="newpass" required>
                                <label>New Password Repeat:</label>
                                <input type="password" pattern=".{6,}" title="Min 6 chars" class="form-control" name="newpass2" required>
                                <button class="btn btn-danger cancelSubscription" style="float:right;margin-top:10px;">Reset</button>
                            </form>
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