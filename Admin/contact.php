<?php
   session_start();
   if (!isset($_SESSION['user'])) {
     header('location:login.php');
   }
         require "dashboard.php";
         ?>  

<div class="main">
	<div class="container">
      <div class="row">
        <div class="col-md-12">
      <h2 class="bold"><u>Contact Details:</u></h2>
      <h3 class="icon">Peach Blossom</h3><br>
      <p>Email: peachblossom@gmail.com</p>
      <i class="fa fa-phone fa-lg icon1">
        <p class="help">FOR ANY HELP YOU MAY CALL US AT 1800-667-8902</b>
        </p>
    </i><br>
  </div>
</div>