<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','esms.');
if(isset($_POST['submit'])){
  $fullname=$_POST['fullname'];
  $phone=$_POST['phone'];
  $date_of_birth=$_POST['date_of_birth'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $experience=$_POST['experience'];
  $gender=$_POST['gender'];
  $skills=$_POST['skills'];
  $assigncourse=$_POST['assigncourse'];
  $id=$_POST['id'];

  $sql = "UPDATE assign SET assigncourse='$assigncourse' WHERE employee_id='$id'";
  mysqli_query($conn,$sql);
  header('location:aasign.php');

}
$sql1="SELECT * from assign where employee_id = $id";
$res= mysqli_query($conn,$sql1);
$data=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
  <title>ESMS!</title>
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
            <label class="control-label text-primary"><i class="fa fa-user"></i> Employee ID</label>
            <input type="text" name="id" value="<?php echo $data['employee_id']?>" readonly='readonly' required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" value="<?php echo $data['fullname'];?>" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label><br>
            <input type="text" name="phone" value="<?php echo $data['phone']?>" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-calendar"></i> Date of Birth</label>
            <input type="date" name="date_of_birth" value="<?php echo $data['date_of_birth']?>" max="<?php echo (new DateTime())->format('Y-m-d'); ?>"required class="form-control input-sm"><br>
            <label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" value="<?php echo $data['email']?>"required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-home"></i> Address</label>
            <input type="text" name="address" value="<?php echo $data['address']?>"required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-history"></i> Experience</label>
            <input type="text" name="experience" value="<?php echo $data['experience']?>"required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-mercury"></i> Gender</label>
            <input type="text" name="gender" value="<?php echo $data['gender']?>"required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-cogs"></i> Assign course</label>
            <select name="assigncourse" class="form-control input-sm" required>
            <option value="C" <?php if($data['assigncourse'] == 'C') echo 'selected'; ?>>C</option>
            <option value="Accounts" <?php if($data['assigncourse'] == 'Accounts') echo 'selected'; ?>>Accounts</option>
            <option value="SEO" <?php if($data['assigncourse'] == 'SEO') echo 'selected'; ?>>SEO</option>
            <option value="Finance" <?php if($data['assigncourse'] == 'Finance') echo 'selected'; ?>>Finance</option>
            </select><br>

          </div>

          
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you wanna assign training?')">Assign Training</button><br><br>
      </form>
    </div>
  </div>
 </div>
  </div>
</body>
</html>