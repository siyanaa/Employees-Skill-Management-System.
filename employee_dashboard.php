<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:trainer.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	</head>
	<body>

<?php include("dashboard_topnav.php"); ?>
<div class="container"  style='margin-top:70px;'>
	<div class="col-sm-3">
			<?php include("employee_sidenav.php");?>
		</div>
		<div class="col-sm-9" >
			<center><h1 class="text-primary"><i class="fa fa-dashboard"></i> EMPLOYEE DASHBOARD! </h1><hr></center>   
			
<?php 
?>
	</body>
</html>