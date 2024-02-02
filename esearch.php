<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php include("asearchdash.php");?>

<center>
<h4 style="color:#FF1744;padding-top:100px;">
<i class="fa fa-info-circle"> Wanna find informations of employees with specific skill?</h4></i><br>
<form method="POST" action="esearch.php">
    <input type="text" name="search" placeholder="Enter skill ">
    <button type="submit" name="submit" class="btn btn-primary">Search</button>

    <style>

        
  table {
    font-family: Callibri;
    width: 100%;
    border-collapse: collapse;
    margin-top: 40px;
  }
  
  th, td {
    top margin:10px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: red;
    color: white;
  }

  .btn-primary {
    padding: 5px 10px;
    font-size: 12px;
  }

</style>
</form>
</center >

<?php
// Check if the form is submitted
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
    $result = mysqli_query($con, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        echo"<table>";
        echo "<thead><tr><th>Employee Id</th><th>Fullname</th><th>Phone</th><th>DOB</th><th>Email</th><th>Address</th><th>Experience</th><th>Gender</th><th>Skill</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['employee_id'] ."</td>" ;
            echo "<td>" . $row['fullname'] ."</td>" ;
            echo "<td>" . $row['phone'] ."</td>" ;
            echo "<td>" . $row['date_of_birth'] ."</td>" ;
            echo "<td>" . $row['email'] ."</td>" ;
            echo "<td>" . $row['address'] ."</td>";
            echo "<td>" . $row['experience'] ."</td>" ;
            echo "<td>" . $row['gender'] ."</td>" ;
            echo "<td>" . $row['skills'] ."</td>" ;
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
?>

</body>
</html>

