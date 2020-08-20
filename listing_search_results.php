<?php
$title = "Listing Search Result";
$file = "listing_search_results.php";
$description = "Listing Search Result page for real estate website";
$date = "October 1, 2019";
include("header.php");

$listing_id = $_SESSION['listings'];

if(isset($_GET['page_no'])){
  $page_no = $_GET['page_no'];
}
else {
  $page_no = 1;
}

$offset = ($page_no-1) * RECORDS_PER_PAGE;


?>

<!-- ##### Listing Content Wrapper Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <?php foreach($listing_id as $id){
                echo build_listing_preview($id, $page_no);} ?>
        </div>
    </div>
</section>
<!-- ##### Listing Content Wrapper Area End ##### -->
<?php include("footer.php"); ?>
