<?php
require_once("dbcon.php");
session_start();
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Berkshire Swash' rel='stylesheet'>

  <style>
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.active {
    background-color: #f56c97;
}
/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2s;
  animation-name: fade;
  animation-duration: 2s;
}

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
.column2 {
    float: left;
    width: 50%;
    padding: 5px;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

#parent
{ padding: 1% 0;
}
#child
{
  padding: 10% 0;  
}
</style>
</head>
<body>
 <?php include 'mainlayout.php';?>
<br>

<!--SLIDESHOW NAME, IMAGE, NUMBER -->
  <div class="slideshow-container" align="center">
<a href="menu.php">
  <div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="Images\ss1.jpg" style="width:90%" >
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="Images\ss2.jpg" style="width:90%" >
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="Images\ss3.jpg" style="width:90%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="Images\ss4.jpg" style="width:90%">
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="Images\ss5.jpg"  style="width:90%">
</div>
</a>
</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<!--SLIDESHOW JAVASCRIPT-->
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<!--SLIDESHOW JAVASCRIPT END-->
<br>
  <h1 style="font-family: 'Pacifico'; color: maroon" align="center">Why Us?</h1>
<br>
<div class="row, container" align="center" style="background-color: #ffadb1">
  <div class="column">
    <img src="Images/f11.jpg" alt="Fast Delivery" style="width:80%">
    <br>
    <p style="font-size: 17px"><strong> Time waits for none, why should you?  </strong></p>
  </div>
  <div class="column">
    <img src="Images/f22.jpg" alt="Multi Cuisine Delicacies" style="width:80%">
    <br >
    <p style="font-size: 17px"><strong> Come along with us on a Baked journey enjoying the delicacy that the world offers you.  </strong></p>
  </div>
  <div class="column" >
    <img src="Images/f33.jpg" alt="High Quality Natural Ingredients" style="width:80%">
    <br>
    <p style="font-size: 17px"><strong> We offer you a variety of fresh baked delights.</strong></p>
  </div>
</div>
<br>
  <h1 style="font-family: 'Pacifico'; color: maroon" align="center">What's New?</h1>
  <br>
<!--MENU1-->
<div class="row, container" id="parent" align="center" style="background-color: #ffadb1">
  <div class="column2" id="child" align="center" style="padding-left: 8%">
    <h2 style="font-family: 'Berkshire Swash'; color: purple">Choco-Overload Cupcake</h2>
    <p> Every Mumbaikar worth his salt knows that CakeNBake is the go-to place to get the best Cupcakes in the city. Every outlet has one display case entirely dedicated to trays of freshly baked cupcake-goodness. We particularly love the Overload Ciupcake which have just the right amount of chocolate in them.</p>
    <br>
   </div>
  <div class="column2">
    <img src="Images/index1.jpg" alt="Grilled Citrus Fish image" style="width:90%; height:90%">
  </div>
</div>
<br>
<!--MENU2-->
<div class="row, container" id="parent" align="center" style="background-color: #ffadb1">
    <div class="column2">
    <img src="Images/index2.png" alt="Black Currant Ice cream" style="width:90%; height:90%">
  </div>
  <div class="column2" id="child" align="center" style="padding-right: 8%">
    <h2 style="font-family: 'Berkshire Swash'; color: purple">ThunderDelight Cake (1KG)</h2>
    <p>  This refreshing summer treat will definitely satisfy your sweet tooth! Made without refined sugar and with fresh berries, this combination of sweet & tangy is perfect and makes this cake refreshing and delicious at the same time. Served with love, topped with Blue Berries!</p>
    <br>
   </div>
 </div>
 <br>
  
<div class="row, container" id="parent" align="center" style="background-color: #ffadb1">
  <div class="column2" id="child" align="center" style="padding-left: 8%">
    <h2 style="font-family: 'Berkshire Swash'; color: purple">Cheese Fatayer</h2>
    <p>Bringing to you the exotic flavours of the Middle East, Cheese fatayers are savory pastries stuffed with delicious Feta Cheesa, seasoned and baked until golden and flaky. Tasty, soft and fluffy, they are perfect for snack or lunch!  </p>
    <br>
      <span style="font-size: 18px; padding: 5px;  border: 5px solid purple;"><a href="menu.php">MENU</a></span>

   </div>
  <div class="column2">
    <img src="Images/index3.jpg" alt="Cheese Fatayer" style="width:90%; height:90%" >
  </div>
</div>
<br>


<br>
<div class="row, container" id="parent" align="center" style="background-color: #ffadb1">
  <div class="column2" id="child" align="center" style="padding-left: 8%; width: 40%">
      <h1 style="font-family: 'Berkshire Swash'; color: white">Chocolate Combo-Box at ₹750/-</h1>
    <p style="color: white">Try varieties of your favorite chocolates at just ₹750/- only*</p>
    <br>
    <span style="background-color: white; font-size: 18px; padding: 5px"><a href="offer.php">Know More!</a></span>
    <br><br>
    <p>*T&C Apply</p>
   </div>
  <div class="column2" style="width: 60%">
    <img src="Images/index4.jpeg" alt="Open Lunch" style=" height:90%; width:90%">
  </div>
</div>
<br>
<footer style="text-align: center;">
 <small>&copy; 2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>

</html>