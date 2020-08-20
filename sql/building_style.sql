-- File: building_style.sql
-- Name: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create building_style property/value table

DROP TABLE IF EXISTS building_style CASCADE;

CREATE TABLE building_style(
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20)
);

ALTER TABLE building_style OWNER TO group05_admin;

INSERT INTO building_style (value, property) VALUES (1, 'Detached House');
INSERT INTO building_style (value, property) VALUES (2, 'Semi-detached House');
INSERT INTO building_style (value, property) VALUES (4, 'Town House');
INSERT INTO building_style (value, property) VALUES (8, 'Apartment');
INSERT INTO building_style (value, property) VALUES (16, 'Condominium');
INSERT INTO building_style (value, property) VALUES (32, 'Bungalow');
