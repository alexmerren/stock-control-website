<?php
require 'connection.php' ;

viewAllItems($conn);

function viewAllitems($conn) {
    	$stmt = $conn->prepare("SELECT id, itemname, amount FROM items ORDER BY amount DESC") ;
    	$stmt->bind_result($dbId, $dbItemname, $dbAmount);
   	$stmt->execute() ;
   	$stmt->store_result();
    	$productsArray= array() ;
    	if ($stmt->num_rows > 0) {
      		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data/>') ;
      		while ( $stmt->fetch() ) {
        		$products = $xml->addChild('events') ;
        		$products->addChild('id', $dbId) ;
        		$products->addChild('name', $dbItemname) ;
        		$products->addChild('amount', $dbAmount) ;
      		}
    	}   
	Header('Content-type: text/xml');

  	$dom = new DOMDocument();
  	$dom->formatOutput = true;
  	$dom->loadXML($xml->asXML());
	$formattedXML = $dom->saveXML();
	print $formattedXML;
	//header("location: https://students.emps.ex.ac.uk/ajcm203/CA/stock.php#retrieve-form");
	$conn->close();
}

?>