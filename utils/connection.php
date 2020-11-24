<?php

$servername = "emps-sql.ex.ac.uk";
$username = "ajcm203";
$password = "ajcm203";
$database = $username ;

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
