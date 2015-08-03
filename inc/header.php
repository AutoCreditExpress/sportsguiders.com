<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fantasy Football Guide - Sports Guiders</title>
    <meta name="description" content="KOEL is a multipurpose site template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/hover.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/animate.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/et-line.css">

    <link rel="stylesheet" href="<?php echo $webPath;?>styles/koel.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>themes/koel-main.css">
    <link rel="stylesheet" href="<?php echo $webPath;?>styles/sportsguiders.css">
    <!-- End Styles -->

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700' rel='stylesheet' type='text/css'>
    <!-- End Google Fonts -->

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $webPath;?>rs-plugin/css/settings.css" media="screen" />

    <!-- Scripts -->
    <script src="<?php echo $webPath;?>scripts/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo $webPath;?>scripts/jquery.min.js"></script>
    <!-- End Scripts -->

</head>
<body>


<!--[if lt IE 7]>
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
</div>
<![endif]-->
<style>
    @media screen and (max-width: 768px) {
        .dropdown-toggle {background-color:#d83435;}
    }
</style>
<!-- Header -->
<section id="header" class="header header-revolution <?php if($pageID != 'home'){ echo 'header-sub';}?>">

    <!-- Navigation -->
    <nav class="navbar">

        <!-- Navigation Container -->
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed">
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $webPath;?>">
                    <img alt="Sports Guiders Logo" height="30" width="200" src="<?php echo $webPath;?>images/logo/sg-logo.png" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li class="dropdown">
                        <a href="<?php //echo $webPath;?>about/" class="dropdown-toggle" aria-expanded="false">About</a>
                    </li> -->

                    <li class="dropdown">
                        <?php if($_SESSION['user_name']): ?>
                        <a href="<?php echo $webPath;?>the-recap/" class="dropdown-toggle" aria-expanded="false">The Recap</a>
                        <?php else: ?>
                        <a href="<?php echo $webPath;?>gain-access/" class="dropdown-toggle" aria-expanded="false">The Recap</a>
                        <?php endif; ?>

                    </li>
                    <li class="dropdown">
                        <a href="<?php echo $webPath;?>contact-us/" class="dropdown-toggle" aria-expanded="false">Contact</a>
                    </li>
                    <li class="dropdown">
                        <?php if($_SESSION['user_name']): ?>
                            <a href="<?php echo $webPath;?>login/logout/" class="dropdown-toggle" aria-expanded="false">Logout</a>
                        <?php else: ?>
                            <a href="<?php echo $webPath;?>login/" class="dropdown-toggle" aria-expanded="false">Login</a>
                        <?php endif; ?>
                    </li>
                    <li class="dropdown active">
                        <?php if($_SESSION['user_name']): ?>
                        <a href="<?php echo $webPath;?>my-account/" class="dropdown-toggle" aria-expanded="false">My Account</a>
                        <?php else: ?>
                            <a href="<?php echo $webPath;?>gain-access/" class="dropdown-toggle" aria-expanded="false">Gain Access</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Navigation Container -->
    </nav>
    <!-- End Navigation -->
</section>
<!-- End Header -->