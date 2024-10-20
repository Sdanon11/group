<?php
// เชื่อมต่อกับฐานข้อมูล
$host = 'localhost'; // หรือที่อยู่ของเซิร์ฟเวอร์ฐานข้อมูล
$db = 'shop';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? 0;
$member = null;

if ($id) {
    $result = $conn->query("SELECT * FROM members WHERE id = $id");
    $member = $result->fetch_assoc();
}

// อัปเดตข้อมูล
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($member) {
        // ป้องกันการอัปเดตรหัสผ่านถ้าไม่ได้กรอกใหม่
        if (!empty($password) && $password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE members SET first_name=?, last_name=?, username=?, email=?, address=?, phone=?, password=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssi", $first_name, $last_name, $username, $email, $address, $phone, $hashed_password, $id);
        } else {
            // ถ้าไม่กรอกรหัสผ่านใหม่ จะไม่อัปเดตรหัสผ่าน
            $sql = "UPDATE members SET first_name=?, last_name=?, username=?, email=?, address=?, phone=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssi", $first_name, $last_name, $username, $email, $address, $phone, $id);
        }

        if ($stmt->execute()) {
            header("Location: 3.php"); // รีไดเรกต์ไปยังหน้าแสดงข้อมูลลูกค้า
            exit();
        } else {
            echo "เกิดข้อผิดพลาด: " . $stmt->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสมาชิก</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>แก้ไขข้อมูลสมาชิก</h2>
        <?php if ($member): ?>
            <form method="POST">
                <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($member['first_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label>นามสกุล</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($member['last_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label>ชื่อผู้ใช้</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($member['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label>อีเมล</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($member['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label>ที่อยู่</label>
                    <textarea name="address" class="form-control" required><?php echo htmlspecialchars($member['address']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>โทรศัพท์</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
                </div>
                <div class="form-group">
                    <label>รหัสผ่านใหม่</label>
                    <input type="password" name="password" class="form-control">
                    <small class="form-text text-muted">กรุณากรอกรหัสผ่านใหม่ (ถ้าต้องการเปลี่ยน)</small>
                </div>
                <div class="form-group">
                    <label>ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <a href="3.php" class="btn btn-secondary">ยกเลิก</a>
            </form>
        <?php else: ?>
            <p>ไม่พบข้อมูลสมาชิก</p>
        <?php endif; ?>
    </div>
</body>
</html>
