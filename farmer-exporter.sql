-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 11:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer-exporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `action`, `date`) VALUES
(4, '1', 'This user accessed category muranga at 2024:02:27 11:34:39', '2024:02:27 11:34:39'),
(8, '1', 'This user accessed category nairobi at 2024:02:27 11:50:24', '2024:02:27 11:50:24'),
(9, '1', 'This user Accessed Dadokado at 2024:02:27 11:50:27', '2024:02:27 11:50:27'),
(10, '1', 'This user Accessed Golden Hass at 2024:02:27 11:51:09', '2024:02:27 11:51:09'),
(11, '1', 'This user Accessed Golden Hass at 2024:02:27 11:51:41', '2024:02:27 11:51:41'),
(12, '1', 'This user Accessed Maluma at 2024:02:27 11:54:57', '2024:02:27 11:54:57'),
(13, '1', 'This user accessed   Jack\'s contact page at 2024:02:27 11:55:01', '2024:02:27 11:55:01'),
(14, '1', 'This user logged Out at 2024:02:27 11:55:31', '2024:02:27 11:55:31'),
(25, '1', 'This user logged in at 2024:02:27 11:56:37', '2024:02:27 11:56:37'),
(26, '1', 'This user logged Out at 2024:02:28 09:23:39', '2024:02:28 09:23:39'),
(27, '1', 'This user logged in at 2024:03:05 11:29:12', '2024:03:05 11:29:12'),
(28, '1', 'This user logged Out at 2024:03:05 11:29:52', '2024:03:05 11:29:52'),
(29, '15', 'This user logged in at 2024:03:05 11:30:32', '2024:03:05 11:30:32'),
(30, '15', 'This user Accessed Golden Hass at 2024:03:05 11:30:41', '2024:03:05 11:30:41'),
(31, '15', 'This user accessed   Madaraka\'s contact page at 2024:03:05 11:30:45', '2024:03:05 11:30:45'),
(32, '15', 'This user Accessed Golden Hass at 2024:03:05 11:30:48', '2024:03:05 11:30:48'),
(33, '15', 'This user logged Out at 2024:03:05 11:34:20', '2024:03:05 11:34:20'),
(34, '16', 'This user logged in at 2024:03:05 11:34:29', '2024:03:05 11:34:29'),
(35, '16', 'This user Accessed Golden Hass at 2024:03:05 11:34:34', '2024:03:05 11:34:34'),
(36, '16', 'This user accessed   Madaraka\'s contact page at 2024:03:05 11:34:38', '2024:03:05 11:34:38'),
(37, '16', 'This user Accessed Golden Hass at 2024:03:05 11:38:24', '2024:03:05 11:38:24'),
(38, '16', 'This user accessed   Madaraka\'s contact page at 2024:03:05 11:38:26', '2024:03:05 11:38:26'),
(39, '16', 'This user Accessed Golden Hass at 2024:03:05 11:38:29', '2024:03:05 11:38:29'),
(40, '16', 'This user Accessed Dadokado at 2024:03:05 11:38:45', '2024:03:05 11:38:45'),
(41, '16', 'This user accessed   Cesur \'s contact page at 2024:03:05 11:38:48', '2024:03:05 11:38:48'),
(42, '16', 'This user Accessed Dadokado at 2024:03:05 11:38:51', '2024:03:05 11:38:51'),
(43, '16', 'This user logged Out at 2024:03:05 11:39:03', '2024:03:05 11:39:03'),
(44, '1', 'This user logged in at 2024:03:05 11:39:11', '2024:03:05 11:39:11'),
(45, ' ', 'This user accessed category nyamira at 2024:03:21 09:34:14', '2024:03:21 09:34:14'),
(46, ' ', 'This user accessed category muranga at 2024:03:21 09:34:16', '2024:03:21 09:34:16'),
(47, ' ', 'This user accessed category kisii at 2024:03:21 09:34:17', '2024:03:21 09:34:17'),
(48, ' ', 'This user accessed category mombasa at 2024:03:21 09:34:19', '2024:03:21 09:34:19'),
(49, ' ', 'This user accessed category mombasa at 2024:03:21 10:11:33', '2024:03:21 10:11:33'),
(50, ' ', 'This user Accessed Golden Hass at 2024:03:21 10:12:00', '2024:03:21 10:12:00'),
(51, ' ', 'This user Accessed Golden Hass at 2024:03:21 10:14:16', '2024:03:21 10:14:16'),
(52, ' ', 'This user Accessed Golden Hass at 2024:03:21 10:14:35', '2024:03:21 10:14:35'),
(53, '1', 'This user logged in at 2024:03:21 10:15:39', '2024:03:21 10:15:39'),
(54, '1', 'This user Accessed Golden Hass at 2024:03:21 11:03:49', '2024:03:21 11:03:49'),
(55, '1', 'This user Accessed Golden Hass at 2024:03:21 11:04:31', '2024:03:21 11:04:31'),
(56, '1', 'This user Accessed Golden Hass at 2024:03:21 11:10:05', '2024:03:21 11:10:05'),
(57, '1', 'This user Accessed Sendros at 2024:03:21 11:10:12', '2024:03:21 11:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active`, `date`, `slug`) VALUES
(1, 'Mombasa', 1, '2024-02-02 20:50:21', 'mombasa'),
(2, 'Nairobi', 1, '2024-02-02 22:36:32', 'nairobi'),
(3, 'Kericho', 1, '2024-02-13 13:23:28', 'kericho'),
(4, 'Kisii', 1, '2024-02-13 11:03:08', 'kisii'),
(5, 'Murang\'a', 1, '2024-02-13 13:24:45', 'muranga'),
(6, 'Nyamira', 1, '2024-02-13 13:25:01', 'nyamira');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `disabled`) VALUES
(1, 'Kenya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `regNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `phone`, `email`, `address`, `regNo`) VALUES
(1, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(2, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(3, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(4, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(5, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(6, '0712345678', 'jackmutiso37@gmail.com', 'kaba', 'inte/mg'),
(7, '0712345678', 'jackmutiso37@gmail.com', 'jj', 'inte'),
(8, '997536363', 'jack@gmail.com', 'nairobi', 'inte'),
(9, '8876544', 'jackmutiso37@gmail.com', 'iiii', 'econ'),
(10, '0976544', 'john@gmail.com', 'kiba', 'maths'),
(11, '254702830006', 'john@gmail.com', 'kk', '00l'),
(12, '0745378674', 'jack@gmail.com', 'kabarak', 'it'),
(13, '075343332', 'john@gmail.com', 'arusha', 'eco'),
(14, '087363534', 'mahlihep@gmail.com', 'kabaraka', 'cs/mg'),
(15, '0101480104', 'oriel@gmail.com', 'Kericho', 'ede/mg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `order_id` bigint(20) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `session_id` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `seller`, `session_id`, `username`, `email`, `phone`, `date`) VALUES
(1, '16', 63933178, '15', NULL, 'RAEL ', 'nratemo@gmail.com', '+254790633357', '2024-02-12 23:19:14'),
(2, '16', 22028158, '15', NULL, 'Jackson', 'nratemo@gmail.com', '0745454500', '2024-02-21 22:34:00'),
(3, '15', 87715866, '13', NULL, 'Madaraka', 'raelmadaraka0@gmail.com', '+254790633357', '2024-02-22 00:13:13'),
(4, '16', 97746167, '15', NULL, 'NEVILLE', 'nratemo@gmail.com', 'RATEMO', '2024-02-22 01:52:58'),
(5, '16', 59132092, '15', NULL, 'NEVILLE', 'nratemo@gmail.com', 'RATEMO', '2024-02-23 06:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `permission_table`
--

CREATE TABLE `permission_table` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `disabled` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_table`
--

INSERT INTO `permission_table` (`id`, `role_id`, `permission`, `disabled`) VALUES
(1, 1, 'view_category', 1),
(2, 1, 'add_category', 1),
(3, 1, 'edit_category', 1),
(4, 1, 'delete_category', 1),
(5, 2, 'view_category', 1),
(6, 2, 'add_category', 1),
(7, 2, 'edit_category', 1),
(8, 2, 'delete_category', 1),
(9, 2, 'view_products', 1),
(10, 2, 'add_product', 1),
(11, 1, 'add_product', 0),
(12, 1, 'edit_product', 0),
(13, 1, 'delete_product', 0),
(14, 1, 'view_products', 1),
(15, 1, 'view_product', 0),
(16, 1, 'view_user', 1),
(17, 1, 'edit_role', 1),
(18, 1, 'view_role', 1),
(19, 1, 'add_role', 1),
(20, 1, 'delete_role', 1),
(21, 1, 'add_user', 1),
(22, 1, 'edit_user', 1),
(23, 1, 'view_order', 0),
(24, 1, 'delete_order', 0),
(25, 1, 'view_dashboard', 1),
(26, 1, 'view_about', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `product_name`, `phone`, `quantity`, `description`, `image`, `approved`, `date`) VALUES
(1, 1, '1', 'Hass', '300', '32', 'The distribution of preferences indexes was investigated among latent classes, which were regressed on the socio-demographic variables covariates using multinomial logistic regression. The results suggest that the desirable attributes for choosing avocado were taste, consistency (ready to eat) and affordable price. In addition, five consumer profiles in the Italian context were defined (named Hedonistic, Avocado fruit lovers, Sustainability sensitive, Value for money and Health sensitive) and characterized in terms of preferences and socio-demographic features. The study addresses a topic that has already been explored, but with an unexploited approach (latent class analysis combined with best–worst choice modeling). Therefore, the results help fill the gap in the existing literature by enriching it with a study that characterizes avocado consumers\' preferences considering their heterogeneity in terms of perception and socio-demographic characteristics.\r\n                                        ', 'uploads/1706907046pexels-valerie-b-3029520.jpg', 0, '2024-02-02 22:03:45'),
(2, 1, '5', 'Maluma', '254745378674', '200', '                The Maluma is a dark-purple avocado that was discovered in the 1990s in South Africa. This variety grows slowly, but the trees bear a lot of fruit.\r\n\r\nThough only one or two varieties are best known, hundreds of types exist around the world, primarily differing in size, color, shape, texture, and flavor.                              ', 'uploads/1706907737pexels-valerie-b-3029520.jpg', 0, '2024-02-22 13:34:27'),
(4, 4, '1', 'Green Avacado', '0101480104', '100', '    Consumption of the avocado fruit and its availability in the retail market has increased in recent decades and with it the desire to learn more about the market and consumer choices. This research aims to explore the consumers\' preference heterogeneity toward avocado fruit in Italy assessing their personal eating orientation and socio-demographic factors. To achieve this purpose, the answers of 817 Italian consumer of avocado were collected using a structured questionnaire shared online at national level. A survey based on the best–worst method was conducted to assess the declared preferences of individuals toward a set of intrinsic, extrinsic and credence attributes of avocado, as well as a latent class analysis of subject preferences indexes was applied to identify different clusters of individuals.\r\n                                                            ', 'uploads/1706908817istockphoto-962648580-1024x1024.jpg', 0, '2024-02-02 21:57:13'),
(8, 13, '1', 'Avokado', '0100386448', '233', 'Highly nutritious avocado\r\n                    ', 'uploads/1706986006Avocadolg.jpeg', 0, '2024-02-03 16:46:46'),
(10, 13, '2', 'Dadokado', '023234234', '235', 'Highly recommended avocado of all times.\r\n                    ', 'uploads/1706987169Avokado.jpeg', 0, '2024-02-03 17:06:09'),
(11, 13, '2', 'Sendros', '0754678989', '21', 'Get healthy with this nutritious fruit\r\n                    ', 'uploads/1706987234Avo2.jpg', 0, '2024-02-03 17:07:14'),
(12, 15, '2', 'Avaca-New', '+254790633357', '500kg', 'Madaraka description       Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore quaerat nisi odit quasi quae, enim perspiciatis molestias soluta sed consequatur reprehenderit. Voluptates doloremque dolores laboriosam voluptatum nemo, consequatur laborum molestias?\r\n                                        ', 'uploads/1707821992WhatsApp Image 2024-02-04 at 19.17.56.jpeg', 0, '2024-02-13 13:21:30'),
(13, 15, '4', 'Golden Hass', '0920338607', '500kg', '                                I have 500 kgs of golden hass in my firm. I will need a truck from the pick up point,    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima est molestiae ad perferendis, iste repudiandae quis sint voluptatem assumenda ipsam in, cumque, tenetur architecto asperiores consectetur quasi exercitationem itaque vero?\r\n                                                            ', 'uploads/1708608600WhatsApp Image 2024-02-04 at 19.14.40.jpeg', 0, '2024-02-22 14:11:52'),
(14, 15, '4', 'Hass Avocado', '0780803412', '1 tonnne', 'owiriuenhfwernhutnldhdou ewrhruwerhihdwrhjew\r\n                    ', 'uploads/1708616988WhatsApp Image 2024-02-14 at 08.52.52.jpeg', 0, '2024-02-22 13:49:48'),
(15, 15, '3', 'Golden Hass', '0783254657658', '700KG', 'I HAVE 2 HAVEWDFFLR\r\n                    ', 'uploads/1708678263WhatsApp Image 2024-02-04 at 18.34.14.jpeg', 0, '2024-02-23 06:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`id`, `email`, `code`, `expire`) VALUES
(1, 'jackmutiso37@gmail.com', '16379', 1680452408),
(2, 'jackmutiso37@gmail.com', '46095', 1680452473);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `disabled`) VALUES
(1, 'User', 1),
(2, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `disabled`) VALUES
(1, 'Nakuru', 0),
(2, 'Nairobi', 0),
(3, 'Machakos', 0),
(4, 'Mombasa', 0),
(5, 'Meru', 0),
(6, 'Eldoret', 0),
(7, 'Thika', 0),
(8, 'Kitale', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `role`, `password`, `date`) VALUES
(1, 'Jack', 'jackmutiso37@gmail.com', '0745378674', 2, '12345', '2024-02-27 09:12:59'),
(3, 'Cesur', 'cesurelvis@gmail.com', '0720338607', 2, 'elvis123', '2024-02-27 09:13:21'),
(4, 'Stacy', 'stacia@gmail.com', '075544332211', 1, '12345', '2024-02-27 09:13:38'),
(6, 'Glady', 'kamaugladys@gmail.com', '0720338654', 1, '12345', '2024-02-27 09:14:16'),
(9, 'jair', 'mahlihep@gmail.com ', '0720338678', 1, 'MAAHLO@7', '2024-02-27 09:14:03'),
(10, 'jair', 'mahlihep@gmail.com ', '0720337653', 1, 'MAAHLO@7', '2024-02-27 09:14:27'),
(13, 'Cesur ', 'cesurelvis@gmail.com', '0720387653', 1, '12345', '2024-02-27 09:14:37'),
(14, 'newone', 'jackmutiso@gmail.com', '0720678543', 1, '12345', '2024-02-27 09:14:46'),
(15, 'Madaraka', 'raelmadaraka0@gmail.com', '0790633357', 1, '12345', '2024-02-27 09:15:03'),
(16, 'nevilleratemo', 'nratemo@gmail.com', '0722511567', 1, '12345', '2024-02-27 09:15:20'),
(17, 'NEW', 'new@gmail.com', '+254790633357', 1, '12345', '2024-02-27 07:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_table`
--
ALTER TABLE `permission_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission_table`
--
ALTER TABLE `permission_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
