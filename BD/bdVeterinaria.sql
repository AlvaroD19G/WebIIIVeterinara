/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`veterinaria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci */;

USE `veterinaria`;

-- Crear la tabla `dueños`
DROP TABLE IF EXISTS `dueños`;
CREATE TABLE `dueños` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- Insertar datos en `dueños`
INSERT INTO `dueños`(`id`, `nombre`, `telefono`, `direccion`) VALUES 
(1, 'Carlos López', '8999-9999', 'Calle Secundaria #23');

-- Crear la tabla `mascotas`
DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `raza` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `id_dueño` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dueño` (`id_dueño`),
  CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`id_dueño`) REFERENCES `dueños` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- Insertar datos en `mascotas`
INSERT INTO `mascotas`(`id`, `nombre`, `raza`, `edad`, `id_dueño`) VALUES 
(2, 'Max', 'Labrador', 4, 1);

-- Crear la tabla `citas`
DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mascota` (`id_mascota`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- Insertar datos en `citas`
INSERT INTO `citas`(`id`, `id_mascota`, `fecha`, `hora`, `descripcion`) VALUES 
(2, 2, '2024-11-25', '10:00:00', 'Consulta Odontologa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
