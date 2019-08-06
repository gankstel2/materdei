<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add_slide</title>
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
	$size = isset($_POST['desktop']) ? $_POST['desktop'] : $_POST['mobile'];
		 // $upload = $_FILES['slide_img'] ? $_FILES['slide_img'] : $_FILES['sm_image'] ;
		if ($size === 'desktop') {
			 $upload = $_FILES['slide_img'] ? $_FILES['slide_img'] : '' ;
		}else {
			$upload = $_FILES['sm_image'] ? $_FILES['sm_image'] : '' ;
		}
		 if ($upload <> '') {
		 	 // PATH
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

		if ($size === 'desktop') {
			$sql = "INSERT INTO tb_home_banner (slide_img) values ('$newname')";
		} else {
			$sql = "INSERT INTO tb_home_banner (slide_img, slide_img_m) values ('','$newname')";
				// var_dump('mobile');
				// exit();
		}

	$query = mysqli_query($con, $sql);
		if ($query) {
			$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
			echo "<script type='text/javascript'>alert('$message1');
			window.location='materdei-backend/add_slide.php';
			</script>";
		} else {
			echo "Fuck";
			exit();
		}
// 		var_dump($sql);
// 	 exit()
//
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// };





// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

?>

</body>

</html>