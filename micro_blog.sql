-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Janvier 2017 à 20:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `micro_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `date_emission` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=91 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date_emission`, `user_id`) VALUES
(68, 'Test', 1484663234, 0),
(69, 'Test3', 1484663238, 0),
(70, 'Test4', 1484663242, 0),
(71, 'Test5', 1484663246, 0),
(72, 'Test6', 1484663252, 0),
(73, 'Test7', 1484663256, 0),
(74, 'Test8', 1484663261, 0),
(75, 'Test9', 1484663267, 0),
(76, 'Test10\r\n', 1484663318, 0),
(77, 'Test11', 1484663324, 0),
(78, 'Test12', 1484663328, 0),
(79, 'Test13', 1484663331, 0),
(80, 'Test14', 1484663338, 0),
(81, 'Test15', 1484663343, 0),
(82, 'Test16', 1484663561, 0),
(83, 'Test17', 1484663575, 0),
(84, 'Test18', 1484663600, 0),
(85, 'Test19', 1484663604, 0),
(86, 'Test20', 1484663607, 0),
(87, 'Test21', 1484663610, 0),
(88, 'admin', 1484664046, 0),
(89, 'gfdbdfb', 1484664938, 0),
(90, 'sdjskldgs', 1484665023, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(30) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(32) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(50) COLLATE utf8_bin NOT NULL,
  `sid` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`,`pseudo`,`mail`),
  UNIQUE KEY `U_ID` (`id`),
  UNIQUE KEY `U_PSEUDO` (`pseudo`),
  UNIQUE KEY `U_MAIL` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table regroupant les utilisateurs' AUTO_INCREMENT=21 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `mail`, `mdp`, `sid`) VALUES
(1, '', '', 'admin', 'admin@admin.fr', 'admin', 'ea1753e7945dce01755cbad9f5984d511484666903'),
(2, '', '', 'pseudo', 'mail@mail.fr', 'mdp', 'f831e5c95d8239bc1f8cad3067a2aa371484655593'),
(3, '', '', 'Ada', 'ada@ada.fr', 'qs', '8110f04dfa10940c7cbaac5017d2c2761484861403'),
(5, '', '', 'adada', 'adaada@mail.fr', 'qsdqsdqsdqsd', ''),
(6, '', '', 'sdfsdfqsfqsdf', 'sqfsqdfq@dq.desfdf', 'sdqfsqdf', ''),
(8, '', '', 'qsdfqsdf', 'qsfd@fr.fr', 'qsdqsd', ''),
(11, '', '', 'test', 'test@test.fr', 'test', '1d2ab164559aaf8a30eebf516d2f63ad1484898499'),
(16, '', '', 'sqfdfqdf', 'sqdf@sqdf.fr', 'df', ''),
(17, 'Aurelien', 'Ducloy', 'Aurel', 'aurel@aurel.fr', 'aurel', ''),
(18, 'test', 'test', 'test12', 'test12@test.fr', 'test', ''),
(19, 'sqdfdsfq', 'dsfqsdf', 'sqdfsqdf', 'sfsqdf@fr.fr', 'qq', ''),
(20, 'test', 'test', 'test13', 'test13@test13.fr', 'test13', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
