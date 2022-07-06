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
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">


                    ร้านค้าเกมส์ ROV ออนไลน์


                </div>

                <div class="main box-border">

                    <?php include('showproduct1.php'); ?>

                </div>

            </div>


            <div class="col-md-3 text-center">

            <?php include('showproduct2.3.php'); ?>

            </div>

        </div>


        <div class="row">
            <div class="col-md-3">

                <?php include('menu_list.php'); ?>

            </div>




            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Electronics</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-md-5 text-center col-sm-4 col-xs-4">

                        <div class="container">

                            <div style="height: 20px;"></div>
                            <div>






                                <?php
                                //connect db
                                include("../conn.php");
                                $sql = "select * from tbl_product order by p_id";  //เรียกข้อมูลมาแสดงทั้งหมด
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
                                    echo ' <div style="height: 10px;"></div>';
                                    echo '<div style=align:center;><a href="product_detail.php?p_id=' . $row['p_id'] . '" class="btn btn-primary"><i class="fa fa-shopping-cart fa-fw"></i>เพิ่มลงตะกร้าสินค้า</a></div>';

                                    echo ' <div style="height: 10px;"></div>';
                                    echo '</div>';

                                    echo '</div>';
                                }
                                ?>














                              
                            </div>





                        </div>

                    </div>
                    <!-- /.col -->




                </div>
                
            </div>
            
        </div>
        
    </div>


    
    <div class="col-md-12 footer-box">

        <?php include('navbar2.php'); ?>


    </div>
    
    <div class="col-md-12 end-box ">

        <?php include('navbar3.php'); ?>

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