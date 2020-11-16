<?php
if(isset($_POST['submit']))
{
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
$name =$_POST['name'];
$mobile_no =$_POST['mobile_no'];
$address =$_POST['address'];
$email =$_POST['email'];
$pass =$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "website";
$check = false;
$path = "";
$con= $db_handle->connectDB();
if(!$con)
{
	die('Could not connect:'.mysql_error());
} 

$sql1 = "SELECT * FROM users where EmaiL='$email'";
$sql2 = "SELECT * FROM users where Mobile_Number='$mobile_no'";
$result = $con -> query($sql1);
$row = $result -> fetch_assoc();
$resultMobile = $con -> query($sql2);
$rowMobile = $resultMobile -> fetch_assoc();
echo mysqli_error($con);
if($row == false&&$rowMobile == false)
{
    $pass = password_hash($pass,PASSWORD_DEFAULT);
	$_SESSION['regisSuccess'] = 1;
	$sql = "INSERT INTO users (Name,Address,Mobile_Number,Email,Password) VALUES ('$name','$address','$mobile_no','$email','$pass')";
	$a = mysqli_query($con,$sql);
	$Subject='Account Created';
$MSG='Hi! '.$name."\n\n".'Your Account has been created successfully'."\n".'Go to Menu section and Start Ordering'. "\n\n\n\n".'Warm Regards'."\n".'CakeNBake Technical team';
if(mail($email,$Subject,$MSG)){
	
}
else{
	echo "error";
}
	header("Location:registration.php?Success=Account created");

}
else if($rowMobile!=false)
{
	$_SESSION['regisFail'] = 1;
	header("Location:registration.php?FailureMobile=Error");
}
else if($row == true)
{
	$_SESSION['regisFail'] = 1;
	header("Location:registration.php?FailureEmail=Error");
}
$con->close();
}
else
{
	
	header("Location:registration.php");
}
?>
