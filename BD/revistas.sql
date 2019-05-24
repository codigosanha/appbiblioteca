-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2019 a las 18:13:17
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revistas`
--

CREATE TABLE `revistas` (
  `id` int(11) NOT NULL,
  `numero_registro` varchar(100) DEFAULT NULL,
  `codigo_ubicacion` varchar(100) DEFAULT NULL,
  `revista` varchar(200) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `editorial` varchar(200) DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `año_publicacion` year(4) DEFAULT NULL,
  `imagen` text,
  `prestados` int(11) NOT NULL,
  `ejemplares` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `revistas`
--

INSERT INTO `revistas` (`id`, `numero_registro`, `codigo_ubicacion`, `revista`, `titulo`, `editorial`, `lugar`, `año_publicacion`, `imagen`, `prestados`, `ejemplares`) VALUES
(1, '7', 'A/A1', 'Asamblea de Rectores', 'Base de datos ', 'Navarrete', 'Lima', 2019, 'Desert.jpg', 0, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `revistas`
--
ALTER TABLE `revistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `revistas`
--
ALTER TABLE `revistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
