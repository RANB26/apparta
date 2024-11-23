create database apparta;

use apparta;

create table tipo_usuario(
id_tipo_usuario int primary key auto_increment,
tipo_usuario varchar(20) not null
);

create table usuario(
id_usuario int primary key auto_increment,
identificacion_usuario int(15) not null unique,
id_tipo_usuario int not null,
nombre_usuario varchar(20) not null,
apellido_usuario varchar(25) not null,
celular_usuario varchar(10) not null,
correo_usuario varchar(50) not null unique,
password_usuario varchar(25) not null,
foreign key(id_tipo_usuario) references tipo_usuario(id_tipo_usuario)
);

create table tipo_mesa(
id_tipo_mesa int primary key auto_increment,
tipo_mesa varchar(20) not null,
capacidad_mesa int(2) not null
);

create table mesa(
id_mesa int primary key auto_increment,
id_tipo_mesa int not null,
estado_mesa varchar(15) not null,
foreign key(id_tipo_mesa) references tipo_mesa(id_tipo_mesa)
);

create table reserva(
id_reserva int primary key auto_increment,
id_usuario int not null,
id_mesa int not null,
fecha_inicio datetime not null,
fecha_fin datetime not null,
num_personas int(2) not null,
estado_reserva varchar(15) default 'Confirmada' not null,
id_usuario_registra int not null,
fecha_registra datetime not null default current_timestamp,
foreign key(id_usuario) references usuario(id_usuario),
foreign key(id_usuario_registra) references usuario(id_usuario),
foreign key(id_mesa) references mesa(id_mesa)
);

INSERT INTO tipo_usuario (tipo_usuario) VALUES ('SuperAdmin');
INSERT INTO tipo_usuario (tipo_usuario) VALUES ('Admin');
INSERT INTO tipo_usuario (tipo_usuario) VALUES ('Cliente');


INSERT INTO usuario (identificacion_usuario, id_tipo_usuario, nombre_usuario, apellido_usuario, celular_usuario, correo_usuario, password_usuario) 
VALUES (12345, 1, 'SuperAdmin', '1', '0000000000', 'superadmin@gmail.com', '123');

INSERT INTO usuario (identificacion_usuario, id_tipo_usuario, nombre_usuario, apellido_usuario, celular_usuario, correo_usuario, password_usuario)
VALUES (23456, 2, 'Admin', '1', '0000000000', 'admin@gmail.com', '123');

INSERT INTO tipo_mesa (tipo_mesa, capacidad_mesa) VALUES ('Pequeña', 2);
INSERT INTO tipo_mesa (tipo_mesa, capacidad_mesa) VALUES ('Mediana', 4);
INSERT INTO tipo_mesa (tipo_mesa, capacidad_mesa) VALUES ('Grande', 8);
INSERT INTO tipo_mesa (tipo_mesa, capacidad_mesa) VALUES ('Reunión', 12);