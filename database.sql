CREATE DATABASE IF NOT EXISTS freshbytes_web
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE freshbytes_web;

CREATE TABLE IF NOT EXISTS intake_requests (
  intake_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(120) NOT NULL,
  phone VARCHAR(32) NOT NULL,
  email VARCHAR(254) NULL,
  plan ENUM('balance', 'lean', 'sugar', 'family') NOT NULL,
  allergies TEXT NULL,
  status ENUM('new', 'contacted', 'enrolled', 'closed') NOT NULL DEFAULT 'new',
  submitted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (intake_id),
  KEY idx_intake_status_submitted (status, submitted_at)
) ENGINE=InnoDB;
