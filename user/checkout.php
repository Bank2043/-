<?php
session_start();
include('../conn.php');
$m_id = $_SESSION['m_id'];
$level = $_SESSION['level'];

if ($level != 'member') {
	header("location : index.php");
}

$queryadmin = "SELECT * FROM tbl_member WHERE m_id = $m_id";
$resultm = mysqli_query($conn, $queryadmin) or die("Error in query : $queryadmin" . mysqli_error());
$member = mysqli_fetch_array($resultm);






?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('head.php'); ?>
</head>

<body>



	<div>

		<?php include('navbar.php'); ?>

	</div>

	<div class="container">




		<div style="height:50px;"></div>
		<div class="row">
			<div class="col-lg-12">
				<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> ย้อนกลับ</a>
			</div>
		</div>

		<div style="height:10px;"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col" width="5%">ลำดับ</th>
					<th scope="col" width="15%">เลขสั่งสินค้า</th>
					<th scope="col" width="15%">เวลา</th>
					<th scope="col" width="25%">ชื่อ</th>
					<th scope="col" width=25%">ที่อยู่</th>
					<th scope="col" width="5%">อีเมล</th>
					<th scope="col" width="10%">เบอร์โทร</th>
					<th scope="col" width="30%">สถานะ</th>
					<th scope="col" width="15%">รายละเอียด</th>
					<th scope="col" width="5%">ชำระเงิน</th>
					<th scope="col" width="5%">ลบ</th>
				</tr>
			</thead>
			<?php
			if (isset($_GET['delete']) == 'delete') {
				$a_id = $_GET['a_id'];
				$cek = mysqli_query($conn, "SELECT * FROM order_head WHERE o_id='$o_id'");
				if (mysqli_num_rows($cek) == 0) {
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ไม่มีข้อมูลที่สามารถใช้ได้</div>';
				} else {
					$delete = mysqli_query($conn, "DELETE FROM order_head WHERE o_id='$o_id'");
					if ($delete) {
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลเสร็จเรียบร้อย</div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลไม่สำเร็จ.</div>';
					}
				}
			}
			?>
			<?php
 
            $o_id = $_GET['m_id'];
			$sql = mysqli_query($conn, "SELECT * FROM order_head WHERE id_member='$o_id'");

			if (mysqli_num_rows($sql) == 0) {
				echo '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
			} else {
				$no = 1;
				while ($row = mysqli_fetch_assoc($sql)) {
					echo '
                                            <tr>
                                                <td>' . $no . '</td>
												<td>' . $row['o_id'] . '</td>
                                                <td>' . $row['o_dttm'] . '</td>
                                                <td>' . $row['o_name'] . '</td>
                                                <td>' . $row['o_addr'] . '</td>
                                                <td>' . $row['o_email'] . '</td>
												<td>' . $row['o_phone'] . '</td>
												<td>' . $row['o_status'] . '</td>
                                                <td><a href="checkout_detail.php?o_id=' . $row['o_id'] . '" title="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">รายละเอียด</span></a></td>
												<td><a href="checkout_status.php?o_id=' . $row['o_id'] . '" title="" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">ชำระเงิน</span></a></td>
                                                <td><a href="checkout_del.php?delete=delete&o_id=' . $row['o_id'] . '" title="" onclick="return confirm(\'ต้องการลบข้อมูล ' . $row['o_name'] .  '  หรือไหม?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a></td>

                                            </tr>
                                            ';
					$no++;
				}
			}
			?>








		</table>

	</div>


	
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!--bootstrap JavaScript file  -->
	<script src="assets/js/bootstrap.js"></script>
	<!--Slider JavaScript file  -->
	<script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
	<script src="assets/ItemSlider/js/jquery.catslider.js"></script>
	<script>
		$(function() {

			$('#mi-slider').catslider();

		});
	</script>



	</script>