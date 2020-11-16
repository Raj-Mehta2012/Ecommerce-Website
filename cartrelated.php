<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
  case "add":
  if($_POST["quantity"]>0)
    if(!(empty($_POST["quantity"]))) {
        $_POST["quantity"] = round($_POST["quantity"]);
      $productByCode = $db_handle->runQuery("SELECT * FROM cart WHERE code='" . $_POST["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
}
}
$item_count = 0;
if(isset($_SESSION["cart_item"])){
    $item_count = 0;
 foreach ($_SESSION["cart_item"] as $item) { 
    $product_info = $db_handle->runQuery("SELECT * FROM cart WHERE code = '" . $item["code"] . "'");
    $item_count +=1 ;
  }
}
$_SESSION['cartValueCount']= $item_count;
echo $item_count;
?>