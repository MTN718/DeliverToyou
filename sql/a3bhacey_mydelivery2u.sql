-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2017 at 07:57 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3bhacey_mydelivery2u`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_order`
--

CREATE TABLE `group_order` (
  `group_order_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `group_order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_order`
--

INSERT INTO `group_order` (`group_order_id`, `rider_id`, `group_order_status`) VALUES
(2, 10, ''),
(3, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `group_order_conn`
--

CREATE TABLE `group_order_conn` (
  `group_order_conn_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `group_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_order_conn`
--

INSERT INTO `group_order_conn` (`group_order_conn_id`, `order_id`, `group_order_id`) VALUES
(1, 2, 2),
(2, 3, 2),
(3, 5, 2),
(4, 1, 3),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_name` varchar(65) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_type` varchar(65) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pickup_address_1` varchar(85) NOT NULL,
  `pickup_address_2` varchar(85) NOT NULL,
  `pickup_city` varchar(25) NOT NULL,
  `pickup_state` varchar(45) NOT NULL,
  `pickup_zip` int(10) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `dropoff_address_line_1` varchar(85) NOT NULL,
  `dropoff_address_line_2` varchar(85) NOT NULL,
  `dropoff_city` varchar(45) NOT NULL,
  `dropoff_state` varchar(45) NOT NULL,
  `dropoff_zip` int(10) NOT NULL,
  `dropoff_date` date NOT NULL,
  `dropoff_time` time NOT NULL,
  `detail` text NOT NULL,
  `instruction` longtext NOT NULL,
  `distance` varchar(10) NOT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT '1',
  `amount` int(11) DEFAULT NULL,
  `customer_name` varchar(60) NOT NULL,
  `customer_contact` varchar(60) NOT NULL,
  `group_status` varchar(255) NOT NULL DEFAULT 'ungroup'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_no`, `order_name`, `vendor_id`, `order_type`, `contact`, `pickup_address_1`, `pickup_address_2`, `pickup_city`, `pickup_state`, `pickup_zip`, `pickup_date`, `pickup_time`, `dropoff_address_line_1`, `dropoff_address_line_2`, `dropoff_city`, `dropoff_state`, `dropoff_zip`, `dropoff_date`, `dropoff_time`, `detail`, `instruction`, `distance`, `order_status_id`, `amount`, `customer_name`, `customer_contact`, `group_status`) VALUES
(1, '1001', 'Abc', 4, 'Current', '98410', 'Satation', 'Vijay nagar', 'ratlam', 'Gj', 457993, '0000-00-00', '10:00:00', 'MIg', 'Mig', 'Nagpur', 'Gj', 457993, '0000-00-00', '00:00:00', 'heads', 'Glass', '32', 2, 0, 'demo', '235687', 'group'),
(2, '1002', 'abc', 3, 'Current', '32109', 'Gangwal Station', 'geeta bhavan', 'dhar', 'Mp', 452002, '2017-10-12', '11:30:00', 'Lig', 'Lig', 'Bhopal', 'Gj', 489332, '2017-11-02', '00:00:00', 'toys', 'Nothing', '25', 3, 0, 'abc', '326596', 'group'),
(3, '1003', 'abc', 3, 'Current', '568796', 'Mig', 'Lig', 'Indore', 'Mp', 452001, '2017-10-11', '11:30:00', 'Geeta', 'Stal pual', 'indoer', 'Mp', 452001, '2017-11-02', '00:00:00', 'Caps', 'Take Care', '', 3, 0, 'demo', '355874', 'group'),
(4, '1004', 'abc', 4, 'Current', '124568125', 'Mig', 'Lig', 'Indore', 'Mp', 452001, '0000-00-00', '10:00:00', 'Geeta', 'Stal pual', 'indoer', 'Mp', 452001, '0000-00-00', '00:00:00', 'Caps', 'Take Care', '45', 2, 0, 'abc', '125878', 'group'),
(5, '1005', 'abc', 3, 'Current', '245355', 'mig', 'mir', 'indore', 'mp', 452001, '0000-00-00', '11:30:00', 'lig', 'lig', 'indore', 'mp', 456987, '0000-00-00', '00:00:00', 'toys', 'Nothing', '23', 4, 20, 'demo', '235687', 'group'),
(6, '1006', 'abc', 13, 'current', '5586', 'lig', 'lig', 'indore', 'mp', 55862, '0000-00-00', '12:00:00', 'mig', 'mig', 'indore', 'mp', 281247, '0000-00-00', '00:00:00', 'pack', 'no', '20', 1, 0, 'demo', '458791', 'ungroup'),
(7, '1007', 'abc', 11, 'current', '2385', 'lig', 'lig', 'indore', 'mp', 5865325, '0000-00-00', '01:00:00', 'mig', 'mig', 'ingor', 'mp', 525825, '0000-00-00', '00:00:00', 'Glass', 'Take Care', '10', 1, 0, 'demo', '215487', 'ungroup'),
(8, '1008', 'cfds', 11, 'current', '23568', 'lig', 'lig', 'indore', 'mp', 2548532, '2017-10-05', '01:00:00', 'hjnh', 'nhjnmihjk', 'jkm,hjun', 'mp', 2532, '2017-10-10', '00:00:00', 'Bottle', 'Take Care', '60', 1, 0, 'abc', '15487', 'ungroup'),
(9, '1009', 'abc', 11, 'current', '2385', 'lig', 'lig', 'indore', 'mp', 5865325, '2017-10-05', '01:00:00', 'mig', 'mig', 'ingor', 'mp', 525825, '2017-10-10', '00:00:00', 'Steel', 'Its Iron', '10', 1, 0, 'demo', '325984', 'ungroup'),
(10, '1010', 'cfds', 11, 'current', '23568', 'lig', 'lig', 'indore', 'mp', 2548532, '2017-10-05', '01:00:00', 'hjnh', 'nhjnmihjk', 'jkm,hjun', 'mp', 2532, '2017-10-10', '00:00:00', 'Plastic', 'Any Ways', '60', 1, 0, 'abc', '587412', 'ungroup'),
(11, '1023', 'Abc', 4, 'Backdated', '124568125', 'Mig', 'Mig', 'Indore', 'Mp', 452001, '2017-11-03', '09:00:00', 'Geeta', 'Stal pual', 'indoer', 'Mp', 452002, '0000-00-00', '10:00:00', 'Caps', 'Take Care', '28', 1, NULL, 'demo', '235687', 'ungroup'),
(12, '2546', '', 15, 'Current', '546345', 'dfs', 'dfgg', 'vsfdv', 'sad', 543254, '2017-11-03', '04:00:00', 'sdasd', 'sda', 'asdas', 'asdas', 0, '2017-11-06', '09:00:00', 'sdaasd', 'drfg', '', 1, NULL, 'dsaasd', '12546', 'ungroup');

-- --------------------------------------------------------

--
-- Table structure for table `order_proof`
--

CREATE TABLE `order_proof` (
  `order_proof_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `filetype` varchar(65) NOT NULL,
  `url` varchar(85) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `title` varchar(65) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `title`, `description`) VALUES
(1, 'not assign to rider', 'This task is not assign to any rider'),
(2, 'assign to rider', 'This task is assign to rider'),
(3, 'Cancelled Orders', 'Ordre is cancel by admin'),
(4, 'complete orders', 'order is complete');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `business_nature` varchar(65) NOT NULL,
  `user_type` varchar(65) NOT NULL,
  `device_type` varchar(55) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `license_no` varchar(25) NOT NULL,
  `id_proof` varchar(45) NOT NULL,
  `id_no` varchar(25) NOT NULL,
  `emergency_contact_no` int(15) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `login_status` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `mobile`, `business_nature`, `user_type`, `device_type`, `created_on`, `license_no`, `id_proof`, `id_no`, `emergency_contact_no`, `image_url`, `address`, `latitude`, `longitude`, `login_status`, `status`) VALUES
(1, 'admin', '$2y$10$t9Tmijmw4ClRxEZpJB0uw.lHtV/H4WJqBBDO5rkmEqcTbpmWxYrxG', 'admin', '', '', '', 'admin', '', '2017-11-06 08:40:46', '', '', '', 0, '', '', 0, 0, 0, '0'),
(2, 'vendor', '$2y$10$OKF51pdcSdvCVjeuMBXkVOiJHJRCKP6w0YMOSWWXErX6oGuk4pmr.', 'dsfdsfds', 'vendor@gmail.com', '789', 'E', 'vendor', '', '2017-11-02 19:38:08', '', '', '', 0, '58c92cd52c00002500fee7af.jpg', 'gthfdv ', 0, 0, 0, '0'),
(3, 'demovendor', '$2y$10$t9Tmijmw4ClRxEZpJB0uw.lHtV/H4WJqBBDO5rkmEqcTbpmWxYrxG', '', 'saklechar@gmail.com', '23587456', 'A', 'vendor', '', '2017-11-06 08:47:38', '', '', '', 0, '', '', 0, 0, 0, '0'),
(4, 'adminvendor', '$2y$10$pP1irLXF1sTOtQOQ5QF2Xu9PJfFaeo5S8Ro6ipG9i4eP0q.id7q3q', '', 'adminvendor@gmail.com', '123456', 'C', 'vendor', '', '2017-10-25 07:00:23', '', '', '', 0, '5459d03d62eb2ebffec75135d91014f24.jpg', '', 0, 0, 0, '0'),
(9, 'adminrider', '$2y$10$R8gpqjK/ns3ZArRP9B2oauwaX9MzBi7QlCWGm6nPt5HXeCzTsRlku', 'rider1', 'club@gmail.com', '543254', '', 'rider', '', '2017-11-05 09:58:59', 'BD-5689*52', 'Ac-9856-47', '', 5420542, 'about-bg.jpg', 'sadad', 1.51319, 23.1152, 0, '0'),
(10, 'subrider', '$2y$10$6nbM.TBs0NCjjFbyr5UoAOqr5UhNMrWALDAVLGAAyFRzoxfBfeNEq', 'rider2', 'sub@gmail.com', '54234', '', 'rider', '', '2017-11-05 15:37:39', 'BD-5689*52', 'Ac-9856-47', '', 543254, 'a01020_091d145abe494ff4b473fe092fd3db98.jpg', 'dfsdsfff', 4.0588, 15.6885, 0, 'ontask'),
(11, 'subvendor', '$2y$10$6.y17C1uKWUv/16SA/X69.7BwlYLVr0hw2GtJNkPPWUzetR.iNFg.', '', 'subvendor@gmail.com', '453654', 'D', 'vendor', '', '2017-10-11 18:11:36', '', '', '', 0, '0f20c705679813e2f4738b17851e5dfa.jpg', '', 0, 0, 0, '0'),
(13, 'player', '$2y$10$UMnK3FP3lgXu3.9aJmqbguXI2SRCscwJYfGuaADgbucRlVRfY4sOK', '', 'player@gmail.com', '543675842', 'B', 'vendor', '', '2017-10-12 07:08:40', '', '', '', 0, '', '', 0, 0, 0, '0'),
(14, 'checkdemo1', '$2y$10$uR54twhFP2cmUUId3Pn.MuaKO.6RdjQ8E49A3ob0xa6bUQ08ao6LG', '', 'fhfg', '45876', 'B', 'vendor', '', '2017-10-13 07:29:35', '', '', '', 0, '', '', 0, 0, 0, '0'),
(15, 'testvendor', '$2y$10$YKiRz3mzs1FQdaeWEfr75uLJjV7SWHwrZVhGcPquHVuiENgMU4HKi', 'vendor', 'sub@gmail.com', '2569745', 'abc', 'vendor', '', '2017-11-02 06:53:48', '', '', '', 0, '', 'jdsfj dsfkfdf', 0, 0, 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_order`
--
ALTER TABLE `group_order`
  ADD PRIMARY KEY (`group_order_id`);

--
-- Indexes for table `group_order_conn`
--
ALTER TABLE `group_order_conn`
  ADD PRIMARY KEY (`group_order_conn_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_proof`
--
ALTER TABLE `order_proof`
  ADD PRIMARY KEY (`order_proof_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_order`
--
ALTER TABLE `group_order`
  MODIFY `group_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_order_conn`
--
ALTER TABLE `group_order_conn`
  MODIFY `group_order_conn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_proof`
--
ALTER TABLE `order_proof`
  MODIFY `order_proof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
