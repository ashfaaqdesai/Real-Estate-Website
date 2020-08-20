-- File: parking_type.sql
-- Name: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create parking_type property/value table

DROP TABLE IF EXISTS parking_type CASCADE;

CREATE TABLE parking_type(
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20)
);

ALTER TABLE parking_type OWNER TO group05_admin;

INSERT INTO parking_type (value, property) VALUES (1, 'Garage');
INSERT INTO parking_type (value, property) VALUES (2, 'Driveway');
INSERT INTO parking_type (value, property) VALUES (4, 'Street');
INSERT INTO parking_type (value, property) VALUES (8, 'Parking Lot');
