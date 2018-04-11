drop DATABASE IF EXISTS autoserv;
CREATE DATABASE autoserv;
use autoserv;
-- user admin
-- password autoserv2017

CREATE TABLE tb_clientes (
  id_clientes int primary key AUTO_INCREMENT ,
  cedula_ruc varchar(13) NOT NULL,
  nombre varchar(30) NOT NULL,
  apellido varchar(30) NOT NULL,
  direccion varchar(50),
  telefono varchar(10) NOT NULL,
  correo varchar(100),
  estado varchar(10),
  observacion text
);

CREATE TABLE tb_categoria (
  id_categoria int primary key AUTO_INCREMENT ,
  categoria text
);

CREATE TABLE tb_producto (
  id_producto int primary key AUTO_INCREMENT ,
  id_categoria int,
  producto text,
  imagen text,
  valor float(10,2),
  estado varchar(10),
  observacion text,
  foreign key(id_categoria) references tb_categoria (id_categoria)
);

CREATE TABLE tb_mensajes (
  id_mensaje int primary key AUTO_INCREMENT ,
  nombre text,
  telefono varchar(10) NOT NULL,
  correo varchar(25),
  mensaje text,
  verificacion int,
  fecha timestamp
);