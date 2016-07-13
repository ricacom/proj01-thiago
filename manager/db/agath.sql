-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2016 at 02:51 AM
-- Server version: 5.5.49-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agath`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `date` datetime NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `user` bigint(20) DEFAULT NULL,
  `allday` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `date`, `start`, `end`, `user`, `allday`) VALUES
(30, 'Ricacom', '<p>\r\n	Tester</p>\r\n', '#9c3939', '2016-07-04 09:50:00', '2016-07-06 09:50:00', '2016-07-06 10:00:00', NULL, 'false'),
(31, 'Retorno - Paciente', '<p>\r\n	Julia Maria</p>\r\n<p>\r\n	<img alt="smiley" height="20" src="http://dev.local:8080/proj01-thiago/manager/assets/grocery_crud/texteditor/ckeditor/plugins/smiley/images/regular_smile.gif" title="smiley" width="20" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '#381ce3', '2016-07-08 09:00:00', '2016-07-08 09:00:00', '2016-07-08 10:00:00', NULL, 'true'),
(34, 'Ricardo Costa', 'Mais uma vez', '#169fe2', '2016-07-14 08:00:00', '2016-07-14 08:00:00', '2016-07-14 08:15:00', NULL, 'false'),
(35, 'From grocery', 'Mais um titulo de qualquer coisa\n', '#e01763', '2016-07-09 18:30:00', '2016-07-09 18:30:00', '2016-07-09 18:45:00', NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `lg_id` int(11) NOT NULL AUTO_INCREMENT,
  `lg_user` int(11) NOT NULL,
  `lg_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lg_cod` int(5) NOT NULL,
  `lg_msg` longtext NOT NULL,
  `lg_url` text NOT NULL,
  `lg_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`lg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`lg_id`, `lg_user`, `lg_data`, `lg_cod`, `lg_msg`, `lg_url`, `lg_ip`) VALUES
(1, 75, '2016-07-13 01:52:26', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(2, 75, '2016-07-13 01:55:20', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(3, 75, '2016-07-13 02:06:36', 600, 'Logout realizado', '/proj01-thiago/manager/loga_cliente/logout', '10.0.2.2'),
(4, 75, '2016-07-13 02:18:04', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(5, 75, '2016-07-13 02:38:06', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(6, 75, '2016-07-13 02:39:38', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mphone` varchar(17) DEFAULT NULL,
  `whatsapp` char(1) DEFAULT NULL,
  `cphone` varchar(255) NOT NULL,
  `cramal` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'A ativo, N novo, B bloqueado',
  `datacad` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cod_ativacao` varchar(32) DEFAULT NULL,
  `data_ativacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `sexo`, `phone`, `mphone`, `whatsapp`, `cphone`, `cramal`, `email`, `password`, `status`, `datacad`, `cod_ativacao`, `data_ativacao`) VALUES
(75, 'Ricardo Costa', '0', '(55) 5555-5555', '(55) 5 5555-5555', 'S', '(55) 5555-5555', '255', 'ricacom@gmail.com', '$2a$10$bbb69e3f9ac1e82215080OkRtfYR4yme6rA0.uOkNw4GoNOo/hvk6', 'N', '2015-05-23 05:31:29', NULL, '2015-05-23 05:05:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
