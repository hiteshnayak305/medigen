<?php
require_once('./config.php');
require_once('./vendor/autoload.php');
$database = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | SEARCH</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap">
        <a class="navbar-brand col-md-2" href="#">
            <b>MediGen</b>
        </a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <button type="button" class="btn btn-dark">Search</button>
        <button type="button" class="btn btn-dark">Login</button>
    </nav>
<?php    //user existence query
    $query = "SELECT id,username,name FROM users WHERE username='$email'";
    $result = mysqli_query($connection,$query) or die('email query unsuccessful!!!');
    $num_rows = mysqli_num_rows($result);

    //check existence
    if ($num_rows < 1) {
      header("Location: http://localhost/medigen/index.php");
    } else {
      //check for password
      $res_arr = mysqli_fetch_array($result);
?>





    <div class="row no-gutters" style="padding:5px">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="card container" >
                <div class="row">
                    <div class="col-md">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">Arpit Choudhary</strong>
                            <h3 class="mb-0"></h3>
                            <div class="mb-1 text">Phone: 555-555-5555</div>
                            <div class="mb-1 text">Email: sample@company.com</div>
                            <div class="mb-1 text">Address: NITRR, NIT Raipur</div>
                        </div>
                    </div>
                    <div class="col-md" style="display:flex;align-items:center;justify-content:flex-end;">
                        <button class="btn" type="button">Get Location</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
