<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายการใบสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* ตั้งค่าพื้นหลัง */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://stock.adobe.com/th/search?k=background&asset_id=412821610');
            background-size: cover; 
            background-position: center; 
            padding: 20px; 
            margin: 0; 
        }

        h1 {
            text-align: center; 
            color: #333; 
            margin-bottom: 20px; /* เพิ่มพื้นที่ด้านล่าง */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; 
            margin-top: 20px; /* เพิ่มระยะห่างจากด้านบน */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เพิ่มเงา */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px; /* เพิ่ม padding */
            text-align: center;
        }

        th {
            background-color: #f8f9fa; 
            font-weight: bold; 
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; 
        }

        a {
            color: #007bff; /* สีของลิงก์ */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline; 
        }

        /* ปรับแต่งปุ่ม */
        .btn-secondary {
            background-color: #007bff; 
            border-color: #007bff; 
            color: white; 
            transition: background-color 0.3s, border-color 0.3s; 
        }

        .btn-secondary:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
        }
    </style>
</head>

<body>
    <h1>รายการใบสั่งซื้อ</h1>
    <a href="index.php" class="btn btn-secondary" style="float: left;">กลับไปหน้าหลัก</a>

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

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT o.oid, o.odate, o.ototal, m.first_name, m.address
                FROM orders o
                LEFT JOIN members m ON o.id = m.id
                ORDER BY o.oid DESC";
        $rs = mysqli_query($conn, $sql);

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

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
