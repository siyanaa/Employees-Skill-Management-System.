<?php
require("configuration.php");

\Stripe\Stripe::setVerifySslCerts(false);

$token = $_POST['stripeToken'];

$payment = $_POST['payment'] ?? 0;
$dueamount = isset($_POST['dueamount']) && $_POST['dueamount'] !== '' ? $_POST['dueamount'] : null;

$amount = $payment + $dueamount;

$data = \Stripe\Charge::create(array(
    "amount" => $amount,
    "currency" => "usd",
    "description" => "ESMS Desc",
    "source" => $token,
));

echo '<pre>';
print_r($_POST);
?>
