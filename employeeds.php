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
            $sql = "SELECT * FROM employee WHERE employee_id=1";
            $result = $conn->query($sql);
            $n = $result->num_rows;
            if ($n != 0) {
                $mes = '<span class="badge pull-right">' . $n . ' Unread</span>';
            } else {
                $mes = "";
            }
            ?>

            <h3 class="text-primary"> Welcome, Employee!</h3>
            <hr>

            <ul class="nav nav-stacked">
                <!--<li><a href="admin_inbox.php"><i class="fa fa-envelope fa-lg"></i> Inbox <?php echo $mes;?></a></li>-->
                <li><a href=""><i class=""></i></a></li>
                <li><a href=""><i class=""></i></a></li>
                <li><a href=""><i class=" fa fa-home "></i> Home </a></li>
                <li><a href="etraining.php"><i class="fa fa-info-circle"></i> Training Details </a></li>
                <li><a href="etraining.php"><i class="fa fa-history"></i> History </a></li>
                <li><a href=""><i class=" fa fa-phone "></i> Contact Us </a></li>

                <hr>

            </ul>

            <hr>
        </div>

        <div class="col-sm-9">
            <center><h1 class="text-primary"><i class="fa fa-info-circle"></i> TRAINING DETAILS </h1><hr></center>
            <!-- Add your content here -->
        </div>
    </div>
</body>
</html>
