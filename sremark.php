<?php
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$uploadStatus = "";
$remarks = ""; 

if (isset($_POST['submit'])) {
  $remarks = $_POST['remarks'];
  $employeeName = $_POST['employeeName']; 

  $sql1 = "UPDATE file SET remarks = '$remarks' WHERE employee_name = '$employeeName'";
  $res = mysqli_query($conn, $sql1);

  if ($res) {
    $uploadStatus = "Remarks updated successfully for Employee: $employeeName";
  } else {
    $uploadStatus = "Failed to update remarks.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>ESMS!</title>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
    form {
      max-height: 210px;
      max-width: 600px;
      margin-left: 110px;
      margin-right: auto;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 15px;
      margin-bottom: 30px;
      margin-top: 5px;
      text-align: left; 
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="password"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 7px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 0; 
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <?php include("semployeedash.php");?>  

  <div class="content">
  <div class="ro">
      <div class="columns">
      </div>

      <div class="columns">
      </div>
    </div>
    <hr style="color">
    <br><br>

    <h2 style="text-align:center;"></h2>
    <div class="row">
      <div class="col-50">
        <div class="container">
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-50">
          <label class="control-label text-primary"><i class="fa fa-comments"></i> Provide remarks to the employee:</label><br><br>
          <input type="text" name="employeeName" required class="form-control input-sm" placeholder="Employee Name">
          <input type="text" name="remarks" required class="form-control input-sm" placeholder="Remarks">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Remark</button><br><br>
      <p><a><?php echo $uploadStatus; ?></p></a>
    </form>
  </div>
</body>
</html>