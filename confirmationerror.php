<?php 
session_start();
$naam=$_SESSION['naam'];
$e=$_SESSION['u_email'];
 ?>
<html>
<head>
  <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
  
</head>
<body>
       <?php include 'mainlayout.php';
        $Subject='Order Failed';
$MSG=$naam.' Retry Ordering!'."\n\n".'Pls. try to reorder.Your prev order has been declined due to payment error '. "\n\n\n\n".'Warm Regards'."\n".'CakeNBake Technical team';
if(mail($e,$Subject,$MSG)){
	
}
else{
	echo "error";
}?>

  <h1 align="center">Sorry For Inconvienence! Pls try again later<br> <img src="Images/unsuccessful.png" width="550px" height="380px"> <a href="index.php"><p style="color: maroon; font-size: 20px"  ><strong>Continue to browse the site</strong></p></a> </h1> <br> <footer style="text-align: center;"> <small>&copy;  2020, CakeNBake. All Rights Reserved</small> </footer> <br> </body>
</html>