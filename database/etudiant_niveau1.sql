-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.infinityfree.com
-- Generation Time: Jan 12, 2025 at 09:12 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37977146_etudiant_niveau1`
--
CREATE DATABASE IF NOT EXISTS `etudiant_niveau1`;
USE `etudiant_niveau1`;
-- --------------------------------------------------------

--
-- Table structure for table `attributions`
--

CREATE TABLE `attributions` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `parrain_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attributions`
--

INSERT INTO `attributions` (`id`, `etudiant_id`, `parrain_id`) VALUES
(1, 1, 17),
(2, 2, 1),
(3, 3, 14),
(4, 4, 12),
(5, 5, 16),
(6, 6, 2),
(7, 7, 4),
(8, 8, 5),
(9, 9, 6),
(10, 10, 11),
(11, 11, 16);

-- --------------------------------------------------------

--
-- Table structure for table `usersn1`
--

CREATE TABLE `usersn1` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `filière` varchar(255) NOT NULL,
  `attribution_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersn1`
--

INSERT INTO `usersn1` (`id_user`, `nom`, `prenom`, `tel`, `email`, `password`, `filière`, `attribution_status`) VALUES
(1, 'Niveau 2', 'Premier', 656966582, 'niveau2@gmail.com', '$2y$10$/DjR8wE8Shb3VbG5jy1vu.fSSfPGS/cSDMLscOcLrrk/y5RRSmJk.', 'SR1', 1),
(2, 'wqdqdwqd', 'wqdqwd', 543433, 'dsawedwefwe', '1234', 'SR1', 1),
(3, 'djoks', 'livail', 222121222, 'livail@gmail.com', '$2y$10$efehDYqKTFCAAT.8RxAOvubCNQ/sMm.5.Dx5NBgEfdVhaF80L6ceu', 'GL1B', 1),
(4, 'test2', 'refre', 233432432, 'refre@gmail.com', '$2y$10$Xj0P02atp6PujR0daUMIAOg1NAv1xG1NKvDIInsI.tFIolmsXmeKC', 'SR1', 1),
(5, 'Djoko', 'Ariel', 677777777, 'Arieldjk@gmail.com', '$2y$10$43fUyTu4qxTeI0/u6a/eGeeWMPmVOFH8caWj3ysvVze655RhwvH8C', 'GL1B', 1),
(6, 'Djoko', 'Pharel', 699999999, 'phareldjk@gmail.com', '$2y$10$isvG28DTfgW.p0/J48lVpePDYuupur6dCp8LsSbY.rBZJx9k/AOOy', 'GL1A', 1),
(7, 'Djoko', 'Aurel', 633333333, 'Aureldjk@gmail.com', '$2y$10$6x499y2gxIWypzdYk.3ErOtJZGHLIZRBP4Mr7lXoAd1NgEYp3bASK', 'SR1', 1),
(8, 'clement', 'hatik', 232234321, 'hatik@gmail.com', '$2y$10$VGqbLQSDzb8Hp.j4NxdJ1u5L99JrBfNCKcNCyv0a6eOR5W2VoHK2W', 'GL1A', 1),
(9, 'Djoko', 'Maba', 622222222, 'anydjojo@gmail.com', '$2y$10$s.IySMXZMIWoTcZFPKCBtO.FMWS/QShF/uJBfk8eVUSw3bfp6YPtu', 'GL1A', 1),
(10, 'Djoko', 'Olivier', 611111111, 'olivierdjk@gmail.com', '$2y$10$EN.6imvskJ.c9iVv4WHR8uF.PYpQfWDGlz0T6QAHgzPrrFJicRZIu', 'GL1B', 1),
(11, 'ronisia', 'emma', 234342322, 'emma@gmail.com', '$2y$10$RfDCER4qGInxzgvob./q9OZcX6iyRTu7mgRjNaPFTjJVQvh2Kdbdu', 'SR1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersn2`
--

CREATE TABLE `usersn2` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `filière` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersn2`
--

INSERT INTO `usersn2` (`id_user`, `nom`, `prenom`, `tel`, `email`, `password`, `filière`) VALUES
(1, 'djoko', 'franck', 671524727, 'franckdjk@gmail.com', '$2y$10$rCCkfedMI1PBNZwRK/h8reDZnevoefJUMPJpHlInGvOhd6FsapXSG', 'GL2A'),
(2, 'Foadjo kamdem', 'Nick Giresse', 656966582, 'kamdemnick12@gmail.com', '$2y$10$NSQZYPzkJBgbUObKH/2VVOFsSzaT5eV3GEIzEpbAtIuXplNK5xQ0u', 'GL2A'),
(3, 'Djoko', 'Franck', 671524727, 'frckdjoko@gmail.com', '$2y$10$11QyKAfQRTdxnr3ygiNkXOmR4eLHXy41u73UTNBxIrCeXT9l/LnfG', 'GL2A'),
(4, 'test2', 'test', 566778890, 'test@gmail.com', '$2y$10$XELoBQVQ9Ftaid3tEL92xu9OKWAGb5vzua4Oq/IOUH8NkM/uUtNpG', 'GL2B'),
(5, 'lucw', 'jean', 111111111, 'jean@gmail.com', '$2y$10$8E29fW0KLnWmkEYgixzpy.h.MTHXPzb6Tz.pRtUEAlEXFvBoj0sFa', 'GL2A'),
(6, 'booba', 'elie', 545454543, 'elie@gmail.com', '$2y$10$7ute5cZLMox9d/R/q8FeeejpGjBCow8aCz5HfBMaz5hpvHSQHrNCG', 'GL2B'),
(7, 'charo', 'stanislas', 324321232, 'charo@gmail.com', '$2y$10$qRdJqVBglSe6mrrrh3F0Aej4NTU6esQAX0RPye9sAji70E.Aby55a', 'SR2'),
(8, 'Djoko', 'Yvette', 644444444, 'yvettedjk@gmail.com', '$2y$10$dHb.LiW265ruDbCIBWfJ0O4JbeL357Y/4t3/ozIqGuQFIhQM.0FL2', 'GL2B'),
(9, 'Nduidjz', 'Justine', 688888888, 'justinekmg@gmail.com', '$2y$10$yxy.7ySG82du29c6dO.BsOIx2hAjSaeRqhENVTtwNOCF7Tq0l4VCG', 'SR2'),
(10, 'kenne', 'barcelonais', 2342323, 'barcelonais@gmail.com', '$2y$10$aZDWX18.rGRonpEYE3h9Qe/fWjdvGtB51DM94xTQKMzAIsm.QQiK2', 'GL2A'),
(11, 'Kemmogne', 'Hilaire', 655555555, 'Hilairekmg@gmail.com', '$2y$10$OsdUGqYFXstdPn3XDc1eT.qtbJTyZldXoO4lO28AvE9GJk/Be5u8q', 'SR2'),
(12, 'Kouan', 'Murielle', 600000000, 'muriellekn@gmail.com', '$2y$10$R3GL5mgTB4giiXvhFPlriO4xN13hzkqcQ//4Sswxo0ibvkWzOjQya', 'GL2B'),
(13, 'lucs bernard', 'jean', 121324124, 'bernard@gmail.com', '$2y$10$hPz8ZjaUimwEmNAIySVvyO9YdAA6BVdZQLX7e/xeUfsBIiCxa8Doa', 'GL2A'),
(14, 'Kotti', 'Catrielle', 644444444, 'catriellektt@gmail.com', '$2y$10$vrEP5MZ6DhPbY91WbL15xeQ.53h/cCq/v4n5cwn8Ti0fhOEokTa/e', 'GL2A'),
(15, 'panther', 'black', 324323121, 'panther@gmail.com', '$2y$10$DGHSi9ILrdG3eD3qe.Ls3OgzAk4mVzb5loOpZMU3/AniFtdg4cUj.', 'GL2B'),
(16, 'Asolefac', 'Ateufo', 689898989, 'ateufoaslfc@gmail.com', '$2y$10$qw9zKlLxsR7vogRZroSSIOZCFA0AlaffP9mXFYhSxmUYH6W.KBEBK', 'GL2A'),
(17, 'Moscardini', 'Emile', 674589958, 'emilemoscardini@gmail.com', '$2y$10$/ntOW0wTuARzhYyUMJH1Vewm.WBRP6uQe4mlt19jecm9IS0Q4pOxq', 'SR2'),
(18, 'Dagelle', 'Anelka', 258036906, 'anelkadgl@gmail.com', '$2y$10$RgFZ8IKehiqfDt7n/1Gh6er6bP0tZBKRxrFoyOM/ZAsKNLjypCEhG', 'GL2A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributions`
--
ALTER TABLE `attributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersn1`
--
ALTER TABLE `usersn1`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usersn2`
--
ALTER TABLE `usersn2`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributions`
--
ALTER TABLE `attributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usersn1`
--
ALTER TABLE `usersn1`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usersn2`
--
ALTER TABLE `usersn2`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
