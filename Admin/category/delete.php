<?php 
	session_start();
   if (!isset($_SESSION['user'])) {
     header('location:http://localhost/MIS Site/Admin/home.php');
   }
		$category = intval($_GET['deletecategory']);
        require "dashboard.php";
		$conn = new mysqli("localhost","root","","peachblossom");

		$sq = "SELECT * FROM category WHERE category_id = $category ";
		$result1 = mysqli_query($conn,$sq);
		$row = mysqli_fetch_assoc($result1);
		unlink("upload/".$row['IMAGE']);

		$sql = "DELETE FROM category WHERE category_id = $category";
		
		$result = mysqli_query($conn,$sql);
		if ($result) {?>
		 	<script type="text/javascript">
				alert("Category is deleted");
				window.location="Category.php";
			</script>
			<?php
		}
		?>