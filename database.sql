CREATE TABLE `users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NULL,
	`email` VARCHAR(240) NOT NULL,
	`password` VARCHAR(240) NOT NULL,
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NULL,
	PRIMARY KEY (`user_id`),
	UNIQUE INDEX `email` (`email`)
) COLLATE='utf8_general_ci';

CREATE TABLE `tests` (
	`item_id` INT NOT NULL AUTO_INCREMENT,
	`item_name` VARCHAR(120) NOT NULL,
	`type` ENUM('Test','Package') NOT NULL,
	`price` INT(6) NOT NULL COMMENT 'INR',
	`fasting` TINYINT(2) NOT NULL DEFAULT 0 COMMENT 'fasting for number of hours before testing',
	`lab_name` VARCHAR(60) NULL DEFAULT NULL,
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NULL,
	PRIMARY KEY (`item_id`)
) COLLATE='utf8_general_ci';

CREATE TABLE `cart` (
	`user_id` INT NOT NULL,
	`item_id` INT NOT NULL,
	`created_at` DATETIME NOT NULL,
	PRIMARY KEY (`user_id`, `item_id`)
) COLLATE='utf8_general_ci';

REPLACE INTO `tests` (`item_id`, `item_name`, `type`, `price`, `fasting`, `lab_name`, `created_at`, `updated_at`) VALUES
	(1, 'Covid 19 Test', 'Test', 1450, 0, 'Thyrocare', '2020-11-18 00:57:54', NULL),
	(2, 'LFT: Liver Function Test', 'Test', 799, 6, 'Thyrocare', '2020-11-18 00:58:18', NULL),
	(3, 'Saliva Test', 'Test', 299, 0, 'Thyrocare', '2020-11-18 00:58:45', NULL),
	(4, 'Urine Test', 'Test', 299, 6, 'Thyrocase', '2020-11-18 00:59:11', NULL),
	(29, 'COVID-19 Test', 'Test', 4500, 0, 'Metropolis', '2020-11-17 23:41:44', NULL),
	(30, 'Eye Test- Vision Express', 'Test', 49, 0, 'Vision Express', '2020-11-17 23:41:44', NULL),
	(31, 'Yttrium Therapy', 'Test', 17500, 0, '', '2020-11-17 23:41:44', NULL),
	(32, 'X Ray Wrist Lateral View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(33, 'X Ray Wrist AP View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(34, 'X Ray Wrist AP and Lateral View', 'Test', 240, 0, '', '2020-11-17 23:41:44', NULL),
	(35, 'X Ray Whole Spine Lateral View', 'Test', 320, 0, '', '2020-11-17 23:41:44', NULL),
	(36, 'X Ray Whole Spine Lateral and AP View', 'Test', 560, 0, '', '2020-11-17 23:41:44', NULL),
	(37, 'X Ray Whole Spine AP View', 'Test', 320, 0, '', '2020-11-17 23:41:44', NULL),
	(38, 'X Ray Water View', 'Test', 145, 0, '', '2020-11-17 23:41:44', NULL),
	(39, 'X Ray Tm Joint Lateral View', 'Test', 162, 0, '', '2020-11-17 23:41:44', NULL),
	(40, 'X Ray Tm Joint AP View', 'Test', 162, 0, '', '2020-11-17 23:41:44', NULL),
	(41, 'X Ray Tm Joint AP and Lateral View', 'Test', 280, 0, '', '2020-11-17 23:41:44', NULL),
	(42, 'X Ray Thumb Lateral View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(43, 'X Ray Thumb Lateral and AP View', 'Test', 240, 0, '', '2020-11-17 23:41:44', NULL),
	(44, 'X Ray Thumb AP View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(45, 'X Ray Thigh Lateral View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(46, 'X Ray Thigh AP View', 'Test', 120, 0, '', '2020-11-17 23:41:44', NULL),
	(47, 'X Ray Thigh AP and Lateral View', 'Test', 240, 0, '', '2020-11-17 23:41:44', NULL),
	(48, 'X ray Temp', 'Test', 0, 0, '', '2020-11-17 23:41:44', NULL),
	(49, 'X ray Temp', 'Test', 0, 0, '', '2020-11-17 23:41:44', NULL),
	(50, 'X ray Temp', 'Test', 0, 0, '', '2020-11-17 23:41:44', NULL),
	(51, 'X ray Temp', 'Test', 0, 0, '', '2020-11-17 23:41:44', NULL),
	(52, 'X ray Temp', 'Test', 0, 0, '', '2020-11-17 23:41:44', NULL);
