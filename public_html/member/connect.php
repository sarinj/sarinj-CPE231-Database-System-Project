<?php
$servername = "localhost";
$username = "b1n_cpe231";
$password = "123456"; //ไม่้งรหัสผากล  yourpassword ออก
 
try {
  $conn = new PDO("mysql:host=$servername;dbname=b1n_bitnance", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เลา ใ้ป็นของปะเไท
    date_default_timezone_set('Asia/Bangkok');
?>