<?php
  session_start();
  //establise db connection
  require_once('../config.php');
  require_once('../vendor/autoload.php');
  $connection = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
  if(mysqli_connect_errno()){
      echo 'Database connection failed with following errors: '. mysqli_connect_error();
      die();
  }

  //get input
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $password = mysqli_real_escape_string($connection,$_POST['password']);
  $md5_password = md5($password);
  //user existence query
  $query = "SELECT id,username,name,password FROM users WHERE username='$email'";
  $result = mysqli_query($connection,$query) or die('email query unsuccessful!!!');
  $num_rows = mysqli_num_rows($result);

  //check existence
  if ($num_rows < 1) {
    header("Location: http://localhost/medigen/store_login.php?err=no_user");
  } else {
    //check for password
    $res_arr = mysqli_fetch_array($result);
    if ($md5_password == $res_arr['password']) {
      //set Session
      $_SESSION['id'] = $res_arr['id'];
      $_SESSION['email'] = $res_arr['username'];
      $_SESSION['name'] = $res_arr['name'];
      header("Location: http://localhost/medigen/dashboard.php");
    } else {
      header("Location: http://localhost/medigen/store_login.php?err=no_pass");
    }
  }
 ?>
