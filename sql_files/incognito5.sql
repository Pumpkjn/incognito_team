-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Mars 2018 à 13:29
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `incognito`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Cat 1', 'cat-1'),
(2, 'Cat 2', 'cat-2'),
(3, 'Cat 3', 'cat-3');

-- --------------------------------------------------------

--
-- Structure de la table `categories_ideas`
--

CREATE TABLE `categories_ideas` (
  `id` int(11) UNSIGNED NOT NULL,
  `idea_id` int(11) UNSIGNED DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories_ideas`
--

INSERT INTO `categories_ideas` (`id`, `idea_id`, `category_id`) VALUES
(1, NULL, 2),
(2, NULL, 3),
(4, NULL, 2),
(6, 5, 1),
(7, 5, 2),
(8, 6, 1),
(9, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `idea_id` int(11) UNSIGNED DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `deps`
--

CREATE TABLE `deps` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `deps`
--

INSERT INTO `deps` (`id`, `name`) VALUES
(1, 'Computer'),
(2, 'Art'),
(3, 'Finance');

-- --------------------------------------------------------

--
-- Structure de la table `deps_data`
--

CREATE TABLE `deps_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `dep_id` int(11) UNSIGNED DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `deps_data`
--

INSERT INTO `deps_data` (`id`, `dep_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'thumbnail', ''),
(2, 2, 'thumbnail', ''),
(3, 3, 'thumbnail', '');

-- --------------------------------------------------------

--
-- Structure de la table `ideas`
--

CREATE TABLE `ideas` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `close_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `status`, `date`, `close_date`) VALUES
(4, 4, NULL, '2018-03-05 19:43:26', NULL),
(5, 3, NULL, '2018-03-05 20:51:17', NULL),
(6, 3, NULL, '2018-03-05 20:53:21', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ideas_metadata`
--

CREATE TABLE `ideas_metadata` (
  `id` int(11) UNSIGNED NOT NULL,
  `idea_id` int(11) UNSIGNED DEFAULT NULL,
  `meta_key` varchar(64) DEFAULT NULL,
  `meta_value` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ideas_metadata`
--

INSERT INTO `ideas_metadata` (`id`, `idea_id`, `meta_key`, `meta_value`) VALUES
(1, NULL, 'title', 'Test Idea in computer'),
(2, NULL, 'desc', 'Some desc'),
(3, NULL, 'dep', '1'),
(4, NULL, 'topic', '2'),
(5, NULL, 'views', '0'),
(6, NULL, 'thumbup', '0'),
(7, NULL, 'thumbdown', '0'),
(8, NULL, 'anonymousSubmit', 'false'),
(9, NULL, 'attachment_dir', '../uploads/1_5a9d777218834'),
(10, NULL, 'title', 'Test'),
(11, NULL, 'desc', 't323'),
(12, NULL, 'dep', '3'),
(13, NULL, 'topic', 'undefined'),
(14, NULL, 'views', '0'),
(15, NULL, 'thumbup', '0'),
(16, NULL, 'thumbdown', '0'),
(17, NULL, 'anonymousSubmit', 'false'),
(18, NULL, 'title', 'Test idea'),
(19, NULL, 'desc', 'asfasfasf'),
(20, NULL, 'dep', '2'),
(21, NULL, 'topic', '3'),
(22, NULL, 'views', '0'),
(23, NULL, 'thumbup', '0'),
(24, NULL, 'thumbdown', '0'),
(25, NULL, 'anonymousSubmit', 'false'),
(26, 4, 'title', 'revslider'),
(27, 4, 'desc', 'asasffsfsf'),
(28, 4, 'dep', '1'),
(29, 4, 'topic', '1'),
(30, 4, 'views', '0'),
(31, 4, 'thumbup', '0'),
(32, 4, 'thumbdown', '0'),
(33, 4, 'anonymousSubmit', 'true'),
(34, 4, 'attachment_dir', '../uploads/4_5a9d8fcf557ec'),
(35, 5, 'title', 'test zip'),
(36, 5, 'desc', 'test download'),
(37, 5, 'dep', '2'),
(38, 5, 'topic', '3'),
(39, 5, 'views', '32'),
(40, 5, 'thumbup', '0'),
(41, 5, 'thumbdown', '0'),
(42, 5, 'anonymousSubmit', 'false'),
(43, 5, 'attachment_dir', '../uploads/5_5a9d9fb5cf81f'),
(44, 6, 'title', 'test zip'),
(45, 6, 'desc', 'test download 32'),
(46, 6, 'dep', '1'),
(47, 6, 'topic', '1'),
(48, 6, 'views', '9'),
(49, 6, 'thumbup', '0'),
(50, 6, 'thumbdown', '0'),
(51, 6, 'anonymousSubmit', 'false'),
(52, 6, 'attachment_dir', '../uploads/6_5a9da031e2f5a');

-- --------------------------------------------------------

--
-- Structure de la table `open_subs`
--

CREATE TABLE `open_subs` (
  `id` int(10) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `dep_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `open_subs`
--

INSERT INTO `open_subs` (`id`, `title`, `date`, `closure_date`, `status`, `dep_id`) VALUES
(1, 'Test', '2018-02-27 21:03:39', '2018-03-06 21:03:39', b'1', 1),
(3, 'Test Art', '2018-02-27 21:10:05', '2018-03-06 21:10:05', b'1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `dep_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `dep_id`) VALUES
(3, 'admin', 'admin', 'Allen', 'pumpkjn1508@gmail.com', 0, NULL),
(4, 'coor1@gmail.com', 'coor', 'Computer Coor', 'coor1@gmail.com', 1, 1),
(5, 'coor2@gmail.com', 'coor', 'Art Coor', 'coor2@gmail.com', 1, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_ideas`
--
ALTER TABLE `categories_ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_ref` (`category_id`),
  ADD KEY `idea_ref` (`idea_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_idea_ref` (`idea_id`),
  ADD KEY `commnet_user_ref` (`user_id`);

--
-- Index pour la table `deps`
--
ALTER TABLE `deps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deps_data`
--
ALTER TABLE `deps_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deps_ref` (`dep_id`);

--
-- Index pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_id`);

--
-- Index pour la table `ideas_metadata`
--
ALTER TABLE `ideas_metadata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_idea_ref` (`idea_id`);

--
-- Index pour la table `open_subs`
--
ALTER TABLE `open_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_ref_open_sub` (`dep_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_unique` (`username`) USING BTREE,
  ADD KEY `dep_user_ref` (`dep_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories_ideas`
--
ALTER TABLE `categories_ideas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `deps`
--
ALTER TABLE `deps`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `deps_data`
--
ALTER TABLE `deps_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ideas_metadata`
--
ALTER TABLE `ideas_metadata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `open_subs`
--
ALTER TABLE `open_subs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categories_ideas`
--
ALTER TABLE `categories_ideas`
  ADD CONSTRAINT `category_ref` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `commnet_user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `deps_data`
--
ALTER TABLE `deps_data`
  ADD CONSTRAINT `deps_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `ideas_metadata`
--
ALTER TABLE `ideas_metadata`
  ADD CONSTRAINT `meta_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `open_subs`
--
ALTER TABLE `open_subs`
  ADD CONSTRAINT `dep_ref_open_sub` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `dep_user_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
