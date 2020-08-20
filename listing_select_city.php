<?php
$title = "Listing Select City";
$file = "listing_select_city.php";
$description = "Listing Select City page for real estate website";
$date = "November 18, 2019";
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
  $city = $_COOKIE['CITY_COOKIE'];
}

$error = $_SESSION['select_city'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $city = sum_check_box($_POST['city']);

  if(isset($_SESSION['select_city']))
  {
      unset($_SESSION['select_city']);
  }
  if(!empty($city))
  {
    $_SESSION['city'] = $city;

    if(isset($_SESSION['user']))
    {
        setcookie("CITY_COOKIE", $city, time() + COOKIE_LIFESPAN);
    }

    header("Location: listing_search.php");
    ob_flush();
  }
  else
  {
      $error = "Please select a city.<br/>";
  }
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">City Selection</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->
<?php echo $error; ?>
<script type="text/javascript">
	function toggle(source) {
		checkboxes = document.getElementsByName('city[]');
		for(i = 0; i < checkboxes.length; i++)
		{
			checkboxes[i].checked = source.checked;
		}
	}
</script>
<div class="south-search-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="advanced-search-form">
          <!-- Search Title -->
          <div class="search-title">
            <p>Select a City to Search</p>
          </div>
          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="row">
              <div class="col-12 col-md-4 col-lg-3">
                <div class="form-group">
                  <h4>Cities: </h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-15 col-md-6 col-lg-3">
                <div class="form-group">
                  <input type="checkbox" onclick="toggle(this)" name="city[]" value="0">Select All<br/>
                  <?php echo build_checkbox('city','city[]',$city) ?>
                </div>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <img src="img/durham.png" alt="Durham Region" usemap="#durhamMap" style="width:300px;height:300px;">
                  <map name="durhamMap">
                    <area shape="poly" coords="58,228,83,216,102,268,76,280" href="listing_search.php?city=1" alt="Ajax">
                    <area shape="poly" coords="73,171,105,160,114,199,84,209" href="listing_search.php?city=2" alt="Brooklin">
                    <area shape="poly" coords="137,152,262,114,294,222,167,247" href="listing_search.php?city=4" alt="Bowmanville">
                    <area shape="poly" coords="105,159,135,152,166,246,134,256" href="listing_search.php?city=8" alt="Oshawa">
                    <area shape="poly" coords="11,193,70,173,84,216,59,228,75,281,43,294" href="listing_search.php?city=16" alt="Pickering">
                    <area shape="poly" coords="45,74,104,54,116,76,175,58,193,132,72,169" href="listing_search.php?city=32" alt="Port Perry">
                    <area shape="poly" coords="84,211,115,200,132,255,103,267" href="listing_search.php?city=64" alt="Whitby">
                  </map>
                </div>
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn south-btn">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("footer.php"); ?>
