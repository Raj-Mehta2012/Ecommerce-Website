<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html>
<head> 
	<link href="style.css" type="text/css" rel="stylesheet" />
	<style type="text/css">
  * {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <?php include 'mainlayout.php';?>
<div class="container">
<form action="pgRedirect.php" method="post" style="border:1px solid #ccc">
  
    <h1 style="font-family: 'Pacifico'; color: maroon" align="center">Personal Details</h1>
    <p>Please enter your details.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" pattern="[a-zA-Z ]*" required>
    <label for="mobile_no"><b>Mobile No.</b></label>
    <input type="text" placeholder="Enter Mobile No." name="mobile_no" pattern="[0-9]*{10}" required>
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>
    <label for="email"><b>Email</b></label>
  <br>
  <?php echo $_SESSION['u_email'];
  ?>
  </div>

<div class="container">
 <h1 style="font-family: 'Pacifico'; color: maroon" align="center">Order Summary</h1>
    <hr>
<div id="shopping-cart">
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    $gst = 0;
    $total = 0;
    $date = date("Ymdhis");
    $ORDER_ID="ORDS" .$_SESSION['userid'].$date;
    $_SESSION['orderId'] = $ORDER_ID;
?>		
<table align="center" cellpadding="10" cellspacing="1" margin="30" style="width: 1000px;">
            <tbody>
              <tr>
                  <th style="text-align: left;" ><strong>OrderId</strong></th>
                  <th style="text-align: right;"></th>
                   <th style="text-align: right;"><strong><input type="hidden" readonly style="text-align: right;" id="ORDER_ID" name="ORDER_ID" value=<?php echo $ORDER_ID; ?>><?php echo $ORDER_ID; ?></strong></th>
              </tr>  
                <tr>
                    <th style="text-align: left;"><strong>Name</strong></th>
                    <th style="text-align: right;"><strong>Quantity</strong></th>
                    <th style="text-align: right;"><strong>Price</strong></th>
                </tr>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
		$product_info = $db_handle->runQuery("SELECT * FROM cart WHERE code = '" . $item["code"] . "'");
?>
				<tr>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><strong><?php echo $item["name"]; ?></strong></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><?php echo $item["quantity"]; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><?php echo "₹".$item["price"]; ?></td>
                   
                </tr>
				<?php
        $item_total += ($item["price"] * $item["quantity"]);
    }
    $gst = ($item_total * 0.12);
    $total = ($item_total+$gst);
    $final_price=$total;
    $_SESSION['Payment_amount'] = $final_price;

    ?>

                <tr>
                    <td colspan="2" align=right style="background-color: #EBECDA;"><strong>Sub-Total:</strong></td>
                    <td align=right style="background-color: #EBECDA;"><?php echo "₹".$item_total; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" align=right style="background-color: #EBECDA;"><strong>GST:</strong></td>
                    <td align=right style="background-color: #EBECDA;"><?php echo "₹".$gst; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" align=right style="background-color: #EBECDA;"><strong>Total:</strong></td>
                    <td align=right style="background-color: #EBECDA;">₹ <input type="hidden" readonly style="text-align: right;" id="TXN_AMOUNT" name="TXN_AMOUNT" value=<?php  echo $final_price; ?>>
                    <?php echo $total?>
                    </td>

                    <td></td>
                </tr>
            </tbody>
        </table>		
  <?php
}
?>
</div>
<div class="cart_footer_link">
<p align="right"><button  type="submt" >Confirm Order</button></p></a>
<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
            size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">            
</form>
</div>
<br>
<footer style="text-align: center;">
 <small>&copy; 2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>