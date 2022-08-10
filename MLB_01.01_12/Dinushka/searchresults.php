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
<div class="stylish" style="width: 65%">
	<p>Search results for <?php echo $_GET['search']; ?></p>
	<hr width="92%" style="border-color:black">
	<center>
	<table class="table3 table2" style="border: 0px;">
	<?php
		include 'config.php';
		
		$search = $_GET['search'];
		
		$sql = "select * 
				from album
				where aname like '%$search%'
				order by albid desc";
				
		$result = $conn->query($sql);
		
		$count = 1;
		if($result->num_rows > 0){
			while($data = $result->fetch_assoc()){
			
				echo 	"<tr><td><center><img src='album/".$data['albid']."/1.jpg' alt='image' height='200px'></center></td>
						<td width='40%'>  ".$data['aname']."  </td>
						<td width='10%'><a href='view_album.php?id=".$data['albid']."'><input type='button' class='btn' value='View'></a></td></tr>";
			
				$count++;
			}
			echo "</table>";
		}
		else{
			echo "No results for ". $search;
		}
	?>
	</center>
</div>
</center>
<br>
<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>