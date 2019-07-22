<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add_product</title>
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
$a_name = $_POST['a_name'];
$a_title = $_POST['a_title'];
$a_bottom = $_POST['a_bottom'];
$a_details = $_POST['a_details'];
$a_id = $_POST['a_id'];
$upload = $_FILES['a_img2'];
// if($upload != '')
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

	if ($_FILES['a_img2']['name'] !== '') {
		$check = $newname;
	} else {
		$check = $_POST['oldfile'];
	}
// $check = $_FILES['a_img2']['name'] !== '' ? $newname : $_POST['oldfile'];

$sql="UPDATE tb_home_about SET
    a_name='$a_name',
    a_title='$a_title',
    a_bottom='$a_bottom',
	a_details='$a_details',
	a_img = '$check'
    WHERE a_id='$a_id'";
	$query = mysqli_query($con, $sql);
	   
		//check if sql command done it will response true or flase.
	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='manage_about.php';
		</script>";
	}

// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);

  // Header("Location: manage_about.php");
?>

</body>

</html>