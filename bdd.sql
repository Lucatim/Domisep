CREATE TABLE sub_list(
id_sub_list PRIMARY KEY AUTO_INCREMENT ,
name varchar(16),
price float
);


CREATE TABLE user(

num_client int PRIMARY KEY AUTO_INCREMENT ,
id_sub_list int REFERENCES sub_list(id_sub_list),

id bigint UNIQUE NOT NULL AUTO_INCREMENT,
pass varchar(16),
date_reg date,
date_log datetime,
title varchar(32),
pic text,
surname varchar(32),
name varchar(32),
birth date,
bill_addr varchar(32),
bill_town varchar(32),
bill_post_code int,
bill_state varchar(32),
bill_country varchar(32),
mail varchar(32),
phone int,
fax int,

view_on boolean,
modif_on boolean,

discount int,
number_sensor int,

second_user boolean
);


CREATE TABLE mail(
id_mail int PRIMARY KEY AUTO_INCREMENT,
recipient int REFERENCES user(num_client),
sender int REFERENCES user(num_client),

title varchar(32),
mess text,
date_mail datetime,
bin boolean,
);

CREATE TABLE  bill(
id_bill int PRIMARY KEY AUTO_INCREMENT ,
num_client REFERENCES user(num_client),

date_bill date,
pdf text
);



CREATE TABLE block(
id_block PRIMARY KEY,

name varchar(32),
temp_max int,
heat_on boolean
);

CREATE TABLE home(
id_home PRIMARY KEY,

addr varchar(32),
post_code int,
state varchar(32),
country varchar(32),
num_user int,
name varchar(16)
);

CREATE TABLE user_home_block(
num_client REFERENCES user(num_client),
id_home REFERENCES home(id_home) ,
id_block REFERENCES block(id_block)
);


CREATE TABLE room(
id_room PRIMARY KEY,
id_home REFERENCES home(id_home),
id_room_list REFERENCES room_list(id_room_list),

pos int,
order int,
);

CREATE TABLE room_list(
id_room_list PRIMARY KEY NOT NULL AUTO_INCREMENT,

name varchar(16)
);

CREATE TABLE sensor(
id_sensor  PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_room REFERENCES room(id_room),

data float,
sensor_on boolean
);

CREATE TABLE sensor_data(
id_sensor_data PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_sensor REFERENCES sensor(id_sensor),

date_sensor date,
data float
);

CREATE TABLE sensor_order(
id_sensor_order PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_sensor REFERENCES sensor(id_sensor),

hour_beg int,
hour_end int,
order_on boolean,
limit float
);

CREATE TABLE sensor_list(
id_sensor_list PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_sensor REFERENCES sensor(id_sensor),

name varchar(16),
pic text,
on boolean
);

CREATE TABLE sensor_room(
id_room_list REFERENCES room_list(id_room_list) ,
id_sensor_list REFERENCES sensor_list(id_sensor_list) ,

on boolean
);





