<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['employeename']) ||  $_SESSION['employeename'] == ""){
   header("Location:");
}

$sql="SELECT * FROM message order by name desc";
$result=mysqli_query($conn,$sql);
$data=[];
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		array_unshift($data,$row);
		
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ESMS!</title>
	<style type="text/css">
		
.manage{
	margin-top: 40px;
	}

#table {
  font-family: Callibri;
  border-collapse: collapse;
  width: 50%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 5px;
  text-align: center;
}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color:red;
  color: white;
  text-align: center;
}
		
</style>
</head>
<body>
	     
     <?php include("aemployeedash.php");?>  
     <?php include("head.php");?>  
   
<div class="content">
</div>

<!--<h5 style="float: left;"><a href="employee_registration.php">Click here to register.</h5></a>
<h5 style="float: right;"><a href="esearch.php"><i class="fa fa-search"></i> Search employee.</h5></a>!-->

<?php
if (isset($_POST['submit'])) {
    // Get the search keyword
    $search = $_POST['search'];

    // Create a database connection
    $con = mysqli_connect('localhost', 'root', '', 'esms.');

    // Check the connection
    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    

}?>

	<div class="manage">
	<center><br><br>
	<table border="1" style="width:90%" id="table">
		<thead>
			<tr>
				<th style="width:15%">Fullname</th>
				<th style="width:17%">Phone</th>					
				<th style="width:6%">Email</th>
				<th style="width:15%">Message</th>
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
				
				<td style='padding-left: 5px;'><?php echo $d['name']; ?></td>
		        <td style='padding-left: 4px;'><?php echo $d['phone']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['email']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['message']; ?></td>
		        </td>
			</tr>
		</tbody>
		<?php } ?>
	</table>
</center>
</div>
</div>
</body>
</html>