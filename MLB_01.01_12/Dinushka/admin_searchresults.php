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
<?php 
	$search = $_GET["usersearch"];
?>

<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	<h2>Search Results for <?php echo $search;?></h2>
	<hr style="border-color: black;" width="92%">
	<center><form method="get" action="admin_searchresults.php">
		<table border="0px">
		<tr>
		<td><input class="search" type="text" name="usersearch" placeholder="Search Users"></td>
		<td><input class="btn" type="submit" name="dosearch" value="Search"><td>
		</tr>
		</table>
	</form></center>
	
	<?php
		include 'config.php';
		
		$sql = "select MID, username, email, acctype
				from member
				where username like '%$search%'";
				
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			
			echo "<center><table class='table1'><tr><th>Username</th><th>Email</th><th>Privilege</th><th>Change</th>";
			
			while ($row = $result->fetch_assoc()){
			
				echo "	<tr>
						<td>" . $row["username"] . "</td>
						<td>" . $row["email"] . "</td>
						<td>" . $row["acctype"] . "</td>
						<td><form method='post' action='acc_change_search.php?id=".$row['MID']."&usersearch=".$search."'>
					<select name='usertype' style='padding:5px; border-radius:10px;'>
						<option value='none'>--Change--</option>
						<option value='user'>User</option>
						<option value='editor'>Editor</option>
						<option value='admin'>Administrator</option>
					</select>
					<input type='submit' class='btn' name='change_user' value='Change'></form></td>
					</tr>";
				
			}
			echo "</table></center>";
		}
		else {
			echo "No users with the name " . $search;
		}
		
		$conn->close();
	?>
	
	
	<br>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>