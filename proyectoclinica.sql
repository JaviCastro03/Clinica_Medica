-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2025 a las 08:39:12
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
  `idMedico` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fecha` varchar(11) NOT NULL,
  `idhora` int(11) NOT NULL,
  `idEspecialidad` int(11) DEFAULT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idMedico`, `idPaciente`, `fecha`, `idhora`, `idEspecialidad`, `estado`) VALUES
(7, 5, '2025-11-26', 9, 5, 'Por verificar'),
(7, 8, '2025-12-25', 12, 5, 'Por verificar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Ginecología', 'Salud integral de la mujer.'),
(2, 'Traumatología', 'Tratamiento de lesiones óseas y musculares.'),
(3, 'Odontología', 'Cuidado avanzado de la salud bucal.'),
(4, 'Neurología', 'Diagnóstico de trastornos neurológicos.'),
(5, 'Oncología', 'Atención especializada contra el cáncer.');

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
-- Estructura de tabla para la tabla `informes`
--

DROP TABLE IF EXISTS `informes`;
CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `diagnostico` text NOT NULL,
  `tratamiento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `idEspecialidad` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `rol`, `idEspecialidad`, `telefono`, `direccion`, `cp`) VALUES
(7, '78989063M', 'Vicente', 'Marotensen', 'drmarotensen@gmail.com', '$2y$10$vFDqj.7nzMrPRlofdNYKROZUyb./jVX5QLzKUPfy24e2XEbCZloY.', 3, 5, '687894898', 'Contubernio 49', '18560'),
(9, '74132312J', 'Francisco', 'Vico Pérez', 'drvicoperez@gmail.com', '$2y$10$OrLm1aF4SAu..8lIGeeDQOWsdWorBmGW0wZ61koZKcLObWZpjyLc2', 3, 2, '678954234', 'Calle paseo 2', '12354'),
(24, '9093044F', 'Agustin', 'García Vaquero', 'drgarciavaquero@gmail.com', '$2y$10$ESNTwHDH5bihNEESuyOiGuxRUvNgnnMdHgdmWs0XyB.CluhYqrAWq', 3, 4, '678902123', 'C/Contubernio 49', '29304');

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
  `rol` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `rol`, `telefono`, `direccion`, `cp`) VALUES
(5, '78475412H', 'Javier', 'Castro Muriana', 'javiercastromuriana2006@gmail.com', '$2y$10$BmTow0EbaFCdlP1n5pnzKOg/DYiej95UiuV2c4qT9xwRLZOmJAI2K', 1, '', '', ''),
(7, '78989063M', 'Vicente', 'Marotensen', 'drmarotensen@gmail.com', '$2y$10$vFDqj.7nzMrPRlofdNYKROZUyb./jVX5QLzKUPfy24e2XEbCZloY.', 3, '687894898', 'Contubernio 49', '18560'),
(8, '78107726W', 'Luismi', 'Prieto Pareja', 'luismiluismpp@gmail.com', '$2y$10$yBMRvSDacOCmQfTKP/GYneDKgpNhDn9ADl9EnRsR86chK3OLW2yMC', 1, '687894770', 'C/Granada 8', '12456'),
(9, '74132312J', 'Francisco', 'Vico Pérez', 'drvicoperez@gmail.com', '$2y$10$OrLm1aF4SAu..8lIGeeDQOWsdWorBmGW0wZ61koZKcLObWZpjyLc2', 3, '678954234', 'Calle paseo 2', '12354'),
(24, '9093044F', 'Agustin', 'García Vaquero', 'drgarciavaquero@gmail.com', '$2y$10$ESNTwHDH5bihNEESuyOiGuxRUvNgnnMdHgdmWs0XyB.CluhYqrAWq', 3, '678902123', 'C/Contubernio 49', '29304'),
(28, '00000000F', 'Administrador', ' ', 'admin@gmail.com', '$2y$10$D7aqwXvTqb2hPmiKa4dJdOSOsH4pOjOrhVPiTdhDhMvBg8PfC0XC6', 100, '66666666', 'admin', '0'),
(32, '20886606L', 'Antonio', 'Bolívar Jiménez', 'aboljim1611@g.educaand.es', '$2y$10$gJre73JDZv/.D9ZQc9w1feCEIuZMv/cOBYX7YMkNDoZeFneVNC4rK', 1, '678973123', 'C/Granada 47', '18566'),
(34, '78276539M', 'Antonio Miguel', 'Bolívar García', 'bolivargarcia@gmail.com', '$2y$10$Qdv/8WMDEHdKHJnli1opjuk/be8GNJed02EcBSOMLJWXUMsehJ5PC', 1, '678768323', 'C/Granada 47', '18566'),
(35, '20886606F', 'Antonio Miguel', 'Bolívar Jiménez', 'antonioboliivar@gmail.com', '$2y$10$ZvJlspvjIPr.R9J2d1.xPe4U2NuAOz4LYA1wBPdFn3K5sFn/n3vmK', 1, '681642181', 'C/Granada 47', '18566'),
(38, '20883605F', 'Antonio', 'Bolívar Jiménez', 'ala@gmail.com', '$2y$10$0Cg4hO.yLEkcylDnPX.QPeNf2MQ7fvJ3rOy54eTjgguPE2Osx1q.m', 2, '678902123', 'C/Granada 8', '18569');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idMedico`,`fecha`,`idhora`),
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
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informes_ibfk_1` (`idPaciente`);

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
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_especialidad` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
