
/*Crear base de datos*/

CREATE DATABASE registro_usuario;
USE registro_usuario;

/*Creamos las tablas contenidas*/

CREATE TABLE usuarios(
    id INT(50) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    sexo CHAR(1) NOT NULL,
    puesto INT(1)NOT NULL,
    PRIMARY KEY(id)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE puesto(
    id_puesto INT(4) NOT NULL,
    nombre_puesto VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_puesto) 
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO puesto (id_puesto,nombre_puesto) VALUES
(1,"Iniciado"),
(2,"Acólito"),
(3,"Maestro de llaves"),
(4,"Elegido por Cthulhu");