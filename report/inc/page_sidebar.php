<?php
/**
 * page_sidebar.php
 *
 * Author: pixelcave
 *
 * The main sidebar of each page
 *
 */
?>
<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="index.php" class="sidebar-title">
            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">App<strong>UI</strong></span>
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
                            <a href="#" class="sidebar-nav-submenu"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Top Performers</a>
                            <ul>
                                <li>
                                    <a href="page_ui_blocks_grid.php">Quarterback</a>
                                </li>
                                <li>
                                    <a href="page_ui_blocks_grid.php">Wide Receiver</a>
                                </li>
                                <li>
                                    <a href="page_ui_blocks_grid.php">Running Back</a>
                                </li>
                                <li>
                                    <a href="page_ui_typography.php">Tight End</a>
                                </li>
                                <li>
                                    <a href="page_ui_buttons_dropdowns.php">Kicker</a>
                                </li>
                                <li>
                                    <a href="page_ui_navigation_more.php">Defense/Special</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Waiver Adds</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Injury Report</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Power Rankings</a>
                            <ul>
                                <li>
                                    <a href="page_ui_icons_fontawesome.php">Quarterback</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Wide Receiver</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Running Back</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Tight End</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Kicker</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Defense/Special</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Trending Upwards</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Trending Downwards</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu"><i class="fa fa-chevron-left sidebar-nav-indicator"></i>Fun Facts</a>
                            <ul>
                                <li>
                                    <a href="page_ui_icons_fontawesome.php">Life</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">History</a>
                                </li>
                                <li>
                                    <a href="page_ui_icons_glyphicons_pro.php">Fantasy</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Upcoming Schedule</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">Power Rankings</a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu">NFL Scores</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->

            <!-- Color Themes -->
            <!-- Preview a theme on a page functionality can be found in js/app.js - colorThemePreview() -->
            <div class="sidebar-section sidebar-nav-mini-hide">
                <div class="sidebar-separator push">
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <ul class="sidebar-themes clearfix">
                    <li>
                        <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default" data-theme="default" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-default"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy" data-theme="css/themes/classy.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-classy"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social" data-theme="css/themes/social.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-social"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat" data-theme="css/themes/flat.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-flat"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst" data-theme="css/themes/amethyst.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-amethyst"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme" data-theme="css/themes/creme.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-creme"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion" data-theme="css/themes/passion.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="">
                            <span class="section-side themed-background-dark-passion"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default + Light Sidebar" data-theme="default" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy + Light Sidebar" data-theme="css/themes/classy.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social + Light Sidebar" data-theme="css/themes/social.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat + Light Sidebar" data-theme="css/themes/flat.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst + Light Sidebar" data-theme="css/themes/amethyst.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme + Light Sidebar" data-theme="css/themes/creme.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion + Light Sidebar" data-theme="css/themes/passion.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light">
                            <span class="section-side"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default + Light Header" data-theme="default" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-default"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy + Light Header" data-theme="css/themes/classy.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-classy"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social + Light Header" data-theme="css/themes/social.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-social"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat + Light Header" data-theme="css/themes/flat.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-flat"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst + Light Header" data-theme="css/themes/amethyst.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-amethyst"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme + Light Header" data-theme="css/themes/creme.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-creme"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion + Light Header" data-theme="css/themes/passion.css" data-theme-navbar="navbar-default" data-theme-sidebar="">
                            <span class="section-header"></span>
                            <span class="section-side themed-background-dark-passion"></span>
                            <span class="section-content"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Color Themes -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->

    <!-- Sidebar Extra Info -->
    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
        <div class="push-bit">
            <span class="pull-right">
                <a href="javascript:void(0)" class="text-muted"><i class="fa fa-plus"></i></a>
            </span>
            <small><strong>78 GB</strong> / 100 GB</small>
        </div>
        <div class="progress progress-mini push-bit">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"></div>
        </div>
        <div class="text-center">
            <small>Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a></small><br>
            <small><span id="year-copy"></span> &copy; <a href="http://goo.gl/RcsdAh" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a></small>
        </div>
    </div>
    <!-- END Sidebar Extra Info -->
</div>
<!-- END Main Sidebar -->
