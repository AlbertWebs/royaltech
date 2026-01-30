-- SQL to create sent_messages table manually
-- Run this in your MySQL database if migrations don't work

CREATE TABLE IF NOT EXISTS `sent_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `to_email` varchar(255) NOT NULL,
  `to_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_type` varchar(255) NOT NULL DEFAULT 'reply',
  `related_message_id` bigint unsigned DEFAULT NULL,
  `sent_by` bigint unsigned DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `email_error` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sent_messages_to_email_index` (`to_email`),
  KEY `sent_messages_sent_by_index` (`sent_by`),
  KEY `sent_messages_message_type_index` (`message_type`),
  KEY `sent_messages_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
