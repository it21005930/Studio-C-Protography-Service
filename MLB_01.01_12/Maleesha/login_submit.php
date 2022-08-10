<?php 
session_start(); 
include "../Dinushka/config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{

        
		$sql = "SELECT * FROM member WHERE username='$uname'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['pass'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['usertype'] = $row['acctype'];
				$_SESSION['userID'] = $row['MID'];
            	header("Location: ../Dinushka/home.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect password for ".$uname);
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}
?>