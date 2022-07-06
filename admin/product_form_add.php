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

            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="product_form_add_db.php" enctype="multipart/form-data">
                        <?php
                        //1. เชื่อมต่อ database:
                        include('../conn.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        //2. query ข้อมูลจากตาราง tb_member:
                        $query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
                        //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                        $result = mysqli_query($conn, $query);
                        //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                        ?>

                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">ชื่อ:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="p_name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">ประเภท:</span>
                                <select style="width:400px;" class="form-control" name="type_id" >
                                    <option value="type_id"></option>
                                    <?php foreach ($result as $results) { ?>
                                        <option value="<?php echo $results["type_id"]; ?>">
                                            <?php echo $results["type_name"]; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">รายละเอียด : </span>
                                <input type="text" style="width:400px;" class="form-control" name="p_detail" required>
                            </div>

                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">ราคา:</span>
                                <input type="text" style="width:400px;" class="form-control" name="p_price" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">จำนวน:</span>
                                <input type="text" style="width:400px;" class="form-control" name="p_qty">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">รูปภาพ:</span>
                                <input type="file" style="width:400px;" class="form-control" name="p_img">
                            </div>



                            

                          

                        </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                </form>



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