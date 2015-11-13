<?php require 'inc/config.php';

//login redirect

if ($login->isUserLoggedIn() == true) {
} else {
    header("Location: ".$webPath."login/");
}

include($docPath.'inc/header.php');

//
//NOTE: if a user changes the plan from a plan that has a coupon discount the user will lose that coupons discount
///

$SubscriberDAO=new SubscriberDAO($db);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                        selector: '#number',
                        validators: {
                            notEmpty: {
                                message: 'The credit card number is required and can\'t be empty'
                            },
                            creditCard: {
                                message: 'The credit card number is invalid'
                            },
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
                                message: 'The expiry must be 4 digits long'
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

            $(".cancelSubscription").click(function(){
                $("#payment-form").css('display', 'none');
                $.get("<?php echo $webPath;?>cancelSubscription.php", function(data, status){
                    if(status=="success"){
                        location.assign('//www.sportsguiders.com/my-account/?Message=Subscription_Canceled');
                    }else{
                        alert('Cancel has failed, please contact support');
                    }
                });
            });

        });
    </script>
    <script type="text/javascript">
        // this identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_live_5jIgP2Slc7M4baTLmU8XhxcS');

        function stripeResponseHandler(status, response) {
            if (response.error) {
                // re-enable the submit button
                $('.submit-button').removeAttr("disabled");
                // show hidden div
                document.getElementById('a_x200').style.display = 'block';
                // show the errors on the form
                var expiry = $('.expiry').val();
                if(expiry!=null) {
                    var expiryMonth = expiry.substring(0, 2);
                    var expiryYear = '20'+expiry.substring(5);
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
                <h1>Update your card information</h1>
            </header>
        </div>
    </div>
    <!-- End Page Heading -->
    <?php
    //if there is post data and the user has already been created and is active, update the card info
    Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");
    $error = '';
    $success = '';
    if ($_POST) {
        try {
            if (empty($_POST['street']) || empty($_POST['city']) || empty($_POST['zip']))
                throw new Exception("Fill out all required fields.");
            if (!isset($_POST['stripeToken']))
                throw new Exception("The Stripe Token was not generated correctly");
            $token = $_POST['stripeToken'];

            $SubscriberDAO = new SubscriberDAO($db);


            if($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email'])==false){
                //stripe customer not found
                //update plan, card, and user info, use data from gain access page

                //create customer on stripe
                $customer = Stripe_Customer::create(array(
                        "source" => $token,
                        "email" => $_SESSION['user_email'])
                );

                //check plan using coupon code
                $plan = $_POST['accountType'];
                $subscriberEmail = $_SESSION['user_email'];

                //retrieve stripe customer
                $cu = Stripe_Customer::retrieve($customer->id);
                //create subscriptions
                $cu2 = $cu->subscriptions->create(array(
                    "plan" => $plan
                ));
//                $Registration = new Registration();

                //update subscriber table with new user billing info
                $SubscriberDAO->updateSubscriberBillingInfo(array(
                    'address' => $_POST['street'],
                    'city' => $_POST['city'],
                    'state' => $_POST['state'],
                    'zip' => $_POST['zip'],
                    'update_date' => date('Y-m-d h:i:s')
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

                //////if no error caught display success message
                $success = '<div class="alert alert-success">
                                <strong>Success!</strong> Your plan has been updated successful.</div>';

                ///change the location of the page
                echo "<script>location.assign('//www.sportsguiders.com/my-account/?Message=Plan_Updated');</script>";
            }else {

                //stripe customer found

                //get stripe customer info
                $cu = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberIdByEmail($_SESSION['user_email']));

                //get customer subscription info
                $subscription = $cu->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']));
                //echo "<pre>";var_dump($subscription->plan->id);echo "</pre>";

                $subscriptionName = $subscription->plan->id;


                //card update
                //create a new card from the information
                $createcard = $cu->sources->create(array("source" => $token));

                //grab customer card id from subscriber table and delete associated card
                $deletecard = $cu->sources->retrieve($SubscriberDAO->getSubscriberCardIdByEmail($_SESSION['user_email']))->delete();

                //update subscriber table with new card id
                $SubscriberDAO->updateSubscriberCardId($_SESSION['user_email'], $createcard->id);

                //IS UPDATE? check if the subscription matches
                if(strpos('filler'.$subscriptionName,$_POST['accountType'])==false) {
                    //change the plan
                    $subscription->plan = $_POST['accountType'];
                    $subscription->save();
                }
                //update subscriber table with new user billing info
                $SubscriberDAO->updateSubscriberBillingInfo(array(
                    'address' => $_POST['street'],
                    'city' => $_POST['city'],
                    'state' => $_POST['state'],
                    'zip' => $_POST['zip'],
                    'update_date' => date('Y-m-d h:i:s')
                ));

                //write subscription into table
                $SubscriberDAO->updateSubscriberSubscriptionId($subscriberEmail, $cu2->id);

                //////if no error caught display success message
                $success = '<div class="alert alert-success">
                                <strong>Success!</strong> Your plan has been updated successful.</div>';

                ///change the location of the page
                echo "<script>location.assign('//www.sportsguiders.com/my-account/?Message=Plan_Updated');</script>";

            }
        }


        catch (Exception $e) {
            $error = '<div class="alert alert-danger">
			  <strong>Error!</strong> '.$e->getMessage().'
			  </div>';
        }
        //if a card is found
    }elseif($SubscriberDAO->getSubscriberCardIdByEmail($_SESSION['user_email'])!=null){

        $customer = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberByEmail($_SESSION['user_email'])['subscriber_id']);
        $card = $customer->sources->retrieve($SubscriberDAO->getSubscriberCardIdByEmail($_SESSION['user_email']));

        if($customer->subscriptions->total_count){
            //get customer subscription info
            $subscription = $customer->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']));
            $subscriptionName = $subscription->plan->id;
        }else{
            $subscriptionName='BASIC';
        }
        //$hiddenCardId = $SubscriberDAO->getSubscriberCardIdByEmail($_SESSION['user_email']);
        $thenumber = '**** **** ****'.$card->last4;
        $expmonth=$card->exp_month;
        $expyear = $card->exp_year;
        $addressline1=$card->address_line1;
        $addresscity=$card->address_city;
        $addressstate = $card->address_state;
        $addresszip = $card->address_zip;
    }else{
        //no card id present for user in db means the account is basic
        $subscriptionName='BASIC';
    }


    ?>
    <!-- Checkout -->
    <section id="checkout" class="checkout">

    <!-- Checkout Container -->
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <p>By canceling your subscription you will be reverted back to a BASIC(FREE) membership.  If you wish to cancel your account you can do so from the dashboard <a href="<?=$webPath?>cancel-account/">here</a>.</p>
        </div>
        <div class="col-md-6">
            <p><strong>Current Subscription Type: </strong><i><?php echo strtoupper($subscriptionName);?></i></p>
        </div>
    <div class="col-sm-12">
    <noscript>
        <div class="bs-callout bs-callout-danger">
            <h4>JavaScript is not enabled!</h4>
            <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
        </div>
    </noscript>
    <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
  <span class="payment-success">
  <?= $success ?>
      <?= $error ?>
  </span>
    <span class="payment-expiry"></span>
    <!-- Billing / Shipping Form -->
    <div class="well form-container active">
        <div class="card-wrapper"></div>
        <form method="post" id="payment-form">
            <!-- Billing Form -->
            <h3 class="text-center">Billing Details</h3>
            <div class="row">

                <!-- Account Type -->
                <div class="col-xs-12">
                    <div class="form-group">
                        <script>
                            $(document).ready(function(){
                                $( ".accountType" ).change(function() {
                                    if($('.accountType').val()=='basic'){
                                        $('.number, .cvc, .expiry').val(null);
                                        $('.fbSave,.number, .cvc, .expiry').fadeOut();
                                    }else{
                                        $('.number, .cvc, .expiry').val(null);
                                        $('.fbSave,.number, .cvc, .expiry').fadeIn();
                                    }
                                });
                            });
                        </script>
                        <select id="accountType" class="form-control accountType" name="accountType" data-by-field="accountType">
                            <option value="guider">Guider Access -($9 annual)</option>
                            <option value="expert" <?php //if(strpos('filler'.$subscriptionName,'guider')!=0) { echo 'selected';}?>>Expert Access -($19 annual)</option>
                        </select>
                    </div>
                </div>
                <!-- Account Type -->

                <!-- Card Number -->
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <input type="text" id="number" name="number" class="form-control number" placeholder="<?php if($thenumber){echo $thenumber;}else{echo "Card Number";}?>" data-by-field="number" required>
                    </div>
                </div>
                <!-- End Card Number -->

                <!-- Card Number -->
                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <input type="text" placeholder="<?php if($expmonth){echo $expmonth.' / '.$expyear;}else{echo 'MM/YY';}?>" name="expiry" class="form-control expiry" data-by-field="expiry" required>
                    </div>
                </div>
                <!-- End Card Number -->

                <!-- Card Number -->
                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <input type="text" name="cvc" class="form-control cvc" placeholder="CVC" data-by-field="cvc">
                    </div>
                </div>
                <!-- End Card Number -->

                <!-- First Name -->
                <div class="col-xs-12">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control name" placeholder="<?php if($_SESSION['user_name']){echo $_SESSION['user_name'];}else{echo "Full Name";}?>" data-by-field="name">
                    </div>
                </div>
                <!-- End First Name -->

                <!-- Address -->
                <div class="col-xs-12">
                    <div class="form-group">
                        <input type="text" name="street" class="form-control street" placeholder="<?php if($addressline1){ echo $addressline1;}else{echo "Address";}?>" data-by-field="street">
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
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <input type="text" name="city" class="form-control city" placeholder="<?php if($addresscity){ echo $addresscity;}else{echo "City";}?>" data-by-field="city">
                    </div>
                </div>
                <!-- End City -->
                <!-- State Code -->
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control state" placeholder="<?php if($addressstate){ echo $addressstate;}else{echo "State";}?>" name="state"  data-by-field="state">
                    </div>
                </div>
                <!-- State Post Code -->
                <!-- Post Code -->
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control zip" name="zip" placeholder="<?php if($addresszip){ echo $addresszip;}else{echo "Post Code";}?>" data-by-field="zip">
                    </div>
                </div>
                <!-- End Post Code -->

            </div>
            <!-- End Billing Form -->
            <div style="float:right;">
                    <button type="submit" class="btn btn-success updateSubscription" type="submit">Update details</button>
                    <button type="button" class="btn btn-danger cancelSubscription">Cancel subscription</button>
            </div>
        </form>

    </div>
    <!-- End Billing / Shipping Form -->

    </div>

    </div>
    </div>
    <!-- End Checkout Container -->

    </section>
    <!-- End Checkout -->




    </main>
    <!-- End Main -->
    <script src="<?php echo $webPath;?>card/lib/js/card.js"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
<?php include($docPath.'inc/footer.php'); ?>