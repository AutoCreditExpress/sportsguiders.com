<?php require 'inc/config.php';
$pageID = 'home';
include($docPath.'inc/header.php');
?>

<!-- Revolution Slider -->
<div class="revolution_container">
    <div class="revolution">
        <ul>

            <li data-transition="ZoomIn" data-slotamount="6">
                <img src="images/slide1.jpg" alt="">
                <div class="tp-caption"
                     data-x="center"
                     data-y="120"

                     data-start="1000"
                     data-speed="600"
                    >
                    <h1 style="font-size:64px;font-weight:100;" class="text-center">
                        Winning is Easy
                    </h1>
                </div>
                <div class="tp-caption"
                     data-x="center"
                     data-y="230"

                     data-start="1000"
                     data-speed="600"
                    >
                    <h2 style="font-size:16px;" class="text-center">
                        Know everything you need to know in just minutes
                    </h2>
                </div>

            </li>

        </ul>
    </div>
</div>
<!-- End Revolution Slider -->
<header class="page-heading">
    <h1 class="text-center"><a href="#how-it-works" style="color: #ffffff;">See How It Works</a></h1>
</header>
<section id="process">
    <a name="how-it-works"></a>
    <!-- Work Process Container -->
    <div class="container">

        <div class="row" style="margin-top: 100px; ">

            <!-- Steps -->
            <div class="steps">

                <!-- Step -->
                <div class="col-md-3 col-sm-6">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-documents"></span>
                        </div>
                        <h4>1. Cut the Clutter</h4>
                        <p>
                            Our team of experts help you cut the informational clutter out of your life by curating
                            easy-to-read reports that you will rely on every week. The reports contain only relevant
                            content and useful information.
                        </p>
                    </div>
                </div>
                <!-- End Step -->

                <!-- Step -->
                <div class="col-md-3 col-sm-6">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-trophy"></span>
                        </div>
                        <h4>2. Save Time and Win</h4>
                        <p>
                            You become the most knowledgeable person in your league without wasting your time by clicking
                            on link after link and reading hours worth of useless information. You use your knowledge
                            to dominate the waiver wire, make the right trades, and start the right players every week.
                        </p>
                    </div>
                </div>
                <!-- End Step -->

                <!-- Step -->
                <div class="col-md-3 col-sm-6">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-happy"></span>
                        </div>
                        <h4>3. Enjoy the Good Life</h4>
                        <p>
                            You no longer have to spend several hours researching every week because we've done that
                            work for you. You'll keep your work and family lives in order with the time you've decided
                            to save. Winning is easy with SportGuiders!
                        </p>
                    </div>
                </div>
                <!-- End Step -->

                <!-- Step -->
                <div class="col-md-3 col-sm-6">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-lock"></span>
                        </div>
                        <h4>Gain Access Now</h4>
                        <p>
                            Having Guider Access will give you an advantage in your fantasy matchups by keeping you
                            informed about the entire league in the most simple way possible.
                            <br/>
                            <br/>
                            <a href="<?php echo $webPath;?>gain-access/" class="btn btn-red btn-lg btn-rounded">
                                Get Started <b>Here</b>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- End Step -->

            </div>
            <!-- End Steps -->

        </div>

    </div>
    <!-- End Work Process Container -->

</section>
<section id="welcome" class="welcome section-primary"  style="margin-top: 100px; background: #f6f8fc;">

    <!-- Welcome Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-6" style="padding-bottom: 100px;">

                <!-- Welcome Content -->
                <div class="content wow fadeInUp animated" style="visibility: visible;">
                    <!-- Welcome Header -->
                    <header>
                        <h2 style="color: #101010;">The <b>Report</b></h2>
                        <h3>Our weekly report will ... something blah and some other stuff and some other stuff that is really cool.</h3>
                        <hr class="hr-left">
                    </header>
                    <!-- End Welcome Header -->

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <p>
                    <a href="#" class="btn btn-lg btn-rounded btn-iconned"><i class="fa fa-search"></i> View Sample</a>
                    <a href="#" class="btn btn-secondary btn-lg btn-rounded btn-iconned"><i class="fa fa-check"></i> Get Started</a>
                </p>
            </div>
            <!-- End Welcome Content -->

            <!-- Welcome Image -->
            <img src="images/welcome.png" class="img-welcome wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible; -webkit-animation-delay: 0.2s;">
            <!-- End Welcome Image -->

        </div>
    </div>
    <!-- End Welcome Container -->

</section>

<!-- Main -->
<main role="main">

    <!-- Newsletter -->
    <section id="newsletter" class="section-secondary newsletter text-center">

        <!-- Newsletter Container -->
        <div class="container">

            <div class="row wow fadeInUp">
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