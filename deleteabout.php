<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php

$a_id = $_GET['id'];


// 1. ติดต่อฐานข้อมูล
include("connection.php");


// 2. ใส่โค๊ด SQL
$sql = "delete from tb_home_about where a_id = '$a_id'";
$query = mysqli_query($con, $sql);

$message1 = 'ได้ทำการลบข้อมูลเรียบร้อยแล้ว';
 echo "<script type='text/javascript'>alert('$message1');
 window.location='manage_about.php';
 </script>";
// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>
</body>

</html>