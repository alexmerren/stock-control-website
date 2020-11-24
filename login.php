<?php
session_start();
if ( isset($_SESSION['appUser'])) {
	header('Location: main.php');
} else if ( isset($_SESSION['appError'] )) {
	$error = $_SESSION['appError'] ;
	session_unset();
	session_destroy();
}
?>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="main-style.css">
		<link rel="stylesheet" type="text/css" href="responsive-style.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<script src="js/javaScript.js"></script>
		<meta name="viewport" content="width=device-width, user-scalable=no"/>

	</head>
	<body>
		<!-- This is the navigation bar at the top of the screen -->
		<div class="topnav">
			<li class="HomePage"><a href="main.php">Home</a></li>
			<li class="LoginPage"><a class="active" href="login.php">Login</a></li>
			<li class="facebook"><a href="https://www.facebook.com"><img src="img/facebook.png" class="facebook-picture"></a></li>
			<li class="twitter"><a href="https://www.twitter.com"><img src="img/twitter.png" class="twitter-picture"></a></li>
		</div>

		<!-- This is the logo -->
		<a class="logo" href="main.php"><img src="img/logo.png"></a>

		<div class="login-form-content">
			<form class="login-form" name="loginForm" action="utils/authentication.php" method="post" onsubmit="return validateForm()">
				<p class="form-text">Enter your username:</p>
 				<input type="text" name="username" value="">
				<br>
				<p class="form-text">Enter your password:</p>
 				<input type="password" name="password" value="">
				<br>
				<br>	
				<input type="submit" value="Submit">
		 	</form>
 		</div>

		<div class="error-holder"><?php echo $error ?></div>

	</body>
</html>
