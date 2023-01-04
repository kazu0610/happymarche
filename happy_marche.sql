-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-04 08:10:55
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `happy_marche`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 19, 2, '2022-12-17 09:00:24', '2022-12-17 09:00:24'),
(13, 20, 2, '2022-12-17 09:45:44', '2022-12-17 09:45:44'),
(14, 23, 2, '2022-12-17 09:58:49', '2022-12-17 09:58:49'),
(15, 13, 2, '2022-12-17 10:10:52', '2022-12-17 10:10:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `favoriteable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favoriteable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favoriteable_type`, `favoriteable_id`, `created_at`, `updated_at`) VALUES
(7, 2, 'App\\Models\\Product', 23, '2022-12-25 02:50:12', '2022-12-25 02:50:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_21_231416_create_posts_table', 2),
(6, '2022_11_22_080959_add_role_to_users_table', 3),
(7, '2022_11_23_232915_create_products_table', 4),
(8, '2022_11_23_233916_create_products_table', 5),
(9, '2022_11_27_232129_add_image_to_users_table', 6),
(10, '2022_11_28_224840_add_column_user_id_to_products_table', 7),
(11, '2022_11_30_001833_add_user_profile_to_users_table', 8),
(12, '2022_12_01_073452_change_tel', 9),
(13, '2022_12_01_074155_change_users_tel', 10),
(14, '2022_12_01_080118_change_users_tel', 11),
(15, '2019_05_03_000001_create_customer_columns', 12),
(16, '2019_05_03_000002_create_subscriptions_table', 12),
(17, '2019_05_03_000003_create_subscription_items_table', 12),
(18, '2022_12_11_152021_change_users_table_role', 13),
(19, '2022_12_11_164806_add_area_to_users_table', 14),
(20, '2022_12_15_074513_create_carts_table', 15),
(21, '2018_12_23_120000_create_shoppingcart_table', 16),
(22, '2022_12_18_121842_add_buy_flag_to_shoppingcart', 17),
(23, '2022_12_19_224612_add_columns_to_shoppingcart', 18),
(24, '2022_12_21_080956_add_token_to_users', 19),
(25, '2018_12_14_000000_create_favorites_table', 20);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('seller@seller.com', '$2y$10$8kLZoilLPcPhZkM.1fwth.XV5Fms1dXAmztQngKbOFs2AJ3UygOQy', '2022-12-12 22:45:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewScore` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `seller_name`, `title`, `reviewScore`, `product_name`, `body`, `created_at`, `updated_at`) VALUES
(8, 1, 'じゃがいもさん', 'a', '★★', 'a', 'aa', '2022-11-21 15:26:42', '2022-11-21 15:26:42'),
(10, 1, 'じゃがいもさん', 'a', '★★', 'a', 'aa', '2022-11-21 15:31:35', '2022-11-21 15:31:35'),
(32, 2, 'おじさん', '最高でした', '★★★★', 'にんじん', '本当に<br>\r\n最高\r\nでした。!!ああああ', '2022-11-23 09:33:03', '2022-11-23 13:48:21'),
(33, 2, '野口さん', 'すごくよかった！', '★★★★★', 'レタス', '本当によかった！\r\nまた利用したいです。', '2022-12-06 13:45:57', '2022-12-06 13:45:57'),
(34, 1, '松本さん', 'ひと言でいうと「最高」', '★★★★★', 'キャベツ', 'キャベツが美味し過ぎてびっくり。\r\nこんなにおいしいキャベツは食べたことが無い！', '2022-12-12 13:54:51', '2022-12-12 13:54:51'),
(35, 1, 'てすと', 'てすと', '★★★', 'てすと', 'てすと', '2022-12-12 13:55:11', '2022-12-12 13:55:11'),
(36, 1, 'てすと', 'てすと', '★', 'てすと', 'てすと', '2022-12-12 13:55:23', '2022-12-12 13:55:23'),
(37, 1, 'てすと', 'てすと', '★★★', 'てすと', 'てすと', '2022-12-12 13:55:31', '2022-12-12 13:55:31'),
(38, 1, 'てすと', 'てすと', '★★★★', 'てすと', 'てすと', '2022-12-12 13:55:36', '2022-12-12 13:55:36'),
(39, 1, 'てすと', 'てすと', '★★★', 'てすと', 'てすと', '2022-12-12 13:55:42', '2022-12-12 13:55:42'),
(40, 1, 'てすと', 'てすと', '★★★', 'てすと', 'てすと', '2022-12-12 13:55:59', '2022-12-12 13:55:59'),
(41, 1, '販売者A', '本当においしかったです！', '★★★★★', 'とうもろこし', '本当においしかったです！\r\nまた利用させてください。', '2022-12-25 03:52:46', '2022-12-25 03:52:46'),
(42, 9, '農家A', 'すごく美味しかったです！', '★★★★★', 'てすと', 'ぜひまた利用したいです。\r\nありがとうございました。', '2022-12-26 12:45:52', '2022-12-26 12:45:52'),
(43, 10, 'てすと', 'てすと', '★★★★★', 'てすと', 'てすと！', '2022-12-26 13:02:55', '2022-12-26 13:02:55');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `detail`, `product_image`, `price`, `created_at`, `updated_at`) VALUES
(13, 2, 'なすび', '美味しいなすびです。', '20221210_112723_nasubi.jpg', 10, '2022-11-27 08:29:16', '2022-12-10 02:27:23'),
(14, 2, '熟成トマト', '高濃度リコピン配合の気候環境の優れたところで栽培されたトマトです！', '20221210_112708_tomato.jpg', 99, '2022-11-27 09:01:02', '2022-12-10 02:27:08'),
(17, 2, '甘くておいしいミカン', 'とれたての美味しいミカンです', NULL, 199, '2022-11-28 13:58:45', '2022-11-28 13:58:45'),
(18, 2, 'とにかくおいしいレタスです', '規格外のレタスです。味はすごく美味しい！', '20221210_105943_letasu.jpg', 99, '2022-12-06 13:25:43', '2022-12-10 02:21:35'),
(19, 2, 'ほくほくのじゃがいも', 'かたちは少し悪いですが、美味しいじゃがいもです。', '20221206_222755_potato.jpg', 120, '2022-12-06 13:27:55', '2022-12-06 13:27:55'),
(20, 2, '大きなブロッコリー', '規格外のブロッコリーです。超新鮮！', '20221206_223038_brokkory.jpg', 150, '2022-12-06 13:30:38', '2022-12-06 13:30:38'),
(23, 2, '最高のとうもろこし', '残念ながら市場には出せなくなったものの\r\n胸を張って「おいしい」と断言できる品物です。\r\nぜひお召し上がりください。', '20221212_224737_corn.jpg', 199, '2022-12-12 13:47:37', '2022-12-26 13:05:35');

-- --------------------------------------------------------

--
-- テーブルの構造 `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buy_flag` tinyint(1) NOT NULL DEFAULT 0,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price_total` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `number`, `created_at`, `updated_at`, `buy_flag`, `code`, `price_total`, `qty`) VALUES
('1', '8', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";s:2:\"id\";s:2:\"20\";s:3:\"qty\";i:9;s:4:\"name\";s:27:\"大きなブロッコリー\";s:5:\"price\";d:150;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:28:\"20221206_223038_brokkory.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1, '2022-12-25 14:05:11', '2022-12-25 14:05:11', 1, 'lud5y9thbk', 1350, 9),
('2', '8', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2, '2022-12-25 14:08:38', '2022-12-25 14:08:38', 1, '4ptz3ui86r', 199, 1),
('3', '8', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";s:2:\"id\";s:2:\"20\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"大きなブロッコリー\";s:5:\"price\";d:150;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:28:\"20221206_223038_brokkory.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 3, '2022-12-25 14:34:06', '2022-12-25 14:34:06', 1, 'yi5klvo2ph', 150, 1),
('4', '2', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"2\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1, '2022-12-25 14:45:53', '2022-12-25 14:45:53', 1, '0qi8br72d6', 199, 1),
('5', '2', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"2\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"2\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2, '2022-12-25 14:47:47', '2022-12-25 14:47:47', 1, '795m0njol2', 398, 2),
('6', '9', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"3\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"9\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1, '2022-12-26 12:47:02', '2022-12-26 12:47:02', 1, 'jkxhsc7bf8', 597, 3),
('7', '10', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"3\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:299;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:2:\"10\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1, '2022-12-26 13:03:59', '2022-12-26 13:03:59', 1, 'h7kw03f1s8', 897, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'プロフィール画像',
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `postcode` int(11) DEFAULT NULL COMMENT '郵便番号',
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '住所',
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL,
  `area` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '生産地',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `tel`, `postcode`, `address`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `role`, `area`, `token`) VALUES
(1, '一般会員！', 'test@test.com', NULL, '$2y$10$nS7NN6OjHLAouTtHcBXJFOAYfc7L5VciDk3vCaxvZgg0rZycjgbgq', NULL, '2022-11-21 14:29:13', '2022-12-25 03:53:12', '20221225_125312_142135.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'cus_a28d70a8cffbce9297cb59966932'),
(2, '管理者', 'admin@admin.com', NULL, '$2y$10$6H0ZVubxzRNoCvazEUSAB.T8lEkMG4NYKwZdB/Nlt2yHp5j9rQGXO', 'OCImVDDyVuQwSrWs2JGFMs9HJB1u2wtwRakCVIAgXaMh2ljxcUzKYaQajC19', '2022-11-21 23:05:23', '2022-12-25 03:18:59', '20221128_220125_inosisi.png', '09000000000', 6100000, '京都府京都市大枝東新林町', NULL, NULL, NULL, NULL, 100, '滋賀県草津市', 'cus_a82d2ab07924b0f7745d2c950977'),
(3, '販売者', 'seller@seller.com', NULL, '$2y$10$y7jr5ZsYKYyHXoLHj5IoM.tM50TMZsxX7Xjbtm6l6VpSIYViHX1xS', NULL, '2022-12-11 05:40:57', '2022-12-14 13:20:47', '20221212_224958_read.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, ''),
(6, 'てすと', 'kazu0610.3jsb@gmail.com', NULL, '$2y$10$oxRZ8j85n.vASmpZqVFVledx7sZ/0Tzdtk6iXQ7CVlOs5lt0upUd2', 'eenZkb2jOteO1vjMyI6o6AkdhSfqj9KdHfTQW15nIdD3JSijFuJL7ggDrcF8', '2022-12-12 22:46:19', '2022-12-12 22:48:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, ''),
(8, '一般会員A', 'ippan@gmail.com', NULL, '$2y$10$.ozNteBjQf6s1Js3eNF5L..feFZJrCCKr.tRUxzD9AzI4lRu21ZHm', NULL, '2022-12-25 05:42:19', '2022-12-25 05:43:29', '20221225_144238_ゆるい笑顔の男の子.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'cus_0c170e47fd7c63e0fa2e22e8a1ce'),
(9, '一般会員キャプチャ用', 'general@gmail.com', NULL, '$2y$10$8EC28fXTFyV1wJ9M3UIml.XJhP3FN432RSi8SJnJUdsdUEYzvfnky', NULL, '2022-12-26 12:44:45', '2022-12-26 12:46:47', '20221226_214503_ペンギン.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'cus_0c2c34fb8256eb6d01fd96bf5e2d'),
(10, '一般会員動画用', 'general1@gmail.com', NULL, '$2y$10$xiify5kv9kuiLE2UCW33HOQtC7d7qid0UQ0WOvd85h9rTccNsBqci', NULL, '2022-12-26 13:01:48', '2022-12-26 13:03:44', '20221226_220225_パンダ.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'cus_ca59d7714a9e04db419199c21b05');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_favoriteable_type_favoriteable_id_index` (`favoriteable_type`,`favoriteable_id`),
  ADD KEY `favorites_user_id_index` (`user_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- テーブルのインデックス `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- テーブルのインデックス `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
