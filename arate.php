<?php
$conn=mysqli_connect('localhost','root','','esms.');

$sql="SELECT * FROM file order by employee_name desc";
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
	     
     <?php include("aratedash.php");?>  
     <?php include("head.php");?>  
   
<div class="content">
</div>

<h5><a href="stsearch.php"><i class="fa fa-search"></i> Search employee.</h5></a>

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
    $query = "SELECT * FROM file WHERE employee_name LIKE'%$search'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Display the results
        echo "<h4>Employee:</h4>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['id'] ;
            echo $row['employee_name'] ;
            echo $row['filename'] ;
            echo $row['submission_date'] ;
            echo $row['rating'] ;
            echo $row['remarks'] ;
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
				<th style="width:7%">Task Id</th>
				<th style="width:13%">Employee name</th>
				<th style="width:7%">File name</th>					
				<th style="width:50%">Submission date</th>
				<th style="width:15%">Rated stars</th>
        <th style="width:15%">Remarks</th>

			
			</tr>
		</thead>
		<?php 
		foreach($data as $d){
		?>
		<tbody>
			<tr>
            <td style='padding-left: 45px;'><?php echo $d['id']; ?></td>
				<td style='padding-left: 5px;'><?php echo $d['employee_name']; ?></td>
		        <td style='padding-left: 4px;'><?php echo $d['filename']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d['submission_date']; ?></td>
		        <td style='padding-left: 20px;'><?php echo $d ['rating']; ?></td>
            <td style='padding-left: 20px;'><?php echo $d ['remarks']; ?></td>
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