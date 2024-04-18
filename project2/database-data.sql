drop table if exists `users`;
create table users(
  username varchar(50) ,
  firstname varchar(100),
  lastname varchar(100),
  email varchar(100),
  phonenumber varchar(20),
  password varchar(50) NOT NULL);