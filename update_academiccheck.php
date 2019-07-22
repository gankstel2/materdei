<?php
	include('connection.php');

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	//รับชื่อไฟล์จากฟอร์ม
	$academic_headline = $_POST['academic_headline'];
    $academic_bottom = $_POST['academic_bottom'];
  //  $size = isset($_POST['desktop']) ? $_POST['desktop'] : $_POST['mobile'];
    $academic_id = $_POST['academic_id'];
	$file_desktop = $_FILES['academic_img2'];
	$file_mobile= $_FILES['academic_moimg2'] ;
	
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
  
	if ($_FILES['academic_img2']['name'] !== '') {
		$checkDesktop = $newnameDesktop;
	} else {
		$checkDesktop = $_POST['oldfile'];
	}

	if ($_FILES['academic_moimg2']['name'] !=='') {
		$checkMobile = $newnameMobile;
	} else {
		$checkMobile = $_POST['oldfile'];
	}
	
	$sql = "UPDATE tb_home_academic SET
      academic_headline='$academic_headline',
      academic_bottom='$academic_bottom',
      academic_img='$checkDesktop',
      academic_moimg='$checkMobile'
      WHERE academic_id='$academic_id'";
      $query = mysqli_query($con, $sql);

	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='manage_academic.php';
		</script>";
	} else {
		echo "Fuck";
		exit();
	}

	// // 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
?>