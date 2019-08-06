<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add_product</title>
</head>

<body>

    <?php
include('connection.php');


	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	//รับชื่อไฟล์จากฟอร์ม
	$innovation_headline = $_POST['innovation_headline'];
	$innovation_subheadline = $_POST['innovation_subheadline'];
	$innovation_bottom = $_POST['innovation_bottom'];
	$innovation_details = $_POST['innovation_details'];
	$innovation_img = isset($_POST['innovation_img']) ? $_POST['innovation_img'] : '';


		$upload=$_FILES['innovation_img'];
		if($upload <> '') {

		//โฟลเดอร์ที่เก็บไฟล์
		$path="images/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['innovation_img']['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="images/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['innovation_img']['tmp_name'],$path_copy);
		}

	 $sql = "INSERT INTO tb_home_innovation (innovation_headline,innovation_subheadline,
		 				innovation_bottom,innovation_details,innovation_img)
	 values ('$innovation_headline','$innovation_subheadline',
		 	'$innovation_bottom','$innovation_details','$newname')";
	$query = mysqli_query($con, $sql);

	
	$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
 echo "<script type='text/javascript'>alert('$message1');
 window.location='materdei-backend/add_innovation.php';
 </script>";


// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>

</body>

</html>