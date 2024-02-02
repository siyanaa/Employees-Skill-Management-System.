<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');
$uploadStatus = "";

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $date_of_birth = $_POST['date_of_birth'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $experience = $_POST['experience'];
  $gender = $_POST['gender'];
  $assigncourse = $_POST['assigncourse'];
  $id = $_POST['id'];

 // File Upload
$file = $_FILES['assigntask']; 
$filename = $file['name'];
$filetmp = $file['tmp_name'];
$assigntask = 'uploads/' . $filename;

move_uploaded_file($filetmp, 'uploads/' . $filename);
  $sql = "UPDATE assign set fullname='$fullname',phone='$phone',date_of_birth='$date_of_birth',email='$email',address='$address',experience='$experience',gender='$gender',skills='$skills',assigncourse='$assigncourse', assigntask='$assigntask' where employee_id='$id'";
  mysqli_query($conn, $sql);
  header('location:sasign.php');
}

$sql1 = "select * from assign where employee_id = $id";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);
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
<?php include("semployeedash.php");?>  

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
      <form  method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-50">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Employee ID</label>
            <input type="text" name="id" value="<?php echo $data['employee_id']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" value="<?php echo $data['fullname'];?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label><br>
            <input type="text" name="phone" value="<?php echo $data['phone']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-calendar"></i> Date of Birth</label>
            <input type="date" name="date_of_birth" value="<?php echo $data['date_of_birth']?>" max="<?php echo (new DateTime())->format('Y-m-d'); ?>" readonly='readonly' required class="form-control input-sm"><br>

            <label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" value="<?php echo $data['email']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-home"></i> Address</label>
            <input type="text" name="address" value="<?php echo $data['address']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-history"></i> Experience</label>
            <input type="text" name="experience" value="<?php echo $data['experience']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-mercury"></i> Gender</label>
            <input type="text" name="gender" value="<?php echo $data['gender']?>" readonly='readonly' required class="form-control input-sm">

            <label class="control-label text-primary"><i class="fa fa-book"></i> Assigned course</label>
            <input type="text" name="assigncourse" value="<?php echo $data['assigncourse']?>" readonly='readonly' required class="form-control input-sm">
  
            <label class="control-label text-primary"><i class="fa fa-upload"></i> Assign Task</label>
            <input type="file" name="assigntask" required><br>

          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you wanna assign?')">Assign Task</button><br><br>
      </form>
    </div>
  </div>
 </div>
  </div>
</body>
</html> 