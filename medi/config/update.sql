ALTER TABLE  `med_core2` ADD  `patient_id` INT NOT NULL AFTER  `user_id`;

ALTER TABLE  `med_admin` ADD  `google` TINYINT NOT NULL AFTER  `email`;

ALTER TABLE  `med_admin` CHANGE  `google`  `google` TINYINT( 4 ) NOT NULL DEFAULT  '0';

ALTER TABLE `med_core1` ADD `close` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `followup` ;

ALTER TABLE  `med_core2` ADD  `close` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `target` ;

ALTER TABLE  `med_core3` ADD  `patient_id` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `id` ;

ALTER TABLE  `med_core3` ADD  `close` TINYINT NOT NULL DEFAULT  '0' AFTER  `pulse2` ;


//28 nov 

ALTER TABLE  `med_admin` ADD  `sms_code` VARCHAR( 64 ) NULL AFTER  `email`;
ALTER TABLE  `med_admin` ADD  `is_sms_verified` TINYINT NOT NULL AFTER  `sms_code`;

ALTER TABLE  `med_admin` ADD  `mobile` VARCHAR( 12 ) NULL AFTER  `email`;

ALTER TABLE `med_core1` ADD `is_read` TINYINT NOT NULL DEFAULT '0' AFTER `close` ;
ALTER TABLE `med_core2` ADD `is_read` TINYINT NOT NULL DEFAULT '0' AFTER `close` ;
ALTER TABLE `med_core3` ADD `is_read` TINYINT NOT NULL DEFAULT '0' AFTER `close` ;



CREATE TABLE IF NOT EXISTS `med_patient_therapist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `med_core1_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core1_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `med_core2_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core2_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `med_core3_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core3_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


ALTER TABLE `med_recoveryvitals` ADD `is_read` TINYINT NOT NULL AFTER `pulse` ;

ALTER TABLE `med_tmed` ADD `is_read` TINYINT NOT NULL AFTER `pulse` ;

ALTER TABLE `med_wellness` ADD `is_read` TINYINT NOT NULL AFTER `pulse` ;

ALTER TABLE `med_physicalhealth` ADD `is_read` TINYINT NOT NULL AFTER `is_pain` ;

ALTER TABLE `med_forensic` ADD `is_read` TINYINT NOT NULL AFTER `pulse` ;

ALTER TABLE `med_cooccurring` ADD `is_read` TINYINT NOT NULL AFTER `pulse` ;


/* two user_id */

INSERT INTO `medi`.`med_admin` (
`id` ,
`firstname` ,
`lastname` ,
`user` ,
`access` ,
`password` ,
`email` ,
`mobile` ,
`sms_code` ,
`is_sms_verified` ,
`google`
)
VALUES (
'1', 'admin', 'admin', 'admin', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@medi.com', '9999999999', NULL , '', '0'
), (
'2', 'super', 'therapist', 'supert', 'supert', 'e10adc3949ba59abbe56e057f20f883e', 'supert@medi.com', '99999999999', NULL , '', '0'
);


UPDATE med_admin SET PASSWORD =  'e10adc3949ba59abbe56e057f20f883e';



CREATE TABLE IF NOT EXISTS `med_wrap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_social` tinyint(1) NOT NULL,
  `is_discipline` tinyint(1) NOT NULL,
  `trigger` varchar(200) NOT NULL,
  `motivator` varchar(200) NOT NULL,
  `behaviour` varchar(200) NOT NULL,
  `necessity` varchar(200) NOT NULL,
  `strategy` varchar(200) NOT NULL,
  `dimension` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2014 at 06:17 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `med_empowerment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `achievement` varchar(200) NOT NULL,
  `goal` varchar(200) NOT NULL,
  `personal_char` tinyint(1) NOT NULL,
  `other` varchar(200) NOT NULL,
  `pulse` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `med_patient_therapist` ADD `single_relation` TINYINT NOT NULL DEFAULT '1' AFTER `patient_id` ,
ADD `status` VARCHAR( 255 ) NOT NULL DEFAULT 'new' AFTER `single_relation` ;