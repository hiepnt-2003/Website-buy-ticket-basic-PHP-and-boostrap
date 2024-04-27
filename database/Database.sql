CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20)
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role_id` int,
  `fullname` varchar(50),
  `account` varchar(150),
  `password` varchar(32),
  `deleted` int
);

CREATE TABLE `Category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `Products` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `title` varchar(350),
  `price` int,
  `thumbnail` varchar(500),
  `description` longtext,
  `locations` varchar(500),
  `even_date` datetime,
  `deleted` int
);

CREATE TABLE `Feedback` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(30),
  `last_name` varchar(30),
  `email` varchar(150),
  `phone_number` varchar(20),
  `subject_name` varchar(200),
  `note` varchar(500)
);

CREATE TABLE `Orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `fullname` varchar(150),
  `email` varchar(150),
  `phone_number` varchar(20),
  `address` varchar(200),
  `note` varchar(500),
  `order_date` datetime,
  `status` int,
  `total_money` int
);

CREATE TABLE `Detail_Order` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `number` int,
  `total_money` int
);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);

ALTER TABLE `Products` ADD FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Detail_Order` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`id`);

ALTER TABLE `Detail_Order` ADD FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`);
