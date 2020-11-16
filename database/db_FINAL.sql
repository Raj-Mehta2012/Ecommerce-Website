-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.byetcluster.com
-- Generation Time: Oct 01, 2020 at 09:34 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unaux_26835205_cakenbake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Mc Vities Digestive Biscuits(8 pc)', 'cookie1', 'Images/cookie1.png', 30),
(2, 'Red Velvet White chocolate chip cookies(8 pc)', 'cookie2', 'Images/cookie2.png', 40),
(3, 'Gems Brown Cookies(8 pc)', 'cookie3', 'Images/cookie3.png', 60),
(4, 'Brown Cashew Cookies(8 pc)', 'cookie4', 'Images/cookie4.png', 40),
(5, 'Choco-Chip Cookies(8 pc)', 'cookie5', 'Images/cookie5.png', 35),
(6, 'Almond Cashew Baked Cookies (8 pc)\r\n', 'cookie6', 'Images/cookie6.png', 40),
(7, 'Challah Bread (2 pc)', 'bread1', 'Images/bread1.png', 40),
(8, 'Ciabatta Bread (2 pc)', 'bread2', 'Images/bread2.png', 45),
(9, 'Croissant Bread(2 pc)', 'bread3', 'Images/bread3.png', 60),
(10, 'Banana Bread slice(2 pc)', 'bread4', 'Images/bread4.png', 35),
(11, 'Roll Bread(2 pc)', 'bread5', 'Images/bread5.png', 40),
(12, 'Sour Dough bread (2 pc)', 'bread6', 'Images/bread6.png', 55),
(13, 'Whole Wheat Bread Slice(12 pc)', 'bread7', 'Images/bread7.png', 35),
(14, 'Brioche Multigrain Bread(2 pc) ', 'bread8', 'Images/bread8.png', 35),
(15, 'Mango Chocolate Walnut Cake (1 Kg)', 'cake1', 'Images/cake1.png', 500),
(16, ' Fudge Brownie Cake (1 kg)', 'cake2', 'Images/cake2.png', 450),
(17, 'Double Decker Fruit Cake (1 Kg)', 'cake3', 'Images/cake3.png', 700),
(18, 'KitKat Chocolte Cake (1 Kg)', 'cake4', 'Images/cake4.png', 650),
(19, 'Marshmallow Candy Cake (1 Kg)', 'cake5', 'Images/cake5.png', 400),
(20, 'Choco Strawberry Passion Cake (1 Kg)', 'cake6', 'Images/cake6.png', 450),
(21, 'Vanilla Rainbow Cake (1 Kg)', 'cake7', 'Images/cake7.png', 400),
(22, 'Center Filled Hearts Chocolate (50 gm)', 'chocolate1', 'Images/chocolate1.png', 40),
(23, 'Milk Chocolate Hearts (50 gm)', 'chocolate2', 'Images/chocolate2.png', 40),
(24, 'Hazelnut Bliss Chocolate (50 gm)', 'chocolate3', 'Images/chocolate3.png', 35),
(25, 'Dark Chocolate (50 gm)', 'chocolate4', 'Images/chocolate4.png', 45),
(26, 'Blueberry Fill Chocolate (50 gm)', 'chocolate5', 'Images/chocolate5.png', 45),
(27, 'Coriander Pad Thai Chutney(1 N)', 'sauce1', 'Images/sauce1.png', 80),
(28, 'Marinara Sauce (1 N)', 'sauce2', 'Images/sauce2.png', 80),
(29, 'Stewed Tomatoes (1 N)', 'sauce3', 'Images/sauce3.png', 80),
(30, 'Gazpacho Sauce (1 N)', 'sauce4', 'Images/sauce4.png', 40),
(31, 'Chinese Sweet Chili Sauce (1 N)', 'sauce5', 'Images/sauce5.png', 40),
(32, 'Tangy Tomato Sauce (1 N)', 'sauce6', 'Images/sauce6.png', 40),
(33, 'Mustard Sauce (1 N)', 'sauce7', 'Images/sauce7.png', 40),
(34, 'Vanilla Candy Cupcake(2 pc)', 'cupcake1', 'Images/cupcake1.png', 60),
(35, 'Choco Chip Muffin(2 pc) ', 'cupcake2', 'Images/cupcake2.png', 55),
(36, 'Strawberry frost Cupcake(2 pc)', 'cupcake3', 'Images/cupcake3.png', 50),
(37, 'Tutty Fruity Truffle(2 pc)', 'cupcake4', 'Images/cupcake4.png', 40),
(38, 'Choco Orange Cupcake(2 pc)', 'cupcake5', 'Images/cupcake5.png', 50),
(39, 'Almond Walnut Muffin(2 pc)', 'cupcake6', 'Images/cupcake6.png', 50),
(40, 'Vanilla Cherry Cupcake(2 pc)', 'cupcake7', 'Images/cupcake7.png', 50),
(41, 'Chocolate Brownie Cupcake(2 pc)', 'cupcake8', 'Images/cupcake8.png', 70),
(42, 'Rainbow Candy Cupcake(2 pc)', 'cupcake9', 'Images/cupcake9.png', 50),
(43, 'Banana Cupcake(2 pc)', 'cupcake10', 'Images/cupcake10.png', 60),
(44, 'Red Velvet Cream Cupcake(2 pc)', 'cupcake11', 'Images/cupcake11.png', 50);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(30) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `code`) VALUES
('Cakes', 'cake'),
('Cupcakes', 'cupcake'),
('Cookies', 'cookie'),
('Chocolates', 'chocolate'),
('Breads', 'bread'),
('Sauces', 'sauce');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `subject`, `message`) VALUES
('sdf', 'vt@gmail.com', 'vdfs', 'dferwrt');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` int(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `mobile_no`, `address`, `email`) VALUES
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', ''),
(0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `nop` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price_unit` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `nop`, `qty`, `price_unit`) VALUES
(12, 'ORDS6720200930104110', 'Mango Chocolate Walnut Cake (1 Kg)\r\n', 1, 500),
(11, 'ORDS6720200930103945', 'KitKat Chocolte Cake (1 Kg)', 1, 650),
(10, 'ORDS6720200930103945', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(9, 'ORDS6720200930103945', ' Fudge Brownie Cake (1 kg)', 1, 450),
(8, 'ORDS6720200930103945', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(13, 'ORDS6720200930104110', ' Fudge Brownie Cake (1 kg)', 1, 450),
(14, 'ORDS6720200930104110', 'Double Decker Fruit Cake (1 Kg)', 1, 700),
(15, 'ORDS6720200930104110', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(16, 'ORDS6720200930104110', 'Vanilla Rainbow Cake (1 Kg)', 1, 400),
(17, 'ORDS6720200930104210', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(18, 'ORDS6720200930104210', ' Fudge Brownie Cake (1 kg)', 1, 450),
(19, 'ORDS6720200930104210', 'Double Decker Fruit Cake (1 Kg)', 1, 700),
(20, 'ORDS6720200930104210', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(21, 'ORDS6720200930104210', 'Vanilla Rainbow Cake (1 Kg)', 1, 400),
(22, 'ORDS6720200930104210', 'Choco Strawberry Passion Cake (1 Kg)', 1, 450),
(23, 'ORDS6720200930105108', 'Challah Bread (2 pc)', 1, 40),
(24, 'ORDS6720200930105108', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(25, 'ORDS6720200930105108', 'Mc Vities Digestive Biscuits(8 pc)', 1, 30),
(26, 'ORDS6720200930105108', 'Gems Brown Cookies(8 pc)', 1, 60),
(27, 'ORDS6720200930105108', 'Challah Bread (2 pc)', 1, 40),
(28, 'ORDS6720200930105108', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(29, 'ORDS6720200930105108', 'Mc Vities Digestive Biscuits(8 pc)', 1, 30),
(30, 'ORDS6720200930105108', 'Gems Brown Cookies(8 pc)', 1, 60),
(31, 'ORDS6720200930105224', 'Challah Bread (2 pc)', 1, 40),
(32, 'ORDS6720200930105224', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(33, 'ORDS6720200930105224', 'Mc Vities Digestive Biscuits(8 pc)', 1, 30),
(34, 'ORDS6720200930105224', 'Gems Brown Cookies(8 pc)', 1, 60),
(35, 'ORDS6820200930115113', 'Center Filled Hearts Chocolate (50 gm)', 1, 40),
(36, 'ORDS6820200930115113', 'Milk Chocolate Hearts (50 gm)', 1, 40),
(37, 'ORDS6820200930020933', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(38, 'ORDS6820200930020933', 'Milk Chocolate Hearts (50 gm)', 1, 40),
(39, 'ORDS6820200930020933', 'Ciabatta Bread (2 pc)', 1, 45),
(40, 'ORDS6820200930022152', 'Double Decker Fruit Cake (1 Kg)', 1, 700),
(41, 'ORDS6820200930022152', 'KitKat Chocolte Cake (1 Kg)', 1, 650),
(42, 'ORDS7020200930040410', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(43, 'ORDS7020200930040410', ' Fudge Brownie Cake (1 kg)', 1, 450),
(44, 'ORDS7020200930040543', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(45, 'ORDS7020200930040543', ' Fudge Brownie Cake (1 kg)', 1, 450),
(46, 'ORDS7020200930040543', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(47, 'ORDS6720200930041628', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(48, 'ORDS6720200930041628', ' Fudge Brownie Cake (1 kg)', 1, 450),
(49, 'ORDS6720200930041628', 'Milk Chocolate Hearts (50 gm)', 1, 40),
(50, 'ORDS6720200930041628', 'Center Filled Hearts Chocolate (50 gm)', 1, 40),
(51, 'ORDS6720200930041628', 'Hazelnut Bliss Chocolate (50 gm)', 1, 35),
(52, 'ORDS6720200930043352', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(53, 'ORDS6720200930043352', ' Fudge Brownie Cake (1 kg)', 25, 450),
(54, 'ORDS6720200930043352', 'Milk Chocolate Hearts (50 gm)', 1, 40),
(55, 'ORDS6720200930043352', 'Center Filled Hearts Chocolate (50 gm)', 1, 40),
(56, 'ORDS6720200930043352', 'Hazelnut Bliss Chocolate (50 gm)', 1, 35),
(57, 'ORDS7220200930105407', ' Fudge Brownie Cake (1 kg)', 1, 450),
(58, 'ORDS7220200930105407', 'Croissant Bread(2 pc)', 2, 60),
(59, 'ORDS7220200930105407', 'Blueberry Fill Chocolate (50 gm)', 5, 45),
(60, 'ORDS7220200930105407', 'Banana Cupcake(2 pc)', 2, 60),
(61, 'ORDS7220200930105407', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(62, 'ORDS7220200930105407', 'Stewed Tomatoes (1 N)', 1, 80),
(63, 'ORDS6720200930114102', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(64, 'ORDS6720200930114102', ' Fudge Brownie Cake (1 kg)', 1, 450),
(65, 'ORDS6720200930114102', 'KitKat Chocolte Cake (1 Kg)', 1, 650),
(66, 'ORDS6720200930114102', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(67, 'ORDS6720200930114102', 'Double Decker Fruit Cake (1 Kg)', 1, 700),
(68, 'ORDS6720200930114711', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(69, 'ORDS6720200930114711', ' Fudge Brownie Cake (1 kg)', 1, 450),
(70, 'ORDS6720200930114711', 'KitKat Chocolte Cake (1 Kg)', 1, 650),
(71, 'ORDS6720200930114711', 'Marshmallow Candy Cake (1 Kg)', 1, 400),
(72, 'ORDS6720200930114711', 'Double Decker Fruit Cake (1 Kg)', 1, 700),
(73, 'ORDS6720200930114711', 'Ciabatta Bread (2 pc)', 1, 45),
(74, 'ORDS6720200930114711', 'Challah Bread (2 pc)', 1, 40),
(75, 'ORDS6720200930114711', 'Croissant Bread(2 pc)', 1, 60),
(76, 'ORDS6720200930114907', 'Center Filled Hearts Chocolate (50 gm)', 1, 40),
(77, 'ORDS6720200930114907', 'Milk Chocolate Hearts (50 gm)', 1, 40),
(78, 'ORDS6720201001012350', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(79, 'ORDS6720201001012724', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(80, 'ORDS6720201001015608', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(81, 'ORDS6720201001015608', ' Fudge Brownie Cake (1 kg)', 1, 450),
(82, 'ORDS6720201001015946', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(83, 'ORDS6720201001015946', ' Fudge Brownie Cake (1 kg)', 1, 450),
(84, 'ORDS6720201001015946', 'Ciabatta Bread (2 pc)', 1, 45),
(85, 'ORDS6720201001015946', 'Mc Vities Digestive Biscuits(8 pc)', 1, 30),
(86, 'ORDS6720201001015946', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(87, 'ORDS6720201001020144', 'Mango Chocolate Walnut Cake (1 Kg)', 1, 500),
(88, 'ORDS6720201001020144', 'Red Velvet White chocolate chip cookies(8 pc)', 1, 40),
(89, 'ORDS6720201001020144', 'Gems Brown Cookies(8 pc)', 10, 60),
(90, 'ORDS6720201001020322', 'Mc Vities Digestive Biscuits(8 pc)', 150, 30);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` varchar(255) NOT NULL,
  `person_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `amount` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `person_id`, `name`, `phone`, `amount`, `address`, `date`) VALUES
('ORDS6720200930103945', 67, 'jigar', '9702940610', 2240, 'Mumbai', '30-09-2020'),
('ORDS6720200930104110', 67, 'jigar', '9702940610', 2744, 'Mumbai', '30-09-2020'),
('ORDS6720200930104210', 67, 'jigar', '9702940610', 3248, 'Punjab', '30-09-2020'),
('ORDS6720200930105108', 67, 'jigar', '9702940610', 190, 'Mumbai', '30-09-2020'),
('ORDS6720200930105224', 67, 'jigar', '9702940610', 190, 'Mumbai', '30-09-2020'),
('ORDS6820200930115113', 68, 'Vatsal', '9416667199', 90, 'huda', '30-09-2020'),
('ORDS6820200930020933', 68, 'Vatsal', '9416667199', 655, 'huda', '30-09-2020'),
('ORDS6820200930022152', 68, 'Vatsal', '9416667199', 1512, 'huda', '30-09-2020'),
('ORDS7020200930040410', 70, 'Gaurav', '', 1064, 'Mumbai', '30-09-2020'),
('ORDS7020200930040543', 70, 'Gaurav', '', 1512, 'Mumbai', '30-09-2020'),
('ORDS6720200930041628', 67, 'Jigar', '', 1193, 'Ghatkopar(W), Mumbai', '30-09-2020'),
('ORDS6720200930043352', 67, 'Jigar', '', 13289, 'Ghatkopar(W), Mumbai', '30-09-2020'),
('ORDS7220200930105407', 72, 'raj', '', 1159, '12 suya, 12681 dwiopsd', '30-09-2020'),
('ORDS6720200930114102', 67, 'Mukesh', '5555555555', 3024, 'Antilla', '30-09-2020'),
('ORDS6720200930114711', 67, 'Jigar', '4554455454', 3186, 'Ghatkopar(W), Mumbai', '30-09-2020'),
('ORDS6720200930114907', 67, 'Jigar', '4554455454', 90, 'Ghatkopar(W), Mumbai', '30-09-2020'),
('ORDS6720201001012350', 67, 'Jigar Kurani', '4554455454', 560, 'Mumbai', '01-10-2020'),
('ORDS6720201001012724', 67, 'Jigar', '4554455454', 560, 'Mumbai', '01-10-2020'),
('ORDS6720201001015608', 67, 'Jigar', '4554455454', 1064, 'Ghatkopar(W), Mumbai', '01-10-2020'),
('ORDS6720201001015946', 67, 'Jigar', '4554455454', 1193, 'Ghatkopar(W), Mumbai', '01-10-2020'),
('ORDS6720201001020144', 67, 'Jigar Kurani', '4554455454', 1277, 'Ghatkopar(W), Mumbai', '01-10-2020'),
('ORDS6720201001020322', 67, 'Mukesh', '4554455454', 5040, 'Antilla', '01-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Personid` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Mobile_Number` varchar(15) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Personid`, `Name`, `Address`, `Mobile_Number`, `Email`, `Password`) VALUES
(67, 'Jigar', 'Mumbai', '9702940610', 'abc@international.com', '$2y$10$tBZxyRC71.mHkyIuz5u41.HVO7CeFhQHH20FyLRmxzwVkAzfoBBVy'),
(68, 'Vatsal', 'huda', '9416667199', 'vatsal.2000.07@gmail.com', '$2y$10$.d3pIGCFKgLmEZpo.E9dreRXkXxR.AGSdh4wBTfCWN9ggsXc7i49u'),
(69, 'Gaurav', 'Hawa mahal,jaipur,rajasthan', '9119322221', 'gr@gmail.com', '$2y$10$hcdVVqwcJplio/.Ps8R4.uCrOo3wQUhyJXEa8cCBzobrvjAtZxgQK'),
(72, 'Raj', '12 siqa dduiq dsqw,dwq duiq', '9987819208', 'raj@gmail.com', '$2y$10$pm3tG6.0wM/N/7LP9Y7W7.odKyVyL8e/JaGi0m8jpM1hNDfzHJ1i2'),
(71, 'Donald', 'USA', '1111111111', 'donald@us.com', '$2y$10$LtFdJx9MuaaIC96yzhJUseU2iusURanAXGyK/W7r9JLftoZz3y7..'),
(73, 'Aaron', 'ChurchView, Vasai West - 401201', '9970407365', 'gaaronlazarus@gmail.com', '$2y$10$8cD/FkYxqTNLlrtY/TL8DeeSFjoxoUXia31tqMZazao8b.bRMfM86');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Personid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
