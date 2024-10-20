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

// ดึงข้อมูลประเภทสินค้า
$result = $conn->query("SELECT * FROM `category`");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลประเภทสินค้า</title>
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
        <h2 class="text-center">ชื่อประเภทสินค้า</h2>
        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">กลับไปหน้าหลัก</a> <!-- ปุ่มกลับไปหน้าหลักชิดซ้าย -->
            <a href="เพิ่มประเภทสินค้า.php" class="btn btn-secondary">เพิ่มประเภทสินค้า</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ข้อมูลประเภทสินค้า</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($category = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['c_id']); ?></td>
                    <td><?php echo htmlspecialchars($category['c_name']); ?></td>
                    <td>
                        <a href="แก้ไขประเภทสินค้า.php?id=<?php echo $category['c_id']; ?>" class="btn btn-primary btn-sm">แก้ไข</a>
                        <a href="deleteประเภทสินค้า.php?cid=<?php $data['c_id']; ?>?ext=?cid<?php $data['c_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจว่าต้องการลบสินค้าประเภทนี้?');">ลบ</a>
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
