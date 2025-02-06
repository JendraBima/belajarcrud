-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2025 at 02:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `ekskul` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id`, `nama`, `nisn`, `jurusan`, `ekskul`, `email`, `gambar`) VALUES
(75, 'sabyan', '10011', 'Nguli', 'valorant', 'dio@gmail.com', '247366.png'),
(77, 'sabyan', '100112', 'Nguli', 'valorant', 'dccio@gmail.com', '465796.png'),
(78, 'sabyan', '1001124', 'Nguli', 'valorant', 'dccio5@gmail.com', '626524.png'),
(79, 'sabyan', '1', 'Nguli', 'valorant', 'cio5@gmail.com', '382502.png'),
(85, 'bimantara', '78', 'Nguli', 'jndjdn', 'cio85@gmail.com', '608585.png'),
(88, 'bimantara', '7811', 'Nguli', 'jndjdn', 'cioa851@gmail.com', '737.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `gambar` (`gambar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
