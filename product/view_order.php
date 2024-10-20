<?php
session_start();
include("connectdb.php");

// ตรวจสอบว่ามีค่า session 'aid' หรือไม่
if (!isset($_SESSION['aid'])) {
    die("Unauthorized access.");
}

$sql = "
    SELECT o.*, m.first_name 
    FROM orders o 
    JOIN members m ON o.id = m.id
    WHERE o.id = ?
";

// ตรวจสอบการเตรียมคำสั่ง SQL
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $_SESSION['aid']);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$rs = $stmt->get_result();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายการใบสั่งซื้อ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff; /* สีฟ้าสำหรับหัวข้อ */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* สีเขียวสำหรับหัวตาราง */
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* สีพื้นหลังสำหรับแถวที่คู่ */
        }

        tr:hover {
            background-color: #e2f0d9; /* สีเมื่อชี้เมาส์ */
            cursor: pointer;
        }

        a {
            color: #007bff; /* สีฟ้าสำหรับลิงก์ */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline; /* ขีดเส้นใต้เมื่อชี้เมาส์ */
        }
    </style>
</head>

<body>
<h1>รายการใบสั่งซื้อ</h1>
<table>
    <tr>
        <th>&nbsp;</th>
        <th>เลขที่ใบสั่งซื้อ</th>
        <th>วันที่</th>
        <th>ราคารวม</th>
        <th>ลูกค้า</th>
    </tr>

    <?php while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) { ?>
    <tr>
        <td><a href="view_order_detail.php?a=<?= htmlspecialchars($data['oid']); ?>">ดูรายละเอียด</a></td>
        <td><?= htmlspecialchars($data['oid']); ?></td>
        <td><?= htmlspecialchars($data['odate']); ?></td>
        <td><?= number_format($data['ototal'], 0); ?></td>
        <td><?= htmlspecialchars($data['first_name']); ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>