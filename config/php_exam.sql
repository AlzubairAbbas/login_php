-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 11:22 PM
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
-- Database: `php_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`) VALUES
(5, 'play', 'hhhh', '2026-01-05 21:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `status`, `created_at`, `role`) VALUES
(1, 'Test User', 'test@gmail.com', '$2y$10$G3kXQdAfn5NJHynmoOo/xeY6es8k74YrFFulmQ1PmRZd8BilCfb3K', '773456789', 'active', '2025-12-26 20:26:01', 'admin'),
(2, 'ebra', 'alrt(\"aa@gmail.com\");', '$2y$10$G3kXQdAfn5NJHynmoOo/xeY6es8k74YrFFulmQ1PmRZd8BilCfb3K', '774698220', 'active', '2026-01-02 21:14:10', 'user'),
(6, 'alzo', 'alzo@gmail.com', '$2y$10$6EPQiYy9evtKhDcmmXy.qObLA3BHeCBAm64Gz43rajIMCSFEenBRa', '774698220', 'inactive', '2026-01-05 18:25:19', 'user'),
(7, 'hosam', 'hos@gmail.com', '$2y$10$KyA7yGFYst1rsxpiL.rWaO3juAPCwed.yKbuk3zFQn9H3w6DMIsyi', '774698220', 'active', '2026-01-05 18:46:04', 'admin'),
(8, 'zizo', 'zizo@gmail.com', '$2y$10$R66JCWAsGTMgcEJd39Vibu5FdndspZQTapbg32BuwQqfRa5MLR1Q6', '774698220', 'active', '2026-01-05 20:05:23', 'user'),
(9, 'zizo', 'test@mail.com', '$2y$10$oPn7Z11fsdl/Op5EKTMBDuocBG9G/J5c1Zl2eqjkGuMq8ySiIZjPq', '774698220', 'active', '2026-01-05 20:12:50', 'user'),
(10, 'alrt(&quot;aa@gmail.com&quot;);', 'tet@gmail.com', '$2y$10$IxR.mg.YnvhYoPl0cB25fu/lQx.wibsL95EHPAJag6pzO3R7PZ9M6', '774698220', 'active', '2026-01-05 20:13:37', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
