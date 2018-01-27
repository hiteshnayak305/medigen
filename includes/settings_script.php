<?php
session_start();
//establise connection
require_once('../config.php');
require_once('../vendor/autoload.php');
$connection = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}

  $old_password = mysqli_real_escape_string($connection,$_POST['opassword']);
  $md5_password = md5($old_password);
  $new_password1 = mysqli_real_escape_string($connection,$_POST['npassword1']);
  $pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$";
  if (!preg_match($pattern, $new_password1, $arr)) {
    header("Location: http://localhost/medigen/settings.php?err=no_format");
  }
  $new_password2 = mysqli_real_escape_string($connection,$_POST['npassword2']);
  //create query
  $email = $_SESSION['email'];
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($connection, $query) or die('unable to fetch');
  $row = mysqli_fetch_array($result);
  if ($md5_password == $row['password']) {
    if ($new_password1 == $new_password2) {
      $enc_password = md5($new_password1);
      $query = "UPDATE users SET password='$enc_password'";
      $status = mysqli_query($connection, $query);
      header("Location: http://localhost/medigen/dashboard.php");
    } else {
      header("Location: http://localhost/medigen/settings.php?err=no_match");
    }

  } else {
    header("Location: http://localhost/medigen/settings.php?err=wrong_pass");
  }
 ?>
