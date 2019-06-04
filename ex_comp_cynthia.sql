-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.13-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ex_traordinario_gilberto
CREATE DATABASE IF NOT EXISTS `ex_traordinario_gilberto` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `ex_traordinario_gilberto`;

-- Volcando estructura para tabla ex_traordinario_gilberto.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.categorias: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`IdCategoria`, `Descripcion`, `Estado`) VALUES
	(1, 'Jugos de Frutas', 0),
	(2, 'Leches Enlatado', 0),
	(3, 'GaseosasYYY', 1),
	(4, 'Todas las Marcas', 1),
	(5, 'asdssd', 1),
	(6, 'esto es una prueba modificada', 0),
	(7, 'pomele', 1),
	(8, '45trhdr', 1),
	(9, 'ttrtr', 1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `IdCliente` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocial` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NroDocumento` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Direccion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Telefono` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.clientes: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`IdCliente`, `RazonSocial`, `NroDocumento`, `Direccion`, `Telefono`, `Estado`) VALUES
	(1, 'ALEXIS2', '021222', '2R ITAUGUA', '54455', 0),
	(2, 'Aldo Moreno', '096885', 'AV Caceres 43000', '4987545', 1),
	(3, 'Jorge ffff', '4444', 'itaugua', '552', 1),
	(4, 'ghdgfh', '654546546', 'sgdfgdg', '51112', 0),
	(5, 'dfg', 'dfg', 'ghfy5', '43535', 0),
	(6, 'fghgh', 'fgh', 'fhghg', 'gfh', 0);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `IdCompra` int(11) NOT NULL AUTO_INCREMENT,
  `ProveedorId` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `SerieComprobante` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NroComprobante` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `TotalCompra` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `UsuarioId` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `igv` int(11) DEFAULT NULL,
  `Subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCompra`),
  KEY `fk_tipo_comprobante_compra_idx` (`UsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`IdCompra`, `ProveedorId`, `tipo`, `SerieComprobante`, `NroComprobante`, `TotalCompra`, `UsuarioId`, `Estado`, `Fecha`, `descuento`, `igv`, `Subtotal`) VALUES
	(28, 20190410, 55000, '0.00', '0.00', '55000.00', 1, NULL, NULL, NULL, NULL, NULL),
	(29, 1, 1, '100000', NULL, '25000.00', 8, NULL, NULL, 0, 0, 25000),
	(30, 1, 1, '100000', NULL, '10000.00', 8, NULL, NULL, 0, 0, 10000);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.detalle_compras
CREATE TABLE IF NOT EXISTS `detalle_compras` (
  `IdDetalleCompra` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` int(11) NOT NULL DEFAULT '0',
  `CompraId` int(11) DEFAULT NULL,
  `ProductoId` int(11) DEFAULT NULL,
  `Cantidad` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PrecioUnitario` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Importe` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`IdDetalleCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.detalle_compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` (`IdDetalleCompra`, `Nombre`, `CompraId`, `ProductoId`, `Cantidad`, `PrecioUnitario`, `Importe`, `Estado`) VALUES
	(1, 0, 3, 28, '5500', '10', '55000.00', NULL),
	(2, 0, 29, 0, '5', '5000', '25000.00', NULL),
	(3, 0, 30, 0, '2', '5000', '10000.00', NULL);
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `IdDetalleVenta` int(11) NOT NULL AUTO_INCREMENT,
  `VentaId` int(11) DEFAULT NULL,
  `ProductoId` int(11) DEFAULT NULL,
  `Cantidad` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PrecioUnitario` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Importe` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`IdDetalleVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.detalle_ventas: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` (`IdDetalleVenta`, `VentaId`, `ProductoId`, `Cantidad`, `PrecioUnitario`, `Importe`) VALUES
	(10, 3, 8, '6.50', '5', '32.50'),
	(11, 1, 8, '3.50', '3', '10.50'),
	(12, 2, 8, '3.00', '2', '6.00'),
	(13, 1, 9, '3.50', '10', '35.00'),
	(14, 3, 14, '5.50', '2', '11.00'),
	(15, 3, 15, '5500', '1', '5500'),
	(16, 3, 16, '5500', '3', '16500.00'),
	(17, 1, 17, '5000', '3', '15000.00'),
	(18, 4, 18, '250000', '10', '2500000.00'),
	(19, 2, 19, '3.000', '5', '15.00'),
	(20, 2, 20, '3.000', '5', '15.00'),
	(21, 2, 22, '3000', '1', '3000'),
	(22, 1, 23, '5000', '1', '5000'),
	(23, 1, 24, '5000', '1', '5000'),
	(24, 1, 25, '5000', '1', '5000'),
	(25, 3, 26, '5500', '12', '66000.00'),
	(26, 3, 27, '5500', '3', '16500.00'),
	(27, 46, 0, '5', '5000', '25000.00');
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.marcas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `marca`, `estado`) VALUES
	(1, 'tokio', 1);
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `link` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.menus: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `nombre`, `link`) VALUES
	(1, 'Inicio', 'Dashboard'),
	(2, 'Categorias', 'mantenimiento/Categorias'),
	(3, 'Clientes', 'mantenimiento/clientes'),
	(4, 'Productos', 'mantenimiento/productos'),
	(5, 'Ventas', 'movimientos/ventas'),
	(6, 'Ventas', 'reportes/ventas'),
	(7, 'Usuarios', 'administrador/usuarios'),
	(8, 'Permisos', 'administrador/permisos'),
	(9, 'Marcas', 'mantenimiento/marcas'),
	(10, 'Proveedores', 'mantenimiento/proveedores'),
	(11, 'Compras', 'movimientos/compras');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_idx` (`menu_id`),
  KEY `fk_rol_idx` (`rol_id`),
  CONSTRAINT `fk_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='			';

-- Volcando datos para la tabla ex_traordinario_gilberto.permisos: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
	(1, 1, 1, 1, 1, 1, 1),
	(2, 2, 1, 1, 1, 1, 1),
	(7, 3, 1, 1, 1, 1, 1),
	(8, 4, 1, 1, 1, 1, 1),
	(9, 5, 1, 1, 1, 1, 1),
	(10, 6, 1, 1, 1, 1, 1),
	(11, 7, 1, 1, 1, 1, 1),
	(12, 8, 1, 1, 1, 1, 1),
	(13, 9, 1, 1, 1, 1, 1),
	(14, 10, 1, 1, 1, 1, 1),
	(15, 11, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `IdCategoria` int(11) DEFAULT NULL,
  `CodBarra` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Detalle` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PrecioCompra` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `PrecioVenta` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Stock` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `StockMinimo` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.productos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`IdProducto`, `IdCategoria`, `CodBarra`, `Detalle`, `PrecioCompra`, `PrecioVenta`, `Stock`, `StockMinimo`, `Estado`) VALUES
	(1, 10001, 'Leche Gloria 400g', 'Leche enlatado', '5000', '', '', '', 0),
	(2, NULL, 'Jugos de Naranja', 'Todos los Jugos', '30007777', NULL, '50', '20', 1),
	(3, 10003, 'CocaCola 2.5l', 'Coca Cola no retornable', '5500', NULL, NULL, NULL, 1),
	(4, 1004, 'Nokia', 'Nokia Lumia', '250000', NULL, NULL, NULL, 1),
	(5, NULL, 'emmpanada', 'sda', 'ads', NULL, '12', '344', 1),
	(6, NULL, 'df', 'ds', 'sd', 'ds', 'ds', 'sd', 0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `IdProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocial` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NroDocumento` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Direccion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Telefono` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.proveedores: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`IdProveedor`, `RazonSocial`, `NroDocumento`, `Direccion`, `Telefono`, `Estado`) VALUES
	(1, 'prove', 'justo', 'dir', 'dir', 1),
	(2, 'loro', '345', 'direeee', '23424243', 1),
	(3, 'cabezon', '23423', 'sdassdasda', '2313123', 1);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Superadmin', 'empleado'),
	(2, 'Admin', 'Empleado');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.tipo_cliente
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.tipo_cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Empresa', 'informatica'),
	(2, 'Publico General', 'toods');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.tipo_comprobantes
CREATE TABLE IF NOT EXISTS `tipo_comprobantes` (
  `IdTipoComprobante` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `UltimoNro` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `igv` int(11) DEFAULT NULL,
  `SerieComprobante` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdTipoComprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.tipo_comprobantes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_comprobantes` DISABLE KEYS */;
INSERT INTO `tipo_comprobantes` (`IdTipoComprobante`, `Descripcion`, `Estado`, `UltimoNro`, `Cantidad`, `igv`, `SerieComprobante`) VALUES
	(1, 'Factura', 1, 10, 3, 5, NULL),
	(2, 'Boleto', 1, 0, NULL, 10, NULL);
/*!40000 ALTER TABLE `tipo_comprobantes` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.tipo_documento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` (`id`, `nombre`, `cantidad`) VALUES
	(1, 'Cedula', 1),
	(2, 'RUC', 2);
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `username` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_rol_usuarios_idx` (`rol_id`),
  CONSTRAINT `fk_rol_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.usuarios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `username`, `password`, `rol_id`, `estado`) VALUES
	(3, 'Alexis', 'fretes fure', '0971516217', NULL, 'alex', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1),
	(4, 'Gilberto', 'Cabañas', '0982503608', 'werf', 'gilbert_cab', ' a2af3fae9473afb37e972f1e8454f7e428ca8d8c', 1, 1),
	(5, 'olimpero', 'fretez', '4555', 'jsajajad', 'olimpero', '123456', 1, 0),
	(6, 'alexi', 'fretez', '55555', 'wwrer', 'aldo', '12345', 2, 0),
	(7, 'juan Alberto', 'Rojas', '44524', 'sdsds', 'alberto', '1234', 1, 0),
	(8, 'olim', 'fretez', '096885', 'kdkdkd', 'olimpia', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla ex_traordinario_gilberto.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `ClienteId` int(11) DEFAULT NULL,
  `TipoComprobanteId` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `SerieComprobante` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `NroComprobante` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `TotalVenta` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `igv` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla ex_traordinario_gilberto.ventas: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`IdVenta`, `ClienteId`, `TipoComprobanteId`, `Fecha`, `SerieComprobante`, `NroComprobante`, `TotalVenta`, `IdUsuario`, `Estado`, `igv`, `subtotal`, `descuento`) VALUES
	(8, 20181027, 49, NULL, '0.00', '0.00', '49.00', 2, 1, NULL, NULL, NULL),
	(9, 20181020, 35, NULL, '0.00', '0.00', '35.00', 2, 1, NULL, NULL, NULL),
	(14, 20181027, 11, NULL, '0.00', '0.00', '11.00', 2, 1, NULL, NULL, NULL),
	(15, 20181027, 5500, NULL, '0.00', '0.00', '5500.00', 2, 1, NULL, NULL, NULL),
	(16, 20181027, 16500, NULL, '1650.00', '0.00', '18150.00', 1, 1, NULL, NULL, NULL),
	(17, 20181029, 5000, NULL, '0.00', '0.00', '5000.00', 2, 1, NULL, NULL, NULL),
	(18, 20181029, 2500000, NULL, '250000.00', '0.00', '2750000.00', 1, 1, NULL, NULL, NULL),
	(19, 20181031, 15, NULL, '1.50', '0.00', '16.50', 1, 1, NULL, NULL, NULL),
	(20, 20181103, 15, NULL, '0.00', '0.00', '15.00', 2, 1, NULL, NULL, NULL),
	(22, 20181113, 3000, NULL, '300.00', '0.00', '3300.00', 1, 1, NULL, NULL, NULL),
	(23, 20190403, 5000, NULL, '0.00', '0.00', '5000.00', 2, 1, NULL, NULL, NULL),
	(24, 20190403, 5000, NULL, '500.00', '0.00', '5500.00', 1, 1, NULL, NULL, NULL),
	(25, 20190403, 5000, NULL, '500.00', '0.00', '5500.00', 1, 1, NULL, NULL, NULL),
	(26, 20190408, 66000, NULL, '6600.00', '0.00', '72600.00', 1, 1, NULL, NULL, NULL),
	(27, 20190408, 16500, NULL, '1650.00', '0.00', '18150.00', 1, NULL, NULL, NULL, NULL),
	(28, 2, 2, '2019-05-28', NULL, NULL, NULL, 8, NULL, 4000, 40000, 0),
	(29, 0, 0, '2019-05-28', NULL, NULL, NULL, 8, NULL, 4000, 40000, 0),
	(30, 0, 0, '2019-05-28', NULL, NULL, NULL, 8, NULL, 4000, 40000, 0),
	(31, 0, 0, '2019-05-28', NULL, NULL, NULL, 8, NULL, 0, 16000, 0),
	(32, 0, 0, '2019-05-28', NULL, NULL, NULL, 8, NULL, 0, 16000, 0),
	(33, 0, NULL, '2019-05-28', NULL, NULL, '', 8, NULL, 14144, 282875, 0),
	(34, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(35, 0, NULL, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(36, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(37, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(38, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(39, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(40, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(41, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(42, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(43, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(44, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(ventas_ci245, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0),
	(46, 0, 1, '2019-05-28', NULL, NULL, NULL, 8, NULL, 1250, 25000, 0);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
