<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE

// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['name'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$sql1 = "SELECT * FROM assign WHERE username = '$username'";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);
?>

<?php include("admin_head.php"); ?>
<?php include("dashboard_topnav.php"); ?>
<?php include("employee_dashboard.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Table Centered</title>
  <style>
    .container {
      display: flex;
      justify-content: center;
    }
    
    table {
      font-family: Callibri;
      margin-top: 60px;
      margin-right: 300px;
      border-collapse: collapse;
      border:none;
      margin-bottom: 50px;
    }

    th {
      margin-top: 20px;
      background-color:red;
      color:white;
    }

    td {
      margin-top: 40px;
    }

    th, td {
      padding: 8px;
      border:none;
      border-bottom: 1px solid #ddd;
    }

      .topnav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topnav-left {
      flex-grow: 1;
      text-align: left;
    }

    .topnav-right {
      text-align: right;
    }
  </style>
</head>
<body>
<h5><a href="etsearch.php"><i class="fa fa-info-circle"></i> Get more information about the training.</h5></a>
  <div class="container">
    <table>
      <thead>
        <tr>
        <th style="width:7%">Id</th>
				<th style="width:13%">Fullname</th>
				<th style="width:7%">Phone</th>					
				<th style="width:6%">Email</th>
				<th style="width:15%">Address</th>
				<th style="width:12%">Experience</th>
				<th style="width:20%">Gender</th>
        <th style="width:20%">Assigned</th>
				
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $data['employee_id']; ?></td>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['phone']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><?php echo $data['address']; ?></td>
          <td><?php echo $data['experience']; ?></td>
          <td><?php echo $data['gender']; ?></td>
          <td><?php echo $data['assigncourse']; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
