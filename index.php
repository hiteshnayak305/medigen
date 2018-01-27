<?php
session_start();
require_once('./config.php');
require_once('./vendor/autoload.php');
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
                <li class="nav-item"><a class="nav-link active" href="#">Analgesic</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Antibiotic</a></li>
            </ul>
        </div>
        <div class="col-md-8">

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('input#search_bar').typeahead({
                name: 'name',
                remote: 'search.php?query=%QUERY'
            });
        })
    </script>
</body>
</html>
