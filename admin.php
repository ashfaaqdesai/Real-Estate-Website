<?php
    /*
    *  Group 5
    */
    $title = "Admin Page";
    $file = "admin.php";
    $description = "In fulfillment of WEBD3201 Lab 1 requirements";
    $date = "September 27, 2019";
    include("header.php");

    if($_SESSION['user']['user_type'] != ADMIN)
    {
      $_SESSION['invalid_user'] = "You are not the correct user type please login.";
      header("Location: login.php");
      ob_flush();
    }
?>

<div id="content">
  <h2>Welcome page for Administrators</h2>
  <hr/>
  <br/>
<?php
    $last_access = $_SESSION['user']['last_access'];
    $display .= "Welcome back " . $_SESSION['person']['salutation'] . " " . $_SESSION['person']['first_name'] . " " . $_SESSION['person']['last_name']. "<br/>";
    $display .= "User ID: " . $_SESSION['user']['user_id']. "<br/>";
    $display .= "Email Address: " . $_SESSION['user']['email_address']. "<br/>";
    $display .= "Address 1: " . $_SESSION['person']['street_address_1'] . "<br/>";
    $display .= "Address 2: " . $_SESSION['person']['street_address_2'] . "<br/>";
    $display .= "City: " . $_SESSION['person']['city'] . "<br/>";
    $display .= "Province: " . $_SESSION['person']['province'] . "<br/>";
    $display .= "Postal Code: " . $_SESSION['person']['postal_code'] . "<br/>";
    $display .= "Primary Phone: " . $_SESSION['person']['primary_phone_number'] . "<br/>";
    $display .= "Secondary Phone: " . $_SESSION['person']['secondary_phone_number'] . "<br/>";
    $display .= "Fax: " . $_SESSION['person']['fax_number'] . "<br/>";
    $display .= "Our records show that you last accessed our system on: " . $last_access;

    echo $display;
?>
  <hr/>
</div>

<?php
  include("footer.php");
?>
