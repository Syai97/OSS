-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 08:23 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_online`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `imageInsert` (IN `getName` VARCHAR(200), IN `getPath` VARCHAR(100), IN `getType` VARCHAR(100), IN `getId` INT)  BEGIN
INSERT INTO img (imgname, path, type, itemid) values (getName, getPath, getType, geId);






END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paymentInsert` (IN `getProof` VARCHAR(200), IN `getPath` VARCHAR(200), IN `getUserid` INT, IN `getOrdersId` INT)  BEGIN
INSERT INTO payment (paymentproof, proofpath, userid, ordersid) values (getProof, getPath, getUserid, getOrdersId);






END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `imgid` int(11) NOT NULL,
  `imgname` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `itemid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`imgid`, `imgname`, `path`, `type`, `itemid`) VALUES
(3, 'hr_465-019-00_uppercut-monster-hold-pomade.jpg', 'pics/hr_465-019-00_uppercut-monster-hold-pomade.jpg', 'image/jpeg', 22),
(4, 'Kent_Handmade_Combs_135mm_Pocket_Comb_1392971188.png', 'pics/Kent_Handmade_Combs_135mm_Pocket_Comb_1392971188.png', 'image/png', 2),
(5, 'download.jpe', 'pics/download.jpe', 'image/jpeg', 3),
(6, '02-01P_Chicken-Breakfast-Sausages-400g.png', 'pics/02-01P_Chicken-Breakfast-Sausages-400g.png', 'image/png', 4),
(7, '20150818-coffee-beans-shutterstock_71813833.jpg', 'pics/20150818-coffee-beans-shutterstock_71813833.jpg', 'image/jpeg', 5),
(8, 'maxresdefault-1.jpg', 'pics/maxresdefault-1.jpg', 'image/jpeg', 6),
(9, '943b264a-18d3-46d5-9ea4-6d755aa73c93_1.de1135ab5b0224eb26fb5d8deab9d5f6.jpeg', 'pics/943b264a-18d3-46d5-9ea4-6d755aa73c93_1.de1135ab5b0224eb26fb5d8deab9d5f6.jpeg', 'image/jpeg', 7),
(10, '7f68737e-f5b8-450c-af1a-7c04f173b801_2.60d5bafac7e40fc1f9421af632542327.jpeg', 'pics/7f68737e-f5b8-450c-af1a-7c04f173b801_2.60d5bafac7e40fc1f9421af632542327.jpeg', 'image/jpeg', 8),
(11, 'spin_prod_1195838612.jpe', 'pics/spin_prod_1195838612.jpe', 'image/jpeg', 9),
(12, 'rosemary.jpg', 'pics/rosemary.jpg', 'image/jpeg', 10),
(13, 'RaffLeonardi2.jpg', 'pics/RaffLeonardi2.jpg', 'image/jpeg', 11),
(14, 'images.jpe', 'pics/images.jpe', 'image/jpeg', 12),
(15, '71-9eP+yh6L._SL1500_.jpg', 'pics/71-9eP+yh6L._SL1500_.jpg', 'image/jpeg', 13),
(16, '_4286738.jpg', 'pics/_4286738.jpg', 'image/jpeg', 14),
(17, '81j+5m-YU4L._SL1500_.jpg', 'pics/81j+5m-YU4L._SL1500_.jpg', 'image/jpeg', 15),
(18, 'download (1).jpe', 'pics/download (1).jpe', 'image/jpeg', 16),
(19, '5190qikQp5L._SX314_BO1,204,203,200_.jpg', 'pics/5190qikQp5L._SX314_BO1,204,203,200_.jpg', 'image/jpeg', 17),
(20, 'download (2).jpe', 'pics/download (2).jpe', 'image/jpeg', 18),
(21, 'Dr_Neo_Series_Skin_Care_product.jpg', 'pics/Dr_Neo_Series_Skin_Care_product.jpg', 'image/jpeg', 19),
(22, '988a16162bf166f885da31dd02478ba2.jpg', 'pics/988a16162bf166f885da31dd02478ba2.jpg', 'image/jpeg', 20),
(23, 'set1.jpg', 'pics/set1.jpg', 'image/jpeg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` double NOT NULL,
  `itemstatus` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itemprice`, `itemstatus`, `userid`) VALUES
(2, 'Comb', 2.6, 'Unavailable', 1),
(3, 'Shawl', 10, 'Available', 1),
(4, 'Sausage', 2, 'Available', 14),
(5, 'Coffee', 1.2, 'Available', 14),
(6, 'Pizza', 13, 'Available', 14),
(7, 'DumbBell', 122.32, 'Available', 15),
(8, 'Protein Shake', 13.2, 'Available', 15),
(9, 'Treadmill', 1300, 'Available', 15),
(10, 'Rose Mary', 5, 'Available', 16),
(11, 'Rafflesia', 1500, 'Available', 16),
(12, 'Venus FlyTrap', 1600, 'Available', 16),
(13, 'Pendrive 18GB', 35, 'Available', 17),
(14, 'Motherboard', 2500, 'Available', 17),
(15, 'SSD 1TB', 1600, 'Available', 17),
(16, 'Intro To Java', 75, 'Available', 18),
(17, 'Collection Of Poem', 25, 'Available', 18),
(18, 'Harry Potter', 60, 'Available', 18),
(19, 'Skincare Product', 75, 'Available', 19),
(20, 'Shampoo', 25, 'Available', 19),
(21, 'MakeUp Set', 160, 'Available', 19),
(22, 'Pomade', 30, 'Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersid` int(11) NOT NULL,
  `ordersdate` datetime NOT NULL,
  `orderstatus` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `paymentproof` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersid`, `ordersdate`, `orderstatus`, `userid`, `paymentproof`) VALUES
(1, '2017-10-07 07:41:23', 'Paid', 2, 'payment/Aiman97.'),
(2, '2017-10-15 05:20:21', 'UnPaid', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `detailid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ordersid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`detailid`, `quantity`, `ordersid`, `itemid`) VALUES
(1, 2, 1, 2),
(2, 1, 2, 2),
(3, 1, 3, 2),
(4, 1, 4, 3),
(5, 1, 5, 3),
(6, 1, 6, 6),
(7, 1, 7, 3),
(8, 1, 8, 2),
(9, 1, 9, 2),
(10, 2, 10, 2),
(11, 1, 10, 3),
(12, 1, 10, 4),
(15, 1, 14, 2),
(16, 1, 15, 3),
(17, 1, 15, 4),
(18, 1, 16, 9),
(19, 1, 17, 7),
(20, 1, 17, 9),
(21, 1, 17, 11),
(22, 1, 17, 16),
(23, 1, 17, 18),
(24, 1, 17, 19),
(25, 1, 17, 21),
(26, 1, 17, 22),
(27, 1, 17, 2),
(28, 12, 17, 3),
(29, 50, 18, 6),
(30, 1, 19, 21),
(31, 1, 20, 2),
(32, 5, 20, 4),
(33, 1, 21, 2),
(34, 1, 22, 2),
(35, 1, 23, 2),
(36, 1, 24, 3),
(37, 1, 25, 3),
(38, 1, 25, 4),
(39, 1, 25, 5),
(40, 4, 26, 3),
(41, 1, 26, 2),
(42, 1, 27, 2),
(43, 1, 28, 2),
(44, 1, 29, 2),
(45, 1, 30, 2),
(46, 1, 1, 2),
(47, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE `usercategory` (
  `ucid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`ucid`, `category`) VALUES
(1, 'Seller'),
(2, 'Customer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userfullname` varchar(50) NOT NULL,
  `usertel` varchar(15) NOT NULL,
  `useraddress` varchar(100) NOT NULL,
  `ucid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `userfullname`, `usertel`, `useraddress`, `ucid`) VALUES
(1, 'Syai97', '123456789', 'Syaiful Fikri', '0172572948', 'Klang', 1),
(2, 'Aiman97', '123456789', 'Aiman Naiim', '01255526662', 'Kajang, Selangor', 2),
(3, 'Aqw', '147258369', 'Aqmal Afiq', '0124567789', 'Kuala Lumpur', 2),
(4, '', '', 'Mohammad Shatiree', '0124532212', 'Bangi', 2),
(5, 'SH088', '789456123', 'Soo High', '0163324556', 'Kuala Lumpur', 2),
(6, '', '', 'Faiz Sharan', '0113345679', 'Ipoh', 2),
(7, '', '', 'Sabri Hilal', '0123456789', 'Shanghai', 2),
(8, '', '', 'John Master', '0134567890', 'Vegas', 2),
(9, '', '', 'Tan Peng', '0156789012', 'Tg. Gemok', 2),
(10, '', '', 'Zahirul Imran', '0167890123', 'Puncak Alam', 2),
(11, '', '', 'Rajja Wallee', '0123456789', 'Damansara', 2),
(12, '', '', 'Ling Siong', '0178901234', 'Raub', 2),
(13, '', '', 'Aqilah Syazana', '0189012345', 'Kuantan', 2),
(14, 'ddsd', '', 'Zaki Helmi', '01123239762', '', 1),
(15, 'fgg', '', 'Nyak', '01123744904', '', 1),
(16, 'errere', '', 'Prem Nair', '0136548888', '', 1),
(17, 'reerreer', '', 'Ting Tong', '0192567555', '', 1),
(18, 'ererer', '', 'Sam Pieh', '0101101011', '', 1),
(19, 'Thor', '123456789', 'Thor Boek', '0152424666', 'Putrajaya', 1),
(27, 'fordy', '979797', 'FORDIANA', '0129875067', 'TUN TEJA, UITM PAHANG, KAMPUS RAUB', 2),
(28, 'syndicate', '100698', 'ladyjane', '68798525566', 'nottingham', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`imgid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `ordersid` (`ordersid`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD PRIMARY KEY (`ucid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `ucid` (`ucid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
