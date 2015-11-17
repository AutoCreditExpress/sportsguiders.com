<?php include('inc/config.php');


if($_POST) {
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Set who the message is to be sent from
    //$mail->setFrom('sportguiders.com', 'INFO');
    $mail->From = 'info@sportsguiders.com';
    $mail->FromName = 'Sportsguiders';
    //Set an alternative reply-to address
    $mail->addReplyTo('info@sportguiders.com', 'sportsguiders.com');
    //Set who the message is to be sent to
    $mail->addAddress($_POST['email'], $_POST['name']);
    $mail->addAddress('support@sportsguiders.com', $_POST['name']);
    //Set the subject line
    $mail->Subject = 'Contact form mail';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->isHTML(true);
    //$mail->msgHTML(file_get_contents('http://www.sportsguiders.com/email/subscription/signup/index.html'), dirname(__FILE__));
    $mail->Body = "<?doctype html><html><head></head><body><h1>" . $_POST['name'] . "</h1>
    <h2>" . $_POST['company'] . "</h2>
    <h3>" . $_POST['email'] . ", " . $_POST['phone'] . "</h3>
    <p>" . $_POST['message'] . "</p></body></html>";

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        //header('Location: '.$webPath.'?Message=Mail_sent');
        $mailSuccess = true;
    }
}
include($docPath.'inc/header.php');
?>
    <!-- Main -->
    <main role="main">

        <!-- Page Heading -->
        <div class="page-heading">
            <div class="container">
                <header>
                    <h1>Contact Us</h1>
                </header>
            </div>
        </div>
        <!-- End Page Heading -->

        <!-- Contacts -->
        <section id="contacts" class="contacts text-center">

            <!-- Contacts Container -->
            <div class="container">

                <!-- Contacts Header -->
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2>Contact us</h2>
                        </header>
                    </div>
                </div>
                <!-- Contacts Header -->

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <!-- Contacts Information -->
                        <div class="contacts-information">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="fa fa-map-marker"></div>
                                    <div class="type">Address</div>
                                    <div class="info">28317 Beck Road<br>Suite E-17<br>Wixom, Michigan 48393</div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="fa fa-info"></div>
                                    <div class="type">E-Mail</div>
                                    <div class="info">support@sportsguiders.com</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Contacts Information -->

                        <!-- Contacts Form -->
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Full Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="company" class="form-control" placeholder="Company">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" id="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea placeholder="Message" id="message" class="form-control" name="message"></textarea>

                                    <button class="btn btn-blue btn-lg btn-rounded btn-iconned-right">Send Message <span class="fa fa-long-arrow-right"></span></button>
                                </div>
                            </div>
                        </form>
                        <!-- End Contacts Form -->

                    </div>
                </div>
            </div>
            <!-- End Contacts Container -->

        </section>
        <!-- End Contacts -->

        <!-- Newsletter -->
        <section id="newsletter" class="section-light newsletter text-center" style="background:#d83435;">

            <!-- Newsletter Container -->
            <div class="container newsletterContainer">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3 newsletterSection">

                        <!-- Newsletter Header -->
                        <header style="color:white;">
                            <h3>Stay informed</h3>
                            <h4>Subscribe to our newsletter</h4>
                        </header>
                        <!-- End Newsletter Header -->
                        <script>
                            function submitNewsletterInfo(){
                                var email = $('.email').val();
                                if(email!="") {
                                    $.get("recordNewsletterInfo.php?email=" + email, function (data, status) {
                                        if (status == 'success') {
                                            $(document).ready(function(){
                                                var growlType = 'success';
                                                $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>You have signed up for the newsletter...</p>', {
                                                    type: growlType,
                                                    delay: 3000,
                                                    allow_dismiss: true,
                                                    offset: {from: 'top', amount: 20}
                                                });
                                            });
                                        } else {
                                            alert('Failed to send, please contact support');
                                        }
                                    });
                                }
                                return false;
                            }
                        </script>
                        <!-- Newsletter Form -->
                        <form class="form-inline" onsubmit="submitNewsletterInfo(); return false;">
                            <div class="form-group">
                                <input placeholder="Email Address" class="form-control email" type="email">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </form>
                        <!-- End Newsletter Form -->

                        <p class="inform">
                            We will never send you spam. <b>We promise!</b>
                        </p>

                    </div>
                </div>

            </div>
            <!-- End Newsletter Container -->

        </section>
        <!-- End Newsletter -->



    </main>
    <!-- End Main -->
<?php if($mailSuccess){
    ?>
    <script>
        $(document).ready(function(){
            var growlType = 'success';
            $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Mail has been sent!!</p>', {
                type: growlType,
                delay: 3000,
                allow_dismiss: true,
                offset: {from: 'top', amount: 20}
            });
            $('.newsletterSection').html('<h1 style="background:#d83435;color:white;">Thank You!!</h1>');
        });
    </script>
    <?
}?>
<?php include($docPath.'inc/footer.php'); ?>