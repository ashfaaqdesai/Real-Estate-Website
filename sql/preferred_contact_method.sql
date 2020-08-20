-- File: preferred_contact_method.sql
-- Date: October 29, 2019
--Description: sql file to create preferred_contact_method value table

DROP TABLE IF EXISTS preferred_contact_method;

CREATE TABLE preferred_contact_method(
  value CHAR(1),
  property VARCHAR(20)
);

ALTER TABLE preferred_contact_method OWNER TO group05_admin;

INSERT INTO preferred_contact_method VALUES('e','Email');
INSERT INTO preferred_contact_method VALUES('p','Phone');
INSERT INTO preferred_contact_method VALUES('l','Letter Post');
