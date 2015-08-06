<?php
/**
 * page_sidebar.php
 *
 * Author: pixelcave
 *
 * The main sidebar of each page
 *
 */
$ReportDAO = new ReportDAO($db);

//get all position ids from position table as assoc array
//for each position id, check the top performers table report_id for a 0
$tp_ValidQB = $ReportDAO->checkTopPerformers(16);
$tp_ValidRB = $ReportDAO->checkTopPerformers(2);
$tp_ValidWR = $ReportDAO->checkTopPerformers(1);
$tp_ValidTE = $ReportDAO->checkTopPerformers(7);
$tp_ValidK = $ReportDAO->checkTopPerformers(20);
$tp_ValidDST = $ReportDAO->checkTopPerformers(29);

if($tp_ValidQB){$tp_ValidQB_color = 'green';};
if($tp_ValidRB){$tp_ValidRB_color = 'green';};
if($tp_ValidWR){$tp_ValidWR_color = 'green';};
if($tp_ValidTE){$tp_ValidTE_color = 'green';};
if($tp_ValidK){$tp_ValidK_color = 'green';};
if($tp_ValidDST){$tp_ValidDST_color = 'green';};

//main menu item check
if($tp_ValidQB and $tp_ValidRB and $tp_ValidWR and $tp_ValidTE and $tp_ValidK and $tp_ValidDST){
    $tp_Valid_color = 'green';
}
//

$pr_ValidQB = $ReportDAO->checkPowerRankings(16);
$pr_ValidRB = $ReportDAO->checkPowerRankings(2);
$pr_ValidWR = $ReportDAO->checkPowerRankings(1);
$pr_ValidTE = $ReportDAO->checkPowerRankings(7);
$pr_ValidK = $ReportDAO->checkPowerRankings(20);
$pr_ValidDST = $ReportDAO->checkPowerRankings(29);

if($pr_ValidQB){$pr_ValidQB_color = 'green';};
if($pr_ValidRB){$pr_ValidRB_color = 'green';};
if($pr_ValidWR){$pr_ValidWR_color = 'green';};
if($pr_ValidTE){$pr_ValidTE_color = 'green';};
if($pr_ValidK){$pr_ValidK_color = 'green';};
if($pr_ValidDST){$pr_ValidDST_color = 'green';};

if($pr_ValidQB and $pr_ValidRB and $pr_ValidWR and $pr_ValidTE and $pr_ValidK and $pr_ValidDST){
    $pr_Valid_color = 'green';
}

$rw_Valid = $ReportDAO->checkWaivers();
if($rw_Valid){$rw_Valid_color = 'green';};

$ir_Valid = $ReportDAO->checkInjuryReport();
if($ir_Valid){$ir_Valid_color = 'green';};

$tu_Valid = $ReportDAO->checkTrending('up');
if($tu_Valid){$tu_Valid_color = 'green';};

$td_Valid = $ReportDAO->checkTrending('down');
if($td_Valid){$td_Valid_color = 'green';};

$fl_Valid = $ReportDAO->checkFacts('life');
if($fl_Valid){$fl_Valid_color = 'green';};

$fh_Valid = $ReportDAO->checkFacts('history');
if($fh_Valid){$fh_Valid_color = 'green';};

$ff_Valid = $ReportDAO->checkFacts('fantasy');
if($ff_Valid){$ff_Valid_color = 'green';};

if($fl_Valid and $fh_Valid and $ff_Valid){
    $ffall_Valid_color = 'green';
}

$us_Valid = $ReportDAO->checkSchedule();
if($us_Valid){$us_Valid_color = 'green';};

$tpr_Valid = $ReportDAO->checkTeamPowerRankings();
if($tpr_Valid){$tpr_Valid_color = 'green';};

$ns_Valid = $ReportDAO->checkScore();
if($ns_Valid){$ns_Valid_color = 'green';};
?>
<style>
    .green {color:lightgreen!important;}
</style>
<!-- Main Sidebar -->
<div id="sidebar">
<!-- Sidebar Brand -->
<div id="sidebar-brand" class="themed-background">
    <a href="index.php" class="sidebar-title">
        <img src="<?=$webPath?>images/logo/sg-logo.png" style="max-width:100%;">
    </a>
</div>
<!-- END Sidebar Brand -->

<!-- Wrapper for scrolling functionality -->
<div id="sidebar-scroll">
<!-- Sidebar Content -->
<div class="sidebar-content">
<!-- Sidebar Navigation -->
<ul class="sidebar-nav">
    <li class="active">
        <a href="#" class="sidebar-nav-menu"><span class="sidebar-nav-ripple animate" style="height: 220px; width: 220px; top: -92px; left: -11px;"></span><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">New Report</span></a>
        <ul>
            <li>
                <a href="#" class="sidebar-nav-submenu <?=$tp_Valid_color; ?>"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Top Performers</a>
                <ul>
                    <li>
                        <a class="<?=$tp_ValidQB_color; ?>" href="page_ui_blocks_grid.php">Quarterback</a>
                    </li>
                    <li>
                        <a class="<?=$tp_ValidWR_color; ?>" href="page_ui_blocks_grid.php">Wide Receiver</a>
                    </li>
                    <li>
                        <a class="<?=$tp_ValidRB_color; ?>" href="page_ui_blocks_grid.php">Running Back</a>
                    </li>
                    <li>
                        <a class="<?=$tp_ValidTE_color; ?>" href="page_ui_typography.php">Tight End</a>
                    </li>
                    <li>
                        <a class="<?=$tp_ValidK_color; ?>" href="page_ui_buttons_dropdowns.php">Kicker</a>
                    </li>
                    <li>
                        <a class="<?=$tp_ValidDST_color; ?>" href="page_ui_navigation_more.php">Defense/Special</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="<?=$rw_Valid_color?>" href="#" class="sidebar-nav-submenu">Waiver Adds</a>
            </li>
            <li>
                <a class="<?=$ir_Valid_color?>" href="#" class="sidebar-nav-submenu">Injury Report</a>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu <?=$pr_Valid_color; ?>"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Player Power Rankings</a>
                <ul>
                    <li>
                        <a class="<?=$pr_ValidQB_color; ?>" href="page_ui_icons_fontawesome.php">Quarterback</a>
                    </li>
                    <li>
                        <a  class="<?=$pr_ValidWR_color; ?>" href="page_ui_icons_glyphicons_pro.php">Wide Receiver</a>
                    </li>
                    <li>
                        <a class="<?=$pr_ValidRB_color; ?>" href="page_ui_icons_glyphicons_pro.php">Running Back</a>
                    </li>
                    <li>
                        <a class="<?=$pr_ValidTE_color; ?>" href="page_ui_icons_glyphicons_pro.php">Tight End</a>
                    </li>
                    <li>
                        <a class="<?=$pr_ValidK_color; ?>" href="page_ui_icons_glyphicons_pro.php">Kicker</a>
                    </li>
                    <li>
                        <a class="<?=$pr_ValidDST_color; ?>" href="page_ui_icons_glyphicons_pro.php">Defense/Special</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="<?=$tu_Valid_color; ?>" href="#" class="sidebar-nav-submenu">Trending Upwards</a>
            </li>
            <li>
                <a class="<?=$td_Valid_color; ?>" href="#" class="sidebar-nav-submenu">Trending Downwards</a>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu <?=$ffall_Valid_color; ?>"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Fun Facts</a>
                <ul>
                    <li>
                        <a class="<?=$fl_Valid_color; ?>" href="page_ui_icons_fontawesome.php">Life</a>
                    </li>
                    <li>
                        <a class="<?=$fh_Valid_color; ?>" href="page_ui_icons_glyphicons_pro.php">History</a>
                    </li>
                    <li>
                        <a class="<?=$ff_Valid_color; ?>" href="page_ui_icons_glyphicons_pro.php">Fantasy</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="<?=$us_Valid_color; ?>" href="#" class="sidebar-nav-submenu">Upcoming Schedule</a>
            </li>
            <li>
                <a class="<?=$tpr_Valid_color; ?>" href="#" class="sidebar-nav-submenu">Team Power Rankings</a>
            </li>
            <li>
                <a class="<?=$ns_Valid_color; ?>" href="#" class="sidebar-nav-submenu">NFL Scores</a>
            </li>
        </ul>
    </li>
</ul>
<!-- END Sidebar Navigation -->

</div>
<!-- END Sidebar Content -->
</div>
<!-- END Wrapper for scrolling functionality -->


</div>
<!-- END Main Sidebar -->