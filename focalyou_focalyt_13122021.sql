-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2021 at 10:30 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `focalyou_focalyt`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_fav`
--

CREATE TABLE `add_to_fav` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `active` set('0','1') NOT NULL COMMENT '0= inactive,1= active',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `api_auth`
--

CREATE TABLE `api_auth` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_category` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `course_short_description` varchar(255) NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `course_thumbanil` varchar(255) NOT NULL,
  `course_metadata` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_video` varchar(255) NOT NULL,
  `course_short_video` varchar(255) NOT NULL,
  `course_preview_time` varchar(255) NOT NULL,
  `is_free` set('0','1') NOT NULL DEFAULT '1' COMMENT '0=paid,1=free',
  `price` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `status` set('0','1','2') NOT NULL DEFAULT '2' COMMENT '0=inactive,1=active,2=pending',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `category_code` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1' COMMENT '0=deactive,1=active',
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_comments`
--

CREATE TABLE `course_comments` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` set('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=pending,1=approve,2=disapprove',
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `timetamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_enroll`
--

CREATE TABLE `course_enroll` (
  `id` int(11) NOT NULL,
  `enroll_code` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status` set('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=active,1=unenrolled,2=blocked',
  `unenroll_date` varchar(255) NOT NULL,
  `unenroll_reason` varchar(255) NOT NULL,
  `blocked_date` varchar(255) NOT NULL,
  `blocked_reason` varchar(255) NOT NULL,
  `blocked_by` varchar(255) NOT NULL,
  `enroll_date` varchar(255) NOT NULL,
  `enroll_by` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_like`
--

CREATE TABLE `course_like` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `course_like` set('0','1') NOT NULL DEFAULT '0' COMMENT '0=like,1=dislike',
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_views`
--

CREATE TABLE `course_views` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_view_history`
--

CREATE TABLE `course_view_history` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_acess`
--

CREATE TABLE `menu_acess` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_ids` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settingsw`
--

CREATE TABLE `smtp_settingsw` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `subscription_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=deactive,1=active,2=pending',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int(11) NOT NULL,
  `web_name` varchar(255) NOT NULL,
  `web_title` varchar(255) NOT NULL,
  `web_keyword` text NOT NULL,
  `web_description` varchar(255) NOT NULL,
  `web_slogan` varchar(255) NOT NULL,
  `web_mail` varchar(255) NOT NULL,
  `web_address` varchar(255) NOT NULL,
  `web_phone` varchar(255) NOT NULL,
  `web_footer` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active\r\n',
  `user_role` set('1','2') NOT NULL DEFAULT '2' COMMENT '1=admin,2=student',
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `subscribe_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=active,1=copleted.2=bloacked,3=canceled	',
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions1`
--

CREATE TABLE `user_subscriptions1` (
  `id` int(11) DEFAULT NULL,
  `subscribe_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=active,1=copleted.2=bloacked,3=canceled',
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_fav`
--
ALTER TABLE `add_to_fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_auth`
--
ALTER TABLE `api_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code` (`category_code`);

--
-- Indexes for table `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_enroll`
--
ALTER TABLE `course_enroll`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enroll_code` (`enroll_code`);

--
-- Indexes for table `course_like`
--
ALTER TABLE `course_like`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`,`user_id`);

--
-- Indexes for table `course_views`
--
ALTER TABLE `course_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_view_history`
--
ALTER TABLE `course_view_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_acess`
--
ALTER TABLE `menu_acess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settingsw`
--
ALTER TABLE `smtp_settingsw`
  ADD KEY `id` (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_code` (`subscription_code`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribe_code` (`subscribe_code`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_fav`
--
ALTER TABLE `add_to_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_auth`
--
ALTER TABLE `api_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_enroll`
--
ALTER TABLE `course_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_like`
--
ALTER TABLE `course_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_views`
--
ALTER TABLE `course_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_view_history`
--
ALTER TABLE `course_view_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_acess`
--
ALTER TABLE `menu_acess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
