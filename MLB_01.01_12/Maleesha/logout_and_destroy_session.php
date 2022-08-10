<?php
	session_start();
	
	if(isset($_POST["logout"])) {
		session_destroy(); 
	}
?>
	

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
	<form>
     <p style="text-align:center; color: white;">Logged out!  </p>
	<a href="../index.php" class="ca" style="float:none">Back to Home Page</a><br>
	</form>
	<br>
</body>
</html>