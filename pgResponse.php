<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
        require_once("dbcon.php");
        $db_handle = new DBController();
        $con= $db_handle->connectDB();
        if(!$con)
        {
	        die('Could not connect:'.mysql_error());
        } 
        header('location:confirmation.php');
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
        
	}
	else {
		header('location:confirmationerror.php');
	}
?>