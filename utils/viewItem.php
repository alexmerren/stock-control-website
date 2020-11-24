<?php
session_start();
require 'connection.php';

viewItem($conn, $itemname);

function viewItem($conn, $itemname) {
	$itemname = $_POST["product-name"];
  	$sql = "SELECT * FROM items WHERE itemname = '$itemname' ";
 	$result = $conn->query($sql);
  	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$results = $row["itemname"] . " has " . $row["amount"] . " copies available" . "<br>";
			$_SESSION["result"] = $results;
			echo $results;
			header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
      		}
  	} else {
		$results = "0 results for " . $itemname . "<br>";
		$_SESSION["result"] = $results;
		echo $results;
		header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
  	}
	$conn->close();
}

?>