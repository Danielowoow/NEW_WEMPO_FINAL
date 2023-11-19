-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 20:05:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamaciones`
--

CREATE TABLE `reclamaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos_nombres` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `doc_identidad` varchar(50) NOT NULL,
  `num_doc_identidad` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_reclamo` date NOT NULL,
  `reclamo` tinyint(1) NOT NULL,
  `queja` tinyint(1) NOT NULL,
  `producto_contratado` varchar(50) NOT NULL,
  `monto_reclamado` decimal(10,2) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `detalle` text NOT NULL,
  `pedido_consumidor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reclamaciones`
--

INSERT INTO `reclamaciones` (`id`, `apellidos_nombres`, `direccion`, `departamento`, `provincia`, `distrito`, `doc_identidad`, `num_doc_identidad`, `correo`, `telefono`, `sexo`, `fecha_reclamo`, `reclamo`, `queja`, `producto_contratado`, `monto_reclamado`, `descripcion`, `detalle`, `pedido_consumidor`) VALUES
(2, 'JULIO CESAR HUAMAN TTITO', 'Calle Inclan s/n', 'Cuzco', 'Calca', 'Calca', '', '3456', '1439621@senati.pe', '916053436', 'Masculino', '2023-11-29', 0, 0, 'Bien', 12.00, 'simplemente son unas basuraas', 'simplemente son unas basuraas', 'simplemente son unas basuraas'),
(3, 'JULIO CESAR HUAMAN TTITO', 'Calle Inclan s/n', 'Cuzco', 'Calca', 'Calca', '', '3456', '1439621@senati.pe', '916053436', 'Masculino', '2023-11-29', 0, 0, 'Bien', 12.00, 'simplemente son unas basuraas', 'simplemente son unas basuraas', 'simplemente son unas basuraas'),
(4, 'c', 'callepata', 'Cuzco', 'Cuzco', 'Santiago', '', '23456678', 'prueba@gmail.com', '+51916053436', 'Masculino', '2000-12-30', 0, 0, 'Bien', 2255.00, 'xg', 'rx', 'xr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
