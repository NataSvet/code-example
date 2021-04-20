CREATE TABLE user_registr (
id serial PRIMARY KEY,
login varchar(30) UNIQUE NOT NULL,
password varchar(32) UNIQUE NOT NULL,
hash varchar(32) NOT NULL  default '',
ip varchar(10) NOT NULL  default '0'
)