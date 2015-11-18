<?php
include('inc/config.php');
if ($login->isUserLoggedIn() == true) {
} else {
    header("Location: ".$webPath."login/");
}
include($docPath.'inc/header.php');

$SubscriberDAO = new SubscriberDAO($db);
$ReportDAO = new ReportDAO($db);
//var_dump($ReportDAO->getActiveReportsForArchive());
?>
    <!-- Main -->
    <main role="main">

        <!-- Breadrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="splash-backup/index.html">Home</a></li>
                    <li class="active"><?php echo $_SESSION['user_first'].' '.$_SESSION['user_last'].'s';?> Account</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- Shop Process -->
        <section id="process" class="section-light">

            <!-- Shop Process Container -->
            <div class="container">

                <div class="row">

                    <!-- Steps -->
                    <div class="steps">
                        <!-- Step -->
                        <div class="col-md-12">
                            <p>Please choose a week to view the recap:</p>
                            <table>
                                <?php
                                /*
                                $TotalReports = count($ReportDAO->getActiveReportsForArchive());
                                $counter=0;
                                foreach($ReportDAO->getActiveReportsForArchive() as $value){
                                        $CurrentReportNumber = $TotalReports-$counter;
                                    ?>
                                    <tr>
                                        <td><a href="<?=$webPath?>the-recap/?id=<?php print_r($ReportDAO->getActiveReportsForArchive()[$counter]['report_id']);?>">Week <?=$CurrentReportNumber;?></a></td>
                                    </tr>
                                <?php
                                $counter=$counter+1;
                                }
                                */
                                ?>
                                <tr><td><a href="<?=$webPath;?>week11/">Week 11</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week10/">Week 10</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week9/">Week 9</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week8/">Week 8</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week6/">Week 6</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week5/">Week 5</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week4/">Week 4</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week3/">Week 3</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week2/">Week 2</a></td></tr>
                                <tr><td><a href="<?=$webPath;?>week1/">Week 1</a></td></tr>
                            </table>
                        </div>
                        <!-- End Step -->

                    </div>
                    <!-- End Steps -->

                </div>

            </div>
            <!-- End Shop Process Container -->

        </section>
        <!-- End Shop Process -->
    </main>
    <!-- End Main -->

<?php include($docPath.'inc/footer.php');?>