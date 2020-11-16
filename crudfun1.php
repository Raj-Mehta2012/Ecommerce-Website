<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();

$name=$_POST["cname"];
$code=$_POST["ccode"];

$conn=$db_handle->connectDB();
$conn->query("INSERT into categories (name,code) VALUES ('$name','$code')");

echo 1;
?>