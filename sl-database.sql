-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 07:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sl-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `namaDepan` varchar(50) NOT NULL,
  `namaTengah` varchar(50) NOT NULL,
  `namaBelakang` varchar(50) NOT NULL,
  `tempatLahir` varchar(128) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nik` bigint(20) NOT NULL,
  `wargaNegara` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `noHP` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `kodePos` varchar(10) NOT NULL,
  `fotoProfil` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password1` varchar(128) NOT NULL,
  `password2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`namaDepan`, `namaTengah`, `namaBelakang`, `tempatLahir`, `tanggalLahir`, `nik`, `wargaNegara`, `email`, `noHP`, `alamat`, `kodePos`, `fotoProfil`, `username`, `password1`, `password2`) VALUES
('Jessica', 'Ilone', 'Zena', 'Yogyakarta', '2002-05-15', 1234123412341234, 'Indonesia', 'jessicailonezena@gmail.com', 87839300098, 'Tamantirto 7/-, D.I.Yogyakarta', '10110', '12.jpg', 'jessicailn', 'd4ecc4ab98bfba15450d0a3296f94d24', '5656fe530a30524436c5061775465111'),
('Kim', 'Jin', 'Hyo', 'Kowloon', '1996-06-30', 9293726352740909, 'Hong Kong', 'kimjin123@gmail.com', 11765923786, 'Kowloon City, HongKong', '98261', 'new.jpeg', 'JunHoe_', '924c4902db449f5eee2089f1aa173d70', 'f978614441c9a7d738f33c343b4b66e0'),
('Song', 'Min', 'Ho', 'Giheunggu', '1993-03-30', 1234567812345678, 'Korea Sout', 'songminho@gmail.com', 21334897263, 'Songnidan-gil', '23189', 'mino.jpg', 'SongMino', 'f3d5afbb2f9445ce6976181f3594f256', '04cd81931b55d0195097388d17d5e8ed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
