<?php
session_start();
    if(isset($_SESSION['CODE']))
    {
        if($_SESSION['CODE'] == $_POST['otp'])
        {
            $_SESSION['u_email'] = $_SESSION['tu_email'];
		    $_SESSION['username'] = $_SESSION['tusername'];
		    $_SESSION['userid'] = $_SESSION['tuserid'];
		    unset($_SESSION['tu_email']);
		    unset($_SESSION['tusername']);
		    unset($_SESSION['tuserid']);
		    unset($_SESSION['CODE']);
		    header("Location:index.php");
        }
        else
        {
            header("Location:action_login.php?fail=1");
        }
    }
    else
    {
        header("Location:login.php");
    }
?>
            
            