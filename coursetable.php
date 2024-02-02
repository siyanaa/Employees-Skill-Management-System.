<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE course(
   course_id INT(6) PRIMARY KEY AUTO_INCREMENT, 
   course_name VARCHAR(30) NOT NULL,
   start_date date NOT NULL,
   end_date date NOT NULL,
   time TIME NOT NULL,
   classes INT(11) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table course created successfully";
}
else{
	echo "Error creating table";
}