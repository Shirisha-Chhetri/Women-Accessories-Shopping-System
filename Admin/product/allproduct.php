<?php
session_start();
   if (!isset($_SESSION['user'])) {
     header('location: http://localhost/MIS Site/Admin/login.php');
   }
    require "dashboard.php";
  ?>
       
<div class="main">
   <div class="row my-4">
      <h2 class="ml-5">All Products</h2>
      <button class="btn1"><a href="addproduct.php">Add New Product</a></button>
<table class="table" border="2" style="margin-top:1pc;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php 
        $conn = new mysqli("localhost","root","","peachblossom");
        $limit = 5;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
        $offset = ($page-1) * $limit;

         $sql = "SELECT c.*, p.*
          FROM category c
          INNER JOIN products p
          ON c.category_id = p.category_id
          ORDER BY product_id DESC
          LIMIT {$offset},{$limit}";
          
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>
      
    <tbody>
      <tr>
       <td class="td"><?php echo $row['PRODUCT_ID'];?></td>
       <td class="td"><?php echo $row['NAME']; ?></td>
       <td class="td"><img src="../productimage/<?php echo $row['IMAGE']; ?>" class="img"></td>
       <td class="td"><?php echo $row['PRICE']; ?></td>
       <td class="td"><?php echo $row['CATEGORY_NAME']; ?></td>
       
      <td><a href="edit.php?editproduct=<?php echo $row["PRODUCT_ID"];?>"><button class="btn btn-success">Edit</button></a>
      <a href="delete.php?deleteproduct=<?php echo $row["PRODUCT_ID"];?>"><button class=" btn btn-danger">Delete</button></a>
      </td>
      </tr>
    </tbody>
          <?php
              }
            }
        ?>
  </table>
  
    <?php 
      $sql1 = "SELECT * FROM products";
      $result1 = mysqli_query($conn,$sql1) or die("error");
      if (mysqli_num_rows($result1)>0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="allproduct.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i <=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="allproduct.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="allproduct.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
      }
        ?>
    </div>
  </div>
</body>
