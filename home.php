<?php include "header.php";
  include "nav.php";?>
<link rel="stylesheet" type="text/css" href="css/home.css">

<div id="sec4">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="bd-example">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="admin/productimage/Classic-Pendants_desktop.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="admin/productimage/Toniq_desktop.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item active">
        <img src="admin/productimage/Peora_desktop.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

      <div id="sec5">
        <div class="container-fluid">

              <p class="for">JUST FOR YOU</p>
              <div class="row">
              <?php 
         $conn = new mysqli("localhost","root","","peachblossom");
         $limit = 18;
         $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT {$limit}";
         $result = $conn->query($sql);

          if($result !== false && $result->num_rows>0){
          while($row=$result->fetch_assoc()){?>
                    
             <div class="col-md-2.4">
              <form method="POST" action="managecart.php" >
               <div class="card product" style="width:13.6rem; margin-right:7px;">
                <a href=""><img src="admin/productimage/<?php echo $row['IMAGE'];?>" class="card-img-top" alt="..."></a>   
                  <div class="card-body">
                    <div class="title">
                    <h6 class="card-title"><?php echo $row['NAME'];?></h6>
                    </div>
                      <div class="price">
                    <p>Rs.<?php echo $row['PRICE'];?></p>
                  </div>
                </div>
                
                <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>              
                  <input type="hidden" name="id" value="<?php echo $row['PRODUCT_ID'];?>">
                  <input type="hidden" name="Name" value="<?php echo $row['NAME'];?>">
                  <input type="hidden" name="Price" value="<?php  echo $row['PRICE'];?>"> 
            </div>
          </form>
          </div>
        
           <?php
              }
            }
          ?>
          </div>
        </div>
      </div>
<?php include('footer.php');?> 