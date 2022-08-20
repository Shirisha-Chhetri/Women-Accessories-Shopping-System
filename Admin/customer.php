<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         ?>  
       
<div class="main">
   <div class="row my-4">
      <h2 class="ml-5">All Customers</h2>
<table class="table table-striped" border="2" style="margin-top:1pc;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">FullName</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
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

         $sql = "SELECT * FROM customers ORDER BY cus_id DESC LIMIT {$offset},{$limit}";
          
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {?>
      
    <tbody>
      <tr>
       <td class="td"><?php echo $row['CUS_ID'];?></td>
       <td class="td"><?php echo $row['FIRSTNAME']." ".$row['LASTNAME']; ?></td>
       <td class="td"><?php echo $row['CONTACT']; ?></td>
       <td class="td"><?php echo $row['EMAIL']; ?></td>
       
      <td>
      <form method="post" action="vieworder.php">
          <input type="hidden" name="id" value="<?php echo $row['CUS_ID']; ?>">
          <input type="hidden" name="firstname" value="<?php echo $row['FIRSTNAME'] ?>">
          <input type="hidden" name="lastname" value="<?php echo $row['LASTNAME'] ?>">
          <button class="btn btn-success" name="orderitem">Orders</button>
        </form>
      </td>
      </tr>
    </tbody>
          <?php
              }
            }
        ?>
  </table>
  
    <?php 
      $sql1 = "SELECT * FROM customers";
      $result1 = mysqli_query($conn,$sql1) or die("error");
      if (mysqli_num_rows($result1)>0) {
        $total_records = mysqli_num_rows($result1);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="customer.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i <=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="customer.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="customer.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
      }
        ?>
    </div>
  </div>
</body>
</html>