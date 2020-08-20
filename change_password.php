<?php
$title = "Change Password";
$file = "change_password.php";
$description = "Change password page for real estate website";
$date = "October 1, 2019";
include("header.php");

  if($_SESSION['user']['user_type'] != ADMIN || $_SESSION['user']['user_type'] != AGENT || $_SESSION['user']['user_type'] != CLIENT)
  {
    $_SESSION['invalid_user'] = "You are not the correct user type please login.";
    header("Location: login.php");
    ob_flush();
  }
?>
<div>
<br/>
<br/>
<h2><center>Please complete the form</center></h2>
<br/>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <center>
    <table id="t10">
      <tr>
        <td><strong>Old Password:</strong></td><td><input type="password" name="password" value="<?php echo $password; ?>"></td>
      </tr>
      <tr>
        <td><strong>New Password:</strong></td><td><input type="password" name="password" value="<?php echo $password; ?>"></td>
      </tr>
      <tr>
        <td><strong>Confirm Password:</strong></td><td><input type="password" name="confirm_password" value="<?php echo $password; ?>"></td>
      </tr>
    </table>
    <br/>
    <input type="submit" name="reset" value="Reset">
  </center>
  </form>
<br/>
<br/>
</div>

<?php include("footer.php"); ?>
