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


CREATE TABLE IF NOT EXISTS Student (
  studentId int(5) NOT NULL AUTO_INCREMENT,
  deptId int(5) DEFAULT NULL,
  studentName varchar(25) DEFAULT NULL,
  studentNumber int(10) DEFAULT NULL,
  studentEmail varchar(25) DEFAULT NULL,
  studentStatus varchar(15) DEFAULT NULL,
  studentPhone varchar(15) DEFAULT NULL,
  studentGender varchar(10) DEFAULT NULL,
  studentBirthDate date DEFAULT NULL,
  studentAdress varchar(60)DEFAULT NULL ,
  PRIMARY KEY (studentId)
); 


CREATE TABLE IF NOT EXISTS GraduateStudent (
  graduateStudent int(5) NOT NULL AUTO_INCREMENT,
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
  deptPhone varchar(10) DEFAULT NULL,
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