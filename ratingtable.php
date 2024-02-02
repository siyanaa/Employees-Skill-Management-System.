<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE rating (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    username VARCHAR(30),
    rating DECIMAL(3, 2)
)";

if(mysqli_query($conn,$sql1)){
echo "Table rating created successfully";
}
else{
	echo "Error creating table";
}