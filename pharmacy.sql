-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 01:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(1, 'Square Pharmaceuticals Ltd.'),
(2, 'Beximco Pharmaceuticals Ltd.'),
(3, 'Incepta Pharmaceutical Ltd.'),
(4, 'Renata Limited'),
(5, 'Bio-Pharma Laboratories Ltd.'),
(6, 'Opsonin Pharma Ltd.'),
(7, 'Aristopharma Ltd.'),
(8, 'General Pharmaceutical Ltd.'),
(9, 'Globe Pharmaceuticals Ltd.'),
(10, 'Healthcare Pharmaceuticals Limited'),
(15, 'Gaco Pharmaceuticals');

-- --------------------------------------------------------

--
-- Table structure for table `drags`
--

CREATE TABLE `drags` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `drags_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drags`
--

INSERT INTO `drags` (`id`, `c_id`, `drags_name`) VALUES
(1, 1, 'Ace Plus'),
(2, 1, 'Facticin'),
(3, 2, 'Acifix'),
(4, 2, 'Napa Extra'),
(5, 3, 'Calcicar'),
(6, 3, 'Paloxiron'),
(7, 4, 'Beconex Zi Syrup'),
(8, 4, 'Fevenil Injection'),
(9, 5, 'Aceta-T Tablet'),
(10, 5, 'Rabecon Tablet'),
(11, 6, 'Finix Tablet'),
(12, 6, 'Vergon Tablet'),
(13, 7, 'Ametil'),
(14, 7, 'Lomeflox'),
(15, 8, 'Cuvir Aciclovir'),
(16, 8, 'Genamox'),
(17, 9, 'Actolin'),
(18, 9, 'MEPCORT TAB'),
(19, 10, 'Novatron'),
(20, 1, 'Fexo'),
(22, 15, 'Omitac-20 mg CAP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drags`
--
ALTER TABLE `drags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `drags`
--
ALTER TABLE `drags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
