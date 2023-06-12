-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 11:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `role`, `password`) VALUES
('Adi Palguna', 'simgapals@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Agung Mahadana', 'mahaadna@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Agus Dharma', 'agusdharma@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Albert Okario', 'albert@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Allycia Devy', 'alice@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Amanda Astawa', 'amandaastawa@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Amanda Mutiara', 'amandamutiara@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Ananda Putra', 'nandagemink@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Angelina Saraswati', 'angelina@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Anom Cahyadi', 'anomcp@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Arisa Kirana', 'risaarisa@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Arisudana Samanjaya', 'arisjanganpercaya@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Bagus Ari', 'kupankgemink@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Dian Merta', 'dian@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Fiona Cista', 'fionaona@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Gung Krisna', 'krisnajoni@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Gusnand', 'gusnand@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Hammam Akmal', 'hammam@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Joko Widodo', 'jokowi@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Krisna Wandhana', 'krisbu@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Mira Merta', 'mira@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Pande Gede Dani', 'dito@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Ramita Pratiwi', 'vyoraa@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Rangga Permana', 'rangga@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Rendra', 'ren@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Saifulloh Rahman', 'rahman@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Suma Gunawan', 'sumagunawan@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('superadmin', 'superadmin@sipomas.com', 'superadmin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Teguh', 'tegaksaatsubuh@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Tude Maha', 'tudemaha@gmail.com', 'admin', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Tude Saputra', 'tudesaputra@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Weda Prema', 'wedaprema@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Yunael', 'yunael@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6'),
('Yunita Liyani', 'yunitaliyani@gmail.com', 'role', 'b0a5ea5209f35b5fb61eddf933b3f7f6');

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
