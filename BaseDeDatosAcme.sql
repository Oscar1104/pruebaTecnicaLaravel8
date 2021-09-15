-- Base de datos Prueba ACME --
create database acme DEFAULT CHARACTER SET utf8;
use acme;

-- Creacion de tablas 
create table ciudad(
	id int(3) not null auto_increment,
    nombreCiudad varchar(60) not null,
    
    primary key(id)
);


create table propietario(
	id int(3) not null auto_increment,
	numeroCedula varchar(30) not null,
    primerNombre varchar(30) not null,
    segundoNombre varchar(30) not null,
    apellidos varchar(60) not null,
    direccion varchar(50) not null,
    telefono varchar(15) not null,
    idCiudad int(3) not null,
    
    primary key(id),
    
    constraint FK_IdCiudad foreign key (idCiudad) references ciudad(id)
);

create table conductor(
	id int(3) not null auto_increment,
	numeroCedula varchar(30) not null,
    primerNombre varchar(30) not null,
    segundoNombre varchar(30) not null,
    apellidos varchar(60) not null,
    direccion varchar(50) not null,
    telefono varchar(15) not null,
    idCiudad int(3) not null,
    
    primary key(id),
    
    constraint FK_IdCiudad foreign key (idCiudad) references ciudad(id)
);


create table vehiculo(
	id int(3) not null auto_increment,
	placa varchar(10) not null,
    color varchar(20) not null,
    marca varchar(30) not null,
    tipo enum('particular', 'publico') default 'particular',
    idConductor int(3),
    idPropietario int(3),
    
    primary key(id),
    
    constraint FK_IdConductor foreign key (idConductor) references conductor(id),
    constraint FK_IdPropietario foreign key (idPropietario) references propietario(id)
);

insert into ciudad(nombreCiudad)
values ('Bogota D.C'),
('Medellin'),
('Cali'),
('Barranquilla'),
('Cartagena de indias'),
('Soledad'),
('Cucuta'),
('Soacha'),
('Ibague'),
('Bucaramanga'),
('Villavicencio'),
('Santa maria'),
('Bello'),
('Valledupar'),
('Pereira'),
('Buenaventura'),
('Pasto'),
('Manizales'),
('Monteria'),
('Neiva');
