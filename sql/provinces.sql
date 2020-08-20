/*
File Name: provinces.sql
Author: Group 05
Date: Oct 18, 2019
Description: sql file to create provinces value table
*/

DROP TABLE IF EXISTS provinces;

CREATE TABLE provinces(
	value VARCHAR(2)
);

ALTER TABLE provinces OWNER TO group05_admin;

INSERT INTO provinces VALUES ('AB');
INSERT INTO provinces VALUES ('BC');
INSERT INTO provinces VALUES ('MB');
INSERT INTO provinces VALUES ('NB');
INSERT INTO provinces VALUES ('NF');
INSERT INTO provinces VALUES ('NS');
INSERT INTO provinces VALUES ('NT');
INSERT INTO provinces VALUES ('NU');
INSERT INTO provinces VALUES ('ON');
INSERT INTO provinces VALUES ('PE');
INSERT INTO provinces VALUES ('QC');
INSERT INTO provinces VALUES ('SK');
INSERT INTO provinces VALUES ('YT');
