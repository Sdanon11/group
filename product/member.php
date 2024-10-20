<?php
session_start();
include_once("../product/connectdbmember.php"); // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $createdAt = date("Y-m-d H:i:s"); // กำหนดวันที่และเวลาในการสร้างข้อมูล

    // ตรวจสอบว่า username หรือ email ซ้ำไหม
    $stmt = $pdo->prepare("SELECT * FROM members WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // หากพบ username หรือ email ซ้ำ
        echo "<script>alert('Username หรือ Email นี้มีอยู่แล้ว กรุณาลองอีกครั้ง.');</script>";
    } else {
        // เตรียม SQL และป้องกัน SQL Injection
        $stmt = $pdo->prepare("INSERT INTO members (first_name, last_name, username, email, password, address, phone, created_at) 
                               VALUES (:first_name, :last_name, :username, :email, :password, :address, :phone, :created_at)");

        // ผูกค่ากับตัวแปรใน SQL
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':created_at', $createdAt); // ผูกวันที่สร้างข้อมูล

        // ลองรัน SQL
        try {
            $stmt->execute();
            // ถ้าสมัครสมาชิกสำเร็จ ให้แสดงข้อความและเปลี่ยนหน้า
            echo "<script>alert('เพิ่มข้อมูลแล้ว'); window.location.href = 'signin1.php';</script>";
            exit();
        } catch (PDOException $e) {
            // หากเกิดข้อผิดพลาดแสดงข้อความ
            echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');</script>";
            error_log("Database error: " . $e->getMessage()); // บันทึกข้อผิดพลาดใน log
        }
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิก</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        
        .container {
            max-width: 600px; /* Adjust max width as needed */
            width: 100%;
            padding: 20px;
            background: white; /* White background for the form */
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
              <h2>สมัครสมาชิก</h2>
                <p class="lead">สมัครสมาชิกเพื่อรับสิทธิพิเศษมากมาย.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">กรอกข้อมูล</h4>
                    <form class="needs-validation" action="" method="POST" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                                <div class="invalid-feedback">Valid first name is required.</div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                                <div class="invalid-feedback">Valid last name is required.</div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                <div class="invalid-feedback">Your username is required.</div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                                <div class="invalid-feedback">Please enter a valid email address for updates.</div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                <div class="invalid-feedback">Please enter your password.</div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Apartment or suite">
                            </div>

                            <div class="col-md-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>
                        </div>

                        <h4 class="mb-3">&nbsp;</h4>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">สมัครสมาชิก</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&nbsp;</p>
        </footer>
    </div>
</body>
</html>
