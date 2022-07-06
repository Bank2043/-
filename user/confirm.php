<?php
session_start();
include("../conn.php");




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


        <div class="col-md-100">
            <div class="well well-lg offer-box text-center">


                การสั่งซื้อสินค้า


            </div>
        </div>

        <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
            <table width="600" border="0" align="center" class="square">
                <tr>
                    <td width="1558" colspan="4" bgcolor="#FFDDBB">
                        <strong>สั่งซื้อสินค้า</strong>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#F9D5E3">สินค้า</td>
                    <td align="center" bgcolor="#F9D5E3">ราคา</td>
                    <td align="center" bgcolor="#F9D5E3">จำนวน</td>
                    <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $p_id => $qty) {
                    $sql    = "select * from tbl_product where p_id=$p_id";
                    $query    = mysqli_query($conn, $sql);
                    $row    = mysqli_fetch_array($query);
                    $sum    = $row['p_price'] * $qty;
                    $total    += $sum;
                    echo "<tr>";
                    echo "<td>" . $row["p_name"] . $row["p_detail"] . "</td>";
                    echo "<td align='right'>" . number_format($row['p_price'], 2) . "</td>";
                    echo "<td align='right'>$qty</td>";
                    echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
                echo "<td align='right' bgcolor='#F9D5E3'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                echo "</tr>";
                ?>
            </table>
            <p>



            <div class="container">
                <table border="0" cellspacing="0" align="center">

                    <tr>
                        <td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
                    </tr>

                    <tr>
                        <td bgcolor="#EEEEEE">ID Member</td>
                        <td><input name="id_member" type="text" id="id_member"  value=""></td>
                    </tr>

                    <tr>
                        <td bgcolor="#EEEEEE">ชื่อ</td>
                        <td><input name="name" type="text" id="name" required></td>
                    </tr>


                    <tr>
                        <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
                        <td width="78%">
                            <textarea name="address" cols="35" rows="5" id="address" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EEEEEE">อีเมล</td>
                        <td><input name="email" type="email" id="email" required /></td>
                    </tr>
                    <tr>
                        <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
                        <td><input name="phone" type="text" id="phone" required /></td>
                    </tr>

                    <tr>
                        <td bgcolor="#EEEEEE">สถานะ</td>
                        <td><input name="o_status" type="text" id="o_status" readonly="readonly" value="รอการชำระเงิน" /></td>
                    </tr>


                    <tr>
                        <td colspan="2" align="right" bgcolor="#CCCCCC">
                            <a href="index.php" class="btn btn-danger">ยกเลิก</a>
                            <input class='btn btn-primary' type="submit" name="Submit2" value="สั่งซื้อ" />

                        </td>

                    </tr>





                </table>
            </div>



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