<?php
session_start();

$p_id = $_GET['p_id'];
$act = $_GET['act'];

if ($act == 'add' && !empty($p_id)) {
	if (isset($_SESSION['cart'][$p_id])) {
		$_SESSION['cart'][$p_id]++;
	} else {
		$_SESSION['cart'][$p_id] = 1;
	}
}

if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
	}
}




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


				ตะกร้าสินค้า


			</div>
		</div>

		<form id="frmcart" name="frmcart" method="post" action="?act=update">
			<table width="600" border="0" align="center" class="square">
				<tr>
					<td colspan="5" bgcolor="#CCCCCC">
						<b>ตะกร้าสินค้า</span>
					</td>
				</tr>
				<tr>
					<td bgcolor="#EAEAEA">สินค้า</td>
					<td align="center" bgcolor="#EAEAEA">ราคา</td>
					<td align="center" bgcolor="#EAEAEA">จำนวน</td>
					<td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
					<td align="center" bgcolor="#EAEAEA">ลบ</td>
				</tr>
				<?php
				$total = 0;
				if (!empty($_SESSION['cart'])) {
					include("../conn.php");
					foreach ($_SESSION['cart'] as $p_id => $qty) {
						$sql = "select * from tbl_product where p_id=$p_id";
						$query = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($query);
						$sum = $row['p_price'] * $qty;
						$total += $sum;
						echo "<tr>";
						echo "<td width='334'>" . $row["p_name"] . "</td>";
						echo "<td width='46' align='right'>" . number_format($row["p_price"], 2) . "</td>";
						echo "<td width='57' align='right'>";
						echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
						echo "<td width='93' align='right'>" . number_format($sum, 2) . "</td>";
						//remove product
						echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
						echo "</tr>";
					}
					echo "<tr>";
					echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
					echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
					echo "<td align='left' bgcolor='#CEE7FF'></td>";
					echo "</tr>";
				}
				?>
				<tr>
					<td><a href="index.php" class="btn btn-danger">กลับหน้ารายการสินค้า</a></td>
					<td colspan="4" align="right">

						<input type="button" class='btn btn-primary' name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
					</td>
				</tr>
			</table>
		</form>


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
</body>

</html>