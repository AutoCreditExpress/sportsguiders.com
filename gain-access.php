<?php require 'inc/config.php';
include($docPath.'inc/header.php');
?>
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


                        <!-- Billing / Shipping Form -->
                        <div class="well form-container active">
                            <div class="card-wrapper"></div>
                            <form action="">

                            <!-- Billing Form -->
                            <h3 class="text-center">Billing Details</h3>
                            <div class="row">

                                <!-- Card Number -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="number" class="form-control" placeholder="Card Number">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <input type="text" name="expiry" class="form-control" placeholder="MM/YY">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- Card Number -->
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <input type="text" name="cvc" class="form-control" placeholder="CVC">
                                    </div>
                                </div>
                                <!-- End Card Number -->

                                <!-- First Name -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <!-- End First Name -->

                                <!-- Address -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Street Address">
                                    </div>
                                </div>
                                <!-- End Address -->

                                <!-- Address 2 -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>
                                </div>
                                <!-- End Address 2 -->

                                <!-- City -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <!-- End City -->

                                <!-- Post Code -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Post Code">
                                    </div>
                                </div>
                                <!-- End Post Code -->

                                <h3 class="text-center">Login Details</h3>

                                <!-- Email Address -->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <!-- End Email Address -->

                                <!-- End Phone -->

                                <!-- password 1 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <!-- End password 1 -->

                                <!-- password 2 -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <!-- End password 1 -->

                            </div>
                            <!-- End Billing Form -->
                            </form>

                        </div>
                        <!-- End Billing / Shipping Form -->

                        <p class="place-order" style="text-align: right;">
                            <a href="<?php echo $webPath;?>thankyou/    " class="btn btn-primary btn-lg btn-rounded">Place Order</a>
                        </p>

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