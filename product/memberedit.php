<?php
session_start();
include_once("../product/connectdbmember.php"); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าได้รับ ID ของสมาชิกหรือไม่
if (!isset($_GET['id'])) {
    die("ID not set.");
}

// รับค่า ID และตรวจสอบ
$id = intval($_GET['id']);
if ($id <= 0) {
    die("Invalid ID.");
}

// ดึงข้อมูลสมาชิกจากฐานข้อมูล
$stmt = $pdo->prepare("SELECT * FROM members WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$member = $stmt->fetch(PDO::FETCH_ASSOC);

// ตรวจสอบว่าพบข้อมูลหรือไม่
if (!$member) {
    die("No member found with ID: $id");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);

    // เตรียม SQL สำหรับอัปเดตข้อมูล
    $stmt = $pdo->prepare("UPDATE members SET first_name = :first_name, last_name = :last_name, username = :username, 
                                                   email = :email, address = :address, phone = :phone 
                                                   WHERE id = :id");

    // ผูกค่ากับตัวแปรใน SQL
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);

    // ลองรัน SQL
    try {
        $stmt->execute();

        // อัปเดตค่า session หาก username มีการเปลี่ยนแปลง
        if ($_SESSION['username'] !== $username) {
            $_SESSION['username'] = $username;
        }

        echo "<script>
                alert('อัปเดตข้อมูลเรียบร้อยแล้ว');
                window.location.href = 'index.php';
              </script>";
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');</script>";
        error_log("Database error: " . $e->getMessage());
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขข้อมูลสมาชิก</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                          <img src="images/7.jpg" alt="" width="200" height="180">

                <h2>แก้ไขข้อมูลสมาชิก</h2>
                <p class="lead">กรุณาแก้ไขข้อมูลตามต้องการ.</p>

                    <h4 class="mb-3">กรอกข้อมูล</h4>
                    <form class="needs-validation" action="" method="POST" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($member['first_name']); ?>" required>
                                <div class="invalid-feedback">Valid first name is required.</div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($member['last_name']); ?>" required>
                                <div class="invalid-feedback">Valid last name is required.</div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($member['username']); ?>" required>
                                <div class="invalid-feedback">Your username is required.</div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required>
                                <div class="invalid-feedback">Please enter a valid email address for updates.</div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($member['address']); ?>">
                            </div>

                            <div class="col-md-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">อัปเดตข้อมูล</button>
                    </form>
                     </div>

        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&nbsp;</p>
        </footer>
    </div>
</body>
</html>
