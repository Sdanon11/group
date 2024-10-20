<?php
if(isset($_GET['cid'])){
include("connectdb2.php");
$sql = "DELETE FROM category WHERE `category`.`c_id`= '{$_GET['cid']}' ";
mysqli_query($conn, $sql) ;

unlink("images/".$_GET['cid'].".".$_GET['ext']);

echo "<script>";
echo "window.location='แสดงข้อมูลประเภทสินค้า.php';";
echo "</script>";
}
?>