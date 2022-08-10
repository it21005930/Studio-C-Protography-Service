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
	include 'config.php';
	$albid = $_GET['id'];
		
		$sql = "select * 
				from album
				where albid=$albid";
				
		$result = $conn->query($sql);
		$data = $result->fetch_assoc();
		$pnum = $data['pnum'];
?>

<!-- End of header -->

<center>
<div class="stylish" style="width: 85%">
	<p><?php echo $data['aname']; ?></p>
	<hr width="92%" style="border-color:black">
	<center>
	<table class="table2" style="border: 0px;">
	<?php
		
		$count = 1;
			while($count <= $pnum){
			
				echo 	"<tr><td><center><img src='album/".$albid."/".$count.".jpg' width='400px'></center></td>";
				if($count>=$pnum){
					break;
				}
				$count++;
				echo	"<td><center><img src='album/".$albid."/".$count.".jpg' width='400px'></center></td>";
				if($count>=$pnum){
					break;
				}
				$count++;
				echo	"<td><center><img src='album/".$albid."/".$count.".jpg' width='400px'></center></td></tr>";
			
				$count++;
			}
			echo "</table>";
		
	?>
	</center>
</div>
</center>
<br>
<!-- Start of footer -->
<?php include 'headers/footer.php'; ?>