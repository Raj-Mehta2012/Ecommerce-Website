<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
?>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>

  <style type="text/css">
  * {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <?php include 'mainlayout.php';?>
<form action="action_page.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1 style="font-family: 'Pacifico'; color: maroon" align="center">Sign Up</h1>
    <p style="font-size: 20px; color: maroon" align="center">Register to our page to subscribe to our Newsletters, get updates of our offers, and get a chance to win vouchers very week!</p>
    <br>
    <?php
      if(isset($_GET['Success'])&&isset($_SESSION['regisSuccess']))
      {
    ?>
        <p style="font-size: 20px; color: maroon" align="center">Account created. Please <a href = "login.php">login</a> to continue.</p>
    <?php
      }

    else if(isset($_GET['FailureEmail'])&&isset($_SESSION['regisFail']))
      {
          unset($_SESSION['regisFail']);
    ?>
        <p style="font-size: 15px; color: red" >Email-id  exists</p>
    <?php
      }

    else if(isset($_GET['FailureMobile'])&&isset($_SESSION['regisFail']))
      {
          unset($_SESSION['regisFail']);
    ?>
        <p style="font-size: 15px; color: red" >Mobile number exists</p>
    <?php
      }
    ?>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" pattern="^[A-Za-z ]*$" title="Enter Alphabets" required>
    <label for="mobile_no"><b>Mobile No.</b></label>
    <input type="text" placeholder="Enter Mobile No." name="mobile_no" pattern="^[0-9]{10}$" title="Enter 10 digit number only" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" pattern="^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$" title="Enter valid email" required>    
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>
    <label for="password"><b>Password</b></label>
    <input type="password" id="myInput" placeholder="Enter Password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character(@$!%*?)" required><input type="checkbox" onclick="myFunction()">Show Password</br>
     <div class="clearfix">
      <a href="index.php"> <button type="button" class="cancelbtn">Cancel</button> </a>
      <button type="submit" class="signupbtn" name="submit" value="Sign-Up">Sign Up</button>
      <br>
      <br>
      <p>Existing User ?<a href="login.php">Login Here</a></p>
    </div>
  </div>
</form>
<br>
<footer style="text-align: center;">
 <small>&copy;  2020, CakeNBake. All Rights Reserved</small>
</footer>
<br><script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>