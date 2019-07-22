<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add_innovationcheck</title>
</head>
<body>
<?php
require_once('connection.php');

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
 $innovation_details= $_POST['innovation_details'];
 $innovation_id = $_POST['innovation_id'];
 $upload=$_FILES['innovation_img2'];
 
	if ($upload['name'] !== '') {
		//โฟลเดอร์ที่เก็บไฟล์
		$path="images/";
	  //ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($upload['name'],".");
 	  //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="images/".$newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($upload['tmp_name'],$path_copy);
 		}

 		if ($_FILES['innovation_img2']['name'] !== '') {
 		$check = $newname;
 		} else {
 		$check = $_POST['oldfile'];
 		}
	$sql="UPDATE tb_home_innovation SET
		innovation_headline='$innovation_headline',
		innovation_subheadline='$innovation_subheadline',
		innovation_bottom='$innovation_bottom',
		innovation_details='$innovation_details',
		innovation_img='$check'
		WHERE innovation_id='$innovation_id'";
		$query = mysqli_query($con, $sql);

		if ($query) {
			$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
			echo "<script type='text/javascript'>alert('$message1');
			window.location='manage_slogan.php';
			</script>";
		}

// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

?>

</body>
</html>
