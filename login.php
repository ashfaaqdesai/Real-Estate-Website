<?php
    /*
    *  Group 5
    */
    $title = "Login Page";
    $file = "login.php";
    $description = "Login page for real estate website";
    $date = "September 27, 2019";
    include("header.php");
?>
<div>
  <h2>User Login</h2>
  <hr/>
  <br/>
  <?php

    $error = "";
    $display = "";
    $conn = db_connect();
    $LOGIN_COOKIE = "LOGIN_COOKIE";

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
      if(isset($_COOKIE[$LOGIN_COOKIE]))
      {
        $user_id = $_COOKIE[$LOGIN_COOKIE];
      }
      else {
        $user_id = "";
      }

      if(isset($_SESSION['logout_msg']));
      {
        echo "<center>" . $_SESSION['logout_msg'] . "</center>";
        unset($_SESSION['logout_msg']);
      }
      if(isset($_SESSION['registered']));
      {
        echo "<center>" . $_SESSION['registered'] . "</center>";
        unset($_SESSION['registered']);
      }
      if(isset($_SESSION['invalid_user']));
      {
        echo "<center>" . $_SESSION['invalid_user'] . "</center>";
        unset($_SESSION['invalid_user']);
      }
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $user_id = trim($_POST["usr_id"]);
      $pwd = trim($_POST["pass"]);

      $results = pg_execute($conn, 'user_login', array($user_id, hash(HASH_ALGO, $pwd)));
      $user = pg_fetch_assoc($results);
      if($user)
      {
        $valid_person = pg_execute($conn, 'person', array($user_id));
        $person = pg_fetch_assoc($valid_person);

        $_SESSION['user'] = $user;
        $_SESSION['person'] = $person;

        $last_access = pg_execute($conn, 'last_access', array($user_id));
        setcookie($LOGIN_COOKIE, $user_id, time() + COOKIE_LIFESPAN);

        if($user['user_type'] == ADMIN)
        {
          header("Location: admin.php");
          ob_flush();
        }
        else if($user['user_type'] == AGENT)
        {
          header("Location: dashboard.php");
          ob_flush();
        }
        else if($user['user_type'] == CLIENT)
        {
          header("Location: welcome.php");
          ob_flush();
        }
        else if ($user['user_type'] == DISABLED.CLIENT)
        {
          $display .= "Your account has been disabled!";
          $display .= " Please contact the site admin.";
        }
        else if ($user['user_type'] == DISABLED.AGENT)
        {
          $display .= "Your account has been disabled!";
          $display .= " Please contact the site admin.";
        }
        else if ($user['user_type'] == DISABLED.ADMIN)
        {
          $display .= "Your account has been disabled!";
          $display .= " Please contact the site admin.";
        }
        elseif ($user['user_type'] == PENDING.AGENT)
        {
          $display .= "Your account is still being verified!";
          $display .= " Please try again later.";
        }
      }
      else
      {
        echo "<h2><center>User ID/Password not found in the database</center></h2>";
        $user_id="";
      }
    }
  ?>
  <h2><center><?php echo $error; ?></center></h2>
  <h2><center><?php echo $display; ?></center></h2>

  <h2><center>Please log in</center></h2>
    <p><center>Enter your login ID and password to connect to this system</center></p>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
    <center>
    <table cellspacing="15" >
    <tr>
      <th><strong>Login ID</strong></th>
      <td><input type="text" name="usr_id" value="<?php echo $user_id;?>" size="15" /></td>
    </tr>
    <tr>
      <th><strong>Password</strong></th>
      <td><input type="password" name="pass" value="" size="15" /></td>
    </tr>
    </table>
    <br/>
    <input type="submit" name= "login" value = "Login" />
    </center>
    </form>
    <p><center>
    Please wait after pressing <b>Log in</b> while we retrieve your records from our database.</center></p>
    <p><center>
    <i>(This may take a few moments)</i></center>
    </center></p>
  <hr/>
</div>

<?php
  include("footer.php");
?>
