<?php include('../inc/config.php'); ?>
<?php include 'inc/config.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<?php

$PlayerDAO = new PlayerDAO($db);

$Players = $PlayerDAO->getAllPlayers();
$playerInput = '';
foreach($Players as $player){
    $playerInput .= '<option value="'.$player->getID().'">'.$player->getName().' - '.$player->getTeam().'</option>';
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


                    <h2>Waiver Add</h2>
                </div>
                <!-- END Select Component Title -->

                <!-- Select Component Content -->
                <form action="<?php echo $webPath;?>inc/report/waiver-add.php" method="post" class="form-horizontal form-bordered" >
                    <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 1</label>
                        <div class="col-md-5">
                            <select id="player1" name="player1" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 1 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player1note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 2</label>
                        <div class="col-md-5">
                            <select id="player2" name="player2" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 2 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player2note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 3</label>
                        <div class="col-md-5">
                            <select id="player3" name="player3" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 3 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player3note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 4</label>
                        <div class="col-md-5">
                            <select id="player4" name="player4" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 4 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player4note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 5</label>
                        <div class="col-md-5">
                            <select id="player5" name="player5" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 5 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player5note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 6</label>
                        <div class="col-md-5">
                            <select id="player6" name="player6" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 6 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player6note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 7</label>
                        <div class="col-md-5">
                            <select id="player7" name="player7" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 7 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player7note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 8</label>
                        <div class="col-md-5">
                            <select id="player8" name="player8" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 8 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player8note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 9</label>
                        <div class="col-md-5">
                            <select id="player9" name="player9" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 9 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player9note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Player 10</label>
                        <div class="col-md-5">
                            <select id="player10" name="player10" class="select-chosen" data-placeholder="Choose a Player.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <?php echo $playerInput; ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label" >Player 10 Notes</label>
                        <div class="col-md-5">
                            <textarea style="width: 100%;" name="player10note"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                        <input type="hidden" name="position" value="29">
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

<?php if($_GET['k']): ?>
    <script>
        $(document).ready(function()
        {
            var growlType = 'success';
            $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>You have added the kickers...</p>', {
                type: growlType,
                delay: 3000,
                allow_dismiss: true,
                offset: {from: 'top', amount: 20}
            });
        });


    </script>
<?php endif; ?>

<?php include 'inc/template_end.php'; ?>