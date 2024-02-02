<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php include("tsearchdash.php");?>

<center>
<h4 style="color:#FF1744;padding-top:100px;">
<i class="fa fa-info-circle"> Wanna find informations of trainers providing specific course?</h4></i><br>
<form method="POST" action="tsearch.php">
    <input type="text" name="search" placeholder="Enter course ">
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
    $query = "SELECT * FROM trainer WHERE course LIKE'%$search'";

    // Execute the query
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo"<table>";
        echo "<thead><tr><th>Trainer Id</th><th>Fullname</th><th>Phone</th><th>Email</th><th>Experience</th><th>Gender</th><th>Course</th><th>Rate Per Class</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['trainer_id'] ."</td>" ;
            echo "<td>" . $row['fullname'] ."</td>" ;
            echo "<td>" . $row['phone'] ."</td>" ;
            echo "<td>" . $row['email'] ."</td>" ;
            echo "<td>" . $row['experience'] ."</td>" ;
            echo "<td>" . $row['gender'] ."</td>" ;
            echo "<td>" . $row['course'] ."</td>" ;
            echo "<td>" . $row['hourly_charge'] ."</td>" ;
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

