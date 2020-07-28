-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2019 at 10:45 PM
-- Server version: 10.2.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigbizzp_saidas`
--

-- --------------------------------------------------------

-- CREATE DATABASE IF NOT EXISTS bigbizz_saidas 
-- DEFAULT CHARACTER SET utf8
-- DEFAULT COLLATE utf8_general_ci
--
-- Table structure for table `bgbztbl_saidas`
--

-- USE DATABASE bigbizzp_saidas;

CREATE TABLE `bgbztbl_saidas` (
  `saidatbl_id` int(10) UNSIGNED NOT NULL,
  `saidatbl_dataHora` varchar(12) NOT NULL,
  `saidatbl_morada` varchar(500) NOT NULL,
  `saidatbl_observ` varchar(500) NOT NULL,
  `saidatbl_marcadoPor` varchar(10) NOT NULL,
  `saidatbl_apagada` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bgbztbl_saidas`
--

INSERT INTO `bgbztbl_saidas` (`saidatbl_id`, `saidatbl_dataHora`, `saidatbl_morada`, `saidatbl_observ`, `saidatbl_marcadoPor`, `saidatbl_apagada`) VALUES
(49, '201910211000', 'Praça dos Poveiros', 'Casa Guedes', 'neves', 'n'),
(50, '201910240930', 'Ceramirup', '', 'neves', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `bgbztbl_user`
--

CREATE TABLE `bgbztbl_user` (
  `usertbl_id` int(10) UNSIGNED NOT NULL,
  `usertbl_nome` varchar(50) NOT NULL,
  `usertbl_passw` varchar(50) NOT NULL,
  `usertbl_act` char(1) NOT NULL,
  `usertbl_acesso` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bgbztbl_user`
--

INSERT INTO `bgbztbl_user` (`usertbl_id`, `usertbl_nome`, `usertbl_passw`, `usertbl_act`, `usertbl_acesso`) VALUES
(1, 'admin', 'admin1234#$Z', 's', '2'),
(2, 'raul', 'raul1234', 's', '1'),
(3, 'pedro', 'pedro9999', 's', '1'),
(4, 'jose', 'jose0000', 's', '0'),
(5, 'neves', 'neve1961', 's', '2'),
(6, 'coelho', 'coelho789', 's', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bgbztbl_saidas`
--
ALTER TABLE `bgbztbl_saidas`
  ADD UNIQUE KEY `id` (`saidatbl_id`);

--
-- Indexes for table `bgbztbl_user`
--
ALTER TABLE `bgbztbl_user`
  ADD UNIQUE KEY `usertbl_id` (`usertbl_id`),
  ADD UNIQUE KEY `usertbl_nome` (`usertbl_nome`),
  ADD KEY `index_usertbl` (`usertbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bgbztbl_saidas`
--
ALTER TABLE `bgbztbl_saidas`
  MODIFY `saidatbl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bgbztbl_user`
--
ALTER TABLE `bgbztbl_user`
  MODIFY `usertbl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
