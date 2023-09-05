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
$address2 = $_POST["address2"];
$district = $_POST["district"];
$district1 = $_POST["district1"];
$city = $_POST["city"];
// $url = $_POST["url"];





$sql = "UPDATE users SET firstname ='$firstname',lastname ='$lastname',nickname ='$nickname' ,numberphone ='$numberphone',address ='$address',address2 ='$address2',district ='$district',district1 ='$district1',city ='$city'  WHERE id=$id; ";

$result = mysqli_query($con, $sql);

if ($result) {
  header("location:profile.php");
  exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}
