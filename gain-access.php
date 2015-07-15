<?php require 'inc/config.php';
include($docPath.'inc/header.php');



$SubscriberDAO=new SubscriberDAO($db);
?>
    <link rel="stylesheet" href="css/bootstrap-min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="css/bootstrapValidator-min.css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap-side-notes.css" />
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
    <script src="js/bootstrap-min.js"></script>
    <script src="js/bootstrap-formhelpers-min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator-min.js"></script>
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
                $.get("cancelSubscription.php", function(data, status){
                    if(status=="success"){
                        location.assign('index.php?Message=Subscription_Canceled');
                    }else{
                        alert('Cancel has failed, please contact support');
                    }
                });
            });

        });
    </script>
    <script type="text/javascript">
        // this identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_live_Iouvsrt1T1v64gKETw0Q0FMP');

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
                    alert('month:'+expiryMonth+'Year:'+expiryYear);
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
                    <div class="col-sm-6">
                        <div class="alert alert-default">
                            Already have an account? <a href="<?php echo $webPath;?>login/">Click here to login</a>
                        </div>

                        <!-- Checkout Form -->
                        <div class="checkout-form">
                            <h2 class="text-center" style="color: #465366;">Getting Started</h2>

                            <p>
                                It only cost $9 for a year to gain access to The Recap and other expert advice that will make you a Fantasy Football winner.
                            </p>
                            <table class="table">
                                <tr class="subtotal">
                                    <td><b>Yearly Membership</b></td>
                                    <td>$9</td>
                                </tr>
                                <tr class="shipping">
                                    <td><b>Lifelong Friendship</b></td>
                                    <td>Free</td>
                                </tr>
                                <tr class="total">
                                    <td><b>Total</b></td>
                                    <td>$9</td>
                                </tr>
                            </table>
                        </div>
                        <!-- End Checkout Form -->

                    </div>

                    <div class="col-sm-6">
                    <noscript>
                        <div class="bs-callout bs-callout-danger">
                            <h4>JavaScript is not enabled!</h4>
                            <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
                        </div>
                    </noscript>
                    <?php
                    //if there is post data and the user has already been created and is active, update the card info
                    Stripe::setApiKey("sk_live_N965e7oe6KUUhB9J6TQ93ovI");
                    $error = '';
                    $success = '';
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
                            if($SubscriberDAO->getSubscriberByEmail($_POST['email'])!=null){
                                //user exist in table, display error
                                $error = '<div class="alert alert-danger">
			                                <strong>Error!</strong> User name already exists, please use a different email address.</div>';
                            }else{
                                //
                                $Registration = new Registration();

                                //$Registration->registerNewUser($_POST['name'],substr($_POST['name'],0,strpos($_POST['name']," ")),substr($_POST['name'],strpos($_POST['name']," ")),$_POST['email'],$_POST['password'],$_POST['password2']);
                                //create user in table
                                $SubscriberDAO->createSubscriber(array(
                                    'email' => $_POST['email'],
                                    'address' => $_POST['street'],
                                    'city' => $_POST['city'],
                                    'state' => $_POST['state'],
                                    'zip' => $_POST['zip'],
                                    'create_date' => date("Y-m-d")
                                ));

                                $customer = Stripe_Customer::create(array(
                                        "source" => $token,
                                        "plan" => "test",
                                        "email" => $_POST['email'])
                                );

                                //////if no error caught display success message
                                $success = '<div class="alert alert-success">
                                <strong>Success!</strong> Your payment was successful.</div>';

                                ///change the location of the page
                                //echo "<script>location.assign('index.php?Message=Payment_successful');</script>";
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
                        <div class="well form-container active">
                            <div class="card-wrapper"></div>
                            <form method="post" id="payment-form">
                            <?php
                            ///hidden value for user registration
                            if($_POST and !$_SESSION) {
                                   echo '<input type = "hidden" value = "1" name="register">';
                            }
                            ?>
                            <!-- Billing Form -->
                            <h3 class="text-center">Billing Details</h3>
                            <div class="row">

                                <!-- Card Number -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="number" class="form-control number" placeholder="Card Number" data-by-field="number">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <input type="text" name="expiry" class="form-control expiry" placeholder="MM/YY"  data-by-field="expiry">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <input type="text" name="cvc" class="form-control cvc" placeholder="CVC" data-by-field="cvc">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- First Name -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control name" placeholder="Full Name" data-by-field="name">
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

                                <h3 class="text-center">Login Details</h3>

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
                                        <input type="password" name="password" min="6" class="form-control password" placeholder="Password"  data-by-field="password">
                                    </div>
                                </div>
                                <!-- End password 1 -->

                                <!-- password 2 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="password" name="password2" min="6" class="form-control password2" placeholder="Confirm Password"  data-by-field="password2">
                                    </div>
                                </div>
                                <!-- End password 1 -->

                            </div>
                            <!-- End Billing Form -->
                                <div style="float:right;">
                                        <button class="btn btn-success payNow" type="submit" style="">Place Order</button>
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



        <!-- Newsletter -->
        <section id="newsletter" class="section-light newsletter text-center">

            <!-- Newsletter Container -->
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <!-- Newsletter Header -->
                        <header>
                            <h3>Stay informed</h3>
                            <h4>Subscribe to our newsletter</h4>
                        </header>
                        <!-- End Newsletter Header -->

                        <!-- Newsletter Form -->
                        <form class="form-inline">
                            <div class="form-group">
                                <input placeholder="Email Address" class="form-control" type="email">
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
<?php include($docPath.'inc/footer.php'); ?>