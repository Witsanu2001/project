<?php
require('./config/dbconnectedit.php');

$id = $_GET["id"];

$sql = "DELETE FROM sp_transaction WHERE id=$id";
$result = mysqli_query($con, $sql);

if ($result) {
  header("location:customer.php");
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
