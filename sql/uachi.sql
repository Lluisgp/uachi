-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 10:27:21
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uachi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title_es` varchar(50) NOT NULL,
  `media_description_es` varchar(200) NOT NULL,
  `media_title_ca` varchar(50) NOT NULL,
  `media_description_ca` varchar(200) NOT NULL,
  `media_title_en` varchar(50) NOT NULL,
  `media_description_en` varchar(200) NOT NULL,
  `media_tags` varchar(50) NOT NULL,
  `media_uploaded` int(11) NOT NULL,
  `media_date` date NOT NULL,
  `media_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`media_id`, `media_title_es`, `media_description_es`, `media_title_ca`, `media_description_ca`, `media_title_en`, `media_description_en`, `media_tags`, `media_uploaded`, `media_date`, `media_address`) VALUES
(1, 'Titulo', 'Descripción', 'Titol', 'Descripció', 'Title', 'Description', 'tag toc ', 5, '2017-11-02', 'www.google.es'),
(2, 'titulo2', 'descripción2', 'titol2', 'descripció2', 'title2', 'description2', 'dos tag2', 5, '2017-11-02', 'www.google.es'),
(3, 'titulo3', 'descripción3', 'titol3', 'descripció3', 'title3', 'descrition3', 'tag3 tres', 5, '2017-11-02', 'www.google.es'),
(4, 'cuatro', 'cuatro', 'cuatro', 'cuatro', 'cuatro', 'cuatro', 'cuatro', 5, '2017-11-02', 'cuatro'),
(5, 'cinco', 'cinco', 'cinco', 'cinco', 'cinco', 'cinco', 'cinco', 5, '2017-11-02', 'cinco'),
(6, 'seis', 'seis', 'seis', 'seis', 'seis', 'seis', 'seis', 5, '2017-11-02', 'seis'),
(7, 'siete', 'siete', 'siete', 'siete', 'siete', 'siete', 'siete', 5, '2017-11-02', 'siete'),
(8, 'ocho', 'ocho', 'ocho', 'ocho', 'ocho', 'ocho', 'ocho', 5, '2017-11-02', 'ocho'),
(9, 'nueve', 'nueve', 'nueve', 'nueve', 'nueve', 'nueve', 'nueve', 5, '2017-11-02', 'nueve'),
(10, 'diez', 'diez', 'diez', 'diez', 'diez', 'diez', 'diez', 5, '2017-11-02', 'diez'),
(11, 'once', 'once', 'once', 'once', 'once', 'once', 'once', 5, '2017-11-02', 'once'),
(12, 'Prueba titulo', 'prueba descripción ', 'prova titol', 'prova descripció', 'Test Title', 'test descripticon ', 'tag1 tag2 tag3 hollywood holand test palabro coche', 5, '2017-11-20', 'http://www.google.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` int(11) NOT NULL,
  `thumbnail` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_age`, `user_mobile`) VALUES
(5, 'Lluis', 'lgonzalez@opentrends.net', 'e0c8865b726b48a8ae6563930dff36ba', 39, 625742822),
(6, 'Eric', 'eric@uachi.com', '827ccb0eea8a706c4c34a16891f84e7b', 22, 666448855),
(7, 'Josep Roman', 'jroman@example.org', '827ccb0eea8a706c4c34a16891f84e7b', 35, 625748888),
(8, 'Prova', 'asdfa@asas.com', 'e0c8865b726b48a8ae6563930dff36ba', 21, 625742822);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD KEY `media_uploaded` (`media_uploaded`),
  ADD KEY `media_id` (`media_id`);

--
-- Indices de la tabla `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`media_uploaded`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
