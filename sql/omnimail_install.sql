CREATE TABLE IF NOT EXISTS `civicrm_mailing_provider_data` (
  `contact_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
   `mailing_identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `event_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `recipient_action_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
   `contact_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `is_civicrm_updated`  TINYINT(4) DEFAULT '0',
 PRIMARY KEY (`contact_identifier`,`recipient_action_datetime`,`event_type`),
   KEY `contact_identifier` (`contact_identifier`),
   KEY `mailing_identifier` (`mailing_identifier`),
   KEY `contact_id` (`contact_id`),
   KEY `email` (`email`),
   KEY `event_type` (`event_type`),
   KEY `recipient_action_datetime` (`recipient_action_datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
