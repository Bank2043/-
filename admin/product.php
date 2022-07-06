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
                        <div class="text-right">
                            <a class="btn btn-primary" href="product_form_add.php?act=add" role="button">เพิ่มข้อมูล</a>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">แก้ไข</th>
                                </tr>
                            </thead>
                            <?php




                            if (isset($_GET['delete']) == 'delete') {
                                $p_id = $_GET['p_id'];
                                $cek = mysqli_query($conn, "SELECT * FROM tbl_product WHERE p_id='$p_id'");
                                if (mysqli_num_rows($cek) == 0) {
                                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ไม่มีข้อมูลที่สามารถใช้ได้</div>';
                                } else {
                                    $delete = mysqli_query($conn, "DELETE FROM tbl_product WHERE p_id='$p_id'");
                                    if ($delete) {
                                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลเสร็จเรียบร้อย</div>';
                                    } else {
                                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลไม่สำเร็จ.</div>';
                                    }
                                }
                            }
                            ?>
                            <?php
                             
                             include('../conn.php');
                             $query = "SELECT * FROM tbl_product as p 
                             INNER JOIN tbl_type  as t ON p.type_id = t.type_id 
                             ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
                            
                            $result = mysqli_query($conn, $query);

                           

                            if (mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="8">ไม่พบข้อมูล</td></tr>';
                            } else {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                            <tr>
                                                <td>' . $no . '</td>
                                                <td>' . $row['p_name'] . '</td>
                                                <td>' . $row['type_name'] . '</td>
                                                <td>' . $row['p_detail'] . '</td>
                                                <td>' . $row['p_price'] . '</td>
                                                <td>' . $row['p_qty'] . '</td>
                                                
                                                <td align=center>' . "<img src='p_img/" . $row['p_img'] . "' width='100'>" . '</td>
                                                
                                                


                                                <td>
                    
                                                    <a href="product_form_edit.php?p_id=' . $row['p_id'] . '" title="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">แก้ไขข้อมูล</span></a>
                                                    <a href="product_form_del.php?delete=delete&p_id=' . $row['p_id'] . '" title="" onclick="return confirm(\'ต้องการลบข้อมูล ' . $row['p_name'] .  '  หรือไหม?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">ลบ</span></a>
                                                </td>
                                            </tr>
                                            ';
                                    $no++;
                                }
                            }
                            ?>
                        </table>









                    </div>


                </div>





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