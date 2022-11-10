<?php 
session_start(); //ปกาศใช้ session
unset($_SESSION["trader_id"]);
unset($_SESSION["first_name"]);
unset($_SESSION["last_name"]);
unset($_SESSION["role"]);
header('Location: login.php'); //Logout รียบร้อและกระโดดไหน้ตามที่ต้องาร
?>