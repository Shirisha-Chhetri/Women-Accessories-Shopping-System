<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../fontawesome/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../css/dash.css">
  <title>Peach Blossom</title>
</head>
<body>
      <div id="sec2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
           <a href="home.php" class="name" style="text-decoration: none;">PEACH BLOSSOM</a>
          </div>
          <div class="col-md-6">
             <?php
              if (isset($_SESSION['user'])) {

                echo '<div class="dropdown">
                  <img src="../../image/human.png" class="header">
                  <div class="dropdown-content">
                    <i class = "fa fa-sign-out" style="margin-left:1pc;"><a href="../logout.php?php">Log Out</a></i>
                  </div>
                  </div>';
                  echo '<div class="hello"> Hello!' ." ". $_SESSION['user'];
                 '</div>';
              }
              else{
                header('location:../login.php');
              }
              ?> 
          </div>
          </div>
          </div>
        </div>

          <div id ="sec3">
             <div id="mySidenav" class="sidenav">
              <a href="../home.php" id="home">Home</a>
               <a href="../contact.php" id="contact">Contact</a>
              <a href="category.php" id="categories">Category</a>
              <a href="../customer.php" id="customers">Customers</a>
              <a href="../order.php" id="order">Orders</a>
            </div>
              <div class="dropdown1">
                <a href="../product/allproduct.php" id="product">Product</a>
              </div>
              </div>
          </div>
</body>
</html>