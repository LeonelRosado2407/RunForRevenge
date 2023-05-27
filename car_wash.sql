-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `estacion`;
CREATE TABLE `estacion` (
  `idestacion` int NOT NULL AUTO_INCREMENT,
  `nomestacion` varchar(100) NOT NULL,
  PRIMARY KEY (`idestacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `estacion` (`idestacion`, `nomestacion`) VALUES
(1,	'A'),
(2,	'B'),
(3,	'C');

DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `idhorario` int NOT NULL AUTO_INCREMENT,
  `hora_inicial` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `horario` (`idhorario`, `hora_inicial`, `hora_final`) VALUES
(1,	'10:00:00',	'11:00:00'),
(2,	'11:00:00',	'12:00:00'),
(3,	'12:00:00',	'13:00:00'),
(4,	'13:00:00',	'14:00:00'),
(5,	'14:00:00',	'15:00:00');

DROP TABLE IF EXISTS `materiaprima`;
CREATE TABLE `materiaprima` (
  `idmateriaprima` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idmateriaprima`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `materiaprima` (`idmateriaprima`, `nombre`) VALUES
(1,	'Cera'),
(2,	'Shampoo'),
(3,	'Pintura');

DROP TABLE IF EXISTS `materiaprimaxtiposervicio`;
CREATE TABLE `materiaprimaxtiposervicio` (
  `idmateriaprima` int NOT NULL,
  `idtiposervicio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `materiaprimaxtiposervicio` (`idmateriaprima`, `idtiposervicio`) VALUES
(2,	3),
(3,	3),
(1,	1),
(2,	1),
(2,	2);

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `idpermiso` int NOT NULL AUTO_INCREMENT,
  `nompermiso` varchar(100) NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `permiso` (`idpermiso`, `nompermiso`, `clave`) VALUES
(1,	'Modulo de Servicios',	'Servicio'),
(2,	'Modulo de Personal',	'Personal'),
(3,	'Modulo de Tipos Socio',	'TiposSocio'),
(4,	'Modulo de Adminer',	'Adminer'),
(5,	'Modulo de Socios',	'Socios'),
(6,	'Modulo de Tipo Servicios',	'TipoServicios'),
(7,	'Modulo de Edicion',	' Edicion');

DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `idpersonal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `curp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idsucursal` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `personal` (`idpersonal`, `nombre`, `curp`, `foto`, `idsucursal`, `idusuario`) VALUES
(1,	'carlos ventura uh',	'VEUC03072HYN',	'fotos/foto-1665200946.png',	1,	0),
(2,	'gabriel',	'AJUC03072HYN',	'fotos/foto-1663737464.png',	2,	0),
(3,	'roger',	'AJUC03072HYN',	'fotos/foto-1663737485.png',	3,	0),
(4,	'Carlos arif',	'AJUC03072HYN',	'fotos/foto-1663737424.png',	4,	0),
(56,	'Mr. Rahul Simonis Sr. Bradtke',	'0-9A-Z0-9A-Z',	'',	5,	0),
(57,	'Samara Heaney Mohr',	'0-9A-Z0-9A-Z',	'',	1,	0),
(58,	'Adrienne Heathcote Conn',	'0-9A-Z0-9A-Z',	'',	4,	0),
(59,	'Hayden Rohan Carroll',	'0-9A-Z0-9A-Z',	'',	1,	0),
(60,	'Hadley Lindgren PhD Raynor',	'0-9A-Z0-9A-Z',	'',	5,	0),
(61,	'Gail Moen Pollich',	'0-9A-Z0-9A-Z',	'',	3,	0),
(62,	'Vilma Sporer Harvey',	'0-9A-Z0-9A-Z',	'',	1,	0),
(63,	'Carleton Cronin Reichert',	'0-9A-Z0-9A-Z',	'',	1,	0),
(64,	'Eino Jaskolski V Ward',	'0-9A-Z0-9A-Z',	'',	5,	0),
(65,	'Dr. Ally Schamberger Renner',	'0-9A-Z0-9A-Z',	'',	3,	0),
(66,	'Leif Nienow MD Waters',	'0-9A-Z0-9A-Z',	'',	4,	0),
(67,	'Mrs. Melisa Huel II Hansen',	'0-9A-Z0-9A-Z',	'',	5,	0),
(68,	'Julius Hessel Botsford',	'0-9A-Z0-9A-Z',	'',	4,	0),
(69,	'Mr. Olin Bailey Effertz',	'0-9A-Z0-9A-Z',	'',	5,	0),
(70,	'Loy Beahan Rutherford',	'0-9A-Z0-9A-Z',	'',	5,	0),
(71,	'Mr. Porter Zboncak Heaney',	'0-9A-Z0-9A-Z',	'',	4,	0),
(72,	'Caden Terry Littel',	'0-9A-Z0-9A-Z',	'',	2,	0),
(73,	'Aric Sauer Rosenbaum',	'0-9A-Z0-9A-Z',	'',	1,	0),
(74,	'Telly Tillman Kemmer',	'0-9A-Z0-9A-Z',	'',	4,	0),
(75,	'Shanna Bahringer Runolfsson',	'0-9A-Z0-9A-Z',	'',	3,	0),
(76,	'Miss Francesca Conroy Heller',	'0-9A-Z0-9A-Z',	'',	5,	0),
(77,	'Mrs. Dasia Bode Gleichner',	'0-9A-Z0-9A-Z',	'',	5,	0),
(78,	'Dr. May D\'Amore V Ritchie',	'0-9A-Z0-9A-Z',	'',	3,	0),
(79,	'Rodolfo Prohaska Corwin',	'0-9A-Z0-9A-Z',	'',	2,	0),
(80,	'Dr. Walter Klocko Beahan',	'0-9A-Z0-9A-Z',	'',	4,	0),
(81,	'Keira McClure Heathcote',	'0-9A-Z0-9A-Z',	'',	5,	0),
(82,	'Valentine Leffler Kutch',	'0-9A-Z0-9A-Z',	'',	2,	0),
(83,	'Brady Mills V Schneider',	'0-9A-Z0-9A-Z',	'',	5,	0),
(84,	'Reagan Purdy Witting',	'0-9A-Z0-9A-Z',	'',	3,	0),
(85,	'Prof. Gabrielle McDermott V Braun',	'0-9A-Z0-9A-Z',	'',	2,	0),
(86,	'Prof. Imogene Greenfelder Bode',	'0-9A-Z0-9A-Z',	'',	3,	0),
(87,	'Stefanie King Pfeffer',	'0-9A-Z0-9A-Z',	'',	5,	0),
(88,	'Armando Tillman Schuster',	'0-9A-Z0-9A-Z',	'',	5,	0),
(89,	'Bo Durgan Ernser',	'0-9A-Z0-9A-Z',	'',	1,	0),
(90,	'Pascale Flatley Buckridge',	'0-9A-Z0-9A-Z',	'',	4,	0),
(91,	'Mrs. Mossie Aufderhar Schimmel',	'0-9A-Z0-9A-Z',	'',	3,	0),
(92,	'Mr. Lawrence Satterfield II Cassin',	'0-9A-Z0-9A-Z',	'',	5,	0),
(93,	'Dr. Deven Morissette II Lakin',	'0-9A-Z0-9A-Z',	'',	2,	0),
(94,	'Mireille DuBuque Kunde',	'0-9A-Z0-9A-Z',	'',	2,	0),
(95,	'Paula Cartwright Cummerata',	'0-9A-Z0-9A-Z',	'',	2,	0),
(96,	'Marvin Wiegand Crist',	'0-9A-Z0-9A-Z',	'',	2,	0),
(97,	'Naomi Becker Treutel',	'0-9A-Z0-9A-Z',	'',	4,	0),
(98,	'Mr. Bennett Littel DDS Kautzer',	'0-9A-Z0-9A-Z',	'',	5,	0),
(99,	'Dr. Tom Leannon Goodwin',	'0-9A-Z0-9A-Z',	'',	1,	0),
(100,	'Christopher Lockman Miller',	'0-9A-Z0-9A-Z',	'',	2,	0),
(101,	'Mr. Elbert Romaguera Crona',	'0-9A-Z0-9A-Z',	'',	5,	0),
(102,	'Mr. Benjamin Simonis Murray',	'0-9A-Z0-9A-Z',	'',	5,	0),
(103,	'Josie Farrell Champlin',	'0-9A-Z0-9A-Z',	'',	5,	0),
(104,	'Pearlie Schoen Sr. Hayes',	'0-9A-Z0-9A-Z',	'',	1,	0),
(105,	'Miss Margaretta Williamson Herzog',	'0-9A-Z0-9A-Z',	'',	3,	0),
(106,	'Carlos arif',	'VEUC03072HYNNHRA2',	'fotos/foto-1664737957.png',	2,	0),
(107,	'Carlos arif',	'AJUC03072HYNNHRA2',	'fotos/foto-1664738066.png',	3,	0),
(108,	'roger',	'AJUC03072HYNNHRA2',	'fotos/foto-1664751717.png',	3,	0),
(109,	'Carlos arif',	'VEUC03072HYNNHRA2',	'',	3,	0),
(110,	'Green Rowe Welch',	'G8',	'',	2,	0),
(111,	'Beth Sanford Runte',	'DK',	'',	3,	0),
(112,	'Garry Stiedemann Schroeder',	'32',	'',	2,	0),
(113,	'Marilie Wisozk Glover',	'RR',	'',	2,	0),
(114,	'Carolyn Schultz Rempel',	'WS',	'',	2,	0),
(115,	'Garland Conroy Quitzon',	'1N',	'',	5,	0),
(116,	'Mrs. Sydnie Sawayn O\'Reilly',	'WA',	'',	3,	0),
(117,	'Itzel Bins Turner',	'PN',	'',	1,	0),
(118,	'Geovanny Effertz Fahey',	'1U',	'',	4,	0),
(119,	'Miss Genevieve Hintz DVM Will',	'6U',	'',	4,	0),
(120,	'Jaycee Koelpin Champlin',	'0A',	'',	5,	0),
(121,	'Rickey Sauer Kling',	'WA',	'',	5,	0),
(122,	'Ardith Reichel IV Mertz',	'25',	'',	2,	0),
(123,	'Dannie Schmidt Volkman',	'YT',	'',	5,	0),
(124,	'Cathrine Macejkovic Terry',	'2S',	'',	4,	0),
(125,	'Prof. Richie Durgan Willms',	'RA',	'',	3,	0),
(126,	'Claire Ryan Hilll',	'BW',	'',	3,	0),
(127,	'Trace Bradtke Howell',	'11',	'',	1,	0),
(128,	'Shanny Thompson DDS Wintheiser',	'GG',	'',	1,	0),
(129,	'Ms. Elta McClure V Blick',	'CJ',	'',	4,	0),
(130,	'Marjorie Kautzer PhD Borer',	'V3',	'',	2,	0),
(131,	'Giles Blick II Miller',	'YH',	'',	1,	0),
(132,	'Dr. Lilla McKenzie MD Johnson',	'FF',	'',	2,	0),
(133,	'Miss Adaline Runolfsson PhD Marks',	'9M',	'',	5,	0),
(134,	'Miss Christelle Hermann PhD Huels',	'LT',	'',	3,	0),
(135,	'Nia Huel I Keeling',	'QR',	'',	5,	0),
(136,	'Jules Moen Raynor',	'FW',	'',	5,	0),
(137,	'Mrs. Zoie Swift Macejkovic',	'0O',	'',	4,	0),
(138,	'Cedrick Wolf Morar',	'YT',	'',	3,	0),
(139,	'Prof. Vaughn Leannon Sr. Anderson',	'GT',	'',	1,	0),
(140,	'Ruben McDermott MD Gulgowski',	'9F',	'',	5,	0),
(141,	'Enola Windler Gleason',	'MZ',	'',	2,	0),
(142,	'Hope Beatty Robel',	'QY',	'',	2,	0),
(143,	'Margot Legros Graham',	'B6',	'',	4,	0),
(144,	'Prof. Gerhard Schultz Emmerich',	'WN',	'',	1,	0),
(145,	'Bernard Kunze Franecki',	'UP',	'',	5,	0),
(146,	'Jayce Hoeger Zemlak',	'SC',	'',	1,	0),
(147,	'Dr. Emilie Mitchell II Koch',	'HI',	'',	4,	0),
(148,	'Nathanial Rohan Kiehn',	'ZR',	'',	2,	0),
(149,	'Brisa Hauck Hamill',	'CV',	'',	1,	0),
(150,	'Alessandro Haag V Oberbrunner',	'PA',	'',	2,	0),
(151,	'Fern Smith I Turner',	'MN',	'',	3,	0),
(152,	'Miss Caitlyn Davis Weber',	'5H',	'',	2,	0),
(153,	'Khalil Bernier Gulgowski',	'YR',	'',	5,	0),
(154,	'Dedrick Torp Hyatt',	'E0',	'',	5,	0),
(155,	'Janie Gerhold Willms',	'9B',	'',	2,	0),
(156,	'Jennie Hahn Hackett',	'GW',	'',	1,	0),
(157,	'Dr. Dale Douglas DDS Emard',	'V1',	'',	3,	0),
(158,	'Margaretta Abernathy Greenfelder',	'Y8',	'',	2,	0),
(159,	'Miss Shemar Considine Fahey',	'QC',	'',	4,	0),
(160,	'Jermain Lemke Upton',	'MFZPNLX3VK',	'',	1,	0),
(161,	'Jerald Reichert Spencer',	'E63ON8606V',	'',	1,	0),
(162,	'Ms. Gregoria Rodriguez White',	'ZYKXCG7970',	'',	5,	0),
(163,	'Tyree Howe Wunsch',	'36OM6EKBO2',	'',	4,	0),
(164,	'Ms. Aracely Lubowitz Dicki',	'P7BAQMGOCZ',	'',	2,	0),
(165,	'Bo Collier MD Kshlerin',	'GFVIFZK6A2',	'',	4,	0),
(166,	'Jennie Marks Tillman',	'CXJ7ODCJC6',	'',	4,	0),
(167,	'Kathleen Nienow DVM Watsica',	'ZA65FPDGWS',	'',	3,	0),
(168,	'Rodrick Zemlak Lehner',	'ZLYMOG8X3X',	'',	5,	0),
(169,	'Brandyn Schimmel Hodkiewicz',	'0B9CCZ8RG8',	'',	4,	0),
(170,	'Prof. Danial Funk I Zboncak',	'T20QVE3FOT',	'',	2,	0),
(171,	'Glennie Carroll Johnston',	'RUMUH59OLK',	'',	5,	0),
(172,	'Antonia Kihn Wyman',	'PAF32APOP6',	'',	2,	0),
(173,	'Mrs. Kaitlin Boyle MD Simonis',	'TC4ELK946G',	'',	1,	0),
(174,	'Nettie Welch Schulist',	'0O2NMFRQ1N',	'',	2,	0),
(175,	'Dorothy Hammes Gaylord',	'TPT69UA97F',	'',	3,	0),
(176,	'Ms. Edyth Mante Gislason',	'C6605GDZP4',	'',	4,	0),
(177,	'Cleo Marks Tillman',	'K9MR6D8XWF',	'',	4,	0),
(178,	'Dr. Ryann Yundt II Mraz',	'EA0830QXVB',	'',	5,	0),
(179,	'Timothy Fahey Schroeder',	'EO16SDWM98',	'',	2,	0),
(180,	'Jermaine Hickle Sr. Pacocha',	'88WCJJ48CO',	'',	3,	0),
(181,	'Marquise Hayes Osinski',	'KWLW945C4N',	'',	1,	0),
(182,	'Clementina Kuhic Cronin',	'NCNDIE3RF3',	'',	2,	0),
(183,	'Prof. Berneice Conn II Becker',	'WSNGOYTSUT',	'',	5,	0),
(184,	'Dax Bergnaum Rau',	'YDS57UGD66',	'',	3,	0),
(185,	'Mariela Roberts Wintheiser',	'2F6J7TET4Y',	'',	2,	0),
(186,	'Dr. Elisabeth Bauch Lubowitz',	'7ODWAV6MRI',	'',	2,	0),
(187,	'Libbie Murphy Smitham',	'TO0FLX19UZ',	'',	4,	0),
(188,	'Vincenza Schuster Langosh',	'NY7KYWNXMU',	'',	5,	0),
(189,	'Maureen Olson Hammes',	'H6FAIR5RF7',	'',	2,	0),
(190,	'Jett Pacocha Hilll',	'H3TQ3P0SN8',	'',	5,	0),
(191,	'Dario Hoppe Roberts',	'4DRZRH5OMY',	'',	2,	0),
(192,	'Oran Mertz Purdy',	'SXTAMB2OON',	'',	1,	0),
(193,	'Alanna Wuckert Leannon',	'T0D91Y76DN',	'',	5,	0),
(194,	'Zella Rutherford Sr. Connelly',	'3QQJ04B1LN',	'',	1,	0),
(195,	'Dr. Terrell Quitzon DDS Yost',	'HC0EEWZZD4',	'',	4,	0),
(196,	'Jordan Howe Jr. Turner',	'EURAGELORM',	'',	5,	0),
(197,	'Carlee Towne Emmerich',	'2IUC2BRX6C',	'',	1,	0),
(198,	'Scotty Dickens Zemlak',	'HBR0OWVCWL',	'',	4,	0),
(199,	'Alysson Cartwright III O\'Keefe',	'HA70G7X1FT',	'',	2,	0),
(200,	'Nina Bradtke Wolf',	'LFA6XSZTHZ',	'',	3,	0),
(201,	'Daisha Hilll Blanda',	'RV9PM1KT0X',	'',	4,	0),
(202,	'Tierra Cummerata Bauch',	'KEWMR2BGH4',	'',	5,	0),
(203,	'Stacey Satterfield Boehm',	'ZJT0RCXDHZ',	'',	3,	0),
(204,	'Dr. Jimmie Gusikowski Greenfelder',	'BVIU9WKJMR',	'',	4,	0),
(205,	'Johnpaul Stiedemann Kunze',	'MKJXEPAWF1',	'',	2,	0),
(206,	'Rodolfo Smith Legros',	'KIMSQDUW1N',	'',	5,	0),
(207,	'Constance Schaefer DDS Denesik',	'HI3G2EADG6',	'',	3,	0),
(208,	'Dr. Orin Hoeger Rodriguez',	'XTL4GD66G0',	'',	1,	0),
(209,	'Modesto Heathcote Murphy',	'PPXNL72TV5',	'',	3,	0),
(210,	'Sebastian carlos',	'VEUC03072HYNNHRA2',	'',	4,	0),
(211,	'Sebastian llora',	'VEUC03072HYNNHRA2',	'fotos/foto-1665158574.png',	3,	0),
(212,	'Montana Runolfsson Sporer',	'T799MAU9NX',	'',	4,	0),
(213,	'Bert Pagac Bahringer',	'K5L32UCTYH',	'',	4,	0),
(214,	'Mr. Marley Dietrich Torphy',	'DF8B3D4XF5',	'',	2,	0),
(215,	'Evelyn Jacobi Lind',	'G1KFDQP151',	'',	1,	0),
(216,	'Vivian Becker Prohaska',	'6GQI1Y265T',	'',	1,	0),
(217,	'Kaia Raynor Sr. Lebsack',	'AKBQLAZQGK',	'',	4,	0),
(218,	'Hubert Marks Reichel',	'KZJY5CEX3L',	'',	5,	0),
(219,	'Florence Hayes Grimes',	'WJA8TWJF9P',	'',	5,	0),
(220,	'Romaine D\'Amore Wehner',	'56MWO684V4',	'',	2,	0),
(221,	'Lurline Witting D\'Amore',	'40R8XXFR9I',	'',	3,	0),
(222,	'Vita Kris Marquardt',	'702RD8XXN8',	'',	3,	0),
(223,	'Joel Hamill D\'Amore',	'6XM21VK6A3',	'',	5,	0),
(224,	'Dr. Marcus Bruen Hintz',	'RVUEIKGRF2',	'',	4,	0),
(225,	'Prof. Brooks Gislason Schuster',	'7IEHLP0CBX',	'',	5,	0),
(226,	'Dr. Linnea Schultz Harvey',	'5HKBPC6JIA',	'',	5,	0),
(227,	'Mrs. Asa Fritsch Connelly',	'ZZ2UO5D934',	'',	4,	0),
(228,	'Earnestine Walsh Schneider',	'0GVS3OH0BN',	'',	3,	0),
(229,	'Edwina Conn Jr. Rodriguez',	'7NH8SNY31J',	'',	1,	0),
(230,	'Christophe Kunze Mitchell',	'6ER23DK1MH',	'',	3,	0),
(231,	'Mrs. Maia Cremin Runolfsson',	'DMR5412T9D',	'',	5,	0),
(232,	'Prof. Jabari Mraz III Hilll',	'TUWQ9ZMWWJ',	'',	5,	0),
(233,	'Coty Abernathy PhD Anderson',	'DY8K91YRKU',	'',	5,	0),
(234,	'Vilma Ruecker Kilback',	'BKHEABCA7Y',	'',	3,	0),
(235,	'Dr. Kiley McGlynn V Beier',	'E3H91Q4PUC',	'',	1,	0),
(236,	'Taryn Walter Hodkiewicz',	'JH02GZV2PK',	'',	1,	0),
(237,	'Hermina Kiehn Macejkovic',	'FZ1XAUVVYN',	'',	1,	0),
(238,	'Dr. Michele Windler Rempel',	'TRKV2UKDJM',	'',	5,	0),
(239,	'Noble Waters Lakin',	'C562N1TPHQ',	'',	2,	0),
(240,	'Prof. Candido Heller PhD Stracke',	'CRL7CKLOOH',	'',	3,	0),
(241,	'Mrs. Rebekah Bosco Graham',	'ZV845Q82D4',	'',	4,	0),
(242,	'Prof. Ross Stoltenberg Jr. Dicki',	'JHWCDSPLSY',	'',	2,	0),
(243,	'Elton West Sr. Luettgen',	'SP9BWCHB2N',	'',	2,	0),
(244,	'Madisyn Bernier Stehr',	'C6PDLXSCTM',	'',	5,	0),
(245,	'Dr. Keeley Bogan Ryan',	'T7CO9FIEO2',	'',	4,	0),
(246,	'Katrine Gleason Wyman',	'8DQW8FI8F8',	'',	3,	0),
(247,	'Jaren Stanton V Fadel',	'4XCRXB5C84',	'',	2,	0),
(248,	'Makenna Dach II Mayer',	'A58C8U2VC3',	'',	5,	0),
(249,	'Cali Pfannerstill Lind',	'2IEF1NBTRG',	'',	3,	0),
(250,	'Claudine Braun Kris',	'KUJ61OD60L',	'',	3,	0),
(251,	'Prudence Grant Becker',	'ITG8H1URVS',	'',	5,	0),
(252,	'Prof. Raphael Fahey II Gerlach',	'PW4PC2SPPB',	'',	3,	0),
(253,	'Erick Mertz King',	'LFD91KO7BG',	'',	1,	0),
(254,	'Cali Brekke McLaughlin',	'8830YSBITN',	'',	2,	0),
(255,	'Nona Konopelski Quitzon',	'LWNDIQBJGS',	'',	4,	0),
(256,	'Franco Yundt Kris',	'9W2TQF40KG',	'',	2,	0),
(257,	'Mr. Florencio Walker Dietrich',	'I1RJTLCGJP',	'',	4,	0),
(258,	'Clare Gislason Weimann',	'SJ6WBXORI9',	'',	5,	0),
(259,	'Mrs. Shemar Douglas Berge',	'YUFFQOS87R',	'',	3,	0),
(260,	'Prof. Karlie Schiller Christiansen',	'WRNULM1370',	'',	3,	0),
(261,	'Rolando Pagac V Larkin',	'B0MARPBCXG',	'',	1,	0),
(262,	'Pearlie Blanda Rogahn',	'O44NSEKCI0',	'',	2,	0),
(263,	'Birdie Murazik Russel',	'2JAJ8LVAWG',	'',	1,	0),
(264,	'Aniyah Stehr Graham',	'5AZC3RAIQK',	'',	3,	0),
(265,	'Darius Hermiston Jr. Stiedemann',	'SJHGIIDYK4',	'',	3,	0),
(266,	'Mikayla Mann IV Nicolas',	'259MGGSI2C',	'',	5,	0),
(267,	'Kathlyn Kilback MD Dooley',	'5EUWHEFNX8',	'',	2,	0),
(268,	'Dr. Adah Prohaska Ortiz',	'CY79FC6IMK',	'',	2,	0),
(269,	'Carolyne Grimes II Murazik',	'8E2MDIVMOB',	'',	5,	0),
(270,	'Dr. John Ferry Douglas',	'NUBYHR0UKE',	'',	3,	0),
(271,	'Enola Von Kiehn',	'DTWWZLZJVC',	'',	2,	0),
(272,	'Mr. Brenden Torp Sanford',	'VKA3KQSW9N',	'',	4,	0),
(273,	'Bonita Abbott V Gerlach',	'4DNFP65S98',	'',	1,	0),
(274,	'Oswald Marquardt Rohan',	'PH1BSJTP7O',	'',	4,	0),
(275,	'Carmella Kerluke DuBuque',	'0M2HPEBLZ1',	'',	1,	0),
(276,	'Chandler Prosacco Bins',	'5IQNQTPTPX',	'',	5,	0),
(277,	'Gilbert Leuschke Schinner',	'23IMWSS0C4',	'',	4,	0),
(278,	'Dr. Enoch Maggio Abernathy',	'LJ30G92EBW',	'',	4,	0),
(279,	'Norene Kuhlman DVM Green',	'ZF0ORJSPOL',	'',	4,	0),
(280,	'Alycia Vandervort Sr. Daugherty',	'L1UIVOTV87',	'',	3,	0),
(281,	'Althea Doyle Bayer',	'5WTMXJL2VE',	'',	1,	0),
(282,	'Dixie Rath Swaniawski',	'U2BQX4WTNQ',	'',	2,	0),
(283,	'Danny Thiel MD Fay',	'UYRAJ3FX6E',	'',	3,	0),
(284,	'Dino Homenick Wehner',	'1A51SOO4GA',	'',	3,	0),
(285,	'Jeanette Rutherford Dibbert',	'QLPWG0W70B',	'',	2,	0),
(286,	'Prof. Kassandra Windler Simonis',	'TBR1QBFHQG',	'',	3,	0),
(287,	'Anastacio Reichel Hauck',	'8RMWW8T0XI',	'',	1,	0),
(288,	'Kelly Waters Pouros',	'BJC4XLI17L',	'',	5,	0),
(289,	'Ciara Morar Miller',	'FVVUMMY768',	'',	3,	0),
(290,	'Dr. Deondre Schinner Kuphal',	'GDO94Z29DI',	'',	2,	0),
(291,	'Iva Bechtelar Bernhard',	'C6F745Y7BE',	'',	1,	0),
(292,	'Jamar Wiza Blick',	'KSIJ2FHR0F',	'',	5,	0),
(293,	'Derek Ritchie Nienow',	'NCYQENSFRO',	'',	4,	0),
(294,	'Dr. Allan Purdy Sr. McLaughlin',	'IA41ZV3KSE',	'',	3,	0),
(295,	'Heath Emard MD Ziemann',	'AEXAJGD9E9',	'',	3,	0),
(296,	'Toney Bogan Wyman',	'DN3330IF3Q',	'',	5,	0),
(297,	'Shaun Bernhard Swaniawski',	'4LT3SMWVUI',	'',	4,	0),
(298,	'Elise O\'Reilly IV Hodkiewicz',	'VH1DTIRY0Z',	'',	2,	0),
(299,	'Dudley Ledner Erdman',	'RH3T7RAP6A',	'',	1,	0),
(300,	'Griffin Kautzer Kassulke',	'VV76ROP1OU',	'',	2,	0),
(301,	'Mya Hirthe MD Fritsch',	'5Z13Q4X1F0',	'',	1,	0),
(302,	'Ed Bins Nitzsche',	'JU1LI1X149',	'',	4,	0),
(303,	'Cleveland Beahan DDS Vandervort',	'X2IA2SETM7',	'',	5,	0),
(304,	'Dr. Leopold Cummerata Bradtke',	'57NP4O5KHS',	'',	3,	0),
(305,	'Burnice Collier DuBuque',	'YNSTMUO42W',	'',	2,	0),
(306,	'Jalen Stehr DDS Marquardt',	'QYRBTR2IGV',	'',	2,	0),
(307,	'Prof. Sammie Gerhold II Ratke',	'FGCPXIIAT5',	'',	2,	0),
(308,	'Garrett Reinger Koepp',	'49MAFTELRN',	'',	5,	0),
(309,	'Dr. Nicolette Renner Koss',	'L7DVBCBBWY',	'',	5,	0),
(310,	'Prof. Wanda Rodriguez MD Rosenbaum',	'VWCBELTSRJ',	'',	2,	0),
(311,	'Margaretta Langosh II Dickens',	'KQENDGENOW',	'',	3,	0);

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idproducto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` int NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `producto` (`idproducto`, `nombre`, `precio`) VALUES
(10,	'jabon',	40),
(11,	'Esponja',	29);

DROP TABLE IF EXISTS `renta`;
CREATE TABLE `renta` (
  `idrenta` int NOT NULL AUTO_INCREMENT,
  `precio` decimal(10,2) NOT NULL,
  `idsocio` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`idrenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `renta` (`idrenta`, `precio`, `idsocio`, `fecha_inicio`, `fecha_fin`) VALUES
(1,	299.00,	3,	'2020-10-03',	'2020-10-10'),
(2,	29.00,	2,	'2020-11-09',	'2020-10-08'),
(3,	255.00,	4,	'2021-07-07',	'2021-08-08'),
(4,	255.00,	1,	'2021-07-07',	'2021-08-08'),
(5,	670.50,	3,	'2020-11-09',	'2020-12-09'),
(6,	619.00,	3,	'2020-10-01',	'2020-10-08'),
(7,	24.00,	3,	'2020-10-01',	'2020-10-09');

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `nomrol` varchar(100) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `rol` (`idrol`, `nomrol`) VALUES
(1,	'Personal'),
(2,	'Contabilidad'),
(3,	'Hosstes'),
(4,	'Socio'),
(5,	'CVAAR');

DROP TABLE IF EXISTS `rolxpermiso`;
CREATE TABLE `rolxpermiso` (
  `idrol` int NOT NULL,
  `idpermiso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `rolxpermiso` (`idrol`, `idpermiso`) VALUES
(5,	1),
(5,	2),
(5,	3),
(5,	4),
(5,	5),
(5,	6),
(1,	1),
(1,	3),
(1,	6),
(1,	7),
(2,	1),
(2,	3),
(2,	6),
(2,	7),
(3,	1),
(3,	7),
(4,	1),
(4,	5);

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `idservicio` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `anio` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `idtiposervicio` int NOT NULL,
  `idpersonal` int NOT NULL,
  `idsocio` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_atencion_inicial` datetime NOT NULL,
  `fecha_atencion_final` datetime NOT NULL,
  `idestacion` int NOT NULL,
  `idhorario` int NOT NULL,
  `origen` varchar(50) NOT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `servicio` (`idservicio`, `placa`, `modelo`, `anio`, `precio`, `idtiposervicio`, `idpersonal`, `idsocio`, `fecha_creacion`, `fecha_atencion_inicial`, `fecha_atencion_final`, `idestacion`, `idhorario`, `origen`) VALUES
(1,	'YYY.4567',	'tesla',	2008,	160.00,	1,	1,	3,	'2022-11-26 21:02:39',	'2022-08-27 00:00:00',	'2022-09-10 00:00:00',	2,	3,	'WEB'),
(3,	'TTT-5000',	'PORTA',	2005,	160.00,	1,	2,	1,	'2022-09-14 01:36:59',	'2022-09-17 00:00:00',	'0000-00-00 00:00:00',	2,	2,	'APP'),
(8,	'TTT-5000',	'Suru',	2007,	240.00,	3,	3,	16,	'2022-07-26 04:38:56',	'2022-07-31 00:00:00',	'0000-00-00 00:00:00',	0,	0,	'LOCAL'),
(9,	'YYY.4568',	'Suru',	2005,	240.00,	3,	3,	16,	'2022-07-14 22:17:12',	'2022-07-16 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(10,	'TTT-6000',	'PORTA-2',	2005,	160.00,	1,	3,	16,	'2022-10-25 13:35:56',	'2022-10-26 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(11,	'TTT-5000',	'PORTA',	1999,	80.00,	2,	4,	3,	'2022-07-20 07:39:55',	'2022-07-22 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(12,	'YYA-Z-YCYC',	'Chevrolet',	2019,	80.00,	2,	74,	16,	'2022-10-16 21:36:15',	'2022-10-17 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(13,	'YYA-Z-YCYC',	'Ford',	2019,	80.00,	2,	60,	15,	'2022-10-10 05:49:34',	'2022-10-12 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(14,	'YYA-Z-YCYC',	'Honda',	2020,	240.00,	3,	94,	1,	'2022-07-25 21:32:00',	'2022-07-27 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(15,	'YYA-Z-YCYC',	'Seat',	2018,	160.00,	1,	97,	1,	'2022-09-01 09:35:23',	'2022-09-03 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(16,	'YYA-Z-YCYC',	'Tesla',	2020,	240.00,	3,	95,	2,	'2022-08-04 01:10:31',	'2022-08-07 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(17,	'YYA-Z-YCYC',	'Mercedes-Benz',	2018,	240.00,	3,	77,	15,	'2022-10-04 02:16:14',	'2022-10-05 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(18,	'YYA-Z-YCYC',	'Ford',	2018,	80.00,	2,	84,	16,	'2022-09-30 21:37:28',	'2022-10-04 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(19,	'YYA-Z-YCYC',	'Honda',	2018,	160.00,	1,	100,	1,	'2022-08-08 16:16:49',	'2022-08-09 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(20,	'YYA-Z-YCYC',	'Ford',	2019,	160.00,	1,	69,	2,	'2022-09-26 08:51:32',	'2022-09-28 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(21,	'YYA-Z-YCYC',	'Tesla',	2018,	160.00,	1,	102,	16,	'2022-09-29 21:12:01',	'2022-10-02 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(22,	'YYA-Z-YCYC',	'Nissan',	2019,	80.00,	2,	57,	1,	'2022-07-15 21:45:59',	'2022-07-17 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(23,	'YYA-Z-YCYC',	'Seat',	2019,	160.00,	1,	57,	1,	'2022-08-08 13:41:02',	'2022-08-13 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(24,	'YYA-Z-YCYC',	'Chevrolet',	2019,	160.00,	2,	3,	16,	'2022-09-22 04:07:25',	'2022-09-24 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(25,	'YYA-Z-YCYC',	'Ford',	2018,	80.00,	2,	61,	1,	'2022-07-30 19:30:32',	'2022-07-31 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(26,	'YYA-Z-YCYC',	'Seat',	2020,	160.00,	1,	89,	15,	'2022-10-19 02:31:41',	'2022-10-23 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(27,	'YYA-Z-YCYC',	'Volkswagen',	2018,	240.00,	3,	86,	1,	'2022-07-04 22:33:36',	'2022-07-06 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(28,	'YYA-Z-YCYC',	'Ford',	2019,	80.00,	2,	77,	15,	'2022-08-27 21:55:52',	'2022-08-30 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(29,	'YYA-Z-YCYC',	'Honda',	2019,	160.00,	1,	71,	3,	'2022-10-04 18:44:33',	'2022-10-06 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(30,	'YYA-Z-YCYC',	'Ford',	2018,	240.00,	3,	68,	16,	'2022-10-11 04:12:04',	'2022-10-16 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(31,	'YYA-Z-YCYC',	'Mercedes-Benz',	2020,	80.00,	2,	81,	16,	'2022-10-02 02:14:56',	'2022-10-06 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(32,	'TTT-5000',	'PORTA',	2005,	0.00,	2,	1,	2,	'2022-09-01 03:58:48',	'2022-09-02 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(33,	'Santa Ana',	'PORTA',	2005,	0.00,	3,	3,	15,	'2022-10-10 03:25:13',	'2022-10-13 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(34,	'arif',	'Suru',	2007,	0.00,	3,	70,	15,	'2022-11-04 03:47:30',	'2022-11-04 00:00:00',	'0000-00-00 00:00:00',	0,	0,	''),
(35,	'YYGXQNT-CR',	'Honda',	2019,	240.00,	3,	234,	1,	'2022-11-12 01:45:14',	'2022-11-17 11:00:00',	'2022-11-17 12:00:00',	1,	2,	'APP'),
(36,	'YYLJDVW-VS',	'Nissan',	2019,	780.00,	4,	220,	3,	'2022-08-26 16:19:36',	'2022-08-27 11:00:00',	'2022-08-27 12:00:00',	2,	2,	'APP'),
(37,	'YYWMAZV-LB',	'Ford',	2018,	160.00,	1,	69,	2,	'2022-11-26 21:04:06',	'2022-09-17 00:00:00',	'2022-09-17 00:00:00',	3,	1,	'APP'),
(38,	'YYKIJDX-EA',	'Mercedes-Benz',	2019,	80.00,	2,	289,	3,	'2022-09-26 13:38:11',	'2022-09-28 11:00:00',	'2022-09-28 12:00:00',	1,	2,	'WEB'),
(39,	'YYZWZID-KI',	'Tesla',	2018,	780.00,	4,	222,	2,	'2022-10-21 00:06:24',	'2022-10-22 11:00:00',	'2022-10-22 12:00:00',	1,	2,	'LOCAL'),
(40,	'YYSIPHD-IU',	'Mercedes-Benz',	2018,	780.00,	4,	163,	2,	'2022-10-01 23:51:38',	'2022-10-06 11:00:00',	'2022-10-06 12:00:00',	3,	2,	'APP'),
(41,	'YYCSMWG-SW',	'Seat',	2019,	80.00,	2,	170,	16,	'2022-10-02 17:30:24',	'2022-10-07 10:00:00',	'2022-10-07 11:00:00',	3,	1,	'WEB'),
(42,	'YYBKGQU-DS',	'Chevrolet',	2018,	240.00,	3,	216,	1,	'2022-11-23 07:37:17',	'2022-11-27 10:00:00',	'2022-11-27 11:00:00',	2,	1,	'APP'),
(43,	'YYRKXXA-JY',	'Tesla',	2018,	160.00,	1,	228,	3,	'2022-09-07 08:32:11',	'2022-09-10 11:00:00',	'2022-09-10 12:00:00',	1,	2,	'WEB'),
(44,	'YYXPTHA-JG',	'Ford',	2018,	240.00,	3,	157,	15,	'2022-10-22 20:08:24',	'2022-10-24 11:00:00',	'2022-10-24 12:00:00',	1,	2,	'LOCAL'),
(45,	'YYCGWPZ-XN',	'Honda',	2019,	80.00,	2,	58,	1,	'2022-09-06 09:15:29',	'2022-09-11 11:00:00',	'2022-09-11 12:00:00',	1,	2,	'LOCAL'),
(46,	'YYDXLJK-JC',	'Seat',	2018,	240.00,	3,	185,	15,	'2022-08-01 05:37:49',	'2022-08-04 11:00:00',	'2022-08-04 12:00:00',	1,	2,	'APP'),
(47,	'YYSVZUC-XK',	'Chevrolet',	2019,	780.00,	4,	294,	15,	'2022-10-26 15:01:19',	'2022-10-31 11:00:00',	'2022-10-31 12:00:00',	2,	2,	'WEB'),
(48,	'YYFTSVN-SA',	'Honda',	2018,	780.00,	4,	130,	2,	'2022-10-26 09:34:35',	'2022-10-28 10:00:00',	'2022-10-28 11:00:00',	3,	1,	'WEB'),
(49,	'YYKGZOW-CL',	'Tesla',	2018,	80.00,	2,	93,	15,	'2022-08-04 00:00:51',	'2022-08-08 11:00:00',	'2022-08-08 12:00:00',	2,	2,	'APP'),
(50,	'YYUYOQX-EI',	'Ford',	2018,	160.00,	1,	70,	15,	'2022-08-10 01:21:19',	'2022-08-15 10:00:00',	'2022-08-15 11:00:00',	3,	1,	'LOCAL'),
(51,	'YYHRZWL-CN',	'Seat',	2019,	780.00,	4,	119,	15,	'2022-10-13 16:17:02',	'2022-10-14 11:00:00',	'2022-10-14 12:00:00',	1,	2,	'WEB'),
(52,	'YYSMRWA-XE',	'Volkswagen',	2019,	80.00,	2,	92,	1,	'2022-11-10 15:57:08',	'2022-11-14 11:00:00',	'2022-11-14 12:00:00',	3,	2,	'LOCAL'),
(53,	'YYHIHDM-CB',	'Honda',	2019,	160.00,	1,	279,	2,	'2022-11-11 19:47:04',	'2022-11-16 10:00:00',	'2022-11-16 11:00:00',	2,	1,	'LOCAL'),
(54,	'YYZIEAX-WD',	'Honda',	2018,	80.00,	2,	119,	3,	'2022-10-15 01:24:34',	'2022-10-18 11:00:00',	'2022-10-18 12:00:00',	2,	2,	'WEB'),
(55,	'YYOXWFC-NH',	'Honda',	2018,	240.00,	3,	201,	3,	'2022-11-22 05:33:04',	'2022-11-26 11:00:00',	'2022-11-26 12:00:00',	1,	2,	'APP'),
(56,	'YYZUYHV-GD',	'Chevrolet',	2019,	160.00,	1,	79,	2,	'2022-10-18 03:58:56',	'2022-10-21 11:00:00',	'2022-10-21 12:00:00',	1,	2,	'APP'),
(57,	'YYFWPUN-IT',	'Honda',	2018,	80.00,	2,	129,	3,	'2022-10-31 13:43:39',	'2022-11-03 10:00:00',	'2022-11-03 11:00:00',	1,	1,	'LOCAL'),
(58,	'YYXPDHV-IB',	'Tesla',	2020,	240.00,	3,	240,	15,	'2022-11-01 14:13:35',	'2022-11-05 11:00:00',	'2022-11-05 12:00:00',	2,	2,	'LOCAL'),
(59,	'YYQOYRE-LE',	'Chevrolet',	2018,	160.00,	1,	300,	15,	'2022-10-09 09:45:55',	'2022-10-13 11:00:00',	'2022-10-13 12:00:00',	3,	2,	'APP'),
(60,	'YYTHAXB-II',	'Tesla',	2020,	780.00,	4,	225,	2,	'2022-08-23 01:46:44',	'2022-08-24 11:00:00',	'2022-08-24 12:00:00',	1,	2,	'LOCAL'),
(61,	'YYUEOWL-OP',	'Mercedes-Benz',	2020,	240.00,	3,	294,	3,	'2022-10-07 09:11:53',	'2022-10-12 10:00:00',	'2022-10-12 11:00:00',	3,	1,	'WEB'),
(62,	'YYLJIFT-NE',	'Mercedes-Benz',	2020,	80.00,	2,	254,	16,	'2022-10-31 03:58:50',	'2022-11-01 11:00:00',	'2022-11-01 12:00:00',	3,	2,	'WEB'),
(63,	'YYPOBPV-UG',	'Honda',	2019,	160.00,	1,	284,	15,	'2022-08-25 00:04:59',	'2022-08-30 11:00:00',	'2022-08-30 12:00:00',	2,	2,	'LOCAL'),
(64,	'YYPTGHT-CW',	'Honda',	2020,	80.00,	2,	120,	2,	'2022-11-16 01:29:38',	'2022-11-20 10:00:00',	'2022-11-20 11:00:00',	3,	1,	'WEB'),
(65,	'YYLPPRL-LQ',	'Seat',	2018,	160.00,	1,	113,	15,	'2022-10-02 18:27:59',	'2022-10-05 10:00:00',	'2022-10-05 11:00:00',	1,	1,	'LOCAL'),
(66,	'YYWZYUQ-WJ',	'Mercedes-Benz',	2020,	780.00,	4,	282,	16,	'2022-09-04 23:39:42',	'2022-09-07 11:00:00',	'2022-09-07 12:00:00',	2,	2,	'WEB'),
(67,	'YYUGLLE-AW',	'Honda',	2018,	240.00,	3,	140,	15,	'2022-08-04 00:55:14',	'2022-08-06 10:00:00',	'2022-08-06 11:00:00',	2,	1,	'APP'),
(68,	'YYCDFNW-TC',	'Honda',	2019,	780.00,	4,	122,	2,	'2022-11-09 19:50:17',	'2022-11-11 10:00:00',	'2022-11-11 11:00:00',	2,	1,	'WEB'),
(69,	'YYSXXQR-QY',	'Tesla',	2019,	240.00,	3,	249,	3,	'2022-08-03 13:27:47',	'2022-08-04 10:00:00',	'2022-08-04 11:00:00',	1,	1,	'LOCAL'),
(70,	'YYASIYP-VC',	'Seat',	2018,	240.00,	3,	258,	15,	'2022-10-10 04:36:08',	'2022-10-13 10:00:00',	'2022-10-13 11:00:00',	3,	1,	'LOCAL'),
(71,	'YYORTFT-BB',	'Ford',	2018,	160.00,	1,	227,	1,	'2022-11-14 16:03:54',	'2022-11-15 10:00:00',	'2022-11-15 11:00:00',	2,	1,	'APP'),
(72,	'YYBHBVM-JK',	'Nissan',	2019,	240.00,	3,	297,	15,	'2022-10-31 09:52:59',	'2022-11-01 11:00:00',	'2022-11-01 12:00:00',	1,	2,	'APP'),
(73,	'YYKXELL-FF',	'Seat',	2019,	240.00,	3,	86,	15,	'2022-10-10 17:57:24',	'2022-10-13 11:00:00',	'2022-10-13 12:00:00',	2,	2,	'APP'),
(74,	'YYEFXWP-XW',	'Volkswagen',	2018,	780.00,	4,	138,	15,	'2022-09-10 14:51:19',	'2022-09-14 11:00:00',	'2022-09-14 12:00:00',	2,	2,	'APP'),
(75,	'YYSNRJY-ZA',	'Nissan',	2019,	240.00,	3,	63,	1,	'2022-08-05 15:35:56',	'2022-08-09 10:00:00',	'2022-08-09 11:00:00',	2,	1,	'LOCAL'),
(76,	'YYKPHRP-VC',	'Nissan',	2019,	160.00,	1,	176,	15,	'2022-11-11 18:39:35',	'2022-11-12 11:00:00',	'2022-11-12 12:00:00',	2,	2,	'WEB'),
(77,	'YYVRVZC-FJ',	'Ford',	2020,	780.00,	4,	216,	1,	'2022-11-22 20:23:45',	'2022-11-26 11:00:00',	'2022-11-26 12:00:00',	3,	2,	'LOCAL'),
(78,	'YYMPFQH-XA',	'Ford',	2020,	780.00,	4,	175,	1,	'2022-08-21 02:40:10',	'2022-08-24 11:00:00',	'2022-08-24 12:00:00',	3,	2,	'LOCAL'),
(79,	'YYMISSR-VZ',	'Mercedes-Benz',	2019,	160.00,	1,	215,	1,	'2022-08-02 08:04:43',	'2022-08-05 10:00:00',	'2022-08-05 11:00:00',	2,	1,	'LOCAL'),
(80,	'YYCCBVH-UN',	'Ford',	2020,	780.00,	4,	253,	15,	'2022-07-24 16:30:56',	'2022-07-29 10:00:00',	'2022-07-29 11:00:00',	3,	1,	'WEB'),
(81,	'YYWMZHT-EP',	'Ford',	2018,	160.00,	1,	57,	1,	'2022-08-01 01:07:29',	'2022-08-05 11:00:00',	'2022-08-05 12:00:00',	3,	2,	'LOCAL'),
(82,	'YYDKJKX-HH',	'Mercedes-Benz',	2020,	780.00,	4,	183,	15,	'2022-11-20 05:39:46',	'2022-11-21 11:00:00',	'2022-11-21 12:00:00',	2,	2,	'LOCAL'),
(83,	'YYKNREP-TO',	'Ford',	2019,	160.00,	1,	72,	15,	'2022-09-01 15:18:42',	'2022-09-04 11:00:00',	'2022-09-04 12:00:00',	3,	2,	'WEB'),
(84,	'YYVBYLS-AC',	'Nissan',	2018,	160.00,	1,	106,	15,	'2022-09-28 16:28:23',	'2022-09-30 11:00:00',	'2022-09-30 12:00:00',	1,	2,	'WEB'),
(85,	'YYVLNXI-DC',	'Nissan',	2018,	240.00,	3,	252,	16,	'2022-09-06 06:04:53',	'2022-09-11 10:00:00',	'2022-09-11 11:00:00',	1,	1,	'APP'),
(86,	'YYHBCOV-BP',	'Mercedes-Benz',	2018,	780.00,	4,	68,	15,	'2022-09-28 12:00:52',	'2022-09-29 11:00:00',	'2022-09-29 12:00:00',	2,	2,	'APP'),
(87,	'YYGNJMR-QL',	'Honda',	2019,	780.00,	4,	107,	2,	'2022-08-04 09:51:01',	'2022-08-08 10:00:00',	'2022-08-08 11:00:00',	3,	1,	'LOCAL'),
(88,	'YYZSPVF-AB',	'Volkswagen',	2020,	160.00,	1,	183,	2,	'2022-08-13 10:23:17',	'2022-08-15 10:00:00',	'2022-08-15 11:00:00',	1,	1,	'APP'),
(89,	'YYAQEPE-WV',	'Honda',	2019,	780.00,	4,	262,	16,	'2022-09-21 14:36:31',	'2022-09-24 11:00:00',	'2022-09-24 12:00:00',	2,	2,	'APP'),
(90,	'YYZZNYF-XM',	'Honda',	2019,	160.00,	1,	218,	3,	'2022-09-01 21:56:30',	'2022-09-04 10:00:00',	'2022-09-04 11:00:00',	2,	1,	'APP'),
(91,	'YYCIVVF-AS',	'Seat',	2018,	240.00,	3,	124,	1,	'2022-09-15 22:19:38',	'2022-09-18 10:00:00',	'2022-09-18 11:00:00',	3,	1,	'LOCAL'),
(92,	'YYSUKTQ-CW',	'Tesla',	2018,	780.00,	4,	137,	2,	'2022-08-25 17:07:27',	'2022-08-26 11:00:00',	'2022-08-26 12:00:00',	2,	2,	'LOCAL'),
(93,	'YYHHZTP-UJ',	'Mercedes-Benz',	2019,	160.00,	1,	184,	3,	'2022-07-26 01:42:17',	'2022-07-30 10:00:00',	'2022-07-30 11:00:00',	1,	1,	'LOCAL'),
(94,	'YYUDBLX-YQ',	'Chevrolet',	2020,	780.00,	4,	97,	1,	'2022-10-13 04:34:16',	'2022-10-16 10:00:00',	'2022-10-16 11:00:00',	2,	1,	'APP'),
(95,	'YYXPTLS-LK',	'Volkswagen',	2020,	240.00,	3,	217,	1,	'2022-11-10 18:21:55',	'2022-11-11 11:00:00',	'2022-11-11 12:00:00',	1,	2,	'APP'),
(96,	'YYAJLGE-JE',	'Seat',	2020,	780.00,	4,	101,	15,	'2022-08-15 19:33:40',	'2022-08-20 11:00:00',	'2022-08-20 12:00:00',	2,	2,	'LOCAL'),
(97,	'YYNGIRI-XI',	'Seat',	2018,	780.00,	4,	94,	3,	'2022-09-12 04:58:25',	'2022-09-13 10:00:00',	'2022-09-13 11:00:00',	1,	1,	'LOCAL'),
(98,	'YYZLMGL-HC',	'Honda',	2019,	780.00,	4,	222,	2,	'2022-08-22 13:02:45',	'2022-08-26 10:00:00',	'2022-08-26 11:00:00',	2,	1,	'LOCAL'),
(99,	'YYNRWLP-YN',	'Mercedes-Benz',	2019,	160.00,	1,	129,	3,	'2022-10-25 22:22:47',	'2022-10-30 11:00:00',	'2022-10-30 12:00:00',	1,	2,	'WEB'),
(100,	'YYKWNMR-MF',	'Mercedes-Benz',	2020,	780.00,	4,	240,	3,	'2022-11-09 14:17:04',	'2022-11-13 11:00:00',	'2022-11-13 12:00:00',	2,	2,	'APP'),
(101,	'YYTSYUE-LW',	'Nissan',	2019,	80.00,	2,	108,	1,	'2022-09-28 09:10:14',	'2022-10-01 11:00:00',	'2022-10-01 12:00:00',	3,	2,	'LOCAL'),
(102,	'YYROGLB-LA',	'Tesla',	2018,	780.00,	4,	186,	2,	'2022-08-20 06:44:10',	'2022-08-23 10:00:00',	'2022-08-23 11:00:00',	3,	1,	'APP'),
(103,	'YYDYVAK-OM',	'Chevrolet',	2019,	80.00,	2,	233,	15,	'2022-08-10 21:50:17',	'2022-08-14 11:00:00',	'2022-08-14 12:00:00',	1,	2,	'LOCAL'),
(104,	'YYHWEKM-DX',	'Chevrolet',	2018,	780.00,	4,	95,	3,	'2022-07-27 14:12:57',	'2022-07-31 11:00:00',	'2022-07-31 12:00:00',	2,	2,	'APP'),
(105,	'YYJJQHW-XH',	'Volkswagen',	2018,	80.00,	2,	260,	2,	'2022-08-25 10:29:11',	'2022-08-28 10:00:00',	'2022-08-28 11:00:00',	3,	1,	'LOCAL'),
(106,	'YYYSOMF-CV',	'Volkswagen',	2019,	240.00,	3,	293,	1,	'2022-07-31 19:19:55',	'2022-08-05 10:00:00',	'2022-08-05 11:00:00',	1,	1,	'LOCAL'),
(107,	'YYDVGLR-LU',	'Ford',	2018,	780.00,	4,	277,	16,	'2022-09-29 20:12:25',	'2022-10-02 10:00:00',	'2022-10-02 11:00:00',	3,	1,	'LOCAL'),
(108,	'YYEKCXI-JN',	'Honda',	2018,	240.00,	3,	163,	3,	'2022-10-30 23:01:08',	'2022-11-02 10:00:00',	'2022-11-02 11:00:00',	2,	1,	'LOCAL'),
(109,	'YYFODGH-NV',	'Honda',	2020,	160.00,	1,	101,	3,	'2022-08-21 21:11:34',	'2022-08-25 10:00:00',	'2022-08-25 11:00:00',	1,	1,	'APP'),
(110,	'YYOVCUT-SG',	'Mercedes-Benz',	2019,	780.00,	4,	158,	3,	'2022-09-06 00:51:29',	'2022-09-10 11:00:00',	'2022-09-10 12:00:00',	2,	2,	'APP'),
(111,	'YYNJQKR-MV',	'Mercedes-Benz',	2020,	780.00,	4,	77,	15,	'2022-08-07 06:28:11',	'2022-08-08 10:00:00',	'2022-08-08 11:00:00',	1,	1,	'WEB'),
(112,	'YYRQDBH-LV',	'Seat',	2018,	240.00,	3,	177,	16,	'2022-08-17 16:45:02',	'2022-08-22 10:00:00',	'2022-08-22 11:00:00',	3,	1,	'APP'),
(113,	'YYRXTFD-GN',	'Volkswagen',	2020,	780.00,	4,	110,	15,	'2022-09-06 09:36:14',	'2022-09-10 11:00:00',	'2022-09-10 12:00:00',	3,	2,	'APP'),
(114,	'YYBSZBJ-FO',	'Tesla',	2018,	780.00,	4,	96,	3,	'2022-11-09 16:18:49',	'2022-11-12 11:00:00',	'2022-11-12 12:00:00',	1,	2,	'WEB'),
(115,	'YYGIEIX-PE',	'Nissan',	2020,	80.00,	2,	225,	2,	'2022-10-12 22:17:49',	'2022-10-16 10:00:00',	'2022-10-16 11:00:00',	1,	1,	'APP'),
(116,	'YYAZMUQ-CG',	'Honda',	2020,	780.00,	4,	216,	2,	'2022-10-04 03:29:36',	'2022-10-05 11:00:00',	'2022-10-05 12:00:00',	1,	2,	'APP'),
(117,	'YYGYDLH-WN',	'Volkswagen',	2018,	80.00,	2,	113,	16,	'2022-11-01 11:12:42',	'2022-11-03 11:00:00',	'2022-11-03 12:00:00',	1,	2,	'WEB'),
(118,	'YYZYLAX-LU',	'Mercedes-Benz',	2018,	780.00,	4,	228,	3,	'2022-11-12 21:50:12',	'2022-11-13 10:00:00',	'2022-11-13 11:00:00',	1,	1,	'APP'),
(119,	'YYBPTMX-XP',	'Honda',	2018,	160.00,	1,	215,	16,	'2022-08-26 22:53:13',	'2022-08-29 11:00:00',	'2022-08-29 12:00:00',	3,	2,	'WEB'),
(120,	'YYCDFWE-TY',	'Seat',	2019,	240.00,	3,	111,	3,	'2022-08-20 21:25:46',	'2022-08-25 10:00:00',	'2022-08-25 11:00:00',	2,	1,	'APP'),
(121,	'YYIYMYW-CM',	'Chevrolet',	2019,	160.00,	1,	75,	2,	'2022-10-06 23:54:00',	'2022-10-09 10:00:00',	'2022-10-09 11:00:00',	1,	1,	'LOCAL'),
(122,	'YYNQPHT-EM',	'Nissan',	2018,	780.00,	4,	265,	2,	'2022-09-10 21:23:12',	'2022-09-13 10:00:00',	'2022-09-13 11:00:00',	2,	1,	'APP'),
(123,	'YYDHUQG-NA',	'Ford',	2019,	780.00,	4,	282,	1,	'2022-11-23 08:44:57',	'2022-11-25 10:00:00',	'2022-11-25 11:00:00',	3,	1,	'LOCAL'),
(124,	'YYBPMAS-QP',	'Nissan',	2020,	160.00,	1,	305,	2,	'2022-08-26 12:18:36',	'2022-08-28 11:00:00',	'2022-08-28 12:00:00',	2,	2,	'WEB'),
(125,	'YYNZNIA-NG',	'Chevrolet',	2019,	240.00,	3,	143,	16,	'2022-08-24 19:05:12',	'2022-08-25 11:00:00',	'2022-08-25 12:00:00',	3,	2,	'APP'),
(126,	'YYEYRNM-OB',	'Ford',	2018,	780.00,	4,	237,	16,	'2022-10-16 08:30:00',	'2022-10-20 10:00:00',	'2022-10-20 11:00:00',	3,	1,	'APP'),
(127,	'YYIBEUY-BD',	'Seat',	2020,	160.00,	1,	85,	2,	'2022-08-08 16:36:10',	'2022-08-10 10:00:00',	'2022-08-10 11:00:00',	1,	1,	'WEB'),
(128,	'YYSTNXY-HB',	'Tesla',	2020,	780.00,	4,	234,	2,	'2022-10-17 05:07:25',	'2022-10-22 10:00:00',	'2022-10-22 11:00:00',	2,	1,	'LOCAL'),
(129,	'YYCONGC-DQ',	'Ford',	2018,	80.00,	2,	86,	3,	'2022-08-19 17:05:14',	'2022-08-21 11:00:00',	'2022-08-21 12:00:00',	3,	2,	'WEB'),
(130,	'YYJGFZF-LC',	'Volkswagen',	2020,	160.00,	1,	89,	2,	'2022-10-19 02:31:42',	'2022-10-24 10:00:00',	'2022-10-24 11:00:00',	3,	1,	'WEB'),
(131,	'YYEMMRM-RI',	'Chevrolet',	2018,	80.00,	2,	275,	15,	'2022-11-04 05:38:08',	'2022-11-09 10:00:00',	'2022-11-09 11:00:00',	3,	1,	'APP'),
(132,	'YYNNLPD-SG',	'Mercedes-Benz',	2020,	240.00,	3,	56,	15,	'2022-10-03 13:27:54',	'2022-10-07 10:00:00',	'2022-10-07 11:00:00',	2,	1,	'APP'),
(133,	'YYVNQKC-DX',	'Tesla',	2019,	160.00,	1,	301,	2,	'2022-11-09 05:29:49',	'2022-11-13 11:00:00',	'2022-11-13 12:00:00',	3,	2,	'WEB'),
(134,	'YYBHVZP-PC',	'Chevrolet',	2019,	240.00,	3,	243,	1,	'2022-11-16 21:08:50',	'2022-11-18 11:00:00',	'2022-11-18 12:00:00',	1,	2,	'LOCAL'),
(135,	'RFCV-MDFGT',	'Tesla',	2018,	80.00,	2,	2,	1,	'2022-11-24 09:08:02',	'2020-11-05 10:00:00',	'2020-12-05 10:00:00',	1,	1,	'WEB');

DROP TABLE IF EXISTS `socio`;
CREATE TABLE `socio` (
  `idsocio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `idtiposocio` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idsocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `socio` (`idsocio`, `nombre`, `idtiposocio`, `idusuario`) VALUES
(1,	'Zero',	1,	1),
(2,	'Fuku',	2,	1),
(3,	'Sergio',	1,	2),
(15,	'sebastian',	1,	29),
(16,	'carlos',	1,	33);

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal` (
  `idsucursal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `sucursal` (`idsucursal`, `nombre`) VALUES
(1,	'Norte'),
(2,	'Sur'),
(3,	'Este'),
(4,	'Oeste'),
(5,	'Centro');

DROP TABLE IF EXISTS `tiposervicio`;
CREATE TABLE `tiposervicio` (
  `idtiposervicio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idtiposervicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tiposervicio` (`idtiposervicio`, `nombre`, `precio`) VALUES
(1,	'Lavado encerado',	160.00),
(2,	'Basico',	80.00),
(3,	'Premier',	240.00),
(4,	'VIP(exclusivo)',	780.00);

DROP TABLE IF EXISTS `tiposocio`;
CREATE TABLE `tiposocio` (
  `idtiposocio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idtiposocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tiposocio` (`idtiposocio`, `nombre`) VALUES
(1,	'Estandar'),
(2,	'VIP');

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idrol` int NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `idrol`) VALUES
(28,	'Ck.a@gmail.com',	'$2y$10$QgoqH6Fg2yhk.vGLqtugsu7sjjWhOrsKSTVfjFaSLJsUuEj1JoxGG',	2),
(29,	'joansebastian@gmail.com',	'$2y$10$dzMS87hzJXlpJmWcryv/kO2nr4Yp8ukN0wXjNqz5N1sUrKIuvhYMq',	4),
(30,	'prankedy@gmail.com',	'$2y$10$Rhh7MoaDma6jEImrWnkt6.uuxobLOaGYrpmDQa9wb16.hLLA7Z8Py',	3),
(31,	'Franki@gmail.com',	'$2y$10$RfrG2EeJZNgn7Dion2NlbOaGEFl..W6179a.QIMqErPNI8fLB.Zua',	5),
(32,	'pepega@gmail.com',	'$2y$10$hWweiCBCCLrsx16D/GwHnu1w4SylIde1HG2wdlOC7u1rpZ8fBSVDm',	2),
(33,	'cer0fuku@gmail.com',	'$2y$10$7K2oaP8SiGxH1LjSlRfysObsCsINi1zXQHASd59G8focrZdUC3NhW',	4),
(34,	'carlosventura@gmail.com',	'$2y$10$5HUi4gMfks0KLVIlsLm4oOctNOsugjpyh1drhCg3x0roM5jnPLQha',	2);

-- 2022-11-27 04:03:02
