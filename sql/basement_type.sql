-- File: basement_type.sql
-- Name: Group 05
-- Date: October 28, 2019
-- Description: SQL file to create basement_type property/value table

DROP TABLE IF EXISTS basement_type CASCADE;

CREATE TABLE basement_type(
  value INTEGER NOT NULL PRIMARY KEY,
  property VARCHAR(20)
);

ALTER TABLE basement_type OWNER TO group05_admin;

INSERT INTO basement_type (value, property) VALUES (1, 'Finished');
INSERT INTO basement_type (value, property) VALUES (2, 'Unfinished');
INSERT INTO basement_type (value, property) VALUES (4, 'Walk-out');
INSERT INTO basement_type (value, property) VALUES (8, 'Partial');
