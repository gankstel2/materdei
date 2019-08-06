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
 $about_headline = $_POST['about_headline'];
 $about_details = $_POST['about_details'];
 $file_desktop = $_FILES['about_banner'];
 $file_mobile= $_FILES['about_mobanner'] ;

 
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


	 $sql = "INSERT INTO tb_menu_about (about_id,about_headline,about_details,about_banner,about_mobanner)
     VALUES (null,'$about_headline','$about_details','$checkDesktop','$checkMobile')";
    $query = mysqli_query($con, $sql)or die(mysqli_error($con));
 


	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='materdei-backend/add_menu_about.php';
		</script>";
	} else {
		echo "Fuck";
		exit();
	}


// 4.ปิดการเชื่อมต่อ
mysqli_close ($con);
?>

</body>

</html>