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
        $id=$_POST['course_id'];
        $coursename=$_POST['course_name'];
        $startdate=$_POST['start_date'];
        $enddate=$_POST['end_date'];
        $time=$_POST['time'];
        if(empty($id) || empty($coursename) || empty($startdate) ||  empty($enddate) || empty($time)){
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
             $sql2= mysqli_query($conn,"INSERT INTO course(
            course_id,course_name,start_date,end_date,time)
            VALUES('$id','$coursename','$startdate','$enddate','$time')");
        if(mysqli_affected_rows($conn)==1){
			
        header('location: acourse.php');
    }
    }
}
    ?>
	
<!DOCTYPE html>
<?php include"head.php";?>
<?php include"top_nav.php";?>
<?php include"acoursedash.php";?>
<html>
<head>
  <title>Add Course!</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
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

<h1 style="color:#FF1744;Times New Roman;padding-top:0px;">
<center>
<i class=""> </h1></i>
</center>
<div class="container" style='margin-top:40px;'>

<div class="row">
  <div class="col-md-12">
    
      <form  method="post">
        <div class="row centered-form">
          <div class="col-50">
            <?php
            $sql1="SELECT course_id from course ORDER BY course_id DESC LIMIT 1;";
            $result1= mysqli_query($conn,$sql1);
            $row1= mysqli_fetch_assoc($result1);

            if(mysqli_num_rows($result1)>0){
                $val=$row1['course_id'] + 1;
            }
            else{
                $val = 1;
            }
            ?>
	
		  <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Course ID</label>
        
			<input type="text" id="course_id" name="course_id" required pattern="[0-9]+" readonly='readonly' required class="form-control input-sm" value="<?php echo $val?>"?>

		 </div><br>
            <div class="form-group">
            <label class="control-label text-primary"><i class="fa fa-book"></i> Course Name</label>
            <input type="text" name="course_name" placeholder="" pattern="[A-Za-z]+" required class="form-control input-sm">
			</div><br>

      <label class="control-label text-primary"><i class="fa fa-calendar"></i> Start Date</label>
<input type="date" id="start_date" name="start_date" placeholder="" min="<?php echo (new DateTime())->format('Y-m-d'); ?>" required class="form-control input-sm" onchange="updateEndDateMin()" ><br>

<label class="control-label text-primary"><i class="fa fa-calendar"></i> End Date</label>
<input type="date" id="end_date" name="end_date" placeholder="" min="<?php echo (new DateTime())->format('Y-m-d'); ?>" required class="form-control input-sm" ><br>

<script>
function updateEndDateMin() {
    // Get the start date value
    var startDate = document.getElementById('start_date').value;
    
    // Set the min attribute of the end date input to the start date value
    document.getElementById('end_date').min = startDate;
}
</script>


			<label class="control-label text-primary"><i class="fa fa-clock-o"></i> Time</label>
            <input type="text" name="time" placeholder="" pattern="(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM)"  required class="form-control input-sm"><br>
			 
				  <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
				</div>
          </div>
          </div>
		  
        </div>
         
      </form>
    
  </div>
 </div>
  
</body>
</html>