CREATE DATABASE `tienda`

CREATE TABLE `usuario` (
	`nombre` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`telef` VARCHAR(9) NOT NULL COLLATE 'utf8mb4_general_ci',
	`direccion` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cp` VARCHAR(5) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`provincia` VARCHAR(20) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`rol` CHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`email`) USING BTREE
)

CREATE TABLE `acceso` (
	`email` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`fecha` DATETIME NOT NULL,
	`correcto` TINYINT(4) NOT NULL DEFAULT '0',
	`ip` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`) USING BTREE
)

CREATE TABLE `productos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`categoria` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`desc_corta` VARCHAR(200) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`desc_larga` VARCHAR(300) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`precio` INT(11) NOT NULL DEFAULT '0',
	`oferta` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	CONSTRAINT `FOTOS DE PRODUCTO` FOREIGN KEY (`id`) REFERENCES `fotos` (`id_producto`) ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE `fotos` (
	`url` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`id_producto` INT(11) NULL DEFAULT NULL,
	INDEX `id_producto` (`id_producto`) USING BTREE
)