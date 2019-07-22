<?php
	include('connection.php');

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	//รับชื่อไฟล์จากฟอร์ม
	$admission_headline = $_POST['admission_headline'];
  	$admission_subheadline = $_POST['admission_subheadline'];
  	$admission_bottom = $_POST['admission_bottom'];
  //  $size = isset($_POST['desktop']) ? $_POST['desktop'] : $_POST['mobile'];
  	$admission_id = $_POST['admission_id'];
	$file_desktop = $_FILES['admission_img2'];
	$file_mobile= $_FILES['admission_moimg2'] ;

			// if ($size === 'desktop') {
			// 	$upload = $_FILES['admission_img'] ? $_FILES['admission_img'] : '' ;
			// }else {
			// 	$upload = $_FILES['admission_moimg'] ? $_FILES['admission_moimg'] : '' ;
            // }
	
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
  
	if ($_FILES['admission_img2']['name'] !== '') {
		$checkDesktop = $newnameDesktop;
	} else {
		$checkDesktop = $_POST['oldfile'];
	}

	if ($_FILES['admission_moimg2']['name'] !=='') {
		$checkMobile = $newnameMobile;
	} else {
		$checkMobile = $_POST['oldfile'];
	}
	
	$sql = "UPDATE tb_home_admission SET
      admission_headline='$admission_headline',
      admission_subheadline='$admission_subheadline',
      admission_bottom='$admission_bottom',
      admission_img='$checkDesktop',
      admission_moimg='$checkMobile'
      WHERE admission_id='$admission_id'";
      $query = mysqli_query($con, $sql);

	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='manage_admission.php';
		</script>";
	} else {
		echo "Fuck";
		exit();
	}

	// // 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
?>