-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 03:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imenik`
--

-- --------------------------------------------------------

--
-- Table structure for table `oddelek`
--

CREATE TABLE `oddelek` (
  `id_oddelek` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `opis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Oddelek kjer je lahko več uporabnikov';

--
-- Dumping data for table `oddelek`
--

INSERT INTO `oddelek` (`id_oddelek`, `ime`, `opis`) VALUES
(2, 'test', 'Testno delovno mesto');

-- --------------------------------------------------------

--
-- Table structure for table `uporabnik`
--

CREATE TABLE `uporabnik` (
  `id_user` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `priimek` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `geslo` varchar(50) NOT NULL,
  `tel_st` int(11) NOT NULL,
  `delovno_mesto` varchar(50) NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela uporabnikov';

--
-- Dumping data for table `uporabnik`
--

INSERT INTO `uporabnik` (`id_user`, `ime`, `priimek`, `email`, `geslo`, `tel_st`, `delovno_mesto`, `naslov`, `admin`) VALUES
(1, 'test', 'test', 'test@test', 'test', 123123123, 'test', 'test', 0),
(2, 'luka', 'kadunc', 'lukakadunc@gmail.com', 'geslo', 41272511, 'mesto1', 'Zg Tuhinj 27', 0),
(3, 'Jhon', 'Doe', 'jhondoe@smetail.com', 'geslo', 21215412, 'mesto1', 'doeland', 0),
(4, 'Franci', 'naBalanci', 'franc@fri.uni-lj.si', 'geslo', 120212, 'mesto1', 'Kraljeva ulic', 0),
(5, 'Blaz', 'smetnak ', 'blaz@smetnak.si', 'geslo', 1231231231, 'mesto1', 'Zg Tuhinj 27', 0),
(6, 'admin', 'admin', 'admin@admin', 'admin', 0, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oddelek`
--
ALTER TABLE `oddelek`
  ADD PRIMARY KEY (`id_oddelek`);

--
-- Indexes for table `uporabnik`
--
ALTER TABLE `uporabnik`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oddelek`
--
ALTER TABLE `oddelek`
  MODIFY `id_oddelek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
