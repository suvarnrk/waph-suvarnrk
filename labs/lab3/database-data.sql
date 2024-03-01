drop table if exists users;
create table users (
username varchar(50) PRIMARY KEY,
password varchar(100) NOT NULL);
INSERT into users(username,password) values ('admin',md5('mypass'));