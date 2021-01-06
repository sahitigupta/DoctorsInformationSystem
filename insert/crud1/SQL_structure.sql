-- Table structure for table `location`

CREATE TABLE IF NOT EXISTS `location` (
  `loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `plot_no` varchar(50) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pin` int(15) NOT NULL,
  PRIMARY KEY (`loc_id`)
);

('42', '20th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560021),
('43', '21th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560022),
('44', '22th street Vijay Nagar', 'Bangalore', 'Karnataka', 'India', 560023),
('46', '23th street Rajaji Nagar', 'Bangalore', 'Karnataka', 'India', 560024),
('49', '24th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560025),
('123', '25th street Vijay Nagar', 'Bangalore', 'Karnataka', 'India', 560026),

-- Table structure for table `specilization`

CREATE TABLE IF NOT EXISTS `specilization` (
  `spec_id` INT(10) NOT NULL AUTO_INCREMENT,
  `spec_name` varchar(30) NOT NULL,
  PRIMARY KEY (`spec_id`)
);

-- Table structure for table `doctor`

CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` INT(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `spec_id` INT(20) DEFAULT NULL,
  `specilization_from` varchar(30) NOT NULL,
  `exp_start_date` date NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `loc_id` INT(20) NOT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `spec_id` (`spec_id`),
  KEY `loc_id` (`loc_id`)
);

-- Values into tables

INSERT INTO `doctor`(`doc_id`, `first_name`, `last_name`, `spec_id`, `specilization_from`, `exp_start_date`, `qualification`, `phone_no`, `email`, `loc_id`) VALUES 
(3001,'Aaron','Acharya',1001,'India','2004-03-05','MBBS',9876543210,'aaron@gmail.com',2001);

INSERT INTO `doctor`(`first_name`, `last_name`, `spec_id`, `specilization_from`, `exp_start_date`, `qualification`, `phone_no`, `email`, `loc_id`) VALUES 
('Abdiel', 'Agarwal', 1013, 'US','2010-10-03', 'FRCS',8647483647, 'abdiel@gmail.com', 2017),
('Abdullah', 'Agate', 1010, 'India', '1995-12-12', 'MD',9444039221, 'abdullah@gmail.com', 2019),
('Abel', 'Aggarwal', 1011, 'India', '2000-01-01', 'MPhil',6588940342, 'abel@gmail.com', 2018),
('Abraham', 'Agrawal', 1001, 'London', '1999-11-23', 'MD',9843029215, 'abraham@gmail.com', 2016),
('Devan', 'Bakshi', 1011, 'London', '2005-13-13', 'MD',8147483343, 'devan@gmail.com', 2018);

-- Table structure for table `clinic`

CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` INT(10) NOT NULL AUTO_INCREMENT,
  `clinic_name` varchar(30) NOT NULL,
  `doc_id` INT(10) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  `phone_no` INT(30) NOT NULL,
  `ratings` int(1) NOT NULL,
  `loc_id` INT(20) NOT NULL,
  PRIMARY KEY(`clinic_id`),
  KEY `doc_id` (`doc_id`),
  KEY `loc_id` (`loc_id`)
);

('Cleveland Clinic',3002, '05:00:00', '07:00:00', 'Mon-Fri', '9876234523', 8, '2018'),
('Walgreens Clinic', 3003,'05:00:00', '08:30:00', 'Fri,Sat', '6098623345', 9, '2025')

-- Table structure for table `hospital`

CREATE TABLE IF NOT EXISTS `hospital` (
  `hosp_id` INT(10) NOT NULL AUTO_INCREMENT,
  `hosp_name` varchar(30) NOT NULL,
  `phone_number` INT(20) NOT NULL,
  `website` varchar(20) DEFAULT NULL,
  `ratings` int(1) NOT NULL,
  `loc_id` INT(20) DEFAULT NULL,
  PRIMARY KEY (`hosp_id`),
  KEY `loc_id` (`loc_id`)
);

-- Table structure for table `visits`

CREATE TABLE IF NOT EXISTS `visits` (
  `doc_id` INT(10) NOT NULL,
  `hosp_id` INT(10) NOT NULL,
  `day` varchar(15) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  KEY `doc_id` (`doc_id`),
  KEY `hosp_id` (`hosp_id`)
);

-- Constraints for table `doctor`

ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`spec_id`) REFERENCES `specilization` (`spec_id`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`);

-- Constraints for table `clinic`

ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`),
  ADD CONSTRAINT `clinic_ibfk_2` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`);

-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`);

-- Constraints for table `visits`

ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`),
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`hosp_id`) REFERENCES `hospital` (`hosp_id`);
  
  
  
  
  
-- Changes made to database
ALTER TABLE `doctor` drop foreign key `doctor_ibfk_1`;
ALTER TABLE `doctor` drop foreign key `doctor_ibfk_2`;

ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`spec_id`) REFERENCES `specilization` (`spec_id`) on delete cascade,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`) on delete cascade;
  
ALTER TABLE `clinic` drop foreign key `clinic_ibfk_1`;
ALTER TABLE `clinic` drop foreign key `clinic_ibfk_2`;
  
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) on delete cascade,
  ADD CONSTRAINT `clinic_ibfk_2` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`)  on delete cascade;
  
  
ALTER TABLE `hospital` drop foreign key `hospital_ibfk_1`;


ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`) on delete cascade on update cascade;

  

ALTER TABLE `visits` drop foreign key `visits_ibfk_1`;
ALTER TABLE `visits` drop foreign key `visits_ibfk_2`;

ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) on delete cascade on update cascade,
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`hosp_id`) REFERENCES `hospital` (`hosp_id`) on delete cascade on update cascade;
  
  
  
  