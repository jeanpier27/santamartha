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
  valor_c float(10,2),
  pvv float(10,2),
  cantidad int,
  estado varchar(10),
  observacion text,
  foreign key(id_categoria) references tb_categoria (id_categoria)
);

create table tb_proveedores(
  id_proveedores int primary key AUTO_INCREMENT ,
  cedula_ruc varchar(13),
  nombres varchar(100),
  telefono varchar(10),
  direccion varchar(100),
  correo varchar(50)
  observacion text
);

create table tb_compras(
  id_compras int primary key AUTO_INCREMENT ,
  id_proveedores int,
  numero_fact varchar(50),
  fecha_compra date,
  fecha_ingreso timestamp,
  total float (10,2),
  observacion text,
  foreign key(id_proveedores) references tb_proveedores (id_proveedores)
);

create table tb_detalle_compras(
  id_detalle_compras int primary key AUTO_INCREMENT ,
  id_compras int,
  id_producto int,
  cantidad int,  
  observacion text,
  foreign key(id_compras) references tb_compras (id_compras),
  foreign key(id_producto) references tb_producto (id_producto)
);

create table tb_ventas(
  id_ventas int primary key AUTO_INCREMENT ,
  id_clientes int,
  numero_fact int,
  fecha_venta datetime,
  total float (10,2),
  observacion text,
  foreign key(id_clientes) references tb_clientes (id_clientes)
);

create table tb_detalle_ventas(
  id_detalle_ventas int primary key AUTO_INCREMENT ,
  id_ventas int,
  id_producto int,
  cantidad int,
  observacion text,
  foreign key(id_ventas) references tb_ventas (id_ventas),
  foreign key(id_producto) references tb_producto (id_producto)
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

CREATE TABLE tb_agenda (
  id_agenda int primary key AUTO_INCREMENT ,
  servicio text,
  id_clientes int,
  fecha_inicio datetime,
  fecha_fin datetime,
  fecha timestamp,
  foreign key(id_clientes) references tb_clientes (id_clientes)
);