create database phpapi;

use phpapi;

create table users(
    id int not null AUTO_INCREMENT,
    name varchar(255) not null,
    password varchar(255) not null,
    PRIMARY KEY (id)
);