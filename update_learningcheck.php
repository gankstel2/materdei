<?php
	include('connection.php');

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());

    define ("MAX_SIZE","2000"); // 2MB MAX file size
    function getExtension($str) {
        $i = strrpos($str,".");

        if (!$i) { return ""; }
        
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
	//รับชื่อไฟล์จากฟอร์ม
	$education_id = $_POST['education_id'];
    $learning_activity = $_POST['learning_activity'];
    $field_trip = $_POST['field_trip'];
    $social_work = $_POST['social_work'];
    $order_subject = $_POST['order_subject'];
    $elective_subject = $_POST['elective_subject'];
    $floor_activity = $_POST['floor_activity'];
    $learning_id = $_POST['learning_id'];
    $file_desktop = $_FILES['learning_img2'];


// ตรวจสอบนามสกุลของภาพที่อัพโหลด 
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    $uploaddir = "images/"; //โฟลเดอร์ที่เก็บภาพ อย่าลืมสร้างนะครับ!!
    $array = [];
        foreach ($_FILES['learning_img2']['name'] as $name => $value) {
        $filename = stripslashes($_FILES['learning_img2']['name'][$name]);
        $size=filesize($_FILES['learning_img2']['tmp_name'][$name]);
        //Convert extension into a lower case format
        $ext = getExtension($filename);
        $ext = strtolower($ext);
//File extension check
            if (in_array($ext,$valid_formats)) {
//ขนาดของภาพหน้ามเกิน 1mb
                if ($size < (MAX_SIZE*1024)) { 
                    $image_name=time().$filename; 
                    $newname=$image_name; 
//อัพโหลดไฟล์ไปในโฟลเดอร์ที่กำหนด
                        if (move_uploaded_file($_FILES['learning_img2']['tmp_name'][$name], $newname)) {
                            if (!in_array($newname,$array)) {
                                array_push($array,$newname);
                            }          
                        }
                }
            }       
        }
    }

    $imagesGallery= implode (", ", $array);
    // var_dump($imagesGallery);
    // $serialized_array = serialize($array);
    /// unserialize
    // $unserialized_array = unserialize($serialized_array); 
    // // var_dump($serialized_array);
    
	$sql = "UPDATE tb_menu_learning SET
      education_id='$education_id',
      learning_activity='$learning_activity',
      field_trip='$field_trip',
      social_work='$social_work',
      order_subject='$order_subject',
      elective_subject='$elective_subject',
      floor_activity='$floor_activity'";

    if ($imagesGallery !== ''){
        $sql .= ",learning_img = '$imagesGallery'";
    }
    $sql .= " WHERE learning_id='$learning_id'";
    // var_dump($sql);

   
        $query = mysqli_query($con, $sql);

	if ($query) {
		$message1 = 'ได้ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
		echo "<script type='text/javascript'>alert('$message1');
		window.location='manage_learning.php';
		</script>";
	} else {
		echo "Fuck";
	}

	// // 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
?>