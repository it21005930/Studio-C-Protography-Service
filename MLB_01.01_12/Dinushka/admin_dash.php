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
	<h2>Confirmed Events</h2>
	<hr style="border-color: black;" width="92%">
	<?php
		include 'config.php';
		$sql = "select e.eventid, e.ename, e.date, e.Location, m.fname, m.lname
				from nevent e, member m
				where e.MID=m.MID and e.confirmed='yes'
				order by e.eventid desc";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while ($count <= 5){
			$row = $result->fetch_assoc();
			
			echo "<center><div class='container' style='width: 60%; margin: 5px; padding: 10px;'>" . $row["eventid"] . " - " . $row["fname"] . " " . $row["lname"] .
			" - " . $row["ename"] . " - " . $row["Location"] . " - " . $row["date"] . "</div></center>";
			 
			$count++;
		}
		
		$conn->close();
	?>
	<br>
</div>
</center>

<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	<h2>Recent Payments</h2>
	<hr style="border-color: black;" width="92%">
	<center>
	<table class="table1">
	<tr><th>Name</th><th>Method</th><th>Amount</th><th>Date</th><th>Confirmed</th><th>Change Confirmation</th></tr>
	<?php
		include 'config.php';
		$sql = "select p.visaname, p.pmethod, p.pdate, e.confirmed, l.price, e.eventid, p.payid
				from payment p, member m, nevent e, package l
				where e.MID=m.MID and p.eventid=e.eventid and l.pkgid=e.pkg
				order by p.payid desc";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while ($count <= 5){
			$row = $result->fetch_assoc();
			
			echo "	<tr>
					<td>" . $row["visaname"] . "</td>
					<td>" . $row["pmethod"] . "</td>
					<td>" . $row["price"] . "</td>
					<td>" . $row["pdate"] . "</td>
					<td>" . $row["confirmed"] . "</td>
					<td><a href='admin_dash_changePaystat.php?eventid=".$row["eventid"]."&payid=".$row["payid"].
					"&name=".$row["visaname"]."&price=".$row["price"]."&date=".$row["pdate"]."&con=".$row["confirmed"]."'>
					<input type='submit' class='btn' name='change' value='Change'></a></td>
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

<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	<h2>Users</h2>
	<hr style="border-color: black;" width="92%">
	<center><form method="get" action="admin_searchresults.php">
		<table border="0px">
		<tr>
		<td><input class="search" type="text" name="usersearch" placeholder="Search Users"></td>
		<td><input class="btn" type="submit" name="dosearch" value="Search"><td>
		</tr>
		</table>
	</form></center>
	<center>
	<table class="table1">
	<tr><th>User ID</th><th>Username</th><th>Email</th><th>Privilege</th><th></th>
	<?php
		include 'config.php';
		$sql = "select MID, username, email, acctype
				from member";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while ($count <= 5){
			$row = $result->fetch_assoc();
			
			echo "	<tr>
					<td>" . $row["MID"] . "</td>
					<td>" . $row["username"] . "</td>
					<td>" . $row["email"] . "</td>
					<td>" . $row["acctype"] . "</td>
					<td><form method='post' action='acc_change.php?id=".$row['MID']."'>
					<select name='usertype' style='padding:5px; border-radius:10px;'>
						<option value='none'>--Change--</option>
						<option value='user'>User</option>
						<option value='editor'>Editor</option>
						<option value='admin'>Administrator</option>
					</select>
					<input type='submit' class='btn' name='change_user' value='Change'></form></td>
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

<center>
<div class="stylish" style="align: center; padding-bottom:15px; width: 60%;">
	<h2>Recent Feedback</h2>
	<hr style="border-color: black;" width="92%">
	<?php
		include 'config.php';
		$sql = "select a.aname, f.name, f.email, f.comment
				from feedback f, album a
				where f.albid=a.albid";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while ($count <= 5){
			$row = $result->fetch_assoc();
			
			echo "<center><div class='stylish' style='width: 60%; margin: 5px; padding: 10px; border:none;'>" . $row["name"] . " Commented on " . $row["aname"] . ",<br>  
				<hr style='border-color: black;' width='92%'>" . $row["comment"] .
				"<br><br>" . $row["email"] . "</div></center>";
			 
			$count++;
		}
		
		$conn->close();
	?>
	<br>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>