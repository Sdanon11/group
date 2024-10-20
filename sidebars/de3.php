<?php
// เชื่อมต่อกับฐานข้อมูล
$host = 'localhost';
$db = 'shop';
$user = 'root';
$pass = '1234mark';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามี ID ถูกส่งมาหรือไม่
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // แปลงเป็นจำนวนเต็มเพื่อป้องกัน SQL Injection

    // สร้างคำสั่ง SQL เพื่อลบสมาชิก
    $sql = "DELETE FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $id); // ผูกค่ากับตัวแปร
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('ลบสมาชิกเรียบร้อยแล้ว'); window.location.href='3.php';</script>";
        } else {
            echo "<script>alert('ไม่พบสมาชิกที่ต้องการลบ'); window.location.href='3.php';</script>";
        }

        $stmt->close();
    } else {
        echo "เกิดข้อผิดพลาดในการเตรียมคำสั่ง: " . $conn->error;
    }
} else {
    echo "<script>alert('ไม่พบ ID สมาชิก'); window.location.href='3.php';</script>";
}

$conn->close();
?>
