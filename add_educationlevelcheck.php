<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add_types</title>
</head>
<body>

<?php

  $education_level = $_POST['education_level'];


// 1. ติดต่อฐานข้อมูล
 include("connection.php");


  $sql = "INSERT INTO tb_education_level (education_level)
	values ('$education_level')";
  $query = mysqli_query($con, $sql);


    $message1 = 'ได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว';
    echo "<script type='text/javascript'>alert('$message1');
    window.location='materdei-backend/add_educationlevel.php';
    </script>";

// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

// Header("Location: add_cat.php");
?>

</body>
</html>
