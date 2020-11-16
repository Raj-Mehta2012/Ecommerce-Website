<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
if(isset($_POST['oid1']))
{
    $a = $_POST['oid1'];
    $b = $_POST['stat1'];
    $sql1 = "update order_table set Status = '$b' where order_id = '$a'";
	$con= $db_handle->connectDB();
	$con -> query($sql1);
	echo 1;
}
echo 1;
?>