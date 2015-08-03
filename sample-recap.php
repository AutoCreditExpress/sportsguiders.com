<?php
include('inc/config.php');

$ReportDAO = new ReportDAO($db);
$PlayerDAO = new PlayerDAO($db);

//standard report code
//$Report = $ReportDAO->getLatestReport();

//modified to only show reports with id of 1
$Report = $ReportDAO->getLatestReport(true);
include($docPath.'inc/header.php');
?>

    <!-- PAGE HEADER -->
    <section class="page-header">
        <div class="container text-center">
            <i class="fa fa-book"></i>
            <h1>THE<b>RECAP</b></h1>
            <span class="desc"><?php echo $_SESSION['user_first']."'s";?> Insider's Guide to Mastering Fantasy Football</span>
        </div>
    </section>
    <!--/PAGE HEADER -->
<style>

    /*patch for mobile devices undert the top performers*/
    @media only screen and (max-device-width: 768px){

    .TPmobileClickNotification {display:block;}
</style>
<script>
    function showTP(section){
        if($(document).width()<=768) {
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
    <!-- TOP PERFORMERS -->
    <section class="top-performers">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img class="heading-icon wow bounceInUp" src="<?=$webPath?>images/report/top-performers-icon.png">
                    <span class="heading wow bounceInUp">TOP PERFORMERS</span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know who dominated the world of fantasy football last weekend. Having a quick recap of who the weeks' top performers were allows you to make quick decisions the following week on who to target in trades, start and sit.">
                        <img src="<?=$webPath?>images/report/info-icon-dark.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position qb wow fadeInLeft" onclick="showTP('qb');">
                        <span class="title qbtitle" onclick="showTP('qb');">Quarterback</span>
                        <span class="TPmobileClickNotification">Click Here</span>

                        <ol class="qbol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 16): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                            <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>

                        </ol>
                        <div class="cover qbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position wr wow fadeInUp"   onclick="showTP('wr');">
                        <span class="title wrtitle"  onclick="showTP('wr');">Wide Reciever</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="wrol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 1): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                                <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <div class="cover wrcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position rb wow fadeInRight" onclick="showTP('rb');">
                        <span class="title rbtitle " onclick="showTP('rb');">Running Back</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol  class="rbol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 2): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                                <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <div class="cover rbcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position te wow fadeInLeft" onclick="showTP('te');">
                        <span class="title tetitle" onclick="showTP('te');">Tight End</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="teol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 7): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                                <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <div class="cover tecover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position k wow fadeInUp" onclick="showTP('k');">
                        <span class="title ktitle" onclick="showTP('k');">Kicker</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="kol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 20): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                                <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <div class="cover kcover"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 text-center">
                    <div class="position ds wow fadeInRight" onclick="showTP('ds');">
                        <span class="title dstitle" onclick="showTP('ds');">Defense/Special</span>
                        <span class="TPmobileClickNotification">Click Here</span>
                        <ol class="dsol">
                            <?php foreach($Report->getTopPerformers() as $tp): if($tp->getPositionID() == 29): ?>
                                <?php $Player = $PlayerDAO->getPlayerFromID($tp->getPlayerID()) ?>
                                <li><?php echo $Player->getName();?></li>
                            <?php endif; endforeach; ?>
                        </ol>
                        <div class="cover dscover"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/TOP PERFORMERS -->

    <!-- WAIVER ADDS -->
    <section class="waiver-adds">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 heading-col">
                    <img class="heading-icon wow tada" src="<?=$webPath?>images/report/waiver-winners-icon.png">
                    <span class="heading wow fadeInRight">WAIVER <b>ADDS</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know who to pick up off your league's waiver wire this week. Adding waivers and continuing to improve the depth of your team throughout the year will allow you to sustain injuries, add value to trades, and most importantly - make a run in the playoffs. ">
                        <img src="<?=$webPath?>images/report/info-icon-dark.png">
                    </button>
                </div>

                <div class="col-xs-12 col-sm-8">
                    <?php $waiverDelay = 25;?>
                    <?php foreach($Report->getWaiver() as $Waiver):; ?>
                        <?php $Player = $PlayerDAO->getPlayerFromID($Waiver->getPlayerID()) ?>
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                        <div class="number"><?php echo $Player->getNumber();?></div>
                        <div class="name"><?php echo $Player->getName(); ?> <span class="position"><?php echo $Player->getPosition(); ?></span> <span class="team"><?php echo $Player->getTeam(); ?></span></div>
                        <span class="desc"><?php echo $Waiver->getValue(); ?></span>
                    </section>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!--/WAIVER WINNERS -->

    <!--INJURY REPORT-->
    <section class="injury-report">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img class="heading-icon wow fadeInUp" src="<?=$webPath?>images/report/injury-report-icon.png">
                    <span class="heading wow fadeInDown">INJURY <b>REPORT</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know who you need to keep an eye on throughout the week. Never have an injured player in your starting lineup again by taking a minute to browse this list of damaged players each week.">
                        <img src="<?=$webPath?>images/report/info-icon-white.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <section class="player wow fadeIn">
                        <div class="helmet">
                            <svg class="min" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="city">MIN</span>
                        </div>

                        <div class="name">Mike Wallace <span class="position">WR</span> <span class="team">MIN</span></div>
                        <span class="desc">
                            4Q – Ankle Sprain – Out 1-2 Weeks
                            <b>Stepped on linemans foot</b>
                        </span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <section class="player wow fadeIn">
                        <div class="helmet">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="name">Mike Wallace <span class="position">WR</span> <span class="team">MIN</span></div>
                        <span class="desc">
                            4Q – Ankle Sprain – Out 1-2 Weeks
                            <b>Stepped on linemans foot</b>
                        </span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <section class="player wow fadeIn">
                        <div class="helmet">
                            <svg class="gb" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="name">Mike Wallace <span class="position">WR</span> <span class="team">MIN</span></div>
                        <span class="desc">
                            4Q – Ankle Sprain – Out 1-2 Weeks
                            <b>Stepped on linemans foot</b>
                        </span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-6">
                    <section class="player wow fadeIn">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="name">Mike Wallace <span class="position">WR</span> <span class="team">MIN</span></div>
                        <span class="desc">
                            4Q – Ankle Sprain – Out 1-2 Weeks
                            <b>Stepped on linemans foot</b>
                        </span>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--/INJURY REPORT-->

    <!--POWER RANKING-->
    <section class="power-ranking">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="heading wow slideInUp"><i>NFL TEAMS</i> POWER<b>RANKINGS</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know which NFL teams will dominate the rest of the way. Finding stud players on prospering teams is a recipe for success in fantasy football.">
                        <img src="<?=$webPath?>images/report/info-icon-white.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 wow fadeInDown">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">QB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12 col-sm-4 wow fadeInDown" data-wow-delay=".25s">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">WR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12 col-sm-4 wow fadeInDown" data-wow-delay=".45s">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">RB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay=".45s">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">TE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay=".25s">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12 col-sm-4 wow fadeInUp">
                    <table class="stats table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">DST</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-up"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <th>A. Rodgers, GB</th>
                                <td>ADP</td>
                                <td><i class="fa fa-caret-down"></i></td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--/POWER RANKING-->

    <!--TRENDING-->
    <section class="trending">
        <div class="container">
            <section class="col-xs-12 col-sm-6 upwards">
                <div class="row">
                    <div class="text-center">
                        <img class="heading-icon wow tada" src="<?=$webPath?>images/report/trending-upwards-icon.png">
                        <span class="heading wow fadeInLeft">TRENDING<b>UPWARDS</b></span>

                        <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to get a quick glance at who has been performing well consistently over the last 3 weeks. These players aren't flaky, you can trust them to score some point this week. If you don't own them, try trading for them this week.">
                            <img src="<?=$webPath?>images/report/info-icon-dark.png">
                        </button>

                        <div class="stats wow fadeIn">
                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-xs-12 col-sm-6 downwards">
                <div class="row">
                    <div class="text-center">
                        <img class="heading-icon wow tada" src="<?=$webPath?>images/report/trending-downwards-icon.png">
                        <span class="heading wow fadeInRight">TRENDING<b>DOWNWARDS</b></span>

                        <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to get a quick glance at who has been performing well consistently over the last 3 weeks. These players aren't flaky, you can trust them to score some point this week. If you don't own them, try trading for them this week.">
                            <img src="<?=$webPath?>images/report/info-icon-dark.png">
                        </button>

                        <div class="stats wow fadeIn">
                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="player">
                                    <span class="name">Tom Brady</span>
                                    <span class="desc"><b>QB</b> - 90 PTS - 33 AVG</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--/TRENDING-->

    <!--FUN FACTS-->
    <section class="fun-facts clearfix">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="heading">FUN<b>FACTS</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to wow your friends, family and co-workers with your superior NFL knowledge. Use these facts in conversation to reign as Most Knowledgeable among your peers.">
                        <img src="<?=$webPath?>images/report/info-icon-white.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center">
                        <span class="category">FANTASY</span>
                        <span class="info">The Detroit Lions haven’t won a playoff game since 1982.</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center">
                        <span class="category">HISTORY</span>
                        <span class="info">The Detroit Lions haven’t won a playoff game since 1982.</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="fact text-center">
                        <span class="category">LIFE</span>
                        <span class="info">The Detroit Lions haven’t won a playoff game since 1982.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--FUN FACTS-->

    <!--UPCOMING SCHEDULE-->
    <section class="schedule">
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
                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <div class="vs">AT</div>

                        <div class="helmet right">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/UPCOMING SCHEDULE-->

    <!-- TEAM POWER RANKINGS -->
    <section class="team-rankings">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 heading-col">
                    <img class="heading-icon wow tada" src="<?=$webPath?>images/report/power-rankings-icon.png">
                    <span class="heading wow fadeInRight"><i>NFL TEAMS</i> POWER <b>RANKINGS</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know which NFL teams will dominate the rest of the way. Finding stud players on prospering teams is a recipe for success in fantasy football.">
                        <img src="<?=$webPath?>images/report/info-icon-dark.png">
                    </button>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <section class="stat wow fadeInDown clearfix">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <section class="stat wow fadeInDown clearfix">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".25s">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-4 col-sm-push-4">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>

                <div class="col-xs-12 col-sm-4 col-sm-push-4">
                    <section class="stat wow fadeInDown clearfix" data-wow-delay=".45s">
                        <div class="helmet">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                        <span class="desc">Chicago</span>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--/TEAM POWER RANKINGS -->

    <!-- NFL STANDINGS -->
    <section class="standings">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                <span class="heading wow slideInUp">NFL<b>STANDINGS</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know which players will be playing the worst defensive in coming weeks. Playing a poor defensive is always a quick fix to a struggling player. Now might be the time to buy cheap on a player who has been struggling on one of these teams.">
                        <img src="<?=$webPath?>images/report/info-icon-dark.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="table-expand" data-toggle="collapse" data-target="#afcTeams" aria-expanded="false" aria-controls="collapseExample">
                    AFC Teams <b>+</b>
                </div>

                <table class="table table-striped collapse" id="afcTeams">
                    <thead>
                        <tr>
                            <th>AFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>AFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>AFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>AFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="table-expand" data-toggle="collapse" data-target="#nfcTeams" aria-expanded="false" aria-controls="collapseExample">
                    NFC Teams <b>+</b>
                </div>

                <table class="table table-striped collapse" id="nfcTeams">
                    <thead>
                        <tr>
                            <th>NFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>NFC East Team</th>
                            <th>W</th>
                            <th>L</th>
                            <th>T</th>
                            <th>Pct</th>
                            <th>PF</th>
                            <th>PA</th>
                            <th>Net Pts</th>
                            <th>TD</th>
                            <th>Home</th>
                            <th>Road</th>
                            <th>Div</th>
                            <th>Pct</th>
                            <th>Conf</th>
                            <th>Pct</th>
                            <th>Non-Conf</th>
                            <th>Streak</th>
                            <th>Last 5</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Miami Dolphins</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                        <tr>
                            <td>New York Jets</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>.000</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>.000</td>
                            <td>0-0</td>
                            <td>--</td>
                            <td>0-0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/NFL STANDINGS -->

    <!--NFL SCORES-->
    <section class="scores">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <span class="heading wow slideInUp">NFL<b>SCORES</b></span>

                    <button type="button" class="info-icon" data-toggle="tooltip" data-placement="bottom" title="Use this section to know which players will be playing the worst defensive in coming weeks. Playing a poor defensive is always a quick fix to a struggling player. Now might be the time to buy cheap on a player who has been struggling on one of these teams.">
                        <img src="<?=$webPath?>images/report/info-icon-white.png">
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left loss">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">24</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right win">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left loss">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">34</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right win">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left win">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">34</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right loss">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left loss">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">34</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right win">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left loss">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">34</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right win">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="game clearfix">
                        <div class="helmet left win">
                            <svg class="chi" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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
                            <span class="score">34</span>
                        </div>

                        <div class="vs">AT</div>

                        <div class="helmet right loss">
                            <svg class="det" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="157.000000pt" height="150.000000pt" viewBox="0 0 157.000000 150.000000"
                             preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,150.000000) scale(0.100000,-0.100000)"
                                fill="" stroke="none">
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

                            <span class="city">CHI</span>
                            <span class="score">34</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/NFL SCORES-->
<?php include($docPath.'inc/footer.php'); ?>