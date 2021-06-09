/*
Comentario en sql

SQL: Structure Query Languaje - Lenguage Estucturado de Consulta.
Base de Datos: Una coleccion de datos que estan organizados.
Gestores o Manejadores de BD/DB: Programas que nos permiten administrar los datos.

Ejemplos de Gestores de DB: Microsoft Access, Microsoft SQL Server, Oracle, Informix, DBase, SQL Lite, PostgreSQL, MySQL.

Una sentencia SQL es una linea de codigo para trabajar con nuestra base de datos
Existen 2 tipos de sentiencias SQL:
1- Sentencias estructurales: Son las que nos permitirán crear, modificar o eleminar objetos, usuarios y propiedades de nuestra BD.
2- Sentencias de Datos: Son las que nos permitirán insertar, eliminar, modificar y buscar información en nuestra BD.

En MySQL existen 2 tipos de engine para tablas:
1-MyISAM - Tablas Planas, son como si fuera a trabajar datos en Excel.
2-InnoDB - Tablas Relacionales, son como si fuera a trabajar datos en Access. 

*/

CREATE DATABASE mis_contactos;
USE mis_contactos;
CREATE TABLE contactos(
    email VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    sexo CHAR(1),
    nacimiento DATE,
    telefono VARCHAR(13),
    pais VARCHAR(50) NOT NULL,
    imagen VARCHAR(50),
    PRIMARY KEY(email),
    FULLTEXT KEY buscador(email, nombre, sexo, telefono, pais)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE pais(
    id_pais INT NOT NULL AUTO_INCREMENT,
    pais VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_pais)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pais (id_pais,pais) VALUES
(1,"España"),
(2,"UK"),
(3,"Francia"),
(4,"Italia"),
(5,"Alemania"),
(6,"Bélgica"),
(7,"Paises Bajos"),
(8,"Austria"),
(9,"Suiza"),
(10,"Noruega"),
(11,"Suecia"),
(12,"Finlandia"),
(13,"Dinamarca"),
(14,"Polonia"),
(15,"Hungría");