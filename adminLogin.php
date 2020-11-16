<?php
session_start();
if(isset($_SESSION['admin_userid']))
{
  header("Location:admin.php");
}
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
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
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


<body style="background-color: #e0eeff; font-family: Verdana, Geneva, sans-serif; color: black">
 <center>
<form action="admin_action_login.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1 style="font-family: 'Pacifico'; color: maroon" align="center">Login Here</h1>
    <p style="font-size: 20px; color: maroon" align="center">ADMIN BLOCK</p>
    <hr>
    <?php
      
      if(isset($_GET['Fail'])&&isset($_SESSION['loginHere']))
      {
       unset($_SESSION['loginHere']);
    ?>

    <p style="font-size: 15px; color: red" align="center">Invalid credentials</p>
    <?php
  }
    ?>
    
    <label for="email"><b>Email</b></label><br>
    <input type="text" style="width:250px" placeholder="Enter Email" name="email" pattern="^[a-z0-9._-}+@[a-z]+.[a-z.]{2,5}$" title="Enter valid email" required><br>
    <label for="password"><b>Password</b></label><br>
    
    <input type="password" style="width:250px" placeholder="Enter Password" name="password" id="myInput" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character(@$!%*?&)" required>
    <br>
    <br><input type="checkbox" onclick="myFunction()">Show Password
      <div class = "center">
        <a href="index.php"> <button style="width:250px"type="button" class="cancelbtn">Cancel</button> </a>
        <button type="submit"style="width:250px" class="signupbtn" name="submit" value="Sign-Up">Sign In</button>
      </div>
      <br>
      <br>
  </div>
</form>
  </center>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer style="text-align: center;">
 <s2mall>&copy;  2020, CakeNBake. All Rights Reserved</small>
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