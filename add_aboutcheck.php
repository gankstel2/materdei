<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add_product</title>
</head>

<body>

    <?php
include('connection.php');
// 1. ติดต่อฐานข้อมูล
// $con= mysqli_connect("localhost","root",'','project') ;
// mysqli_query($con, "SET NAMES 'utf8' ");

 //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
 date_default_timezone_set('Asia/Bangkok');
 //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
 $date1 = date("Ymd_His");
 //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
 $numrand = (mt_rand());

 //รับชื่อไฟล์จากฟอร์ม
 $a_name = $_POST['a_name'];
 $a_title = $_POST['a_title'];
 $a_bottom = $_POST['a_bottom'];
 $a_details = $_POST['a_details'];
 $a_img = isset($_POST['a_img']) ? $_POST['a_img'] : '';


		 $upload=$_FILES['a_img'];
		 if($upload <> '') {

		 //โฟลเดอร์ที่เก็บไฟล์
		 $path="images/";
		 //ตัวขื่อกับนามสกุลภาพออกจากกัน
		 $type = strrchr($_FILES['a_img']['name'],".");
		 //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		 $newname =$numrand.$date1.$type;

		 $path_copy=$path.$newname;
		 $path_link="images/".$newname;
		 //คัดลอกไฟล์ไปยังโฟลเดอร์
		 move_uploaded_file($_FILES['a_img']['tmp_name'],$path_copy);
		 }


	 $sql = "INSERT INTO tb_home_about (a_name,a_title,a_bottom,a_details,a_img)
	 values ('$a_name','$a_title','$a_bottom','$a_details','$newname')";
	$query = mysqli_query($con, $sql);


	$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
 		echo "<script type='text/javascript'>alert('$message1');
	 	window.location='add_about.php';
 		</script>";


// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>

</body>

</html>