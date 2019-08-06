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
	$sm_image = isset($_POST['sm_image']) ? $_POST['sm_image'] : '';


		 $upload=$_FILES['sm_image'];
		 if($upload <> '') {

		 //โฟลเดอร์ที่เก็บไฟล์
		 $path="imagesmobile/";
		 //ตัวขื่อกับนามสกุลภาพออกจากกัน
		 $type = strrchr($_FILES['sm_image']['name'],".");
		 //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		 $newname =$numrand.$date1.$type;

		 $path_copy=$path.$newname;
		 $path_link="imagesmobile/".$newname;
		 //คัดลอกไฟล์ไปยังโฟลเดอร์
		 move_uploaded_file($_FILES['sm_image']['tmp_name'],$path_copy);


		 }


	 $sql = "INSERT INTO tb_slidemobile (sm_image)
	 		 values ('$newname')";
	$query = mysqli_query($con, $sql);


		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
	echo "<script type='text/javascript'>alert('$message1');
	window.location='materdei-backend/add_slide.php';
	</script>";




// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

?>

</body>

</html>