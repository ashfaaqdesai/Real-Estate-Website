<?php
$title = "Create Listing";
$file = "listing_create.php";
$description = "Create Listing page for real estate website";
$date = "October 1, 2019";
include("header.php");

if($_SESSION['user']['user_type'] != AGENT)
{
  $_SESSION['invalid_user'] = "You are not the correct user type please login.";
  header("Location: login.php");
  ob_flush();
}
?>

<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST['submit'])){
      $heading = trim($_POST["title"]);
      $city = $_POST['city'];
      $postal_code = trim($_POST["postalcode"]);
      $description = trim($_POST["description"]);
      $building_style = trim($_POST["category"];
      $bedrooms = $_POST["bedrooms"];
      $bathrooms = $_POST["bathrooms"];
      $heating_type = $_POST["heatingtype"];
      $parking_type = $_POST["parkingtype"];
      $basement_type = $_POST["basementtype"];
      $price = trim($_POST["price"]);
      $property_options=sum_check_box($_POST['property_options']);
    }
  }
?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Create Listings</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

<form class="" action="listing_create.php" method="post">
  <br/>
  <div>
    <div class="col-6 col-md-15 col-lg-30">
        <table>
          <tr>
            <td>Images</td>
            <td> <input type="file" name="images" value=""> </td>
          </tr>
          <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo $headline;?>"></td>
          </tr>
          <tr>
            <td>City</td>
            <td><select name="city">
              <option value="Ajax">Ajax</option>
              <option value="Brooklin">Brooklin</option>
              <option value="Bowmanville">Bowmanville</option>
              <option value="Oshawa">Oshawa</option>
              <option value="Pickering">Pickering</option>
              <option value="Port Perry">Port Perry</option>
              <option value="Whitby">Whitby</option>
            </select>
              </td>
          </tr>
          <tr>
            <td>Postal Code</td>
            <td><input type="text" name="postalcode" value="<?php echo $postal_code;?>"></td>
          </tr>
          <tr>
          <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo $description;?>"></td>
          </tr>
          <tr>
            <td>Category</td>
            <td><select name="category">
              <option value="Detached">Detached</option>
              <option value="Semi-Detached">Semi-Detached</option>
              <option value="Town">Town</option>
              <option value="Apartment">Apartment</option>
              <option value="Condominium">Condominium</option>
              <option value="Bungalow">Bungalow</option>
            </select>
              </td>
          </tr>
          <tr>
            <td>Bedrooms</td>
            <td><select name="bedrooms">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5+">5+</option>
            </select>
            </td>
          </tr>
          <tr>
            <td>Bathrooms</td>
            <td><select name="bathrooms">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5+">5+</option>
            </select>
            </td>
          </tr>
          <tr>
            <td>Heating Type</td>
            <td><select name="heatingtype">
              <option value="1">Natural Gas</option>
              <option value="2">Electric</option>
              <option value="3">Propane</option>
              <option value="4">Radiator</option>
              <option value="5">Oil</option>
              <option value="6">Geo-Thermal</option>
            </select>
            </td>
          </tr>
          <tr>
            <td>Parking Type</td>
            <td><select name="parkingtype">
              <option value="1">Garage</option>
              <option value="2">Driveway</option>
              <option value="3">Street</option>
              <option value="4">Parking Lot</option>
            </select>
            </td>
          </tr>
          <tr>
            <td>Basement Type</td>
            <td><select name="basementtype">
              <option value="1">Finished</option>
              <option value="2">Unfinished</option>
              <option value="3">Walk-out</option>
              <option value="4">Partial</option>
            </select>
            </td>
          </tr>
            <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="<?php echo $price;?>"></td>
          </tr>
      </table>
    </div>
    <br/>
    <div class="col-12 col-md-4 col-lg-3">
      <p>Property Options:</p>
        <?php echo build_checkbox("property_options", "property_options[]",$property_options); ?>
    </div>
  </div>
  <br/>
  <!-- Submit -->
  <div class="form-group mb-0">
    <button type="submit" class="btn south-btn" name="create">Create Listing</button>
  </div>
  <br/>
</form>

<?php include("footer.php"); ?>
