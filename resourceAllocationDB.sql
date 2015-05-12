-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-05-2015 a las 00:53:57
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `resources`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`id` int(10) unsigned NOT NULL,
  `resource_id` int(10) NOT NULL,
  `user_id` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `return_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `resource_id`, `user_id`, `start_date`, `end_date`, `return_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 1, 'A01154175', '2015-05-08 22:30:00', '2015-05-08 23:00:00', '0000-00-00 00:00:00', '2015-05-09 03:33:59', '2015-05-09 03:33:59', NULL),
(37, 1, 'A01154175', '2015-05-08 23:00:00', '2015-05-08 23:30:00', '0000-00-00 00:00:00', '2015-05-09 03:33:59', '2015-05-09 03:33:59', NULL),
(38, 1, 'A01154175', '2015-05-08 23:30:00', '2015-05-09 00:00:00', '0000-00-00 00:00:00', '2015-05-09 03:35:41', '2015-05-09 03:35:41', NULL),
(39, 7, 'A01154175', '2015-05-08 22:30:00', '2015-05-08 23:00:00', '0000-00-00 00:00:00', '2015-05-09 03:37:01', '2015-05-09 03:37:01', NULL),
(40, 7, 'A01154175', '2015-05-08 23:00:00', '2015-05-08 23:30:00', '0000-00-00 00:00:00', '2015-05-09 03:37:01', '2015-05-09 03:37:01', NULL),
(41, 7, 'A01154175', '2015-05-08 23:30:00', '2015-05-09 00:00:00', '0000-00-00 00:00:00', '2015-05-09 03:37:01', '2015-05-09 03:37:01', NULL),
(42, 7, 'A01154175', '2015-05-09 00:30:00', '2015-05-09 01:00:00', '0000-00-00 00:00:00', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(43, 7, 'A01154175', '2015-05-09 01:00:00', '2015-05-09 01:30:00', '0000-00-00 00:00:00', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(44, 7, 'A01154175', '2015-05-09 01:30:00', '2015-05-09 02:00:00', '0000-00-00 00:00:00', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(45, 9, 'A01154175', '2015-05-08 22:30:00', '2015-05-08 23:00:00', '0000-00-00 00:00:00', '2015-05-09 03:38:09', '2015-05-09 03:38:09', NULL),
(46, 9, 'A01154175', '2015-05-08 23:00:00', '2015-05-08 23:30:00', '0000-00-00 00:00:00', '2015-05-09 03:38:09', '2015-05-09 03:38:09', NULL),
(47, 9, 'A01154175', '2015-05-09 01:00:00', '2015-05-09 01:30:00', '0000-00-00 00:00:00', '2015-05-09 03:38:56', '2015-05-09 03:38:56', NULL),
(48, 9, 'A01154175', '2015-05-09 01:30:00', '2015-05-09 02:00:00', '0000-00-00 00:00:00', '2015-05-09 03:38:56', '2015-05-09 03:38:56', NULL),
(49, 13, 'A01154175', '2015-05-08 22:30:00', '2015-05-08 23:00:00', '0000-00-00 00:00:00', '2015-05-09 03:39:54', '2015-05-09 03:39:54', NULL),
(50, 13, 'A01154175', '2015-05-09 01:00:00', '2015-05-09 01:30:00', '0000-00-00 00:00:00', '2015-05-09 03:39:54', '2015-05-09 03:39:54', NULL),
(51, 13, 'A01154175', '2015-05-09 01:30:00', '2015-05-09 02:00:00', '0000-00-00 00:00:00', '2015-05-09 03:39:54', '2015-05-09 03:39:54', NULL),
(52, 13, 'A01154175', '2015-05-09 00:30:00', '2015-05-09 01:00:00', '0000-00-00 00:00:00', '2015-05-09 03:40:05', '2015-05-09 03:40:05', NULL),
(53, 15, 'A01154175', '2015-05-08 22:30:00', '2015-05-08 23:00:00', '0000-00-00 00:00:00', '2015-05-09 03:40:41', '2015-05-09 03:40:41', NULL),
(54, 15, 'A01154175', '2015-05-08 23:00:00', '2015-05-08 23:30:00', '0000-00-00 00:00:00', '2015-05-09 03:40:41', '2015-05-09 03:40:41', NULL),
(55, 15, 'A01154175', '2015-05-08 23:30:00', '2015-05-09 00:00:00', '0000-00-00 00:00:00', '2015-05-09 03:41:35', '2015-05-09 03:41:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ISC', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(2, 'IBT', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(3, 'LMCD', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(4, 'LIN', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(5, 'LAD', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers_laboratories`
--

CREATE TABLE IF NOT EXISTS `careers_laboratories` (
`id` int(10) unsigned NOT NULL,
  `career_id` int(11) NOT NULL,
  `laboratory_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `careers_laboratories`
--

INSERT INTO `careers_laboratories` (`id`, `career_id`, `laboratory_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aparatos Eléctricos', 'Cualquier aparato que utilice electricidad', '2015-03-30 21:01:23', '2015-05-08 08:08:59', NULL),
(2, 'Aparatos Mecánicos', 'Aparatos que utiliza fuerza sin electricidad', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(3, 'Aparatos Electrónicos', 'Aparatos que contengan componentes eléctricos', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(4, 'Material fotográfico', 'Material para tomar fotos', '2015-04-08 00:41:00', '0000-00-00 00:00:00', NULL),
(5, 'Cabinas', 'Cabinas ', '2015-04-08 01:26:00', '0000-00-00 00:00:00', NULL),
(6, 'Lineas', 'Líneas', '2015-04-08 01:26:00', '0000-00-00 00:00:00', NULL),
(7, 'Balones', 'Balones deportivos', '2015-04-08 01:47:00', '0000-00-00 00:00:00', NULL),
(9, 'Pipetas', 'Material para Laboratorio de alimentos', '2015-04-08 19:17:28', '2015-04-08 19:17:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratories`
--

CREATE TABLE IF NOT EXISTS `laboratories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `building` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `laboratories`
--

INSERT INTO `laboratories` (`id`, `name`, `building`, `created_at`, `updated_at`, `user_id`, `deleted_at`) VALUES
(1, 'Centro De Medios', 1, '2015-03-30 21:01:23', '2015-05-08 08:08:33', 7, NULL),
(2, 'DICI', 2, '2015-03-30 21:01:23', '2015-05-09 03:21:17', 21, NULL),
(3, 'Electrónica ', 3, '2015-03-30 21:01:23', '2015-05-09 03:21:23', 20, NULL),
(4, 'Sistemas Industriales', 4, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 4, NULL),
(5, 'Centro Deportivo', 5, '2015-03-30 21:01:23', '2015-05-09 03:21:10', 22, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilages`
--

CREATE TABLE IF NOT EXISTS `privilages` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `privilages`
--

INSERT INTO `privilages` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'editar', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(2, 'reservar', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(3, 'eliminar', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `laboratory_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `name`, `description`, `image`, `category_id`, `laboratory_id`, `created_at`, `updated_at`, `tags`, `deleted_at`) VALUES
(1, 'Taladro', 'Marca Black and Decker', '/images/taladro.jpg', 1, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'madera%metal%electrico%corte', NULL),
(2, 'Taladro de madera ', 'Especial para trabajar en madera.', '/images/taladro2.jpg', 1, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'madera%metal%electrico%corte', NULL),
(3, 'Martillo electrico', 'Para clavar de forma más rápida.\r\n', '/images/martillo.jpg', 2, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'grande%blanca%fierro%metal', NULL),
(4, 'Rotomartillo electrico', 'Es ideal para trabajos pesados que suelen ser cada vez más fuertes.', '/images/martilloroto.jpg', 2, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'electronico%electrico%laser', NULL),
(5, 'Martillo eléctrico de fierro', 'Hecho de fierro', '/images/martillo2.jpg', 3, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'sierra%corte%madera', NULL),
(6, 'Serrucho', 'Ideal para madera.', '/images/serrucho.jpg', 3, 2, '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'madera%metal%electrico%corte', NULL),
(7, 'Cámara DSLR', 'Cámara Canon', '/images/camaraCanon.jpg', 4, 1, '2015-04-08 00:40:00', '0000-00-00 00:00:00', 'fotos%cámara%canon', NULL),
(8, 'Tripié', 'Marca Solidex. ', 'images/tripie1.jpg', 4, 1, '2015-04-08 00:50:00', '0000-00-00 00:00:00', 'camara%tripie%soliex', NULL),
(9, 'Cautin', 'Para soldar peque_os componentes electricos', '/images/cautin1.jpg', 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cautin%quemar', NULL),
(10, 'Multimetro', 'Mide el voltaje de un circuito', '/images/multimetro.jpg', 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'voltaje%medidor', NULL),
(11, 'Fuente de Poder', 'Brinda poder para proyectos', '/images/fuentepoder.jpg', 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'poder%fuente%electronica', NULL),
(12, 'Banda transportadora', '', '/images/banda.jpg', 6, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'banda%trasportar%conveyor%belt', NULL),
(13, 'Cabina de ruido', '', '/images/cabinaRuido.jpg', 5, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ruido%industrial', NULL),
(14, 'Cabina de presión', '', '/images/cabinaPresion.jpg', 5, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'presion%industrial', NULL),
(15, 'Balón de voleibol', 'Jugar voleibol', '/images/voleibol.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'voleibol%volleyball', NULL),
(16, 'Balón de basquet', 'Jugar Basquet', '/images/basquet.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'basquet%basquetball', NULL),
(17, 'Balón de futbol', 'Jugar futbol', '/images/fut.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'futbol%soccer%football', NULL),
(18, 'Balón medicinal', 'Hacer ejercicio', '/images/medicineBall.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'exercise%weights', NULL),
(19, 'Balón futbol americano', 'Jugar futbol americano', '/images/american.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'football%american', NULL),
(20, 'Balón recreativo', 'Jugar juegos recreativos', '/images/kickball.jpg', 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'balon%reacreativo', NULL),
(21, 'Bicicleta', 'Es una bici', '/images/IMG_20150506_102727379.jpg', 1, 1, '2015-05-09 03:00:16', '2015-05-09 03:06:31', 'bicicleta', '2015-05-09 03:06:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'administrador', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(2, 'estudiante', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(3, 'super usuario', '2015-05-07 23:16:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_privilages`
--

CREATE TABLE IF NOT EXISTS `roles_privilages` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `privilages_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `roles_privilages`
--

INSERT INTO `roles_privilages` (`id`, `role_id`, `privilages_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(10) unsigned NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weekday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `start_hour`, `end_hour`, `created_at`, `updated_at`, `name`, `weekday`, `deleted_at`) VALUES
(1, '09:00:00', '18:00:00', '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'horario1', 'Lunes', NULL),
(2, '09:00:00', '18:00:00', '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'horario2', 'Martes', NULL),
(3, '09:00:00', '10:00:00', '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'horario3', 'Miercoles', NULL),
(4, '09:00:00', '20:00:00', '2015-03-30 21:01:23', '2015-03-30 21:01:23', 'horario4', 'Jueves', NULL),
(5, '08:00:00', '21:00:00', '2015-05-09 02:53:20', '2015-05-09 02:53:20', 'horario5', 'Viernes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timetables`
--

CREATE TABLE IF NOT EXISTS `timetables` (
`id` int(10) unsigned NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `timetables`
--

INSERT INTO `timetables` (`id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dia laboral', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL),
(2, 'medio dia laboral', '2015-03-30 21:01:23', '2015-03-30 21:01:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timetables_resources`
--

CREATE TABLE IF NOT EXISTS `timetables_resources` (
`id` int(10) unsigned NOT NULL,
  `resource_id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `timetables_resources`
--

INSERT INTO `timetables_resources` (`id`, `resource_id`, `timetable_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 20, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 21, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timetables_schedules`
--

CREATE TABLE IF NOT EXISTS `timetables_schedules` (
`id` int(10) unsigned NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `timetables_schedules`
--

INSERT INTO `timetables_schedules` (`id`, `timetable_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 5, '2015-05-08 21:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `alternative` tinyint(1) NOT NULL DEFAULT '0',
  `career` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `first_last_name`, `second_last_name`, `email1`, `email2`, `password`, `school_id`, `alternative`, `career`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Jorge', 'González', 'Sánchez', 'A00567911@itesm.mx', 'jorgegonzac@gmail.com', '$2y$10$iZVRWW4HNwvHqXWsgneeQe94TBWiX8LDF.wPT5Jsp7dQrZGZbNcEa', 'A00567911', 1, 'ISC', '2015-04-08 20:35:42', '2015-05-09 03:14:07', NULL),
(20, 'Andrea Itai', 'Hernández', 'Monterrubio', 'A01205154@itesm.mx', 'andy.mont18@gmail.com', '$2y$10$R2lEYI4r3wyleygOLNNONu05nw9RnCSbS.3MteilUxv2ZdCFWirKy', 'A01205154', 1, 'ISC', '2015-05-09 03:11:52', '2015-05-09 03:11:52', NULL),
(21, 'Diana', 'Sanabria', 'Nieto', 'A01320622@itesm.mx', 'dianasanabrianieto@gmail.com', '$2y$10$GZevVceJkInXjge8qY2ooO/97/tizjVVbaC98X/2j/Q8VNNp58abG', 'A01320622', 1, 'ISC', '2015-05-09 03:13:03', '2015-05-09 03:13:03', NULL),
(22, 'Antonio', 'Esper', 'Cook', 'A01202743@itesm.mx', 'antonioesperc@gmail.com', '$2y$10$BKnhotviKFdlsPnD2NTNnuygdXI3ofW34YocfEnkZqurPgnY1izdm', 'A01202743', 1, 'ISC', '2015-05-09 03:13:53', '2015-05-09 03:13:53', NULL),
(23, 'Armando', 'Ceniceros', 'Del Campo', 'A01154175@itesm.mx', 'gonzac_jorge@hotmail.com', '$2y$10$ZBEiN8t7yF1xh/KwSCcQP.ayhiRhb8KNYpTc1WhQXnMGen5O2OWUe', 'A01154175', 1, 'LMCD', '2015-05-09 03:25:58', '2015-05-09 03:25:58', NULL),
(25, 'Super Admin', 'Super', 'Admin', 'resourceallocationitesm@gmail.com', 'jorgegonzac2@gmail.com', NULL, 'A00567912', 0, 'SUPER', '2015-05-08 22:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(18, 20, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 21, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 22, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 25, 3, '2015-05-08 22:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `waitinglists`
--

CREATE TABLE IF NOT EXISTS `waitinglists` (
`id` int(10) unsigned NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `resource_id` int(11) NOT NULL,
  `user_id` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `waitinglists`
--

INSERT INTO `waitinglists` (`id`, `start_date`, `end_date`, `resource_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, '2015-05-08 22:30:00', '2015-05-08 23:00:00', 1, 'A01154175', '2015-05-09 03:35:41', '2015-05-09 03:35:41', NULL),
(37, '2015-05-08 23:00:00', '2015-05-08 23:30:00', 1, 'A01154175', '2015-05-09 03:35:41', '2015-05-09 03:35:41', NULL),
(38, '2015-05-08 22:30:00', '2015-05-08 23:00:00', 7, 'A01154175', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(39, '2015-05-08 23:00:00', '2015-05-08 23:30:00', 7, 'A01154175', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(40, '2015-05-08 23:30:00', '2015-05-09 00:00:00', 7, 'A01154175', '2015-05-09 03:37:46', '2015-05-09 03:37:46', NULL),
(41, '2015-05-08 22:30:00', '2015-05-08 23:00:00', 9, 'A01154175', '2015-05-09 03:38:56', '2015-05-09 03:38:56', NULL),
(42, '2015-05-08 23:00:00', '2015-05-08 23:30:00', 9, 'A01154175', '2015-05-09 03:38:56', '2015-05-09 03:38:56', NULL),
(43, '2015-05-09 01:00:00', '2015-05-09 01:30:00', 13, 'A01154175', '2015-05-09 03:40:05', '2015-05-09 03:40:05', NULL),
(44, '2015-05-09 01:30:00', '2015-05-09 02:00:00', 13, 'A01154175', '2015-05-09 03:40:05', '2015-05-09 03:40:05', NULL),
(45, '2015-05-08 22:30:00', '2015-05-08 23:00:00', 15, 'A01154175', '2015-05-09 03:41:35', '2015-05-09 03:41:35', NULL),
(46, '2015-05-08 23:00:00', '2015-05-08 23:30:00', 15, 'A01154175', '2015-05-09 03:41:35', '2015-05-09 03:41:35', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `careers_laboratories`
--
ALTER TABLE `careers_laboratories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratories`
--
ALTER TABLE `laboratories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `privilages`
--
ALTER TABLE `privilages`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_privilages`
--
ALTER TABLE `roles_privilages`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `schedules_name_unique` (`name`);

--
-- Indices de la tabla `timetables`
--
ALTER TABLE `timetables`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timetables_resources`
--
ALTER TABLE `timetables_resources`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timetables_schedules`
--
ALTER TABLE `timetables_schedules`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email1_unique` (`email1`), ADD UNIQUE KEY `users_school_id_unique` (`school_id`), ADD UNIQUE KEY `users_email2_unique` (`email2`);

--
-- Indices de la tabla `users_roles`
--
ALTER TABLE `users_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `waitinglists`
--
ALTER TABLE `waitinglists`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `careers_laboratories`
--
ALTER TABLE `careers_laboratories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `laboratories`
--
ALTER TABLE `laboratories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `privilages`
--
ALTER TABLE `privilages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles_privilages`
--
ALTER TABLE `roles_privilages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `timetables`
--
ALTER TABLE `timetables`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `timetables_resources`
--
ALTER TABLE `timetables_resources`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `timetables_schedules`
--
ALTER TABLE `timetables_schedules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `users_roles`
--
ALTER TABLE `users_roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `waitinglists`
--
ALTER TABLE `waitinglists`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
