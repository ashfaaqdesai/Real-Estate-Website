-- File: heating_type.sql
-- Name: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create heating_type property/value table

DROP TABLE IF EXISTS heating_type CASCADE;

CREATE TABLE heating_type(
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20)
);

ALTER TABLE heating_type OWNER TO group05_admin;

INSERT INTO heating_type (value, property) VAlUES (1,'Natural Gas');
INSERT INTO heating_type (value, property) VAlUES (2,'Electric');
INSERT INTO heating_type (value, property) VAlUES (4,'Propane');
INSERT INTO heating_type (value, property) VAlUES (8,'Radiator');
INSERT INTO heating_type (value, property) VALUES (16,'Oil');
INSERT INTO heating_type (value, property) VALUES (32,'Geo-Thermal');
