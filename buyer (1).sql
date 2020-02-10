-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2020 at 06:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `email`, `objet`, `message`) VALUES
(1, 'Placide', 'foplacide@gmail.com', 'hello', 'I have a millionaire mind');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(11) NOT NULL,
  `nom_fournisseur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fournisseur`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `id_service`, `nom_fournisseur`) VALUES
(1, 9, 'Orange'),
(2, 9, 'MTN'),
(8, 10, 'orange'),
(9, 10, 'mtn'),
(10, 10, 'nextell'),
(14, 13, 'Pharmacie de Douala'),
(15, 16, 'Institut Universitaire de la cote'),
(18, 17, 'Eneo'),
(19, 18, 'Camwater');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'foplacide@yahoo.com'),
(2, 'foplacide@yahoo.com'),
(3, 'foplacide@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_adress`
--

DROP TABLE IF EXISTS `order_adress`;
CREATE TABLE IF NOT EXISTS `order_adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `numerofacture` varchar(255) DEFAULT NULL,
  `numero` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_adress`
--

INSERT INTO `order_adress` (`id`, `firstname`, `email`, `city`, `pincode`, `command`, `amount`, `numerofacture`, `numero`, `id_user`) VALUES
(1, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test1                                                    ', '18,00', NULL, '1254564jhgf2', 0),
(2, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test1                                                    ', '18,00', NULL, '1254564jhgf2', 0),
(3, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test1                                                    ', '18,00', '1254552498559885689885565', '1254564jhgf2', 0),
(4, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', NULL, '1254564jhgf2', 0),
(5, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', '123456789123456789654123', '1254564jhgf2', 0),
(6, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', '123456789123456789654123', '1254564jhgf2', 0),
(7, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', '123456789123456789654123', '1254564jhgf2', 0),
(8, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', NULL, '1254564jhgf2', 0),
(9, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test2                                                    ', '32,00', '123456789123456789654123', '1254564jhgf2', 0),
(10, 'placide', 'placide@gmail.com', 'placide', '123456', '                                                  test1                                                    ', '18,00', NULL, '1254564jhgf2', 82);

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom_pays`) VALUES
(1, 'Cameroun'),
(2, 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(7, 'Facture d\'Eau', NULL, ''),
(9, '500 fcfa seront reçus', 0.83, ''),
(10, '1000 fcfa seront reçus', 1.67, ''),
(13, '1500 fcfa seront recus', 2.6, ''),
(14, '2000 fcfa seront reçus', 3.4, ''),
(15, '2500 fcfa seront reçus', 4.2, ''),
(18, '3000 fcfa seront reçus', 5.1, ''),
(19, '4000 fcfa seront reçus', 6.7, ''),
(20, '4500 fcfa seront reçus', 7.6, ''),
(21, '5000 fcfa seront reçus', 8.4, ''),
(22, '10000 fcfa seront reçus', 16.8, ''),
(28, '15 000 fcfa seront reçus ', 25.1, ''),
(29, '20 000 fcfa seront reçus', 33.36, ''),
(32, 'Facture d\'Electricite', NULL, ''),
(34, '80 Mo seront reçus', 0.2, ''),
(35, '125 Mo seront reçus', 0.45, ''),
(38, '300 Mo seront reçus', 0.85, ''),
(39, '1 Go seront recus', 1.68, ''),
(42, '250 Mo seront reçus', 0.8, ''),
(43, '175 Mo seront reçus', 0.6, ''),
(47, '4.6 Go seront reçus', 7.4, ''),
(48, '1.5 Go seront reçus', 6.7, ''),
(50, '9 Go seront reçus', 16.7, ''),
(52, '9 Go seront reçus', 16.7, ''),
(53, '19 Go seront reçus ', 33.35, ''),
(54, '100 Mo seront reçus', 0.2, ''),
(55, '250 Mo seront reçus', 0.45, ''),
(58, '600 Mo seront reçus', 0.85, ''),
(59, '2Go seront reçus', 1.68, ''),
(62, '200 Mo seront reçus', 1.2, ''),
(63, '750 Mo seront recus', 1.68, ''),
(66, '3 Go seront reçus', 5.2, ''),
(67, '1.2 Go seront reçus', 3.4, ''),
(70, '3 Go seront reçus', 6.8, ''),
(71, '9.2 Go seront reçus', 7.7, ''),
(72, '1 Go seront reçus par jour', 16.7, '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_ville` int(11) NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  PRIMARY KEY (`id_service`),
  KEY `id_ville` (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `id_ville`, `nom_service`) VALUES
(9, 1, 'Connexion Internet'),
(10, 1, 'Credit de communication'),
(13, 1, 'Paiement sante'),
(16, 1, 'Scolarite'),
(17, 1, 'Electricite'),
(18, 1, 'Paiment eau');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(72, 'zuck', 'zuckerberg@facebook.com', '$2y$10$O6aBIkJUo8ASiFWNerNo3eH7bfEHt/fSYU8PeMmUjGgNnmivuBqeO'),
(81, 'Placide', 'foplacide@gmail.com', '$2y$10$5b1V7wAMMYEFwC5Q1..gluHmXYJMuw8d45lOcZT8Iw8y5FypCvGme'),
(82, 'Placide', 'foplacide@yahoo.com', '$2y$10$tRJmC5U4oo.uvZclddXJUOJs0GLHTPMrnVnGsQiz4ymn8F1b4Xhiu');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `id_pays` int(11) NOT NULL,
  `nom_ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ville`),
  KEY `id_pays` (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id_ville`, `id_pays`, `nom_ville`) VALUES
(1, 1, 'Douala'),
(2, 1, 'Yaounde');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`);

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
