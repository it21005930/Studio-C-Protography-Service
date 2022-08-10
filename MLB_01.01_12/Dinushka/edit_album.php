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
	<form action="change_album.php" method="post">
	<center>
	<table>
		<?php
			echo "<tr><td>Album ID</td><td><input class='textinput' type='text' name='field1' value='". $_GET['id'] ."' readonly></td></tr>";
			echo "<tr><td>New Album ID</td><td><input class='textinput' type='text' name='field12' value='". $_GET['id'] ."'></td></tr>";
			echo "<tr><td>Album Name</td><td><input class='textinput' type='text' name='field2' value='". $_GET['name'] ."'></td></tr>";
			echo "<tr><td>Number of Photos</td><td><input class='textinput' type='text' name='field3' value='". $_GET['pnum'] ."'></td></tr>";
			echo "<tr><td>Event ID</td><td><input class='textinput' type='text' name='field4' value='". $_GET['eid'] ."'></td></tr>";
			echo "<tr><td></td><td><input class='btn' type='submit' name='submit' value='Change'></td></tr>";
		?>
	</table>
	</center>
	</form>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>