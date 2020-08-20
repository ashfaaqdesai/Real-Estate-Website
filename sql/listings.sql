-- File: listings.sql
-- Author: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create listings table

DROP TABLE IF EXISTS listings CASCADE;

create sequence listing_id_seq;
select setval('listing_id_seq', 10000);

CREATE TABLE listings(
  listing_id INTEGER NOT NULL PRIMARY KEY DEFAULT nextval('listing_id_seq'),
  user_id VARCHAR(20) NOT NULL REFERENCES users(user_id),
  status CHAR NOT NULL REFERENCES listing_status(value),
  price NUMERIC(10,2) NOT NULL,
  headline VARCHAR(100) NOT NULL,
  description VARCHAR(1000) NOT NULL,
  postal_code CHAR(6) NOT NULL,
  images SMALLINT DEFAULT '0' NOT NULL,
  city INTEGER NOT NULL REFERENCES city(value),
  property_options INTEGER NOT NULL REFERENCES property_options(value),
  bedrooms INTEGER NOT NULL REFERENCES bedrooms(value),
  bathrooms INTEGER NOT NULL REFERENCES bathrooms(value),
  heating_type INTEGER DEFAULT '0' NOT NULL REFERENCES heating_type(value),
  parking_type INTEGER DEFAULT '0' NOT NULL REFERENCES parking_type(value),
  basement_type INTEGER DEFAULT '0' NOT NULL REFERENCES basement_type(value),
  building_style INTEGER DEFAULT '0' NOT NULL REFERENCES building_style(value)
);

ALTER TABLE listings OWNER TO group05_admin;
