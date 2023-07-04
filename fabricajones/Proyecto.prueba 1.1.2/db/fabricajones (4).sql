-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2023 a las 17:38:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fabricajones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `fecha_nacimiento`) VALUES
(1, 'angel', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-06'),
(2, 'pedro', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-20'),
(3, 'angel david ', 'baracaldo tarazona ', 'angel@gmail.com', '3229562443', '2023-06-14'),
(4, 'angel david ', 'baracaldo tarazona ', 'angel@gmail.com', '3229562443', '2023-06-14'),
(5, 'jorge enrique', 'baracaldo ', 'angel@gmail.com', '3229562443', '2023-07-05'),
(6, 'pedro', 'tarazona', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-14'),
(8, 'angel ', 'baraldo', 'angeldavidbaracaldo056@gmail.com', '/*', '2023-06-06'),
(11, 'angel ', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-09'),
(12, 'angel', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `fecha_nacimiento`) VALUES
(2, 'pedro', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-03'),
(3, 'angel', 'asdas', 'angeldavidbaracaldo056@gmail.comsadsa', '3204466445', '2023-06-04'),
(4, 'angel', 'asdas', 'angeldavidbaracaldo056@gmail.comsadsa', '3204466445', '2023-06-04'),
(5, 'angel', 'asdas', 'angeldavidbaracaldo056@gmail.comsadsa', '3204466445', '2023-06-04'),
(6, 'ANGEL', 'TARAZONA', 'angeldavidbaracaldo056@gmail.com', '3204466445', '2023-06-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_inventario`
--

CREATE TABLE `empleado_inventario` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado_inventario`
--

INSERT INTO `empleado_inventario` (`id`, `codigo`, `numero`, `cantidad`, `precio`, `marca`, `tipo_producto`) VALUES
(1, '1', 1202022, 20, 2000000.00, 'mario ', 'Electrónica'),
(3, '2', 2560, 2, 2000.00, 'mario ', 'Ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_venta`
--

CREATE TABLE `empleado_venta` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `impuestos` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `forma_pago` varchar(20) NOT NULL,
  `pedido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado_venta`
--

INSERT INTO `empleado_venta` (`id`, `numero`, `fecha`, `impuestos`, `total`, `forma_pago`, `pedido`) VALUES
(1, '1', '2023-06-13', 2020.00, 520200.00, 'efectivo', 'carros audi'),
(3, '2', '2023-06-08', 2.00, 99999999.99, 'transferencia', 'cajas '),
(4, '3', '2009-12-04', 20000.00, 40000.00, 'transferencia', 'cajas tipo 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epleado_proveedor`
--

CREATE TABLE `epleado_proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `epleado_proveedor`
--

INSERT INTO `epleado_proveedor` (`id`, `nombre`, `direccion`, `correo`, `telefono`) VALUES
(1, 'angel', 'sancarlos', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(2, 'daniela vega ', 'Estación de santa lucia ', 'angeldavidbaracaldo056@gmail.com', '3204466445');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `tipo_producto` varchar(50) NOT NULL,
  `compras` tinyint(1) DEFAULT NULL,
  `pedido` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `direccion`, `correo`, `telefono`) VALUES
(3, 'asasasa', 'calle43a sur ·12 a 55', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(4, 'nelly', 'calle43a sur ·12 a 55', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(5, 'angel', 'lomas', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(145, 'angel', 'dsadsad', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(1010, 'angel', 'dsadsad', 'angeldavidbaracaldo056@gmail.com', '3204466445'),
(511515, 'asasasa', 'dsadsad', 'angeldavidbaracaldo056@gmail.com', '3204466445');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'empleado'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_registrados`
--

CREATE TABLE `usuarios_registrados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_registrados`
--

INSERT INTO `usuarios_registrados` (`id`, `nombre`, `apellido`, `correo`, `contra`, `fecha_nacimiento`, `rol`) VALUES
(1, 'nelly', 'baracaldo', 'angeldavidbaracaldo056@gmail.comsadsa', '51123231', '0000-00-00', ''),
(2, 'angel', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '123456789', '2023-07-06', 'usuario'),
(3, 'asddsad', 'sadsadsadas', 'angeldavidbaracaldo056@gmail.com', '1026285866', '2023-07-07', 'empleado'),
(4, 'pedro', 'asdsadasd', 'angeldavidbaracaldo056@gmail.com', '987654321', '2023-07-07', 'admin'),
(5, 'nelly', 'dasadsads', 'angeldavidbaracaldo056@gmail.com', '1014479369', '2023-07-07', 'usuario'),
(6, 'nelly', 'dasadsads', 'angeldavidbaracaldo056@gmail.com', '1014479369', '2023-07-07', 'usuario'),
(7, 'david', 'baracaldo', 'angeldavidbaracaldo056@gmail.com', '147258369', '2023-07-18', 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_inventario`
--
ALTER TABLE `empleado_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_venta`
--
ALTER TABLE `empleado_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `epleado_proveedor`
--
ALTER TABLE `epleado_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuarios_registrados`
--
ALTER TABLE `usuarios_registrados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `empleado_inventario`
--
ALTER TABLE `empleado_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado_venta`
--
ALTER TABLE `empleado_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `epleado_proveedor`
--
ALTER TABLE `epleado_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4546;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511516;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_registrados`
--
ALTER TABLE `usuarios_registrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
