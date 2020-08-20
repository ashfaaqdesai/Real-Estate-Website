<?php
$title = "Listing Search";
$file = "listing_search.php";
$description = "Listing Search page for real estate website";
$date = "October 1, 2019";
include("header.php");
if(!isset($_GET['city']) && !isset($_SESSION['city']))
{
    $_SESSION['select_city'] = "Please select a city";
    header("Location: listing_select_city.php");
    ob_flush();
}
else if(isset($_GET['city']) || !isset($_SESSION['city']))
{
  $_SESSION['city'] = $_GET['city'];
  $city = $_SESSION['city'];
}
elseif (!isset($_GET['city']) && isset($_SESSION['city'])) {
  $city = unsum($_SESSION['city']);
}

$bedrooms = "";
$building_style = "";
$bathrooms = "";
$basement_type = "";
$heating_type = "";
$property_options = "";
$parking_type = "";
$min_price = "";
$max_price = "";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['change'])){
    header("Location: listing_select_city.php");
    ob_flush();
  }
  if(isset($_POST['search']))
  {
    $city = $_SESSION['city'];
    $bedrooms = sum_check_box($_POST['bedrooms']);
    $building_style = sum_check_box($_POST['building_style']);
    $bathrooms = sum_check_box($_POST['bathrooms']);
    $basement_type = sum_check_box($_POST['basement_type']);
    $heating_type = sum_check_box($_POST['heating_type']);
    $property_options = sum_check_box($_POST['property_options']);
    $parking_type = sum_check_box($_POST['parking_type']);
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];

    $listings = search($city, $building_style, $bedrooms, $bathrooms, $basement_type, $heating_type, $property_options, $parking_type, $min_price, $max_price);
    print_r($listings);
    if(sizeof($listings) == 0)
    {
      $error = "Please widen you search criteria.";
    }
    else if(sizeof($listings) == 1)
    {
      header("Location: listing_display.php?listing_id=".$listings[0]."");
      ob_flush();
    }
    else if(sizeof($listings) > 1)
    {
      $_SESSION['listings'] = $listings;
      header("Location: listing_search_results.php");
      ob_flush();
    }
  }
}

?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Search for Listings</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
<?php echo $error; ?>
    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="advanced-search-form">
              <!-- Search Title -->
              <div class="search-title">
                <p>Search for your home</p>
              </div>
              <!-- Search Form -->
              <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="advanceSearch">
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>City: </h4><?php  echo get_property("city", $city);
                                            foreach ($city as $value)
                                            {
                                              $city = get_property("city",$value);
                                              echo $city . " ";
                                            } ?>
                      <button type="submit" class="btn south-btn" name="change">Change City</button>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Building Styles:</h4>
                      <?php echo build_checkbox("building_style","building_style[]",$building_style); ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Bedrooms:</h4>
                      <?php echo build_checkbox("bedrooms", "bedrooms[]",$bedrooms); ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Bathrooms:</h4>
                      <?php echo build_checkbox("bathrooms", "bathrooms[]", $bathrooms); ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Basement Type:</h4>
                      <?php echo build_checkbox("basement_type","basement_type[]", $basement_type); ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Heating Type:</h4>
                      <?php echo build_checkbox("heating_type", "heating_type[]", $heating_type); ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Property Options:</h4>
                      <?php echo build_checkbox("property_options", "property_options[]", $property_options); ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Parking_Type:</h4>
                      <?php echo build_checkbox("parking_type", "parking_type[]", $parking_type); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Min. Price:</h4>
                      <input type="text" name="min_price" value="<?php echo $min_price ?>">
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                      <h4>Max. Price:</h4>
                      <input type="text" name="max_price" value="<?php echo $max_price ?>">
                    </div>
                  </div>
                </div>
                <!-- Submit -->
                <div class="form-group mb-0">
                  <button type="submit" class="btn south-btn" name="search">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->
    <?php include("footer.php"); ?>
