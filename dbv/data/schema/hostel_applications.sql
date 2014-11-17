CREATE TABLE `hostel_applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `date_applied` timestamp NULL DEFAULT NULL,
  `action` int(11) DEFAULT '0',
  `reason` text,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1