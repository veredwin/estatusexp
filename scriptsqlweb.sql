create schema statusexp;
	use statusexp;

	create table usuario(
		id_usuario int(11) not null AUTO_INCREMENT primary key, 
		nombre varchar (50), 
		apellidopaterno varchar(50), 
		apellidomaterno varchar(50), 
		usuario varchar (50),
		contrasena varchar(50),
		tipo varchar(50));

	create table cliente(
		id_cliente int(11) not null AUTO_INCREMENT primary key,
		rfc varchar (50), 
		telefono varchar(10),
		email varchar(50));

	create table direccion(
		id_direccion int(11) not null AUTO_INCREMENT primary key, 
		estado varchar (50), 
		ciudad varchar(50), 
		colonia varchar(50), 
		codpostal varchar(7), 
		calle varchar (80), 
		numero int(10), 
		id_cliente int(11) not null, 
		constraint fk1 foreign key (id_cliente) references cliente(id_cliente) ON UPDATE NO ACTION ON DELETE CASCADE);

	create table usuariocliente(
		id_usuariocliente int(11) not null AUTO_INCREMENT primary key, 
		id_usuario int (11) not null, 
		id_cliente int(11) not null,
		constraint fk2 foreign key (id_usuario) references usuario(id_usuario) ON UPDATE NO ACTION ON DELETE CASCADE,
		constraint fk3 foreign key (id_cliente) references cliente(id_cliente) ON UPDATE NO ACTION ON DELETE CASCADE);

	create table fecha(
		id_fecha int(11) not null AUTO_INCREMENT primary key,
		año int (4), 
		mes int (2), 
		dia int(2),
		hora time not null);

	create table etapa(
		id_etapa int(11) not null AUTO_INCREMENT primary key,
		etapa varchar (50), 
		descripcion varchar(500));

	create table juicio(
		id_juicio int(11) not null AUTO_INCREMENT primary key,
		juicio varchar (50), 
		descripcion varchar(500));

	create table juzgado(
		id_juzgado int(11) not null AUTO_INCREMENT primary key, 
		juzgado varchar (50), 
		descripcion varchar(500));

	create table expediente(
		id_expediente int(11) not null AUTO_INCREMENT primary key, 
		expediente varchar (50),
		id_juzgado int(11),
		id_juicio int(11), 
		id_etapa int(11),
		id_cliente int(11),
		id_licenciado int(11),
		constraint fk4 foreign key (id_juzgado) references juzgado(id_juzgado) ON UPDATE NO ACTION ON DELETE NO ACTION, 
		constraint fk5 foreign key (id_juicio)  references juicio(id_juicio) ON UPDATE NO ACTION ON DELETE NO ACTION, 
		constraint fk6 foreign key (id_etapa) references etapa(id_etapa)ON UPDATE NO ACTION ON DELETE NO ACTION, 
		constraint fk7 foreign key (id_licenciado) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE NO ACTION, 
		constraint fk8 foreign key (id_cliente) references cliente(id_cliente) ON UPDATE NO ACTION ON DELETE NO ACTION);

	create table asesoria(
		id_asesoria int(11) not null AUTO_INCREMENT primary key, 
		descripcion varchar (50), 
		id_fecha int(11), 
		id_expediente int (11),
		constraint fk9 foreign key (id_fecha) references fecha(id_fecha) ON UPDATE NO ACTION ON DELETE NO ACTION,
		constraint fk10 foreign key (id_expediente) references expediente(id_expediente) ON UPDATE NO ACTION ON DELETE NO ACTION);