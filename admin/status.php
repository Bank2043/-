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
                                    <th scope="col" width="5%">เลขสั่งสินค้า</th>
                                    <th scope="col" width="5%">ID Member</th>
                                    <th scope="col" width="15%">เวลา</th>
                                    <th scope="col" width="25%">ชื่อ</th>
                                    <th scope="col" width=25%">ที่อยู่</th>
                                    <th scope="col" width="5%">อีเมล</th>
                                    <th scope="col" width="10%">เบอร์โทร</th>
                                    <th scope="col" width="30%">สถานะ</th>
                                    <th scope="col" width="5%">รายละเอียด</th>
                                    <th scope="col" width="5%">แก้ไข</th>
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

                            $sql = mysqli_query($conn, "SELECT * FROM order_head ORDER BY o_id ASC");

                            if (mysqli_num_rows($sql) == 0) {
                                echo '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
                            } else {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo '
                                            <tr>
                                                <td>' . $no . '</td>
                                                <td>' . $row['o_id'] . '</td>
                                                <td>' . $row['id_member'] . '</td>
                                                <td>' . $row['o_dttm'] . '</td>
                                                <td>' . $row['o_name'] . '</td>
                                                <td>' . $row['o_addr'] . '</td>
                                                <td>' . $row['o_email'] . '</td>
												<td>' . $row['o_phone'] . '</td>
												<td>' . $row['o_status'] . '</td>
                                                <td><a href="status_detail.php?o_id=' . $row['o_id'] . '" title="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">รายละเอียด</span></a></td>
												<td><a href="status_edit.php?o_id=' . $row['o_id'] . '" title="" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true">เปลี่ยนสถานะ</span></a></td>
                                                <td><a href="status_del.php?delete=delete&o_id=' . $row['o_id'] . '" title="" onclick="return confirm(\'ต้องการลบข้อมูล ' . $row['o_name'] .  '  หรือไหม?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a></td>

                                            </tr>
                                            ';
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