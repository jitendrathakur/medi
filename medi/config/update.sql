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