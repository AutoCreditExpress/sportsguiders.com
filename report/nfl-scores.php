<?php include('../inc/config.php'); ?>
<?php include 'inc/config.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<?php

$PlayerDAO = new PlayerDAO($db);
$TeamDAO = new TeamDAO($db);

$Teams = $TeamDAO->getAllTeams();

$teamInput = '';
foreach($Teams as $team){
    $teamInput .= '<option value="'.$team->getID().'">'.$team->getFullName().'</option>';
}


?>

<!-- Page content -->
<div id="page-content">
    <!-- Forms Components Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Create Report</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- END Forms Components Header -->



            <!-- Select Component Block -->
            <div class="block">
                <!-- Select Component Title -->
                <div class="block-title">


                    <h2>NFL Scores</h2>
                </div>
                <!-- END Select Component Title -->

                <!-- Select Component Content -->
                <form action="<?php echo $webPath;?>inc/report/add_scores.php" method="post" class="form-horizontal form-bordered" >
                    <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                    <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 1</label>
                        <div class="col-md-2">
                            <select id="1" name="1home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="1homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="1away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="1awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 2</label>
                        <div class="col-md-2">
                            <select id="1" name="2home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="2homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="2away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="2awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 3</label>
                        <div class="col-md-2">
                            <select id="1" name="3home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="3homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="3away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="3awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 4</label>
                        <div class="col-md-2">
                            <select id="1" name="4home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="4homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="4away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="4awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 5</label>
                        <div class="col-md-2">
                            <select id="1" name="5home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="5homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="5away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="5awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 6</label>
                        <div class="col-md-2">
                            <select id="1" name="6home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="6homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="6away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="6awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 7</label>
                        <div class="col-md-2">
                            <select id="1" name="7home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="7homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="7away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="7awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 8</label>
                        <div class="col-md-2">
                            <select id="1" name="8home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="8homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="8away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="8awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 9</label>
                        <div class="col-md-2">
                            <select id="1" name="9home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="9homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="9away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="9awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 control-label" for="example-chosen">Score 10</label>
                        <div class="col-md-2">
                            <select id="1" name="10home" class="select-chosen" data-placeholder="Home Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="10homescore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>



                        <div class="col-md-2">
                            <select  name="10away" class="select-chosen" data-placeholder="Away Team" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $teamInput; ?>

                            </select>
                        </div>


                        <div class="col-md-2">
                            <select name="10awayscore" class="select-chosen" data-placeholder="Score" style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php $i = 0;while($i <= 500){?>
    <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php $i++;}; ?>


                            </select>
                        </div>
                    </div>


                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                        <input type="hidden" name="position" value="7">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                <!-- END Select Component Content -->
            </div>
            <!-- END Select Component Block -->


        </div>
    </div>
    <!-- END Form Components Row -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
<script src="js/plugins/ckeditor/ckeditor.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsComponents.js"></script>
<script>$(function(){ FormsComponents.init(); });</script>
<script src="js/pages/uiProgress.js"></script>
<script>$(function(){ UiProgress.init(); });</script>

<?php if($_GET['facts']): ?>
    <script>
        $(document).ready(function()
        {
            var growlType = 'success';
            $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>You have added fun facts...</p>', {
                type: growlType,
                delay: 3000,
                allow_dismiss: true,
                offset: {from: 'top', amount: 20}
            });
        });


    </script>
<?php endif; ?>

<?php include 'inc/template_end.php'; ?>