<?php
if(isset($_POST['submit']))
{
	require_once("dbcon.php");
	$db_handle = new DBController();
	$email =$_POST['email'];
	$pass =$_POST['password'];

	$sql1 = "SELECT * FROM admin123 where Email='$email'";
	$con= $db_handle->connectDB();
	$result = $con -> query($sql1);
	$row = $result -> fetch_assoc();
	session_start();
	if($row!=false)
	{
		if(password_verify($pass,$row['Password']))
		{   
            $_SESSION['admin_u_email']=$row['Email'];
		    $_SESSION['admin_username'] = $row['Name'];
		    $_SESSION['admin_userid'] = $row['Personid'];
		    header("Location:admin.php");
        }
        else{
            $_SESSION['loginHere'] = 1;
		    header("Location:adminLogin.php?Fail=1");
        }
	}
	else
	{
		$_SESSION['loginHere'] = 1;
		header("Location:adminLogin.php?Fail=1");
	}
}
else{
	header("Location:login.php");
}
?>