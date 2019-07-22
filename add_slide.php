<!DOCTYPE html>
<html>

<?php
include ('head.php');
?>
        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
<?php
include ('leftside.php');
?>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="box box-primary">
                            <div class="box-heder with-border">
                                <h2 class="box-title">Add Banner desktop<h2>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="add_slidecheck.php" class="create-account-form" method="POST"
                                enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile"></label>
                                            <input type="file" name="slide_img" required="required">
                                            <input type="hidden" name="desktop" value="desktop">
                                            <p class="help-block">Choose file</p>
                                            <button type="submit" name="submitcreate"
                                                class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box box-primary">
                            <div class="box-heder with-border">
                                <h2 class="box-title">Add Banner mobile<h2>
                            </div>
                            <form action="add_slidecheck" role="form" class="create-account-form" method="POST"
                                enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile"></label>
                                            <input type="file" name="sm_image" required="required">
                                            <input type="hidden" name="mobile" value="mobile">
                                            <p class="help-block">Choose file</p>
                                            <button type="submit" name="submitcreate" class="btn btn-primary">
                                                Confirm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="box-footer">
                        </div>

                    </div>


            </section>

        </div>

        <!-- /.box-footer-->
        <?php
        include ('footersidebar.php');
        ?>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>