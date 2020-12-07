-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th8 31, 2020 lúc 08:47 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc_project2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', '2020-05-28 09:38:14', '2020-08-10 02:37:12'),
(4, 'Xiaomi', 'xiaomi', '2020-05-28 09:44:21', '2020-08-08 22:55:36'),
(5, 'Sony', 'sony', '2020-05-28 09:44:50', '2020-08-08 22:40:26'),
(6, 'HTC', 'htc', '2020-05-28 09:49:14', '2020-05-28 09:49:14'),
(7, 'samsung', 'samsung', '2020-08-09 06:44:36', '2020-08-08 22:39:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `desciption` text COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lien_ket_cate` (`cate_id`),
  KEY `lien_ket_tag` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `price`, `image`, `status`, `featured`, `desciption`, `cate_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 'nguyen', 'nguyen', 1234, 'public/admin/images/photo-1498154491395-900d0407c42c.jpg', 1, 1, 'hung', 1, 1, '2020-08-09 11:48:25', '2020-08-09 11:48:25'),
(2, 'kim bỉnh mai', 'kim-binh-mai', 12345789, 'public/admin/images/67216438_2382073928742235_1535419266080178176_n.jpg', 0, 0, 'hung abc', 7, 3, '2020-08-09 11:59:35', '2020-08-10 02:41:43'),
(3, 'nhật ký của tôi', 'nhat-ky-cua-toi', 986345, 'public/admin/images/72052600_2847257715284461_6803763706271367168_n.jpg', 0, 1, 'nhật ký của tôi', 5, 3, '2020-08-09 12:01:36', '2020-08-10 02:39:38'),
(4, 'Lý nhã kỳ', 'ly-nha-ky', 1234876, 'public/admin/images/79679778_450162565906358_3976154819965485056_n.jpg', 0, 1, 'hung', 5, 5, '2020-08-10 05:52:20', '2020-08-09 18:38:20'),
(5, 'Phạm Băng Băng', 'pham-bang-bang', 87654, 'public/admin/images/78310874_2781822575174537_5744051775195840512_o.jpg', 1, 1, 'Phạm Băng Băng', 4, 3, '2020-08-10 05:53:42', '2020-08-10 02:39:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trending', '2020-05-28 08:47:15', '2020-08-09 18:46:07'),
(3, 'Featured', '2020-05-28 08:47:47', '2020-08-08 22:40:55'),
(4, 'Nomal', '2020-05-28 08:47:52', '2020-08-08 22:41:06'),
(5, 'message', '2020-05-28 08:47:57', '2020-08-08 22:41:30'),
(6, '#active', '2020-05-28 08:50:28', '2020-08-08 22:41:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'hung', 'hung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-05-23 11:21:07', '2020-05-24 02:09:51'),
(2, 'admin', 'admin@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 0, '2020-05-23 11:24:31', '2020-05-23 20:37:16'),
(6, 'HTC', 'htc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2020-05-24 00:33:06', '2020-05-24 02:10:15'),
(8, 'pass_salt', 'pass_salt@gmail.com', '38b5b88f005154fe800f129bb66f149b', 0, '2020-05-24 14:06:35', '2020-05-24 14:06:35'),
(9, 'crypt', 'crypt@gmail.com', '$1$1zSza.Di$Y1a7PeTsJDZWSZVxw.MCk.', 0, '2020-05-24 14:11:55', '2020-05-24 14:11:55'),
(10, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2020-05-28 07:05:40', '2020-05-28 07:05:40'),
(11, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2020-05-28 07:06:17', '2020-05-28 07:06:17'),
(12, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2020-05-28 07:06:44', '2020-05-28 07:06:44');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lien_ket_cate` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lien_ket_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
