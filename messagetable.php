
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

$sql1="CREATE TABLE message(
   name VARCHAR(30) NOT NULL,
   phone CHAR (15) NOT NULL UNIQUE,
   email VARCHAR(30) NOT NULL UNIQUE,
   message VARCHAR(999) NOT NULL
 )";
if(mysqli_query($conn,$sql1)){
echo "Table message created successfully";
}
else{
	echo "Error creating table";
}