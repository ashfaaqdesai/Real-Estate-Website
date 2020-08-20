<?php
	include("../header.php");
	$status =
	Array( "o", "c", "s", "h", "o", "o", "c", "o", "s", "o", "h", "o", "o", "s"
		);

	$price =
	Array( "400000", "450000", "500000", "550000", "600000", "650000", "700000", "750000", "800000", "850000", "900000", "950000", "1000000", "1500000", "2000000", "2500000", "3000000"
		);

/*	$headline =
	Array( "p", "p", "p", "l", "l", "e", "e", "e", "e", "e",
		);*/

	$description =
	Array(
		"We want a shrubbery!! Shh! Knights, I bid you welcome to your new home. Let us ride to Camelot! Shut up! Its only a model.",
		"Im not a witch. …Are you suggesting that coconuts migrate? Why do you think that she is a witch? You cant expect to wield supreme power just cause some watery tart threw a sword at you! On second thoughts, lets not go there. It is a silly place.",
		"Oh! Come and see the violence inherent in the system! Help, help, Im being repressed! I have to push the pram a lot. Shut up! Camelot!",
		"I am your king. I am your king. Listen. Strange women lying in ponds distributing swords is no basis for a system of government. Supreme executive power derives from a mandate from the masses, not from some farcical aquatic ceremony.",
		"We found them. On second thoughts, lets not go there. It is a silly place. I have to push the pram a lot. Shut up! Whered you get the coconuts? How do you know she is a witch?",
		"Now, look here, my good man. Ah, now we see the violence inherent in the system! The Knights Who Say Ni demand a sacrifice! You cant expect to wield supreme power just cause some watery tart threw a sword at you!",
		"I dunno. Must be a king. Whered you get the coconuts? Be quiet! We found them. Why do you think that she is a witch?",
		"Ah, now we see the violence inherent in the system! Bloody Peasant! The swallow may fly south with the sun, and the house martin or the plover may seek warmer climes in winter, yet these are not strangers to our land.",
		"Well, Mercias a temperate zone! Ni! Ni! Ni! Ni! A newt? You dont frighten us, English pig-dogs! Go and boil your bottoms, sons of a silly person! I blow my nose at you, so-called Ah-thoor Keeng, you and all your silly English K-n-n-n-n-n-n-n-niggits!",
		"I dont want to talk to you no more, you empty-headed animal food trough water! I fart in your general direction! Your mother was a hamster and your father smelt of elderberries! Now leave before I am forced to taunt you a second time! Whos that then?",
		"The Lady of the Lake, her arm clad in the purest shimmering samite, held aloft Excalibur from the bosom of the water, signifying by divine providence that I, Arthur, was to carry Excalibur. That is why I am your king.",
		"I have to push the pram a lot. The Lady of the Lake, her arm clad in the purest shimmering samite, held aloft Excalibur from the bosom of the water, signifying by divine providence that I, Arthur, was to carry Excalibur. That is why I am your king."
	);

	$postal_code =
	Array( "L1J4B1",
		   "L1K2P8",
		   "L1G2K7",
		   "L1S3L2",
		   "L1S7K1",
		   "L1S1E4",
		   "L1T0B9",
		   "L1T3H7",
		   "L1T2K3",
		   "L1S7A8",
		   "L1T3H7",
		   "L1N6X5",
		   "L1R2C4",
		   "L1N8R4",
		   "L1N6Y1",
		   "L1R2E9",
		   "L1M2H5",
		   "L1R2T9",
		   "L1R2T9",
		   "L1V6R3",
		   "L1V5V7",
		   "L1W3M3",
		   "L1W1A9",
		   "L1V4S3",
		   "L1X1N9"
		);

	$city =
	Array( "1", "2", "4", "8", "16", "32", "64"
		);

	$property_options =
	Array( "1", "2", "4", "8", "16"
		);

	$bedrooms =
	Array( "1", "2", "4", "8", "16"
		);

	$bathrooms =
	Array( "1", "2", "4", "8", "16"
		);

	$heating_type =
	Array( "1", "2", "4", "8"
		);

	$parking_type =
	Array( "1", "2", "4", "8"
		);

	$basement_type =
	Array( "1", "2", "4", "8",
		);

	$building_style =
	Array( "1", "2", "4", "8", "16", "32"
		);

	//$conn = db_connect();
	//$password = "password";
	//$today = date("Y-m-d");

	for ($counter = 1; $counter <= 1500; $counter++)
	{
		//get random index from array
		$rand_status = mt_rand()%sizeof($status);
		$rand_price = mt_rand()%sizeof($price);
		//$rand_headline = mt_rand()%sizeof($headline);
		$rand_description = mt_rand()%sizeof($description);
		$rand_postal_code = mt_rand()%sizeof($postal_code);
		$rand_city = mt_rand()%sizeof($city);
		$rand_property_options = mt_rand()%sizeof($property_options);
		$rand_bedrooms = mt_rand()%sizeof($bedrooms);
		$rand_bathrooms = mt_rand()%sizeof($bathrooms);
		$rand_heating_type = mt_rand()%sizeof($heating_type);
		$rand_parking_type = mt_rand()%sizeof($parking_type);
		$rand_basement_type = mt_rand()%sizeof($basement_type);
		$rand_building_style = mt_rand()%sizeof($building_style);

/*		echo $status[$rand_status] . "<br/>";
		echo $price[$rand_price] . "<br/>";
		echo $description[$rand_description] . "<br/>";
		echo $postal_code[$rand_postal_code] . "<br/>";
		echo $city[$rand_city] . "<br/>";
		echo $property_options[$rand_property_options] . "<br/>";
		echo $bedrooms[$rand_bedrooms] . "<br/>";
		echo $bathrooms[$rand_bathrooms] . "<br/>";
		echo $heating_type[$rand_heating_type] . "<br/>";
		echo $parking_type[$rand_parking_type] . "<br/>";
		echo $basement_type[$rand_basement_type] . "<br/>";
		echo $building_style[$rand_building_style] . "<br/><br/>";*/

		$sql1 = "SELECT user_id
				FROM users
				WHERE user_type='a'
				ORDER BY random()
				LIMIT 1";
	  $result1 = pg_query(db_connect(), $sql1);
		$user_id = pg_fetch_result($result1,0,0);

		$sql3 = "SELECT property FROM city WHERE value = '$city[$rand_city]' ";
		$result3 = pg_query(db_connect(), $sql3);
		$cityh = pg_fetch_result($result3,0,0);

		$sql4 = "SELECT property FROM building_style WHERE value = '$building_style[$rand_building_style]' ";
		$result4 = pg_query(db_connect(), $sql4);
		$building_style_h = pg_fetch_result($result4,0,0);

		$headline = $building_style_h . " In " . $cityh;
		$sql2 = "INSERT INTO listings(user_id, status, price, headline, description, postal_code, city, property_options, bedrooms, bathrooms, heating_type, parking_type, basement_type, building_style)
								VALUES('".$user_id."',
										'".$status[$rand_status]."',
										'".$price[$rand_price]."',
										'".$headline."',
										'".$description[$rand_description]."',
										'".$postal_code[$rand_postal_code]."',
										'".$city[$rand_city]."',
										'".$property_options[$rand_property_options]."',
										'".$bedrooms[$rand_bedrooms]."',
										'".$bathrooms[$rand_bathrooms]."',
										'".$heating_type[$rand_heating_type]."',
										'".$parking_type[$rand_parking_type]."',
										'".$basement_type[$rand_basement_type]."',
										'".$building_style[$rand_building_style]."')";

		$result2 = pg_query(db_connect(),$sql2);
	}
?>
