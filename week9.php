<?php
include('inc/config.php');

$ReportDAO = new ReportDAO($db);
$PlayerDAO = new PlayerDAO($db);
$SubscriberDAO = new SubscriberDAO($db);

Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");
$error = '';
$success = '';
				if($SubscriberDAO->getSubscriberCardIdByEmail($_SESSION['user_email'])!=null){
					$customer = Stripe_Customer::retrieve($SubscriberDAO->getSubscriberByEmail($_SESSION['user_email'])['subscriber_id']);
				
					if($customer->subscriptions->total_count){
						//get customer subscription info
						$subscription = $customer->subscriptions->retrieve($SubscriberDAO->getSubscriptionIdByEmail($_SESSION['user_email']));
						$subscriptionName = $subscription->plan->id;
					}else{
						$subscriptionName='BASIC';
					}
				}

//modified to only show reports with id of 1
$Report = $ReportDAO->getLatestReport(true);
include($docPath.'inc/header.php');
?>
    <style>
        #quickNavSection {width:100%;background:#d83435;color:white;min-height:50px;box-shadow:0px 0px 15px black;}
        .quickNavUl {width:100%;margin-bottom:0px;}
        .quickNavUl li {display:inline;margin:3px;padding:5px;padding-bottom:0px;float:left;}
        .quickNavLink {padding:3px;border-radius:7px;color:white;text-decoration:none;height:30px!important;}
        .quickNavLink:hover {color:red;text-decoration:none;}
        .quickNavUl li a img:hover {border-bottom:1px solid white;}
        #mobileQuickNavUl li a {width:50px;margin:0px auto;color:white;font-size:22px;text-decoration:none;padding:10px;}
        #mobileQuickNavUl li a:hover {padding:10px;border-radius:25px;background:lightcoral;color:red;}
        #mobileQuickNavUl li {list-style-type:none;padding:7px;}
        .mobileQuickNavImg:hover {box-shadow:1px 1px 8px white;}
        .fixed {position:fixed;top:0px;z-index:99999999;}
    </style>

    <section id="quickNavSection" class="row" style="margin-left:0px;">
        <div id="quickNavDiv" class="col-xs-12 col-sm-2 col-md-2 col-lg-2" style="padding-left:0px;padding-right:0px;">
            <ul class="quickNavUl" style="padding-left:0px;display:none;">
                <li style="margin-top:10px;font-weight:900;">Quick Links</li>
                <li style="font-size:22px;border-left:1px solid indianred;height:35px;margin-top:8px;"></li>
            </ul>
            <div id="mobileQuickNav" style="cursor:pointer;padding-right:0px;display:none;">
                <i class="fa fa-align-justify fa-2x" style="padding:10px;"></i>
                <div style="padding:5px;padding-top:15px;float:right;background:white;height:50px;">
                    <a href="#" style="color:red;text-decoration:none;font-weight:900;padding:0px 15px;">Week 9</a>
                </div>
            </div>
            <ul id="mobileQuickNavUl" style="display:none;width:100%;">
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#waiver-adds"><img src="<?=$webPath?>images/quicknav/waiver-adds.png" style="height:30px;"> Waiver Adds</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#top-performers"><img src="<?=$webPath?>images/quicknav/top-performers.png" style="height:30px;"> Power Rankings</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#injury-report"><img src="<?=$webPath?>images/quicknav/injury-report.png" style="height:30px;"> Injury Report</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#trending"><img src="<?=$webPath?>images/quicknav/trending.png" style="height:30px;"> Trending</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#power-ranking"><img src="<?=$webPath?>images/quicknav/player-power-rankings.png" style="height:30px;" alt="ppr"> P Power Ranking</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#fun-facts"><img src="<?=$webPath?>images/quicknav/facts.png" style="height:30px;" alt="ff"> Fun Facts</a></div></li>
                <!--<li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#schedule"><img src="<?=$webPath?>images/quicknav/schedule.png" style="height:30px;" alt="sched"> Schedule</a></div></li>-->
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#team-rankings"><img src="<?=$webPath?>images/quicknav/team-power-rankings.png" style="height:30px;" alt=""> T Power Ranking</a></div></li>
                <li class=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#scores"><img src="<?=$webPath?>images/quicknav/score.png" style="height:30px;" alt="score"> Scores</a></div></li>
                <li style=""><div style="width:300px;margin:0px auto;"><a class="mobilequickNavLink" href="#standings"><img src="<?=$webPath?>images/quicknav/standings.png" style="height:30px;" alt="stand"> Standings</a></div></li>
            </ul>
        </div>
        <div id="fullNav" class="col-xs-10 col-sm-8 col-md-8 col-lg-8 text-center">
            <div class="wrapper" style="display:table;margin:0px auto;">
                <ul class="quickNavUl" style="padding-left:0px;display:none;">
                    <li><a class="quickNavLink" href="#waiver-adds" title="Waiver Adds"><img src="<?=$webPath?>images/quicknav/waiver-adds.png" style="height:30px;"></a></li>
                    <li><a class="quickNavLink" href="#top-performers" title="Top Performers"><img src="<?=$webPath?>images/quicknav/top-performers.png" style="height:30px;"></a></li>
                    <li><a class="quickNavLink" href="#injury-report" title="Injury Report"><img src="<?=$webPath?>images/quicknav/injury-report.png" style="height:30px;"></a></li>
                    <li><a class="quickNavLink" href="#trending" title="Trending"><img src="<?=$webPath?>images/quicknav/trending.png" style="height:30px;"></a></li>
                    <li><a class="quickNavLink" href="#power-ranking" title="Player Power Ranking"><img src="<?=$webPath?>images/quicknav/player-power-rankings.png" style="height:30px;" alt="ppr"></a></li>
                    <li><a class="quickNavLink" href="#fun-facts" title="Fun Facts"><img src="<?=$webPath?>images/quicknav/facts.png" style="height:30px;" alt="ff"></a></li>
                    <!--<li><a class="quickNavLink" href="#schedule" title="Upcoming Schedule"><img src="<?=$webPath?>images/quicknav/schedule.png" style="height:30px;" alt="sched"></a></li>-->
                    <li><a class="quickNavLink" href="#team-rankings" title="Team Rankings"><img src="<?=$webPath?>images/quicknav/team-power-rankings.png" style="height:30px;" alt=""></a></li>
                    <li><a class="quickNavLink" href="#scores" title="Scores"><img src="<?=$webPath?>images/quicknav/score.png" style="height:30px;" alt="score"></a></li>
                    <li><a class="quickNavLink" href="#standings" title="Standings"><img src="<?=$webPath?>images/quicknav/standings.png" style="height:30px;" alt="stand"></a></li>
                </ul>
            </div>
        </div>
        <div id="fullWeek" class="col-xs-0 col-sm-2 col-md-2 col-lg-2 text-center" style="padding-right:0px;">
            <div style="padding:5px;padding-top:15px;float:right;background:white;height:50px;">
                <a href="#" style="color:red;text-decoration:none;font-weight:900;padding:0px 15px;">Week 9</a>
            </div>
        </div>
    </section>

    <!-- PAGE HEADER -->
    <section class="page-header">
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div id="animate shake">
						<span class="desc uppercase" style="color:#d83435;font-weight:bold;font-size:20px;margin-bottom:44px!important;"><i>YOUR CURATED FANTASY FOOTBALL</i></span>
                        <h1 style="">Play<b>Book</b></h1>
						<hr class="grey" style="color:grey!important;width:50%;margin-top:44px!important;">
						<h2 class="" style="">WEEK 9</h2>
                        <div class="row" style="padding-top:20px;">
						<div class="col-xs-6 text-center">
							<button type="button" class="info-icon" style="width:auto;color:white;float:right;" data-toggle="tooltip" data-placement="bottom" title="Your Weekly Playbook is NOT for the fantasy football nerd who loves spending hours of his week studying the NFL. It is for the average Joe who lives a busy life and wants to stay informed about the NFL in regards to fantasy football. ">
								Who's it for&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
							</button>
						</div>
						<div class="col-xs-6 text-center" style="padding-left:0px;">
							<button type="button" class="info-icon" style="width:auto;color:white;float:left;" data-toggle="tooltip" data-placement="bottom" title="Your Weekly Playbook's purpose is to generally inform you of the NFL's happenings the week prior just in time for your league's waiver wire. Use it when you missed the games on Sunday or want to find players to pick up on the waiver wire and target in trades. ">
								What's it for&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
							</button>
						</div>
                    </div>
					<span class="desc uppercase" style="padding-top:10px;padding-bottom:15px;">No Ads.  No Slideshows.  Just Easy to Read.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/PAGE HEADER -->
<style>
    
		.info-icon {height:auto!important;}
		
    @media screen and (max-width: 1024px) {
        #prHeading {font-size:30px;}

    }
    @media screen and (max-width: 870px) {
        /*
        nav bar 3 column fix
        */
        #fullNav {padding:0px;}
        .quickNavUl li {margin:0px;}

    }
    @media screen and (max-width: 790px) {
        /*
        nav bar mobile week fix
        */
        #quickNavDiv {width:100%;}

        #prHeading {font-size:33px;}
    }
	@media screen and (max-width: 768px) {
        #prHeading {font-size:63px;}
    }
</style>
<script>
    function showTP(section){
        //setup noAnimate
        var noAnimate = true;

        if($(document).width()<=768 || noAnimate) {
            var thetitle = '.' + section + 'title';
            var theol = '.' + section + 'ol';
            var thecover = '.' + section + 'cover';

            if ($(theol).css('opacity') != '1') {
                //update elements with new values
                $(thetitle).css('margin-top', '50px');
                $(thetitle).css('opacity', '.8');
                $(theol).css('margin-top', '15px');
                $(theol).css('opacity', '1');
                $(thecover).css('opacity', '.75');
            }
        }
    }
</script>

<!-- WAIVER ADDS -->
<section id="waiver-adds" class="waiver-adds" style="padding:50px 15px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 heading-col">
                <img class="heading-icon wow tada" src="<?=$webPath?>images/report/waiver-winners-icon.png">
                <span class="heading wow fadeInRight">WAIVER <b>ADDS</b></span>

                <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Because that's how championships are won. Adding waiver players and continuing to improve the depth of your team throughout the year will allow you to sustain injuries, add value to trades, and most importantly - make a run in the playoffs.">
                    Why keep your team stocked fresh&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                </button>
            </div>
				<style>
					.desc {margin:0px!important;margin-top:15px!important;}
					.waiver-adds .stat .number {font-size:25px;}
				</style>
            <div class="col-xs-12 col-sm-8">
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">38%</div>
                    <div class="name">DeAngelo	Williams<span class="position">RB</span> <span class="team">Steelers</span></div>
                    <p class="desc">The most obvious waiver add of the year, DeAngelo will resume RB1 status with the season ending injury to Le'Veon Bell. Williams rushed for over 200 yards and 3 TDs when Bell was suspended in weeks 1 and 2. </p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">27%</div>
                    <div class="name">Malcom Floyd<span class="position">WR</span> <span class="team">Chargers</span></div>
                    <p class="desc">With Keenan Allen out indefinitely, Floyd will see an increase in targets and production. He had 92 yards and 2 TDs in week 8 and plays the Bears in week 9. </p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">15%</div>
                    <div class="name">Vernon Davis<span class="position">TE</span> <span class="team">49ers</span></div>
                    <p class="desc">As disappointing as Davis has been the past 2 years, he's worth a shot now. He's been traded to the Broncos and has enough skill to become a Manning favorite. If you have room, stash him and stay tuned. </p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">35%</div>
                    <div class="name">Derek	Carr<span class="position">QB</span> <span class="team">Raiders</span></div>
                    <p class="desc">With back to back games over 30 fantasy points, Carr and his easy upcoming schedule is an excellent BYE week QB replacement. </p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">5%</div>
                    <div class="name">Jacob	Tamme<span class="position">TE</span> <span class="team">Falcons</span></div>
                    <p class="desc">Matt Ryan might be getting over the absence of Tony Gonzalez quicker than we expected. Tamme has seen an increase in targets the last 4 weeks and is worth a pick up in deeper leagues if you're weak at TE. </p>
                </section>
            </div>
        </div>
    </div>
</section>
<!--/WAIVER WINNERS -->
<style>

.top-performers .position {padding:0px;padding-left:5px;}
@media screen and (max-width: 2000px) { 
	#top-performers .position ol li {font-weight:bold;}
 }

@media screen and (max-width: 1600px) { 
	#top-performers .position ol li {font-weight:bold;}
 }

/*Extra Large devices (large desktops, 1450px and up) */
@media screen and (max-width: 1450px) { 
	#top-performers .position ol li {}
 }
 
 /*Extra Large devices (large desktops, 1366px and up) */
@media screen and (max-width: 1366px) { 
	#top-performers .position ol li {font-weight:normal;}
 }
 
 /* Large devices (large desktops, 1200px and up) */
@media screen and (max-width: 1200px) { 
	#top-performers .position ol li {font-weight:bold;}
 }
 
 /* Medium devices (desktops, 992px and up) */
@media screen and (max-width: 992px) {
	#top-performers .position ol li {font-weight:bold;}
}
 
/* Small devices (tablets, 768px and up) */
@media screen and (max-width: 768px) {
	.top-performers .position {padding-left:5px;}
	#top-performers .position ol li {font-weight:bold;}
}

@media screen and (max-width: 420px) {
	.top-performers .position {padding-left:5px;}
	#top-performers .position ol li {font-weight:bold;}
	#top-performers .position ol {margin-top:15px;}
}
</style>
    <!-- TOP PERFORMERS -->
    <section id="top-performers" class="top-performers" style="padding:50px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img class="heading-icon wow bounceInUp" style="max-width:125px;" src="<?=$webPath?>images/report/top-performers-icon.png">
                    <span class="heading wow bounceInUp">TOP PERFORMERS</span>
					<h2 class="" style="color:#39404b;padding-bottom:7px;font-weight:bold;">Week 8</h2>
                    <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Because these guys are getting it done. You can read and listen to as many opinions as you want, but numbers don't lie. Below are facts. Having a quick glance at who the week's top performers were allows you to make right decisions the following week on who to target in trades, who to start and who to sit.">
                        Why should you care about these lists&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position qb wow fadeInLeft" onclick="showTP('qb');">
                        <span class="title qbtitle" onclick="showTP('qb');">Quarterback</span>
                        <ol class="qbol">
							<li>Drew Brees - 61</li>
							<li>Eli Manning - 52</li>
							<li>Carson Palmer - 40</li>
							<li>Derek Carr - 39.9</li>
							<li>Tom Brady - 39.5</li>
							<li>Alex Smith - 32.6</li>
							<li>Philip Rivers - 32.2</li>
							<li>Joe Flacco - 26.1</li>
							<li>Josh McCown - 25.2</li>
							<li>Matt Ryan - 25.1</li>


                        </ol>
                        <div class="cover qbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position wr wow fadeInUp"   onclick="showTP('wr');">
                        <span class="title wrtitle"  onclick="showTP('wr');">Wide Receiver</span>
                        <ol class="wrol">
                            <li>Odell Beckham Jr. - 37</li>
                            <li>Julio Jones - 26.7</li>
                            <li>Tavon Austin - 26</li>
                            <li>Malcom Floyd - 24.7</li>
                            <li>A.J. Green - 23.8</li>
                            <li>Brandin Cooks - 23.7</li>
                            <li>Julian Edelman - 23.6</li>
                            <li>Marques Colston - 23.4</li>
                            <li>Alshon Jeffery - 23.1</li>
                            <li>Willie Snead - 22</li>
                        </ol>
                        <div class="cover wrcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position rb wow fadeInRight" onclick="showTP('rb');">
                        <span class="title rbtitle " onclick="showTP('rb');">Running Back</span>
                        <ol  class="rbol">
							<li>Todd Gurley - 28.1</li>
							<li>Charcandrick West - 24.2</li>
							<li>Ronnie Hillman - 21.8</li>
							<li>Dion Lewis - 21.2</li>
							<li>C.J. Anderson - 20.4</li>
							<li>Devonta Freeman - 20.3</li>
							<li>Darren McFadden - 18.3</li>
							<li>Jonathan Stewart - 17.6</li>
							<li>Mark Ingram - 17.1</li>
							<li>Latavius Murray - 16.9</li>

                        </ol>
                        <div class="cover rbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position wr wow fadeInLeft" onclick="showTP('te');">
                        <span class="title tetitle" onclick="showTP('te');">Tight End</span>
                        <ol class="teol">
                            <li>Benjamin Watson - 25.7</li>
                            <li>Jacob Tamme - 21.8</li>
                            <li>Rob Gronkowski - 21.3</li>
                            <li>Greg Olsen - 16.9</li>
                            <li>Heath Miller - 16</li>
                            <li>Gary Barnidge - 14.8</li>
                            <li>Troy Niklas - 14.2</li>
                            <li>Travis Kelce - 13.9</li>
                            <li>Coby Fleener - 13.8</li>
                            <li>Luke Wilson - 11.1</li>

                        </ol>
                        <div class="cover tecover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position k wow fadeInUp" onclick="showTP('k');">
                        <span class="title ktitle" onclick="showTP('k');">Kicker</span>
                        <ol class="kol">
                            <li>Justin Tucker - 20</li>
                            <li>Adam Vinatieri - 17</li>
                            <li>Graham Gano - 14</li>
                            <li>Dan Bailey - 14</li>
                            <li>Blair Walsh - 13</li>
                            <li>Sebastian Janikowski - 12</li>
                            <li>Mike Nugent - 12</li>
                            <li>Stephen Gostkowski - 12</li>
                            <li>Kai Forbath - 12</li>
                            <li>Connor Barth - 11</li>
                        </ol>
                        <div class="cover kcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position ds wow fadeInRight" onclick="showTP('ds');">
                        <span class="title dstitle" onclick="showTP('ds');">Defense/Special</span>
                        <ol class="dsol">
                            <li>Texans - 19</li>
                            <li>Patriots - 16</li>
                            <li>Chiefs - 15</li>
                            <li>Rams - 12</li>
                            <li>Steelers - 12</li>
                            <li>Bengals - 11</li>
                            <li>Broncos - 11</li>
                            <li>Panthers - 9</li>
                            <li>Cowboys - 7</li>
                            <li>Vikings - 7</li>
                        </ol>
                        <div class="cover dscover"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/TOP PERFORMERS -->

    <!--INJURY REPORT-->
    <section id="injury-report" class="injury-report" style="padding:50px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 text-center">
                    <img class="heading-icon wow fadeInUp" src="<?=$webPath?>images/report/injury-report-icon.png">
                    <span class="heading wow fadeInDown">INJURY <b>REPORT</b></span>
					<h2 class="" style="color:#242a33;padding-bottom:7px;font-weight:bold;">Week 8</h2>
                    <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="We feel your pain. And theirs. Even worse, some people leave these injured bums in their starting lineups. Never again. The pain of losing to your annoying opponent this week will be much worse than what these guys are going through. Browse this list of this week's wounded to stay current on injuries.">
                        Ouch! But why&nbsp;<i class="fa fa-question-circle fa-3x white"></i>
                    </button>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-8">
                    <section class="player wow fadeIn" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#ffffff!important;">
                            <svg class="min" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="yellow" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">PIT</span>
                        </div>

                        <div class="name">Le'Veon<br>Bell<span class="position"></span> <span class="team">Steelers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">Season</span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
				</div>


                <div class="col-xs-12 col-sm-6 col-md-8">
                    <section class="stat player wow fadeIn" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#ffffff;">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="lightblue" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">SD</span>
                        </div>

                        <div class="name">Keenan<br>Allen<span class="position"></span> <span class="team">Chargers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Kidney</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">2-6 Weeks</span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
				</div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player wow fadeIn" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#22150C;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="lightblue" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">SD</span>
                        </div>

                        <div class="name">Brandon<br>Oliver <span class="position"></span> <span class="team">Chargers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Toe</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">1-4 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Doubtful</div>
                        </div>
                    </section>
                </div>
				<script>
				$('document').ready(function(){
					$('.moreInjurys').click(function(){
						if($('#extraInjuries').is(":hidden")){
							$('#extraInjuries').slideDown();
						}else{
							$('#extraInjuries').slideUp();
						}
					});
				});
				</script>
				<div class="col-xs-12 col-sm-6 col-md-8 text-center" style="float:right;">

					<div class="moreInjurys table-expand wow zoomInDown" style="width:100%;background:white;color:#d83435;cursor:pointer;font-size:2em;border-radius:4px">
						More Injuries<b style="color:#d83435;">+</b>
					</div>
				</div>
				<div id="extraInjuries" style="display:none;">
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#ffffff;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="purple" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">BAL</span>
                        </div>

                        <div class="name">Steve<br>Smith<span class="position"></span> <span class="team">Ravens</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Achilles</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">Season<span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="darkgreen" stroke="#002244">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NY</span>
                        </div>

                        <div class="name">Ryan<br>Fitzpatrick <span class="position"></span> <span class="team">Jets</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Hand</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="darkgreen" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NY</span>
                        </div>

                        <div class="name">Brandon<br>Marshall <span class="position"></span> <span class="team">Jets</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Ankle</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>	
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#CC6600" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">CHI</span>
                        </div>

                        <div class="name">Matt<br>Forte <span class="position"></span> <span class="team">Bears</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#CC6600" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">CHI</span>
                        </div>

                        <div class="name">Eddie<br>Royal <span class="position"></span> <span class="team">Bears</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>	
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="darkred" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">SF</span>
                        </div>

                        <div class="name">Reggie<br>Bush <span class="position"></span> <span class="team">49ers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">Season<span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
                </div>					
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="darkred" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">SF</span>
                        </div>

                        <div class="name">Mike<br>Davis<span class="position"></span> <span class="team">49ers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Doubtful</div>
                        </div>
                    </section>
                </div>					                				
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="indianred" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">CLE</span>
                        </div>

                        <div class="name">Brian<br>Hartline<span class="position"></span> <span class="team">Browns</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Concussion</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="blue" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">DET</span>
                        </div>

                        <div class="name">Calvin<br>Johnson<span class="position"></span> <span class="team">Lions</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Ankle</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="yellow" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NO</span>
                        </div>

                        <div class="name">Khiry<br>Robinson<span class="position"></span> <span class="team">Saints</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Leg</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">Season<span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#fff!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="lightgrey" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NY</span>
                        </div>

                        <div class="name">Larry<br>Donnell<span class="position"></span> <span class="team">Giants</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Neck</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>				
				</div>   <!--end extraInjuries container-->
            </div>
        </div>
    </section>
    <!--/INJURY REPORT-->
<div id="popupNonSubUser">
    <a id="popupNonSubUserLink" href="<?=$webPath;?>popupMailchimpSubscribe.php" style="">&nbsp;</a>
</div>
<div id="subUserData" style="">
<!--TRENDING-->
    <section  id="trending" class="trending" style="padding:50px 15px;padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;text-align:center;font-size:48px;line-height:32px;">Recent <span style="color:#d83435;">Trends</span></h4>
					
                        <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Trends mean everything. Athletes are streaky individuals and playing the games are just as much mental as they are physical. Try to start and/or acquire the players trending upwards, and ride them on their high. The guys in the downwards section can be traded for value, sat on your bench, or in some cases kicked off your squad. ">
                            Why do trends matter&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                        </button>
                </div>
            </div>
        </div>
    </section>
	
	<style>
	.trending .upwards .stats .table 
	</style>
    <section class="trending" style="padding:50px 15px;padding-top:10px;">
        <div class="container">
            <section class="col-xs-12 col-sm-6 upwards">
                <div class="row">
                    <div class="text-center">
                        <img class="heading-icon wow tada" src="<?=$webPath?>images/report/trending-upwards-icon.png">
                        <span class="heading wow fadeInLeft"><b>UPWARDS</b></span>
                        <div class="stats wow fadeIn" style="margin-top:10px;">
                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#01ad7f;">
                                        <th colspan="3" class="text-center" style="color:white;">Tom Brady, QB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>39.5</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>35</td>
                                    </tr>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>29.7</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#01ad7f;">
                                        <th colspan="3" class="text-center" style="color:white;">Ronnie Hillman, RB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>21.8</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>17.5</td>
                                    </tr>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>4.5</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#01ad7f;">
                                        <th colspan="3" class="text-center" style="color:white;">Demaryius Thomas, WR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>21.3</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>16.6</td>
                                    </tr>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>8</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#01ad7f;">
                                        <th colspan="3" class="text-center" style="color:white;">Coby Fleener, TE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-up"></i></td>
										<td>13.8</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>6.2</td>
                                    </tr>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>3.5</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-xs-12 col-sm-6 downwards">
                <div class="row">
                    <div class="text-center">
                        <img class="heading-icon wow tada" src="<?=$webPath?>images/report/trending-downwards-icon.png">
                        <span class="heading wow fadeInRight"><b>DOWNWARDS</b></span>
                        <div class="stats wow fadeIn" style="margin-top:10px;">
                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#d83435;">
                                        <th colspan="3" class="text-center" style="color:white;">Andy Dalton, QB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-down"></i></td>
										<td>32.9</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>12.8</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#d83435;">
                                        <th colspan="3" class="text-center" style="color:white;">Chris Ivory, RB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>31.6</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>15.7</td>
                                    </tr>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>8.6</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#d83435;">
                                        <th colspan="3" class="text-center" style="color:white;">Calvin Johnson, WR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>26.1</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>17.1</td>
                                    </tr>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>11</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#d83435;">
                                        <th colspan="3" class="text-center" style="color:white;">Tyler Eifert, TE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 6</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <th>Week 7</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <th>Week 8</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>5.9</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--/TRENDING-->

    <!--FUN FACTS-->
    <section id="fun-facts" class="fun-facts clearfix" style="padding:50px 15px;">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xs-12 text-center wow jello">
                    <span class="heading">FUN<b>FACTS</b></span>

                    <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Because knowledge is power. Use our Fun Facts section to wow your friends, family and co-workers with your superior NFL knowledge. Use these facts in conversation to reign as Most Knowledgeable among your peers.">
                        Why read these&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center wow rubberBand">
                        <span class="category">FANTASY</span>
                        <span class="info">Rob Gronkowski has 6 double-digit scoring fantasy games this year. The only other TE with 6? Gary Barnidge. They've combined for 13 TDs. </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center wow rubberBand">
                        <span class="category">HISTORY</span>
                        <span class="info">For the first time ever, four NFL teams are 7-0. The Panthers, Patriots, Bengals and Broncos. Get excited, you're witnessing dominance. </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center wow rubberBand">
                        <span class="category">LIFE</span>
                        <span class="info">Kwon Alexander found out his little brother had been shot and killed just 48 hours before taking the field Sunday. Kwon finished with 11 tackles, 1 INT and 1 forced fumble.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FUN FACTS-->

<!--POWER RANKING-->
<section id="power-ranking" class="power-ranking" style="padding:50px 15px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
                <span class="heading wow slideInUp" style="font-size:56px;"><i>NFL PLAYER</i> POWER<br><b>RANKINGS</b></span>

                <button type="button" class="info-icon" style="width:auto;color:white;" data-toggle="tooltip" data-placement="bottom" title="Use our Player Power Ranking section to know who the real studs are. Don't let someone fool you into trading one of these guys away. If you have one of these players, hold on to him. If you can trade to get them, do it. These guys will score big points the rest of the year.">
                    Why the player power list&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                </button>
            </div>

            <div class="col-xs-12 col-sm-4 wow fadeInDown">
                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">QB</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Tom Brady</th>
                    </tr>
                    <tr>
                        <th>2. Aaron Rodgers</th>
                    </tr>
                    <tr>
                        <th>3. Carson Palmer</th>
                    </tr>
                    <tr>
                        <th>4. Andy Dalton</th>
                    </tr>
                    <tr>
                        <th>5. Cam Newton</th>
                    </tr>					
                    </tbody>
                </table>

                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">WR</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Julio Jones</th>
                    </tr>
                    <tr>
                        <th>2. DeAndre Hopkins</th>
                    </tr>
                    <tr>
                        <th>3. Antonio Brown</th>
                    </tr>
                    <tr>
                        <th>4. A.J. Green	</th>
                    </tr>
                    <tr>
                        <th>5. Odell Beckham Jr.</th>
                    </tr>					
                    </tbody>
                </table>

                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">RB</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Todd Gurley</th>
                    </tr>
                    <tr>
                        <th>2. Devanta Freeman</th>
                    </tr>
                    <tr>
                        <th>3. Adrian Peterson</th>
                    </tr>
                    <tr>
                        <th>4. DeAngelo Williams</th>
                    </tr>
                    <tr>
                        <th>5. Darren McFadden</th>
                    </tr>					
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-4 wow fadeInDown">
                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">TE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Rob Gronkowski</th>
                    </tr>
                    <tr>
                        <th>2. Greg Olsen</th>
                    </tr>
                    <tr>
                        <th>3. Gary Barnidge</th>
                    </tr>
                    <tr>
                        <th>4. Tyler Eifert</th>
                    </tr>
                    <tr>
                        <th>5. Travis Kelce</th>
                    </tr>					
                    </tbody>
                </table>

                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">K</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Brandon McManus</th>
                    </tr>
                    <tr>
                        <th>2. Stephen Gostkowski</th>
                    </tr>
                    <tr>
                        <th>3. Steven Hauschka</th>
                    </tr>
                    <tr>
                        <th>4. Robbie Gould</th>
                    </tr>
                    <tr>
                        <th>5. Justin Tucker</th>
                    </tr>					
                    </tbody>
                </table>

                <table class="stats table table-hover">
                    <thead>
                    <tr>
                        <th colspan="4" class="text-center">DST</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1. Broncos</th>
                    </tr>
                    <tr>
                        <th>2. Panthers</th>
                    </tr>
                    <tr>
                        <th>3. Seahawks</th>
                    </tr>
                    <tr>
                        <th>4. Rams</th>
                    </tr>
                    <tr>
                        <th>5. Cardinals</th>
                    </tr>					
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--/POWER RANKING-->
    <!--UPCOMING SCHEDULE
    <section id="schedule" class="schedule" style="padding:50px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="heading wow slideInUp"><i>EASIEST</i> UPCOMING<b>SCHEDULE</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know which players will be playing the worst defensive in coming weeks. Playing a poor defensive is always a quick fix to a struggling player. Now might be the time to buy cheap on a player who has been struggling on one of these teams.">
                        <img src="<?=$webPath?>images/report/info-icon-white.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInLeft">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#00338D" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">BUF</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#A5ACAF" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">OAK</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInDown">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#A71930" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">ATL</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#9F8958" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">NO</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInRight">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#004953" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">PHI</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#773141" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">WAS</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInLeft">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#008E97" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">MIA</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#4F2683" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">MIN</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInUp">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#002244" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">DAL</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#002C5F" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">IND</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="game clearfix wow fadeInRight">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#0B2265" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NYG</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#002244" stroke="none">
                                <path d="M731 1489 c-228 -44 -411 -188 -526 -413 -77 -149 -81 -248 -12 -299
                                18 -14 71 -39 118 -56 47 -18 98 -43 112 -57 33 -31 61 -84 50 -95 -4 -4 -106
                                -32 -227 -62 -120 -31 -223 -60 -228 -65 -9 -9 35 -413 48 -434 8 -13 95 -9
                                159 7 120 32 166 83 192 214 14 71 19 81 38 81 16 0 23 -9 33 -44 43 -162 244
                                -236 441 -164 29 11 89 45 133 75 44 30 95 61 114 69 40 17 96 18 111 3 5 -5
                                34 -9 64 -7 l54 3 42 62 c129 193 158 471 73 706 -122 332 -465 540 -789 476z
                                m249 -894 c35 -18 55 -71 41 -107 -13 -35 -58 -68 -92 -68 -15 0 -41 12 -58
                                26 -26 21 -31 33 -31 69 0 36 5 48 31 69 35 29 67 33 109 11z m-618 -176 c-2
                                -17 -10 -33 -16 -35 -21 -8 -241 -32 -248 -28 -5 3 -8 14 -8 24 0 15 12 21 58
                                30 31 7 82 18 112 25 30 7 67 14 81 14 23 1 25 -2 21 -30z m-20 -169 c-5 -60
                                -30 -110 -70 -137 -35 -23 -123 -46 -134 -35 -10 10 -31 182 -23 190 8 8 168
                                30 205 28 23 -1 25 -4 22 -46z"/>
                                </g>
                            </svg>

                            <span class="city">STL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/UPCOMING SCHEDULE-->

    <!-- TEAM POWER RANKINGS -->
    <section id="team-rankings" class="team-rankings" style="padding:50px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 heading-col">
                    <img class="heading-icon wow tada" src="<?=$webPath?>images/report/power-rankings-icon.png">
                    <span id="prHeading" class="heading wow fadeInRight"><i>NFL TEAMS</i> POWER <b>RANKINGS</b></span>

                    <button type="button" class="info-icon" style="width:auto;padding-bottom:20px;" data-toggle="tooltip" data-placement="bottom" title="Nobody passes the ball to themselves and scores a touchdown. Offensive lines, defensive lines, and coaches matter too. Browse through our Team Power Ranking sections to know where the synergy is at and acquire players off these teams. They have something to play for. ">
                        Why does team power matter&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                    </button>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix">
                        <div class="helmet" style="width:65px;height:65px;background:#FFB612;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="grey" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">NE</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">1.</span> Patriots</span>
                    </section>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix">
                        <div class="helmet" style="width:65px;height:65px;background:#C60C30;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="green" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">GB</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">2.</span> Packers</span>
                    </section>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                        <div class="helmet" style="width:65px;height:65px;background:#69BE28;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="purple" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">CAR</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">3.</span> Panthers</span>
                    </section>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                        <div class="helmet" style="width:65px;height:65px;background:#A5ACAF;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#002C5F" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">DEN</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">4.</span> Broncos</span>
                    </section>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet" style="width:65px;height:65px;background:#B0B7BC;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#CC6600" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">CIN</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">5.</span> Bengals</span>
                    </section>
					</div>
					<div class="col-xs-6 col-sm-3">
					<section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet" style="width:65px;height:65px;background:#B0B7BC;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="red" stroke="none">
                                <path d="M576 1484 c-352 -79 -598 -421 -573 -797 10 -148 51 -276 120 -380
                                l42 -62 54 -3 c30 -2 59 2 64 7 15 15 71 14 111 -3 19 -8 70 -39 114 -69 44
                                -30 104 -64 133 -75 197 -72 398 2 441 164 10 35 17 44 33 44 19 0 24 -10 38
                                -81 26 -131 72 -182 192 -214 64 -16 151 -20 159 -7 13 21 57 425 48 434 -5 5
                                -108 34 -228 65 -121 30 -223 58 -227 62 -11 11 17 64 50 95 14 14 65 39 112
                                57 47 17 100 42 118 56 69 51 65 150 -12 299 -101 196 -252 330 -440 390 -103
                                33 -249 41 -349 18z m123 -900 c26 -21 31 -33 31 -69 0 -36 -5 -48 -31 -69
                                -37 -32 -77 -33 -113 -5 -38 30 -49 64 -35 106 20 62 96 81 148 37z m655 -159
                                c64 -14 118 -25 121 -25 8 0 6 -38 -3 -44 -7 -4 -227 20 -248 28 -6 2 -14 18
                                -16 35 -6 39 -5 39 146 6z m1 -138 l100 -13 -3 -64 c-2 -35 -7 -80 -11 -99 -7
                                -34 -9 -36 -42 -33 -46 4 -119 41 -141 72 -18 25 -40 127 -31 143 5 9 5 9 128
                                -6z"/>
                                </g>
                            </svg>
                            <span class="city">ARI</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">6.</span> Cardinals</span>
                    </section>
                </div>

            </div>
        </div>
    </section>
    <!--/TEAM POWER RANKINGS -->
<!--NFL SCORES-->
<section id="scores" class="scores" style="padding:50px 15px;">
<div class="container">
<div class="row">
    <div class="col-xs-12 text-center">
		<h2 class="" style="color:white;padding-bottom:7px;font-weight:bold;">Week 8</h2>
        <span class="heading wow slideInUp">NFL<b>SCORES</b></span>
        <button type="button" class="info-icon" style="width:auto;color:white;" data-toggle="tooltip" data-placement="bottom" title="Understanding how a player got his points is the best way to determine long term stability and measure the clutch factor. The easiest way to do that is to glance through these scores and know just what kind of game your players were in this past weekend.">
            Why do scores matter&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
        </button>
    </div>
</div>
<style>
    .removeHelmet {background:transparent!important;box-shadow:none!important;}
    .tightenScore {margin-top:40px!important;}
    .gameScore {margin-bottom:15px!important;border-bottom:1px solid #888888;}
</style>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="game gameScore clearfix wow zoomInDown">
            <div class="helmet left loss removeHelmet">
                <span class="city">Dolphins</span>
                <span class="score tightenScore">7</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right win removeHelmet">
                <span class="city">Patriots</span>
                <span class="score tightenScore">36</span>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="game gameScore clearfix wow zoomInDown">
            <div class="helmet left loss removeHelmet">
                <span class="city">Lions</span>
                <span class="score tightenScore">10</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right win removeHelmet">
                <span class="city">Chiefs</span>
                <span class="score tightenScore">45</span>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="game gameScore clearfix wow zoomInDown">
            <div class="helmet left loss removeHelmet">
                <span class="city">Chargers</span>
                <span class="score tightenScore">26</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right win removeHelmet">
                <span class="city">Ravens</span>
                <span class="score tightenScore">29</span>
            </div>
        </div>
    </div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInDown">
        <div class="helmet left win removeHelmet">
            <span class="city">Cardinals</span>
            <span class="score tightenScore">34</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">Browns</span>
            <span class="score tightenScore">20</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left win removeHelmet">
            <span class="city">Vikings</span>
            <span class="score tightenScore">34</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">Bears</span>
            <span class="score tightenScore">20</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">Bengals</span>
            <span class="score tightenScore">16</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Steelers</span>
            <span class="score tightenScore">10</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">Titans</span>
            <span class="score tightenScore">6</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Texans</span>
            <span class="score tightenScore">20</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">Giants</span>
            <span class="score tightenScore">49</span>
        </div>

        <div class="vs">AT</div>
        <div class="helmet right win removeHelmet">
            <span class="city">Saints</span>
            <span class="score tightenScore">52</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">49ers</span>
            <span class="score tightenScore">6</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Rams</span>
            <span class="score tightenScore">27</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left win removeHelmet">
            <span class="city">Buccaneers</span>
            <span class="score tightenScore">23</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">Falcons</span>
            <span class="score tightenScore">20</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">Jets</span>
            <span class="score tightenScore">20</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Raiders</span>
            <span class="score tightenScore">34</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">Seahawks</span>
            <span class="score tightenScore">13</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Cowboys</span>
            <span class="score tightenScore">12</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInUp">
        <div class="helmet left loss removeHelmet">
            <span class="city">Packers</span>
            <span class="score tightenScore">10</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Broncos</span>
            <span class="score tightenScore">29</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInUp">
        <div class="helmet left loss removeHelmet">
            <span class="city">Colts</span>
            <span class="score tightenScore">26</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">Panthers</span>
            <span class="score tightenScore">29</span>
        </div>
    </div>
</div>

</div>
</div>
</section>

<!-- NFL STANDINGS -->
<section id="standings" class="standings" style="padding:50px 15px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <span class="heading wow slideInUp">NFL<b>STANDINGS</b></span>

                <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Absolutely. Use our standings to quickly assess which players have something to play for this week. Players who have clinched playoff spots are about as useful to you as players on a BYE, and starting a player whose team needs a win this week is often a better play than starting a player whose team is out of contention.">
                    Do standings matter&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                </button>
            </div>
        </div>

        <style>
            #afcTeams tr:nth-child(even) {background:lightgrey;}
            #nfcTeams tr:nth-child(even) {background:lightgrey;}
        </style>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="table-expand wow zoomInDown" data-toggle="collapse" data-target="#afcTeams" aria-expanded="false" aria-controls="collapseExample">
                    AFC Teams <b>+</b>
                </div>

                <table class="table table-striped wow zoomInDown" id="afcTeams">
                <thead>
                <tr>
                    <th>AFC West</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Denver Broncos</td>
                    <td>7</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Oakland Raiders</td>
                    <td>4</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Kansas City Chiefs</td>
                    <td>3</td>
                    <td>5</td>
                    <td>0</td>
                </tr>				
               <tr>
                    <td>San Diego Chargers</td>
                    <td>2</td>
                    <td>6</td>
                    <td>0</td>
                </tr>												
                </tbody>
                <thead>
                <tr>
                    <th>AFC East</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>New England Patriots</td>
                    <td>7</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>New York Jets</td>
                    <td>4</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Buffalo Bills</td>
                    <td>3</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Miami Dolphins</td>
                    <td>3</td>
                    <td>4</td>
                    <td>0</td>
                </tr>												
                </tbody>
                <thead>
                <tr>
                    <th>AFC North</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Cincinnati Bengals</td>
                    <td>7</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Pittsburgh Steelers</td>
                    <td>4</td>
                    <td>4</td>
                    <td>0</td>
                </tr>	
                <tr>
                    <td>Cleveland Browns</td>
                    <td>2</td>
                    <td>6</td>
                    <td>0</td>
                </tr>					
                <tr>
                    <td>Baltimore Ravens</td>
                    <td>2</td>
                    <td>6</td>
                    <td>0</td>
                </tr>							
                </tbody>
                <thead>
                <tr>
                    <th>AFC South</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Indianapolis Colts</td>
                    <td>3</td>
                    <td>5</td>
                    <td>0</td>
                </tr>
				<tr>
                    <td>Houston Texans</td>
                    <td>3</td>
                    <td>5</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Jacksonville Jaguars</td>
                    <td>2</td>
                    <td>5</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Tennessee Titans</td>
                    <td>1</td>
                    <td>6</td>
                    <td>0</td>
                </tr>		
                </tbody>
                </table>
            </div>
        <div class="col-xs-12 col-sm-6">
            <div class="table-expand wow zoomInUp" data-toggle="collapse" data-target="#nfcTeams" aria-expanded="false" aria-controls="collapseExample">
                NFC Teams <b>+</b>
            </div>

            <table class="table table-striped wow zoomInDown" id="nfcTeams">
                <thead>
                <tr>
                    <th>NFC West</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Arizona Cardinals</td>
                    <td>6</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>St. Louis Rams</td>
                    <td>4</td>
                    <td>3</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Seattle Seahawks</td>
                    <td>4</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>San Francisco 49ers</td>
                    <td>2</td>
                    <td>6</td>
                    <td>0</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <th>NFC East</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>New York Giants</td>
                    <td>4</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Washington Redskins</td>
                    <td>3</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Philadelphia Eagles</td>
                    <td>3</td>
                    <td>4</td>
                    <td>0</td>
                </tr>									
                <tr>
                    <td>Dallas Cowboys</td>
                    <td>2</td>
                    <td>5</td>
                    <td>0</td>
                </tr>			
			
                </tbody>
                <thead>
                <tr>
                    <th>NFC North</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Tie</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Green Bay Packers</td>
                    <td>6</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Minnesota Vikings</td>
                    <td>5</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Chicago Bears</td>
                    <td>2</td>
                    <td>5</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Detroit Lions</td>
                    <td>1</td>
                    <td>7</td>
                    <td>0</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <th>NFC South</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>	
                <tr>
                    <td>Carolina Panthers</td>
                    <td>7</td>
                    <td>0</td>
                    <td>0</td>
                </tr>		
				<tr>
                    <td>Atlanta Falcons</td>
                    <td>6</td>
                    <td>2</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>New Orleans Saints</td>
                    <td>4</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Tampa Bay Buccaneers</td>
                    <td>3</td>
                    <td>4</td>
                    <td>0</td>
                </tr>				
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/NFL STANDINGS -->
</div>
<div class="wow rollIn" style="width:100%;padding:10px;background:#d83435;color:white;min-height:50px;">
    <p style="text-align:center;color:white;font-family:'Raleway', sans-serif;font-size:18px;text-transform:uppercase;font-weight:500;">That was <span style="font-size:22px;font-weight:900;">quick</span> and <span style="font-size:22px;font-weight:900;">painless</span> and now you’re super knowledgeable. It’s that <span style="font-size:22px;font-weight:900;">easy</span>. Good luck this week!</p>
</div>

    <script>
		var skipPopup = '<?=$_SESSION['user_email'];?>';
        var clickTrack;
        var mobileOffset = 500;
        var sOffset = $("#quickNavSection").offset().top;
		var popupOffset = $("#popupNonSubUser").offset().top-mobileOffset;
		var popupHeight = $("#popupNonSubUser").height();
        var shareheight = $("#quickNavSection").height() + 50;
        $(window).scroll(function() {
            var scrollYpos = $(document).scrollTop();
            if (scrollYpos > sOffset - shareheight) {
                $("#quickNavSection").addClass("fixed");
				var subName = '<?=$subscriptionName;?>';
				if(subName==''){
					if(scrollYpos > popupOffset - popupHeight){
						$("#popupNonSubUserLink").addClass("fancybox");
						$("#popupNonSubUserLink").addClass("fancybox.ajax");
                        if(clickTrack!=true){
							if(skipPopup==''){
                                // this is a keyboard workaround for mobile devices and popups, due to the scrollTop activation of fancybo
                                if($(document).width()<='414') {
                                    //$('body').scrollTop(0);
                                }
                            $('#popupNonSubUserLink').fancybox().trigger('click');
							}
                            //disable popup, one time use instead of destroy
                            clickTrack=true;
                        }
						//$('#subUserData').fadeOut();
					}
				}
            }else{
                $("#quickNavSection").removeClass("fixed");
            }
        });

        //mobile quick nav
        $(window).resize(function(){
			var docWidth = $('#quickNavSection').width();
            if(docWidth<='790'){
                $('#fullNav, #fullWeek').hide();
                $('.quickNavUl').hide();
                $('#mobileQuickNav').fadeIn();
            }else{
                $('#fullNav, #fullWeek').fadeIn();
                $('#mobileQuickNav').hide();
                $('.quickNavUl').fadeIn();
            }
        });

        $('#mobileQuickNav').click(function(){
            if($('#mobileQuickNavUl').is(':hidden')){
                $('.quickNavUl').fadeOut(function(){
                    $('#mobileQuickNavUl').slideDown();
                });
            }else{
                $('#mobileQuickNavUl').slideUp(function(){
                    if($(document).width()>='790'){
                        $('.quickNavUl').fadeIn();
                    }
                });
            }

        });

        $('.mobilequickNavLink').click(function(){
            $('#mobileQuickNavUl').slideUp();
        });

        $(document).ready(function(){

            //smooth scroll
            $(function() {
                $('a[href*=#]:not([href=#])').click(function() {
                    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top
                            }, 1000);
                            return false;
                        }
                    }
                });
            });

            //quick nav ui
			var docWidth = $('#quickNavSection').width();
            if(docWidth<='790'){
				console.log('less than 790');
                $('#fullNav, #fullWeek').hide();
                $('.quickNavUl').hide();
                $('#mobileQuickNav').fadeIn();
            }else{
				console.log('big than 790');
                $('#mobileQuickNav').hide();
                $('.quickNavUl').fadeIn();
                $('#fullNav, #fullWeek').fadeIn();
            }

            //check for noAnimate flag
            var noAnimate = true;
            if(noAnimate){
                showTP('qb');
                showTP('wr');
                showTP('rb');
                showTP('te');
                showTP('k');
                showTP('ds');
            }
			
			
			$(".fancybox").fancybox({
            }); // fancybox

        });
    </script>
	<style>
	#fancybox-overlay[style] {
		background-color: blue !important;
	}
	</style>
    <!--/NFL SCORES-->
<?php include($docPath.'inc/footer.php'); ?>
