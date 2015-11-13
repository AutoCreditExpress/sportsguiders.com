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
2        #mobileQuickNavUl li a:hover {padding:10px;border-radius:25px;background:lightcoral;color:red;}
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
                    <a href="#" style="color:red;text-decoration:none;font-weight:900;padding:0px 15px;">Week 4</a>
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
                <a href="#" style="color:red;text-decoration:none;font-weight:900;padding:0px 15px;">Week 4</a>
            </div>
        </div>
    </section>

    <!-- PAGE HEADER -->
    <section class="page-header">
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div id="animate shake">
                        <i class="fa fa-book"></i>
                        <h1 style="">THE<b>RECAP</b></h1>
                        <span class="desc" style="padding-top:10px;">Your Curated Fantasy Football Guide</span>
                        <div class="row" style="padding-top:20px;">
						<div class="col-xs-6 text-center">
							<button type="button" class="info-icon" style="width:auto;color:white;float:right;" data-toggle="tooltip" data-placement="bottom" title="The Recap is NOT for the fantasy football nerd who loves spending hours of his week studying the NFL. It is for the average Joe who lives a busy life and wants to stay informed about the NFL in regards to fantasy football. ">
								Who's it for&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
							</button>
						</div>
						<div class="col-xs-6 text-center" style="padding-left:0px;">
							<button type="button" class="info-icon" style="width:auto;color:white;float:left;" data-toggle="tooltip" data-placement="bottom" title="The Recap's purpose is to generally inform you of the NFL's happenings the week prior just in time for your league's waiver wire. Use it when you missed the games on Sunday or want to find players to pick up on the waiver wire and target in trades. ">
								What's it for&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
							</button>
						</div>
                            </div>
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
        var noAnimate = '<?=$_GET['noAnimate'];?>';

        if($(document).width()<=768 || noAnimate) {
            var thetitle = '.' + section + 'title';
            var theol = '.' + section + 'ol';
            var thecover = '.' + section + 'cover';

            if ($(theol).css('opacity') != '1') {
                //update elements with new values
                $(thetitle).css('margin-top', '50px');
                $(thetitle).css('opacity', '.8');
                $(theol).css('margin-top', '30px');
                $(theol).css('opacity', '1');
                $(thecover).css('opacity', '.75');
            } else {
                //reset elements
                $(thetitle).css('margin-top', '300px');
                $(thetitle).css('opacity', '1');
                $(theol).css('margin-top', '800px');
                $(theol).css('opacity', '0');
                $(thecover).css('opacity', '0');
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
                    <div class="number" style="margin-bottom:0px;">3.1%</div>
                    <div class="name">Kamar Aiken<span class="position">WR</span> <span class="team">Ravens</span></div>
                    <p class="desc">With Steve Smith hurt, and likely out, Aiken becomes the top WR option in Baltimore. He could also just be a one-hit wonder with the arrival of WR Chris Givens, but Aiken is worth a stash.</p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">22.2%</div>
                    <div class="name">Ronnie Hillman<span class="position">RB</span> <span class="team">Broncos</span></div>
                    <p class="desc">A shakeup is in need for the Broncos run game. C.J. Anderson keeps underperforming and Hillman broke loose this week. He's a possible starter and might be an interesting flex play moving forward.</p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">3.7%</div>
                    <div class="name">Ted Ginn<span class="position">WR</span> <span class="team">Panthers</span></div>
                    <p class="desc">No, you aren't having a 2008 flash back. Ginn seems to be the number 1 WR target for Cam Newton and might be worthy of a roster spot in deeper leagues.</p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">1.2%</div>
                    <div class="name">Leonard Hankerson<span class="position">WR</span> <span class="team">Falcons</span></div>
                    <p class="desc">Roddy White is becoming a non-factor, making Hankerson the clear number 2  WR for Matt Ryan and the high scoring Falcons. Of course, he still has to compete with Julio and Devonta for touches, so plug him in only when needed.</p>
                </section>
                <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                    <div class="number" style="margin-bottom:0px;">44.6%</div>
                    <div class="name">Antonio Gates<span class="position">TE</span> <span class="team">Chargers</span></div>
                    <p class="desc">Due to his suspension, Gates is currently under the radar and owned in less than 50% of leagues. If he is available, jump on him and hope Rivers connects with his all time favorite target for another year.</p>
                </section>
            </div>
        </div>
    </div>
</section>
<!--/WAIVER WINNERS -->

    <!-- TOP PERFORMERS -->
    <section id="top-performers" class="top-performers" style="padding:50px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img class="heading-icon wow bounceInUp" style="max-width:125px;" src="<?=$webPath?>images/report/top-performers-icon.png">
                    <span class="heading wow bounceInUp">TOP PERFORMERS</span>

                    <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="Because these guys are getting it done. You can read and listen to as many opinions as you want, but numbers don't lie. Below are facts. Having a quick glance at who the week's top performers were allows you to make right decisions the following week on who to target in trades, who to start and who to sit.">
                        Why should you care about these lists&nbsp;<i class="fa fa-question-circle fa-3x red"></i>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position qb wow fadeInLeft" onclick="showTP('qb');">
                        <span class="title qbtitle" onclick="showTP('qb');">Quarterback</span>
                        <span class="TPmobileClickNotification">Click Here</span>

                        <ol class="qbol">
                            <li>Philip Rivers - 32.8</li>
                            <li>Sam Bradford - 31.9</li>
                            <li>Drew Brees - 28.2</li>
                            <li>Josh McCown - 26.7</li>
                            <li>Eli Manning - 26.3</li>
                            <li>Nick Foles - 24.9</li>
                            <li>Kirk Cousins - 23.9</li>
                            <li>Andy Dalton - 23</li>
                            <li>Cam Newton - 22.3</li>
                            <li>Blake Bortles - 21.7</li>

                        </ol>
                        <div class="cover qbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position wr wow fadeInUp"   onclick="showTP('wr');">
                        <span class="title wrtitle"  onclick="showTP('wr');">Wide Receiver</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="wrol">
                            <li>Tavon Austin - 27</li>
                            <li>Vincent Jackson - 26.2</li>
                            <li>Allen Hurns - 23.6</li>
                            <li>Jeremy Maclin - 20.8</li>
                            <li>DeAndre Hopkins - 20.7</li>
                            <li>Leonard Hankerson - 19.8</li>
                            <li>Mike Wallace - 18.3</li>
                            <li>Brandon Marshall - 16.8</li>
                            <li>Kenny Stills - 16.6</li>
                            <li>Kamar Aiken - 16.2</li>

                        </ol>
                        <div class="cover wrcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position rb wow fadeInRight" onclick="showTP('rb');">
                        <span class="title rbtitle " onclick="showTP('rb');">Running Back</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol  class="rbol">
                            <li>Devonta Freeman - 38.2</li>
                            <li>Le'Veon Bell - 29.4</li>
                            <li>Chris Ivory - 28.9</li>
                            <li>Doug Martin - 27.</li>
                            <li>Jeremy Hill - 25.8</li>
                            <li>Duke Johnson Jr. - 23.7</li>
                            <li>Ronnie Hillman - 21.5</li>
                            <li>Todd Gurley - 21.4</li>
                            <li>C.J. Spiller - 21.3</li>
                            <li>Adrian Peterson - 21.1</li>
                        </ol>
                        <div class="cover rbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position wr wow fadeInLeft" onclick="showTP('te');">
                        <span class="title tetitle" onclick="showTP('te');">Tight End</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="teol">
                            <li>Martellus Bennett - 19.8</li>
                            <li>Coby Fleener - 18.8</li>
                            <li>Gary Barnidge - 16.5</li>
                            <li>Charles Clay - 16.1</li>
							<li>Ladarius Green - 13.3</li>
                            <li>Richard Rodgers - 13</li>
                            <li>Jake Stoneburner - 8.6</li>
                            <li>Tyler Eifert - 8.4</li>
                            <li>C.J. Fiedorowicz - 8.3</li>
                            <li>Josh Hill - 8.1</li>
                        </ol>
                        <div class="cover tecover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position k wow fadeInUp" onclick="showTP('k');">
                        <span class="title ktitle" onclick="showTP('k');">Kicker</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="kol">
                            <li>Cairo Santos - 26</li>
                            <li>Chandler Catanzaro - 17</li>
                            <li>Justin Tucker - 15</li>
                            <li>Travis Coons - 14</li>
                            <li>Josh Lambo - 14</li>
                            <li>Robbie Gould - 13</li>
                            <li>Graham Gano - 13</li>
                            <li>Adam Vinatieri - 12</li>
                            <li>Brandon McManus - 12</li>
                            <li>Steven Hauschka - 11</li>
                        </ol>
                        <div class="cover kcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="position ds wow fadeInRight" onclick="showTP('ds');">
                        <span class="title dstitle" onclick="showTP('ds');">Defense/Special</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="dsol">
                            <li>Lions - 21</li>
                            <li>Falcons - 18</li>
                            <li>Packers - 15</li>
                            <li>Panthers - 15</li>
                            <li>Raiders - 10</li>
                            <li>Jets - 10</li>
                            <li>Broncos - 9</li>
                            <li>Giants - 9</li>
                            <li>Redskins - 9</li>
                            <li>Bears - 8</li>
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

                    <button type="button" class="info-icon" style="width:auto;" data-toggle="tooltip" data-placement="bottom" title="We feel your pain. And theirs. Even worse, some people leave these injured bums in their starting lineups. Never again. The pain of losing to your annoying opponent this week will be much worse than what these guys are going through. Browse this list of this week's wounded to stay current on injuries.">
                        Ouch! But why&nbsp;<i class="fa fa-question-circle fa-3x white"></i>
                    </button>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-8">
                    <section class="player wow fadeIn" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#000000!important;">
                            <svg class="min" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#97233F" stroke="none">
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

                        <div class="name">Crocket<br>Gillmore<span class="position"></span> <span class="team">Ravens</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Calf</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks</span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
				</div>


                <div class="col-xs-12 col-sm-6 col-md-8">
                    <section class="stat player wow fadeIn" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#22150C;">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Steve<br>Smith Sr.<span class="position"></span> <span class="team">Ravens</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Back</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">1-6 Weeks</span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
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
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Brian<br>Hartline <span class="position"></span> <span class="team">Browns</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Ribs</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
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

					<div class="moreInjurys table-expand wow zoomInDown" style="width:100%;background:black;color:white;cursor:pointer;font-size:2em;">
						<i class="fa fa-arrow-down" style="float:left;padding:5px;"></i>
						More <b>+</b>
						<i class="fa fa-arrow-down" style="float:right;padding:5px;"></i>
					</div>
				</div>
				<div id="extraInjuries" style="display:none;">
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#B0B7BC;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
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

                        <div class="name">Lance<br>Dunbar<span class="position"></span> <span class="team">Cowboys</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Ribs</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="#002244">
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

                        <div class="name">Brice<br>Butler <span class="position"></span> <span class="team">Cowboys</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Hamstring</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Demaryius<br>Thomas <span class="position"></span> <span class="team">Broncos</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Neck</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-1 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Probable</div>
                        </div>
                    </section>
                </div>	
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Eric<br>Ebron <span class="position"></span> <span class="team">Lions</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-4 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Quustionable</div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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
                            <span class="city">IND</span>
                        </div>

                        <div class="name">Frank<br>Gore <span class="position"></span> <span class="team">Colts</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Foot</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Probable</div>
                        </div>
                    </section>
                </div>	
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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
                            <span class="city">NYG </span>
                        </div>

                        <div class="name">Daniel<br>Fells <span class="position"></span> <span class="team">Giants</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Foot</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">Season<span></div>
							<div class="col-xs-12 col-sm-3">Out</div>
                        </div>
                    </section>
                </div>					
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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
                            <span class="city">NYJ</span>
                        </div>

                        <div class="name">Balil<br>Powell <span class="position"></span> <span class="team">Jets</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Groin</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>					
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Stevie<br>Johnson <span class="position"></span> <span class="team">Chargers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Hamstring</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>					
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Malcom<br>Floyd <span class="position"></span> <span class="team">Chargers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Concussion</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-4 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>					
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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
                            <span class="city">SEA</span>
                        </div>

                        <div class="name">Fred<br>Jackson <span class="position"></span> <span class="team">Seahawks</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Ankle</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-4 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>					
				                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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

                        <div class="name">Vernon<br>Davis <span class="position"></span> <span class="team">49ers</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Knee</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-2 Weeks<span></div>
							<div class="col-xs-12 col-sm-3">Questionable</div>
                        </div>
                    </section>
                </div>	
                <div class="col-xs-12 col-sm-6 col-md-8" style="float:right;">
                    <section class="stat player" style="padding-bottom:20px;border-bottom: 1px solid #d1d4d9;">
                        <div class="helmet" style="width:65px;height:65px;background:#002244!important;">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="#FB4F14" stroke="none">
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
                            <span class="city">WAS</span>
                        </div>

                        <div class="name">Jordan<br>Reed <span class="position"></span> <span class="team">Redskins</span></div>
                        <div class="row desc">
							<div class="col-xs-12 col-sm-3">Concussion</div>
							<div class="col-xs-12 col-sm-3"><span style="font-weight:bold;opacity:1;">0-4 Weeks<span></div>
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
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Andy Dalton, QB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>39.2</td>
                                    </tr>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>28.9</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Devonta Freeman, RB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>38.2</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>46.3</td>
                                    </tr>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>16.3</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Jeremy Maclin, WR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>20.8</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>24.6</td>
                                    </tr>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>7.7</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Charles Clay, TE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>16.1</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>16.7</td>
                                    </tr>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-up"></i></td>
                                        <td>9.4</td>
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
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Ryan Mallet, QB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>20.4</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>13.1</td>
                                    </tr>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>4</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Carlos Hyde., RB</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>10.7</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>9.6</td>
                                    </tr>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>4.3</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Odell Beck., WR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>26.1</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>17.4</td>
                                    </tr>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>6.3</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <table class="stats table table-hover" style="border:1px solid #d1d4d9;">
                                    <thead>
                                    <tr style="background:#465366;">
                                        <th colspan="3" class="text-center" style="color:white;">Heath Miller, TE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Week 2</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>10.5</td>
                                    </tr>
                                    <tr>
                                        <th>Week 3</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>2.7</td>
                                    </tr>
                                    <tr>
                                        <th>Week 4</th>
                                        <td><i class="fa fa-caret-down"></i></td>
                                        <td>.6</td>
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
                        <span class="info">Devonta Freeman has just under 85 fantasy points the past 2 weeks (69 in standard scoring). This is the most by any player in their first two starts in the 21st century. </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center wow rubberBand">
                        <span class="category">HISTORY</span>
                        <span class="info">The Miami Dolphins have not made the playoffs since the year 2000 under Coach Dave Wannstedt. That was 7 coaches ago.</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center wow rubberBand">
                        <span class="category">LIFE</span>
                        <span class="info">Antonio Gates (who returns from suspension this week) never played a down of high school or college football. He played basketball at Kent State, helping them reach the Elite 8 in 2002. </span>
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
                        <th>4. Cam Newton</th>
                    </tr>
                    <tr>
                        <th>5. Andy Dalton</th>
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
                        <th>2. Antonio Brown</th>
                    </tr>
                    <tr>
                        <th>3. A.J. Green</th>
                    </tr>
                    <tr>
                        <th>4. Randall Cobb	</th>
                    </tr>
                    <tr>
                        <th>5. Larry Fitzgerald	</th>
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
                        <th>1. Le'Veon Bell</th>
                    </tr>
                    <tr>
                        <th>2. Adrian Peterson</th>
                    </tr>
                    <tr>
                        <th>3. Jamaal Charles</th>
                    </tr>
                    <tr>
                        <th>4. Matt Forte</th>
                    </tr>
                    <tr>
                        <th>5. Jeremy Hill</th>
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
                        <th>3. Travis Kelce</th>
                    </tr>
                    <tr>
                        <th>4. Tyler Eifert</th>
                    </tr>
                    <tr>
                        <th>5. Martellus Bennett</th>
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
                        <th>4. Josh Brown</th>
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
                        <th>1. Seahawks</th>
                    </tr>
                    <tr>
                        <th>2. Broncos</th>
                    </tr>
                    <tr>
                        <th>3. Panthers</th>
                    </tr>
                    <tr>
                        <th>4. Jets</th>
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

                    <button type="button" class="info-icon" style="width:auto;padding-bottom:20px;" data-toggle="tooltip" data-placement="bottom" title="This isn't tennis. Nobody passes the ball to themselves and scores a touchdown. Offensive lines, defensive lines, and coaches matter too. Browse through our Team Power Ranking sections to know where the synergy is at and acquire players off these teams. They have something to play for. ">
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
                                fill="#203731" stroke="none">
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
                            <span class="city">DEN</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">3.</span> Broncos</span>
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
                            <span class="city">CIN</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">4.</span> Bengals</span>
                    </section>
                </div>

                <div class="col-xs-6 col-sm-3">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet" style="width:65px;height:65px;background:#B0B7BC;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
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
                            <span class="city">ATL</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">5.</span> Falcons</span>
                    </section>
					</div>
					<div class="col-xs-6 col-sm-3">
					<section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet" style="width:65px;height:65px;background:#B0B7BC;">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 257.000000 250.000000"
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
                            <span class="city">SEA</span>
                        </div>

                        <span class="desc"><span style="font-weight:900;">6.</span> Seahawks</span>
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
            <div class="helmet left win removeHelmet">
                <span class="city">BAL</span>
                <span class="score tightenScore">23</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right loss removeHelmet">
                <span class="city">PIT</span>
                <span class="score tightenScore">20</span>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="game gameScore clearfix wow zoomInDown">
            <div class="helmet left win removeHelmet">
                <span class="city">NYJ</span>
                <span class="score tightenScore">27</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right loss removeHelmet">
                <span class="city">MIA</span>
                <span class="score tightenScore">14</span>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="game gameScore clearfix wow zoomInDown">
            <div class="helmet left win removeHelmet">
                <span class="city">NYG</span>
                <span class="score tightenScore">24</span>
            </div>

            <div class="vs">AT</div>

            <div class="helmet right loss removeHelmet">
                <span class="city">BUF</span>
                <span class="score tightenScore">10</span>
            </div>
        </div>
    </div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInDown">
        <div class="helmet left win removeHelmet">
            <span class="city">CAR</span>
            <span class="score tightenScore">37</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">TB</span>
            <span class="score tightenScore">23</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">OAK</span>
            <span class="score tightenScore">20</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">CHI</span>
            <span class="score tightenScore">22</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">KC</span>
            <span class="score tightenScore">21</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">CIN</span>
            <span class="score tightenScore">36</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">HOU</span>
            <span class="score tightenScore">21</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">ATL</span>
            <span class="score tightenScore">48</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">JAX</span>
            <span class="score tightenScore">13</span>
        </div>

        <div class="vs">AT</div>
        <div class="helmet right win removeHelmet">
            <span class="city">IND</span>
            <span class="score tightenScore">16</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">PHI</span>
            <span class="score tightenScore">20</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">WAS</span>
            <span class="score tightenScore">23</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInLeft">
        <div class="helmet left loss removeHelmet">
            <span class="city">CLE</span>
            <span class="score tightenScore">27</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">SD</span>
            <span class="score tightenScore">30</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left loss removeHelmet">
            <span class="city">MIN</span>
            <span class="score tightenScore">20</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">DEN</span>
            <span class="score tightenScore">23</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInRight">
        <div class="helmet left win removeHelmet">
            <span class="city">GB</span>
            <span class="score tightenScore">17</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">SF</span>
            <span class="score tightenScore">3</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInUp">
        <div class="helmet left win removeHelmet">
            <span class="city">STL</span>
            <span class="score tightenScore">24</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right loss removeHelmet">
            <span class="city">ARI</span>
            <span class="score tightenScore">22</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInUp">
        <div class="helmet left loss removeHelmet">
            <span class="city">DAL</span>
            <span class="score tightenScore">20</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">NO</span>
            <span class="score tightenScore">26</span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="game gameScore clearfix wow zoomInUp">
        <div class="helmet left loss removeHelmet">
            <span class="city">DET</span>
            <span class="score tightenScore">10</span>
        </div>

        <div class="vs">AT</div>

        <div class="helmet right win removeHelmet">
            <span class="city">SEA</span>
            <span class="score tightenScore">13</span>
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

                <table class="table table-striped collapse" id="afcTeams">
                <thead>
                <tr>
                    <th>AFC West Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Denver Broncos</td>
                    <td>4</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Oakland Raiders</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
               <tr>
                    <td>San Diego Chargers</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Kansas City Chiefs</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
 				
                </tbody>
                <thead>
                <tr>
                    <th>AFC East Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>New England Patriots</td>
                    <td>3</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>New York Jets</td>
                    <td>3</td>
                    <td>1</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Buffalo Bills</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>				

                <tr>
                    <td>Miami Dolphins</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                </tbody>
                <thead>
                <tr>
                    <th>AFC North Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Cincinnati Bengals</td>
                    <td>4</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Pittsburgh Steelers</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>	
                <tr>
                    <td>Baltimore Ravens</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Cleveland Browns</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                </tbody>
                <thead>
                <tr>
                    <th>AFC South Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Indianapolis Colts</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Tennessee Titans</td>
                    <td>1</td>
                    <td>2</td>
                    <td>0</td>
                </tr>	
				<tr>
                    <td>Houston Texans</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Jacksonville Jaguars</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				

			
                </tbody>
                </table>
            </div>
        <div class="col-xs-12 col-sm-6">
            <div class="table-expand wow zoomInUp" data-toggle="collapse" data-target="#nfcTeams" aria-expanded="false" aria-controls="collapseExample">
                NFC Teams <b>+</b>
            </div>

            <table class="table table-striped collapse" id="nfcTeams">
                <thead>
                <tr>
                    <th>NFC West Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Arizona Cardinals</td>
                    <td>3</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>St. Louis Rams</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Seattle Seahawks</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>San Francisco 49ers</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <th>NFC East Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Dallas Cowboys</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>New York Giants</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Washington Redskins</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>			
                <tr>
                    <td>Philadelphia Eagles</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <th>NFC North Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Tie</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Green Bay Packers</td>
                    <td>4</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Minnesota Vikings</td>
                    <td>2</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Chicago Bears</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Detroit Lions</td>
                    <td>0</td>
                    <td>4</td>
                    <td>0</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <th>NFC South Team</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Ties</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Carolina Panthers</td>
                    <td>4</td>
                    <td>0</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Atlanta Falcons</td>
                    <td>4</td>
                    <td>0</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>Tampa Bay Buccaneers</td>
                    <td>1</td>
                    <td>3</td>
                    <td>0</td>
                </tr>				
                <tr>
                    <td>New Orleans Saints</td>
                    <td>1</td>
                    <td>3</td>
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
                                    $('body').scrollTop(0);
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
            var noAnimate = '<?=$_GET['noAnimate'];?>';
            if(noAnimate){
                showTP('qb');
                showTP('wr');
                showTP('rb');
                showTP('te');
                showTP('k');
                showTP('ds');
                $('.collapse').show();
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
