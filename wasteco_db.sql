-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 10:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wasteco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bidp`
--

CREATE TABLE `bidp` (
  `bidID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `sellerName` varchar(50) NOT NULL,
  `startP` int(11) NOT NULL,
  `currentBid` int(11) DEFAULT NULL,
  `bidderID` int(11) DEFAULT NULL,
  `bidderName` varchar(30) DEFAULT NULL,
  `contact` int(15) NOT NULL,
  `bidderContact` int(15) NOT NULL,
  `bidderLocation` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidp`
--

INSERT INTO `bidp` (`bidID`, `date`, `title`, `type`, `qty`, `image`, `detail`, `email`, `location`, `sellerID`, `sellerName`, `startP`, `currentBid`, `bidderID`, `bidderName`, `contact`, `bidderContact`, `bidderLocation`, `status`) VALUES
(4, '2022-04-08', 'Rubber Waste', 'rubber', '1000 Kg', 'rubber1.jpg', 'Place your bid. Products will deliver to the highest bid. Contact for more details.', 'eranda@gmail.com', 'Kegalle', 17, 'Eranda Irushan', 8000, 15000, 24, 'Dinithi Vidarsha', 701234567, 341234567, 'kalutara', 'open'),
(6, '2022-05-01', 'Polythene Bulk Bags ', 'polythene', '200000 Pieces', 'polytheneBulk.jpg', 'Large bags 90x90x65 cm 90x90x100 cm 85x110x120 cm 85x110x130 cm. place your bid. Contact for more details.', 'hasini@gmail.com', 'Kurunegala', 22, 'Hasini Sandunika', 200000, 210000, 24, 'Dinithi Vidarsha', 711234567, 341234567, 'kalutara', 'open'),
(7, '2022-05-03', 'Used Polythene Bags', 'polythene', '100000 Pieces', 'polybags.jpg', 'Scraps of polyolefin film used to pack our products. We are interested in finding a regular recipient of cuttings. Possibility to make an appointment once a month for the collection of foil scraps. We can prepare cuttings in big bags for collection. Heat-shrinkable polyolefin film is characterized by high transparency, gloss and excellent shrinkage at relatively low temperatures. It is an odorless foil. It is easily recyclable. 100% recyclable. During the welding and disposal process, no harmful and toxic fumes are emitted to the environment. Polyolefin is a foil that is safe for health and the environment.', 'kaveen@gmail.com', 'Kurunegala', 23, 'Kaveen Liyanage', 250000, 255000, 24, 'Dinithi Vidarsha', 771234567, 341234567, 'kalutara', 'open'),
(8, '2022-05-03', 'Textile Mix', 'textile', '10000 Kg', 'texttile.jpg', 'Textile mix / mix of used textiles for recycling and further processing, mix contains: acrylic, polyester, polyamide, cotton, wool. The goods are pressed into large packages (400 - 450 kg) without waste and pollution.', 'samidi@gmail.com', 'Gampaha', 26, 'Samidi Sasadara', 15000, 16000, 27, 'Malinda Lakshan', 334561287, 717892564, 'hambantota', 'open'),
(9, '2022-05-03', 'Galvanized Steel Wire', 'metal', '4000 Kg', 'steel.jpg', 'We offer monthly remnants of galvanized steel cables, which some companies would use to hang luminaires, etc. These are diameters of 2.5 mm, 4 mm and 5 mm. We offer unused cables, wound on a disposable spool, coils of about 500 m.', 'malinda@gmail.com', 'Hambantota', 27, 'Malinda Lakshan', 800000, NULL, NULL, NULL, 717892564, 0, '', 'open'),
(10, '2022-05-03', 'Used Plywood', 'wood', '1000 Pieces', 'plywood.jpg', 'Used plywoods in construction site. Can deliver with additional charge. Call for more information.', 'chamli@gmail.com', 'Galle', 28, 'Chamli Bandara', 200000, 210000, 26, 'Samidi Sasadara', 2147483647, 334561287, 'gampaha', 'open'),
(11, '2022-05-03', 'Plastic Waste', 'plastic', '500 Kg', 'plasticwaste.jpg', 'waste plastic lot. Contact for more details. can deliver if request,', 'eranga@gmail.com', 'Colombo', 30, 'Eranga Pathum', 25000, NULL, NULL, NULL, 115648795, 0, '', 'open'),
(12, '2022-05-03', 'PC Parts', 'electronic', '5000 Pieces', 'usedpc.jpg', 'Used PC parts. Not working. Whole units. Contact for details. Place your highest bid.', 'kavindu@gmail.com', 'Anuradhapura', 31, 'Kavindu Sulakshana', 200000, NULL, NULL, NULL, 754567246, 0, '', 'open'),
(13, '2022-05-03', 'Lead Batteries', 'electronic', '500 Pieces', 'lead.jpg', 'looking for highest offer. More than 500 available. Contact for more details.', 'modith@gmail.com', 'Badulla', 32, 'Modith Kosala', 500000, NULL, NULL, NULL, 715687412, 0, '', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `messageID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`messageID`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(8, 'Ravindu Kushan', 'ravindu@gmail.com', '778200067', 'Receiving Money', 'I will ship my listed order to the relevant buyer. What are the steps that I must follow when receiving payment?'),
(55, 'Hasini Sandunika', 'hasini@gmail.com', '711234567', 'Order Transport', 'Do you provide any transport facilities?');

-- --------------------------------------------------------

--
-- Table structure for table `sellp`
--

CREATE TABLE `sellp` (
  `sellID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `qty` varchar(12) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `sellerName` varchar(50) DEFAULT NULL,
  `price` varchar(11) DEFAULT NULL,
  `contact` int(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellp`
--

INSERT INTO `sellp` (`sellID`, `date`, `title`, `type`, `qty`, `image`, `detail`, `location`, `email`, `sellerID`, `sellerName`, `price`, `contact`, `status`) VALUES
(21, '2022-04-07', 'Wood Palletes', 'wood', '1000 Pieces', 'pallete1.jpg', 'More than 1000 wood pallets are available.\r\nCan deliver with additional charge.\r\nCall for more details.', 'Anuradhapura', 'sangeethnawa@gmail.com', 16, 'Sangeeth Nawarathna', '15000', 0, 'open'),
(22, '2022-04-07', 'Plastic Waste', 'plastic', '15000 Kg', 'plasticAccs.jpg', 'PMMA - Production Waste - Colored - Packaging: big-bag - Delivery: ex works.\r\nCall for more details.', 'Anuradhapura', 'sangeethnawa@gmail.com', 16, 'Sangeeth Nawarathna', 'Negotiable', 0, 'open'),
(24, '2022-05-07', 'Painted Plywood', 'wood', '1000 Pieces', 'paintedplywood.jpg', 'Particleboards painted black, suitable for the production of furniture. Please do not hesitate to contact me', 'Kegalle', 'eranda@gmail.com', 17, 'Eranda Irushan', '200000', 701234567, 'open'),
(25, '2022-04-07', 'Vulcanized Rubber', 'rubber', '24000 Kg', 'rubber2.jpg', 'Clean vulcanized EPDM rubber and NBR/SBR rubber. Please contact me on my email eranda@gmail.com or over the phone.', 'Kegalle', 'eranda@gmail.com', 17, 'Eranda Irushan', '140/Kg', 701234567, 'open'),
(26, '2022-08-12', 'Electronic Waste', 'electronic', '10000 Kg', 'ewaste.jpg', 'Various electronic scrap with small and large devices, old computers, printers,...', 'Kegalle', 'eranda@gmail.com', 17, 'Eranda Irushan', 'Negotiable', 701234567, 'open'),
(30, '2022-04-22', 'Used Glass Panes', 'glass', '1000 Pieces', 'glass.jpg', 'Due to the replacement of damaged window panes, there are constantly defective panes of glass, the quantity is manageable, but regular', 'Puttalam', 'ravindu@gmail.com', 18, 'Ravindu Kushan', '750', 778200067, 'open'),
(31, '2022-05-01', 'Plastic PVC Waste', 'plastic', '1000 Kg', 'pvc waste.jpg', 'Hello with the present we must dispose of these bags containing waste from turning processes, they are delrin and pvc shavings, there is someone who is interested,', 'Kurunegala', 'hasini@gmail.com', 22, 'Hasini Sandunika', 'Negotiable', 711234567, 'open'),
(32, '2022-05-03', 'Used Glass Sheets', 'glass', '1000 Pieces', 'glass2.jpg', 'I am selling window panes. Those were in a passive house, but we were left. It is in perfect condition, there are minor damages. Dimensions 1530 mm x 500 mm x 450 (glass thickness. Call for more details.', 'Kurunegala', 'kaveen@gmail.com', 23, 'Kaveen Liyanage', '800/piece', 771234567, 'open'),
(33, '2022-05-03', 'Used Metal Sheets', 'metal', '50000 Pieces', 'metal.jpg', 'Aluminum metal sheets 0.3 mm thick. Format 1040x800 mm. Contact for more details. Can deliver.', 'Kalutara', 'dinithi@gmail.com', 24, 'Dinithi Vidarsha', '150/Piece', 341234567, 'open'),
(34, '2022-05-03', 'Poly Bags', 'polythene', '5000 Kg', 'poly3.jpg', 'Plastic bag for recycling, pressed into 100-300 kg bales. Can deliver. contact for more details.', 'Matale', 'udara@gmail.com', 25, 'Udara Perera', '12/Kg', 381234568, 'open'),
(35, '2022-05-03', 'Textile Cuttings', 'textile', '2000 Kg', 'textilesell.jpg', 'Waste material from the sewing workshop. Leatherette clippings and fabrics packed separately in plastic bags of 10 - 15 kg. Approximately 250 - 300 kg per month.', 'Kegalle', 'asanka@gmail.com', 29, 'Asanka Wijesinghe', '120/Kg', 778965478, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `password`, `location`, `contact`, `email`) VALUES
(16, 'Sangeeth Nawarathna', 'sangeeth123', 'anuradhapura', 702196566, 'sangeethnawa@gmail.com'),
(17, 'Eranda Irushan', 'eranda123', 'kegalle', 701234567, 'eranda@gmail.com'),
(18, 'Ravindu Kushan', 'ravindu123', 'puttalam', 778200067, 'ravindu@gmail.com'),
(21, 'Malith Madushan', 'malith123', 'gampaha', 741234568, 'malith@gmail.com'),
(22, 'Hasini Sandunika', 'hasini123', 'kurunegala', 711234567, 'hasini@gmail.com'),
(23, 'Kaveen Liyanage', 'kaveen123', 'kurunegala', 771234567, 'kaveen@gmail.com'),
(24, 'Dinithi Vidarsha', 'dinithi123', 'kalutara', 341234567, 'dinithi@gmail.com'),
(25, 'Udara Perera', 'udara123', 'matale', 381234568, 'udara@gmail.com'),
(26, 'Samidi Sasadara', 'samidi123', 'gampaha', 334561287, 'samidi@gmail.com'),
(27, 'Malinda Lakshan', 'malinda123', 'hambantota', 717892564, 'malinda@gmail.com'),
(28, 'Chamli Bandara', 'chamli123', 'galle', 2147483647, 'chamli@gmail.com'),
(29, 'Asanka Wijesinghe', 'asanka123', 'kegalle', 778965478, 'asanka@gmail.com'),
(30, 'Eranga Pathum', 'eranga123', 'colombo', 115648795, 'eranga@gmail.com'),
(31, 'Kavindu Sulakshana', 'kavindu123', 'anuradhapura', 754567246, 'kavindu@gmail.com'),
(32, 'Modith Kosala', 'modith123', 'badulla', 715687412, 'modith@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidp`
--
ALTER TABLE `bidp`
  ADD PRIMARY KEY (`bidID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `sellp`
--
ALTER TABLE `sellp`
  ADD PRIMARY KEY (`sellID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidp`
--
ALTER TABLE `bidp`
  MODIFY `bidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sellp`
--
ALTER TABLE `sellp`
  MODIFY `sellID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
