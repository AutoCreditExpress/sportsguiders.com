<?php require 'inc/config.php';

$SubscriberDAO=new SubscriberDAO($db);

if ($login->isUserLoggedIn() == true) {
    header("Location: ".$webPath."my-account/");
}elseif($_GET['ref']=='therecap'){
    $therecapNotice = true;
}

include($docPath.'inc/header.php');
//if there is post data and the user has already been created and is active, update the card info
Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");
$error = '';
$success = '';

//check number of subs, if subs > 3000 disable this page and display a message
if($SubscriberDAO->getNumberOfActiveSubscribers(true)>0){
?>
    <link rel="stylesheet" href="<?php echo $webPath;?>css/bootstrap-min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $webPath;?>css/bootstrapValidator-min.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo $webPath;?>css/bootstrap-side-notes.css" />
    <style type="text/css">
        .col-centered {
            display:inline-block;
            float:none;
            text-align:left;
            margin-right:-4px;
        }
        .row-centered {
            margin-left: 9px;
            margin-right: 9px;
        }
    </style>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="<?php echo $webPath;?>js/bootstrap-min.js"></script>
    <script src="<?php echo $webPath;?>js/bootstrap-formhelpers-min.js"></script>
    <script type="text/javascript" src="<?php echo $webPath;?>js/bootstrapValidator-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#payment-form').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                submitHandler: function(validator, form, submitButton) {
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.card.createToken({
                        number: $('.number').val(),
                        cvc: $('.cvc').val(),
                        exp_month: $('.expiry').val().substring(0, 2),
                        exp_year: '20'+$('.expiry').val().substring(5),
                        name: $('.name').val(),
                        address_line1: $('.street').val(),
                        address_city: $('.city').val(),
                        address_zip: $('.zip').val(),
                        address_state: $('.state').val(),
                        address_country: 'United States'
                    }, stripeResponseHandler);
                    return false; // submit from callback
                },
                fields: {
                    street: {
                        validators: {
                            notEmpty: {
                                message: 'The street is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 96,
                                message: 'The street must be more than 6 and less than 96 characters long'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'The city is required and cannot be empty'
                            }
                        }
                    },
                    zip: {
                        validators: {
                            notEmpty: {
                                message: 'The zip is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,
                                max: 9,
                                message: 'The zip must be more than 3 and less than 9 characters long'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            },
                            stringLength: {
                                min: 6,
                                max: 65,
                                message: 'The email must be more than 6 and less than 65 characters long'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The card holder name is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 70,
                                message: 'The card holder name must be more than 6 and less than 70 characters long'
                            }
                        }
                    },
                    number: {
                        selector: '#thenumber',
                        validators: {
                            notEmpty: {
                                message: 'The credit card number is required and can\'t be empty'
                            },
                            creditCard: {
                                message: 'The credit card number is invalid'
                            },
                        }
                    },
                    state: {
                        selector: '.state',
                        validators: {
                            notEmpty: {
                                message: 'The state can\'t be empty'
                            }
                        }
                    },
                    expiry: {
                        selector: '.expiry',
                        validators: {
                            notEmpty: {
                                message: 'The expiration is required'
                            },
                            stringLength: {
                                min: 7,
                                max: 7,
                                message: 'The expiry must be 5 digits'
                            }
                        }
                    },
                    cvv: {
                        selector: '#cvv',
                        validators: {
                            notEmpty: {
                                message: 'The cvv is required and can\'t be empty'
                            },
                            cvv: {
                                message: 'The value is not a valid CVV',
                                creditCardField: 'number'
                            }
                        }
                    },
                }
            });

        });
    </script>
    <script type="text/javascript">
        // this identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_live_Iouvsrt1T1v64gKETw0Q0FMP');

        function stripeResponseHandler(status, response) {
            //if account type is a basic account skip validation
            var accountType = $('.accountType').val();
                if (response.error && accountType!='basic') {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show hidden div
                    document.getElementById('a_x200').style.display = 'block';
                    // show the errors on the form
                    var expiry = $('.expiry').val();
                    if (expiry != null) {
                        var expiryMonth = expiry.substring(0, 2);
                        var expiryYear = '20' + expiry.substring(5);
                    }
                    $(".payment-expiry").html(response.error);
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    form$.get(0).submit();
                }

        }


    </script>
    <!-- Main -->
    <main role="main">


        <!-- Page Heading -->
        <div class="page-heading">
            <div class="container">
                <header>
                    <h1>Get Access and Win</h1>
                </header>
            </div>
        </div>
        <!-- End Page Heading -->

        <!-- Checkout -->
        <section id="checkout" class="checkout">

            <!-- Checkout Container -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <!-- Checkout Form -->
                        <div class="checkout-form" style="border-radius:15px;">
                            <h2 class="text-center" style="color: #465366;">Getting Started</h2>

                            <p>
                                It only costs $9 for a year to gain access to The Recap and other expert advice that will make you a Fantasy Football winner.
                            </p>
                            <style>
                                /*.table .middle td {box-shadow:0px 0px 12px #666,0px 0px 50px #666;}*/
                            </style>
                            <table class="table" style="">
                                <tr class="subtotal" style="border-top:1px solid #bec9d9;">
                                    <td class="cell1" style=""><b>Basic Membership</b></td>
                                    <td class="cell2" style="">FREE</td>
                                    <td class="cell3">The most basic SportsGuiders account that allows you to read our articles and receive important email updates. </td>
                                </tr>
                                <tr style="border:1px solid #e3e3e3;font-weight:900;">
                                    <td class="clonecell1" style="background: #d83435;color:white;"><b>Guider Access</b></td>
                                    <td class="clonecell2" style="background: #d83435;color:white;font-size:18px;">$9</td>
                                    <td class="clonecell3" style="background: #f5f5f5;">The most popular SportsGuiders account that gives you access to our articles, email updates and The Recap every week. </td>
                                </tr>
                                <tr class="">
                                    <td style=""><b>Expert Access</b></td>
                                    <td style="">$49</td>
                                    <td>This account is for serious fantasy football players that need access to our articles, emails, The Recap and a 1-on-1 expert advice chat line open every Sunday morning from 9:30am to 12:30pm. </td>
                                </tr>
                            </table>
                        </div>
                        <!-- End Checkout Form -->
                        <div class="checkout-form fbSave" style="margin-top:25px;border-radius:15px;display:none;">
                            <h2 style="width:100%;">Want to save money??</h2>
                            <p style="padding:7px;width:100%;">Share us on facebook and receive $1 off on your subscription</p>
                            <img id="fbShareButton" src="http://www.sportsguiders.com/img/fbshare.png" style="cursor:pointer;max-width:200px;">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                    <noscript>
                        <div class="bs-callout bs-callout-danger">
                            <h4>JavaScript is not enabled!</h4>
                            <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                        </div>
                    </noscript>
                    <?php

                    //update the card
                    if ($_POST and !$_SESSION) {
                        try {
                            if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
                                throw new Exception("Fill out all required fields.");
                            if (!isset($_POST['stripeToken']))
                                throw new Exception("The Stripe Token was not generated correctly");
                            $token = $_POST['stripeToken'];

                            $SubscriberDAO = new SubscriberDAO($db);

                            //check user exists in table
                            if($SubscriberDAO->getSubscriberByEmail($_POST['email'])!=null) {
                                //user exist in table, display error
                                $error = '<div class="alert alert-danger">
			                                <strong>Error!</strong> User name already exists, please use a different email address.</div>';
                            }elseif($_POST['accountType']=='basic'){
                                //check password
                                if($_POST['password']!=$_POST['password2']) {
                                    $error = '<div class="alert alert-danger">
                                                <strong>Error!</strong> Passwords dont match</div>';
                                //basic plan
                                }else{
                                    $plan = $_POST['accountType'].$SubscriberDAO->getPlanUsingCoupon($_POST['coupon']);
                                    $subscriberEmail = $_POST['email'];

                                    $Registration = new Registration();

                                    //create user in table
                                    $SubscriberDAO->createSubscriber(array(
                                        'email' => $_POST['email'],
                                        'address' => $_POST['street'],
                                        'city' => $_POST['city'],
                                        'state' => $_POST['state'],
                                        'zip' => $_POST['zip'],
                                        'create_date' => date("Y-m-d")
                                    ));

                                    $uniqueID = uniqid();

                                    //update subscriber table with id
                                    $SubscriberDAO->updateSubscriberId('subscriber', $subscriberEmail, 'cus_'.$uniqueID);

                                    //update user table with id
                                    $SubscriberDAO->updateSubscriberId('users', $subscriberEmail, 'cus_'.$uniqueID);

                                    //update is active in subscriber table
                                    $SubscriberDAO->updateSubscriberIsActive($subscriberEmail, '1');

                                    $success = '<div class="alert alert-success">
                                    <strong>Success!</strong> Your payment was successful.</div>';

                                    ///change the location of the page
                                    echo "<script>location.assign('http://www.sportsguiders.com/login/?Message=Payment_successful');</script>";
                                }
                            }else{
                                if($_POST['password']!=$_POST['password2']) {
                                    $error = '<div class="alert alert-danger">
                                                <strong>Error!</strong> Passwords dont match</div>';
                                }else{


                                    //create customer on stripe
                                    $customer = Stripe_Customer::create(array(
                                            "source" => $token,
                                            "email" => $_POST['email'])
                                    );

                                    //check plan using coupon code
                                    $plan = $_POST['accountType'].$SubscriberDAO->getPlanUsingCoupon($_POST['coupon']);
                                    $subscriberEmail = $_POST['email'];

                                    //retrieve stripe customer
                                    $cu = Stripe_Customer::retrieve($customer->id);
                                    if($_POST['isFBshare']){
                                        //create subscriptions
                                        $cu2 = $cu->subscriptions->create(array(
                                            "plan" => $plan,
                                            "coupon" => Stripe_Coupon::retrieve("dollaroff"),
                                        ));
                                    }else{
                                        //create subscriptions
                                        $cu2 = $cu->subscriptions->create(array(
                                            "plan" => $plan
                                        ));
                                    }
                                    $Registration = new Registration();

                                    //create user in table
                                    $SubscriberDAO->createSubscriber(array(
                                        'email' => $_POST['email'],
                                        'address' => $_POST['street'],
                                        'city' => $_POST['city'],
                                        'state' => $_POST['state'],
                                        'zip' => $_POST['zip'],
                                        'create_date' => date("Y-m-d")
                                    ));
                                    //update subscriber table with id
                                    $SubscriberDAO->updateSubscriberId('subscriber', $subscriberEmail, $customer->id);

                                    //update user table with id
                                    $SubscriberDAO->updateSubscriberId('users', $subscriberEmail, $customer->id);

                                    //update subscriber table with card id
                                    $SubscriberDAO->updateSubscriberCardId($subscriberEmail, $customer->default_source);

                                    //update is active in subscriber table
                                    $SubscriberDAO->updateSubscriberIsActive($subscriberEmail, '1');

                                    //write subscription into table
                                    $SubscriberDAO->updateSubscriberSubscriptionId($subscriberEmail, $cu2->id);

                                    $success = '<div class="alert alert-success">
                                    <strong>Success!</strong> Your payment was successful.</div>';

                                    ///change the location of the page
                                    echo "<script>location.assign('http://www.sportsguiders.com/login/?Message=Payment_successful');</script>";
                                }
                            }

                         }
                        catch (Exception $e) {
                            $error = '<div class="alert alert-danger">
			                <strong>Error!</strong> '.$e->getMessage().'
			                </div>';
                        }
                        ///if there is post data and session data but the user is not subscribed
                    }
                    ?>
                    <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
  <span class="payment-success">
  <?= $success ?>
  <?= $error ?>
  </span>
                    <span class="payment-expiry"></span>
                        <!-- Billing / Shipping Form -->
                    <form method="post" id="payment-form" style>
                        <div class="well form-container active">
                            <div class="card-wrapper"></div>

                                <!--hidden box for dollar off sharing-->
                                <input type="hidden" id="isFBshare" name="isFBshare" value="<?php echo $_POST['isFBshare'];?>">

                            <!-- Billing Form -->
                            <h3 class="text-center">Billing Details</h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <script>
                                            $(document).ready(function(){
                                                $( ".accountType" ).change(function() {
                                                    if($('.accountType').val()=='basic'){
                                                        $('.number, .cvc, .expiry').val(null);
                                                        $('.fbSave,.number, .cvc, .expiry, .card-wrapper,  .protectInfo').fadeOut();
                                                    }else{
                                                        $('.number, .cvc, .expiry').val(null);
                                                        $('.number, .cvc, .expiry, .card-wrapper, .protectInfo').fadeIn();
                                                    }
                                                });
                                            });
                                        </script>
                                        <select class="form-control accountType" name="accountType" placeholder="Account Type" data-by-field="accountType">
                                            <option value="basic">Basic -(FREE)</option>
                                            <option value="guider" selected>Guider Access -($9 annual)</option>
                                            <option value="expert">Expert Access -($49 annual)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Card Number -->
                                <div class="col-xs-12 protectInfo">
                                    <div class="form-group">
                                        <div style="background:#e6f7fe;border:1px solid #6bd0f9;border-radius:4px;margin-top:10px;">
                                            <p style="color:#31708f;padding:7px;">Sportsguiders.com protects your information with 256bit encryption</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input value="" style="" type="text" id="number" name="number" class="form-control number" placeholder="Card Number" data-by-field="number">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-6 col-sm-3">
                                    <div class="form-group">
                                        <input value="" style="" type="text" name="expiry" class="form-control expiry" placeholder="MM/YY"  data-by-field="expiry">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-6 col-sm-3">
                                    <div class="form-group">
                                        <input value="" style="" type="text" name="cvc" class="form-control cvc" placeholder="CVC" data-by-field="cvc">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- First Name -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input value="" type="text" name="name" class="form-control name" placeholder="Full Name" data-by-field="name">
                                    </div>
                                </div>
                                <!-- End First Name -->

                                <!-- Address -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="street" class="form-control street" placeholder="Street Address" data-by-field="street">
                                    </div>
                                </div>
                                <!-- End Address -->

                                <!-- Address 2 -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="street2" class="form-control street2" placeholder="Apartment, suite, unit, etc. (optional)" data-by-field="street2">
                                    </div>
                                </div>
                                <!-- End Address 2 -->

                                <!-- City -->
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control city" placeholder="City" data-by-field="city">
                                    </div>
                                </div>
                                <!-- End City -->
                                <!-- State Code -->
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control state" placeholder="State" name="state"  data-by-field="state">
                                    </div>
                                </div>
                                <!-- State Post Code -->
                                <!-- Post Code -->
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control zip" name="zip" placeholder="Post Code" data-by-field="zip">
                                    </div>
                                </div>
                                <!-- End Post Code -->

                                <script>
                                    $(document).ready(function(){
                                        $('.couponButton').click(function(){
                                            var coupon = $('.coupon').val();
                                            if(coupon!='') {
                                                $.get("<?php echo $webPath;?>check-coupon.php?code=" + coupon, function (data, status) {
                                                    if (status == "success") {
                                                        alert(data);
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                                <!-- coupon -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4">
                                            <button type="button" class=" couponButton btn btn-red btn-lg btn-rounded" style="padding-top:5px;padding-bottom:5px;">Verify Coupon</button>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                            <input type="text" name="coupon" class="form-control coupon" placeholder="Coupon Code:(case sensitive)"  data-by-field="coupon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Billing Form -->

                            </div>
                        <div class="well">
                            <div class="row">

                                <div class="col-xs-12">
                                    <h3 class="text-center" style="margin-top:0px;">Login Details</h3>
                                </div>

                                <!-- Email Address -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control email" name="email" placeholder="Email Address" data-by-field="email">
                                    </div>
                                </div>
                                <!-- End Email Address -->

                                <!-- End Phone -->

                                <!-- password 1 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control password" placeholder="Password"  data-by-field="password">
                                    </div>
                                </div>
                                <!-- End password 1 -->

                                <!-- password 2 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control password2" placeholder="Confirm Password"  data-by-field="password2">
                                    </div>
                                </div>
                                <!-- End password 1 -->


                                <div class="col-xs-12">
                                    <div style="float:right;margin-top:10px;">
                                        <button class="btn btn-red btn-lg btn-rounded payNow" type="submit" style="">Place Order</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                        <!-- End Billing / Shipping Form -->

                    </div>

                </div>
            </div>
            <!-- End Checkout Container -->

        </section>
        <!-- End Checkout -->



        <!-- Newsletter -->
        <section id="newsletter" class="section-light newsletter text-center" style="background:#d83435;">

            <!-- Newsletter Container -->
            <div class="container">

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
                                var email = $('.emailNews').val();
                                if(email!="") {
                                    $.get("<?php echo $webPath;?>recordNewsletterInfo.php?email=" + email, function (data, status) {
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
                                            $('.newsletterSection').html('<h1 style="background:#d83435;color:white;">Thank You!!</h1>');
                                        } else {
                                            alert('Failed to send, please contact support');
                                        }
                                    });
                                }
                                return false;
                            }
                            <?php
                            //if the referrer is a non logged in user clicking the recap nav button
                             if($therecapNotice){
                             ?>
                            $(document).ready(function(){
                                var growlType = 'info';
                                $.bootstrapGrowl('<h4><strong>Notice!</strong></h4> <p>Sorry you cant view this until you have subscribed.<br><a href="<?=$webPath;?>sample-recap/">View Sample Recap</a></p>', {
                                    type: growlType,
                                    delay: 8000,
                                    allow_dismiss: true,
                                    width: 300,
                                    offset: {from: 'top', amount: 20},
                                });
                            });
                            <?php
                             }
                            ?>
                        </script>
                        <!-- Newsletter Form -->
                        <form class="form-inline" onsubmit="submitNewsletterInfo(); return false;">
                            <div class="form-group">
                                <input placeholder="Email Address" class="form-control emailNews" type="email">
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
    <script src="<?php echo $webPath;?>card/lib/js/card.js"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
<?php }else{
    echo '<h1 style="color:red;">We\'re Sorry, but we have reached our maximum subscription limit for '.date('Y').'</h1>';
} ?>
<?php include($docPath.'inc/footer.php'); ?>