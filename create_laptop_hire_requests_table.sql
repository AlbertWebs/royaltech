-- SQL to create laptop_hire_requests table manually
-- Run this in your MySQL database if migrations don't work

CREATE TABLE IF NOT EXISTS `laptop_hire_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `number_of_laptops` int NOT NULL,
  `desired_specs` text NOT NULL,
  `status` enum('pending','contacted','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laptop_hire_requests_email_index` (`email`),
  KEY `laptop_hire_requests_status_index` (`status`),
  KEY `laptop_hire_requests_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
