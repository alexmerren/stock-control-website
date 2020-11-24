<?php
session_start();

if ( isset($_SESSION['result'] )) {
	$results = $_SESSION['result'] ;
	session_unset();
	session_destroy();
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Stock Page</title>
		<link rel="stylesheet" type="text/css" href="main-style.css">
		<link rel="stylesheet" type="text/css" href="responsive-style.css">
		<link rel="icon" href="img/favicon.ico" type"image/x-icon" />
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<script src="js/javaScript.js"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no"/>

	</head>
	<body>	
		<!-- This is the navigation bar at the top of the screen -->
		<div class="topnav">
			<li class="HomePage"><a class="active" href="logout.php">Home</a></li>
			<li class="LoginPage"><a href="logout.php">Logout</a></li>
			<li class="facebook"><a href="https://www.facebook.com"><img src="img/facebook.png" class="facebook-picture"></a></li>
			<li class="twitter"><a href="https://www.twitter.com"><img src="img/twitter.png" class="twitter-picture"></a></li>
		</div>

		<!-- This is the logo -->
		<a class="logo" href="logout.php"><img src="img/logo.png"></a>
		
		<a name="stock-nav"></a>
		<div class="stock-navigation">
			<li class="add-form-nav"><a href="#add-form">Add</a></li>
			<li class="remove-form-nav"><a href="#remove-form">Remove</a></li>
			<li class="retrieve-form-nav"><a href="#retrieve-form">Retrieve</a></li>
		</div>

		<!-- This is where the stock forms are-->

		<div class="result-holder"><?php echo $results ?></div>

		<a name="add-form"></a>
		<div class="add-form-content">
			<form class="add-form" name="addForm" action="utils/addItem.php" method="post" onSubmit="return validateFormAdd()">
				<p class="form-text">Enter the product you wish to add: </p>
				<input type="text" name="product-name" value="">
				<br>
				<p class="form-text">Enter the amount that you wish to add: </p>
				<input type="number" name="product-amount" value="0">
				<br>
				<br>
				<input type="submit" value="Add Stock"> 
			</form>
		</div>		

		<a name="remove-form"></a>
		<div class="remove-form-content">
			<form class="remove-form" name="removeForm" action="utils/removeItem.php" method="post" onSubmit="return validateFormRemove()">
				<p class="form-text">Enter the product you wish to remove: </p>
				<input type="text" name="product-name" value="">
				<br>
				<p class="form-text">Enter the amount that you wish to remove: </p>
				<input type="number" name="product-amount" value="0">
				<br>
				<br>
				<input type="submit" value="Remove Stock"> 

			</form>	
		</div>

		<a name="retrieve-form"></a>
		<div class="retrieve-form-content">
			<form class="retrieve-form" name="viewForm" action="utils/viewItem.php" method="post" onSubmit="return validateFormView()">
				<p class="form-text">Enter the product you wish to view: </p>
				<input type="text" name="product-name" value="">
				<br>
				<br>
				<input type="submit" value="View Stock"> 

			</form>
		</div>

		<div class="retrieve-all-form-content">
			<form class="retrieve-all-form" name="viewAllForm" action="utils/viewAllItems.php" method="post" onSubmit="return loadXMLDoc()">
				<input onclick="loadXMLDoc()" type="submit" value="Click to view all Stock XML"> 
				<br>
				<table id="demo"></table>
			</form>
		</div>

	</body>
</html>