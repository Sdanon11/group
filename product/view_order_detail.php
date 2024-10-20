<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดใบสั่งซื้อ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 2.5em;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-weight: 400;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 700;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e2f0d9;
            cursor: pointer;
        }

        img {
            width: 80px;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        img:hover {
            transform: scale(1.1);
        }

        .total-row {
            font-weight: bold;
            background-color: #dff0d8;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>

<body>
<h1>รายละเอียดใบสั่งซื้อ เลขที่ <?= htmlspecialchars($_GET['a']); ?></h1>
<table>
    <tr>
        <th>ที่</th>
        <th>สินค้า</th>
        <th>จำนวน</th>
        <th>ราคา/ชิ้น</th>
        <th>รวม (บาท)</th>
    </tr>
    
    <?php
    include("connectdb.php");
    
    // ป้องกัน SQL Injection
    $order_id = mysqli_real_escape_string($conn, $_GET['a']);
    $sql = "SELECT * FROM orders_detail
            INNER JOIN product ON orders_detail.pid = product.p_id
            WHERE orders_detail.oid = '$order_id'";
    
    $rs = mysqli_query($conn, $sql);
    $i = 0;
    $total = 0;

    while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
        $i++;
        $sum = $data['p_price'] * $data['item'];
        $total += $sum;
    ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <?php
            // สร้างเส้นทางของรูปภาพจาก p_id และ p_ext
            $img_path = "jpg/" . htmlspecialchars($data['p_id']) . '.' . htmlspecialchars($data['p_ext']);
            if (file_exists($img_path)) {
                echo '<img src="' . $img_path . '" alt="Product Image"> <br>';
            } else {
                echo '<img src="jpg/default.png" alt="Default Image"> <br>'; // แสดงภาพดีฟอลต์
            }
            ?>
            รหัสสินค้า: <?= htmlspecialchars($data['p_id']); ?> <br>
            ชื่อสินค้า: <?= htmlspecialchars($data['p_name']); ?>
        </td>
        <td><?= $data['item']; ?></td>
        <td><?= number_format($data['p_price'], 0); ?></td>
        <td><?= number_format($sum, 0); ?></td>
    </tr>
    <?php } ?>
    
    <tr class="total-row">
        <td colspan="3">&nbsp;</td>
        <td>รวมทั้งสิ้น</td>
        <td><?= number_format($total, 0); ?></td>
    </tr>
</table>

<div class="footer">
    © <?= date("Y"); ?> บริษัทของคุณ - ทุกสิทธิ์สงวนไว้
</div>
</body>
</html>