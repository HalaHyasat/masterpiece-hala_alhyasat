-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `type`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Hala Al Hyasat', 'hala@gmail.com', 'super admin', 'default.png', '$2y$10$Z8yFTcwx5X/6P2CkdCEIqO3HwbzNpgWK4piQEySnQt6rgEmm0QsXy', '2021-04-27 18:46:30', '2021-04-27 18:46:30'),
(2, 'Hala', 'hala.98@gmail.com', 'admin', '1619737430.png', '$2y$10$HAf4LSXuXJEJ5j1cWW2YIOYNywCFEvIem8vfotQ4jppWu/7ZC35eG', '2021-04-27 18:56:02', '2021-04-29 23:03:51'),
(3, 'Dana Toughoj', 'dana@gmail.com', 'admin', '1619737211.jpg', '$2y$10$A3LvlVQLueToWF.DLeNs.OmGr6zyOAwadBOhk0nGYwvneCwMVwCNy', '2021-04-29 23:00:11', '2021-04-29 23:00:11'),
(4, 'Waed Dawaghreh', 'waed@gmail.com', 'admin', '1619737253.jpg', '$2y$10$MKyddjMBO.2sCLKnFsnMDuFrI690i4npQFPYIakVfB1Bkk/3pwJQ6', '2021-04-29 23:00:54', '2021-04-29 23:00:54'),
(5, 'Saja Dahamsheh', 'saja@gmail.com', 'admin', '1619737297.jpg', '$2y$10$AQYs05GPi8W.IQcZcy.lVejZTF1L8JcPcJoPDRNrqPhV23U3qIgiW', '2021-04-29 23:01:37', '2021-04-29 23:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `receiver` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `receiver`, `content`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 'Hii Admin', '2021-04-29 08:30:25', '2021-04-29 08:30:25'),
(2, 0, 4, 'Hey', '2021-04-29 08:31:05', '2021-04-29 08:31:05'),
(3, 3, 0, 'Hello,\r\nCan you guide me on how I can change my profile picture?', '2021-04-29 21:12:24', '2021-04-29 21:12:24'),
(4, 3, 2, 'Hello Mary, nice to meet you', '2021-04-29 21:12:54', '2021-04-29 21:12:54'),
(5, 13, 0, 'Hello, can I ask you a question, please?', '2021-04-29 22:04:06', '2021-04-29 22:04:06'),
(6, 0, 3, '1. Click on your image top-right\r\n2. Choose My account\r\n3. Upload a new photo\r\n\r\nIf you have any more questions let me know!', '2021-04-29 22:21:54', '2021-04-29 22:21:54'),
(7, 0, 13, 'Yes of course!', '2021-04-29 22:22:21', '2021-04-29 22:22:21'),
(9, 13, 0, 'How can I create a Twitter account?', '2021-04-29 22:23:37', '2021-04-29 22:23:37'),
(10, 0, 13, '1. Choose courses from a sidebar', '2021-04-29 22:24:32', '2021-04-29 22:24:32'),
(11, 0, 13, '2. Choose twitter, all steps explained by details their.', '2021-04-29 22:25:53', '2021-04-29 22:25:53'),
(12, 13, 0, 'I got it, much of thanks!!', '2021-04-29 22:27:51', '2021-04-29 22:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(3, 0, 91, 'Technology awareness courses meant for senior citizens play a crucial social role in helping the elderly keep up with the fast-paced world and leverage technology to their advantages, such as safety, entertainment, and self-dependence. You don’t have to enroll them in a course that deals with something as complicated as coding. A few basics that simplify their lives and help them feel secure.', '2021-04-29 21:15:48', '2021-04-29 21:15:48'),
(4, 0, 91, 'Feel free to ask about any thing you need!', '2021-04-29 21:17:01', '2021-04-29 21:17:01'),
(5, 0, 93, 'Change your post\'s privacy if desired. By default, your posts will only be available for your friends to see, but you can change this by clicking the Friends drop-down box to the left of the Post button and then clicking a different privacy setting.', '2021-04-29 21:19:06', '2021-04-29 21:19:06'),
(6, 2, 93, 'When you want to publish a post, you will have a globe icon. When you click on it, a drop-down menu will appear. From there, you can specify the privacy of the post.', '2021-04-29 21:21:12', '2021-04-29 21:21:12'),
(9, 13, 92, 'I will forever be grateful to you for your help. Thank you!😍', '2021-04-29 21:47:05', '2021-04-29 21:47:05'),
(11, 0, 99, '– The use of smartphones – Smartphone applications – Use of social media – Use of GPS – Online banking and transactions – The use of entertainment applications – Use of email, messengers, voice and video calling and their various features – Use of security features – Identifying fake calls – Creating user IDs, setting up and changing passwords', '2021-04-29 22:19:08', '2021-04-29 22:19:08'),
(12, 0, 98, 'Yes, of course. In fact, it is better to enroll them in short-term courses with a shorter duration per session. Unlike us, who are familiar with technology, and concepts such as video conferencing, it is difficult for the elderly to attend longer learning sessions, especially those conducted online. In situations like these, finding online sessions of shorter durations and focusing on one topic at a time, followed by Q&A sessions, can prove helpful and useful.', '2021-04-29 22:19:38', '2021-04-29 22:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `comment_users`
--

CREATE TABLE `comment_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_users`
--

INSERT INTO `comment_users` (`id`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(2, 13, 3, '2021-04-29 21:39:30', '2021-04-29 21:39:30'),
(4, 13, 6, '2021-04-29 21:52:08', '2021-04-29 21:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `user_id`, `friend_id`, `created_at`, `updated_at`) VALUES
(5, 4, 6, '2021-04-28 00:48:30', '2021-04-28 00:48:30'),
(6, 0, 3, '2021-04-28 00:49:05', '2021-04-28 00:49:05'),
(7, 0, 5, '2021-04-28 00:49:32', '2021-04-28 00:49:32'),
(8, 0, 7, '2021-04-28 00:49:38', '2021-04-28 00:49:38'),
(9, 0, 9, '2021-04-28 00:49:45', '2021-04-28 00:49:45'),
(11, 0, 12, '2021-04-28 00:50:09', '2021-04-28 00:50:09'),
(12, 4, 0, '2021-04-28 01:08:44', '2021-04-28 01:08:44'),
(13, 0, 2, '2021-04-28 01:17:18', '2021-04-28 01:17:18'),
(14, 0, 6, '2021-04-28 01:17:57', '2021-04-28 01:17:57'),
(15, 0, 8, '2021-04-28 01:18:06', '2021-04-28 01:18:06'),
(16, 0, 11, '2021-04-28 01:18:14', '2021-04-28 01:18:14'),
(17, 13, 0, '2021-04-28 23:48:03', '2021-04-28 23:48:03'),
(18, 14, 0, '2021-04-28 23:48:50', '2021-04-28 23:48:50'),
(19, 15, 0, '2021-04-28 23:50:57', '2021-04-28 23:50:57'),
(20, 4, 8, '2021-04-29 08:30:06', '2021-04-29 08:30:06'),
(21, 4, 10, '2021-04-29 17:59:13', '2021-04-29 17:59:13'),
(22, 4, 2, '2021-04-29 18:12:36', '2021-04-29 18:12:36'),
(24, 13, 2, '2021-04-29 18:15:02', '2021-04-29 18:15:02'),
(25, 13, 11, '2021-04-29 18:15:13', '2021-04-29 18:15:13'),
(26, 13, 7, '2021-04-29 18:15:20', '2021-04-29 18:15:20'),
(27, 13, 14, '2021-04-29 18:15:27', '2021-04-29 18:15:27'),
(28, 13, 15, '2021-04-29 18:15:35', '2021-04-29 18:15:35'),
(29, 11, 2, '2021-04-29 18:25:31', '2021-04-29 18:25:31'),
(30, 11, 10, '2021-04-29 18:25:39', '2021-04-29 18:25:39'),
(31, 11, 8, '2021-04-29 18:25:47', '2021-04-29 18:25:47'),
(32, 11, 14, '2021-04-29 18:25:53', '2021-04-29 18:25:53'),
(33, 3, 2, '2021-04-29 21:05:44', '2021-04-29 21:05:44'),
(34, 3, 14, '2021-04-29 21:05:53', '2021-04-29 21:05:53'),
(35, 3, 8, '2021-04-29 21:06:05', '2021-04-29 21:06:05'),
(36, 13, 8, '2021-04-29 22:02:12', '2021-04-29 22:02:12'),
(37, 13, 10, '2021-04-29 22:02:26', '2021-04-29 22:02:26'),
(38, 13, 12, '2021-04-29 22:02:35', '2021-04-29 22:02:35'),
(39, 6, 12, '2021-04-29 22:13:57', '2021-04-29 22:13:57'),
(40, 6, 14, '2021-04-29 22:14:08', '2021-04-29 22:14:08'),
(41, 6, 15, '2021-04-29 22:14:15', '2021-04-29 22:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_03_18_172905_create_admins_table', 1),
(3, '2021_04_14_122047_create_pages_table', 1),
(4, '2021_04_14_122195_create_posts_table', 1),
(5, '2021_04_14_122325_create_comments_table', 1),
(6, '2021_04_14_122533_create_chats_table', 1),
(7, '2021_04_14_122550_create_connections_table', 1),
(8, '2021_04_16_003133_create_post_users_table', 1),
(9, '2021_04_18_115928_create_comment_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `image`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(0, 0, '', 'Feed', '', '2021-04-27 18:49:30', '2021-04-27 18:49:30'),
(6, 0, '1619574757.png', 'Facebook', 'This course will teach you how to use Facebook on both desktop and mobile versions.', '2021-04-28 01:52:37', '2021-04-28 01:52:37'),
(8, 0, '1619654118.png', 'Instagram', 'This course will teach you how to use Instagram on both desktop and mobile versions.', '2021-04-28 23:55:18', '2021-04-28 23:55:18'),
(9, 0, '1619654334.png', 'LinkedIn', 'This course will teach you how to use LinkedIn on both desktop and mobile versions.', '2021-04-28 23:58:54', '2021-04-28 23:58:54'),
(16, 0, '1619655059.png', 'Whatsapp', 'This course will teach you how to use Whatsapp on both desktop and mobile versions.', '2021-04-29 00:10:59', '2021-04-29 00:10:59'),
(17, 0, '1619655229.png', 'Messenger', 'This course will teach you how to use Messenger on both desktop and mobile versions.', '2021-04-29 00:13:49', '2021-04-29 00:13:49'),
(18, 0, '1619655398.png', 'Twitter', 'This course will teach you how to use Twitter on both desktop and mobile versions.', '2021-04-29 00:16:38', '2021-04-29 00:16:38'),
(21, 0, '1619656808.png', 'Telegram', 'This course will teach you how to use Telegram on both desktop and mobile versions.', '2021-04-29 00:40:08', '2021-04-29 00:40:08'),
(22, 0, '1619680553.png', 'YouTube', 'This course will teach you how to use YouTube on both desktop and mobile versions.', '2021-04-29 07:15:53', '2021-04-29 07:15:53'),
(23, 0, '1619680723.png', 'ZOOM', 'This course will teach you how to use ZOOM on both desktop and mobile versions.', '2021-04-29 07:18:43', '2021-04-29 07:18:43'),
(28, 11, '1619720960.jpg', 'Strong Health and fitness', 'Health and fitness become very common in the last few years owing to the importance of staying active in everyday life. Seniors are increasingly opting for off-beat activities like aqua yoga and senior marathons.', '2021-04-29 18:29:20', '2021-04-29 18:29:20'),
(29, 13, '1619733333.jpg', 'Medical Questions', 'A medical Q&A blog that focuses on asking the most common question and issues that are faced during old age can help resolve several issues while inculcating a need to stay updated about health among seniors.', '2021-04-29 21:55:33', '2021-04-29 21:55:33'),
(30, 13, '1619733403.jfif', 'Technology and technical help', 'Technology has been growing at a pace that is hard to keep up with. With newer and newer gadgets coming in the market, seniors can feel intimated and lost while using gadgets they know nothing about. There are several ‘Tech made easy’ blogs on the internet for the elderly that teach seniors how to use devices for communication, entertainment, and games.', '2021-04-29 21:56:43', '2021-04-29 21:56:43'),
(31, 13, '1619733516.jpg', 'Senior lifestyle & living trends', 'Seniors of the previous generations used to be greatly dependent on their children. However, today’s elderly have developed a more individualistic approach. They want to live their life on their terms, and hence senior lifestyle and living trends are rapidly evolving.', '2021-04-29 21:58:36', '2021-04-29 21:58:36'),
(33, 13, '1619734070.jfif', 'Arts and Crafts / Projects', 'DIY trends are becoming very popular with young and old alike. A blog that provides different arts and crafts projects for seniors can keep them occupied and have fun in a dozen different ways.', '2021-04-29 22:07:50', '2021-04-29 22:07:50'),
(34, 11, '1619736615.jpg', 'Social protection for seniors', 'Social Protection in Health means \"warranty, given by society, through public authorities, for an individual, or group of individuals, can satisfy their health needs and demands obtaining adequate access to Health system or any of the health subsystems in the country, without the ability to pay be a limiting factor. \"', '2021-04-29 22:50:15', '2021-04-29 22:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `page_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `page_id`, `content`, `media`, `created_at`, `updated_at`) VALUES
(5, 0, 6, '1. Open Facebook. Go to https://www.facebook.com/ in your computer\'s web browser, or tap the Facebook app icon if you\'re on mobile. This will bring you to the Facebook login page if you aren\'t currently logged into a Facebook account.\r\nIf you haven\'t yet downloaded the Facebook app for your iPhone or Android, you can do so for free.', '1619682123.jpg', '2021-04-29 07:42:03', '2021-04-29 07:42:03'),
(6, 0, 6, '2. Create a Facebook account. You can do this both on the desktop version of Facebook and in the Facebook mobile app.', '1619682162.jpg', '2021-04-29 07:42:42', '2021-04-29 07:42:42'),
(7, 0, 6, '3. Go to your Facebook page. This will differ slightly depending on whether you\'re using a computer or a mobile item (e.g., a smartphone):\r\nDesktop - Click the tab with your name on it in the upper-right side of the window.\r\nMobile - Tap ☰ in the lower- or upper-right corner of the screen, then tap your name at the top of the resulting menu.', '1619682602.jpg', '2021-04-29 07:50:02', '2021-04-29 07:50:02'),
(8, 0, 6, '4. \r\nAdd a profile picture. You can add a picture of yourself (or anything else) to your profile so that other users can identify you:\r\nDesktop - Click Add Photo in the upper-left side of your Facebook profile, click Upload Photo, select a photo from your computer, and click Open.\r\nMobile - Tap the square profile picture icon at the top of the page, tap Select Profile Picture, tap a photo that you want to use, and tap Use.\r\nYou can also add a photo to the top of your Facebook profile by clicking or tapping Add Cover Photo, clicking Upload Photo (desktop) or tapping Change Cover Photo (mobile), and selecting a photo from your computer or mobile platform.', '1619682704.jpg', '2021-04-29 07:51:44', '2021-04-29 07:51:44'),
(9, 0, 6, '5. Edit your account information. If you didn\'t add certain information while setting up your Facebook account (or you want to remove some of the stuff that you did add), you can do so from your profile page:\r\nDesktop - Click About below your cover photo area, click a subject below the \"About\" heading on the left side of the page (e.g., Places You\'ve Lived), hover your mouse over an item and click Edit when it appears, and edit the item.\r\nMobile - Scroll down and tap About just above the \"What\'s on your mind?\" text box, tap the \"Edit\" pencil icon to the right of an item, tap the Edit option, and edit the item.', '1619682972.jpg', '2021-04-29 07:55:46', '2021-04-29 07:56:12'),
(10, 0, 6, '6. Save any changes. Click or tap Save on the page on which you made your changes to save them and apply them to your profile. Now that you\'ve set up your Facebook account, it\'s time to add some friends.', '1619683508.jpg', '2021-04-29 08:05:08', '2021-04-29 08:05:08'),
(12, 0, 6, 'To learn more you can browse this site: https://www.wikihow.com/Use-Facebook\r\n\r\nOR watch this Youtube video:\r\nhttps://www.youtube.com/watch?v=jIywollDp1c\r\n\r\nFeel free to contact us any time!', NULL, '2021-04-29 09:08:21', '2021-04-29 09:08:21'),
(13, 0, 6, 'To learn more you can browse this site: https://www.wikihow.com/Use-Facebook\r\n\r\nOR watch this Youtube video:\r\nhttps://www.youtube.com/watch?v=jIywollDp1c\r\n\r\nFeel free to contact us any time!', NULL, '2021-04-29 09:08:21', '2021-04-29 09:08:21'),
(14, 0, 8, '1. Download the Instagram app. You can do this by searching for \"Instagram\" in your device\'s app marketplace (e.g., the App Store on iOS or the Google Play Store on Android) and then selecting the pertinent search result for download.', '1619688009.jpg', '2021-04-29 09:20:09', '2021-04-29 09:20:09'),
(15, 0, 8, '2. Open the Instagram app. To do so, tap the Instagram icon (it resembles a multicolored camera) on one of your device’s home screens.', '1619688026.jpg', '2021-04-29 09:20:26', '2021-04-29 09:20:26'),
(16, 0, 8, '3. Create an account by tapping Sign up at the bottom of your screen. From here, you\'ll need to enter your email address, preferred username, password, and phone number (optional but recommended). You\'ll also have the opportunity to upload a profile photo before continuing.\r\nYou can choose to add a bit of personal information in the “About” section as well, including a first and last name or a personal website.\r\nIf you already have an Instagram account, you can tap Sign In at the bottom of the Instagram login page and enter your account login information instead.', '1619688043.jpg', '2021-04-29 09:20:43', '2021-04-29 09:20:43'),
(17, 0, 8, '4. Select friends to follow. After finishing your account creation, you\'ll have an option to choose to find friends from your contact list, Facebook account, Twitter account, or by manual search. Note that you will need to provide Instagram with your Facebook or Twitter account information (your email address and relevant password) before you\'ll be able to select friends from either of these platforms.\r\nYou can choose to follow suggested Instagram users by tapping the “Follow” button next to their name.\r\nFollowing people allows you to see their posts in your \"Home\" page.\r\nYou will be able to add friends at any time from within your account, even after you create your account.', '1619688060.jpg', '2021-04-29 09:21:00', '2021-04-29 09:21:00'),
(18, 0, 8, '5. Select Done when you\'re ready to proceed. Doing this will take you directly to your Instagram account\'s Home page, which is where you will see posts from the people you\'ve chosen to follow.', '1619688076.jpg', '2021-04-29 09:21:16', '2021-04-29 09:21:16'),
(19, 0, 8, 'To learn more you can browse this site: https://www.wikihow.com/Use-Instagram\r\nOR\r\nwatch this Youtube video: https://www.youtube.com/watch?v=OrNq4WBkzVI\r\nFeel free to contact us any time!', NULL, '2021-04-29 09:22:15', '2021-04-29 09:22:15'),
(20, 0, 9, '1. Join LinkedIn at their website. Click on the link, add your relevant personal information, and click \"join LinkedIn.\"', '1619689060.jpg', '2021-04-29 09:37:40', '2021-04-29 09:37:40'),
(21, 0, 9, '2. Create your profile. Your profile is the condensed picture of how the professional world sees you. A great, detailed profile projects someone who is successful, thorough, and connected.[2] A thin or outdated profile projects someone who doesn\'t care or who can\'t be bothered. Make sure your profile says the thing(s) you want to project.\r\nLinkedIn\'s profile wizard will take you through the steps of entering your region, industry, company and current job title.\r\nYou will also be asked whether you are employed, a business owner, looking for work, working independently or a student.\r\nThis information completes your basic profile.', '1619689076.jpg', '2021-04-29 09:37:56', '2021-04-29 09:37:56'),
(22, 0, 9, '3. Confirm the email account you used to create your profile via the link provided. This will help you efficiently complete the next step, which is finding connections.', '1619689090.jpg', '2021-04-29 09:38:10', '2021-04-29 09:38:10'),
(23, 0, 9, '4. Add your connections. Connections are professional contacts whom you know or wish to know. The connections you add on LinkedIn become part of your social network.\r\nLinkedIn will prompt you to search for connections by crawling your email, which you give LinkedIn access to. You can use this to see who among your email connections already has a LinkedIn account and invite them to become part of your professional network.\r\nYou may opt to skip this step if you prefer to add connections individually.', '1619689109.jpg', '2021-04-29 09:38:29', '2021-04-29 09:38:29'),
(24, 0, 9, '5. Continue to build your profile. Enter your previous employment details and your education information. Then enter a brief summary and/or headline. A brief summary or headline stating who you are professionally in a few sentences. This headline should give a sense of your most outstanding professional attributes.', '1619689126.jpg', '2021-04-29 09:38:46', '2021-04-29 09:38:46'),
(25, 0, 9, '6. Upload a profile photograph.[3] Unlike other social networks, this picture should reflect you at your most professional. No pictures of binge drinking, girls around the arm, or smoke wafting from the background, even if it\'s a really good picture. Choose an illustration that represents your professional image. This can be a traditional head and shoulders shot, a shot of you at work or a copy of your logo.\r\nUse a clear, vertical rectangular image.', '1619689284.jpg', '2021-04-29 09:38:59', '2021-04-29 09:41:24'),
(26, 0, 9, '7. Add specialties to your profile.[4] Including specific skills or specialties, such as veterinary dentistry or congressional campaign communications, allows other users can find you more easily.', '1619689198.jpg', '2021-04-29 09:39:13', '2021-04-29 09:39:58'),
(27, 0, 9, '8. Add your website or your company\'s website and your Twitter or blog information. The more ways there are for people to find you, and access information about you, the more valuable your LinkedIn profile will be.', '1619689228.jpg', '2021-04-29 09:39:25', '2021-04-29 09:40:28'),
(28, 0, 9, '9. Invite connections suggested by LinkedIn based on your employment and education listings.', '1619689249.jpg', '2021-04-29 09:40:49', '2021-04-29 09:40:49'),
(29, 0, 9, 'To learn more you can browse this site: https://www.wikihow.com/Use-LinkedIn OR watch this Youtube video: https://www.youtube.com/watch?v=E_t8yPnt07Q\r\nFeel free to contact us any time!', NULL, '2021-04-29 09:43:55', '2021-04-29 09:43:55'),
(30, 0, 16, '1. Visit WhatsApp Web. WhatsApp Web will work with Chrome, Firefox, Opera, and Safari, so open a new browser tab or window, and enter web.whatsapp.com in the address bar. You will see a QR code on your monitor. This code needs to be scanned from your phone so that you can activate and link your account.', '1619691606.jpg', '2021-04-29 10:20:06', '2021-04-29 10:20:06'),
(31, 0, 16, '2. Open WhatsApp on phone. Tap the WhatsApp app on your phone. The app icon has the WhatsApp logo on it, the one with a phone inside a chat box.', '1619691626.jpg', '2021-04-29 10:20:26', '2021-04-29 10:20:26'),
(32, 0, 16, '3. Access the WhatsApp Web Setting. Tap the gear icon or settings button of your phone to access the main menu of the app. Tap on “WhatsApp Web” from here. You will see a box for scanning a QR code on your screen.', '1619691641.jpg', '2021-04-29 10:20:41', '2021-04-29 10:20:41'),
(33, 0, 16, '4. Scan the code. Point your phone to your monitor where the QR code is. Position the box to read the QR code. No need to tap or press anything. Once the QR code has been read, you will be logged in to WhatsApp Web.', '1619691662.jpg', '2021-04-29 10:20:50', '2021-04-29 10:21:02'),
(34, 0, 16, '5. View the WhatsApp Web interface. The WhatsApp Web interface is split into two panels. The left panel contains all your messages or chats, much like your inbox, and the right panel is where your current chat stream is.', '1619691692.jpg', '2021-04-29 10:21:32', '2021-04-29 10:21:32'),
(35, 0, 16, 'To learn more you can browse this site: https://www.wikihow.com/Use-WhatsApp-on-a-Computer OR watch this Youtube video: https://www.youtube.com/watch?v=bid3itL77CQ\r\nFeel free to contact us any time!', NULL, '2021-04-29 10:22:13', '2021-04-29 10:22:13'),
(36, 0, 17, '1. Go to the website. https://www.messenger.com/', '1619692162.jpg', '2021-04-29 10:29:22', '2021-04-29 10:29:22'),
(37, 0, 17, '2. Sign in with your Facebook phone number by entering your email address and setting your password.', '1619692194.jpg', '2021-04-29 10:29:41', '2021-04-29 10:29:54'),
(38, 0, 17, '3. Review the chat window. You will see a list of your previous chats on the left, the transcript of the currently selected chat in the middle, and information about the current chat on the right (including participants, notification information, and a group nickname, if you\'ve entered one).', '1619692226.jpg', '2021-04-29 10:30:26', '2021-04-29 10:30:26'),
(39, 0, 17, '4. Chat with a friend by clicking on the friend or searching for them on top lefthand side. When you click into the \"Search for people and groups\" field, it\'ll turn into a list of your Facebook contacts. Enter a name to find the person you want to talk to, and then click on their name and icon.', '1619692259.jpg', '2021-04-29 10:30:59', '2021-04-29 10:30:59'),
(40, 0, 17, '5. Get talking. You can enter text into the bottom of the chat window, and add emojis, GIFs, and stickers, just like on the Messenger app.', '1619692270.jpg', '2021-04-29 10:31:10', '2021-04-29 10:31:10'),
(41, 0, 17, 'To learn more you can browse this site: https://www.wikihow.com/Use-Messenger-on-a-Computer OR watch this Youtube video: https://www.youtube.com/watch?v=3dLUXcd5hV8\r\nFeel free to contact us any time!', NULL, '2021-04-29 10:32:28', '2021-04-29 10:32:28'),
(42, 0, 18, '1. Open Twitter. Go to https://www.twitter.com/ in your computer\'s web browser.', '1619694691.jpg', '2021-04-29 11:11:31', '2021-04-29 11:11:31'),
(43, 0, 18, '2. Click Sign Up. It\'s a blue button on the right side of the page.', '1619694713.jpg', '2021-04-29 11:11:53', '2021-04-29 11:11:53'),
(44, 0, 18, '3. Enter a name. Type your first (and last, if you like) name into the \"Name\" text box.', '1619694727.jpg', '2021-04-29 11:12:07', '2021-04-29 11:12:07'),
(45, 0, 18, '4. Add your phone number. Type your phone number into the \"Phone\" text box.\r\nIf you don\'t want to add your phone number, click Use email instead under the \"Phone\" text box and then enter an email address.', '1619694749.jpg', '2021-04-29 11:12:29', '2021-04-29 11:12:29'),
(46, 0, 18, '5. Click Next. It\'s in the upper-right side of the window.', '1619694762.jpg', '2021-04-29 11:12:42', '2021-04-29 11:12:42'),
(47, 0, 18, '6. Click Sign up. This blue button is at the bottom of the page.', '1619694780.jpg', '2021-04-29 11:13:00', '2021-04-29 11:13:00'),
(48, 0, 18, '7. Verify your phone number if you signed up with a phone number. Skip this step if you used an email address to sign up for Twitter. To verify your phone number, do the following:\r\nClick OK when prompted.\r\nOpen your phone\'s Messages app.\r\nTap the text message from Twitter (this will usually be a five-digit number).\r\nNote the code in the text message.\r\nType the code into the \"Verification code\" text box on the Twitter website.\r\nClick Next.', '1619694804.jpg', '2021-04-29 11:13:24', '2021-04-29 11:13:24'),
(49, 0, 18, '8. Enter a password. Click the \"Password\" text field, then type in the password you want to use to log into your account.', '1619694816.jpg', '2021-04-29 11:13:36', '2021-04-29 11:13:36'),
(50, 0, 18, '9. Click Next. It\'s in the upper-right corner of the page.', '1619694835.jpg', '2021-04-29 11:13:55', '2021-04-29 11:13:55'),
(51, 0, 18, '10. Verify your email address if you signed up with an email address. Skip this step if you verified your phone number earlier. To verify the email address, do the following:\r\nClick OK when prompted.\r\nGo to your email inbox and log in if necessary.\r\nOpen the email from \"verify@twitter.com\".\r\nNote the code in the email.\r\nType the code into the \"Verification code\" text box on the Twitter website.\r\nClick Next.', '1619694857.jpg', '2021-04-29 11:14:17', '2021-04-29 11:14:17'),
(52, 0, 18, '11. Click Skip for now. It\'s in the upper-right corner of the page.', '1619694868.jpg', '2021-04-29 11:14:28', '2021-04-29 11:14:28'),
(53, 0, 18, '12. Select people to follow. Click Follow below any celebrity or recommended profiles you want to follow, then click Next when you\'re done. This will take you to your Twitter account.\r\nYou can also just click Next to skip this step.', '1619694880.jpg', '2021-04-29 11:14:40', '2021-04-29 11:14:40'),
(54, 0, 18, 'To learn more you can browse this site: https://www.wikihow.com/Use-Twitter OR watch this Youtube video: https://www.youtube.com/watch?v=5jWNpLvdocU\r\nFeel free to contact us any time!', NULL, '2021-04-29 11:15:23', '2021-04-29 11:15:23'),
(55, 0, 21, '1. Install Telegram on your Android. You can download Telegram for free from the Google Play Store, which you\'ll find in the app drawer. Once you\'re there, here\'s how to get it:\r\nType telegram into the search bar, and tap Telegram in the search results. It\'s the round blue icon with a white paper airplane inside.\r\nTap INSTALL and follow the on-screen instructions.\r\nTap OPEN to launch Telegram.\r\nFollow the on-screen instructions to log in or create a new account. You will have to confirm your phone number as part of the process.[1]', '1619695657.jpg', '2021-04-29 11:27:37', '2021-04-29 11:27:37'),
(56, 0, 21, '2. Install Telegram on your iPhone or iPad. Here\'s how to download Telegram from the App Store (the blue-and-white \"A\" icon on your home screen):\r\nTap Search at the bottom-right corner.\r\nType telegram into the search bar and tap Search.\r\nTap GET next to Telegram Messenger in the search results. Enter your passcode or biometric if prompted to start the download.\r\nTap OPEN to launch Telegram.\r\nFollow the on-screen instructions to log in or create a new account. You will have to confirm your phone number as part of the process.', '1619695672.jpg', '2021-04-29 11:27:52', '2021-04-29 11:27:52'),
(57, 0, 21, '3. Install Telegram on Windows. You can download it from https://desktop.telegram.org in a web browser. You\'ll need to confirm your phone number as a part of the setup process, so make sure you have it handy. Here\'s how to get the app:\r\nScroll down and tap Get Telegram for Windows. If the app doesn\'t download immediately, tap Save to start the download.\r\nDouble-click the downloaded installer and follow the on-screen instructions to install.\r\nClick the Telegram link in your Start menu to launch the app.\r\nFollow the on-screen instructions to create a new account or log in to an existing account.', '1619695687.jpg', '2021-04-29 11:28:07', '2021-04-29 11:28:07'),
(58, 0, 21, '4. Install Telegram on a Mac. You can get the app for free from the Mac App Store, which is the blue-and-white \"A\" icon on the Dock. You\'ll need to confirm your phone number as a part of the setup process, so make sure you have it handy. Here\'s how to get the app:\r\nType telegram into the Search bar at the top-left corner.\r\nClick Telegram Messenger in the search results.\r\nClick GET to install.\r\nClick OPEN to launch the app.\r\nFollow the on-screen instructions to log in or create a new account.', '1619695700.jpg', '2021-04-29 11:28:20', '2021-04-29 11:28:20'),
(59, 0, 21, '5. Use Telegram on the web. If you\'re using a computer and don\'t want to install an app, you can access Telegram in your browser at https://web.telegram.org. Just follow the on-screen instructions to sign in or create an account when prompted.', '1619695713.jpg', '2021-04-29 11:28:33', '2021-04-29 11:28:33'),
(60, 0, 21, 'To learn more you can browse this site: https://www.wikihow.com/Use-Telegram OR watch this Youtube video: https://www.youtube.com/watch?v=xMz20xREHtM\r\nFeel free to contact us any time!', NULL, '2021-04-29 11:28:57', '2021-04-29 11:28:57'),
(61, 0, 22, '1. Open your favorite browser.', '1619696052.jpg', '2021-04-29 11:34:12', '2021-04-29 11:34:12'),
(62, 0, 22, '2. Go to YouTube.com.', '1619696066.jpg', '2021-04-29 11:34:26', '2021-04-29 11:34:26'),
(63, 0, 22, '3. Click the \"Sign In\" button at the top right corner of the page.', '1619696081.jpg', '2021-04-29 11:34:41', '2021-04-29 11:34:41'),
(64, 0, 22, '4. Enter your email address and password.', '1619696100.jpg', '2021-04-29 11:35:00', '2021-04-29 11:35:00'),
(65, 0, 22, '5. Click \"Sign in\".', '1619696117.jpg', '2021-04-29 11:35:17', '2021-04-29 11:35:17'),
(66, 0, 22, '6. Click on the thumb image at the top right corner of the page.', '1619696130.jpg', '2021-04-29 11:35:30', '2021-04-29 11:35:30'),
(67, 0, 22, '7. Click on the “Creator Studio” button.', '1619696143.jpg', '2021-04-29 11:35:43', '2021-04-29 11:35:43'),
(68, 0, 22, '8. Click “Create” on the left hand side menu.', '1619696160.jpg', '2021-04-29 11:36:00', '2021-04-29 11:36:00'),
(69, 0, 22, '9. Select “Audio Library” from the drop down menu.', '1619696172.jpg', '2021-04-29 11:36:12', '2021-04-29 11:36:12'),
(70, 0, 22, '10. Find the most popular tracks in the YouTube audio library. You can do this in the \"Featured\" tab.', '1619696185.jpg', '2021-04-29 11:36:25', '2021-04-29 11:36:25'),
(71, 0, 22, '11. Sort audio tracks based on genre, mood, instrument and duration.', '1619696199.jpg', '2021-04-29 11:36:39', '2021-04-29 11:36:39'),
(72, 0, 22, '12. Mark an audio track as a favorite if you like one.\r\nYou can access these tracks in the Favorites tab.', '1619696213.jpg', '2021-04-29 11:36:53', '2021-04-29 11:36:53'),
(73, 0, 22, '13. Use the search box to find specific tracks or tracks from a specific artist.', '1619696225.jpg', '2021-04-29 11:37:05', '2021-04-29 11:37:05'),
(74, 0, 22, '14. Download the files to your computer. Click the down arrow button.', '1619696239.jpg', '2021-04-29 11:37:19', '2021-04-29 11:37:19'),
(75, 0, 22, 'To learn more you can browse this site: https://www.wikihow.com/Download-Free-Music-for-Your-YouTube-Videos\r\nOR watch this Youtube video:\r\nhttps://www.youtube.com/watch?v=b38ef8n1p4U\r\nFeel free to contact us any time!', NULL, '2021-04-29 11:39:51', '2021-04-29 11:39:51'),
(76, 0, 23, '1. Download the Zoom app. Zoom has a blue icon with an image that resembles a video camera. You can download the Zoom app for free on iPhone, iPad, Android, PC, Mac and Linux. Use the following steps to download the Zoom app.\r\nSmartphone & Tablet\r\nOpen the Google Play Store or App Store.\r\nTap the Search tab (iPhone and iPad only).\r\nEnter \"Zoom\" in the search bar.\r\nTap GET or INSTALL next to the \"Zoom Cloud Meetings\" app.\r\nPC or Mac:\r\nGo to https://zoom.us/download in a web browser.\r\nClick Download below \"Zoom Client for Meetings\".\r\nOpen the install file in your web browser or Downloads folder.', '1619696979.jpg', '2021-04-29 11:49:39', '2021-04-29 11:49:39'),
(77, 0, 23, '2. Open Zoom. Tap the icon on your Home screen or apps menu to open Zoom on your mobile device. On PC and Mac, click the Zoom icon in the Windows Start menu, or Applications folder on Mac.', '1619696997.jpg', '2021-04-29 11:49:57', '2021-04-29 11:49:57'),
(78, 0, 23, '3. Tap Sign Up or click Sign Up Free. If you are using the mobile app, tap the blue text that says Sign Up at the bottom of the screen. If you are using the computer application, click the orange button that says Sign Up for Free.', '1619697009.jpg', '2021-04-29 11:50:09', '2021-04-29 11:50:09'),
(79, 0, 23, '4. Enter your name and email address. Use the spaces provided to enter your name and email address. Be sure to use a valid email address that you have access to. You will need to check your email in order to verify your account.\r\nIf you are using a web browser on your computer, you only need to enter your email address. You will be asked to fill out the rest of the information when you confirm your account.\r\nAlternatively, if you are signing up using the computer client, you have the option to sign up with your Facebook or Google account. To do so, click the blue Facebook button, or white Google button at the bottom of the page.', '1619697031.jpg', '2021-04-29 11:50:31', '2021-04-29 11:50:31'),
(80, 0, 23, '5. Tap the checkbox next to \"I agree to the Terms of Service\" (mobile only). If you are using a smartphone or tablet, you need to tap the checkbox at the bottom of the form in order to agree to the terms of service. On PC or Mac, you agree to the terms of service by signing up.', '1619697051.jpg', '2021-04-29 11:50:51', '2021-04-29 11:50:51'),
(81, 0, 23, '6. Click or tap Sign Up. On smartphones and tablets, it\'s the blue button in the upper-right corner. On the computer client, it\'s the blue button below the line with your email address. This automatically sends a confirmation email to your email inbox.', '1619697064.jpg', '2021-04-29 11:51:04', '2021-04-29 11:51:04'),
(82, 0, 23, '7. Check your email. Open whichever app or website you use to check your email and sign in.', '1619697090.jpg', '2021-04-29 11:51:12', '2021-04-29 11:51:30'),
(83, 0, 23, '8. Open the confirmation email. Look for an email from Zoom titled \"Please activate your Zoom account\" in your Inbox.', '1619697126.jpg', '2021-04-29 11:52:06', '2021-04-29 11:52:06'),
(84, 0, 23, '9. Tap Activate Account. It\'s the blue button in the center of the verification email. This opens a form you can use to finish settings up your account.', '1619697139.jpg', '2021-04-29 11:52:19', '2021-04-29 11:52:19'),
(85, 0, 23, '10. Enter your first and last name. It may populate in the fields automatically. If it does not, enter your first and last name in the first two fields in the form.', '1619697151.jpg', '2021-04-29 11:52:31', '2021-04-29 11:52:31'),
(86, 0, 23, '11. Enter your desired password and confirm it. The next two fields are where you enter your desired password. Your password must be at least 8 characters long and contain a combination of letters and numbers. You can also use special characters. Be sure you enter the exact same password in both fields.', '1619697166.jpg', '2021-04-29 11:52:46', '2021-04-29 11:52:46'),
(87, 0, 23, '12. Click or tap Continue. It\'s the orange button at the bottom of the page. This creates your account.', '1619697181.jpg', '2021-04-29 11:53:01', '2021-04-29 11:53:01'),
(88, 0, 23, '13. Invite others to use Zoom (optional). If you would like, you can invite other friends or colleagues to use Zoom. If you do not wish to invite anybody, click or tap Skip this step. Otherwise, use the following steps to invite others to use Zoom:\r\nEnter 3 email addresses in the spaces provided.\r\nClick or tap Add another email to add more email spaces.\r\nClick or tap the checkbox next to \"I am not a robot\"\r\nClick or tap the orange button that says Invite.', '1619697202.jpg', '2021-04-29 11:53:22', '2021-04-29 11:53:22'),
(89, 0, 23, '14. Click or tap Go to My Account. This signs you into Zoom and takes you to the main page on PC or Mac, or opens the Zoom app on your smartphone or tablet.\r\nThe first time you open the Zoom app on your smartphone or tablet, you may be asked to allow Zoom to access your camera, microphone, and other features. Tap Allow to continue on all prompts.', '1619697214.jpg', '2021-04-29 11:53:34', '2021-04-29 11:53:34'),
(91, 13, 0, 'What can Senior Citizens Expect from Technology Awareness Courses?', '1619720501.jpg', '2021-04-29 18:21:41', '2021-04-29 18:21:41'),
(92, 11, 28, 'Which Yoga is Right for You?\r\nFactors such as your age, level of fitness, medical health, and physical condition will all influence what type of yoga you choose. Personal preference also plays a role of course & it’s worth trying a few different classes and varieties to see which is right for you.\r\n\r\nRemember, before beginning yoga or any other exercise regimen, you should always speak with your doctor.', '1619721060.jpg', '2021-04-29 18:31:00', '2021-04-29 18:31:00'),
(93, 3, 0, 'How can I change the privacy of posts on Facebook?\r\n\r\nThanks for any help!', NULL, '2021-04-29 21:14:45', '2021-04-29 21:14:45'),
(94, 2, 33, 'DIY trends are becoming very popular with young and old alike. A blog that provides different arts and crafts projects for seniors can keep them occupied and have fun in a dozen different ways.\r\n\r\nA range of hobbies like pottery, knitting, quilting, painting, and coloring can also encourage seniors to keep trying new things. Easy-to-make crafts like dream catchers, origami, paper flowers, and cards are a healthy way to create decorative pieces while keeping seniors occupied.', '1619734176.jpg', '2021-04-29 22:09:36', '2021-04-29 22:09:36'),
(95, 4, 29, 'These types of columns were extremely popular in newspapers, and now can be brought back again in a new form. A medical Q&A blog that focuses on asking the most common question and issues that are faced during old age can help resolve several issues, while inculcating a need to stay updated about health among seniors.\r\n\r\nAnswers to questions asked by the elderly should preferably be written by medical experts and doctors who already possess significant knowledge on the subject. They can also write different articles about common medical issues during old age and tips on how to overcome them.', '1619734276.jpg', '2021-04-29 22:11:16', '2021-04-29 22:11:16'),
(96, 5, 31, 'Seniors of the previous generations used to be greatly dependent on their children. However, today’s elderly have developed a more individualistic approach. They want to live their life on their terms, and hence senior lifestyle and living trends are rapidly evolving.\r\n\r\nDue to technological innovation, a large part of these trends is based on technological devices. A blog that focuses on the changing trends in the senior lifestyle sector can provide a channel for seniors to stay updated.\r\n\r\nAdditionally, the introduction to smart home technology can be made easier with an explanatory blog. Novel concepts like active living and smart-sizing can also be introduced to seniors through this platform, which will help them stay updated.', NULL, '2021-04-29 22:12:09', '2021-04-29 22:12:09'),
(97, 6, 30, 'Technology has been growing at a pace that is hard to keep up with. With newer and newer gadgets coming in the market, seniors can feel intimated and lost while using gadgets they know nothing about. There are several ‘Tech made easy’ blogs on the internet for the elderly that teach seniors how to use devices for communication, entertainment, and games.\r\n\r\nSimilarly, a blog that focuses on providing technological aid to the elderly in the form of explanatory articles or a Q&A format can help solve all doubts and issues that seniors have about technology. It can be something as simple as working a remote control, or operating a smartphone, but help with it can provide a huge boost to their confidence, and knowledge as well.\r\n\r\nThe internet is a vast place and has a niche for every single thing you can ask for. Blogs for seniors are becoming widely popular and can help them live a better life!', '1619734392.jpg', '2021-04-29 22:13:12', '2021-04-29 22:13:12'),
(98, 6, 0, 'Can Short-term Courses help Senior Citizens become Technologically Aware?', '1619734535.jpg', '2021-04-29 22:15:35', '2021-04-29 22:15:35'),
(99, 7, 0, 'I want a list of technology courses for senior citizens to entail learning?', NULL, '2021-04-29 22:18:13', '2021-04-29 22:18:13'),
(100, 11, 34, 'Social Protection in Health means \"warranty, given by society, through public authorities, for an individual, or group of individuals, can satisfy their health needs and demands obtaining adequate access to Health system or any of the health subsystems in the country, without the ability to pay be a limiting factor. \"', '1619736645.jpg', '2021-04-29 22:50:45', '2021-04-29 22:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `post_users`
--

CREATE TABLE `post_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_users`
--

INSERT INTO `post_users` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 4, 5, '2021-04-29 17:55:05', '2021-04-29 17:55:05'),
(3, 4, 6, '2021-04-29 17:55:11', '2021-04-29 17:55:11'),
(4, 4, 7, '2021-04-29 17:55:16', '2021-04-29 17:55:16'),
(5, 4, 14, '2021-04-29 17:55:28', '2021-04-29 17:55:28'),
(6, 4, 15, '2021-04-29 17:55:33', '2021-04-29 17:55:33'),
(7, 4, 16, '2021-04-29 17:55:38', '2021-04-29 17:55:38'),
(8, 4, 20, '2021-04-29 17:55:48', '2021-04-29 17:55:48'),
(9, 4, 21, '2021-04-29 17:55:54', '2021-04-29 17:55:54'),
(10, 4, 22, '2021-04-29 17:56:00', '2021-04-29 17:56:00'),
(11, 4, 30, '2021-04-29 17:56:13', '2021-04-29 17:56:13'),
(12, 4, 31, '2021-04-29 17:56:19', '2021-04-29 17:56:19'),
(13, 4, 36, '2021-04-29 17:56:30', '2021-04-29 17:56:30'),
(14, 4, 39, '2021-04-29 17:56:38', '2021-04-29 17:56:38'),
(15, 4, 42, '2021-04-29 17:56:46', '2021-04-29 17:56:46'),
(16, 4, 43, '2021-04-29 17:56:51', '2021-04-29 17:56:51'),
(17, 4, 55, '2021-04-29 17:57:08', '2021-04-29 17:57:08'),
(18, 4, 56, '2021-04-29 17:57:14', '2021-04-29 17:57:14'),
(19, 4, 58, '2021-04-29 17:57:20', '2021-04-29 17:57:20'),
(20, 4, 61, '2021-04-29 17:57:48', '2021-04-29 17:57:48'),
(21, 4, 62, '2021-04-29 17:57:53', '2021-04-29 17:57:53'),
(22, 4, 76, '2021-04-29 17:58:03', '2021-04-29 17:58:03'),
(23, 4, 77, '2021-04-29 17:58:07', '2021-04-29 17:58:07'),
(24, 13, 5, '2021-04-29 18:15:57', '2021-04-29 18:15:57'),
(25, 13, 6, '2021-04-29 18:16:02', '2021-04-29 18:16:02'),
(26, 13, 8, '2021-04-29 18:16:13', '2021-04-29 18:16:13'),
(27, 13, 14, '2021-04-29 18:16:22', '2021-04-29 18:16:22'),
(28, 13, 21, '2021-04-29 18:16:40', '2021-04-29 18:16:40'),
(29, 13, 30, '2021-04-29 18:16:49', '2021-04-29 18:16:49'),
(30, 13, 36, '2021-04-29 18:17:00', '2021-04-29 18:17:00'),
(31, 13, 37, '2021-04-29 18:17:04', '2021-04-29 18:17:04'),
(32, 13, 55, '2021-04-29 18:17:16', '2021-04-29 18:17:16'),
(33, 13, 56, '2021-04-29 18:17:21', '2021-04-29 18:17:21'),
(34, 13, 42, '2021-04-29 18:17:30', '2021-04-29 18:17:30'),
(35, 13, 44, '2021-04-29 18:17:36', '2021-04-29 18:17:36'),
(36, 13, 45, '2021-04-29 18:17:41', '2021-04-29 18:17:41'),
(37, 13, 76, '2021-04-29 18:17:54', '2021-04-29 18:17:54'),
(38, 13, 78, '2021-04-29 18:18:01', '2021-04-29 18:18:01'),
(39, 11, 91, '2021-04-29 18:22:11', '2021-04-29 18:22:11'),
(40, 11, 5, '2021-04-29 18:22:32', '2021-04-29 18:22:32'),
(41, 11, 21, '2021-04-29 18:22:46', '2021-04-29 18:22:46'),
(42, 11, 22, '2021-04-29 18:22:50', '2021-04-29 18:22:50'),
(43, 11, 14, '2021-04-29 18:23:08', '2021-04-29 18:23:08'),
(44, 11, 15, '2021-04-29 18:23:13', '2021-04-29 18:23:13'),
(45, 11, 30, '2021-04-29 18:23:30', '2021-04-29 18:23:30'),
(46, 11, 36, '2021-04-29 18:23:41', '2021-04-29 18:23:41'),
(47, 11, 42, '2021-04-29 18:23:52', '2021-04-29 18:23:52'),
(48, 11, 43, '2021-04-29 18:23:56', '2021-04-29 18:23:56'),
(49, 11, 55, '2021-04-29 18:24:09', '2021-04-29 18:24:09'),
(50, 11, 62, '2021-04-29 18:24:18', '2021-04-29 18:24:18'),
(51, 11, 63, '2021-04-29 18:24:23', '2021-04-29 18:24:23'),
(52, 11, 78, '2021-04-29 18:24:43', '2021-04-29 18:24:43'),
(53, 11, 79, '2021-04-29 18:24:51', '2021-04-29 18:24:51'),
(54, 3, 91, '2021-04-29 21:05:34', '2021-04-29 21:05:34'),
(55, 3, 92, '2021-04-29 21:09:08', '2021-04-29 21:09:08'),
(56, 3, 5, '2021-04-29 21:09:26', '2021-04-29 21:09:26'),
(57, 3, 14, '2021-04-29 21:09:34', '2021-04-29 21:09:34'),
(58, 3, 20, '2021-04-29 21:09:51', '2021-04-29 21:09:51'),
(59, 3, 30, '2021-04-29 21:09:58', '2021-04-29 21:09:58'),
(60, 3, 36, '2021-04-29 21:10:08', '2021-04-29 21:10:08'),
(61, 3, 42, '2021-04-29 21:10:17', '2021-04-29 21:10:17'),
(62, 3, 44, '2021-04-29 21:10:23', '2021-04-29 21:10:23'),
(63, 3, 62, '2021-04-29 21:10:34', '2021-04-29 21:10:34'),
(64, 3, 77, '2021-04-29 21:10:45', '2021-04-29 21:10:45'),
(65, 3, 76, '2021-04-29 21:10:51', '2021-04-29 21:10:51'),
(66, 0, 91, '2021-04-29 21:19:22', '2021-04-29 21:19:22'),
(68, 2, 91, '2021-04-29 22:08:55', '2021-04-29 22:08:55'),
(69, 7, 98, '2021-04-29 22:18:28', '2021-04-29 22:18:28'),
(71, 13, 96, '2021-04-29 22:33:30', '2021-04-29 22:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `created_at`, `updated_at`) VALUES
(0, 'Admin', 'senior@tech.com', 'default.jpg', '$2y$10$0vZ1ZjnX2P92ZIv7nhLDLun5BiNBKQUaFULk.khWTLQgVxwXD3dtu', '2021-04-27 18:48:28', '2021-04-27 18:48:28'),
(2, 'Mary John', 'mary@gmail.com', '1619569392.jpg', '$2y$10$N6FY7qdX0EGoa/tFsQMmJuY4B5Uv5upOOspghk8B8CkJ9E/ICrnpy', '2021-04-27 23:58:13', '2021-04-28 00:23:12'),
(3, 'Helen William', 'helen@gmail.com', '1619569436.jpg', '$2y$10$zPyy9iUaDYwlAWbBwNCxMObE6..Ft6i1gSkL4///g5Mj4xp9pz.UG', '2021-04-27 23:58:48', '2021-04-28 00:23:56'),
(4, 'George James', 'george@gmail.com', '1619569471.jfif', '$2y$10$E929ISCETqFMOelLV.jF4e8WPDmxgKUUdmBYNj/5Du5355S3zHb7e', '2021-04-27 23:59:15', '2021-04-28 00:24:31'),
(5, 'William Frank', 'william@gmail.com', '1619569522.jpg', '$2y$10$9okZUAcz.cKFmEn78XQWSO5hmKgQRD4URLpFGJSUOdjMtoZFc3TW6', '2021-04-27 23:59:42', '2021-04-28 00:25:22'),
(6, 'Florence Joseph', 'florence@gmail.com', '1619569555.jpg', '$2y$10$4WOXLQszWR/Ug0kGQtgol.uXFY5yPNmYVc.yWShvaEPmBN10Vyg8O', '2021-04-28 00:00:18', '2021-04-28 00:25:55'),
(7, 'Mildred Thomas', 'mildred@gmail.com', '1619569309.jpg', '$2y$10$NW7iWAiyXd3HM8S/NBjkeOAUJWuLRlhHxWpFjGclm5BGibn7xaLvG', '2021-04-28 00:09:15', '2021-04-28 00:21:49'),
(8, 'Henry John', 'henry@gmail.com', '1619569854.jpg', '$2y$10$uZmktVGqZER9I34YDv4uROupYot.IyfBBhSZ3ahkjR9M6BMm.Tcpq', '2021-04-28 00:30:38', '2021-04-28 00:30:55'),
(9, 'Harry	Walter', 'harry@gmail.com', '1619569927.jfif', '$2y$10$kwmNlGpLPGvO39gwy4J28.vLg9lxvqoY.xe3S7cLO3Fkqzf.sUdJ.', '2021-04-28 00:31:51', '2021-04-28 00:32:07'),
(10, 'Lillian Fred', 'lillian@gmail.com', '1619570054.jpg', '$2y$10$cp2nut3JZtJ4Bvqauv4QNOoIIw8KkADEc/7Yah/p/0u47tYx4AKb.', '2021-04-28 00:33:29', '2021-04-28 00:34:14'),
(11, 'Rose Albert', 'rose@gmail.com', '1619570113.jfif', '$2y$10$fdNTiGBO55hwnI7tHu057.dqXLmtKaabFYYcsVmWe3IP7CDmKElEO', '2021-04-28 00:34:46', '2021-04-28 00:35:13'),
(12, 'Emma Richard', 'emma@gmail.com', '1619570703.jpg', '$2y$10$VfUS5611w8/ey2oUXYpQ9OuOv5gdTAWVZ41i0xDzkluC7dNZ3NanO', '2021-04-28 00:44:31', '2021-04-28 00:45:03'),
(13, 'Leo Francis', 'leo@gmail.com', '1619653675.jpg', '$2y$10$8oiOYlHFsOJIyTBAbKk8xerUZUwyDj.4Er2YpCh54K6OSTkkGArbi', '2021-04-28 23:47:07', '2021-04-28 23:47:55'),
(14, 'Elsie Alfred', 'elsie@gmail.com', '1619653745.jpg', '$2y$10$EByFZZil/Ll78NczsL.OOuqWEbkMU3J2.ySF.Qhx1CIm8E74ogKwi', '2021-04-28 23:48:46', '2021-04-28 23:49:05'),
(15, 'Lucille Leonard', 'lucille@gmail.com', '1619653851.jpg', '$2y$10$91M4pxM3al01Wpmef/oHwu6s79svVm5xJvveE3mG/Ouqrhvr5M7U2', '2021-04-28 23:50:08', '2021-04-28 23:50:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_sender_foreign` (`sender`),
  ADD KEY `chats_receiver_foreign` (`receiver`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `comment_users`
--
ALTER TABLE `comment_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_users_user_id_foreign` (`user_id`),
  ADD KEY `comment_users_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connections_user_id_foreign` (`user_id`),
  ADD KEY `connections_friend_id_foreign` (`friend_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_page_id_foreign` (`page_id`);

--
-- Indexes for table `post_users`
--
ALTER TABLE `post_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_users_user_id_foreign` (`user_id`),
  ADD KEY `post_users_post_id_foreign` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_users`
--
ALTER TABLE `comment_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `post_users`
--
ALTER TABLE `post_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_foreign` FOREIGN KEY (`receiver`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_sender_foreign` FOREIGN KEY (`sender`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_users`
--
ALTER TABLE `comment_users`
  ADD CONSTRAINT `comment_users_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_users`
--
ALTER TABLE `post_users`
  ADD CONSTRAINT `post_users_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
