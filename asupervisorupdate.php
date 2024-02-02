<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','esms.');
if(isset($_POST['submit'])){
  $fullname=$_POST['fullname'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $experience=$_POST['experience'];
  $gender=$_POST['gender'];
  $id=$_POST['id'];

  $sql="UPDATE supervisor set fullname='$fullname',phone='$phone',email='$email',experience='$experience',gender='$gender' where supervisor_id='$id'";
  mysqli_query($conn,$sql);
  header('location:asupervisor.php');

}
$sql1="select * from supervisor where supervisor_id = $id";
$res= mysqli_query($conn,$sql1);
$data=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
  <title>form</title>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
form {
  max-width: 600px;
  margin-left: 110px;
  margin-right: auto;
  padding: 30px;
  border: 1px solid #ccc;
  border-radius: 15px;
  margin-bottom: 50px;
  margin-top: 20px;
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
<?php include("aemployeedash.php");?>  

<div class="content">
  <div class="ro">
        <div class="columns">
          </h1>
          </div>

        <div class="columns">
      </div>
    </div>
    <hr style="color">
<br><br>

<h2 style="text-align:center;"></h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form  method="post">
        <div class="row">
          <div class="col-50">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Supervisor ID</label>
            <input type="text" name="id" value="<?php echo $data['supervisor_id']?>" readonly='readonly' required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" value="<?php echo $data['fullname'];?>" pattern="[A-Za-z ]+" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label>
            <input type="text" name="phone" value="<?php echo $data['phone']?>"  pattern="98\d{8}" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" value="<?php echo $data['email']?>" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-history"></i> Experience</label>
            <input type="text" name="experience" value="<?php echo $data['experience']?>"required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-mercury"></i> Gender</label>
            <input type="text" name="gender" value="<?php echo $data['gender']?>" pattern="[A-Za-z]+" required class="form-control input-sm">
            

          </div>

          
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you wanna edit?')">Edit Supervisor</button><br><br>
      </form>
    </div>
  </div>
 </div>
  </div>
</body>
</html>