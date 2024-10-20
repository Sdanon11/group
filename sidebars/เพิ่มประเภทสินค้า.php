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
$product = null;

// If ID is provided, fetch the existing product for editing
if ($id) {
    $result = $conn->query("SELECT * FROM products WHERE p_id = $id"); // Assume 'products' table exists
    $product = $result->fetch_assoc();
}

// Handle form submission for adding or updating a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_name = $_POST['c_name']; // Product Name
    $c_id = $_POST['c_id']; // Category ID

    if ($id) {
        // Update existing product
        $sql = "UPDATE products SET p_id=?, p_name=?, c_id=? WHERE p_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $p_id, $p_name, $c_id, $id);
    } else {
        // Insert new product
        $sql = "INSERT INTO category (c_name, c_id) VALUES (?, ?)"; // Corrected to insert into 'products'
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $c_name, $c_id); // Corrected binding types
    }

    if ($stmt->execute()) {
        header("Location: แสดงข้อมูลประเภทสินค้า.php"); // Redirect to the products page
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }
}

// Clean up
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ? 'แก้ไขข้อมูลสินค้า' : 'เพิ่มสินค้า'; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://img.pikbest.com/backgrounds/20190808/simple-eleven-double-twelve-online-shopping-simple-banner-background_1901192.jpg!w700wp'); 
            background-size: cover; 
            background-position: center; 
            display: flex; 
            align-items: center;
            justify-content: center; 
            height: 100vh;
            margin: 0; 
            color: #333;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 20px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 
            padding: 50px;
            width: 100%; 
            max-width: 500px;
            border: 2px solid #006a7d;
        }
        h2 {
            text-align: center; 
            color: #007bff;
            margin-bottom: 20px;
        }
        button {
            display: block; 
            width: 100%; 
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white; 
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        textarea, input[type="text"], select {
            width: 100%; 
            padding: 10px; 
            margin-bottom: 10px;
            border-radius: 5px; 
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container">
        <h2><?php echo $id ? 'แก้ไขข้อมูลสินค้า' : 'เพิ่มประเภทสินค้า'; ?></h2>
        <form method="POST">
            <div class="form-group">
                <label for="c_name">ชื่อประเภทสินค้า:</label>
                <input type="text" class="form-control" id="c_name" name="c_name" required value="<?php echo $id ? htmlspecialchars($product['c_name']) : ''; ?>">

                <label for="c_id">ID ประเภทสินค้า:</label>
                <input type="text" class="form-control" id="c_id" name="c_id" required value="<?php echo $id ? htmlspecialchars($product['c_id']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $id ? 'บันทึก' : 'เพิ่ม'; ?></button>
            <a href="แสดงข้อมูลประเภทสินค้า.php" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>
</body>
</html>
