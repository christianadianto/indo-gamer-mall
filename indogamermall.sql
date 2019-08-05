-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 02:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indogamermall`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `transaction_id` char(36) NOT NULL,
  `voucher_detail_id` char(36) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaction`
--

INSERT INTO `detail_transaction` (`transaction_id`, `voucher_detail_id`, `quantity`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1d7f4e07-209a-4746-9b7d-cf948e1b68ab', '23431273-5ed9-4b04-a340-496c21f2cbf9', 2, NULL, '2019-07-31 05:33:55', NULL),
('1d7f4e07-209a-4746-9b7d-cf948e1b68ab', 'd0a75037-ce2a-4c06-9376-f9bce6752f9e', 1, NULL, '2019-07-31 05:33:55', NULL),
('738deff2-974a-4043-9b06-958ed3318a43', 'ced62453-9838-47b7-bdfb-90da5efe5276', 3, NULL, '2019-07-20 16:51:58', NULL),
('aea6dbfa-aae9-4c61-aadd-fc6ba8c400d5', '009f71f7-75d2-4c2a-8ad1-115face1a7f3', 2, NULL, '2019-07-21 16:18:50', NULL),
('b60789e6-58d9-4dbe-aade-68d30c906f78', '009f71f7-75d2-4c2a-8ad1-115face1a7f3', 2, NULL, '2019-07-20 16:50:38', NULL),
('b60789e6-58d9-4dbe-aade-68d30c906f78', 'ced62453-9838-47b7-bdfb-90da5efe5276', 2, NULL, '2019-07-20 16:50:38', NULL),
('fe4bc180-e7be-424b-ba4d-8f7d687af6fb', '23431273-5ed9-4b04-a340-496c21f2cbf9', 1, NULL, '2019-07-31 10:21:00', NULL),
('fe4bc180-e7be-424b-ba4d-8f7d687af6fb', '38f2bfd6-6593-4d29-a863-9234a5d08054', 3, NULL, '2019-07-31 10:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `header_transaction`
--

CREATE TABLE `header_transaction` (
  `id` char(36) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` char(36) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaction`
--

INSERT INTO `header_transaction` (`id`, `transaction_date`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1d7f4e07-209a-4746-9b7d-cf948e1b68ab', '2019-07-31 05:33:55', 'ec921b73-6369-425e-8fa2-f4fd327a61dc', 0, NULL, '2019-07-31 05:33:55', NULL),
('738deff2-974a-4043-9b06-958ed3318a43', '2019-07-31 08:01:19', '32bb92a0-cb73-472e-953f-8eb681a292d5', 1, NULL, '2019-07-20 16:51:58', NULL),
('aea6dbfa-aae9-4c61-aadd-fc6ba8c400d5', '2019-07-31 08:02:33', '541fbedb-efc6-4039-b2d2-316832c4aad7', 1, NULL, '2019-07-21 16:18:50', NULL),
('b60789e6-58d9-4dbe-aade-68d30c906f78', '2019-07-21 16:22:11', '32bb92a0-cb73-472e-953f-8eb681a292d5', 0, NULL, '2019-07-20 16:50:38', NULL),
('fe4bc180-e7be-424b-ba4d-8f7d687af6fb', '2019-07-31 10:21:00', '32bb92a0-cb73-472e-953f-8eb681a292d5', 0, NULL, '2019-07-31 10:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`id`, `username`, `password`, `roles`, `deleted_at`, `created_at`, `updated_at`) VALUES
-- ('32bb92a0-cb73-472e-953f-8eb681a292d5', 'ca', '5435c69ed3bcc5b2e4d580e393e373d3', 'customer', NULL, '2019-07-19 17:00:00', NULL),
-- ('41c6d0c4-af82-4e7b-9eb4-01f4ce4edca8', 'trn01', '2b4a6bdf33de335a048c6ad3a6d92a69', 'customer', '2019-08-03 12:03:53', '2019-07-21 16:11:06', NULL),
-- ('4ad0e30b-3f1e-4e5f-90aa-5e1ad71a96d5', 'test', '098f6bcd4621d373cade4e832627b4f6', 'customer', NULL, '2019-07-31 05:34:10', NULL),
-- ('541fbedb-efc6-4039-b2d2-316832c4aad7', 'trn02', '9c22df09f6ae8af9a4c04a686c221f92', 'customer', NULL, '2019-07-21 16:18:22', NULL),
-- ('badbd03c-c420-4905-b9f3-c049de86162b', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, '2019-07-19 17:00:00', NULL),
-- ('ec921b73-6369-425e-8fa2-f4fd327a61dc', 'dummy', '275876e34cf609db118f3d84b799a790', 'customer', NULL, '2019-07-31 05:33:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_detail` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `image`, `image_detail`, `deleted_at`, `created_at`, `updated_at`) VALUES
('43da4bda-b00b-43db-bd3b-df91ae26369f', 'Garena Shells', 'garena.png', 'garena_detail.jpg', NULL, '2019-07-06 17:00:00', NULL),
('b028278f-4e9a-4868-ac69-61c0c9b22808', 'LYTO Game On Card', 'lyto.png', 'lyto_detail.jpg', NULL, '2019-07-06 17:00:00', NULL),
('bfc62962-0dd6-4605-92c0-846b4e8c1136', 'Steam Wallet Code', 'steam.png', 'steam_detail.jpg', NULL, '2019-07-06 17:00:00', NULL),
('c20bc0c9-1199-4727-8e42-e4d2ae5f9783', 'Google Play Gift Card', 'googleplay.png', 'googleplay_detail.jpg', NULL, '2019-07-06 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_details`
--

CREATE TABLE `voucher_details` (
  `id` char(36) NOT NULL,
  `voucher_id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_details`
--

INSERT INTO `voucher_details` (`id`, `voucher_id`, `type`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
('38f2bfd6-6593-4d29-a863-9234a5d08054', '43da4bda-b00b-43db-bd3b-df91ae26369f', 'Garena 66 shells Rp20000', 20000, NULL, '2019-07-30 17:00:00', NULL),
('edf76288-a703-455b-b165-6889f60d0a1f', '43da4bda-b00b-43db-bd3b-df91ae26369f', 'Garena 33 shells Rp10000', 10000, NULL, '2019-07-30 17:00:00', NULL),
('2e66495f-2c90-4619-ae14-ef2ae6ed7c7e', 'b028278f-4e9a-4868-ac69-61c0c9b22808', 'Lyto 20000', 20000, NULL, '2019-07-30 17:00:00', NULL),
('d0b1cb8d-3e65-4bc4-88d0-d55a54c4af60', 'b028278f-4e9a-4868-ac69-61c0c9b22808', 'Lyto 10000', 10000, NULL, '2019-07-30 17:00:00', NULL),
('009f71f7-75d2-4c2a-8ad1-115face1a7f3', 'bfc62962-0dd6-4605-92c0-846b4e8c1136', 'Steam Wallet Code Rp45.000', 45000, NULL, '2019-07-17 17:00:00', NULL),
('ced62453-9838-47b7-bdfb-90da5efe5276', 'bfc62962-0dd6-4605-92c0-846b4e8c1136', 'Steam Wallet Code Rp12.000', 12000, NULL, '2019-07-17 17:00:00', NULL),
('23431273-5ed9-4b04-a340-496c21f2cbf9', 'c20bc0c9-1199-4727-8e42-e4d2ae5f9783', 'Google Play Gift Card Rp50000', 50000, NULL, '2019-07-30 17:00:00', NULL),
('d0a75037-ce2a-4c06-9376-f9bce6752f9e', 'c20bc0c9-1199-4727-8e42-e4d2ae5f9783', 'Google Play Gift Card Rp20000', 20000, NULL, '2019-07-30 17:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`transaction_id`,`voucher_detail_id`),
  ADD KEY `voucher_detail_id` (`voucher_detail_id`);

--
-- Indexes for table `header_transaction`
--
ALTER TABLE `header_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_details`
--
ALTER TABLE `voucher_details`
  ADD PRIMARY KEY (`voucher_id`,`id`),
  ADD KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD CONSTRAINT `detail_transaction_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `header_transaction` (`id`),
  ADD CONSTRAINT `detail_transaction_ibfk_2` FOREIGN KEY (`voucher_detail_id`) REFERENCES `voucher_details` (`id`);

--
-- Constraints for table `header_transaction`
--
ALTER TABLE `header_transaction`
  ADD CONSTRAINT `header_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `voucher_details`
--
ALTER TABLE `voucher_details`
  ADD CONSTRAINT `voucher_details_ibfk_1` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
