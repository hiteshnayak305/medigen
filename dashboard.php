<?php
session_start();
require_once('./config.php');
require_once('./vendor/autoload.php');
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/medigen/store_login.php");
 }
$database = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD | HOME</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="row no-gutters">
        <div class="col" id="navi">
            <nav class="navbar navbar-dark bg-dark flex-md-nowrap">
                <a class="navbar-brand col-md-2" href="#">
                    <b>MediGen</b>
                </a>
                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-dark">Search</button>
                <!--<button type="button" class="btn btn-dark">Login</button>-->
            </nav>
        </div>
        <div class="col-md-auto">
            <div class="btn-group bg-dark flex-md-nowrap" id="drop">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi <?php echo $_SESSION['name'];?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <h6 class="dropdown-header">You are signed as User</h6>
                    <div class="dropdown-divider"></div>
                    <a href="http://localhost/medigen/settings.php" class="dropdown-item" type="button">Account Settings</a>
                    <a href="http://localhost/medigen/includes/logout_script.php" class="dropdown-item" type="button">Sign Out</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script>
    document.getElementById('drop').style.height= window.getComputedStyle(document.getElementById('navi')).getPropertyValue('height');
    </script>
</body>
</html>
