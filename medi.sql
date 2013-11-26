-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 11:58 PM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `med_admin`
--

CREATE TABLE IF NOT EXISTS `med_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `user` varchar(128) NOT NULL,
  `access` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `google` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `med_admin`
--

INSERT INTO `med_admin` (`id`, `firstname`, `lastname`, `user`, `access`, `password`, `email`, `google`) VALUES
(5, NULL, NULL, 'TMED-EDDIE', 'Therapists', '123456', '', 0),
(6, NULL, NULL, 'TMED-JESS', 'Therapists', '123456', 'jitendra.thakur2008@gmail.com', 1),
(7, 'Tom', 'Campion', 'TMEDTOM', 'Normal', 'test', 'tchamp3@comcast.net', 0),
(8, 'John', 'A', 'TMED-JOHN1', 'Normal', '123456', '', 0),
(9, 'John', 'A', 'TMED-JOHN2', 'Therapists', '123456', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `med_cooccurring`
--

CREATE TABLE IF NOT EXISTS `med_cooccurring` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `is_drug` varchar(8) DEFAULT NULL,
  `is_drug_week` varchar(8) DEFAULT NULL,
  `is_alcohol` varchar(8) DEFAULT NULL,
  `is_alcohol_week` varchar(8) DEFAULT NULL,
  `is_alcohol_friend` varchar(8) DEFAULT NULL,
  `is_alcohol_family` varchar(8) DEFAULT NULL,
  `is_cravings` varchar(8) DEFAULT NULL,
  `is_dreams` varchar(8) DEFAULT NULL,
  `is_triggers` varchar(8) DEFAULT NULL,
  `is_plans` varchar(8) DEFAULT NULL,
  `last_alcohol` varchar(50) DEFAULT NULL,
  `last_drugs` varchar(50) DEFAULT NULL,
  `pulse` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `med_cooccurring`
--

INSERT INTO `med_cooccurring` (`id`, `user_id`, `is_drug`, `is_drug_week`, `is_alcohol`, `is_alcohol_week`, `is_alcohol_friend`, `is_alcohol_family`, `is_cravings`, `is_dreams`, `is_triggers`, `is_plans`, `last_alcohol`, `last_drugs`, `pulse`, `cr_timestamp`) VALUES
(1, '1', 'No', 'No', 'Yes', 'No', 'Yes', '', '', '', '', '', '31-90 Days', '91-180 Days', 'TESTTTTTTSSSS', '2013-09-17 12:41:59'),
(3, '7', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '', '31-90 Days', '0-30 Days', 'MAMAMMAMAMAM', '2013-09-30 03:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `med_core1`
--

CREATE TABLE IF NOT EXISTS `med_core1` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `coredate` varchar(100) DEFAULT NULL,
  `starttime` varchar(100) DEFAULT NULL,
  `endtime` varchar(100) DEFAULT NULL,
  `goal` varchar(20) DEFAULT NULL,
  `fif` varchar(25) DEFAULT NULL,
  `visit` text,
  `followup` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `med_core1`
--

INSERT INTO `med_core1` (`id`, `user_id`, `patient_id`, `coredate`, `starttime`, `endtime`, `goal`, `fif`, `visit`, `followup`, `cr_timestamp`) VALUES
(1, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'AAA loda test', 'AAAA there ', '2013-09-20 16:25:00'),
(2, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 1', 'Vocational', 'hello', 'good', '2013-11-05 16:46:23'),
(4, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'AAA', 'AAAA there ', '2013-11-13 19:43:46'),
(3, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 2', 'Education', 'fine', 'god', '2013-11-06 04:23:15'),
(5, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'shubhi', 'AAAA there ', '2013-11-13 20:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `med_core2`
--

CREATE TABLE IF NOT EXISTS `med_core2` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `coredate` varchar(100) DEFAULT NULL,
  `renewal` varchar(100) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL,
  `goal` text,
  `step1` text,
  `step2` text,
  `step3` text,
  `target` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_core2`
--

INSERT INTO `med_core2` (`id`, `user_id`, `patient_id`, `coredate`, `renewal`, `plan`, `goal`, `step1`, `step2`, `step3`, `target`, `cr_timestamp`) VALUES
(1, '5', 7, '2/16/13', '1"13', 'GRESTTT', NULL, 'HEY YOU', 'HEY YOU', 'HEY YOU', 'asfsdfs df', '2013-09-20 16:46:51'),
(2, '6', 7, '09-09-09', '09-09-09', 'test', NULL, 'test', 'test', 'test', 'test', '2013-11-06 18:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `med_core3`
--

CREATE TABLE IF NOT EXISTS `med_core3` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `identify` varchar(250) DEFAULT NULL,
  `is_present` varchar(100) DEFAULT NULL,
  `is_service` varchar(8) DEFAULT NULL,
  `pulse` text,
  `relatiopnship` varchar(250) DEFAULT NULL,
  `supporter` varchar(250) DEFAULT NULL,
  `visits` varchar(250) DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `concentration` varchar(250) DEFAULT NULL,
  `pulse2` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_core3`
--

INSERT INTO `med_core3` (`id`, `user_id`, `zip`, `identify`, `is_present`, `is_service`, `pulse`, `relatiopnship`, `supporter`, `visits`, `medicine`, `concentration`, `pulse2`, `cr_timestamp`) VALUES
(1, '5', '18252', 'Integrity,Enthusiasm,Humility,Courage,Responsibility,', 'No', 'Yes', 'thiiiiiiiissss is a TESTTTTTTTTTT(@(@(@(#))#)#)_@_', 'Phase III Development', 'Shared Acceptance', 'Office,Retreat,Probation/Parole Office,Home,Wellness Trips,', 'Phase III', 'Social', 'test 12222i3i3i3i3i3ijf', '2013-09-20 17:52:19'),
(2, '6', '17922', '', 'Yes', 'Yes', 'test', 'Phase II Connection', 'Active Listening', 'Office,Home,', 'Phase II', 'Vocational', 'test', '2013-11-06 19:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `med_forensic`
--

CREATE TABLE IF NOT EXISTS `med_forensic` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `is_parole` varchar(8) DEFAULT NULL,
  `is_month` varchar(8) DEFAULT NULL,
  `is_charge` varchar(8) DEFAULT NULL,
  `is_fines` varchar(8) DEFAULT NULL,
  `is_week` varchar(8) DEFAULT NULL,
  `is_residence` varchar(8) DEFAULT NULL,
  `is_criminal` varchar(8) DEFAULT NULL,
  `is_friends` varchar(8) DEFAULT NULL,
  `is_family` varchar(8) DEFAULT NULL,
  `is_volunteer` varchar(8) DEFAULT NULL,
  `arrest` varchar(50) DEFAULT NULL,
  `incarceration` varchar(50) DEFAULT NULL,
  `pulse` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `med_forensic`
--

INSERT INTO `med_forensic` (`id`, `user_id`, `is_parole`, `is_month`, `is_charge`, `is_fines`, `is_week`, `is_residence`, `is_criminal`, `is_friends`, `is_family`, `is_volunteer`, `arrest`, `incarceration`, `pulse`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Yes', 'No', 'Yes', '', '31-90 Days', 'phil Leshhhhhhhhhhhhhhhhhhhhhhhh', '2013-09-17 10:40:16'),
(2, '7', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', '91-180 Days', '31-90 Days', 'ttttttttttttttttttttaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2013-09-30 03:45:00'),
(3, '7', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', '31-90 Days', '31-90 Days', 'wow', '2013-11-19 19:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `med_physicalhealth`
--

CREATE TABLE IF NOT EXISTS `med_physicalhealth` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `treatment` varchar(300) DEFAULT NULL,
  `is_std` varchar(8) DEFAULT NULL,
  `is_physical` text,
  `is_hearing` varchar(8) DEFAULT NULL,
  `is_provider` varchar(8) DEFAULT NULL,
  `is_treatment` varchar(8) DEFAULT NULL,
  `is_meds` varchar(8) DEFAULT NULL,
  `is_counter` varchar(8) DEFAULT NULL,
  `is_remedies` varchar(8) DEFAULT NULL,
  `is_weight` varchar(8) DEFAULT NULL,
  `is_happy` varchar(8) DEFAULT NULL,
  `is_pain` varchar(8) DEFAULT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_physicalhealth`
--

INSERT INTO `med_physicalhealth` (`id`, `user_id`, `treatment`, `is_std`, `is_physical`, `is_hearing`, `is_provider`, `is_treatment`, `is_meds`, `is_counter`, `is_remedies`, `is_weight`, `is_happy`, `is_pain`, `cr_timestamp`) VALUES
(1, '1', 'High Blood Pressure,Other,', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '', '', '', 'No', '2013-09-18 00:48:43'),
(2, '7', 'Diabetes,', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', '', '', '', '2013-09-30 03:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `med_recoveryvitals`
--

CREATE TABLE IF NOT EXISTS `med_recoveryvitals` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `is_sleep` varchar(8) DEFAULT NULL,
  `is_healthy` varchar(8) DEFAULT NULL,
  `is_excersise` text,
  `is_meditation` varchar(8) DEFAULT NULL,
  `is_spirituality` varchar(8) DEFAULT NULL,
  `is_groups` varchar(8) DEFAULT NULL,
  `is_community` varchar(8) DEFAULT NULL,
  `is_family` varchar(8) DEFAULT NULL,
  `is_enjoy` varchar(8) DEFAULT NULL,
  `is_religion` varchar(8) DEFAULT NULL,
  `is_recovery` varchar(8) DEFAULT NULL,
  `is_life` varchar(8) DEFAULT NULL,
  `pulse` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_recoveryvitals`
--

INSERT INTO `med_recoveryvitals` (`id`, `user_id`, `is_sleep`, `is_healthy`, `is_excersise`, `is_meditation`, `is_spirituality`, `is_groups`, `is_community`, `is_family`, `is_enjoy`, `is_religion`, `is_recovery`, `is_life`, `pulse`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', '', '', '', 'Yes', '', 'No', 'dsdsd', '2013-09-18 08:37:32'),
(2, '7', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'jitz test', '2013-11-20 05:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `med_routes`
--

CREATE TABLE IF NOT EXISTS `med_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `med_sessions`
--

CREATE TABLE IF NOT EXISTS `med_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
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
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `is_medicine` varchar(8) DEFAULT NULL,
  `is_psychiatric` varchar(8) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `is_question_medicine` varchar(8) DEFAULT NULL,
  `is_question_psychiatric` varchar(8) DEFAULT NULL,
  `pulse` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_tmed`
--

INSERT INTO `med_tmed` (`id`, `user_id`, `is_medicine`, `is_psychiatric`, `category`, `is_question_medicine`, `is_question_psychiatric`, `pulse`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'No', 'Physical Activity,Social Development,', 'Yes', 'No', 'GOOOOOOOOO COWBOYSSSSSSSSSSSSSSS', '2013-09-22 06:22:28'),
(2, '7', 'No', 'No', 'Community-Based,Physical Activity,Cultural,', '', '', 'tttttttttttttttttttestttttttttttttttttt', '2013-09-30 03:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `med_wellness`
--

CREATE TABLE IF NOT EXISTS `med_wellness` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `feel` varchar(200) DEFAULT NULL,
  `wellness` varchar(200) DEFAULT NULL,
  `apply` text,
  `hospitalization` varchar(200) DEFAULT NULL,
  `crisis` varchar(200) DEFAULT NULL,
  `pulse` text,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `med_wellness`
--

INSERT INTO `med_wellness` (`id`, `user_id`, `feel`, `wellness`, `apply`, `hospitalization`, `crisis`, `pulse`, `cr_timestamp`) VALUES
(1, '1', 'Bad', NULL, 'Hallucinating,Anxious,Lonely,Hearing Voices,Angry/Irritable,Thinking of Self-Harm,', '31-90 Days', '0-30 Days', 'gagagagageeewef', '2013-09-29 15:48:00'),
(7, '7', 'Good', NULL, 'Manic or  Hyper,Depressed,Anxious,Angry/Irritable,Thinking of Self-Harm,', '181-360 Days', '31-90 Days', 'aaaaaaaaaaaaaaaaaaaaaa jitz', '2013-11-19 05:01:16'),
(8, '7', 'Good', NULL, 'Depressed,Angry/Irritable,', '31-90 Days', '31-90 Days', 'test', '2013-11-19 18:50:21'),
(9, '7', 'Excellent', 'Yes', 'Depressed,Lonely,', '91-180 Days', '91-180 Days', 'wow', '2013-11-19 18:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) DEFAULT NULL,
  `oauth_uid` int(11) DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `username`) VALUES
(1, 'jitendra.thakur2008@gmail.com', 0, 'Google', 'jitendrathakur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
