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
				<a href="checkout.php?m_id=<?php echo $member['m_id']; ?>" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> ย้อนกลับ</a>
			</div>
		</div>

		<div style="height:10px;"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col" width="5%">ลำดับ</th>
					<th scope="col" width="30%">สินค้า</th>
					<th scope="col" width="15%">จำนวน</th>
					<th scope="col"  width=15%">ราคา(บาท)</th>
					
				</tr>
			</thead>
			



            <?php
                    $o_id = $_GET['o_id'];
                    include('../conn.php');
                    $sql = mysqli_query($conn, "SELECT * FROM order_detail WHERE o_id = $o_id");

                    if (mysqli_num_rows($sql) == 0) 
                    {
                        echo '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
                    } 
                    else 
                    {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '
                                            <tr>
                                                <td>' . $no . '</td>
                                                
                                                
                                                <td> ';
												
                                            if($row['p_id'] == '59')
                                            {
                                                echo 'ตู้ครอบพระสี่เหลี่ยม(ขนาดเล็ก)ตู้ครอบพระหลวงพ่อเพชร(องค์สีดำ)';
                                            }
                                            else if($row['p_id'] == '58')
                                            {
                                                echo 'หลวงพ่อเพชร(ขนาดเล็ก)หลวงพ่อเพชร(องค์สีดำ)';
                                            }
                                            
                                            else if($row['p_id'] == '60')
                                            {
                                                echo 'ตู้ครอบพระหกเหลี่ยม(ขนาดเล็ก)ตู้ครอบพระหลวงพ่อเพชร(องค์สีทอง)';
                                            }
                                            else if($row['p_id'] == '61')
                                            {
                                                echo 'ตู้ครอบพระหกเหลี่ยม(ขนาดเล็ก)ตู้ครอบพระหลวงพ่อเพชร(องค์สีดำ)';
                                            }

											else if($row['p_id'] == '62')
                                            {
                                                echo 'ตู้ครอบพระสี่เหลี่ยม(ขนาดกลาง)ตู้ครอบพระหลวงพ่อเพชร(องค์สีทอง)';
                                            }

											else if($row['p_id'] == '63')
                                            {
                                                echo 'ตู้ครอบพระสี่เหลี่ยม(ขนาดกลาง)ตู้ครอบพระหลวงพ่อเพชร(องค์สีดำ)';
                                            }
											

											




                                            echo '
                                            </td>';
                                            echo '<td>' . $row['d_qty'] . '</td>';
                                            echo '<td>' . $row['d_subtotal'] . '</td>';
											
                            $no++;
                        }
                    }
                    ?>


<!-- <?php

			$sql = mysqli_query($conn, "SELECT * FROM order_head ORDER BY o_id ASC");

			if (mysqli_num_rows($sql) == 0) {
				echo '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
			} else {
				$no = 1;
				while ($row = mysqli_fetch_assoc($sql)) {
					echo '
                                            <tr>
                                                <td>' . $no . '</td>
                                                <td>' . $row['o_dttm'] . '</td>
                                                <td>' . $row['o_name'] . '</td>
                                                <td>' . $row['o_addr'] . '</td>
                                                <td>' . $row['o_email'] . '</td>
												<td>' . $row['o_phone'] . '</td>
												<td>' . $row['o_status'] . '</td>
                                               

                                            </tr>
                                            ';
					$no++;
				}
			}
			?> -->
			<div id="checkout_area"></div>






			<div style="height:20px;"></div>

	</div>

	<script src="custom.js"></script>
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