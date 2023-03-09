create database datingappdb;
use datingappdb;

Create table genders(
gender_id int(16) not null,
gender_ref varchar(32) ,
primary key(gender_id)
);


CREATE TABLE users (
    userID int(11) NOT NULL AUTO_INCREMENT,
    email varchar(128) not null,
    password text(512) not null,
    lastname varchar(255),
    fistname varchar(255) NOT NUlL,
    age int,
    country varchar(64) not null,
    gender_id int(16) not null,
    PRIMARY KEY (userid),
    foreign key(gender_id) References genders(gender_id)
);


create table user_preference (
id int(11) auto_increment not null,
userID int(11) not null,
gender_id int(16) not null,
primary key (id),
foreign key(userID) references users(userID),
foreign key(gender_d) references genders(gender_id)

);



create table user_likes(
id int(11) auto_increment not null,
userID int(11) not null,
liked_user_id int(11) not null,
primary key(id),
foreign key(userID) references users(userid),
foreign key(liked_user_id) references users(userid)
);


ALTER TABLE users
ADD bio text(256);