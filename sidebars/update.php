<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่มสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("https://img.pikbest.com/backgrounds/20190808/simple-eleven-double-twelve-online-shopping-simple-banner-background_1901192.jpg!w700wp");
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }
        .form-signin {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 30px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 500px;
            border: 2px solid #006a7d;
        }
        .form-title {
            text-align: center;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <main class="form-signin">
        <h2 class="form-title">เพิ่มสินค้า</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pname" class="form-label">ชื่อสินค้า</label>
                <input type="text" name="pname" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="pdetail" class="form-label">รายละเอียดสินค้า</label>
                <textarea name="pdetail" class="form-control" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label for="pprice" class="form-label">ราคา</label>
                <input type="text" name="pprice" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pimg" class="form-label">รูปภาพ</label>
                <input type="file" name="pimg" class="form-control">
            </div>

            <div class="mb-3">
                <label for="pcat" class="form-label">ประเภทสินค้า</label>
                <select name="pcat" class="form-select">
                    <?php
                    include_once("connectdb2.php");
                    $sql2 = "SELECT * FROM `category` ORDER BY c_name ASC";
                    $rs2 = mysqli_query($conn, $sql2);
                    while ($data2 = mysqli_fetch_array($rs2)) {
                    ?>
                        <option value="<?=$data2['c_id'];?>"><?=$data2['c_name'];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="Submit" class="btn btn-primary">เพิ่มสินค้า</button>
            </div>
        </form>
        <hr>

        <?php
        if (isset($_POST['Submit'])) {
            $file_name = $_FILES['pimg']['name'];
            $ext = substr($file_name, strpos($file_name, '.') + 1);

            $sql = "INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES (NULL, '{$_POST['pname']}', '{$_POST['pdetail']}', '{$_POST['pprice']}', '{$ext}', '{$_POST['pcat']}')";
            mysqli_query($conn, $sql) or die("เพิ่มข้อมูลสินค้าไม่ได้");

            $idauto = mysqli_insert_id($conn);

            if ($file_name) {
                // ย้ายไฟล์รูปภาพที่อัพโหลด
                copy($_FILES['pimg']['tmp_name'], "images/" . $idauto . "." . $ext);
            }

            echo "<script>";
            echo "alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
		
            echo "window.location='index.php';";
            echo "</script>";
        }

        mysqli_close($conn);
        ?>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
