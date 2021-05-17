-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2021 a las 19:08:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dinmvaz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosempresa`
--

CREATE TABLE `datosempresa` (
  `IDempresa` int(11) NOT NULL,
  `nombre_e` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefono_e` varchar(10) NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ubicacion` varchar(256) CHARACTER SET utf8 NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosempresa`
--

INSERT INTO `datosempresa` (`IDempresa`, `nombre_e`, `telefono_e`, `correo`, `ubicacion`, `estatus`) VALUES
(1, 'empresa', '8445678976', 'ejemplo@ejemplo.com', 'ubicacion', b'1'),
(2, 'ejemplo', '8441233232', 'Prueba@Prueba.com', 'ubicacion', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosgenerales`
--

CREATE TABLE `datosgenerales` (
  `IDusuario` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosgenerales`
--

INSERT INTO `datosgenerales` (`IDusuario`, `nombre`, `telefono`, `correo`, `direccion`) VALUES
(1, 'Juan Francisco Vázquez Rodríguez', '8443480479', 'dinmvaz@dinmvaz.com', 'aquiva la direcion'),
(2, 'Administrador', '8443455453', 'administrador@dinmvaz.com', 'direccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleherramienta`
--

CREATE TABLE `detalleherramienta` (
  `IDherramienta` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `serial` varchar(50) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(256) CHARACTER SET utf8 NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `IDpieza` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`IDpieza`, `fecha`, `nombre`, `precio`, `estatus`) VALUES
(1, '2020-10-19', 'Pieza 1', '120.50', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamosherramienta`
--

CREATE TABLE `prestamosherramienta` (
  `IDprestamo` int(11) NOT NULL,
  `IDherramienta` int(11) NOT NULL,
  `IDubicacion` int(11) NOT NULL,
  `responsable` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `IDproceso` int(11) NOT NULL,
  `IDsp` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `IDpuesto` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`IDpuesto`, `nombre`) VALUES
(1, 'King'),
(2, 'Administrador'),
(3, 'Empleado'),
(4, 'Almacenista ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `IDsolicitud` int(11) NOT NULL,
  `IDempresa` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `fecha_c` int(11) NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudpiezas`
--

CREATE TABLE `solicitudpiezas` (
  `IDsp` int(11) NOT NULL,
  `IDsolicitud` int(11) NOT NULL,
  `IDpieza` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `nocompra` varchar(25) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_a` date NOT NULL,
  `estatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `IDubicacion` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(256) CHARACTER SET utf8 NOT NULL,
  `img` varchar(256) CHARACTER SET utf8 NOT NULL,
  `estatus` bit(1) NOT NULL,
  `IDpuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `email`, `pass`, `img`, `estatus`, `IDpuesto`) VALUES
(1, 'dinmvaz@dinmvaz.com', '123', '', b'1', 1),
(2, 'administrador@dinmvaz.com', '123', '', b'1', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datosempresa`
--
ALTER TABLE `datosempresa`
  ADD PRIMARY KEY (`IDempresa`);

--
-- Indices de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  ADD PRIMARY KEY (`IDusuario`);

--
-- Indices de la tabla `detalleherramienta`
--
ALTER TABLE `detalleherramienta`
  ADD PRIMARY KEY (`IDherramienta`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`IDpieza`);

--
-- Indices de la tabla `prestamosherramienta`
--
ALTER TABLE `prestamosherramienta`
  ADD PRIMARY KEY (`IDprestamo`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`IDproceso`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`IDpuesto`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`IDsolicitud`);

--
-- Indices de la tabla `solicitudpiezas`
--
ALTER TABLE `solicitudpiezas`
  ADD PRIMARY KEY (`IDsp`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`IDubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datosempresa`
--
ALTER TABLE `datosempresa`
  MODIFY `IDempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalleherramienta`
--
ALTER TABLE `detalleherramienta`
  MODIFY `IDherramienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `IDpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamosherramienta`
--
ALTER TABLE `prestamosherramienta`
  MODIFY `IDprestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `IDproceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `IDpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudpiezas`
--
ALTER TABLE `solicitudpiezas`
  MODIFY `IDsp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `IDubicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
