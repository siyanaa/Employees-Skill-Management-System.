<?php
$conn = mysqli_connect('localhost', 'root', '', 'esms.');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileId = $_POST['file_id'];
    $rating = $_POST['rating'];

    $updateQuery = "UPDATE file SET rating = '$rating' WHERE id = '$fileId'";
    mysqli_query($conn, $updateQuery);
}
?>
