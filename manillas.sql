-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2022 a las 19:50:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(33, 'Pulseras'),
(34, 'Collares'),
(35, 'Anillos'),
(36, 'Pañoleteros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE `descripcion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `titulo`, `subtitulo`, `descripcion`) VALUES
(1, 'Coleccion Navideña', '', 'Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion Cualquiera descripcion'),
(2, 'Anillos', '', '$30.000'),
(3, 'otro ejemplo', '', '$50.000'),
(4, 'Pulsera', '', '$50.000'),
(5, 'Anillo', '', '$50.000'),
(6, 'Titulo', '', 'Cualquier descripcionCualquier descripcion,Cualquier descripcion, Cualquier descripcion.\r\nCualquier descripcion Cualquier descripcion'),
(7, 'Amuleto ', '', '             Cualquier descripcionCualquier descripcion,Cualquier descripcion, Cualquier descripcion.\r\nCualquier descripcion Cualquier descripcion                                                                                                                                                                     ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `categoria`, `last_updated`) VALUES
(81, 'dark_logo_white_background.jpg', 'Pulseras', '2022-03-22 03:19:57'),
(82, 'Firma Hellen final.png', 'Nada', '2022-04-05 03:56:16'),
(83, 'Foto Retrato.jpg', 'Nada', '2022-04-05 03:50:40'),
(84, 'Coounibosque.png', 'Pañoleteros', '2022-04-05 17:26:09'),
(85, '20200722_124902.jpg', 'Nada', '2022-04-05 03:56:16'),
(86, '20200725_175121.jpg', 'Nada', '2022-04-02 07:05:44'),
(87, '20200725_175123.jpg', 'Nada', '2022-04-02 07:05:44'),
(88, '20200804_123045.jpg', 'Nada', '2022-03-22 01:49:17'),
(89, 'Samira.jpg', 'Collares', '2022-04-05 17:26:19'),
(90, 'logo_transparent_background.png', 'Pañoleteros', '2022-03-22 01:17:06'),
(91, 'WhatsApp Image 2022-03-16 at 9.43.01 AM.jpeg', 'Pañoleteros', '2022-03-22 01:17:29'),
(92, 'dark_logo_transparent_background.png', 'Anillos', '2022-03-22 01:19:23'),
(93, 'SAM_2090.JPG', 'Anillos', '2022-03-22 01:19:44'),
(94, 'mantenimiento.png', 'Anillos', '2022-03-22 03:20:06'),
(95, 'color.png', 'Collares', '2022-04-02 07:08:22'),
(96, 'Celeste_page-0001 (1).jpg', 'Pulseras', '2022-04-02 07:07:37'),
(97, 'WhatsApp Image 2022-03-17 at 2.12.01 AM.jpeg', 'Pañoleteros', '2022-04-02 07:07:54'),
(98, 'colour-1885352__480.jpg', 'Anillos', '2022-04-02 07:08:10'),
(99, 'image.jpeg', 'Anillos', '2022-04-02 07:08:16'),
(100, 'Foto Retrato23.jpg', 'Nada', '2022-04-05 03:51:41'),
(101, 'Foto Retrato52.jpg', 'Nada', '2022-04-05 03:52:02'),
(102, '20220404_225441.jpg', 'Pulseras', '2022-04-05 04:37:55'),
(103, '20220404_225427.jpg', 'Nada', '2022-04-05 04:03:14'),
(104, '20220404_225705.jpg', 'Nada', '2022-04-05 04:06:47'),
(105, 'Diseño sin título.png', 'Nada', '2022-04-19 17:44:53'),
(106, '35e3240b-83ea-4bce-8b06-076fc81ab639_bike-with-yellow-wall-min.png', 'Nada', '2022-04-05 04:10:17'),
(107, 'dog-purple-bg.png', 'Nada', '2022-04-05 04:17:42'),
(108, 'dog-purple-bg (1).png', 'Nada', '2022-04-05 04:16:15'),
(109, 'dog-purple-bg (2).png', 'Nada', '2022-04-19 14:53:46'),
(110, 'dog-purple-bg (3).png', 'Nada', '2022-04-19 14:53:46'),
(111, 'dog-purple-bg (4).png', 'Pulseras', '2022-04-05 04:34:33'),
(112, 'dog-purple-bg (5).png', 'Nada', '2022-04-05 04:32:12'),
(113, 'man-sitting-desert.png', 'Pulseras', '2022-04-05 04:37:16'),
(114, 'white_logo_dark_background.jpg', 'Anillos', '2022-04-05 17:25:53'),
(115, 'WhatsApp Image 2022-03-12 at 9.38.25 AM.jpeg', 'Pulseras', '2022-04-05 17:26:28'),
(116, 'DSC_0645.png', 'Carrusel', '2022-04-19 17:44:53'),
(117, 'DSC_0605.png', 'Nada', '2022-04-19 14:58:17'),
(118, 'DSC_0565.png', 'Nada', '2022-04-19 14:58:17'),
(119, 'DSC_0567.png', 'Anillos', '2022-04-19 14:54:42'),
(120, 'DSC_0568.png', 'Carrusel', '2022-04-19 17:44:53'),
(121, 'DSC_0570.png', 'Collares', '2022-04-19 14:54:59'),
(122, 'DSC_0587.png', 'Pulseras', '2022-04-19 14:56:54'),
(123, 'DSC_0623.png', 'Anillos', '2022-04-19 14:57:04'),
(124, 'DSC_0626.png', 'Nada', '2022-04-19 17:44:53'),
(125, 'DSC_0625.png', 'Nada', '2022-04-19 17:44:53'),
(126, 'DSC_0629.png', 'Nada', '2022-04-19 17:44:33'),
(127, 'DSC_0608.png', 'Carrusel', '2022-04-19 17:44:53'),
(128, 'DSC_0622.png', 'Anillos', '2022-04-19 17:43:59'),
(129, 'DSC_0612.png', 'Pañoleteros', '2022-04-19 17:44:04'),
(130, 'DSC_0624.png', 'Collares', '2022-04-19 17:44:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_categoria`
--

CREATE TABLE `image_categoria` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `imagen_id` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen_id`, `categoria_id`) VALUES
(26, 'blabla', 88888, '260164824.png', 35),
(27, 'nose', 20000, '206623464.png', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'empleado'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `contraseña`, `correo`, `id_rol`) VALUES
(18, 'Fabian', '$2y$10$.N639caOV/Euq1CKF4jOTuuAIJFcRLtApIP9zIYKE4LqsyFhhfS8C', 'fabian@hotmail.com', 1),
(19, 'Uriel', '$2y$10$gkEE8kdNGcJNZxjyza0Kje7r8OILjogMue0M/Y.qPWg27fmfkrKyG', 'uriel@hotmail.com', 1),
(20, 'valen', '$2y$10$5OVCdnh.t6G93Ie9e8/57OzgIBSyo3Pcha1fcCrqTDwkS4Gf4Qnje', 'valen@hotmail.com', 1),
(21, 'Fabian Pinto', '$2y$10$3x9Fzgl5Z0gBTzkr8letTuBs.FlCbPFLjGdbth2Y8ir8iu.07YMDC', 'fabian18pinto@hotmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `image_categoria`
--
ALTER TABLE `image_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_image` (`id_image`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `image_categoria`
--
ALTER TABLE `image_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `image_categoria`
--
ALTER TABLE `image_categoria`
  ADD CONSTRAINT `image_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_categoria_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
