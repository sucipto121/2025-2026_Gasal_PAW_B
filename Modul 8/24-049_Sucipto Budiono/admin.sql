CREATE DATABASE IF NOT EXISTS admin;
USE admin;

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, 
  `nama` VARCHAR(100) NOT NULL,
  `level` TINYINT NOT NULL DEFAULT 2 
);

INSERT INTO `user` (username, password, nama, level) VALUES
('admin', MD5('admin123'), 'Administrator', 1),
('user',  MD5('user123'),  'Budi', 2);
