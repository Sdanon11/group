<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดใบสั่งซื้อ</title>
    <style>
        /* ตั้งค่าพื้นหลังและจัดหน้าให้อยู่กึ่งกลาง */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://img.pikbest.com/backgrounds/20190808/simple-eleven-double-twelve-online-shopping-simple-banner-background_1901192.jpg!w700wp'); /* เปลี่ยน URL ให้เป็นแบคกราวด์ของคุณ */
            background-size: cover; /* ทำให้ภาพครอบคลุมพื้นที่ทั้งหมด */
            background-position: center; /* จัดภาพให้ตรงกลาง */
            margin: 0; /* ลบ margin */
            padding: 0; /* ลบ padding */
            height: 100vh; /* ตั้งความสูงเต็มหน้าจอ */
            display: flex;
            justify-content: center; /* จัดให้อยู่กึ่งกลางในแนวนอน */
            align-items: center; /* จัดให้อยู่กึ่งกลางในแนวตั้ง */
        }

        /* จัดรูปแบบของ container */
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* ตั้งสีพื้นหลังของ container เป็นสีขาวโปร่งแสง */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงา */
            max-width: 900px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff; /* สีพื้นหลังของตาราง */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 80px;
            height: auto; /* เพื่อรักษาสัดส่วนของรูปภาพ */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>รายละเอียดใบสั่งซื้อ เลขที่ <?= htmlspecialchars($_GET['a']); ?></h1>
        <a href="view_order.php" class="btn btn-secondary">กลับไปหน้ารายการสินค้า</a> <!-- ปุ่มกลับไปหน้าหลักชิดซ้าย -->
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
                    // ตรวจสอบว่ามีการอัปโหลดไฟล์ภาพแล้วหรือไม่
                    $img_path = "images/" . htmlspecialchars($data['p_id']) . "." . htmlspecialchars($data['p_ext']);
                    if (file_exists($img_path)) {
                    ?>
                        <img src="<?= $img_path; ?>" alt="Product Image"> <br>
                    <?php } else { ?>
                        <img src="images/default.png" alt="Default Image"> <br> <!-- แสดงภาพดีฟอลต์ถ้าไม่มีภาพ -->
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
