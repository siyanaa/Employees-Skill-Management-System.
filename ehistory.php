<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE
// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['name'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$sql1 = "SELECT * FROM history WHERE username = '$username'";
$res = mysqli_query($conn, $sql1);
?>

<?php include("admin_head.php"); ?>
<?php include("dashboard_topnav.php"); ?>
<?php include("ehistorydash.php"); ?>

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
      margin-top: 70px;
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
      padding: 18px;
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
          <th style="width:13%">Course</th>
          <th style="width:25%">Start Date</th>
          <th style="width:25%">End Date</th>
          <th style="width:6%">Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($data = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $data['course_name'] . "</td>";
            echo "<td>" . $data['start_date'] . "</td>";
            echo "<td>" . $data['end_date'] . "</td>";
            echo "<td>" . $data['time'] . "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>`
    </table>
  </div>
</body>
</html>
