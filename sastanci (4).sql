-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 07:15 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sastanci`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_slike`
--

CREATE TABLE `client_slike` (
  `id` int(11) NOT NULL,
  `slike` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_slike`
--

INSERT INTO `client_slike` (`id`, `slike`) VALUES
(1, 'client5.png'),
(2, 'client2.png'),
(3, 'client1.png'),
(4, 'client4.png'),
(5, 'client6.png'),
(9, 'client2.png');

-- --------------------------------------------------------

--
-- Table structure for table `go_line`
--

CREATE TABLE `go_line` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slike` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `go_line`
--

INSERT INTO `go_line` (`id`, `naslov`, `tekst`, `slike`) VALUES
(1, 'Post5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis nisl quam. Duis condimentum sem id nulla pulvinar, eu egestas est euismod. Morbi pret. ', 'krug1.png'),
(2, 'Post2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis nisl quam. Duis condimentum sem id nulla pulvinar, eu egestas est euismod. ', 'krug3.png'),
(3, 'Post3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis nisl quam. Duis condimentum sem id nulla pulvinar, eu egestas est euismod. ', 'krug3.png'),
(4, 'Pos4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis nisl quam. Duis condimentum sem id nulla pulvinar, eu egestas est euismod. ', 'krug4.png');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `office_slike`
--

CREATE TABLE `office_slike` (
  `id` int(11) NOT NULL,
  `slike` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_slike`
--

INSERT INTO `office_slike` (`id`, `slike`) VALUES
(2, 'brussels.jpg'),
(29, 'milan.jpg'),
(28, 'madrid.jpg'),
(26, 'stockholm.jpg'),
(10, 'london.jpg'),
(12, 'london.jpg'),
(16, 'london.jpg'),
(31, 'dubai.jpg'),
(19, 'london.jpg'),
(21, 'milan.jpg'),
(22, 'paris.png');

-- --------------------------------------------------------

--
-- Table structure for table `postovi`
--

CREATE TABLE `postovi` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `slike` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `postovi`
--

INSERT INTO `postovi` (`id`, `naslov`, `tekst`, `slike`) VALUES
(1, 'PR AND COMMUNICATiONS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed ', 'fotka2.png');

-- --------------------------------------------------------

--
-- Table structure for table `postovi1`
--

CREATE TABLE `postovi1` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `postovi1`
--

INSERT INTO `postovi1` (`id`, `naslov`, `tekst`, `slika`) VALUES
(1, 'EVENT MENAGEMENT', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as oppo fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as o', 'fotka3.png');

-- --------------------------------------------------------

--
-- Table structure for table `zakazivanje`
--

CREATE TABLE `zakazivanje` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firma` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `brojtelefona` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `status` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '?'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zakazivanje`
--

INSERT INTO `zakazivanje` (`id`, `ime_prezime`, `firma`, `email`, `brojtelefona`, `datum`, `vrijeme`, `status`) VALUES
(1, 'Vuk Kovacevic', 'vuk', 'kovacevicvuk77@gmail.com', '69688169', '2018-08-07', '01:00:00', 'prihvacen'),
(65, 'Mili Bakic', 'solid', '', '696888169', '2018-08-01', '00:00:00', 'otkazan'),
(66, 'Mili Bakic', 'solid', 'umjetnineme@gmail.com', '696888169', '2018-08-14', '13:59:00', 'prihvacen'),
(63, '', '', '', '', '2018-08-15', '00:00:00', 'prihvacen'),
(64, 'Mili Bakic', 'solid', '', '696888169', '2018-08-13', '00:00:00', 'prihvacen'),
(67, 'Baja', 'baja firma', 'mika@gmail.com', '3820686656', '2018-08-14', '01:59:00', ''),
(69, 'baja', 'baja firma', 'umjetnineme@gmail.com', '696888169', '2018-08-24', '09:00:00', 'otkazan'),
(68, 'Mili Bakic', 'solid', 'amit@gmail.com', '696888169', '2018-08-23', '13:59:00', 'otkazan'),
(70, 'vaka', 'vakaaaa', 'kovacevicvuk77@gmail.com', '696888169', '2018-08-08', '04:58:00', 'prihvacen'),
(71, 'Mili Bakic', 'solid', 'kovacevicvuk77@gmail.com', '3820686656', '2018-01-01', '01:00:00', 'otkazan'),
(72, 'Vuk Kovacevic', 'Artistshop', 'umjetnineme@gmail.com', '686656', '2018-02-01', '12:00:00', '?'),
(73, 'Mili Bakic', 'solid', 'amit@gmail.com', '3820686656', '2018-01-01', '01:00:00', '?'),
(74, 'Mili Bakic', 'solid', 'vuk.1986@gmail.com', '3820686656', '2018-09-04', '01:00:00', '?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_slike`
--
ALTER TABLE `client_slike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `go_line`
--
ALTER TABLE `go_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_slike`
--
ALTER TABLE `office_slike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postovi`
--
ALTER TABLE `postovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postovi1`
--
ALTER TABLE `postovi1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zakazivanje`
--
ALTER TABLE `zakazivanje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_slike`
--
ALTER TABLE `client_slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `go_line`
--
ALTER TABLE `go_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `office_slike`
--
ALTER TABLE `office_slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `postovi`
--
ALTER TABLE `postovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postovi1`
--
ALTER TABLE `postovi1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zakazivanje`
--
ALTER TABLE `zakazivanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
