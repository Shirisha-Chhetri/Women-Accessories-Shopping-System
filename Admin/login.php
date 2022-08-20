<link rel="stylesheet" type="text/css" href="css/login.css">

      <div id="sec2">
      <div class="container">
            <a class="name" style="text-decoration: none;">PEACH BLOSSOM</a>
          </div>
          </div>

            <?php
             $err=$erem=$errors="";
             session_start();
              if(isset($_POST['submit'])){
               $username = $_POST['username'];
               $password = base64_encode($_POST['password']);

               if(empty($_POST['username'])){
                $erem="Cannot be empty.";
              }
             
              if(empty($_POST['password'])){
                $err="Cannot be empty.";
              }
               
              else{
                $conn =new mysqli('localhost','root', '','peachblossom');

               $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";

                $result= $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                
                 if(mysqli_num_rows($result)>0){
                  $_SESSION['user']= $username;
                header('location: http://localhost/MIS_Site/Admin/home.php');
                  }
                else{
                $errors = "username or password is invalid.";
                }
              }
          }      
        ?>

      <div id="sec4">
      <div class="container">
        <div class="row">       
        <div class="col-md-6">
    <form method="POST" action="" name="fill" class="form">
    <h1 class="head">WELCOME!</h1>
    <img class="image" src="../image/human.png" name="icon"><br>
    <input type="text" name="username" id="user" placeholder="USERNAME"/>
    <span class="error"><?php echo "$erem"; ?></span><br> 

    <input type="password" name="password" id="password" placeholder="PASSWORD"/>
    <span class="error"><?php echo "$err";?></span><br><br>

    <button name="submit" id="login" value="login" onclick="return login()">Log In</button><br>

    <span class="error" style="text-align: center;"><?php echo "$errors";?></span><br> 
</form>
</div>
    <div class="col-md-6">
        <img src="../image/pb1.jpg" class="image1">
      </div>
</div>
</div>
</div>

<?php include('../js.php');?>