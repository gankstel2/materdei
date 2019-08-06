<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add_types</title>
</head>

<body>

<?php

    $menu_headline = $_POST['menu_headline'];


    // 1. ติดต่อฐานข้อมูล
    include("connection.php");


  $sql = "INSERT INTO tb_menu (menu_headline)
	values ('$menu_headline')";
    $query = mysqli_query($con, $sql);


    $message1 = 'ได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว';
    echo "<script type='text/javascript'>alert('$message1');
    window.location='materdei-backend/add_menu.php';
    </script>";

// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

// Header("Location: add_cat.php");
?>

</body>

</html>