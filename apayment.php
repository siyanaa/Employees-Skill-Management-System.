<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['trainername']) ||  $_SESSION['trainername'] == ""){
   header("Location:");
}

$sql="SELECT * FROM trainer order by trainer_id desc";
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
	     
     <?php include("apaymentdash.php");?>  
     <?php include("head.php");?>  
   
<div class="content">
</div>
<h5 style="float: right;"><a href="tsearch.php"><i class="fa fa-search"></i> Search trainer.</h5></a>
	
	<div class="manage">
	<center><br><br>
	<table border="1" style="width:50%" id="table">
		<thead>
			<tr>
				<th style="width:7%">Trainer Id</th>
				<th style="width:13%">Fullname</th>	
                <th style="width:13%">Email</th>				
                <th style="width:20%">Course</th>
				<th style="width:20%">Rate Per Class</th>
                <th style="width:20%">Payable Amount</th>
                <th style="width:20%">Due Amount</th>
				<th style="width:30%">Condition</th>
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
				<td style='padding-left: 45px;'><?php echo $d['trainer_id']; ?></td>
				<td style='padding-left: 5px;'><?php echo $d['fullname']; ?></td>
                <td style='padding-left: 5px;'><?php echo $d['email']; ?></td>
		        <td style='padding-left: 30px;'><?php echo $d['course']; ?></td>
				<td style='padding-left: 30px;'><?php echo $d['hourly_charge']; ?></td>
                <td style='padding-left: 30px;'><?php echo $d['payment']; ?></td>
                <td style='padding-left: 30px;'><?php echo $d['dueamount']; ?></td>

		        <td  style='padding-left: 5px;'>
		        	<a href="payment.php?id=<?php echo $d['trainer_id']?>"><button style="background-color:black; border-color: black; color: white; margin-bottom: 2px;">Pay</button></a>
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