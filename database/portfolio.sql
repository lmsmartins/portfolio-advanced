-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2023 at 02:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1667521328);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1667521328, 1667521328),
('manageBlog', 2, 'Manage blog (full access)', NULL, NULL, 1667521328, 1667521328),
('manageProjects', 2, 'Manage all projects (full access)', NULL, NULL, 1667521328, 1667521328),
('manageTestimonials', 2, 'Manage all testimonials (full access)', NULL, NULL, 1667521328, 1667521328),
('testimonialManager', 1, NULL, NULL, NULL, 1667521328, 1667521328),
('viewProject', 2, 'Project actionView', NULL, NULL, 1667521328, 1667521328);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'manageBlog'),
('admin', 'manageProjects'),
('admin', 'testimonialManager'),
('testimonialManager', 'manageTestimonials'),
('testimonialManager', 'viewProject');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `base_url`, `mime_type`, `path_url`) VALUES
(12, '163402f2f88a90.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(13, '163402f2f8a2b9.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(14, '163402f2f8a886.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(29, '163406fd27ab66.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(30, '163406fd366efb.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(34, '16351b74dd7f8c.png', 'http://localhost/portfolio-advanced/backend/web/uploads/testimonials', 'image/png', 'uploads/testimonials'),
(37, '16359a70addd19.png', 'http://localhost/portfolio-advanced/backend/web/uploads/testimonials', 'image/png', 'uploads/testimonials'),
(38, '16362a6b146abf.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(41, '16362a6ce695b2.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(47, '16363df582d74a.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(48, '163640b719fa70.png', 'http://localhost/portfolio-advanced/backend/web/uploads/testimonials', 'image/png', 'uploads/testimonials'),
(49, '163a3611cd2e36.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(60, '163b9892aa14e0.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects'),
(61, '163b9892b76cbd.jpg', 'http://localhost/portfolio-advanced/backend/web/uploads/projects', 'image/jpeg', 'uploads/projects');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1661982310),
('m130524_201442_init', 1663023286),
('m140506_102106_rbac_init', 1667520207),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1667520207),
('m180523_151638_rbac_updates_indexes_without_prefix', 1667520207),
('m190124_110200_add_verification_token_column_to_user_table', 1663023286),
('m200409_110543_rbac_update_mssql_trigger', 1667520207),
('m220830_184924_create_project_table', 1661982335),
('m220830_185515_create_file_table', 1661983121),
('m220830_185844_create_project_image_table', 1661983121),
('m220830_190245_create_testimonial_table', 1661983121),
('m220914_205841_alter_date_columns_in_project_table', 1663189540),
('m221007_112900_add_path_url_column_to_file_table', 1665142173),
('m221007_175414_fix_file_foreign_key_in_testimonial_table', 1665165549),
('m221103_192059_create_post_table', 1667503322),
('m221104_000715_init_rbac', 1667521328);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `slug`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'My first amazing post!', 'Ipsum lorem... a', 'my-first-amazing-post', 1, 1667504095, 1667504695),
(2, 'My second post', 'asdasdaposkaposkdpao', '213123po', 1, 1667504095, 1667504095),
(3, 'My third post', 'apsodkaposdkaopsdkpkad', 'oijitjfgndsad', 1, 1667504206, 1667504206),
(4, 'My latest website', 'ipsum lorem asdasdasd', 'my-latest-website', 1, 1667504735, 1667504735);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tech_stack` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `tech_stack`, `description`, `start_date`, `end_date`) VALUES
(1, 'My Portfolio using Yii 2', 'Yii 2, PHP, JavaScript', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet magna orci. Integer efficitur, nisl tempus tincidunt ornare, sem magna maximus eros, a efficitur dui nunc eget sapien. Phasellus accumsan libero et lorem pulvinar, quis ultrices dui consectetur. Cras dignissim elementum aliquam. Maecenas pretium ligula in augue bibendum, nec consequat libero sollicitudin. Aliquam tincidunt, magna ac vulputate efficitur, ligula ligula aliquam orci, sed placerat est nisi vitae neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2022-09-10', '2022-12-12'),
(3, 'Online store 1', '<b><i><u>Yii 2</u></i></b>, <span style=\"background-color: rgb(255, 255, 0);\">PHP</span>, and <font color=\"#00ff00\">JavaScript</font>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet magna orci. Integer efficitur, nisl tempus tincidunt ornare, sem magna maximus eros, a efficitur dui nunc eget sapien. Phasellus accumsan libero et lorem pulvinar, quis ultrices dui consectetur. Cras dignissim elementum aliquam. Maecenas pretium ligula in augue bibendum, nec consequat libero sollicitudin. Aliquam tincidunt, magna ac vulputate efficitur, ligula ligula aliquam orci, sed placerat est nisi vitae neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2022-02-10', '2022-08-23'),
(4, 'Vacation manager', 'Yii 2, PHP, JavaScript, and jQuery', 'This is an amazing vacation manager web app developed in Yii 2!', '2022-03-16', '2022-09-29'),
(9, 'Test 4', '<p>PHP, Yii 2</p>', 'Great!', '2022-09-21', '2022-09-30'),
(10, 'Test 5', '<p>yii 2</p>', 'awesome', '2022-10-04', '2022-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `project_image`
--

CREATE TABLE `project_image` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_image`
--

INSERT INTO `project_image` (`id`, `project_id`, `file_id`) VALUES
(12, 10, 12),
(13, 10, 13),
(14, 10, 14),
(28, 9, 38),
(31, 4, 41),
(37, 4, 47),
(38, 3, 49),
(49, 1, 60),
(50, 1, 61);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `customer_image_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `project_id`, `customer_image_id`, `title`, `customer_name`, `review`, `rating`) VALUES
(5, 10, 34, 'Amazing work!', 'Sophie Smith', 'I loved the website you have developed for us. Truly amazing!', 5),
(6, 10, 48, 'Great work! 5 stars!', 'John Adams', 'Amazing work! Loved it!', 5),
(7, 4, 37, 'Awesome work!', 'Peter Brown', 'Ipsum lorem', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'mQHAfjLUQOOkC1XxbjALuXFdWXqv4ybR', '$2y$13$VewcQ6yrsv2IGVLC8GonNOh1qpycsUnBg3vU3QxWzxWlw.FaHhjP2', NULL, 'lmsmartins@gmail.com', 10, 1663023339, 1663023851, 'iLebk0Pf5iLZj8PhbPGdheqWaBbC1F9-_1663023339');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_image`
--
ALTER TABLE `project_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-project_image-project_id` (`project_id`),
  ADD KEY `idx-project_image-file_id` (`file_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-testimonial-project_id` (`project_id`),
  ADD KEY `idx-testimonial-customer_image_id` (`customer_image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_image`
--
ALTER TABLE `project_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_image`
--
ALTER TABLE `project_image`
  ADD CONSTRAINT `fk-project_image-file_id` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-project_image-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `fk-testimonial-customer_image_id` FOREIGN KEY (`customer_image_id`) REFERENCES `file` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk-testimonial-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
