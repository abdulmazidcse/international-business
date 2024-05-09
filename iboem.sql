-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 08:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iboem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `account_no`, `swift_code`, `address`, `branch`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 'DBBL', '24234 r4567', '2342', 'Dahaka', 'Segunbagicha', 18, 1, '2024-05-04 02:36:21', '2024-05-09 01:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SSG Center', 'Nabosrista Plot # 1/A, Tejgaon I/A, Dhaka -1208.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `iso` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', '4', '93', NULL, NULL),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', '8', '355', NULL, NULL),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', '12', '213', NULL, NULL),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', '16', '1684', NULL, NULL),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', '20', '376', NULL, NULL),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', '24', '244', NULL, NULL),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', '660', '1264', NULL, NULL),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, '0', NULL, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', '28', '1268', NULL, NULL),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', '32', '54', NULL, NULL),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', '51', '374', NULL, NULL),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', '533', '297', NULL, NULL),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', '36', '61', NULL, NULL),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', '40', '43', NULL, NULL),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', '31', '994', NULL, NULL),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', '44', '1242', NULL, NULL),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', '48', '973', NULL, NULL),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', '50', '880', NULL, NULL),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', '52', '1246', NULL, NULL),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', '112', '375', NULL, NULL),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', '56', '32', NULL, NULL),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', '84', '501', NULL, NULL),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', '204', '229', NULL, NULL),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', '60', '1441', NULL, NULL),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', '64', '975', NULL, NULL),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', '68', '591', NULL, NULL),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', '70', '387', NULL, NULL),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', '72', '267', NULL, NULL),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, '0', NULL, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', '76', '55', NULL, NULL),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, '246', NULL, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', '96', '673', NULL, NULL),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', '100', '359', NULL, NULL),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', '854', '226', NULL, NULL),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', '108', '257', NULL, NULL),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', '116', '855', NULL, NULL),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', '120', '237', NULL, NULL),
(38, 'CA', 'CANADA', 'Canada', 'CAN', '124', '1', NULL, NULL),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', '132', '238', NULL, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', '136', '1345', NULL, NULL),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', '140', '236', NULL, NULL),
(42, 'TD', 'CHAD', 'Chad', 'TCD', '148', '235', NULL, NULL),
(43, 'CL', 'CHILE', 'Chile', 'CHL', '152', '56', NULL, NULL),
(44, 'CN', 'CHINA', 'China', 'CHN', '156', '86', NULL, NULL),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, '61', NULL, NULL),
(46, 'CC', 'COCOS [KEELING) ISLANDS', 'Cocos [Keeling) Islands', NULL, NULL, '672', NULL, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', '170', '57', NULL, NULL),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', '174', '269', NULL, NULL),
(49, 'CG', 'CONGO', 'Congo', 'COG', '178', '242', NULL, NULL),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', '180', '242', NULL, NULL),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', '184', '682', NULL, NULL),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', '188', '506', NULL, NULL),
(53, 'CI', 'COTE DIVOIRE', 'Cote D Ivoire', 'CIV', '384', '225', NULL, NULL),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', '191', '385', NULL, NULL),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', '192', '53', NULL, NULL),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', '196', '357', NULL, NULL),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', '203', '420', NULL, NULL),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', '208', '45', NULL, NULL),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', '262', '253', NULL, NULL),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', '212', '1767', NULL, NULL),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', '214', '1809', NULL, NULL),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', '218', '593', NULL, NULL),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', '818', '20', NULL, NULL),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', '222', '503', NULL, NULL),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', '226', '240', NULL, NULL),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', '232', '291', NULL, NULL),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', '233', '372', NULL, NULL),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', '231', '251', NULL, NULL),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', '238', '500', NULL, NULL),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', '234', '298', NULL, NULL),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', '242', '679', NULL, NULL),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', '246', '358', NULL, NULL),
(73, 'FR', 'FRANCE', 'France', 'FRA', '250', '33', NULL, NULL),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', '254', '594', NULL, NULL),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', '258', '689', NULL, NULL),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, '0', NULL, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', '266', '241', NULL, NULL),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', '270', '220', NULL, NULL),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', '268', '995', NULL, NULL),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', '276', '49', NULL, NULL),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', '288', '233', NULL, NULL),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', '292', '350', NULL, NULL),
(83, 'GR', 'GREECE', 'Greece', 'GRC', '300', '30', NULL, NULL),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', '304', '299', NULL, NULL),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', '308', '1473', NULL, NULL),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', '312', '590', NULL, NULL),
(87, 'GU', 'GUAM', 'Guam', 'GUM', '316', '1671', NULL, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', '320', '502', NULL, NULL),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', '324', '224', NULL, NULL),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', '624', '245', NULL, NULL),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', '328', '592', NULL, NULL),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', '332', '509', NULL, NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, '0', NULL, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', '336', '39', NULL, NULL),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', '340', '504', NULL, NULL),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', '344', '852', NULL, NULL),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', '348', '36', NULL, NULL),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', '352', '354', NULL, NULL),
(99, 'IN', 'INDIA', 'India', 'IND', '356', '91', NULL, NULL),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', '360', '62', NULL, NULL),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', '364', '98', NULL, NULL),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', '368', '964', NULL, NULL),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', '372', '353', NULL, NULL),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', '376', '972', NULL, NULL),
(105, 'IT', 'ITALY', 'Italy', 'ITA', '380', '39', NULL, NULL),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', '388', '1876', NULL, NULL),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', '392', '81', NULL, NULL),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', '400', '962', NULL, NULL),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', '398', '7', NULL, NULL),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', '404', '254', NULL, NULL),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', '296', '686', NULL, NULL),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', '408', '850', NULL, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', '410', '82', NULL, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', '414', '965', NULL, NULL),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', '417', '996', NULL, NULL),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', '418', '856', NULL, NULL),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', '428', '371', NULL, NULL),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', '422', '961', NULL, NULL),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', '426', '266', NULL, NULL),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', '430', '231', NULL, NULL),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', '434', '218', NULL, NULL),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', '438', '423', NULL, NULL),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', '440', '370', NULL, NULL),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', '442', '352', NULL, NULL),
(125, 'MO', 'MACAO', 'Macao', 'MAC', '446', '853', NULL, NULL),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', '807', '389', NULL, NULL),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', '450', '261', NULL, NULL),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', '454', '265', NULL, NULL),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', '458', '60', NULL, NULL),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', '462', '960', NULL, NULL),
(131, 'ML', 'MALI', 'Mali', 'MLI', '466', '223', NULL, NULL),
(132, 'MT', 'MALTA', 'Malta', 'MLT', '470', '356', NULL, NULL),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', '584', '692', NULL, NULL),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', '474', '596', NULL, NULL),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', '478', '222', NULL, NULL),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', '480', '230', NULL, NULL),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, '269', NULL, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', '484', '52', NULL, NULL),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', '583', '691', NULL, NULL),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', '498', '373', NULL, NULL),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', '492', '377', NULL, NULL),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', '496', '976', NULL, NULL),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', '500', '1664', NULL, NULL),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', '504', '212', NULL, NULL),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', '508', '258', NULL, NULL),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', '104', '95', NULL, NULL),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', '516', '264', NULL, NULL),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', '520', '674', NULL, NULL),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', '524', '977', NULL, NULL),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', '528', '31', NULL, NULL),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', '530', '599', NULL, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', '540', '687', NULL, NULL),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', '554', '64', NULL, NULL),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', '558', '505', NULL, NULL),
(155, 'NE', 'NIGER', 'Niger', 'NER', '562', '227', NULL, NULL),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', '566', '234', NULL, NULL),
(157, 'NU', 'NIUE', 'Niue', 'NIU', '570', '683', NULL, NULL),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', '574', '672', NULL, NULL),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', '580', '1670', NULL, NULL),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', '578', '47', NULL, NULL),
(161, 'OM', 'OMAN', 'Oman', 'OMN', '512', '968', NULL, NULL),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', '586', '92', NULL, NULL),
(163, 'PW', 'PALAU', 'Palau', 'PLW', '585', '680', NULL, NULL),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, '970', NULL, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', '591', '507', NULL, NULL),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', '598', '675', NULL, NULL),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', '600', '595', NULL, NULL),
(168, 'PE', 'PERU', 'Peru', 'PER', '604', '51', NULL, NULL),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', '608', '63', NULL, NULL),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', '612', '0', NULL, NULL),
(171, 'PL', 'POLAND', 'Poland', 'POL', '616', '48', NULL, NULL),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', '620', '351', NULL, NULL),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', '630', '1787', NULL, NULL),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', '634', '974', NULL, NULL),
(175, 'RE', 'REUNION', 'Reunion', 'REU', '638', '262', NULL, NULL),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', '642', '40', NULL, NULL),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', '643', '70', NULL, NULL),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', '646', '250', NULL, NULL),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', '654', '290', NULL, NULL),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', '659', '1869', NULL, NULL),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', '662', '1758', NULL, NULL),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', '666', '508', NULL, NULL),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', '670', '1784', NULL, NULL),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', '882', '684', NULL, NULL),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', '674', '378', NULL, NULL),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', '678', '239', NULL, NULL),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', '682', '966', NULL, NULL),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', '686', '221', NULL, NULL),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, '381', NULL, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', '690', '248', NULL, NULL),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', '694', '232', NULL, NULL),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', '702', '65', NULL, NULL),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', '703', '421', NULL, NULL),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', '705', '386', NULL, NULL),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', '90', '677', NULL, NULL),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', '706', '252', NULL, NULL),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', '710', '27', NULL, NULL),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, '0', NULL, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', '724', '34', NULL, NULL),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', '144', '94', NULL, NULL),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', '736', '249', NULL, NULL),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', '740', '597', NULL, NULL),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', '744', '47', NULL, NULL),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', '748', '268', NULL, NULL),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', '752', '46', NULL, NULL),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', '756', '41', NULL, NULL),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', '760', '963', NULL, NULL),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', '158', '886', NULL, NULL),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', '762', '992', NULL, NULL),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', '834', '255', NULL, NULL),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', '764', '66', NULL, NULL),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, '670', NULL, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', '768', '228', NULL, NULL),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', '772', '690', NULL, NULL),
(215, 'TO', 'TONGA', 'Tonga', 'TON', '776', '676', NULL, NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', '780', '1868', NULL, NULL),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', '788', '216', NULL, NULL),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', '792', '90', NULL, NULL),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', '795', '7370', NULL, NULL),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', '796', '1649', NULL, NULL),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', '798', '688', NULL, NULL),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', '800', '256', NULL, NULL),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', '804', '380', NULL, NULL),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', '784', '971', NULL, NULL),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', '826', '44', NULL, NULL),
(226, 'US', 'UNITED STATES', 'United States', 'USA', '840', '1', NULL, NULL),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, '1', NULL, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', '858', '598', NULL, NULL),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', '860', '998', NULL, NULL),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', '548', '678', NULL, NULL),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', '862', '58', NULL, NULL),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', '704', '84', NULL, NULL),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', '92', '1284', NULL, NULL),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', '850', '1340', NULL, NULL),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', '876', '681', NULL, NULL),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', '732', '212', NULL, NULL),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', '887', '967', NULL, NULL),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', '894', '260', NULL, NULL),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', '716', '263', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci,
  `payment_terms` text COLLATE utf8mb4_unicode_ci,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `mode_carrying_id` bigint UNSIGNED DEFAULT NULL,
  `port_discharge_id` bigint UNSIGNED DEFAULT NULL,
  `final_destination_id` bigint UNSIGNED DEFAULT NULL,
  `loading_place_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone_number`, `terms_and_conditions`, `payment_terms`, `country_id`, `mode_carrying_id`, `port_discharge_id`, `final_destination_id`, `loading_place_id`, `created_at`, `updated_at`) VALUES
(2, 'KRISHNACHURA GLOBAL TRADERS', 'JALUKBARI, NEAR HAJJ BHAWAN, GUWAHATI, KAMRUP METROPOLITAN, ASSAM 781014', '0909423742', 'sfsdf', 'sdfsdf', 18, 3, 1, 1, 1, '2024-04-28 23:50:36', '2024-04-28 23:50:36'),
(11, 'Test Customer fyhfghy', NULL, '1234567890', 'accepted', 'Net 30', 1, 1, 1, 1, 1, '2024-04-29 00:18:22', '2024-04-29 21:44:04'),
(14, 'Test Customer', NULL, '1234567890', 'accepted', 'Net 30', 1, 1, 1, 1, 1, '2024-04-29 01:02:02', '2024-04-29 01:02:02'),
(15, 'KRISHNACHURA GLOBAL TRADERS', 'ss', '0909423742', 'sfsdf', 'sdfsdf', 4, 1, 1, 1, 1, '2024-04-29 21:42:49', '2024-04-29 21:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_destinations`
--

CREATE TABLE `final_destinations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_destinations`
--

INSERT INTO `final_destinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mankachar L.C Station, India', NULL, NULL),
(2, 'Sutarkandi, Karimganj, Assam, India', NULL, NULL),
(4, 'KRISHNACHURA GLOBAL TRADERS', '2024-04-30 00:51:41', '2024-04-30 00:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `loading_places`
--

CREATE TABLE `loading_places` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loading_places`
--

INSERT INTO `loading_places` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'vitikandi, voberchor, gazaria, munshiganj', NULL, NULL),
(2, 'ramarbag, fatullah, narayanganj', NULL, NULL),
(3, 'KRISHNACHURA GLOBAL TRADERS', '2024-04-30 01:27:10', '2024-04-30 01:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_25_095031_create_roles_table', 1),
(7, '2024_01_25_095333_create_permission_tables', 1),
(8, '2024_02_01_041554_create_modes_of_carrying_table', 1),
(9, '2024_02_01_042151_create_port_of_discharged_table', 1),
(10, '2024_02_01_052824_create_countries_table', 1),
(11, '2024_02_03_042313_create_final_destinations_table', 1),
(12, '2024_02_03_042538_create_loading_places_table', 1),
(13, '2024_02_03_055531_create_customers_table', 1),
(14, '2024_02_03_055533_create_orders_table', 1),
(15, '2024_02_04_042434_create_order_types_table', 1),
(17, '2024_02_04_052514_create_order_statuses_table', 1),
(18, '2024_02_07_060419_create-products_table', 1),
(19, '2024_02_24_085822_create-bank_table', 1),
(20, '2024_02_25_083643_add_new_column_to_orders_table', 1),
(21, '2024_02_25_083828_update_to_orders_table', 1),
(22, '2024_02_25_090643_add_new_column_to_order_items_table', 1),
(23, '2024_02_25_093644_update_to_order_items_table', 1),
(24, '2024_02_28_091756_create_terms_table', 1),
(25, '2024_03_19_055852_create_companies_table', 1),
(26, '2024_02_04_045210_create_order_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modes_of_carrying`
--

CREATE TABLE `modes_of_carrying` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modes_of_carrying`
--

INSERT INTO `modes_of_carrying` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BY TRUCK', NULL, NULL),
(2, 'BY Air', NULL, NULL),
(3, 'By Ship', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `exporter_id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `importer_iec_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_carrying_id` bigint UNSIGNED NOT NULL,
  `port_discharge_id` bigint UNSIGNED NOT NULL,
  `final_destination_id` bigint UNSIGNED NOT NULL,
  `loading_place_id` bigint UNSIGNED NOT NULL,
  `bank_id` bigint UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_term` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_number`, `order_date`, `customer_id`, `exporter_id`, `country_id`, `importer_iec_no`, `mode_carrying_id`, `port_discharge_id`, `final_destination_id`, `loading_place_id`, `bank_id`, `total`, `grand_total`, `tax`, `discount`, `currency`, `pan_number`, `sales_term`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '5/2024/A', '2024-05-04 00:00:00', 2, 1, 99, '234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '234234', 'CRF BASIS', 3, NULL, NULL),
(2, '2024', '2024-05-08 00:00:00', 2, 1, 99, '534', 2, 1, 2, 1, 7, '0', '0', '0', '0', NULL, '345', '234', 3, NULL, NULL),
(3, '2024', '2024-05-08 00:00:00', 14, 1, 99, '345', 2, 2, 1, 3, 7, '0', '0', '0', '0', NULL, '345', '234', 3, NULL, NULL),
(4, 'SFL/IND/DTPL/1001/24', '2024-02-02 00:00:00', 2, 1, 99, '4234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 21:52:49', NULL),
(5, 'SFL/IND/DTPL/1001/24', '2024-02-02 00:00:00', 2, 1, 99, '4234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 21:54:13', NULL),
(6, 'SFL/IND/DTPL/1001/24', '2024-02-02 00:00:00', 2, 1, 99, '4234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 21:56:35', NULL),
(7, 'SFL/IND/DTPL/1001/24', '2024-02-02 00:00:00', 2, 1, 99, '4234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 22:02:31', NULL),
(8, 'SFL/IND/DTPL/1001/24', '2024-02-02 00:00:00', 2, 1, 99, '4234', 1, 1, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 22:03:00', NULL),
(9, 'SFL/IND/DTPL/1001/24', '2024-05-09 00:00:00', 2, 1, 99, '4234', 2, 2, 1, 1, 7, '0', '0', '0', '0', NULL, '345345', 'CPT BASIS', 3, '2024-05-08 23:49:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hs_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcs_per_bunch` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `total_bunch` int UNSIGNED NOT NULL,
  `weight_per_unit` decimal(10,2) NOT NULL,
  `net_weight` decimal(10,2) NOT NULL,
  `unit_rate` decimal(10,2) NOT NULL,
  `total_value` decimal(10,2) NOT NULL,
  `gross_weight` decimal(10,2) NOT NULL,
  `cbm_length` decimal(10,2) NOT NULL,
  `cbm_width` decimal(10,2) NOT NULL,
  `cbm_height` decimal(10,2) NOT NULL,
  `carton_cbm` decimal(10,2) NOT NULL,
  `total_cbm` decimal(10,2) NOT NULL,
  `total_gross_weight` decimal(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `sale_id`, `product_code`, `description`, `hs_code`, `pcs_per_bunch`, `quantity`, `total_bunch`, `weight_per_unit`, `net_weight`, `unit_rate`, `total_value`, `gross_weight`, `cbm_length`, `cbm_width`, `cbm_height`, `carton_cbm`, `total_cbm`, `total_gross_weight`, `created_at`, `updated_at`) VALUES
(37, 1, '1395111511', 'Glamour Series One Gang One Way Switch (GL-01)', '8536.5', 144, 144, 1, 0.02, 2.52, 0.89, 128.16, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 189.723000, NULL, NULL),
(38, 1, '1395111501', 'Glamour Series Two Gang One Way Switch (GL-03)', '8536.5', 144, 432, 3, 0.02, 9.07, 1.25, 540.00, 9.31, 51.00, 49.50, 49.00, 0.12, 0.37, 20.765400, NULL, NULL),
(39, 1, '1395111505', 'Glamour Series Three Gang One Way Switch (GL-05)', '8536.5', 144, 432, 3, 0.02, 8.71, 1.61, 695.52, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 26.067000, NULL, NULL),
(40, 1, '1395111506', 'Glamour Series Four Gang One Way Switch (GL-06)', '8536.5', 144, 432, 3, 0.02, 6.54, 1.88, 812.16, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 25.987800, NULL, NULL),
(41, 1, '1395111553', 'Glamour Series Three Gang (1W)Switch & 2 Pin Socket (GL-53)', '8536.5', 144, 144, 1, 0.02, 2.54, 1.99, 286.56, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 29.234000, NULL, NULL),
(42, 1, '1395111515', 'Glamour Series Three Pin Round Socket with Switch & Neon Indicator  (GL-15)', '8536.5', 144, 144, 1, 0.03, 4.27, 2.02, 290.88, 10.93, 60.00, 20.00, 36.00, 0.04, 0.04, 14.892600, NULL, NULL),
(43, 1, '1395111517', 'Glamour Series Three Pin Multi Functional Socket with Switch (GL-07)', '8536.5', 144, 288, 2, 0.01, 3.89, 1.95, 561.60, 7.61, 60.00, 20.00, 36.00, 0.04, 0.09, 3.591000, NULL, NULL),
(44, 1, '1395111533', 'Glamour Series Two & Three Pin Multi Functional Socket with USB Port (GL-23)', '8536.5', 144, 144, 1, 0.01, 1.60, 5.07, 730.08, 9.31, 51.00, 49.50, 49.00, 0.12, 0.12, 17.434200, NULL, NULL),
(45, 1, '1395111535', 'Glamour Series Two & Three Pin Multi Functional Socket Switch (GL-25)', '8536.5', 144, 288, 2, 0.01, 3.31, 1.97, 567.36, 10.93, 58.50, 53.50, 33.00, 0.10, 0.21, 13.330200, NULL, NULL),
(46, 1, '1395111512', 'Glamour Series Bell Push (GL-12)', '8536.5', 144, 144, 1, 0.02, 2.86, 1.24, 178.56, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 6.929400, NULL, NULL),
(47, 1, '1395111520', 'Glamour Series Fan Regulator (GL-20)', '8536.5', 96, 96, 1, 0.00, 0.30, 2.32, 222.72, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 32.803800, NULL, NULL),
(48, 1, '1395111516', 'Glamour Series DP Switch with Neon (GL-16)', '8536.5', 144, 144, 1, 0.02, 2.52, 2.88, 414.72, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 15.057000, NULL, NULL),
(49, 1, '1395111601', 'Ultimate Series One Gang One Way Switch (UL-01)', '8536.5', 144, 144, 1, 0.03, 3.81, 1.23, 177.12, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 14.901000, NULL, NULL),
(50, 1, '1395111603', 'Ultimate Series Two Gang One Way Switch (UL-03)', '8536.5', 144, 288, 2, 0.02, 5.05, 1.61, 463.68, 9.31, 51.00, 49.50, 49.00, 0.12, 0.25, 30.594600, NULL, NULL),
(51, 1, '1395111605', 'Ultimate Series Three Gang One Way Switch (UL-05)', '8536.5', 144, 432, 3, 0.03, 14.48, 1.97, 851.04, 10.93, 58.50, 53.50, 33.00, 0.10, 0.31, 26.402000, NULL, NULL),
(52, 1, '1395111606', 'Ultimate Series Four Gang One Way Switch (UL-06)', '8536.5', 144, 432, 3, 0.02, 10.40, 2.34, 1010.88, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 30.435000, NULL, NULL),
(53, 1, '1395111612', 'Ultimate Series Bell Push (UL-12)', '8536.5', 144, 144, 1, 0.02, 3.43, 1.19, 171.36, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 13.233200, NULL, NULL),
(54, 1, '1395111620', 'Ultimate Series Fan Regulator (UL-20)', '8536.5', 96, 96, 1, 0.04, 3.43, 2.74, 263.04, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 8.363600, NULL, NULL),
(55, 2, '1395111511', 'Glamour Series One Gang One Way Switch (GL-01)', '8536.5', 144, 144, 1, 0.02, 2.52, 0.89, 128.16, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 189.723000, NULL, NULL),
(56, 2, '1395111501', 'Glamour Series Two Gang One Way Switch (GL-03)', '8536.5', 144, 432, 3, 0.02, 9.07, 1.25, 540.00, 9.31, 51.00, 49.50, 49.00, 0.12, 0.37, 20.765400, NULL, NULL),
(57, 2, '1395111505', 'Glamour Series Three Gang One Way Switch (GL-05)', '8536.5', 144, 432, 3, 0.02, 8.71, 1.61, 695.52, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 26.067000, NULL, NULL),
(58, 2, '1395111506', 'Glamour Series Four Gang One Way Switch (GL-06)', '8536.5', 144, 432, 3, 0.02, 6.54, 1.88, 812.16, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 25.987800, NULL, NULL),
(59, 2, '1395111553', 'Glamour Series Three Gang (1W)Switch & 2 Pin Socket (GL-53)', '8536.5', 144, 144, 1, 0.02, 2.54, 1.99, 286.56, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 29.234000, NULL, NULL),
(60, 2, '1395111515', 'Glamour Series Three Pin Round Socket with Switch & Neon Indicator  (GL-15)', '8536.5', 144, 144, 1, 0.03, 4.27, 2.02, 290.88, 10.93, 60.00, 20.00, 36.00, 0.04, 0.04, 14.892600, NULL, NULL),
(61, 2, '1395111517', 'Glamour Series Three Pin Multi Functional Socket with Switch (GL-07)', '8536.5', 144, 288, 2, 0.01, 3.89, 1.95, 561.60, 7.61, 60.00, 20.00, 36.00, 0.04, 0.09, 3.591000, NULL, NULL),
(62, 2, '1395111533', 'Glamour Series Two & Three Pin Multi Functional Socket with USB Port (GL-23)', '8536.5', 144, 144, 1, 0.01, 1.60, 5.07, 730.08, 9.31, 51.00, 49.50, 49.00, 0.12, 0.12, 17.434200, NULL, NULL),
(63, 2, '1395111535', 'Glamour Series Two & Three Pin Multi Functional Socket Switch (GL-25)', '8536.5', 144, 288, 2, 0.01, 3.31, 1.97, 567.36, 10.93, 58.50, 53.50, 33.00, 0.10, 0.21, 13.330200, NULL, NULL),
(64, 2, '1395111512', 'Glamour Series Bell Push (GL-12)', '8536.5', 144, 144, 1, 0.02, 2.86, 1.24, 178.56, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 6.929400, NULL, NULL),
(65, 2, '1395111520', 'Glamour Series Fan Regulator (GL-20)', '8536.5', 96, 96, 1, 0.00, 0.30, 2.32, 222.72, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 32.803800, NULL, NULL),
(66, 2, '1395111516', 'Glamour Series DP Switch with Neon (GL-16)', '8536.5', 144, 144, 1, 0.02, 2.52, 2.88, 414.72, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 15.057000, NULL, NULL),
(67, 2, '1395111601', 'Ultimate Series One Gang One Way Switch (UL-01)', '8536.5', 144, 144, 1, 0.03, 3.81, 1.23, 177.12, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 14.901000, NULL, NULL),
(68, 2, '1395111603', 'Ultimate Series Two Gang One Way Switch (UL-03)', '8536.5', 144, 288, 2, 0.02, 5.05, 1.61, 463.68, 9.31, 51.00, 49.50, 49.00, 0.12, 0.25, 30.594600, NULL, NULL),
(69, 2, '1395111605', 'Ultimate Series Three Gang One Way Switch (UL-05)', '8536.5', 144, 432, 3, 0.03, 14.48, 1.97, 851.04, 10.93, 58.50, 53.50, 33.00, 0.10, 0.31, 26.402000, NULL, NULL),
(70, 2, '1395111606', 'Ultimate Series Four Gang One Way Switch (UL-06)', '8536.5', 144, 432, 3, 0.02, 10.40, 2.34, 1010.88, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 30.435000, NULL, NULL),
(71, 2, '1395111612', 'Ultimate Series Bell Push (UL-12)', '8536.5', 144, 144, 1, 0.02, 3.43, 1.19, 171.36, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 13.233200, NULL, NULL),
(72, 2, '1395111620', 'Ultimate Series Fan Regulator (UL-20)', '8536.5', 96, 96, 1, 0.04, 3.43, 2.74, 263.04, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 8.363600, NULL, NULL),
(73, 3, '1395111511', 'Glamour Series One Gang One Way Switch (GL-01)', '8536.5', 144, 144, 1, 0.02, 2.52, 0.89, 128.16, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 189.723000, NULL, NULL),
(74, 3, '1395111501', 'Glamour Series Two Gang One Way Switch (GL-03)', '8536.5', 144, 432, 3, 0.02, 9.07, 1.25, 540.00, 9.31, 51.00, 49.50, 49.00, 0.12, 0.37, 20.765400, NULL, NULL),
(75, 3, '1395111505', 'Glamour Series Three Gang One Way Switch (GL-05)', '8536.5', 144, 432, 3, 0.02, 8.71, 1.61, 695.52, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 26.067000, NULL, NULL),
(76, 3, '1395111506', 'Glamour Series Four Gang One Way Switch (GL-06)', '8536.5', 144, 432, 3, 0.02, 6.54, 1.88, 812.16, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 25.987800, NULL, NULL),
(77, 3, '1395111553', 'Glamour Series Three Gang (1W)Switch & 2 Pin Socket (GL-53)', '8536.5', 144, 144, 1, 0.02, 2.54, 1.99, 286.56, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 29.234000, NULL, NULL),
(78, 3, '1395111515', 'Glamour Series Three Pin Round Socket with Switch & Neon Indicator  (GL-15)', '8536.5', 144, 144, 1, 0.03, 4.27, 2.02, 290.88, 10.93, 60.00, 20.00, 36.00, 0.04, 0.04, 14.892600, NULL, NULL),
(79, 3, '1395111517', 'Glamour Series Three Pin Multi Functional Socket with Switch (GL-07)', '8536.5', 144, 288, 2, 0.01, 3.89, 1.95, 561.60, 7.61, 60.00, 20.00, 36.00, 0.04, 0.09, 3.591000, NULL, NULL),
(80, 3, '1395111533', 'Glamour Series Two & Three Pin Multi Functional Socket with USB Port (GL-23)', '8536.5', 144, 144, 1, 0.01, 1.60, 5.07, 730.08, 9.31, 51.00, 49.50, 49.00, 0.12, 0.12, 17.434200, NULL, NULL),
(81, 3, '1395111535', 'Glamour Series Two & Three Pin Multi Functional Socket Switch (GL-25)', '8536.5', 144, 288, 2, 0.01, 3.31, 1.97, 567.36, 10.93, 58.50, 53.50, 33.00, 0.10, 0.21, 13.330200, NULL, NULL),
(82, 3, '1395111512', 'Glamour Series Bell Push (GL-12)', '8536.5', 144, 144, 1, 0.02, 2.86, 1.24, 178.56, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 6.929400, NULL, NULL),
(83, 3, '1395111520', 'Glamour Series Fan Regulator (GL-20)', '8536.5', 96, 96, 1, 0.00, 0.30, 2.32, 222.72, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 32.803800, NULL, NULL),
(84, 3, '1395111516', 'Glamour Series DP Switch with Neon (GL-16)', '8536.5', 144, 144, 1, 0.02, 2.52, 2.88, 414.72, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 15.057000, NULL, NULL),
(85, 3, '1395111601', 'Ultimate Series One Gang One Way Switch (UL-01)', '8536.5', 144, 144, 1, 0.03, 3.81, 1.23, 177.12, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 14.901000, NULL, NULL),
(86, 3, '1395111603', 'Ultimate Series Two Gang One Way Switch (UL-03)', '8536.5', 144, 288, 2, 0.02, 5.05, 1.61, 463.68, 9.31, 51.00, 49.50, 49.00, 0.12, 0.25, 30.594600, NULL, NULL),
(87, 3, '1395111605', 'Ultimate Series Three Gang One Way Switch (UL-05)', '8536.5', 144, 432, 3, 0.03, 14.48, 1.97, 851.04, 10.93, 58.50, 53.50, 33.00, 0.10, 0.31, 26.402000, NULL, NULL),
(88, 3, '1395111606', 'Ultimate Series Four Gang One Way Switch (UL-06)', '8536.5', 144, 432, 3, 0.02, 10.40, 2.34, 1010.88, 10.93, 64.00, 43.00, 38.00, 0.10, 0.31, 30.435000, NULL, NULL),
(89, 3, '1395111612', 'Ultimate Series Bell Push (UL-12)', '8536.5', 144, 144, 1, 0.02, 3.43, 1.19, 171.36, 10.93, 64.00, 43.00, 38.00, 0.10, 0.10, 13.233200, NULL, NULL),
(90, 3, '1395111620', 'Ultimate Series Fan Regulator (UL-20)', '8536.5', 96, 96, 1, 0.04, 3.43, 2.74, 263.04, 7.61, 60.00, 20.00, 36.00, 0.04, 0.04, 8.363600, NULL, NULL),
(91, 8, '1490142209', 'STORMY FAN (BLACK, ALUMINIUM)', '8414.51.00', 8, 2000, 250, 1.72, 3440.00, 6.50, 13000.00, 7698.72, 24.50, 34.50, 1000000.00, 0.00, 0.00, 0.800000, NULL, NULL),
(92, 8, '1490202103', 'SS EXHAUST FAN 6\"', '8414.51.00', 4, 1200, 300, 1.11, 1332.00, 4.62, 5544.00, 3260.74, 16.00, 31.00, 1000000.00, 0.00, 0.00, 0.800000, NULL, NULL),
(93, 8, '1490192110', 'SS EXHAUST FAN 8\"', '8414.51.00', 4, 1200, 300, 1.36, 1632.00, 5.42, 6504.00, 2643.84, 16.00, 40.00, 1000000.00, 0.00, 0.00, 0.800000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `order_type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `name`, `short_name`, `created_at`, `updated_at`) VALUES
(1, 'SALES CONTACT', 'sc', NULL, NULL),
(2, 'PROFORMA INVOICE', 'pi', NULL, NULL),
(3, 'COMMERCIAL INVOICE', 'ci', NULL, NULL),
(4, 'PACKING & WEIGHT LIST', 'pw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create role', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(2, 'show role', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(3, 'edit role', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(4, 'delete role', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(5, 'create user', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(6, 'show user', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(7, 'edit user', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(8, 'delete user', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `port_of_discharged`
--

CREATE TABLE `port_of_discharged` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `port_of_discharged`
--

INSERT INTO `port_of_discharged` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rowmari L.C Station', NULL, '2024-05-07 22:19:23'),
(2, 'Sheola L.C Station', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `sap_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` decimal(8,2) NOT NULL,
  `depo` decimal(8,2) NOT NULL,
  `distributor` decimal(8,2) NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(2, 'writer', 'web', '2024-04-28 23:48:38', '2024-04-28 23:48:38'),
(3, 'admin', 'web', '2024-04-28 23:48:39', '2024-04-28 23:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(1, 3),
(2, 3),
(3, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Writer User', 'writer@ssgbd.com', '2024-04-28 23:48:39', '$2y$12$9fAhV1CQV33GZKGL2pILReDAIT6xY9i6VwCW/zBhhrMrfV6P./SAG', 'xCQiRU6R7G', '2024-04-28 23:48:39', '2024-04-28 23:48:39'),
(2, 'Admin User', 'admin@ssgbd.com', '2024-04-28 23:48:40', '$2y$12$G/NPq8dlS014smBs3FpXNOm3ZcmtzA4Uu4JKVYRFI8IUXmEfawy4G', 'Byt5GcErml', '2024-04-28 23:48:40', '2024-04-28 23:48:40'),
(3, 'Super-Admin User', 'superadmin@ssgbd.com', '2024-04-28 23:48:40', '$2y$12$wLEGmf5.r0N8QVa7ITstD.dG2/Kfv3aPHB3xP.oTfyLrSuNSo2f1.', 'uu3EHwrSSn', '2024-04-28 23:48:40', '2024-04-28 23:48:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_country_id_foreign` (`country_id`),
  ADD KEY `customers_mode_carrying_id_foreign` (`mode_carrying_id`),
  ADD KEY `customers_port_discharge_id_foreign` (`port_discharge_id`),
  ADD KEY `customers_final_destination_id_foreign` (`final_destination_id`),
  ADD KEY `customers_loading_place_id_foreign` (`loading_place_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_destinations`
--
ALTER TABLE `final_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading_places`
--
ALTER TABLE `loading_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modes_of_carrying`
--
ALTER TABLE `modes_of_carrying`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_mode_carrying_id_foreign` (`mode_carrying_id`),
  ADD KEY `orders_port_discharge_id_foreign` (`port_discharge_id`),
  ADD KEY `orders_final_destination_id_foreign` (`final_destination_id`),
  ADD KEY `orders_loading_place_id_foreign` (`loading_place_id`),
  ADD KEY `orders_created_by_foreign` (`created_by`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_sale_id_foreign` (`sale_id`),
  ADD KEY `order_status_order_type_id_foreign` (`order_type_id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `port_of_discharged`
--
ALTER TABLE `port_of_discharged`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_destinations`
--
ALTER TABLE `final_destinations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loading_places`
--
ALTER TABLE `loading_places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `modes_of_carrying`
--
ALTER TABLE `modes_of_carrying`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `port_of_discharged`
--
ALTER TABLE `port_of_discharged`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_final_destination_id_foreign` FOREIGN KEY (`final_destination_id`) REFERENCES `final_destinations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_loading_place_id_foreign` FOREIGN KEY (`loading_place_id`) REFERENCES `loading_places` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_mode_carrying_id_foreign` FOREIGN KEY (`mode_carrying_id`) REFERENCES `modes_of_carrying` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_port_discharge_id_foreign` FOREIGN KEY (`port_discharge_id`) REFERENCES `port_of_discharged` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_final_destination_id_foreign` FOREIGN KEY (`final_destination_id`) REFERENCES `final_destinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_loading_place_id_foreign` FOREIGN KEY (`loading_place_id`) REFERENCES `loading_places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_mode_carrying_id_foreign` FOREIGN KEY (`mode_carrying_id`) REFERENCES `modes_of_carrying` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_port_discharge_id_foreign` FOREIGN KEY (`port_discharge_id`) REFERENCES `port_of_discharged` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_order_type_id_foreign` FOREIGN KEY (`order_type_id`) REFERENCES `order_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_status_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
