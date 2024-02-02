<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE paymentss(
   trainer_id INT(6) PRIMARY KEY, 
   fullname VARCHAR(30) NOT NULL,
   payable_amount INT NOT NULL,
   due_amount INT NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table paymentss created successfully";
}
else{
	echo "Error creating table";
}