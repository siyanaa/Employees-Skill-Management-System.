<?php
$conn = mysqli_connect('localhost', 'root', '', 'esms.');

$sql = "SELECT * FROM file ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$data = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_unshift($data, $row);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>ESMS!</title>
    <style type="text/css">
        .manage {
            margin-top: 50px;
        }

        #table {
            font-family: Callibri;
            border-collapse: collapse;
            width: 80%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: center;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: red;
            color: white;
            text-align: center;
        }

        select.custom-select {
            background-color: white;
            color: red;
            border: 1px solid black;
            margin-bottom: 2px;
        }

        select.custom-select:hover {
            background-color: white;
            color: red;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // AJAX function to update the rating
        function updateRating(fileId, rating) {
            $.ajax({
                type: 'POST',
                url: 'update_rating.php',
                data: {file_id: fileId, rating: rating},
                success: function () {
                    // Update the rating in the data array
                    var dataId = 'data-' + fileId;
                    $('#' + dataId).data('rating', rating);
                }
            });
        }
    </script>
</head>
<body>
<?php include("sratedash.php"); ?>
<?php include("head.php"); ?>

<div class="content"></div>

<h5><a href="stsearch.php"><i class="fa fa-search"></i> Search employee.</h5></a>

<?php
if (isset($_POST['submit'])) {
    // Get the search keyword
    $search = $_POST['search'];

    // Create a database connection
    $con = mysqli_connect('localhost', 'root', '', 'esms');

    // Check the connection
    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare the search query
    $query = "SELECT * FROM file WHERE employee_name LIKE '%$search'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Display the results
        echo "<h4>Employee:</h4>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['id'];
            echo $row['employee_name'];
            echo $row['filename'];
            echo $row['filepath'];
            echo $row['submission_date'];
            echo $row['ratings'];
            echo $row['remarks'];
        }
        echo "</ul>";
    } else {
        echo "No results found.";
    }
}
?>
<a href="sremark.php" button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Remarks</button></a>

<div class="manage">
    <center>
        <table border="1" style="width:30%" id="table">
            <thead>
            <tr>
                <th style="width:7%">Task Id</th>
                <th style="width:13%">Employee name</th>
                <th style="width:7%">File name</th>
                <th style="width:7%">File Path</th>
                <th style="width:150%">Submission Date</th>
                <th style="width:30%">Condition</th>
                <th style="width:10%">Rate</th>
            </tr>
            </thead>
            <?php foreach ($data as $d) { ?>
                <tbody>
                <tr>
                    <td style='padding-left: 45px;'><?php echo $d['id']; ?></td>
                    <td style='padding-left: 5px;'><?php echo $d['employee_name']; ?></td>
                    <td style='padding-left: 4px;'><?php echo $d['filename']; ?></td>
                    <td style='padding-left: 20px;'><?php echo $d['filepath']; ?></td>
                    <td style='padding-left: 20px;'><?php echo $d['submission_date']; ?></td>
                    <td style='padding-left: 5px;'>
                        <a href="<?php echo $d['filepath']; ?>" target="_blank">
                            <button
                                    style="background-color: black; border-color: black; color: white; margin-bottom: 2px;">View
                            </button>
                        </a>
                    </td>
                    <td>
                        <select name="rating" class="custom-select" onchange="updateRating('<?php echo $d['id']; ?>', this.value)">
                            <option value="" disabled selected>Select Rating</option>
                            <option value="1" <?php if ($d['rating'] == '1') echo 'selected'; ?>>1 Star</option>
                            <option value="2" <?php if ($d['rating'] == '2') echo 'selected'; ?>>2 Stars</option>
                            <option value="3" <?php if ($d['rating'] == '3') echo 'selected'; ?>>3 Stars</option>
                            <option value="4" <?php if ($d['rating'] == '4') echo 'selected'; ?>>4 Stars</option>
                            <option value="5" <?php if ($d['rating'] == '5') echo 'selected'; ?>>5 Stars</option>
                        </select>
                        <?php if (!empty($d['rating'])) {
                            echo "<span>Rated: " . $d['rating'] . " Stars</span>";
                        } ?>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </center>
</div>
</body>
</html>
