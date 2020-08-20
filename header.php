<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Style CSS -->
  <link rel="stylesheet" href="style.css">
	<!--
	Author: Group 5
	Filename: <?php echo $file . "\n"; ?>
	Date: <?php echo $date . "\n"; ?>
	Description: <?php echo $description . "\n"; ?>
	-->
	<title>South - Real Estate | <?php echo $title; ?></title>
</head>
<body>
<?php
  require("includes/constants.php");
  require("includes/db.php");
  require("includes/functions.php");
  ob_start();
  session_start();

  $isAuthenticated = false;
  $isAgent = false;
  $isAdmin = false;
  $isClient = false;
  if(isset($_SESSION['user']['user_id']))
  {
    $isAuthenticated = true;
    if($_SESSION['user']['user_type'] == AGENT)
    {
      $isAgent = true;
    }
    elseif($_SESSION['user']['user_type'] == ADMIN)
    {
      $isAdmin = true;
    }
    elseif($_SESSION['user']['user_type'] == CLIENT)
    {
      $isClient = true;
    }
  }
?>
    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="listing_select_city.php">Seach Listings</a></li>
                            <?php
                            if($isAgent == true)
                            {
                              echo "<li><a href='dashboard.php'>Dashboard</a></li>
                                    <li><a href='listing_create.php'>Create Listing</a></li>
                                    <li><a href='listing_update.php'>Update Listing</a></li>";
                            }
                            if($isAdmin == true)
                            {
                              echo "<li><a href='admin.php'>Admin</a></li>";
                            }
                            if($isClient == true)
                            {
                              echo "<li><a href='welcome.php'>Welcome</a></li>";
                            }
                            ?>
                            <?php
                              if($isAuthenticated == true)
                              {
                                echo "<li><a href='change_password.php'>Change Password</a></li>
                                      <li><a href='update.php'>Update</a><li>
                                      <li><a href='logout.php'>Log Out</a></li>";
                              }
                              else
                              {
                                echo "<li><a href='login.php'>Log In</a></li>
                                      <li><a href='register.php'>Register</a></li>";
                              }
                            ?>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
