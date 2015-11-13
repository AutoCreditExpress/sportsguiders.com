<?php include('../inc/config.php'); ?>
<?php include 'inc/config.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


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


                    <h2>Fun Facts</h2>
                </div>
                <!-- END Select Component Title -->

                <!-- Select Component Content -->
                <form action="<?php echo $webPath;?>inc/report/add_fun_facts.php" method="post" class="form-horizontal form-bordered" >
                    <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Fantasy</label>
                        <div class="col-md-5">
                            <textarea name="fantasy" style="width: 100%;" rows="4"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">Life</label>
                        <div class="col-md-5">
                            <textarea name="life" style="width: 100%;" rows="4"></textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-chosen">History</label>
                        <div class="col-md-5">
                            <textarea name="history" style="width: 100%;" rows="4"></textarea>
                        </div>
                    </div>


                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
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

<?php if($_GET['dst']): ?>
    <script>
        $(document).ready(function()
        {
            var growlType = 'success';
            $.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>You have added DST/Special...</p>', {
                type: growlType,
                delay: 3000,
                allow_dismiss: true,
                offset: {from: 'top', amount: 20}
            });
        });


    </script>
<?php endif; ?>

<?php include 'inc/template_end.php'; ?>