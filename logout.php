<?php
session_start();
session_unset(); // Remove all the variables
session_destroy();
header('Location: main.php'); // Send the user back to the login page
?>
