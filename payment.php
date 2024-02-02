<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','esms.');
if(isset($_POST['submit'])){
  $fullname=$_POST['fullname'];
  $payment=$_POST['payment']; 
  $dueamount=$_POST['dueamount'];
  $id=$_POST['id'];

  $sql="UPDATE trainer set fullname='$fullname',payable_amount='$payable_amount',due_amount='$due_amount' where trainer_id='$id'";
  mysqli_query($conn,$sql);
  header('location:');

}
$sql1 = "SELECT * FROM trainer WHERE trainer_id = $id";
$res = mysqli_query($conn, $sql1);
$data = mysqli_fetch_assoc($res);
$payment = $data['payment'];
$dueamount = $data['dueamount']; 
?>
	     
     <?php include("apaymentdash.php");?>  
     <?php include("head.php");?>  

<?php 
  require("configuration.php");
?>

<form action="submit.php" method="post">
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
  margin-top: 50px;
}

.col-50 {
  margin-bottom: 0px; 
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
      <form  method="post">
        <div class="row">
          <div class="col-50">
            <label class="control-label text-primary"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fullname" value="<?php echo $data['fullname'];?>" required class="form-control input-sm">
            <label class="control-label text-primary"><i class="fa fa-dollar"></i> Payable Amount</label>
            <input type="text" name="payment" value="<?php echo $data['payment']?>"required class="form-control input-sm"  >
            <label class="control-label text-primary"><i class="fa fa-dollar"></i> Due Amount</label>
            <input type="text" name="dueamount" value="<?php echo $data['dueamount']?>"required class="form-control input-sm"  ><br>

          </div>
        </div>
     
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="<?php echo $publishablekey?>"
  data-amount="$payment+$dueamount"
  data-name="ESMS"
  data-description="ESMS Desc"
  data-currency="usd"
></script>

	
</form>


