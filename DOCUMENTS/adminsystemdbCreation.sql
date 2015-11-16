CREATE TABLE IF NOT EXISTS Teaching (
  teachingID int(5) NOT NULL AUTO_INCREMENT,
  professorId int(5) DEFAULT NULL,
  courseId int(5) DEFAULT NULL,
  year int(5) DEFAULT NULL,
  semester varchar(15),
  PRIMARY KEY (teachingID)
); 


CREATE TABLE IF NOT EXISTS Research (
  researchId int(5) NOT NULL AUTO_INCREMENT,
  studentId int(5) DEFAULT NULL,
  grantId int(5) DEFAULT NULL,
  professorId int(5) DEFAULT NULL,
  researchName varchar(25) DEFAULT NULL,
  startDate varchar(15) NOT NULL,
  endDate varchar(15) NOT NULL,
  PRIMARY KEY (researchId)
); 


CREATE TABLE IF NOT EXISTS Grants (
  grantId int(5) NOT NULL AUTO_INCREMENT,
  studentId int(5) DEFAULT NULL,
  professorId int(5) DEFAULT NULL,
  researchId int(5) DEFAULT NULL,
  grantAmount decimal(10,2) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (grantId)
); 

CREATE TABLE IF NOT EXISTS UsesGrants(
	id int(5) NOT NULL AUTO_INCREMENT,
    grantId int(5) DEFAULT NULL,
	grantAmountUsed decimal(6,2) DEFAULT NULL,
    year int(5) DEFAULT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS Professor (
  professorId int(5) NOT NULL AUTO_INCREMENT,
  deptId int(5) DEFAULT NULL,
  courseId int(5) DEFAULT NULL,
  professorName varchar(25) DEFAULT NULL,
  professorNumber int(10) DEFAULT NULL,
  professorEmail varchar(25) DEFAULT NULL,
  PRIMARY KEY (professorId)
); 


CREATE TABLE IF NOT EXISTS Course (
  courseId int(5) NOT NULL AUTO_INCREMENT,  
  deptId int(5) DEFAULT NULL,  
  courseName varchar(15) DEFAULT NULL,
  courseNameCode int(4) DEFAULT NULL,
  PRIMARY KEY (courseId)
); 


CREATE TABLE IF NOT EXISTS Students (
  studentId int(5) NOT NULL AUTO_INCREMENT,
  deptId int(5) DEFAULT NULL,
  studentName varchar(25) DEFAULT NULL,
  studentNumber int(10) DEFAULT NULL,
  studentEmail varchar(25) DEFAULT NULL,
  studentStatus varchar(15) DEFAULT NULL,
  studentPhone varchar(15) DEFAULT NULL,
  studentGender varchar(10) DEFAULT NULL,
  studentBirthDate varchar(11) DEFAULT NULL,
  studentAdress varchar(60) DEFAULT NULL,
  PRIMARY KEY (studentId)
);  


CREATE TABLE IF NOT EXISTS GraduateStudent (
  graduateStudentId int(5) NOT NULL AUTO_INCREMENT,
  studentType varchar(15) DEFAULT NULL,
  studentLevel varchar(15) DEFAULT NULL,
  currentPosition varchar(25) DEFAULT NULL,
  PRIMARY KEY (graduateStudent)
); 

  CREATE TABLE IF NOT EXISTS UnderGraduateStudent (
  underGraduateStudentId int(5) NOT NULL AUTO_INCREMENT,
  studentId int(5) DEFAULT NULL,
  summerStudent boolean,
  PRIMARY KEY (underGraduateStudentId)
); 


CREATE TABLE IF NOT EXISTS CourseTaken (
  courseTakenId int(5) NOT NULL AUTO_INCREMENT,
  studentId int(5) DEFAULT NULL,
  courseId int(5) DEFAULT NULL,
  professorId int(5) DEFAULT NULL,
  assignments decimal(6,2) DEFAULT NULL,
  projects decimal(6,2) DEFAULT NULL,
  midterms decimal(6,2) DEFAULT NULL,
  finalExams decimal(6,2) DEFAULT NULL,
  finalLetterGrade varchar(2) DEFAULT NULL,
  PRIMARY KEY (courseTakenId)
); 


CREATE TABLE IF NOT EXISTS Review (
  reviewId int(5) NOT NULL AUTO_INCREMENT,
  serviceId int(5) DEFAULT NULL,
  journalName varchar(50) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (reviewId)
); 


CREATE TABLE IF NOT EXISTS EditorialBoard (
  boardId int(5) NOT NULL AUTO_INCREMENT,
  serviceId int(5) DEFAULT NULL,
  journalName varchar(25) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (boardId)
); 


CREATE TABLE IF NOT EXISTS Conference (
  conferenceId int(5) NOT NULL AUTO_INCREMENT,
  serviceId int(5) DEFAULT NULL,
  conferenceName varchar(25) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (conferenceId)
); 


CREATE TABLE IF NOT EXISTS TechnicalProgramCommittee (
  techProgramId int(5) NOT NULL AUTO_INCREMENT,
  serviceId int(5) DEFAULT NULL,
  committeeName varchar(25) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (techProgramId)
);


CREATE TABLE IF NOT EXISTS Department (
  deptId int(5) NOT NULL AUTO_INCREMENT,
  deptName varchar(20) DEFAULT NULL,
  deptPhone varchar(15) DEFAULT NULL,
  PRIMARY KEY (deptId)
); 


CREATE TABLE IF NOT EXISTS UsesGrants (
  usesGrantId int(5) NOT NULL AUTO_INCREMENT,
  grantId int(5) DEFAULT NULL,
  professorId int(5) DEFAULT NULL,
  studentId int(5) DEFAULT NULL,
  grantAmountUsed decimal(6,2) DEFAULT NULL,
  year int(4) DEFAULT NULL,
  PRIMARY KEY (usesGrantId)
); 


CREATE TABLE IF NOT EXISTS Grades (
  gradeId int(5) NOT NULL AUTO_INCREMENT,
  courseTakenId int(5) DEFAULT NULL,
  gradeSchemeId int(5) DEFAULT NULL,
  assignments decimal(6,2) DEFAULT NULL,
  projects decimal(6,2) DEFAULT NULL,
  midTerms decimal(6,2) DEFAULT NULL,
  finalExams decimal(6,2) DEFAULT NULL,
  finalLetterGradeId int(5) DEFAULT NULL,
  studentId int(5) DEFAULT NULL,
  PRIMARY KEY (gradeId)
); 


CREATE TABLE IF NOT EXISTS User (
  user_ID int(5) NOT NULL AUTO_INCREMENT,
  user_FIRSTNAME varchar(50) CHARACTER SET latin1 NOT NULL,
  user_LASTNAME varchar(50) CHARACTER SET latin1 NOT NULL,
  user_USERNAME varchar(30) CHARACTER SET latin1 NOT NULL,
  user_PASSWORD char(255) CHARACTER SET latin1 NOT NULL,
  user_SALT char(128) CHARACTER SET latin1 NOT NULL,
  user_EMAIL varchar(70) CHARACTER SET latin1 NOT NULL,
  user_PERMISSION int(2) NOT NULL,
  PRIMARY KEY (user_ID)
); 

CREATE TABLE IF NOT EXISTS `countries` (
  countries_id int(5) NOT NULL AUTO_INCREMENT,
  countries_name varchar(255)  DEFAULT NULL,
  countryCode char(2)  DEFAULT NULL,
  countries_iso_code_3 char(3)  DEFAULT NULL,
  address_format_id int(11)  DEFAULT NULL,
  PRIMARY KEY (countries_id)
  );

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_name`, `countryCode`, `countries_iso_code_3`, `address_format_id`) VALUES
('Canada', 'CA', 'CAD', 1),
('États Unis', 'US', 'USA', 1),
('Algeria', 'DZ', 'DZA', 1),
('American Samoa', 'AS', 'ASM', 1),
('Andorra', 'AD', 'AND', 1),
('Angola', 'AO', 'AGO', 1),
('Anguilla', 'AI', 'AIA', 1),
('Antigua and Barbuda', 'AG', 'ATG', 1),
('Argentina', 'AR', 'ARG', 1),
('Armenia', 'AM', 'ARM', 1),
('Aruba', 'AW', 'ABW', 1),
('Australia', 'AU', 'AUS', 1),
('Austria', 'AT', 'AUT', 5),
('Azerbaijan', 'AZ', 'AZE', 1),
('Bahamas', 'BS', 'BHS', 1),
('Bahrain', 'BH', 'BHR', 1),
('Bangladesh', 'BD', 'BGD', 1),
('Barbados', 'BB', 'BRB', 1),
('Belarus', 'BY', 'BLR', 1),
('Belgium', 'BE', 'BEL', 1),
('Belize', 'BZ', 'BLZ', 1),
('Benin', 'BJ', 'BEN', 1),
('Bermuda', 'BM', 'BMU', 1),
('Bhutan', 'BT', 'BTN', 1),
('Bolivia', 'BO', 'BOL', 1),
('Botswana', 'BW', 'BWA', 1),
('Bouvet Island', 'BV', 'BVT', 1),
('Brazil', 'BR', 'BRA', 1),
('Brunei Darussalam', 'BN', 'BRN', 1),
('Bulgaria', 'BG', 'BGR', 1),
('Burkina Faso', 'BF', 'BFA', 1),
('Burundi', 'BI', 'BDI', 1),
('Cambodia', 'KH', 'KHM', 1),
('Cameroon', 'CM', 'CMR', 1),
('Cape Verde', 'CV', 'CPV', 1),
('Cayman Islands', 'KY', 'CYM', 1),
('Central African Republic', 'CF', 'CAF', 1),
('Chad', 'TD', 'TCD', 1),
('Chile', 'CL', 'CHL', 1),
('Christmas Island', 'CX', 'CXR', 1),
('Cocos (Keeling) Islands', 'CC', 'CCK', 1),
('Colombia', 'CO', 'COL', 1),
('Comoros', 'KM', 'COM', 1),
('Congo', 'CG', 'COG', 1),
('Cook Islands', 'CK', 'COK', 1),
('Costa Rica', 'CR', 'CRI', 1),
('Cote D''Ivoire', 'CI', 'CIV', 1),
('Croatia', 'HR', 'HRV', 1),
('Cuba', 'CU', 'CUB', 1),
('Cyprus', 'CY', 'CYP', 1),
('Czech Republic', 'CZ', 'CZE', 1),
('Denmark', 'DK', 'DNK', 1),
('Djibouti', 'DJ', 'DJI', 1),
('Dominica', 'DM', 'DMA', 1),
('Dominican Republic', 'DO', 'DOM', 1),
('East Timor', 'TP', 'TMP', 1),
('Ecuador', 'EC', 'ECU', 1),
('Egypt', 'EG', 'EGY', 1),
('El Salvador', 'SV', 'SLV', 1),
('Equatorial Guinea', 'GQ', 'GNQ', 1),
('Eritrea', 'ER', 'ERI', 1),
('Estonia', 'EE', 'EST', 1),
('Ethiopia', 'ET', 'ETH', 1),
('Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
('Faroe Islands', 'FO', 'FRO', 1),
('Fiji', 'FJ', 'FJI', 1),
('Finland', 'FI', 'FIN', 1),
('France', 'FR', 'FRA', 1),
('French Guiana', 'GF', 'GUF', 1),
('French Polynesia', 'PF', 'PYF', 1),
('French Southern Territories', 'TF', 'ATF', 1),
('Gabon', 'GA', 'GAB', 1),
('Gambia', 'GM', 'GMB', 1),
('Georgia', 'GE', 'GEO', 1),
('Germany', 'DE', 'DEU', 5),
('Ghana', 'GH', 'GHA', 1),
('Gibraltar', 'GI', 'GIB', 1),
('Greece', 'GR', 'GRC', 1),
('Greenland', 'GL', 'GRL', 1),
('Grenada', 'GD', 'GRD', 1),
('Guadeloupe', 'GP', 'GLP', 1),
('Guam', 'GU', 'GUM', 1),
('Guatemala', 'GT', 'GTM', 1),
('Guinea', 'GN', 'GIN', 1),
('Guinea-bissau', 'GW', 'GNB', 1),
('Guyana', 'GY', 'GUY', 1),
('Haiti', 'HT', 'HTI', 1),
('Heard and Mc Donald Islands', 'HM', 'HMD', 1),
('Honduras', 'HN', 'HND', 1),
('Hong Kong', 'HK', 'HKG', 1),
('Hungary', 'HU', 'HUN', 1),
('Iceland', 'IS', 'ISL', 1),
('India', 'IN', 'IND', 1),
('Indonesia', 'ID', 'IDN', 1),
('Iraq', 'IQ', 'IRQ', 1),
('Ireland', 'IE', 'IRL', 1),
('Israel', 'IL', 'ISR', 1),
('Italy', 'IT', 'ITA', 1),
('Jamaica', 'JM', 'JAM', 1),
('Japan', 'JP', 'JPN', 1),
('Jordan', 'JO', 'JOR', 1),
('Kazakhstan', 'KZ', 'KAZ', 1),
('Kenya', 'KE', 'KEN', 1),
('Kiribati', 'KI', 'KIR', 1),
('Kuwait', 'KW', 'KWT', 1),
('Kyrgyzstan', 'KG', 'KGZ', 1),
('Latvia', 'LV', 'LVA', 1),
('Lebanon', 'LB', 'LBN', 1),
('Lesotho', 'LS', 'LSO', 1),
('Liberia', 'LR', 'LBR', 1),
('Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
('Liechtenstein', 'LI', 'LIE', 1),
('Lithuania', 'LT', 'LTU', 1),
('Luxembourg', 'LU', 'LUX', 1),
('Macau', 'MO', 'MAC', 1),
('Madagascar', 'MG', 'MDG', 1),
('Malawi', 'MW', 'MWI', 1),
('Malaysia', 'MY', 'MYS', 1),
('Maldives', 'MV', 'MDV', 1),
('Mali', 'ML', 'MLI', 1),
('Malta', 'MT', 'MLT', 1),
('Marshall Islands', 'MH', 'MHL', 1),
('Martinique', 'MQ', 'MTQ', 1),
('Mauritania', 'MR', 'MRT', 1),
('Mauritius', 'MU', 'MUS', 1),
('Mayotte', 'YT', 'MYT', 1),
('Mexico', 'MX', 'MEX', 1),
('Moldova, Republic of', 'MD', 'MDA', 1),
('Monaco', 'MC', 'MCO', 1),
('Mongolia', 'MN', 'MNG', 1),
('Montserrat', 'MS', 'MSR', 1),
('Morocco', 'MA', 'MAR', 1),
('Mozambique', 'MZ', 'MOZ', 1),
('Myanmar', 'MM', 'MMR', 1),
('Namibia', 'NA', 'NAM', 1),
('Nauru', 'NR', 'NRU', 1),
('Nepal', 'NP', 'NPL', 1),
('Netherlands', 'NL', 'NLD', 1),
('Netherlands Antilles', 'AN', 'ANT', 1),
('New Caledonia', 'NC', 'NCL', 1),
('New Zealand', 'NZ', 'NZL', 1),
('Nicaragua', 'NI', 'NIC', 1),
('Niger', 'NE', 'NER', 1),
('Nigeria', 'NG', 'NGA', 1),
('Niue', 'NU', 'NIU', 1),
('Norfolk Island', 'NF', 'NFK', 1),
('Northern Mariana Islands', 'MP', 'MNP', 1),
('Norway', 'NO', 'NOR', 1),
('Oman', 'OM', 'OMN', 1),
('Pakistan', 'PK', 'PAK', 1),
('Palau', 'PW', 'PLW', 1),
('Panama', 'PA', 'PAN', 1),
('Papua New Guinea', 'PG', 'PNG', 1),
('Paraguay', 'PY', 'PRY', 1),
('Peru', 'PE', 'PER', 1),
('Philippines', 'PH', 'PHL', 1),
('Pitcairn', 'PN', 'PCN', 1),
('Poland', 'PL', 'POL', 1),
('Portugal', 'PT', 'PRT', 1),
('Puerto Rico', 'PR', 'PRI', 1),
('Qatar', 'QA', 'QAT', 1),
('Reunion', 'RE', 'REU', 1),
('Romania', 'RO', 'ROM', 1),
('Rwanda', 'RW', 'RWA', 1),
('Saint Kitts and Nevis', 'KN', 'KNA', 1),
('Saint Lucia', 'LC', 'LCA', 1),
('Saint Vincent and Grenadines', 'VC', 'VCT', 1),
('Samoa', 'WS', 'WSM', 1),
('San Marino', 'SM', 'SMR', 1),
('Sao Tome and Principe', 'ST', 'STP', 1),
('Saudi Arabia', 'SA', 'SAU', 1),
('Senegal', 'SN', 'SEN', 1),
('Seychelles', 'SC', 'SYC', 1),
('Sierra Leone', 'SL', 'SLE', 1),
('Singapore', 'SG', 'SGP', 4),
('Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
('Slovenia', 'SI', 'SVN', 1),
('Solomon Islands', 'SB', 'SLB', 1),
('Somalia', 'SO', 'SOM', 1),
('South Africa', 'ZA', 'ZAF', 1),
('Spain', 'ES', 'ESP', 3),
('Sri Lanka', 'LK', 'LKA', 1),
('St. Helena', 'SH', 'SHN', 1),
('St. Pierre and Miquelon', 'PM', 'SPM', 1),
('Sudan', 'SD', 'SDN', 1),
('Suriname', 'SR', 'SUR', 1),
('Swaziland', 'SZ', 'SWZ', 1),
('Sweden', 'SE', 'SWE', 1),
('Switzerland', 'CH', 'CHE', 1),
('Taiwan', 'TW', 'TWN', 1),
('Tajikistan', 'TJ', 'TJK', 1),
('Thailand', 'TH', 'THA', 1),
('Togo', 'TG', 'TGO', 1),
('Tokelau', 'TK', 'TKL', 1),
('Tonga', 'TO', 'TON', 1),
('Tunisia', 'TN', 'TUN', 1),
('Turkey', 'TR', 'TUR', 1),
('Turkmenistan', 'TM', 'TKM', 1),
('Turks and Caicos Islands', 'TC', 'TCA', 1),
('Tuvalu', 'TV', 'TUV', 1),
('Uganda', 'UG', 'UGA', 1),
('Ukraine', 'UA', 'UKR', 1),
('United Arab Emirates', 'AE', 'ARE', 1),
('United Kingdom', 'GB', 'GBR', 1),
('Uruguay', 'UY', 'URY', 1),
('Uzbekistan', 'UZ', 'UZB', 1),
('Vanuatu', 'VU', 'VUT', 1),
('Vatican City State (Holy See)', 'VA', 'VAT', 1),
('Venezuela', 'VE', 'VEN', 1),
('Viet Nam', 'VN', 'VNM', 1),
('Virgin Islands (British)', 'VG', 'VGB', 1),
('Virgin Islands (U.S.)', 'VI', 'VIR', 1),
('Wallis and Futuna Islands', 'WF', 'WLF', 1),
('Western Sahara', 'EH', 'ESH', 1),
('Yemen', 'YE', 'YEM', 1),
('Yugoslavia', 'YU', 'YUG', 1),
('Zaire', 'ZR', 'ZAR', 1),
('Zambia', 'ZM', 'ZMB', 1),
('Zimbabwe', 'ZW', 'ZWE', 1);