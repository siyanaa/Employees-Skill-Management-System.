<?php
$conn=mysqli_connect('localhost','root','','esms.');
	
require('stripe-php/init.php'); 

$publishablekey="pk_test_51NLggOFj8zf0KYZKtPw0eUkzayblJ1PldTbeiCGmrY9BHsxsYSDwRx3dM26OhSDHJxWT8alQVZ29GKkATyXZFADd00kEGc0xIr";

$secretkey="sk_test_51NLggOFj8zf0KYZKsvsU3BYOReCUVMQdTUcNRK789dIH8fzccI9kkraZ2GUZFOdAOYxyuVNOwsRcClICxD8Swjsj00jtGiYUWb";

\Stripe\Stripe::setApikey($secretkey);
?>