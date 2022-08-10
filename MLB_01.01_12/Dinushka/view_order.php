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
	<h2>Order <?php echo $_GET["id"];?></h2>
	<hr style="border-color: black;" width="92%">
	
<center>
<table class="table3" style="width: 30%">
<?php
	include 'config.php';
	
	$eventid = $_GET["id"];

	$sql = "select *
			from nevent e, member m, package p
			where e.MID=m.MID and p.pkgid=e.pkg
			and e.eventid=$eventid";
			
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();
	
	$conn->close();
?>
	<tr>
		<td>Event :</td>
		<td><?php echo $data["ename"] ;?></td>
	</tr>
	<tr>
		<td>Package :</td>
		<td><?php echo $data["pname"] ;?></td>
	</tr>
	<tr>
		<td>Price :</td>
		<td><?php echo $data["price"] ;?></td>
	</tr>
	<tr>
		<td>Location :</td>
		<td><?php echo $data["Location"] ;?></td>
	</tr>
	<tr>
		<td>Date :</td>
		<td><?php echo $data["date"] ;?></td>
	</tr>
	<tr>
		<td>User :</td>
		<td><?php echo $data["fname"]." ".$data["lname"] ;?></td>
	</tr>
	<tr>
		<td>Contact number :</td>
		<td><?php echo $data["contact"] ;?></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><?php echo $data["email"] ;?></td>
	</tr>
	<tr>
		<td>Payment :</td>
		<td><?php echo $data["paystat"] ;?></td>
	</tr>
	<tr>
		<td>Event Confirmed :</td>
		<td><?php echo $data["confirmed"] ;?></td>
	</tr>
</table>
<td><a href="Orders_list.php"><input type="button" class="btn" value="Go Back"></a></td>
</center>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>