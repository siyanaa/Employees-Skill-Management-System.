
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
        $id=$_POST['employee_id'];
        $fullname=$_POST['fullname'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $experience=$_POST['experience'];
        $gender=$_POST['gender'];
		$skills=$_POST['skills'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];
        $secure_password = md5($password);
        $secure_pass = md5($confirm);
        if(empty($id) || empty($fullname) || empty($phone) ||  empty($dob) || empty($email) || empty($address) ||  empty($experience) ||   empty($gender) || empty($skills) ||  empty($username) || empty($password) || empty($confirm)){
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
             $sql2= mysqli_query($conn,"INSERT INTO employee(
            employee_id,fullname,phone,date_of_birth,email,address,experience,gender,skills,username,password,confirm_password)
            VALUES('$id','$fullname','$phone','$dob','$email','$address','$experience','$gender','$skills','$username','$secure_password','$secure_pass')");
        if (mysqli_affected_rows($conn) == 1) {
            $lastEmployeeID = mysqli_insert_id($conn);
    
            // Insert data into the "assign" table using the retrieved employee ID
            $sqlAssign = "INSERT INTO assign (employee_id, fullname, phone, date_of_birth, email, address, experience, gender, skills, username, password, confirm_password)
            VALUES ('$id', '$fullname', '$phone', '$dob', '$email', '$address', '$experience', '$gender', '$skills', '$username', '$secure_password', '$secure_pass')";
    
            $resultAssign = mysqli_query($conn, $sqlAssign);
    
            if (!$resultAssign) {
                die("Error inserting into 'assign' table: " . mysqli_error($conn));
            }
    
            header('location: employee.php');
        } else {
            echo "Error inserting into 'employee' table: " . mysqli_error($conn);
        }
    }
}
    ?>
	
<!DOCTYPE html>
<?php include"head.php";?>
<?php include"top_nav.php";?>
<html>
<head>
  <title>Employee Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<style>

form {
  max-width: 600px;
  max-height: 940px;
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

/*html{
            background-image: url('css/images/NIMB5.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
}

body {
            background-color: rgba(0, 0, 0, 0);
        }*/

</style>
</head>
<body>

<h1 style="color:#FF1744;Times New Roman;padding-top:50px;">
<center>
<i class="fa fa-users"> EMPLOYEE REGISTRATION!</h1></i>
</center>
<div class="container" style='margin-top:40px;'>

<div class="row">
  <div class="col-md-12">
    
      <form  method="post">
        <div class="row centered-form">
          <div class="col-50">
            <?php
            $sql1="SELECT employee_id from employee ORDER BY employee_id DESC LIMIT 1;";
            $result1= mysqli_query($conn,$sql1);
            $row1= mysqli_fetch_assoc($result1);

            if(mysqli_num_rows($result1)>0){
                $val=$row1['employee_id'] + 1;
            }
            else{
                $val = 1;
            }
            ?>
	
		  <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Employee ID</label>
        
			<input type="text" id="employee_id" name="employee_id" required pattern="[0-9]+" readonly='readonly' required class="form-control input-sm" value="<?php echo $val?>"?>

		 </div>
            <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" placeholder="" pattern="[A-Za-z ]+" required class="form-control input-sm">
			</div>

            <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label>
            <input type="text" name="phone" placeholder=""  pattern="98\d{8}" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-calendar"></i> Date of Birth</label>
            <input type="date" name="dob" placeholder="" max="<?php echo (new DateTime())->format('Y-m-d'); ?>" required class="form-control input-sm" ><br>
			<label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" placeholder="" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required class="form-control input-sm">
			<label class="control-label text-primary"><i class="fa fa-home"></i> Address</label>
            <input type="text" name="address" placeholder="" pattern="[A-Za-z]+" required class="form-control input-sm">
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

				<label class="control-label text-primary"><i class="fa fa-cogs"></i> Skills</label>
            <input type="text" name="skills" placeholder="" pattern="^[A-Za-z]+(\s*,?\s*[A-Za-z]+)*$" required class="form-control input-sm">
			<div class="col-50">
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
				</div>
          </div>
          </div>
		  
        </div>
         
      </form>
    
  </div>
 </div>
  
</body>
</html>