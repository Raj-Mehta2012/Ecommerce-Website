<?php
session_start();

require_once("dbcon.php");
$db_handle = new DBController();
$con= $db_handle->connectDB();
if(!isset($_SESSION['Payment_amount']))
{
    header("location:index.php");
}
if(isset($_SESSION["cart_item"])){
            $_SESSION['cartValueCount'] = 0;
            $naam=$_SESSION['naam'];
            $ph=$_SESSION['phone'];
            $oid = $_SESSION['orderId'];
            $uid = $_SESSION['userid'];
            $pmt = $_SESSION['Payment_amount'];
            $e=$_SESSION['u_email'];
            $add=$_SESSION['address'];
            $_SESSION['success'] = 20;
            $ip = $_SERVER['REMOTE_ADDR'];
            $da=date('d-m-Y');
            $sql= "INSERT INTO order_table(order_id,person_id,name,phone,amount,address,date,Status) VALUES ('$oid','$uid','$naam','$ph','$pmt','$add','$da','Pending')";
            mysqli_query($con,$sql);

            $sql3= "insert into ip_table(IP,order_id)values('$ip','$oid')";
            mysqli_query($con,$sql3);

            foreach ($_SESSION["cart_item"] as $item) {
                $qty = $item['quantity'];
                $name = $item['name'];
                $price = $item['price'];
                $sql1="INSERT INTO order_details(order_id,nop,qty,price_unit) VALUES ('$oid','$name','$qty','$price')";
                mysqli_query($con,$sql1);
                $sql2 = "UPDATE cart SET hits = hits + $qty where name = '$name'";
                mysqli_query($con,$sql2);

            }
            $Subject='Order Received';
$MSG=$naam.'  Thank you for Ordering!'."\n\n".'Your Order ID is:'.$oid."\n".'Your Order will be accepted soon!! go to MyOrders section and Check your order status '. "\n\n\n\n".'Warm Regards'."\n".'CakeNBake Technical team';
if(mail($e,$Subject,$MSG)){
	
}
else{
	echo "error";
}
        }
        unset($_SESSION["Payment_amount"]);
        unset($_SESSION["cart_item"]);

$con= $db_handle->connectDB();
if(!$con)
{
	die('Could not connect:'.mysql_error());
} 

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
</head>
<body>
  <?php include 'mainlayout.php';?>

  <h1 align="center">Thank you for ordering! The store will confirm your order soon.<br>
  	<br>
  	<img src="Images/successful.png" width="550px" height="450px">

        <a href="bill.php" target="_blank"><p style="color: maroon; font-size: 20px"  ><strong>Check Invoice</strong></p></a>
		<a href="index.php"><p style="color: maroon; font-size: 20px"  ><strong>Continue to browse the site</strong></p></a>

	</h1>
	<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>
