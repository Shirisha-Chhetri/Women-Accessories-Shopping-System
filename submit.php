<?php require"header.php" ?>
<?php
session_start();
$conn =new mysqli('localhost','root', '','peachblossom');

if(isset($_SESSION['user1'])){
if(isset($_SESSION['cart'])){
	if(isset($_POST['hidden'])){
	$r = $_POST['hidden'];
 require"config.php"; 
$token = $_POST['stripeToken'];
\Stripe\Stripe::setVerifySslCerts(false);
$data=Stripe\Charge::create(array(
	"amount"=> "$r",
	"currency"=>"INR",
	"description"=>"Peach Blossom",
	"source"=>$token
));
$date=date("Y-m-d");
$tid= $data->payment_method;
$status = "Pending";

foreach ($_SESSION['cart'] as $key => $value){

$sql="INSERT INTO orders(transaction_id,product_name,price,quantity,customer,ordered_date, order_status)
VALUES('$tid','$value[Name]','$value[Price]','$value[Quantity]','$_SESSION[customer]','$date','$status')";

if($conn->query($sql)==TRUE){
echo "<script>alert('Purchase is done successfully');
	window.location.href='home.php';</script>";				 
}
else{
"Error".$sql."<br>".$conn->error;
}
}
	}
	}
 }
?>