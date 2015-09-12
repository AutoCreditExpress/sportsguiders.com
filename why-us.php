<?php
include('inc/config.php');

include($docPath.'inc/header.php');

?>


        <!-- Shop Process -->
        <section id="process" class="section-primary" style="background:black;">
            <!-- Shop Process Container -->
            <div class="container" style="background-image: url('<?=$webPath;?>img/sg-why-us-banner.jpg');background-size:auto 100%;background-repeat:no-repeat;background-position:right;">
                <div class="row" style="padding: 50px 0px;">
                    <!-- Steps -->

                        <div class="col-md-12">
                            <h4 style="font-size:40px;color:white;">Why <span style="color:#d83435;">Sportsguiders&trade;?</span></h4>
                        </div>
                        <div class="col-md-6">
                            <p style="padding-top:10px;color:white;">Fantasy sports are a <i>good thing</i>. They bring and keep people together, and season by season real relationships are built and grown. Fantasy sports are a healthy hobby and a fun experience. </p>
                            <p style="padding-top:10px;color:white;">The problem is that most people have to sacrifice <i>family time</i> and <i>work productivity</i> in order to compete at a high level. Solving this problem is why SportsGuidersTM was created. </p>
                        </div>
                        <div class="col-md-6">
                        </div>

                </div>
                <!-- End Shop Process Container -->
        </section>
        <!-- End Shop Process -->


        <!-- Shop Process -->
        <section id="process" class="section-primary">
            <!-- Shop Process Container -->
            <div class="container">
                <div class="row"  style="padding: 50px 0px 0px 0px;">
                    <!-- Steps -->

                    <div class="col-md-6">
                        <h4 style="font-size:40px;">What <span style="color:#d83435;">do we offer?</span></h4>
                        Each week we send out “The Recap”. This includes several sections that will fully inform you about the week prior and allow you to make wise decisions about your team moving forward. The best part is - you can read it in just 5 minutes!
                        <h2 style="color:#465366;font-size:14px;margin-top:30px;"><span id="offerMore" class="btn btn-red btn-lg btn-rounded" style="cursor:pointer;">RECAP BENEFITS</span><a href="<?=$webPath;?>sample-recap/"  class="btn btn-red btn-lg btn-rounded" style="margin-left:10px;">VIEW SAMPLE RECAP</a></h2>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('#offerMore').click(function(){
                                if($('#offerMoreInfo').is(":hidden")){
                                    $('#offerMoreInfo').slideDown();
                                }else{
                                    $('#offerMoreInfo').slideUp();
                                }
                            });
                        });
                    </script>
                    <div class="col-md-6">
                        <img src="<?=$webPath;?>img/sg-why-us-001.png" style="max-height:200px;float:right;">
                    </div>
                    <div class="col-md-12">
                    </div>
                    <style>
                        .recapBenefits {font-size:18px;}
                    </style>
                    <div id="offerMoreInfo" class="col-md-12" style="padding:25px;display:none;">
                        <div class="col-md-12">
                            <p class="recapBenefits">The Recap has several sections built to inform you about the prior week as fully and quickly as possible. It is 100% easier to read than some cluttered web page or slow-moving slide show. </p>
                            <p class="recapBenefits">Below you will find exactly what sections are held in The Recap, and how you can use them to master your way to champion of your league.</p>
                            <ol style="font-size:30px;">
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#top-performers"><h4 style="font-size:28px;">Top <span style="color:#d83435;">Performers</span></h4></a>
                                    <p>Use this section to know who dominated the world of fantasy football last weekend. Having a quick recap of who the weeks' top performers were allows you to make quick decisions the following week on who to target in trades, who to start and who to sit. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#waiver-adds"><h4 style="font-size:28px;">Waiver <span style="color:#d83435;">Adds</span></h4></a>
                                    <p>Use this section to know who to pick up off your league's waiver wire this week. Adding waivers and continuing to improve the depth of your team throughout the year will allow you to sustain injuries, add value to trades, and most importantly - make a run in the playoffs. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#injury-report"><h4 style="font-size:28px;">Injury <span style="color:#d83435;">Report</span></h4></a>
                                    <p>Use this section to know who you need to keep an eye on throughout the week. Never have an injured player in your starting lineup again by taking a minute to browse this list of damaged players each week. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#trending"><h4 style="font-size:28px;">Trending <span style="color:#d83435;">Upwards</span></h4></a>
                                    <p>Use this section to get a quick glance at who has been performing well consistently over the last 3 weeks. These players aren't flaky, you can trust them to score some point this week. If you don't own them, try trading for them this week. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#trending"><h4 style="font-size:28px;">Trending <span style="color:#d83435;">Downwards</span></h4></a>
                                    <p>Use the Trending Downwards section to become aware of players you should try to trade away or keep on your bench. A player who has had 3 bad weeks in a row doesn't deserve a spot in your starting lineup.</p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#power-ranking"><h4 style="font-size:28px;">Player <span style="color:#d83435;">Power Rankings</span></h4></a>
                                    <p>Use this section to know who the real studs are. Don't let someone fool you in a trade just because someone had one hot week. If you have one of these players, hold on to him. If you can trade to get them, do it. These guys will score big points the rest of the year.</p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#fun-facts"><h4 style="font-size:28px;">Fun <span style="color:#d83435;">Facts</span></h4></a>
                                    <p>Use this section to wow your friends, family and co-workers with your superior NFL knowledge. Use these facts in conversation to reign as Most Knowledgeable among your peers. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#scores"><h4 style="font-size:28px;">NFL <span style="color:#d83435;">Scores</span></h4></a>
                                    <p>Use this section as a point of reference for all of the NFL scores last week. Staying informed on who won and by how much will give you the ability to make insightful fantasy plays next week. </p>
                                </li>
                                <li>
                                    <a href="<?=$webPath;?>sample-recap/#standings"><h4 style="font-size:28px;">NFL <span style="color:#d83435;">Standings</span></h4></a>
                                    <p>Use this section to quickly assess which players have something to play for this week. Players on who have clinched playoff spots are about as useful to you as players on a BYE, and starting a player whose team needs a win this week is often a better play than starting a player whose team is out of contention. </p>
                                </li>
                                <!--<li>
                                    <h4 style="font-size:28px;">Easiest <span style="color:#d83435;">Upcoming Schedule</span></h4>
                                    <p>Use this section to know which players will be playing the worst defensive in coming weeks. Playing a poor defensive is always a quick fix to a struggling player. Now might be the time to buy cheap on a player who has been struggling on one of these teams. </p>
                                </li>-->
                                <li>
                                    <h4 style="font-size:28px;">NFL <span style="color:#d83435;">Teams Power Rankings</span></h4>
                                    <p>Use this section to know which NFL teams will dominate the rest of the way. Finding stud players on prospering teams is a recipe for success in fantasy football.</p>
                                </li>
                            </ol>
                        </div>
                    </div>

                </div>
                <!-- End Shop Process Container -->
        </section>
        <!-- End Shop Process -->

    <!-- Shop Process -->
    <section id="process" class="section-primary" style="background: white;">
        <!-- Shop Process Container -->
        <div class="container">
            <div class="row" style="padding: 50px 0px;">
                <!-- Steps -->

                <div class="col-md-6">
                    <h4 style="font-size:38px;color:#d83435;">Why <span style="color:#d83435;">do we limit the number of available subscriptions?</span></h4>
                    <p style="padding-top:10px;">We limit the number of available subscriptions for two reasons. First, as a SportsGuiders Subscriber, we want you to win your league, and that’s not possible if everybody in your league is a SportsGuiders Subscriber. If everybody in your league used our service, it would be of less benefit to you than if you were the only person in your league to use it. This is also why we don’t suggest telling the people in your league about us. We also limit the number of available subscriptions to ensure that we have an adequate amount of experts on staff to properly service and chat with all of our paid subscribers. Our goal is to provide excellent service to an exclusive group of people who want our help. </p>
                </div>

                <!-- Steps -->

                <div class="col-md-6">
                    <h4 style="font-size:38px;color:#d83435;">How <span style="color:#d83435;">are our subscriptions so cheap?</span></h4>
                    <p style="padding-top:10px;">We keep our costs down for your sake. We want to provide you with service that will make playing fantasy football more fun and less stressful for you. Purchasing expensive images, logo rights and headshots from big name companies only drives up the price of your subscription. We’re simple people, with a simple plan. Give you an excellent product at an extremely fair price. </p>
                </div>
            </div>
            <!-- End Shop Process Container -->
    </section>
    <!-- End Shop Process -->

    <!-- Shop Process -->
    <section id="process" class="section-primary" style="background: #f6f8fc;">
        <!-- Shop Process Container -->
        <div class="container">
            <div class="row" style="padding: 50px 0px;">
                <!-- Steps -->

                <div class="col-md-6">
                    <h4 style="font-size:38px;color:#d83435;">Isn't <span style="color:#d83435;">fantasy football just luck?</span></h4>
                    <p style="padding-top:10px;">No! There is a lot of skill, knowledge and decision making that majorly effects the game of fantasy football. There is an element of luck involved, but there is a reason why those who know more and study more do better, consistently. The good news is that, with us, you can spend a whole lot less time studying and a whole lot more time winning. </p>
                </div>

                <!-- Steps -->

                <div class="col-md-6">
                    <h4 style="font-size:38px;color:#d83435;">Who <span style="color:#d83435;">qualifies as a SportsGuiders expert?</span></h4>
                    <p style="padding-top:10px;">We don’t just let anyone build our reports and chat with you about winning your league. We have professionals on staff who know the weather, the trends, the coaches, the risks and more! You can trust us with your toughest decisions. We’ll help put your best team in play. </p>
                </div>
            </div>
            <!-- End Shop Process Container -->
    </section>
    <!-- End Shop Process -->

<?php include($docPath.'inc/footer.php');?>