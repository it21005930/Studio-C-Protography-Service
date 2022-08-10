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
	<h2>Change Payment Confirmation</h2>
	<hr style="border-color: black;" width="92%">
	
		<?php
			include 'config.php';

			$eid = $_GET['field1'];
			$confirm = $_GET['field5'];

			if (isset($_GET['submit'])) {
				$sql = "update nevent
						set confirmed='$confirm'
						where eventid=$eid";
		
				if($conn->query($sql)) {
					echo "Record Updated  ";
				}
				else {

					echo "Update failed : " . mysqli_error($conn);

				}
			}

		?>
	<a href="admin_dash.php"><input type="button" class="btn" value="Return to Dashboard"></a>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>