<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    
<style>
  body{
    background-image: url("Reg.jpg");
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
     <form action="signup_submit.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <label>First Name</label>
     	<input type="text" name="fname" placeholder="First Name" ><br>
		
		<label>Last Name</label>
     	<input type="text" name="lname" placeholder="Last Name" ><br>
    
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username" required><br>
		
		<label>Email</label>
     	<input type="email" name="email" placeholder="Email" required><br>
		
		<label>Contact number</label>
     	<input type="text" name="contact" placeholder="Contact Number" required><br>
		
		<label>Date of Birth</label>
     	<input type="date" name="dob"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" required><br>

        <label>Re-type Password</label>
     	<input type="password" name="repassword" placeholder="Re-Password" required><br>

     	<button type="submit">Sign Up</button>
          <a href="login.php" class="ca">Already have an account</a>
     </form>
</body>
</html>