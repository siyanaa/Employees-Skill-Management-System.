<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['supervisorname']) ||  $_SESSION['supervisorname'] == ""){
   header("Location:");
}

$sql="SELECT * FROM supervisor order by supervisor_id desc";
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
  padding: 10px;
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
	     
     <?php include("asupervisordash.php");?>  
     <?php include("head.php");?>  
   
<div class="content">
</div>
<h5 style="float: left;"><a href="supervisor_registration.php">Click here to register.</h5></a>
<h5 style="float: right;"><a href="ssearch.php"><i class="fa fa-search"></i> Search supervisor.</h5></a>

	<div class="manage">
	<center> <br><br>
	<table border="1" style="width:50%" id="table">
		<thead>
			<tr>
				<th style="width:7%">Supervisor Id</th>
				<th style="width:13%">Fullname</th>
				<th style="width:7%">Phone</th>					
				<th style="width:6%">Email</th>
				<th style="width:12%">Experience</th>
				<th style="width:20%">Gender</th>
				<th style="width:30%">Condition</th>
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
				<td style='padding-left: 45px;'><?php echo $d['supervisor_id']; ?></td>
				<td style='padding-left: 5px;'><?php echo $d['fullname']; ?></td>
		        <td style='padding-left: 10px;'><?php echo $d['phone']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['email']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['experience']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['gender']; ?></td>

		        <td  style='padding-left: 5px;'>
		        	<a href="asupervisorupdate.php?id=<?php echo $d['supervisor_id']?>"><button style="background-color:black; border-color: black; color: white; margin-bottom: 2px;">Update</button></a>
		        	<a href="asupervisordelete.php?id=<?php echo $d['supervisor_id']?>"onclick="return confirm('Are you sure you wanna delete?')"><button style="background-color:red; border-color: red; color: white; margin-bottom: 2px;">Delete</button></a>
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