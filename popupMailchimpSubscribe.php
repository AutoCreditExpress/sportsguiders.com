<?php
require ('inc/config.php');

?>
    <script>
        $(document).ready(function(){
            $('.mailchimp').click(function(){
                var theEmail = $('#email').val();
                $.get("<?=$webPath;?>mailchimp.php?email="+theEmail, function(data, status){
                    if(data=='complete') {
                        $('#errorResponse').html(data);
                        alert('Thank you for signing up!');
                        jQuery.fancybox.close();
                        ///remove reocurring pop after mail integration.
                    }else{
                        $('#errorResponse').html(data);
                    }
                });

            });

        });
    </script>
<Style>
    @media screen and (max-width:414px) {
        .popupMailchimp {font-size:1.5em;}
    }

</Style>
    <div class="text-center">
        <h2 class="popupMailchimp" style="color:black;line-height:1;">
            Would you like us to send you an email<br>when Your Weekly Playbook is refreshed once a week?
            <br>
            <input type="text" name="email" id="email" placeholder="email address" style="margin:3px;">
            <br>
            <button class=" btn btn-red btn-lg btn-rounded mailchimp" href="#" style="margin:3px;">Yes, I love to win!</button>
        </h2>
        <a class="closeMe" href="javascript:jQuery.fancybox.close();" style="cursor:pointer;text-decoration:none;color:black;font-size:1em!important;">No Thanks</a>
        <div id="errorResponse"></div>
    </div>
    <?php

?>
