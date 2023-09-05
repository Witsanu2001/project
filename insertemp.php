<?php
require('./config/dbconnectemp.php');

$emp_title=$_POST["emp_title"];
$emp_name=$_POST["emp_name"];
$emp_surname=$_POST["emp_surname"];
$emp_adr=$_POST["emp_adr"];
$emp_car=$_POST["emp_car"];
$emp_tel=$_POST["emp_tel"];


$sql="INSERT INTO employee(emp_title,emp_name,emp_surname,emp_birthday,emp_adr,emp_car,emp_tel) 
VALUE('$emp_title','$emp_name','$emp_surname','$emp_birthday','$emp_adr','$emp_car','$emp_tel')";

$result=mysqli_query($con,$sql);
if($result){
    header("location:index.php");
    exit(0);
}else{
    echo mysqli_error($con);
}