<?php 
$con=new mysqli("localhost","root","","esms.");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>