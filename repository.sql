-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 10:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repository`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(255) NOT NULL,
  `abstract` varchar(550) NOT NULL,
  `articleTopic` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `abstract`, `articleTopic`, `category`, `author`, `fileName`) VALUES
(3, 'Biodiesel has gained more recognition as a fuel to replace fossil fuel which has cause a lot of damage \r\nto the environment and high cost of the product. The best way to reduce the cost of the production of \r\nbiodiesel is to use feed stocks which are cheap which accounts for the larger percentage of biodiesel \r\nproduction cost. The use of less expensive feed stock and optimization of process variables that affect \r\nthe yield presents the opportunity of significantly reduction of the cost. ', 'Synthesis of Heterogeneous Catalyst from Waste Snail Shells for Biodiesel Production using  Afzelia africana Seed Oil', 'microbiology', 'Otori, A. A., Mann, A., Suleiman, M. A.T.3 and Egwim, E. C.', 'attah1 (2).docx'),
(4, 'This review focus on the use of Mornga oleifera seed extract and it application \r\nin the environment. It is usually referred to as the miracle tree because of its \r\nvast usefulness of its various parts. It is a source of protein, calcium, iron, \r\ncarotenoids and phytochemicals utilized for several usage in developing \r\ncountries. The plant parts have been used in various application such as \r\nmedicine, cosmetics, food supplements and water purification. ', 'Moringa Oleifera Seed Extract: A Review on Its  Environmental Applications', 'microbiology', 'Munirat Abolore Idris (2026)', 'Proximate_Nutritional_Analysis_and_Heavy_Metal_Composition_of_dried_Moringa_Oleifera_Leaves_from_Oshiri__Onicha_LGA__Ebonyi_State__Niger-libre.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, 'computer science'),
(3, 'microbiology');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matNo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `matNo`, `category`, `password`, `status`) VALUES
(1, 'administrator', 'admin@email.com', '', 'admin', 'password', 'approved'),
(2, 'Mike Dean', 'mikedean@gmail.com', 'ecu/csit/20202', 'student', 'password', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
