<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายการใบสั่งซื้อ</title>
    <style>
        /* ตั้งค่าพื้นหลัง */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://stock.adobe.com/th/search?k=background&asset_id=412821610'); /* เปลี่ยนเส้นทางเป็นภาพแบ็คกราวด์ของคุณ */
            background-size: cover; /* ทำให้ภาพครอบคลุมพื้นที่ทั้งหมด */
            background-position: center; /* จัดภาพให้ตรงกลาง */
            padding: 20px; /* เพิ่ม padding รอบขอบ */
            margin: 0; /* ไม่มีขอบ */
        }

        h1 {
            text-align: center; /* จัดข้อความตรงกลาง */
            color: #333; /* สีของหัวข้อ */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; /* สีพื้นหลังของตารางเป็นสีขาว */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2; /* สีพื้นหลังของหัวข้อ */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* ทำแถวที่เป็นคู่มีสีต่างจากแถวอื่นๆ */
        }

        a {
            color: #1a73e8; /* สีของลิงก์ */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline; /* เส้นใต้เมื่อเมาส์ชี้ */
        }
    </style>
</head>

<body>
<h1>รายการใบสั่งซื้อ</h1>

<table>
  <tr>
    <th>ดูรายละเอียด</th>
    <th>เลขที่ใบสั่งซื้อ</th>
    <th>วันที่</th>
    <th>ราคารวม</th>
    <th>ลูกค้า</th>
    <th>ที่อยู่จัดส่ง</th>
  </tr>
 
 <?php
include("connectdb2.php");

// ตรวจสอบการเชื่อมต่อกับฐานข้อมูล
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// แก้ไขการ query ให้ดึงข้อมูลจากตาราง members ด้วย
$sql = "SELECT o.oid, o.odate, o.ototal, m.first_name, m.address
        FROM orders o
        LEFT JOIN members m ON o.id = m.id
        ORDER BY o.oid DESC";
$rs = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if (mysqli_num_rows($rs) > 0) {
    while ($data = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
?>

<tr>
    <td><a href="view_order_detail.php?a=<?=$data['oid'];?>">ดูรายละเอียด</a></td>
    <td><?=$data['oid'];?></td>
    <td><?=$data['odate'];?></td>
    <td><?=number_format($data['ototal'], 0);?></td>
    <td><?=$data['first_name'];?></td>
    <td><?=$data['address'];?></td>
</tr>

<?php  
    }
} else {
    echo "<tr><td colspan='6'>ไม่มีข้อมูลใบสั่งซื้อ</td></tr>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

 
</table>
</body>
</html>