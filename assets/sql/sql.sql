


CREATE TABLE users (
    id int(100) unsigned NOT NULL AUTO_INCREMENT,
    username varchar(200) NOT NULL,
    password varchar(255) NOT NULL,
    email  varchar(100) NOT NULL,
    type  text(100) DEFAULT 'teacher' NOT NULL,
    color text(100) NOT NULL,
    grade text(100) NOT NULL,
    departement text(100) NOT NULL,
    status text(100) DEFAULT 'active' NOT NULL,
    image longtext default('none') not null,
    expiration_date varchar(100) DEFAULT 'none' NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
)






create table table_amphi (
    datee varchar(20)   NOT NULL,
    PRIMARY KEY (datee)
)
create table table_td (
    datee varchar(20)   NOT NULL,
    PRIMARY KEY (datee)
)
create table table_tp (
    datee varchar(20)   NOT NULL,
    PRIMARY KEY (datee)
)






create table reservations1 (
    users   varchar(100)  NOT NULL,
    datee   varchar(20)  NOT NULL,
    cell    varchar(20)  NOT NULL,
    device1 varchar(20),
    device2 varchar(20),
    device3 varchar(20),
    device4 varchar(20),
 primary key (id)

     /*FOREIGN KEY (datee) REFERENCES table_amphi(datee)*/

)
create table reservations2 (   
    users   varchar(100)  NOT NULL,
    datee   varchar(20)  NOT NULL,
    box    varchar(20)  NOT NULL,
    device1 varchar(20),
    device2 varchar(20),
    device3 varchar(20),
    device4 varchar(20),
 primary key (id)
  /* FOREIGN KEY (datee) REFERENCES table_td(datee)*/
)
create table reservations3 (
    users   varchar(100)  NOT NULL,
    datee   varchar(20)  NOT NULL,
    square    varchar(20)  NOT NULL,
    device1 varchar(20),
    device2 varchar(20),
    device3 varchar(20),
    device4 varchar(20),
 primary key (id)
   /* FOREIGN KEY (datee) REFERENCES table_tp(datee)*/
)








create table contact (
    id int(100) unsigned NOT NULL AUTO_INCREMENT,
    sender varchar(50)  NOT NULL,
    content varchar(400),
    date varchar(20)  NOT NULL,
    cell varchar(20)  NOT NULL,
    reciever varchar(50)  NOT NULL,
      PRIMARY KEY (id)
    /*  FOREIGN KEY (sender) REFERENCES users(username),
      FOREIGN KEY (reciever) REFERENCES users(username)*/
)
create table demands (
    id int(100) unsigned NOT NULL AUTO_INCREMENT,
    sender varchar(50)  NOT NULL,
    devices varchar(200) not null,
    date varchar(20)  NOT NULL,
    cell varchar(50)  NOT NULL,
    PRIMARY KEY (id)
    /*
      FOREIGN KEY (sender) REFERENCES users(username)*/
)




create table rooms(
room VARCHAR(255) NOT NULL,
indexes int not null ,
special VARCHAR(255) not null default('no')
)



create table grades(
grades VARCHAR(255) NOT NULL,
PRIMARY KEY (grades)
)



create table departements(
departements VARCHAR(255) not null,
PRIMARY KEY (departements)
)


