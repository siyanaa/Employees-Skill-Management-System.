<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE

// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['name'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$sql1 = "SELECT * FROM trainer WHERE username = '$username'";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);
?>

<?php include("tpaymentdash.php");?>  
     <?php include("head.php");?>  

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
       
        
	<div class="manage">
	<center><br><br>
	<table border="1" style="width:90%" id="table">
		<thead>
			<tr>
        <th style="width:7%">Id</th>
				<th style="width:13%">Fullname</th>
				<th style="width:7%">Payment</th>					
				<th style="width:6%">Dueamount</th>
				
        </tr>
      </thead>
      <tbody>
        <tr>
        <td><?php echo $data['trainer_id']; ?></td>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['payment']; ?></td>
          <td><?php echo $data['dueamount']; ?></td>
        </tr>
      </tbody>
 
  </div>
</body>
</html>
