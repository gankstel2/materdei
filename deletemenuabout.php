<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php

$about_id = $_GET['id'];


// 1. ติดต่อฐานข้อมูล
include("connection.php");


// 2. ใส่โค๊ด SQL
$sql = "delete from tb_menu_about where about_id = '$about_id'";
$query = mysqli_query($con, $sql);

$message1 = 'ได้ทำการลบข้อมูลเรียบร้อยแล้ว';
 echo "<script type='text/javascript'>alert('$message1');
 window.location='materdei-backend/manage_menu_about.php';
 </script>";
// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>
</body>

</html>