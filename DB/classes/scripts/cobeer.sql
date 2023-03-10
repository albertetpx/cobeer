-- Script de creación de la base de datos de CoBeer
-- Versión: 20220208

drop schema if exists cobeer;
create schema cobeer;
use cobeer;

-- Tabla de departamento
drop table if exists departamento;
create table departamento(
id int unsigned AUTO_INCREMENT PRIMARY KEY, 
nombre varchar (50) not null,
descripcion varchar(255),
indBaja bit default 0
);

-- Tabla de usuarios
drop table if exists usuario;
create table usuario (
id int unsigned AUTO_INCREMENT PRIMARY KEY,  
nombre varchar(50),
apellido1 varchar(50),
apellido2 varchar(50),
contraseña varchar(50), 
idDepartamento int unsigned not null,
indBaja bit default 0,
constraint pk_usuarios_departamentos
		 foreign key(idDepartamento)
		 references departamento(id)
);

-- Tabla de articulo
drop table if exists articulo;
create table articulo(
id int unsigned not null AUTO_INCREMENT PRIMARY KEY, 
titulo varchar(50) not null,
descripcion varchar(255), 
autor varchar(50),
texto text(1500), -- Revisar si el tamaño es adecuado
fechaCreacion datetime,
idDepartamento int unsigned not null,
tags varchar(255), -- Comma-separated values
indBaja bit default 0,
constraint pk_articulos_departamentos
     foreign key(idDepartamento)
     references departamento(id)
);

-- Tabla de recurso
drop table if exists recurso;
create table recurso (
id  int unsigned not null AUTO_INCREMENT PRIMARY KEY,  
url varchar(255) not null, 
idArticulo int unsigned not null,
indBaja bit default 0,
constraint pk_recursos_articulos
	   foreign key(idArticulo)
       references articulo(id)
);

use cobeer;

-- INSERTS DE PRUEBAS : 

INSERT INTO departamento(nombre, descripcion, indBaja) 
VALUES ('Ventas', 'Departamento encargado de la venta de productos', 0);

INSERT INTO articulo (id, titulo, descripcion, autor, texto, FechaCreacion, idDepartamento, tags, indBaja) 
VALUES (1, 'Cómo preparar el mejor café', 'En este artículo te enseñamos cómo preparar el café perfecto', 'Juan Pérez', 'El café es una de las bebidas más populares en todo el mundo, y hay muchas formas de prepararlo. En este artículo, te mostramos cómo hacerlo de la manera correcta para obtener el mejor sabor y aroma', '2023-02-22', 1, 'café, bebidas, cocina', 0);

INSERT INTO articulo (id, titulo, descripcion, autor, texto, FechaCreacion, idDepartamento, tags, indBaja) 
VALUES (2, 'Los beneficios de la meditación', 'La meditación puede tener muchos beneficios para la salud mental y física', 'María González', 'La meditación es una práctica que puede ayudar a reducir el estrés, mejorar la concentración y la memoria, y fomentar la tranquilidad y el bienestar general. En este artículo, te contamos todo lo que necesitas saber sobre los beneficios de la meditación y cómo empezar a practicarla', '2023-02-22', 1, 'meditación, salud, bienestar', 0);

INSERT INTO articulo (id, titulo, descripcion, autor, texto, FechaCreacion, idDepartamento, tags, indBaja) 
VALUES (3, 'Cómo ahorrar dinero en la compra de alimentos', 'Con unos sencillos consejos puedes ahorrar dinero en la compra de alimentos sin sacrificar la calidad o la variedad', 'Carlos Ruiz', 'La compra de alimentos puede ser una de las mayores partidas de gastos en cualquier hogar. En este artículo, te damos algunos consejos para ahorrar dinero sin tener que renunciar a los alimentos que te gustan o la calidad que deseas', '2023-02-22', 1, 'compras, ahorro, cocina', 0);

INSERT INTO articulo (id, titulo, descripcion, autor, texto, FechaCreacion, idDepartamento, tags, indBaja) 
VALUES (4, 'Cómo elegir el mejor seguro de automóvil', 'El seguro de automóvil es importante para proteger tu vehículo y tus finanzas en caso de accidentes o daños', 'Jorge Martínez', 'El seguro de automóvil es una parte esencial de la protección de tu vehículo y tus finanzas. En este artículo, te explicamos todo lo que necesitas saber para elegir el mejor seguro de automóvil para tus necesidades y presupuesto', '2023-02-22', 1, 'seguros, automóvil, finanzas', 0);

INSERT INTO articulo (id, titulo, descripcion, autor, texto, FechaCreacion, idDepartamento, tags, indBaja) 
VALUES (5, 'Cómo planificar tus vacaciones de verano', 'Con un poco de planificación puedes disfrutar de unas vacaciones de verano inolvidables', 'Laura Pérez', 'Las vacaciones de verano son una época muy esperada del año, pero también pueden ser costosas y estresantes si no se planifican correctamente. En este artículo, te damos algunos consejos para planificar tus vacaciones de verano de manera eficiente, ahorrar dinero y disfrutar al máximo de tus días de descanso', '2023-02-22', 1, 'vacaciones, verano, planificación', 0);
