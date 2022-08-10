
<!DOCTYPE html>
<html>
<head>
	<title>Studio C</title>
	<link rel="stylesheet" href="Styles/style.css">
	<style>

	</style>
</head>

<body>
<div class="container">
	<div>
	<img class="logo" src="Images/Logo.png" width="200px">
	</div>
	
	<div class="text1">
	<h1>STUDIO C<br>PHOTOGRAPHY<h1>
	</div>
	
	<div class="user">
	<div><?php echo "Hello! Admin ". $_SESSION["username"]; ?></div>
	<img src="Images/user.jpg" width="150px" style="border-radius: 25px">
	<div class="container1">
		<div style="padding-right: 10px">
			<a href="../Maleesha/logout.php"><input class="btn" type="button" name="login" value="Log Out"></a>
		</div>
		<div style="padding-left: 10px">
			<a href="admin_dash.php"><input class="btn" type="button" name="signin" value="Dashboard"></a>
		</div>
	</div>
	</div>
</div>
<br>
<div class="container1">
	<div>
		<ul class="menu">
			<li class="menu"><a href="home.php">Home</a></li>
			<li class="menu"><a href="../Oshini/index.html">Gallery</a></li>
			<li class="menu"><a href="../Dewni/packages.php">Services</a></li>
			<li class="menu"><a href="../Oshini/about.html">About Us</a></li>
			<li class="menu"><a href="Orders_list.php">Orders</a></li>
			<li class="menu"><a href="editor_dash.php">Uploads</a></li>
		</ul>
	</div>
	
	<div>
	<form method="get" action="searchresults.php">
		<table border="0px">
		<tr>
		<td><input class="search" type="text" name="search" placeholder="Search Album"></td>
		<td><input class="btn" type="submit" name="dosearch" value="Search"><td>
		</tr>
		</table>
	</form>
	</div>
</div>
<br>
<!-- End of header -->
