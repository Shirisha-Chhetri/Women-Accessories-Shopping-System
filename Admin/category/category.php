<?php
session_start();
   if (!isset($_SESSION['user'])) {
     header('location: http://localhost/MIS Site/Admin/login.php');
   }
    require "dashboard.php";
  ?>

    <?php
	$erna=$erim="";
	 $conn = new mysqli("localhost","root","","peachblossom");
	if (isset($_POST['category'])) {
		$category = $_POST['name'];

		 if (empty($name)) {
        $erna= "Name cannot be empty";
	      }
	      else if (is_numeric($name)) {
	          $erna= "Name cannot be numeric";
	       }
   
     $image1 = $_FILES['image']['name']??"";
 
	  $target_dir = "upload/";
	  $target_file = $target_dir.basename($image1);
	  $uploadOk = 1;
	  $imagefiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	   if (empty($image1)) {
	      $erim = "Image is not choosen";
	      $uploadOk = 0;
	    }
	    # check if file already exists
	  else if (file_exists($target_file)) {
	    $erim = "Sorry, image already exists.";
	    $uploadOk = 0;
	  }
	  //check file size
	  else if (($_FILES["image"]["size"] > 5000000)) {
	    $erim ="Sorry, your file is too large";
	    $uploadOk = 0;
	  }

	  // Check if $uploadOk is set to 0 by an error
	   else if ($uploadOk == 0) {
	   $erim ="Sorry, your file was not uploaded.";
	  // if everything is ok, try to upload file
	  } 
  		else {
      if ((move_uploaded_file($_FILES["image"]["tmp_name"]??"", $target_file))){
      $erim = "The image has been uploaded";
        if ($category && $image1) {
      $sql="INSERT INTO category(category_name,image) 
      VALUES('$category','$image1')";

      if ($conn->query($sql)==TRUE) {
                  echo '<script>alert("Category is added");
                  window.location="category.php";</script>';
                }
                else{
                  echo "Error creting table: ".$conn->error;
                }
      } 
    else {
    $erim = "Sorry, there was an error uploading your file.";
      }
    }
  }  
  }      
?>

<style type="text/css">
	.error{
		color: red;
	}
</style>

 <div class="main">
<div class="row my-5">
	<div class="col-md-4">
		<form method="post" action="" name="sign" enctype="multipart/form-data">
			<div class="form-group">

				<span style="font-size:22px;"><b>Add Category</b></span><br><br>

			  	Name: <input class="form-control" type="text" name="name"><span class="error"><?php echo $erna;?></span><br>

				Image:<input class="form-control" type="file" name="image" accept="image/*"><span class="error"><?php echo $erim;?></span><br>

				<button type="submit" class="btn btn-block btn-primary my-3" name="category" onclick="return add()">Add New Category</button>
			</div> 
		 </form>
	</div>
	
		<div class="col-md-8">
		<h2 class="ml-5">All Categories</h2>
		<div class="col-md d-flex justify-content-center">
<table class="table" border="2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  $sql = "SELECT * FROM category ORDER BY category_id DESC ";
       
        $result = $conn->query($sql);
        if($result->num_rows>0){

        while($row=$result->fetch_assoc()){
        	$_SESSION['catid'] = $row['CATEGORY_ID'];
          ?>
  <tbody>
    <tr>
      <td><?php echo $row['CATEGORY_ID'];?></td>
       <td><?php echo $row['CATEGORY_NAME'];?></td>
      <td><img class="img" src="../productimage/<?php echo $row['IMAGE'];?>">
      </td>
      <td><a href="edit.php?editcategory=<?php echo $row["CATEGORY_ID"];?>"><button class="btn btn-success">Edit</button></a>
      <a href="delete.php?deletecategory=<?php echo $row["CATEGORY_ID"];?>"><button class=" btn btn-danger">Delete</button></a>
      </td>
     
    </tr>
  </tbody>
  <?php
}}?>
</table>
</div>
</div>
</div>
</div>

<?php include('../../js.php');?>