<?php
$conn= mysqli_connect("localhost","root","","3dstock") or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' "); 
?>