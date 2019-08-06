<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

$s_id = $_GET['s_id'];


// 1. ติดต่อฐานข้อมูล
include("connection.php");

// 2. ใส่โค๊ด SQL
$sql = "delete from tb_home_banner where s_id = $s_id";
$query = mysqli_query($con, $sql);


// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>


	ลบข้อมูลเรียบร้อยแล้ว
	<a href="materdei-backend/manage_slide.php">กลับหน้าแรก</a>
</body>
</html>
