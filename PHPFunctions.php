<?php

//The following PHP code was written by Andrew Goguen on Monday, November 18, 2013 for use with Validation and Insertion to the Database
//The validate method, checking all fields and using a regex for email and phone fields
function ValidateCustomerData($customerDataArray){
		if($customerDataArray['CustFirstName'] == ""){
			echo"Failure, First Name is Required";
			return;
			}
		if($customerDataArray['CustLastName'] == ""){
			echo"Failure, Last Name is Required";
			return;
			}
		if($customerDataArray['CustAddress'] == ""){
			echo"Failure, Address is Required";
			return;
			}
		if($customerDataArray['CustCity'] == ""){
			echo"Failure, City is Required";
			return;
			}
			if($customerDataArray['CustProv'] == ""){
			echo"Failure, Province is Required";
			return;
			}
		if($customerDataArray['CustPostal'] == ""){
			echo"Failure, Postal Code is Required";
			return;
			}
		if($customerDataArray['CustProv'] == ""){
			echo"Failure, Province is Required";
			return;
			}
		if($customerDataArray['CustCountry'] == ""){
			echo"Failure, Agency ID is Required";
			return;
			}
		if(!preg_match("/^\d{1,10}$/", $customerDataArray['CustHomePhone']) || $customerDataArray['CustHomePhone'] != ""){
			echo"Failure, Home Phone is InValid";
			return;
			}
		if(!preg_match("/^\d{1,10}$/", $customerDataArray['CustBusPhone'])|| $customerDataArray['CustBusPhone'] != ""){
			echo"Failure, Business Phone is InValid";
			return;
			}
		if(!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $customerDataArray['CustEmail'])|| $customerDataArray['CustEmail'] != ""){
			echo"Failure, Email is InValid";
			return;
			}
		else{
			InsertCustomer($customerDataArray);
			echo"success";
		}
}

function InsertCustomer($myArray){
	
	$filename = 'myLog.txt';
	
	$sql = 'INSERT INTO Customers (CustFirstName, 
										 CustLastName, 
										 CustAddress, 
										 CustCity, 
										 CustProv, 
										 CustPostal,
										 CustCountry,
										 CustHomePhone,
										 CustBusPhone,
										 CustEmail,
										 AgentId) 
				VALUES("'.$myArray["CustFirstName"].'","'
							.$myArray["CustLastName"].'","'
							.$myArray["CustAddress"].'","'
							.$myArray["CustCity"].'","'
							.$myArray["CustProv"].'","'
							.$myArray["CustPostal"].'","'
							.$myArray["CustCountry"].'","'
							.$myArray["CustHomePhone"].'","'
							.$myArray["CustBusPhone"].'","'
							.$myArray["CustEmail"].'","'
							.$myArray["AgentId"].'")';
		
	$db = mysql_connect("localhost", "root", "") ;
	
	mysql_select_db('travelexperts');
	
	$result = mysql_query($sql);
	
	//if the result is true, write to a log file
	if($result){
		$filepointer = fopen($filename, "a");
		fwrite($filepointer, $sql);
		fclose($filepointer);
		return true;
	}
	//if false write out to same log file
	else{
		$filepointer = fopen($filename, "a");
		fwrite($filepointer, "Failure");
		fclose($filepointer);
		return false;
	}
}

?>