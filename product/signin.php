<?php
session_start();
include_once("../product/connectdbsingin.php");

if (isset($_POST['Submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['ausername']);
    $password = md5($_POST['apassword']); // ใช้ md5 สำหรับเข้ารหัสรหัสผ่าน

    $sql = "SELECT * FROM `admin` WHERE `a_username` = '$username' AND `a_password` = '$password'";
    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        die("Query failed: " . mysqli_error($conn)); // แสดงข้อผิดพลาดหากคำสั่ง SQL ล้มเหลว
    }

    $num = mysqli_num_rows($rs);
    
    if ($num > 0) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
        header("Location: ../sidebars/index.php");
        exit();
    } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        exit();
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh; /* ให้สูงเต็มหน้าจอ */
            display: flex;
            align-items: center; /* จัดแนวกลางแนวตั้ง */
            justify-content: center; /* จัดแนวกลางแนวนอน */
            background-image: url('images/55.jpg'); /* เปลี่ยน path ให้ถูกต้อง */
            background-size: cover; /* ทำให้รูปภาพเต็มหน้าจอ */
            background-position: center; /* จัดแนวกึ่งกลาง */
            background-repeat: no-repeat; /* ไม่ให้ซ้ำ */
        }

        .form-signin {
            width: 100%; /* ความกว้าง 100% */
            max-width: 400px; /* ความกว้างสูงสุด */
            padding: 15px; /* ระยะขอบ */
            border-radius: 10px; /* มุมมน */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* เงา */
            background-color: rgba(255, 255, 255, 0.9); /* สีพื้นหลังของฟอร์ม พร้อมความโปร่งใส */
        }
    </style>

    <link href="sign-in.css" rel="stylesheet">
</head>
<body>
    <main class="form-signin">
        <form method="POST" action="">
            <img class="mb-4" src="images/7.jpg" alt="" width="150" height="100">
            <h1 class="h3 mb-3 fw-normal">ล็อคอินเข้าสู่ระบบ</h1>

            <div class="form-floating">
                <input type="text" name="ausername" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="apassword" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="Submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
