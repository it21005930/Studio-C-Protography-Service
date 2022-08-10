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
     <form action="login_submit.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" required><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>