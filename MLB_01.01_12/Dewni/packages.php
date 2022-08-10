<?php
	session_start();
?>
<?php
include ('./config.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>Studio C</title>
	<link rel="stylesheet" href="Styles/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Dinushka/Styles/style.css">
	<style>

	</style>
</head>

<body>

<?php
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

<div class="card-container">
    <ul class="cards">

        <?php
        $query = "SELECT * FROM package";
        $result = $conn->query($query);

        while($row = $result->fetch_array()){
            ?>

            <li>
                <a href="../Sahan/customer_order.php?pkgid=<?php echo $row['pkgid']; ?>" class="card">
                    <img src="./Images/pac/<?php echo $row['img_path']?>" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>
                            <i class="fa fa-heart text-red fa-3x" aria-hidden="true"></i>
                            <div class="card__header-text">
                                <h3 class="card__title"><?php echo $row['pname']?> Package</h3>
                                <span class="card__tagline">Price: <?php echo $row['price']?></span>

                                <div class="card__status">
                                    <?php
                                    $rate = $row['ratings'];
                                    $nonrated_stars = 5-$rate;
                                    for ($x = 0; $x <= $rate; $x++) {
                                        if($x>0){
                                            ?>
                                        <span class="fa fa-star checked"></span>
                                        <?php
                                    }}
                                    for ($x = 0; $x <= $nonrated_stars; $x++) {
                                        if($x>0){
                                            ?>
                                            <span class="fa fa-star"></span>
                                            <?php
                                        }}
                                    ?>

                                </div>
                            </div>
                        </div>
                        <small class="card__description"><?php echo $row['det']?></small>
                    </div>
                </a>
            </li>

            <?php
        }
        ?>


    </ul>
</div>



<!-- Start of footer -->
<br><br>
<?php include 'headers/footer.php'; ?>

</body>
</html>