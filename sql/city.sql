-- File: city.sql
-- Author: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create city property/value table

DROP TABLE IF EXISTS city;

CREATE TABLE city(
value INTEGER PRIMARY KEY,
property VARCHAR(30) NOT NULL
);

ALTER TABLE city OWNER TO group05_admin;

INSERT INTO city (value, property) VALUES (1, 'Ajax');

INSERT INTO city (value, property) VALUES (2, 'Brooklin');

INSERT INTO city (value, property) VALUES (4, 'Bowmanville');

INSERT INTO city (value, property) VALUES (8, 'Oshawa');

INSERT INTO city (value, property) VALUES (16, 'Pickering');

INSERT INTO city (value, property) VALUES (32, 'Port Perry');

INSERT INTO city (value, property) VALUES (64, 'Whitby');
