-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2022 a las 01:23:40
-- Versión del servidor: 10.8.3-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finanzauto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_empresa`
--

CREATE TABLE `areas_empresa` (
  `id_area_empresa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas_empresa`
--

INSERT INTO `areas_empresa` (`id_area_empresa`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Administrador'),
(2, 'Verificación', 'Verificación'),
(3, 'Desembolsos', 'Desembolsos'),
(4, 'Asesor', 'Asesor'),
(5, 'Pagos', 'Pagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `correo`, `estado_civil`, `status`) VALUES
(1, 10180190, 'Solangee', 'Sarmiento', 2147483647, 'Calle 69 c #70 a 79 ', 'sol.sol@gmail.com', 'Soltera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concesionarios`
--

CREATE TABLE `concesionarios` (
  `id_concesionario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concesionarios`
--

INSERT INTO `concesionarios` (`id_concesionario`, `nombre`, `direccion`, `telefono`, `status`) VALUES
(1, 'KIA Av 685', 'Av 68', 66765433, 1),
(2, 'Renault CasaToro', 'Av Americas 50 - 50 ', 7589923, 1),
(3, 'Continautos', 'Calle 95 a 27', 7642345, 1),
(4, 'Usados ', 'Av 68 - cll 80 ', 6785432, 1),
(5, 'YAMAHA Motor ', 'Av Boyaca - Cll 68', 5680472, 1),
(6, 'Morato', 'Calle 100 a 95', 24578906, 1),
(7, 'MotorShow', 'Calle 153 a 27', 3458791, 1),
(8, 'Calle 127', 'Calle 127 ', 2347956, 1),
(9, 'Ferrari ', 'Calle 106 - cr 19', 4562387, 1),
(10, 'Gran Centro Automotriz La Sevillana', 'Cra. 60F #45ª -08', 2534765, 1),
(11, 'Av Boyaca', 'Av Boyaca - Cll 68', 4578352, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desembolsos`
--

CREATE TABLE `desembolsos` (
  `id_desembolso` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `solicitud_credito_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `area_empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `username`, `password`, `status`, `area_empresa_id`) VALUES
(2, 1234567890, 'Administrador', 'Principal', 3000000000, 'Av Boyaca - Cll 68', 'admin@admin.com', 'admin', '$2y$10$cnaJHBUAdc9RpY27qFJBFOyEkAJiCOw0xd3yj7hGr2OzlEG05ZbWm', 1, 1),
(4, 1115645, 'Asesor', 'Z', 78768, 'jhgjkhg', 'fdhgds@fdsfd.com', 'asesor', '$2y$10$FgdaRV/ahasIIaMz5UYTduBxKq6hA1YTtuWUTxgr48OJBqgve9s.O', 1, 4),
(5, 65474, 'Verificación', 'V', 876867, 'kjhkh', 'fdhgds@fdsfd.com', 'verificacion', '$2y$10$MKBb/aSZiKYh7.cGqyylCuyFKwwoAMYijcBQvoboWA0qycxQUc7ua', 1, 2),
(6, 76578658, 'Desembolso', 'D', 876867, 'khjkjhk', 'jkjhk@fdsfgs.com', 'desembolsos', '$2y$10$QJsofAIV0ecKaKbMTIumreeOz4Yb5wYwMw3XFP7D/qJkN/lHALMIC', 1, 3),
(7, 65476457, 'Pagos', 'M', 6754765, 'gjhgfj', 'fdhgds@fdsfd.com', 'pagos', '$2y$10$ezuiukfXZHRfj3CZdcK66uuU.80QCXn8q1FiLd1mjzNpmxLoiLGzy', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `descripcion`) VALUES
(1, 'KIA', 'KIA Vehículos'),
(2, 'MAZDA', 'MAZDA Vehículos'),
(3, 'FORD', 'FORD Vehículos'),
(4, 'Aston Martin', 'Aston Martin Vehículos'),
(5, 'AUDI', 'AUDI Vehículos'),
(6, 'BMW', 'BMW Vehículos'),
(7, 'Chevrolet', 'Chevrolet Vehículos'),
(8, 'Citroen', 'Citroen Vehículos'),
(9, 'FIAT ', 'FIAT Vehículos'),
(10, 'Honda ', 'Honda Vehículos'),
(11, 'JEEP', 'JEEP Vehículos'),
(12, 'LAND ROVER', 'LAND ROVER Vehículos'),
(13, 'Mercedes-Benz', 'Mercedes-Benz Vehículos'),
(14, 'Mitsubishi', 'Mitsubishi Vehículos'),
(15, 'Nissan', 'Nissan Vehículos'),
(16, 'Peugeot	', 'Peugeot Vehículos'),
(17, 'Porsche	', 'Porsche Vehículos'),
(18, 'Renault ', 'Renault Vehículos'),
(19, 'Skoda ', 'Skoda Vehículos'),
(20, 'SsangYong', 'SsangYong Vehículos'),
(21, 'Subaru ', 'Subaru Vehículos'),
(22, 'Suzuki', 'Suzuki Vehículos'),
(23, 'Toyota', 'Toyota Vehículos '),
(24, 'JMC', 'JMC Vehículos'),
(25, 'Changan ', 'Changan Vehículos'),
(26, 'YAMAHA', 'YAMAHA MOTOR '),
(27, 'AKT', 'AKT MOTOR'),
(28, 'KAWASAKI', 'KAWASAKI MOTOR'),
(29, 'FOTON', 'FOTON Vehículos'),
(30, 'JAC', 'JAC Vehículos'),
(31, 'FAW', 'FAW Vehículos'),
(32, 'DFSK', 'DFSK Vehículos'),
(33, 'Ferrari ', 'Ferrari Vehículos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_creditos`
--

CREATE TABLE `pagos_creditos` (
  `id_pago_credito` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `solicitud_credito_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_creditos`
--

INSERT INTO `pagos_creditos` (`id_pago_credito`, `valor`, `fecha`, `solicitud_credito_id`) VALUES
(11, 35000, '2022-06-25 16:59:38', 27),
(12, 55000, '2022-06-25 17:00:06', 27),
(13, 10000, '2022-06-25 20:21:02', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_creditos`
--

CREATE TABLE `solicitudes_creditos` (
  `id_solicitud_credito` int(11) NOT NULL,
  `referencia_personal_1` varchar(50) NOT NULL,
  `referencia_personal_2` varchar(50) NOT NULL,
  `referencia_familiar_1` varchar(50) NOT NULL,
  `referencia_familiar_2` varchar(50) NOT NULL,
  `valor` bigint(20) NOT NULL,
  `valor_restante` bigint(20) NOT NULL,
  `cantidad_vehiculos` int(11) NOT NULL,
  `cuotas` int(11) NOT NULL,
  `cuotas_restantes` int(11) NOT NULL,
  `fecha_apertura` datetime DEFAULT NULL,
  `fecha_cancelacion` datetime DEFAULT NULL,
  `empleado_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `vehiculo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes_creditos`
--

INSERT INTO `solicitudes_creditos` (`id_solicitud_credito`, `referencia_personal_1`, `referencia_personal_2`, `referencia_familiar_1`, `referencia_familiar_2`, `valor`, `valor_restante`, `cantidad_vehiculos`, `cuotas`, `cuotas_restantes`, `fecha_apertura`, `fecha_cancelacion`, `empleado_id`, `cliente_id`, `vehiculo_id`) VALUES
(27, 'gfdhfdg', 'jnfhgjfdghj', 'hgfhfg', 'hfghfghf', 500000, 400000, 1, 10, 10, '2022-06-24 21:37:44', NULL, 2, 1, 3),
(28, 'nvbj,kmgvjh', ',nb,bvn', ',mnb,mn', ',mn,nmb,nb', 9978, 9978, 98, 9879, 9879, '2022-06-25 18:28:50', NULL, 2, 1, 2),
(29, 'gfdhfdg', 'jnfhgjfdghj', 'hgfhfg', 'hfghfghf', 534543, 534543, 65, 6, 6, '2022-06-25 18:40:04', NULL, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `nombre`, `descripcion`) VALUES
(1, 'Carro', 'Carro '),
(2, 'Camioneta 4x4', 'Camioneta 4x4'),
(3, 'Camioneta', 'Camioneta'),
(4, 'Camión', 'Camión'),
(5, 'Moto', 'Moto '),
(6, 'Camión Carga Liviana', 'Camión Carga Liviana'),
(7, 'Camión Carga Pesada', 'Camión Carga Pesada'),
(8, 'Bus ', 'Bus'),
(9, 'Todoterreno', 'Todoterreno'),
(10, 'Deportivo', 'Deportivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `concesionario_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `nombre`, `precio`, `concesionario_id`, `marca_id`, `tipo_id`) VALUES
(2, 'Nissan Qashqai', 140000000, 4, 15, 3),
(3, 'Suziki GSX-R150', 12100000, 11, 22, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `id_verificacion` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `solicitud_credito_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `verificaciones`
--

INSERT INTO `verificaciones` (`id_verificacion`, `descripcion`, `fecha`, `status`, `solicitud_credito_id`, `empleado_id`) VALUES
(2, 'fdgfdgfdh', '2022-06-25 20:19:56', 0, 27, 2),
(3, '', '2022-06-25 18:28:50', 0, 28, 2),
(4, '', '2022-06-25 18:40:04', 0, 29, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas_empresa`
--
ALTER TABLE `areas_empresa`
  ADD PRIMARY KEY (`id_area_empresa`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `concesionarios`
--
ALTER TABLE `concesionarios`
  ADD PRIMARY KEY (`id_concesionario`);

--
-- Indices de la tabla `desembolsos`
--
ALTER TABLE `desembolsos`
  ADD PRIMARY KEY (`id_desembolso`),
  ADD KEY `solicitud_credito_id` (`solicitud_credito_id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `area_empresa_id` (`area_empresa_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `pagos_creditos`
--
ALTER TABLE `pagos_creditos`
  ADD PRIMARY KEY (`id_pago_credito`),
  ADD KEY `solicitud_credito_id` (`solicitud_credito_id`);

--
-- Indices de la tabla `solicitudes_creditos`
--
ALTER TABLE `solicitudes_creditos`
  ADD PRIMARY KEY (`id_solicitud_credito`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `vehiculo_id` (`vehiculo_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `concesionario_id` (`concesionario_id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`id_verificacion`),
  ADD KEY `solicitud_credito_id` (`solicitud_credito_id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas_empresa`
--
ALTER TABLE `areas_empresa`
  MODIFY `id_area_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `concesionarios`
--
ALTER TABLE `concesionarios`
  MODIFY `id_concesionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `desembolsos`
--
ALTER TABLE `desembolsos`
  MODIFY `id_desembolso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pagos_creditos`
--
ALTER TABLE `pagos_creditos`
  MODIFY `id_pago_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `solicitudes_creditos`
--
ALTER TABLE `solicitudes_creditos`
  MODIFY `id_solicitud_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `id_verificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `desembolsos`
--
ALTER TABLE `desembolsos`
  ADD CONSTRAINT `desembolsos_ibfk_1` FOREIGN KEY (`solicitud_credito_id`) REFERENCES `solicitudes_creditos` (`id_solicitud_credito`),
  ADD CONSTRAINT `desembolsos_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`area_empresa_id`) REFERENCES `areas_empresa` (`id_area_empresa`);

--
-- Filtros para la tabla `pagos_creditos`
--
ALTER TABLE `pagos_creditos`
  ADD CONSTRAINT `pagos_creditos_ibfk_1` FOREIGN KEY (`solicitud_credito_id`) REFERENCES `solicitudes_creditos` (`id_solicitud_credito`);

--
-- Filtros para la tabla `solicitudes_creditos`
--
ALTER TABLE `solicitudes_creditos`
  ADD CONSTRAINT `solicitudes_creditos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `solicitudes_creditos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `solicitudes_creditos_ibfk_3` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id_vehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`concesionario_id`) REFERENCES `concesionarios` (`id_concesionario`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id_tipo`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`solicitud_credito_id`) REFERENCES `solicitudes_creditos` (`id_solicitud_credito`),
  ADD CONSTRAINT `verificaciones_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
