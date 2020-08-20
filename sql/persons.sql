DROP TABLE IF EXISTS persons;

CREATE TABLE persons(
  user_id VARCHAR(20) NOT NULL REFERENCES users(user_id),
  salutation VARCHAR(10),
  first_name VARCHAR(128) NOT NULL,
  last_name VARCHAR(128) NOT NULL,
  street_address_1 VARCHAR(128) NOT NULL,
  street_address_2 VARCHAR(75) DEFAULT '""',
  city VARCHAR(64) NOT NULL,
  province VARCHAR(2) NOT NULL,
  postal_code VARCHAR(6) NOT NULL,
  primary_phone_number VARCHAR(15) NOT NULL,
  secondary_phone_number VARCHAR(15) DEFAULT '""',
  fax_number VARCHAR(15) DEFAULT '""',
  preferred_contact_method CHAR(1) NOT NULL
);
