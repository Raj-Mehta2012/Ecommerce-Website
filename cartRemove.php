<?php
session_start();
require_once("dbcon.php");
    $item_count = 0;
    $item_total = 0;
$db_handle = new DBController();
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
  case "remove":
  if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_POST["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
    }
}
if(isset($_SESSION["cart_item"])){


 foreach ($_SESSION["cart_item"] as $item) { 
    $product_info = $db_handle->runQuery("SELECT * FROM cart WHERE code = '" . $item["code"] . "'");
    	$item_total += ($item["price"] * $item["quantity"]);

    $item_count +=1 ;
  }
}

    $gst = ($item_total * 0.12);
    $total = ($item_total+$gst);
$_SESSION['item_total1']=$item_total;   
$_SESSION['gst1']=$gst;
$_SESSION['total1']=$total;


echo $_SESSION['item_total1'];
?>