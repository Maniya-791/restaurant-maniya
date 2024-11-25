-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item price` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`item_id`, `item_name`, `item_img`, `item_desc`, `item price`, `item_category`, `item_date`) VALUES
(8, 'Anda Paratha', ' ', 'Sugar ', '100', 'Breakfast', '2024-09-19 16:29:08'),
(9, 'Samoosa', ' ', 'POtato', '50', 'Breakfast', '2024-09-20 16:16:59'),
(10, 'Pakora', ' ', 'Onion', '100', 'Breakfast', '2024-09-20 16:17:24'),
(11, 'Roll', ' ', 'Chiilli', '150', 'Breakfast', '2024-09-20 16:17:44'),
(12, 'Chicken Samosa', '', 'cheicken ', '150 ', 'Breakfast', '2024-09-20 16:18:12'),
(27, 'Malai', ' ', 'milk and parartha', '300', 'Breakfast', '2024-10-03 16:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `check_in_date` varchar(255) NOT NULL,
  `check_in_time` varchar(255) NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `name`, `email`, `contact_number`, `check_in_date`, `check_in_time`, `number_of_guests`, `created_at`) VALUES
(1, 'Salman', 'salman@email.com', '0321024545', '10/15/2024', '12:30am', 0, '2024-10-03'),
(2, 'sdfsdfdssdf', 'dsfdsffsd@sdsddsf.com', '01351435', '10/23/2024', '12:00am', 0, '2024-10-03'),
(3, 'Jabir', 'jabirmemon53@gmail.com', '03202049281', '10/14/2024', '12:30am', 0, '2024-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_ep` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_ep`, `user_pass`, `user_status`, `user_date`) VALUES
(1, 'Kashif', 'Kashif@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-08-30 16:48:35'),
(2, 'Kashif', 'Kasif@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-08-30 16:49:03'),
(3, 'Alia', 'jiya@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-02 16:47:27'),
(4, 'Alia', 'superadmin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-02 16:48:07'),
(5, 'Alia', 'ayeshauserone@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-02 16:50:12'),
(6, 'fdgd', 'jdfsdfsdfsdsfiya@gmail.com', '97289b8911b7964423e47372665cf344', 0, '2024-09-02 17:09:12'),
(7, 'Alia', 'jiysddssdsdsdsdsda@gmail.com', 'aa134985e9c846556049434a95369197', 0, '2024-09-02 17:18:06'),
(8, 'Salman', 'salman@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:11:41'),
(9, 'fdfg', 'tesla@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:15:05'),
(10, 'salman', 'sadasd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:18:32'),
(11, 'Maniya', 'manajshksadjh@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:22:27'),
(12, 'Maniya', 'maadjh@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:23:08'),
(13, 'gjfhjg', 'hgdhdgfgsxfdsz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:25:41'),
(14, 'gjfhjg', 'hgdhdgfgsxfdshgfhgz@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:25:50'),
(15, 'dasddsads', 'dhfhdchfcfg@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:27:20'),
(16, 'hmghjdfa', 'oiuhyiuguygvuy@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:29:08'),
(17, 'arwsdfdgfsgssg', 'hmkasdgjhasgdjha@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-04 16:29:51'),
(18, 'Alia', 'ka@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2024-09-05 16:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
