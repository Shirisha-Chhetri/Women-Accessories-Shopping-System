<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         

 $conn = new mysqli("localhost","root","","peachblossom");

 if(isset($_SESSION['user'])){?>

<div class="main">
   <div class="row my-4">
      <h2 class="ml-5">All Orders</h2>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Order_Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product_Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Ordered Date</th>
      <th scope="col">Transaction_Id</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
   $limit = 5;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
        
     $offset = ($page-1) * $limit; 
      $conn = new mysqli("localhost","root","","peachblossom");

  
    $sql = "SELECT CONCAT(c.firstname,' ',c.lastname) AS name, o.*,(QUANTITY*PRICE) AS total
          FROM customers c
          INNER JOIN orders o
          ON c.cus_id = o.customer
          ORDER BY o.order_id DESC
          LIMIT {$offset},{$limit}";

        $result = $conn->query($sql);
        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){;?>
     
    <tr>
      <td><?php echo $row['ORDER_ID'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['PRODUCT_NAME'] ?></td>
      <td><?php echo $row['QUANTITY'] ?></td>
      <td><?php echo $row['PRICE'] ?></td>
      <td><?php echo $row['total'] ?></td>
      <td><?php echo $row['ORDERED_DATE']?></td>
      <td><?php echo $row['TRANSACTION_ID'] ?></td>
      <td><?php echo $row['ORDER_STATUS']?></td>
      <td>
        <a href="managestatus.php?id=<?php echo $row['ORDER_ID'] ?>" style="color:#fff;" class="btn btn-success">Manage Status</a>
      </td>
   </tr>
<?php }
}
?>

  </tbody>
</table>
  </div>
</div>
 
<div class="d-flex justify-content-left">
  <div class="pagination">
    <?php 
      $sq = "SELECT * FROM orders";
      $re = mysqli_query($conn,$sq) or die("error");
      if (mysqli_num_rows($re)>0) {
        $total_records = mysqli_num_rows($re);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="order.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i<=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="order.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="order.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
      }
        ?>
        
  </div>
</div>
<?php
}
else{
  header("location:login.php");
}
?>