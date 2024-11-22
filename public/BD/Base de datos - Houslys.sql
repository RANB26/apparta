create database houslys;

use houslys;

create table usuario(
id_usuario int primary key auto_increment,
tipo_usuario varchar(45) not null,
nombre_usuario varchar(20) not null,
apellido_usuario varchar(25) not null,
fnacimiento_usuario date not null,
celular_usuario varchar(10) not null,
correo_usuario varchar(50) not null unique,
password_usuario varchar(25) not null
);

create table vivienda(
id_vivienda int primary key auto_increment,
fpublicacion_vivienda datetime not null,
tipo_vivienda varchar(45) not null,
precio_vivienda  int not null,
estado_vivienda varchar(15) not null,
direccion_vivienda varchar(15) not null unique,
numcarrera_vivienda varchar(15) not null,
letracarrera_vivienda varchar(15) not null,
numcalle_vivienda varchar(15) not null,
num_vivienda varchar(15) not null,
latitud_vivienda double not null,
longitud_vivienda double not null,
area_vivienda int not null,
estrato_vivienda int not null,
numbaño_vivienda int not null,
numhabitaciones_vivienda int not null,
descripcion_vivienda varchar(200) null,
id_usuario int not null,
foreign key(id_usuario) references usuario(id_usuario)
);

create table favorito(
id_usuario int not null,
id_vivienda int not null,
foreign key(id_usuario) references usuario(id_usuario),
foreign key(id_vivienda) references vivienda(id_vivienda)
);

INSERT INTO usuario (tipo_usuario, nombre_usuario, apellido_usuario, fnacimiento_usuario, celular_usuario, correo_usuario, password_usuario) VALUES ('SuperAdmin', 'Admin', 'Ejemplo', '2023-11-10', '3105489657', 'admin@gmail.com', '123');
INSERT INTO usuario (tipo_usuario, nombre_usuario, apellido_usuario, fnacimiento_usuario, celular_usuario, correo_usuario, password_usuario) VALUES ('Usuario', 'Usuario', 'Ejemplo', '2023-11-10', '3102458768', 'usuario@gmail.com', '123');
INSERT INTO vivienda (fpublicacion_vivienda, tipo_vivienda, precio_vivienda, estado_vivienda, direccion_vivienda, numcarrera_vivienda, letracarrera_vivienda, numcalle_vivienda, num_vivienda, latitud_vivienda, longitud_vivienda, area_vivienda, estrato_vivienda, numbaño_vivienda, numhabitaciones_vivienda, descripcion_vivienda, id_usuario) VALUES ('2024-11-10 00:00:00', 'Casa', '10000000', 'Desocupada', 'Cra 15 #78-92', '15', '', '78', '92', '10.911980050693678', '-74.80487829850573', '72', '2', '1', '3', 'Descripcion ejemplo', '1');