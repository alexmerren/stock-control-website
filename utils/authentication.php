<?php
session_start();
require 'connection.php' ;

if ( isset ($_POST["username"]) && isset($_POST["password"])) {
	$username = htmlentities($_POST["username"]) ;
	$password = htmlentities($_POST["password"]) ;
	validateUser($conn, $username, $password); // Make sure the user exists
} else {
	header('Location: ../login.php'); // If the user and pass are not in connection.php
}

function validateUser($conn, $username, $password) {
	$username = $conn->real_escape_string($username);
	$sql = "SELECT * FROM users WHERE username = '$username' ";
	$result = $conn->query($sql);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$hashed_password = $row["password"] ;
        		//Check to see if our password is equal to the password the user has entered
        		if ($hashed_password === crypt($password, $hashed_password)) {
				$_SESSION["appUser"] = $username; // Username and password match	
				header("location: ../stock.php");
        		} else {
				$error = "Invalid Password"; // Username and password don't match
				$_SESSION["appError"] = $error ;
				echo $error;
				header("location: ../login.php");
        		}
    		}

  	} else {
		$error = "Username not found in the database" ; // Username does not exist
 		$_SESSION["appError"] = $error ;
		echo $error;
		header("location: ../login.php");
  	}
	$conn->close();
}

?>
