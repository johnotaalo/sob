CREATE TABLE `hostels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hostel_name_UNIQUE` (`hostel_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is a table that has all the hostels'