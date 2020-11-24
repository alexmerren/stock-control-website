//Javascript to validate if our form fields are populated
function validateForm() {
  	var username = document.forms["loginForm"]["username"].value;
  	var password = document.forms["loginForm"]["password"].value;
  	if (username == "" || password == "") {
      		alert("You must enter a username and password");
      		return false;
  	}
}

function validateFormAdd() {
	var productName = document.forms["addForm"]["product-name"].value;
	var productAmount = document.forms["addForm"]["product-amount"].value;
	if (productAmount == "" || productAmount =="0" ||productName == "") {
      		alert("You must enter a product and an amount");
      		return false;
  	}
}

function validateFormRemove() {
	var productName = document.forms["removeForm"]["product-name"].value;
	var productAmount = document.forms["removeForm"]["product-amount"].value;
	if (productAmount == "" || productAmount =="0" || productName == "") {
      		alert("You must enter a product and an amount");
      		return false;
  	}

}

function validateFormView() {
	var productName = document.forms["viewForm"]["product-name"].value;
	if (productName == "") {
      		alert("You must enter a product");
      		return false;
  	}

}

function loadXMLDoc() {
	var xmlhttp = new XMLHttpRequest();
 	xmlhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
			viewXML(this);
		} 
	};
	xmlhttp.open("GET", "stock.xml", true);
	xmlhttp.send();
}

function viewXML(xml) {
	var i;
	var xmlDoc = xml.responseXML;
	var table = "<tr><th>ID</th>Name<th></th>Amount<th></th></tr>";
	var x = xmlDoc.getElementsByTagName("id");
  	for (i = 0; i < x.length; i++) { 
    		table += ("<tr><td>" 
    			+ x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue
    			+ "</td><td>"
    			+ x[i].getElementsByTagName("amount")[0].childNodes[0].nodeValue
    			+ "</td></tr>");
  	}
	document.getElementById("demo").innerHTML = table;
}

