<!-- Footer -->
<footer class="footer footer">

    <!-- Footer Container -->
    <div class="container">

        <!-- Footer Logo -->
        <div class="footer-logo">
            <a href="#"><img src="<?php echo $webPath;?>images/logo/logo-black.png" alt=""></a>
        </div>
        <!-- End Footer Logo -->

        <!-- Footer Social Links -->
        <div class="footer-social">
            <ul class="social-icons">
                <li><a href="//www.facebook.com/SportsGuiders" target="_blank" class="hvr-rectangle-out hvr-facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="//twitter.com/sportsguiders" target="_blank" class="hvr-rectangle-out hvr-twitter"><i class="fa fa-twitter"></i></a></li>
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

    <?php
    if(!$_SESSION){
    ?>
    <div style="position:fixed;bottom:0px;right:5%;z-index:99999;padding:7px;padding-bottom:0px;">
        <div id="arrowContainer" style="float:right;">
            <img id="subArrow" src="<?=$webPath;?>img/arrow.png" style="max-width:170px;max-height:250px;display:none;">
        </div>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $( document ).ready(function() {
                setTimeout(function(){
                    $( "#subArrow" ).show( "bounce", { times: 3 }, 2000, function(){
                        setTimeout(function(){
                            $('#subArrow').fadeOut();
                        },2000);
                    } );
                }, 1000);
            });
        </script>
        <div style="clear:both;"></div>
        <div style="color:white;background-color:#d83435;padding:7px;border-radius:15px 15px 0px 0px;border:1px solid white;border-bottom:0px;">
            <p style="font-size:14px;font-weight:900;margin:0px;">
            <a href="//www.sportsguiders.com/gain-access/" style="text-decoration:none;color:white;">
            <?php
            $SubscriberDAO = new SubscriberDAO($db);
            if($SubscriberDAO->getNumberOfActiveSubscribers()!=0){
                echo 'Only '.$SubscriberDAO->getNumberOfActiveSubscribers().' '.date('Y').' Subscriptions Left!';
            }else{
                echo 'Sorry, no more subscriptions are available for '.date('Y').' ';
            }

            ?>
                </a>
            </p>
        </div>
    </div>
<?php } ?>
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
    new WOW().init();
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

<script src="<?php echo $webPath;?>scripts/koel.js"></script>
<!-- End Scripts -->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!-- End Scripts -->

</body>
