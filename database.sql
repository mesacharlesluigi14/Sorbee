CREATE DATABASE IF NOT EXISTS sorbeedb;
USE sorbeedb;

CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `purchase_form` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed default user profiles (password is md5 hashed: 'password123' -> '482c811da5d5b4bc6d497ffa98491e38')
INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Admin', 'admin@sorbee.com', '482c811da5d5b4bc6d497ffa98491e38', 'admin'),
(2, 'Operator', 'operator@sorbee.com', '482c811da5d5b4bc6d497ffa98491e38', 'operator'),
(3, 'John Doe', 'user@sorbee.com', '482c811da5d5b4bc6d497ffa98491e38', 'user');
