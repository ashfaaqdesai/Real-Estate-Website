-- File: bathrooms.sql
-- Author: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create bathrooms property/value table

DROP TABLE IF EXISTS bathrooms;

CREATE TABLE bathrooms (
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20) NOT NULL
);

ALTER TABLE bathrooms OWNER TO group05_admin;

INSERT INTO bathrooms (value, property) VALUES(1, '1 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES(2, '2 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES(4, '3 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES(8, '4 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES(16, '5+ Bathrooms');
