<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE employee(
   employee_id INT(6) PRIMARY KEY AUTO_INCREMENT, 
   fullname VARCHAR(30) NOT NULL,
   phone CHAR (15) NOT NULL UNIQUE,
   date_of_birth date NOT NULL,
   email VARCHAR(30) NOT NULL UNIQUE,
   address VARCHAR(30) NOT NULL,
   experience VARCHAR(30) NOT NULL,
   gender VARCHAR(10) NOT NULL,
   skills VARCHAR(30) NOT NULL,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL,
   confirm_password  VARCHAR(30) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table employee  created successfully";
}
else{
	echo "Error creating table";
}