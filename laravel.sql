-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 02:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_codes`
--

CREATE TABLE `activation_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `expire` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activation_codes`
--

INSERT INTO `activation_codes` (`id`, `user_id`, `code`, `used`, `expire`, `created_at`, `updated_at`) VALUES
(1, 1, 'afqj49fReqFxoWWwdUtTs5jyWBjMR4yboTdiZ0KbTC5OBnihv2I0MCeXOKiH', 1, '2021-03-08 16:59:31', '2021-03-09 00:44:31', '2021-03-09 00:44:31'),
(2, 2, '9tKqOeSyI7bpFIVexIJWBrNRo1u8NdT2D5W9C2VA36PfkJgxipD8EcCdQ2r4', 1, '2021-03-09 15:03:53', '2021-03-09 22:48:53', '2021-03-09 22:48:53'),
(3, 3, 'mrbKewmlFPT2li48wg31IKkQFSHPMqDyC9oBTGuaQf19ALle1LrBlZG8nJ28', 1, '2021-03-11 12:16:15', '2021-03-11 20:01:15', '2021-03-11 20:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `articlecategories`
--

CREATE TABLE `articlecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articlecategories`
--

INSERT INTO `articlecategories` (`id`, `name`, `meta_desc`, `meta_title`, `meta_keywords`, `parent_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'dsdsdf', 'sdfsdf', 'sdf', 'sdfsdf', NULL, 'en', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(2, 'dsdssddf', 'sdfssddf', 'sdsdf', 'sdfsdsdf', 1, 'en', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(3, 'rert', 'fgdfg', 'dfg', 'dfg', 2, 'en', '2021-03-17 13:49:58', '2021-03-10 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `articlecategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewCount` bigint(20) NOT NULL DEFAULT 0,
  `commentCount` bigint(20) NOT NULL DEFAULT 0,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `articlecategory_id`, `title`, `slug`, `lang`, `description`, `body`, `images`, `tags`, `viewCount`, `commentCount`, `meta_desc`, `meta_title`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dsd', 'asd', 'en', 'sdaasd', 'asdasd', 'asd', 'asd', 0, 0, 'asd', 'asd', 'asd', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(2, 1, 1, 'dsassd', 'assd', 'en', 'sdaasdasd', 'aassdasd', 'asd', 'asd', 0, 0, 'asd', 'asd', 'asd', '2021-03-17 13:49:58', '2021-03-10 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `cloes` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'e',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `count`, `cloes`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'e', '2021-03-17 13:49:58', '2021-03-10 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart_course`
--

CREATE TABLE `cart_course` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_course`
--

INSERT INTO `cart_course` (`cart_id`, `course_id`, `count`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_course`
--

CREATE TABLE `category_course` (
  `course_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentcolleagues`
--

CREATE TABLE `commentcolleagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` tinyint(4) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companyinfos`
--

CREATE TABLE `companyinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `humanresourse` bigint(20) NOT NULL,
  `year` bigint(20) NOT NULL,
  `customercompetition` bigint(20) NOT NULL,
  `ongoingproject` bigint(20) NOT NULL,
  `projectdone` bigint(20) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `computerabilities`
--

CREATE TABLE `computerabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityCode` bigint(20) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00:00:00',
  `viewCount` bigint(20) NOT NULL DEFAULT 0,
  `commentCount` bigint(20) NOT NULL DEFAULT 0,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'package',
  `summery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugvoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demovoice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dpdfCount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dvoiceCount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Countplaydemo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Countclickb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` tinyint(4) DEFAULT NULL,
  `linkb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `type`, `title`, `slug`, `description`, `body`, `price`, `images`, `time`, `viewCount`, `commentCount`, `lang`, `kind`, `summery`, `slugvoice`, `writer`, `speaker`, `review`, `pdf`, `voice`, `demovoice`, `dpdfCount`, `dvoiceCount`, `Countplaydemo`, `Countclickb`, `score`, `linkb`, `created_at`, `updated_at`, `meta_desc`, `meta_title`, `meta_keywords`) VALUES
(1, 1, 'free', 'تست ددوره اخر', 'aaaa', 'تست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست د...', '<p>تست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخرتست ددوره اخر</p>', '1000000', '{\"images\":{\"original\":\"\\/upload\\/images\\/2021\\/sarafraz-lsite-ogo-2.jpg\",\"300\":\"\\/upload\\/images\\/2021\\/300_sarafraz-lsite-ogo-2.jpg\",\"600\":\"\\/upload\\/images\\/2021\\/600_sarafraz-lsite-ogo-2.jpg\",\"900\":\"\\/upload\\/images\\/2021\\/900_sarafraz-lsite-ogo-2.jpg\"},\"thumb\":\"\\/upload\\/images\\/2021\\/900_sarafraz-lsite-ogo-2.jpg\"}', '00:00:00', 0, 0, 'en', 'package', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2021-03-09 00:46:53', '2021-03-08 19:42:21', 'تست ددوره اخر', 'تست ددوره اخر', 'تست ددوره اخر'),
(3, 2, 'free', 'dfgdfgd', 'dfgdfg', 'dfg', 'dfg', '0', 'dfg', '00:00:00', 0, 0, 'en', 'package', 'dfg', 'dfg', 'dg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfgdfg', 'dfg', 5, 'dfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educationcourses`
--

CREATE TABLE `educationcourses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coursetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificatepath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationexperiences`
--

CREATE TABLE `educationexperiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00:00:00',
  `number` bigint(20) NOT NULL,
  `viewCount` bigint(20) NOT NULL DEFAULT 0,
  `commentCount` bigint(20) NOT NULL DEFAULT 0,
  `downloadCount` bigint(20) NOT NULL DEFAULT 0,
  `datepublish` timestamp NULL DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `course_id`, `type`, `title`, `description`, `videoUrl`, `tags`, `time`, `number`, `viewCount`, `commentCount`, `downloadCount`, `datepublish`, `publish`, `lang`, `meta_desc`, `meta_title`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'free', 'sfdgdf', 'sdfg', 'http://techslides.com/demos/sample-videos/small.mp4', 'dsfsdf', '00:00:00', 1, 0, 0, 0, NULL, NULL, 'en', 'xcv', 'xcv', 'xcv', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(2, 1, 'free', 'sfdgdf', 'sdfg', 'http://techslides.com/demos/sample-videos/small.mp4', 'dsfsdf', '00:00:00', 1, 0, 0, 0, NULL, NULL, 'en', 'xcv', 'xcv', 'xcv', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(3, 1, 'free', 'sfdgdf', 'sdfg', 'http://techslides.com/demos/sample-videos/small.mp4', 'dsfsdf', '00:00:00', 1, 0, 0, 0, NULL, NULL, 'en', 'xcv', 'xcv', 'xcv', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(4, 1, 'free', 'sfdgdf', 'sdfg', 'http://techslides.com/demos/sample-videos/small.mp4', 'dsfsdf', '00:00:00', 1, 0, 0, 0, NULL, NULL, 'en', 'xcv', 'xcv', 'xcv', '2021-03-17 13:49:58', '2021-03-10 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generalabilities`
--

CREATE TABLE `generalabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speaking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homedescriptions`
--

CREATE TABLE `homedescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'top',
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ides`
--

CREATE TABLE `ides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritalstatus` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `militaryservice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `startupname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupproblem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupfounders` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupcustomer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startuprival` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupsocialnetwork` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `startupusersupport` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `orientation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolegroup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instagrams`
--

CREATE TABLE `instagrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learnings`
--

CREATE TABLE `learnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learnings`
--

INSERT INTO `learnings` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-17 13:49:58', '2021-03-10 14:49:58');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_27_035953_create_articlecategories_table', 1),
(4, '2017_05_27_035955_create_articles_table', 1),
(5, '2017_05_27_041439_create_courses_table', 1),
(6, '2017_05_27_041449_create_episodes_table', 1),
(7, '2017_06_04_055720_create_roles_table', 1),
(8, '2017_06_05_093150_create_payments_table', 1),
(9, '2017_06_07_155707_create_activation_codes_table', 1),
(10, '2017_07_03_013812_create_comments_table', 1),
(11, '2017_07_04_064510_create_learnings_table', 1),
(12, '2017_07_22_142631_create_categories_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2021_01_24_091109_create_ides_table', 1),
(16, '2021_01_24_091130_create_infos_table', 1),
(17, '2021_01_24_091152_create_startupinfos_table', 1),
(18, '2021_01_24_091400_create_commentcolleagues_table', 1),
(19, '2021_01_24_091421_create_companyinfos_table', 1),
(20, '2021_01_24_091453_create_homedescriptions_table', 1),
(21, '2021_01_24_091511_create_instagrams_table', 1),
(22, '2021_01_24_091528_create_offices_table', 1),
(23, '2021_01_24_091602_create_ourresources_table', 1),
(24, '2021_01_24_091617_create_slides_table', 1),
(25, '2021_01_24_091638_create_worksections_table', 1),
(26, '2021_01_24_092021_create_recruitments_table', 1),
(27, '2021_01_24_092022_create_computerabilities_table', 1),
(28, '2021_01_24_092126_create_generalabilities_table', 1),
(29, '2021_01_24_092147_create_contacts_table', 1),
(30, '2021_01_24_092340_create_educationexperiences_table', 1),
(31, '2021_01_24_092409_create_educationcourses_table', 1),
(32, '2021_01_24_092452_create_otherinformations_table', 1),
(33, '2021_01_24_092630_create_workexperiences_table', 1),
(34, '2021_02_03_081541_create_carts_table', 1),
(35, '2021_02_03_083735_create_cart_course_table', 1),
(36, '2021_02_24_083615_create_settings_table', 1),
(37, '2021_03_02_080805_create_questionanswers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otherinformations`
--

CREATE TABLE `otherinformations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `familiarity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeCollaboration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `startTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumefilepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ourresources`
--

CREATE TABLE `ourresources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vip',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionanswers`
--

CREATE TABLE `questionanswers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `why` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lessonG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lessonInfo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cwhy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cbenefit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `clessonG` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chours` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `clessonInfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `married` tinyint(4) NOT NULL,
  `nationalcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherjob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citycode` bigint(20) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `familiarity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeCollaboration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `startTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumefilepath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `educationalpack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationalarticles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `podcast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsarticles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khabarname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooperation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voicebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usualquestions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptidea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homedesctop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worksection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homedescdown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourresources` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coleagesuggecstions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `startupinfos`
--

CREATE TABLE `startupinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `founders` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rival` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `socialnetwork` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usersupport` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `ide_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `emailactive` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobileactive` tinyint(1) NOT NULL DEFAULT 0,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viptime` timestamp NOT NULL DEFAULT current_timestamp(),
  `expire_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `images`, `active`, `emailactive`, `email_verified_at`, `mobileactive`, `level`, `name`, `email`, `mobile`, `password`, `viptime`, `expire_at`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, NULL, 1, 'user', 'ali', 'ali.marzban17@yahoo.com', NULL, '$2y$10$WXa8v9pmva9P80cUI/0OtO0cNj3ayNranFbaIip38aarAvQ2eqGl6', '2021-03-08 16:44:31', '2021-03-08 16:44:31', NULL, NULL, '2021-03-09 00:44:31', '2021-03-09 00:44:31'),
(2, NULL, 0, 0, NULL, 0, 'user', 'ali.marzbasn17@yashoo.com', 'ali.marzbasn17@yashoo.com', NULL, '$2y$10$bJULWheOCKE3pZK8kqyRV.ReazkpPUR/.ZlpJVjT8Liq7bSXRo7Bm', '2021-03-09 14:48:53', '2021-03-09 14:48:53', NULL, NULL, '2021-03-09 22:48:53', '2021-03-09 22:48:53'),
(3, NULL, 1, 1, '2021-03-09 12:01:39', 1, 'user', 'sdfsdfsdf', 'sdfsdfsdfsd@gmail.com', NULL, '$2y$10$LHpDjuGUvBvSW3XPpjw9eOdCmsp2uw3MOevu7e0K2mzJ5NyMNRZEW', '2021-03-11 12:01:15', '2021-03-11 12:01:15', NULL, NULL, '2021-03-11 20:01:15', '2021-03-11 20:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `workexperiences`
--

CREATE TABLE `workexperiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timework` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Side` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quitjob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manageraddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `managernumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worksections`
--

CREATE TABLE `worksections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subheadings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep` tinyint(1) DEFAULT 0,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa',
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worksections`
--

INSERT INTO `worksections` (`id`, `parent_id`, `title`, `description`, `summary`, `link`, `subheadings`, `dep`, `lang`, `meta_desc`, `meta_title`, `meta_keywords`, `images`, `created_at`, `updated_at`) VALUES
(1, NULL, 'fdgdfg', 'dfgdfg', 'dfgdfg', 'dfgdfgdfgdf', 'dfgdfgd', 0, 'en', 'dfgdfg', 'dfgdfg', 'dfgdf', 'dfgdfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(2, NULL, 'fdgdsdvfg', 'ddvfgdfg', 'dfgddvfg', 'dfgdfgdvsddfgdf', 'dfdvsgdfgd', 0, 'en', 'dfgdfg', 'dfgdfg', 'dfgdf', 'dfgdfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(3, NULL, 'fdgdsdscdvfg', 'ddvdscfgdfg', 'dfgddcdvfg', 'dfgdfsdsdgdvsddfgdf', 'dfdvsdcsgdfgd', 0, 'en', 'dfgsdcdfg', 'dfgdfg', 'dfgdcdf', 'dfgdfsdcg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(4, NULL, 'fdgdszxcdvfg', 'ddvfcxzcgdfg', 'dfzxcgddvfg', 'dfgdfgzxcdvsddfgdf', 'dfdvsgzxcdfgd', 0, 'en', 'dfgdfg', 'dfgdfg', 'dfgzxcdf', 'dzxcfgdfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(5, 1, 'fdgdsdvfg', 'ddvfgdfg', 'dfgddvfg', 'dfgdfgdvsddfgdf', 'dfdvsgdfgd', 0, 'en', 'dfgdfg', 'dfgdfg', 'dfgdf', 'dfgdfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(6, 2, 'fdgdsdscdvfg', 'ddvdscfgdfg', 'dfgddcdvfg', 'dfgdfsdsdgdvsddfgdf', 'dfdvsdcsgdfgd', 0, 'en', 'dfgsdcdfg', 'dfgdfg', 'dfgdcdf', 'dfgdfsdcg', '2021-03-17 13:49:58', '2021-03-10 14:49:58'),
(7, 3, 'fdgdszxcdvfg', 'ddvfcxzcgdfg', 'dfzxcgddvfg', 'dfgdfgzxcdvsddfgdf', 'dfdvsgzxcdfgd', 0, 'en', 'dfgdfg', 'dfgdfg', 'dfgzxcdf', 'dzxcfgdfg', '2021-03-17 13:49:58', '2021-03-10 14:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activation_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `articlecategories`
--
ALTER TABLE `articlecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_articlecategory_id_foreign` (`articlecategory_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `article_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_course`
--
ALTER TABLE `cart_course`
  ADD PRIMARY KEY (`cart_id`,`course_id`),
  ADD KEY `cart_course_course_id_foreign` (`course_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_course`
--
ALTER TABLE `category_course`
  ADD PRIMARY KEY (`category_id`,`course_id`),
  ADD KEY `category_course_course_id_foreign` (`course_id`);

--
-- Indexes for table `commentcolleagues`
--
ALTER TABLE `commentcolleagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentcolleagues_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyinfos`
--
ALTER TABLE `companyinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computerabilities`
--
ALTER TABLE `computerabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `computerabilities_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`);

--
-- Indexes for table `educationcourses`
--
ALTER TABLE `educationcourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educationcourses_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `educationexperiences`
--
ALTER TABLE `educationexperiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educationexperiences_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generalabilities`
--
ALTER TABLE `generalabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generalabilities_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `homedescriptions`
--
ALTER TABLE `homedescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ides`
--
ALTER TABLE `ides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infos_ide_id_foreign` (`ide_id`);

--
-- Indexes for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instagrams_user_id_foreign` (`user_id`);

--
-- Indexes for table `learnings`
--
ALTER TABLE `learnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learnings_user_id_foreign` (`user_id`),
  ADD KEY `learnings_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherinformations`
--
ALTER TABLE `otherinformations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otherinformations_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `ourresources`
--
ALTER TABLE `ourresources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questionanswers`
--
ALTER TABLE `questionanswers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionanswers_course_id_foreign` (`course_id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `startupinfos`
--
ALTER TABLE `startupinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startupinfos_ide_id_foreign` (`ide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `workexperiences`
--
ALTER TABLE `workexperiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workexperiences_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `worksections`
--
ALTER TABLE `worksections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_codes`
--
ALTER TABLE `activation_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articlecategories`
--
ALTER TABLE `articlecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentcolleagues`
--
ALTER TABLE `commentcolleagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companyinfos`
--
ALTER TABLE `companyinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computerabilities`
--
ALTER TABLE `computerabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educationcourses`
--
ALTER TABLE `educationcourses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationexperiences`
--
ALTER TABLE `educationexperiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalabilities`
--
ALTER TABLE `generalabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homedescriptions`
--
ALTER TABLE `homedescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ides`
--
ALTER TABLE `ides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instagrams`
--
ALTER TABLE `instagrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learnings`
--
ALTER TABLE `learnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherinformations`
--
ALTER TABLE `otherinformations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ourresources`
--
ALTER TABLE `ourresources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionanswers`
--
ALTER TABLE `questionanswers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startupinfos`
--
ALTER TABLE `startupinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workexperiences`
--
ALTER TABLE `workexperiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worksections`
--
ALTER TABLE `worksections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD CONSTRAINT `activation_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_articlecategory_id_foreign` FOREIGN KEY (`articlecategory_id`) REFERENCES `articlecategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_course`
--
ALTER TABLE `cart_course`
  ADD CONSTRAINT `cart_course_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_course`
--
ALTER TABLE `category_course`
  ADD CONSTRAINT `category_course_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commentcolleagues`
--
ALTER TABLE `commentcolleagues`
  ADD CONSTRAINT `commentcolleagues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `computerabilities`
--
ALTER TABLE `computerabilities`
  ADD CONSTRAINT `computerabilities_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `educationcourses`
--
ALTER TABLE `educationcourses`
  ADD CONSTRAINT `educationcourses_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `educationexperiences`
--
ALTER TABLE `educationexperiences`
  ADD CONSTRAINT `educationexperiences_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `generalabilities`
--
ALTER TABLE `generalabilities`
  ADD CONSTRAINT `generalabilities_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `infos_ide_id_foreign` FOREIGN KEY (`ide_id`) REFERENCES `ides` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD CONSTRAINT `instagrams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learnings`
--
ALTER TABLE `learnings`
  ADD CONSTRAINT `learnings_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `learnings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `otherinformations`
--
ALTER TABLE `otherinformations`
  ADD CONSTRAINT `otherinformations_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questionanswers`
--
ALTER TABLE `questionanswers`
  ADD CONSTRAINT `questionanswers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `startupinfos`
--
ALTER TABLE `startupinfos`
  ADD CONSTRAINT `startupinfos_ide_id_foreign` FOREIGN KEY (`ide_id`) REFERENCES `ides` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workexperiences`
--
ALTER TABLE `workexperiences`
  ADD CONSTRAINT `workexperiences_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
