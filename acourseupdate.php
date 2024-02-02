<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','esms.');
if(isset($_POST['submit'])){
  $coursename=$_POST['course_name'];
  $startdate=$_POST['start_date'];
  $enddate=$_POST['end_date'];
  $time=$_POST['time'];
  $id=$_POST['id'];

  $sql="UPDATE course set course_name='$coursename',start_date='$startdate',end_date='$enddate',time='$time' where course_id='$id'";
  mysqli_query($conn,$sql);
  header('location:acourse.php');

}
$sql1="select * from course where course_id = $id";
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
            <label class="control-label text-primary"><i class="fa fa-user"></i> Course ID</label>
            <input type="text" name="id" value="<?php echo $data['course_id']?>" readonly='readonly' required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-book"></i> Course Name</label>
            <input type="text" name="course_name" value="<?php echo $data['course_name'];?>" pattern="[A-Za-z]+" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-calendar"></i> Start Date</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo $data['start_date'];?>" min="<?php echo (new DateTime())->format('Y-m-d'); ?>" required class="form-control input-sm" onchange="updateEndDateMin()" ><br>

            <label class="control-label text-primary"><i class="fa fa-calendar"></i> End Date</label>
            <input type="date" id="end_date" name="end_date" value="<?php echo $data['end_date'];?>" min="<?php echo (new DateTime())->format('Y-m-d'); ?>" required class="form-control input-sm" ><br>

         <script>
         function updateEndDateMin() {
         // Get the start date value
          var startDate = document.getElementById('start_date').value;
    
    // Set the min attribute of the end date input to the start date value
    document.getElementById('end_date').min = startDate;
}
</script>
            <label class="control-label text-primary"><i class="fa fa-clock-o"></i> Time</label>
            <input type="text" name="time" value="<?php echo $data['time']?>" pattern="\d{2}:\d{2} (AM|PM)" required class="form-control input-sm"  >
            

          </div>

          
        </div>
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you wanna edit?')">Edit Course</button><br><br>
      </form>
    </div>
  </div>
 </div>
  </div>
</body>
</html>