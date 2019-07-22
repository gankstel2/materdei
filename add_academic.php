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

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Materdei
                    <small>it all starts here</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>

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
                                <center>
                                    <h2 class="box-title">Add Academic<h2>
                                </center>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="add_academiccheck" class="create-account-form" method="POST"
                                enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="col-sm-9">
                                            <label>Headline</label>
                                            <input type="text" name="academic_headline" class="form-control"
                                                required="required" placeholder="">
                                        </div>

                                        <div class="col-sm-9">
                                            <label for="exampleInputPassword1">Link</label>
                                            <input type="text" name="academic_bottom" class="form-control"
                                                required="required" placeholder="">
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="exampleInputFile">Add image</label>
                                            <input type="file" name="academic_img">
                                            <input type="hidden" name="desktop" value="desktop">

                                            <p class="help-block">Choose file</p>
                                            <button type="submit" name="submitcreate"
                                                class="btn btn-primary">Comfirm</button>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="exampleInputFile">Add image mobile</label>
                                            <input type="file" name="academic_moimg">
                                            <input type="hidden" name="mobile" value="mobile">
                                            <p class="help-block">Choose file</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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