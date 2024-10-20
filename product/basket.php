<?php
session_start(); // Ensure the session is started

error_reporting(E_NOTICE);

include("connectdb.php");

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM `product` WHERE p_id='$id'";
    $rs = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($rs);

    if($data) {
        $_SESSION['sid'][$id] = $data['p_id'];
        $_SESSION['sname'][$id] = $data['p_name'];
        $_SESSION['sprice'][$id] = $data['p_price'];
        $_SESSION['sdetail'][$id] = $data['p_detail'];
        $_SESSION['sext'][$id] = $data['p_ext'];

        // Check if item already exists in the cart and update quantity
        if (isset($_SESSION['sitem'][$id])) {
            $_SESSION['sitem'][$id]++; // Increase quantity
        } else {
            $_SESSION['sitem'][$id] = 1; // Initialize quantity
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ตะกร้าสินค้า</title>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<blockquote>
<h2>ตะกร้าสินค้า</h2>
<a href="productcom.php" class="btn btn-primary">กลับไปเลือกสินค้า</a>  
<a href="clear2.php" class="btn btn-warning">ลบสินค้าทั้งหมด</a>
<?php if (empty($_SESSION['sid'])) { ?>
    <a href="#" class="btn btn-success" onClick="alert('กรุณาเลือกสินค้า');">สั่งซื้อสินค้า</a>
<?php } else { ?>
    <a href="record.php" class="btn btn-success">สั่งซื้อสินค้า</a>
<?php } ?>

<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 30px; /* Rounded edges */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
        margin: 5px; /* Space between buttons */
    }

    .btn-primary {
        background-color: #007bff; /* Blue */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue */
        transform: translateY(-2px);
    }

    .btn-warning {
        background-color: #ffc107; /* Yellow */
        color: black;
    }
    .btn-warning:hover {
        background-color: #e0a800; /* Darker yellow */
        transform: translateY(-2px);
    }

    .btn-success {
        background-color: #28a745; /* Green */
    }
    .btn-success:hover {
        background-color: #218838; /* Darker green */
        transform: translateY(-2px);
    }
</style>


<br><br>
<table class="table">
<tr>
    <th>ที่</th>
    <th>รูปสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>ราคา/ชิ้น</th>
    <th>จำนวน (ชิ้น)</th>
    <th>รวม</th>
    <th>&nbsp;</th>
</tr>
<?php
if(!empty($_SESSION['sid'])) {
    $i = 0; // Initialize counter
    $total = 0; // Initialize total
    foreach($_SESSION['sid'] as $pid) {
        $i++;
        $sum = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid];
        $total += $sum;
?>
    <tr>
        <td><?=$i;?></td>
        <td>
            <?php
            // ตรวจสอบว่ารูปภาพมีอยู่จริงหรือไม่
            $imagePath = "jpg/{$pid}." . $_SESSION['sext'][$pid];
            if(file_exists($imagePath)) {
                echo "<img src='{$imagePath}' width='120' alt='{$_SESSION['sname'][$pid]}'>";
            } else {
                echo "ไม่มีรูปภาพ";
            }
            ?>
        </td>
        <td><?=$_SESSION['sname'][$pid];?></td>
        <td><?=number_format($_SESSION['sprice'][$pid], 0);?> บาท</td>
        <td><?=$_SESSION['sitem'][$pid];?></td>
        <td><?=number_format($sum, 0);?> บาท</td>
        <td><a href="clear.php?id=<?=$pid;?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i> ลบ</a></td>

<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 30px; /* Rounded edges */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
        margin: 5px; /* Space between buttons */
    }

    .btn-danger {
        background-color: #dc3545; /* Bright red */
        color: white; /* White text for contrast */
    }
    .btn-danger:hover {
        background-color: #c82333; /* Darker red on hover */
        transform: translateY(-2px); /* Lift effect on hover */
    }

    /* Add other button styles here (btn-primary, btn-warning, btn-success) */
</style>

    </tr>
<?php } // end foreach ?>
    <tr>
        <td colspan="5" align="right"><strong>รวมทั้งสิ้น</strong> &nbsp; </td>
        <td><strong><?=number_format($total, 0);?> บาท</strong></td>
    </tr>
<?php
} else {
?>
    <tr>
        <td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
    </tr>
<?php } // end if ?>
</table>
</blockquote>
</body>
</html>
