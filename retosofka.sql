-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2023 a las 02:23:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `retosofka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `idNave` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tipo` text NOT NULL,
  `pais` text NOT NULL,
  `peso` varchar(20) NOT NULL,
  `combustible` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`idNave`, `nombre`, `tipo`, `pais`, `peso`, `combustible`) VALUES
(0, 'Voyager V', 'Lanzadera', 'USA', '20000', 'Hidrogeno'),
(1, 'Voyager V', 'Tripulada', 'China', '20000', 'Oxigeno'),
(2, 'Med 54', 'Tripulada', 'China', '75000', 'Petroleo'),
(3, 'Apolo X', 'Tripulada', 'USA', '30000', 'Petroleo'),
(4, 'Apolo XI', 'No tripulada', 'USA', '20000', 'Petroleo'),
(5, 'Energia', 'Lanzadera', 'Rusia', '24000', 'Petroleo'),
(6, 'Med', 'Lanzadera', 'Colombia', '20000', 'Oxigeno'),
(7, 'Voyager VII', 'Tripulada', 'Colombia', '20000', 'Sin combustible'),
(8, 'Venera IV', 'No tripulada', 'Rusia', '12000', 'Nitrogeno'),
(9, 'Luna I', 'No tripulada', 'Rusia', '20000', 'Nitrogeno'),
(10, 'Galileo', 'No tripulada', 'USA', '30000', 'Oxigeno'),
(11, 'Apolo 78', 'Tripulada', 'USA', '70000', 'Petroleo'),
(12, 'Voyager VIII', 'No tripulada', 'USA', '60000', 'Carbono'),
(13, 'Energia IX', 'No tripulada', 'China', '70000', 'Oxigeno'),
(14, 'Voyager IV', 'No tripulada', 'USA', '10000', 'Oxigeno'),
(15, 'Apolo V', 'Tripulada', 'USA', '12000', 'Petroleo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`idNave`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `idNave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
