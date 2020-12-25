<?php
session_start();
if(isset($_POST['submit']))
{
    if (preg_match("/(<|>|'|\")/",$_POST['email']))
    {
        exit("Validation Failed");
    }
    if (preg_match("/(<|>|'|\")/",$_POST['password']))
    {
        exit("Validation Failed");
    }
	require_once("dbcon.php");
	$db_handle = new DBController();
	$email =$_POST['email'];
	$pass =$_POST['password'];

	$sql1 = "SELECT * FROM users where Email='$email'";
	$con= $db_handle->connectDB();
	$result = $con -> query($sql1);
	$row = $result -> fetch_assoc();
	if($row!=false)
	{
		if(password_verify($pass,$row['Password']))
		{   
            $_SESSION['tu_email']=$row['Email'];
		    $_SESSION['tusername'] = $row['Name'];
		    $_SESSION['tuserid'] = $row['Personid'];
		    $_SESSION['CODE']=rand(11111,99999);
            include 'mainlayout.php';
            mail($_SESSION['tu_email'],"OTP for 2-factor Authentication",$_SESSION['CODE']);
		}
        else{
            $_SESSION['loginHere'] = 1;
		    header("Location:login.php?Fail=1");
        }
	}
	else
	{
		$_SESSION['loginHere'] = 1;
		header("Location:login.php?Fail=1");
	}
}
else if(isset($_SESSION['CODE'])){
    include 'mainlayout.php';
}
else{
    	header("Location:index.php");
}
?>
<html>
    <head>
        <title>2-step Authentication</title>
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            input[type=number] {
            -moz-appearance: textfield;
            }
        </style>
    </head>
    <body>
        <center>
        
        <form action="validate.php" method="post" style="border:1px solid #ccc" ID = "vForm">
        <h1 style="font-family: 'Pacifico'; color: maroon" align="center">2-factor authentication</h1>
        <b>Enter OTP sent on E-mail</b><br>
        <input type ="number" name = "otp" required><br>
        <span style = "color:red"><?php if(isset($_GET['fail'])) echo"Invalid OTP";?></span><br>
        <button type = "submit">Validate</button><br>
        </form>
        </center>

    </body>
</html>