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
    <title>Settings | User</title>

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
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 login_form_container">
                  <h2>Change Password</h2>
                  <form action="includes/settings_script.php" method="post">
                    <div class="form-group <?php if($_GET['err'] == "wrong_pass"){echo "has-error";}?>">
                      <input type="password" class="form-control" name="opassword" placeholder="Old Password" required>
                    </div>
                    <div class="form-group <?php if($_GET['err'] == "no_match"){echo "has-error";}?>">
                      <input type="password" class="form-control" name="npassword1" placeholder="New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
                      <p class="help-block">use formete: At least 1 Uppercase, At least 1 Lowercase, At least 1 Number, At least 1 Symbol, symbol allowed[ !@#$%^&*_=+- ],Min 8 chars and Max 12 chars</p>
                    </div>
                    <div class="form-group <?php if($_GET['err'] == "no_match"){echo "has-error";}?>">
                      <input type="password" class="form-control" name="npassword2" placeholder="Re-type New Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                  </form>
                </div>
              </div>
          </div>
        </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
