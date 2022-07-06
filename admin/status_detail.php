<?php

include('../conn.php');

?>

<!doctype html>
<html lang="en">

<head>
<?php include('head.php'); ?>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">ผู้ดูแลระบบ</a>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/admin1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">

                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $admin['a_name']; ?> </h5>

                                </div>

                                <a class="dropdown-item" href="../index.php" data-toggle="model" data-target="#logoutModel"><i class="fas fa-power-off mr-2"></i>ออกจากระบบ</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>


        <div class="nav-left-sidebar sidebar-dark">
            <?php include('menu_list.php'); ?>
        </div>

        <div class="dashboard-wrapper">

        
            <div class="card h-100">
                <div class="card-body">
                    <div class="table-responsive">

                        

                    <div style="height:10px;"></div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col" width="5%">ลำดับ</th>
					<th scope="col" width="15%">สินค้า</th>
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
                                                if($row['p_id'] == '58')
                                                {
                                                    echo 'หลวงพ่อเพชร(องค์เล็ก)หลวงพ่อเพชร(องค์สีดำ)';
                                                }
                                                else if($row['p_id'] == '59')
                                                {
                                                    echo 'ตู้ครอบพระ(ขนาดเล็ก)ตู้ครอบพระหลวงพ่อเพชร(องค์สีดำ)';
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
                    </div>





                </div>





            </div>
        </div>
    </div>
    </div>

    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>