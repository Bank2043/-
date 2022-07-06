<?php
	session_start();
    include("../conn.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
    
	date_default_timezone_set('Asia/Bangkok');
	 
	$name = $_POST["name"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$o_status = $_POST["o_status"];
	$id_member = $_POST["id_member"];
	$dttm = Date("Y-m-d H:i:s");
	

	mysqli_query($conn, "BEGIN"); 
	$sql1	= "insert into order_head values(null, '$dttm', '$name', '$address', '$email', '$phone','$o_status',$id_member)";
	$query1	= mysqli_query($conn, $sql1);
	
	$sql2 = "select max(o_id) as o_id from order_head where o_name='$name' and o_email='$email' and o_dttm='$dttm' ";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];

	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from tbl_product where p_id=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['p_price']*$qty;
		
		$sql4	= "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total')";
		$query4	= mysqli_query($conn, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>
 
 
 
 
 
 
</body>
</html>