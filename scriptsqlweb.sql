create schema statusexp;
use statusexp;

create table usuario(id_usuario int(11) not null AUTO_INCREMENT primary key, nombre varchar (50), apellidopaterno varchar(50), apellidomaterno varchar(50), usuario varchar (50), contrasena varchar(50), tipo varchar(50));

create table direccion(id_direccion int(11) not null AUTO_INCREMENT primary key, estado varchar (50), ciudad varchar(50), colonia varchar(50), codpostal varchar(7), calle varchar (80), numero int(10));

create table cliente(id_cliente int(11) not null AUTO_INCREMENT primary key, rfc varchar (50), telefono varchar(10), email varchar(50), id_usuario int (11), id_direccion int (11), constraint fk1 foreign key (id_usuario) references usuario(id_usuario), constraint fk2 foreign key (id_direccion) references direccion(id_direccion));

create table fecha(id_fecha int(11) not null AUTO_INCREMENT primary key, año int (4), mes int (2), dia int(2), hora time not null);

create table etapa(id_etapa int(11) not null AUTO_INCREMENT primary key, etapa varchar (50), descripcion varchar(500));

create table juicio(id_juicio int(11) not null AUTO_INCREMENT primary key, juicio varchar (50), descripcion varchar(500));

create table asesoria(id_asesoria int(11) not null AUTO_INCREMENT primary key, descripcion varchar (50), id_fecha int(11), id_cliente int(11), id_juicio int (11), id_etapa int (11), constraint fk3 foreign key (id_fecha) references fecha(id_fecha), constraint fk4 foreign key (id_cliente) references cliente(id_cliente),  constraint fk5 foreign key (id_juicio) references juicio(id_juicio), constraint fk6 foreign key (id_etapa) references etapa(id_etapa));