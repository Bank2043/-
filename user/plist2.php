<?php

include('../conn.php');

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
        <div class="row">





            <div class="row">
                <div class="col-md-3">

                    <?php include('menu_list.php'); ?>

                </div>

                <div class="col-md-9">


                    <div class="row">
                        <div class="col-md-5 text-center col-sm-4 col-xs-4">

                            <div class="container">

                                <div style="height: 20px;"></div>
                                <div>

                                    <div class="container">

                                        <div style="height: 80px;"></div>
                                        <div>
                                            <?php $int = $_GET['type_id']; ?>
                                            <?php
                                            //connect db
                                            include("../conn.php");


                                            $sql = "select * from tbl_product where type_id='$int'";  //เรียกข้อมูลมาแสดงทั้งหมด
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {

                                                echo '<div class="col-lg-3">';
                                                echo ' <div>';
                                                echo '<img src="../admin/p_img/' . $row['p_img'] . '" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail" >';
                                                echo ' <div style="height: 10px;"></div>';
                                                echo '<div style="height:40px; width:230px; margin-left:17px;"> ' . $row['p_name'] . '</div>';
                                                echo '<div style="height: 10px;"> ' . $row['p_detail'] . '&nbsp;&nbsp;' . number_format($row["p_price"], 2) . '&nbsp;บาท</div>';
                                                echo ' <div style="height: 10px;"></div>';
                                                echo ' <div style="height: 10px;"></div>';
                                                echo ' <div style="height: 10px;"></div>';
                                                echo '<div style=align:center;><a href="product_detail.php?p_id=' . $row['p_id'] . '" class="btn btn-primary"><i class="fa fa-shopping-cart fa-fw"></i>เพิ่มลงตะกร้าสินค้า</a></div>';
                                                echo ' <div style="height: 10px;"></div>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            ?>













                                            <!-- <?php include('../conn.php'); ?>
                                        <?php $int = $_GET['type_id']; ?>

                                        <?php


                                        $inc = 4;
                                        $query = mysqli_query($conn, "select * from tbl_product where type_id='$int'");
                                        while ($row = mysqli_fetch_array($query)) {

                                            $inc = ($inc == 4) ? 1 : $inc + 1;
                                            if ($inc == 1) echo "<div class='row'>";

                                        ?>
                                            <div class="col-lg-3">
                                                <div>
                                                    <img src="../admin/p_img/<?php echo $row['p_img']; ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
                                                    <div style="height: 10px;"></div>
                                                    <div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['p_name']; ?></div>
                                                    <div style="height: 10px;"><?php echo $row['p_detail']; ?></div>
                                                    <div style="height: 10px;"></div>
                                                    <div style="height: 10px;"></div>
                                                    <div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['p_id']; ?>">Qty: <input type="text" style="width:40px;" id="qty<?php echo $row['p_id']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
                                                    <div style="margin-left:17px; margin-right:17px;">
                                                        <button type="button" class="btn btn-primary btn-sm addcart" value="<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> เพิ่มลงในรถเข็น</button> <span class="pull-right"><strong><?php echo number_format($row['p_price'], 2); ?>&nbsp;บาท</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            if ($inc == 4) echo "</div><div style='height: 30px;'></div>";
                                        }
                                        if ($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                                        if ($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>";
                                        if ($inc == 3) echo "<div class='col-lg-3'></div></div>";
                                        ?> -->



                                        </div>

                                    </div>







                                </div>

                            </div>
                            <!-- /.col -->




                        </div>

                    </div>

                </div>



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

        </div>
    </div>

    <div class="col-md-12 footer-box">

        <?php include('navbar2.php'); ?>


    </div>

    <div class="col-md-12 end-box ">

        <?php include('navbar3.php'); ?>

    </div>



</body>

</html>