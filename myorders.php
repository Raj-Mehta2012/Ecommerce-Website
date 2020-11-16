<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header('location:index.php');
}
require_once("dbcon.php");
$db_handle = new DBController();
$con= $db_handle->connectDB();
        if(!$con)
        {
	        die('Could not connect:'.mysql_error());
        } 
        $uid = $_SESSION['userid'];
        $qry = "SELECT * FROM order_table WHERE person_id = '$uid' ORDER BY date ASC,order_id DESC";
        $rs = mysqli_query($con,$qry);
        
     
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" type="text/css" rel="stylesheet" />
  
  <style>
    body {
    	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
    	color: #444;
    	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
    	text-shadow: 0 1px 0 #fff;
    }
    
    strong {
    	font-weight: bold; 
    }
    
    em {
    	font-style: italic; 
    }
    
    table {
    	background: #f5f5f5;
    	border-collapse: separate;
    	box-shadow: inset 0 1px 0 #fff;
    	font-size: 12px;
    	line-height: 24px;
    	margin: 30px auto;
    	text-align: left;
    	width: 1300px;
    }	
    
    th {
    	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
    	border-left: 1px solid #555;
    	border-right: 1px solid #777;
    	border-top: 1px solid #555;
    	border-bottom: 1px solid #333;
    	box-shadow: inset 0 1px 0 #999;
    	color: #fff;
      font-weight: bold;
    	padding: 10px 15px;
    	position: relative;
    	text-shadow: 0 1px 0 #000;	
    }
    
    th:after {
    	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
    	content: '';
    	display: block;
    	height: 25%;
    	left: 0;
    	margin: 1px 0 0 0;
    	position: absolute;
    	top: 25%;
    	width: 100%;
    }
    
    th:first-child {
    	border-left: 1px solid #777;	
    	box-shadow: inset 1px 1px 0 #999;
    }
    
    th:last-child {
    	box-shadow: inset -1px 1px 0 #999;
    }
    
    td {
    	border-right: 1px solid #333;
    	border-left: 1px solid #333;
    	border-top: 1px solid #333;
    	border-bottom: 1px solid #333;
    	padding: 10px 15px;
    	position: relative;
    	transition: all 300ms;
    }
    
    td:first-child {
    	box-shadow: inset 1px 0 0 #fff;
    }	
    
    td:last-child {
    	border-right: 1px solid #e8e8e8;
    	box-shadow: inset -1px 0 0 #fff;
    }	
    
    tr {
    	background: #ffdedf url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    }
    
    tr:nth-child(odd) td {
    	background: #ffdedf url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    }
    
    tr:last-of-type td {
    	box-shadow: inset 0 -1px 0 #fff; 
    }
    
    tr:last-of-type td:first-child {
    	box-shadow: inset 1px -1px 0 #fff;
    }	
    
    tr:last-of-type td:last-child {
    	box-shadow: inset -1px -1px 0 #fff;
    }	
    
    tbody:hover td {
    	color: transparent;
    	text-shadow: 0 0 3px #aaa;
    }
    
    tbody:hover tr:hover td {
    	color: #444;
    	text-shadow: 0 1px 0 #fff;
    }
  </style>
</head>
<body>
<script>
function getBill(a)
{
    $.ajax({
    type: "POST",
    url: "invoice.php",
    data:{"orderId":a},
    dataType:"json",
    success: function(response){
        alert("hey");
    }
  });   
}

</script>
 <?php include 'mainlayout.php';
 ?>

<center>
<table border = 1'>
  <tr>
    <th>Order Id</th>
    <th>Product Names </th>
    <th>Quantity </th>
    <th>Price Per</th>
    <th><center>Price Paid</center>(Including 12% GST)</th>
    <th>Status</th>

  </tr> 
  <?php
  
  while($row=$rs->fetch_assoc())
        {
            $oid = $row['order_id'];
            ?>
            <tr>
            <td ><a href = "invoice.php?orderId=<?php echo $oid; ?> " target="_blank"><?php echo $oid; ?></a></td>
            <?php
            $qry1="SELECT * FROM order_details WHERE order_id = '$oid'" ;
            $rsOd = $con->query($qry1);
            ?>
            <td>
            <?php
            while($rowOd=$rsOd->fetch_assoc())
            {
                echo $rowOd['nop'];
                echo "</br>"; 
            }
            ?>
            </td>
            <td>
            <?php
            $rsOd = $con->query($qry1);
            while($rowOd=$rsOd->fetch_assoc())
            {
                echo $rowOd['qty'];
                echo "</br>"; 
            }
            ?>
            </td>
            <td>
            <?php
            $rsOd = $con->query($qry1);
            while($rowOd=$rsOd->fetch_assoc())
            {
                echo $rowOd['price_unit'];
                echo "</br>"; 
            }
            ?>
            </td>
            <td>
            <?php
                echo $row['amount'];
            
        
        ?>
            </td>
            <td>
            <?php
                echo $row['Status'];
        }
        ?>
</td>
</tr>



</table>
</center>

<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved </small>
</footer>
<br>
</BODY>
</HTML>
