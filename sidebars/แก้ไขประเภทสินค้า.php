<?php
include_once("connectdb2.php");

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$categoryId = $_GET['id'];

// Fetch category data
$sql = "SELECT * FROM `category` WHERE c_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $categoryId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Category not found");
}

$category = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขประเภทสินค้า</title>
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
        .form-signin {
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 40px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 
            padding: 50px;
            width: 100%; 
            max-width: 500px;
            border: 2px solid #006a7d;
        }
        h2 {
            text-align: center; 
            margin-bottom: 20px;
        }
        button {
            display: block; 
            width: 40%; 
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
    <div class="container mt-5 form-signin">
        <h2 class="text-center">แก้ไขประเภทสินค้า</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['c_id']); ?>">
            <div class="form-group">
                <label for="c_id">ID สินค้า:</label>
                <input type="text" class="form-control" id="c_id" name="c_id" required value="<?php echo htmlspecialchars($category['c_id']); ?>" readonly>

                <label for="c_name">ชื่อประเภทสินค้า:</label>
                <input type="text" class="form-control" id="c_name" name="c_name" required value="<?php echo htmlspecialchars($category['c_name']); ?>">
            </div>
            <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
            <a href="แสดงข้อมูลประเภทสินค้า.php" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>

<?php
if (isset($_POST['Submit'])) {
    $c_name = $_POST['c_name'];
    $id = $_POST['id']; // The ID of the category to update

    // Update category name
    $sql = "UPDATE `category` SET c_name = ? WHERE c_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $c_name, $id); // Bind name and ID for update

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตประเภทสินค้าสำเร็จ'); window.location='แสดงข้อมูลประเภทสินค้า.php';</script>"; // Redirect to the list page
    } else {
        echo "<script>alert('อัปเดตประเภทสินค้าล้มเหลว');</script>";
    }
}

$conn->close();
?>
</body>
</html>
