-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 07:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`uid`, `id`, `product_name`, `product_price`, `product_image`, `product_id`, `qty`, `total_price`, `userid`) VALUES
(0, 88, 'woodland animal wreath', 300, 'woodland-animal-wreath.jpg', 29, 1, '300', 2),
(0, 90, 'Share The Joy with Mary', 300, 'Share-The-Joy-with-Mary.jpg', 27, 1, '300', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `idDealer` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `didDealer` varchar(255) NOT NULL,
  `emailDealer` varchar(2552) NOT NULL,
  `pwdDealer` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`idDealer`, `first_name`, `last_name`, `didDealer`, `emailDealer`, `pwdDealer`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'harsh', 'harsh', 'harsh', 'harsh@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0'),
(4, 'satyansh', 'singh', 'satyansh', 'satyansh@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0'),
(6, 'Dealer', 'Dealer', 'dealer', 'dealer@gmail.com', '040ec1ee950ffc53291f6df0ffc30325', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paymode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `ammount_paid` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `paymode`, `products`, `ammount_paid`, `userid`) VALUES
(14, 'harsh', 'harsh@gmail.com', '9922576367', 'mumbai', 'netbanking', 'bouquet of flowers(100),unicorns and rainbows(1),wild animals(1),strings of lights(1)', '25900', 8),
(15, 'satyansh', '', '1234567890', 'mumbai', 'cards', 'Mood Music(1),hola beaches(1),glitter disco(1)', '900', 8),
(16, 'Dhruv Rajput', '', '9922576367', 'mumbai, Maharashtra', 'netbanking', 'woodland animal wreath(1),Share The Joy with Mary(1),wild animals(1),unicorns and rainbows(1),strings of lights(1),outer space(1),luxe balloons(1),indigo flowers(1),Mood Music(1),hola beaches(1),glitter disco(1),disco ball(1),champagne fountain(1),art par', '4200', 9),
(17, 'sgd', 'dhruv@gmail.com', '36633572', 'fshsdh hgsjds hsxh534df', 'cards', 'woodland animal wreath(1),Share The Joy with Mary(1),wild animals(1),unicorns and rainbows(1),strings of lights(1),outer space(1),luxe balloons(1),indigo flowers(1),winter rose(100),swirls and frames purple(1),indian paisley & birds(1)', '33000', 9),
(18, 'satyansh', '', '9922576365', 'mumbai', 'cod', 'woodland animal wreath(1),Share The Joy with Mary(1),wild animals(1),unicorns and rainbows(1),strings of lights(1),outer space(1),luxe balloons(1),indigo flowers(1)', '2400', 8),
(19, 'darshan', 'admin@gmail.com', '9922576367', 'mumbai', 'cod', 'woodland animal wreath(1),Share The Joy with Mary(1),wild animals(1),unicorns and rainbows(1),strings of lights(1),outer space(1),luxe balloons(1),indigo flowers(1)', '2400', 8),
(20, 'harsh', 'admin@gmail.com', '9922576367', 'mumbai', 'Cash on Dilevery', 'woodland animal wreath(1),Share The Joy with Mary(1),wild animals(1),unicorns and rainbows(1),strings of lights(1),outer space(1),luxe balloons(1)', '2100', 8),
(21, 'DEMO NAME', 'DEMO@GMAIL.COM', '1234567890', 'DEMO,CITY,COUNTRY', 'Netbanking', 'woodland animal wreath(1),Share The Joy with Mary(1),outer space(2),art party(10),wild animals(5),bouquet of flowers(1),Climbing roses(3)', '6900', 8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `category` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_template` varchar(255) NOT NULL,
  `product_template_clear` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dealer` int(255) NOT NULL,
  `avail_stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `product_name`, `product_template`, `product_template_clear`, `price`, `discount`, `size`, `description`, `dealer`, `avail_stock`) VALUES
(10, 1, 'bouquet of flowers', 'bouquet-of-flowers.jpg', 'bouquet-of-flowers-clear.jpg', 300, 50, '56', 'bouquet-of-flowers', 1, 1500),
(11, 1, 'Climbing roses', 'climbing-roses.jpg', 'climbing-roses-clear.jpg', 300, 50, '56', 'climbing roses', 1, 1500),
(12, 1, 'disco ball', 'disco-ball.jpg', 'disco-ball-clear.jpg', 300, 50, '56', 'disco ball', 1, 1500),
(13, 1, 'Eat Drink Dance', 'Eat-Drink-Dance.jpg', 'Eat-Drink-Dance-clear.jpg', 300, 50, '56', 'Eat Drink Dance', 1, 1500),
(14, 1, 'gold polygon', 'gold-polygon.jpg', 'gold-polygon-clear.jpg', 300, 50, '56', 'gold polygon', 1, 1500),
(15, 1, 'indigo flowers', 'indigo-flowers.jpg', 'indigo-flowers-clear.jpg', 300, 50, '56', 'indigo flowers', 1, 1500),
(16, 1, 'luxe balloons', 'luxe-balloons.jpg', 'luxe-balloons-clear.jpg', 300, 50, '56', 'luxe balloons', 1, 1500),
(17, 1, 'outer space', 'outer-space.jpg', 'outer-space-clear.jpg', 300, 50, '56', 'outer space', 1, 1500),
(18, 1, 'strings of lights', 'strings-of-lights.jpg', 'strings-of-lights-clear.jpg', 300, 50, '56', 'strings of lights', 1, 1500),
(19, 1, 'unicorns and rainbows', 'unicorns-and-rainbows.jpg', 'unicorns-and-rainbows-clear.jpg', 300, 50, '56', 'unicorns and rainbows', 1, 1500),
(20, 1, 'wild animals', 'wild-animals.jpg', 'wild-animals-clear.jpg', 300, 50, '56', 'wild animals', 1, 1500),
(21, 2, 'babyboy stuff and glitter', 'babyboy-stuff-and-glitter.jpg', 'babyboy-stuff-and-glitter-clear.jpg', 300, 50, '56', 'babyboy stuff and glitter', 1, 1500),
(22, 2, 'babygirl stuff and glitter', 'babygirl-stuff-and-glitter.jpg', 'babygirl-stuff-and-glitter-clear.jpg', 300, 50, '56', 'babygirl stuff and glitter', 1, 1500),
(23, 2, 'baby shower floral letters', 'baby-shower-floral-letters.jpg', 'baby-shower-floral-letters-clear.jpg', 300, 50, '56', 'baby shower floral letters', 1, 1500),
(24, 2, 'elegant elephant', 'elegant-elephant.jpg', 'elegant-elephant-clear.jpg', 300, 50, '56', 'elegant elephant', 1, 1500),
(25, 2, 'floral glitter balloon', 'floral-glitter-balloon.jpg', 'floral-glitter-balloon-clear.jpg', 300, 50, '56', 'floral glitter balloon', 1, 1500),
(26, 2, 'it\'s a girl', 'its-a-girl-floral-letters.jpg', 'its-a-girl-floral-letters-clear.jpg', 300, 50, '56', 'it\'s a girl', 1, 1500),
(27, 2, 'Share The Joy with Mary', 'Share-The-Joy-with-Mary.jpg', 'Share-The-Joy-with-Mary-clear.jpg', 300, 50, '56', 'Share The Joy with Mary', 1, 1500),
(28, 2, 'toy airplane', 'toy-airplane.jpg', 'toy-airplane-clear.jpg', 300, 50, '56', 'toy airplane', 1, 1500),
(29, 2, 'woodland animal wreath', 'woodland-animal-wreath.jpg', 'woodland-animal-wreath-clear.jpg', 300, 50, '56', 'woodland animal wreath', 1, 1500),
(30, 3, 'art party', 'art-party.jpg', 'art-party-clear.jpg', 300, 50, '56', 'art party', 1, 1500),
(31, 3, 'champagne fountain', 'champagne-fountain.jpg', 'champagne-fountain-clear.jpg', 300, 50, '56', 'champagne fountain', 1, 1500),
(32, 3, 'disco ball', 'disco-ball.jpg', 'disco-ball-clear.jpg', 300, 50, '56', 'disco ball', 1, 1500),
(33, 3, 'glitter disco', 'glitter-disco.jpg', 'glitter-disco-clear.jpg', 300, 50, '56', 'glitter disco', 1, 1500),
(34, 3, 'hola beaches', 'hola-beaches.jpg', 'hola-beaches-clear.jpg', 300, 50, '56', 'hola beaches', 1, 1500),
(35, 3, 'Mood Music', 'Mood-Music.jpg', 'Mood-Music-clear.jpg', 300, 50, '56', 'Mood Music', 1, 1500),
(36, 3, 'sparkling mason jar lights', 'sparkling-mason-jar-lights.jpg', 'sparkling-mason-jar-lights-clear.jpg', 300, 50, '56', 'sparkling mason jar lights', 1, 1500),
(37, 3, 'white string lights', 'white-string-lights.jpg', 'white-string-lights-clear.jpg', 300, 50, '56', 'white string lights', 1, 1500),
(38, 3, 'winter wreath', 'winter-wreath.jpg', 'winter-wreath-clear.jpg', 300, 50, '56', 'winter wreath', 1, 1500),
(39, 4, 'boho bordo flowers', 'boho-bordo-flowers.jpg', 'boho-bordo-flowers-clear.jpg', 300, 50, '56', 'boho bordo flowers', 4, 1500),
(40, 4, 'boho chich burgundy', 'boho-chich-burgundy.jpg', 'boho-chich-burgundy-clear.jpg', 300, 50, '56', 'boho chich burgundy', 4, 1500),
(41, 4, 'deep blue sea', 'deep-blue-sea.jpg', 'deep-blue-sea-clear.jpg', 300, 50, '56', 'deep blue sea', 4, 1500),
(42, 4, 'elegant henna', 'elegant-henna.jpg', 'elegant-henna-clear.jpg', 300, 50, '56', 'elegant henna', 4, 1500),
(43, 4, 'gold foil roses', 'gold-foil-roses.jpg', 'gold-foil-roses-clear.jpg', 300, 50, '56', 'gold foil roses', 4, 1500),
(44, 4, 'indian lovers', 'indian-lovers.jpg', 'indian-lovers-clear.jpg', 300, 50, '56', 'indian lovers', 4, 1500),
(45, 4, 'indian paisley & birds', 'indian-paisley-&-birds.jpg', 'indian-paisley-&-birds-clear.jpg', 300, 50, '56', 'indian paisley & birds', 4, 1500),
(46, 4, 'swirls and frames purple', 'swirls-and-frames-purple.jpg', 'swirls-and-frames-purple-clear.jpg', 300, 50, '56', 'swirls and frames purple', 4, 1500),
(47, 4, 'winter rose', 'winter-rose.jpg', 'winter-rose-clear.jpg', 300, 50, '56', 'winter rose', 4, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `cards` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `category_name`, `cards`) VALUES
(1, 'Birthday', 11),
(2, 'Baby Shower', 9),
(3, 'Party', 9),
(4, 'Wedding', 9);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `site_description` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `footer_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `site_description`, `contact`, `email`, `location`, `footer_description`) VALUES
(1, 'CardPlay', 'logo.jpg', 'CardPlay is an invitation selling company which has a sole purpose of providing convenience and ease of buying invitation cards for their customers', '9922576367', 'info@cardplay.com', 'Mumbai, 400001, MAHARASTRA, INDIA.', '© 2020 PlayCard. All rights reserved | Design by <a href=\"https://github.com/HarshRajput-37\" target=\"_blank\">CardPlay</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUsers` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `uidUsers` varchar(255) NOT NULL,
  `emailUsers` varchar(255) NOT NULL,
  `pwdUsers` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUsers`, `first_name`, `last_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `address`) VALUES
(8, 'harsh', 'rajput', 'harsh', 'admin@gmail.com', '$2y$10$JItsPtkfVG0XkpTugk1EG.5DHFSnwfg9fLADNFH4ESIMPYelYIbdO', 'DEMO,CITY,COUNTRY'),
(9, 'dhruv', 'rajput', 'dhruv', 'dhruv@gmail.com', '$2y$10$JItsPtkfVG0XkpTugk1EG.5DHFSnwfg9fLADNFH4ESIMPYelYIbdO', 'mumbai,maharashtra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`idDealer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `idDealer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUsers` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
