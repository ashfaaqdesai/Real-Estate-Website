<?php
  //Users Constants
  define("ADMIN", "s");
  define("AGENT", "a");
  define("CLIENT", "c");
  define("PENDING", "p");
  define("DISABLED", "d");

  //Datbse Constants
  define("DB_HOST", "127.0.0.1");
  define("DB_NAME", "group05_db");
  define("DP_PORT", "5432");
  define("DB_PASSWORD", "DCCARN");
  define("DB_USER", "group05_admin");

  //Cookies Constants
  define("COOKIE_LIFESPAN", 2592000);

  //Algorithm Constants
  define("HASH_ALGO", "md5");

  define("EMAIL", "e");
  define("PHONE", "p");
  define("LETTER POST", "l");

  define("OPEN", "o");
  define("CLOSED", "c");
  define("SOLD", "s");

  define("MIN_PHONE_RANGE", "200");
  define("MAX_PHONE_RANGE","999");
  define("MIN_DIAL_SEQUENCE", "0");
  define("MAX_DIAL_SEQUENCE", "9999");

  define("MIN_ID_LENGTH", "6");
  define("MAX_ID_LENGTH", "20");
  define("MIN_PASSWORD_LENGTH", "8");
  define("MAX_PASSWORD_LENGTH", "16");
  define("MAX_EMAIL_LENGTH", "256");
  define("MAX_FIRST_NAME_LENGTH", "128");
  define("MAX_LAST_NAME_LENGTH", "128");
  define("MAX_STREET_ADDRESS_1_LENGTH", "128");
  define("MAX_STREET_ADDRESS_2_LENGTH", "75");
  define("MAX_CITY_LENGTH", "64");
  define("POSTAL_CODE_LENGTH", "6");
  define("MIN_PHONE_NUMBER_LENGTH", "10");
  define("MAX_PHONE_NUMBER_LENGTH", "15");

  define("SEARCH_LIMIT", "200");
  define("RECORDS_PER_PAGE", "10");
?>
