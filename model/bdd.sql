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
  gender varchar(16),
  pic varchar(128) DEFAULT "view/assets/images/unknown.jpg",
  surname varchar(32),
  name varchar(32),
  birth date,
  bill_addr varchar(32),
  bill_town varchar(32),
  bill_post_code int,
  bill_state varchar(32),
  bill_country varchar(32),
  mail varchar(32),
  mail_security varchar(32),
  phone varchar(16),
  fax varchar(16),
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
  id_room_list int UNIQUE NOT NULL AUTO_INCREMENT,

  name varchar(16),

  PRIMARY KEY (id_room_list)
);

CREATE TABLE sensor (
  id_sensor int UNIQUE NOT NULL AUTO_INCREMENT,
  id_room int,
  id_sensor_list int,

  data float,
  sensor_on boolean DEFAULT TRUE,

  PRIMARY KEY (id_sensor),
  FOREIGN KEY (id_room) REFERENCES room(id_room),
  FOREIGN KEY (id_sensor_list) REFERENCES sensor_list(id_sensor_list)
);

CREATE TABLE sensor_data (
  id_sensor_data int UNIQUE NOT NULL AUTO_INCREMENT,
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
  id_sensor_list int UNIQUE NOT NULL AUTO_INCREMENT,

  name varchar(32),
  pic varchar(256),
  available boolean DEFAULT TRUE,
  unite varchar(16),

  PRIMARY KEY (id_sensor_list)
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

/*Insert Admin*/
INSERT INTO client(pass,surname,name,first_log,admin) VALUES('admin','Admin','ADMIN',FALSE,TRUE);

/*Insert Manager*/
INSERT INTO client(pass,surname,name,first_log,manager) VALUES('jul','Jul','OVNI',FALSE,TRUE);


  /*pic varchar(128),*/
/* User1 */
/*INSERT INTO client(pass,surname,name) VALUES('gigi','Gilbert','MONTAGNE');*/
INSERT INTO client(date_reg,date_log,pass,surname,name,gender, pic, birth, bill_addr, bill_town, bill_post_code, bill_country, mail, mail_security, phone, fax)
    VALUES ('2012-11-05','2017-02-24 23:42:16','gigi','Gilbert','MONTAGNE','0','view/assets/images/gilbert.jpg','1951-12-28','Rue de la clairvoyance','Paris','75001','France','gilbert.montagne@gmail.com','g.montagne@stars80.fr','0603789466','0145789538');


/* User2 */
INSERT INTO client(pass,surname,name,first_log) VALUES('fm','Franck','MEYER',FALSE);

/* User3 */
INSERT INTO client(pass,surname,name,first_log) VALUES('ap','Alexandre','PRADIER',FALSE);

/* Home1 */
INSERT INTO home(name,addr,post_code,state,country,number_user) VALUES('Maison de Gigi','Sous les sunlights des tropiques',971,'Guadeloupe','France',2);

/* Home2 */
INSERT INTO home(name,addr,post_code,state,country,number_user) VALUES('Appart de Gigi','Sous les sunlights des tropiques',971,'Guadeloupe','France',2);

/* Home3 */
INSERT INTO home(name,addr,post_code,state,country,number_user) VALUES('Appart de Alex','Colombes',92,'Haut de Seine','France',1);

/* Attribut des domiciles aux users */
INSERT INTO client_home_residence(num_client,id_home) VALUES(1,1);
INSERT INTO client_home_residence(num_client,id_home) VALUES(1,2);
INSERT INTO client_home_residence(num_client,id_home) VALUES(3,3);

INSERT INTO sensor_list(name,pic,unite) VALUES('Température','view/assets/images/capteur_temperature.jpg','°C'),('Humidité','view/assets/images/capteur_humidite.jpg',''),('Pression','view/assets/images/capteur_pression.jpg','Bar'),('Lumière','view/assets/images/capteur_lumiere.jpg','Lumens'),('Fumée','view/assets/images/capteur_fumee.jpg','Feu'),('Intrusion','view/assets/images/capteur_intrusion.jpg',NULL);

INSERT INTO room_list(name) VALUES('Salon'),('Cuisine'),('Chambre'),('Salle de Bain'),('Bureau'),('Couloir'),('Entrée'),('Toilettes'),('Buanderie'),('Salle à manger'),('Grenier'),('Garage'),('Cellier'),('Salle Cinéma'),('Cave');

INSERT INTO room(id_home,id_room_list) VALUES (1,1);

INSERT INTO sensor(id_room,id_sensor_list,data) VALUES (1,1,20);

/* Jeu essai donnée graph capteur */
INSERT INTO sensor_data(id_sensor,data,date_sensor) VALUES (1,16,CURDATE());
INSERT INTO sensor_data(id_sensor,data,date_sensor) VALUES (1,6,"2017-12-21");
INSERT INTO sensor_data(id_sensor,data,date_sensor) VALUES (1,12,"2017-12-19");
INSERT INTO sensor_data(id_sensor,data,date_sensor) VALUES (1,26,"2017-12-12");



