<?php
  function db_connect()
  {
    $conn = pg_connect("host=".DB_HOST."  dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD."");
    return $conn;
  }

  function build_simpledropdown($table, $preselected = "", $prompt = "")
  {
    $results = pg_query(db_connect(),'SELECT * FROM '. $table);
    $options = pg_fetch_all($results);
    $string = '<select name="'.$table.'">';
    $string .= (trim($prompt) == "")?"":'<option value="">'.$prompt.'</option>';
    foreach($options as $option)
    {
      $selected = ($preselected == $option['value'])?' selected="selected" ':'';

      $string .= '<option value="'.$option['value'].'" '.$selected.'>' .$option['value']. '</option>';
    }
    $string .= '</select>';
    return $string;
  }

  function build_radio($table, $preselected = "")
  {
    $results = pg_query(db_connect(),'SELECT * FROM '.$table);
    $options = pg_fetch_all($results);
    foreach($options as $option)
    {
      $checked = ($preselected == $option['value'])?' checked="checked" ':'';
      $string .= "<input type=radio name='".$table."' value='".$option['value']."' $checked;>" .$option['property']. "&nbsp;</input>";
    }

    return $string;
  }

  function build_dropdown($table, $preselected = "", $prompt = "")
  {
    $results = pg_query(db_connect(),'SELECT * FROM '. $table);
    $options = pg_fetch_all($results);
    $string = '<select name="'.$table.'">';
    $string .= (trim($prompt) == "")?"":'<option value="">'.$prompt.'</option>';
    foreach($options as $option)
    {
      $selected = ($preselected == $option['value'])?' selected="selected" ':'';

      $string .= '<option value="'.$option['value'].'" '.$selected.'>' .$option['property']. '</option>';
    }
    $string .= '</select>';
    return $string;
  }

  function build_checkbox($table, $name, $preselected = "")
  {
    $results = pg_query(db_connect(), 'SELECT * FROM '. $table);
    $options = pg_fetch_all($results);
    $string = "";
    $pow = 0;
    foreach($options as $option)
    {
      $checked = (is_bit_set($pow ,$preselected))?' checked="checked" ':'';
      $pow ++;
      $string .= "<input type=checkbox name='".$name."' value='".$option['value']."' $checked;>"." ".$option['property']. "<br/></input>";
    }

    return $string;
  }

  function get_property($table, $value)
  {
    $result = pg_query(db_connect(), 'SELECT * FROM '.$table.' WHERE value = '.$value);
    $property = pg_fetch_all($result);
    foreach ($property as $option) {
      $string = $option['property'];
    }
    return $string;
  }
  /*for($power = 0; $power <= 7; $power ++){
    if(is_bit_set($power, $city)){
      $sql .= "city = '".pow(2,$counter)."' OR ";
    }
  }*/
  function search($city, $building_style, $bedrooms, $bathrooms, $basement_type, $heating_type, $property_options, $parking_type, $min_price, $max_price)
  {
    $sql = "SELECT * FROM listings WHERE";
    if(!empty($city)){
      $sql .= " (city & $city > 0)";
    }
    if(!empty($building_style)){
      $sql .= " AND (building_style & $building_style > 0)";
    }
    if(!empty($bedrooms)){
      $sql .= " AND (bedrooms & $bedrooms > 0)";
    }
    if(!empty($bathrooms)){
      $sql .= " AND (bathrooms & $bathrooms > 0)";
    }
    if(!empty($basement_type)){
      $sql .= " AND (basement_type & $basement_type > 0)";
    }
    if(!empty($heating_type)){
      $sql .= " AND (heating_type & $heating_type > 0)";
    }
    if(!empty($property_options)){
      $sql .= " AND (property_options & $property_options > 0)";
    }
    if(!empty($parking_type)){
      $sql .= " AND (parking_type & $parking_type > 0)";
    }
    if(!empty($min_price)){
      $sql .= " AND (price >= $min_price)";
    }
    if(!empty($max_price)){
      $sql .= " AND (price >= $max_price)";
    }
    $sql .= " AND status='".OPEN."' ORDER BY listing_id DESC limit ".SEARCH_LIMIT."";
    /*(city & '.$city.' > 0) AND (building_style & '.$building_style.' > 0) AND (bedrooms & '.$bedrooms.' > 0)
            AND (bathrooms & '.$bathrooms.' > 0) AND (basement_type & '.$basement_type.' > 0) AND (heating_type & '.$heating_type.' > 0)
            AND (property_options & '.$property_options.' > 0) AND (parking_type & '.$parking_type.' > 0)
            AND status=\''.OPEN.'\' ORDER BY listing_id DESC limit '.SEARCH_LIMIT.'';*/
	  echo $sql;
    $results = pg_query(db_connect(), $sql);
    $listings = pg_fetch_all($results);
    foreach ($listings as $listing_id) {
      $listing[] = $listing_id['listing_id'];
    }
    return $listing;
  }

  function build_listing_preview($listing_id, $page)
  {
    $result = pg_query(db_connect(),'SELECT * FROM listings WHERE listing_id= '.$listing_id.'');
    $listing = pg_fetch_assoc($result);
    for($counter=($page - 1) *10; $counter < ($page*10)&& $counter < size0f($listing_id); $counter ++){
      $string = "<div class=col-12 col-md-6 col-xl-4>
          <div class=single-featured-property mb-50>
              <div class=property-thumb>
                  <img src=img/no-image.jpg alt=No Image style=width:30%;height:30%>
                  <div class=tag>
                      <span>".$listing['status']."</span>
                  </div>
                  <div class=list-price>
                      <p>$".$listing['price']."</p>
                  </div>
              </div>
              <div class=property-content>
                  <h5>".$listing['headline']."</h5>
                  <p class=location><img src=img/icons/location.png alt=>".$listing['postal_code'] . ", " .get_property('city',$listing['city'])."</p>
                  <p>".$listing['description']."</p>
              </div>
            </div>
            </div>";
    }
    return $string;
  }

  function build_pagination_menu($listings, $page)
  {
    $url = strtok($_SERVER['REQUEST_URI'], '?');
    $string = "";
    $totalPages = ciel(sizeof($listings)/RECORDS_PER_PAGE);
    if($page > 1){
      $string .= "<a href=\"".$url."?page = " . 1 . "\">&lt;&lt;</a>&nbsp;&nbsp;";
      $string .= "<a href=\"".$url."?page = " .($page-1). "\">&lt;</a>&nbsp;";
    }
    for ($counter = 1; $counter <= $totalPages; $counter ++){
      if($page == $counter){
        $string .= $counter;
      }
      else{
        $string .= "<a href=\"".$url."?page = " .$counter. "\">".$counter."</a>&nbsp;";
      }
    }
    if($page != $totalPages){
      $string .= "&nbsp;<a href=\"".$url."?page=" . ($page+1) . "\">&gt;</a>&nbsp;&nbsp;";
      $string .= "<a href=\"".$url."?page=" . $totalPages . "\">&gt;&gt;</a>";
    }
    return $string;
  }

  $user_login = pg_prepare(db_connect(), 'user_login', 'SELECT * FROM users WHERE user_id = $1 AND password = $2');
  $last_access = pg_prepare(db_connect(),'last_access', 'UPDATE users SET last_access=\''.date("Y-m-d",time()).'\' WHERE user_id = $1');
  $invalid_user = pg_prepare(db_connect(), 'invalid_user', 'SELECT * FROM users WHERE user_id = $1');
  $register_user = pg_prepare(db_connect(), 'register_user', 'INSERT INTO users VALUES($1,$2,$3,$4,$5,$6)');
  $register_person = pg_prepare(db_connect(), 'register_person', 'INSERT INTO persons VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13)');
  $person = pg_prepare(db_connect(), 'person', 'SELECT * FROM persons WHERE user_id = $1');
  $update_person = pg_prepare(db_connect(),'update_person', 'UPDATE persons SET salutation=$2, first_name=$3, last_name=$4, street_address_1=$5,
                                                             street_address_2=$6, city=$7, province=$8, postal_code=$9, primary_phone_number=$10,
                                                             secondary_phone_number=$11, fax_number=$12, preferred_contact_method=$13 WHERE user_id = $1');
  $create_listing = pg_prepare(db_connect(),'create_listing', 'INSERT INTO listings VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16)');
?>
