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
  `phone_no` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `loc_id` INT(20) NOT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `spec_id` (`spec_id`),
  KEY `loc_id` (`loc_id`)
);

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
  
  
  
  