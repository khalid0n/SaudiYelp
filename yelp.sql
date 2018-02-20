-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 09:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `yelp`
--
CREATE DATABASE IF NOT EXISTS `yelp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yelp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`) VALUES
(1, 'North'),
(2, 'West'),
(3, 'East'),
(4, 'South');

-- --------------------------------------------------------

--
-- Table structure for table `branche`
--

CREATE TABLE `branche` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL,
  `location` text NOT NULL,
  `address` varchar(45) NOT NULL,
  `reservation` varchar(10) NOT NULL,
  `area_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branche`
--

INSERT INTO `branche` (`id`, `name`, `img`, `location`, `address`, `reservation`, `area_id`, `place_id`) VALUES
(4, 'Mc King Abdullah ROAD', 'Mac.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d925.2706705588591!2d46.633964167984395!3d24.713404729537405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7908eeb613f193de!2z2YXYp9mD2K_ZiNmG2KfZhNiv2LI!5e0!3m2!1sar!2ssa!4v1495667422745', 'Near KSU campus', 'No', 2, 4),
(3, 'Mac Olaya', 'Mac.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2155.5618585936586!2d46.659949024084405!3d24.745284825180754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa102f7525ba8b016!2z2YXYp9mD2K_ZiNmG2KfZhNiv2LI!5e0!3m2!1sar!2ssa!4v1495666128876', 'Near Riyadh Galary', 'No', 1, 4),
(5, 'Dunkin Donuts King Abdullah ROAD', 'DunkinDonutsLogo634x634.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d351.6264909144729!2d46.63389184474357!3d24.71327287467638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2d3b4ddc067b29ca!2z2K_Yp9mG2YPZhiDYr9mI2YbYqtiz!5e0!3m2!1sar!2ssa!4v1495669097428', 'Near KSU campus', 'No', 2, 6),
(6, 'KFC King Abdullah', 'Unknown.png', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d677.2347041182694!2d46.67385150616987!3d24.73236919373104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1b7d10de1df73af7!2z2YPZhtiq2KfZg9mK!5e0!3m2!1sar!2ssa!4v1495669657580', 'in front of Pizza Hut', 'No', 1, 5),
(7, 'Starbucks King Abdullah ROAD', 'king abdullah.JPG', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1220.7357804910582!2d46.67197778323702!3d24.730350933607934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcd0f5097860cc6c1!2z2LPYqtin2LHYqNmD2LM!5e0!3m2!1sar!2ssa!4v1495672125408', 'before electro', 'No', 1, 7),
(8, 'Starbucks Raiyan', 'rayan.JPG', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116052.66265679263!2d46.76236036136181!3d24.635893091720952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6fb338bf6184b796!2z2LPYqtin2LHYqNmD2LM!5e0!3m2!1sar!2ssa!4v1495672325099', 'inside of Jareer bookstore', 'No', 3, 7),
(9, 'Starbucks almaather', 'south.JPG', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116026.63600236228!2d46.683185099999996!3d24.663897499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x259f29f09540c551!2z2LPYqtin2LHYqNmD2LM!5e0!3m2!1sar!2ssa!4v1495672736637', 'near Alfaisal University', 'No', 4, 7),
(10, 'NINO Tahliyah', 'Capture.JPG', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2370.863901357407!2d46.68909648757368!3d24.6984034109491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f033c50510401%3A0xb89369b3cc5ad8e5!2z2YbZitmG2Yg!5e0!3m2!1sar!2ssa!4v1495673534792', 'in tahliyah street before Centria Mall', 'Yes', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `compliant`
--

CREATE TABLE `compliant` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compliant`
--

INSERT INTO `compliant` (`id`, `content`, `created`) VALUES
(6, 'the services were bad of Mc donalds', '2017-05-25 06:28:41'),
(5, 'McDonalds are not telling the truth about the KING Abdullah ROAD branch\nplease check it out', '2017-05-25 04:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `mobile`, `area`) VALUES
(15, 'khalid', 'khalid', 'khalid@khalid.com', '9661234567', '1'),
(14, 'aziz', 'aziz', 'aziz@aziz.com', '0550511860', '1'),
(16, 'faisal', 'faisal', 'faisal@faisal.com', '1234567890', '3');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `branche_id`) VALUES
(6, 14, 9),
(5, 14, 5),
(4, 15, 10),
(7, 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `follow_id`) VALUES
(5, 14, 16),
(3, 14, 15),
(6, 15, 16),
(7, 15, 14);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `ingredients` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `img`, `price`, `calories`, `ingredients`, `menu_id`) VALUES
(4, 'Mc Coffee', 'mcdonalds-White-Coffee--Regular.png', 7, 50, 'American Coffee of the day', 6),
(5, 'Mc Eggs', 'McDonalds-Sausage-and-Egg-McMuffin.jpg', 12, 140, 'Bread , eggs , chicken , Cheese.', 6),
(6, 'Big Mc', 'pro_big-mac.png', 18, 650, 'Bread , Beef , Cheese , lettuce, and other Sauces.', 7),
(7, 'Mc Nuggets', 'mcdonalds-20-Chicken-McNuggets-ShareBox.png', 17, 340, 'Boneless Chicken.', 7),
(8, 'Mc Wrap', 'wrap.jpg', 13, 200, 'Bread , Chicken , lettuce , and other sauces.', 7),
(9, 'water', 'water.jpg', 2, 1, 'water', 8),
(10, 'Soft drinks', 'pipse.jpg', 3, 50, 'cold spot drinks', 8),
(11, 'Bucket of Chicken', 'bucket.jpg', 59, 3000, '15 pieces of chicken', 9),
(12, 'Chicken Strips', 'strips.jpg', 15, 400, '4 Pieces of boneless Chicken breast', 9),
(13, 'Coffee of the day', 'Coffee_Open.png', 6, 1, 'American Coffee of the day', 11),
(14, 'Lattee', 'latee Hot.jpg', 12, 20, 'coffee , milk , essperisso', 11),
(15, 'Lattee', 'latte.jpg', 14, 30, 'coffee , milk , essperisso , ice', 12),
(16, 'Mocha', 'cold mocha.gif', 15, 40, 'coffee , milk , espresso , ice, chocolate ', 12),
(17, 'Donuts', 'donut of the day.jpg', 3, 30, 'bread and other flavors', 13),
(18, 'CaffÃ¨ Americano', 'starbucks_coffee_2.png', 15, 1, 'Espresso shots are topped with hot water to produc', 14),
(19, 'CaffÃ© Latte', '883f671435593a057afac6535d5c9f48.jpg', 20, 21, 'rich espresso balanced with steamed milk ', 14),
(20, 'Latte Macchiatio', 'CaramelMacchiato_m_4.jpg', 25, 40, 'espresso shots slowly poured over lightly aerated ', 14),
(21, 'Shaken Sweet Tea', 'icedshakenblacktea.jpg', 28, 35, 'TeavanaÂ® black iced tea brewed double-strength', 14),
(22, 'Lamb Chops', 'thumb_600-.jpg', 120, 200, ' Marinated In Mint & Lime Fire Grilled & Served Ov', 17),
(23, 'Polo alla Grigila', '10261176_239635149574999_2006573216_n.jpg', 200, 300, ' Grilled Chicken With Roasted Mushrooms, Fresh Hor', 17),
(24, 'Cassic Lasagna', 'd91071fa02cbf502ff12eb3b2a177671.jpg', 90, 220, ' Beef Bolognese & Parmesan Crust Drizzled With Chi', 18),
(25, 'Classic Margherita', 'Classic Margherita.jpg', 120, 300, 'Classic Margherita', 18),
(27, 'Baby Gem Salad', 'fancy-salad.jpg', 55, 20, '  Fresh Baby Gem Lettuce Heads, Deviled Eggs & Cro', 19),
(28, 'Caesar Salad', '20131009-caesar-salad-food-lab-11.jpg', 49, 17, 'Lettuce, Parmesan & Croutons In A Creamy Caesar Dr', 19),
(29, 'Crispy Chicken Salad', '579x441_CrispyChickenCornbreadSalad_Hero.png', 39, 16, ' Honey Balsamic, Mixed Leaves & Parmesan Ranch Dre', 19),
(30, 'Coca Cola', 'Coca cola.jpg', 10, 50, 'Cola', 20),
(31, 'Fanta', 'Fanta.jpg', 10, 30, 'Fanta', 20),
(32, 'Sprite', 'Sprite .jpg', 10, 30, 'Sprite', 20),
(33, 'Butter Croissant', '-1x-1.jpg', 16, 40, ' made with 100 percent butter', 15),
(34, 'Chinga Bagel', '81982080.jpg', 22, 20, ' Cheddar cheese, poppy seeds, sesame seeds, onion ', 15),
(35, 'Chocolate Marble Cake -- ', '25b50f7176a28d7aae3c42f3f3a74d24.jpg', 21, 34, ' vanilla and chocolate', 15),
(36, 'Egg Salad Sandwich', 'copycat-starbucks-egg-salad-sandwich-text.jpg', 27, 30, 'egg salad mixed with chives and arugula on cider w', 15),
(37, 'Tomato & Mozzarella Panini', 'DSC06853.jpg', 25, 20, 'tomatoes, mozzarella, spinach and basil ', 15),
(38, 'Berry Yogurt', 'Evolution-Strawberry.jpg', 18, 30, ' yogurt, sliced strawberries, whole blueberries, r', 16),
(39, 'Blueberries & Honey Yogurt', '3C7RAU028B3FFB4B3AFE29mx.jpg', 18, 40, 'Blueberries, pure honey and crunchy honey oat gran', 16),
(40, 'Fruit Salad', 'thumb_600.jpg', 24, 5, 'delicious medley of seasonal fruit', 16),
(41, 'Lemon Chiffon Yogurt', '25cd8c1792a8e2f4f0b300900cb0caa6.jpg', 20, 20, ' whole- milk yogurt, flavorful vanilla, lemon curd', 16);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `place_id`) VALUES
(9, 'Main', 5),
(8, 'other items', 4),
(7, 'Main', 4),
(6, 'Breakfast', 4),
(11, 'Hot Drinks', 6),
(12, 'Cold Drinks', 6),
(13, 'Donuts', 6),
(14, 'Drinks', 7),
(15, 'Food', 7),
(16, 'Yogurt, Fruit & Spreads', 7),
(17, 'Grills', 8),
(18, 'Pizza & Pasta', 8),
(19, 'Salad', 8),
(20, 'Soft Drinks', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `readed` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `content`, `date`, `readed`, `user_id`) VALUES
(1, 'new Comment has been added from your friend : aziz on branche : <a href=\'show_branche_details.php?id=5\'> Show Branche</a>', '2017-05-25 01:47:47', 1, 15),
(2, 'new Comment has been added from your friend : aziz on branche : <a href=\'show_branche_details.php?id=9\'> Show Branche</a>', '2017-05-25 04:48:21', 1, 15),
(3, 'new Comment has been added from your friend : khalid on branche : <a href=\'show_branche_details.php?id=9\'> Show Branche</a>', '2017-05-25 06:33:43', 0, 16),
(4, 'new Comment has been added from your friend : khalid on branche : <a href=\'show_branche_details.php?id=9\'> Show Branche</a>', '2017-05-25 06:34:15', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `username`, `password`, `email`, `mobile`) VALUES
(13, 'Mac Owner', 'macowner', 'MacOwner@MacOwner.com', '9661231235'),
(14, 'KFC DD Owner', 'KFCDDOwner', 'KFCDDOwner@KFCDDOwner.com', '9661234567'),
(15, 'StarbucksOwner', 'starbucksowner', 'StarbucksOwner@StarbucksOwner.com', '0096612345'),
(16, 'NinoOwner', 'ninoowner', 'NinoOwner@NinoOwner.com', '0550511860');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `price`, `type`, `user_id`) VALUES
(4, 'McDonlads', '$$$', 'Restaurant', 13),
(5, 'KFC', '$$$', 'Restaurant', 14),
(6, 'Dunkin Donuts', '$', 'Coffee', 14),
(7, 'Starbucks', '$$$', 'Coffee', 15),
(8, 'NINO', '$$$$$', 'Restaurant', 16);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `branche_id`, `result`, `user_id`) VALUES
(1, 10, 4, 14),
(2, 5, 3, 14),
(3, 5, 5, 15),
(4, 9, 3, 14),
(5, 9, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `branche_id`, `content`, `customer_id`) VALUES
(2, 10, '2:00 pm today', 14),
(3, 10, 'Make a reservation for me at 6 pm\r\nfor 5 people.', 14),
(4, 10, '25/6/2016 at 5:00 pm', 15);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `content`, `user_id`, `branche_id`, `created`) VALUES
(1, 'this place is amazing and the food is fine, but the services are poor', 14, 10, '2017-05-25'),
(2, 'best coffee ever', 14, 5, '2017-05-25'),
(3, 'the coffee is not so bad and not so good either', 14, 9, '2017-05-25'),
(4, 'This is a great place and i will come here again 5/5', 15, 10, '2017-05-25'),
(5, 'its good', 15, 9, '2017-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`id`, `likes`, `dislikes`, `review_id`, `user_id`) VALUES
(1, 1, 0, 1, 15),
(2, 1, 0, 1, 16),
(3, 1, 0, 4, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branche`
--
ALTER TABLE `branche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compliant`
--
ALTER TABLE `compliant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `branche`
--
ALTER TABLE `branche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `compliant`
--
ALTER TABLE `compliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
