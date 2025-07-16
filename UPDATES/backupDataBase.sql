-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 12:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_store_sem2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(5, 15, 15, 4),
(6, 15, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`) VALUES
(1, 13, 5844.00),
(2, 27, 7793.00),
(3, 13, 2997.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 5, 3),
(2, 1, 8, 3),
(3, 1, 7, 3),
(4, 2, 6, 4),
(5, 2, 4, 1),
(6, 2, 12, 2),
(7, 3, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(6) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`, `category`) VALUES
(4, 'Cricket kit', 5999, 'the fuckignigni ningi ncricket KITTT FOR KIDSSSSS', 'cricket-kit.png', 'Cricket'),
(5, 'Chess Board', 999, 'Chess board for playing chess with friendsss.', 'chess.png', 'Chess'),
(6, 'Badminton', 399, 'Badminton is a fast-paced racquet sport played either as singles (one player per side) or doubles (two players per side). Players use racquets to hit a shuttlecock over a net, aiming to land it in the opponent\'s court. Known for its quick reflexes, agility, and precision, badminton is played both recreationally and competitively worldwide. It is an Olympic sport and is especially popular in Asia and Europe.', 'badminton.png', 'Badminton'),
(7, 'baseball Gloves', 650, 'Baseball gloves are essential equipment used by players to catch and field balls during a game. Made from leather or synthetic materials, these gloves are designed with deep pockets and webbing to help secure the ball. Different glove types are used based on player positions—such as catcher\'s mitts, infielder, outfielder, and first baseman gloves—each tailored for performance, comfort, and control on the field.', 'baseball-gloves.png', 'Baseball Equipments'),
(8, 'Basketball', 299, 'Basketball is a high-energy team sport played between two teams of five players. The objective is to score points by shooting the ball through the opponent’s hoop. Known for its fast pace, dribbling, passing, and strategic play, basketball promotes agility, teamwork, and endurance. It is played both indoors and outdoors, professionally and recreationally, all over the world.', 'basketball.png', 'Basketball'),
(9, 'Racing kit', 999, 'Racing Kit includes essential gear designed for safety, comfort, and performance during motorsports or cycling races. Typically consisting of a racing suit, gloves, helmet, shoes, and protective padding, the kit is made from high-quality, fire-resistant or aerodynamic materials. It ensures protection against impacts and high speeds while enhancing agility and control.', 'bike-racing.png', 'Racing Equipments'),
(10, 'Helmets', 550, 'Cricket helmets are protective headgear worn by batters and close fielders to safeguard against high-speed balls. Made with a hard outer shell, inner padding, and a metal face grill, they provide essential protection for the head, face, and jaw. Designed for comfort and safety, modern cricket helmets are lightweight, well-ventilated, and adjustable to ensure a secure fit during intense play.', 'cricket-helmet.png', 'Cricket'),
(11, 'hockey kit', 1499, 'Hockey kit includes all the essential equipment needed for safe and effective play in field or ice hockey. It typically consists of a hockey stick, ball or puck, helmet, gloves, shin guards, mouthguard, and protective pads. Designed to ensure both safety and performance, the kit provides comfort, mobility, and protection against impacts during the game. Variations exist for different positions such as goalkeepers, who require extra padding and gear.', 'hockey.png', 'Hockey'),
(12, 'skipping Ropes', 99, 'Skipping ropes, also known as jump ropes, are simple yet effective fitness tools used for cardiovascular exercise, coordination, and endurance training. Made from materials like plastic, leather, or steel wire, they feature comfortable handles for a secure grip. Suitable for all ages and fitness levels, skipping ropes are popular in workouts, warm-ups, and sports training routines.\r\n\r\n', 'skipping-ropes.png', 'Cardio & Gym'),
(13, 'sports wear', 499, 'Sportswear and jackets are designed to provide comfort, flexibility, and performance during physical activities or casual wear. Made from breathable, moisture-wicking, and stretchable materials, sportswear includes items like t-shirts, shorts, leggings, and track pants. Sports jackets offer additional protection and style, often featuring lightweight, windproof, or insulated fabrics—ideal for warm-ups, outdoor workouts, or everyday activewear.', 'sports-jacket.png', 'Jacket'),
(14, 'Yoga set', 399, 'A Yoga Set typically includes essential items like a yoga mat, blocks, straps, and sometimes a yoga towel or bag. Designed to support flexibility, balance, and comfort during yoga practice, these tools help improve posture, deepen stretches, and enhance overall performance. Made from non-slip, durable, and eco-friendly materials, a yoga set is perfect for practitioners of all levels.', 'yoga-set.png', 'Yoga'),
(15, 'Dumbbell', 1199, 'Dumbbells are versatile free weights used for strength training and muscle building. Available in various sizes and materials, they help target specific muscle groups through exercises like curls, presses, and rows. Suitable for beginners to advanced athletes, dumbbells are essential equipment for home workouts and gyms.', 'dumbbell.png', 'Gym Accessories'),
(16, '2KG Dumbbell', 499, 'Perfect for beginners and home workouts, these lightweight dumbbells help you tone muscles, improve balance, and boost endurance. Made with anti-slip grip and durable coating, they’re ideal for yoga, aerobics, and daily fitness routines.', 'ligh-weight-dumbell.png', 'Gym Accessories'),
(17, 'Carrom Board', 499, 'Enjoy classic indoor fun with this smooth-finish carrom board, perfect for family, friends, or tournament-level play. Crafted with premium wood and polished for consistent striker rebound and coin glide.\r\n\r\nFeatures:\r\n\r\nStandard size: 32\" x 32\" board\r\n\r\nDurable plywood with polished surface\r\n\r\nReinforced edges for better bounce\r\n\r\nIncludes coins, striker, and powder\r\n\r\nIdeal for schools, homes, clubs, and game rooms.', 'carrom.png', 'Carrom Boards');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(13, 'Rehan', 'rehan@gmail.com', 'qwe', 'user'),
(14, 'rohit sharma', 'rohit@gmail.com', 'qwe', 'user'),
(15, 'Nagesh', 's@gmail.com', 'egs', 'user'),
(16, 'Rehan', 're@gmail.com', 'afef', 'user'),
(17, 'Nagesh Odedra', 'commandermer@gmail.com', 'efesf', 'user'),
(18, 'Rehan', 'halairehan01@gmail.com', 'asd', 'user'),
(19, 'ROHAN', 'wqdawd@gmail.com', 'segeg', 'user'),
(20, 'Seemanuddin', 'seema@gmail.com', '123', 'user'),
(21, 'Zed', 'dwa@gmail.com', 'awf', 'user'),
(22, '', '', '', 'user'),
(23, 'Maha', 'ma@gmail.com', '123', 'user'),
(24, 'Rehan', 'rehan0445@gmail.com', '123', 'admin'),
(25, 'John', 'john@gmail.com', 'jogn123', 'user'),
(26, 'Seema', 'sema@gmail.com', '123', 'user'),
(27, 'REHAN', 'halai@gmail.com', '0445', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
