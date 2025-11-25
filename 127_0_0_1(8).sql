-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2025 a las 21:42:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--
DROP DATABASE IF EXISTS `clinica`;
CREATE DATABASE IF NOT EXISTS `clinica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `idMedico` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fecha` varchar(11) DEFAULT NULL,
  `idhora` int(11) DEFAULT NULL,
  `idEspecialidad` int(11) DEFAULT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Ginecología'),
(2, 'Traumatología'),
(3, 'Odontología'),
(4, 'Neurología'),
(5, 'Oncología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

DROP TABLE IF EXISTS `horas`;
CREATE TABLE `horas` (
  `id` int(11) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `hora`) VALUES
(1, '08:00'),
(2, '08:30'),
(3, '09:00'),
(4, '09:30'),
(5, '10:00'),
(6, '10:30'),
(7, '11:00'),
(8, '11:30'),
(9, '12:00'),
(10, '12:30'),
(11, '13:00'),
(12, '13:30'),
(13, '14:00'),
(14, '14:30'),
(15, '15:00'),
(16, '15:30'),
(17, '16:00'),
(18, '16:30'),
(19, '17:00'),
(20, '17:30'),
(21, '18:00'),
(22, '18:30'),
(23, '19:00'),
(24, '19:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `idEspecialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `rol`, `idEspecialidad`) VALUES
(7, '78989063M', 'Vicente', 'Marotensen', 'drmarotensen@gmail.com', '$2y$10$vFDqj.7nzMrPRlofdNYKROZUyb./jVX5QLzKUPfy24e2XEbCZloY.', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `rol`) VALUES
(5, '78475412h', 'Javier', 'Castro Muriana', 'javiercastromuriana2006@gmail.com', '$2y$10$BmTow0EbaFCdlP1n5pnzKOg/DYiej95UiuV2c4qT9xwRLZOmJAI2K', 1),
(6, '20886606F', 'Antonio', 'Bolívar Jiménez', 'antonioboliivar@gmail.com', '$2y$10$n1n/vspb0FSYlHzgAEIDpuf7idh/3EnWkD5J8YNT.sBVUaIncdVAW', 1),
(7, '78989063M', 'Vicente', 'Marotensen', 'drmarotensen@gmail.com', '$2y$10$vFDqj.7nzMrPRlofdNYKROZUyb./jVX5QLzKUPfy24e2XEbCZloY.', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cita_medico` (`idMedico`),
  ADD KEY `fk_cita_paciente` (`idPaciente`),
  ADD KEY `fk_citas_horas` (`idhora`),
  ADD KEY `fk_citas_especialidades` (`idEspecialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_especialidad` (`idEspecialidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cita_medico` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`idPaciente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_especialidades` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `fk_citas_horas` FOREIGN KEY (`idhora`) REFERENCES `horas` (`id`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_especialidad` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
