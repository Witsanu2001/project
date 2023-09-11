<?php
require('./config/dbconnectedit.php');

$user_name = $_POST["firstname"];
$nickname = $_POST["nickname"];
$numberphone = $_POST["numberphone"];
$delivery_add = $_POST["location"];
$amount = $_POST["amont"];
$shipping = $_POST["shipping"];
$netamount = $_POST["netamount"];
$operation = $_POST["operation"];
$m_count = $_POST["count"];
$m_name = $_POST["m_name"];
$m_price = $_POST["m_price"];
$order = [];
foreach ($m_name as $count => $result) {
    $order[] = [$result, $m_price[$count], $m_count[$count]];
}
$product = json_encode(["order" => $order]);

$sql = "INSERT INTO `order` ( 
    user_name,
    nickname,
    numberphone,
    delivery_add,
    product, 
    amount, 
    shipping, 
    netamount, 
    operation) 
    VALUES(
    '$user_name',
    '$nickname',
    '$numberphone',
    '$delivery_add',
    '$product',
    '$amount',
    '$shipping',
    '$netamount',
    '$operation')";

$result = mysqli_query($con, $sql);
if ($result) {
    header("location: customer.php");
    exit(0);
} else {
    echo mysqli_error($con);
}
?>
