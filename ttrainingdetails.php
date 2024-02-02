<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['coursename']) ||  $_SESSION['coursename'] == ""){
   header("Location:");
}

$sql="SELECT * FROM course order by course_id desc";
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
  padding: 28px;
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
	     
     <?php include("ttrainingdash.php");?>  
     <?php include("head.php");?>  
    
   
<div class="content">
</div>

<h5><a href="tcsearch.php"><i class="fa fa-search"></i> Search course.</h5></a>
	<div class="manage">
	<center>
	<table border="1" style="width:50%" id="table">
		<thead>
			<tr>
				<th style="width:7%">Course Id</th>
				<th style="width:13%">Course Name</th>
				<th style="width:7%">Start Date</th>					
				<th style="width:7%">End Date</th>
				<th style="width:6%">Training Time</th>
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
				<td style='padding-left: 45px;'><?php echo $d['course_id']; ?></td>
				<td style='padding-left: 20px;'><?php echo $d['course_name']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['start_date']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['end_date']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['time']; ?></td>

		       
                
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