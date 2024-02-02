<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE employeedetails(
   employee_id INT(6) PRIMARY KEY AUTO_INCREMENT, 
   fullname VARCHAR(30) NOT NULL,
   phone CHAR (15) NOT NULL UNIQUE,
   email VARCHAR(30) NOT NULL UNIQUE,
   course VARCHAR(30) NOT NULL,
   coursename VARCHAR(30) NOT NULL,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(60) NOT NULL,
   confirm_password  VARCHAR(60) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table employee  created successfully";
}
else{
	echo "Error creating table";
}