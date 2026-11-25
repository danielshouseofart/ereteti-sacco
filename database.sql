CREATE DATABASE IF NOT EXISTS ereteti_web
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE ereteti_web;

CREATE TABLE IF NOT EXISTS route (
  route_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  route_name VARCHAR(80) NOT NULL,
  collection_centre VARCHAR(120) NOT NULL,
  PRIMARY KEY (route_id),
  UNIQUE KEY uq_route_name (route_name)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS farmer (
  farmer_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  member_no CHAR(7) NOT NULL,
  first_name VARCHAR(80) NOT NULL,
  last_name VARCHAR(80) NOT NULL,
  phone VARCHAR(32) NOT NULL,
  route_id INT UNSIGNED NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (farmer_id),
  UNIQUE KEY uq_farmer_member_no (member_no),
  KEY idx_farmer_route (route_id),
  CONSTRAINT fk_farmer_route
    FOREIGN KEY (route_id) REFERENCES route (route_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS milk_delivery (
  delivery_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  farmer_id INT UNSIGNED NOT NULL,
  delivery_date DATE NOT NULL,
  session ENUM('MORNING', 'EVENING') NOT NULL,
  litres DECIMAL(6, 2) NOT NULL,
  accepted TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (delivery_id),
  UNIQUE KEY uq_farmer_delivery_session (farmer_id, delivery_date, session),
  KEY idx_delivery_date_member (delivery_date, farmer_id),
  CONSTRAINT chk_delivery_litres CHECK (litres > 0 AND litres <= 60),
  CONSTRAINT fk_delivery_farmer
    FOREIGN KEY (farmer_id) REFERENCES farmer (farmer_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB;

INSERT INTO route (route_id, route_name, collection_centre)
VALUES
  (1, 'Kiserian', 'Kiserian collection centre'),
  (2, 'Ngong', 'Ngong collection centre'),
  (3, 'Rongai', 'Rongai collection centre')
ON DUPLICATE KEY UPDATE
  route_name = VALUES(route_name),
  collection_centre = VALUES(collection_centre);
