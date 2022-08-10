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
<?php 
session_start(); 
include "../Dinushka/config.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['fname']) && isset($_POST['repassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['repassword']);
	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);
	$email = $_POST['email'];
	$contact = validate($_POST['contact']);
	$dob = $_POST['dob'];

	
	

	$user_data = 'username='. $uname. '&name='. $fname;


	if (empty($uname)) {
		header("Location: signup.php?error=Username is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($fname)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

	    $sql = "SELECT * FROM member WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
			$getid = "select max(MID) from member";
			$id = mysqli_query($conn, $getid);
			$data = mysqli_fetch_assoc($id);
			$newid = ($data["max(MID)"] + 1);
           $sql2 = "INSERT INTO member 
					VALUES($newid,'$fname','$lname','$uname','$email','$contact','$dob','user','$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: login.php?error=Your account has been created successfully. Log in with your new account");
	         exit();
			 echo $sql2 ."<br>". mysqli_error($conn);
           }else {
	           	/*header("Location: signup.php?error=Unknown Error");*/
				echo $sql2 ."<br>". mysqli_error($conn);
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
?>
</body>
</html>