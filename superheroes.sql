-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2022 a las 19:56:08
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `superheroes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `id` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`id`, `nombre`, `email`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'usuario', 'usuariogenerico@hotmail.com', 1, '2022-02-28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `evolucion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evolucion`
--

INSERT INTO `evolucion` (`evolucion`) VALUES
('experto'),
('principiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(6) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Supervelocidad', '2022-02-28 16:09:16', '2022-02-28 16:09:07'),
(3, 'rayo laser', '2022-02-28 16:09:49', '2022-02-28 16:09:35'),
(4, 'teletransporte', '2022-02-28 16:09:59', '2022-02-28 16:09:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `realizada` varchar(10) NOT NULL,
  `id_superheroe` int(10) DEFAULT NULL,
  `id_ciudadano` int(6) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id`, `titulo`, `descripcion`, `realizada`, `id_superheroe`, `id_ciudadano`, `created_at`, `updated_at`) VALUES
(6, 'prueba', 'hola', 'false', NULL, 1, '2022-02-28', NULL),
(9, 'prueba2', 'prueba dvsv', 'false', NULL, 1, '2022-02-28', NULL),
(11, 'aetdghdgsahg', 'agvdSDshmnv', 'false', NULL, 1, '2022-02-28', NULL),
(12, 'hola', 'hola', '', NULL, 1, '2022-02-28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `evolucion` varchar(40) NOT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  `id_usuario` int(6) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheroes`
--

INSERT INTO `superheroes` (`id`, `nombre`, `evolucion`, `imagen`, `id_usuario`, `created_at`, `updated_at`) VALUES
(19, 'Paco', 'principiante', NULL, 2, '2022-02-23', NULL),
(20, 'Andres', 'principiante', NULL, 3, '2022-03-04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheroes_habilidades`
--

CREATE TABLE `superheroes_habilidades` (
  `id` int(6) NOT NULL,
  `id_superheroe` int(10) NOT NULL,
  `id_habilidad` int(6) NOT NULL,
  `valor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheroes_habilidades`
--

INSERT INTO `superheroes_habilidades` (`id`, `id_superheroe`, `id_habilidad`, `valor`) VALUES
(1, 19, 3, 2),
(2, 19, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `rol`) VALUES
(1, 'usuario', 'usuario', 'ciudadano'),
(2, 'admin', 'admin', 'superheroe'),
(3, 'hola', 'hola', 'superheroe'),
(4, 'suso', 'adas', 'ciudadano'),
(5, 'gonzalo', '1234', 'ciudadano'),
(6, 'pedro', '1234', 'ciudadano');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario_fk` (`id_usuario`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`evolucion`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudadano_fk` (`id_ciudadano`),
  ADD KEY `superheroeId_fk` (`id_superheroe`);

--
-- Indices de la tabla `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evolucion_Fk` (`evolucion`),
  ADD KEY `usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superheroe_fk` (`id_superheroe`),
  ADD KEY `habilidad_fk` (`id_habilidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD CONSTRAINT `idUsuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `ciudadano_fk` FOREIGN KEY (`id_ciudadano`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `superheroeId_fk` FOREIGN KEY (`id_superheroe`) REFERENCES `superheroes` (`id`);

--
-- Filtros para la tabla `superheroes`
--
ALTER TABLE `superheroes`
  ADD CONSTRAINT `evolucion_Fk` FOREIGN KEY (`evolucion`) REFERENCES `evolucion` (`evolucion`),
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD CONSTRAINT `habilidad_fk` FOREIGN KEY (`id_habilidad`) REFERENCES `habilidades` (`id`),
  ADD CONSTRAINT `superheroe_fk` FOREIGN KEY (`id_superheroe`) REFERENCES `superheroes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
