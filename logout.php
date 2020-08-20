<?php
  /*
  *  Group 5
  */
  $title = "Logout Page";
  $file = "logout.php";
  $description = "Logout page for real estate website";
  $date = "October 1, 2019";
  include("header.php");

  session_unset();
  session_destroy();
  session_start();
  $logout_msg = "Successfully logged out!";
  $_SESSION['logout_msg'] = $logout_msg;
  header("Location: login.php");
  ob_flush();
?>
