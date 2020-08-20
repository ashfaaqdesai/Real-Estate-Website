-- File: bedrooms.sql
-- Author: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create bedrooms property/value table

DROP TABLE IF EXISTS bedrooms;

CREATE TABLE bedrooms (
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20) NOT NULL
);

ALTER TABLE bedrooms OWNER TO group05_admin;

INSERT INTO bedrooms (value, property) VALUES(1, '1 Bedroom');
INSERT INTO bedrooms (value, property) VALUES(2, '2 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES(4, '3 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES(8, '4 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES(16, '5+ Bedrooms');
