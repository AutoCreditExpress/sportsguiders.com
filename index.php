<?php include('inc/config.php');
$pageID = 'home';
include($docPath.'inc/header.php');

?>
<style>
    .mainHead {font-size:104px;font-weight:100;}
    .subHead {font-size:26px;}
    @media screen and (max-width: 950px) {
        .mainHead {font-size:54px;font-weight:100;}
        .subHead {font-size:14px;margin-top:20px;}
    }
    @media screen and (max-width: 750px) {
        .mainHead {font-size:44px;font-weight:100;}
        .subHead {font-size:12px;margin-top:30px;}
    }
    @media screen and (max-width: 625px) {
        .mainHead {font-size:38px;font-weight:100;}
        .subHead {font-size:10px;margin-top:30px;}
        .navbar-brand {padding:0px}
    }
    @media screen and (max-width: 425px) {
        .mainHead {font-size:38px;font-weight:100;margin-top:30px;}
        .subHead {font-size:10px;margin-top:30px;}
    }
</style>
<!-- Revolution Slider -->
<div class="revolution_container">
    <div class="revolution">
        <ul>

            <li data-transition="ZoomIn" data-slotamount="6">
                <img src="images/slide1.jpg" alt="">
                <div class="tp-caption"
                     data-x="center"
                     data-y="180"

                     data-start="1000"
                     data-speed="600"
                    >
                    <h1 style="" class="text-center mainHead">
                        Winning is Easy
                    </h1>
                </div>
                <div class="tp-caption"
                     data-x="center"
                     data-y="345"

                     data-start="1000"
                     data-speed="600"
                    >
                    <h2 style="" class="text-center subHead">
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
                        <h2 style="color: #101010;">The <b>Report</b>
                            <a href="<?=$webPath;?>sample-recap/" class="btn btn-lg btn-rounded btn-iconned"><i class="fa fa-search fa-2x"></i> View Sample</a>
                        </h2>
                        <h3>Our weekly report will save you time and help you win by providing you simplified information in an easy-to-read format at just the right time every week.</h3>
                        <hr class="hr-left">
                    </header>
                    <!-- End Welcome Header -->
                    <p>This report is going to make your week so much easier! We provide you with only the high level information that matters, when it matters. We never try to bate you into clicking more links, and we will never show you an annoying slideshow. Our experts will curate a special report for you every week that will help you stay informed while maintaining a life outside of the game.</p>
                </div>
                <p>
                    <a href="<?=$webPath;?>gain-access/" class="btn btn-secondary btn-lg btn-rounded btn-iconned"><i class="fa fa-check"></i> Get Started</a>
                </p>
            </div>
            <!-- End Welcome Content -->
            <div class="col-md-6" style="padding-bottom: 100px;">
            <!-- Welcome Image -->
            <img src="images/welcome.png" class="img-welcome wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible; -webkit-animation-delay: 0.2s;">
            <!-- End Welcome Image -->
            </div>
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
                    <script>
                        function submitNewsletterInfo(){
                            var email = $('.email').val();
                            if(email!="") {
                                $.get("recordNewsletterInfo.php?email=" + email, function (data, status) {
                                    if (status == 'success') {
                                        //alert('Successful'+data);
                                        $('#newsletter').fadeOut(400);
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
                            <input placeholder="Email Address" class="form-control email" type="email" name="email">
                        </div>
                        <button class="btn btn-primary newslettersumbit">
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