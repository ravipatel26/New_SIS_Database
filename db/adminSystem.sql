-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 03:37 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: adminSystem
--

-- --------------------------------------------------------

--
-- Table structure for table Conference
--

DROP TABLE IF EXISTS Conference;
CREATE TABLE IF NOT EXISTS Conference (
  `conferenceId` int(5) NOT NULL AUTO_INCREMENT,
  `serviceId` int(5) DEFAULT NULL,
  `conferenceName` varchar(25) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`conferenceId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table countries
--

DROP TABLE IF EXISTS countries;
CREATE TABLE IF NOT EXISTS countries (
  `countries_id` int(5) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(255) DEFAULT NULL,
  `countryCode` char(2) DEFAULT NULL,
  `countries_iso_code_3` char(3) DEFAULT NULL,
  `address_format_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`countries_id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

--
-- Dumping data for table countries
--

INSERT INTO countries (countries_id, countries_name, countryCode, countries_iso_code_3, address_format_id) VALUES
(1, 'Canada', 'CA', 'CAD', 1),
(2, 'États Unis', 'US', 'USA', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(9, 'Argentina', 'AR', 'ARG', 1),
(10, 'Armenia', 'AM', 'ARM', 1),
(11, 'Aruba', 'AW', 'ABW', 1),
(12, 'Australia', 'AU', 'AUS', 1),
(13, 'Austria', 'AT', 'AUT', 5),
(14, 'Azerbaijan', 'AZ', 'AZE', 1),
(15, 'Bahamas', 'BS', 'BHS', 1),
(16, 'Bahrain', 'BH', 'BHR', 1),
(17, 'Bangladesh', 'BD', 'BGD', 1),
(18, 'Barbados', 'BB', 'BRB', 1),
(19, 'Belarus', 'BY', 'BLR', 1),
(20, 'Belgium', 'BE', 'BEL', 1),
(21, 'Belize', 'BZ', 'BLZ', 1),
(22, 'Benin', 'BJ', 'BEN', 1),
(23, 'Bermuda', 'BM', 'BMU', 1),
(24, 'Bhutan', 'BT', 'BTN', 1),
(25, 'Bolivia', 'BO', 'BOL', 1),
(26, 'Botswana', 'BW', 'BWA', 1),
(27, 'Bouvet Island', 'BV', 'BVT', 1),
(28, 'Brazil', 'BR', 'BRA', 1),
(29, 'Brunei Darussalam', 'BN', 'BRN', 1),
(30, 'Bulgaria', 'BG', 'BGR', 1),
(31, 'Burkina Faso', 'BF', 'BFA', 1),
(32, 'Burundi', 'BI', 'BDI', 1),
(33, 'Cambodia', 'KH', 'KHM', 1),
(34, 'Cameroon', 'CM', 'CMR', 1),
(35, 'Cape Verde', 'CV', 'CPV', 1),
(36, 'Cayman Islands', 'KY', 'CYM', 1),
(37, 'Central African Republic', 'CF', 'CAF', 1),
(38, 'Chad', 'TD', 'TCD', 1),
(39, 'Chile', 'CL', 'CHL', 1),
(40, 'Christmas Island', 'CX', 'CXR', 1),
(41, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(42, 'Colombia', 'CO', 'COL', 1),
(43, 'Comoros', 'KM', 'COM', 1),
(44, 'Congo', 'CG', 'COG', 1),
(45, 'Cook Islands', 'CK', 'COK', 1),
(46, 'Costa Rica', 'CR', 'CRI', 1),
(47, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(48, 'Croatia', 'HR', 'HRV', 1),
(49, 'Cuba', 'CU', 'CUB', 1),
(50, 'Cyprus', 'CY', 'CYP', 1),
(51, 'Czech Republic', 'CZ', 'CZE', 1),
(52, 'Denmark', 'DK', 'DNK', 1),
(53, 'Djibouti', 'DJ', 'DJI', 1),
(54, 'Dominica', 'DM', 'DMA', 1),
(55, 'Dominican Republic', 'DO', 'DOM', 1),
(56, 'East Timor', 'TP', 'TMP', 1),
(57, 'Ecuador', 'EC', 'ECU', 1),
(58, 'Egypt', 'EG', 'EGY', 1),
(59, 'El Salvador', 'SV', 'SLV', 1),
(60, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(61, 'Eritrea', 'ER', 'ERI', 1),
(62, 'Estonia', 'EE', 'EST', 1),
(63, 'Ethiopia', 'ET', 'ETH', 1),
(64, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(65, 'Faroe Islands', 'FO', 'FRO', 1),
(66, 'Fiji', 'FJ', 'FJI', 1),
(67, 'Finland', 'FI', 'FIN', 1),
(68, 'France', 'FR', 'FRA', 1),
(69, 'French Guiana', 'GF', 'GUF', 1),
(70, 'French Polynesia', 'PF', 'PYF', 1),
(71, 'French Southern Territories', 'TF', 'ATF', 1),
(72, 'Gabon', 'GA', 'GAB', 1),
(73, 'Gambia', 'GM', 'GMB', 1),
(74, 'Georgia', 'GE', 'GEO', 1),
(75, 'Germany', 'DE', 'DEU', 5),
(76, 'Ghana', 'GH', 'GHA', 1),
(77, 'Gibraltar', 'GI', 'GIB', 1),
(78, 'Greece', 'GR', 'GRC', 1),
(79, 'Greenland', 'GL', 'GRL', 1),
(80, 'Grenada', 'GD', 'GRD', 1),
(81, 'Guadeloupe', 'GP', 'GLP', 1),
(82, 'Guam', 'GU', 'GUM', 1),
(83, 'Guatemala', 'GT', 'GTM', 1),
(84, 'Guinea', 'GN', 'GIN', 1),
(85, 'Guinea-bissau', 'GW', 'GNB', 1),
(86, 'Guyana', 'GY', 'GUY', 1),
(87, 'Haiti', 'HT', 'HTI', 1),
(88, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(89, 'Honduras', 'HN', 'HND', 1),
(90, 'Hong Kong', 'HK', 'HKG', 1),
(91, 'Hungary', 'HU', 'HUN', 1),
(92, 'Iceland', 'IS', 'ISL', 1),
(93, 'India', 'IN', 'IND', 1),
(94, 'Indonesia', 'ID', 'IDN', 1),
(95, 'Iraq', 'IQ', 'IRQ', 1),
(96, 'Ireland', 'IE', 'IRL', 1),
(97, 'Israel', 'IL', 'ISR', 1),
(98, 'Italy', 'IT', 'ITA', 1),
(99, 'Jamaica', 'JM', 'JAM', 1),
(100, 'Japan', 'JP', 'JPN', 1),
(101, 'Jordan', 'JO', 'JOR', 1),
(102, 'Kazakhstan', 'KZ', 'KAZ', 1),
(103, 'Kenya', 'KE', 'KEN', 1),
(104, 'Kiribati', 'KI', 'KIR', 1),
(105, 'Kuwait', 'KW', 'KWT', 1),
(106, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(107, 'Latvia', 'LV', 'LVA', 1),
(108, 'Lebanon', 'LB', 'LBN', 1),
(109, 'Lesotho', 'LS', 'LSO', 1),
(110, 'Liberia', 'LR', 'LBR', 1),
(111, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(112, 'Liechtenstein', 'LI', 'LIE', 1),
(113, 'Lithuania', 'LT', 'LTU', 1),
(114, 'Luxembourg', 'LU', 'LUX', 1),
(115, 'Macau', 'MO', 'MAC', 1),
(116, 'Madagascar', 'MG', 'MDG', 1),
(117, 'Malawi', 'MW', 'MWI', 1),
(118, 'Malaysia', 'MY', 'MYS', 1),
(119, 'Maldives', 'MV', 'MDV', 1),
(120, 'Mali', 'ML', 'MLI', 1),
(121, 'Malta', 'MT', 'MLT', 1),
(122, 'Marshall Islands', 'MH', 'MHL', 1),
(123, 'Martinique', 'MQ', 'MTQ', 1),
(124, 'Mauritania', 'MR', 'MRT', 1),
(125, 'Mauritius', 'MU', 'MUS', 1),
(126, 'Mayotte', 'YT', 'MYT', 1),
(127, 'Mexico', 'MX', 'MEX', 1),
(128, 'Moldova, Republic of', 'MD', 'MDA', 1),
(129, 'Monaco', 'MC', 'MCO', 1),
(130, 'Mongolia', 'MN', 'MNG', 1),
(131, 'Montserrat', 'MS', 'MSR', 1),
(132, 'Morocco', 'MA', 'MAR', 1),
(133, 'Mozambique', 'MZ', 'MOZ', 1),
(134, 'Myanmar', 'MM', 'MMR', 1),
(135, 'Namibia', 'NA', 'NAM', 1),
(136, 'Nauru', 'NR', 'NRU', 1),
(137, 'Nepal', 'NP', 'NPL', 1),
(138, 'Netherlands', 'NL', 'NLD', 1),
(139, 'Netherlands Antilles', 'AN', 'ANT', 1),
(140, 'New Caledonia', 'NC', 'NCL', 1),
(141, 'New Zealand', 'NZ', 'NZL', 1),
(142, 'Nicaragua', 'NI', 'NIC', 1),
(143, 'Niger', 'NE', 'NER', 1),
(144, 'Nigeria', 'NG', 'NGA', 1),
(145, 'Niue', 'NU', 'NIU', 1),
(146, 'Norfolk Island', 'NF', 'NFK', 1),
(147, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(148, 'Norway', 'NO', 'NOR', 1),
(149, 'Oman', 'OM', 'OMN', 1),
(150, 'Pakistan', 'PK', 'PAK', 1),
(151, 'Palau', 'PW', 'PLW', 1),
(152, 'Panama', 'PA', 'PAN', 1),
(153, 'Papua New Guinea', 'PG', 'PNG', 1),
(154, 'Paraguay', 'PY', 'PRY', 1),
(155, 'Peru', 'PE', 'PER', 1),
(156, 'Philippines', 'PH', 'PHL', 1),
(157, 'Pitcairn', 'PN', 'PCN', 1),
(158, 'Poland', 'PL', 'POL', 1),
(159, 'Portugal', 'PT', 'PRT', 1),
(160, 'Puerto Rico', 'PR', 'PRI', 1),
(161, 'Qatar', 'QA', 'QAT', 1),
(162, 'Reunion', 'RE', 'REU', 1),
(163, 'Romania', 'RO', 'ROM', 1),
(164, 'Rwanda', 'RW', 'RWA', 1),
(165, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(166, 'Saint Lucia', 'LC', 'LCA', 1),
(167, 'Saint Vincent and Grenadines', 'VC', 'VCT', 1),
(168, 'Samoa', 'WS', 'WSM', 1),
(169, 'San Marino', 'SM', 'SMR', 1),
(170, 'Sao Tome and Principe', 'ST', 'STP', 1),
(171, 'Saudi Arabia', 'SA', 'SAU', 1),
(172, 'Senegal', 'SN', 'SEN', 1),
(173, 'Seychelles', 'SC', 'SYC', 1),
(174, 'Sierra Leone', 'SL', 'SLE', 1),
(175, 'Singapore', 'SG', 'SGP', 4),
(176, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(177, 'Slovenia', 'SI', 'SVN', 1),
(178, 'Solomon Islands', 'SB', 'SLB', 1),
(179, 'Somalia', 'SO', 'SOM', 1),
(180, 'South Africa', 'ZA', 'ZAF', 1),
(181, 'Spain', 'ES', 'ESP', 3),
(182, 'Sri Lanka', 'LK', 'LKA', 1),
(183, 'St. Helena', 'SH', 'SHN', 1),
(184, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(185, 'Sudan', 'SD', 'SDN', 1),
(186, 'Suriname', 'SR', 'SUR', 1),
(187, 'Swaziland', 'SZ', 'SWZ', 1),
(188, 'Sweden', 'SE', 'SWE', 1),
(189, 'Switzerland', 'CH', 'CHE', 1),
(190, 'Taiwan', 'TW', 'TWN', 1),
(191, 'Tajikistan', 'TJ', 'TJK', 1),
(192, 'Thailand', 'TH', 'THA', 1),
(193, 'Togo', 'TG', 'TGO', 1),
(194, 'Tokelau', 'TK', 'TKL', 1),
(195, 'Tonga', 'TO', 'TON', 1),
(196, 'Tunisia', 'TN', 'TUN', 1),
(197, 'Turkey', 'TR', 'TUR', 1),
(198, 'Turkmenistan', 'TM', 'TKM', 1),
(199, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(200, 'Tuvalu', 'TV', 'TUV', 1),
(201, 'Uganda', 'UG', 'UGA', 1),
(202, 'Ukraine', 'UA', 'UKR', 1),
(203, 'United Arab Emirates', 'AE', 'ARE', 1),
(204, 'United Kingdom', 'GB', 'GBR', 1),
(205, 'Uruguay', 'UY', 'URY', 1),
(206, 'Uzbekistan', 'UZ', 'UZB', 1),
(207, 'Vanuatu', 'VU', 'VUT', 1),
(208, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(209, 'Venezuela', 'VE', 'VEN', 1),
(210, 'Viet Nam', 'VN', 'VNM', 1),
(211, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(212, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(213, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(214, 'Western Sahara', 'EH', 'ESH', 1),
(215, 'Yemen', 'YE', 'YEM', 1),
(216, 'Yugoslavia', 'YU', 'YUG', 1),
(217, 'Zaire', 'ZR', 'ZAR', 1),
(218, 'Zambia', 'ZM', 'ZMB', 1),
(219, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table Course
--

DROP TABLE IF EXISTS Course;
CREATE TABLE IF NOT EXISTS Course (
  `courseId` int(5) NOT NULL AUTO_INCREMENT,
  `deptId` int(5) DEFAULT NULL,
  `courseName` varchar(15) DEFAULT NULL,
  `courseNameCode` int(4) DEFAULT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table CourseTaken
--

DROP TABLE IF EXISTS CourseTaken;
CREATE TABLE IF NOT EXISTS CourseTaken (
  `courseTakenId` int(5) NOT NULL AUTO_INCREMENT,
  `studentId` int(5) DEFAULT NULL,
  `courseId` int(5) DEFAULT NULL,
  `professorId` int(5) DEFAULT NULL,
  `assignments` decimal(6,2) DEFAULT NULL,
  `projects` decimal(6,2) DEFAULT NULL,
  `midterms` decimal(6,2) DEFAULT NULL,
  `finalExams` decimal(6,2) DEFAULT NULL,
  `finalLetterGrade` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`courseTakenId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Department
--

DROP TABLE IF EXISTS Department;
CREATE TABLE IF NOT EXISTS Department (
  `deptId` int(5) NOT NULL AUTO_INCREMENT,
  `deptName` varchar(20) DEFAULT NULL,
  `deptPhone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`deptId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table Department
--

INSERT INTO Department (deptId, deptName, deptPhone) VALUES
(1, 'ENCS', '514-222-5566'),
(2, 'COMP', '514-665-8899');

-- --------------------------------------------------------

--
-- Table structure for table EditorialBoard
--

DROP TABLE IF EXISTS EditorialBoard;
CREATE TABLE IF NOT EXISTS EditorialBoard (
  `boardId` int(5) NOT NULL AUTO_INCREMENT,
  `serviceId` int(5) DEFAULT NULL,
  `journalName` varchar(25) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`boardId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Grades
--

DROP TABLE IF EXISTS Grades;
CREATE TABLE IF NOT EXISTS Grades (
  `gradeId` int(5) NOT NULL AUTO_INCREMENT,
  `courseTakenId` int(5) DEFAULT NULL,
  `gradeSchemeId` int(5) DEFAULT NULL,
  `assignments` decimal(6,2) DEFAULT NULL,
  `projects` decimal(6,2) DEFAULT NULL,
  `midTerms` decimal(6,2) DEFAULT NULL,
  `finalExams` decimal(6,2) DEFAULT NULL,
  `finalLetterGradeId` int(5) DEFAULT NULL,
  `studentId` int(5) DEFAULT NULL,
  PRIMARY KEY (`gradeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table GraduateStudent
--

DROP TABLE IF EXISTS GraduateStudent;
CREATE TABLE IF NOT EXISTS GraduateStudent (
  `graduateStudentId` int(5) NOT NULL AUTO_INCREMENT,
  `studentLevel` varchar(15) DEFAULT NULL,
  `currentPosition` varchar(25) DEFAULT NULL,
  `studentId` int(5) DEFAULT NULL,
  PRIMARY KEY (`graduateStudentId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table GraduateStudent
--

INSERT INTO GraduateStudent (graduateStudentId, studentLevel, currentPosition, studentId) VALUES
(1, 'Graduate', 'kjfksjfk ksjkf', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Grants`
--

DROP TABLE IF EXISTS Grants;
CREATE TABLE IF NOT EXISTS `Grants` (
  `grantId` int(5) NOT NULL AUTO_INCREMENT,
  `studentId` int(5) DEFAULT NULL,
  `professorId` int(5) DEFAULT NULL,
  `researchId` int(5) DEFAULT NULL,
  `grantAmount` decimal(10,2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`grantId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Professor
--

DROP TABLE IF EXISTS Professor;
CREATE TABLE IF NOT EXISTS Professor (
  `professorId` int(5) NOT NULL AUTO_INCREMENT,
  `deptId` int(5) DEFAULT NULL,
  `courseId` int(5) DEFAULT NULL,
  `professorName` varchar(25) DEFAULT NULL,
  `professorNumber` int(10) DEFAULT NULL,
  `professorEmail` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`professorId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Research
--

DROP TABLE IF EXISTS Research;
CREATE TABLE IF NOT EXISTS Research (
  `researchId` int(5) NOT NULL AUTO_INCREMENT,
  `studentId` int(5) DEFAULT NULL,
  `grantId` int(5) DEFAULT NULL,
  `professorId` int(5) DEFAULT NULL,
  `researchName` varchar(25) DEFAULT NULL,
  `startDate` varchar(15) NOT NULL,
  `endDate` varchar(15) NOT NULL,
  PRIMARY KEY (`researchId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Review
--

DROP TABLE IF EXISTS Review;
CREATE TABLE IF NOT EXISTS Review (
  `reviewId` int(5) NOT NULL AUTO_INCREMENT,
  `serviceId` int(5) DEFAULT NULL,
  `journalName` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`reviewId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table Students
--

DROP TABLE IF EXISTS Students;
CREATE TABLE IF NOT EXISTS Students (
  `studentId` int(5) NOT NULL AUTO_INCREMENT,
  `deptId` int(5) DEFAULT NULL,
  `studentName` varchar(25) DEFAULT NULL,
  `studentNumber` int(10) DEFAULT NULL,
  `studentEmail` varchar(25) DEFAULT NULL,
  `studentStatus` varchar(15) DEFAULT NULL,
  `studentPhone` varchar(15) DEFAULT NULL,
  `studentGender` varchar(10) DEFAULT NULL,
  `studentBirthDate` varchar(11) DEFAULT NULL,
  `studentAdress` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table Students
--

INSERT INTO Students (studentId, deptId, studentName, studentNumber, studentEmail, studentStatus, studentPhone, studentGender, studentBirthDate, studentAdress) VALUES
(1, 5, 'dsfsfs ffffffffff', 44455, 'Students', 'Students', 'Students', 'Students', 'Students', 'Students'),
(2, 5, 'fffffff rrrrrrrrrrrrrr', 12345678, 'alainf971@hotmail.com', 'Students', '514-111-2222', 'Students', '11/05/2015', '111 boulevard eee,Pompano Beach,Quebec,Algeria,H7V 1B5'),
(3, 5, 'dsfsfs ffffffffff', 12345678, 'alainf971@hotmail.com', 'Students', '514-111-2222', 'Male', '11/03/2015', 'jdfhgjdf jdfh,Pompano Beach,Quebec,Algeria,H7V 1B5'),
(4, 5, 'dsfsfs jksjdksjkd', 56566565, 'alainf971@mail.com', 'Part-Time', '555-444-5555', 'Female', '11/12/2015', 'jdfhgjdf jdfh,Pompano Beach,Quebec,Canada,H7V1B5'),
(5, 2, 'kjsadk jhj hjhjhj', 12345678, 'alainf971@mail.com', 'Full-Time', '514-111-2222', 'Male', '11/19/2015', 'jdfhgjdf jdfh,Laval,Quebec,Canada,H7V1B5'),
(6, 1, 'kdjkjfkd fjfskjfskjk', 22235656, 'alainf971@hotmail.com', 'Graduate', '555-444-5555', 'Male', '03/08/1990', 'jdfhgjdf jdfh,jkjkjk,Quebec,Canada,H7V 1B5'),
(7, 2, 'dsfsfs ffffffffff', 12345678, 'alainf971@hotmail.com', 'Graduate', '555-444-5555', 'Male', '11/11/2015', 'jdfhgjdf jdfh,Pompano Beach,Quebec,Andorra,H7V 1B5'),
(8, 2, 'kdjkjfkd ffffffffff', 56566565, 'alainf971@mail.com', 'Under Graduate', '555-444-5555', 'Female', '11/10/2015', '111 boulevard eee,Pompano Beach,Quebec,Algeria,H7V 1B5');

-- --------------------------------------------------------

--
-- Table structure for table Teaching
--

DROP TABLE IF EXISTS Teaching;
CREATE TABLE IF NOT EXISTS Teaching (
  `teachingID` int(5) NOT NULL AUTO_INCREMENT,
  `professorId` int(5) DEFAULT NULL,
  `courseId` int(5) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`teachingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table TechnicalProgramCommittee
--

DROP TABLE IF EXISTS TechnicalProgramCommittee;
CREATE TABLE IF NOT EXISTS TechnicalProgramCommittee (
  `techProgramId` int(5) NOT NULL AUTO_INCREMENT,
  `serviceId` int(5) DEFAULT NULL,
  `committeeName` varchar(25) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`techProgramId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table UnderGraduateStudent
--

DROP TABLE IF EXISTS UnderGraduateStudent;
CREATE TABLE IF NOT EXISTS UnderGraduateStudent (
  `underGraduateStudentId` int(5) NOT NULL AUTO_INCREMENT,
  `studentId` int(5) DEFAULT NULL,
  `summerStudent` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`underGraduateStudentId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table UnderGraduateStudent
--

INSERT INTO UnderGraduateStudent (underGraduateStudentId, studentId, summerStudent) VALUES
(1, 7, ''),
(2, 8, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS User;
CREATE TABLE IF NOT EXISTS `User` (
  `user_ID` int(5) NOT NULL AUTO_INCREMENT,
  `user_FIRSTNAME` varchar(50) NOT NULL,
  `user_LASTNAME` varchar(50) NOT NULL,
  `user_USERNAME` varchar(30) NOT NULL,
  `user_PASSWORD` char(255) NOT NULL,
  `user_SALT` char(128) NOT NULL,
  `user_EMAIL` varchar(70) NOT NULL,
  `user_PERMISSION` int(2) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (user_ID, user_FIRSTNAME, user_LASTNAME, user_USERNAME, user_PASSWORD, user_SALT, user_EMAIL, user_PERMISSION) VALUES
(1, 'Alain', 'ffffffffff', 'ALAIN971', '58c7026cb9aefb493ae490f62d9a90b0d1da9ba9966c26bc63f61642875e2d41', '271', 'alainf971@hotmail.com', 0),
(2, 'dsfsfs', 'jksjdksjkd', 'ALAIN972', '67a6b59b3f942fe0b4409dc1b06a92107e51d2ad6952c03eefb42fc749b8e408', 'f85', 'alainf971@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table UsesGrants
--

DROP TABLE IF EXISTS UsesGrants;
CREATE TABLE IF NOT EXISTS UsesGrants (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `grantId` int(5) DEFAULT NULL,
  `grantAmountUsed` decimal(6,2) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
