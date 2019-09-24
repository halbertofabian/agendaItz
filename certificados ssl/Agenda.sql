-- V 0.4
-- Modificada por: lg_GarciaGandara
-- 23/09/19 10:26 am
create database Agenda;

use Agenda;

create table organizadores(
	idorganizador int not null AUTO_INCREMENT  primary key ,
	nombre char(45) not null,
	nickname char(45) not null,
	fechaNas date not null,
	genero bit not null,
	lugar_procedencia char(45) not null,
	telefono char(45) ,
	email char(45) not null,
	clave char(45) not null
);

create table lugares(
	idlugar int not null AUTO_INCREMENT primary key,
	nombrelugar char(45) not null,
	direccion point not null,
	codigopostal char(45) not null,
	descripcion char(100),
	nombredueño char(45),
	telefono char(45),
	capacidad int not null
);

create table tematicas(
	idtipotematica int not null AUTO_INCREMENT primary key,
	tematica char(45) not null,
	color char(45) not null,
	vestimenta char(45) not null,
	decoracion char(45) not null
);

create table eventos(
	idevento int not null AUTO_INCREMENT primary key,
	nombrevento char(45) not null,
	fechaevent date not null,
	costototal float not null,
	tpagado float not null,
	tematica_idtipotematica int not null,
	idlugar int not null,
		foreign key (tematica_idtipotematica) references tematicas(idtipotematica),
		foreign key (idlugar) references lugares(idlugar)
);

create table clientes(
	idcliente int not null AUTO_INCREMENT primary key,
	nombre char(45) not null,
	fechaNas date not null,
	genero bit not null,
	lugar_procedencia char(45) not null,
	telefono char(45),
	email char(45) not null,
	idorganizador int not null,
	parentOrga char(45) not null,
	idlugar int not null,
	idevento int not null,
		foreign key  (idorganizador) references organizadores(idorganizador),
		foreign key  (idlugar) references lugares(idlugar),
		foreign key (idevento) references eventos(idevento)
);

create table actividades(
	idactividad int not null AUTO_INCREMENT primary key,
	nombreactividad char(45) not null,
	descripcion char(45),
	fechaini date not null,
	fechafin date not null,
	gasto float not null,
	importe float not null,
	actividadcol char(45) not null,
	idevento int not null,
	idlugar int not null,
		foreign key (idevento) references eventos(idevento),
		foreign key(idlugar) references lugares(idlugar)
);

create table invitados(
	idinvitado int not null AUTO_INCREMENT primary key,
	nombre char(45) not null,
	fechaNas date not null,
	genero bit not null,
	lugar_procedencia char(45) not null,
	telefono char(45),
	email char(45) not null,
	idcliente int not null,
	parentCli char(45) not null,
	idlugar int not null,
	foreign key  (idcliente) references clientes(idcliente),
	foreign key  (idlugar) references lugares(idlugar)
);



