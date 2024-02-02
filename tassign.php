<?php
error_reporting(E_ALL & ~E_NOTICE); // Set error reporting to exclude E_NOTICE

// Start or resume the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id = $_GET['id'];
$username = $_SESSION['name'];
$conn = mysqli_connect('localhost', 'root', '', 'esms.');

$id=$_GET['id'];
if(isset($_POST['submit'])){
  $fullname=$_POST['fullname'];
  $phone=$_POST['phone'];
  $email=$_POST['email']; 
  $experience=$_POST['experience'];
  $gender=$_POST['gender'];
  $course=$_POST['course'];
  $hourly_charge=$_POST['hourly_charge'];
  $status=$_POST['status'];
  $id=$_POST['id'];

  $sql="UPDATE availabletrainer set fullname='$fullname',phone='$phone',email='$email',experience='$experience',gender='$gender',course='$course',hourly_charge='$hourly_charge',status='$status' where trainer_id='$id'";
  mysqli_query($conn,$sql);
  header('location:tavailable.php');

}
$sql1 = "SELECT * FROM availabletrainer WHERE username = '$username'";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
    form {
      max-width: 600px;
      margin-right: 100px;
      margin-left: 140px;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 15px;
      margin-bottom: 50px;
      margin-top: 50px;
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
    
    .content {
      display: flex;
      justify-content: flex-start;
      align-items: flex-start;
    }
    
    .col-75 {
      flex-grow: 1;
      margin-left: 0px;
    }
    
    .container {
      width: 100%;
    }
  </style>
</head>
<body>
<?php include("admin_head.php"); ?>
<?php include("dashboard_topnav.php"); ?>
<?php include("trainer_dashboard.php"); ?>


<div class="content">
  <div class="row">
    <div class="columns">
      <h1></h1>
    </div>

    <div class="columns"></div>
  </div>
   
  <br><br>

  <h2 style="text-align:center;"></h2>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form method="post">
          <div class="row">
            <div class="col-50">
              <label class="control-label text-primary"><i class="fa fa-user"></i> Trainer ID</label>
              <input type="text" name="id" value="<?php echo isset($data['trainer_id']) ? $data['trainer_id'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" name="fullname" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone Number</label><br>
              <input type="text" name="phone" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-history"></i> Experience</label>
              <input type="text" name="experience" value="<?php echo isset($data['experience']) ? $data['experience'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-mercury"></i> Gender</label>
              <input type="text" name="gender" value="<?php echo isset($data['gender']) ? $data['gender'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-book"></i> Course</label>
              <input type="text" name="course" value="<?php echo isset($data['course']) ? $data['course'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-dollar"></i> Rate Per Class</label>
              <input type="text" name="hourly_charge" value="<?php echo isset($data['hourly_charge']) ? $data['hourly_charge'] : ''; ?>" readonly="readonly" required class="form-control input-sm">
              <label class="control-label text-primary"><i class="fa fa-check-circle"></i> Status</label>
              <select name="status" class="form-control input-sm" required>
              <option value="">Select Status</option>
              <option value="Available" <?php echo (isset($data['status']) && $data['status'] === 'Available') ? 'selected' : ''; ?>>Available</option>
              <option value="Not Available" <?php echo (isset($data['status']) && $data['status'] === 'Not Available') ? 'selected' : ''; ?>>Not Available</option>
              </select><br>
              
          <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Your training class will be assigned or rejected on the basis of this, are you sure you want to submit?')">Submit</button><br><br>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
