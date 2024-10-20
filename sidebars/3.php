<?php
// เชื่อมต่อกับฐานข้อมูล
$host = 'localhost'; // หรือที่อยู่ของเซิร์ฟเวอร์ฐานข้อมูล
$db = 'shop';
$user = 'root';
$pass = '1234mark';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลสมาชิก
$result = $conn->query("SELECT * FROM members");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลสมาชิก</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">ข้อมูลสมาชิก</h2>
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">กลับไปหน้าหลัก</a> <!-- ปุ่มกลับไปหน้าหลักชิดซ้าย -->
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>ที่อยู่</th>
                    <th>โทรศัพท์</th>
                    <th>รหัสผ่าน</th>
                    <th>วันที่สร้าง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($member = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['id']); ?></td>
                    <td><?php echo htmlspecialchars($member['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['username']); ?></td>
                    <td><?php echo htmlspecialchars($member['email']); ?></td>
                    <td><?php echo htmlspecialchars($member['address']); ?></td>
                    <td><?php echo htmlspecialchars($member['phone']); ?></td>
                    <td><?php echo htmlspecialchars($member['password']); ?></td>
                    <td><?php echo htmlspecialchars($member['created_at']); ?></td>
                    <td>
                        <a href="up3.php?id=<?php echo $member['id']; ?>" class="btn btn-primary btn-sm">แก้ไข</a>
                        <a href="de3.php?id=<?php echo $member['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจว่าต้องการลบสมาชิกนี้?');">ลบ</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
