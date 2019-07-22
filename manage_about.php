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

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div align="right">
                                        <a href="add_about"><button type="button" class="btn btn-success">Add
                                                about</button></a>
                                    </div>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sort</th>
                                                <th>Headline</th>
                                                <th>Sub headline</th>
                                                <th>Link</th>
                                                <!-- <th>Details</th> -->
                                                <th>Images</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      // 1. ติดต่อฐานข้อมูล
                      include("connection.php");

                      // 2. ใส่โค๊ด SQL
                      $sql = 'SELECT * FROM tb_home_about';
                      $query = mysqli_query($con, $sql);
                      $i=1;
                      //3. วนลูปแสดง
                      while ($row = mysqli_fetch_array($query))
                      {
                      ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $row['a_name']?></td>
                                                <td><?php echo $row['a_title']?></td>
                                                <td><?php echo $row['a_bottom']?></td>
                                                <!-- <td><?php //echo $row['a_details']?></td> -->
                                                <td> <?php //echo $row['a_img'] ?> <img
                                                        src="images/<?php echo $row['a_img']; ?>" width="100" height="">
                                                </td>
                                                <td><a href="update_about?id=<?php  echo $row['a_id'];  ?>"><button
                                                            type="button" class="btn btn-primary">Edit</button></a></td>
                                                <td><a href="deleteabout?id=<?php  echo $row['a_id'];  ?>"><button
                                                            type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
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
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>

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