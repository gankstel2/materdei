<?php
	include('connection.php');

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	//รับชื่อไฟล์จากฟอร์ม
	$serviam_headline = $_POST['serviam_headline'];
	$serviam_subheadline = $_POST['serviam_subheadline'];
	//  $size = isset($_POST['desktop']) ? $_POST['desktop'] : $_POST['mobile'];
	$file_desktop = $_FILES['serviam_img'];
	$file_mobile= $_FILES['serviam_moimg'] ;
	
	if ($file_desktop['name'] !=='') {
		// PATH
		$path="images/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($file_desktop['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newnameDesktop =$numrand.$date1.$type;
		$path_copy=$path.$newnameDesktop;
		$path_link="images/".$newnameDesktop;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($file_desktop['tmp_name'],$path_copy);
	}

	if ($file_mobile['name'] !=='') {
		// PATH
		$path="images/";	
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($file_mobile['name'],".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newnameMobile =$numrand.$date1.$type;
		$path_copy=$path.$newnameMobile;
		$path_link="images/".$newnameMobile;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($file_mobile['tmp_name'],$path_copy);
	}

	$checkDesktop = $file_desktop['name'] !== '' ? $newnameDesktop : '';
	$checkMobile = $file_mobile['name'] !== '' ? $newnameMobile : '' ;
	
	$sql = "INSERT INTO tb_home_serviam
	(serviam_headline, serviam_subheadline, serviam_img, serviam_moimg)
	values ('$serviam_headline','$serviam_subheadline','$checkDesktop','$checkMobile')";
	$query = mysqli_query($con, $sql);

	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='materdei-backend/add_academic.php';
		</script>";
	} else {
		echo "Fuck";
		exit();
	}

	// // 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
?>