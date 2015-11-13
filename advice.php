<?php
require 'inc/config.php';

$SubscriberDAO=new SubscriberDAO($db);

if ($login->isUserLoggedIn() == true) {
}else{
    header("Location: ".$webPath."login/");
}

include($docPath.'inc/header.php');
//if there is post data and the user has already been created and is active, update the card info
Stripe::setApiKey("sk_live_DBjtHb3jETlJt7uTV7mlUDd3");
$error = '';
$success = '';
?>
<script>
    $(document).ready(function(){
        $('.fancybox').fancybox().trigger('click');

    });
</script>
<div id="waterMark" class="" style="margin:0px;padding:0px;width:100%;background:black;background-image:url('http://www.sportsguiders.com/img/sg-main-banner.jpg');background-size:100%;background-repeat:no-repeat;width:100% 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="olark-box-container"></div>
            </div>
            <div class="col-md-6 text-center">
            </div>
        </div>
    </div>
</div>
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
    //show the box on page load without user interaction
    //on page setup
    olark.configure('box.inline',true);

    //id
    olark.identify('1438-726-10-7042');/*]]>*/</script><noscript><a href="https://www.olark.com/site/1438-726-10-7042/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<style>
    #waterMark {opacity:.8;}
</style>
<script>
    $(document).ready(function(){
        var docHeight=$(document).height();
        var headHeight=$('#header').height();
        var newHeight=docHeight-headHeight;
        $('#waterMark').css('height',newHeight);
    });
</script>
<a href="<?=$webPath;?>popupAdvice.php" class="fancybox fancybox.ajax" style="display:none;">&nbsp;</a>