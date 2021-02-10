<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ResultProcessingSystem";

//Creating Connection
$conn = new mysqli($servername,$username,$password,$dbname);

//Checking Connection
if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}
?>