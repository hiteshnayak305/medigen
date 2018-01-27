<?php
session_start();
require_once('./config.php');
require_once('./vendor/autoload.php');
if (isset($_SESSION['email'])) {
    header("Location: http://localhost/medigen/dashboard.php");
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
    <title>HOME | SEARCH</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!--       main body      -->
<main>
  <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form_container">
          <h2>SIGN UP</h2>
          <form  action="includes/signup_script.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group <?php if($_GET['err'] == "already_exist"){echo "has-warning";}?>">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="contact" pattern="^[0-9]{10}$" placeholder="Contact" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-group">
              <input type="hidden" value="0" class="form-control" id="longitude" name="longitude">
            </div>
            <div class="form-group">
              <input type="hidden" value="0" class="form-control" id="latitude" name="latitude">
            </div>
            <div id="picker" style="width: 500px; height: 400px;"></div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
  </div>
</main>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAOx2oAH8bL1neSJKMAEl2nrp_n7VVs05w'></script>
    <script src="js/locationpicker.jquery.js"></script>
    <script>
        var latitude = 25.4952002;
        var longitude = 81.8684578;
        $('#picker').locationpicker({
                location: {
                    latitude: 25.4952002,
                    longitude: 81.8684578
                },
                radius: 300,
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    latitude = currentLocation.latitude;
                    longitude = currentLocation.longitude;
                    console.log(latitude);
                    console.log(longitude);
                    var long = document.querySelector('#longitude');
                    var lat = document.querySelector('#latitude');
                    long.value=longitude;
                    lat.value=latitude;
                }
            });
    </script>
</body>
</html>
