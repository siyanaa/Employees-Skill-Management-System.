<?php include("admin_head.php"); ?>
<?php include("dashboard_topnav.php"); ?>
<?php include("efiledash.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>ESMS!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

    </style>
</head>
<body>
    <?php
    // Check if the file parameter is present in the URL
    if (isset($_GET['file'])) {
        $file = $_GET['file'];

        // Display the file
        echo "<a><h4>Your file has been successfully uploaded:</h4></a>";
        echo "<a href='$file' target='_blank'>View File</a>";
    } else {
        echo "No file specified.";
    }
    ?>
</body>
</html>
