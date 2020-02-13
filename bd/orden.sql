-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2019 a las 16:23:00
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orden_de_compra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Departamento` text NOT NULL,
  `Corralon` text NOT NULL,
  `Obra` text NOT NULL,
  `Descrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`ID`, `Fecha`, `Departamento`, `Corralon`, `Obra`, `Descrip`) VALUES
(1, '2019-11-20', 'Obra Publica', 'Rango', 'Cargada 2711', '40 bz cemento'),
(3, '2019-11-20', 'Obra Publica', 'Rango', 'hospital', 'nueva orden cuando edite carpetas'),
(4, '2019-11-20', 'Obra Publica', 'Rango', 'hospital', 'nueva orden cuando edite carpetas'),
(5, '2019-11-05', 'Catastro', 'B&Z', 'hospital', '3 dados'),
(6, '2019-11-19', 'Obra Publica', 'Rango', 'playon municipal', '80 bz cemento'),
(7, '2019-11-26', 'Obra Publica', 'Iriarte', 'playon municipal', '45 m de alambre'),
(8, '2019-11-28', 'Obra Publica', 'B&Z', 'Cecla', 'caramelo'),
(9, '2019-11-21', 'Obra Publica', 'Rango', 'hospital', 'yuyo '),
(25, '2019-12-20', 'Obra Publica', 'Rango', 'carpetas', '3 dados'),
(26, '2019-12-14', 'Obra Publica', 'Rango', 'playon municipal', 'nueva siendo casi las 13'),
(27, '2019-12-14', 'Obra Publica', 'Rango', 'playon municipal', 'nuevisima'),
(28, '2019-12-26', 'Catastro', 'B&Z', 'Cecla 1', 'nueva orden cuando edite carpetas'),
(29, '2020-01-04', 'Obra Publica', 'Iriarte', '2020', '30 an'),
(30, '2019-12-31', 'Obra Publica', 'Rango', 'carpetas', 'caramelo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
