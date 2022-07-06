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
        <form role="form" method="POST" action="checkout_status_db.php" enctype="multipart/form-data">

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

            <div class="form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">ID Member</label>
                <input type="text" id="o_id" class="form-control" name="o_id" readonly="readonly" value="<?php echo $o_id; ?>"">
            </div>

            <div class=" form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">ID Member</label>
                <input type="text" id="id_member" class="form-control" name="id_member" readonly="readonly" value="<?php echo $id_member; ?>"">
            </div>

            <div class=" form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">ชื่อ - นามสกุล</label>
                <input type="text" id="o_name" class="form-control" name="o_name" readonly="readonly" value="<?php echo $o_name; ?>">
            </div>

            <div class="form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">Email</label>
                <input type="text" id="o_email" class="form-control" name="o_email" readonly="readonly" value="<?php echo $o_email; ?>">
            </div>

            <div class="form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">เบอร์โทร</label>
                <input type="text" id="o_phone" class="form-control" name="o_phone" readonly="readonly" value="<?php echo $o_phone; ?>">
            </div>


            <div class="form-group input-group">
                <label for=" full_name" class="col-md-30 col-form-label text-md-right">ช่องทางการชำระเงิน</label>
            </div>

            <div class="form-group input-group">
                <label for="user_name" class="col-md-3000000 col-form-label text-md-right">ธนาคาร</label>
                <input type="text" id="user_name" class="form-control" name="m_name" readonly="readonly" value="กรุงไทย(xxxxxxxxxx)">
                <input type="text" id="user_name" class="form-control" name="m_name" readonly="readonly" value="ออมสิน(xxxxxxxxxx)">

            </div>



            <div class="form-group input-group">
                <span style="width:120px;" class="input-group-addon">รูปภาพ:</span>
                <input type="file" style="width:400px;" class="form-control" name="p_img">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </form>
    </div>

</body>

</html>