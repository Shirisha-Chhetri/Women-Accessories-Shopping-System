<div id="sec1">
      <div class="container">
        <div class="row"> 
          <div class="col-md-4">
             <ul class="excess">
              <li><a>Connect Us:</a></li>
                <li><i class="fa fa-facebook"></i></li>
                <li><i class="fa fa-google"></i></li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-instagram"></i></li>
           </ul> 
         </div>
         <div class="col-md-4"></div>

         <div class="col-md-4">
          <?php
           session_start();
           if (isset($_SESSION['user1'])) {

                echo '<div class="dropdown">
                  <img src="image/human.png" class="header">
                  <div class="dropdown-content">
                    <a href="myorder.php">MyOrders</a>
                    <a href="logout.php">Logout</a>
                    <i class = "fa fa-sign-out><a href="logout.php?php"></a></i>
                  </div>
                  </div>';
                  echo '<div class="hello"> Hello!'
                 ." ". $_SESSION['name'];
                 '</div>';  
             }
            else{
              echo '<ul class="log"><li class="bar"><button class="button" id="b"><a href="login.php">Log In</a></button></li>
              <li class="bar"><button class="button" id="b1"><a href="signin.php">Sign Up</a></button></li></ul>';
            }
       

      $count=0;
      if(isset($_SESSION['cart']))
      {
        $count=count($_SESSION['cart']);
      }
       ?>
       
      <a href="<?php echo $GLOBALS['siteurl'] ?>/mycart.php" class="fa fa-shopping-cart cart"> (<?php echo $count; ?>)</a>
          
              
            </div>
          </div>
        </div>
    </div>
    
      <div id="sec2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
           <a href="home.php" class="name" style="text-decoration: none;">PEACH BLOSSOM</a>
          </div>
         
           
          </div>
          </div>
        </div>

          <div id ="sec3">
            <div class="container-fluid">
              <?php 
             $conn = new mysqli("localhost","root","","peachblossom");
             $sql = "SELECT * FROM category ORDER BY category_id ASC";
             $result = $conn->query($sql);

              if($result->num_rows>0){
              while($row=$result->fetch_assoc()){?>

            <ul class="nav justify-content-center ul">
            <li class="nav-item">
              <img src="Admin/productimage/<?php echo $row['IMAGE'];?>" class="modify"><br>
            <a class="nav-links" href="http://localhost/MIS_Site/category.php/?cat=<?php echo $row["CATEGORY_ID"]; ?>" style="text-align: center;"><?php echo $row['CATEGORY_NAME'];?></a><br>
            </li>
          </ul>
          <?php 
            }
          }
        ?>       
          </div>
        </div>