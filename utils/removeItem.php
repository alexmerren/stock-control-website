<?php
session_start();
require 'connection.php';

removeItem($conn, $itemname, $amount);

function removeItem($conn, $itemname, $amount) {
	$itemname = $_POST["product-name"];
	$amount = $_POST["product-amount"];
	$sqlSearch = "SELECT * FROM items WHERE itemname = '$itemname' ";
	$searchResult = $conn->query($sqlSearch);
	if ($searchResult->num_rows > 0) {
		while($row = $searchResult->fetch_assoc()) {
			$newAmount = $row["amount"] - $amount;
			if ($newAmount === 0) {
				$sqlRemove = "DELETE FROM items WHERE itemname = '$itemname' ";
				$resultRemove = $conn->query($sqlRemove);
				$results = $itemname . " removed from stock <br />";
				$_SESSION["result"] = $results;
				echo $results;
				header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
			} else if ($newAmount > 0) {
				$sqlUpdate = "UPDATE items SET amount = '$newAmount' WHERE itemname = '$itemname' ";
				$resultUpdate = $conn->query($sqlUpdate);
				$results = $amount . " successfully removed from " . $itemname . "<br />";
				$_SESSION["result"] = $results;
				echo $results;
				header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
			} else if ($newAmount < 0) {
				$results = "Cannot have negative stock; Unable to remove";
				$_SESSION["result"] = $results;
				echo $results;
				header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
			}		
		}
	} else {
		$results = $itemname . " does not exist, unable to remove <br />";
		$_SESSION["result"] = $results;
		echo $results;				
		header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php");
  	} 
	$conn->close();
}

?>