<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE file (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(30),
    filename VARCHAR(255),
    filepath VARCHAR(255),
    submission_date DATE,
    rating INT(11),
    remarks VARCHAR(80)
    
)";
if(mysqli_query($conn,$sql1)){
echo "Table file created successfully";
}
else{
	echo "Error creating table";
}