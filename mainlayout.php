<?php
require_once("dbcon.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<head>
    

<!--using bootstraps, js, jQuery-->


 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<!--end use of addnl files-->


<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color:#ffadb1;
}

.topnav a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 95px;

  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color:#823c3f;
  color:white;
}

.topnav a.active {
    background-color:#823c3f;
}


.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
#ex4 .p1[data-count]:after{
  position:absolute;
  right:50%;
  top:8%;
  content: attr(data-count);
  font-size:60%;
  padding:.2em;
  border-radius:50%;
  line-height:1em;
  color: white;
  background:rgba(255,0,0,.85);
  text-align:center;
  min-width: 1em;
  //font-weight:bold;


}
</style>
<title>Cake N Bake</title>
</head>
<body style="background-color: #e0eeff; font-family: Verdana, Geneva, sans-serif; color: black">


  <div>
    
    <div id="ex4">


<a href="cart.php" style="color: rgb(1,1,1);">


<span class="p1 fa-stack fa-2x has-badge" data-count="<?php if(isset($_SESSION['cartValueCount'])){echo $_SESSION['cartValueCount'];}else{echo 0;}?>" id ="cartCount" style="float: right;">
  <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="float: right ; "></i></a></div>
  <?php
    if(!isset($_SESSION['username']))
    {
?>
   <a href="login.php" style="color: rgb(1,1,1);"> <i class="fa fa-user fa-4x" aria-hidden="true" style="float: right;"></i> </a>

  <?php
        
      }
      else{
          ?>
      <a href="myorders.php" style="color: rgb(1,1,1);"> <i class="fa fa-list fa-4x" title = "Orders" aria-hidden="true" style="float: right;"></i> </a>

             <a href="logout.php" style="color: rgb(1,1,1);"> <i title = "Logout" class="fa fa-sign-out fa-4x" aria-hidden="true" style="float: right;"></i> </a>

          <?php
      }
        ?>
    <i aria-hidden="true" style="color: rgb(1,1,1);float: right; margin-top:15px; margin-right: 15px">


  <?php
        if(isset($_SESSION['username']))
        {
          ?>
          Welcome,<br>
          <?php
        echo $_SESSION['username'];
      }
        ?>
    </i>


 
<center><img src="Images\finalLogo.png" style="width:350px;height:250px;" class="center" alt="companyLogo"></center>

</div>

<div class="topnav" id="myTopnav" >
  <a href="index.php"> Home</a>
  <a href="menu.php">Menu</a>
  <a href="offer.php"> Offers</a>
  <a href="about.php">About</a>
  <a href="contact.php"> Contact</a>
  <a href="index1.html">ChatBot</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>