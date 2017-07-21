-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-07-2017 a las 05:21:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `idComentario` int(5) NOT NULL,
  `Comentario` text NOT NULL,
  `idUsuarioc` int(5) DEFAULT NULL,
  `Fecha_Creacion` varchar(100) NOT NULL,
  `idPersona` int(5) DEFAULT NULL,
  `idEmpresa` int(5) DEFAULT NULL,
  `idNegociacion` int(5) DEFAULT NULL,
  `idTarea` int(5) DEFAULT NULL,
  `idComent` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Correos`
--

CREATE TABLE `Correos` (
  `idCorreo` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `Correo1` varchar(45) DEFAULT NULL,
  `TipoCorreo1` varchar(45) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Correo2` varchar(25) DEFAULT NULL,
  `TipoCorreo2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direcciones`
--

CREATE TABLE `Direcciones` (
  `idDirecciones` int(11) NOT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Municipio` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Cp` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresas`
--

CREATE TABLE `Empresas` (
  `idEmpresa` int(11) NOT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `idRepresentante` int(5) DEFAULT NULL,
  `idContacto` int(5) DEFAULT NULL,
  `Skype` varchar(45) DEFAULT NULL,
  `SitioWeb` varchar(45) DEFAULT NULL,
  `idUsuarioRegistro` int(11) DEFAULT NULL,
  `FechaRegistro` varchar(45) DEFAULT NULL,
  `sitReg` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Negociaciones`
--

CREATE TABLE `Negociaciones` (
  `idNegociacion` int(5) NOT NULL,
  `NombreNegociacion` varchar(200) DEFAULT NULL,
  `idEmpresa` int(5) DEFAULT NULL,
  `idPersona` int(5) DEFAULT NULL,
  `Motivo` varchar(200) DEFAULT NULL,
  `Prioridad` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `PersonaCargo` int(5) DEFAULT NULL,
  `FechaLimite` varchar(100) DEFAULT NULL,
  `Detalles` varchar(300) DEFAULT NULL,
  `CreadaPor` int(5) DEFAULT NULL,
  `Activa` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Participantes_Tareas`
--

CREATE TABLE `Participantes_Tareas` (
  `idParticipantes` int(5) NOT NULL,
  `idTarea` int(5) NOT NULL,
  `idUsuario` int(5) DEFAULT NULL,
  `idPersona` int(5) DEFAULT NULL,
  `idEmpresa` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas`
--

CREATE TABLE `Personas` (
  `idPersona` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Paterno` varchar(45) DEFAULT NULL,
  `Materno` varchar(45) DEFAULT NULL,
  `Cargo` varchar(45) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `Skype` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `idUsuarioRegistro` int(11) DEFAULT NULL,
  `FechaRegistro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE `Tareas` (
  `idTarea` int(10) NOT NULL,
  `TituloTarea` varchar(100) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `Asignados` varchar(200) NOT NULL,
  `emp_part` varchar(200) DEFAULT NULL,
  `per_part` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(2000) NOT NULL,
  `idPersona` int(5) DEFAULT NULL,
  `idEmpresa` int(5) DEFAULT NULL,
  `idNegociacion` int(5) DEFAULT NULL,
  `FechaFin` varchar(100) NOT NULL,
  `idUsuarioCrea` int(5) DEFAULT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Activa` int(2) NOT NULL DEFAULT '1',
  `Prioridad` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Telefonos`
--

CREATE TABLE `Telefonos` (
  `idTelefono` int(11) NOT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `Telefono1` varchar(45) DEFAULT NULL,
  `TipoTelefono1` varchar(45) DEFAULT NULL,
  `Telefono2` varchar(50) DEFAULT NULL,
  `TipoTelefono2` varchar(50) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Paterno` varchar(45) DEFAULT NULL,
  `Materno` varchar(45) DEFAULT NULL,
  `Puesto` varchar(45) DEFAULT NULL,
  `Skype` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `url_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `FK_com_per` (`idPersona`),
  ADD KEY `FK_com_emp` (`idEmpresa`),
  ADD KEY `FK_com_ng` (`idNegociacion`),
  ADD KEY `FK_com_us` (`idUsuarioc`);

--
-- Indices de la tabla `Correos`
--
ALTER TABLE `Correos`
  ADD PRIMARY KEY (`idCorreo`),
  ADD KEY `FK_corr_pers_idx` (`idEmpresa`),
  ADD KEY `FK_corr_pers` (`idPersona`),
  ADD KEY `FK_corr_usu` (`idUsuario`);

--
-- Indices de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD PRIMARY KEY (`idDirecciones`),
  ADD KEY `FK_dir_pers_idx` (`idPersona`),
  ADD KEY `FK_dir_usu` (`idUsuario`),
  ADD KEY `FK_dir_emp` (`idEmpresa`);

--
-- Indices de la tabla `Empresas`
--
ALTER TABLE `Empresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `FK_emp_usu_idx` (`idUsuarioRegistro`),
  ADD KEY `FK_emp_Rep` (`idRepresentante`);

--
-- Indices de la tabla `Negociaciones`
--
ALTER TABLE `Negociaciones`
  ADD PRIMARY KEY (`idNegociacion`),
  ADD KEY `FK_ng_Emp` (`idEmpresa`),
  ADD KEY `FK_ng_Per` (`idPersona`),
  ADD KEY `FK_ng_us` (`CreadaPor`),
  ADD KEY `FK_ng_cargo` (`PersonaCargo`);

--
-- Indices de la tabla `Participantes_Tareas`
--
ALTER TABLE `Participantes_Tareas`
  ADD PRIMARY KEY (`idParticipantes`),
  ADD KEY `FK_part_Pers` (`idPersona`),
  ADD KEY `FK_part_us` (`idUsuario`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `FK_per_emp_idx` (`idEmpresa`),
  ADD KEY `FK_per_usu_idx` (`idUsuarioRegistro`);

--
-- Indices de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `FK_Tar_pers` (`idPersona`),
  ADD KEY `FK_Tar_emp` (`idEmpresa`),
  ADD KEY `FK_Tar_ng` (`idNegociacion`),
  ADD KEY `FK_Tar_us` (`idUsuarioCrea`);

--
-- Indices de la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  ADD PRIMARY KEY (`idTelefono`),
  ADD KEY `FK_tel_cliente_idx` (`idPersona`),
  ADD KEY `FK_tel_emp` (`idEmpresa`),
  ADD KEY `FK_tel_usu` (`idUsuario`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `idComentario` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Correos`
--
ALTER TABLE `Correos`
  MODIFY `idCorreo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  MODIFY `idDirecciones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Empresas`
--
ALTER TABLE `Empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Negociaciones`
--
ALTER TABLE `Negociaciones`
  MODIFY `idNegociacion` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Participantes_Tareas`
--
ALTER TABLE `Participantes_Tareas`
  MODIFY `idParticipantes` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Personas`
--
ALTER TABLE `Personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  MODIFY `idTarea` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  MODIFY `idTelefono` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD CONSTRAINT `FK_com_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_com_ng` FOREIGN KEY (`idNegociacion`) REFERENCES `Negociaciones` (`idNegociacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_com_per` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_com_us` FOREIGN KEY (`idUsuarioc`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Correos`
--
ALTER TABLE `Correos`
  ADD CONSTRAINT `FK_corr_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_corr_pers` FOREIGN KEY (`idPersona`) REFERENCES `Telefonos` (`idTelefono`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_corr_usu` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Direcciones`
--
ALTER TABLE `Direcciones`
  ADD CONSTRAINT `FK_dir_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`),
  ADD CONSTRAINT `FK_dir_pers` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_dir_usu` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Empresas`
--
ALTER TABLE `Empresas`
  ADD CONSTRAINT `FK_emp_Rep` FOREIGN KEY (`idRepresentante`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Negociaciones`
--
ALTER TABLE `Negociaciones`
  ADD CONSTRAINT `FK_ng_Emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ng_Per` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ng_cargo` FOREIGN KEY (`PersonaCargo`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ng_us` FOREIGN KEY (`CreadaPor`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Participantes_Tareas`
--
ALTER TABLE `Participantes_Tareas`
  ADD CONSTRAINT `FK_part_Pers` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_part_us` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD CONSTRAINT `FK_per_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_per_usuR` FOREIGN KEY (`idUsuarioRegistro`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD CONSTRAINT `FK_Tar_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Tar_ng` FOREIGN KEY (`idNegociacion`) REFERENCES `Negociaciones` (`idNegociacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Tar_pers` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Tar_us` FOREIGN KEY (`idUsuarioCrea`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Telefonos`
--
ALTER TABLE `Telefonos`
  ADD CONSTRAINT `FK_tel_emp` FOREIGN KEY (`idEmpresa`) REFERENCES `Empresas` (`idEmpresa`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tel_per` FOREIGN KEY (`idPersona`) REFERENCES `Personas` (`idPersona`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tel_usu` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
