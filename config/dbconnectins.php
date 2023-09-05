<?php 

// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mydata";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql="select * from food ";




$result= mysqli_query($db,$sql);
$images= mysqli_fetch_assoc($result);

?>