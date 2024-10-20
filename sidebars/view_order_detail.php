<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดใบสั่งซื้อ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* ตั้งค่าพื้นหลังและจัดหน้าให้อยู่กึ่งกลาง */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://img.pikbest.com/backgrounds/20190808/simple-eleven-double-twelve-online-shopping-simple-banner-background_1901192.jpg!w700wp');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* จัดรูปแบบของ container */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        img {
            width: 80px;
            height: auto;
        }

        /* สไตล์สำหรับปุ่ม */
        .btn-secondary {
            background-color: #007bff; /* สีพื้นหลังของปุ่ม */
            border-color: #007bff; /* สีขอบของปุ่ม */
            color: white; /* สีข้อความในปุ่ม */
            transition: background-color 0.3s, border-color 0.3s; /* เอฟเฟกต์การเปลี่ยนสี */
        }

        .btn-secondary:hover {
            background-color: #0056b3; /* สีเมื่อเอาเมาส์ชี้ */
            border-color: #0056b3; /* สีขอบเมื่อเอาเมาส์ชี้ */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>รายละเอียดใบสั่งซื้อ เลขที่ <?= htmlspecialchars($_GET['a']); ?></h1>
        <a href="view_order.php" class="btn btn-secondary" style="float: left;">กลับไปหน้ารายการสั่งซื้อ</a>
        <table>
            <tr>
                <th>ที่</th>
                <th>สินค้า</th>
                <th>จำนวน</th>
                <th>ราคา/ชิ้น</th>
                <th>รวม (บาท)</th>
            </tr>
            
            <?php
            include("connectdb2.php");
            $sql = "SELECT * FROM orders_detail 
            INNER JOIN product ON orders_detail.pid = product.p_id 
            WHERE orders_detail.oid = '" . $_GET['a'] . "'";
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
                    $img_path = "images/" . htmlspecialchars($data['p_id']) . "." . htmlspecialchars($data['p_ext']);
                    if (file_exists($img_path)) {
                    ?>
                        <img src="<?= $img_path; ?>" alt="Product Image"> <br>
                    <?php } else { ?>
                        <img src="images/default.png" alt="Default Image"> <br>
                    <?php } ?>
                    รหัสสินค้า: <?= htmlspecialchars($data['p_id']); ?> <br>
                    ชื่อสินค้า: <?= htmlspecialchars($data['p_name']); ?>
                </td>
                <td><?= $data['item']; ?></td>
                <td><?= number_format($data['p_price'], 0); ?></td>
                <td><?= number_format($sum, 0); ?></td>
            </tr>
            <?php } ?>
            
            <tr>
                <td colspan="3">&nbsp;</td>
                <td>รวมทั้งสิ้น</td>
                <td><?= number_format($total, 0); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
