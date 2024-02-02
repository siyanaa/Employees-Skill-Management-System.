<?php
$conn=mysqli_connect('localhost','root','','esms.');

if(!isset( $_SESSION['employeename']) ||  $_SESSION['employeename'] == ""){
   header("Location:");
}

$sql="SELECT * FROM assign order by employee_id desc";
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
  width: 10%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 3px;
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

<h5><a href="esearch.php"><i class="fa fa-search"></i> Search employee.</h5></a>

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
    $query = "SELECT * FROM employee WHERE skills LIKE'%$search'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Display the results
        echo "<h4>Employee:</h4>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['employee_id'] ;
            echo $row['fullname'] ;
            echo $row['phone'] ;
            echo $row['date_of_birth'] ;
            echo $row['email'] ;
            echo $row['address'] ;
            echo $row['gender'] ;
            echo $row['skills'] ;
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
				<th style="width:7%">Employee Id</th>
				<th style="width:13%">Fullname</th>
				<th style="width:7%">Phone</th>					
				<th style="width:7%">Date of Birth</th>
				<th style="width:6%">Email</th>
				<th style="width:15%">Address</th>
                <th style="width:15%">Assigned Course</th>
                <th style="width:20%">Assigned Task</th>
				<th style="width:20%">Condition</th>
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
		        <td style='padding-left: 15px;'><?php echo $d ['address']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['assigncourse']; ?></td>
                <td style='padding-left: 15px;'><?php echo $d['assigntask']; ?></td>
		        <td  style='padding-left: 5px;'>

                <a href="semployeeassign.php?id=<?php echo $d['employee_id']?>" onclick="return confirm('Are you sure you want to assign task?')">
                <button style="background-color: black; border-color: black; color: white; margin-bottom: 2px;">Assign</button>
                </a>
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