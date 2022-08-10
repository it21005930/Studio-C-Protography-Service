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
	<h2>Change Payment Confirmation</h2>
	<hr style="border-color: black;" width="92%">
	<form action="changeConfirmation.php" method="get">
	<center>
	<table>
		<?php
			echo "<tr><td>EventID</td><td><input class='textinput' type='text' name='field1' value='". $_GET['eventid'] ."' readonly></td></tr>";
			echo "<tr><td>Name</td><td><input class='textinput' type='text' name='field2' value='". $_GET['name'] ."'readonly></td></tr>";
			echo "<tr><td>Payment</td><td><input class='textinput' type='text' name='field3' value='". $_GET['price'] ."'readonly></td></tr>";
			echo "<tr><td>Date</td><td><input class='textinput' type='text' name='field4' value='". $_GET['date'] ."'readonly></td></tr>";
			echo "<tr><td>Change Confirmation to,</td><td></td></tr>";
			echo "<tr><td>Confirmation</td><td><input class='textinput' type='text' name='field5' value='". $_GET['con'] ."'></td></tr>";
			echo "<tr><td></td><td><input class='btn' type='submit' name='submit' value='Change'></td></tr>";
		?>
	</table>
	</center>
	</form>
</div>
</center>

<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>