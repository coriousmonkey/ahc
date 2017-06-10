-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ahc
CREATE DATABASE IF NOT EXISTS `ahc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ahc`;


-- Dumping structure for table ahc.ahc_sample
CREATE TABLE IF NOT EXISTS `ahc_sample` (
  `id` int(11) DEFAULT NULL,
  `4_1` int(11) DEFAULT NULL,
  `4_2` int(11) DEFAULT NULL,
  `5_1` int(11) DEFAULT NULL,
  `5_2` int(11) DEFAULT NULL,
  `6_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.ahc_sample: ~5 rows (approximately)
/*!40000 ALTER TABLE `ahc_sample` DISABLE KEYS */;
INSERT INTO `ahc_sample` (`id`, `4_1`, `4_2`, `5_1`, `5_2`, `6_1`) VALUES
	(1, 75, 76, 74, 73, 83),
	(2, 80, 83, 82, 78, 80),
	(3, 85, 80, 82, 84, 85),
	(4, 76, 73, 71, 72, 85),
	(5, 75, 81, 74, 73, 81);
/*!40000 ALTER TABLE `ahc_sample` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_kelas
CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_kelas: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_kelas` DISABLE KEYS */;
INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
	(4, 'IV'),
	(5, 'V'),
	(6, 'VI');
/*!40000 ALTER TABLE `tb_kelas` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_mapel
CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_mapel: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_mapel` DISABLE KEYS */;
INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
	(1, 'Bahasa Indonesia'),
	(2, 'matematika'),
	(3, 'ilmu pengetahuan alam');
/*!40000 ALTER TABLE `tb_mapel` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_nilai
CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `siswa` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `mapel` int(11) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=596 DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_nilai: ~525 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
INSERT INTO `tb_nilai` (`id_nilai`, `siswa`, `kelas`, `semester`, `mapel`, `nilai`) VALUES
	(1, 2, 4, 1, 1, 75),
	(2, 3, 4, 1, 1, 75),
	(3, 4, 4, 1, 1, 77),
	(4, 5, 4, 1, 1, 75),
	(5, 6, 4, 1, 1, 75),
	(6, 7, 4, 1, 1, 70),
	(7, 8, 4, 1, 1, 75),
	(8, 9, 4, 1, 1, 80),
	(9, 10, 4, 1, 1, 75),
	(10, 11, 4, 1, 1, 80),
	(11, 12, 4, 1, 1, 74),
	(12, 13, 4, 1, 1, 75),
	(13, 14, 4, 1, 1, 78),
	(14, 15, 4, 1, 1, 78),
	(15, 16, 4, 1, 1, 85),
	(16, 17, 4, 1, 1, 70),
	(17, 18, 4, 1, 1, 70),
	(18, 19, 4, 1, 1, 75),
	(19, 20, 4, 1, 1, 70),
	(20, 21, 4, 1, 1, 75),
	(21, 22, 4, 1, 1, 78),
	(22, 23, 4, 1, 1, 76),
	(23, 24, 4, 1, 1, 80),
	(24, 25, 4, 1, 1, 78),
	(25, 26, 4, 1, 1, 75),
	(26, 27, 4, 1, 1, 75),
	(27, 28, 4, 1, 1, 75),
	(28, 29, 4, 1, 1, 78),
	(29, 30, 4, 1, 1, 75),
	(30, 31, 4, 1, 1, 77),
	(31, 32, 4, 1, 1, 74),
	(32, 33, 4, 1, 1, 79),
	(33, 34, 4, 1, 1, 75),
	(34, 35, 4, 1, 1, 78),
	(35, 1, 4, 2, 1, 75),
	(36, 2, 4, 2, 1, 78),
	(37, 3, 4, 2, 1, 76),
	(38, 4, 4, 2, 1, 79),
	(39, 5, 4, 2, 1, 75),
	(40, 6, 4, 2, 1, 78),
	(41, 7, 4, 2, 1, 76),
	(42, 8, 4, 2, 1, 80),
	(43, 9, 4, 2, 1, 83),
	(44, 10, 4, 2, 1, 84),
	(45, 11, 4, 2, 1, 77),
	(46, 12, 4, 2, 1, 75),
	(47, 13, 4, 2, 1, 78),
	(48, 14, 4, 2, 1, 80),
	(49, 15, 4, 2, 1, 75),
	(50, 16, 4, 2, 1, 80),
	(51, 17, 4, 2, 1, 70),
	(52, 18, 4, 2, 1, 74),
	(53, 19, 4, 2, 1, 75),
	(54, 20, 4, 2, 1, 81),
	(55, 21, 4, 2, 1, 75),
	(56, 22, 4, 2, 1, 77),
	(57, 23, 4, 2, 1, 73),
	(58, 24, 4, 2, 1, 78),
	(59, 25, 4, 2, 1, 76),
	(60, 26, 4, 2, 1, 82),
	(61, 27, 4, 2, 1, 73),
	(62, 28, 4, 2, 1, 72),
	(63, 29, 4, 2, 1, 77),
	(64, 30, 4, 2, 1, 81),
	(65, 31, 4, 2, 1, 78),
	(66, 32, 4, 2, 1, 77),
	(67, 33, 4, 2, 1, 80),
	(68, 34, 4, 2, 1, 79),
	(69, 35, 4, 2, 1, 80),
	(70, 1, 5, 1, 1, 74),
	(71, 2, 5, 1, 1, 80),
	(72, 3, 5, 1, 1, 74),
	(73, 4, 5, 1, 1, 80),
	(74, 5, 5, 1, 1, 71),
	(75, 6, 5, 1, 1, 78),
	(76, 7, 5, 1, 1, 72),
	(77, 8, 5, 1, 1, 75),
	(78, 9, 5, 1, 1, 82),
	(79, 10, 5, 1, 1, 83),
	(80, 11, 5, 1, 1, 76),
	(81, 12, 5, 1, 1, 77),
	(82, 13, 5, 1, 1, 74),
	(83, 14, 5, 1, 1, 75),
	(84, 15, 5, 1, 1, 80),
	(85, 16, 5, 1, 1, 82),
	(86, 17, 5, 1, 1, 70),
	(87, 18, 5, 1, 1, 73),
	(88, 19, 5, 1, 1, 74),
	(89, 20, 5, 1, 1, 75),
	(90, 21, 5, 1, 1, 74),
	(91, 22, 5, 1, 1, 80),
	(92, 23, 5, 1, 1, 71),
	(93, 24, 5, 1, 1, 80),
	(94, 25, 5, 1, 1, 79),
	(95, 26, 5, 1, 1, 74),
	(96, 27, 5, 1, 1, 71),
	(97, 28, 5, 1, 1, 72),
	(98, 29, 5, 1, 1, 80),
	(99, 30, 5, 1, 1, 74),
	(100, 31, 5, 1, 1, 83),
	(101, 32, 5, 1, 1, 80),
	(102, 33, 5, 1, 1, 77),
	(103, 34, 5, 1, 1, 78),
	(104, 35, 5, 1, 1, 80),
	(105, 1, 5, 2, 1, 72),
	(106, 2, 5, 2, 1, 80),
	(107, 3, 5, 2, 1, 73),
	(108, 4, 5, 2, 1, 79),
	(109, 5, 5, 2, 1, 75),
	(110, 6, 5, 2, 1, 80),
	(111, 7, 5, 2, 1, 71),
	(112, 8, 5, 2, 1, 82),
	(113, 9, 5, 2, 1, 78),
	(114, 10, 5, 2, 1, 87),
	(115, 11, 5, 2, 1, 81),
	(116, 12, 5, 2, 1, 75),
	(117, 13, 5, 2, 1, 75),
	(118, 14, 5, 2, 1, 79),
	(119, 15, 5, 2, 1, 81),
	(120, 16, 5, 2, 1, 84),
	(121, 17, 5, 2, 1, 70),
	(122, 18, 5, 2, 1, 73),
	(123, 19, 5, 2, 1, 74),
	(124, 20, 5, 2, 1, 76),
	(125, 21, 5, 2, 1, 76),
	(126, 22, 5, 2, 1, 78),
	(127, 23, 5, 2, 1, 72),
	(128, 24, 5, 2, 1, 78),
	(129, 25, 5, 2, 1, 81),
	(130, 26, 5, 2, 1, 82),
	(131, 27, 5, 2, 1, 70),
	(132, 28, 5, 2, 1, 73),
	(133, 29, 5, 2, 1, 75),
	(134, 30, 5, 2, 1, 73),
	(135, 31, 5, 2, 1, 78),
	(136, 32, 5, 2, 1, 76),
	(137, 33, 5, 2, 1, 79),
	(138, 34, 5, 2, 1, 80),
	(139, 35, 5, 2, 1, 81),
	(140, 1, 4, 1, 1, 70),
	(141, 1, 6, 1, 1, 74),
	(142, 2, 6, 1, 1, 82),
	(143, 3, 6, 1, 1, 83),
	(144, 4, 6, 1, 1, 82),
	(145, 5, 6, 1, 1, 75),
	(146, 6, 6, 1, 1, 82),
	(147, 7, 6, 1, 1, 72),
	(148, 8, 6, 1, 1, 84),
	(149, 9, 6, 1, 1, 80),
	(150, 10, 6, 1, 1, 88),
	(151, 11, 6, 1, 1, 83),
	(152, 12, 6, 1, 1, 78),
	(153, 13, 6, 1, 1, 79),
	(154, 14, 6, 1, 1, 84),
	(155, 15, 6, 1, 1, 85),
	(156, 16, 6, 1, 1, 85),
	(157, 17, 6, 1, 1, 71),
	(158, 18, 6, 1, 1, 78),
	(159, 19, 6, 1, 1, 78),
	(160, 20, 6, 1, 1, 77),
	(161, 21, 6, 1, 1, 81),
	(162, 22, 6, 1, 1, 80),
	(163, 23, 6, 1, 1, 85),
	(164, 24, 6, 1, 1, 82),
	(165, 25, 6, 1, 1, 85),
	(166, 26, 6, 1, 1, 84),
	(167, 27, 6, 1, 1, 70),
	(168, 28, 6, 1, 1, 79),
	(169, 29, 6, 1, 1, 82),
	(170, 30, 6, 1, 1, 81),
	(171, 31, 6, 1, 1, 80),
	(172, 32, 6, 1, 1, 81),
	(173, 33, 6, 1, 1, 82),
	(174, 34, 6, 1, 1, 85),
	(175, 35, 6, 1, 1, 83),
	(176, 1, 4, 1, 2, 76),
	(177, 2, 4, 1, 2, 78),
	(178, 3, 4, 1, 2, 74),
	(179, 4, 4, 1, 2, 78),
	(180, 5, 4, 1, 2, 80),
	(181, 6, 4, 1, 2, 78),
	(182, 7, 4, 1, 2, 76),
	(183, 8, 4, 1, 2, 80),
	(184, 9, 4, 1, 2, 81),
	(185, 10, 4, 1, 2, 80),
	(186, 11, 4, 1, 2, 79),
	(187, 12, 4, 1, 2, 80),
	(188, 13, 4, 1, 2, 76),
	(189, 14, 4, 1, 2, 77),
	(190, 15, 4, 1, 2, 75),
	(191, 16, 4, 1, 2, 87),
	(192, 17, 4, 1, 2, 76),
	(193, 18, 4, 1, 2, 73),
	(194, 19, 4, 1, 2, 76),
	(195, 20, 4, 1, 2, 80),
	(196, 21, 4, 1, 2, 77),
	(197, 22, 4, 1, 2, 81),
	(198, 23, 4, 1, 2, 78),
	(199, 24, 4, 1, 2, 77),
	(200, 25, 4, 1, 2, 79),
	(201, 26, 4, 1, 2, 81),
	(202, 27, 4, 1, 2, 79),
	(203, 28, 4, 1, 2, 83),
	(204, 29, 4, 1, 2, 80),
	(205, 30, 4, 1, 2, 78),
	(206, 31, 4, 1, 2, 77),
	(207, 32, 4, 1, 2, 75),
	(208, 33, 4, 1, 2, 81),
	(209, 34, 4, 1, 2, 80),
	(210, 35, 4, 1, 2, 75),
	(211, 1, 4, 2, 2, 78),
	(212, 2, 4, 2, 2, 75),
	(213, 3, 4, 2, 2, 75),
	(214, 4, 4, 2, 2, 76),
	(215, 5, 4, 2, 2, 78),
	(216, 6, 4, 2, 2, 77),
	(217, 7, 4, 2, 2, 74),
	(218, 8, 4, 2, 2, 78),
	(219, 9, 4, 2, 2, 78),
	(220, 10, 4, 2, 2, 88),
	(221, 11, 4, 2, 2, 78),
	(222, 12, 4, 2, 2, 74),
	(223, 13, 4, 2, 2, 78),
	(224, 14, 4, 2, 2, 79),
	(225, 15, 4, 2, 2, 75),
	(226, 16, 4, 2, 2, 79),
	(227, 17, 4, 2, 2, 70),
	(228, 18, 4, 2, 2, 77),
	(229, 19, 4, 2, 2, 78),
	(230, 20, 4, 2, 2, 80),
	(231, 21, 4, 2, 2, 75),
	(232, 22, 4, 2, 2, 80),
	(233, 23, 4, 2, 2, 80),
	(234, 24, 4, 2, 2, 79),
	(235, 25, 4, 2, 2, 83),
	(236, 26, 4, 2, 2, 76),
	(237, 27, 4, 2, 2, 75),
	(238, 28, 4, 2, 2, 81),
	(239, 29, 4, 2, 2, 75),
	(240, 30, 4, 2, 2, 81),
	(241, 31, 4, 2, 2, 74),
	(242, 32, 4, 2, 2, 78),
	(243, 33, 4, 2, 2, 78),
	(244, 34, 4, 2, 2, 82),
	(245, 35, 4, 2, 2, 78),
	(246, 1, 5, 1, 2, 78),
	(247, 2, 5, 1, 2, 76),
	(248, 3, 5, 1, 2, 77),
	(249, 4, 5, 1, 2, 78),
	(250, 5, 5, 1, 2, 75),
	(251, 6, 5, 1, 2, 75),
	(252, 7, 5, 1, 2, 79),
	(253, 8, 5, 1, 2, 80),
	(254, 9, 5, 1, 2, 77),
	(255, 10, 5, 1, 2, 85),
	(256, 11, 5, 1, 2, 82),
	(257, 12, 5, 1, 2, 78),
	(258, 13, 5, 1, 2, 80),
	(259, 14, 5, 1, 2, 80),
	(260, 15, 5, 1, 2, 78),
	(261, 16, 5, 1, 2, 80),
	(262, 17, 5, 1, 2, 75),
	(263, 18, 5, 1, 2, 78),
	(264, 19, 5, 1, 2, 78),
	(265, 20, 5, 1, 2, 78),
	(266, 21, 5, 1, 2, 80),
	(267, 22, 5, 1, 2, 78),
	(268, 23, 5, 1, 2, 78),
	(269, 24, 5, 1, 2, 80),
	(270, 25, 5, 1, 2, 78),
	(271, 26, 5, 1, 2, 80),
	(272, 27, 5, 1, 2, 74),
	(273, 28, 5, 1, 2, 78),
	(274, 29, 5, 1, 2, 78),
	(275, 30, 5, 1, 2, 77),
	(276, 31, 5, 1, 2, 75),
	(277, 32, 5, 1, 2, 78),
	(278, 33, 5, 1, 2, 79),
	(279, 34, 5, 1, 2, 79),
	(280, 35, 5, 1, 2, 78),
	(281, 1, 5, 2, 2, 81),
	(282, 2, 5, 2, 2, 80),
	(283, 3, 5, 2, 2, 84),
	(284, 4, 5, 2, 2, 80),
	(285, 5, 5, 2, 2, 79),
	(286, 6, 5, 2, 2, 78),
	(287, 7, 5, 2, 2, 78),
	(288, 8, 5, 2, 2, 76),
	(289, 9, 5, 2, 2, 75),
	(290, 10, 5, 2, 2, 87),
	(291, 11, 5, 2, 2, 80),
	(292, 12, 5, 2, 2, 82),
	(293, 13, 5, 2, 2, 81),
	(294, 14, 5, 2, 2, 80),
	(295, 15, 5, 2, 2, 76),
	(296, 16, 5, 2, 2, 88),
	(297, 17, 5, 2, 2, 75),
	(298, 18, 5, 2, 2, 79),
	(299, 19, 5, 2, 2, 80),
	(300, 20, 5, 2, 2, 79),
	(301, 21, 5, 2, 2, 82),
	(302, 22, 5, 2, 2, 89),
	(303, 23, 5, 2, 2, 80),
	(304, 24, 5, 2, 2, 82),
	(305, 25, 5, 2, 2, 75),
	(306, 26, 5, 2, 2, 85),
	(307, 27, 5, 2, 2, 72),
	(308, 28, 5, 2, 2, 80),
	(309, 29, 5, 2, 2, 75),
	(310, 30, 5, 2, 2, 78),
	(311, 31, 5, 2, 2, 73),
	(312, 32, 5, 2, 2, 76),
	(313, 33, 5, 2, 2, 76),
	(314, 34, 5, 2, 2, 83),
	(315, 35, 5, 2, 2, 76),
	(316, 1, 6, 1, 2, 80),
	(317, 2, 6, 1, 2, 85),
	(318, 3, 6, 1, 2, 80),
	(319, 4, 6, 1, 2, 80),
	(320, 5, 6, 1, 2, 77),
	(321, 6, 6, 1, 2, 76),
	(322, 7, 6, 1, 2, 78),
	(323, 8, 6, 1, 2, 79),
	(324, 9, 6, 1, 2, 84),
	(325, 10, 6, 1, 2, 87),
	(326, 11, 6, 1, 2, 84),
	(327, 12, 6, 1, 2, 80),
	(328, 13, 6, 1, 2, 78),
	(329, 14, 6, 1, 2, 85),
	(330, 15, 6, 1, 2, 79),
	(331, 16, 6, 1, 2, 90),
	(332, 17, 6, 1, 2, 72),
	(333, 18, 6, 1, 2, 79),
	(334, 19, 6, 1, 2, 79),
	(335, 20, 6, 1, 2, 83),
	(336, 21, 6, 1, 2, 77),
	(337, 22, 6, 1, 2, 80),
	(338, 23, 6, 1, 2, 78),
	(339, 24, 6, 1, 2, 82),
	(340, 25, 6, 1, 2, 79),
	(341, 26, 6, 1, 2, 82),
	(342, 27, 6, 1, 2, 76),
	(343, 28, 6, 1, 2, 80),
	(344, 29, 6, 1, 2, 80),
	(345, 30, 6, 1, 2, 79),
	(346, 31, 6, 1, 2, 78),
	(347, 32, 6, 1, 2, 80),
	(348, 33, 6, 1, 2, 77),
	(349, 34, 6, 1, 2, 81),
	(350, 35, 6, 1, 2, 79),
	(351, 1, 4, 1, 3, 76),
	(352, 2, 4, 1, 3, 88),
	(353, 3, 4, 1, 3, 87),
	(354, 4, 4, 1, 3, 79),
	(355, 5, 4, 1, 3, 78),
	(356, 6, 4, 1, 3, 78),
	(357, 7, 4, 1, 3, 81),
	(358, 8, 4, 1, 3, 80),
	(359, 9, 4, 1, 3, 90),
	(360, 10, 4, 1, 3, 89),
	(361, 11, 4, 1, 3, 76),
	(362, 12, 4, 1, 3, 78),
	(363, 13, 4, 1, 3, 81),
	(364, 14, 4, 1, 3, 86),
	(365, 15, 4, 1, 3, 78),
	(366, 16, 4, 1, 3, 88),
	(367, 17, 4, 1, 3, 75),
	(368, 18, 4, 1, 3, 80),
	(369, 19, 4, 1, 3, 81),
	(370, 20, 4, 1, 3, 79),
	(371, 21, 4, 1, 3, 85),
	(372, 22, 4, 1, 3, 76),
	(373, 23, 4, 1, 3, 77),
	(374, 24, 4, 1, 3, 80),
	(375, 25, 4, 1, 3, 86),
	(376, 26, 4, 1, 3, 84),
	(377, 27, 4, 1, 3, 80),
	(378, 28, 4, 1, 3, 80),
	(379, 29, 4, 1, 3, 74),
	(380, 30, 4, 1, 3, 82),
	(381, 31, 4, 1, 3, 79),
	(382, 32, 4, 1, 3, 76),
	(383, 33, 4, 1, 3, 80),
	(384, 34, 4, 1, 3, 83),
	(385, 35, 4, 1, 3, 75),
	(386, 1, 4, 2, 3, 77),
	(387, 2, 4, 2, 3, 80),
	(388, 3, 4, 2, 3, 83),
	(389, 4, 4, 2, 3, 78),
	(390, 5, 4, 2, 3, 75),
	(391, 6, 4, 2, 3, 79),
	(392, 7, 4, 2, 3, 76),
	(393, 8, 4, 2, 3, 85),
	(394, 9, 4, 2, 3, 80),
	(395, 10, 4, 2, 3, 88),
	(396, 11, 4, 2, 3, 77),
	(397, 12, 4, 2, 3, 74),
	(398, 13, 4, 2, 3, 83),
	(399, 14, 4, 2, 3, 80),
	(400, 15, 4, 2, 3, 79),
	(401, 16, 4, 2, 3, 81),
	(402, 17, 4, 2, 3, 75),
	(403, 18, 4, 2, 3, 82),
	(404, 19, 4, 2, 3, 80),
	(405, 20, 4, 2, 3, 79),
	(406, 21, 4, 2, 3, 81),
	(407, 22, 4, 2, 3, 80),
	(408, 23, 4, 2, 3, 75),
	(409, 24, 4, 2, 3, 80),
	(410, 25, 4, 2, 3, 80),
	(411, 26, 4, 2, 3, 78),
	(412, 27, 4, 2, 3, 76),
	(413, 28, 4, 2, 3, 76),
	(414, 29, 4, 2, 3, 77),
	(415, 30, 4, 2, 3, 79),
	(416, 31, 4, 2, 3, 81),
	(417, 32, 4, 2, 3, 79),
	(418, 33, 4, 2, 3, 81),
	(419, 34, 4, 2, 3, 79),
	(420, 35, 4, 2, 3, 75),
	(421, 1, 5, 1, 3, 77),
	(422, 2, 5, 1, 3, 84),
	(423, 3, 5, 1, 3, 78),
	(424, 4, 5, 1, 3, 80),
	(425, 5, 5, 1, 3, 77),
	(426, 6, 5, 1, 3, 81),
	(427, 7, 5, 1, 3, 77),
	(428, 8, 5, 1, 3, 82),
	(429, 9, 5, 1, 3, 82),
	(430, 10, 5, 1, 3, 89),
	(431, 11, 5, 1, 3, 75),
	(432, 12, 5, 1, 3, 80),
	(433, 13, 5, 1, 3, 79),
	(434, 14, 5, 1, 3, 81),
	(435, 15, 5, 1, 3, 77),
	(436, 16, 5, 1, 3, 79),
	(437, 17, 5, 1, 3, 78),
	(438, 18, 5, 1, 3, 78),
	(439, 19, 5, 1, 3, 80),
	(440, 20, 5, 1, 3, 80),
	(441, 21, 5, 1, 3, 82),
	(442, 22, 5, 1, 3, 81),
	(443, 23, 5, 1, 3, 83),
	(444, 24, 5, 1, 3, 82),
	(445, 25, 5, 1, 3, 84),
	(446, 26, 5, 1, 3, 85),
	(447, 27, 5, 1, 3, 77),
	(448, 28, 5, 1, 3, 77),
	(449, 29, 5, 1, 3, 79),
	(450, 30, 5, 1, 3, 76),
	(451, 31, 5, 1, 3, 79),
	(452, 32, 5, 1, 3, 82),
	(453, 33, 5, 1, 3, 81),
	(454, 34, 5, 1, 3, 87),
	(455, 35, 5, 1, 3, 78),
	(456, 1, 5, 2, 3, 77),
	(457, 2, 5, 2, 3, 81),
	(458, 3, 5, 2, 3, 88),
	(459, 4, 5, 2, 3, 80),
	(460, 5, 5, 2, 3, 76),
	(461, 6, 5, 2, 3, 82),
	(462, 7, 5, 2, 3, 78),
	(463, 8, 5, 2, 3, 78),
	(464, 9, 5, 2, 3, 80),
	(465, 10, 5, 2, 3, 90),
	(466, 11, 5, 2, 3, 78),
	(467, 12, 5, 2, 3, 77),
	(468, 13, 5, 2, 3, 84),
	(469, 14, 5, 2, 3, 82),
	(470, 15, 5, 2, 3, 78),
	(471, 16, 5, 2, 3, 84),
	(472, 17, 5, 2, 3, 80),
	(473, 18, 5, 2, 3, 83),
	(474, 19, 5, 2, 3, 81),
	(475, 20, 5, 2, 3, 88),
	(476, 21, 5, 2, 3, 88),
	(477, 22, 5, 2, 3, 83),
	(478, 23, 5, 2, 3, 80),
	(479, 24, 5, 2, 3, 81),
	(480, 25, 5, 2, 3, 88),
	(481, 26, 5, 2, 3, 82),
	(482, 27, 5, 2, 3, 75),
	(483, 28, 5, 2, 3, 75),
	(484, 29, 5, 2, 3, 75),
	(485, 30, 5, 2, 3, 83),
	(486, 31, 5, 2, 3, 78),
	(487, 32, 5, 2, 3, 81),
	(488, 33, 5, 2, 3, 82),
	(489, 34, 5, 2, 3, 86),
	(490, 35, 5, 2, 3, 80),
	(491, 1, 6, 1, 3, 77),
	(492, 2, 6, 1, 3, 81),
	(493, 3, 6, 1, 3, 82),
	(494, 4, 6, 1, 3, 83),
	(495, 5, 6, 1, 3, 80),
	(496, 6, 6, 1, 3, 80),
	(497, 7, 6, 1, 3, 77),
	(498, 8, 6, 1, 3, 80),
	(499, 9, 6, 1, 3, 83),
	(500, 10, 6, 1, 3, 87),
	(501, 11, 6, 1, 3, 79),
	(502, 12, 6, 1, 3, 81),
	(503, 13, 6, 1, 3, 85),
	(504, 14, 6, 1, 3, 80),
	(505, 15, 6, 1, 3, 80),
	(506, 16, 6, 1, 3, 85),
	(507, 17, 6, 1, 3, 76),
	(508, 18, 6, 1, 3, 84),
	(509, 19, 6, 1, 3, 82),
	(510, 20, 6, 1, 3, 80),
	(511, 21, 6, 1, 3, 83),
	(512, 22, 6, 1, 3, 83),
	(513, 23, 6, 1, 3, 78),
	(514, 24, 6, 1, 3, 82),
	(515, 25, 6, 1, 3, 89),
	(516, 26, 6, 1, 3, 81),
	(517, 27, 6, 1, 3, 75),
	(518, 28, 6, 1, 3, 75),
	(519, 29, 6, 1, 3, 79),
	(520, 30, 6, 1, 3, 79),
	(521, 31, 6, 1, 3, 82),
	(522, 32, 6, 1, 3, 80),
	(523, 33, 6, 1, 3, 84),
	(524, 34, 6, 1, 3, 83),
	(525, 35, 6, 1, 3, 80),
	(561, 1, 6, 2, 1, 0),
	(562, 2, 6, 2, 1, 0),
	(563, 3, 6, 2, 1, 0),
	(564, 4, 6, 2, 1, 0),
	(565, 5, 6, 2, 1, 0),
	(566, 6, 6, 2, 1, 0),
	(567, 7, 6, 2, 1, 0),
	(568, 8, 6, 2, 1, 0),
	(569, 9, 6, 2, 1, 0),
	(570, 10, 6, 2, 1, 0),
	(571, 11, 6, 2, 1, 0),
	(572, 12, 6, 2, 1, 0),
	(573, 13, 6, 2, 1, 0),
	(574, 14, 6, 2, 1, 0),
	(575, 15, 6, 2, 1, 0),
	(576, 16, 6, 2, 1, 0),
	(577, 17, 6, 2, 1, 0),
	(578, 18, 6, 2, 1, 0),
	(579, 19, 6, 2, 1, 0),
	(580, 20, 6, 2, 1, 0),
	(581, 21, 6, 2, 1, 0),
	(582, 22, 6, 2, 1, 0),
	(583, 23, 6, 2, 1, 0),
	(584, 24, 6, 2, 1, 0),
	(585, 25, 6, 2, 1, 0),
	(586, 26, 6, 2, 1, 0),
	(587, 27, 6, 2, 1, 0),
	(588, 28, 6, 2, 1, 0),
	(589, 29, 6, 2, 1, 0),
	(590, 30, 6, 2, 1, 0),
	(591, 31, 6, 2, 1, 0),
	(592, 32, 6, 2, 1, 0),
	(593, 33, 6, 2, 1, 0),
	(594, 34, 6, 2, 1, 0),
	(595, 35, 6, 2, 1, 0);
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_semester
CREATE TABLE IF NOT EXISTS `tb_semester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_semester: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_semester` DISABLE KEYS */;
INSERT INTO `tb_semester` (`id_semester`, `semester`) VALUES
	(1, 'satu'),
	(2, 'dua');
/*!40000 ALTER TABLE `tb_semester` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_siswa
CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `thn_masuk` varchar(50) DEFAULT NULL,
  `kelas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_siswa: ~36 rows (approximately)
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `thn_masuk`, `kelas`) VALUES
	(1, NULL, 'Afia Fitri', '2011', 0),
	(2, NULL, 'Ahmad F. Z.', '2011', 0),
	(3, NULL, 'Alex Condro', '2011', 0),
	(4, NULL, 'Alif Eka S.', '2011', 0),
	(5, NULL, 'Alvi Putri M.', '2011', 0),
	(6, NULL, 'Anis Mawati', '2011', 0),
	(7, NULL, 'Bayu Maulana', '2011', 0),
	(8, NULL, 'Bimbim L.', '2011', 0),
	(9, NULL, 'Eka Dimas P.', '2011', 0),
	(10, NULL, 'Eka Indi L.', '2011', 0),
	(11, NULL, 'Evi Talita S.', '2011', 0),
	(12, NULL, 'Evy Maulida', '2011', 0),
	(13, NULL, 'Firman M.', '2011', 0),
	(14, NULL, 'Intan P. F.', '2011', 0),
	(15, NULL, 'Ika Sukma L.', '2011', 0),
	(16, NULL, 'M. Ari Ridho', '2011', 0),
	(17, NULL, 'M. Deni S.', '2011', 0),
	(18, NULL, 'M. Soleman', '2011', 0),
	(19, NULL, 'M. Dani F.', '2011', 0),
	(20, NULL, 'M. Sohibul', '2011', 0),
	(21, NULL, 'Nurul M. H.', '2011', 0),
	(22, NULL, 'Nissa Sasmi', '2011', 0),
	(23, NULL, 'Riska Dwi S.', '2011', 0),
	(24, NULL, 'Riski Maulana', '2011', 0),
	(25, NULL, 'Sela Valentina', '2011', 0),
	(26, NULL, 'Shadidah W.', '2011', 0),
	(27, NULL, 'Sindi Afriati', '2011', 0),
	(28, NULL, 'Sindi W.', '2011', 0),
	(29, NULL, 'Sinta Rahayu', '2011', 0),
	(30, NULL, 'Siti Elsafira S.', '2011', 0),
	(31, NULL, 'Tika Dwi S.', '2011', 0),
	(32, NULL, 'Titin M.', '2011', 0),
	(33, NULL, 'Ulfa Puspita', '2011', 0),
	(34, NULL, 'Widyawati', '2011', 0),
	(35, NULL, 'Windy L.', '2011', 0);
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;


-- Dumping structure for table ahc.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `nama_lengkap_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ahc.tb_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;