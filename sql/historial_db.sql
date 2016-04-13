CREATE DATABASE IF NOT EXISTS historial_db;

USE historial_db;



CREATE TABLE `historial_db`.`usuario` ( `id_usuario` INT NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(15) NOT NULL , 
	`email` VARCHAR(50) NOT NULL ,
	 `contrasenia` VARCHAR(8) NOT NULL , PRIMARY KEY (`id_usuario`), 
	 UNIQUE `email` (`email`(50))
) ENGINE = InnoDB;

ALTER TABLE `usuario` ADD `habilitado` BOOLEAN NOT NULL AFTER `contrasenia`;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contraseña`) VALUES
 (NULL, 'admin', 'adminHistorial@gmail.com', '@123B'),
 (NULL, 'gigoberto', 'gigoloberto@gmail.com', '$111A');