<meta charset="utf-8">
<?php
	@session_start();
	include("connectdb.php");
	
		foreach($_SESSION['sid'] as $pid) {
			$sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid] ;
			@$total += $sum[$pid] ;
		}
	
	$sql = "insert into `orders` values(NULL, '$total', CURRENT_TIMESTAMP, '{$_SESSION['aid']}');" ;
	//var_dump($sql);exit;
	mysqli_query($conn, $sql) or die ("กรุณาเข้าสู่ระบบก่อน") ;
	$id = mysqli_insert_id($conn);
	
	foreach($_SESSION['sid'] as $pid) {
		$sql2 = "insert into orders_detail values(NULL, '$id', '".$_SESSION['sid'][$pid]."', '".$_SESSION['sitem'][$pid]."');" ;
		mysqli_query($conn, $sql2);
	}
	
echo "<meta http-equiv=\"refresh\" content=\"0;URL=clear2.php\">";
?>