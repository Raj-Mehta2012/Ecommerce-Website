<?php
session_start();
$oid=$_POST['oid'];
//$oid='ORDS6720200930103945';
require_once("dbcon.php");
$db_handle = new DBController();
$con= $db_handle->connectDB();
        if(!$con)
        {
	        die('Could not connect:'.mysql_error());
        } 
     
        $qry = "SELECT users.name,users.email FROM users,order_table WHERE order_table.person_id=users.Personid and order_table.order_id = '$oid'";
        
        $rs = mysqli_query($con,$qry);
        $rowOd=$rs->fetch_assoc();
        $e=$rowOd['email'];
        $n=$rowOd['name'];
         $Subject='Order Rejected';
$MSG=$n.', Thank you for Ordering!'."\n\n".'Order ID'.$oid."\n".'Your Order is rejected By Kitchen Team,due to some reason.'."\n".'Sorry for inconvinience!!'."\n".'Money will be refunded asap.'."\n\n".'Warm Regards'."\n".'CakeNBake Technical team';
if(mail($e,$Subject,$MSG)){
	
}
else{
	echo "error";
}
        echo 1;
      //  echo $rowOd['email'];
     
?>