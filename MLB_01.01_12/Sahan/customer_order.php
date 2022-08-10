
<?php
session_start();
include('config.php');

if($_SESSION['usertype'] == 'visitor'){
	header('location:../Maleesha/login.php?error=Please log in to select a package');
	exit();
}

if(isset($_POST['button']))
{

$getid = "select max(eventid) from nevent";				
$res = $conn->query($getid);
$dat= $res->fetch_assoc();
$eid= $dat['max(eventid)']+1;

$name=$_POST['Name'];
$location=$_POST['location'];
$date=$_POST['date'];
$id=$_SESSION['userID'];
$pkgid = $_GET['pkgid'];
$empid=100+$pkgid;
$result="INSERT INTO nevent(eventid,ename,MID,pkg,paystat,empid,location,date,confirmed) VALUES($eid,'$name',$id,$pkgid,'pending',$empid,'$location','$date','no')";
if ($conn->query($result) === TRUE) {
 echo"<h3>Request sent successfully</h3>";
	header('location:../Maleesha/payment.html');
	exit();
} else {
echo "<h3>Error: " . $result . "<br>" . $conn->error."</h3>";
}
} 
?>



<?php include 'headers/user_header.php' ?>
<!-- End of header -->

<?php 
$pkgid = $_GET['pkgid'];
$sql1 = "select * from package where pkgid=$pkgid";
$pak = $conn->query($sql1);
$data = $pak->fetch_assoc();
?>

<div class="form1" >

<form method="post" action="customer_order.php?pkgid=<?php echo $pkgid; ?>">

<p><center><b>You have selected the <?php echo $data['pname']; ?> package</b></center></p>
<br>

<input class="new1" type="text " name="Name" placeholder=" Event Name" requied><br><br>

<input class="new1" type="text" name="location" placeholder="location" requied><br><br>

<input class="new1" type="date" name="date" ><br><br>
<input class="sub1"  name="button" type="Submit" id="submitBtn" value="Submit">

</form>

</div>

<?php $conn->close(); ?>























<!-- Start of footer -->
<br><br>
<div class="container">

	<div style="border-right: 1px solid black; padding-right: 50px;">
		<ul id="footer" class="menu2">
			<li class="menu2"><a href="">Home</a></li>
			<li class="menu2"><a href="">Gallery</a></li>
			<li class="menu2"><a href="">Services</a></li>
			<li class="menu2"><a href="">About Us</a></li>
		</ul>
	</div>

	<div style="padding-left: 50px; padding-right:50px">
		<center>
		<h3>We Value Your Feedback</h3>
		<input type="button" class="btn" Value="Leave Feedback">
		</center>
	</div>

	<div style="border-left: 1px solid black; padding-left: 50px; font-family: system-ui; padding-right:50px">
		<p>
		<center>
		Contact us<br>
		077-1234567/076-1234567<br>
		StudioC@gmail.com
		</center>
		</p>
	</div>

	<div style="border-left: 1px solid black; padding-left: 50px; font-family: system-ui;" class="container1">
		<p>Visit us at</p>
		<div class="link"><a href="https://facebook.com"><img style="border-radius: 12px;border:1px solid darkblue;" src="Images/fb.png" width="50px"></a></div>
		<div class="link"><a href="https://instagram.com"><img style="border-radius: 12px;border:1px solid darkblue;" src="Images/insta.jpg" width="50px"></a></div>
		<div class="link"><a href="https://twitter.com"><img style="border-radius: 12px;border:1px solid darkblue;" src="Images/twt.jpg" width="50px"></a></div>

	</div>

</div>

</body>
</html>