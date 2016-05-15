-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2016 a las 18:54:48
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `statusexp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

CREATE TABLE IF NOT EXISTS `asesoria` (
`id_asesoria` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_expediente` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesoria`
--

INSERT INTO `asesoria` (`id_asesoria`, `descripcion`, `fecha`, `id_expediente`) VALUES
(6, ',cdsl;cs;d', '2016-04-27 02:10:11', 4),
(7, 'c cskdclsdc', '2016-04-19 07:00:00', 5),
(8, 'cdl,csl', '2016-04-27 02:20:49', 4),
(9, 'kdcklsn', '2016-05-01 20:27:09', 3),
(10, 'bhygougougugou', '2016-05-03 00:49:59', 6),
(11, 'klhhouhou', '2016-05-03 00:52:11', 7),
(12, 'mkm', '2016-05-09 22:29:54', 3),
(13, 'eefrgrr', '2016-05-12 16:36:21', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id_cliente` int(11) NOT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `rfc`, `telefono`, `email`) VALUES
(1, '1651', '0168711559', '66898489'),
(2, 'ascjashaiu', '5', 'mjbjibkuih'),
(3, 'ascjashaiu', '5554465465', 'annasjnaalksm'),
(4, 'ndskjvns', '586', 'skdjdnls'),
(14, '5165655165', '6421234526', 'ogustavo@unav.edu.mx'),
(15, 'nl', '688', 'nljn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
`id_direccion` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `codpostal` varchar(7) DEFAULT NULL,
  `calle` varchar(80) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `estado`, `ciudad`, `colonia`, `codpostal`, `calle`, `numero`, `id_cliente`) VALUES
(1, 'Sinaloa', 'Guasave', 'IPIS', '81029', 'Calle Niños Heroes 1434', 5465, 1),
(2, 'jnajnjsdnj', 'klsdnvlsn', 'lfnsldjnv', '256', 'mcskmd', 556, 2),
(3, 'lksdnvsln', 'lnvsld', 'ldnvsln', '55', 'sdklvmlsd', 57, 4),
(4, 'Sonora', 'Navojoa', 'Col. Pacifico', '85800', '', 0, 14),
(5, 'ljnl', 'ln', 'njln', '685', 'nljn', 57, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
`id_etapa` int(11) NOT NULL,
  `etapa` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `etapa`, `descripcion`) VALUES
(1, 'Inicio', NULL),
(2, 'Concluir', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
`id_expediente` int(11) NOT NULL,
  `expediente` varchar(50) DEFAULT NULL,
  `id_juzgado` int(11) DEFAULT NULL,
  `id_juicio` int(11) DEFAULT NULL,
  `id_etapa` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_licenciado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id_expediente`, `expediente`, `id_juzgado`, `id_juicio`, `id_etapa`, `id_cliente`, `id_licenciado`) VALUES
(3, '14/2014', 1, 2, 2, 1, 3),
(4, '21666', 1, 2, 2, 1, 3),
(5, 'kjijlij', 1, 2, 1, 3, 4),
(6, 'sdlcmsd', 1, 1, 1, 3, 5),
(7, '165', 1, 1, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE IF NOT EXISTS `fecha` (
`id_fecha` int(11) NOT NULL,
  `año` int(4) DEFAULT NULL,
  `mes` int(2) DEFAULT NULL,
  `dia` int(2) DEFAULT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juicio`
--

CREATE TABLE IF NOT EXISTS `juicio` (
`id_juicio` int(11) NOT NULL,
  `juicio` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juicio`
--

INSERT INTO `juicio` (`id_juicio`, `juicio`, `descripcion`) VALUES
(1, 'Amparo', NULL),
(2, 'Robo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juzgado`
--

CREATE TABLE IF NOT EXISTS `juzgado` (
`id_juzgado` int(11) NOT NULL,
  `juzgado` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juzgado`
--

INSERT INTO `juzgado` (`id_juzgado`, `juzgado`, `descripcion`) VALUES
(1, 'Civil', NULL),
(2, 'Mercantil', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidopaterno` varchar(50) DEFAULT NULL,
  `apellidomaterno` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidopaterno`, `apellidomaterno`, `usuario`, `contrasena`, `tipo`) VALUES
(3, 'Yanet', 'Delgado', 'Vergara', 'yanet', '1234', 'licenciado'),
(4, 'Johana', '----', '----', 'johana', '1234', 'licenciado'),
(5, 'Elias', 'Vergara', 'Tejada', 'elias', '1234', 'licenciado'),
(6, 'Eduardo', 'Barillas', 'Ortiz', 'Eduardo', '1234', 'cliente'),
(26, 'Edwin Humberto', 'Vergara', 'BeltrÃ¡n', 'vered', '1235', 'administrador'),
(33, 'ereef', 'srr', 'dde', 'fr', 'fb', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariocliente`
--

CREATE TABLE IF NOT EXISTS `usuariocliente` (
`id_usuariocliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariocliente`
--

INSERT INTO `usuariocliente` (`id_usuariocliente`, `id_usuario`, `id_cliente`) VALUES
(2, 6, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesoria`
--
ALTER TABLE `asesoria`
 ADD PRIMARY KEY (`id_asesoria`), ADD KEY `fk9` (`fecha`), ADD KEY `fk10` (`id_expediente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
 ADD PRIMARY KEY (`id_direccion`), ADD KEY `fk1` (`id_cliente`);

--
-- Indices de la tabla `etapa`
--
ALTER TABLE `etapa`
 ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
 ADD PRIMARY KEY (`id_expediente`), ADD KEY `fk4` (`id_juzgado`), ADD KEY `fk5` (`id_juicio`), ADD KEY `fk6` (`id_etapa`), ADD KEY `fk7` (`id_licenciado`), ADD KEY `fk8` (`id_cliente`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
 ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `juicio`
--
ALTER TABLE `juicio`
 ADD PRIMARY KEY (`id_juicio`);

--
-- Indices de la tabla `juzgado`
--
ALTER TABLE `juzgado`
 ADD PRIMARY KEY (`id_juzgado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuariocliente`
--
ALTER TABLE `usuariocliente`
 ADD PRIMARY KEY (`id_usuariocliente`), ADD KEY `fk2` (`id_usuario`), ADD KEY `fk3` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesoria`
--
ALTER TABLE `asesoria`
MODIFY `id_asesoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `etapa`
--
ALTER TABLE `etapa`
MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `juicio`
--
ALTER TABLE `juicio`
MODIFY `id_juicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `juzgado`
--
ALTER TABLE `juzgado`
MODIFY `id_juzgado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `usuariocliente`
--
ALTER TABLE `usuariocliente`
MODIFY `id_usuariocliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesoria`
--
ALTER TABLE `asesoria`
ADD CONSTRAINT `fk10` FOREIGN KEY (`id_expediente`) REFERENCES `expediente` (`id_expediente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
ADD CONSTRAINT `fk1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
ADD CONSTRAINT `fk4` FOREIGN KEY (`id_juzgado`) REFERENCES `juzgado` (`id_juzgado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk5` FOREIGN KEY (`id_juicio`) REFERENCES `juicio` (`id_juicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk6` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk7` FOREIGN KEY (`id_licenciado`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk8` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariocliente`
--
ALTER TABLE `usuariocliente`
ADD CONSTRAINT `fk2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
