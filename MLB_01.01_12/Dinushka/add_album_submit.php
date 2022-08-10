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
	<h2>Add New Albums</h2>
	<hr style="border-color: black;" width="92%">
	
	<?php
	include 'config.php';
	
	$albid = $_POST["albid"];
	$albname = $_POST["albname"];
	$pnum = $_POST["pnum"];
	$eventid = $_POST["eid"];
	
	if(isset($_POST["submit"])) {
		$sql = "insert into album
				values($albid, '$albname', $pnum, $eventid)";
		
		if($conn->query($sql)){
			echo "New Album Created  ";
			mkdir("album/".$albid."/");
		}
		else {
			echo "Could not create album " . mysqli_error($conn);
		}
	}
	?>
	<a href="editor_dash.php"><input type="button" class="btn" value="Return to Dashboard"></a>
	<br>
</div>
</center>


<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>