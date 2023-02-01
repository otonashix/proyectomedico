-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2023 a las 20:21:54
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ind_proyecto_1.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Adm_Id` int(2) NOT NULL,
  `Adm_Contrasena` varchar(20) NOT NULL,
  `Rol_Id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `Dpt_Id` int(2) NOT NULL,
  `Dpt_Descripcion` varchar(30) NOT NULL,
  `Dpt_Img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`Dpt_Id`, `Dpt_Descripcion`, `Dpt_Img`) VALUES
(1, 'Futbol', 'src=\"icon/soccer-icon.png\"'),
(2, 'Baloncesto', 'src=\"icon/basket-icon.png\"'),
(3, 'Natacion', 'src=\"icon/natacion1-icon.png\"'),
(4, 'Rugby', 'src=\"icon/rugby-icon.png\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `Dep_Id` int(4) NOT NULL,
  `Lig_Id` int(2) NOT NULL,
  `Dep_Pnombre` varchar(20) NOT NULL,
  `Dep_Snombre` varchar(20) NOT NULL,
  `Dep_Papellido` varchar(20) NOT NULL,
  `Dep_Sapellido` varchar(20) NOT NULL,
  `Dpt_Id` int(2) NOT NULL,
  `Est_Id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `Esp_Id` int(2) NOT NULL,
  `Esp_Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Est_Id` int(2) NOT NULL,
  `Est_Descripcion` varchar(8) NOT NULL,
  `Est_Img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Est_Id`, `Est_Descripcion`, `Est_Img`) VALUES
(1, 'Activo', 'src=\"icon/estado-activo.png\"'),
(2, 'Inactivo', 'src=\"icon/estado-inactivo.png\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Gen_Id` int(2) NOT NULL,
  `Gen_Descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Gen_Id`, `Gen_Descripcion`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `Lig_Id` int(2) NOT NULL,
  `Dpt_Id` int(2) NOT NULL,
  `Lig_Descripcion` varchar(30) NOT NULL,
  `Lig_Tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`Lig_Id`, `Dpt_Id`, `Lig_Descripcion`, `Lig_Tel`) VALUES
(1, 1, 'Liga de Futbol del Tolima', '3158274517'),
(2, 2, 'Liga de Baloncesto', '3232452511'),
(3, 3, 'Liga de Natacion', '3178540045'),
(4, 4, 'Liga de Rugby', '3124578457');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `Med_Id` int(2) NOT NULL,
  `Med_Pnombre` varchar(20) NOT NULL,
  `Med_Snombre` varchar(20) NOT NULL,
  `Med_Papellido` varchar(20) NOT NULL,
  `Gen_Id` int(2) NOT NULL,
  `Med_Correo` varchar(30) NOT NULL,
  `Esp_Id` int(2) NOT NULL,
  `Rol_Id` int(2) NOT NULL,
  `Med_Contrasena` varchar(8) NOT NULL,
  `Med_Telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `Rep_Id` int(3) NOT NULL,
  `Rep_Pnombre` varchar(30) NOT NULL,
  `Rep_Snombre` varchar(30) NOT NULL,
  `Rep_Papellido` varchar(30) NOT NULL,
  `Rep_Sapellido` varchar(20) NOT NULL,
  `Rep_Telefono` int(10) NOT NULL,
  `Rep_Correo` varchar(30) NOT NULL,
  `Rol_Id` int(2) NOT NULL,
  `Rep_Contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_Id` int(2) NOT NULL,
  `Rol_Descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usr_Id` int(5) NOT NULL,
  `Gen_Id` int(2) NOT NULL,
  `Usr_Edad` int(2) NOT NULL,
  `Usr_Telefono` int(10) NOT NULL,
  `Usr_Correo` varchar(20) NOT NULL,
  `Dep_Id` int(2) NOT NULL,
  `Rol_Id` int(2) NOT NULL,
  `Dpt_Id` int(15) NOT NULL,
  `Usr_Contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Adm_Id`),
  ADD KEY `Rol_Id` (`Rol_Id`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`Dpt_Id`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`Dep_Id`),
  ADD KEY `Lig_Id` (`Lig_Id`),
  ADD KEY `Dpt_Id` (`Dpt_Id`),
  ADD KEY `Est_Id` (`Est_Id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`Esp_Id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Est_Id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Gen_Id`);

--
-- Indices de la tabla `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`Lig_Id`),
  ADD KEY `Dpt_Id` (`Dpt_Id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`Med_Id`),
  ADD KEY `Gen_Id` (`Gen_Id`),
  ADD KEY `Esp_Id` (`Esp_Id`),
  ADD KEY `Rol_Id` (`Rol_Id`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`Rep_Id`),
  ADD KEY `Rol_Id` (`Rol_Id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol_Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usr_Id`),
  ADD KEY `Gen_Id` (`Gen_Id`),
  ADD KEY `Dpt_Id` (`Dpt_Id`),
  ADD KEY `Dep_Id` (`Dep_Id`),
  ADD KEY `Rol_Id` (`Rol_Id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Rol_Id`) REFERENCES `rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `deportista_ibfk_1` FOREIGN KEY (`Lig_Id`) REFERENCES `liga` (`Lig_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_ibfk_2` FOREIGN KEY (`Dpt_Id`) REFERENCES `liga` (`Dpt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deportista_ibfk_3` FOREIGN KEY (`Est_Id`) REFERENCES `estado` (`Est_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `liga`
--
ALTER TABLE `liga`
  ADD CONSTRAINT `liga_ibfk_1` FOREIGN KEY (`Dpt_Id`) REFERENCES `deporte` (`Dpt_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`Gen_Id`) REFERENCES `genero` (`Gen_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`Esp_Id`) REFERENCES `especialidad` (`Esp_Id`),
  ADD CONSTRAINT `medico_ibfk_3` FOREIGN KEY (`Esp_Id`) REFERENCES `especialidad` (`Esp_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medico_ibfk_4` FOREIGN KEY (`Rol_Id`) REFERENCES `rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD CONSTRAINT `recepcionista_ibfk_1` FOREIGN KEY (`Rol_Id`) REFERENCES `rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Gen_Id`) REFERENCES `genero` (`Gen_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Dpt_Id`) REFERENCES `deporte` (`Dpt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`Dep_Id`) REFERENCES `deportista` (`Dep_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`Rol_Id`) REFERENCES `rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
