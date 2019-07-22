<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<body>
<?php
 include("connection.php");

$Username = $_POST['Username'] ;
$Password = $_POST['Password'] ;
$email = $_POST['email'] ;
$Name = $_POST['Name'] ;
$status = $_POST['status'] ;
// var_dump($status);

// 1. ติดต่อฐานข้อมูล
    $sql = "INSERT INTO tb_admin (Username,Password,email,Name,status)
    VALUES ('$Username','$Password','$email','$Name','$status')";
    $query = mysqli_query($con, $sql);
    
    // $sql = "insert INTO tb_admin VALUES ('','$username','$email','$password','$status')";
	// $query = mysqli_query($con, $sql);
    // var_dump($sql);

    $message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
    echo "<script type='text/javascript'>alert('$message1');
    window.location='login.php';
    </script>";

// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);


?>

</body>
</html>
