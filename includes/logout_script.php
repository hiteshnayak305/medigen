<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/medigen/index.php");
  } else {
    session_destroy();
    header("Location: http://localhost/medigen/index.php");
  }
 ?>
