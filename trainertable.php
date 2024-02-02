<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE trainer(
   trainer_id INT(6) PRIMARY KEY, 
   fullname VARCHAR(30) NOT NULL,
   phone CHAR (15) NOT NULL UNIQUE,
   email VARCHAR(30) NOT NULL UNIQUE,
   experience VARCHAR(30) NOT NULL,
   gender VARCHAR(10) NOT NULL,
   course VARCHAR(30) NOT NULL,
   hourly_charge VARCHAR(30) NOT NULL,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL,
   confirm_password  VARCHAR(30) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table trainer  created successfully";
}
else{
	echo "Error creating table";
}