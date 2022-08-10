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
	<h2>Edit Album Details</h2>
	<hr style="border-color: black;" width="92%">
	<?php
			include 'config.php';

			$aid = $_POST['field1'];
			$new_aid = $_POST['field12'];
			$aname = $_POST['field2'];
			$pnum = $_POST['field3'];
			$eid = $_POST['field4'];

			if (isset($_POST['submit'])) {
				$sql = "update album
						set albid=$new_aid, aname='$aname', pnum=$pnum, eventid=$eid
						where albid=$aid";
		
				if($conn->query($sql)) {
					echo "Record Updated  ";
				}
				else {

					echo "Update failed : " . mysqli_error($conn);

				}
			}

		?>
	<a href="editor_dash.php"><input type="button" class="btn" value="Return to Dashboard"></a>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>