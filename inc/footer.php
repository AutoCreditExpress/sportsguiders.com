<!-- Footer -->
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
                <li><a href="//instagram.com/@Sportsguiders" target="_blank" class="hvr-rectangle-out hvr-twitter"><i class="fa fa-instagram red"></i></a></li>
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
                $('#chatLink').click(function(){
                    if($('#chatSection').is(':hidden')){
                        $('#chatSection').show();
                    }else{
                        $('#chatSection').hide();
                    }
                });
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
<?php }else{ ?>
        <div style="position:fixed;bottom:0px;right:5%;z-index:99999;padding:7px;padding-bottom:0px;">
                    <!-- begin olark code -->
                    <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
                            f[z]=function(){
                                (a.s=a.s||[]).push(arguments)};var a=f[z]._={
                            },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
                                f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
                                0:+new Date};a.P=function(u){
                                a.p[u]=new Date-a.p[0]};function s(){
                                a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
                                hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
                                return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
                                b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
                                b.contentWindow[g].open()}catch(w){
                                c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
                                var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
                                b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
                            loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
                        /* custom configuration goes here (www.olark.com/documentation) */
                        olark.identify('1438-726-10-7042');/*]]>*/</script><noscript><a href="https://www.olark.com/site/1438-726-10-7042/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
                <!-- end olark code -->
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

<script src="<?php echo $webPath;?>scripts/koel.js"></script>
<!-- End Scripts -->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //scroll bar fix
        $('#ascrail2000').css('z-index','99');
    })
</script>
<!-- End Scripts -->
</body>
