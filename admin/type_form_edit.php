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
        <a class="navbar-brand" href="#">ผู้ดูแลระบบ</a>


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
      $type_id = $_REQUEST["type_id"];
      //2. query ข้อมูลจากตาราง:
      $sql = "SELECT * FROM tbl_type WHERE type_id='$type_id' ";
      $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);
      extract($row);
      ?>
      
      <div class="container">
        <p> </p>
        <div class="row">
          <div class="col-md-12">
            <form name="admin" action="type_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
              <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
              <div class="form-group">
                <div class="col-sm-6" align="left">
                  <input name="type_name" type="text" required class="form-control" id="type_name" value="<?= $type_name; ?>" placeholder="ประเถทสินค้า" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6" align="right">
                  <button type="submit" class="btn btn-success btn-sm" id="btn"> บันทึก </button>
                </div>
              </div>
            </form>
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