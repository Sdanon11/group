<?php
session_start();
include("connectdb.php");

// รับ p_id จาก URL
$p_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($p_id > 0) {
    // ดึงข้อมูลเฉพาะสินค้าที่เลือก
    $sql = "SELECT p_id, p_name, p_detail, p_price, p_ext FROM `product` WHERE p_id = $p_id";
    $rs = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($rs);

    // ตรวจสอบว่ามีสินค้าหรือไม่
    if (!$data) {
        echo "<h2>ไม่พบสินค้านี้</h2>";
        exit;
    }
} else {
    echo "<h2>ข้อมูลไม่ถูกต้อง</h2>";
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($data['p_name']); ?> - รายละเอียดสินค้า</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #333;
        }
        .product-image {
            max-width: 70%; /* ลดขนาดรูปลง */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 0 auto; /* จัดกลาง */
            display: block; /* แสดงรูปในบล็อก */
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">ร้านค้า</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="index.php">กลับไปหน้าแรก</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container mt-5">
            <div class="card p-4">
                <h1 class="text-center"><?= htmlspecialchars($data['p_name']); ?></h1>
                <img src="jpg/<?=$data['p_id'];?>.<?=$data['p_ext'];?>" class="img-fluid product-image" alt="<?= htmlspecialchars($data['p_name']); ?>">
                <div class="mt-4">
                    <p><strong>ราคา:</strong> <?= number_format($data['p_price'], 2); ?> บาท</p>
                    <p><strong>รายละเอียด:</strong> <?= nl2br(htmlspecialchars($data['p_detail'])); ?></p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <small>&copy; 2017–2024 I DON'T HAVE CPU</small>
    </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>