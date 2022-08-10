<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" type="text/css" href="login.css">
<style>
  body{
    background-image: url("Back.jpg");
    background-size: cover;
    }
  form {
    background-color: #000000;
    width: 500px;
    border: 2px solid #ccc;
    padding: 30px;
    border-radius: 15px;
  }
  h2 {
     color: #f7f7f7;
  }
</style>    
</head>
<body>
     <center>
	<form action="logout_and_destroy_session.php" method="post">
	<p style="color: white">Are you sure you want to log out of your account,<br>
		<h3 style="color: white"><?php echo $_SESSION["username"]; ?> ?</h3>
	</p>
	<hr width="92%" style="border-color:white">
		<button style="float:none" type="submit">Log Out</button><br>
	</form>
	
</body>
</html>