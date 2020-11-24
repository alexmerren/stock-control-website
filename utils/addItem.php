<?php
session_start();
require 'connection.php';

addItem($conn, $itemname, $amount);

function addItem($conn, $itemname, $amount) {
	$itemname = $_POST["product-name"];
	$amount = $_POST["product-amount"];
	$sqlSearch = "SELECT * FROM items WHERE itemname = '$itemname' ";
	$searchResult = $conn->query($sqlSearch);
	if ($searchResult->num_rows > 0) {
		while($row = $searchResult->fetch_assoc()) {
			$newAmount = $row["amount"]+$amount;		
			$sql = "UPDATE items SET amount = '$newAmount' WHERE itemname = '$itemname' ";
			$resultUpdate = $conn->query($sql);
			$results = $amount . " successfuly added to " . $itemname . "<br />";
			$_SESSION["result"] = $results;
			echo $results;
			header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
		}
	} else {
		$sqlAdd = "INSERT INTO items VALUES(NULL, '$itemname', '$amount')";
		$resultAdd = $conn->query($sqlAdd);
		$results = "New Item " . $itemname . " added to stock <br />";
		$_SESSION["result"] = $results;
		echo $results;
		header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");

  	} 
	$conn->close();
} 

?>