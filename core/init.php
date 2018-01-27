<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/medigen/config.php');
require_once($base_url.'/vendor/autoload.php');
$database = mysqli_connect($database_url,$database_user,$database_password,$database_name,$database_port);
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}
session_start();
?>
