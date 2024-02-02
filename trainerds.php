<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("admin_head.php"); ?>
</head>
<body>
    <?php include("dashboard_topnav.php"); ?>
    <div class="container" style='margin-top:70px;'>
        <div class="col-sm-3">
            <?php
            $sql = "SELECT * FROM trainer WHERE trainer_id=1";
            $result = $conn->query($sql);
            $n = $result->num_rows;
            if ($n != 0) {
                $mes = '<span class="badge pull-right">' . $n . ' Unread</span>';
            } else {
                $mes = "";
            }
            ?>

            <h3 class="text-primary"> Welcome, Trainer!</h3>
            <hr>

            <ul class="nav nav-stacked">
            <li><a href=""><i class=""></i></a></li>
	<li><a href=""><i class=""></i></a></li>
	<li><a href=""><i class=" "></i>  </a></li>
	<li><a href="index.php"><i class=" fa fa-home "></i> Home </a></li>
	<li><a href="ttrainingdetails.php"><i class=" fa fa-info-circle "></i> Training Details </a></li>
	<li><a href="tavailable.php"><i class=" fa fa-check-circle "></i> Status </a></li>
	<li><a href="contact.php"><i class=" fa fa-phone "></i> Contact us </a></li>
                <hr>

            </ul>

            <hr>
        </div>

        <div class="col-sm-9">
            <center><h1 class="text-primary"><i class="fa fa-check-circle"></i> TRAINER STATUS </h1><hr></center>
            <!-- Add your content here -->
        </div>
    </div>
</body>
</html>
