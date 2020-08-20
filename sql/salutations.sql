-- File: Ashfaaq Desai
-- Date: October 29, 2019
-- Description: sql file to create salutations value table

DROP TABLE IF EXISTS salutations;

CREATE TABLE salutations(
  value VARCHAR(10)
);

ALTER TABLE salutations OWNER TO group05_admin;

INSERT INTO salutations VALUES('Mr.');
INSERT INTO salutations VALUES('Mrs.');
INSERT INTO salutations VALUES('Ms.');
INSERT INTO salutations VALUES('Miss.');
