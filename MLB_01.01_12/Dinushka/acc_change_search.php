<?php
	session_start();
	
	switch($_SESSION["usertype"]) {
		case "admin" : 	include 'headers/admin_header.php';
						break;
		case "editor":  include 'headers/editor_header.php';
						break;
		case "user"  : 	include 'headers/user_header.php';
						break;
		default 	 : 	include 'headers/header.php';
						break;
	}
?>

<!-- End of header -->


<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	
	
	<?php
		include 'config.php';
		$search = $_GET["usersearch"];
		
		if(isset($_POST["change_user"]) && isset($_GET["id"])){
			if($_POST["usertype"]=='none'){
				header("location:admin_dash.php");
				exit();
			}
			else{
				$newtype = $_POST["usertype"];
				$id = $_GET["id"];
				$sql2 = "update member
					set acctype='$newtype'
					where MID=$id";
					
				if($conn->query($sql2)) {
					header("location:admin_searchresults.php?usersearch=".$search);
					exit();
					}
				else{
				echo $conn->connect_error;
				}
			}
		$conn->close();
		}
	?>
	
	
	<br>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>