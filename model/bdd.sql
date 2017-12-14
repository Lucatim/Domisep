/*
Drop table
 */
DROP TABLE IF EXISTS sub_list CASCADE;
DROP TABLE IF EXISTS client CASCADE;
DROP TABLE IF EXISTS mail CASCADE;
DROP TABLE IF EXISTS bill CASCADE;
DROP TABLE IF EXISTS residence CASCADE;
DROP TABLE IF EXISTS home CASCADE;
DROP TABLE IF EXISTS client_home_residence CASCADE;
DROP TABLE IF EXISTS room CASCADE;
DROP TABLE IF EXISTS room_list CASCADE;
DROP TABLE IF EXISTS sensor CASCADE;
DROP TABLE IF EXISTS sensor_order CASCADE;
DROP TABLE IF EXISTS sensor_data CASCADE;
DROP TABLE IF EXISTS sensor_list CASCADE;
DROP TABLE IF EXISTS sensor_room CASCADE;

/*
Table create
*/

CREATE TABLE sub_list (
    id_sub_list int UNIQUE NOT NULL AUTO_INCREMENT,

    name varchar(16),
    price float,

    PRIMARY KEY (id_sub_list)
);

CREATE TABLE client (
  id_client int UNIQUE NOT NULL AUTO_INCREMENT,
  id_sub_list int,

  pass varchar(16),
  date_reg date,
  date_log datetime,
  title varchar(32),
  pic varchar(32),
  surname varchar(32),
  name varchar(32),
  birth date,
  bill_addr varchar(32),
  bill_town varchar(32),
  bill_post_code int,
  bill_state varchar(32),
  bill_country varchar(32),
  mail varchar(32),
  phone bigint,
  fax int,
  view_on boolean,
  modif_on boolean,
  discount int,
  number_sensor int,
  second_client boolean DEFAULT FALSE,
  manager boolean DEFAULT FALSE,
  admin boolean DEFAULT FALSE ,
  first_log boolean DEFAULT TRUE ,

  PRIMARY KEY (id_client),
  FOREIGN KEY (id_sub_list) REFERENCES sub_list(id_sub_list)
);


CREATE TABLE mail (
  id_mail int UNIQUE NOT NULL AUTO_INCREMENT,
  recipient int,
  sender int,
  num_client int,

  bin boolean,
  subject varchar(32),
  mess text,
  date_mail datetime,

  PRIMARY KEY (id_mail),
  FOREIGN KEY (recipient) REFERENCES client(num_client),
  FOREIGN KEY (sender) REFERENCES client(num_client)
);

CREATE TABLE  bill (
  id_bill int UNIQUE NOT NULL AUTO_INCREMENT,
  num_client int,

  date_bill date,
  pdf varchar(32),

  PRIMARY KEY (id_bill),
  FOREIGN KEY (num_client) REFERENCES client(num_client)
);

CREATE TABLE residence (
  id_residence int,

  name varchar(32),
  temp_max int,
  heat_on boolean,

  PRIMARY KEY (id_residence)
);

CREATE TABLE home (
  id_home int UNIQUE NOT NULL AUTO_INCREMENT,

  pic varchar(32),
  addr varchar(32),
  post_code int,
  state varchar(32),
  country varchar(32),
  number_user int,
  name varchar(16),

  PRIMARY KEY (id_home)
);

CREATE TABLE client_home_residence (
  num_client int,
  id_home int,
  id_residence int,

  FOREIGN KEY (num_client) REFERENCES client(num_client),
  FOREIGN KEY (id_home) REFERENCES home(id_home),
  FOREIGN KEY (id_residence) REFERENCES residence(id_residence)
);

CREATE TABLE room (
  id_room int UNIQUE NOT NULL AUTO_INCREMENT,
  id_home int,
  id_room_list int,

  pos int,
  order_client int,
  type_room varchar(16),

  PRIMARY KEY (id_room),
  FOREIGN KEY (id_home) REFERENCES home(id_home),
  FOREIGN KEY (id_room_list) REFERENCES room_list(id_room_list)
);

CREATE TABLE room_list (
  id_room_list int NOT NULL AUTO_INCREMENT,

  name varchar(16),

  PRIMARY KEY (id_room_list)
);

CREATE TABLE sensor (
  id_sensor int UNIQUE NOT NULL AUTO_INCREMENT,
  id_room int,

  data float,
  sensor_on boolean,

  PRIMARY KEY (id_sensor),
  FOREIGN KEY (id_room) REFERENCES room(id_room)
);

CREATE TABLE sensor_data (
  id_sensor_data int NOT NULL AUTO_INCREMENT,
  id_sensor int,

  date_sensor date,
  data float,

  PRIMARY KEY (id_sensor_data),
  FOREIGN KEY (id_sensor) REFERENCES sensor(id_sensor)
);

CREATE TABLE sensor_order (
  id_sensor_order int UNIQUE NOT NULL AUTO_INCREMENT,
  id_sensor int,

  hour_beg int,
  hour_end int,
  order_on boolean,
  threshold float,

  PRIMARY KEY (id_sensor_order),
  FOREIGN KEY (id_sensor) REFERENCES sensor(id_sensor)
);

CREATE TABLE sensor_list (
  id_sensor_list int NOT NULL AUTO_INCREMENT,
  id_sensor int,

  name varchar(16),
  pic varchar(32),
  available boolean,

  PRIMARY KEY (id_sensor_list),
  FOREIGN KEY (id_sensor) REFERENCES sensor(id_sensor)
);

CREATE TABLE sensor_room (
  id_room_list int,
  id_sensor_list int,

  s_on boolean,

  FOREIGN KEY (id_room_list) REFERENCES room_list(id_room_list),
  FOREIGN KEY (id_sensor_list) REFERENCES sensor_list(id_sensor_list)
);


/*
Insert
*/

INSERT INTO client(pass,surname,name) VALUES('franky','Franck','MEYER');

INSERT INTO home(name,addr,post_code,state,country,number_user) VALUES('Maison de Franck','rue Bartholdi',68000,'Alsace','France',2);

INSERT INTO client_home_residence(num_client,id_home) VALUES(1,1);