<?php

$host = "localhost";
$usr = "root";
$pwd = "1234mark";
$db = "shop";

$conn = mysqli_connect($host,$usr,$pwd)or die("เชื่อมต่อฐานข้อมูลล้มเหลว");
mysqli_select_db($conn,$db)or die("เลือกฐานข้อมูลไม่ได้");
mysqli_query($conn,"SET NAMES utf8");

?>