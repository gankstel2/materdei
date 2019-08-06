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
	$serviam_headline = $_POST['serviam_headline'];
	$serviam_subheadline = $_POST['serviam_subheadline'];
	$serviam_img = isset($_POST['serviam_img']) ? $_POST['serviam_img'] : '';


		 $upload=$_FILES['serviam_img'];
		 if($upload <> '') {

		 //โฟลเดอร์ที่เก็บไฟล์
		 $path="images/";
		 //ตัวขื่อกับนามสกุลภาพออกจากกัน
		 $type = strrchr($_FILES['serviam_img']['name'],".");
		 //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		 $newname =$numrand.$date1.$type;

		 $path_copy=$path.$newname;
		 $path_link="images/".$newname;
		 //คัดลอกไฟล์ไปยังโฟลเดอร์
		 move_uploaded_file($_FILES['serviam_img']['tmp_name'],$path_copy);
		 }


	 $sql = "INSERT INTO tb_about (serviam_headline,serviam_subheadline,serviam_img)
	 values ('$serviam_headline','$serviam_subheadline','$serviam_img')";
	$query = mysqli_query($con, $sql);


	$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
 echo "<script type='text/javascript'>alert('$message1');
 window.location='materdei-backend/add_serviam.php';
 </script>";


// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>

</body>

</html>