<?php
$male = 'bank';
$female = 'kleen';
$a_admin = 'admin';
$username = $_POST['username'];
if ($username == $male) {
    echo "<script>";
    echo "alert('ยินดีต้อนรับเข้าสู่หน้าหลัก');";
    echo "window.location ='user/index.php'; ";
    echo "</script>";
} 
else if ($username == $female) {
    echo "<script>";
    echo "alert('ยินดีต้อนรับเข้าสู่หน้าหลัก');";
    echo "window.location ='user/index.php'; ";
    echo "</script>";
} 
else if ($username == $a_admin) {
    echo "<script>";
    echo "alert('ยินดีต้อนรับเข้าสู่หน้าแอดมิน');";
    echo "window.location ='admin/index.php'; ";
    echo "</script>";
}
else {
    echo "<script>";
        echo "alert(\" user ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
}
