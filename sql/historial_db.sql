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
    ('auan', 'a@gmail.com', 1, '1234'),
    ('buan', 'b@gmail.com', 1, '1234'),
    ('muan', 'm@gmail.com', 1, '1234'),
    ('cuan', 'c@gmail.com', 1, '1234'),
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
    (1,2,1,10, '2016-03-28 10:00:00'),
    (2,2,1,15, '2016-03-28 10:00:00'),
    (3,2,1,25, '2016-03-28 10:00:00'),
    (4,2,1,35, '2016-03-28 10:00:00'),
    (5,2,1,45, '2016-03-28 10:00:00'),
    (6,2,1,55, '2016-03-28 10:00:00'),
    (7,2,1,30, '2016-03-28 10:00:00'),
    (1,3,1,20, '2016-03-28 10:00:00'),
    (2,3,1,25, '2016-03-28 10:00:00'),
    (3,3,1,35, '2016-03-28 10:00:00'),
    (4,3,1,45, '2016-03-28 10:00:00'),
    (5,3,1,55, '2016-03-28 10:00:00'),
    (6,3,1,65, '2016-03-28 10:00:00'),
    (7,3,1,35, '2016-03-28 10:00:00'),
    (1,4,1,15, '2016-03-28 10:00:00'),
    (2,4,1,16, '2016-03-28 10:00:00'),
    (3,4,1,26, '2016-03-28 10:00:00'),
    (4,4,1,36, '2016-03-28 10:00:00'),
    (5,4,1,46, '2016-03-28 10:00:00'),
    (6,4,1,56, '2016-03-28 10:00:00'),
    (7,4,1,36, '2016-03-28 10:00:00'),
    (1,5,1,17, '2016-03-28 10:00:00'),
    (2,5,1,17, '2016-03-28 10:00:00'),
    (3,5,1,27, '2016-03-28 10:00:00'),
    (4,5,1,37, '2016-03-28 10:00:00'),
    (5,5,1,47, '2016-03-28 10:00:00'),
    (6,5,1,57, '2016-03-28 10:00:00'),
    (7,5,1,37, '2016-03-28 10:00:00'),
    (1,6,1,14, '2016-03-28 10:00:00'),
    (2,6,1,14, '2016-03-28 10:00:00'),
    (3,6,1,24, '2016-03-28 10:00:00'),
    (4,6,1,34, '2016-03-28 10:00:00'),
    (5,6,1,44, '2016-03-28 10:00:00'),
    (6,6,1,54, '2016-03-28 10:00:00'),
    (7,6,1,34, '2016-03-28 10:00:00'),
    (1,7,1,12, '2016-03-28 10:00:00'),
    (2,7,1,12, '2016-03-28 10:00:00'),
    (3,7,1,22, '2016-03-28 10:00:00'),
    (4,7,1,32, '2016-03-28 10:00:00'),
    (5,7,1,42, '2016-03-28 10:00:00'),
    (6,7,1,52, '2016-03-28 10:00:00'),
    (7,7,1,32, '2016-03-28 10:00:00'),
    (1,8,1,11, '2016-03-28 10:00:00'),
    (2,8,1,16, '2016-03-28 10:00:00'),
    (3,8,1,23, '2016-03-28 10:00:00'),
    (4,8,1,34, '2016-03-28 10:00:00'),
    (5,8,1,46, '2016-03-28 10:00:00'),
    (6,8,1,53, '2016-03-28 10:00:00'),
    (7,8,1,35, '2016-03-28 10:00:00'),
    (1,2,2,30, '2016-04-05 10:00:00'),
    (2,2,2,35, '2016-04-05 10:00:00'),
    (3,2,2,45, '2016-04-05 10:00:00'),
    (4,2,2,55, '2016-04-05 10:00:00'),
    (5,2,2,65, '2016-04-05 10:00:00'),
    (6,2,2,75, '2016-04-05 10:00:00'),
    (7,2,2,50, '2016-04-05 10:00:00'),
    (1,3,2,40, '2016-04-05 10:00:00'),
    (2,3,2,45, '2016-04-05 10:00:00'),
    (3,3,2,55, '2016-04-05 10:00:00'),
    (4,3,2,65, '2016-04-05 10:00:00'),
    (5,3,2,75, '2016-04-05 10:00:00'),
    (6,3,2,85, '2016-04-05 10:00:00'),
    (7,3,2,55, '2016-04-05 10:00:00'),
    (1,4,2,35, '2016-04-05 10:00:00'),
    (2,4,2,36, '2016-04-05 10:00:00'),
    (3,4,2,46, '2016-04-05 10:00:00'),
    (4,4,2,56, '2016-04-05 10:00:00'),
    (5,4,2,66, '2016-04-05 10:00:00'),
    (6,4,2,76, '2016-04-05 10:00:00'),
    (7,4,2,56, '2016-04-05 10:00:00'),
    (1,5,2,37, '2016-04-05 10:00:00'),
    (2,5,2,37, '2016-04-05 10:00:00'),
    (3,5,2,47, '2016-04-05 10:00:00'),
    (4,5,2,57, '2016-04-05 10:00:00'),
    (5,5,2,67, '2016-04-05 10:00:00'),
    (6,5,2,77, '2016-04-05 10:00:00'),
    (7,5,2,57, '2016-04-05 10:00:00'),
    (1,6,2,34, '2016-04-05 10:00:00'),
    (2,6,2,34, '2016-04-05 10:00:00'),
    (3,6,2,44, '2016-04-05 10:00:00'),
    (4,6,2,54, '2016-04-05 10:00:00'),
    (5,6,2,64, '2016-04-05 10:00:00'),
    (6,6,2,74, '2016-04-05 10:00:00'),
    (7,6,2,54, '2016-04-05 10:00:00'),
    (1,7,2,32, '2016-04-05 10:00:00'),
    (2,7,2,32, '2016-04-05 10:00:00'),
    (3,7,2,42, '2016-04-05 10:00:00'),
    (4,7,2,52, '2016-04-05 10:00:00'),
    (5,7,2,62, '2016-04-05 10:00:00'),
    (6,7,2,72, '2016-04-05 10:00:00'),
    (7,7,2,52, '2016-04-05 10:00:00'),
    (1,8,2,31, '2016-04-05 10:00:00'),
    (2,8,2,36, '2016-04-05 10:00:00'),
    (3,8,2,43, '2016-04-05 10:00:00'),
    (4,8,2,54, '2016-04-05 10:00:00'),
    (5,8,2,66, '2016-04-05 10:00:00'),
    (6,8,2,73, '2016-04-05 10:00:00'),
    (7,8,2,55, '2016-04-05 10:00:00'),
    (1,2,3,20, '2016-04-20 10:00:00'),
    (2,2,3,25, '2016-04-20 10:00:00'),
    (3,2,3,35, '2016-04-20 10:00:00'),
    (4,2,3,45, '2016-04-20 10:00:00'),
    (5,2,3,55, '2016-04-20 10:00:00'),
    (6,2,3,65, '2016-04-20 10:00:00'),
    (7,2,3,40, '2016-04-20 10:00:00'),
    (1,3,3,30, '2016-04-20 10:00:00'),
    (2,3,3,35, '2016-04-20 10:00:00'),
    (3,3,3,45, '2016-04-20 10:00:00'),
    (4,3,3,55, '2016-04-20 10:00:00'),
    (5,3,3,65, '2016-04-20 10:00:00'),
    (6,3,3,75, '2016-04-20 10:00:00'),
    (7,3,3,45, '2016-04-20 10:00:00'),
    (1,4,3,25, '2016-04-20 10:00:00'),
    (2,4,3,26, '2016-04-20 10:00:00'),
    (3,4,3,36, '2016-04-20 10:00:00'),
    (4,4,3,46, '2016-04-20 10:00:00'),
    (5,4,3,56, '2016-04-20 10:00:00'),
    (6,4,3,66, '2016-04-20 10:00:00'),
    (7,4,3,46, '2016-04-20 10:00:00'),
    (1,5,3,27, '2016-04-20 10:00:00'),
    (2,5,3,27, '2016-04-20 10:00:00'),
    (3,5,3,37, '2016-04-20 10:00:00'),
    (4,5,3,57, '2016-04-20 10:00:00'),
    (5,5,3,57, '2016-04-20 10:00:00'),
    (6,5,3,67, '2016-04-20 10:00:00'),
    (7,5,3,47, '2016-04-20 10:00:00'),
    (1,6,3,54, '2016-04-20 10:00:00'),
    (2,6,3,24, '2016-04-20 10:00:00'),
    (3,6,3,34, '2016-04-20 10:00:00'),
    (4,6,3,44, '2016-04-20 10:00:00'),
    (5,6,3,54, '2016-04-20 10:00:00'),
    (6,6,3,64, '2016-04-20 10:00:00'),
    (7,6,3,44, '2016-04-20 10:00:00'),
    (1,7,3,22, '2016-04-20 10:00:00'),
    (2,7,3,22, '2016-04-20 10:00:00'),
    (3,7,3,32, '2016-04-20 10:00:00'),
    (4,7,3,52, '2016-04-20 10:00:00'),
    (5,7,3,52, '2016-04-20 10:00:00'),
    (6,7,3,62, '2016-04-20 10:00:00'),
    (7,7,3,42, '2016-04-20 10:00:00'),
    (1,8,3,51, '2016-04-20 10:00:00'),
    (2,8,3,26, '2016-04-20 10:00:00'),
    (3,8,3,33, '2016-04-20 10:00:00'),
    (4,8,3,44, '2016-04-20 10:00:00'),
    (5,8,3,56, '2016-04-20 10:00:00'),
    (6,8,3,63, '2016-04-20 10:00:00'),
    (7,8,3,45, '2016-04-20 10:00:00');


CREATE TABLE `semana` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `fecha_ini` DATETIME NOT NULL,
    `fecha_fin` DATETIME NOT NULL,
    `current` BOOLEAN NOT NULL
    ) ENGINE = InnoDB;

INSERT INTO `semana` (`fecha_ini`, `fecha_fin`, `current`) VALUES 
    ('2016-03-27 00:00:00','2016-04-03 00:00:01',0),
    ('2016-04-03 00:00:00','2016-04-10 00:00:01',0),
    ('2016-04-17 00:00:00','2016-04-24 00:00:01',1);









