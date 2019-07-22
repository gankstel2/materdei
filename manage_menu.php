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
                    <center>
                        <h1 class="box-title">Menu Edit</h1>
                    </center>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <center>

                </center>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sort</th>
                                <th>Menu Headline</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                      // 1. ติดต่อฐานข้อมูล
                      include("connection.php");

                      // 2. ใส่โค๊ด SQL
                      $sql = 'SELECT * FROM tb_menu';
                      $query = mysqli_query($con, $sql);
                      $i=1;
                      //3. วนลูปแสดง
                      while ($row = mysqli_fetch_array($query))
                      {
                      ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['menu_headline']?></td>
                                <td><a href="update_menu?id=<?php  echo $row['menu_id'];  ?>"><button type="button"
                                            class="btn btn-primary">Edit</button></a></td>
                                <td><a href="deletemenu.php?id=<?php  echo $row['menu_id'];  ?>"><button type="button"
                                            class="btn btn-danger">Delete</button></a></td>
                            </tr>

                            <?php
                    }
                    // 4.ปิดการเชื่อมต่อ
                    mysqli_close ($con);
                    ?>


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </form>

    </div>
    <!-- /.box-body -->

    <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
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