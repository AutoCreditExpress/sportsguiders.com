<?php
require ('inc/config.php');

if($_SESSION['user_email']){
    ?>
    <div class="text-center">
        <!--<h1 style="color:black;">NOTICE!!</h1>-->
        <h2 style="color:black;line-height:1;">Please upgrade your account to view<br>The Recap every week all season long!<br>Just 56&cent;/week.<br><a class=" btn btn-red btn-lg btn-rounded" href="<?=$webPath;?>billing_info/">Upgrade</a></h2>
    </div>
    <?php
}else{
    ?>
    <div class="text-center">
        <!--<h1 style="color:black;">NOTICE!!</h1>-->
        <h2 style="color:black;line-height:1;">Get The Recap every week all season long!
            <br>
            <a class=" btn btn-red btn-lg btn-rounded" href="<?=$webPath;?>login/">Log in</a>
            <br>
            <span style="font-size:26px;font-weight:bold;">- or -</span>
            <br>
            <a class=" btn btn-red btn-lg btn-rounded" href="<?=$webPath;?>gain-access/">Gain Access</a>
            <br>
            Just 56&cent;/week!</h2>
    </div>
    <?php
}
?>
