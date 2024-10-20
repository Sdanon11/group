<?php
// เชื่อมต่อกับฐานข้อมูล
$host = "localhost";      // ที่อยู่ของเซิร์ฟเวอร์ฐานข้อมูล
$usr = "root";            // ชื่อผู้ใช้ของ MySQL
$pwd = "1234mark";                // รหัสผ่านของ MySQL (ถ้ามี)
$db = "shop";        // ชื่อฐานข้อมูล

try {
    // สร้างการเชื่อมต่อกับฐานข้อมูล
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usr, $pwd);
    
    // ตั้งค่าการแสดงข้อผิดพลาด
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ตั้งค่าโหมดการจัดการข้อมูลให้เป็นแบบ associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // หากไม่สามารถเชื่อมต่อได้ จะทำการหยุดการทำงานและแสดงข้อความ
    die("ไม่สามารถเชื่อมต่อกับฐานข้อมูล: " . $e->getMessage());
}
?>
