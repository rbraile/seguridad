CREATE DATABASE IF NOT EXISTS historial_db;

USE historial_db;



CREATE TABLE `historial_db`.`usuario` ( `id_usuario` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(15) NOT NULL , 
	`email` VARCHAR(50) NOT NULL ,
    `habilitado` BOOLEAN NOT NULL ,
	`password` VARCHAR(8) NOT NULL , PRIMARY KEY (`id_usuario`), 
	 UNIQUE `email` (`email`(50))
) ENGINE = InnoDB;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `habilitado`, `password`) VALUES
 (NULL, 'admin', 'adminHistorial@gmail.com', 1, '@123B'),
 (NULL, 'gigoberto', 'gigoloberto@gmail.com', 1, '$111A');