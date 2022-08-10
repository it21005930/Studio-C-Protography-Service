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
	<h2>Delete Album</h2>
	<hr style="border-color: black;" width="92%">
	<form method="post" action="delete_album_submit.php">
	<center>
	<table width="80%" class="table2" style="width: 60%">
	<tr>
		<td>Album ID</td>
		<td> <input type="text" class="textinput" name="id" value='<?php echo $_GET["id"]; ?>' readonly></td>
	</tr>
	<tr>
		<td>Album Name</td>
		<td> <input type="text" class="textinput" name="name" value='<?php echo $_GET["name"]; ?>' readonly></td>
	</tr>
	<tr>
		<td></td>
		<td>Are you sure you want to delete this album?</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input class="btn" type="submit" name="submit" value="DELETE">
		</td>
	</tr>
	
	
	
	</table>
	</center>
	</form>
	<br>
</div>
</center>


<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>