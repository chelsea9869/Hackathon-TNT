drop schema if exists hackathon;
create schema hackathon;
use hackathon;

create table user(
	username varchar(128) primary key,
    profile varchar(50)
);

create table bookkeeping(
	id int auto_increment primary key,
	username varchar(128) NOT NULL,
    date date NOT NULL,
    item varchar(128) NOT NULL,
    type varchar(7) NOT NULL,
    category varchar(50) NOT NULL,
    amount float NOT NULL,
    constraint foreign key (username) references user(username) ON UPDATE CASCADE ON DELETE CASCADE
);

Insert into user (username) values ("Alice Young");