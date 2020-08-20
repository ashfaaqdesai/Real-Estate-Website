<?php
$title = "Update";
$file = "update.php";
$description = "Update account page for real estate website";
$date = "October 1, 2019";
include("header.php");

if(!isset($_SESSION['users']))
{
  //redirect to login and put message into session
}
?>
<div>
  <h2><center>Update Account</center></h2>
  <hr/>
  <br/>
  <?php
    $error = "";
    $today = date('Y-m-d', time());
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $province = "";

    $user_id = $_SESSION['users']['user_id'];
    $salutation = $_SESSION['person']['salutation'];
    $first_name = $_SESSION['person']['first_name'];
    $last_name = $_SESSION['person']['last_name'];
    $address_1 = $_SESSION['person']['street_address_1'];
    $address_2 = $_SESSION['person']['street_address_2'];
    $city = $_SESSION['person']['city'];
    $province = $_SESSION['person']['province'];
    $postal_code = $_SESSION['person']['postal_code'];
    $primary_phone = $_SESSION['person']['primary_phone_number'];
    $secondary_phone = $_SESSION['person']['secondary_phone_number'];
    $fax = $_SESSION['person']['fax_number'];
    $contact_method = $_SESSION['person']['preferred_contact_method'];

    if(isset($_POST['update']))
    {
      $user_id = trim($_POST["user_id"]);
      $salutation = $_POST["salutations"];
      $first_name = trim($_POST["first_name"]);
      $last_name = trim($_POST["last_name"]);
      $address_1 = trim($_POST["address_1"]);
      $address_2 = trim($_POST["address_2"]);
      $city = trim($_POST["city"]);
      $province = $_POST["provinces"];
      $postal_code = trim($_POST["postal_code"]);
      $primary_phone = trim($_POST["primary_phone"]);
      $secondary_phone = trim($_POST["secondary_phone"]);
      $fax = trim($_POST["fax"]);
      $contact_method = $_POST["preferred_contact_method"];


      if($salutation != "Select")
      {
        $valid_salutation = True;
      }
      else
      {
        $valid_salutation = False;
        $error .= "Please select a salutation.<br/>";
      }
      if(!empty($first_name) && strlen($first_name) <= MAX_FIRST_NAME_LENGTH)
      {
        $valid_first = True;
      }
      else
      {
        $valid_first = False;
        if(empty($first_name))
        {
          $error .= "Please enter a first name. <br/>";
          $first_name = "";
        }
        if(strlen($first_name) > MAX_FIRST_NAME_LENGTH)
        {
          $error .= "First name should be less than " . MAX_FIRST_NAME_LENGTH . " characters.<br/>";
          $first_name = "";
        }
      }
      if(!empty($last_name) && strlen($last_name) <= MAX_LAST_NAME_LENGTH)
      {
        $valid_last = True;
      }
      else
      {
        $valid_last = False;
        if(empty($last_name))
        {
          $error .= "Please enter a last name. <br/>";
          $last_name = "";
        }
        if(strlen($last_name) > MAX_LAST_NAME_LENGTH)
        {
          $error .= "Last name should be less than " . MAX_LAST_NAME_LENGTH . " characters.<br/>";
          $last_name = "";
        }
      }
      if(!empty($address_1) && strlen($address_1) <= MAX_STREET_ADDRESS_1_LENGTH)
      {
        $valid_address1 = True;
      }
      else
      {
        $valid_address1 = False;
        if(empty($address_1))
        {
          $error .= "Please enter a street address. <br/>";
          $address_1 = "";
        }
        if(strlen($address_1) > MAX_FIRST_NAME_LENGTH)
        {
          $error .= "street address should be less than " . MAX_STREET_ADDRESS_1_LENGTH . " characters.<br/>";
          $address_1 = "";
        }
      }
      if(strlen($address_2) <= MAX_STREET_ADDRESS_2_LENGTH)
      {
        $valid_address2 = True;
        if(empty($address_2)){
          $address_2 = "";
        }
      }
      else{
        $valid_address2 = False;
        $error .= "Street address 2 must be less than " .MAX_STREET_ADDRESS_2_LENGTH. " characters.<br/>";
        $address_2 = "";
      }
      if(!empty($city) && strlen($city) <= MAX_CITY_LENGTH)
      {
        $valid_city = True;
      }
      else{
        $valid_city = False;
        $error .= "Pleas enter a city less than " .MAX_CITY_LENGTH. " characters.<br/>";
        $city = "";
      }
      if($province != "Select")
      {
        $valid_prov = True;
      }
      else
      {
        $valid_prov = False;
        $error .= "Please select a province.<br/>";
      }
      if(is_valid_postal_code($postal_code) && strlen($postal_code) == POSTAL_CODE_LENGTH)
      {
        $valid_postal = True;
      }
      else
      {
        $valid_postal = False;
        $error .= "Please enter a valid postal code that is " .POSTAL_CODE_LENGTH. " characters.<br/>";
        $postal_code = "";
      }
      if(is_valid_phone_number($primary_phone))
      {
        $valid_phone1 = True;
      }
      else
      {
        $valid_phone1 = False;
        $error .= "Phone number must be between " .MIN_PHONE_NUMBER_LENGTH. " and " .MAX_PHONE_NUMBER_LENGTH. " numbers.<br/>";
        $error .= "Phone number area code and exchange must be between " .MIN_PHONE_RANGE. " and " .MAX_PHONE_RANGE. " numbers.<br/>";
        $error .= "Phone number dial sequence must be between " .MIN_DIAL_SEQUENCE. " and " .MAX_DIAL_SEQUENCE. " numbers.<br/>";
        $primary_phone = "";
      }
      if(!empty($secondary_phone))
      {
        if(is_valid_phone_number($secondary_phone))
        {
          $valid_phone2 = True;
        }
        else
        {
          $valid_phone2 = False;
          $error .= "Phone number must be between " .MIN_PHONE_NUMBER_LENGTH. " and " .MAX_PHONE_NUMBER_LENGTH. " numbers.<br/>";
          $error .= "Phone number area code and exchange must be between " .MIN_PHONE_RANGE. " and " .MAX_PHONE_RANGE. " numbers.<br/>";
          $error .= "Phone number dial sequence must be between " .MIN_DIAL_SEQUENCE. " and " .MAX_DIAL_SEQUENCE. " numbers.<br/>";
          $secondary_phone = "";
        }
      }
      else
      {
          $valid_phone2 = True;
          $secondary_phone = "";
      }
      if(!empty($fax))
      {
        if(is_valid_phone_number($fax))
        {
          $valid_fax = True;
        }
        else
        {
          $valid_fax = False;
          $error .= "Phone number must be between " .MIN_PHONE_NUMBER_LENGTH. " and " .MAX_PHONE_NUMBER_LENGTH. " numbers.<br/>";
          $error .= "Phone number area code and exchange must be between " .MIN_PHONE_RANGE. " and " .MAX_PHONE_RANGE. " numbers.<br/>";
          $error .= "Phone number dial sequence must be between " .MIN_DIAL_SEQUENCE. " and " .MAX_DIAL_SEQUENCE. " numbers.<br/>";
          $fax = "";
        }
      }
      else
      {
          $valid_fax = True;
          $fax = "";
      }
      if(isset($contact_method))
      {
        $valid_contact = True;
      }
      else
      {
        $valid_contact = False;
        $error .= "Please select a preferred contact method.<br/>";
      }

      if($valid_salutation && $valid_first && $valid_last && $valid_address1 && $valid_address2
         && $valid_city && $valid_prov && $valid_phone1 && $valid_phone2 && $valid_fax && $valid_postal && $valid_contact)
      {
        $person = pg_execute(db_connect(),'update_person', array($user_id, $salutation, $first_name, $last_name, $address_1, $address_2, $city
                              , $province, $postal_code, $primary_phone, $secondary_phone, $fax, $contact_method));
        $update_person = pg_num_rows($person);
        $_SESSION["updated"] = "Succesfully updated!";
        header('Location: admin.php');
        ob_flush();
      }
      echo $error;
    }
  ?>

  <center>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <table id="t10">
      <tr>
        <td><strong>Salutation:</strong></td>
        <td>
          <?php echo build_simpledropdown("salutations", $salutation, "Select"); ?>
        </td>
      </tr>
      <tr>
        <td><strong>First Name:</strong></td><td><input type="text" name="first_name" value="<?php echo $first_name; ?>"></td>
      </tr>
      <tr>
        <td><strong>Last Name:</strong></td><td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
      </tr>
      <tr>
        <td><strong>Street Address 1:</strong></td><td><input type="text" name="address_1" value="<?php echo $address_1; ?>"></td>
      </tr>
      <tr>
        <td><strong>Street Address 2:</strong></td><td><input type="text" name="address_2" value="<?php echo $address_2; ?>"></td>
      </tr>
      <tr>
        <td><strong>City:</strong></td><td><input type="text" name="city" value="<?php echo $city; ?>"></td>
      </tr>
      <tr>
        <td><strong>Province:</strong></td>
        <td>
          <?php echo build_simpledropdown("provinces", $province, "Select"); ?>
        </td>
      </tr>
      <tr>
        <td><strong>Postal Code:</strong></td><td><input type="text" name="postal_code" value="<?php echo $postal_code; ?>"></td>
      </tr>
      <tr>
        <td><strong>Primary Phone Number:</strong></td><td><input type="text" name="primary_phone" value="<?php echo $primary_phone; ?>"></td>
      </tr>
      <tr>
        <td><strong>Secondary Phone Number:</strong></td><td><input type="text" name="secondary_phone" value="<?php echo $secondary_phone; ?>"></td>
      </tr>
      <tr>
        <td><strong>Fax Number:</strong></td><td><input type="text" name="fax" value="<?php echo $fax; ?>"></td>
      </tr>
      <tr>
        <td><strong>Preferred Contact Method</strong></td><td><?php echo build_radio("preferred_contact_method",$contact_method); ?></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>
</center>
</br>
</br>
</div>
<?php include("footer.php"); ?>
