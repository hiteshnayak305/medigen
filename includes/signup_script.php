<?php
  //establise connection
  require_once('./config.php');
  require_once('./vendor/autoload.php');
  $connection = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
  if(mysqli_connect_errno()){
      echo 'Database connection failed with following errors: '. mysqli_connect_error();
      die();
  }
  session_start();
  //fetch values from from
  $name = mysqli_escape_string($connection,$_POST['name']);
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $password = mysqli_real_escape_string($connection,$_POST['password']);
  $pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$";
  if (!preg_match($pattern, $password, $arr)) {
    header("Location: http://localhost/medigen/store_signup.php?err=no_format_pass");
  }
  $enc_password = md5($password);
  $contact = mysqli_real_escape_string($connection,$_POST['contact']);
  $pattern = "^[0-9]{10}$^";
  if (!preg_match($pattern, $contact, $arr)) {
    header("Location: http://localhost/medigen/store_signup.php?err=no_format_contact");
  }
  $address = mysqli_real_escape_string($connection,$_POST['address']);
  $longitude = mysqli_real_escape_string($connection,$_POST['longitude']);
  $latitude = mysqli_real_escape_string($connection,$_POST['latitude']);

  //check for duplicate email
  $query = "SELECT id FROM users WHERE email = '$email'";
  $duplicates = mysqli_query($connection,$query) or die('unable to check!!!');
  $dup = mysqli_num_rows($duplicates);
  if ($dup > 1) {
    header("Location: http://localhost/medigen/store_signup.php?err=already_exist");
  } else {
    //create query
    $query = "INSERT INTO users (name, username, password, contact, address,longitude, latitude) VALUES ('$name','$email','$enc_password','$contact','$address','$longitude','$latitude')";
    //execute query
    $query_status = mysqli_query($connection,$query) or die('unable to insert!!!');
    //login user set session
    $id = mysqli_insert_id($connection);
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    //redirect to product page
    header("Location: http://localhost/medigen/dashboard.php");
  }
 ?>
