<?php
session_start();
echo "Logging out...<br>"; // ดูว่าถึงจุดนี้ไหม

// ล้างข้อมูลเซสชัน
unset($_SESSION['aid']);
unset($_SESSION['aname']);
echo "Session variables unset.<br>"; // ดูว่าล้างข้อมูลเซสชันแล้วไหม

// ทำลายเซสชัน
session_destroy();
echo "Session destroyed.<br>"; // ดูว่าทำลายเซสชันแล้วไหม

// เปลี่ยนเส้นทางไปยังหน้า index.php ในโฟลเดอร์ product
header("Location: ../product/index.php");
exit();
?>
