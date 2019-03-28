-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2019 a las 22:52:09
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `login` varchar(100) NOT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `idArea` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `login`, `clave`, `activo`, `nivel`, `fechaNacimiento`, `idArea`) VALUES
(1, 'Juan', 'Perez', 'jperez', '1234', 1, 2, '1960-05-06', 1),
(2, 'Carlos', 'Bazan', 'cbazan', '1234', 0, 2, '1970-06-11', 2),
(3, 'Marcos', 'Gutierrez', 'mgutierrez', '1234', 1, 2, '1970-03-05', 2),
(4, 'Josefina', 'Gordillo', 'jgordillo', '1234', 1, 1, '1975-03-06', 3),
(5, 'Anabel', 'Gauna', 'agauna', '1234', 0, 2, '1985-03-22', 4),
(6, 'Marcela', 'Rodriguez', 'mrodriguez', '1234', 1, 2, '1982-03-18', 3),
(7, 'Cristian', 'Barrasa', 'cbarrasa', '1234', 1, 2, '1984-04-25', 2),
(8, 'Tomas', 'Sosa', 'tsosa', '1234', 1, 2, '1979-04-30', 1),
(9, 'Carmen', 'Rossi', 'crossi', '1234', 1, 1, '1966-05-28', 4),
(10, 'Jorge', 'Bein', 'jbein', '1234', 1, 2, '1981-04-24', 1),
(11, 'Alejandro', 'Lopez', 'alopez', '1234', 1, 2, '1989-04-21', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
