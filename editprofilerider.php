<?php
//เชื่อมต่อฐานข้อมูล
require('./config/dbconnectedit.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$id = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$nickname = $_POST["nickname"];
$numberphone = $_POST["numberphone"];
$address = $_POST["address"];






$sql = "UPDATE users SET firstname ='$firstname',lastname ='$lastname',nickname ='$nickname' ,numberphone ='$numberphone',address ='$address'  WHERE id=$id; ";

$result = mysqli_query($con, $sql);

if ($result) {
  header("location:rider.php");
  exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}
