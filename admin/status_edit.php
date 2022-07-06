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

            <?php
            //1. เชื่อมต่อ database:
            include('../conn.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
            $o_id = $_REQUEST["o_id"];
            //2. query ข้อมูลจากตาราง:
            $sql = "SELECT * FROM order_head WHERE o_id='$o_id' ";
            $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
            $row = mysqli_fetch_array($result);
            extract($row);
            ?>


            <form name="admin" action="status_edit_db.php" method="POST" id="admin" class="form-horizontal">

                &nbsp; &nbsp; &nbsp;
                <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
                <div class="form-group">

                    <div class="col-sm-6" align="left">
                        <input name="a_user" type="text" required class="form-control" id="a_user" value="<?= $o_name; ?>" readonly="readonly" />
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-6" align="left">
                        <input name="a_pass" type="text" required class="form-control" id="a_pass" value="<?= $o_addr; ?>" readonly="readonly" />
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-6" align="left">
                        <input name="a_pass" type="text" required class="form-control" id="a_pass" value="<?= $o_email; ?>" readonly="readonly"/>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-6" align="left">
                        <input name="a_pass" type="text" required class="form-control" id="a_pass" value="<?= $o_phone; ?>" readonly="readonly"/>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-6" align="left">
                        <input name="o_status" type="text" required class="form-control" id="o_status" value="<?= $o_status; ?>" />
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-3"> </div>
                    <div class="col-sm-5" align="right">
                        <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก </button>
                    </div>
                </div>
            </form>


        </div>





    </div>
</body>