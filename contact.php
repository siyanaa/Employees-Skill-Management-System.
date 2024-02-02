<?php include"config.php";?>
<!DOCTYPE html>
<html lang="en">
<?php include"head.php";?>
<body>

<?php
	 include"top_nav.php";
?>
    <div class="container" style="margin-top:70px;">

			<div class="row">
				<div class="col-md-8">
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
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        if(empty($name) || empty($phone) || empty($email) ||  empty($message)){
      echo "Don't leave any empty field"; 
    }

    $sql2 = mysqli_query($conn, "INSERT INTO message(name, phone, email, message) VALUES('$name', '$phone', '$email', '$message')");
    if (mysqli_affected_rows($conn) == 1) {
        echo '
        <div class="alert alert-success success-message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Your message has been successfully sent.
        </div>';
    }
    }
    ?>
   
                <form method="post" action="contact.php" role="form">
                    <div class="control-group form-group">
                        <div class="controls">

                        <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" class="form-control" name="name" pattern="[A-Za-z ]+" required class="form-control input-sm">
                            
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">

                        <label class="control-label text-primary"><i class="fa fa-phone"></i> Phone number</label>
                            <input type="mob" class="form-control" name="phone"  pattern="98\d{8}" required class="form-control input-sm">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">

                        <label class="control-label text-primary"><i class="fa fa-inbox"></i> Email </label>
                            <input type="email" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$"required class="form-control input-sm" >
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">

                        <label class="control-label text-primary"><i class="fa fa-envelope"></i> Message</label>
                            <textarea rows="5" cols="100" class="form-control" name="message" required maxlength="999" required class="form-control input-sm" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" name="submit" required class="form-control input-sm"><i class='fa fa-send'></i> Send Message</button>
                </form>
				
			</div>
			
            <div class="col-md-4">
            <h3 style="color:red;font-family:Callibri;"class="page-header  text-primary"> Contact Details </h3>
                
            <p style="color:black;font-family:Arial;">
                    Nepal Investment Mega Bank Limited.
                    Kathmandu, Nepal. 		
                </p>

                <p style="color:black;font-family:Arial;"><i class="fa fa-phone"></i> 
                    <title="Phone"> 9851147829, 1660-01-00070</p>
                <p style="color:black;font-family:Arial;"><i class="fa fa-envelope-o"></i> 
                    <title="Email">infonimb@gmail.com</a>
                </p>
                <p style="color:black;font-family:Arial;"><i class="fa fa-clock-o"></i> 
                    <title="Hours"> Available 24 hours.</p>
                <p> 
                    <h3 style="color:red;font-family:Callibri;"class="page-header text-primary">Follow Us Here:</h3> 
                </p>    
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://www.facebook.com/NepalInvestmentMegaBankLtd"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/mega_banknepal"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/NepalInvestmentMegaBankLtd"><i class="fa fa-instagram fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>

</body>

</html>
