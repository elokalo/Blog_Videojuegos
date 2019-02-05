-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-02-2019 a las 11:43:22
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_videojuegos`
--
CREATE DATABASE IF NOT EXISTS `blog_videojuegos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog_videojuegos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Accion'),
(2, 'RPG'),
(3, 'Deportes'),
(4, 'MOBA'),
(5, 'Estrategia'),
(6, 'Familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id_entrada` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8 NOT NULL,
  `fecha_entrada` date NOT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_entrada`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha_entrada`) VALUES
(1, 1, 4, 'Review HOTS', 'Opinión sobre Heroes of the Storm el nuevo y novedoso MOBA de Blizzard.\r\n\r\n', '2019-01-12'),
(2, 2, 1, 'GTA Vice City', 'Uno de los mejores juegos en tercera persona que revoluciono el género.\r\n\r\nCurabitur facilisis magna eget eleifend mattis. Etiam at lectus ut ante laoreet pellentesque. Proin vehicula tellus ac tellus dictum, ut auctor leo eleifend. Mauris et elementum nulla, vel varius diam. Aliquam erat volutpat. Nulla varius augue mauris, vitae lacinia metus lacinia in. Nam sed euismod metus. Nunc pharetra tincidunt purus, non ornare est rutrum id. Praesent ut aliquet quam. Nullam molestie ut neque eu laoreet.', '2018-06-06'),
(3, 5, 3, 'FIFA vs PES', 'Cual juego de fútbol es mejor lo analizaremos a continuación.\r\n\r\nCurabitur facilisis magna eget eleifend mattis. Etiam at lectus ut ante laoreet pellentesque. Proin vehicula tellus ac tellus dictum, ut auctor leo eleifend. Mauris et elementum nulla, vel varius diam. Aliquam erat volutpat. Nulla varius augue mauris, vitae lacinia metus lacinia in. Nam sed euismod metus. Nunc pharetra tincidunt purus, non ornare est rutrum id. Praesent ut aliquet quam. Nullam molestie ut neque eu laoreet.', '2019-01-06'),
(4, 3, 3, 'GRAN TURISMO', 'El simulador que lleva años asombrándonos con su dinamismo y realismo en carrearas de coches.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit tortor at ante convallis tristique. Duis at consequat ex, in accumsan augue. Maecenas sollicitudin lorem eget est pretium, eu laoreet lacus sagittis. Aenean tristique nulla et feugiat sagittis. Donec lobortis dui non nulla fermentum, in malesuada lorem mattis. Aenean imperdiet, justo tincidunt ultrices molestie, tortor lorem egestas metus, in maximus felis mi a sem. Nulla id nisi ornare ante tincidunt cursus sit amet ut nunc. Praesent ultrices ante lacus, ac placerat augue dictum quis. Nulla vel orci nec justo finibus volutpat in quis massa. Vivamus in purus vitae turpis congue ultricies. Aenean in augue sed risus elementum venenatis sit amet a justo. Sed vulputate blandit consectetur. Aliquam nulla dolor, ullamcorper a purus eu, rutrum consequat lectus. Aenean ut elementum justo. Sed ac augue dapibus felis lacinia sollicitudin.', '2018-09-15'),
(5, 1, 2, 'Fable', 'Un juego modo historia donde tu decides si haces el bien o el mal.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit tortor at ante convallis tristique. Duis at consequat ex, in accumsan augue. Maecenas sollicitudin lorem eget est pretium, eu laoreet lacus sagittis. Aenean tristique nulla et feugiat sagittis. Donec lobortis dui non nulla fermentum, in malesuada lorem mattis. Aenean imperdiet, justo tincidunt ultrices molestie, tortor lorem egestas metus, in maximus felis mi a sem. Nulla id nisi ornare ante tincidunt cursus sit amet ut nunc. Praesent ultrices ante lacus, ac placerat augue dictum quis. Nulla vel orci nec justo finibus volutpat in quis massa. Vivamus in purus vitae turpis congue ultricies. Aenean in augue sed risus elementum venenatis sit amet a justo. Sed vulputate blandit consectetur. Aliquam nulla dolor, ullamcorper a purus eu, rutrum consequat lectus. Aenean ut elementum justo. Sed ac augue dapibus felis lacinia sollicitudin.', '2019-01-11'),
(6, 1, 1, 'GTA 3', 'El juego que comenzó todo el fenómeno. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit tortor at ante convallis tristique. Duis at consequat ex, in accumsan augue. Maecenas sollicitudin lorem eget est pretium, eu laoreet lacus sagittis. Aenean tristique nulla et feugiat sagittis. Donec lobortis dui non nulla fermentum, in malesuada lorem mattis. Aenean imperdiet, justo tincidunt ultrices molestie, tortor lorem egestas metus, in maximus felis mi a sem. Nulla id nisi ornare ante tincidunt cursus sit amet ut nunc. Praesent ultrices ante lacus, ac placerat augue dictum quis. Nulla vel orci nec justo finibus volutpat in quis massa. Vivamus in purus vitae turpis congue ultricies. Aenean in augue sed risus elementum venenatis sit amet a justo. Sed vulputate blandit consectetur. Aliquam nulla dolor, ullamcorper a purus eu, rutrum consequat lectus. Aenean ut elementum justo. Sed ac augue dapibus felis lacinia sollicitudin.', '2018-03-21'),
(9, 17, 4, 'SMITE', 'El primer MOBA en tercera persona donde tu escoges a tu dios favorito', '2019-02-01'),
(10, 17, 6, 'Mario Bros', 'El juego clásico de los 80\'s donde tenemos a nuestro plomero favorito en acción', '2019-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_edicion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `fecha_registro`, `fecha_edicion`) VALUES
(1, 'Alfredo', 'Cortes Yañez', 'correo@gmail.com', '12345', '2019-01-11', NULL),
(2, 'Eduardo', 'Berdel', 'edbed@gmail.com', '6789', '2018-02-11', NULL),
(3, 'Ana', 'Ruíz', 'ana_ruiz@gmail.com', 'ana1992', '2018-12-31', NULL),
(4, 'Aquiles', 'Brinco', 'aquiles@gmail.com', 'aquiles_brinco', '2019-01-12', NULL),
(5, 'Sergio', 'Rangel', 'rangel@gmail.com', '12345', '2019-01-12', NULL),
(7, 'Admin', 'Admin', 'admin@correo.com', 'admin', '2019-01-12', NULL),
(9, 'Luis', 'Cortes', 'luisacy@gmail.com', '$2y$12$WxCUM.L.7hZTFrmEm00HM.1USPKNENEbfHGcm8W9S4k39B8U0e.GO', '2019-01-24', NULL),
(12, 'Rogelio', 'Ramirez', 'ram@correo.com', '$2y$12$Xjimth1ynlKLYOjv1GNLC.1qyt/1oh.F4tayEvz.giG/2bgHGHsKW', '2019-01-24', NULL),
(13, 'Hola', 'Como', 'correo@correo.com', '$2y$12$JhD0Q.hqQWlt8cWETSksCeRvqZdyB72TXe62HFiwfNsMPoSe4nMY6', '2019-01-24', NULL),
(14, '?!Alfredo', '?!Cortes', 'ejemplo@hotmail.com', '$2y$12$IiZCTKsjuUc7uLaaoRSGX.ocRicgb9msoJevyLxPHF7n6yyp24l8O', '2019-01-24', NULL),
(15, 'Ejemplo', 'Ejemplito', 'ejemplo@ejemplo.com', '$2y$12$Vi.X1EqZBoCG5p0hyEf69OpE1pwyR2uXjUGYM6wB5rbx9sv/WJ3ny', '2019-01-24', NULL),
(16, 'Espacio', 'Espacios', 'espacio@correo.com', '$2y$12$89D4KlHZC7WkXr8nVcPhMu1O1K6xUz0I8gGFC1Rp.VeB4hTMtxXIS', '2019-01-26', NULL),
(17, 'Alfredo', 'Cortes', 'elokalo@hotmail.com', '$2y$12$ly8bxQ9io4NrlfughUG5eOXGaj1RaBYzzLG2KzvuDWQIl2rgr93v2', '2019-01-26', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
