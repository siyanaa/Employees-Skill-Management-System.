<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'esms.';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM employee WHERE employee_id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully from the 'employee' table";
} else {
    echo "Error deleting record from the 'employee' table: " . $conn->error;
}

$sql1 = "DELETE FROM assign WHERE employee_id = $id";
if ($conn->query($sql1) === TRUE) {
    echo "Record deleted successfully from the 'assign' table";
} else {
    echo "Error deleting record from the 'assign' table: " . $conn->error;
}

// Close the database connection
$conn->close();

// Redirect to the desired location
header('location: aemployee.php');
?>