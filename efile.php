<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE

// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = "";

if (isset($_SESSION['name'])) {
    $username = $_SESSION['name'];
} else {
    // Handle the case when 'name' is not set in the session
    // For example, redirect the user to a login page
}

if (isset($_POST['submit'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'esms.');

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fileCount = count($_FILES['file']['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['file']['name'][$i];
        $employeeName = $username;
        $submissionDate = date("Y-m-d"); // Assuming you want to store the current date
        $fileDestination = 'uploads/' . $fileName;

        $sql = "INSERT INTO file (employee_name, filename, filepath, submission_date) 
                VALUES ('$employeeName', '$fileName', '$fileDestination', '$submissionDate')";

        if (mysqli_query($conn, $sql)) {
            $message = '<div class="success">File has been successfully uploaded.</div>';
        } else {
            $message = '<div class="error">Error uploading file.</div>';
        }
        move_uploaded_file($_FILES['file']['tmp_name'][$i], $fileDestination);
    }

    mysqli_close($conn);
}
?>

<?php include("admin_head.php"); ?>
<?php include("dashboard_topnav.php"); ?>
<?php include("efiledash.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>ESMS!</title>

<style>
   form {
      max-width: 300px;
      margin-left: 250px;
      margin-right: auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 15px;
      margin-top: 1px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="file"] {
            display: block;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            background-color: #f2f2f2;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

    input[type="submit"] {
      background-color: red;
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: brown;
    }
    .message-container {
  margin-top: 0px;
  text-align: center;
  margin-top: 0px;
  margin-left: 0%; 
  margin-right: 30%;
}

.message {
  display: inline-block;
  padding: 25px;
  background-color:white;
  color: red;
  margin-top: 0px;
  margin-bottom: 0px;
  height: 20px;
}
</style>
</head>
<body>
<div class="container" style='margin-top:70px;'>
    <center>
<form action="" method="post" enctype="multipart/form-data">
    <label class="control-label text-primary"><i class="fa fa-user"></i> Employee Name:</label>
    <input type="text" name="employee_name" placeholder="" value="<?php echo $username; ?>" readonly='readonly' required class="form-control input-sm"><br>
    <input type="file" name="file[]" id="file" multiple required>
    <input type="submit" name="submit" value="Upload">
</form>
<div class="message-container">
    <div class="message">
        <?php echo $message; ?>
    </div>
</div>
</center>
</div>
</body>
</html>
