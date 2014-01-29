-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2014 at 12:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
  `mobile` varchar(12) DEFAULT NULL,
  `sms_code` varchar(64) DEFAULT NULL,
  `is_sms_verified` tinyint(4) NOT NULL,
  `google` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `med_admin`
--

INSERT INTO `med_admin` (`id`, `firstname`, `lastname`, `user`, `access`, `password`, `email`, `mobile`, `sms_code`, `is_sms_verified`, `google`) VALUES
(5, 'dell', 'congo', 'TMED-EDDIE', 'Therapists', 'e10adc3949ba59abbe56e057f20f883e', 'colo@mailinater.com', NULL, NULL, 0, 0),
(6, NULL, NULL, 'TMED-JESS', 'Therapists', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.com', '9713485910', 'lwg1', 0, 1),
(7, 'Tom', 'Campion', 'TMEDTOM', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', 'test', '123', 'bnkz', 1, 0),
(8, 'John', 'A', 'TMED-JOHN1', 'Normal', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, 0, 0),
(9, 'John', 'A', 'TMED-JOHN2', 'Therapists', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, 0, 0),
(24, 'super', 'therapist', 'supert', 'supert', 'e10adc3949ba59abbe56e057f20f883e', 'super@admin.com', NULL, NULL, 0, 0),
(25, 'admin', 'admin', 'admin', 'Admin', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, 0, 0);

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_cooccurring`
--

INSERT INTO `med_cooccurring` (`id`, `user_id`, `is_drug`, `is_drug_week`, `is_alcohol`, `is_alcohol_week`, `is_alcohol_friend`, `is_alcohol_family`, `is_cravings`, `is_dreams`, `is_triggers`, `is_plans`, `last_alcohol`, `last_drugs`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'No', 'No', 'Yes', 'No', 'Yes', '', '', '', '', '', '31-90 Days', '91-180 Days', 'TESTTTTTTSSSS', 0, '2013-09-17 12:41:59'),
(3, '7', 'No', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '', '31-90 Days', '0-30 Days', 'MAMAMMAMAMAM', 1, '2013-09-30 03:47:38'),
(4, '7', 'No', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '91-180 Days', '31-90 Days', 'fgfdgdffdg', 1, '2013-12-18 12:30:34'),
(5, '7', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '91-180 Days', '181-360 Days', 'fsdfsfdfsdfdsf', 1, '2013-12-19 09:45:31');

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
  `close` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `med_core1`
--

INSERT INTO `med_core1` (`id`, `user_id`, `patient_id`, `coredate`, `starttime`, `endtime`, `goal`, `fif`, `visit`, `followup`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, '6', 7, '02/19/2013', '9:32', '16:38', 'Goal 3', 'Vocational', 'AAA loda test', 'AAAA there jitz', 0, 0, '2013-09-20 16:25:00'),
(2, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 1', 'Vocational', 'hello', 'good', 0, 0, '2013-11-05 16:46:23'),
(4, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'AAA', 'AAAA there ', 0, 0, '2013-11-13 19:43:46'),
(3, '6', 7, '09-09-09', '00:00:00', '01:00:00', 'Goal 2', 'Education', 'fine', 'god', 0, 0, '2013-11-06 04:23:15'),
(5, '6', 7, '2/13/13', '12:32', '12:38', 'Goal 3', 'Vocational', 'shubhi', 'AAAA there ', 0, 0, '2013-11-13 20:02:44'),
(9, '6', 7, '12/16/2013', '11:15', '13:15', 'Goal 3', 'Vocational', 'test', 'tets', 0, 0, '2013-12-16 11:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `med_core1_reply`
--

CREATE TABLE IF NOT EXISTS `med_core1_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core1_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `med_core1_reply`
--

INSERT INTO `med_core1_reply` (`id`, `patient_id`, `core1_id`, `comment`, `created`) VALUES
(1, 7, 1, 'fdsfsd dfs\r\ndf\r\n \r\n\r\nsd\r\nf\r\nsd\r\nf \r\nsf\r\n', '2013-12-17 00:00:00'),
(2, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(3, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(4, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(5, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(6, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(7, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00'),
(8, 7, 1, 'sjdkhfj shjdhf jkdshfjkdshfjkdsh\r\nsdf\r\nsd\r\nf\r\nds\r\n\r\nfds\r\nfdsd dsfds', '2013-12-17 00:00:00');

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
  `close` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `med_core2`
--

INSERT INTO `med_core2` (`id`, `user_id`, `patient_id`, `coredate`, `renewal`, `plan`, `goal`, `step1`, `step2`, `step3`, `target`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, '5', 7, '2/16/13', '1"13', 'GRESTTT', NULL, 'HEY YOU', 'HEY YOU', 'HEY YOU', 'asfsdfs df', 0, 0, '2013-09-20 16:46:51'),
(2, '6', 7, '09-09-09', '9:00', '15:00', NULL, 'test', 'test', 'test', 'test jitz', 0, 0, '2013-11-06 18:58:18'),
(3, '6', 7, '12/16/2013', '12/16/2013', 'test', NULL, 'test', 'test', 'test', 'test', 0, 0, '2013-12-16 12:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `med_core2_reply`
--

CREATE TABLE IF NOT EXISTS `med_core2_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core2_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_core2_reply`
--

INSERT INTO `med_core2_reply` (`id`, `patient_id`, `core2_id`, `comment`, `created`) VALUES
(1, 7, 2, 'sdjhhgfhjdsgfh sgbskhdgfmhsdg hsdgfhgmhnsdbg fhsdfmhsdbfdmhsgf dsmhvfdshcg smdfvdfgsdmnfvbdmhfdmhfnvbdfgdygf', '2013-12-17 00:00:00'),
(2, 7, 2, 'sdjhhgfhjdsgfh sgbskhdgfmhsdg hsdgfhgmhnsdbg fhsdfmhsdbfdmhsgf dsmhvfdshcg smdfvdfgsdmnfvbdmhfdmhfnvbdfgdygf', '2013-12-17 00:00:00'),
(3, 7, 2, 'sdjhhgfhjdsgfh sgbskhdgfmhsdg hsdgfhgmhnsdbg fhsdfmhsdbfdmhsgf dsmhvfdshcg smdfvdfgsdmnfvbdmhfdmhfnvbdfgdygf', '2013-12-17 00:00:00'),
(4, 7, 2, 'sdjhhgfhjdsgfh sgbskhdgfmhsdg hsdgfhgmhnsdbg fhsdfmhsdbfdmhsgf dsmhvfdshcg smdfvdfgsdmnfvbdmhfdmhfnvbdfgdygf', '2013-12-17 00:00:00'),
(5, 7, 2, 'sdjhhgfhjdsgfh sgbskhdgfmhsdg hsdgfhgmhnsdbg fhsdfmhsdbfdmhsgf dsmhvfdshcg smdfvdfgsdmnfvbdmhfdmhfnvbdfgdygf', '2013-12-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `med_core3`
--

CREATE TABLE IF NOT EXISTS `med_core3` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `patient_id` tinyint(1) NOT NULL DEFAULT '0',
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
  `close` tinyint(4) NOT NULL DEFAULT '0',
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `med_core3`
--

INSERT INTO `med_core3` (`id`, `patient_id`, `user_id`, `zip`, `identify`, `is_present`, `is_service`, `pulse`, `relatiopnship`, `supporter`, `visits`, `medicine`, `concentration`, `pulse2`, `close`, `is_read`, `cr_timestamp`) VALUES
(1, 7, '5', '18252', 'Integrity,Enthusiasm,Humility,Courage,Responsibility,', 'No', 'Yes', 'thiiiiiiiissss is a TESTTTTTTTTTT(@(@(@(#))#)#)_@_', 'Phase III Development', 'Shared Acceptance', 'Office,Retreat,Probation/Parole Office,Home,Wellness Trips,', 'Phase III', 'Social', 'test 12222i3i3i3i3i3ijf', 0, 0, '2013-09-20 17:52:19'),
(2, 7, '6', '17922', 'Integrity,Enthusiasm,Humility,Consistency,Accountability,', 'Yes', 'Yes', 'test', 'Phase III Development', 'Encouragement', 'Office,Retreat,Home,Wellness Trips,', 'Phase III', 'Educational', 'test jitz wow', 0, 0, '2013-11-06 19:44:15'),
(5, 7, '6', '17922', 'Humility,Consistency,', 'Yes', '0', 'test', 'Phase II Connection', 'Shared-Responsibility', 'Office,Community,Retreat,', 'Phase II', 'Vocational', 'test', 0, 0, '2013-12-16 15:13:47'),
(6, 7, '6', '17922', 'Humility,Consistency,Responsibility,', 'Yes', '0', 'test', 'Phase III Development', 'Shared Disclosure', 'Community,Probation/Parole Office,Home,Wellness Trips,', 'Phase II', 'Vocational', 'test', 0, 0, '2013-12-16 15:23:27'),
(7, 7, '6', '17922', 'Integrity,Courage,Contentment,', 'Yes', '0', 'ertret', 'Phase II Connection', 'Shared Disclosure', 'Office,-------------,', 'Phase III', 'Social', 'retret', 0, 0, '2013-12-16 15:34:06'),
(8, 0, '6', '17922', 'Integrity,Courage,Contentment,', 'Yes', '0', 'ertret', 'Phase II Connection', 'Empathy', 'Office,Wellness Trips,', 'Phase III', 'Social', 'retret', 0, 0, '2013-12-16 15:40:12'),
(9, 0, '6', '17922', 'Integrity,Courage,Contentment,', 'Yes', '0', 'ertret', 'Phase II Connection', 'Shared Disclosure', 'Office,Home,', 'Phase III', 'Social', 'retret', 0, 0, '2013-12-16 15:41:06'),
(10, 0, '6', '17922', 'Integrity,Courage,Contentment,', 'Yes', '0', 'ertret', 'Phase II Connection', 'Shared Disclosure', 'Office,Community,Retreat,Probation/Parole Office,Home,Wellness Trips,Other Service,-------------,', 'Phase III', 'Social', 'retret', 0, 0, '2013-12-16 15:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `med_core3_reply`
--

CREATE TABLE IF NOT EXISTS `med_core3_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `core3_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_core3_reply`
--

INSERT INTO `med_core3_reply` (`id`, `patient_id`, `core3_id`, `comment`, `created`) VALUES
(1, 7, 2, 'fsdfsdf sdhflsdlfhdfldshjdhf dshf jhjdhfj ddj hdfh  dhfdh jkfdhjkhd djdhfjh kjdfdhf djfhdj hfjd  hjdh', '2013-12-17 00:00:00'),
(2, 7, 2, 'fsdfsdf sdhflsdlfhdfldshjdhf dshf jhjdhfj ddj hdfh  dhfdh jkfdhjkhd djdhfjh kjdfdhf djfhdj hfjd  hjdh', '2013-12-17 00:00:00'),
(3, 7, 2, 'fsdfsdf sdhflsdlfhdfldshjdhf dshf jhjdhfj ddj hdfh  dhfdh jkfdhjkhd djdhfjh kjdfdhf djfhdj hfjd  hjdh', '2013-12-17 00:00:00'),
(4, 7, 2, 'fsdfsdf sdhflsdlfhdfldshjdhf dshf jhjdhfj ddj hdfh  dhfdh jkfdhjkhd djdhfjh kjdfdhf djfhdj hfjd  hjdh', '2013-12-17 00:00:00'),
(5, 7, 2, 'fsdfsdf sdhflsdlfhdfldshjdhf dshf jhjdhfj ddj hdfh  dhfdh jkfdhjkhd djdhfjh kjdfdhf djfhdj hfjd  hjdh', '2013-12-17 00:00:00');

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `med_forensic`
--

INSERT INTO `med_forensic` (`id`, `user_id`, `is_parole`, `is_month`, `is_charge`, `is_fines`, `is_week`, `is_residence`, `is_criminal`, `is_friends`, `is_family`, `is_volunteer`, `arrest`, `incarceration`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', '', 'Yes', 'No', 'Yes', '', '31-90 Days', 'phil Leshhhhhhhhhhhhhhhhhhhhhhhh', 0, '2013-09-17 10:40:16'),
(2, '7', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', '91-180 Days', '31-90 Days', 'ttttttttttttttttttttaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2013-09-30 03:45:00'),
(3, '7', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', '31-90 Days', '31-90 Days', 'wow', 1, '2013-11-19 19:22:48'),
(4, '7', 'Yes', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', '0', 'Yes', '31-90 Days', '31-90 Days', 'dsfdsfds', 1, '2013-12-18 10:54:10'),
(5, '7', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', '0', 'No', '31-90 Days', '91-180 Days', 'fdsfds', 1, '2013-12-19 09:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `med_patient_therapist`
--

CREATE TABLE IF NOT EXISTS `med_patient_therapist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `med_patient_therapist`
--

INSERT INTO `med_patient_therapist` (`id`, `therapist_id`, `patient_id`, `created`, `modified`) VALUES
(1, 5, 7, '2013-12-03 00:00:00', '2013-12-03 00:00:00');

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_physicalhealth`
--

INSERT INTO `med_physicalhealth` (`id`, `user_id`, `treatment`, `is_std`, `is_physical`, `is_hearing`, `is_provider`, `is_treatment`, `is_meds`, `is_counter`, `is_remedies`, `is_weight`, `is_happy`, `is_pain`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'High Blood Pressure,Other,', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', '', '', '', 'No', 0, '2013-09-18 00:48:43'),
(2, '7', 'High Blood Pressure,Other,', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 1, '2014-01-09 14:37:46');

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `med_recoveryvitals`
--

INSERT INTO `med_recoveryvitals` (`id`, `user_id`, `is_sleep`, `is_healthy`, `is_excersise`, `is_meditation`, `is_spirituality`, `is_groups`, `is_community`, `is_family`, `is_enjoy`, `is_religion`, `is_recovery`, `is_life`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', '', '', '', 'Yes', '', 'No', 'dsdsd', 0, '2013-09-18 08:37:32'),
(2, '7', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'ffdgdfgfdg', 1, '2014-01-09 14:37:47');

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `med_tmed`
--

INSERT INTO `med_tmed` (`id`, `user_id`, `is_medicine`, `is_psychiatric`, `category`, `is_question_medicine`, `is_question_psychiatric`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Yes', 'No', 'Physical Activity,Social Development,', 'Yes', 'No', 'GOOOOOOOOO COWBOYSSSSSSSSSSSSSSS', 0, '2013-09-22 06:22:28'),
(3, '7', 'No', 'No', 'Community-Based,Physical Activity,Cultural,Inter-Active,', 'No', 'Yes', 'fgfgfdgdg', 1, '2014-01-09 14:37:48');

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
  `is_read` tinyint(4) NOT NULL,
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `med_wellness`
--

INSERT INTO `med_wellness` (`id`, `user_id`, `feel`, `wellness`, `apply`, `hospitalization`, `crisis`, `pulse`, `is_read`, `cr_timestamp`) VALUES
(1, '1', 'Bad', NULL, 'Hallucinating,Anxious,Lonely,Hearing Voices,Angry/Irritable,Thinking of Self-Harm,', '31-90 Days', '0-30 Days', 'gagagagageeewef', 0, '2013-09-29 15:48:00'),
(7, '7', 'Good', NULL, 'Manic or  Hyper,Depressed,Anxious,Angry/Irritable,Thinking of Self-Harm,', '181-360 Days', '31-90 Days', 'aaaaaaaaaaaaaaaaaaaaaa jitz', 1, '2014-01-09 14:37:38'),
(8, '7', 'Good', NULL, 'Depressed,Angry/Irritable,', '31-90 Days', '31-90 Days', 'test', 1, '2014-01-09 14:37:38'),
(9, '7', 'Excellent', 'Yes', 'Depressed,Lonely,', '91-180 Days', '91-180 Days', 'wow', 1, '2014-01-09 14:37:38'),
(10, '7', 'Not Sure', 'No', 'Depressed,Hallucinating,Anxious,Lonely,Thinking of Self-Harm,', '31-90 Days', '31-90 Days', 'fdgdfg', 1, '2014-01-09 14:56:38'),
(11, '7', 'Not Sure', 'No', 'Manic or Hyper,Hallucinating,Angry/Irritable,', '31-90 Days', '91-180 Days', 'sdfsdf', 1, '2014-01-09 14:37:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
