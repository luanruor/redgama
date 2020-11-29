-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2020 a las 22:46:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redgama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TipoDocumento` int(11) NOT NULL,
  `Documento` varchar(14) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Celular` varchar(10) NOT NULL,
  `CelularAlterno` varchar(10) DEFAULT NULL,
  `CreadoEl` timestamp NOT NULL,
  `ActualizadoEl` timestamp NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Documento` (`Documento`),
  KEY `TipoDocumento` (`TipoDocumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `TipoDocumento`, `Documento`, `Nombres`, `Apellidos`, `Correo`, `Direccion`, `Celular`, `CelularAlterno`, `CreadoEl`, `ActualizadoEl`) VALUES
(1, 2, '33338636', 'Ines del Carmen', 'Yepes Sierra', 'iyepez@sena.edu.co', 'Marbella', '3005212445', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '1047446137', 'Luis Antonio', 'Ruiz Ordoñez', 'luanruor@hotmail.com', 'La Esperanza', '3046096192', '', '2020-11-28 23:40:50', '2020-11-29 01:12:01'),
(3, 1, '45489858', 'Catalina', 'Ordoñez Puerta', 'caorpu@hotmail.com', 'La Esperanza', '3157307864', '', '0000-00-00 00:00:00', '2020-11-29 01:14:49'),
(4, 1, '33140382', 'Martha', 'Puerta', 'mpuerta@hotmail.com', 'La Esperanza', '3155465235', '', '2020-11-28 21:38:08', '2020-11-28 21:38:08'),
(5, 1, '1000', 'fdgdf', 'fghsg', 'sdhdf@jkngf.com', 'dg', '3000000000', '', '2020-11-29 02:54:43', '2020-11-29 02:54:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizacliente`
--

CREATE TABLE IF NOT EXISTS `polizacliente` (
  `IdCliente` int(11) NOT NULL,
  `IdPoliza` int(11) NOT NULL,
  UNIQUE KEY `IdCliente_2` (`IdCliente`,`IdPoliza`),
  KEY `IdCliente` (`IdCliente`),
  KEY `IdPoliza` (`IdPoliza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `polizacliente`
--

INSERT INTO `polizacliente` (`IdCliente`, `IdPoliza`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizas`
--

CREATE TABLE IF NOT EXISTS `polizas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `TipoCubrimiento` int(11) NOT NULL,
  `PorcentajeCubrimiento` int(11) NOT NULL,
  `InicioVigencia` date NOT NULL,
  `PeriodoCobertura` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `TipoRiesgo` int(11) NOT NULL,
  `CreadoEl` timestamp NOT NULL,
  `ActualizadoEl` timestamp NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `TipoCubrimiento` (`TipoCubrimiento`),
  KEY `TipoRiesgo` (`TipoRiesgo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `polizas`
--

INSERT INTO `polizas` (`Id`, `Nombre`, `Descripcion`, `TipoCubrimiento`, `PorcentajeCubrimiento`, `InicioVigencia`, `PeriodoCobertura`, `Precio`, `TipoRiesgo`, `CreadoEl`, `ActualizadoEl`) VALUES
(1, 'Prueba', 'D Prueba', 2, 20, '2020-11-26', 4, 1200000, 1, '2020-11-29 01:47:41', '2020-11-29 03:43:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocumbrimiento`
--

CREATE TABLE IF NOT EXISTS `tipocumbrimiento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipocumbrimiento`
--

INSERT INTO `tipocumbrimiento` (`Id`, `Nombre`) VALUES
(1, 'Terremoto'),
(2, 'Incendio'),
(3, 'Robo'),
(4, 'Pérdida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Sigla` varchar(5) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`Id`, `Nombre`, `Sigla`, `Estado`) VALUES
(1, 'Cédula de Ciudadanía', 'CC', 'Activo'),
(2, 'Cédula de Extranjería', 'CE', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposriesgo`
--

CREATE TABLE IF NOT EXISTS `tiposriesgo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tiposriesgo`
--

INSERT INTO `tiposriesgo` (`Id`, `Nombre`) VALUES
(1, 'Bajo'),
(2, 'Medio'),
(3, 'Medio-Alto'),
(4, 'Alto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombres`, `Apellidos`, `Usuario`, `Clave`, `Estado`) VALUES
(1, 'Luis Antonio', 'Ruiz Ordoñez', 'admin', 'admin', 'Activo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`TipoDocumento`) REFERENCES `tipodocumento` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `polizacliente`
--
ALTER TABLE `polizacliente`
  ADD CONSTRAINT `polizacliente_ibfk_2` FOREIGN KEY (`IdPoliza`) REFERENCES `polizas` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `polizacliente_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `polizas`
--
ALTER TABLE `polizas`
  ADD CONSTRAINT `polizas_ibfk_1` FOREIGN KEY (`TipoCubrimiento`) REFERENCES `tipocumbrimiento` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `polizas_ibfk_2` FOREIGN KEY (`TipoRiesgo`) REFERENCES `tiposriesgo` (`Id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
