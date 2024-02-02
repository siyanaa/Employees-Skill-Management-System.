<!DOCTYPE html>
<?php include "head.php";?>
<?php include "trainer_dashboard.php";?>
<html>
<head>
  <title></title>
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
          <form method="post">
            <div class="row centered-form">
              <div class="col-50">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'esms.');
                $sql = "SELECT * FROM trainer";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                ?>
                <center>
                  <label class="control-label text-primary"><i class="fa fa-clock-o"></i> Are you available at the training period?</label><br>
                  <a href="tassign.php?id=<?php echo $data['trainer_id']; ?>"><button type="button" class="btn btn-primary">Enter your status.</button></a>
                  
                </center>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
