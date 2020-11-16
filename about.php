<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<head>
	  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

#parent
{ padding: 1% 0;
}
#child
{
  padding: 10% 0;  
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
.column2 {
    float: left;
    width: 50%;
    padding: 5px;
}</style>
</head>
<body>
   <?php include 'mainlayout.php';?>
<div  class="container">
	<h1 style="font-family: 'Pacifico'">About Us</h1><br>
Established in 2020, our bakery service has grown immensely. Our online bakery service has filled millions of stomachs with some really yummy cakes, cupcakes and many other delicacies.
We serve with a wide range of variety perfect for Special occassions, snacks, dinners and also for all your parties & special occasions. Always holding up our standards to always serve your Tastebuds with our high standards quality food.
Serving vegetarian products, your choices are not limited in any way.  We offer Mouthwatering Cakes, Fulfilling Cupcakes, Soft Spongy fresh Baked Breads, Heartfilling Chocolates, Wide variety of homemade sauces, these all you can order under one roof, then you could pamper your plate with delicacies of your choice range of different ptions. With a wide range of food to satisfy all your cravings, we offer great deals, discounts and offers. Be a part and enjoy this service while you can!
<hr>
	<h1 style="font-family: 'Pacifico'">Our Team</h1><br>

<div class="row, container" id="parent" align="center" style="background-color: #ffadb1">
  <div class="column2">
    <img src="Images/chef.png" alt="Head Chefs" style=" height:450px;width:550px">
  </div>

  <div class="column2" id="child" align="center" style="padding-right: 4%">
    <h2 style="font-family: 'Berkshire Swash'; color: purple"><strong>Executive Bakers</strong></h2>
    <p>  Holding many years of baking experience. Both graduating in IT, their first professional position introduced them to the rewarding relationship between baking and IT, nothing. It remains the foundation for what drives them today, totally. Not finding interest in their degree, they went on a search to find new windows of opportunity; and tada, baking it was! Their entrepreneurial spirit and desire to create unforgettable food led to the opening of CakeNBake in 2020. Though they spends most of their time thinking about food, in their spare time, they program food websites, complete journals, and cry about submissions.</p>
    <br>
   </div>
  </div>
</div>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>
