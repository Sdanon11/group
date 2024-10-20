<?php
session_start();
include_once("../product/connectdbmember.php"); // เชื่อมต่อฐานข้อมูล
// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli('localhost', 'username', 'password', 'database');

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับ ID จาก URL
$id = $_GET['id'];

// ดึงข้อมูลลูกค้าจากฐานข้อมูล
$sql = "SELECT * FROM members WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$member = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // อัพเดตข้อมูลในฐานข้อมูล
    $sql = "UPDATE members SET first_name=?, last_name=?, username=?, email=?, password=?, address=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisi", $first_name, $last_name, $username, $email, $password, $address, $phone, $id);
    $stmt->execute();

    // เปลี่ยนเส้นทางไปหน้าที่ต้องการหลังอัพเดต
    header("Location: memberlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลลูกค้า</title>
</head>
<body>
    <h1>แก้ไขข้อมูลลูกค้า</h1>
    <form method="POST">
        <label>ชื่อ:</label>
        <input type="text" name="first_name" value="<?php echo $member['first_name']; ?>" required><br>

        <label>นามสกุล:</label>
        <input type="text" name="last_name" value="<?php echo $member['last_name']; ?>" required><br>

        <label>ชื่อผู้ใช้:</label>
        <input type="text" name="username" value="<?php echo $member['username']; ?>" required><br>

        <label>อีเมล:</label>
        <input type="email" name="email" value="<?php echo $member['email']; ?>" required><br>

        <label>รหัสผ่าน:</label>
        <input type="password" name="password" value="<?php echo $member['password']; ?>" required><br>

        <label>ที่อยู่:</label>
        <textarea name="address" required><?php echo $member['address']; ?></textarea><br>

        <label>หมายเลขโทรศัพท์:</label>
        <input type="text" name="phone" value="<?php echo $member['phone']; ?>" required><br>

        <button type="submit">บันทึก</button>
    </form>
</body>
</html>
