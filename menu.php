<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();

  ?>
  <!DOCTYPE html>
  <html>
  <body>
    
  </body>
  </html>
 
<!DOCTYPE html>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style the tab */
.tab-1 {
    float: left;
    border: 1px solid #ccc;
    background-color: #ffadb1; 
    width: 10%;
    height: 100%;
}

 .menuPrice{
    float: right;
    width: 30%;
    padding: 5px;
}


/* Style the buttons inside the tab */
.tab-1 button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab-1 button:hover {
    background-color: #d2777b;
    color: #dddddd;
}

/* Create an active/current "tab button" class */
.tab-1 button.active {
    background-color: #823c3f;
    color:white;
}

/* Style the tab content */
.tab-2 {
    float: left;
    padding: 0px 12px;
    border: 1px solid #6B4B5A;
    width: 90%;
    border-left: none;
    height: 100%;
    
}


@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="tab-"] {
        width: 100%;
    }
}
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #823c3f; 
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
}

#snackbar.show {
  visibility: visible; 
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbarQ {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #823c3f; 
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
}

#snackbarQ.show {
  visibility: visible; 
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
</head>
<body>
<div style = "border-radius:100px" id="snackbar" >Added to cart</div>
<div style = "border-radius:100px" id="snackbarQ" >Quantity should be between 1 and 50</div>

  <?php include 'mainlayout.php';?>
  <?php $category=$db_handle->runQuery("SELECT * FROM categories"); ?>
  <div class="tab-1">
  <?php  if(!empty($category)){
    $val=1;
    foreach ($category as $key => $value) {
       if($val==1){?>
         <button class="tablinks" onclick="openMenu(event,'<?php echo $category[$key]["name"];?>')" id="defaultOpen"><?php echo $category[$key]["name"];?></button>
       <?php }
       else {?>
         <button class="tablinks" onclick="openMenu(event,'<?php echo $category[$key]["name"];?>')"><?php echo $category[$key]["name"];?></button>
      <?php 
    }
    $val++;
  }

}
  ?>
</div>

<?php if(!empty($category)){
  foreach ($category as $key => $value) {
    ?>
    <div id="<?php echo $category[$key]["name"]; ?>" class="tab-2">
      <?php
      $like=$category[$key]["code"];
  $product_array = $db_handle->runQuery("SELECT * FROM cart where code like '$like%' ORDER BY hits DESC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
      <img src="<?php echo $product_array[$key]["image"]; ?>" style="height: 130px ; width: 150px">
      <strong style="font-size: 18px;"><?php echo $product_array[$key]["name"]; ?></strong>
      <div class="menuPrice"><?php echo "Price: ₹".$product_array[$key]["price"]; ?><br>QTY: 
      <input type="number" min= 1 max =100 style = "width:65px" name="quantity" id = "qty_<?php echo $product_array[$key]['code'];?>" value="1" size="2" /><br><br>
      <input type="button" id = "<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction" onclick="addToCart(this.id)"/></div>
    <hr>
    <br>
  <?php
      }
  }
  ?>
    </div>
 <?php 
   }
  } 
   ?>
</div>
<script>
function openMenu(evt, menuName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">

function addToCart(a)
{
  var b= "qty_"+a;
  var c = document.getElementById(b).value;
    if(c<=50&&c>0){
  $.ajax({
    type: "POST",
    data:{action:"add",code:a,quantity:c},
    url: "cartrelated.php",
    dataType:"json",
    success: function(response){
      document.getElementById('cartCount').setAttribute("data-count", response);
      var x = document.getElementById("snackbar");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
  });
}
else {
     var x = document.getElementById("snackbarQ");
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
    
}
</script>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>
