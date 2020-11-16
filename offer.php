<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Berkshire Swash' rel='stylesheet'>

  <style>
  .row::after {
    content: "";
    clear: both;
    display: table;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;
}
</style>
</head>
<body>
 <?php include 'mainlayout.php';?>
 <div class="container" align="center">
 	<h1 style="font-family: 'Pacifico'; color: maroon">Bread Combo-Box at ₹500/-</h1>
 	<h3>Enjoy best variety of international / national breads from the menu <u>you choose</u> at ₹500/- only!*</h3>
 	<h3 style="font-family: 'Berkshire Swash';"> <strong>Breads Offered:</strong></h3>
 	<p style="font-size: 20px">Bagels<br>Banana Breads<br>Fetali Bread<br>English Muffin Bread</p>
 	<br>

 	<p style="font-size: 18px; font-family: 'Berkshire Swash';">Offer is valid from Monday to Friday<br> (1:00pm – 4:00 pm)</p><br><br>

 	<p>*Terms & Conditions<br>1. One Bread per type<br>2. Not valid on public holidays & national holidays</p>

 </div>
 <div class="row, container" align="center">
  <div class="column">
    <img src="Images/o1.jpg" alt="Italian Open Lunch" style="height: 275px">
  </div>
  <div class="column">
    <img src="Images/o2.jpg" alt="Continental Open Lunch" style="height: 275px">
 </div>
  <div class="column" >
    <img src="Images/o3.jpg" alt="Indian Open Lunch" style="height: 275px;width:350px">
  </div>
</div>
<br>
<div class="container" align="center" style="background-color: #fafdeb">
	<h3 style="">For Updates on our weekly Offers, Discounts and Vouchers<br><a href="registration.php">Subscribe to us!</a></h3>
</div>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>

</html>