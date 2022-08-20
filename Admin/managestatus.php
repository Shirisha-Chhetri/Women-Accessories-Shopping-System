<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         ?>  

<?php
$conn = new mysqli("localhost","root","","peachblossom");

 if(isset($_SESSION['user'])){
    if(isset($_GET['id'])){
 	$id = $_GET['id'];?>

<div class="container">
  <div class="my-3 mx-5">
    <h2 class="text-info">Manage Status</h2>
  </div>
  <div class="mx-5 my-5">
  	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product_Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Transaction_Id</th>
      <th scope="col">Orderd_Date</th>
      <th scope="col">Status</th>
    </tr>

  </thead>
  <tbody>
  	<?php 
  
  	$sql = "SELECT * FROM orders WHERE order_id='$id'";
  	$results=$conn->query($sql);
	if($results->num_rows>0){
		while($row = $results->fetch_assoc()){?>
	<tr>
      <td><?php echo $row['PRODUCT_NAME'] ?></td>
      <td><?php echo $row['QUANTITY'] ?></td>
      <td><?php echo $row['PRICE'] ?></td>
      <td><?php echo $row['TRANSACTION_ID'] ?></td>
      <td><?php echo $row['ORDERED_DATE']?></td>
      <td><?php echo $row['ORDER_STATUS']?></td>
      <td></td>
  	</tr>
  	 <?php
  	}
  }
  else{
  	?>

	<div>
		<h2>No Order has been made by this customer.</h2>
	</div>
  	 
  <?php
	}

  ?>

  	
  </tbody>
</table>
  </div>
  <div class="mx-5 my-5">
    <?php if(isset($_POST['savestatus'])){
      $getstatus = $_POST['status'];
      $sq = "UPDATE orders SET order_status='$getstatus' WHERE order_id='$id'";
      $res=$conn->query($sq);
    if($res == TRUE){;?>
    <script type="text/javascript">
      alert("Status updated successfully.");
      window.location="order.php";
    </script>

<?php
  }
    } 
    ?>
    <h3>Select status:</h3>
    <form class="form" method="post">
      <label class="form-label">Choose:</label>
      <select class="form-select" name="status">
       <option selected>Pending</option>
      <option value="Shipped">Shipped</option>
      <option value="Delivered">Delivered</option>
      </select>
      <input type="submit" name="savestatus" value="Save" class="btn btn-info">
    </form>

  </div>
</div>
</div>
</div> 
<?php

	}
}
?>