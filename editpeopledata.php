<?php
//เชื่อมต่อฐานข้อมูล
require('./config/dbconnectedit.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$id = $_POST["id"];
$numberphone = $_POST["numberphone"];
$urole = $_POST["urole"];


$sql = "UPDATE users SET urole ='$urole',numberphone ='$numberphone' WHERE id=$id; ";

$result = mysqli_query($con, $sql);

if ($result) {
  header("location:people.php");
  exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}
