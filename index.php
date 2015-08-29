<?php include('inc/config.php');
$pageID = 'home';
include($docPath.'inc/header.php');

?>
<style>
    .mainHead {font-size:104px;font-weight:100;}
    .subHead {font-size:26px;}
    @media screen and (max-width: 950px) {
        .mainHead {font-size:54px;font-weight:100;}
        .subHead {font-size:22px;margin-top:20px;}
    }
    @media screen and (max-width: 750px) {
        .mainHead {font-size:44px;font-weight:100;}
        .subHead {font-size:20px;margin-top:15px;}
    }
    @media screen and (max-width: 625px) {
        .mainHead {font-size:38px;font-weight:100;}
        .subHead {font-size:18px;margin-top:15px;}
        .navbar-brand {padding:0px}
    }
    @media screen and (max-width: 425px) {
        .mainHead {font-size:38px;font-weight:100;margin-top:30px;}
        .subHead {font-size:16px;margin-top:15px;}
    }
</style>
<!-- Revolution Slider -->
<div class="revolution_container">
    <div class="revolution">
        <ul>

            <li data-transition="ZoomIn" data-slotamount="6">
                <!--<img src="images/slide1.jpg" alt="">-->
                <img src="<?=$webPath;?>img/sg-main-banner.jpg" alt="">

                <div class="tp-caption"
                     data-x="center"
                     data-y="180"

                     data-start="1000"
                     data-speed="600"
                    >
                   <!-- <h1 style="" class="text-center mainHead">
                        Fantasy Football
                    </h1>-->
                </div>
                <div class="tp-caption"
                     data-x="center"
                     data-y="345"

                     data-start="1000"
                     data-speed="600"
                    >
                    <h2 style="" class="text-center subHead">
                        Fantasy Football Advice and Curated Reports
                    </h2>
                </div>

            </li>

        </ul>
    </div>
</div>
<!-- End Revolution Slider -->
<header class="page-heading">
    <!--<h1 class="text-center"><a href="#how-it-works" style="color: #ffffff;">Fantasy Football Winning Is Easy!</a></h1>-->
    <a href="<?php echo $webPath;?>gain-access/" class="btn btn-white btn-lg btn-rounded" style="color:red;">
        Get Started <b>Here</b>
    </a>
    <a href="<?=$webPath;?>sample-recap/" class="btn btn-lg btn-white btn-rounded btn-iconned" style="color:red;"><i class="fa fa-search fa-1x"></i> View Sample</a>
</header>
<section id="process">
    <a name="how-it-works"></a>
    <!-- Work Process Container -->
    <div class="container">

        <div class="row" style="margin-top: 50px;">

            <!-- Steps -->
            <div class="steps">

                <!-- Step -->
                <div class="col-sm-4">
                    <a href="#cutClutter" style="text-decoration:none;">
                        <div class="step">
                            <div class="icon">
                                <span class="icon-documents"></span>
                            </div>
                            <h4>1. Cut the Clutter</h4>
                        </div>
                    </a>
                </div>
                <!-- End Step -->

                <!-- Step -->
                <div class="col-sm-4">
                    <a href="#saveTime" style="text-decoration:none;">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-trophy"></span>
                        </div>
                        <h4>2. Save Time and Win</h4>
                    </div>
                    </a>
                </div>
                <!-- End Step -->

                <!-- Step -->
                <div class="col-sm-4">
                    <a href="#goodLife" style="text-decoration:none;">
                    <div class="step">
                        <div class="icon">
                            <span class="icon-happy"></span>
                        </div>
                        <h4>3. Enjoy the Good Life</h4>
                    </div>
                    </a>
                </div>
                <!-- End Step -->
            </div>
            <!-- End Steps -->

        </div>

    </div>
    <!-- End Work Process Container -->

</section>
<style>
    #welcome {background-image:url('img/recap-bg.jpg');background-size:cover;background-repeat:no-repeat;}
</style>
<section id="welcome" class="welcome section-primary"  style="margin-top: 50px;">
    <!-- Welcome Container -->
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-md-6" style="padding-bottom: 50px;padding-top:50px;">

                <!-- Welcome Content -->
                <div class="content wow fadeInUp animated" style="visibility: visible;">
                    <!-- Welcome Header -->
                    <header>
                        <h4 style="font-size:48px;color:white;">The <b style="color:#d83435;">Recap</b>
                        </h4>
                        <h3 style="color:white;">Our weekly recap will save you time and help you win by providing you simplified information in an easy-to-read format at just the right time every week.</h3>
                        <hr class="hr-left">
                    </header>
                    <!-- End Welcome Header -->
                    <p style="color:white;">This recap is going to make your week so much easier! We provide you with only the high level information that matters, when it matters. We never try to bate you into clicking more links, and we will never show you an annoying slideshow. Our experts will curate a special report for you every week that will help you stay informed while maintaining a life outside of the game.</p>
                </div>
                <style>
                    .redHover {color:white;}
                    .redHover:hover {color:red;}
                </style>
                <p>
                    <a href="<?=$webPath;?>sample-recap/" class="btn btn-lg btn-rounded btn-iconned redHover"><i class="fa fa-search fa-2x"></i> View Sample</a>
                    <a href="<?=$webPath;?>gain-access/" class="btn btn-secondary btn-lg btn-rounded btn-iconned"><i class="fa fa-check"></i> Get Started</a>
                </p>
            </div>
            <!-- End Welcome Content -->
            <div class="col-sm-0 col-md-6" style="padding-bottom: 50px;">
            <!-- Welcome Image -->
<!--            <img src="images/welcome.png" class="img-welcome wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible; -webkit-animation-delay: 0.2s;">-->
            <!-- End Welcome Image -->
            </div>
        </div>
    </div>
    <!-- End Welcome Container -->

</section>

<!--Start step container-->
    <!--First step container-->
    <section id="welcome" class="welcome section-primary"  style="background: white;">
        <div class="container">
             <div class="row">
                    <div id="cutClutter" class="col-md-6  wow fadeInUp animated" style="padding-bottom: 50px;padding-top:50px;">
                        <h4 style="font-size:48px;">Cut <span style="color:#d83435;">the Clutter</span></h4>
                        <p style="padding-top:10px;">
                            Our team of experts help you cut the informational clutter out of your life by curating an easy-to-read Recap that you will rely on every week. The Recaps contain only relevant content and useful information that is necessary to making winning decisions week in and week out.
                        </p>
                        <p>
                            Right now, you’re most likely bouncing from site to site. Going one place for your scores, and another to find out who did well last week. You’re probably going to 7-10 different sites to find the most basic information about the past weeks’ games.
                        </p>
                        <p>
                            Every Tuesday we will send you an email. This email will notify you that The Recap is ready for you to view. You simply click the link, browse The Recap, and in less than 5 minutes you’re the most knowledgeable person in your league about last weeks’ games.
                        </p>
                        <p>
                            Forget the clutter, and the bouncing around, and sign up to receive The Recap today!
                        </p>
                    </div>
                 <div id="" class="col-md-6  wow fadeInUp animated" style="padding-bottom: 50px;padding-top:50px;">
                     <div style="width:50%;margin:0px auto;">
                        <img src="<?=$webPath;?>images/cut.png" style="max-height:200px;">
                     </div>
                 </div>
             </div>
        </div>
    </section>
    <section id="welcome" class="welcome section-primary"  style="background: #f6f8fc;">
        <div class="container">
            <div class="row">
                <div id="saveTime" class="col-md-6  wow fadeInUp animated" style="padding-bottom: 50px;padding-top:50px;">
                    <h4 style="font-size:48px;">Save <span style="color:#d83435">Time and Win</span></h4>
                    <p style="padding-top:10px;">
                        You become the most knowledgeable person in your league without wasting your time by clicking on link after link and reading hours worth of useless information. You will use your knowledge to dominate the waiver wire, make the right trades, and start the right players every week.
                    </p>
                    <p>
                        It’s imperative to fantasy football success that you have well-rounded insight when it comes to the NFL. Focusing on just your players and your teams can lead to a fear of making the right move when it comes time.
                    </p>
                    <p>
                        Use The Recap to stay informed in the most simple way possible!
                    </p>
                </div>
                <div id="" class="col-md-6 wow fadeInUp animated" style="padding-bottom: 50px;padding-top:50px;">
                    <div style="width:50%;margin:0px auto;">
                        <img src="<?=$webPath;?>images/save.png" style="max-height:200px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="welcome" class="welcome section-primary"  style="background: white;">
        <div class="container">
            <div class="row">
                <div id="goodLife" class="col-md-6 wow fadeInUp animated" style="padding-bottom: 50px;padding-top:50px;">
                    <h4 style="font-size:48px;">Enjoy <span style="color:#d83435;">the Good Life</span></h4>
                    <p style="padding-top:10px;">
                        This is why we do what we do. We want you to spend more time enjoying your friends, family and co-workers and less time panicking over not knowing enough. Playing fantasy football is a good thing, and it is way more fun when you’re winning.
                    </p>
                    <p>
                        There’s no longer a need to sacrifice your quality time in order to stay a step ahead of the rest of your league. You no longer have to spend several hours researching every week because we've done that work for you. You'll keep your work and family lives in order with the time you've decided to save.
                    </p>
                    <p>
                        Winning is easy with SportGuiders!
                    </p>
                </div>
                <div id="" class="col-md-6 wow fadeInUp animated" style="padding-bottom: 50px;">
                    <div style="width:50%;margin:0px auto;">
                        <img src="<?=$webPath;?>images/enjoy.png" style="max-height:200px;margin-top:50px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End step container-->
<!-- Main -->
<main role="main">

    <!-- Newsletter -->
    <section id="newsletter" class="section-secondary newsletter text-center">

        <!-- Newsletter Container -->
        <div class="container">

            <div class="row wow fadeInUp">
                <div class="col-md-6 col-md-offset-3 newsletterSection">

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
                                            $(document).ready(function(){
                                                $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>You have signed up for the newsletter...</p>', {
                                                    type: 'success',
                                                    delay: 3000,
                                                    allow_dismiss: true,
                                                    offset: {from: 'top', amount: 20}
                                                });
                                                $('.newsletterSection').html('<h1 style="background:#d83435;color:white;">Thank You!!</h1>');
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