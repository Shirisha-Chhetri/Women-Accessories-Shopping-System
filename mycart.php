<style type="text/css">
.mycart{
	margin-top: 7pc;
}
</style>

<?php  require"header.php";
  require "nav.php";

if(isset($_SESSION['user1'])){?>

<div class="container-fluid">
	<div class="row mycart">
		<div class="col-md-10 text-center border rounded my-4 mx-5" style="background-color: #e79db2;">
			<h2>My Cart</h2>
		</div>
		<div class="col-md-9 ">
			<table class="table">
				<thead class="text-center">
				<tr>
				  <th scope="col">SN</th>
				  <th scope="col">Product_Name</th>
				  <th scope="col">Price</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Total</th>
				  <th scope="col"></th>
				</tr>
				</thead>
				<tbody class="text-center">
					<?php 					 	
					$sr=0;
					if(isset($_SESSION['cart'])){
						foreach ($_SESSION['cart'] as $key => $value) {
							$sr=$key+1;
							echo "
								<tr>
								<td>$sr</td>
								<td>$value[Name]
								<input type='hidden' name='Name' value='$value[Name]'></td>
								<td>
								$value[Price]
								<form method='POST' action='managecart.php'>
								<input type='hidden' class='iprice' value='$value[Price]'>
									</form>
								
								</td>
								<td>
								<form method='POST' action='managecart.php'>
									<input onchange='this.form.submit()' type='number' class='iquantity'  value='$value[Quantity]' min='1' max='10' name='mod_quantity'>
									<input type='hidden' name='Name' value='$value[Name]'>
									</form>
								</td>
								<td class='itotal'></td>

								<td>
									<form method='POST' action='managecart.php'>
									<button name='remove_item' class='btn btn-outline-danger btn-sm' >Remove</button>
									<input type='hidden' name='Name' value='$value[Name]'>
									</form>
								</td>
								</tr>";					
				}			
				}			
				?>

				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<div class="border rounded bg-light p-4 mx-1">
				<h4>Grand Total:(Rs)</h4>

				<?php if(isset($_SESSION['cart']) && COUNT($_SESSION['cart']) > 0){ ?>
				<form method="post" action="StripePayement.php" class="form">
					<div class="form-check">
					<input type="hidden" id="pay" name="TotalAmount" >
					<h5 id="gtotal" class="text-center my-3"></h5>

					<button type="submit" name="make_purchase" class=" my-2 btn btn-primary btn-block">Make purchase</button>

					<?php 
					if(isset($_SESSION['cart'])){
					$_SESSION['url'] = $_SERVER['REQUEST_URI'];} ?>
				</form>
			<?php } 
			?>
			<a href="<?php echo $GLOBALS['siteurl'] ?>/home.php" class="btn btn-info w-100">Add Items</a>
			</div>
		</div>
	</div>
</div>
<?php }
else{
	header("location:login.php");
} ?>

<?php require"footer.php";?>

<script type="text/javascript">
	var gt=0;
     var iprice = document.getElementsByClassName('iprice');
     var iquantity = document.getElementsByClassName('iquantity');
     var itotal = document.getElementsByClassName('itotal');
     var gtotal = document.getElementById('gtotal');

         function SubTotal()
         {
            gt=0;
                for(i=0;i<iprice.length;i++)
                {
                    itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                    gt=gt+(iprice[i].value)*(iquantity[i].value);
                }
               gtotal.innerText=gt;
               document.getElementById('pay').value =gt;
               document.getElementById('pay1').value =gt;
               document.getElementById('pay2').value =gt;
     }
SubTotal();
</script>