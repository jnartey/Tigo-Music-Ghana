-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.223:3306
-- Generation Time: Feb 15, 2018 at 06:05 PM
-- Server version: 5.6.27
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `move1_tigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(180, NULL, NULL, NULL, 'controllers', 1, 724),
(181, 180, NULL, NULL, 'Pages', 2, 53),
(183, 181, NULL, NULL, 'index', 3, 4),
(184, 181, NULL, NULL, 'getRole', 5, 6),
(185, 181, NULL, NULL, 'countRows', 7, 8),
(186, 180, NULL, NULL, 'Roles', 54, 89),
(187, 186, NULL, NULL, 'admin_index', 55, 56),
(188, 186, NULL, NULL, 'admin_view', 57, 58),
(189, 186, NULL, NULL, 'admin_add', 59, 60),
(190, 186, NULL, NULL, 'admin_edit', 61, 62),
(191, 186, NULL, NULL, 'admin_delete', 63, 64),
(192, 186, NULL, NULL, 'getRole', 65, 66),
(193, 186, NULL, NULL, 'countRows', 67, 68),
(194, 180, NULL, NULL, 'Users', 90, 131),
(195, 194, NULL, NULL, 'isAuthorized', 91, 92),
(196, 194, NULL, NULL, 'admin_index', 93, 94),
(197, 194, NULL, NULL, 'admin_login', 95, 96),
(198, 194, NULL, NULL, 'admin_logout', 97, 98),
(199, 194, NULL, NULL, 'admin_view', 99, 100),
(200, 194, NULL, NULL, 'admin_add', 101, 102),
(201, 194, NULL, NULL, 'admin_edit', 103, 104),
(202, 194, NULL, NULL, 'admin_delete', 105, 106),
(203, 194, NULL, NULL, 'getRole', 107, 108),
(204, 194, NULL, NULL, 'countRows', 109, 110),
(205, 180, NULL, NULL, 'Acl', 132, 259),
(206, 205, NULL, NULL, 'Acl', 133, 162),
(207, 206, NULL, NULL, 'index', 134, 135),
(208, 206, NULL, NULL, 'admin_index', 136, 137),
(209, 206, NULL, NULL, 'getRole', 138, 139),
(210, 206, NULL, NULL, 'countRows', 140, 141),
(211, 205, NULL, NULL, 'Acos', 163, 198),
(212, 211, NULL, NULL, 'admin_index', 164, 165),
(213, 211, NULL, NULL, 'admin_empty_acos', 166, 167),
(214, 211, NULL, NULL, 'admin_build_acl', 168, 169),
(215, 211, NULL, NULL, 'admin_prune_acos', 170, 171),
(216, 211, NULL, NULL, 'admin_synchronize', 172, 173),
(217, 211, NULL, NULL, 'getRole', 174, 175),
(218, 211, NULL, NULL, 'countRows', 176, 177),
(219, 205, NULL, NULL, 'Aros', 199, 258),
(220, 219, NULL, NULL, 'admin_index', 200, 201),
(221, 219, NULL, NULL, 'admin_check', 202, 203),
(222, 219, NULL, NULL, 'admin_users', 204, 205),
(223, 219, NULL, NULL, 'admin_update_user_role', 206, 207),
(224, 219, NULL, NULL, 'admin_ajax_role_permissions', 208, 209),
(225, 219, NULL, NULL, 'admin_role_permissions', 210, 211),
(226, 219, NULL, NULL, 'admin_user_permissions', 212, 213),
(227, 219, NULL, NULL, 'admin_empty_permissions', 214, 215),
(228, 219, NULL, NULL, 'admin_clear_user_specific_permissions', 216, 217),
(229, 219, NULL, NULL, 'admin_grant_all_controllers', 218, 219),
(230, 219, NULL, NULL, 'admin_deny_all_controllers', 220, 221),
(231, 219, NULL, NULL, 'admin_get_role_controller_permission', 222, 223),
(232, 219, NULL, NULL, 'admin_grant_role_permission', 224, 225),
(233, 219, NULL, NULL, 'admin_deny_role_permission', 226, 227),
(234, 219, NULL, NULL, 'admin_get_user_controller_permission', 228, 229),
(235, 219, NULL, NULL, 'admin_grant_user_permission', 230, 231),
(236, 219, NULL, NULL, 'admin_deny_user_permission', 232, 233),
(237, 219, NULL, NULL, 'getRole', 234, 235),
(238, 219, NULL, NULL, 'countRows', 236, 237),
(239, 180, NULL, NULL, 'Galleries', 260, 295),
(240, 239, NULL, NULL, 'admin_index', 261, 262),
(241, 239, NULL, NULL, 'admin_view', 263, 264),
(242, 239, NULL, NULL, 'admin_add', 265, 266),
(243, 239, NULL, NULL, 'admin_edit', 267, 268),
(244, 239, NULL, NULL, 'admin_delete', 269, 270),
(245, 239, NULL, NULL, 'getRole', 271, 272),
(246, 239, NULL, NULL, 'countRows', 273, 274),
(247, 180, NULL, NULL, 'Images', 296, 333),
(248, 247, NULL, NULL, 'getRole', 297, 298),
(249, 247, NULL, NULL, 'countRows', 299, 300),
(250, 247, NULL, NULL, 'admin_add', 301, 302),
(258, 247, NULL, NULL, 'admin_edit', 303, 304),
(259, 247, NULL, NULL, 'admin_ajax_edit', 305, 306),
(260, 247, NULL, NULL, 'admin_delete', 307, 308),
(261, 247, NULL, NULL, 'admin_view', 309, 310),
(262, 180, NULL, NULL, 'PageContents', 334, 369),
(263, 262, NULL, NULL, 'admin_index', 335, 336),
(264, 262, NULL, NULL, 'admin_view', 337, 338),
(265, 262, NULL, NULL, 'admin_add', 339, 340),
(266, 262, NULL, NULL, 'admin_edit', 341, 342),
(267, 262, NULL, NULL, 'admin_delete', 343, 344),
(268, 262, NULL, NULL, 'getRole', 345, 346),
(269, 262, NULL, NULL, 'countRows', 347, 348),
(270, 180, NULL, NULL, 'Banners', 370, 405),
(271, 270, NULL, NULL, 'admin_index', 371, 372),
(272, 270, NULL, NULL, 'admin_view', 373, 374),
(273, 270, NULL, NULL, 'admin_add', 375, 376),
(274, 270, NULL, NULL, 'admin_edit', 377, 378),
(275, 270, NULL, NULL, 'admin_delete', 379, 380),
(276, 270, NULL, NULL, 'getRole', 381, 382),
(277, 270, NULL, NULL, 'countRows', 383, 384),
(278, 270, NULL, NULL, 'getChildren', 385, 386),
(279, 239, NULL, NULL, 'getChildren', 275, 276),
(280, 247, NULL, NULL, 'getChildren', 311, 312),
(281, 262, NULL, NULL, 'getChildren', 349, 350),
(282, 181, NULL, NULL, 'getChildren', 9, 10),
(283, 186, NULL, NULL, 'getChildren', 69, 70),
(284, 194, NULL, NULL, 'getChildren', 111, 112),
(285, 206, NULL, NULL, 'getChildren', 142, 143),
(286, 211, NULL, NULL, 'getChildren', 178, 179),
(287, 219, NULL, NULL, 'getChildren', 238, 239),
(299, 180, NULL, NULL, 'Events', 406, 441),
(300, 299, NULL, NULL, 'admin_index', 407, 408),
(301, 299, NULL, NULL, 'admin_view', 409, 410),
(302, 299, NULL, NULL, 'admin_add', 411, 412),
(303, 299, NULL, NULL, 'admin_edit', 413, 414),
(304, 299, NULL, NULL, 'admin_delete', 415, 416),
(305, 299, NULL, NULL, 'getRole', 417, 418),
(306, 299, NULL, NULL, 'countRows', 419, 420),
(307, 299, NULL, NULL, 'getChildren', 421, 422),
(311, 270, NULL, NULL, 'checkGallery', 387, 388),
(312, 299, NULL, NULL, 'checkGallery', 423, 424),
(313, 239, NULL, NULL, 'checkGallery', 277, 278),
(314, 247, NULL, NULL, 'checkGallery', 313, 314),
(316, 180, NULL, NULL, 'News', 442, 489),
(317, 316, NULL, NULL, 'admin_index', 443, 444),
(318, 316, NULL, NULL, 'admin_view', 445, 446),
(319, 316, NULL, NULL, 'admin_add', 447, 448),
(320, 316, NULL, NULL, 'admin_edit', 449, 450),
(321, 316, NULL, NULL, 'admin_delete', 451, 452),
(322, 316, NULL, NULL, 'admin_archive_news', 453, 454),
(323, 316, NULL, NULL, 'admin_unarchive_news', 455, 456),
(324, 316, NULL, NULL, 'admin_publish_news', 457, 458),
(325, 316, NULL, NULL, 'admin_unpublish_news', 459, 460),
(326, 316, NULL, NULL, 'getRole', 461, 462),
(327, 316, NULL, NULL, 'countRows', 463, 464),
(328, 316, NULL, NULL, 'getChildren', 465, 466),
(329, 316, NULL, NULL, 'checkGallery', 467, 468),
(330, 262, NULL, NULL, 'checkGallery', 351, 352),
(337, 181, NULL, NULL, 'checkGallery', 11, 12),
(338, 186, NULL, NULL, 'checkGallery', 71, 72),
(339, 194, NULL, NULL, 'checkGallery', 113, 114),
(340, 206, NULL, NULL, 'checkGallery', 144, 145),
(341, 211, NULL, NULL, 'checkGallery', 180, 181),
(342, 219, NULL, NULL, 'checkGallery', 240, 241),
(343, 270, NULL, NULL, 'getChildrenId', 389, 390),
(344, 180, NULL, NULL, 'Dashboard', 490, 517),
(345, 344, NULL, NULL, 'admin_index', 491, 492),
(346, 344, NULL, NULL, 'getRole', 493, 494),
(347, 344, NULL, NULL, 'countRows', 495, 496),
(348, 344, NULL, NULL, 'getChildren', 497, 498),
(349, 344, NULL, NULL, 'getChildrenId', 499, 500),
(350, 344, NULL, NULL, 'checkGallery', 501, 502),
(351, 299, NULL, NULL, 'getChildrenId', 425, 426),
(352, 239, NULL, NULL, 'getChildrenId', 279, 280),
(353, 247, NULL, NULL, 'getChildrenId', 315, 316),
(354, 316, NULL, NULL, 'getChildrenId', 469, 470),
(355, 262, NULL, NULL, 'getChildrenId', 353, 354),
(356, 181, NULL, NULL, 'getChildrenId', 13, 14),
(357, 186, NULL, NULL, 'getChildrenId', 73, 74),
(358, 194, NULL, NULL, 'getChildrenId', 115, 116),
(359, 206, NULL, NULL, 'getChildrenId', 146, 147),
(360, 211, NULL, NULL, 'getChildrenId', 182, 183),
(361, 219, NULL, NULL, 'getChildrenId', 242, 243),
(399, 270, NULL, NULL, 'getFirstChild', 391, 392),
(400, 270, NULL, NULL, 'checkForGrandChildren', 393, 394),
(401, 344, NULL, NULL, 'getFirstChild', 503, 504),
(402, 344, NULL, NULL, 'checkForGrandChildren', 505, 506),
(403, 299, NULL, NULL, 'getFirstChild', 427, 428),
(404, 299, NULL, NULL, 'checkForGrandChildren', 429, 430),
(405, 239, NULL, NULL, 'getFirstChild', 281, 282),
(406, 239, NULL, NULL, 'checkForGrandChildren', 283, 284),
(407, 247, NULL, NULL, 'getFirstChild', 317, 318),
(408, 247, NULL, NULL, 'checkForGrandChildren', 319, 320),
(409, 316, NULL, NULL, 'admin_enable_comments', 471, 472),
(410, 316, NULL, NULL, 'admin_disable_comments', 473, 474),
(411, 316, NULL, NULL, 'getFirstChild', 475, 476),
(412, 316, NULL, NULL, 'checkForGrandChildren', 477, 478),
(413, 262, NULL, NULL, 'getFirstChild', 355, 356),
(414, 262, NULL, NULL, 'checkForGrandChildren', 357, 358),
(427, 181, NULL, NULL, 'getFirstChild', 15, 16),
(428, 181, NULL, NULL, 'checkForGrandChildren', 17, 18),
(429, 186, NULL, NULL, 'getFirstChild', 75, 76),
(430, 186, NULL, NULL, 'checkForGrandChildren', 77, 78),
(444, 194, NULL, NULL, 'getFirstChild', 117, 118),
(445, 194, NULL, NULL, 'checkForGrandChildren', 119, 120),
(446, 206, NULL, NULL, 'getFirstChild', 148, 149),
(447, 206, NULL, NULL, 'checkForGrandChildren', 150, 151),
(448, 211, NULL, NULL, 'getFirstChild', 184, 185),
(449, 211, NULL, NULL, 'checkForGrandChildren', 186, 187),
(450, 219, NULL, NULL, 'getFirstChild', 244, 245),
(451, 219, NULL, NULL, 'checkForGrandChildren', 246, 247),
(453, 180, NULL, NULL, 'Blogs', 518, 561),
(454, 453, NULL, NULL, 'admin_index', 519, 520),
(455, 453, NULL, NULL, 'admin_view', 521, 522),
(456, 453, NULL, NULL, 'admin_add', 523, 524),
(457, 453, NULL, NULL, 'admin_edit', 525, 526),
(458, 453, NULL, NULL, 'admin_delete', 527, 528),
(459, 453, NULL, NULL, 'admin_publish', 529, 530),
(460, 453, NULL, NULL, 'admin_unpublish', 531, 532),
(461, 453, NULL, NULL, 'admin_enable_comments', 533, 534),
(462, 453, NULL, NULL, 'admin_disable_comments', 535, 536),
(463, 453, NULL, NULL, 'getRole', 537, 538),
(464, 453, NULL, NULL, 'countRows', 539, 540),
(465, 453, NULL, NULL, 'getChildren', 541, 542),
(466, 453, NULL, NULL, 'getFirstChild', 543, 544),
(467, 453, NULL, NULL, 'checkForGrandChildren', 545, 546),
(468, 453, NULL, NULL, 'getChildrenId', 547, 548),
(469, 453, NULL, NULL, 'checkGallery', 549, 550),
(470, 247, NULL, NULL, 'admin_set_default', 321, 322),
(474, 270, NULL, NULL, 'getFirstChildImage', 395, 396),
(475, 453, NULL, NULL, 'getFirstChildImage', 551, 552),
(476, 344, NULL, NULL, 'getFirstChildImage', 507, 508),
(477, 299, NULL, NULL, 'getFirstChildImage', 431, 432),
(492, 239, NULL, NULL, 'getFirstChildImage', 285, 286),
(493, 247, NULL, NULL, 'getFirstChildImage', 323, 324),
(494, 316, NULL, NULL, 'getFirstChildImage', 479, 480),
(495, 262, NULL, NULL, 'getFirstChildImage', 359, 360),
(505, 181, NULL, NULL, 'getFirstChildImage', 19, 20),
(506, 186, NULL, NULL, 'getFirstChildImage', 79, 80),
(507, 194, NULL, NULL, 'getFirstChildImage', 121, 122),
(508, 206, NULL, NULL, 'getFirstChildImage', 152, 153),
(509, 211, NULL, NULL, 'getFirstChildImage', 188, 189),
(510, 219, NULL, NULL, 'getFirstChildImage', 248, 249),
(511, 270, NULL, NULL, 'getCurrentChild', 397, 398),
(512, 270, NULL, NULL, 'getParent', 399, 400),
(513, 270, NULL, NULL, 'getData', 401, 402),
(514, 453, NULL, NULL, 'getCurrentChild', 553, 554),
(515, 453, NULL, NULL, 'getParent', 555, 556),
(516, 453, NULL, NULL, 'getData', 557, 558),
(517, 344, NULL, NULL, 'getCurrentChild', 509, 510),
(518, 344, NULL, NULL, 'getParent', 511, 512),
(519, 344, NULL, NULL, 'getData', 513, 514),
(520, 299, NULL, NULL, 'getCurrentChild', 433, 434),
(521, 299, NULL, NULL, 'getParent', 435, 436),
(522, 299, NULL, NULL, 'getData', 437, 438),
(526, 239, NULL, NULL, 'getCurrentChild', 287, 288),
(527, 239, NULL, NULL, 'getParent', 289, 290),
(528, 239, NULL, NULL, 'getData', 291, 292),
(529, 247, NULL, NULL, 'getCurrentChild', 325, 326),
(530, 247, NULL, NULL, 'getParent', 327, 328),
(531, 247, NULL, NULL, 'getData', 329, 330),
(532, 316, NULL, NULL, 'getCurrentChild', 481, 482),
(533, 316, NULL, NULL, 'getParent', 483, 484),
(534, 316, NULL, NULL, 'getData', 485, 486),
(535, 262, NULL, NULL, 'getCurrentChild', 361, 362),
(536, 262, NULL, NULL, 'getParent', 363, 364),
(537, 262, NULL, NULL, 'getData', 365, 366),
(540, 181, NULL, NULL, 'getCurrentChild', 21, 22),
(541, 181, NULL, NULL, 'getParent', 23, 24),
(542, 181, NULL, NULL, 'getData', 25, 26),
(543, 186, NULL, NULL, 'getCurrentChild', 81, 82),
(544, 186, NULL, NULL, 'getParent', 83, 84),
(545, 186, NULL, NULL, 'getData', 85, 86),
(546, 194, NULL, NULL, 'getCurrentChild', 123, 124),
(547, 194, NULL, NULL, 'getParent', 125, 126),
(548, 194, NULL, NULL, 'getData', 127, 128),
(549, 206, NULL, NULL, 'getCurrentChild', 154, 155),
(550, 206, NULL, NULL, 'getParent', 156, 157),
(551, 206, NULL, NULL, 'getData', 158, 159),
(552, 211, NULL, NULL, 'getCurrentChild', 190, 191),
(553, 211, NULL, NULL, 'getParent', 192, 193),
(554, 211, NULL, NULL, 'getData', 194, 195),
(555, 219, NULL, NULL, 'getCurrentChild', 250, 251),
(556, 219, NULL, NULL, 'getParent', 252, 253),
(557, 219, NULL, NULL, 'getData', 254, 255),
(569, 270, NULL, NULL, 'getSymbols', 403, 404),
(570, 453, NULL, NULL, 'getSymbols', 559, 560),
(571, 344, NULL, NULL, 'getSymbols', 515, 516),
(572, 299, NULL, NULL, 'getSymbols', 439, 440),
(574, 239, NULL, NULL, 'getSymbols', 293, 294),
(575, 247, NULL, NULL, 'getSymbols', 331, 332),
(576, 316, NULL, NULL, 'getSymbols', 487, 488),
(577, 262, NULL, NULL, 'getSymbols', 367, 368),
(579, 181, NULL, NULL, 'getSymbols', 27, 28),
(580, 186, NULL, NULL, 'getSymbols', 87, 88),
(581, 194, NULL, NULL, 'getSymbols', 129, 130),
(582, 206, NULL, NULL, 'getSymbols', 160, 161),
(583, 211, NULL, NULL, 'getSymbols', 196, 197),
(584, 219, NULL, NULL, 'getSymbols', 256, 257),
(644, 180, NULL, NULL, 'Artists', 562, 597),
(645, 644, NULL, NULL, 'admin_index', 563, 564),
(646, 644, NULL, NULL, 'admin_view', 565, 566),
(647, 644, NULL, NULL, 'admin_add', 567, 568),
(648, 644, NULL, NULL, 'admin_edit', 569, 570),
(649, 644, NULL, NULL, 'admin_delete', 571, 572),
(650, 644, NULL, NULL, 'getRole', 573, 574),
(651, 644, NULL, NULL, 'countRows', 575, 576),
(652, 644, NULL, NULL, 'getChildren', 577, 578),
(653, 644, NULL, NULL, 'getSymbols', 579, 580),
(654, 644, NULL, NULL, 'getFirstChild', 581, 582),
(655, 644, NULL, NULL, 'getCurrentChild', 583, 584),
(656, 644, NULL, NULL, 'getParent', 585, 586),
(657, 644, NULL, NULL, 'getFirstChildImage', 587, 588),
(658, 644, NULL, NULL, 'checkForGrandChildren', 589, 590),
(659, 644, NULL, NULL, 'getChildrenId', 591, 592),
(660, 644, NULL, NULL, 'checkGallery', 593, 594),
(661, 644, NULL, NULL, 'getData', 595, 596),
(662, 180, NULL, NULL, 'Music', 598, 633),
(663, 662, NULL, NULL, 'admin_index', 599, 600),
(664, 662, NULL, NULL, 'admin_view', 601, 602),
(665, 662, NULL, NULL, 'admin_add', 603, 604),
(666, 662, NULL, NULL, 'admin_edit', 605, 606),
(667, 662, NULL, NULL, 'admin_delete', 607, 608),
(668, 662, NULL, NULL, 'getRole', 609, 610),
(669, 662, NULL, NULL, 'countRows', 611, 612),
(670, 662, NULL, NULL, 'getChildren', 613, 614),
(671, 662, NULL, NULL, 'getSymbols', 615, 616),
(672, 662, NULL, NULL, 'getFirstChild', 617, 618),
(673, 662, NULL, NULL, 'getCurrentChild', 619, 620),
(674, 662, NULL, NULL, 'getParent', 621, 622),
(675, 662, NULL, NULL, 'getFirstChildImage', 623, 624),
(676, 662, NULL, NULL, 'checkForGrandChildren', 625, 626),
(677, 662, NULL, NULL, 'getChildrenId', 627, 628),
(678, 662, NULL, NULL, 'checkGallery', 629, 630),
(679, 662, NULL, NULL, 'getData', 631, 632),
(680, 181, NULL, NULL, 'music', 29, 30),
(681, 181, NULL, NULL, 'videos', 31, 32),
(682, 181, NULL, NULL, 'artists', 33, 34),
(683, 181, NULL, NULL, 'news', 35, 36),
(684, 181, NULL, NULL, 'events', 37, 38),
(685, 180, NULL, NULL, '.App', 634, 635),
(686, 180, NULL, NULL, '.Artists', 636, 637),
(687, 180, NULL, NULL, '.Banners', 638, 639),
(688, 180, NULL, NULL, '.Blogs', 640, 641),
(689, 180, NULL, NULL, '.Dashboard', 642, 643),
(690, 180, NULL, NULL, '.Events', 644, 645),
(691, 180, NULL, NULL, '.Galleries', 646, 647),
(692, 180, NULL, NULL, '.Images', 648, 649),
(693, 180, NULL, NULL, '.Music', 650, 651),
(694, 180, NULL, NULL, '.News', 652, 653),
(695, 180, NULL, NULL, '.Null', 654, 655),
(696, 180, NULL, NULL, '.PageContents', 656, 657),
(697, 180, NULL, NULL, '.Pages', 658, 659),
(698, 180, NULL, NULL, '.Users', 660, 661),
(699, 180, NULL, NULL, 'Null', 662, 687),
(700, 699, NULL, NULL, 'getRole', 663, 664),
(701, 699, NULL, NULL, 'countRows', 665, 666),
(702, 699, NULL, NULL, 'getChildren', 667, 668),
(703, 699, NULL, NULL, 'getSymbols', 669, 670),
(704, 699, NULL, NULL, 'getFirstChild', 671, 672),
(705, 699, NULL, NULL, 'getCurrentChild', 673, 674),
(706, 699, NULL, NULL, 'getParent', 675, 676),
(707, 699, NULL, NULL, 'getFirstChildImage', 677, 678),
(708, 699, NULL, NULL, 'checkForGrandChildren', 679, 680),
(709, 699, NULL, NULL, 'getChildrenId', 681, 682),
(710, 699, NULL, NULL, 'checkGallery', 683, 684),
(711, 699, NULL, NULL, 'getData', 685, 686),
(712, 181, NULL, NULL, 'playlists', 39, 40),
(713, 181, NULL, NULL, 'albums', 41, 42),
(714, 181, NULL, NULL, 'pre_releases', 43, 44),
(715, 181, NULL, NULL, 'theme_days', 45, 46),
(716, 181, NULL, NULL, 'up_coming_artist', 47, 48),
(717, 181, NULL, NULL, 'spotlight_on_artist', 49, 50),
(718, 181, NULL, NULL, 'live_streaming', 51, 52),
(719, 180, NULL, NULL, 'Videos', 688, 723),
(720, 719, NULL, NULL, 'admin_index', 689, 690),
(721, 719, NULL, NULL, 'admin_view', 691, 692),
(722, 719, NULL, NULL, 'admin_add', 693, 694),
(723, 719, NULL, NULL, 'admin_edit', 695, 696),
(724, 719, NULL, NULL, 'admin_delete', 697, 698),
(725, 719, NULL, NULL, 'getRole', 699, 700),
(726, 719, NULL, NULL, 'countRows', 701, 702),
(727, 719, NULL, NULL, 'getChildren', 703, 704),
(728, 719, NULL, NULL, 'getSymbols', 705, 706),
(729, 719, NULL, NULL, 'getFirstChild', 707, 708),
(730, 719, NULL, NULL, 'getCurrentChild', 709, 710),
(731, 719, NULL, NULL, 'getParent', 711, 712),
(732, 719, NULL, NULL, 'getFirstChildImage', 713, 714),
(733, 719, NULL, NULL, 'checkForGrandChildren', 715, 716),
(734, 719, NULL, NULL, 'getChildrenId', 717, 718),
(735, 719, NULL, NULL, 'checkGallery', 719, 720),
(736, 719, NULL, NULL, 'getData', 721, 722);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, '', 1, 4),
(2, 1, 'User', 1, '', 2, 3),
(4, NULL, 'Role', 2, '', 5, 8),
(5, 4, 'User', 3, '', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) UNSIGNED NOT NULL,
  `aco_id` int(10) UNSIGNED NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(13, 1, 180, '1', '1', '1', '1'),
(15, 4, 197, '1', '1', '1', '1'),
(16, 4, 198, '1', '1', '1', '1'),
(17, 4, 274, '1', '1', '1', '1'),
(18, 4, 272, '1', '1', '1', '1'),
(19, 4, 271, '1', '1', '1', '1'),
(20, 4, 278, '1', '1', '1', '1'),
(21, 4, 277, '1', '1', '1', '1'),
(22, 4, 276, '1', '1', '1', '1'),
(23, 4, 242, '1', '1', '1', '1'),
(24, 4, 244, '1', '1', '1', '1'),
(25, 4, 243, '1', '1', '1', '1'),
(26, 4, 240, '1', '1', '1', '1'),
(27, 4, 241, '1', '1', '1', '1'),
(28, 4, 246, '1', '1', '1', '1'),
(29, 4, 279, '1', '1', '1', '1'),
(30, 4, 245, '1', '1', '1', '1'),
(31, 4, 250, '1', '1', '1', '1'),
(32, 4, 259, '1', '1', '1', '1'),
(33, 4, 260, '1', '1', '1', '1'),
(34, 4, 258, '1', '1', '1', '1'),
(35, 4, 261, '1', '1', '1', '1'),
(36, 4, 249, '1', '1', '1', '1'),
(37, 4, 280, '1', '1', '1', '1'),
(38, 4, 248, '1', '1', '1', '1'),
(40, 4, 266, '1', '1', '1', '1'),
(41, 4, 263, '1', '1', '1', '1'),
(42, 4, 264, '1', '1', '1', '1'),
(43, 4, 269, '1', '1', '1', '1'),
(44, 4, 281, '1', '1', '1', '1'),
(45, 4, 268, '1', '1', '1', '1'),
(46, 4, 185, '1', '1', '1', '1'),
(48, 4, 282, '1', '1', '1', '1'),
(49, 4, 184, '1', '1', '1', '1'),
(50, 4, 183, '1', '1', '1', '1'),
(51, 4, 187, '1', '1', '1', '1'),
(52, 4, 188, '1', '1', '1', '1'),
(53, 4, 193, '1', '1', '1', '1'),
(54, 4, 283, '1', '1', '1', '1'),
(55, 4, 192, '1', '1', '1', '1'),
(56, 4, 201, '1', '1', '1', '1'),
(57, 4, 196, '1', '1', '1', '1'),
(58, 4, 199, '1', '1', '1', '1'),
(59, 4, 204, '1', '1', '1', '1'),
(60, 4, 284, '1', '1', '1', '1'),
(61, 4, 203, '1', '1', '1', '1'),
(62, 4, 195, '1', '1', '1', '1'),
(63, 4, 209, '1', '1', '1', '1'),
(64, 4, 217, '1', '1', '1', '1'),
(65, 4, 237, '1', '1', '1', '1'),
(66, 4, 222, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(100) NOT NULL,
  `artist_info` varchar(1) NOT NULL DEFAULT '0',
  `category` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail_photo` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `add_content` varchar(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artist_info`, `category`, `name`, `content`, `thumbnail_photo`, `cover_photo`, `add_content`, `created`, `modified`) VALUES
(1, '1', NULL, 'upcoming artist', '', '', '', '1', '2014-10-31 15:01:39', '2014-10-31 15:16:58'),
(2, '1', NULL, 'spotlight on artist', '', '', '', '1', '2014-10-31 15:02:11', '2014-10-31 15:17:04'),
(3, '0', '1', 'Worlasi Langani', '<p>We begin the maiden edition of the Up &amp; Coming Artist section of <a href=\"http://www.tigomusic.com.gh\">http://www.tigomusic.com.gh</a>&nbsp;with a supremeRights&nbsp;records artist Worlasi detailing&nbsp;his journey in the music industry so far. &nbsp;As any serious&nbsp;artist will attest,&nbsp;certain obstacles may appear en route to the &quot;<strong>Destinaton</strong>&quot;&nbsp;but determination, hard work and a positive mindset usually relegate them to experience.&nbsp; Label mate Krack Gyamfi provides powerful lyrics justifying the struggles and triumphs of trying to reach a goal&nbsp;within touching distance.&nbsp;</p>\r\n\r\n<p>Worlasi Langani is Ghana&rsquo;s newest and arguably most multi-talented young talent.&nbsp; Song composition and production along with singing, rapping, painting and drawing are just some of the elements of his artistic repertoire.&nbsp; With so much to offer, Langani&rsquo;s future is set on a long and fruitful path.</p>\r\n\r\n<p>Record label, supremeRights, plan to release Worlasi&rsquo;s debut mixtape in the near future.&nbsp; Click link below to listen to &ldquo;Destination&rdquo; and other good songs.</p>\r\n\r\n<p>Other songs :&nbsp;<a href=\"http://www.hulkshare.com/worlasi\">http://www.hulkshare.com/worlasi</a></p>\r\n\r\n<p>Music Production:&nbsp; supremeRights<br />\r\nMusic Mixing: Dr Qube</p>\r\n', '', '01_Worlasi_20141031_v1.JPG', '0', '2014-10-31 15:23:11', '2014-11-05 11:41:37'),
(4, '0', '2', 'MzVee', '<p><span style=\"line-height: 1.6em;\">MzVee to launch&nbsp;</span></p>\r\n\r\n<p>Ghanaian female sensation, MzVee is set to confirm her fast growing reputation as one of the hard working musicians in the country as she stages her own concert on Friday, the 21st of November.</p>\r\n\r\n<p>This free open air concert will be held at the Accra Mall Car Park and will also be used to launch her Re-Vee-Lation album which will be made available exclusively for a two-week period on Deezer offered by Tigo Music.</p>\r\n\r\n<p>MzVee will be supported on stage by musicians such as Stonebouy, Efya, VVIP, Joel, Jayla, Lil Shaker, Tinny and Shatta Wale while other celebrities such as DKB, John Dumelo, James Gardener, Lydia Forson and Berla Mundi will also make special appearances.</p>\r\n\r\n<p>The female diva who started her solo career earlier this year has been tiptoeing across the nation performing on different stages to a wide range of people winning more hearts and fans, one song at a time.</p>\r\n\r\n<p>This concert is seen as the culmination of all her hard work throughout the year and will involve the young songstress showing off her powerful voice and superb stagecraft as she performs with the Patchbay band, well-choreographed dancers and her incredible turn up stage Krew of DJ Vyrusky and The Turn Up, Sheldon.</p>\r\n\r\n<p>The Re-Vee-Lation concert is being powered by Tigo Music and is being sponsored by Blaqe Energy Drink with support from Aquatork Mineral Water, Echo House and Merqury Republic.</p>\r\n', '', 'DSC_3781-0.JPG', '0', '2014-11-05 11:28:56', '2014-11-05 11:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `category` varchar(11) DEFAULT NULL,
  `banner_image` varchar(160) NOT NULL,
  `title` varchar(140) NOT NULL,
  `description` text NOT NULL,
  `url_content` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `add_banner` varchar(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category`, `banner_image`, `title`, `description`, `url_content`, `url`, `add_banner`, `created`, `modified`) VALUES
(1, NULL, '', 'home', '', '', NULL, '1', '2014-10-28 15:26:14', '2014-10-28 15:26:14'),
(2, NULL, 'music_banner-0.jpg', 'music', '', '', NULL, '1', '2014-10-28 15:26:23', '2014-10-31 23:58:53'),
(3, NULL, 'video_banner-0.jpg', 'videos', '', '', NULL, '1', '2014-10-28 15:26:34', '2014-10-31 23:59:24'),
(4, NULL, '', 'artists', '', '', NULL, '1', '2014-10-28 15:27:13', '2014-10-28 15:27:13'),
(5, NULL, 'events_banner-1.jpg', 'events', '', '', NULL, '1', '2014-10-28 15:27:22', '2014-10-31 23:59:39'),
(6, NULL, 'news_banner-0.jpg', 'news', '', '', NULL, '1', '2014-10-28 15:27:31', '2014-10-31 23:59:51'),
(7, '1', 'mzvee.jpg', 'Discover Music You\'ll<br /> Love.', 'Deezer is the No. 1 app for listening to music on demand.<br /> Discover more than 35 million tracks, create your own playlists, <br /> and share your favourite tracks with friends.', '', NULL, '0', '2014-10-28 15:36:59', '2014-11-01 06:56:54'),
(8, '1', 'shatta.jpg', 'Music That Never <br />Stops.', 'Deezer is the No. 1 app for listening to music on demand. <br />Discover more than 35 million tracks, create your own playlists, <br />and share your favourite tracks with friends.', '', NULL, '0', '2014-10-28 15:38:01', '2014-11-01 06:52:04'),
(9, '1', 'banner3.jpg', 'Experience Your Music Like <br />Never Before.', 'Deezer is a music streaming service which gives you access <br />over 30 million songs in enhanced sound quality. <br /> Download the Deezer app now!', '', NULL, '0', '2014-10-28 15:38:53', '2014-11-01 06:54:59'),
(10, '2', 'music_banner-3.jpg', 'Music That Never <br />Stops.', '', '', NULL, '0', '2014-10-29 08:47:07', '2014-11-01 07:47:00'),
(11, '3', 'video_banner-1.jpg', 'banner 1', '', '', NULL, '0', '2014-10-31 18:49:40', '2014-11-01 00:05:40'),
(12, '5', 'events_banner-2.jpg', 'banner 1', '', '', NULL, '0', '2014-10-31 18:50:06', '2014-11-01 00:06:12'),
(13, '6', 'news_banner-1.jpg', 'banner 1', '', '', NULL, '0', '2014-10-31 18:50:25', '2014-11-01 00:06:30'),
(14, '4', 'artists-0.jpg', 'banner 1', '', '', NULL, '0', '2014-11-01 00:16:31', '2014-11-01 08:07:32'),
(15, NULL, '', 'how to access deezer', '', '', NULL, '1', '2014-11-06 16:46:27', '2014-11-06 16:46:27'),
(16, '15', 'how_to_access_deezer.jpg', 'banner 1', '', '', NULL, '0', '2014-11-06 16:49:26', '2014-11-07 17:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_image` varchar(140) DEFAULT NULL,
  `file` varchar(160) NOT NULL,
  `title` varchar(140) NOT NULL,
  `content` longtext NOT NULL,
  `event_date` varchar(100) DEFAULT NULL,
  `time` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_image`, `file`, `title`, `content`, `event_date`, `time`, `created`, `modified`) VALUES
(1, 'tigomusic_inplugged-0.jpg', '', 'Tigo Music Unplugged set to rock Accra on Oct 31', '<p>Accra is getting ready to host one of its biggest shows in recent months on Friday, October 31.</p>\r\n\r\n<p>Coming on the back of the successful launch of Tigo Music, the music streaming service being rolled out by the telecommunication network, the Accra Sports Stadium will this weekend witness a huge concert of some of Africa&rsquo;s biggest acts.</p>\r\n\r\n<p>Sarkodie, Ghana&rsquo;s most successful artiste in the last five years, shares the stage with Nigeria&rsquo;s Davido, as well as 4x4, Guru, MzVee, and dancehall act, Shatta Wale.</p>\r\n\r\n<p>In what promises to be a good show, organizers are hopeful the Tigo Music concert will live up to expectation.</p>\r\n\r\n<p>Tigo&rsquo;s love for music is evident in how they&rsquo;ve supported several concerts in the past, as well as its own Tigofest &ndash; a roadshow that celebrates the diverse cultures of Ghana.</p>\r\n\r\n<p>Tigo&rsquo;s partnership with Deezer, the international music streaming service will provide the Ghanaian end user an unlimited music experience.</p>\r\n\r\n<p>Through pre-paid data bundles, the network&rsquo;s customers will from 31 October, 2014 have access to more than 35 million tracks including those of Ghanaian acts &ndash; those on Saturday&rsquo;s bill inclusive.</p>\r\n', '10/31/2014', '22:00:00', '2014-11-01 10:14:29', '2014-11-03 09:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_thumb` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `link_id`, `name`, `description`, `img_thumb`, `created`, `modified`) VALUES
(1, 1, 'Tigo Music Unplugged set to rock Accra on Oct 31', '', '', '2014-11-03 09:25:56', '2014-11-03 09:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `img_thumb` varchar(100) NOT NULL,
  `default_img` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `deezer_link` varchar(255) NOT NULL,
  `music_type` varchar(1) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL,
  `track_name` varchar(255) NOT NULL,
  `track` varchar(255) NOT NULL,
  `add_content` varchar(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `category`, `name`, `text`, `deezer_link`, `music_type`, `cover`, `track_name`, `track`, `add_content`, `created`, `modified`) VALUES
(1, NULL, 'playlists', '', '', '1', '', '', '', '1', '2014-10-28 19:42:21', '2014-10-28 19:42:21'),
(2, NULL, 'albums', '', '', '1', '', '', '', '1', '2014-10-28 19:48:22', '2014-10-31 18:04:58'),
(3, NULL, 'pre-releases', '', '', '1', '', '', '', '1', '2014-10-28 19:48:51', '2014-11-02 10:41:57'),
(4, NULL, 'theme days', '', '', '1', '', '', '', '1', '2014-10-28 19:49:07', '2014-10-28 19:49:07'),
(5, '1', 'tigo music top 40', '', 'http://api.deezer.com/playlist/1029090317', '1', '', '', '', '0', '2014-10-28 20:23:20', '2014-10-31 17:58:36'),
(6, '1', 'tigo music fresh', '', 'http://api.deezer.com/playlist/1029331926', '1', '', '', '', '0', '2014-10-28 20:37:01', '2014-10-31 17:57:35'),
(8, '2', 'daVido - Omo Baba Olowo', '', 'http://api.deezer.com/album/6788577', '1', '', '', '', '0', '2014-10-31 18:06:23', '2014-10-31 18:06:23'),
(9, '2', 'Sarkodie - Sarkology', '', 'http://api.deezer.com/album/7283270', '1', '', '', '', '0', '2014-10-31 18:07:28', '2014-10-31 18:07:28'),
(10, '2', 'shatta wale - answers', '', 'http://api.deezer.com/album/7592560', '1', '', '', '', '0', '2014-10-31 18:08:01', '2014-10-31 18:08:01'),
(11, '3', 'Sarkodie ft. Shatta Wale', '', 'http://api.deezer.com/track/89483547', '1', 'Sarkodie_ft_Shatta_Wale_2014.jpg', '', '', '0', '2014-11-01 08:14:36', '2014-11-02 10:42:41'),
(12, '1', 'tigo party hitz', '', 'http://api.deezer.com/playlist/1035177151', '1', '', '', '', '0', '2014-11-05 11:19:25', '2014-11-05 11:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `title` varchar(255) DEFAULT NULL,
  `story` text,
  `summary` text,
  `author` int(11) DEFAULT NULL,
  `timestamp` varchar(160) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `archive` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `file` varchar(160) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`title`, `story`, `summary`, `author`, `timestamp`, `publish`, `archive`, `image`, `file`, `category`, `id`) VALUES
('Tigo Music goes live in Ghana', '<p>Accra, October 24th, 2014 &ndash; Tigo Ghana today announced the launch of Tigo Music and a partnership with Deezer, the international music streaming service that will provide Ghanaians with unlimited music experience.</p>\r\n\r\n<p>Through pre-paid data bundles, Tigo customers will from 31 October, 2014 access and enjoy more than 35 million tracks including African and Ghanaian artistes on their phones and tablets. Additionally, Tigo will also be sourcing exciting new and local content through a new venture with the digital music company, Africa Music Rights, which funds, acquires and manages music rights across the African continent.</p>\r\n\r\n<p>The CEO of Tigo, Roshi Motman, said, &ldquo;We are excited to be the first in Ghana to give our customers such access to unlimited music. Music plays a major role in Ghana&rsquo;s rich and diverse culture as it is enjoyed at every social event and in private moments. This is a significant achievement for us as we expect more and more people to use smartphones in this part of the world&rdquo;, she said.</p>\r\n\r\n<p>&ldquo;As a digital lifestyle brand, Tigo Music will enable us to integrate seamlessly into the everyday lives of Ghanaians and promote great local music. I am also excited that we have the support of the Musicians Union of Ghana, MUSIGA,&rdquo; she added.</p>\r\n\r\n<p>As part of the launch for Tigo Music, we will celebrate with our customers with several headline artistes at the Accra Sports on 31st October 2014.</p>\r\n\r\n<p>The introduction of Tigo Music in Ghana follows the success of its launch in Latin America in 2012 where it has become an integral part of people&rsquo;s daily digital lives and synonymous with both live music events headlined by some of the world&rsquo;s best-known artists, as well as with close-up studio recordings.</p>\r\n\r\n<p>Tigo Music as a brand has grown in Colombia to become the country&#39;s leading music streaming service, with 600,000 users listening on average to more than 400 songs and 40 hours of music every month.</p>\r\n\r\n<p>Music streaming is the fastest growing area for the global music industry and music content is already the second most popular mobile phone feature in sub-Saharan Africa.</p>\r\n\r\n<p>For further information please contact the Tigo press line on 0577 900 000 or media.enquiries@tigo.com.gh. You can also connect with Tigo Ghana at: www.facebook.com/tigoghana</p>\r\n', NULL, NULL, '1414558800', 1, 0, 'Tigo_Music_Goes_Live_in_Ghana.jpg', '', NULL, 1),
('Tigo Music Unplugged 2014', '<p>Accra is getting ready to host one of its biggest shows in recent months on Friday, October 31.</p>\r\n\r\n<p>Coming on the back of the successful launch of Tigo Music, the music streaming service being rolled out by the telecommunication network, the Accra Sports Stadium will this weekend witness a huge concert of some of Africa&rsquo;s biggest acts.</p>\r\n\r\n<p>Sarkodie, Ghana&rsquo;s most successful artiste in the last five years, shares the stage with Nigeria&rsquo;s Davido, as well as 4x4, Guru, MzVee, and dancehall act, Shatta Wale.</p>\r\n\r\n<p>In what promises to be a good show, organizers are hopeful the Tigo Music concert will live up to expectation.</p>\r\n\r\n<p>Tigo&rsquo;s love for music is evident in how they&rsquo;ve supported several concerts in the past, as well as its own Tigofest &ndash; a roadshow that celebrates the diverse cultures of Ghana.</p>\r\n\r\n<p>Tigo&rsquo;s partnership with Deezer, the international music streaming service will provide the Ghanaian end user an unlimited music experience.</p>\r\n\r\n<p>Through pre-paid data bundles, the network&rsquo;s customers will from 31 October, 2014 have access to more than 35 million tracks including those of Ghanaian acts &ndash; those on Saturday&rsquo;s bill inclusive.</p>\r\n', NULL, NULL, '1414645200', 1, 0, 'tigomusic_inplugged.jpg', '', NULL, 2),
('Join us on our live feed', '<p>Tigo music unplugged will be streamed live at&nbsp;<a href=\"http://www.tigomusic.com.gh\">http://www.tigomusic.com.gh</a>. Join us, feel the vibe.</p>\r\n', NULL, NULL, '1414713600', 1, 0, 'Guru.jpg', '', NULL, 3),
('NEWS', '<p>Hello Sheba,</p>\r\n\r\n<p><span style=\"line-height: 1.6em;\">Kindly find attached.</span></p>\r\n\r\n<p>There was a verification issue with the domain but I just sorted it out. it&rsquo;ll take up to 24hours to take effect and your emails will start working.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks</p>\r\n\r\n<p>Godwin</p>\r\n', NULL, NULL, '1417132800', 1, 0, 'logotype_0029_01_talkmore.png', '', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int(11) NOT NULL,
  `category` varchar(11) DEFAULT NULL,
  `page_image` varchar(140) DEFAULT NULL,
  `title` varchar(140) NOT NULL,
  `content` longtext NOT NULL,
  `add_content` varchar(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `category`, `page_image`, `title`, `content`, `add_content`, `created`, `modified`) VALUES
(1, NULL, NULL, 'how to access deezer', '<p>Deezer is a music streaming smartphone application that will allow subscribers to stream and listen to their favourite musicians. Over 38 millions songs can be accessed on the deezer service only on Tigo in Ghana. A subscriber must buy a music package of choice to access their kind of music.</p>\r\n\r\n<p>Three (3) new data packages are available to access Deezer:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 100%;\">\r\n	<thead>\r\n		<tr>\r\n			<th><strong>New packages</strong></th>\r\n			<th><strong>Price (GHC)</strong></th>\r\n			<th><strong>Volume</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Weekend Unlimited Music</td>\r\n			<td>4.99</td>\r\n			<td>500MB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weekly Unlimited Music</td>\r\n			<td>11.99</td>\r\n			<td>1.5GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Monthly Unlimited Music</td>\r\n			<td>59.99</td>\r\n			<td>9.0GB</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Activate Deezer Now</strong></p>\r\n\r\n<ol>\r\n	<li>Subscribers can access Deezer by dialing *500# for data packages</li>\r\n	<li>Subscriber receives a confirmation SMS with a link to download Deezer</li>\r\n	<li>If user already has Deezer on the smartphone, he/she can open the app via the same medium.</li>\r\n	<li>Subscriber goes through 3 steps&nbsp; as indicated in picture below:<br />\r\n	<img alt=\"\" src=\"/app/webroot/files/uploads/how to access deezer/steps.png\" /></li>\r\n	<li value=\"5\">User will have to create his/her account using their e-mail address, facebook or google+ accounts</li>\r\n	<li value=\"6\">Subscriber have to then enter mobile phone number and proceeds</li>\r\n	<li>Subscriber receives unique code from Deezer via SMS</li>\r\n	<li>Subscriber uses this code to activate the account</li>\r\n	<li>Unlimited Music is ready to be experienced!!!&nbsp;</li>\r\n</ol>\r\n', '1', '2014-11-05 13:43:07', '2014-11-05 11:03:14'),
(2, '1', NULL, 'Can any holder of a phone, whether smart or other use deezer?', '<p><strong>Ans:</strong> For only smart phone users (android, windows, IOS and BB)&nbsp;</p>\r\n', '0', '2014-11-05 15:25:48', '2014-11-05 15:25:48'),
(3, '1', NULL, 'Can I download Deezer on my own without receiving a link from Tigo?', '<p><strong>Ans:</strong> Yes, you can go to the App store (iOS) or Google Play Store to download the app.</p>\r\n', '0', '2014-11-05 15:26:38', '2014-11-05 15:26:38'),
(4, '1', NULL, 'Can I use deezer on my pc?', '<p><strong>Ans:</strong> Yes, with the same subscription and user details you can access deezer on multipls device.</p>\r\n', '0', '2014-11-05 15:27:12', '2014-11-05 15:27:12'),
(5, '1', NULL, 'Can I download songs on deezer?', '<p><strong>Ans:</strong> Yes, but to the app not to the phone (offline sync)</p>\r\n', '0', '2014-11-05 15:27:56', '2014-11-05 15:27:56'),
(6, '1', NULL, 'How can you synchronize music on deezer?', '<p><strong>Ans:</strong> Look for the offline sync option or a download icon on the deezer platform on &nbsp;&nbsp;your phone anytime you select a track or album and turn it on of click favourite.</p>\r\n', '0', '2014-11-05 15:28:26', '2014-11-05 15:28:26'),
(7, '1', NULL, 'Do I have a limit to the songs I download?', '<p><strong>Ans: </strong>Your limit is only related to your phone&rsquo;s storage space. The larger the storage space on your phone, the larger the number of songs you can sync to your phone.</p>\r\n', '0', '2014-11-05 15:28:43', '2014-11-05 15:29:12'),
(8, '1', NULL, 'Can I search for songs of my choice?', '<p><strong>Ans:</strong> You can search for all the songs that you want with the Deezer search engine. Your search can be with Artist name, Song title, Album title or even featured artists.</p>\r\n', '0', '2014-11-05 15:29:49', '2014-11-05 15:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrator', '2012-07-03 20:15:14', '2012-07-03 20:15:14'),
(2, 'User', '2012-07-11 18:38:46', '2012-07-11 18:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`, `created`, `modified`) VALUES
(1, 'Adrenalin Media Administrator', 'admin', 'aeaf53400c81ff1d0fec1946582f1abcf765c5cb', 1, '2012-07-03 20:20:22', '2013-05-15 14:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `category` varchar(1) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `video_poster` varchar(255) NOT NULL,
  `video_mp4` varchar(255) NOT NULL,
  `video_webm` varchar(255) NOT NULL,
  `video_ogv` varchar(255) NOT NULL,
  `add_content` varchar(255) NOT NULL,
  `content_type` varchar(1) NOT NULL DEFAULT '0',
  `youtube_link` varchar(200) NOT NULL,
  `youtube` varchar(1) NOT NULL DEFAULT '0',
  `parent` varchar(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `category`, `name`, `text`, `video_poster`, `video_mp4`, `video_webm`, `video_ogv`, `add_content`, `content_type`, `youtube_link`, `youtube`, `parent`, `created`, `modified`) VALUES
(1, NULL, 'videos', '', '', '', '', '', '1', '1', '', '0', '1', '2014-11-01 06:52:20', '2014-11-01 07:19:49'),
(2, '1', 'Davido - GOBE (Official Video)', '', 'vlcsnap_2014_11_13_13h02m10s56.png', 'Davido_GOBE_Official_Video.mp4', '', '', '', '0', '', '0', '0', '2014-11-01 09:50:58', '2014-11-13 13:03:48'),
(3, '1', 'Shatta Wale ft MzVee - Dancehall Queen (Official Video)', '', '', '', '', '', '', '0', 'http://www.youtube.com/watch?v=4fmj3UzrlEQ', '1', '0', '2014-11-17 15:09:44', '2014-11-17 15:09:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;

--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
