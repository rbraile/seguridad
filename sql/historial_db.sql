CREATE DATABASE IF NOT EXISTS historial_db;

USE historial_db;

CREATE TABLE `historial_db`.`usuario` ( `id_usuario` INT NOT NULL AUTO_INCREMENT , 
    `nombre` VARCHAR(15) NOT NULL , 
    `email` VARCHAR(50) NOT NULL ,
    `habilitado` BOOLEAN NOT NULL ,
    `password` VARCHAR(8) NOT NULL , PRIMARY KEY (`id_usuario`), 
     UNIQUE `email` (`email`(50))
) ENGINE = InnoDB;

INSERT INTO `usuario` (`nombre`, `email`, `habilitado`, `password`) VALUES
    ('admin', 'adminHistorial@gmail.com', 1, '@123B'),
    ('gigoberto', 'gigoloberto@gmail.com', 1, '$111A'),
    ('juan', 'j@gmail.com', 1, '1234'),
    ('pedro', 'p@gmail.com', 1, '1234');

CREATE TABLE  `producto` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nombre` VARCHAR(30),
    `habilitado` BOOLEAN NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `producto` (`nombre`,`habilitado`) VALUES 
    ('Azucar', 1),
    ('Arroz', 1),
    ('Fideos', 1),
    ('Leche', 1),
    ('Pan', 1),
    ('Te', 1),
    ('Yerba', 1),
    ('Galletitas dulces', 0),
    ('galletitas saladas', 0),
    ('Miel', 0),
    ('Cafe', 0);

CREATE TABLE `precio` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_producto` INT NOT NULL,
    `id_usuario` INT NOT NULL,
    `id_semana` INT NOT NULL,
    `precio` INT NOT NULL,
    `fecha` DATETIME NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `precio` (`id_producto`, `id_usuario`, `id_semana`, `precio`, `fecha`) VALUES 
    (1,2,1,10, '2016-04-14 10:00:00'),
    (1,3,1,15, '2016-04-14 10:00:00'),
    (1,4,1,5, '2016-04-14 10:00:00');

CREATE TABLE `semana` (
    `id` INT NOT NULL,
    `fecha_ini` DATETIME NOT NULL,
    `fecha_fin` DATETIME NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `semana` (`fecha_ini`, `fecha_fin`) VALUES 
    ('2016-04-11 00:00:00','2016-04-17 23:59:59');









