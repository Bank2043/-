<meta charset="UTF-8">
<?php
include('../conn.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	//รับค่าไฟล์จากฟอร์ม
	
$dttm = Date("Y-m-d H:i:s");

$id_member = $_POST['id_member'];
$o_name = $_POST['o_name'];
$o_email = $_POST['o_email'];
$o_phone = $_POST['o_phone'];
$o_id = $_POST['o_id'];


$p_img =(isset($_POST['p_img']) ? $_POST['p_img'] :'');


//img
	$upload=$_FILES['p_img'];
	if($upload <> '') {
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="p_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='p_img'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="p_img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);
	}
	


	
     $sql = "INSERT INTO tbl_pay(pay_ottm,pay_idmember,pay_name,pay_email,pay_phone,p_img,o_id)VALUES('$dttm','$id_member','$o_name','$o_email','$o_phone','$newname','$o_id ')";
		
		$result = mysqli_query($conn, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($conn);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('ส่งหลักฐานการโอนเงิน สำเร็จ');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('ล้มเหลว ส่งหลักฐานการโอนอีกครั้ง');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
?>