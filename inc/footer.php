<!--<div id="popupNonSubUser" style="display:none;">
    <a id="popupNonSubUserLink" href="<?=$webPath;?>popupNonSubUser.php" style="">&nbsp;</a>
</div>--><!-- Footer -->
<footer class="footer footer">

    <!-- Footer Container -->
    <div class="container">

        <!-- Footer Logo -->
        <div class="footer-logo">
            <a href="#"><img src="<?php echo $webPath;?>images/logo/logo-black.png" alt=""></a>
        </div>
        <!-- End Footer Logo -->
<style>
    .red {color:#d83435;}
</style>
        <!-- Footer Social Links -->
        <div class="footer-social">
            <ul class="social-icons">
                <li><a href="//www.facebook.com/SportsGuiders" target="_blank" class="hvr-rectangle-out hvr-facebook"><i class="fa fa-facebook red "></i></a></li>
                <li><a href="//twitter.com/sportsguiders" target="_blank" class="hvr-rectangle-out hvr-twitter"><i class="fa fa-twitter red"></i></a></li>
                <li><a href="//instagram.com/Sportsguiders" target="_blank" class="hvr-rectangle-out hvr-twitter"><i class="fa fa-instagram red"></i></a></li>
            </ul>
        </div>
        <div class="footer-copy">
            &copy; <b>Sports Guiders</b> 2015.
            <span>     |     </span>
            <a style="cursor:pointer;text-decoration:underline;" target="_blank" href="<?php echo $webPath;?>privacy.html" >Privacy</a>
            <span>     |     </span>
            <a style="cursor:pointer;text-decoration:underline;" target="_blank" href="<?php echo $webPath;?>tos.html">TOS</a>

        </div>
        <!-- End Copyright -->

    </div>

    <!-- End Footer Container -->

</footer>
<!-- End Footer -->


<!-- Scripts -->
<script type="text/javascript" src="<?php echo $webPath;?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo $webPath;?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo $webPath;?>scripts/retina.min.js"></script>
<script src="<?php echo $webPath;?>scripts/owl.carousel.min.js"></script>

<script src="<?php echo $webPath;?>scripts/bootstrap.min.js"></script>
<script src="<?php echo $webPath;?>scripts/jquery.nicescroll.min.js"></script>
<script src="<?php echo $webPath;?>scripts/wow.min.js"></script>
<script>
    <?php if($_GET['noAnimate']!=true){
    ?>
        new WOW().init();
    <?php
    }?>
    jQuery(document).ready(function() {
            jQuery('.revolution').revolution({
                delay:10000,
                fullWidth:"on",
                hideThumbs:100,
                startheight:600,
                startwidth:1140,

                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:5,

                navigationType:"off",
                navigationArrows:"solo",
                navigationStyle:"preview4"
            });
    });
</script>
<style>
    /*Olark hack*/
    .hbl_pal_remote_fg, .habla_conversation_person2 {color:#d83435!important;}
</style>
<script src="<?php echo $webPath;?>scripts/koel.js"></script>
<!-- End Scripts -->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //scroll bar fix, this puts the scroll bar above the navigation bar
        $('#ascrail2000').css('z-index','99');
    })
</script>
<!-- End Scripts -->
</body>
