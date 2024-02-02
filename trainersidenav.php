
<?php 
$sql="SELECT * FROM employee WHERE employee_id=1";
$result=$conn->query($sql);
$n=$result->num_rows;
if($n!=0)
{
	$mes='<span class="badge pull-right">'.$n.' Unread</span>';
}
else
{
	$mes="";
}
?>
<h3 class="text-primary"><i class="fa fa-wave"></i> Welcome, Trainer!</h3>
<hr>
<ul class="nav nav-stacked">
	<li><a href=""><i class=""></i></a></li>
	<li><a href=""><i class=""></i></a></li>
	<li><a href=""><i class=" "></i>  </a></li>
	<li><a href="index.php"><i class=" fa fa-home "></i> Home </a></li>
	<li><a href="ttrainingdetails.php"><i class=" fa fa-info-circle "></i> Training Details </a></li>
	<li><a href="tassign.php"><i class=" fa fa-check-circle "></i> Status </a></li>
	<li><a href="contact.php"><i class=" fa fa-phone "></i> Contact us </a></li>
	
	<hr>
	
</ul>

<hr>