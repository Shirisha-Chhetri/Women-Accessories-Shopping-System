<?php 
	session_start();
   if (!isset($_SESSION['user'])) {
     header('location:http://localhost/MIS Site/Admin/home.php');
   }
		$product = intval($_GET['deleteproduct']);
        require "dashboard.php";
		$conn = new mysqli("localhost","root","","peachblossom");

		$sq = "SELECT * FROM products WHERE product_id = $product";
		$result1 = mysqli_query($conn,$sq);
		$row = mysqli_fetch_assoc($result1);
		unlink("upload/".$row['IMAGE']);

		$sql = "DELETE FROM products WHERE product_id = $product";
		
		$result = mysqli_query($conn,$sql);
		if ($result) {?>
		 	<script type="text/javascript">
				alert("Product is deleted");
				window.location="allproduct.php";
			</script>
			<?php
		}
		?>