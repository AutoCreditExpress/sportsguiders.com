/*
  Author: Lumberjacks
  Template: Timber (Coming Soon)
  Version: 1.0
  URL: http://themeforest.net/user/Lumberjacks/
*/

(function($) {
  "use strict";

  $(document).ready(function (){
    'use strict';

    // E-mail validation via regular expression
    function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
      return pattern.test(emailAddress);
    };

    // Subscription form notifications and AJAX function
    $(function () {
      $("#subscribe").on('submit', function (event) {
        var input = $('.lj-subscribe-message');
          if(!input.is(':empty')) {
            $('.lj-subscribe-message').stop(true);
          }
          event.preventDefault();
          event.stopImmediatePropagation();

          var email = $("input#subscribe-email").val();

          if (email == "") {

            $(".lj-subscribe-message").stop(true).html('<i class="icon ion-android-warning"></i> You must enter a valid e-mail address.');
            $("input#subscribe-email").focus();
          } 
          else if (!isValidEmailAddress( email )) {
            $(".lj-subscribe-message").stop(true).html('<i class="icon ion-android-warning"></i> E-mail address is not valid.');
            $("input#subscribe-email").focus();            
          }
          else {
            $.ajax({
              type: "POST",
              url: "./php/send-subscription.php",
              data: {subscription:email},
              success: function () {
                $(".lj-subscribe-message").html('<i class="icon ion-android-done"></i> We will be in touch soon!');
                $('input#subscribe-email').val('');
              }
            });
          }
       });
    });

    // Countdown
    // To change date, simply edit: var endDate = "January 1, 2016 00:00:00";
    $(function() {
      var endDate = "August 18, 2016 00:00:00";
      $('.lj-cd').countdown({
        date: endDate,
        render: function(data) {
          $(this.el).html(parseInt(this.leadingZeros(data.years, 2)*365,10) + parseInt(this.leadingZeros(data.days, 2),10) + '&nbsp;days');
        }
      });
    });

    // backstretch
    $("header").backstretch("img/bg.jpg");

    // JQUERY.MB.YTPLAYER
    /*$(function(){
      $(".yt-player").mb_YTPlayer();
    });*/

    // yt controls
    /*$('#yt-play').on('click',function(event){
      event.preventDefault();
      if ($(this).hasClass("ion-play") ) {
          $('.yt-player').playYTP();
      } else {
          $('.yt-player').pauseYTP(); 
      }
      $(this).toggleClass("ion-play ion-pause");
      return false;
    });
    $('#yt-volume').on('click',function(event){
      event.preventDefault();
      $('.yt-player').toggleVolume();
      $(this).toggleClass("ion-android-volume-off ion-android-volume-up");
      return false;
    });*/

    // WOW initalization
    new WOW().init();

  });

  // Preloader
  // Change delay and fadeOut speed (in miliseconds)
  $(window).load(function() {
    $(".lj-preloader").delay(100).fadeOut(500);
  });

})(jQuery);