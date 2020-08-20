<?php
$title = "Listing Search Results";
$file = "listing_search_results.php";
$description = "Listing search results page for real estate website";
$date = "October 1, 2019";
include("header.php");

if(!isset($_SESSION['city']))
{
    $_SESSION['select_city'] = "Please select a city";
    header("Location: listing_select_city.php");
    ob_flush();
}

$city = $_SESSION['city'];
$bedrooms = "";
$building_style = "";
$bathrooms = "";
$basement_type = "";
$heating_type = "";
$property_options = "";
$parking_type = "";

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
                        <form action="#" method="post" id="advanceSearch">
                          <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <h4>City: </h4><?php echo $_SESSION['city']; ?>
                                    </div>
                                    <div class="">

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
                            <!-- Submit -->
                            <div class="form-group mb-0">
                                <button type="submit" class="btn south-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->
<?php include("footer.php"); ?>
