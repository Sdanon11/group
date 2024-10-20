<?php
include_once("connectdb2.php");
$sql1 = "SELECT * FROM product WHERE p_id='{$_GET['pid']}'";
$rs1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($rs1);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
	
        body {background-image: url('https://img.pikbest.com/backgrounds/20190808/simple-eleven-double-twelve-online-shopping-simple-banner-background_1901192.jpg!w700wp'); 
		background-size: cover; 
		background-position: center; 
		display: flex; 
		align-items: center;
		 justify-content: center; 
		 height: 100vh;
		  margin: 0; color: #333
		 ;}
        .form-signin {
			background-color: rgba(255, 255, 255, 0.9); border-radius: 40px;
			 box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 				             padding: 50px;
			  width: 100%; 
			 max-width: 500px;
			 border: 2px solid #006a7d;
			 }
        .form-title {
			text-align: center;
			 margin-bottom: 50px;}
        h1 {text-align: center; color: #007bff;
		}
        button {display: block; 
		width: 40%; 
		margin-top: 20px;
		 padding: 10px;
		  background-color: #007bff;
		   color: white; border: none;
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

<div class="form-signin">
    <form method="post" action="" enctype="multipart/form-data">
    <h1> แก้ไขสินค้า</h1>
        <label for="pname">ชื่อสินค้า</label>
        <input type="text" id="pname" name="pname" required autofocus value="<?=$data1['p_name'];?>"><br>
        <label for="pdetail">รายละเอียดสินค้า</label>
        <textarea id="pdetail" name="pdetail" rows="5"><?=$data1['p_detail'];?></textarea><br>
        <label for="pprice">ราคา</label>
        <input type="text" id="pprice" name="pprice" required value="<?=$data1['p_price'];?>"><br>
        <label for="pimg">รูปภาพ</label>
        <input type="file" id="pimg" name="pimg"><br>
        <label for="pcat">ประเภทสินค้า</label>
        <select id="pcat" name="pcat">
        <?php
        $sql2 = "SELECT * FROM `category` ORDER BY c_name ASC";
        $rs2 = mysqli_query($conn, $sql2);
        while ($data2 = mysqli_fetch_array($rs2)) { ?>
            <option value="<?=$data2['c_id'];?>" <?=($data1['c_id'] == $data2['c_id']) ? "selected" : "";?> ><?=$data2['c_name'];?></option>
        <?php } ?>
        </select><br><br>
        
            <button type="submit" name="Submit">บันทึก</button>
    </form>
</div>

<?php
if (isset($_POST['Submit'])) {
    if (empty($_FILES['pimg']['name'])) {
        $sql = "UPDATE `product` SET `p_name` = '{$_POST['pname']}', `p_detail` = '{$_POST['pdetail']}', `p_price` = '{$_POST['pprice']}', `c_id` = '{$_POST['pcat']}' WHERE `product`.`p_id` = '{$_GET['pid']}';";
    } else {
        $file_name = $_FILES['pimg']['name'];
        $ext = substr($file_name, strpos($file_name, '.') + 1);
        $sql = "UPDATE `product` SET `p_name` = '{$_POST['pname']}', `p_detail` = '{$_POST['pdetail']}', `p_price` = '{$_POST['pprice']}', `c_id` = '{$_POST['pcat']}', p_ext='{$ext}' WHERE `product`.`p_id` = '{$_GET['pid']}';";
        copy($_FILES['pimg']['tmp_name'], "images/" . $_GET['pid'] . "." . $ext);
    }
    mysqli_query($conn, $sql) or die("แก้ไขข้อมูลสินค้าไม่ได้");
    echo "<script>alert('แก้ไขข้อมูลสินค้าสำเร็จ'); window.location='index.php';</script>";
}
mysqli_close($conn);
?>
</body>
</html>
