<?php include('header1.php');?>
<link rel="stylesheet" type="text/css" href="css/signup.css">
<script type="text/javascript">
  function RemoveSpecialChar(tags) {
      if (tags.value != '' && tags.value.match(/^[\w]+$/) == null ) {
      tags.value = tags.value.replace(/[\W]/g, '');
      }
    }
    </script>
	   
     <?php
    $erfn=$erln=$erem=$erc=$erpa="";
    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $password = base64_encode($_POST['password']);

      $conn = new mysqli("localhost","root","","peachblossom");

        if (empty($fname)) {
          $erfn= "firstname cannot be empty";
        }
        else{
         if (is_numeric($fname)) {
         $erfn = "Firstname cannot be numeric";
          }
        }
        if (empty($lname)) {
          $erln= "Lastname cannot be empty";
        }  
        else{
         if (is_numeric($lname)) {
         $erln = "Lastname cannot be numeric";
          }    
        }   
        if (empty($email))  {
          $erem= "Email cannot be empty";
        }
        else{
         if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $erem ="Email is not in format";
          }
        }
        if (empty($contact)) {
        $erc= "Contact cannot be empty";
        }
          else{
             if (!is_numeric($contact)) {
             $erc = "Contact must be numeric";
          }
          else {
              if(strlen($contact)<10){
              $erc= "Contact must be of 10 digits";
            } 
          }
        }

        if (empty($password)) {
          $erpa= "Password cannot be empty";
        }      
        else if(strlen($password)<=5){
            $erpa= "Password must be greater than 5 characters";
        }
           
      else{
      //for unique email
        $query1 = "SELECT * from customers WHERE email='".$email."'";
      $result1 =mysqli_query($conn,$query1) or die(mysqli_error($conn));

      if($contact && $result1 && $fname && $lname && $password){ 
     
        if (mysqli_num_rows($result1)>0) {
        $erem = "Sorry! This email is occupied";
        }

        else{
        $sq = "INSERT INTO CUSTOMERS(firstname,lastname,email,contact,password)
        VALUES('$fname','$lname','$email','$contact','$password')";

          if ($conn->query($sq) == TRUE) {
            echo '<script>window.location="login.php";</script>';
         }
          else{
           echo "Error".$conn->error;
          }
        } 
      }
    }
  }
  ?>   
    
 		<div id="sec4">
    <div class="container-fluid">
      <div class="row">
 		<div class="col-md-7">
		<p class="heading">WELCOME !</p>
		<!-- <img class="image" src="image/human.png" name="icon"> -->
		<form class="sign" name="sign" method="POST" action="">
	
		<label>First Name:<input type="text" name="fname" id="namef" onkeyup="RemoveSpecialChar(this)" pattern="^[a-zA-Z]+$" required><br><span class="error"><?php echo $erfn;?></span><br></label>

		<label>Last Name: <input type="text" name="lname" id="namel" onkeyup="RemoveSpecialChar(this)" pattern="^[a-zA-Z]+$" required><br><span class="error"><?php echo $erln;?></span><br></label>
    
    <label>Contact: <input type="text" name="contact" id="user" onkeyup="RemoveSpecialChar(this)" required><br>
     <span class="error"><?php echo $erc;?></span><br></label>

    <label>Email: <input type="email" name="email" id="email" required><br>
      <span class="error"><?php echo $erem;?></span><br></label>
 
    <label>Password: <input type="password" name="password" id="pass" required><br><span class="error"><?php echo $erpa;?></span><br></label>

		<button name="submit" id="signin" value="signin" onclick="return signup()">Sign Up</button><br><br>
    <p class="login">Already have an account? <a href="login.php">Login</a></p>
		</form>
	</div>
  <div class="col-md-5">
    <img src="image/pb.jpg" class="image1">
  </div>
  </div>
</div>
</div>

<?php include('js.php') ;?>
<?php include('footer.php') ;?>