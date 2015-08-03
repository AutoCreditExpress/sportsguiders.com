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
                <li><a href="www.facebook.com/SportsGuiders" class="hvr-rectangle-out hvr-facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="hvr-rectangle-out hvr-twitter"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
        <!-- End Footer Social Links -->
        <!--
        <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script>
$(document).ready(function(){
    $('.dialog').click(function(){
        var filename=this.getAttribute('data-file');
        $.get(filename+'.html', function(data, status){
            $('#'+filename).html(data);
            $('#'+filename).dialog();
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
                $( ".dialog" ).dialog();


        </script>
        -->
        <!-- Copyright -->
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
