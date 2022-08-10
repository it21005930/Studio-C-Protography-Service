<?php
	session_start();
	$_SESSION["usertype"] = "visitor";
	switch($_SESSION["usertype"]) {
		case "admin" : 	include 'Dinushka/headers/admin_header.php';
						break;
		case "editor":  include 'Dinushka/headers/editor_header.php';
						break;
		case "user"  : 	include 'Dinushka/headers/user_header.php';
						break;
		default 	 : 	include 'Dinushka/headers/index_header.php';

	}
?>

<!-- End of header -->


<div class="stylish">

	<p>Studio C Protography Service</p>
	<hr width="92%" style="border-color:black">
	<div class="container1">
		<div class="about"><img src="Dinushka/Images/rely.png" alt="Reliable" width="450px"></div>
		<div class="about"><img src="Dinushka/Images/qual.png" alt="High Quality" width="450px"></div>
		<div class="about"><img src="Dinushka/Images/fair.png" alt="Fair Prices" width="450px"></div>
	</div>

	<a href="Oshini/about.html"><input type="button" class="btn" value="Learn more"></a><br>
</div>

<br>

<div class="stylish">
	<p>Explore</p>
	<hr width="92%" style="border-color:black">
	<div class="container1">
	<?php
		include 'Dinushka/config.php';
		
		$sql = "select * 
				from album
				order by albid desc";
				
		$result = $conn->query($sql);
		
		$count = 1;
		
		while($count < 4){
			$data = $result->fetch_assoc();
			
			echo 	"<div style='padding: 10px'>
					<img src='Dinushka/album/".$data['albid']."/1.jpg' alt='image' height='300px'>
					<br>
					".$data['aname']."
					<br>
					<a href='view_album.php?id=".$data['albid']."'><input type='button' class='btn' value='View'></a>
					</div>
					";
			
			$count++;
		}
	?>
	<a href="Oshini/index.html"><input type="button" class="btn" value="More"></a><br>
	</div>
	
</div>

<br>

<div class="stylish">
	<p>Packages</p>
	<hr width="92%" style="border-color:black">
	<?php
		echo "Take a look at our fair priced packages. Find the right package for you.<br><br>"
	?>
	<a href="Dewni/packages.php"><input type="button" class="btn" value="View Packages"></a>
</div>

<!-- Start of footer -->
<?php include 'Dinushka/headers/index_footer.php'; ?>