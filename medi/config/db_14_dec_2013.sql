-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2013 at 07:38 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `med_admin`
--

CREATE TABLE IF NOT EXISTS `med_admin` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `firstname` varchar(32) default NULL,
  `lastname` varchar(32) default NULL,
  `user` varchar(128) NOT NULL,
  `access` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(14) default NULL,
  `sms_code` varchar(64) default NULL,
  `is_sms_verified` tinyint(4) NOT NULL,
  `google` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `med_admin`
--

INSERT INTO `med_admin` (`id`, `firstname`, `lastname`, `user`, `access`, `password`, `email`, `mobile`, `sms_code`, `is_sms_verified`, `google`) VALUES
(5, 'ponga', 'pandit', 'TMED-EDDIE', 'Therapists', 'e10adc3949ba59abbe56e057f20f883e', 'jitendra.naina@yahoo.com', NULL, NULL, 0, 0),
(6, 'loda', 'lehsun', 'TMED-JESS', 'Therapists', 'e10adc3949ba59abbe56e057f20f883e', 'jitendra.thakur2008@gmail.com', '+91971348591', 'thyk', 1, 1),
(7, 'Tom', 'Campion', 'TMEDTOM', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.com', '8878655465', 'zl8h', 1, 0),
(8, 'John', 'A', 'TMED-JOHN1', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'bolly@wood.com', '9981365906', '78zj', 0, 0),
(9, 'Johny', 'A', 'TMED-JOHN2', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'abc@test.com', '65465565', NULL, 0, 0),
(25, 'chole', 'chole', 'chole', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'chole@chole.com', '98988988', NULL, 0, 0),
(1, 'admin', 'admin', 'admin', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@medi.com', '9999999999', NULL, 0, 0),
(2, 'super', 'therapist', 'supert', 'supert', 'e10adc3949ba59abbe56e057f20f883e', 'supert@medi.com', '99999999999', '5p6u', 1, 0),
(26, 'test', 'test', 'test', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'tetst', '989898989', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `med_cooccurring`
--

CREATE TABLE IF NOT EXISTS `med_cooccurring` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `is_drug` varchar(8) default NULL,
  `is_drug_week` varchar(8) default NULL,
  `is_alcohol` varchar(8) default NULL,
  `is_alcohol_week` varchar(8) default NULL,
  `is_alcohol_friend` varchar(8) default NULL,
  `is_alcohol_family` varchar(8) default NULL,
  `is_cravings` varchar(8) default NULL,
  `is_dreams` varchar(8) default NULL,
  `is_triggers` varchar(8) default NULL,
  `is_plans` varchar(8) default NULL,
  `last_alcohol` varchar(50) default NULL,
  `last_drugs` varchar(50) default NULL,
  `pulse` text,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_cooccurring`
--

INSERT INTO `med_cooccurring` (`id`, `user_id`, `is_drug`, `is_drug_week`, `is_alcohol`, `is_alcohol_week`, `is_alcohol_friend`, `is_alcohol_family`, `is_cravings`, `is_dreams`, `is_triggers`, `is_plans`, `last_alcohol`, `last_drugs`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'No', 'No', 'Yes', 'No', 'Yes', '', '', '', '', '', '31-90 Days', '91-180 Days', 'TESTTTTTTSSSS', 0, '2013-09-17 05:41:59'),
(3, '7', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '', '31-90 Days', '0-30 Days', 'MAMAMMAMAMAM', 1, '2013-09-29 20:47:38'),
(4, '7', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', '91-180 Days', '91-180 Days', 'test', 1, '2013-12-02 22:40:51'),
(5, '7', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', '91-180 Days', '91-180 Days', 'test', 1, '2013-12-02 22:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `med_core1`
--

CREATE TABLE IF NOT EXISTS `med_core1` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `patient_id` int(11) NOT NULL,
  `coredate` varchar(100) default NULL,
  `starttime` varchar(100) default NULL,
  `endtime` varchar(100) default NULL,
  `goal` varchar(20) default NULL,
  `fif` varchar(25) default NULL,
  `visit` text,
  `followup` text,
  `close` tinyint(1) NOT NULL default '0',
  `is_read` tinyint(4) NOT NULL default '0',
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `med_core1`
--

INSERT INTO `med_core1` (`id`, `user_id`, `patient_id`, `coredate`, `starttime`, `endtime`, `goal`, `fif`, `visit`, `followup`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'AAA loda test', 'AAAA there jitz viks', 1, 1, '2013-09-20 09:25:00'),
(2, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 1', 'Vocational', 'hello', 'good lapaka', 1, 1, '2013-11-05 08:46:23'),
(4, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'AAA', 'AAAA there ', 1, 1, '2013-11-13 11:43:46'),
(3, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 2', 'Education', 'fine', 'god', 1, 1, '2013-11-05 20:23:15'),
(5, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'shubhi', 'AAAA there ', 0, 1, '2013-11-13 12:02:44'),
(9, '6', 7, '11/13/2013', '9:00', '21:00', 'Goal 2', 'Education', 'test', 'test', 0, 1, '2013-11-29 00:01:52'),
(10, '6', 7, '11/20/2013', '8:05', '22:05', 'Goal 2', 'Education', 'test jitz', 'test jitz222', 0, 1, '2013-11-29 00:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `med_core1_reply`
--

CREATE TABLE IF NOT EXISTS `med_core1_reply` (
  `id` int(11) NOT NULL auto_increment,
  `patient_id` int(11) NOT NULL,
  `core1_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `med_core1_reply`
--

INSERT INTO `med_core1_reply` (`id`, `patient_id`, `core1_id`, `comment`, `created`) VALUES
(1, 7, 1, 'gfdgdfg dasfadasd sdsad', '0000-00-00 00:00:00'),
(2, 7, 5, 'sds sd sds sds d', '0000-00-00 00:00:00'),
(3, 7, 1, 'fgdfgdf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `med_core2`
--

CREATE TABLE IF NOT EXISTS `med_core2` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `patient_id` int(11) NOT NULL,
  `coredate` varchar(100) default NULL,
  `renewal` varchar(100) default NULL,
  `plan` varchar(100) default NULL,
  `goal` text,
  `step1` text,
  `step2` text,
  `step3` text,
  `target` text,
  `close` tinyint(1) NOT NULL default '0',
  `is_read` tinyint(4) NOT NULL default '0',
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `med_core2`
--

INSERT INTO `med_core2` (`id`, `user_id`, `patient_id`, `coredate`, `renewal`, `plan`, `goal`, `step1`, `step2`, `step3`, `target`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, '5', 7, '2/16/13', '1"13', 'GRESTTT', NULL, 'HEY YOU', 'HEY YOU', 'HEY YOU', 'asfsdfs df', 0, 1, '2013-09-20 09:46:51'),
(2, '6', 7, '09-09-09', '09-09-09', 'test', NULL, 'test', 'test', 'test', 'test', 1, 1, '2013-11-06 10:58:18'),
(3, '24', 7, '09-09-09', '09-09-09', 'test', NULL, 'test', 'test', 'test', 'test jitz', 1, 1, '2013-11-24 21:59:50'),
(4, '24', 7, '09-09-09', '09-09-09', 'test', NULL, 'test', 'test', 'test', 'test jitz vixs', 0, 1, '2013-11-24 22:07:40'),
(5, '24', 7, '09-09-09', '09-09-09', 'test', NULL, 'test', 'test', 'test', 'testmeenal', 0, 1, '2013-11-24 22:08:57'),
(6, '6', 7, '11/13/2013', '11/13/2013', 'test', NULL, 'test', 'test', 'test', 'teshsggshj', 0, 1, '2013-11-29 00:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `med_core2_reply`
--

CREATE TABLE IF NOT EXISTS `med_core2_reply` (
  `id` int(11) NOT NULL auto_increment,
  `patient_id` int(11) NOT NULL,
  `core2_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `med_core2_reply`
--

INSERT INTO `med_core2_reply` (`id`, `patient_id`, `core2_id`, `comment`, `created`) VALUES
(1, 7, 3, 'sds sd sds sds d aasasa ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `med_core3`
--

CREATE TABLE IF NOT EXISTS `med_core3` (
  `id` int(16) NOT NULL auto_increment,
  `patient_id` tinyint(1) NOT NULL default '0',
  `user_id` varchar(16) default NULL,
  `zip` varchar(6) default NULL,
  `identify` varchar(250) default NULL,
  `is_present` varchar(100) default NULL,
  `is_service` varchar(8) default NULL,
  `pulse` text,
  `relatiopnship` varchar(250) default NULL,
  `supporter` varchar(250) default NULL,
  `visits` varchar(250) default NULL,
  `medicine` varchar(250) default NULL,
  `concentration` varchar(250) default NULL,
  `pulse2` text,
  `close` tinyint(4) NOT NULL default '0',
  `is_read` tinyint(4) NOT NULL default '0',
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `med_core3`
--

INSERT INTO `med_core3` (`id`, `patient_id`, `user_id`, `zip`, `identify`, `is_present`, `is_service`, `pulse`, `relatiopnship`, `supporter`, `visits`, `medicine`, `concentration`, `pulse2`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, 1, '5', '18252', 'Integrity,Enthusiasm,Humility,Courage,Responsibility,', 'No', 'Yes', 'thiiiiiiiissss is a TESTTTTTTTTTT(@(@(@(#))#)#)_@_', 'Phase III Development', 'Shared Acceptance', 'Office,Retreat,Probation/Parole Office,Home,Wellness Trips,', 'Phase III', 'Social', 'test 12222i3i3i3i3i3ijf', 0, 0, '2013-09-20 10:52:19'),
(2, 7, '6', '17922', 'Enthusiasm,Humility,', 'Yes', 'Yes', 'test', 'Phase II Connection', 'Active Listening', 'Office,Probation/Parole Office,Home,', 'Phase II', 'Vocational', 'test jitz', 1, 1, '2013-11-06 11:44:15'),
(9, 7, '6', '17933', 'Integrity,Humility,Courage,Consistency,', 'Yes', 'Yes', 'jitz', 'Phase II Connection', 'Shared Disclosure', 'Office,Retreat,Probation/Parole Office,Wellness Trips,', 'Phase II', 'Vocational', 'jitz', 0, 1, '2013-11-29 00:32:56'),
(8, 7, '6', '17933', NULL, 'Yes', 'Yes', 'test', 'Phase III Development', 'Shared Disclosure', 'Office,Retreat,Probation/Parole Office,Wellness Trips,', 'Phase II', 'Vocational', 'test', 0, 1, '2013-11-29 00:25:09'),
(7, 8, '6', '17922', NULL, 'Yes', 'Yes', '', 'Phase IV Emancipation', 'Empathy', 'Office,Retreat,Probation/Parole Office,Wellness Trips,-------------,', 'Phase II', 'Social', 'jitz', 0, 0, '2013-11-26 23:59:06'),
(10, 7, '6', '17922', 'Integrity,Humility,Consistency,Responsibility,', 'Yes', 'Yes', 'csdfdf dd fd', 'Phase II Connection', 'Empathy', 'Office,Probation/Parole Office,Wellness Trips,', 'Phase II', 'Vocational', 'asdas', 0, 1, '2013-11-29 00:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `med_core3_reply`
--

CREATE TABLE IF NOT EXISTS `med_core3_reply` (
  `id` int(11) NOT NULL auto_increment,
  `patient_id` int(11) NOT NULL,
  `core3_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `med_core3_reply`
--


-- --------------------------------------------------------

--
-- Table structure for table `med_forensic`
--

CREATE TABLE IF NOT EXISTS `med_forensic` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `is_parole` varchar(8) default NULL,
  `is_month` varchar(8) default NULL,
  `is_charge` varchar(8) default NULL,
  `is_fines` varchar(8) default NULL,
  `is_week` varchar(8) default NULL,
  `is_residence` varchar(8) default NULL,
  `is_criminal` varchar(8) default NULL,
  `is_friends` varchar(8) default NULL,
  `is_family` varchar(8) default NULL,
  `is_volunteer` varchar(8) default NULL,
  `arrest` varchar(50) default NULL,
  `incarceration` varchar(50) default NULL,
  `pulse` text,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_forensic`
--

INSERT INTO `med_forensic` (`id`, `user_id`, `is_parole`, `is_month`, `is_charge`, `is_fines`, `is_week`, `is_residence`, `is_criminal`, `is_friends`, `is_family`, `is_volunteer`, `arrest`, `incarceration`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Yes', 'No', 'Yes', '', '31-90 Days', 'phil Leshhhhhhhhhhhhhhhhhhhhhhhh', 0, '2013-09-17 03:40:16'),
(2, '7', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', '91-180 Days', '31-90 Days', 'ttttttttttttttttttttaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2013-09-29 20:45:00'),
(3, '7', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', '31-90 Days', '31-90 Days', 'wow', 1, '2013-11-19 11:22:48'),
(4, '7', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', '31-90 Days', '31-90 Days', 'tets', 1, '2013-12-02 22:39:14'),
(5, '7', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', '31-90 Days', '31-90 Days', 'tets', 1, '2013-12-02 22:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `med_patient_therapist`
--

CREATE TABLE IF NOT EXISTS `med_patient_therapist` (
  `id` int(11) NOT NULL auto_increment,
  `therapist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `med_patient_therapist`
--

INSERT INTO `med_patient_therapist` (`id`, `therapist_id`, `patient_id`, `created`, `modified`) VALUES
(1, 6, 7, '2013-12-03 11:29:31', '2013-12-03 11:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `med_physicalhealth`
--

CREATE TABLE IF NOT EXISTS `med_physicalhealth` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `treatment` varchar(300) default NULL,
  `is_std` varchar(8) default NULL,
  `is_physical` text,
  `is_hearing` varchar(8) default NULL,
  `is_provider` varchar(8) default NULL,
  `is_treatment` varchar(8) default NULL,
  `is_meds` varchar(8) default NULL,
  `is_counter` varchar(8) default NULL,
  `is_remedies` varchar(8) default NULL,
  `is_weight` varchar(8) default NULL,
  `is_happy` varchar(8) default NULL,
  `is_pain` varchar(8) default NULL,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_physicalhealth`
--

INSERT INTO `med_physicalhealth` (`id`, `user_id`, `treatment`, `is_std`, `is_physical`, `is_hearing`, `is_provider`, `is_treatment`, `is_meds`, `is_counter`, `is_remedies`, `is_weight`, `is_happy`, `is_pain`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'High Blood Pressure,Other,', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '', '', '', 'No', 0, '2013-09-17 17:48:43'),
(2, '7', 'Diabetes,High Cholesterol,Epilepsy,', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'No', 1, '2013-12-09 13:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `med_recoveryvitals`
--

CREATE TABLE IF NOT EXISTS `med_recoveryvitals` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `is_sleep` varchar(8) default NULL,
  `is_healthy` varchar(8) default NULL,
  `is_excersise` text,
  `is_meditation` varchar(8) default NULL,
  `is_spirituality` varchar(8) default NULL,
  `is_groups` varchar(8) default NULL,
  `is_community` varchar(8) default NULL,
  `is_family` varchar(8) default NULL,
  `is_enjoy` varchar(8) default NULL,
  `is_religion` varchar(8) default NULL,
  `is_recovery` varchar(8) default NULL,
  `is_life` varchar(8) default NULL,
  `pulse` text,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_recoveryvitals`
--

INSERT INTO `med_recoveryvitals` (`id`, `user_id`, `is_sleep`, `is_healthy`, `is_excersise`, `is_meditation`, `is_spirituality`, `is_groups`, `is_community`, `is_family`, `is_enjoy`, `is_religion`, `is_recovery`, `is_life`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', '', '', '', 'Yes', '', 'No', 'dsdsd', 0, '2013-09-18 01:37:32'),
(2, '7', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'sdfdsfsd', 1, '2013-12-09 13:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `med_routes`
--

CREATE TABLE IF NOT EXISTS `med_routes` (
  `id` int(11) NOT NULL auto_increment,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `med_routes`
--


-- --------------------------------------------------------

--
-- Table structure for table `med_sessions`
--

CREATE TABLE IF NOT EXISTS `med_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) default NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `med_sessions`
--

INSERT INTO `med_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('05efddc3851386b159753f4a41e529d3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1374734978, ''),
('5e02a7f4b1ff8e5ee891a46e02f4ebf3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1374734978, '');

-- --------------------------------------------------------

--
-- Table structure for table `med_tmed`
--

CREATE TABLE IF NOT EXISTS `med_tmed` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `is_medicine` varchar(8) default NULL,
  `is_psychiatric` varchar(8) default NULL,
  `category` varchar(300) default NULL,
  `is_question_medicine` varchar(8) default NULL,
  `is_question_psychiatric` varchar(8) default NULL,
  `pulse` text,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_tmed`
--

INSERT INTO `med_tmed` (`id`, `user_id`, `is_medicine`, `is_psychiatric`, `category`, `is_question_medicine`, `is_question_psychiatric`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'No', 'Physical Activity,Social Development,', 'Yes', 'No', 'GOOOOOOOOO COWBOYSSSSSSSSSSSSSSS', 0, '2013-09-21 23:22:28'),
(2, '7', 'No', 'Yes', 'Cultural,Educational,Inter-Active,', 'No', 'Yes', 'teszt', 1, '2013-12-09 13:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `med_wellness`
--

CREATE TABLE IF NOT EXISTS `med_wellness` (
  `id` int(16) NOT NULL auto_increment,
  `user_id` varchar(16) default NULL,
  `feel` varchar(200) default NULL,
  `wellness` varchar(200) default NULL,
  `apply` text,
  `hospitalization` varchar(200) default NULL,
  `crisis` varchar(200) default NULL,
  `pulse` text,
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `med_wellness`
--

INSERT INTO `med_wellness` (`id`, `user_id`, `feel`, `wellness`, `apply`, `hospitalization`, `crisis`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Bad', NULL, 'Hallucinating,Anxious,Lonely,Hearing Voices,Angry/Irritable,Thinking of Self-Harm,', '31-90 Days', '0-30 Days', 'gagagagageeewef', 0, '2013-09-29 08:48:00'),
(7, '7', 'Good', NULL, 'Manic or  Hyper,Depressed,Anxious,Angry/Irritable,Thinking of Self-Harm,', '181-360 Days', '31-90 Days', 'aaaaaaaaaaaaaaaaaaaaaa jitz', 1, '2013-12-09 13:01:25'),
(8, '7', 'Good', NULL, 'Depressed,Angry/Irritable,', '31-90 Days', '31-90 Days', 'test', 1, '2013-12-09 13:01:25'),
(9, '7', 'Excellent', 'Yes', 'Depressed,Lonely,', '91-180 Days', '91-180 Days', 'wow', 1, '2013-12-09 13:01:25'),
(10, '7', 'Not Sure', 'No', 'Manic or  Hyper,Anxious,Hearing Voices,Angry/Irritable,', '31-90 Days', '91-180 Days', 'vbvcbvcb', 1, '2013-12-09 13:01:25'),
(11, '7', 'Not Sure', 'No', 'Manic or  Hyper,Anxious,Hearing Voices,Angry/Irritable,', '31-90 Days', '91-180 Days', 'vbvcbvcb', 1, '2013-12-09 13:01:25'),
(12, '7', 'Excellent', 'Yes', 'Depressed,Hallucinating,Anxious,Hearing Voices,', '0-30 Days', '0-30 Days', 'test', 1, '2013-12-09 13:01:25'),
(13, '7', 'Excellent', 'Yes', 'Depressed,Hallucinating,Anxious,Hearing Voices,', '0-30 Days', '0-30 Days', 'test', 1, '2013-12-09 13:01:25'),
(14, '7', 'Excellent', 'Yes', 'Depressed,Hallucinating,Anxious,Hearing Voices,', '0-30 Days', '0-30 Days', 'test', 1, '2013-12-09 13:01:25'),
(15, '7', 'Not Sure', 'Yes', 'Depressed,Anxious,Lonely,Angry/Irritable,Thinking of Self-Harm,', '0-30 Days', '0-30 Days', 'I love you darling', 1, '2013-12-09 13:01:25'),
(16, '7', 'Not Sure', 'Yes', 'Anxious,Hearing Voices,', '31-90 Days', '91-180 Days', 'hi darling', 1, '2013-12-09 13:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(70) default NULL,
  `oauth_uid` int(11) default NULL,
  `oauth_provider` varchar(100) default NULL,
  `username` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `username`) VALUES
(1, 'jitendra.thakur2008@gmail.com', 0, 'Google', 'jitendrathakur');
