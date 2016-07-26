-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2016 at 01:46 AM
-- Server version: 5.5.49-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `agath`
--

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
