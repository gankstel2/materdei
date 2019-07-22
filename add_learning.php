<!DOCTYPE html>
<html>

<?php
include ('head.php');
?>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.wallform.js"></script>

    <script>
    //สร้าง function สำหรับการแสดงตัวอย่างภาพที่อัพโหลด
    $(document).ready(function() {

        $('#photoimg').die('click').live('change', function() {
            //$("#preview").html('');

            $("#imageform").ajaxForm({
                target: '#preview',
                beforeSubmit: function() {
                    //เมื่ออัพโหลดภาพไปแล้วจะแสดงไฟล์ .gif loading
                    console.log('ttest');
                    $("#imageloadstatus").show();
                    $("#imageloadbutton").hide();
                },

                //อัพโหลดเสร็จแล้วซ่อนไฟล์ .gif loading
                success: function() {
                    console.log('test');
                    $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                },
                //error
                error: function() {
                    console.log('xtest');
                    $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                }
            }).submit();


        });
    });
    </script>

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
                                <center>
                                    <h2 class="box-title">Add Learning Activity<h2>
                                </center>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
            <form action="add_learningcheck" class="create-account-form" method="POST"
                enctype="multipart/form-data">
                <div class="box-body">
                    <div class="box-body">

                        <center><div class="form-group">
                        <h4><label>Education level</label></h4>
                            <select name="education_id">
                                <?php
                    //ติดต่อฐานข้อมูล
                    $con = @mysqli_connect('localhost','root','','materdei');
                    mysqli_set_charset($con,"utf8");
                    $sql="Select * from tb_education_level Order by education_id ASC ";

                    $query=mysqli_query($con,$sql);
                    while($data=mysqli_fetch_array($query)){
                    ?>
                                <option value="<?php echo $data['education_id']?>">
                                    <?php echo $data['education_level']?></option>
                                <?php } ?>

                            </select>
                        </div></center>
                        <div class="col-sm-9">
                        <h3><label>Learning activities</label></h3>
                        <textarea  name="learning_activity" class="form-control" id="editor"
                        required="required"> 
                        </textarea>
                        </div>

                        <div class="col-sm-9">
                        <h3><label for="exampleInputPassword1">Field trip</label></h3>
                        <textarea  name="field_trip" class="form-control" id="editor2"
                        required="required"> 
                        </textarea>
                        </div>

                        <div class="col-sm-9">
                        <h3><label for="exampleInputPassword1">Social work activities</label></h3>
                                <textarea  name="social_work" class="form-control" id="editor3"
                                required="required"> 
                        </textarea>
                        </div>

                        <div class="col-sm-9">
                        <h3><label for="exampleInputPassword1">Art, music, sports</label></h3>
                            <textarea  name="order_subject" class="form-control" id="editor4"
                            required="required"> 
                            </textarea>
                        </div>

                        <div class="col-sm-9">
                        <h3><label for="exampleInputPassword1">elective subject</label></h3>
                                <textarea  name="elective_subject" class="form-control" id="editor5"
                            required="required"> 
                            </textarea>
                        </div>

                        <div class="col-sm-9">
                        <h3><label for="exampleInputPassword1">Floor activity</label></h3>
                            <textarea  name="floor_activity" class="form-control" id="editor6"
                            required="required"> 
                            </textarea>
                        </div>
                        
                        <div class="col-sm-6">
                        <h3><label for="exampleInputFile">Add image</label></h3>
                            <input type="file" name="learning_img[]" required="required" multiple="multiple">
                            <p class="help-block">Choose file</p>
                            <button type="submit" name="submitcreate"
                                class="btn btn-primary">Comfirm</button>
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
    <script>
    initSample();
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>