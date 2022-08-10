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

<a href="add_album.php" style="margin-left: 20%"><input type="button" class="btn" value="Add New Album"></a>

<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	<h2>Albums</h2>
	<hr style="border-color: black;" width="92%">
	<center>
	<table width="80%" class="table2">
	<tr>
		<th>Album ID</th>
		<th>Album Name</th>
		<th>Photos</th>
		<th>Event Date</th>
		<th></th>
	</tr>
	<?php
		include 'config.php';
		$sql = "select a.albid, a.aname, a.pnum, e.date, a.eventid
				from album a, nevent e
				where a.eventid=e.eventid
				order by a.albid desc";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while ($count <= 5){
			$row = $result->fetch_assoc();
			
			echo "<tr>
				<td>". $row["albid"] ."</td>
				<td>". $row["aname"] ."</td>
				<td>". $row["pnum"] ."</td>
				<td>". $row["date"] ."</td>
				<td><a href='edit_album.php?id=". $row["albid"] ."&name=". $row["aname"] ."&pnum=". $row["pnum"] ."&eid=". $row["eventid"] ."'>
				<input type='button' class='btn' value='Edit'></a></td>
				<td><a href='delete_album.php?id=". $row["albid"] ."&name=". $row["aname"] ."'>
				<input type='button' class='btn' value='Delete'></a></td>
				</tr>";
			 
			$count++;
		}
		
		$conn->close();
	?>
	
	</table>
	</center>
	<br>
</div>
</center>


<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>