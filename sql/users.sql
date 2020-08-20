/* Group: 05
 * File Name: users.sql
 * October 02, 2019
*/
DROP Table IF EXISTS users CASCADE;

CREATE TABLE users(
  user_id VARCHAR(20) PRIMARY KEY,
  password VARCHAR(32) NOT NULL,
  email_address VARCHAR(256) NOT NULL,
  user_type VARCHAR(2) NOT NULL,
  enrol_date DATE NOT NULL,
  last_access DATE NOT NULL
);
ALTER TABLE users OWNER TO group05_admin;

INSERT INTO users VALUES(
  'jdoe',
  md5('password'),
  'jdoe@dcmail.ca',
  'c',
  '2018-1-1',
  '2019-2-2'
);

INSERT INTO users VALUES(
  'adesai',
  md5('password'),
  'adesai@dcmail.ca',
  's',
  '2018-1-1',
  '2019-2-2'
);

INSERT INTO users VALUES(
  'bsmith',
  md5('password'),
  'bsmit@dcmail.ca',
  'a',
  '2018-1-1',
  '2019-2-2'
);

INSERT INTO users VALUES(
  'jsmith',
  md5('password'),
  'jsmith@dcmail.ca',
  'dc',
  '2018-1-1',
  '2019-2-2'
);
INSERT INTO users VALUES(
  'tsawyer',
  md5('password'),
  'tsawyer@dcmail.ca',
  'pa',
  '2018-1-1',
  '2019-2-2'
);
