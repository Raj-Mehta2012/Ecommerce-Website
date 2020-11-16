<?php
session_start();
require_once("dbcon.php");
if(isset($_REQUEST['Email'])){
$db_handle = new DBController();
$name =$_POST['Name'];
$message =$_POST['Message'];
$phone =$_POST['Phone'];
$email =$_POST['Email'];
$servername = "localhost:3307";
$con= $db_handle->connectDB();
if(!$con)
{
	die('Could not connect:'.mysql_error());
} 
$sql = "INSERT INTO feedback (name, email, subject, message)
 VALUES ('$name', '$email', '$phone', '$message')";
$con->query($sql);
$to='cakenbake.website@gmail.com';
$subject='Feedback';
$msg='Name: '.$name."\n"."Phone: ".$phone."\n"."Wrote the following"."\n\n".$message;
$headers="From: ".$email;

$Subject='Feedback Received';
$MSG=$name.'Thank you for your Feedback!'."\n\n".'Thank you for taking the time to write to us! We will definetely take into account any suggestions/enquires you may have put forward'. "\n\n\n\n".'Warm Regards'."\n".'CakeNBake Technical team';
if(mail($to,$subject,$msg,$headers)&& mail($email,$Subject,$MSG)){
	
}
else{
	echo "error";
}
}
?>

<html>
<head>
<title>Feedback</title>
</head>
<body>
	<?php include 'mainlayout.php'; ?>
	<h1 align="center"><?php echo $name;?> Thank you for your Feedback!,We will contact you shortly!</h1>
	<h4 align="center">Thank you for taking the time to write to us! We will definetely take into account any suggestions/enquires you may have put forward.<br><br>
		<a href="index.php"><p style="font-family:Arial Black, Gadget, sans-serif; color: maroon">Continue to browse the site</p></a>

	</h4>
	<br>
<footer style="text-align: center;">
 <small>&copy; 2020, CakeNBake. All Rights Reserved</small>
</footer>
<br>
</body>
</html>
