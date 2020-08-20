<?php
$title = "Register";
$file = "register.php";
$description = "Register page for real estate website";
$date = "October 1, 2019";
include("header.php");
?>
<div>
  <h2><center>Register</center></h2>
  <hr/>
  <br/>
  <?php
    $error = "";
    $today = date('Y-m-d', time());
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $province = "";
    $salutation = "";
    if(isset($_POST['register']))
    {
      $user_id = trim($_POST["user_id"]);
      $password = trim($_POST["password"]);
      $conf_pass = trim($_POST["confirm_password"]);
      $email_address = trim($_POST["email"]);
      $user_type = $_POST["user_type"];
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

      $result = pg_execute(db_connect(), 'invalid_user', array($user_id));
      $invalid_user =  pg_num_rows($result);

      if(strlen($user_id) >= MIN_ID_LENGTH && strlen($user_id) <= MAX_ID_LENGTH && !$invalid_user)
      {
        $valid_id = True;
      }
      else
      {
        $valid_id = False;
        $error .= "Please enter a valid user_id between ".MIN_ID_LENGTH. " and " .MAX_ID_LENGTH. " characters.<br/>";
        $user_id = "";
      }
      if(strlen($password) >= MIN_PASSWORD_LENGTH && strlen($password) <= MAX_PASSWORD_LENGTH && strcmp($password, $conf_pass) == 0)
      {
        $valid_pass = True;
      }
      else
      {
        $valid_pass = False;
        if(strlen($password) < MIN_PASSWORD_LENGTH || strlen($password) > MAX_PASSWORD_LENGTH){
          $error .= "Password must be between " . MIN_PASSWORD_LENGTH . " and " . MAX_PASSWORD_LENGTH . " characters.<br/>";
          $password = "";
          $conf_pass = "";
        }
        if(strcmp($password, $conf_pass) != 0){
          $error .= "Passwords do not match. Please make sure the passwords match.<br>";
          $password = "";
          $conf_pass = "";
        }
      }
      if(!empty($email_address) && filter_var($email_address, FILTER_VALIDATE_EMAIL) && strlen($email_address) <= MAX_EMAIL_LENGTH)
      {
        $valid_email = True;
      }
      else
      {
        $valid_email = False;
        if(empty($email_address) || !filter_var($email_address, FILTER_VALIDATE_EMAIL))
        {
          $error .= "Please enter a valid email address.<br/>";
          $email_address = "";
        }
        if(strlen($email_address) > MAX_EMAIL_LENGTH)
        {
          $error .= "Email address must be less than " . MAX_EMAIL_LENGTH . " characters.<br/>";
          $email_address = "";
        }
      }
      if($user_type == True)
      {
        $valid_type = True;
      }
      else
      {
        $valid_type = False;
        $error .= "Please select a user type.<br/>";
      }
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

      if($valid_id && $valid_pass && $valid_email && $valid_type && $valid_salutation && $valid_first && $valid_last && $valid_address1 && $valid_address2
         && $valid_city && $valid_prov && $valid_phone1 && $valid_phone2 && $valid_fax && $valid_postal && $valid_contact)
      {
        $user = pg_execute(db_connect(), 'register_user', array($user_id, hash(HASH_ALGO,$password), $email_address, $user_type, $today, $today));
        $insert_user = pg_num_rows($user);

        $person = pg_execute(db_connect(), 'register_person', array($user_id, $salutation, $first_name, $last_name, $address_1, $address_2, $city
                              , $province, $postal_code, $primary_phone, $secondary_phone, $fax, $contact_method));
        $insert_persons = pg_num_rows($person);
        $_SESSION["registered"] = "Succesfully Register!";
        header('Location: login.php');
        ob_flush();
      }
      echo $error;
    }
  ?>

  <center>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <table id="t10">
      <tr>
        <td><strong>User ID:</strong></td><td><input type="text" name="user_id" value="<?php echo $user_id; ?>"></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td><td><input type="password" name="password" value="<?php echo $password; ?>"></td>
      </tr>
      <tr>
        <td><strong>Confirm Password:</strong></td><td><input type="password" name="confirm_password" value="<?php echo $conf_pass; ?>"></td>
      </tr>
      <tr>
        <td><strong>Email Address:</strong></td><td><input type="text" name="email" value="<?php echo $email_address; ?>"></td>
      </tr>
      <tr>
        <td><strong>User Type:</strong></td>
        <td><input type="radio" name="user_type" value="<?php echo AGENT; ?>" <?php if(isset($_POST['user_type']) && $_POST['user_type'] == AGENT) echo 'checked="checked"';?>>Agent &nbsp;
        <input type="radio" name="user_type" value="<?php echo CLIENT; ?>"<?php if(isset($_POST['user_type']) && $_POST['user_type'] == CLIENT) echo 'checked="checked"';?>>Client</td>
      </tr>
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
        <td colspan="2"><input type="submit" name="register" value="Register"></td>
      </tr>
    </table>
  </form>
</center>
</br>
</br>
</div>
<?php include("footer.php"); ?>
