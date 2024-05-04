-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2024 a las 09:29:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ind_proyecto_1_0`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE  PROCEDURE `SP_ELIMINAR_USUARIO` (IN `IDUSU` INT)   DELETE FROM usuario
WHERE usuario.Usr_Id=IDUSU$$

CREATE   PROCEDURE `SP_LISTAR_COMBO_ROL` ()   SELECT
rol.Rol_Id,
rol.Rol_Descripcion
FROM
rol$$

CREATE  PROCEDURE `SP_LISTAR_DEPORTISTA` ()   BEGIN 
DECLARE CANTIDAD INT;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
usuario.Usr_Id,
usuario.Rol_Id,
usuario.Usr_Nombre,
usuario.Usr_Apellido,
usuario.Usr_Email,
usuario.Usr_Tel,
rol.Rol_Descripcion,
estado.Est_Descripcion
FROM
usuario
INNER JOIN rol on usuario.Rol_Id = rol.Rol_Id
INNER JOIN estado on usuario.Est_Id = estado.Est_Id WHERE usuario.Rol_Id=4;
END$$

CREATE   PROCEDURE `SP_LISTAR_USUARIO` ()   BEGIN 
DECLARE CANTIDAD INT;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
usuario.Usr_Id,
usuario.Rol_Id,
usuario.Usr_Nombre,
usuario.Usr_Apellido,
usuario.Usr_Email,
usuario.Usr_Tel,
rol.Rol_Descripcion,
estado.Est_Descripcion
FROM
usuario
INNER JOIN rol on usuario.Rol_Id = rol.Rol_Id
INNER JOIN estado on usuario.Est_Id = estado.Est_Id;
END$$

CREATE   PROCEDURE `SP_MODIFICAR_CONTRA_USUARIO` (IN `IDUSU` INT, IN `CONTRA` VARCHAR(65))   UPDATE  usuario SET
usuario.Usr_Pswd=CONTRA$$

CREATE   PROCEDURE `SP_MODIFICAR_DATOS_USUARIO` (IN `IDUSU` INT, IN `NOMBRE` VARCHAR(40), IN `APELLIDO` VARCHAR(40), IN `IDROL` INT(2), IN `CORREO` VARCHAR(255), IN `TEL` VARCHAR(10))   UPDATE usuario SET
usuario.Usr_Nombre= NOMBRE,
usuario.Usr_Apellido=APELLIDO,
usuario.Rol_Id=IDROL,
usuario.Usr_Email=CORREO,
usuario.Usr_Tel=TEL
WHERE usuario.Usr_Id=IDUSU$$

CREATE   PROCEDURE `SP_MODIFICAR_ESTADO_USUARIO` (IN `IDUSU` INT, IN `ESTADOUSU` VARCHAR(8))   UPDATE usuario SET
usuario.Est_Id=ESTADOUSU
WHERE usuario.Usr_Id=IDUSU$$

CREATE   PROCEDURE `SP_PRUEBA` (IN `CC` INT(10))   BEGIN 
DECLARE  CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM usuario WHERE usuario.Usr_Id = CONVERT(CC,int ));
IF @CANTIDAD=0 THEN
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

CREATE   PROCEDURE `SP_REGISTRAR_USUARIO` (IN `CC` INT(10), IN `ROL` INT(1), IN `NOMBRE` VARCHAR(40), IN `APELLIDO` VARCHAR(40), IN `CONTRA` VARCHAR(65), IN `CORREO` VARCHAR(255), IN `TEL` VARCHAR(10))   BEGIN DECLARE  CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM usuario WHERE usuario.Usr_Nombre = BINARY NOMBRE);
IF @CANTIDAD=0 THEN
INSERT INTO usuario(Usr_Id,Rol_Id,Usr_Nombre,Usr_Apellido,Usr_Pswd,Usr_Email,Usr_Tel,Est_Id) VALUES (CC,ROL,NOMBRE,APELLIDO,CONTRA,CORREO,TEL,1);
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

CREATE   PROCEDURE `SP_RESTABLECER_CONTRA` (IN `EMAIL` VARCHAR(255), IN `CONTRA` VARCHAR(65))   BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM usuario WHERE usuario.Usr_Email=EMAIL);
IF @CANTIDAD>0 THEN
	UPDATE usuario set 
	usuario.Usr_Pswd=CONTRA
	WHERE usuario.Usr_Email=EMAIL;
    SELECT 1;
ELSE
	SELECT 2;
END IF;
END$$

CREATE   PROCEDURE `SP_VERIFICAR_USUARIO` (IN `USUARIO` INT(10))   SELECT 
usuario.Usr_Id,
usuario.Rol_Id,
BINARY usuario.Usr_Nombre,
BINARY usuario.Usr_Apellido,
usuario.Usr_Pswd,
usuario.Est_Id
FROM
usuario
INNER JOIN rol on usuario.Rol_Id = rol.Rol_Id
INNER JOIN estado on usuario.Est_Id = estado.Est_Id
WHERE usuario.Usr_Id= USUARIO$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Adm_Id` int(2) NOT NULL,
  `Adm_Contrasena` varchar(20) NOT NULL,
  `Rol_Id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `Dpt_Id` int(2) NOT NULL,
  `Dpt_Descripcion` varchar(30) NOT NULL,
  `Dpt_Img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `Esp_Id` int(2) NOT NULL,
  `Esp_Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Est_Id` int(1) NOT NULL,
  `Est_Descripcion` varchar(8) NOT NULL,
  `Est_Img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Est_Id`, `Est_Descripcion`, `Est_Img`) VALUES
(1, 'ACTIVO', 'src=\"icon/estado-activo.png\"'),
(2, 'INACTIVO', 'src=\"icon/estado-inactivo.png\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Gen_Id` int(2) NOT NULL,
  `Gen_Descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prize` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `description`, `prize`) VALUES
(1, 'Consolador', 'Satifaccion Anal', 100000),
(2, 'Condones-Pokemon', 'Protege tus Pokeballs', 40000);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_Id` int(2) NOT NULL,
  `Rol_Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol_Id`, `Rol_Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Recepcionista'),
(4, 'Deportista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usr_Id` int(10) NOT NULL,
  `Rol_Id` int(2) NOT NULL,
  `Usr_Nombre` varchar(40) NOT NULL,
  `Usr_Apellido` varchar(40) NOT NULL,
  `Usr_Pswd` varchar(65) NOT NULL,
  `Usr_Email` varchar(255) NOT NULL,
  `Usr_Tel` varchar(10) NOT NULL,
  `Est_Id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usr_Id`, `Rol_Id`, `Usr_Nombre`, `Usr_Apellido`, `Usr_Pswd`, `Usr_Email`, `Usr_Tel`, `Est_Id`) VALUES
(444, 3, 'Vale', 'Tobar', '$2y$10$BY5xZLU2QqfIhtBm9ZvrZey0iNiMfSG2DdBCNL7wT2A3/Xdkuzamy', 'Vale@hotmail.com', '4444456', 2),
(9993, 3, 'Liliana Jineth', 'Zamora Rodriguez', '$2y$10$BY5xZLU2QqfIhtBm9ZvrZey0iNiMfSG2DdBCNL7wT2A3/Xdkuzamy', 'lilianita993@hotmail.com', '3145637222', 1),
(99234755, 2, 'Yohan Stid', 'Garcia Tobar', '$2y$10$BY5xZLU2QqfIhtBm9ZvrZey0iNiMfSG2DdBCNL7wT2A3/Xdkuzamy', 'yohan@medico.co', '3245524425', 1),
(1095832411, 1, 'Albert David ', 'Sanchez', '$2y$10$BY5xZLU2QqfIhtBm9ZvrZey0iNiMfSG2DdBCNL7wT2A3/Xdkuzamy', 'albert@hotmail.com', '3261983939', 1),
(1110547878, 4, 'Matias', 'Avila', '$2y$10$ul.vDn1HZpMvQzjUP1Uu4uLygm5PigOdmtvRQW.suLxZscfCdz/v.', 'matias@gmail.com', '312578900&', 2),
(1110577198, 1, 'Juan Sebastian ', 'Tobar Rojas', '$2y$10$BY5xZLU2QqfIhtBm9ZvrZey0iNiMfSG2DdBCNL7wT2A3/Xdkuzamy', 'juanseone28@gmail.com', '3118345736', 1),
(2147483647, 4, 'Andres', 'Gutierrez', '$2y$10$huLIu6TMPrVcmVmr51GmPuoer6M4iOjyKVFctTxxQOc/CRi6JrqEi', 'andres@cun.edu.co', '3118545679', 1);

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `Rol_Id` (`Rol_Id`),
  ADD KEY `FK_usuario_estado` (`Est_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `FK_ESTADO` FOREIGN KEY (`Est_Id`) REFERENCES `estado` (`Est_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_usuario_estado` FOREIGN KEY (`Est_Id`) REFERENCES `estado` (`Est_Id`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`Rol_Id`) REFERENCES `rol` (`Rol_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
