<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE history(
   employee_id INT(6) NOT NULL,
   employee_name VARCHAR(30) NOT NULL,
   course_name VARCHAR(30) NOT NULL,
   start_date date NOT NULL,
   end_date date NOT NULL,
   time TIME(5) NOT NULL,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(60) NOT NULL,
   confirm_password  VARCHAR(60) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table history created successfully";
}
else{
	echo "Error creating table";
}