-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2022 a las 19:44:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `agendarHora`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `agendarHora` (IN `_nombre` VARCHAR(100), IN `_telefono` VARCHAR(25), IN `_tipoDispositivo` VARCHAR(25), IN `_oficina` VARCHAR(30), IN `_fecha` VARCHAR(20), IN `_hora` VARCHAR(20), IN `_tipoServicio` VARCHAR(50))   insert into agendahoras(nomCompleto, telefono, tipoDispositivo, oficina, fecha, hora, tipoServicio) values (_nombre, _telefono, _tipoDispositivo, _oficina, _fecha, _hora, _tipoServicio)$$

DROP PROCEDURE IF EXISTS `agendarHoraDiag`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `agendarHoraDiag` (`_nombre` VARCHAR(100), `_telefono` VARCHAR(25), `_tipoDispositivo` VARCHAR(25), `_oficina` VARCHAR(30), `_fecha` VARCHAR(20), `_hora` VARCHAR(20), `_tipoServicio` VARCHAR(50), `_descripcion` VARCHAR(200))   insert into agendahoras(nomCompleto, telefono, tipoDispositivo, oficina, fecha, hora, tipoServicio, descripcion) values (_nombre, _telefono, _tipoDispositivo, _oficina, _fecha, _hora, _tipoServicio, _descripcion)$$

DROP PROCEDURE IF EXISTS `aniadirMsj`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aniadirMsj` (IN `_nombre` VARCHAR(100), IN `_email` VARCHAR(64), IN `_msj` VARCHAR(500))   INSERT into mensajes(nombreCompleto, email, mensaje) values(_nombre, _email, _msj)$$

DROP PROCEDURE IF EXISTS `aniadirVentaHard`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aniadirVentaHard` (`_nombre` VARCHAR(100), `_nomReceptor` VARCHAR(100), `_telefono` VARCHAR(25), `_email` VARCHAR(64), `_courier` VARCHAR(30), `_region` VARCHAR(50), `_ciudad` VARCHAR(50), `_direccion` VARCHAR(75), `_cupon` VARCHAR(20), `_medioPago` VARCHAR(50))   insert into ventaHardware(nombre, nombreReceptor, telefono, email, courier, region, ciudad, direccion, cupon, medioPago) values 
(_nombre, _nomReceptor, _telefono, _email, _courier, _region, _ciudad, _direccion, _cupon, _medioPago)$$

DROP PROCEDURE IF EXISTS `aniadirVentaSoft`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aniadirVentaSoft` (`_nombre` VARCHAR(100), `_telefono` VARCHAR(25), `_email` VARCHAR(64), `_cupon` VARCHAR(20), `_medioPago` VARCHAR(50))   insert into ventasoftware(nombre, telefono, email, cupon, medioPago) values (_nombre, _telefono, _email, _cupon, _medioPago)$$

DROP PROCEDURE IF EXISTS `obtenerUrl`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerUrl` (`_nombre` VARCHAR(20))   SELECT url from images where nombre = _nombre$$

DROP PROCEDURE IF EXISTS `verHoras`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verHoras` ()   SELECT * FROM agendahoras$$

DROP PROCEDURE IF EXISTS `verMensajes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verMensajes` ()   select * FROM mensajes$$

DROP PROCEDURE IF EXISTS `verVentaHard`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verVentaHard` ()   SELECT * from ventahardware$$

DROP PROCEDURE IF EXISTS `verVentaSoft`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verVentaSoft` ()   SELECT * from ventasoftware$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendahoras`
--

DROP TABLE IF EXISTS `agendahoras`;
CREATE TABLE `agendahoras` (
  `id` int(11) NOT NULL,
  `nomCompleto` varchar(100) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `tipoDispositivo` varchar(25) DEFAULT NULL,
  `oficina` varchar(30) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `tipoServicio` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agendahoras`
--

INSERT INTO `agendahoras` (`id`, `nomCompleto`, `telefono`, `tipoDispositivo`, `oficina`, `fecha`, `hora`, `tipoServicio`, `descripcion`) VALUES
(1, 'diego', '987378851', 'Desktop', 'Santiago Centro', '2022-05-18', '20:52', 'MantencionPc', NULL),
(2, 'hugo', '485948', 'Laptop', 'Valparaiso', '2022-05-31', '17:37', 'FormateoPc', NULL),
(3, 'mario', '784512', 'HDD', 'Valparaiso', '2022-05-24', '20:49', 'Formateo HDD-SSD', NULL),
(4, 'Carlos Villaroel', '987378851', 'Ventilador', 'Santiago Centro', '2022-05-25', '18:35', 'Reparación componente', NULL),
(5, 'diego', '9873788513', 'GPU', 'Valparaiso', '2022-05-11', '21:49', 'Reparación componente', NULL),
(6, 'Matias', '84951489', 'Placa madre', 'Santiago Centro', '2022-06-02', '22:49', 'Reparación componente', NULL),
(7, 'Paula', '7487915', 'Audífonos', 'Santiago Centro', '2022-05-27', '21:57', 'Reparación componente', NULL),
(8, 'Daniel', '7894651', 'Teclado', 'Santiago Centro', '2022-05-18', '12:56', 'Reparación componente', NULL),
(9, 'Maite', '876453', 'Laptop', 'Valparaiso', '2022-06-02', '13:22', 'Diagnóstico y reparación', 'Mi laptop no enciende'),
(10, 'Patricio Bustamante', '541326987', 'Desktop', 'Valparaiso', '2022-05-25', '17:15', 'Diagnóstico y reparación', 'Mi equipo no enciende'),
(11, 'Ivan Maldonado', '876453122', 'HDD', 'Valparaiso', '2022-05-25', '16:21', 'Formateo HDD-SSD', NULL),
(12, 'Renato', '635474564', 'Impresora', 'Santiago Centro', '2022-06-08', '17:22', 'Reparación periférico', NULL),
(13, 'Daniel Moyano', '79486519', 'Laptop', 'Santiago Centro', '2022-06-19', '16:22', 'MantencionPc', NULL),
(14, 'Xavier Lopez', '8456312', 'Laptop', 'Valparaiso', '2022-05-17', '18:57', 'FormateoPc', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `nombre` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`nombre`, `url`) VALUES
('acerAspire5', '\"images/acerAspire5.png\"'),
('mantPc_agendar', '\"images/agendar.png\"'),
('aorus3090ti', '\"images/aorus3090ti.png\"'),
('asus1650', '\"images/asus1650.png\"'),
('asusGt1030', '\"images/asusGt1030.png\"'),
('avast1anio', '\"images/avast1anio.png\"'),
('mantPc_avast', '\"images/avastLogo.png\"'),
('formateo_bsod', '\"images/Blue_Screen_of_Death.png\"'),
('mantPc_Pclento', '\"images/computadoraLenta.png\"'),
('footer_contacto', '\"images/contacto.png\"'),
('diag_pcEnfermo', '\"images/diagnosticoPc.png\"'),
('diag_PcReparar', '\"images/diagnosticoPc2.png\"'),
('index_diagnosticoYRe', '\"images/diagnosticoYReparacion.png\"'),
('evga3060ti', '\"images/evga3060ti.png\"'),
('index_formateoPC', '\"images/formateoPC.png\"'),
('gigabyteAero', '\"images/gigabyteAero.png\"'),
('rep_agendar2', '\"images/gpuIocno.png\"'),
('index_grafica', '\"images/grafica.png\"'),
('formateo_agendar2', '\"images/hddIcono.png\"'),
('hp240', '\"images/hp240.png\"'),
('hpOmen', '\"images/hpOmen.png\"'),
('i3-12100', '\"images/i3-12100.png\"'),
('i5-12600k', '\"images/i5-12600k.png\"'),
('i9-12900K', '\"images/i9-12900K.png\"'),
('ideaPadG3', '\"images/ideaPadG3.png\"'),
('index_laptop', '\"images/laptop.png\"'),
('formateo_agendar1', '\"images/laptopIcono.png\"'),
('lenovoLegion7', '\"images/lenovoLegion7.png\"'),
('logoTienda', '\"images/logoTienda.png\"'),
('macbookm1', '\"images/macbookm1.png\"'),
('matebook', '\"images/matebook.png\"'),
('mensaje', '\"images/mensaje.png\"'),
('msiModern14', '\"images/msiModern14.png\"'),
('msiRx6600xt', '\"images/msiRx6600xt.png\"'),
('officeCaja', '\"images/officeCaja.png\"'),
('index_optimizarPc', '\"images/optimizarPc.png\"'),
('index_procesador', '\"images/procesador.png\"'),
('r5-5600x', '\"images/r5-5600x.png\"'),
('r9-5900x', '\"images/r9-5900x.png\"'),
('index_reapararCompon', '\"images/reapararCompontente.png\"'),
('diag_seo', '\"images/seo.png\"'),
('index_software', '\"images/software.png\"'),
('rep_soldarPlaca', '\"images/solarPlaca.jpg\"'),
('rep_agendar3', '\"images/teclado.png\"'),
('threadRipper', '\"images/threadRipper.png\"'),
('rep_agendar1', '\"images/ventilador.png\"'),
('vivoBookOLED', '\"images/vivoBookOLED.png\"'),
('formateo_windows', '\"images/windows.png\"'),
('windows10Home', '\"images/windows10Home.png\"'),
('windows10Pro', '\"images/windows10Pro.png\"'),
('windows11home', '\"images/windows11home.png\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombreCompleto` varchar(100) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombreCompleto`, `email`, `mensaje`) VALUES
(1, 'Carlos Villaroel', 'cVillaroel993@gmaill.com', 'No me llega mi producto!!'),
(2, 'Hugo Montecasino', 'hugoberto230@outlook.cl', 'Cuales medios de pagos aceptan'),
(3, 'Carlos Villaroel', 'cVillaroel993@gmaill.com', 'Cuantas RX6600 tienen en stock'),
(4, 'Diego Olivares', 'diego@diego.com', 'Hola'),
(5, 'Carlos Montealba', 'montealbas123@gmail', 'Tengo problemas'),
(6, 'Armando Paredes', 'armando14243@gmail.com', 'Necesito repuestos'),
(7, 'Elizabeth Maldonado', 'elimaldonado4349@gmail.com', 'Saludos'),
(8, 'Beatriz Jopia', 'bjopoiao243@gmail.com', 'Cuando me devolveran mi pc'),
(9, 'Alejandra Santander', 'lilulita567@gmail.com', 'No se usar una computadora que compré');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventahardware`
--

DROP TABLE IF EXISTS `ventahardware`;
CREATE TABLE `ventahardware` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `nombreReceptor` varchar(100) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `courier` varchar(30) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `direccion` varchar(75) DEFAULT NULL,
  `cupon` varchar(20) DEFAULT NULL,
  `medioPago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventahardware`
--

INSERT INTO `ventahardware` (`id`, `nombre`, `nombreReceptor`, `telefono`, `email`, `courier`, `region`, `ciudad`, `direccion`, `cupon`, `medioPago`) VALUES
(1, 'Willian', 'William', '8465132', 'william345343745@gmail.com', 'Bluexpress', 'Antofagasta', 'Antofagasta', 'hola124', '', 'Servipag'),
(2, 'Carolina', 'Manuel', '7849569', 'ccfasg@gmail.com', 'Bluexpress', 'Metropolitana', 'Melipilla', 'Las rosas 42', '', 'Transferencia'),
(3, 'Guillermo ', 'Guillermo', '798456498', 'guillermo1234@hotmail.cl', 'Chilexpress', 'Los lagos', 'Puerto Montt', 'petunias 427', 'GDSAQGTRK', 'Webpay'),
(4, 'Pablo', 'Pablo', '85658411', 'pablo@gmail.com', 'Chilexpress', 'Ohiggins', 'Rancagua', 'los clarines 31', '', 'Webpay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasoftware`
--

DROP TABLE IF EXISTS `ventasoftware`;
CREATE TABLE `ventasoftware` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `cupon` varchar(20) DEFAULT NULL,
  `medioPago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventasoftware`
--

INSERT INTO `ventasoftware` (`id`, `nombre`, `telefono`, `email`, `cupon`, `medioPago`) VALUES
(1, 'Laura', '8974564', 'lalaura234@gmail.com', 'HQOLAXGKQAP', 'Webpay'),
(2, 'Beatriz Jopia', '9784653', 'bjopia4292@outlook.es', 'UTJRYETGWRHT', 'Servipag'),
(3, 'Manuel', '9854986642', 'Mmanuel24454@gmail.com', '', 'Webpay'),
(4, 'Augusto Pizarro', '854128744', 'apizarro243@gmail.com', 'TUKJYRTHGR', 'Webpay');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendahoras`
--
ALTER TABLE `agendahoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventahardware`
--
ALTER TABLE `ventahardware`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventasoftware`
--
ALTER TABLE `ventasoftware`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendahoras`
--
ALTER TABLE `agendahoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventahardware`
--
ALTER TABLE `ventahardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventasoftware`
--
ALTER TABLE `ventasoftware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
