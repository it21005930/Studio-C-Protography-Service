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
<div class="stylish" style='width: 80%'>
	<h2>Orders List</h2>
	<hr style="border-color: black;" width="92%">
	
<?php
	include 'config.php';

	$sql = "select m.fname, m.lname, e.ename, p.pname, e.Location, e.date, e.eventid
			from nevent e, member m, package p
			where e.MID=m.MID and p.pkgid=e.pkg
			order by e.eventid desc";
			
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			echo " <center><div class='container' style='width: 65%; margin: 20px;'> <div style='padding:10px 30px'> Name : " . $row["fname"] . " " . $row["lname"] . "<br>";
			echo "Event : " . $row["ename"] . "<br>";
			echo "Location : " . $row["Location"] . "</div>";
			echo "<div style='padding:15px 30px; border-left:1px solid black; border-right:1px solid black;'>Package : " . $row["pname"] . "<br>";
			echo "Date : " . $row["date"] . "</div>";
			echo "<div style='padding:15px 30px;'><a href='view_order.php?id=". $row["eventid"] ."'><input class='btn' type='button' name='moreinfo' value='More Info'></a></div>";
			echo "</div></center>";
		}
	}
	
	$conn->close();
?>
	
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>