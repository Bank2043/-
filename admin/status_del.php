<?php
//1. เชื่อมต่อ database: 
include('../conn.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$o_id = $_REQUEST["o_id"];
 
//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
 
$sql = "DELETE FROM order_head WHERE o_id='$o_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result)
  {
  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'status.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>