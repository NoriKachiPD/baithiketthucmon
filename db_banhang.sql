-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2025 lúc 04:08 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(16, 17, '2025-03-28', 500000, 'COD', '44664', '2025-03-28 00:59:55', '2025-03-28 00:59:55'),
(17, 18, '2025-03-28', 360000, 'COD', '?????', '2025-03-28 09:39:49', '2025-03-28 09:39:49'),
(18, 19, '2025-04-05', 600000, 'COD', 'Giao Hàng Nhanh', '2025-04-04 20:47:52', '2025-04-04 20:47:52'),
(19, 20, '2025-04-10', 300000, 'COD', NULL, '2025-04-10 12:19:33', '2025-04-10 12:19:33'),
(20, 21, '2025-04-11', 280000, 'COD', NULL, '2025-04-10 19:02:14', '2025-04-10 19:02:14'),
(21, 22, '2025-04-11', 150000, 'COD', NULL, '2025-04-10 19:07:12', '2025-04-10 19:07:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(19, 16, 15, 1, 350000, '2025-03-28 00:59:55', '2025-03-28 00:59:55'),
(20, 16, 19, 1, 150000, '2025-03-28 00:59:55', '2025-03-28 00:59:55'),
(21, 17, 6, 1, 180000, '2025-03-28 09:39:49', '2025-03-28 09:39:49'),
(22, 17, 18, 1, 180000, '2025-03-28 09:39:49', '2025-03-28 09:39:49'),
(23, 18, 36, 2, 150000, '2025-04-04 20:47:52', '2025-04-04 20:47:52'),
(24, 19, 52, 2, 75000, '2025-04-10 12:19:33', '2025-04-10 12:19:33'),
(25, 20, 13, 1, 280000, '2025-04-10 19:02:14', '2025-04-10 19:02:14'),
(26, 21, 53, 1, 150000, '2025-04-10 19:07:12', '2025-04-10 19:07:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(16, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Cái Này hay Này!!!!!!', '2025-04-10 02:35:36', '2025-04-10 02:35:36'),
(17, 'PHATDUC', 'phatchau16520@gmail.com', 'Great', 'Hay', '2025-04-10 02:39:15', '2025-04-10 02:39:15'),
(18, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Great', '2025-04-10 02:42:52', '2025-04-10 02:42:52'),
(19, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Quá Tuyệt Vời Luôn!!!!!', '2025-04-10 02:50:21', '2025-04-10 02:50:21'),
(20, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Quá Tuyệt Vời Luôn!!!!!', '2025-04-10 02:51:32', '2025-04-10 02:51:32'),
(21, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Quá Tuyệt Vời Luôn!!!!!', '2025-04-10 02:52:26', '2025-04-10 02:52:26'),
(22, 'Châu Đức Phát', 'phatchau16520@gmail.com', 'Great', 'Quá Tuyệt Vời Luôn!!!!!', '2025-04-10 02:53:26', '2025-04-10 02:53:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(16, 'Hằng', 'nam', 'hung@gmail.com', 'hoà ninh, hoà vang, đà nẵng', '587689596', '44664', '2025-03-28 00:59:03', '2025-03-28 00:59:03'),
(17, 'Hằng', 'nam', 'hung@gmail.com', 'hoà ninh, hoà vang, đà nẵng', '587689596', '44664', '2025-03-28 00:59:55', '2025-03-28 00:59:55'),
(18, 'PHATDUC', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', '?????', '2025-03-28 09:39:49', '2025-03-28 09:39:49'),
(19, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'Giao Hàng Nhanh', '2025-04-04 20:47:52', '2025-04-04 20:47:52'),
(20, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', NULL, '2025-04-10 12:19:33', '2025-04-10 12:19:33'),
(21, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', NULL, '2025-04-10 19:02:14', '2025-04-10 19:02:14'),
(22, 'PHATDUC', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', NULL, '2025-04-10 19:07:12', '2025-04-10 19:07:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2025_02_26_015147_create_mfs_table', 1),
(5, '2025_02_26_015201_create_cars_table', 1),
(6, '2025_03_05_011722_update_cars', 1),
(10, '0001_01_01_000000_create_users_table', 2),
(11, '0001_01_01_000001_create_cache_table', 2),
(12, '0001_01_01_000002_create_jobs_table', 2),
(13, '2025_04_03_013323_add_level_to_users_table', 3),
(14, '2025_04_10_083533_create_contacts_table', 4),
(15, '2025_04_10_182948_create_orders_table', 5),
(16, '2025_04_10_191825_update_customer_table_add_nullable_note', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('nam','nữ') NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('đã nhận đơn','đang xử lý','đang vận chuyển','giao hàng thành công','đơn hàng bị hủy','giao hàng không thành công') NOT NULL DEFAULT 'đã nhận đơn',
  `total_price` decimal(12,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `payment_method`, `product_quantity`, `order_code`, `order_date`, `status`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'XGC2024', '2025-04-11 02:48:14', 'đã nhận đơn', 160000.00, NULL, '2025-04-10 19:48:14', '2025-04-10 19:48:14'),
(5, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'DPT2415', '2025-04-11 02:53:41', 'đang xử lý', 160000.00, NULL, '2025-04-10 19:53:41', '2025-04-10 21:02:46'),
(6, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'SOQ3856', '2025-04-11 02:56:06', 'giao hàng thành công', 160000.00, NULL, '2025-04-10 19:56:06', '2025-04-10 21:46:44'),
(7, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'IPT1450', '2025-04-11 02:59:55', 'giao hàng thành công', 160000.00, NULL, '2025-04-10 19:59:55', '2025-04-10 21:45:14'),
(8, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'RDF9009', '2025-04-11 03:04:44', 'đơn hàng bị hủy', 160000.00, NULL, '2025-04-10 20:04:44', '2025-04-10 21:50:12'),
(9, 'Nguyễn Thị Thu Thảo', 'nữ', 'thuthaohgdn@gmail.com', '05 Hòa Minh 14', '0905652157', 'COD', 1, 'IVB4447', '2025-04-11 03:17:01', 'đơn hàng bị hủy', 160000.00, NULL, '2025-04-10 20:17:01', '2025-04-10 23:46:11'),
(10, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'RYA7487', '2025-04-11 03:19:52', 'đơn hàng bị hủy', 160000.00, NULL, '2025-04-10 20:19:52', '2025-04-10 21:47:45'),
(11, 'Châu Đức Trí', 'nam', 'triducchau2008@gmail.com', '05 Hòa Minh 14', '0921836452', 'COD', 1, 'NEP8888', '2025-04-11 04:35:39', 'giao hàng thành công', 180000.00, NULL, '2025-04-10 21:35:39', '2025-04-10 21:35:54'),
(12, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'YFX3169', '2025-04-11 04:56:01', 'đơn hàng bị hủy', 300000.00, NULL, '2025-04-10 21:56:01', '2025-04-10 21:59:53'),
(13, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'YYO3426', '2025-04-11 05:00:36', 'giao hàng thành công', 300000.00, NULL, '2025-04-10 22:00:36', '2025-04-10 22:54:27'),
(14, 'VAI LON', 'nam', 'minhkhang2102005@gmail.com', '05 Hòa Minh 14', '0903523744', 'COD', 2, 'ON21480', '2025-04-11 13:33:45', 'đơn hàng bị hủy', 20000000.00, NULL, '2025-04-11 06:33:45', '2025-04-11 06:36:13'),
(15, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 4, 'LI11610', '2025-04-11 14:43:12', 'đã nhận đơn', 820000.00, NULL, '2025-04-11 07:43:12', '2025-04-11 07:43:12'),
(16, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'Q7F8774', '2025-04-11 14:48:42', 'đã nhận đơn', 120000.00, NULL, '2025-04-11 07:48:42', '2025-04-11 07:48:42'),
(17, 'PHATDUC', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'OUL2968', '2025-04-11 14:52:26', 'đã nhận đơn', 330000.00, NULL, '2025-04-11 07:52:26', '2025-04-11 07:52:26'),
(18, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, '6BN1055', '2025-04-11 14:54:23', 'đã nhận đơn', 180000.00, NULL, '2025-04-11 07:54:23', '2025-04-11 07:54:23'),
(19, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'KCO3283', '2025-04-11 14:55:23', 'đã nhận đơn', 280000.00, NULL, '2025-04-11 07:55:23', '2025-04-11 07:55:23'),
(20, 'Nguyễn Thị Thu Thảo', 'nam', 'thuthaohgdn@gmail.com', '05 Hòa Minh 14', '0905652157', 'COD', 3, 'CIX1144', '2025-04-11 15:27:46', 'giao hàng thành công', 520000.00, NULL, '2025-04-11 08:27:46', '2025-04-11 08:29:20'),
(21, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 2, '5XW3879', '2025-04-11 15:38:37', 'giao hàng thành công', 200000.00, NULL, '2025-04-11 08:38:37', '2025-04-11 09:01:09'),
(22, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'COD', 1, 'MQT5557', '2025-04-12 08:56:10', 'giao hàng thành công', 350000.00, NULL, '2025-04-12 01:56:10', '2025-04-12 01:56:49'),
(23, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'ATM', 10, 'FHZ1076', '2025-04-15 14:56:27', 'đã nhận đơn', 1600000.00, NULL, '2025-04-15 07:56:27', '2025-04-15 07:56:27'),
(24, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'Chuyển Khoản', 10, 'LNP6303', '2025-04-15 14:59:42', 'giao hàng thành công', 1600000.00, NULL, '2025-04-15 07:59:42', '2025-04-15 09:07:05'),
(25, 'Châu Đức Phát', 'nam', 'phatchau16520@gmail.com', '05 Hòa Minh 14', '0935370171', 'Chuyển Khoản', 2, 'IWN6092', '2025-04-15 16:27:10', 'đơn hàng bị hủy', 300000.00, NULL, '2025-04-15 09:27:10', '2025-04-15 09:40:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `top` tinyint(1) NOT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `top`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Crepa Trà xanh', 5, 'Bánh Crepa Trà Xanh – Sự kết hợp tinh tế giữa hương vị truyền thống và hiện đại. Với lớp vỏ bánh mỏng, mềm mịn, cuộn cùng kem tươi béo ngậy và lớp sốt trà xanh thơm lừng, chiếc bánh này không chỉ đẹp mắt mà còn mang đến trải nghiệm vị giác độc đáo. Vị trà xanh nhẹ nhàng giúp cân bằng vị ngọt, rất thích hợp để thưởng thức cùng trà nóng hoặc cà phê. Lựa chọn hoàn hảo cho những ai yêu thích hương vị Nhật Bản thanh tao và tinh tế.', 1000000000, 100000, '1430967449-pancake-sau-rieng-6.jpg', 'hộp', 0, 1, '2016-10-26 03:00:16', '2025-04-09 08:50:44'),
(2, 'Bánh Crepe Chocolate', 6, 'Bánh Crepe Chocolate – Mềm mịn, ngọt ngào và quyến rũ. Lớp vỏ bánh crepe mỏng nhẹ, kết hợp hoàn hảo với lớp kem chocolate thơm lừng bên trong, tạo nên hương vị đậm đà nhưng không ngấy. Thêm chút sốt chocolate phủ bên ngoài và vụn socola giòn tan, chiếc bánh này là lựa chọn lý tưởng cho những tín đồ yêu thích socola. Thưởng thức một miếng là đắm chìm trong sự ngọt ngào đầy mê hoặc.', 180000, 160000, 'crepe-chocolate.jpg', 'hộp', 1, 1, '2016-10-26 03:00:16', '2025-04-09 08:50:57'),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, 'Bánh Crepe Sầu Riêng - Chuối – Sự kết hợp độc đáo dành cho tín đồ trái cây. Lớp vỏ bánh mỏng nhẹ ôm trọn phần nhân gồm sầu riêng thơm béo đặc trưng hòa quyện cùng chuối chín mềm ngọt, tạo nên hương vị đậm đà nhưng vô cùng hài hòa. Mỗi miếng bánh là một sự bùng nổ vị giác, vừa thơm lừng vừa ngọt dịu, thích hợp dùng tráng miệng hoặc làm món quà tặng tinh tế cho người thân yêu.', 150000, 120000, 'crepe-chuoi.jpg', 'hộp', 0, 0, '2016-10-26 03:00:16', '2025-04-09 08:50:22'),
(4, 'Bánh Crepe Đào', 5, 'Bánh Crepe Đào – Tươi mát và dịu ngọt như một buổi chiều mùa hè. Lớp bánh crepe mỏng mềm, cuộn tròn phần nhân kem tươi béo nhẹ kết hợp cùng những miếng đào chín mọng, mang đến cảm giác vừa ngọt ngào vừa thanh mát. Hương thơm dịu nhẹ của đào hòa quyện với lớp kem mịn màng khiến chiếc bánh trở nên cuốn hút ngay từ lần đầu thưởng thức. Thích hợp cho cả những ai yêu vị ngọt nhẹ và trái cây tươi.', 160000, 0, 'crepe-dao.jpg', 'hộp', 0, 0, '2016-10-26 03:00:16', '2025-04-09 08:52:01'),
(5, 'Bánh Crepe Dâu', 5, 'Bánh Crepe Dâu – Ngọt ngào, tươi mới và đầy cuốn hút. Với lớp bánh crepe mỏng mịn bao bọc phần nhân kem tươi béo nhẹ cùng những lát dâu tây chín mọng, chiếc bánh mang đến hương vị hài hòa giữa vị ngọt và chua nhẹ đặc trưng. Mỗi miếng bánh là một trải nghiệm vị giác thú vị, vừa nhẹ nhàng vừa lãng mạn – hoàn hảo cho những buổi trà chiều hay món quà ngọt ngào dành tặng người thương.', 160000, 0, 'crepedau.jpg', 'hộp', 0, 0, '2016-10-26 03:00:16', '2025-04-09 08:52:28'),
(6, 'Bánh Crepe Pháp', 5, 'Bánh Crepe Pháp – Tinh tế, cổ điển và chuẩn vị Âu. Được làm từ công thức truyền thống của Pháp, bánh crepe có lớp vỏ mỏng nhẹ, mềm mịn, thơm bơ sữa đặc trưng. Có thể dùng kèm với đường bột, mật ong, trái cây tươi hoặc sốt chocolate tùy khẩu vị. Đây là món bánh đơn giản nhưng đầy cuốn hút, thích hợp cho bữa sáng nhẹ nhàng, bữa xế thanh lịch hoặc món tráng miệng đậm chất nghệ thuật Pháp.', 200000, 180000, 'crepe-phap.jpg', 'hộp', 1, 0, '2016-10-26 03:00:16', '2025-04-09 08:53:05'),
(7, 'Bánh Crepe Táo', 5, 'Bánh Crepe Táo – Thơm lừng, ngọt dịu và ấm áp như mùa thu. Lớp bánh crepe mỏng mịn cuộn cùng nhân táo xào bơ đường, rắc nhẹ chút quế thơm, tạo nên hương vị hài hòa giữa vị ngọt thanh của táo và độ béo nhẹ từ kem tươi. Mỗi miếng bánh mang lại cảm giác ấm áp, dễ chịu, rất thích hợp để thưởng thức cùng một tách trà nóng trong những buổi chiều nhẹ nhàng.', 160000, 0, 'crepe-tao.jpg', 'hộp', 1, 1, '2016-10-26 03:00:16', '2025-04-09 08:53:38'),
(8, 'Bánh Crepe Trà xanh', 5, 'Bánh Crepe Trà Xanh – Thanh mát, nhẹ nhàng và đầy tinh tế. Lớp bánh crepe mỏng mịn mang sắc xanh dịu mắt, cuộn cùng phần nhân kem tươi béo nhẹ hòa quyện với hương trà xanh tự nhiên. Vị đắng nhẹ đặc trưng của matcha giúp cân bằng vị ngọt, mang đến trải nghiệm thưởng thức thanh thoát, dễ chịu. Thích hợp cho những ai yêu thích hương vị Nhật Bản và cần một món tráng miệng nhẹ nhàng, không quá ngọt.', 160000, 150000, 'crepe-traxanh.jpg', 'hộp', 0, 0, '2016-10-26 03:00:16', '2025-04-09 08:54:52'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, 'Bánh Crepe Sầu Riêng & Dứa – Mới lạ, độc đáo và đầy cuốn hút. Sự kết hợp giữa sầu riêng béo ngậy và dứa chua ngọt thanh mát tạo nên một hương vị hài hòa, cân bằng giữa độ đậm đà và tươi mới. Lớp vỏ crepe mềm mịn ôm trọn phần nhân trái cây thơm lừng, mang đến trải nghiệm vị giác khác biệt nhưng vô cùng hấp dẫn. Một lựa chọn hoàn hảo cho những ai yêu thích sự phá cách và sáng tạo trong ẩm thực.', 160000, 150000, 'saurieng-dua.jpg', 'hộp', 1, 0, '2016-10-26 03:00:16', '2025-04-09 08:55:19'),
(11, 'Bánh Gato Trái cây Việt Quất', 3, 'Bánh Gato Trái Cây Việt Quất – Ngọt dịu, mềm mịn và đầy tinh tế. Lớp bánh bông lan mềm xốp xen kẽ kem tươi béo nhẹ, điểm xuyết bởi những quả việt quất mọng nước mang vị chua ngọt đặc trưng, tạo nên sự cân bằng hoàn hảo. Hương thơm nhẹ nhàng và sắc tím tự nhiên từ việt quất khiến chiếc bánh không chỉ ngon miệng mà còn vô cùng đẹp mắt. Thích hợp cho các buổi tiệc sinh nhật, trà chiều hay làm món quà ngọt ngào dành tặng người thân yêu.', 250000, 0, '544bc48782741.png', 'cái', 0, 0, '2016-10-12 02:00:00', '2025-04-09 08:55:56'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, 'Bánh Sinh Nhật Rau Câu Trái Cây – Mát lạnh, tươi ngon và đẹp mắt. Được làm từ rau câu dẻo dai kết hợp cùng các loại trái cây tươi như dâu, kiwi, xoài, nho... tạo nên một chiếc bánh vừa hấp dẫn về hương vị, vừa rực rỡ sắc màu. Không béo ngậy như kem bơ truyền thống, bánh rau câu trái cây là lựa chọn lý tưởng cho những ai yêu thích sự thanh mát, nhẹ nhàng và tốt cho sức khỏe. Phù hợp cho các buổi tiệc sinh nhật mùa hè hoặc người ăn kiêng ngọt.', 200000, 180000, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 0, 0, '2016-10-12 02:00:00', '2025-04-09 08:56:22'),
(13, 'Bánh kem Chocolate Dâu', 3, 'Bánh Kem Chocolate Dâu – Sự hòa quyện ngọt ngào và quyến rũ. Lớp bánh bông lan mềm xốp được phủ bởi kem chocolate đậm đà, kết hợp cùng dâu tây tươi mọng tạo nên hương vị cân bằng hoàn hảo giữa vị ngọt, đắng nhẹ và chua thanh. Bánh không chỉ hấp dẫn về vị giác mà còn nổi bật với vẻ ngoài sang trọng, tinh tế. Lựa chọn lý tưởng cho các dịp sinh nhật, kỷ niệm hay đơn giản là món quà ngọt ngào dành tặng người bạn yêu thương.', 300000, 280000, 'banh kem sinh nhat.jpg', 'cái', 0, 1, '2016-10-12 02:00:00', '2025-04-09 08:56:51'),
(14, 'Bánh kem Dâu III', 3, 'Bánh Kem Dâu III – Ngọt ngào, tinh tế và nổi bật với thiết kế 3 tầng hoặc 3 lớp kem dâu ấn tượng (tùy theo ý tưởng của bạn). Bánh được làm từ lớp bông lan mềm mịn, xen kẽ kem tươi vị dâu nhẹ nhàng và những lát dâu tây tươi ngọt ngào. Lớp ngoài phủ kem hồng nhẹ trang trí bằng dâu tươi, mang đến vẻ ngoài lãng mạn, phù hợp cho tiệc sinh nhật, kỷ niệm hoặc những buổi tiệc đặc biệt. Hương vị thanh mát, dễ ăn và rất được lòng người yêu thích trái cây.', 300000, 280000, 'Banh-kem (6).jpg', 'cái', 0, 0, '2016-10-12 02:00:00', '2025-04-09 08:57:21'),
(15, 'Bánh kem Dâu I', 3, 'Bánh Kem Dâu I – Đơn giản mà tinh tế, ngọt ngào và dễ thương. Với lớp bánh bông lan mềm xốp, xen kẽ kem tươi mịn màng vị dâu nhẹ nhàng, cùng topping là những quả dâu tây tươi mọng đỏ au, chiếc bánh mang đến cảm giác dịu nhẹ và tươi mát ngay từ miếng đầu tiên. Thiết kế tối giản nhưng vẫn nổi bật, phù hợp cho tiệc sinh nhật nhỏ, buổi gặp mặt thân mật hoặc làm quà tặng ngọt ngào cho người đặc biệt.', 350000, 320000, 'banhkem-dau.jpg', 'cái', 0, 1, '2016-10-12 02:00:00', '2025-04-09 08:57:53'),
(16, 'Bánh trái cây II', 3, 'Bánh Trái Cây II – Rực rỡ sắc màu, tươi ngon tự nhiên và đầy sức sống. Lớp bánh bông lan mềm mịn kết hợp cùng kem tươi nhẹ béo, được phủ bên trên bằng các loại trái cây tươi như kiwi, dâu tây, cam, nho, và xoài. Mỗi miếng bánh là sự hài hòa giữa vị ngọt nhẹ, chua thanh và độ tươi mát từ thiên nhiên. Thiết kế trang nhã, hiện đại – thích hợp cho các bữa tiệc sinh nhật, kỷ niệm hoặc buổi tiệc trà chiều thanh lịch.', 150000, 120000, 'banhtraicay.jpg', 'hộp', 0, 0, '2016-10-12 02:00:00', '2025-04-09 08:58:26'),
(17, 'Apple Cake', 3, 'Apple Cake – Thơm lừng, ấm áp và đậm chất homemade. Chiếc bánh mềm ẩm được làm từ những lát táo tươi ngọt dịu, hòa quyện cùng quế thơm và bột bánh xốp mịn, mang đến hương vị cổ điển khó quên. Bánh có thể dùng kèm cùng trà nóng hoặc cà phê, rất thích hợp cho những buổi sáng nhẹ nhàng hoặc các buổi tụ họp gia đình. Vị ngọt thanh của táo cùng hương quế thoang thoảng sẽ khiến bạn muốn thưởng thức thêm miếng nữa.', 250000, 240000, 'Fruit-Cake_7979.jpg', 'cái', 0, 0, '2016-10-12 02:00:00', '2025-04-09 09:21:22'),
(18, 'Bánh ngọt nhân cream táo', 2, 'Bánh Ngọt Nhân Cream Táo – Mềm mịn, thơm dịu và đầy quyến rũ. Lớp vỏ bánh vàng ươm, mềm nhẹ ôm trọn phần nhân kem táo mát lạnh, béo nhẹ với hương vị thanh ngọt tự nhiên. Táo được nấu mềm vừa phải, quyện cùng kem sữa tạo nên cảm giác tan chảy trong miệng, rất thích hợp để thưởng thức cùng trà chiều hoặc dùng làm món tráng miệng nhẹ nhàng sau bữa ăn. Mỗi chiếc bánh là một chút ngọt ngào và ấm áp cho ngày thêm trọn vẹn.', 180000, 0, '20131108144733.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, 'Bánh Chocolate Trái Cây – Ngọt ngào, đa dạng và đầy bất ngờ. Lớp bánh bông lan mềm mịn được phủ một lớp chocolate đậm đà, tạo nên sự kết hợp hoàn hảo với các loại trái cây tươi như dâu tây, chuối, và kiwi. Hương vị ngọt ngào của chocolate hòa quyện với độ chua nhẹ và tươi mát của trái cây, mang đến một trải nghiệm vị giác thú vị và đầy sức sống. Bánh thích hợp cho mọi dịp, từ những bữa tiệc sinh nhật đến những buổi tụ họp thân mật, mang đến sự hoàn hảo cho mọi khoảnh khắc.', 150000, 0, 'Fruit-Cake_7976.jpg', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, 'Bánh Chocolate Trái Cây II – Một sự kết hợp hoàn hảo giữa vị ngọt ngào của chocolate và sự tươi mát, chua ngọt của các loại trái cây. Lớp bánh mềm mại được bao phủ bởi lớp kem chocolate mịn màng, kết hợp với trái cây tươi như dâu, kiwi, chuối, tạo nên sự pha trộn tuyệt vời giữa các hương vị. Mỗi miếng bánh là một trải nghiệm đầy lôi cuốn và mới lạ, thích hợp cho những dịp đặc biệt hoặc những buổi tiệc ngọt ngào.', 150000, 0, 'Fruit-Cake_7981.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, 'Peach Cake – Mát lành, ngọt ngào và đầy tươi mới. Lớp bánh mềm mịn, bông xốp kết hợp với những miếng đào tươi ngon, tạo nên một sự hòa quyện hoàn hảo giữa vị ngọt của đào và độ mềm mại của kem tươi. Hương vị nhẹ nhàng, thanh thoát của đào khiến chiếc bánh trở thành lựa chọn lý tưởng cho các bữa tiệc mùa hè, những dịp sinh nhật hay buổi trà chiều thư giãn. Sự kết hợp hoàn hảo giữa trái cây tươi và bánh bông lan sẽ mang đến cho bạn trải nghiệm ngọt ngào và dễ chịu.', 160000, 150000, 'Peach-Cake_3294.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, 'Bánh Bông Lan Trứng Muối I – Mềm mịn, thơm ngậy và đầy hấp dẫn. Lớp bánh bông lan xốp nhẹ, kết hợp với nhân trứng muối béo ngậy, mang đến một sự kết hợp độc đáo giữa vị ngọt nhẹ của bánh và vị mặn, bùi của trứng muối. Mỗi miếng bánh là một trải nghiệm thú vị, vừa thanh nhẹ, vừa đậm đà, rất thích hợp cho những ai yêu thích sự mới lạ trong ẩm thực. Bánh này rất phù hợp để thưởng thức cùng trà, trong các buổi tiệc nhẹ hoặc làm món tráng miệng đặc biệt cho gia đình và bạn bè.', 160000, 150000, 'banhbonglantrung.jpg', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Bánh bông lan trứng muối II', 1, 'Bánh Bông Lan Trứng Muối II – Đậm đà, béo ngậy và đầy lôi cuốn. Lớp bánh bông lan mềm mại, xốp nhẹ kết hợp cùng phần trứng muối thơm béo, tạo nên sự hòa quyện hoàn hảo giữa vị ngọt nhẹ của bánh và vị mặn mà của trứng muối. Bánh được trang trí tinh tế, mang đến hương vị đặc trưng khó quên, thích hợp cho những dịp tiệc tùng, gặp gỡ bạn bè hoặc làm món tráng miệng sang trọng cho bữa ăn gia đình. Đây là lựa chọn lý tưởng cho những ai yêu thích sự kết hợp mới mẻ giữa vị ngọt và mặn trong ẩm thực.', 180000, 0, 'banhbonglantrungmuoi.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Bánh French', 1, 'Bánh French – Tinh tế, sang trọng và đầy lôi cuốn. Lớp bánh mềm mịn, xốp nhẹ kết hợp với lớp kem tươi mượt mà, tạo nên một hương vị nhẹ nhàng nhưng vô cùng cuốn hút. Đặc trưng của bánh French là sự cân bằng hoàn hảo giữa vị ngọt thanh và độ béo của kem, mang đến một trải nghiệm tuyệt vời cho những ai yêu thích sự thanh thoát trong ẩm thực. Phù hợp cho các buổi tiệc sang trọng, những dịp kỷ niệm hoặc là món quà ngọt ngào dành tặng người thân yêu.', 180000, 0, 'banh-man-thu-vi-nhat-1.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, 'Bánh Mì Australia – Mềm mịn, thơm ngon và đầy hấp dẫn. Lớp vỏ bánh giòn nhẹ bên ngoài, bên trong mềm mịn, có kết cấu xốp nhẹ, tạo nên sự hòa quyện hoàn hảo giữa hương thơm tự nhiên của bột mì và sự tươi mới của các nguyên liệu. Bánh mì Australia mang đến cảm giác ấm áp và dễ chịu khi thưởng thức, đặc biệt là khi ăn kèm với bơ, mứt hoặc phô mai. Đây là sự lựa chọn lý tưởng cho bữa sáng, bữa xế hoặc khi bạn muốn thưởng thức một món ăn nhẹ nhưng đầy đủ năng lượng.', 80000, 70000, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, 'Bánh Mặn Thập Cẩm – Đầy đặn, thơm ngon và vô cùng phong phú. Lớp vỏ bánh giòn rụm bên ngoài, bên trong chứa đầy sự kết hợp hoàn hảo giữa các loại nhân mặn như thịt, trứng, rau củ và gia vị đậm đà, mang đến hương vị đặc sắc và đầy hấp dẫn. Mỗi miếng bánh là sự hòa quyện giữa sự mềm mại của nhân và độ giòn của vỏ bánh, tạo nên trải nghiệm ẩm thực tuyệt vời. Thích hợp cho các bữa ăn nhẹ, bữa xế hay những buổi tiệc nhỏ, bánh mặn thập cẩm sẽ là sự lựa chọn hoàn hảo cho những ai yêu thích hương vị đa dạng và phong phú.', 50000, 0, 'Fruit-Cake.png', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, 'Bánh Muffins Trứng – Ngọt ngào, mềm mịn và giàu hương vị. Lớp bánh muffin xốp nhẹ, vàng ruộm, với hương thơm nhẹ nhàng từ trứng tươi, tạo nên một món ăn sáng hoàn hảo hoặc bữa xế thơm ngon. Những chiếc muffin này có độ ngọt vừa phải, kết hợp với sự béo ngậy của trứng, mang đến cảm giác dễ chịu và đầy đủ năng lượng. Bánh rất thích hợp khi ăn kèm cùng cà phê hoặc trà, là lựa chọn lý tưởng cho những ai yêu thích sự nhẹ nhàng và tinh tế trong mỗi miếng bánh.', 100000, 80000, 'maxresdefault.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, 'Bánh Scone Peach Cake – Mềm mại, thơm mát và đầy hấp dẫn. Lớp bánh scone bông xốp, kết hợp với hương vị ngọt ngào của đào tươi, tạo nên một sự hòa quyện tuyệt vời giữa độ mềm mại của bánh và sự tươi mát của trái cây. Mỗi miếng bánh là một trải nghiệm nhẹ nhàng và dễ chịu, mang đến cảm giác như đang thưởng thức một món bánh hoàn hảo cho buổi sáng hoặc bữa trà chiều. Với hương đào dịu dàng, chiếc bánh này sẽ làm bạn xiêu lòng ngay từ miếng đầu tiên.', 120000, 0, 'Peach-Cake_3300.jpg', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, 'Bánh Mì Loaf I – Mềm mại, thơm ngon và đậm đà hương vị. Lớp vỏ bánh mì giòn nhẹ, trong khi phần ruột bánh bên trong xốp mịn, mềm mượt, tạo nên một sự kết hợp hoàn hảo cho những bữa ăn sáng đầy năng lượng hoặc bữa xế nhẹ nhàng. Bánh mì Loaf I được làm từ nguyên liệu tươi ngon, có độ ẩm vừa phải, mang đến cảm giác dễ chịu và đầy đủ dưỡng chất. Thích hợp khi dùng kèm với bơ, mứt, phô mai hoặc các món ăn mặn, là lựa chọn tuyệt vời cho mọi gia đình.', 100000, 0, 'sli12.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, 'Bánh Kem Chocolate Dâu I – Ngọt ngào, thơm lừng và đầy quyến rũ. Lớp bánh chocolate đậm đà, mềm mịn được phủ lớp kem dâu tươi mát, mang đến sự kết hợp hoàn hảo giữa hương vị đắng ngọt của chocolate và độ chua nhẹ, ngọt ngào của dâu. Mỗi miếng bánh là một sự hòa quyện tuyệt vời, tạo nên trải nghiệm vị giác khó quên. Bánh kem Chocolate Dâu I thích hợp cho những dịp đặc biệt như sinh nhật, tiệc tùng, hoặc làm món tráng miệng cho các buổi họp mặt gia đình, bạn bè. Hương vị phong phú và hình thức trang nhã sẽ làm say lòng mọi thực khách.', 380000, 350000, 'sli12.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, 'Bánh Kem Trái Cây I – Tươi mát, ngọt ngào và đầy màu sắc. Lớp bánh bông lan mềm mại được phủ một lớp kem tươi mịn màng, kết hợp với các loại trái cây tươi ngon như dâu, kiwi, nho, và cam, tạo nên một sự hòa quyện hoàn hảo giữa vị ngọt của kem và hương thơm tự nhiên của trái cây. Bánh Kem Trái Cây I là lựa chọn lý tưởng cho những dịp sinh nhật, tiệc tùng hoặc những buổi gặp mặt bạn bè, mang đến một không gian đầy màu sắc và hương vị tươi mới. Đặc biệt, sự kết hợp giữa bánh mềm và trái cây tươi sẽ làm hài lòng ngay cả những thực khách khó tính nhất.', 380000, 350000, 'Fruit-Cake.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, 'Bánh Kem Trái Cây II – Tươi ngon, ngọt ngào và đầy sắc màu. Lớp bánh bông lan mềm mịn, hòa quyện hoàn hảo với lớp kem tươi ngọt ngào, tạo nên một sự kết hợp tuyệt vời với các loại trái cây tươi ngon như xoài, dứa, nho, và kiwi. Sự tươi mới của trái cây cùng với độ mềm mịn của bánh và kem sẽ mang đến cho bạn một trải nghiệm ẩm thực tuyệt vời, nhẹ nhàng nhưng đầy đủ hương vị. Bánh Kem Trái Cây II là lựa chọn lý tưởng cho các dịp sinh nhật, tiệc kỷ niệm hay những buổi gặp gỡ gia đình và bạn bè, làm cho không gian thêm phần rực rỡ và ngọt ngào.', 380000, 350000, 'Fruit-Cake_7971.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, 'Bánh Kem Doraemon – Đầy màu sắc, ngọt ngào và vui nhộn, chiếc bánh này chắc chắn sẽ làm bừng sáng không gian tiệc của bạn! Với hình dáng dễ thương của nhân vật Doraemon nổi tiếng, lớp kem tươi mịn màng bao phủ trên lớp bánh bông lan mềm mại, tạo nên một món bánh vừa bắt mắt, vừa ngon miệng. Với hương vị nhẹ nhàng của bánh và kem, Bánh Kem Doraemon sẽ là món quà ngọt ngào và đáng yêu cho các buổi sinh nhật, tiệc mừng, hay những dịp đặc biệt dành cho các em nhỏ. Món bánh này không chỉ khiến các bạn nhỏ thích thú mà còn làm hài lòng cả những vị khách yêu thích sự dễ thương và ngọt ngào trong từng chi tiết.', 280000, 250000, 'p1392962167_banh74.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, 'Bánh Kem Caramen Pudding – Ngọt ngào, mềm mịn và đầy quyến rũ. Lớp bánh bông lan mềm mại, kết hợp hoàn hảo với lớp kem caramen mịn màng và pudding thơm béo, mang đến một trải nghiệm ẩm thực đầy hấp dẫn. Hương vị ngọt nhẹ của caramen hòa quyện với độ mềm mượt của pudding, tạo nên một món tráng miệng đầy tinh tế và dễ chịu. Bánh Kem Caramen Pudding thích hợp cho các bữa tiệc, sinh nhật, hoặc làm món tráng miệng đặc biệt cho gia đình và bạn bè, làm say lòng mọi thực khách ngay từ miếng đầu tiên.', 280000, 0, 'Caramen-pudding636099031482099583.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, 'Bánh Kem Chocolate Fruit – Đậm đà, ngọt ngào và đầy hương vị. Lớp bánh chocolate mềm mịn được phủ lớp kem tươi mượt mà, kết hợp với các loại trái cây tươi ngon như dâu, kiwi, chuối và nho, tạo nên sự hòa quyện tuyệt vời giữa vị ngọt của kem, đắng nhẹ của chocolate và sự tươi mát của trái cây. Mỗi miếng bánh không chỉ mang đến hương vị phong phú mà còn có màu sắc bắt mắt, thích hợp cho các dịp sinh nhật, tiệc tùng hoặc những buổi gặp gỡ gia đình, bạn bè. Bánh Kem Chocolate Fruit sẽ là món tráng miệng hoàn hảo, khiến bất kỳ ai cũng phải yêu thích ngay từ lần đầu thưởng thức.', 320000, 300000, 'chocolate-fruit636098975917921990.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, 'Bánh Kem Coffee Chocolate GH6 – Một sự kết hợp hoàn hảo giữa hai hương vị huyền thoại: cà phê và chocolate. Lớp bánh chocolate mềm mịn được bao phủ bởi lớp kem cà phê tươi mát, đậm đà nhưng không quá ngọt, mang đến cảm giác thơm ngon khó cưỡng. Vị đắng nhẹ của cà phê kết hợp với sự ngọt ngào, đậm đà của chocolate tạo nên một món bánh tuyệt vời cho những ai yêu thích hương vị cà phê. Bánh Kem Coffee Chocolate GH6 là lựa chọn lý tưởng cho các buổi tiệc sinh nhật, họp mặt gia đình, hay những dịp đặc biệt, mang đến một trải nghiệm mới lạ và ấn tượng cho mọi thực khách.', 320000, 300000, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, 'Bánh Kem Mango Mousse – Tươi mát, ngọt ngào và đầy lôi cuốn. Lớp mousse xoài mềm mịn, nhẹ nhàng tan chảy trong miệng, kết hợp hoàn hảo với lớp kem tươi ngọt dịu. Hương vị thơm ngon của xoài tươi hòa quyện cùng sự béo ngậy của kem tạo nên một món bánh đầy tinh tế và dễ chịu. Với màu sắc vàng tươi bắt mắt, Bánh Kem Mango Mousse là sự lựa chọn lý tưởng cho các dịp sinh nhật, tiệc tùng hoặc những buổi gặp gỡ bạn bè, mang đến sự mới lạ và tươi mới cho không gian tiệc. Một sự kết hợp hoàn hảo giữa hương vị tươi mát và sự mềm mịn trong từng lớp bánh.', 320000, 300000, 'mango-mousse-cake.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, 'Bánh Kem Matcha Mousse – Đậm đà, thanh nhẹ và đầy quyến rũ. Lớp mousse matcha mềm mịn, thơm lừng vị trà xanh đặc trưng, kết hợp hoàn hảo với lớp kem tươi ngọt dịu, tạo nên một món bánh vừa thơm ngon lại vừa thanh mát. Hương vị matcha đắng nhẹ hòa quyện với độ béo ngậy của kem, mang đến một trải nghiệm ẩm thực đầy tinh tế và dễ chịu. Bánh Kem Matcha Mousse là lựa chọn lý tưởng cho những ai yêu thích sự nhẹ nhàng, thanh khiết trong từng miếng bánh. Món bánh này rất thích hợp cho các dịp sinh nhật, tiệc tùng hoặc các buổi trà chiều, mang đến cảm giác thư giãn và dễ chịu.', 100000000, 10000000, 'MATCHA-MOUSSE.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, 'Bánh Kem Flower Fruit – Tươi mới, ngọt ngào và đầy màu sắc. Lớp bánh mềm mại được phủ một lớp kem tươi mịn màng, kết hợp với các loại trái cây tươi ngon như dâu, kiwi, xoài và nho, tạo nên một sự kết hợp tuyệt vời giữa vị ngọt ngào của kem và hương vị tươi mát của trái cây. Điểm nhấn đặc biệt là các chi tiết trang trí hoa tươi hoặc hoa ăn được, làm cho chiếc bánh thêm phần đẹp mắt và sang trọng. Bánh Kem Flower Fruit là lựa chọn lý tưởng cho các dịp sinh nhật, tiệc cưới, hoặc những buổi họp mặt gia đình, bạn bè, mang đến một không gian tiệc ấn tượng và đầy sắc màu.', 350000, 330000, 'flower-fruits636102461981788938.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, 'Bánh Kem Strawberry Delight – Ngọt ngào, tươi mát và đầy hấp dẫn. Lớp bánh mềm mịn được phủ lớp kem tươi mượt mà, kết hợp với những quả dâu tươi ngon, tạo nên sự hòa quyện tuyệt vời giữa vị ngọt ngào của kem và hương thơm tự nhiên của dâu. Mỗi miếng bánh là một trải nghiệm vị giác thú vị, mang đến cảm giác thanh mát và dễ chịu. Bánh Kem Strawberry Delight là lựa chọn hoàn hảo cho các dịp sinh nhật, tiệc tùng hoặc những buổi gặp mặt gia đình và bạn bè. Sự kết hợp giữa hương vị ngọt ngào và màu sắc tươi sáng sẽ làm cho mọi không gian trở nên rực rỡ và tràn đầy niềm vui.', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, 'Bánh Kem Raspberry Delight – Tươi mát, ngọt ngào và đầy quyến rũ. Lớp bánh mềm mịn được bao phủ bởi lớp kem tươi nhẹ nhàng, kết hợp với những quả mâm xôi (raspberry) tươi ngon, mang đến một sự hòa quyện tuyệt vời giữa vị ngọt dịu của kem và vị chua thanh của mâm xôi. Mỗi miếng bánh là một trải nghiệm thú vị, dễ chịu và đầy sức sống. Bánh Kem Raspberry Delight là lựa chọn hoàn hảo cho các dịp sinh nhật, tiệc tùng hoặc những buổi gặp gỡ gia đình, bạn bè, mang đến một không gian tiệc đầy sắc màu và hương vị mới mẻ. Sự kết hợp giữa hương vị ngọt ngào và màu sắc tươi sáng của mâm xôi sẽ làm say lòng mọi thực khách.', 350000, 330000, 'raspberry.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Beefy Pizza – Một sự kết hợp hoàn hảo giữa lớp đế pizza giòn thơm, sốt cà chua đậm đà và các loại thịt bò tươi ngon, được chế biến kỹ lưỡng. Những miếng thịt bò thượng hạng được xào mềm, kết hợp với phô mai tan chảy và gia vị đặc trưng, mang đến một hương vị đậm đà, thơm ngon, làm hài lòng cả những thực khách khó tính. Beefy Pizza là lựa chọn tuyệt vời cho những ai yêu thích sự đậm đà, nhiều thịt và phong phú hương vị. Món pizza này thích hợp cho các bữa ăn gia đình, bạn bè tụ tập, hoặc những dịp muốn thưởng thức một món ăn vừa ngon miệng vừa đầy đủ dinh dưỡng.', 150000, 130000, '40819_food_pizza.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Hawaii Pizza – Một sự kết hợp tuyệt vời giữa vị mặn mà của ham, ngọt ngào của dứa tươi và lớp phô mai tan chảy, tạo nên một món pizza đặc biệt mang hương vị nhiệt đới. Đế pizza giòn nhẹ, phủ sốt cà chua đậm đà, rồi đến lớp phô mai mịn màng và các lát ham tươi ngon, kết hợp với dứa ngọt thanh, tạo ra một sự kết hợp hoàn hảo giữa vị mặn và ngọt. Hawaii Pizza là lựa chọn lý tưởng cho những ai yêu thích sự mới mẻ và khác biệt trong mỗi miếng pizza. Món pizza này sẽ làm hài lòng mọi thực khách, từ những buổi tụ họp bạn bè đến những bữa ăn gia đình ấm cúng.', 120000, 0, 'hawaiian paradise_large-900x900.jpg', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Smoke Chicken Pizza – Một món pizza thơm ngon, đậm đà với lớp đế giòn xốp, phủ lên lớp sốt cà chua đậm vị, phô mai tan chảy và thịt gà xông khói thơm lừng. Thịt gà xông khói được chế biến kỹ càng, giữ nguyên hương vị đặc trưng và kết hợp hoàn hảo với các gia vị đậm đà, mang đến một hương vị độc đáo, đầy quyến rũ. Mỗi miếng pizza là sự kết hợp tuyệt vời giữa vị mặn mà của gà xông khói và hương thơm của phô mai, tạo nên một trải nghiệm ẩm thực tuyệt vời. Smoke Chicken Pizza là lựa chọn lý tưởng cho những ai yêu thích sự mới mẻ và đậm đà trong mỗi miếng pizza, phù hợp cho các bữa ăn gia đình, bạn bè hoặc những dịp đặc biệt.', 120000, 0, 'chicken black pepper_large-900x900.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Sausage Pizza – Một món pizza đầy đậm đà và hấp dẫn với lớp đế giòn thơm, phủ lên sốt cà chua đậm vị và lớp phô mai tan chảy mịn màng. Những miếng xúc xích ngon lành, được chế biến tỉ mỉ, tạo nên sự kết hợp hoàn hảo giữa vị mặn của xúc xích và sự béo ngậy của phô mai. Mỗi miếng pizza mang đến hương vị phong phú, hấp dẫn, kết hợp giữa vị thơm của gia vị và độ dai ngon của xúc xích. Sausage Pizza là lựa chọn lý tưởng cho những ai yêu thích hương vị đậm đà, dễ ăn và ngon miệng, thích hợp cho những buổi tụ họp bạn bè, gia đình hay các bữa ăn đặc biệt.', 120000, 0, 'pizza-miami.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Ocean Pizza – Một món pizza hải sản thơm ngon, tươi mát, với lớp đế giòn xốp, phủ sốt cà chua đậm đà và phô mai tan chảy mịn màng. Thịt hải sản tươi ngon, bao gồm tôm, mực và cá hồi, được chế biến nhẹ nhàng để giữ nguyên hương vị tươi mới của biển cả. Sự kết hợp hoàn hảo giữa hương vị mặn mà của hải sản và sự béo ngậy của phô mai tạo nên một món ăn đặc biệt, thơm ngon và lôi cuốn. Ocean Pizza là lựa chọn lý tưởng cho những tín đồ yêu thích hải sản, thích hợp cho các bữa tiệc hải sản, tụ họp bạn bè hay các bữa ăn gia đình, mang đến sự mới mẻ và tươi mát cho mọi thực khách.', 120000, 0, 'seafood curry_large-900x900.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'All Meaty Pizza – Một món pizza dành cho những tín đồ của thịt, đầy đậm đà và thỏa mãn khẩu vị. Lớp đế pizza giòn thơm được phủ lên một lớp sốt cà chua đậm đà, phô mai tan chảy mịn màng và các loại thịt thượng hạng như xúc xích, thịt bò, thịt heo và thịt gà xông khói, tất cả hòa quyện cùng nhau trong một sự kết hợp hoàn hảo. Vị mặn mà và đậm đà của thịt, kết hợp với độ béo ngậy của phô mai, mang đến một món ăn phong phú và hấp dẫn. All Meaty Pizza là lựa chọn lý tưởng cho những ai yêu thích sự thịnh soạn, đầy đủ và ngon miệng trong từng miếng bánh. Món pizza này rất thích hợp cho các buổi tụ họp bạn bè, gia đình hoặc những bữa tiệc thịt thịnh soạn.', 140000, 0, 'all1).jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Tuna Pizza – Một món pizza nhẹ nhàng nhưng đầy hương vị, với lớp đế giòn xốp và phủ lên lớp sốt cà chua đậm đà, phô mai tan chảy mịn màng. Lớp cá ngừ tươi ngon, được chế biến kỹ lưỡng, tạo nên sự kết hợp hoàn hảo giữa vị mặn mà của cá ngừ và sự béo ngậy của phô mai. Thêm vào đó, một chút hành tây và ô liu giúp tăng thêm độ phong phú và hương vị cho món ăn. Tuna Pizza là lựa chọn lý tưởng cho những ai yêu thích hải sản, đặc biệt là cá ngừ, mang đến một món ăn thanh mát và đầy đủ hương vị. Món pizza này rất thích hợp cho các buổi tiệc nhẹ nhàng, tụ họp gia đình hoặc bạn bè.', 140000, 0, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, 'Bánh Su Kem Nhân Dừa – Một món bánh ngọt thơm ngon với lớp vỏ su mềm mại, giòn tan, bên trong là nhân kem dừa ngọt ngào và béo ngậy. Nhân kem dừa được làm từ dừa tươi bào sợi, kết hợp với kem mịn màng, mang đến hương vị đặc trưng của dừa tươi hòa quyện cùng sự mềm mại của kem, tạo nên một trải nghiệm vị giác độc đáo và dễ chịu. Bánh Su Kem Nhân Dừa là lựa chọn hoàn hảo cho những ai yêu thích hương vị dừa, thích hợp cho các bữa trà chiều, tiệc tùng hoặc những dịp đặc biệt khi bạn muốn thưởng thức một món bánh ngọt nhẹ nhàng và thanh thoát.', 120000, 100000, 'maxresdefault.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, 'Bánh Su Kem Sữa Tươi – Một món bánh ngọt thơm ngon với lớp vỏ su giòn xốp, bên trong là nhân kem sữa tươi mịn màng và ngọt ngào. Nhân kem sữa tươi được làm từ sữa tươi nguyên chất, mang đến một hương vị thanh mát, béo ngậy mà không quá ngọt, tạo nên sự cân bằng hoàn hảo giữa lớp vỏ giòn và nhân kem mịn. Bánh Su Kem Sữa Tươi là lựa chọn tuyệt vời cho những ai yêu thích hương vị nhẹ nhàng và thanh thoát, thích hợp cho các buổi trà chiều, tiệc tùng, hay đơn giản là để thưởng thức mỗi ngày.', 120000, 100000, 'sukem.jpg', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, 'Bánh Su Kem Sữa Tươi Chiên Giòn – Một món bánh tuyệt vời kết hợp giữa lớp vỏ su giòn rụm bên ngoài và nhân kem sữa tươi mịn màng, ngọt ngào bên trong. Vỏ bánh được chiên giòn, tạo nên một cảm giác mới lạ và thú vị khi cắn vào, mang lại sự tương phản hoàn hảo giữa độ giòn tan của vỏ và độ mềm mại, béo ngậy của nhân kem sữa tươi. Bánh Su Kem Sữa Tươi Chiên Giòn là món ăn lý tưởng cho những ai yêu thích sự kết hợp giữa các kết cấu khác nhau trong một chiếc bánh, mang đến một trải nghiệm ẩm thực độc đáo và hấp dẫn. Món bánh này rất thích hợp cho những bữa tiệc nhẹ, ăn vặt hoặc thưởng thức trong các dịp đặc biệt.', 150000, 0, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, 'Bánh Su Kem Dâu Sữa Tươi – Một món bánh ngọt ngào kết hợp hương vị tươi mát của dâu tây và sự béo ngậy của kem sữa tươi. Lớp vỏ su giòn xốp bên ngoài ôm trọn nhân kem dâu sữa tươi mịn màng, với vị ngọt tự nhiên của dâu tây tươi ngon, tạo nên sự hòa quyện hoàn hảo giữa vị thanh mát và béo ngậy. Bánh Su Kem Dâu Sữa Tươi không chỉ hấp dẫn bởi vẻ ngoài bắt mắt mà còn bởi hương vị tươi mới và dễ chịu, thích hợp cho các bữa tiệc nhẹ, tiệc trà, hay làm món tráng miệng trong các dịp đặc biệt.', 150000, 0, 'sukemdau.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, 'Bánh Su Kem Bơ Sữa Tươi – Một món bánh ngọt thơm ngon với lớp vỏ su giòn rụm, bao bọc bên ngoài là nhân kem bơ sữa tươi mịn màng, béo ngậy. Nhân kem bơ sữa tươi được làm từ bơ tươi và sữa nguyên chất, mang đến một hương vị ngọt ngào, thanh mát và vô cùng quyến rũ. Bánh Su Kem Bơ Sữa Tươi là sự kết hợp hoàn hảo giữa sự giòn tan của vỏ bánh và độ mịn màng, béo ngậy của nhân kem, mang lại một trải nghiệm ẩm thực đầy lôi cuốn. Món bánh này là lựa chọn tuyệt vời cho những buổi trà chiều, tiệc tùng hay các dịp đặc biệt khi bạn muốn thưởng thức một món bánh ngọt nhẹ nhàng nhưng đầy đủ hương vị.', 150000, 0, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, 'Bánh Su Kem Nhân Trái Cây Sữa Tươi – Một món bánh ngọt thanh mát và hấp dẫn với lớp vỏ su giòn tan, bên trong là nhân kem sữa tươi kết hợp cùng các loại trái cây tươi ngon như dâu, xoài, hoặc kiwi. Nhân kem sữa tươi mịn màng, béo ngậy hòa quyện hoàn hảo với vị ngọt tự nhiên và tươi mát của trái cây, mang lại một hương vị mới lạ và dễ chịu. Bánh Su Kem Nhân Trái Cây Sữa Tươi là lựa chọn tuyệt vời cho những ai yêu thích sự tươi mới và nhẹ nhàng trong mỗi miếng bánh. Món bánh này rất thích hợp cho các bữa tiệc nhẹ, tiệc trà hoặc những dịp đặc biệt khi bạn muốn thưởng thức một món bánh vừa ngọt ngào vừa bổ dưỡng.', 150000, 0, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, 'Bánh Su Kem Cà Phê – Một món bánh ngọt đầy lôi cuốn, kết hợp hoàn hảo giữa lớp vỏ su giòn tan và nhân kem cà phê thơm lừng. Nhân kem cà phê được làm từ cà phê nguyên chất, mang đến hương vị đậm đà và dễ chịu, hòa quyện cùng sự béo ngậy của kem sữa tươi. Sự kết hợp giữa vị cà phê đặc trưng và độ mềm mịn của kem tạo ra một trải nghiệm vị giác độc đáo và hấp dẫn. Bánh Su Kem Cà Phê là lựa chọn lý tưởng cho những ai yêu thích hương vị cà phê, thích hợp cho các buổi trà chiều, tiệc tùng hoặc để thưởng thức khi muốn nhâm nhi một món bánh ngọt đặc biệt.', 150000, 0, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, 'Bánh Su Kem Phô Mai – Một món bánh ngọt đặc biệt với lớp vỏ su giòn xốp, bên trong là nhân kem phô mai béo ngậy, mịn màng. Nhân kem phô mai được làm từ phô mai tươi, mang đến một hương vị đậm đà và vừa phải, kết hợp hoàn hảo với độ giòn tan của vỏ bánh. Món bánh này vừa có sự ngọt ngào nhẹ nhàng của kem sữa, vừa có vị mặn mịn của phô mai, tạo nên một sự kết hợp tuyệt vời cho những ai yêu thích hương vị phô mai. Bánh Su Kem Phô Mai là lựa chọn lý tưởng cho các buổi trà chiều, tiệc tùng hay những dịp đặc biệt khi bạn muốn thưởng thức một món bánh ngọt có chút \"lạ miệng\" và thơm ngon.', 150000, 0, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, 'Bánh Su Kem Sữa Tươi Chocolate – Một món bánh ngọt đầy hấp dẫn với lớp vỏ su giòn tan, bên trong là nhân kem sữa tươi mịn màng kết hợp với hương vị chocolate ngọt ngào. Nhân kem sữa tươi béo ngậy hòa quyện hoàn hảo cùng lớp chocolate thơm lừng, mang lại sự kết hợp giữa sự nhẹ nhàng của sữa tươi và vị đậm đà của chocolate. Bánh Su Kem Sữa Tươi Chocolate là lựa chọn tuyệt vời cho những ai yêu thích sự kết hợp giữa vị ngọt ngào của chocolate và độ béo ngậy của kem, mang đến một trải nghiệm ẩm thực thú vị và đầy mê hoặc. Món bánh này rất thích hợp cho các bữa tiệc nhẹ, tiệc trà hoặc thưởng thức vào những dịp đặc biệt.', 150000, 0, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Bánh Macaron Pháp – Một món bánh ngọt đặc trưng của nền ẩm thực Pháp, nổi bật với lớp vỏ mịn màng, giòn tan bên ngoài và nhân kem mềm mượt bên trong. Vỏ bánh được làm từ bột hạnh nhân, tạo nên một kết cấu nhẹ nhàng và dễ tan trong miệng. Nhân kem bên trong có thể là hương vị đa dạng như chocolate, vani, trái cây, hay các hương vị đặc trưng khác, mang lại sự kết hợp hoàn hảo giữa độ giòn của vỏ và sự mịn màng của nhân. Bánh Macaron Pháp không chỉ hấp dẫn bởi vẻ ngoài đẹp mắt, mà còn bởi hương vị thanh thoát và tinh tế, là lựa chọn lý tưởng cho các bữa tiệc, dịp đặc biệt hoặc để thưởng thức trong những buổi trà chiều.', 200000, 180000, 'Macaron9.jpg', 'cái', 0, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Bánh Tiramisu - Italia – Một món bánh nổi tiếng đến từ Italia, kết hợp hoàn hảo giữa cà phê đậm đà và kem mascarpone mịn màng, béo ngậy. Lớp bánh xốp được ngâm trong cà phê espresso mạnh, tạo nên một hương vị đậm đà nhưng không quá ngọt, kết hợp với lớp kem mascarpone mềm mịn, mang lại một trải nghiệm ẩm thực đầy quyến rũ. Bánh Tiramisu còn được phủ một lớp bột ca cao mịn màng, tăng thêm sự hấp dẫn và cân bằng vị giác. Món bánh này là lựa chọn lý tưởng cho những ai yêu thích sự hòa quyện giữa cà phê và kem, thích hợp cho các dịp tiệc tùng, hoặc thưởng thức trong các buổi trà chiều thư giãn.', 200000, 0, '234.jpg', 'hộp', 0, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh Táo - Mỹ – Một món bánh truyền thống của Mỹ, mang đến sự kết hợp hoàn hảo giữa hương vị ngọt ngào của táo tươi và lớp vỏ bánh xốp, giòn tan. Bánh được chế biến từ những miếng táo tươi được tẩm gia vị như quế, đường, tạo nên một hương thơm quyến rũ, dễ chịu. Lớp vỏ bánh vàng ươm, giòn tan, bao bọc những miếng táo mềm mịn bên trong, mang lại sự hòa quyện tuyệt vời giữa sự ngọt ngào và vị thơm tự nhiên của táo. Bánh Táo - Mỹ là món ăn tuyệt vời để thưởng thức trong các dịp đặc biệt, tiệc tùng, hoặc đơn giản là một món tráng miệng nhẹ nhàng cho những buổi tối thư giãn.', 200000, 0, '1234.jpg', 'cái', 0, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Bánh Cupcake - Anh Quốc – Một món bánh ngọt đặc trưng của Anh Quốc, nổi bật với lớp bánh mềm mịn, nhẹ nhàng, được phủ lớp kem bơ ngọt ngào và mịn màng. Bánh Cupcake này thường được trang trí đẹp mắt với các họa tiết bắt mắt, từ trái cây tươi, hạt ngũ cốc, cho đến những lớp kem nhiều màu sắc, tạo nên vẻ ngoài hấp dẫn và dễ thương. Vị ngọt thanh của bánh kết hợp với độ béo của kem bơ và các lớp trang trí thơm ngon, mang lại một trải nghiệm ẩm thực thú vị. Bánh Cupcake - Anh Quốc là món bánh lý tưởng cho các dịp sinh nhật, tiệc trà hay những buổi tiệc nhẹ nhàng, mang đến không gian ấm áp và đầy màu sắc.', 150000, 120000, 'cupcake.jpg', 'cái', 0, 1, NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Bánh Sachertorte – Một món bánh nổi tiếng của Áo, với lớp bánh chocolate đậm đà kết hợp hoàn hảo cùng lớp mứt mơ nhẹ nhàng và lớp phủ chocolate mịn màng bên ngoài. Bánh có kết cấu chắc chắn, mềm mại, đậm hương vị cacao, tạo nên một trải nghiệm vị giác đầy quyến rũ. Bánh Sachertorte thường được phục vụ với một chút kem tươi, giúp làm nổi bật hương vị ngọt ngào của mứt mơ và độ đậm đà của chocolate. Đây là một món bánh lý tưởng cho những tín đồ yêu thích sự kết hợp giữa chocolate và trái cây, đặc biệt thích hợp cho các dịp trang trọng, lễ hội hoặc tiệc trà sang trọng.', 250000, 220000, '111.jpg', 'cái', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7pTUP2waQ2U6GORD8wzRxcLSuQwRfTLNfedM6ZXr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTdTZVp2bG9vdlpFcVI0ZVBXYzR5TWI4cWZWYkNneE40VHlJbkZ5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuZ2NodSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1744769060);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'banh-man-thu-vi-nhat-1.jpg', NULL, NULL),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `Image`, `email`, `phone`, `address`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Châu Đức Phát', '2.jpg', 'phatchau16520@gmail.com', '0905652157', '05 Hòa Minh 14', 1, NULL, '$2y$12$rqn/98rjrGXZwR4oJcuU6O4w0FIxyEecPWzPedvlNtsbss.kBcs9i', NULL, '2025-04-02 20:11:15', '2025-04-15 09:45:00'),
(2, 'NoriKachi', '2.jpg', 'norikachi5002@gmail.com', '0904963329', '05 Hòa Minh 14', 3, NULL, '$2y$12$KRQACnKpLiqv7uGX.dE1Tu0LM.B.sINzylrnBUiyQ5dyYbmUt8Gl.', NULL, '2025-04-04 09:34:55', '2025-04-14 21:08:34'),
(3, 'NoriKachi Tedomi', 'Key.png', 'cinru5002@gmail.com', '0944963329', '05 Hòa Minh 14', 3, NULL, '$2y$12$lkHpdork7lRMiF/1enfSE.HKQT/kLSN9lwC3MCrBdE/UEvLnCJE9i', NULL, '2025-04-04 20:51:46', '2025-04-11 07:31:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
