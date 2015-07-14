<?php include('inc/config.php'); include($docPath.'inc/header.php'); ?>
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
                                <div class="col-xs-4">
                                    <div class="fa fa-phone"></div>
                                    <div class="type">Phone</div>
                                    <div class="info">01 555 5555</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="fa fa-map-marker"></div>
                                    <div class="type">Address</div>
                                    <div class="info">23 Twenty Three Street</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="fa fa-info"></div>
                                    <div class="type">E-Mail</div>
                                    <div class="info">support@sportsguiders.com</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Contacts Information -->

                        <!-- Contacts Form -->
                        <form>
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