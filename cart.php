<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
 <?php include 'mainlayout.php';?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    function updateCartNumber()
    {
    $.ajax({
    type: "POST",
    url: "itemCount.php",
    dataType:"json",
    success: function(response){
         document.getElementById('cartCount').setAttribute("data-count",response);
        if(response==0)
        {
            location.reload();
        }
    }
  });   
    }
    function remove(a)
    {
    $.ajax({
    type: "POST",
    data:{action:"remove",code:a},
    url: "cartRemove.php",
    dataType:"json",
    success: function(response){
        $('#'+a).remove();
        document.getElementById('item_total').innerHTML = response;
        document.getElementById('gst').innerHTML = response*0.12;
        document.getElementById('total').innerHTML = response+response*0.12;
        updateCartNumber();


    }
  });

}
function clearCart(){
    $.ajax({
    type: "POST",
    url: "cartClear.php",
    dataType:"json",
    success: function(response){
        $('#table1').remove();
         document.getElementById('cartCount').setAttribute("data-count",response);
        location.reload();

    }
  });
}
</script>
<br>
<div id="shopping-cart">
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    $gst = 0;
    $total = 0;
?>		
<center><table id = "table1" cellpadding="10" cellspacing="1" style="margin: 30px; width: 1100px">
            <tbody">
                <tr>
                    <th style="text-align: left;"><strong>Name</strong></th>
                    <th style="text-align: right;"><strong>Quantity</strong></th>
                    <th style="text-align: right;"><strong>Price</strong></th>
                    <th style="text-align: center;"><strong>Action</strong></th>
                </tr>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
		$product_info = $db_handle->runQuery("SELECT * FROM cart WHERE code = '" . $item["code"] . "'");
?>
				<tr id = "<?php echo $item["code"]; ?>">
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><strong><?php echo $item["name"]; ?></strong></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><?php echo $item["quantity"]; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><?php echo "₹".$item["price"]; ?></td>
                   <td
                        style="text-align: center; border-bottom: #F0F0F0 1px solid; background-color: #EBECDA;"><button onclick ="remove('<?php echo $item["code"]; ?>')"><img src="Images/icon-delete.png" alt="icon-delete" title="Remove Item" /></button></td>
                </tr>
				<?php
        $item_total += ($item["price"] * $item["quantity"]);
    }
    $gst = ($item_total * 0.12);
    $total = ($item_total+$gst);
    ?>

                <tr>
                    <td colspan="3" align=right style="background-color: #EBECDA;"><strong>Sub-Total:</strong></td>
                    <td align=right id="item_total" style="background-color: #EBECDA;"><?php echo "₹".$item_total;?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" align=right style="background-color: #EBECDA;"><strong>GST(12%):</strong></td>
                    <td align=right id= "gst" style="background-color: #EBECDA;"><?php echo "₹".$gst; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" align=right style="background-color: #EBECDA;"><strong>Total:</strong></td>
                    <td align=right id = "total" style="background-color: #EBECDA;"><?php echo "₹".$total; ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        </center>		
  <?php
}
?>
</div>
<div class="cart_footer_link">
<p align="right" style="margin-right: 200px;">
    <button onclick = "clearCart()">Clear  Cart</button>
    <a href="menu.php" title="Cart"><button>Continue Shopping</button></a>
    <?php
        if(isset($_SESSION['username']))
        {
            if(empty($_SESSION["cart_item"])){
    ?>
        </p><p align = "center" style="font-size:25px">Cart is empty!
        <?php
            }
            else{
        ?>
    <a href="checkout.php" title="Cart" id="check"><button>Place Order</button></a>
    <?php
            }
        }
        else if(!isset($_SESSION['username'])){
            ?>
            </p><p align = "center" style="font-size:25px">Please<a href = "login.php">Login</a>to place an order!
            
            <?php
        }

    ?>
</p>
</div>
<script>
    
function toggleAction(id) {
	if(document.getElementById("remove"+id).style.display == 'none') {
		document.getElementById("remove"+id).style.display = 'block';
	} else {
		document.getElementById("remove"+id).style.display = 'none';
	}
}
</script>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved </small>
</footer>
<br>
</BODY>
</HTML>
