<?php

include('../conn.php');

?>



<!DOCTYPE html>
<html>

<head>
<?php include('head.php'); ?>
</head>

<body>

	<div>

		<?php include('navbar.php'); ?>

	</div>



	<div class="container">

		


		<div class="col-md-15">
			<div class="well well-lg offer-box text-center">


				รายละเอียด


			</div>
		</div>

		<table width="600" border="0" align="center" class="square">
			<tr>
				<td colspan="3" bgcolor="#CCCCCC"><b>สินค้า</b></td>
			</tr>

			<?php
			//connect db
			include("../conn.php");
			$p_id = $_GET['p_id']; //สร้างตัวแปร p_id เพื่อรับค่า

			$sql = "select * from tbl_product where p_id=$p_id";  //รับค่าตัวแปร p_id ที่ส่งมา
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			//แสดงรายละเอียด
			echo "<tr>";
			echo "<td width='85' valign='top' ><b >ชื่อสินค้า</b></td>";
			echo "<td width='279'>" . $row["p_name"] . "</td>";
			echo "<td width='70' rowspan='4'><img src='../admin/p_img/" . $row["p_img"] . " ' width='100'></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td valign='top'><b>รายละเอียด</b></td>";
			echo "<td>" . $row["p_detail"] . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td valign='top'><b>ราคา</b></td>";
			echo "<td>" . number_format($row["p_price"], 2) . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2' align='center'>";
			echo "<a href='cart.php?p_id=$row[p_id]&act=add' class='btn btn-primary'><i class='fa fa-shopping-cart fa-fw'></i> เพิ่มลงตะกร้าสินค้า </a></td> ";
			echo "</tr>";
			?>
		</table>

		<p>
			<center><a href="index.php" class="btn btn-danger">กลับไปหน้ารายการสินค้า</a></center>
		</p>
	</div>


	







	<script src="assets/js/jquery-1.10.2.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
	<script src="assets/ItemSlider/js/jquery.catslider.js"></script>
	<script>
		$(function() {

			$('#mi-slider').catslider();

		});
	</script>

</body>

</html>