<?php
//SET FOREIGN_KEY_CHECKS=0;
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','esms.');
$sql="DELETE from supervisor where supervisor_id=$id";
mysqli_query($conn,$sql);
header('location:asupervisor.php');
//SET FOREIGN_KEY_CHECKS=1;
?>