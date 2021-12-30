-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 16, 2021 lúc 12:43 PM
-- Phiên bản máy phục vụ: 5.7.33-log
-- Phiên bản PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `V6web3001`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `action`
--

CREATE TABLE `action` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email`
--

CREATE TABLE `email` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newPass` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recoveryMail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oldPass` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passGen` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendIos` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleteIos` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changePass` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RestoreYTB` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` int(1) DEFAULT NULL,
  `download_book` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watchVideo` int(5) DEFAULT NULL,
  `send_mail` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_mail_ipad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendGmailApp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ScretGG` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OTPGG` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pm` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile_mail`
--

CREATE TABLE `profile_mail` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `somailbackup` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakeip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Youtube` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeWatchYTB` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatChannel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GmailApp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Docs` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GoogleTrust` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ChromeTrust` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrustSomeOne` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profile_mail`
--

INSERT INTO `profile_mail` (`id`, `mail_profile`, `action`, `somailbackup`, `fakeip`, `Youtube`, `timeWatchYTB`, `CreatChannel`, `GmailApp`, `Docs`, `GoogleTrust`, `ChromeTrust`, `TrustSomeOne`, `created_at`, `updated_at`) VALUES
(1, 'may1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-16 19:43:33', '2021-05-16 19:43:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(2) NOT NULL,
  `status_` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `status_`) VALUES
(1, 'All'),
(2, 'token_Die'),
(3, 'Mail_Fail'),
(4, 'Using'),
(5, 'Used'),
(6, 'Mail-ver'),
(7, 'Mail_die'),
(8, 'BackupSuccess'),
(9, 'Mail_sai_pass'),
(10, 'Success'),
(11, 'Using_Ver'),
(12, 'New'),
(13, 'LoginSuccess');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin', 'admin@admin', 1, '$2y$10$LmzZlJ4s.FPG9WCn/ZSIk.qg.ssoPc.s7hgV4SVjKheE2Eunqb6YS', NULL, '2021-05-16 19:42:39', '2021-05-16 19:42:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_id_pm_foreign` (`id_pm`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profile_mail`
--
ALTER TABLE `profile_mail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `action`
--
ALTER TABLE `action`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `email`
--
ALTER TABLE `email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `profile_mail`
--
ALTER TABLE `profile_mail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_id_pm_foreign` FOREIGN KEY (`id_pm`) REFERENCES `profile_mail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
