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
	<h2>Add New Album</h2>
	<hr style="border-color: black;" width="92%">
	<form method="post" action="add_album_submit.php">
	<center>
	<table width="80%" class="table2" style="width: 60%">
	<tr>
		<td>Album ID</td>
		<td>
			<?php
			include 'config.php';
			$sql = "select max(albid)
					from album";
				
			$result = $conn->query($sql);
			$data = $result->fetch_assoc();
			
			echo "<input class='textinput' type='text' name='albid' value='". ($data["max(albid)"]+1) ."'>";
		
			$conn->close();
			?>
		</td>
	</tr>
	<tr>
		<td>Album Name</td>
		<td>
			<input class="textinput" type="text" name="albname">
		</td>
	</tr>
	<tr>
		<td>Number of Photos</td>
		<td>
			<input class="textinput" type="number" name="pnum">
		</td>
	</tr>
	<tr>
		<td>Event ID</td>
		<td>
			<input class="textinput" type="number" name="eid">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input class="btn" type="submit" name="submit" value="Add Album">
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