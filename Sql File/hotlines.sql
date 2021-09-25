-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 07:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotlines`
--

CREATE TABLE `hotlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotlines`
--

INSERT INTO `hotlines` (`id`, `title`, `phone_number`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'মহিলাদের বিরুদ্ধে সহিংসতা/ বাল্যবিবাহ প্রতিরোধের জন্য সরকারি হেল্পলাইন নম্বর', '109', 'মাল্টি সেক্টরাল রেফারেল এবং সাইকোসিকাল সাপোর্ট; এটি কল করার জন্য প্রধান হেল্পলাইন নম্বর এবং দেশব্যাপী প্রচারিত হচ্ছে', 'mhilader-biruddhe-shingsta-balzbibah-prtirodher-jnz-srkari-helplain-nmbr-2109253425-780', '2021-09-25 08:34:25', '2021-09-25 08:34:25'),
(2, 'জরুরী সেবা', '999', 'পুলিশ এবং হাসপাতালে অবিলম্বে পরিষেবা', 'jateez-jruri-htlain-nmbr-2109253540-645', '2021-09-25 08:35:40', '2021-09-25 08:35:40'),
(3, 'কল সেন্টার', '333', 'জাতীয় তথ্য বাতায়নের সকল ওয়েবসাইটের তথ্য প্রদান;\r\nসকল সরকারি সেবা প্রাপ্তির পদ্ধতির তথ্য প্রদান;\r\nবিভিন্ন জেলা ও উপজেলা সম্পর্কিত তথ্য প্রদান;\r\nসরকারি কর্মকর্তাদের সাথে যোগাযোগের তথ্য প্রদান;\r\nসামাজিক সমস্যা প্রতিকারে জেলা প্রশাসক ও উপজেলা নির্বাহী অফিসারদের নিকট অভিযোগ দাখিল;', 'kl-sentar-2109254324-191', '2021-09-25 08:43:24', '2021-09-25 08:43:24'),
(4, 'কৃষি কল সেন্টার', '16123', 'কৃষি কল সেন্টার', 'krrishi-kl-sentar-2109254655-737', '2021-09-25 08:46:55', '2021-09-25 08:46:55'),
(5, 'নারীর প্রতি সহিংসতার জন্য জাতীয় হেল্পলাইন কেন্দ্র', '10921', 'ক্ষতিগ্রস্তদের অবিলম্বে সেবা এবং সংশ্লিষ্ট সংস্থার সাথে যোগাযোগ: ডাক্তার, পরামর্শদাতা, আইনজীবী, ডিএনএ বিশেষজ্ঞ, পুলিশ কর্মকর্তা', 'nareer-prti-shingstar-jnz-jateez-helplain-kendr-2109254906-616', '2021-09-25 08:49:06', '2021-09-25 08:49:06'),
(6, 'কান পেতে রই', '01779554391', 'মানসিক স্বাস্থ্য ও মনো -সামাজিক হেল্পলাইন', 'kan-pete-ri-2109255015-198', '2021-09-25 08:50:15', '2021-09-25 08:50:15'),
(7, 'মনের বন্ধু', '01776632344', 'মানসিক স্বাস্থ্য ও মনো -সামাজিক হেল্পলাইন', 'mner-bndhu-2109255122-136', '2021-09-25 08:51:22', '2021-09-25 08:51:22'),
(8, 'Dosh Unisher Mor Helpdesk for GBV/SRHR/psychosocial support', '9612600600', 'মানসিক স্বাস্থ্য ও মনো -সামাজিক হেল্পলাইন', 'dosh-unisher-mor-helpdesk-for-gbvsrhrpsychosocial-support-2109255217-866', '2021-09-25 08:52:17', '2021-09-25 08:52:17'),
(9, 'শিশু সহায়তা', '1098', 'এটি এমন একটি ব্যবস্থা বা পরিসেবা, যা সকল প্রকার প্রভাব বা চাপমুক্ত থেকে শিশুর সুরক্ষা প্রদানে সকল প্রকার গোপনীয়তা রক্ষা করে সাহায্যের হাত বাড়িয়ে দেয়। সাধারন ফোনের মাধ্যমেই মানুষ ১০৯৮ হেল্পলাইনের সাহায্য পেয়ে থাকে। ২৪ ঘন্টায়ই দেশের যেকোন অঞ্চল থেকে ১০৯৮ হেল্পলাইন এ ফোন করে সেবা গ্রহণ করতে পারবেন।', 'sisu-shayta-2109255422-391', '2021-09-25 08:54:22', '2021-09-25 08:54:22'),
(10, 'জাতীয় পরিচয়পত্র', '105', 'জাতীয় পরিচয়পত্র', 'jateey-pricyptr-2109255550-641', '2021-09-25 08:55:50', '2021-09-25 08:55:50'),
(11, 'সরকারী আইন সেবা', '16430', 'সরকারী আইন সেবা', 'srkaree-ain-seba-2109255618-547', '2021-09-25 08:56:18', '2021-09-25 08:56:18'),
(12, 'দুর্যোগের আগাম বার্তা', '10941', 'দুর্যোগের আগাম বার্তা', 'durzoger-agam-barta-2109255634-383', '2021-09-25 08:56:34', '2021-09-25 08:56:34'),
(13, 'দুদক হটলাইন', '106', 'দুদক হটলাইন', 'dudk-htlain-2109255701-816', '2021-09-25 08:57:01', '2021-09-25 08:57:01'),
(14, 'RAB এর সাহায্য', '101', 'Rapid Action Battalion (RAB) has its own helpline. You can contact the RAB directly by calling the number 101.', 'rab-er-sahazz-2109250103-605', '2021-09-25 09:01:03', '2021-09-25 09:01:03'),
(15, 'Fire Service', '102', 'Fire service is available by calling 999. However, the fire service has its own hotline. Emergency services of this organization can be taken by calling 102.', 'fire-service-2109250257-943', '2021-09-25 09:02:57', '2021-09-25 09:02:57'),
(16, 'Bangladesh Police Helpdesk', '100', 'Many May not know that Bangladesh police has its own helpdesk. If you report any information about police harassment to a senior police officer, then the police force is also taking action against the police under investigation.', 'bangladesh-police-helpdesk-2109250510-940', '2021-09-25 09:05:10', '2021-09-25 09:05:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotlines`
--
ALTER TABLE `hotlines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotlines`
--
ALTER TABLE `hotlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
