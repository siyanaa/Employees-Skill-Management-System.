<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE

// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['name'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$sql1 = "SELECT * FROM file WHERE employee_name = '$username'";
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

  <div class="container">
    <table>
      <thead>
        <tr>
        <th style="width:7%"> Task Id</th>
				<th style="width:13%">Name</th>
				<th style="width:7%">Filename</th>					
				<th style="width:6%">Filepath</th>
				<th style="width:22%">Submission Date</th>
				<th style="width:17%">Rated stars</th>
                <th style="width:20%">Remarks </th>		
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['employee_name']; ?></td>
          <td><?php echo $data['filename']; ?></td>
          <td><?php echo $data['filepath']; ?></td>
          <td><?php echo $data['submission_date']; ?></td>
          <td><?php echo $data['rating']; ?></td>
          <td><?php echo $data['remarks']; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
