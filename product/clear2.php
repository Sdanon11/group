<?php
session_start(); // เริ่มต้น session

// ลบข้อมูลที่เกี่ยวข้องกับการสั่งซื้อ แต่ไม่ลบข้อมูลอื่น ๆ ที่สำคัญ
if (isset($_SESSION['sid'])) {
    unset($_SESSION['sid']); // ลบข้อมูลสินค้าที่อยู่ในเซสชั่น
}

// แสดงข้อความว่า "กำลังกลับหน้าหลัก"
echo "กำลังกลับหน้าหลัก กรุณารอสักครู่....";

// ส่งคำสั่งเปลี่ยนเส้นทางไปยังหน้า `index.php` หลังจาก 2 วินาที
echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
exit;
?>
<meta charset="utf-8">