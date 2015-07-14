<?php
include('inc/config.php');
include($docPath.'inc/header.php');
?>
    <!-- Main -->
    <main role="main">

        <!-- Page Heading -->
        <div class="page-heading">
            <div class="container">
                <header>
                    <h1>Order Confirmed</h1>
                </header>
            </div>
        </div>
        <!-- End Page Heading -->

        <!-- Thank You -->
        <section id="thankyou">

            <!-- Thank You Container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="well text-center">
                            <h2 style="color: #000000;">Thank you for your order</h2>
                            <h3>Your payment has been confirmed!</h3>
                            <p>You will receive an email confirmation shortly at <b>brian@trendingupward.com</b></p>
                        </div>

                        <h3 class="text-center">Order Summary</h3>
                        <!-- Cart Table -->
                        <table class="table cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="cart-title">SportsGuiders Membership</span>
                                    </td>
                                    <td>
                                        <span class="cart-price">$9</span>
                                    </td>
                                    <td>
                                        <span class="cart-qty-text">1</span>
                                    </td>
                                    <td>
                                        <span class="cart-total">$9</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span class="cart-total">$9</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Cart Table -->

                    </div>
                </div>
            </div>
            <!-- End Thank You Container -->

        </section>
        <!-- End Thank You -->


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
<?php include($docPath.'inc/footer.php'); ?>