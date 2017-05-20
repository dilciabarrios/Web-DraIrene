
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2017 a las 03:44:19
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u793779998_bg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Nutricion'),
(2, 'Odontologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_p` varchar(150) DEFAULT NULL,
  `contenido_p` longtext,
  `titulo_s` varchar(150) DEFAULT NULL,
  `contenido_s` longtext,
  `img` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `home`
--

INSERT INTO `home` (`id`, `titulo_p`, `contenido_p`, `titulo_s`, `contenido_s`, `img`) VALUES
(54, 'Lorem Ipsum Principal', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Lorem Ipsum Secundario', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'intro-pic.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `pagina` varchar(150) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `pagina`, `estado`) VALUES
(3, 'Home', 'index.php', 1),
(4, 'About', 'about.php', 1),
(5, 'Portafolio', 'portafolio.php', 1),
(7, 'Contact', 'contact.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `sidebar` tinyint(1) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `color` varchar(150) DEFAULT NULL,
  `nombre_vista` varchar(150) DEFAULT NULL,
  `secuencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `descripcion`, `activo`, `link`, `sidebar`, `icono`, `color`, `nombre_vista`, `secuencia`) VALUES
(13, 'users', 'Permite acceder al modulo usuarios, creacion de usuarios', 1, 'index.php?menu=usuarios', 1, 'fa fa-user fa-fw', 'info-box green-bg', 'Users', 70),
(12, 'portafolio', 'Permite acceder al modulo portafolio', 1, 'index.php?menu=portafolio', 1, 'fa fa-picture-o', 'info-box green-bg', 'Porta', 50),
(11, 'about', 'Permite acceder al modulo about', 1, 'index.php?menu=about', 1, 'icon_documents_alt', 'info-box dark-bg', 'About', 40),
(10, 'home', 'Permite accerder al modulo home para administrar contenido', 1, 'index.php?menu=home', 1, 'fa fa-university', 'info-box brown-bg', 'Home', 30),
(8, 'inicio', 'Pagina de inicio ', 1, 'index.php?', 1, 'icon_document_alt', 'info-box dark-bg', 'Inicio', 10),
(9, 'slider', 'Permite accerder al modulo slider del home', 1, 'index.php?menu=slider', 1, 'fa fa-picture-o', 'info-box dark-bg', 'Slider', 20),
(14, 'configuracion', 'Permite acceder al modulo de configuración', 1, 'index.php?menu=configuracion', 1, 'icon_desktop', 'info-box dark-bg', 'Config', 80),
(15, 'menus', 'Permite acceder al modulo menu, para administrar menu del website', 1, 'index.php?menu=menus', 1, 'fa fa-bars', 'info-box brown-bg', 'Menu', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisologia`
--

CREATE TABLE IF NOT EXISTS `permisologia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `bloquear_leer` tinyint(1) DEFAULT NULL,
  `bloquear_crear` tinyint(1) DEFAULT NULL,
  `bloquear_editar` tinyint(1) DEFAULT NULL,
  `bloquear_eliminar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `permisologia`
--

INSERT INTO `permisologia` (`id`, `id_modulo`, `id_perfil`, `bloquear_leer`, `bloquear_crear`, `bloquear_editar`, `bloquear_eliminar`) VALUES
(19, 13, 2, 1, 0, 0, 0),
(20, 14, 2, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE IF NOT EXISTS `portafolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `contenido` longtext,
  `fecha` date DEFAULT NULL,
  `imagen` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `id_categoria` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id`, `titulo`, `contenido`, `fecha`, `imagen`, `id_categoria`) VALUES
(6, 'Lorem Ipsum', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', '2017-05-19', 'slide-1.jpg', '1'),
(20, 'ppp', 'pppp', '2017-05-19', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `titulo`, `imagen`) VALUES
(3, 'Imagen uno', 'slide-1.jpg'),
(4, 'Imagen dos', 'slide-2.jpg'),
(5, 'Imagen tres', 'slide-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `correo` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `usuario` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `clave` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `id_perfil` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `correo`, `usuario`, `clave`, `activo`, `id_perfil`) VALUES
(2, 'Administrador', 'adminperfil@gmail.com', 'admin', '123456', 1, 1),
(6, 'User', 'userperfil@gmail.com', 'user', '123456', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
