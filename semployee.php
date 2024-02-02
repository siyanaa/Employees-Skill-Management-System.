<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['employeename']) ||  $_SESSION['employeename'] == ""){
   header("Location:");
}

$sql="SELECT * FROM employee order by employee_id desc";
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
  padding: 7px;
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
	     
     <?php include("semployeedash.php");?>  
     <?php include("head.php");?>  
    
   
<div class="content">
</div>

<h5><a href="sesearch.php"><i class="fa fa-info-circle"></i> Get more information about the training.</h5></a>
	<div class="manage">
	<center>
	<table border="1" style="width:50%" id="table">
		<thead>
			<tr>
            <tr>
				<th style="width:7%">Employee Id</th>
				<th style="width:13%">Fullname</th>
				<th style="width:7%">Phone</th>					
				<th style="width:7%">Date of Birth</th>
				<th style="width:6%">Email</th>
				<th style="width:15%">Address</th>
				<th style="width:12%">Experience</th>
				<th style="width:20%">Gender</th>
                <th style="width:20%">Assigned Course</th>
			</tr>
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
            <td style='padding-left: 45px;'><?php echo $d['employee_id']; ?></td>
				<td style='padding-left: 5px;'><?php echo $d['fullname']; ?></td>
		        <td style='padding-left: 4px;'><?php echo $d['phone']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['date_of_birth']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['email']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['address']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['experience']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['gender']; ?></td>
		        <td style='padding-left: 30px;'><?php echo $d['skills']; ?></td>
                
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