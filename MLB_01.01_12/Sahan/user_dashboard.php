
<?php
session_start();
include('config.php');

?>

<?php
	
	switch($_SESSION["usertype"]) {
		case "admin" : 	include 'headers/admin_header.php';
						break;
		case "editor":  include 'headers/editor_header.php';
						break;
		case "user"  : 	include 'headers/user_header.php';
						break;
		default 	 : 	include '..Dinushka/headers/header.php';
						break;
	}
?>
<!-- End of header -->
<link rel="stylesheet" href="Styles/style_IT21005930.css">
<br><br><br><br>
<center>
<div class="container2">
<?php

	
//$_SESSION['userID'] ='101';	
if (isset ($_SESSION['userID'])){
	$mid=$_SESSION['userID'];
	
	$sql="select MID,fname,lname,email,contact,dob,acctype,pass from member where MID='$mid'";  
$result=$conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>
<th>Date Of Birth</th>
<th>Account type</th>

</tr>";
	
while($row= $result->fetch_assoc())

{
$mid=$row['MID'];

echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["dob"]."</td><td>".$row["acctype"]."</td><td><a id='memberelement'></a><form method='POST' action='#memberlement'><input type='text' name='MID' value='".$mid."' style='display: none'/><button type='Submit' name='dlt' >Delete</button></td></tr>";
	
}




echo " </table>";


}
//delete

if (isset ($_POST['dlt'])){
$mid=$_POST['MID'];


$sql="delete from member where MID='$mid'";



if ($conn->query($sql) === TRUE) {
echo"<h3>Deleted successfull</h3>";

} else {
echo "<h3>Error:<br>" . $conn->error."</h3>";
}
}
}
$conn->close();


?>
</div>
</center>


















<!-- Start of footer -->
<br><br><br><br><br><br><br><br>
<?php include '../Dinushka/headers/footer.php'; ?>
