-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bd_tienda
CREATE DATABASE IF NOT EXISTS `bd_tienda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bd_tienda`;

-- Volcando estructura para tabla bd_tienda.acceso
CREATE TABLE IF NOT EXISTS `acceso` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `correcto` tinyint(4) NOT NULL DEFAULT 0,
  `ip` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bd_tienda.acceso: ~82 rows (aproximadamente)
REPLACE INTO `acceso` (`email`, `password`, `fecha`, `correcto`, `ip`, `id`) VALUES
	(NULL, NULL, '2024-12-16 18:23:09', 1, NULL, 1),
	('123', NULL, '2024-12-18 20:01:56', 1, '::1', 2),
	('123', NULL, '2024-12-18 20:02:21', 1, '::1', 3),
	('123', '123', '2024-12-18 20:03:47', 1, '::1', 4),
	('123', '123', '2024-12-19 16:01:35', 1, '::1', 5),
	('123', '123', '2024-12-19 16:08:24', 1, '::1', 6),
	('321', '', '2024-12-19 16:08:56', 1, '::1', 7),
	('321', '', '2024-12-19 16:10:53', 1, '::1', 8),
	('123', '123', '2024-12-19 16:11:04', 1, '::1', 9),
	('123', '123', '2024-12-19 16:11:22', 1, '::1', 10),
	('231', '', '2024-12-19 16:12:15', 0, '::1', 11),
	('123', '123', '2024-12-19 16:12:20', 1, '::1', 12),
	('123', '123', '2024-12-19 16:12:57', 1, '::1', 13),
	('231', '', '2024-12-19 16:21:17', 0, '::1', 14),
	('123', '', '2024-12-19 16:21:19', 1, '::1', 15),
	('321', '', '2024-12-19 16:21:23', 1, '::1', 16),
	('123', '123', '2024-12-19 16:21:28', 1, '::1', 17),
	('123', '123', '2024-12-19 16:23:50', 1, '::1', 18),
	('321', '', '2024-12-19 16:23:54', 1, '::1', 19),
	('123', '123', '2024-12-19 16:24:04', 1, '::1', 20),
	('321', '', '2024-12-19 16:24:37', 1, '::1', 21),
	('123', '123', '2024-12-19 16:24:43', 1, '::1', 22),
	('321', '', '2024-12-19 16:26:22', 1, '::1', 23),
	('123', '', '2024-12-19 16:30:21', 1, '::1', 24),
	('123', '123', '2024-12-19 16:30:29', 1, '::1', 25),
	('123', '123', '2024-12-19 16:30:47', 1, '::1', 26),
	('123', '123', '2024-12-19 16:30:56', 1, '::1', 27),
	('123', '123', '2024-12-19 16:31:22', 1, '::1', 28),
	('321', '', '2024-12-19 16:31:26', 1, '::1', 29),
	('123', '123', '2024-12-19 16:32:21', 1, '::1', 30),
	('321', '', '2024-12-19 16:32:29', 1, '::1', 31),
	('321', '', '2024-12-19 16:34:00', 1, '::1', 32),
	('321', '', '2024-12-19 16:38:25', 1, '::1', 33),
	('321', '', '2024-12-19 16:38:45', 1, '::1', 34),
	('321', '', '2024-12-19 16:39:37', 1, '::1', 35),
	('321', '', '2024-12-19 16:40:17', 1, '::1', 36),
	('123', '123', '2024-12-19 16:41:43', 1, '::1', 37),
	('123', '123', '2024-12-19 16:42:12', 1, '::1', 38),
	('123', '123', '2024-12-19 16:50:31', 1, '::1', 39),
	('123', '123', '2024-12-19 17:45:43', 1, '::1', 40),
	('123', '123', '2024-12-19 17:46:17', 1, '::1', 41),
	('321', '', '2024-12-19 18:38:41', 1, '::1', 42),
	('123', '123', '2024-12-19 19:41:35', 1, '::1', 43),
	('123', '123', '2024-12-19 20:52:46', 1, '::1', 44),
	('321', '', '2024-12-20 16:02:08', 1, '::1', 45),
	('123', '123', '2024-12-20 17:54:46', 1, '::1', 46),
	('321', '', '2024-12-20 17:54:52', 1, '::1', 47),
	('321', '', '2024-12-20 17:55:20', 1, '::1', 48),
	('321', '', '2024-12-20 17:57:14', 1, '::1', 49),
	('123', '123', '2024-12-20 17:57:31', 1, '::1', 50),
	('123', '123', '2024-12-20 18:00:07', 1, '::1', 51),
	('123', '123', '2024-12-20 18:01:54', 1, '::1', 52),
	('321', '', '2024-12-20 18:02:24', 1, '::1', 53),
	('123', '', '2025-01-07 15:54:00', 1, '::1', 54),
	('123', '', '2025-01-07 15:57:08', 1, '::1', 55),
	('123', '', '2025-01-07 15:58:33', 1, '::1', 56),
	('123', '', '2025-01-07 16:00:04', 1, '::1', 57),
	('by7yyno j', '68tb678t7', '2025-01-07 16:44:20', 0, '::1', 58),
	('', '', '2025-01-07 16:44:22', 0, '::1', 59),
	('4v5345', '3v45345', '2025-01-07 16:44:25', 0, '::1', 60),
	('4v34', '34v34v', '2025-01-07 16:48:11', 0, '::1', 61),
	('123', '', '2025-01-07 16:50:14', 1, '::1', 62),
	('321', '321', '2025-01-07 17:10:18', 1, '::1', 63),
	('123', '', '2025-01-07 17:10:27', 1, '::1', 64),
	('321', '321', '2025-01-07 17:10:42', 1, '::1', 65),
	('123', '', '2025-01-07 17:11:05', 1, '::1', 66),
	('123', '', '2025-01-07 18:42:39', 1, '::1', 67),
	('123', '', '2025-01-15 18:15:14', 1, '::1', 68),
	('123', '', '2025-01-15 18:20:08', 1, '::1', 69),
	('123', '', '2025-01-15 19:46:05', 1, '::1', 70),
	('123', '', '2025-01-16 16:48:45', 1, '::1', 71),
	('123', '123', '2025-01-20 19:14:29', 1, '::1', 72),
	('321', '', '2025-01-20 19:14:44', 1, '::1', 73),
	('123', '123', '2025-01-21 15:59:24', 1, '::1', 74),
	('321', '', '2025-01-21 15:59:34', 1, '::1', 75),
	('123', '123', '2025-01-21 15:59:43', 1, '::1', 76),
	('321', '', '2025-01-21 15:59:58', 1, '::1', 77),
	('123', '123', '2025-01-21 16:00:11', 1, '::1', 78),
	('321', '', '2025-01-21 16:00:19', 1, '::1', 79),
	('123', '123', '2025-01-21 16:20:17', 1, '::1', 80),
	('321', '', '2025-01-21 16:21:01', 1, '::1', 81),
	('123', '123', '2025-01-21 16:43:10', 1, '::1', 82),
	('321', '', '2025-01-21 16:48:47', 1, '::1', 83),
	('123', '123', '2025-01-21 16:48:59', 1, '::1', 84),
	('admin', 'admin', '2025-01-22 15:51:23', 0, '::1', 85),
	('123', '123', '2025-01-22 15:51:28', 1, '::1', 86),
	('123', '123', '2025-01-23 18:29:42', 1, '::1', 87),
	('123', '123', '2025-02-05 18:31:58', 1, '::1', 88),
	('123', '123', '2025-02-06 15:53:12', 1, '::1', 89);

-- Volcando estructura para tabla bd_tienda.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bd_tienda.categorias: ~2 rows (aproximadamente)
REPLACE INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
	(1, 'hombre'),
	(2, 'mujer');

-- Volcando estructura para tabla bd_tienda.fotos
CREATE TABLE IF NOT EXISTS `fotos` (
  `url` varchar(100) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `FK_fotos_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bd_tienda.fotos: ~14 rows (aproximadamente)
REPLACE INTO `fotos` (`url`, `id_producto`) VALUES
	('IMG/HOMBRE/2.jpg', 2),
	('IMG/HOMBRE/3.jpg', 3),
	('IMG/HOMBRE/4.jpg', 4),
	('IMG/HOMBRE/5.jpg', 5),
	('IMG/HOMBRE/6.jpg', 6),
	('IMG/MUJER/7.jpg', 7),
	('IMG/MUJER/8.jpg', 8),
	('IMG/MUJER/9.jpg', 9),
	('IMG/MUJER/10.jpg', 10),
	('IMG/MUJER/11.jpg', 11),
	('IMG/MUJER/12.jpg', 12),
	('IMG/HOMBRE/67a4d72ce6dc1_13.jpg', 13),
	('IMG/MUJER/67a4d7461b69d_14.jpg', 14),
	('IMG/MUJER/67a4d74bc7321_15.jpg', 15),
	('IMG/HOMBRE/67a4d838db71a_16.jpg', 28);

-- Volcando estructura para tabla bd_tienda.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `categoria` int(11) DEFAULT NULL,
  `desc_corta` varchar(200) NOT NULL DEFAULT '',
  `desc_larga` varchar(500) NOT NULL DEFAULT '',
  `precio` int(11) NOT NULL DEFAULT 0,
  `ofertas` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`),
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bd_tienda.productos: ~15 rows (aproximadamente)
REPLACE INTO `productos` (`id`, `nombre`, `categoria`, `desc_corta`, `desc_larga`, `precio`, `ofertas`) VALUES
	(2, 'Jersey de fútbol retro marrón', 1, 'Camiseta deportiva estilo vintage con detalles bordados y logos.', 'Camiseta de fútbol de estilo retro en color marrón, con detalles clásicos como logos bordados y cuello tipo polo. Fabricada con materiales ligeros y cómodos, ofrece un ajuste holgado y transpirable, ideal tanto para uso casual como para coleccionistas de prendas deportivas vintage.', 50, NULL),
	(3, 'Abrigo largo trench de estilo ', 1, 'Abrigo largo elegante con diseño de botones y solapas anchas.', 'Abrigo trench coat de diseño clásico y elegante, confeccionado en material resistente con solapas anchas y cierre de botones cruzado. Su corte largo y amplio proporciona protección contra el frío.', 30, NULL),
	(4, 'Camisa beige de manga larga', 1, 'Camisa resistente de estilo utilitario con bolsillo frontal funcional.', 'Camisa de trabajo en color beige con un diseño robusto y funcional. Cuenta con bolsillos frontales con solapas, ideales para guardar herramientas o pequeños objetos, y está confeccionada con materiales resistentes que garantizan durabilidad y comodidad.', 10, 1),
	(5, 'Sudadera negra con capucha y franjas blancas', 1, ' Sudadera deportiva de algodón con capucha y diseño moderno.', 'Sudadera deportiva de estilo moderno, confeccionada en tejido de algodón suave con interior afelpado para mayor calidez. Incorpora una capucha ajustable y un diseño distintivo con franjas verticales blancas al frente.', 35, NULL),
	(6, 'Chaqueta deportiva azul acolchada', 1, 'Chaqueta acolchada para invierno con detalles de color en contraste.', 'Chaqueta deportiva acolchada en color azul vibrante, diseñada para brindar protección y calidez en climas fríos. Incorpora detalles en contraste en las mangas y laterales, cierre frontal de cremallera y bolsillos funcionales.', 65, NULL),
	(7, 'Sudadera anaranjada con logo frontal', 2, 'Sudadera vibrante de color naranja con logotipo en el pecho.', 'Sudadera casual de color anaranjado brillante, confeccionada con materiales suaves y cómodos. Cuenta con cuello redondo, ajuste holgado y un logo frontal distintivo que resalta, ideal para looks relajados y llenos de personalidad.', 30, NULL),
	(8, 'Chaqueta de pana con forro de borrego', 2, 'Chaqueta de pana marrón con interior forrado de borrego cálido.', 'Chaqueta estilo vintage confeccionada en pana gruesa con un cálido forro interior de borrego sintético. Sus detalles incluyen botones frontales, bolsillos funcionales y un corte relajado, ideal para un look rústico y abrigado en días fríos.', 45, 1),
	(9, 'Camisa de manga larga con estampado floral', 2, 'Camisa casual de corte moderno con estampado floral oscuro.', 'Camisa de manga larga con un sofisticado estampado floral en tonos oscuros. Fabricada con tejido ligero y transpirable, ofrece un ajuste cómodo y versátil, ideal para combinar con jeans o pantalones para un look elegante y casual.', 20, NULL),
	(10, 'Blazer marrón desgastado de estilo vintage', 2, 'Blazer marrón de estilo clásico con efecto desgastado único.', 'Blazer de corte estructurado en tonos marrones con un acabado desgastado que le aporta un toque vintage. Sus detalles incluyen solapas clásicas, cierre de botones y bolsillos funcionales, ideal para un estilo formal con un toque distintivo.', 65, NULL),
	(11, 'Sudadera azul afelpada', 2, 'Sudadera de textura suave con capucha y estilo oversize.', 'Sudadera afelpada de color azul marino, diseñada para brindar máxima comodidad y calidez. Presenta una capucha amplia, bolsillo frontal tipo canguro y un ajuste holgado, ideal para climas fríos o un estilo urbano relajado.', 52, NULL),
	(12, 'Chaqueta deportiva negra Adidas con franjas', 2, 'Chaqueta deportiva clásica negra con franjas blancas y logo Adidas.', 'Chaqueta deportiva icónica de Adidas, confeccionada en tejido suave y cómodo. Incluye el diseño clásico con franjas blancas a lo largo de las mangas, cierre frontal con cremallera y el logo Adidas bordado en el pecho. Perfecta para un estilo casual o deportivo.', 45, NULL),
	(13, 'Zapatillas grises Adidas de estilo clásico', 1, 'Zapatillas deportivas grises con diseño minimalista y versátil.', ' Zapatillas Adidas de color gris con las icónicas tres franjas laterales. Fabricadas en materiales duraderos y cómodos, ofrecen un diseño clásico, suela de goma antideslizante y una excelente opción para el uso diario con un toque casual y moderno.', 80, NULL),
	(14, 'Zuecos marrones afelpados con forro interior', 2, 'Zuecos cálidos con forro gris y suela antideslizante.', 'Zuecos marrones de textura suave con forro interior afelpado en gris, ideales para mantener los pies cálidos y cómodos. Diseñados con suela antideslizante resistente, son perfectos para uso en interiores o exteriores durante días fríos.', 65, NULL),
	(15, 'Zapatillas blancas Nike con detalles verdes y mora', 2, 'Zapatillas deportivas blancas con logo morado y detalles vibrantes.', 'Zapatillas Nike de color blanco con suela y detalles en verde y morado. Su diseño moderno y ligero, junto con su amortiguación cómoda, las hace perfectas tanto para actividades deportivas como para un estilo casual urbano.', 105, 1),
	(28, 'Zapatillas acolchadas anaranjadas estilo botita', 1, 'Zapatillas acolchadas de color naranja con diseño único y cómodo.', 'Zapatillas tipo botín con exterior acolchado en un llamativo color naranja. Incorporan forro suave y suela antideslizante, ofreciendo calidez, comodidad y un diseño moderno ideal para destacar en cualquier look invernal o casual.', 120, NULL);

-- Volcando estructura para tabla bd_tienda.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telef` varchar(9) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `cp` varchar(5) DEFAULT '',
  `provincia` varchar(20) DEFAULT '',
  `rol` char(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bd_tienda.usuario: ~5 rows (aproximadamente)
REPLACE INTO `usuario` (`nombre`, `password`, `email`, `telef`, `direccion`, `cp`, `provincia`, `rol`) VALUES
	('garen', '123', '123', '123', '123', '123', '123', '1'),
	('123123', '', '2222dfjdf@gm.com', '234', 'undefined', '23423', '234', '1'),
	('admin', 'admin', 'admin', '', '', '', '', '2'),
	('123', '', 'dfjdf@gm.com', '214234', 'undefined', '4343', '431234', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
