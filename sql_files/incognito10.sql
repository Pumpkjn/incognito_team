-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Avril 2018 à 23:50
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
(11, 'computer', 'computer'),
(12, 'accessories', 'accessories'),
(13, 'facilities', 'facilities'),
(14, 'parking', 'parking'),
(15, 'library', 'library'),
(16, 'student service', 'student-service'),
(17, 'employability', 'employability'),
(18, 'internship', 'internship'),
(19, 'graduation', 'graduation'),
(20, 'event', 'event'),
(21, 'website', 'website'),
(22, 'IT ', 'it'),
(23, 'contest', 'contest'),
(24, 'competition', 'competition'),
(25, 'training', 'training');

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
(24, 15, 11),
(25, 15, 12),
(26, 16, 16),
(27, 17, 17),
(28, 17, 18),
(29, 17, 20),
(30, 18, 12),
(31, 18, 13),
(32, 19, 11),
(33, 19, 12),
(34, 19, 13),
(35, 20, 16),
(36, 20, 20),
(37, 21, 11),
(38, 21, 13),
(39, 21, 20),
(40, 22, 11),
(41, 22, 12),
(42, 22, 15),
(43, 23, 17),
(44, 23, 18),
(45, 24, 21),
(46, 24, 22),
(47, 25, 23),
(48, 25, 24),
(49, 26, 18),
(50, 26, 20),
(51, 27, 15),
(52, 27, 16),
(53, 27, 20),
(54, 28, 20),
(55, 28, 25),
(56, 29, 12),
(57, 29, 13),
(58, NULL, 18),
(59, NULL, 11),
(60, NULL, 14),
(61, NULL, 11),
(62, NULL, 13),
(65, NULL, 12),
(66, NULL, 13),
(67, 36, 12),
(68, 36, 13);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `idea_id` int(11) UNSIGNED DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment_status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `idea_id`, `content`, `user_id`, `date`, `comment_status`) VALUES
(1, 21, 'Good idea !', 1, '2018-03-26 12:44:37', 0),
(2, 21, 'I dont think its good idea', 1, '2018-03-26 12:45:54', 1),
(3, 18, 'Good idea !', 17, '2018-03-26 12:50:30', 0),
(4, 22, 'Great idea', 22, '2018-03-26 12:53:43', 0),
(5, NULL, 'im commenting ', 20, '2018-03-27 01:53:25', 0),
(6, NULL, 'tesst', 20, '2018-03-27 01:54:36', 0),
(7, NULL, 'commenting', 20, '2018-03-27 02:00:41', 0),
(8, NULL, 'anonymous comment , the user name will be hidden for staff and QA coordinator from other department', 20, '2018-03-27 02:01:20', 1),
(9, 36, 'comment to mine idea', 20, '2018-03-27 02:08:59', 0),
(10, 36, 'anonymous comment that cant be seen from staff or QA coordination from other department', 20, '2018-03-27 02:09:30', 1),
(11, 36, 'hmm this idea is abccc', 30, '2018-03-27 02:11:01', 0);

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
(11, 'Architecture, Computing and Humanities'),
(12, 'Business school'),
(13, 'Education and health'),
(14, 'Engineering and Science'),
(22, 'New Dept');

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
(11, 11, 'thumbnail', ''),
(12, 12, 'thumbnail', ''),
(13, 13, 'thumbnail', ''),
(14, 14, 'thumbnail', ''),
(15, NULL, 'thumbnail', ''),
(16, NULL, 'thumbnail', ''),
(17, NULL, 'thumbnail', ''),
(18, NULL, 'thumbnail', ''),
(19, NULL, 'thumbnail', ''),
(20, NULL, 'thumbnail', ''),
(21, NULL, 'thumbnail', ''),
(22, 22, 'thumbnail', '');

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
(15, 1, NULL, '2018-03-26 11:05:23', NULL),
(16, 19, NULL, '2018-03-26 11:29:21', NULL),
(17, 18, NULL, '2018-03-26 11:35:43', NULL),
(18, 20, NULL, '2018-03-26 11:40:24', NULL),
(19, 20, NULL, '2018-03-26 11:43:23', NULL),
(20, 20, NULL, '2018-03-26 11:50:42', NULL),
(21, 1, NULL, '2018-03-26 11:56:31', NULL),
(22, 22, NULL, '2018-03-26 12:05:02', NULL),
(23, 17, NULL, '2018-03-26 14:44:02', NULL),
(24, 1, NULL, '2018-03-26 14:50:54', NULL),
(25, 18, NULL, '2018-03-26 14:54:45', NULL),
(26, 18, NULL, '2018-03-26 14:59:47', NULL),
(27, 19, NULL, '2018-03-26 15:02:55', NULL),
(28, 19, NULL, '2018-03-26 15:05:11', NULL),
(29, 1, NULL, '2018-03-26 15:09:03', NULL),
(36, 20, NULL, '2018-03-27 02:08:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ideas_metadata`
--

CREATE TABLE `ideas_metadata` (
  `id` int(11) UNSIGNED NOT NULL,
  `idea_id` int(11) UNSIGNED DEFAULT NULL,
  `meta_key` varchar(64) DEFAULT NULL,
  `meta_value` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ideas_metadata`
--

INSERT INTO `ideas_metadata` (`id`, `idea_id`, `meta_key`, `meta_value`) VALUES
(111, 15, 'title', 'Upgrade SSD for every computers in labs'),
(112, 15, 'desc', 'Phasellus id sodales ex. Cras ut viverra lorem. Nullam eu ligula semper lacus cursus gravida. Fusce feugiat fringilla congue. Donec fermentum rhoncus eros sit amet vehicula. Morbi laoreet dolor nunc, nec eleifend nulla varius vel. Aliquam auctor erat quis leo egestas, eget porttitor metus aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi sodales vitae tortor nec tempus. Morbi gravida sapien non iaculis porttitor. Cras volutpat, nibh sed malesuada porttitor, neque quam pellentesque sem, vitae iaculis purus metus eget neque. Etiam ultricies felis turpis, nec semper tellus iaculis vel. Cras laoreet sapien sit amet leo eleifend, blandit eleifend sem tempor. Morbi sollicitudin, diam ac ultrices maximus, augue lacus convallis mi, sed congue dolor nulla non nisi.'),
(113, 15, 'dep', '11'),
(114, 15, 'topic', '5'),
(115, 15, 'views', '4'),
(116, 15, 'thumbup', '17'),
(117, 15, 'thumbdown', ''),
(118, 15, 'total_fav', '999'),
(119, 15, 'anonymousSubmit', 'false'),
(120, 16, 'title', 'Short course in how to write a good essay'),
(121, 16, 'desc', 'Vestibulum a tincidunt elit, vitae sollicitudin nisl. Pellentesque congue, neque ac sagittis rhoncus, ex neque tristique quam, id vulputate enim felis suscipit urna. Aliquam erat volutpat. Praesent sed placerat diam. Morbi id velit massa. Praesent vel ex tempus, ornare orci sed, venenatis nulla. Vivamus id egestas ante, eu commodo ligula. Curabitur accumsan gravida mauris, a lobortis tortor semper imperdiet. Integer in odio tempor, ultricies libero in, auctor tortor. Proin vitae est sed mauris pellentesque ultricies.'),
(122, 16, 'dep', '13'),
(123, 16, 'topic', '6'),
(124, 16, 'views', '1'),
(125, 16, 'thumbup', ''),
(126, 16, 'thumbdown', ''),
(127, 16, 'total_fav', '0'),
(128, 16, 'anonymousSubmit', 'false'),
(129, 17, 'title', 'Skills and Development Week'),
(130, 17, 'desc', 'Quisque maximus tortor in felis molestie tempus. Pellentesque a lorem orci. Donec tempor est ac nunc sodales, eget ultrices sapien suscipit. Sed varius sodales gravida. Donec et risus interdum, venenatis tortor eget, vestibulum lacus. Curabitur est enim, commodo a fringilla vitae, convallis id enim. Duis et viverra magna. Vivamus malesuada odio nibh. Mauris eget ante sed nisi vulputate tincidunt a id neque. Donec placerat, nulla a dapibus lacinia, risus risus dignissim erat, in ullamcorper justo urna ac sem. Cras fringilla sem vel dolor vestibulum hendrerit. Cras est odio, consequat vitae turpis eget, elementum placerat eros. Maecenas sollicitudin leo quis dui gravida congue.'),
(131, 17, 'dep', '12'),
(132, 17, 'topic', '5'),
(133, 17, 'views', '1'),
(134, 17, 'thumbup', ''),
(135, 17, 'thumbdown', ''),
(136, 17, 'total_fav', '0'),
(137, 17, 'anonymousSubmit', 'false'),
(138, 18, 'title', 'Construction of new room in Queen Anne building'),
(139, 18, 'desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl dui, pretium at cursus ac, mollis non urna. Fusce ac finibus tortor, eget efficitur tortor. Mauris consequat massa at purus cursus egestas. Duis tristique consectetur tellus ac molestie. Ut varius velit ut nisl molestie efficitur. Maecenas eu consectetur ligula. Ut malesuada, velit eget luctus imperdiet, enim mi venenatis libero, vel sagittis felis nunc eget orci. Curabitur malesuada vitae enim sit amet facilisis. Vivamus quis sagittis lacus. Aenean lobortis urna quis sagittis tristique. Suspendisse dolor diam, ultricies at sem sit amet, ullamcorper elementum neque. Donec iaculis pellentesque leo, quis hendrerit nulla tempor quis.'),
(140, 18, 'dep', '14'),
(141, 18, 'topic', '8'),
(142, 18, 'views', '7'),
(143, 18, 'thumbup', ''),
(144, 18, 'thumbdown', ''),
(145, 18, 'total_fav', '0'),
(146, 18, 'anonymousSubmit', 'false'),
(147, 19, 'title', 'Equip VGA for PCs to support students of Game Development courses'),
(148, 19, 'desc', 'Quisque nec neque congue est gravida faucibus. Maecenas ornare accumsan ipsum nec consectetur. Etiam laoreet dolor tellus, vitae elementum sem hendrerit eget. Proin ultricies hendrerit ligula sit amet hendrerit. Maecenas in efficitur enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec purus in magna facilisis euismod. In quis lacus at lacus tempus porta. Donec sodales, magna a faucibus vestibulum, lacus nisl egestas lacus, non iaculis libero felis vitae metus. Praesent volutpat, ante sed accumsan dapibus, ipsum leo lacinia tellus, eget tincidunt purus ex ut arcu. Maecenas suscipit a erat nec pulvinar. Duis euismod pulvinar tellus, non rutrum nulla.'),
(149, 19, 'dep', '11'),
(150, 19, 'topic', '5'),
(151, 19, 'views', '3'),
(152, 19, 'thumbup', ''),
(153, 19, 'thumbdown', ''),
(154, 19, 'total_fav', '0'),
(155, 19, 'anonymousSubmit', 'false'),
(156, 20, 'title', 'Short course in building resumes'),
(157, 20, 'desc', 'Donec et diam at justo ornare auctor. Sed elementum pharetra urna, id ultrices nulla sodales mollis. Praesent sed laoreet ligula, quis mollis tellus. Quisque a augue urna. Praesent ultricies commodo pretium. Aliquam orci nisl, suscipit a mollis nec, viverra vel ipsum. Nulla non placerat arcu, id consequat est. Duis nec pharetra erat. Quisque dapibus pulvinar nunc congue ullamcorper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vulputate risus libero, nec iaculis ligula hendrerit id. Curabitur at erat ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.'),
(158, 20, 'dep', '13'),
(159, 20, 'topic', '6'),
(160, 20, 'views', '2'),
(161, 20, 'thumbup', ''),
(162, 20, 'thumbdown', ''),
(163, 20, 'total_fav', '0'),
(164, 20, 'anonymousSubmit', 'false'),
(165, 21, 'title', 'Hold programming contest for IT students'),
(166, 21, 'desc', 'Nulla urna nunc, laoreet non dolor sit amet, blandit tincidunt lacus. Nulla fermentum, nisl ut tincidunt ultricies, nulla mauris blandit quam, sit amet laoreet felis lacus condimentum velit. Proin nec euismod mauris. Etiam ullamcorper orci in erat auctor, et malesuada augue tincidunt. Suspendisse velit ex, blandit euismod leo varius, porttitor dignissim orci. Curabitur vel tincidunt sem. Aliquam pellentesque venenatis pellentesque. Curabitur vel lobortis magna. Phasellus tellus ex, feugiat non odio sit amet, malesuada dignissim nisi.'),
(167, 21, 'dep', '11'),
(168, 21, 'topic', '9'),
(169, 21, 'views', '35'),
(170, 21, 'thumbup', ''),
(171, 21, 'thumbdown', '22'),
(172, 21, 'total_fav', '999'),
(173, 21, 'anonymousSubmit', 'false'),
(174, 22, 'title', 'Forgot your student card ID card? Use an NFC enabled device. '),
(175, 22, 'desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget sem leo. Cras bibendum porta eros sit amet aliquet. Maecenas scelerisque, nisl non gravida facilisis, felis magna dictum nulla, non convallis ligula enim vel mauris. Quisque vestibulum nulla nulla, sit amet viverra leo suscipit et.'),
(176, 22, 'dep', '14'),
(177, 22, 'topic', '10'),
(178, 22, 'views', '20'),
(179, 22, 'thumbup', '22'),
(180, 22, 'thumbdown', '17'),
(181, 22, 'total_fav', '998'),
(182, 22, 'anonymousSubmit', 'false'),
(183, 23, 'title', 'Placement year for second-year students'),
(184, 23, 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.'),
(185, 23, 'dep', '12'),
(186, 23, 'topic', '7'),
(187, 23, 'views', '1'),
(188, 23, 'thumbup', ''),
(189, 23, 'thumbdown', ''),
(190, 23, 'total_fav', '0'),
(191, 23, 'anonymousSubmit', 'false'),
(192, 24, 'title', 'Make the website reponsive'),
(193, 24, 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.'),
(194, 24, 'dep', '11'),
(195, 24, 'topic', '11'),
(196, 24, 'views', '1'),
(197, 24, 'thumbup', ''),
(198, 24, 'thumbdown', ''),
(199, 24, 'total_fav', '0'),
(200, 24, 'anonymousSubmit', 'false'),
(201, 25, 'title', 'Student selection for the national contests'),
(202, 25, 'desc', 'Duis nunc augue, viverra id lectus aliquam, interdum aliquet libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor libero nec velit eleifend ullamcorper. Curabitur non felis vel magna scelerisque sodales a vitae dolor. Curabitur rutrum eget ipsum in dapibus. Phasellus molestie velit tortor, non finibus felis maximus at. Praesent et enim scelerisque lacus fermentum tincidunt non id leo. Vestibulum interdum tellus id diam mattis rutrum.'),
(203, 25, 'dep', '12'),
(204, 25, 'topic', '12'),
(205, 25, 'views', '3'),
(206, 25, 'thumbup', ''),
(207, 25, 'thumbdown', ''),
(208, 25, 'total_fav', '0'),
(209, 25, 'anonymousSubmit', 'false'),
(210, 26, 'title', 'Business employability fair'),
(211, 26, 'desc', 'Fusce fermentum est in aliquam ornare. Morbi sed sagittis augue. Mauris quis ex volutpat velit iaculis consequat. Vestibulum mauris elit, feugiat ac nibh sit amet, condimentum feugiat enim. Phasellus posuere enim at elementum ornare. Maecenas a mi augue. Donec elementum, massa in tincidunt efficitur, odio neque suscipit risus, in viverra sapien nibh eu ligula. Mauris suscipit sem auctor, egestas dolor nec, vestibulum urna. Proin ut tortor convallis, sollicitudin turpis sit amet, iaculis est. Nunc congue nisl nec molestie faucibus. Fusce et finibus ipsum.\r\n\r\n'),
(212, 26, 'dep', '12'),
(213, 26, 'topic', '7'),
(214, 26, 'views', '1'),
(215, 26, 'thumbup', ''),
(216, 26, 'thumbdown', ''),
(217, 26, 'total_fav', '0'),
(218, 26, 'anonymousSubmit', 'false'),
(219, 27, 'title', 'Lectures on how to make a good presentation'),
(220, 27, 'desc', 'Praesent finibus magna varius risus bibendum, eu euismod nibh pulvinar. Nunc fringilla odio at tellus elementum, eget accumsan nisl mattis. Nam quis nibh eget nulla ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam eget sollicitudin lacus, non finibus est. Pellentesque sit amet tristique purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed mauris arcu, consectetur in pellentesque eget, elementum id nunc. Maecenas quis congue libero, in euismod risus. In porttitor odio scelerisque imperdiet consequat. Phasellus ac eros ligula. Praesent vitae enim vel urna tempor pellentesque. Phasellus mollis sodales elit, non euismod nibh auctor eget.\r\n\r\n'),
(221, 27, 'dep', '13'),
(222, 27, 'topic', '6'),
(223, 27, 'views', '1'),
(224, 27, 'thumbup', ''),
(225, 27, 'thumbdown', ''),
(226, 27, 'total_fav', '0'),
(227, 27, 'anonymousSubmit', 'false'),
(228, 28, 'title', 'Training sessions for teacher-training students'),
(229, 28, 'desc', 'Cras euismod tellus orci, at rhoncus dolor dignissim eget. Cras feugiat ut lorem rutrum elementum. Vestibulum lacinia sit amet leo ac rutrum. Nunc quis eros orci. Vestibulum luctus quam vitae commodo tincidunt. Praesent dignissim enim nec elementum varius. Nam accumsan, felis sed elementum interdum, quam lectus molestie nunc, sed lobortis mauris tellus et magna. Aliquam mattis eget dui in egestas. Duis eget gravida sapien. Aenean facilisis libero sed pretium rhoncus. Ut sit amet tincidunt justo. Curabitur at tellus nec lorem dictum commodo id nec nunc. Nulla non lobortis ligula, ut efficitur enim. Pellentesque ullamcorper porta hendrerit. Cras varius, arcu vel aliquet aliquam, erat risus aliquam elit, a aliquet est dolor et justo.'),
(230, 28, 'dep', '13'),
(231, 28, 'topic', '13'),
(232, 28, 'views', '1'),
(233, 28, 'thumbup', ''),
(234, 28, 'thumbdown', ''),
(235, 28, 'total_fav', '0'),
(236, 28, 'anonymousSubmit', 'false'),
(237, 29, 'title', 'Buying equipments necessary for chemistry students to experiment'),
(238, 29, 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.'),
(239, 29, 'dep', '14'),
(240, 29, 'topic', '14'),
(241, 29, 'views', '8'),
(242, 29, 'thumbup', ''),
(243, 29, 'thumbdown', ''),
(244, 29, 'total_fav', '0'),
(245, 29, 'anonymousSubmit', 'false'),
(246, NULL, 'title', 'My idea for my department '),
(247, NULL, 'desc', 'Some desc'),
(248, NULL, 'dep', '14'),
(249, NULL, 'topic', '15'),
(250, NULL, 'views', '20'),
(251, NULL, 'thumbup', ''),
(252, NULL, 'thumbdown', ''),
(253, NULL, 'total_fav', '0'),
(254, NULL, 'anonymousSubmit', 'false'),
(255, NULL, 'attachment_dir', '../uploads/30_5ab97dbde4258'),
(256, NULL, 'title', 'New Idea to the topic'),
(257, NULL, 'desc', 'some desccc'),
(258, NULL, 'dep', '14'),
(259, NULL, 'topic', '17'),
(260, NULL, 'views', '1'),
(261, NULL, 'thumbup', ''),
(262, NULL, 'thumbdown', ''),
(263, NULL, 'total_fav', '0'),
(264, NULL, 'anonymousSubmit', 'false'),
(265, NULL, 'attachment_dir', '../uploads/31_5ab9845385052'),
(266, NULL, 'title', 'New topic here'),
(267, NULL, 'desc', 'some descc'),
(268, NULL, 'dep', '14'),
(269, NULL, 'topic', '17'),
(270, NULL, 'views', '5'),
(271, NULL, 'thumbup', '20'),
(272, NULL, 'thumbdown', ''),
(273, NULL, 'total_fav', '999'),
(274, NULL, 'anonymousSubmit', 'false'),
(275, NULL, 'attachment_dir', '../uploads/32_5ab9847ba8a53'),
(276, NULL, 'desc', 'something'),
(277, NULL, 'dep', '14'),
(278, NULL, 'topic', '18'),
(279, NULL, 'views', '1'),
(280, NULL, 'thumbup', ''),
(281, NULL, 'thumbdown', ''),
(282, NULL, 'total_fav', '0'),
(283, NULL, 'anonymousSubmit', 'false'),
(284, NULL, 'attachment_dir', '../uploads/33_5ab9868d798a0'),
(285, NULL, 'title', 'new idea'),
(286, NULL, 'desc', 'im submiting to pic to mine'),
(287, NULL, 'dep', '14'),
(288, NULL, 'topic', '19'),
(289, NULL, 'views', '9'),
(290, NULL, 'thumbup', ''),
(291, NULL, 'thumbdown', ''),
(292, NULL, 'total_fav', '0'),
(293, NULL, 'anonymousSubmit', 'false'),
(294, NULL, 'attachment_dir', '../uploads/34_5ab9877ce7142'),
(295, NULL, 'title', 'submitting'),
(296, NULL, 'desc', 'To my deparment'),
(297, NULL, 'dep', '14'),
(298, NULL, 'topic', '20'),
(299, NULL, 'views', '14'),
(300, NULL, 'thumbup', '20'),
(301, NULL, 'thumbdown', ''),
(302, NULL, 'total_fav', '999'),
(303, NULL, 'anonymousSubmit', 'false'),
(304, NULL, 'attachment_dir', '../uploads/35_5ab9897ce8f57'),
(305, 36, 'title', 'new idea'),
(306, 36, 'desc', 'some ddesccc'),
(307, 36, 'dep', '14'),
(308, 36, 'topic', '21'),
(309, 36, 'views', '34'),
(310, 36, 'thumbup', '20,30'),
(311, 36, 'thumbdown', ''),
(312, 36, 'total_fav', '998'),
(313, 36, 'anonymousSubmit', 'false'),
(314, 36, 'attachment_dir', '../uploads/36_5ab98b71b739e'),
(315, 36, 'reported', '1'),
(316, 19, 'reported', '1');

-- --------------------------------------------------------

--
-- Structure de la table `open_subs`
--

CREATE TABLE `open_subs` (
  `id` int(10) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `dep_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `open_subs`
--

INSERT INTO `open_subs` (`id`, `title`, `date`, `closure_date`, `status`, `dep_id`) VALUES
(5, 'Upgrade computers in labs', '2018-03-26 11:02:48', '2018-03-30 00:00:00', '1', 11),
(6, 'Short course to teach students about soft skills', '2018-03-26 11:25:09', '2018-04-26 00:00:00', '1', 13),
(7, 'Summer internship', '2018-03-26 11:32:28', '2018-05-27 00:00:00', '1', 12),
(8, 'Building a laboratory for experiment on drones', '2018-03-26 11:39:29', '2018-05-03 00:00:00', '1', 14),
(9, 'Holding contests for computing students', '2018-03-26 11:55:46', '2018-06-12 00:00:00', '1', 11),
(10, 'University ID cards implemented using NFC enabled mobile devices', '2018-03-26 11:58:12', '2018-04-26 00:00:00', '1', 14),
(11, 'Update the faculty website', '2018-03-26 14:49:54', '2018-05-03 00:00:00', '1', 11),
(12, 'Holding business contests', '2018-03-26 14:53:28', '2019-05-03 00:00:00', '1', 12),
(13, 'Practical training', '2018-03-26 15:03:37', '2018-07-29 00:00:00', '1', 13),
(14, 'Facility maintenance', '2018-03-26 15:07:59', '2018-06-05 00:00:00', '1', 14),
(21, 'New topic to submit idea', '2018-03-27 02:07:31', '2018-04-03 02:07:31', '1', 14);

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
(1, 'nguyenvu9405@gmail.com', '$2a$12$4ed4ad246bf2df65edf60eEJs6V/VfgUByu0geekuYopmtyOZz9qu', 'Tran Le Nguyen Vu', 'nguyenvu9405@gmail.com', 0, NULL),
(17, 'alan@gmail.com', '$2a$12$a10f4419f1b2dc863fd80u./VKLUNHiJ/pBGqDOUwc5DpH4OVN43i', 'Alan', 'alan@gmail.com', 1, 11),
(18, 'jas@gmail.com', '$2a$12$c66089c5e33e37ee0d3fdO8ElpqYokEexItZhddMC4/jpk2mYokK.', 'Jas', 'jas@gmail.com', 1, 12),
(19, 'eval@gmail.com', '$2a$12$62eb7f65e369cd0308d27uC6Eppz08NJ3gnl6tG/ICtHUnKtDiTdu', 'Eval Thompson', 'eval@gmail.com', 1, 13),
(20, 'incognito2018gre@gmail.com', '$2a$12$1410d67004cea69768424uqKOoKt6fOA3zvjqe5uoHJaZXD5RhwHq', 'Allen', 'incognito2018gre@gmail.com', 1, 14),
(22, 'luke@gmail.com', '$2a$12$b5302b96159e9b8f17f66uuBCCMwHMajwZ/wdtJndXB5L12PJKYKm', 'Luke', 'luke@gmail.com', 1, 14),
(30, 'newstaff@newstaff.newstaff', '$2a$12$fe91df0afec7724a42831eJZoF7t7LLZnHcRYKbcxp9YI4RKX7jbq', 'newstaff', 'newstaff@newstaff.newstaff', 2, 14);

-- --------------------------------------------------------

--
-- Structure de la table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` bigint(99) NOT NULL,
  `user_id` bigint(99) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'last_login', 'April 5, 2018, 10:28 pm'),
(2, 1, 'last_login', 'April 5, 2018, 10:32 pm'),
(3, 1, 'last_login', 'April 5, 2018, 10:35 pm'),
(4, 17, 'last_login', 'April 5, 2018, 10:56 pm'),
(5, 17, 'last_login', 'April 5, 2018, 10:57 pm'),
(6, 1, 'last_login', 'April 5, 2018, 11:05 pm'),
(9, 17, 'block', '1'),
(10, 17, 'last_login', 'April 5, 2018, 11:16 pm'),
(11, 17, 'last_login', 'April 5, 2018, 11:26 pm'),
(12, 1, 'last_login', 'April 5, 2018, 11:42 pm');

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
-- Index pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `categories_ideas`
--
ALTER TABLE `categories_ideas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `deps`
--
ALTER TABLE `deps`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `deps_data`
--
ALTER TABLE `deps_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `ideas_metadata`
--
ALTER TABLE `ideas_metadata`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT pour la table `open_subs`
--
ALTER TABLE `open_subs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
