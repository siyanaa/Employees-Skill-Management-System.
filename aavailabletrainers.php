<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['Trainername']) ||  $_SESSION['Trainername'] == ""){
   header("Location:");
}

$sql="SELECT * FROM Availabletrainer order by trainer_id desc";
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
	     
     <?php include("atrainerdash.php");?>  
     <?php include("head.php");?>  
   
<div class="content">
</div>

<h5><a href="tsearch.php"><i class="fa fa-search"></i> Search trainer.</h5></a>

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

    // Prepare the search query
    $query = "SELECT * FROM availabletrainer WHERE course_name LIKE'%$search'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Display the results
        echo "<h4>Employee:</h4>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['trainer_id'] ;
            echo $row['fullname'] ;
            echo $row['phone'] ;
            echo $row['email'] ;
            echo $row['experience'] ;
            echo $row['gender'] ;
            echo $row['course'] ;
            echo $row['hourly_charge'] ;
            echo $row['status'] ;

        }
        echo "</ul>";
    } else {
        echo "No results found.";
    }

}?>

	<div class="manage">
	<center>
	<table border="1" style="width:50%" id="table">
		<thead>
			<tr>
				<th style="width:7%">Trainer Id</th>
				<th style="width:13%">Fullame</th>
				<th style="width:7%">Phone</th>					
				<th style="width:7%">Email</th>
				<th style="width:6%">Experience</th>
				<th style="width:15%">Gender</th>
                <th style="width:15%">Course</th>
                <th style="width:15%">Rate Per Class</th>
                <th style="width:15%">Status</th>
			
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
				<td style='padding-left: 45px;'><?php echo $d['trainer_id']; ?></td>
				<td style='padding-left: 5px;'><?php echo $d['fullname']; ?></td>
		        <td style='padding-left: 4px;'><?php echo $d['phone']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['email']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['experience']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['gender']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['course']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['hourly_charge']; ?></td>
		        <td style='padding-left: 30px;'><?php echo $d['status']; ?></td>

		       
			</tr>
		</tbody>
		<?php } ?>
	</table>
</center>
</div>
</div>
</body>
</html>