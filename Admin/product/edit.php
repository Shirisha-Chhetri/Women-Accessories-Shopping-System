<?php 
	session_start();
   if (!isset($_SESSION['user'])) {
     header('location: http://localhost/MIS Site/Admin/login.php');
   }
	require "dashboard.php";?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../..//bootstrap/bootstrap.min.css">
</head>
<style type="text/css">
	.myima{
		height:15pc;
		width:20pc;
	}
	.error{
		color: red;
	}
</style>
<body>
	<?php 
		$erna=$erd=$erp=$ert="";
		$conn = new mysqli("localhost","root","","peachblossom");
		$product= $_GET['editproduct'];
		$sql = "SELECT * FROM products WHERE PRODUCT_ID=$product";
		$result = $conn->query($sql);

		if (isset($_POST['update'])) {
		
		$old_image = $_POST['first'];
		$new_image = $_FILES['image1']['name']??"" ;

		if ($new_image !="") {
 			$updated = $new_image;
 		}
 		else{
 			$updated = $old_image;
 		}
			$name = $_POST['name'];
			$price = $_POST['price'];

	   if (empty($name)) {
        $erna= "Category Name cannot be empty";
      }
      if (is_numeric($name)) {
          $erna= "Category Name cannot be numeric";
       }

       if (empty($price)) {
        $erp= "Price cannot be empty";
      }
      if (!is_numeric($price)) {
          $erp= "Price must be in numeric";
       }
       if ($price < 100) {
          $erp= "Price must be greater than 100";
       }
       
 			else{
 				 if ($name && $product && $price ) {
 			$upcategory= "UPDATE products SET NAME='{$name}',IMAGE='{$updated}',PRICE='{$price}' WHERE PRODUCT_ID = $product";
			$result = mysqli_query($conn,$upcategory);
			
 			if($result){
				if($new_image != ''){
				if($new_image != $old_image){
					move_uploaded_file($_FILES['image1']['tmp_name'],"upload/".$new_image);
					unlink("upload/".$old_image);	
				}
			}
				?>
			<script type="text/javascript">
					alert("Product is updated");
					window.location="allproduct.php";
				</script>

				<?php
			}
    		
					}
			// 		else{
			// 	echo '<script type="text/javascript">
			// 		alert(" Images are not updated");
			// 	</script>';
			// }
				}
			}				
 			?>

		<div id="sec">
		<div class="main">
		<div class="row my-5">
			<div class="col-md-4 offset-md-4">

			<?php 
	        if($result !== false && $result->num_rows>0){
	        while($row = $result->fetch_assoc()){  ?>

				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">

				<span style="font-size:22px;"><b>Update Category</b></span><br><br>

				Name: <input class="form-control" type="text" name="name" value="<?php echo $row['NAME'];?>">
				<span class="error"><?php echo $erna;?></span><br>

				Image:
				<input class="form-control" type="file" name="image1" accept="image/*"><br>
				<input type="text" name="first" value="<?php echo $row['IMAGE'];?>" >
				<img src="../productimage/<?php echo $row['IMAGE'];?>" class="myima">	<br><br>

				Price: <input class="form-control" type="text" name="price" value="<?php echo $row['PRICE'];?>">
				<span class="error"><?php echo $erp;?></span><br>
				
				<button type="submit" class="btn btn-block btn-primary my-3" name="update">Update</button>
					</div> 
				 </form>
				<?php 
				}
			}
			$conn->close();
			?>
			</div>
		</div>
	</div>
</div>
</body>
</html>