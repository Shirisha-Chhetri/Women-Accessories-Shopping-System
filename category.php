<?php $GLOBALS['siteurl'] ="http://localhost/MIS_Site";?>

<head>
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../css/head.css">
   <link rel="stylesheet" type="text/css" href="../css/home.css">
   <style type="text/css">
    .im{
  margin-top:1pc;
  height:23pc;
  width:74pc;
  margin-left: -3pc;
}
legend{
  width: auto!important;
  margin-left: 1pc;
}
fieldset{
  border:0 !important;
  border-width: 2px !important;
    border-style: groove !important;
    border-color: threedface !important;
    border-image: initial !important;
    margin-top: 1pc  !important;
    width: 121%;
    margin-left: 1pc;
}
.card-img-top{
  height: 16pc;
}
.btn-primary{
  background-color: #e79db2!important;
  border-color:#e79db2!important ;
}
.product1{
  height:27pc;
  float: left;
  margin-left: 9px;
}
   </style>
</head>
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
                  <img src="../image/human.png" class="header">
                  <div class="dropdown-content">
                    <a href="#">MyOrders</a>
                    <a href="../logout.php">Logout</a>
                    <i class = "fa fa-sign-out><a href="logout.php?php"></a></i>
                  </div>
                  </div>';
                  echo '<div class="hello"> Hello!'
                 ." ". $_SESSION['name'];
                 '</div>';  
             }
            else{
              echo '<ul class="log"><li class="bar"><button class="button" id="b"><a href="../login.php">Log In</a></button></li>
              <li class="bar"><button class="button" id="b1"><a href="../signin.php">Sign Up</a></button></li></ul>';
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
           <a href="../home.php" class="name" style="text-decoration: none;">PEACH BLOSSOM</a>
          </div>
          <div class="col-md-6"></div>
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
              while($rows=$result->fetch_assoc()){?>

            <ul class="nav justify-content-center ul">
            <li class="nav-item">
              <img src="../Admin/productimage/<?php echo $rows['IMAGE'];?>" class="modify"><br>
            <a class="nav-links" href="../category.php/?cat=<?php echo $rows["CATEGORY_ID"]; ?>" style="text-align: center;"><?php echo $rows['CATEGORY_NAME'];?></a><br>
            </li>
          </ul>
          <?php 
            }
          }
        ?>       
          </div>
        </div>

         

<div class="container-fluid">
    <?php
      $conn = new mysqli("localhost","root","","peachblossom");
    if(isset($_GET['cat'])){
  $q= intval( $_GET['cat']);

  $sql = "SELECT * FROM category where category_id = $q";
  $result = $conn->query($sql);

if ( $result->num_rows > 0) {
  while($row1 = $result->fetch_assoc()) {?>
      <img src="../Admin/productimage/Accesorize-London_desktop.jpg" class="im">
  
<div class="row">
  <fieldset><legend><?php echo $row1["CATEGORY_NAME"];?></legend>
<?php
}
   }?>
<?php 
    $sql1 = "SELECT p.name, p.image,p.price,p.product_id
     FROM products p
    INNER JOIN category c
    ON p.category_id = c.category_id
    WHERE p.category_id = $q
    ORDER BY product_id DESC";

      $result1 = $conn->query($sql1);
      if($result1 !== false && $result1->num_rows>0){
        while($row=$result1->fetch_assoc()){?>
          
       <div class="col-md-2.4">
         <form method="POST" action="../managecart.php" >
             <div class="card product1" style="width:13rem; margin-right:7px;">
              <a href=""><img src="../admin/productimage/<?php echo $row['image'];?>" class="card-img-top" alt="..."></a>   
                <div class="card-body">
                    <div class="title">
                    <h6 class="card-title"><?php echo $row['name'];?></h6>
                    </div>
                      <div class="price">
                    <p>Rs.<?php echo $row['price'];?></p>
                  </div>
                </div>
                 <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>

                  <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">
                  <input type="hidden" name="Name" value="<?php echo $row['name'];?>">
                  <input type="hidden" name="Price" value="<?php  echo $row['price'];?>">
                  </div>
                </form>
                </div>
              <?php 
    }
  }
  else{
   echo "<div class=' text-center'> <h1>No product Yet</h1></div>";
  }
} 
$conn->close();
?> 
</fieldset>
</div>
</div>

<?php include "footer.php";?>