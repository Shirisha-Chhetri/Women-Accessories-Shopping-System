<?php include('header1.php');?>
<link rel="stylesheet" type="text/css" href="css/login.css">

            <?php
             $err=$erem=$errors="";
             session_start();
              if(isset($_POST['submit'])){
               $email = $_POST['email'];
               $password = base64_encode($_POST['password']);

               if(empty($_POST['email'])){
                $erem="Cannot be empty.";
              }
              else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 $erem="Email is not in format";
              }
              if(empty($_POST['password'])){
                $err="Cannot be empty.";
              }
                             
              else{
                  $conn =new mysqli('localhost','root', '','peachblossom');

               $sql="SELECT * FROM customers WHERE email='$email' AND password='$password'";

                $result= $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                
                 if(mysqli_num_rows($result)>0){
                  
                  $_SESSION['user1']= $email;
                  $_SESSION['name'] = $row['FIRSTNAME'];
                  $_SESSION['customer'] = $row['CUS_ID'];                  
                  header("location: home.php");                  
                  }
                else{
                $errors = "email or password is invalid.";
                }
              }
          }      
        ?>

      <div id="sec4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
        <img src="image/pb1.jpg" class="image1">
      </div>
        <div class="col-md-6">
    <form method="POST" action="" name="fill">
    <h1 class="head">WELCOME!</h1>
    <img class="image" src="image/human.png" name="icon">
    <input type="email" name="email" id="user" placeholder="EMAIL" required/><br><br>

    <input type="password" name="password" id="password" placeholder="PASSWORD" required/>
    <i class="fa fa-eye" id="togglePassword"></i><br> <br>
    <span class="error" style="text-align: center;"><?php echo "$errors";?></span><br>
    <button name="submit" id="login" value="login" onclick="return logs()">Log In</button><br>

    

    <span class="or">OR</span>
    
    <button name="register" id="register" value="register"><a href="signin.php"> Register Now</a></button><br><br>
</form>
</div>
</div>
</div>
</div>

  <script type="text/javascript">
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye icon
    this.classList.toggle('fa-eye-slash');
});
  </script>

<?php include('js.php');?>
<?php include('footer.php');?>