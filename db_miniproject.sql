-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 04, 2021 lúc 01:17 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(66) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `avatar`, `phone`, `email`, `created_at`, `updated_at`, `address`) VALUES
(6, 'Nguyễn Thành Thức', '4-49-37-15-31-08-2021.png', '0389946423', 'nguyenthanhthuc92@gmail.com', '2021-08-31 08:37:49', '2021-08-31 08:37:49', '138, Ấp Quang Phú Xã Quơn Long, Chợ Gạo, Tiền Giang'),
(7, 'Nguyễn Thành Thức 1', '436274-27-01-16-31-08-2021.jpg', '0389946424', 'nguyenthanhthuc92@gmail.com', '2021-08-31 09:01:27', '2021-08-31 09:01:27', 'nguyenthanhthuc92@gmail.com'),
(8, 'Nguyễn Thành Thức 2', 'album1-32-03-16-31-08-2021.webp', '0389946425', 'nguyenthanhthuc92@gmail.com', '2021-08-31 09:03:32', '2021-08-31 09:03:32', '25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2021_08_30_082850_create_tbl_order', 2),
(20, '2021_08_30_085758_create_tbl_customer', 2),
(21, '2021_08_30_090322_create_tbl_product', 2),
(22, '2021_08_30_091812_create_tbl_order_detail', 2),
(23, '2021_08_31_152712_update_customer_add_address', 3),
(24, '2021_08_31_195347_update_table_product_add_avatar', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantily` int(11) NOT NULL,
  `total` double NOT NULL,
  `order_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_customer`, `order_code`, `quantily`, `total`, `order_date`, `note`, `created_at`, `updated_at`) VALUES
(2, 8, 'da4f4a28', 1, 143232, '2021-09-17', 'w3t3t', '2021-09-04 01:00:18', '2021-09-04 01:00:18'),
(3, 7, 'da4f4a28', 1, 143232, '2021-10-09', 'ewfef', '2021-09-04 01:01:52', '2021-09-04 01:01:52'),
(4, 8, 'da4f4a28', 1, 143232, '2021-10-02', 'ewgwg', '2021-09-04 01:02:14', '2021-09-04 01:02:14'),
(5, 8, 'da4f4a28', 1, 143232, '2021-10-01', 'aeewve', '2021-09-04 01:11:09', '2021-09-04 01:11:09'),
(6, 7, 'da4f4a28', 1, 143232, '2021-10-03', 'dd', '2021-09-04 01:12:03', '2021-09-04 01:12:03'),
(7, 8, '4beb550a', 1, 143232, '2021-09-05', 'sss', '2021-09-04 03:36:29', '2021-09-04 03:36:29'),
(8, 8, '4beb550a', 5, 582928, '2021-09-25', 'dd', '2021-09-04 03:50:43', '2021-09-04 03:50:43'),
(9, 7, '4beb550a', 5, 582928, '2021-09-04', 'Giao hàng sau giờ hành chính', '2021-09-04 03:55:54', '2021-09-04 03:55:54'),
(10, 6, '4beb550a', 5, 582928, '2021-09-05', 'Giao hàng sau giờ hành chính', '2021-09-04 04:48:10', '2021-09-04 04:48:10'),
(11, 8, '4beb550a', 5, 582928, '2021-09-18', 'Giao hàng sau giờ hành chính', '2021-09-04 04:50:20', '2021-09-04 04:50:20'),
(12, 8, 'c7d4ac90', 2, 12346, '2021-09-26', 'Giao hàng sau giờ hành chính', '2021-09-04 04:51:06', '2021-09-04 04:51:06'),
(13, 8, '85b40088', 2, 145585, '2021-09-25', 'Giao hàng sau giờ hành chính', '2021-09-04 04:52:11', '2021-09-04 04:52:11'),
(14, 8, '3b892e59', 1, 2346, '2021-09-25', 'Giao hàng sau giờ hành chính', '2021-09-04 04:56:32', '2021-09-04 04:56:32'),
(15, 6, 'f6d058a5', 2, 153232, '2021-09-25', 'Giao hàng sau giờ hành chính', '2021-09-04 04:56:46', '2021-09-04 04:56:46'),
(16, 7, 'b4470029', 1, 143232, '2021-09-05', 'Giao hàng sau giờ hành chính nhé', '2021-09-04 04:59:57', '2021-09-04 04:59:57'),
(17, 8, 'b2f91f5a', 6, 718506, '2021-10-08', 'Giao hàng sau giờ hành chính', '2021-09-04 05:01:11', '2021-09-04 05:01:11'),
(18, 8, 'af768891', 1, 143232, '2021-09-24', 'Giao hàng sau giờ hành chính', '2021-09-04 05:04:55', '2021-09-04 05:04:55'),
(19, 7, '761406fc', 11, 25883, '2021-09-04', 'Giao hàng sau giờ hành chính', '2021-09-04 05:07:14', '2021-09-04 05:07:14'),
(20, 6, '3894c119', 1, 143232, '2021-10-10', 'Giao hàng sau giờ hành chính  1', '2021-09-04 07:05:42', '2021-09-04 07:05:42'),
(21, 8, '1ac2313b', 2, 286464, '2021-09-26', 'Giao hàng sau giờ hành chính', '2021-09-04 07:22:09', '2021-09-04 07:22:09'),
(22, 8, '1ac2313b', 2, 286464, '2021-10-02', 'Giao hàng sau giờ hành chính', '2021-09-04 07:22:57', '2021-09-04 07:22:57'),
(23, 8, '1ac2313b', 2, 286464, '2021-10-02', 'Giao hàng sau giờ hành chính', '2021-09-04 07:23:02', '2021-09-04 07:23:02'),
(24, 8, '1ac2313b', 2, 286464, '2021-10-02', 'Giao hàng sau giờ hành chính', '2021-09-04 07:23:10', '2021-09-04 07:23:10'),
(25, 8, '1ac2313b', 2, 286464, '2021-09-05', 'Giao hàng sau giờ hành chính', '2021-09-04 07:24:11', '2021-09-04 07:24:11'),
(26, 8, '1ac2313b', 2, 286464, '2021-09-12', 'Giao hàng sau giờ hành chính', '2021-09-04 07:38:04', '2021-09-04 07:38:04'),
(27, 6, '1ac2313b', 2, 286464, '2021-09-12', 'Giao hàng sau giờ hành chính', '2021-09-04 07:39:20', '2021-09-04 07:39:20'),
(28, 6, '1ac2313b', 2, 286464, '2021-09-11', 'Giao hàng sau giờ hành chính', '2021-09-04 07:42:26', '2021-09-04 07:42:26'),
(29, 6, 'fd67062d', 2, 145578, '2021-09-12', 'Giao hàng sau giờ hành chính 123', '2021-09-04 07:42:57', '2021-09-04 07:42:57'),
(30, 7, 'ecd23e54', 2, 145585, '2021-09-19', 'Giao hàng sau giờ hành chính 111', '2021-09-04 08:05:54', '2021-09-04 08:05:54'),
(31, 6, '21d4f69b', 8, 329110, '2021-09-26', 'Giao hàng sau giờ hành chính', '2021-09-04 09:00:27', '2021-09-04 09:00:27'),
(32, 7, 'a35a151c', 1, 2346, '2021-09-25', 'Giao hàng sau giờ hành chính wfw', '2021-09-04 09:01:09', '2021-09-04 09:01:09'),
(33, 8, '5e46c536', 10, 305274, '2021-09-19', 'Giao hàng sau giờ hành chính', '2021-09-04 09:02:27', '2021-09-04 09:02:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `quantily` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_code`, `id_product`, `quantily`, `created_at`, `updated_at`) VALUES
(1, '1ac2313b', 4, 2, '2021-09-04 07:42:26', '2021-09-04 07:42:26'),
(2, 'fd67062d', 4, 1, '2021-09-04 07:42:57', '2021-09-04 07:42:57'),
(3, 'fd67062d', 5, 1, '2021-09-04 07:42:57', '2021-09-04 07:42:57'),
(4, 'ecd23e54', 4, 1, '2021-09-04 08:05:54', '2021-09-04 08:05:54'),
(5, 'ecd23e54', 6, 1, '2021-09-04 08:05:54', '2021-09-04 08:05:54'),
(6, '21d4f69b', 4, 2, '2021-09-04 09:00:27', '2021-09-04 09:00:27'),
(7, '21d4f69b', 3, 2, '2021-09-04 09:00:27', '2021-09-04 09:00:27'),
(8, '21d4f69b', 2, 2, '2021-09-04 09:00:27', '2021-09-04 09:00:27'),
(9, '21d4f69b', 1, 2, '2021-09-04 09:00:27', '2021-09-04 09:00:27'),
(10, 'a35a151c', 5, 1, '2021-09-04 09:01:09', '2021-09-04 09:01:09'),
(11, '5e46c536', 4, 2, '2021-09-04 09:02:27', '2021-09-04 09:02:27'),
(12, '5e46c536', 5, 2, '2021-09-04 09:02:27', '2021-09-04 09:02:27'),
(13, '5e46c536', 6, 6, '2021-09-04 09:02:27', '2021-09-04 09:02:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Bàn ăn', 10000, '2021-08-31 13:15:35', '2021-08-31 13:15:35', '436274-35-15-20-31-08-2021.jpg'),
(2, 'Bàn thờ', 1323, '2021-08-31 13:16:11', '2021-08-31 13:16:11', 'cum-ban-lam-viec-hr-md03-1621497280-11-16-20-31-08-2021.png'),
(3, 'Bàn ăn 2', 10000, '2021-09-01 03:08:16', '2021-09-01 03:08:16', '3523523532-16-08-10-01-09-2021.jpg'),
(4, 'Bàn ăn 3', 143232, '2021-09-01 03:08:48', '2021-09-01 03:08:48', 'tu bep walnut-48-08-10-01-09-2021.jpg'),
(5, 'Giường ngủ', 2346, '2021-09-01 03:13:21', '2021-09-01 03:13:21', 'phong-ngu-miami(4)-21-13-10-01-09-2021.jpg'),
(6, 'Nguyễn Thành Thức', 2353, '2021-09-01 10:31:46', '2021-09-01 10:31:46', 'bandicam 2021-09-01 07-41-17-925-46-31-17-01-09-2021.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
