-- table structure for table `location`

create table if not exists `location` (
  `loc_id` int(10) not null auto_increment,
  `plot_no` varchar(50) default null,
  `street` varchar(50) not null,
  `city` varchar(20) not null,
  `state` varchar(20) not null,
  `country` varchar(20) not null,
  `pin` int(10) not null,
  primary key (`loc_id`)
);

INSERT INTO `location` (`loc_id`, `plot_no`, `street`, `city`, `state`, `country`, `pin`) VALUES
(1001,'42', '20th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560021),
(1002,'43', '21th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560022),
(1003,'44', '22th street Vijay Nagar', 'Bangalore', 'Karnataka', 'India', 560023),
(1004,'46', '23th street Rajaji Nagar', 'Bangalore', 'Karnataka', 'India', 560024),
(1005,'49', '24th street Shivaji Nagar', 'Bangalore', 'Karnataka', 'India', 560025),
(1006,'23', '2nd street Jaya Nagar', 'Bangalore', 'Karnataka', 'India', 560046);

-- table structure for table `specilization`

create table if not exists `specilization` (
  `spec_id` int(10) not null auto_increment,
  `spec_name` varchar(30) not null,
  primary key (`spec_id`)
);

INSERT INTO `specilization` (`spec_id`, `spec_name`) VALUES
(2001, 'Audiologist'),
(2002, 'Cardiologist'),
(2003, 'Dentist'),
(2004, 'ENT Specialist'),
(2005, 'Orthopedic '),
(2006, 'Surgeon ');


-- table structure for table `doctor`

create table if not exists `doctor` (
  `doc_id` int(10) not null auto_increment,
  `first_name` varchar(20) not null,
  `last_name` varchar(20) not null,
  `spec_id` int(20) default null,
  `specilization_from` varchar(30) not null,
  `exp_start_date` date not null,
  `qualification` varchar(30) not null,
  `phone_no` bigint(10) not null,
  `email` varchar(30) not null,
  `loc_id` int(20) not null,
  primary key (`doc_id`),
  constraint `doctor_ibfk_1` foreign key (`spec_id`) references `specilization` (`spec_id`) on delete cascade,
  constraint `doctor_ibfk_2` foreign key (`loc_id`) references `location` (`loc_id`) on delete cascade
);

INSERT INTO `doctor` (`doc_id`,`first_name`,`last_name`,`spec_id`,`specilization_from`,`exp_start_date`,`qualification`,`phone_no`,`email`,`loc_id`) VALUES 
(3001,'Aaron','Acharya',2003,'India','2004-03-05','MBBS',9876543210,'aaronachrya@gmail.com',1001),
(3002,'Aaron', 'Agarwal', 2005, 'US','2010-10-03', 'FRCS',8647483647, 'agarwalaaron@gmail.com', 1006),
(3003,'Abdullah', 'Wasim', 2004, 'India', '1995-12-12', 'MD',9444039221, 'abdullahw@gmail.com', 1003),
(3004,'Abel', 'Sinha', 2006, 'India', '2000-01-01', 'MPhil',6588940342, 'abel@gmail.com', 1005),
(3005,'Bakshi', 'Joshi', 2001, 'London', '1999-11-23', 'MD',9843029215, 'bakjoshi@gmail.com', 1004),
(3006,'Devan', 'Prakash', 2004, 'London', '2005-12-13', 'MD',8147483343, 'devan@gmail.com', 1002);


-- table structure for table `clinic`

create table if not exists `clinic` (
  `clinic_id` int(10) not null auto_increment,
  `clinic_name` varchar(30) not null,
  `doc_id` int(10) not null,
  `from_time` time not null,
  `to_time` time not null,
  `day` varchar(100) not null,
  `phone_no` bigint(10) not null,
  `ratings` int(1) not null,
  `loc_id` int(20) not null,
  primary key(`clinic_id`),
  constraint `clinic_ibfk_1` foreign key (`doc_id`) references `doctor` (`doc_id`) on delete cascade,
  constraint `clinic_ibfk_2` foreign key (`loc_id`) references `location` (`loc_id`)  on delete cascade
);

INSERT INTO `clinic` (`clinic_id`, `clinic_name`,`doc_id`,`from_time`, `to_time`, `day`, `phone_no`, `ratings`, `loc_id`) VALUES
(4001, 'Mayo Clinic', 3002,'08:30:00', '18:00:00', 'Mon-Thur', 9857743463, 4, 1002),
(4002,'Cleveland Clinic',3004, '09:00:00', '19:00:00', 'Mon-Fri', 9876234523, 5, 1003),
(4003,'Walgreens Clinic', 3003,'08:00:00', '15:30:00', 'Fri,Sat', 6098623345, 3, 1005),
(4004,'Vijaya Clinic', 3005,'06:00:00', '20:00:00', 'Mon-Sat', 7183050294, 5, 1004),
(4005,'AMS Clinic', 3001,'09:30:00', '18:30:00', 'Mon-Fri', 7183060295, 2, 1001),
(4006,'Apex Clinic & Research Center',3006, '06:00:00', '20:30:00', 'Mon-Sat', 7129430938, 4, 1006);


-- table structure for table `hospital`

create table if not exists `hospital` (
  `hosp_id` int(10) not null auto_increment,
  `hosp_name` varchar(30) not null,
  `phone_number` bigint(10) not null,
  `website` varchar(30) default null,
  `ratings` int(1) not null,
  `total_doctors` int(10) not null default 0,
  `loc_id` int(20) default null,
  primary key (`hosp_id`),
  constraint `hospital_ibfk_1` foreign key (`loc_id`) references `location` (`loc_id`) on delete cascade on update cascade
);

INSERT INTO `hospital` (`hosp_id`, `hosp_name`, `phone_number`, `website`, `ratings`, `loc_id`) VALUES
(5001, 'Amrutha Hospital', 8490392884, 'amruthahospital .com', 3, 1002),
(5002, 'A M Hospital', 9338290123, 'amhospital.com', 4, 1001),
(5003, 'A V Hospital  ', 7786904374, 'avhospital.com', 4, 1005),
(5004, 'Abhaya Eye Hospital', 6859004938, 'abhayaeyehospital.com', 5, 1003),
(5005, 'Apollo Hospital', 5568940596, 'apollohospital.com', 4, 1006),
(5006, 'Sunshine Hospital', 9960874655, 'sunshinehospital.com', 3, 1004);


-- table structure for table `visits`

create table if not exists `visits` (
  `visit_id` int(10) not null primary key auto_increment,
  `doc_id` int(10) not null,
  `hosp_id` int(10) not null,
  `day` varchar(15) not null,
  `from_time` time not null,
  `to_time` time not null,
  constraint `visits_ibfk_1` foreign key (`doc_id`) references `doctor` (`doc_id`) on delete cascade on update cascade,
  constraint `visits_ibfk_2` foreign key (`hosp_id`) references `hospital` (`hosp_id`) on delete cascade on update cascade
);
  
insert into `visits` (`doc_id`, `hosp_id`, `day`, `from_time`, `to_time`) VALUES
(3001, 5001, 'Mon-Fri', '10:00:00', '16:00:00'),
(3002, 5003, 'Mon-Thur', '09:00:00', '17:00:00'),
(3003, 5002, 'Sat,Sun', '17:00:00', '21:00:00'),
(3004, 5002, 'Mon-Fri', '10:00:00', '18:30:00'),
(3005, 5005, 'Mon-Fri', '09:00:00', '17:00:00'),
(3003, 5006, 'Mon-Fri', '09:30:00', '16:00:00');




