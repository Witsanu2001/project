<?php
//เชื่อมต่อฐานข้อมูล
require('./config/dbconnectedit.php');

//รับค่าที่มาจากฟอร์มแก้ไข
$id = $_POST["id"];
$m_name = $_POST["m_name"];
$m_price = $_POST["m_price"];
$m_description = $_POST["m_description"];
$uploaded_on = $_POST["uploaded_on"];


$sql = "UPDATE food SET m_name ='$m_name', m_price='$m_price',m_description='$m_description', uploaded_on='$uploaded_on' WHERE id=$id; ";

$result = mysqli_query($con, $sql);

if ($result) {
  header("location:Edit.php");
  exit(0);
} else {
  echo "ไม่สามารถแก้ไขข้อมูลได้" . mysqli_error($con);
}
