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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="jquery-ui-1.13.2.custom/jquery-ui.css" /> <!-- Include the jQuery UI CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> <!-- Include the jQuery UI library -->

    <style type="text/css">
        .manage {
            margin-top: 50px;
        }

        #table {
            font-family: Callibri;
            border-collapse: collapse;
            width: 100%;
        }

        #table td, #table th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: red;
            color: white;
            text-align: center;
        }

        .file-preview-dialog {
        width: 80%;
        height: 80%;
        overflow: auto;
    }

    .file-preview-dialog textarea {
        width: 100%;
        height: 100%;
    }
    
    </style>
</head>
<body>

<?php include("supervisor_dashboard.php");?>
<?php include("head.php");?>

<div class="content"></div>

<h5><a href="stsearch.php"><i class="fa fa-search"></i> Search employee.</a></h5>

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
        }
        echo "</ul>";
    } else {
        echo "No results found.";
    }
}
?>

<div class="manage">
    <center>
        <table border="1" style="width:50%" id="table">
            <thead>
            <tr>
                <th style="width:7%">Task Id</th>
                <th style="width:13%">Employee name</th>
                <th style="width:7%">File name</th>
                <th style="width:7%">File Path</th>
                <th style="width:150%">Submission Date</th>
                <th style="width:30%">Condition</th>
            </tr>
            </thead>
            <?php
            foreach ($data as $d) {
                ?>
                <tbody>
                <tr>
                    <td style='padding-left: 45px;'><?php echo $d['id']; ?></td>
                    <td style='padding-left: 5px;'><?php echo $d['employee_name']; ?></td>
                    <td style='padding-left: 4px;'><?php echo $d['filename']; ?></td>
                    <td style='padding-left: 20px;'><?php echo $d['filepath']; ?></td>
                    <td style='padding-left: 20px;'><?php echo $d['submission_date']; ?></td>
                    <td style='padding-left: 5px;'>
                        <button class="view-button" data-filepath="<?php echo $d['filepath']; ?>" style="background-color: black; border-color: black; color: white; margin-bottom: 2px;">View</button>
                    </td>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </center>
</div>

<script src="https://cdn.tiny.cloud/1/kf7y8qgv69g49bnys0g0tgd9sujmkbe3ryq10530b9o0w89s/tinymce/5/tinymce.min.js"></script>
<script>
    $(document).ready(function() {
        $(".view-button").click(function() {
            var filepath = $(this).data("filepath");
            openInTinyMCE(filepath);
        });

        function openInTinyMCE(filepath) {
            $("<div></div>").dialog({
                title: "File Preview",
                width: "auto",
                height: "auto",
                modal: true,
                open: function() {
    var dialog = $(this);
    $("<textarea></textarea>").appendTo(dialog);
    tinymce.init({
        selector: 'textarea',
        height: 500,
        readonly: true,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
        content_css: 'https://cdn.tiny.cloud/1/kf7y8qgv69g49bnys0g0tgd9sujmkbe3ryq10530b9o0w89s/tinymce/5/content.min.css',
        setup: function (editor) {
            editor.on('init', function () {
                $.ajax({
                    url: filepath,
                    success: function(data) {
                        editor.setContent(data);
                    },
                    error: function() {
                        editor.setContent('<p>Unable to retrieve file content.</p>');
                    },
                    complete: function() {
                        dialog.find('textarea').remove();
                    }
                });
            });
        }
    });
},

                close: function() {
                    tinymce.remove(); // Remove the TinyMCE instance when the dialog is closed
                }
            });
        }
    });
</script>
</body>
</html>
