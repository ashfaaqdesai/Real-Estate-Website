<?php
  function display_copyright()
  {
    echo "&copy;" . date('Y');
  }

  function display_phone_number($value)
  {
    if(is_numeric($value) && strlen($value) >= MIN_PHONE_NUMBER_LENGTH && strlen($value) <= MAX_PHONE_NUMBER_LENGTH)
    {
      if(strlen($value) > MIN_PHONE_NUMBER_LENGTH)
      {
        $value = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4}([0-9]{1,5}))/", "($1)$2-$3 ext.$4", $value);
      }
      $value = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)$2-$3", $value);
    }
    return $value;
  }

  //function was referenced from https://gist.github.com/james2doyle/c310e6ceeb3bad437621
  function is_valid_postal_code($value)
  {
    $valid_chars = '/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/';
    $is_valid = (bool)preg_match($valid_chars, $value);
    return $is_valid;
  }

  function is_valid_phone_number($value)
  {
    if(is_numeric($value) && strlen($value) >= MIN_PHONE_NUMBER_LENGTH && strlen($value) <= MAX_PHONE_NUMBER_LENGTH
       && substr($value, 0, 3) >= MIN_PHONE_RANGE && substr($value, 0, 3) <= MAX_PHONE_RANGE
       && substr($value, 3, 3) >= MIN_PHONE_RANGE && substr($value, 3, 3) <= MAX_PHONE_RANGE
       && substr($value, 6, 4) >= MIN_DIAL_SEQUENCE && substr($value, 6, 4) <= MAX_DIAL_SEQUENCE)
    {
      return True;
    }
    else{
      return False;
    }
  }

  /*
	this function should be passed a integer power of 2, and any decimal number,
	it will return true (1) if the power of 2 is contain as part of the decimal argument
*/
function is_bit_set($power, $decimal) {
	if((pow(2,$power)) & ($decimal))
		return 1;
	else
		return 0;
}

/*
	this function can be passed an array of numbers (like those submitted as
	part of a named[] check box array in the $_POST array).
*/
function sum_check_box($array)
{
	$num_checks = count($array);
	$sum = 0;
	for ($i = 0; $i < $num_checks; $i++)
	{
	  $sum += $array[$i];
	}
	return $sum;
}

function unsum($sum)
{
  $array = array();
  while(pow(2, $index) <= $sum)
  {
    if (is_bit_set($index, $sum)){
      //$array[$index] = pow(2,$index);
      array_push($array,pow(2,$index));
    }
    $index++;
  }
  return $array;
}
?>
