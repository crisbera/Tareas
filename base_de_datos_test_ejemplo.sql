-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2015 a las 16:50:04
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Casa'),
(2, 'Trabajo'),
(3, 'Oficina'),
(4, 'Personal'),
(5, 'Pasatiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
`id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `prioridad` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `categoria_id`, `nombre`, `fecha`, `prioridad`, `status`) VALUES
(1, 4, 'Hacer ejercicio clase', '2015-08-06', 5, 0),
(9, 1, 'Limpiar casa', '2018-08-26', 2, 0),
(10, 3, 'Hacer cotizaciÃ³n', '2015-08-13', 1, 1),
(11, 1, 'Comprar comida para mascota', '2015-08-13', 10, 0),
(12, 1, 'Recoger envio en DHL', '2015-08-13', 1, 1),
(13, 5, 'Impartir clase', '2015-08-13', 1, 1),
(14, 2, 'Llamar a tulum cita', '2015-08-15', 10, 1),
(15, 4, 'Ir a la Playa', '2015-08-15', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `username`, `password`) VALUES
(1, 'crisbera@gmail.com', 'crisbera', '$2a$07$/IJHG74H3FDICIBACF94A.FPHIUgj5uRdCyJXPDXw8NIVnElCkUnK'),
(2, 'juan@hotmail.com', 'juan', '$2a$07$I4I9.A6BD99881/9J3IFC.XSQDdVvlJ0kbDKD44uaoxGq39VhDvba'),
(3, 'luis@hotmail.com', 'luis', '$2a$07$3.H39/.307JB6F3H6GKI8.ejWpQvD3m1LPMDq7KnqwGn1WZ4tyUca');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
 ADD PRIMARY KEY (`id`), ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
