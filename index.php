<?php
session_start();
require_once('./config.php');
require_once('./vendor/autoload.php');
$connection = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
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
    <title>HOME | SEARCH</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap">
        <a class="navbar-brand col-md-2" href="#"><b>MediGen</b></a>
        <input class="form-control form-control-dark w-100" type="text" id="search_bar" placeholder="Type to start searching..." aria-label="Search">
        <div class="result"></div>
        <button type="button" class="btn btn-dark">Search</button>
        <button type="button" class="btn btn-dark">Login</button>
    </nav>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills flex-column">
                <?php
                //user existence query
                    $query = "SELECT id,name,description FROM categories";
                    $result = mysqli_query($connection,$query) or die('email query unsuccessful!!!');
                    $num_rows = mysqli_num_rows($result);
                    //check existence
                    if ($num_rows < 1) {
                        echo "no data";
                      //header("Location: http://localhost/medigen/index.php");
                    } else {
                      //check for password
                      $res_arr = mysqli_fetch_array($result);
                      foreach ($res_arr as $key => $value) { ?>
                        <li class="nav-item"><a class="nav-link active" href="#"><?php echo $value['name']; ?></a></li>
                    <?php
                      }
                  }
                ?>
            </ul>
        </div>
        <div class="col-md-8">

        </div>
    </div>
</body>
</html>
