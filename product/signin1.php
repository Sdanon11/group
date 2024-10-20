<?php
session_start();
include_once("../product/connectdbmember.php");

if (isset($_POST['Submit'])) {
    $username = $_POST['ausername'];
    $password = $_POST['apassword'];

    $stmt = $pdo->prepare("SELECT * FROM members WHERE username = ?");
    $stmt->bindValue(1, $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
        if (password_verify($password, $result['password'])) {
			
            session_regenerate_id(true);
            $_SESSION['aid'] = $result['id'];
            $_SESSION['aname'] = $result['first_name']." ".$result['last_name'];
            $_SESSION['username'] = $result['username']; // เก็บ username ในเซสชัน
            header("Location: ../product/index.php");
            exit();
        } else {
            echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        }
    } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('images/58.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
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
