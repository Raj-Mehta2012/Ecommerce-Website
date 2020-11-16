<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();

$name=$_POST["pname"];
$price=$_POST["pprice"];
$img=$_POST["pimg"];
$code=$_POST["pcode"];

$conn=$db_handle->connectDB();
$conn->query("INSERT into cart (name,code,image,price) VALUES ('$name','$code','$img',$price)");

echo 1;
?>