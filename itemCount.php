<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
    $item_count = 0;
    if(isset($_SESSION["cart_item"])){
    
 foreach ($_SESSION["cart_item"] as $item) { 
    $product_info = $db_handle->runQuery("SELECT * FROM cart WHERE code = '" . $item["code"] . "'");
    $item_count +=1 ;
  }
}
$_SESSION['cartValueCount']= $item_count;

echo $item_count;
?>
