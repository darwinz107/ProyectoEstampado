-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 12:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(30) NOT NULL,
  `cat_descripcion` varchar(100) NOT NULL,
  `cat_estado` int(1) NOT NULL,
  `cat_usuarioActualizacion` varchar(12) NOT NULL,
  `cat_fechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_estado`, `cat_usuarioActualizacion`, `cat_fechaActualizacion`) VALUES
(2, 'Accesorios', 'Gorras, mascarillas, guantes,llaveros', 1, 'usuario', '2023-08-12 07:56:07'),
(3, 'Ropa', 'Camisas deportivas, Camistes, shorts deportivos', 1, 'usuario', '2023-08-12 07:56:11'),
(10, 'Casa', 'Tazas, copas, etc..', 1, 'usuario', '2023-08-12 07:58:53'),
(11, 'Publicidad', 'Pancartas, vallas publicitarias, volantes ', 1, 'usuario', '2023-08-12 07:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Fecha_Registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`idCliente`, `Nombres`, `Apellidos`, `Genero`, `Telefono`, `Email`, `Fecha_Registro`) VALUES
(2, 'Jose Andres', 'Castro Zambrano', 'masculino', '0909812245', 'Joseandres@gmail.com', '2023-08-12'),
(3, 'Maria Mercedes', 'Castillo Vera', 'femenino', '0909833101', 'mariamerce@gmail.com', '2023-08-12'),
(4, 'Sara Cecilia', 'Espinoza Serrano', 'femenino', '0909101241', 'saraceci@gmail.com', '2023-08-13'),
(5, 'Cesar Andres', 'Mejia Suarez', 'masculino', '0909121234', 'cesarandre@gmail.com', '2023-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(20) DEFAULT NULL,
  `descripcion_pedido` text NOT NULL,
  `tipo_producto` varchar(20) NOT NULL,
  `cantidad` text NOT NULL,
  `detalles_especiales` varchar(20) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `tipo_material` varchar(100) DEFAULT NULL,
  `disponibilidad` int(11) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_actualizacion` varchar(100) DEFAULT NULL,
  `caracteristica_destacada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `id_categoria`, `tipo_material`, `disponibilidad`, `fecha_actualizacion`, `usuario_actualizacion`, `caracteristica_destacada`) VALUES
(1, 'Bufanda', 'Bufanda suave y elegante con dise&ntilde;o sublimado', 25.99, 3, 'Estampado', 1, '2023-08-13 04:13:26', 'usuario', 'Varios colores disponibles'),
(2, 'Camiseta', 'Camiseta de algod&oacute;n con estampado &uacute;nico', 18.5, 3, 'Estampado', 1, '2023-08-13 04:53:32', 'usuario', 'Dise&ntilde;o moderno y c&oacute;modo'),
(3, 'Coj&iacute;n', 'Coj&iacute;n decorativo con sublimado personalizado', 14.75, 10, 'Sublimado', 1, '2023-08-13 03:45:17', 'usuario', 'A&ntilde;ade estilo a tu hogar'),
(4, 'Banner', 'Banner impreso para promociones y eventos', 65.99, 11, 'Sublimado', 1, '2023-08-12 19:00:57', 'admin', 'Llamativo y de alta calidad'),
(7, 'Almohada', 'La almohada sublimada es tu compa&ntilde;era ideal en tus aventuras', 24, 2, 'Sublimado', 1, '2023-08-13 04:27:04', 'usuario', 'Tu confort en movimiento');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `prov_id` int(11) NOT NULL,
  `prov_nombre` varchar(100) DEFAULT NULL,
  `prov_telefono` int(10) DEFAULT NULL,
  `prov_direccion` varchar(100) DEFAULT NULL,
  `prov_precio` double DEFAULT NULL,
  `prov_plazo_entrega` varchar(20) DEFAULT NULL,
  `prov_material` varchar(100) DEFAULT NULL,
  `prov_mpago` varchar(30) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_actualizacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`prov_id`, `prov_nombre`, `prov_telefono`, `prov_direccion`, `prov_precio`, `prov_plazo_entrega`, `prov_material`, `prov_mpago`, `fecha_actualizacion`, `usuario_actualizacion`) VALUES
(1, 'Importadora_UGff', 5435, 'Mi casas', 30, '1 - 15 Dias', 'Camisa Llana Blanca', 'Paypal', '2023-08-14 02:29:45', 'usuario'),
(12, 'Palta Paltina', 945243165, 'LA LUNA', 20, '15 - 30 Dias', 'Gorras planas', 'Tarjeta de Credito', '0000-00-00 00:00:00', '2023-08-14 02:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios1`
--

CREATE TABLE `usuarios1` (
  `IdUser` int(4) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios1`
--

INSERT INTO `usuarios1` (`IdUser`, `Usuario`, `Contraseña`, `Rol`) VALUES
(1, 'LuisGutierrez', '67890', 'Gerente'),
(2, 'KleidyCalderon', '12345', 'Administrador'),
(3, 'DarwinZambrano', '12453', 'Cliente'),
(4, 'MaikelMeza', '67812', 'Cliente'),
(5, 'Maria', '12367', 'Vendedor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `nombre_producto` (`nombre_producto`) USING BTREE;

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `usuarios1`
--
ALTER TABLE `usuarios1`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios1`
--
ALTER TABLE `usuarios1`
  MODIFY `IdUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
