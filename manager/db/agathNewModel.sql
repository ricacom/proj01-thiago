-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2016 at 06:25 PM
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
-- Table structure for table `cliente_controle`
--

CREATE TABLE IF NOT EXISTS `cliente_controle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) NOT NULL,
  `cad_completo` char(1) NOT NULL,
  `alterado_por` bigint(20) DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cliente_controle`
--

INSERT INTO `cliente_controle` (`id`, `id_cliente`, `cad_completo`, `alterado_por`, `data_alteracao`) VALUES
(1, 111922449250366, '0', NULL, NULL),
(2, 119349798504553, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `convenio_medico`
--

CREATE TABLE IF NOT EXISTS `convenio_medico` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'A ativo, N novo, B bloqueado',
  `data_cad` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_altera` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `convenio_medico`
--

INSERT INTO `convenio_medico` (`id`, `description`, `code`, `status`, `data_cad`, `data_altera`) VALUES
(1, 'Unimed Campinas', 'UniCps', 'A', '2016-07-25 04:13:00', '0000-00-00 00:00:00'),
(2, 'Amex', 'AMX', 'B', '2016-07-25 12:00:00', '0000-00-00 00:00:00'),
(3, 'Uniodonto', 'Un', 'A', '2016-07-25 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE IF NOT EXISTS `establishment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` char(2) NOT NULL DEFAULT 'CL' COMMENT 'CL clinica | BR Barbearia',
  `nome` varchar(255) NOT NULL,
  `grupo_admin` bigint(20) NOT NULL,
  `datacad` datetime NOT NULL,
  `dataalter` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT '1 ativo| 0 desativado ',
  `grupo_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_estabelecimento_grupo1_idx` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `establishment2convenio_medico`
--

CREATE TABLE IF NOT EXISTS `establishment2convenio_medico` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `establishment_id` bigint(20) unsigned NOT NULL,
  `convenio_medico_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_establishment2convenio_medico_establishment1_idx` (`establishment_id`),
  KEY `fk_establishment2convenio_medico_convenio_medico1_idx` (`convenio_medico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `datacad` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dataalter` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `datacad`, `dataalter`) VALUES
(1, 'Administrador geral', '2016-07-30 06:15:00', NULL),
(2, 'Administradores de clinica', NULL, '2016-07-30 06:22:42'),
(3, 'Médicos', '2016-07-30 18:06:56', '2016-07-30 06:22:18');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`lg_id`, `lg_user`, `lg_data`, `lg_cod`, `lg_msg`, `lg_url`, `lg_ip`) VALUES
(1, 75, '2016-07-13 01:52:26', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(2, 75, '2016-07-13 01:55:20', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(3, 75, '2016-07-13 02:06:36', 600, 'Logout realizado', '/proj01-thiago/manager/loga_cliente/logout', '10.0.2.2'),
(4, 75, '2016-07-13 02:18:04', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(5, 75, '2016-07-13 02:38:06', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(6, 75, '2016-07-13 02:39:38', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php/loga_cliente/check_credentials', '10.0.2.2'),
(7, 75, '2016-07-26 01:08:28', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/index.php?/loga_cliente/check_credentials', '10.0.2.2'),
(8, 75, '2016-07-29 12:03:21', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2'),
(9, 75, '2016-07-29 12:34:49', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2'),
(14, 2147483647, '2016-07-29 04:01:45', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(15, 2147483647, '2016-07-29 04:03:47', 600, 'Logout realizado', '/proj01-thiago/manager/loga_cliente/logout', '10.0.2.2'),
(16, 2147483647, '2016-07-29 05:55:45', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(17, 2147483647, '2016-07-29 10:02:00', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(18, 2147483647, '2016-07-29 10:03:45', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(19, 2147483647, '2016-07-29 10:12:18', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(20, 2147483647, '2016-07-29 10:14:19', 600, 'Logout realizado', '/proj01-thiago/manager/loga_cliente/logout', '10.0.2.2'),
(21, 2147483647, '2016-07-29 10:14:27', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(22, 2147483647, '2016-07-30 03:18:14', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2'),
(23, 75, '2016-07-30 05:13:26', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2'),
(24, 75, '2016-07-30 05:35:56', 600, 'Logout realizado', '/proj01-thiago/manager/Loga_cliente/Logout', '10.0.2.2'),
(25, 75, '2016-07-30 05:36:12', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2'),
(26, 75, '2016-07-30 05:41:54', 600, 'Logout realizado', '/proj01-thiago/manager/Loga_cliente/Logout', '10.0.2.2'),
(27, 2147483647, '2016-07-30 05:45:40', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/Loga_cliente/status_fb', '10.0.2.2'),
(28, 2147483647, '2016-07-30 05:46:01', 600, 'Logout realizado', '/proj01-thiago/manager/Loga_cliente/Logout', '10.0.2.2'),
(29, 75, '2016-07-30 05:55:23', 200, 'Login realizado com sucesso', '/proj01-thiago/manager/loga_cliente/check_credentials', '10.0.2.2');

-- --------------------------------------------------------

--
-- Table structure for table `professional`
--

CREATE TABLE IF NOT EXISTS `professional` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `datacad` datetime DEFAULT NULL,
  `dataaltera` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user2group`
--

CREATE TABLE IF NOT EXISTS `user2group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `grupo_id` bigint(20) unsigned NOT NULL,
  `datacad` datetime DEFAULT NULL,
  `dataalter` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_user2group_users1_idx` (`users_id`),
  KEY `fk_user2group_grupo1_idx` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `idade` varchar(10) NOT NULL,
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
  `fb_is_verified` varchar(6) NOT NULL,
  `fb_locale` varchar(10) NOT NULL,
  `fb_age_range` int(10) NOT NULL,
  `tipo_cadastro` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119349798504554 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `sexo`, `idade`, `phone`, `mphone`, `whatsapp`, `cphone`, `cramal`, `email`, `password`, `status`, `datacad`, `cod_ativacao`, `data_ativacao`, `fb_is_verified`, `fb_locale`, `fb_age_range`, `tipo_cadastro`) VALUES
(75, 'Ricardo Costa', '0', '', '(55) 5555-5555', '(55) 5 5555-5555', 'S', '(55) 5555-5555', '255', 'ricacom@gmail.com', '$2a$10$bbb69e3f9ac1e82215080OkRtfYR4yme6rA0.uOkNw4GoNOo/hvk6', 'N', '2015-05-23 05:31:29', NULL, '2015-05-23 05:05:52', '', '', 0, ''),
(111922449250365, 'Ricardo COsta', 'M', '33', '0932093029309', '230920390239', 'S', '', '', 'ricaocm@uol.com.br', '$2a$10$e34e027e128b6528a8dbfuKeUw89jfa5klOk5SZ.orFR5belhcOC2', 'N', '2016-07-29 05:42:45', NULL, '0000-00-00 00:00:00', '', '', 0, 'form_site'),
(111922449250366, 'Ricardo Castro', 'M', '32', '19992348531', '19992348531', NULL, '', '', 'ricacom7@gmail.com', '$2a$10$d53411152e9a629193b74OiIvDBt85aWI3UsrIR2x5oUhhxbO2MKu', 'N', '2016-07-30 03:16:41', NULL, '0000-00-00 00:00:00', '', '', 0, 'form_site'),
(119349798504553, 'Ricacom User Teste', 'F', '', NULL, NULL, NULL, '', '', 'ricacom_kmuresj_teste@tfbnw.net', '', 'N', '2016-07-30 05:45:40', NULL, '0000-00-00 00:00:00', '0', 'pt_BR', 21, 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE IF NOT EXISTS `user_control` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) NOT NULL,
  `cad_completo` char(1) NOT NULL,
  `alterado_por` bigint(20) DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_controle_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `establishment`
--
ALTER TABLE `establishment`
  ADD CONSTRAINT `fk_estabelecimento_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `establishment2convenio_medico`
--
ALTER TABLE `establishment2convenio_medico`
  ADD CONSTRAINT `fk_establishment2convenio_medico_establishment1` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_establishment2convenio_medico_convenio_medico1` FOREIGN KEY (`convenio_medico_id`) REFERENCES `convenio_medico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user2group`
--
ALTER TABLE `user2group`
  ADD CONSTRAINT `fk_user2group_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user2group_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_control`
--
ALTER TABLE `user_control`
  ADD CONSTRAINT `fk_cliente_controle_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
