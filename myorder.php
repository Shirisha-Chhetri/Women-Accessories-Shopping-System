<?php
 $conn = new mysqli("localhost","root","","peachblossom");
 require"header.php";
  require"nav.php";
 if(isset($_SESSION['user1'])){?>
 
<div class="container">
  <div style="margin-top:8pc;">
    <h2 class="text-info" align="center">Ordered Details</h2>
  </div>
  <div>
  	<table class="table table-striped" style="margin-top: 1pc;">
  <thead>
    <tr class="mt-5 mb-5">
      <th scope="col">Order Id</th>
      <th scope="col">Transaction Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Ordered Date</th>
      <th scope="col">Status</th>
    </tr>

  </thead>
  <tbody>
  	<?php  
  	$sql = "SELECT ORDER_ID,TRANSACTION_ID,PRODUCT_NAME,QUANTITY,PRICE,(QUANTITY*PRICE) AS Total,ORDERED_DATE, ORDER_STATUS  FROM orders WHERE customer='".$_SESSION['customer']."'";
  	$results=$conn->query($sql);
	if($results->num_rows>0){
		while($row = $results->fetch_assoc()){?>
	<tr class="mt-5 mb-5">
    <td><?php echo $row['ORDER_ID'] ?></td>
  	 <td><?php echo $row['TRANSACTION_ID'] ?></td>
      <td><?php echo $row['PRODUCT_NAME'] ?></td>
      <td><?php echo $row['QUANTITY']; ?></td>
      <td><?php echo $row['PRICE'] ?></td>
      <td><?php echo $row['Total'] ?></td>
      <td><?php echo $row['ORDERED_DATE']?></td>
      <td><?php echo $row['ORDER_STATUS']?></td>
      <td></td>
  	</tr>
  	 <?php
  	}
  }
  else{
    echo "<script>alert('No Order has been made yet.');
        window.location.href='home.php';</script>";
      }
      }  
  	?>
  </tbody>
</table>
  </div>
</div>

<?php include('footer.php');?> 