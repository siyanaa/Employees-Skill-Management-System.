
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="esms.";
$conn=mysqli_connect($servername,$username,$password,$dbname); 

if(!$conn){
	die("Connection Failed");
}

    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $fullname=$_POST['fullname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $experience=$_POST['experience'];
        $gender=$_POST['gender'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];
        $secure_password = md5($password);
        $secure_pass = md5($confirm);
        if(empty($id) || empty($fullname) || empty($phone) ||  empty($email) ||  empty($experience) ||   empty($gender) ||  empty($username) || empty($password) || empty($confirm)){
      echo "Don't leave any empty field"; 
    }

    if(($confirm)!=($password)){
         echo "Password and confirm password must be same.";
    }

        else{
        $conn=mysqli_connect('localhost','root','','esms.');
        if(!$conn){
            die("Connection Failed:");
        }
             $sql2="INSERT INTO supervisor(
            supervisor_id,fullname,phone,email,experience,gender,username,password,confirm_password)
            VALUES('$id','$fullname','$phone','$email','$experience','$gender','$username','$secure_password','$secure_pass')";
            if(mysqli_query($conn,$sql2)){
                echo "New record created successfully.";
            }
            else{
                echo "Unsuccessfull.";
            }

        }
        if(mysqli_affected_rows($conn)==1){
			
        header('location: supervisor.php');
    }
    }
    ?>
	
<!DOCTYPE html>
<?php include"head.php";?>
<?php include"top_nav.php";?>
<html>
<head>
  <title>Supervisor Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>

form {
  max-width: 600px;
  max-height: 900px;
  margin: 0 auto;
  padding: 30px;
  border: 1px solid #ccc;
  border-radius: 15px;
  margin-bottom: 50px;
  margin-top: 0px;
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
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

</style>
</head>
<body>

<h1 style="color:#FF1744;Times New Roman;padding-top:50px;">
<center>
<i class="fa fa-users"> SUPERVISOR REGISTRATION!</h1></i>
</center>
<div class="container" style='margin-top:40px;'>

<div class="row">
  <div class="col-md-12">
    
      <form  method="post">
        <div class="row centered-form">
          <div class="col-50">
          <?php
            $sql1="SELECT supervisor_id from supervisor ORDER BY supervisor_id DESC LIMIT 1;";
            $result1= mysqli_query($conn,$sql1);
            $row1= mysqli_fetch_assoc($result1);

            if(mysqli_num_rows($result1)>0){
                $val=$row1['supervisor_id'] + 1;
            }
            else{
                $val = 1;
            }
            ?>
	
		  <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Supervisor ID</label>
        
			<input type="text" id="supervisor-id" name="id" required pattern="[0-9]+"  readonly='readonly' required class="form-control input-sm" value="<?php echo $val?>"?>

		 </div>
            <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" placeholder="" pattern="[A-Za-z ]+" required class="form-control input-sm">
			</div>

            <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label>
            <input type="text" name="phone" placeholder=""  pattern="98\d{8}" required class="form-control input-sm">
            
			<label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" placeholder="" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required class="form-control input-sm">
			
			<label class="control-label text-primary"><i class="fa fa-history"></i> Experience</label>

<div class="form-group">
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="experience" class="radio" value="1-3 years" required class="form-control input-sm"> 1-3 years
        </label>
    </div>
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="experience" class="radio" value="4-6 years" required class="form-control input-sm"> 4-6 years
        </label>
    </div>
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="experience" class="radio" value="6+ years" required class="form-control input-sm"> 6+ years
        </label>
    </div>
	<div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="experience" class="radio" value="No experience as of now" required class="form-control input-sm"> No experience as of now
        </label>
    </div>
</div>
				
				<label class="control-label text-primary"><i class="fa fa-mercury"></i> Gender</label>

<div class="form-group">
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="gender" class="radio" value="Male" required class="form-control input-sm"> Male
        </label>
    </div>
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="gender" class="radio" value="Female" required class="form-control input-sm"> Female
        </label>
    </div>
    <div class="radio-inline">
        <label class="control-label text-primary">
            <input type="radio" name="gender" class="radio" value="Others" required class="form-control input-sm"> Others
        </label>
    </div>
</div>

            <label class="control-label text-primary"><i class="fa fa-user"></i> Username</label>
            <input type="text" name="username" placeholder="" required class="form-control input-sm" >
            
			</div>
			<div class="col-50">
			<label class="control-label text-primary"><i class="fa fa-key"></i> Password</label>
            <input type="password" name="password" placeholder="" required class="form-control input-sm">
            
</div>
<div class="col-50">
<label class="control-label text-primary"><i class="fa fa-key"></i> Confirm Password</label>
            <input type="password" name="confirm" placeholder="" required class="form-control input-sm">
                
				  <button type="submit" name="submit" class="btn btn-primary">Register</button>
				</div>  <br/>
          </div>
          </div>
		  
        </div>
         
      </form>
    
  </div>
 </div>
  
</body>
</html>