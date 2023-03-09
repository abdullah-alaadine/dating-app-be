create database datingappdb;
use datingappdb;


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
