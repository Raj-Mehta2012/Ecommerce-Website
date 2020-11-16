<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
if(!$con)
{
	die('Could not connect:'.mysql_error());
} 
if(isset($_SESSION["cart_item"])){
    $sql="INSERT INTO order_table(order_id,person_id,amount) VALUES ('$_SESSION['orderId']','$_SESSION['userid']','$_SESSION['Payment_amount']')";
    mysqli_query($con,$sql);
 foreach ($_SESSION["cart_item"] as $item) {
     $sql1="INSERT INTO order_details(order_id,nop,qty,price_unit) VALUES ('$_SESSION['orderId']','$item['name']','$item['quantity']','$item['price']')";
      mysqli_query($con,$sql1);
   echo $item['name']." ".$item['quantity']." ".$_SESSION['orderId']." ".$item['price'].$_SESSION['Payment_amount']." ".$_SESSION['userid'];
  }
}
?>