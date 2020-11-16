<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

  <style type="text/css"> 
    .txtbox1 {
      padding:8px;
      display:block;
      border:none;
      border-bottom:1px solid #ccc;
      width:100%
    }

    .txtbox2{
      padding-top:16px;
      padding-bottom:16px
    }

    .buttoncss1{
      border:none;
      display:inline-block;
      padding:8px 16px;
      vertical-align:middle;
      overflow:hidden;
      text-decoration:none;
      color:inherit;
      background-color:inherit;
      text-align:center;
      cursor:pointer;
      white-space:nowrap
    }

    .buttoncss2{
      color:#000;
      background-color:#f1f1f1
    }

    .buttoncss3{
      padding:12px 24px
    }

     </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
   <?php include 'mainlayout.php';?>
<div class="container">
  <h1 style="font-family: 'Pacifico'">Contact us</h1>
    
    <p>We are specialised as an online bakery store to serve to your food cravings at any time of the day! We do have a branch where you can dine-in where we serve you with the same great taste with added ambience to light up your mood!<br>
      <em><strong> Dine-in with us: </strong></em><br>
    207, GM Road, LMT marg, Ghatkopar West, Mumbai, Maharashtra 400086</p>
    <br>
    <p><strong>Head office:</strong>
      2<sup>nd</sup> Floor, MG Road, Jagadhari, YamunaNagar, Haryana
      <br>
      <strong>Contact: </strong>
      9702940769 / 22208467<br>
      <strong>E-mail: </strong>
      cakenbake.website@gmail.com<br>



    <p> We also offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p><br>
    <br>
    <strong>Visit Us at: </strong>
    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=LBS%20Marg,Ghatkopar%20West,Mumbai+(CakeNBake)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm">Plan A Journey</a></div>

    <br><br>
    <h4><strong>Enquiries/feedback? Get in touch!</strong></h4>
    
    <form action="FeedbackPage.php" method="post" >
      <p><input class="txtbox1 txtbox2" type="text" placeholder="Name" required name="Name" pattern="^[A-Za-z ]*$" title="Type Alphabets only "></p>
      <p><input class="txtbox1 txtbox2" type="text" placeholder="Email" required name="Email" pattern="^[a-z0-9._-}+@[a-z]+.[a-z.]{2,5}$" title="Enter valid email"></p>
      <p><input class="txtbox1 txtbox2" type="text" placeholder="Phone" required name="Phone" pattern="^[0-9]{10}$" title="Type Numbers only"></p>
      <p><input class="txtbox1 txtbox2" type="text" placeholder="Message" required name="Message" title="Type Message here"></p>
      <p>
        <button class="buttoncss1 buttoncss2 buttoncss3" type="submit" name="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  </div>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>
