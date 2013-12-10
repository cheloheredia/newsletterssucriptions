-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 07:34 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newsucrip`
--
CREATE DATABASE IF NOT EXISTS `newsucrip` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `newsucrip`;

-- --------------------------------------------------------

--
-- Table structure for table `cuidad`
--

CREATE TABLE IF NOT EXISTS `cuidad` (
  `cn` int(11) NOT NULL AUTO_INCREMENT,
  `ccuidad` char(50) DEFAULT NULL,
  `cpais` int(11) DEFAULT NULL,
  PRIMARY KEY (`cn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `edicion`
--

CREATE TABLE IF NOT EXISTS `edicion` (
  `en` int(11) NOT NULL AUTO_INCREMENT,
  `eedicion` char(50) DEFAULT NULL,
  `erevista` int(11) DEFAULT NULL,
  PRIMARY KEY (`en`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `envio`
--

CREATE TABLE IF NOT EXISTS `envio` (
  `envn` int(11) NOT NULL AUTO_INCREMENT,
  `envusuario` int(11) DEFAULT NULL,
  `envprospecto` int(11) DEFAULT NULL,
  `envedicion` int(11) DEFAULT NULL,
  `envfecha` datetime DEFAULT NULL,
  PRIMARY KEY (`envn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `pan` int(11) NOT NULL AUTO_INCREMENT,
  `papais` char(50) DEFAULT NULL,
  PRIMARY KEY (`pan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prospecto`
--

CREATE TABLE IF NOT EXISTS `prospecto` (
  `pn` int(11) NOT NULL AUTO_INCREMENT,
  `pnombre` char(50) DEFAULT NULL,
  `papellido` char(50) DEFAULT NULL,
  `pemail` char(50) DEFAULT NULL,
  `pciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`pn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revista`
--

CREATE TABLE IF NOT EXISTS `revista` (
  `rn` int(11) NOT NULL AUTO_INCREMENT,
  `rrevista` char(50) DEFAULT NULL,
  PRIMARY KEY (`rn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revusuario`
--

CREATE TABLE IF NOT EXISTS `revusuario` (
  `run` int(11) NOT NULL AUTO_INCREMENT,
  `ruusuario` int(11) DEFAULT NULL,
  `rurevista` int(11) DEFAULT NULL,
  PRIMARY KEY (`run`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suscripcion`
--

CREATE TABLE IF NOT EXISTS `suscripcion` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `srevista` int(11) DEFAULT NULL,
  `sprospecto` int(11) DEFAULT NULL,
  `stipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tsuscripcion`
--

CREATE TABLE IF NOT EXISTS `tsuscripcion` (
  `tsn` int(11) NOT NULL AUTO_INCREMENT,
  `tstipo` char(50) DEFAULT NULL,
  PRIMARY KEY (`tsn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `tun` int(11) NOT NULL AUTO_INCREMENT,
  `tutipo` char(50) DEFAULT NULL,
  PRIMARY KEY (`tun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `un` int(11) NOT NULL AUTO_INCREMENT,
  `unombres` char(50) DEFAULT NULL,
  `uapaterno` char(50) DEFAULT NULL,
  `uamaterno` char(50) DEFAULT NULL,
  `uemail` char(50) DEFAULT NULL,
  `uusuario` char(50) DEFAULT NULL,
  `upass` char(50) DEFAULT NULL,
  `utipo` int(11) DEFAULT NULL,
  `uestado` char(2) DEFAULT NULL,
  PRIMARY KEY (`un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
