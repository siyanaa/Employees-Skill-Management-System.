<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>
	<?php include("head.php");?>
</head>
<body>

<?php include("top_nav.php"); ?>

    <div class="container" style="margin-top:70px;">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i class='fa fa-user '></i> Employee Login.</h1> 
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<?php
				if(isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
				
					if(empty($username) || empty($password)){
						echo "Don't leave any empty field!!";
					} else {
					  
						$hash = md5($password);
						$sql1 = "SELECT * FROM employee WHERE username='$username'";
						$result1 = mysqli_query($con, $sql1);

						if(mysqli_num_rows($result1) > 0){
							$_SESSION['name'] = "$username";
							$_SESSION['usertype'] = 'employee';
							header("Location: employee_dashboard.php");
							exit();

						}
						else
						{

							
							echo "<div class='alert alert-danger'><b>Error</b> User Name and Password Incorrect.</div>";
						}
					}
				}
					
				?>
					<form role="form" action="employee.php" method="post">
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">User Name</label>
			    		    <input class="form-control" name="username"  id="username" type="text" required>
			    		</div>
			    		<div class="form-group">
							<label for="pass" class="text-primary">Password</label>
			    			<input class="form-control" id="password" name="password" type="password" value="" required>
			    		</div>
			    		<button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> Login Here</button>
			      	</form>
				</div>
				<div class="col-md-3"></div>
			</div>
        </div>
        </div>
       
</body>
</html>
