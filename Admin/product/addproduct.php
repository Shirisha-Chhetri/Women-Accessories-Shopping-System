<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         
        
   $erna=$erim=$erp=$ercat="";
    $conn = new mysqli("localhost","root","","peachblossom");
   if (isset($_POST['product'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $cat = $_POST['category'];

       if (empty($name)) {
        $erna= "Name cannot be empty";
         }
         else if (is_numeric($name)) {
             $erna= "Name cannot be numeric";
          }

      if (empty($price)) {
        $erp= "Price cannot be empty";
         }
         else if (!is_numeric($price)) {
             $erp= "Price must be in numeric";
          }
          else if($price < 150){
            $erp="Price must be greater than 150";
          }
        if ($cat == -1) {
            $ercat= "Category is not choosen";
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

        if ($name && $image1 && $price && $cat) {
             $query="SELECT * FROM category WHERE CATEGORY_ID = $cat";
            $re = $conn->query($query);
          
           if($re->num_rows>0){ 
            while($row=$re->fetch_assoc()){
                $_SESSION['category'] = $row['CATEGORY_ID'];
            

      $sql="INSERT INTO products(name,image,price,category_id) 
      VALUES('$name','$image1','$price','".$_SESSION['category']."')";

      if ($conn->query($sql)==TRUE) {
                  echo '<script>alert("Product is added");
                  window.location="allproduct.php";</script>';
                }
                else{
                  echo "Error creting table: ".$conn->error;
                }
      }
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
   <div class="col-md-4 offset-md-4">
      <form method="post" action="" name="sign" enctype="multipart/form-data">
         <div class="form-group">

            <span style="font-size:22px;"><b>Add Products</b></span><br><br>

            Name: <input class="form-control" type="text" name="name"><span class="error"><?php echo $erna;?></span><br>

            Image:<input class="form-control" type="file" name="image" accept="image/*"><span class="error"><?php echo $erim;?></span><br>

            Price: <input class="form-control" type="text" name="price"><span class="error"><?php echo $erp;?></span><br>

            <?php 
              $conn = new mysqli("localhost","root","","peachblossom");                                  
            $sql = "SELECT * FROM category";
                   ?>
                   
                    Category: <select name="category">
                      <option value="-1">Select category</option>
                    <?php 
                    $result = $conn->query($sql);
                      
                    if($result->num_rows>0){
                    while($row = mysqli_fetch_assoc($result)){
                      $_SESSION['category']=$row['CATEGORY_ID'];?>
                      
                    
                   <option value="<?php echo $row['CATEGORY_ID'];?>">
                  
                        <?php echo $row['CATEGORY_NAME'];?></option>
                   <?php 
                 }
               }?>
            </select><p class="error"><?php echo $ercat;?></p>

            <button type="submit" class="btn btn-block btn-primary my-3" name="product" onclick=" return product()">Add New Product</button>
         </div> 
       </form>
   </div>
</div>
</div>

<?php include ('../../js.php');?>