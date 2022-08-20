<?php require"header.php"; 
require"nav.php"; 
$conn =new mysqli('localhost','root', '','peachblossom');

if(isset($_POST['cancel_payment'])){?>
<?php unset($_SESSION['cart']);?>
<script>alert("Payment cancel successfully");
window.location="home.php";</script>";
					<?php } ?>
<?php	
if(isset($_SESSION['cart'])){
if(isset($_SESSION['user1'])){
if(isset($_POST['make_purchase'])){
	$re = $_POST['TotalAmount'];
		foreach ($_SESSION['cart'] as $key => $val){
		$check_price = "SELECT price FROM products WHERE product_id='$val[id]' ";
				$ch = $conn->query($check_price);
				if($ch->num_rows>0){
					while($row=$ch->fetch_assoc()){
						if($row['price']!= $val['Price']){
							 unset($_SESSION['cart']);
							echo "<script>alert('Product price is modified ! please re-select the items');
							window.location.href='allproduct.php';</script>";
						}						
					}
				}
			}
			?>

			<?php require"config.php";?>
			<div class="d-flex justify-content-center container">
				<div class="payment text-center">
					<h2 class="my-3">PAYMENT</h2>
					<form action="submit.php" method="post">
			<script
			src="https://checkout.stripe.com/checkout.js"
			class="stripe-button"
			data-key = "<?php echo $publishableKey ?>"
			data-amount ="<?php echo $re * 100; ?>"
			data-name ="Peach Blossom"
			data-description="Accessorize Yourself !"
			data-image="image/bg.jpg"
			data-currency="INR"
			></script>
			<input type="hidden" name="hidden" value="<?php echo $re ?>">
			</form>

				<div class="mt-4 cancel">
					<form method="POST" action="">
						<button type="submit" name="cancel_payment" class="btn btn-danger">Cancel payment</button>
					</form>
				</div>
				</div>
			</div>
	<?php
		}
	}
	else{
		echo "<script>alert('Please Login first')</script>";
		header("location:login.php");
	}
}

?>
<?php include("footer.php");?>