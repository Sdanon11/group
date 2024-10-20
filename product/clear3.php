<?php
session_start();

// ตรวจสอบว่ามีข้อมูลในเซสชั่น
if (!isset($_SESSION['sid'])) {
    echo "ไม่มีสินค้าที่สั่งซื้อ";
    exit;
}

// สั่งซื้อสินค้าสำเร็จแล้ว
echo "<meta charset=\"utf-8\">";
echo "สั่งซื้อสินค้าสำเร็จแล้ว กำลังกลับหน้าหลัก กรุณารอสักครู่....";

// การเปลี่ยนเส้นทางหลังจาก 2 วินาที
header("refresh:2;url=productcom.php");
exit;
?>
