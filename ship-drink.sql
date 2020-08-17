-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 15, 2020 lúc 01:52 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ship-drink`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nguoi_nhan` varchar(200) NOT NULL,
  `sdt` int(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `tong_tien` int(50) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `ngay_dat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `member_id`, `nguoi_nhan`, `sdt`, `dia_chi`, `tong_tien`, `tinh_trang`, `ngay_dat`) VALUES
(7, 3, 'sdfsdfsdf', 66666, 'dfdfsdf', 264000, 0, '2020-08-14 09:50:50'),
(8, 3, 'ffffffffffffffffffffffffffff', 2147483647, 'ffffffffff', 448000, 3, '2020-08-14 10:04:32'),
(9, 3, 'cc', 123, 'cc', 18000, 3, '2020-08-15 01:02:45'),
(10, 3, 'â', 123, 'â', 126000, 1, '2020-08-15 01:42:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(191) NOT NULL,
  `shipper` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(191) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_image`, `cat_created_at`, `cat_updated_at`) VALUES
(2, 'Trà Sữa', '5f1a669a182fcdownload (1).jpeg', '2020-07-23 21:42:02', '2020-07-23 21:42:02'),
(3, 'Cafe', '5f1a66a62edf7download.jpeg', '2020-07-23 21:42:14', '2020-07-23 21:42:14'),
(4, 'Sinh Tố', '5f1a66c268fc8download (2).jpeg', '2020-07-23 21:42:42', '2020-07-23 21:42:42'),
(6, 'Nước Ép', '5f1a7f8562b55download (5).jpeg', '2020-07-23 23:28:21', '2020-07-23 23:28:21'),
(7, 'Trà', '5f1a7fadc122adownload (6).jpeg', '2020-07-23 23:29:01', '2020-07-23 23:29:01'),
(9, 'Thức Uống Khác', '5f2d53c8a6fb43bd57d35-b276-47c1-a6fb-59d1a494b31b.jpg', '2020-08-07 06:14:48', '2020-08-07 06:14:59'),
(10, 'Bánh Ngọt', '5f2d53df190c05ce1b3bc-01d3-4814-b499-9dbd89f55821.jpeg', '2020-08-07 06:15:11', '2020-08-07 06:15:11'),
(11, 'Đá Xay', '5f2d54359addf6beb87a0-fa76-43cf-a21f-71179a6ac3ec.jpg', '2020-08-07 06:16:37', '2020-08-07 06:16:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comment_level` tinyint(1) NOT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `prd_id`, `member_id`, `content`, `comment_level`, `comment_created_at`) VALUES
(1, 2, 3, 'sdsdsmdsdksdsdsd', 1, '2020-07-13 07:25:03'),
(2, 50, 5, 'cawjc', 0, '2020-08-14 18:18:00'),
(3, 82, 3, 'Cặc', 0, '2020-08-14 18:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `member_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `member_level` tinyint(1) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `member_name`, `email`, `password`, `member_level`, `address`, `phone`) VALUES
(3, 'dinhlongsdsdsd', 'davidthaiquy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'dsfsfsdf', 123456789),
(4, 'ninh', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(5, 'hai', 'tnn@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` varchar(5000) NOT NULL,
  `news_image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_image`) VALUES
(2, 'Yuza một loại quả khá lạ lẫm với chúng ta vừa mới \"cập bến\" một số nhà hàng tại Hà Nội qua kỹ năng pha chế điêu luyện của các bartender trở thành 6 loại đồ uống giải khát vừa sang vừa tốt cho sức khoẻ.\r\n', 'Ở Hàn Quốc nhắc đến quả Yuza là người ta nhớ ngay đến những tách trà Yujacha hay những ly cocktail mát lạnh trong những bữa tiệc hội họp sang chảnh. Đây là một loại quả thuộc họ cam chanh, có vị chua gắt và mùi thơm tươi mát khi chín. Người Hàn Quốc thường hay nói vui bước qua vườn Yuza vào mùa thu hoạch ai cũng phải khựng lại vài phút để hít đầy lồng ngực thứ hương thơm dễ chịu từ những trái chín vàng rực trên cành.\r\n\r\nQuả Yuza có rất nhiều tác dụng với sức khoẻ, dùng để pha chế đồ uống cho mùa hè thì thật tuyệt vời. Bởi vị chua quyện hoà với mùi hương tươi mát giúp giải khát hiệu quả, đồng thời khiến tâm hồn thêm vui vẻ, thư giãn.\r\n\r\nNăm nay, 3 nhà hàng tại Hà Nội là Vpresso, MAD Society, MAD Botanist khiến thực khách vô cùng ngạc nhiên khi giới thiệu 6 món đồ uống từ trái Yuza mà trước đây mọi người chỉ có cơ hội thưởng thức khi tới Hàn Quốc. 6 loại đồ uống sử dụng nguyên liệu nhập khẩu trực tiếp từ Hàn Quốc, qua kỹ năng pha chế điêu luyện của các bartender mang đến những cảm giác bất ngờ thú vị cho thực khách khi thưởng thức.', 'photo-1-15646362437901436560828.jpg'),
(3, '10 món ăn được chế biến hết sức tình cờ nhưng lại rất được ưa chuộng, Coca-Cola cũng có trong danh sách đó!', 'Ở đời có câu “Thánh nhân đãi kẻ khù khờ” - đôi khi sự tình cờ mới lại là những kẻ phát minh vĩ đại nhất. Trong ẩm thực cũng không ngoại lệ. Hãy cùng nhau điểm qua 10 món ăn nổi tiếng được tạo ra một cách hoàn toàn ngẫu nhiên nhé!', 'photo-1-1534868411987852912354.jpg'),
(4, 'Sử dụng công nghệ này, hãng đóng chai cho Coca Cola đã giảm thời gian kiểm hàng gấp 10 lần', 'Ngoài các yếu tố như giải thi đấu bóng đá World Cup, thời tiết ấm áp và các sản phẩm mới ra mắt, các công nghệ mới, bao gồm nhận dạng hình ảnh tinh vi và phân tích dữ liệu, cũng đóng vai trò tăng doanh thu cho công ty Coca Cola.', 'photo-1-15389660343492035641141-15389700490581886273052.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prd_name` varchar(191) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_image` varchar(191) NOT NULL,
  `prd_price` float NOT NULL,
  `prd_warranty` varchar(255) NOT NULL,
  `prd_accessory` varchar(255) NOT NULL,
  `prd_featured` varchar(255) NOT NULL,
  `prd_status` tinyint(1) NOT NULL,
  `prd_detail` varchar(255) NOT NULL,
  `prd_view` int(20) NOT NULL,
  `prd_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prd_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `link_video` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `trade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `prd_name`, `cat_id`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessory`, `prd_featured`, `prd_status`, `prd_detail`, `prd_view`, `prd_created_at`, `prd_updated_at`, `link_video`, `pro_id`, `trade_id`) VALUES
(48, 'PhinDi Choco', 3, '5f2d54fd138e5201852119836-espresso.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Iced PHIN Coffee with Chocolate', 12, '2020-08-07 06:19:57', '2020-08-07 06:20:29', 'ok', 7, 11),
(49, 'PhinDi Kem Sữa', 3, '5f2d55571d9f3201852119920-cappucino1.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Iced PHIN Coffee with Milk Foam', 23, '2020-08-07 06:21:27', '2020-08-07 06:21:27', 'ok', 7, 11),
(50, 'PhinDi Hạnh Nhân', 3, '5f2d55e417e69201852119857-americano1.jpg', 39000000, '1 Ngày', 'Không', 'Mới', 1, 'Iced PHIN Coffee with Almond Milk', 23, '2020-08-07 06:23:28', '2020-08-07 06:23:48', 'ok', 7, 11),
(51, 'Phin Sữa Đá', 3, '5f2d562e9db202018521194625-phin-den-da1.jpg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'PHIN Coffee & Condensed Milk', 43, '2020-08-07 06:25:02', '2020-08-07 06:25:02', 'ok', 7, 11),
(52, 'Bạc Xỉu', 3, '5f2d56bc02fbb6beb87a0-fa76-43cf-a21f-71179a6ac3ec.jpg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'White PHIN Coffee & Condensed Milk', 12, '2020-08-07 06:27:24', '2020-08-07 06:27:24', 'ok', 7, 11),
(53, 'Phin Đen Đá', 3, '5f2d56eb8587f2018521192956-cookies-_-cream1.jpg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'PHIN Coffee', 34, '2020-08-07 06:28:11', '2020-08-07 06:28:11', 'ok', 7, 11),
(54, 'Phin Sữa Nóng', 3, '5f2d572b96a7a2018521191018-mocha1.jpg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'Hot PHIN Coffee & Condensed Milk', 432, '2020-08-07 06:29:15', '2020-08-07 06:29:15', 'ok', 7, 11),
(55, 'Phin Đen Nóng', 3, '5f2d57530d11241ce4a19-a1ed-4531-85fb-a8b018602168.jpg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'Hot PHIN Coffee', 5432, '2020-08-07 06:29:55', '2020-08-07 06:29:55', 'ok', 7, 11),
(56, 'Freeze Trà Xanh', 11, '5f2d579c172c42018521192856-green-tea-freeze1.jpg', 49000, '1 Ngày', 'Không', 'Mới', 1, 'Với các sản phẩm Freeze, trong quá trình vận chuyển, chất lượng lớp kem trên bề mặt có thể bị ảnh hưởng. For Freeze drinks, quality of whipping cream can be affected during delivery.', 12345, '2020-08-07 06:31:08', '2020-08-07 06:31:08', 'ok', 7, 11),
(57, 'Chocolate Freeze', 11, '5f2d5837452adc9ee8bd8-5b3c-4fb4-b592-96c09b2b1216.jpeg', 49000, '1 Ngày', 'Không', 'Mới', 1, 'Với các sản phẩm Freeze, trong quá trình vận chuyển, chất lượng lớp kem trên bề mặt có thể bị ảnh hưởng. For Freeze drinks, quality of whipping cream can be affected during delivery.', 432, '2020-08-07 06:33:43', '2020-08-07 06:33:43', 'ok', 7, 11),
(58, 'Caramel Phin Freeze', 11, '5f2d5868bf1b42018521192744-caramel-phin-freeze1.jpg', 49000, '1 Ngày', 'Không', 'Mới', 1, 'Với các sản phẩm Freeze, trong quá trình vận chuyển, chất lượng lớp kem trên bề mặt có thể bị ảnh hưởng. For Freeze drinks, quality of whipping cream can be affected during delivery.', 5432, '2020-08-07 06:34:32', '2020-08-07 06:34:32', 'ok', 7, 11),
(59, 'Cookies & Cream', 11, '5f2d58947d608fac54c92-c659-4030-a7ad-aaf48e63eecf.jpg', 49000, '1 Ngày', 'Không', 'Mới', 1, 'Với các sản phẩm Freeze, trong quá trình vận chuyển, chất lượng lớp kem trên bề mặt có thể bị ảnh hưởng. For Freeze drinks, quality of whipping cream can be affected during delivery.', 789, '2020-08-07 06:35:16', '2020-08-07 06:35:16', 'ok', 7, 11),
(60, 'Classic Phin Freeze', 11, '5f2d58bbe9b462bbb8a35-232e-4429-a8a8-97b9a26dabf7.jpg', 49000, '1 Ngày', 'Không', 'Mới', 1, 'Với các sản phẩm Freeze, trong quá trình vận chuyển, chất lượng lớp kem trên bề mặt có thể bị ảnh hưởng. For Freeze drinks, quality of whipping cream can be affected during delivery.', 890, '2020-08-07 06:35:55', '2020-08-07 06:35:55', 'ok', 7, 11),
(61, 'Trà Thạch Đào', 7, '5f2d58ed21f2c2018521194138-tra-thanh-dao1.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Peach Jelly Tea\r\n\r\n', 432, '2020-08-07 06:36:45', '2020-08-07 06:36:45', 'ok', 7, 11),
(62, 'Trà Sen Vàng Mới', 7, '5f2d5935af539fac54c92-c659-4030-a7ad-aaf48e63eecf.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'New Golden Lotus Tea', 234, '2020-08-07 06:37:57', '2020-08-07 06:37:57', 'ok', 7, 11),
(63, 'Trà Thanh Đào', 7, '5f2d5956e96e1ab2fa4fd-a45e-4ac6-b04e-659683225733.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Peach Lemongrass Tea', 5432, '2020-08-07 06:38:30', '2020-08-07 06:38:30', 'ok', 7, 11),
(64, 'Trà Sen Vàng', 7, '5f2d599a60977201852119431-tra-xanh-dau-do1.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Golden Lotus Tea', 574, '2020-08-07 06:39:38', '2020-08-07 06:39:38', 'ok', 7, 11),
(65, 'Trà Thạch Vải', 7, '5f2d59c1af7a92bbb8a35-232e-4429-a8a8-97b9a26dabf7.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Lychee Tea', 43, '2020-08-07 06:40:17', '2020-08-07 06:40:17', 'ok', 7, 11),
(66, 'Chanh Đá Xay', 9, '5f2d5a677164b3bd57d35-b276-47c1-a6fb-59d1a494b31b.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Lime Ice-blended', 43, '2020-08-07 06:43:03', '2020-08-07 06:43:03', 'ok', 7, 11),
(67, 'Chocolate', 9, '5f2d5a99ece230522c47f-51e3-4631-b544-e5cf1e443f87.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Chocolate', 555, '2020-08-07 06:43:53', '2020-08-07 06:43:53', 'ok', 7, 11),
(68, 'Chanh Dây Đá Viên', 9, '5f2d5ad73cd5c0ceefd7b-1e88-4a3c-96d9-429470e6a850.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Iced Passion Fruit Juice', 999, '2020-08-07 06:44:55', '2020-08-07 06:44:55', 'ok', 7, 11),
(69, 'Tắc/Quất Đá Viên', 2, '5f2d5b0b243023bd57d35-b276-47c1-a6fb-59d1a494b31b.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Iced Kumquat Juice', 543, '2020-08-07 06:45:47', '2020-08-07 06:45:47', 'ok', 3, 9),
(70, 'Chanh Đá Viên', 9, '5f2d5b354b5de3bd57d35-b276-47c1-a6fb-59d1a494b31b.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Iced Lime Juice', 543, '2020-08-07 06:46:29', '2020-08-07 06:46:29', 'ok', 7, 11),
(71, 'Bánh Chuối', 10, '5f2d5bec493f1102fb803-d741-43cb-8bfb-87f0de9073f1.jpeg', 29000, '1 Ngày', 'Không', 'Mới', 1, 'Banana Cake', 43, '2020-08-07 06:49:32', '2020-08-07 06:49:32', 'ok', 7, 11),
(72, 'Cookies Trà Xanh', 10, '5f2d5c122fe9e5ce1b3bc-01d3-4814-b499-9dbd89f55821.jpeg', 9000, '1 Ngày', 'Không', 'Mới', 1, 'Green Tea Cookies', 876, '2020-08-07 06:50:10', '2020-08-07 06:50:10', 'ok', 7, 11),
(73, 'Cookies Cà Phê', 10, '5f2d5c30ee6c4704e925e-f6c4-41b1-a119-4f911d84abf6.jpeg', 9000, '1 Ngày', 'Không', 'Mới', 1, 'Coffee Cookies', 2345, '2020-08-07 06:50:40', '2020-08-07 06:50:40', 'ok', 7, 11),
(74, 'Cookies Vanila', 10, '5f2d5c5aa5d2ba845da19-09aa-409d-a916-524049e2eb77.jpeg', 9000, '1 Ngày', 'Không', 'Mới', 1, 'Vanilla Cookies', 345, '2020-08-07 06:51:22', '2020-08-07 06:51:22', 'ok', 7, 11),
(75, 'Trà Đen Sữa Tươi Sương Sáo', 2, '5f2d5dca136f623f47e83-ad21-4ad0-9e68-33db67ffddc8.jpeg', 43000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 432, '2020-08-07 06:57:30', '2020-08-07 06:57:30', 'ok', 7, 9),
(76, 'Okinawa Oreo Cream Milk Tea', 2, '5f2d5e0d15e2ed9c69175-7b6b-4aa7-a4b0-7214491eeb87.jpg', 51000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.\r\n\r\n', 12345, '2020-08-07 06:58:37', '2020-08-07 06:58:37', 'ok', 7, 9),
(77, 'Okinawa Milk Foam Smoothie', 2, '5f2d5e6c4c8d7d9c69175-7b6b-4aa7-a4b0-7214491eeb87.jpg', 58000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 987, '2020-08-07 07:00:12', '2020-08-07 07:00:12', 'ok', 7, 9),
(78, 'Trà Sữa Okinawa', 2, '5f2d5e93716ab262cb78e-6007-4242-d9d6-d878450a0db4.jpg', 51000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 546, '2020-08-07 07:00:51', '2020-08-07 07:00:51', 'ok', 7, 9),
(79, 'Sữa Tươi Okinawa', 2, '5f2d60a736f6511842cab-f05f-4136-ad11-256cbcdd7fba.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 543, '2020-08-07 07:09:43', '2020-08-07 07:09:43', 'ok', 7, 9),
(80, 'Mango Milk Tea', 2, '5f2d60d1d466fa4090f50-fabf-4b0d-a820-774418d5f537.jpg', 51000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 12345, '2020-08-07 07:10:25', '2020-08-07 07:10:25', 'ok', 7, 9),
(81, 'Strawberry Earl Grey Latte Size M', 2, '5f2d6102215267336d787-395d-4720-34eb-668946ad48b2.jpg', 57000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 12345, '2020-08-07 07:11:14', '2020-08-07 07:11:14', 'ok', 7, 9),
(82, 'Trà Sữa Alisan', 2, '5f2d612f98c4787c7f39c-b9ae-43ee-bc09-cb68a9454db8.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 765, '2020-08-07 07:11:59', '2020-08-07 07:11:59', 'ok', 7, 9),
(83, 'Trà Sữa Trân Châu Đen', 2, '5f2d6165678ddb72956d6-edd0-400c-923f-b07dbb13a6ba.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 12345, '2020-08-07 07:12:53', '2020-08-07 07:12:53', 'ok', 7, 9),
(84, 'Trà Sữa Matcha', 2, '5f2d6188059ff31a736c4-7d87-422b-820e-48766cd8851f.jpg', 57000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 878, '2020-08-07 07:13:28', '2020-08-07 07:13:28', 'ok', 7, 9),
(85, 'Trà Sữa Matcha Đậu Đỏ', 2, '5f2d61adb854a31a736c4-7d87-422b-820e-48766cd8851f.jpg', 57000, '1 Ngày', 'Không', 'Mới', 1, 'Trà và sữa là hai thức uống không mấy xa lạ đối với người Việt, nhưng từ sự vô tình hay cố ý mà chúng lại được pha trộn lại với nhau, tạo nên một thức uống hết sức thu hút và trở thành “cơn sốt” trong giới trẻ hiện nay.', 12345, '2020-08-07 07:14:05', '2020-08-07 07:14:05', 'ok', 7, 9),
(86, 'Trà Alisan', 7, '5f2d62b30b7c024d98971-adbd-4abd-4f87-6798c857b105 (1).jpg', 40000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:18:27', '2020-08-07 07:18:27', 'ok', 7, 9),
(87, 'Trà Xanh', 7, '5f2d62e392cb3d9c69175-7b6b-4aa7-a4b0-7214491eeb87.jpg', 37000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:19:15', '2020-08-07 07:19:15', 'ok', 7, 9),
(88, 'Trà Earl Grey', 7, '5f2d63058afe48f0b7cef-cb92-4694-297a-255984e66050.jpg', 40000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:19:49', '2020-08-07 07:19:49', 'ok', 7, 9),
(89, 'Trà Alisan Kem Sữa', 2, '5f2d63279b29c87c7f39c-b9ae-43ee-bc09-cb68a9454db8.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:20:23', '2020-08-07 07:20:23', 'ok', 3, 9),
(90, 'Trà Xanh Kem Sữa', 7, '5f2d6354e8bcdf1caa244-2794-496d-3522-6efa774071e1.jpg', 51000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:21:08', '2020-08-07 07:21:08', 'ok', 3, 9),
(91, 'Trà Earl Grey Kem Sữa', 2, '5f2d63860dc1fb43d648e-ebc1-4ffa-0e9d-81c23547c5e2.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 555, '2020-08-07 07:21:58', '2020-08-07 07:21:58', 'ok', 3, 9),
(92, 'Trà Alisan Vải', 7, '5f2d63b1858f087c7f39c-b9ae-43ee-bc09-cb68a9454db8.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:22:41', '2020-08-07 07:22:41', 'ok', 7, 9),
(93, 'Trà Alisan Chanh Dây', 7, '5f2d63d53b126d6afd6e2-7b42-48a3-e533-fef1cec13574.jpg', 44000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 666, '2020-08-07 07:23:17', '2020-08-07 07:23:17', 'ok', 7, 9),
(94, 'QQ Chanh Dây Trà Xanh', 7, '5f2d63f8500b79f802cb6-35ab-4c38-5aa1-611b1c479e7b.jpg', 51000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 555, '2020-08-07 07:23:52', '2020-08-07 07:23:52', 'ok', 7, 9),
(95, 'Trà Oolong Vải', 7, '5f2d64167b8e67f48e6d9-4760-4185-365c-376ac47fc4bf.jpg', 47000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 543, '2020-08-07 07:24:22', '2020-08-07 07:24:22', 'ok', 7, 9),
(96, 'Xoài Đá Xay', 11, '5f2d654a2fc6b347c66da-80b4-4eed-8f4b-ce732bdfdb89.jpg', 58000, '1 Ngày', 'Không', 'Mới', 1, 'Ly đá xay là sự hòa quyện hoàn hảo giữa Espresso và vị ngọt dịu nhẹ của syrup caramel', 12345, '2020-08-07 07:29:30', '2020-08-07 07:29:30', 'ok', 7, 9),
(97, 'Yakult Đào Đá Xay', 11, '5f2d656722883d28fbd30-cad0-4867-4107-a825c6f8732e.jpg', 63000, '1 Ngày', 'Không', 'Mới', 1, 'Ly đá xay là sự hòa quyện hoàn hảo giữa Espresso và vị ngọt dịu nhẹ của syrup caramel', 12345, '2020-08-07 07:29:59', '2020-08-07 07:29:59', 'ok', 3, 9),
(98, 'Socola Đá Xay', 11, '5f2d658b9e74aa4090f50-fabf-4b0d-a820-774418d5f537.jpg', 63000, '1 Ngày', 'Không', 'Mới', 1, 'Ly đá xay là sự hòa quyện hoàn hảo giữa Espresso và vị ngọt dịu nhẹ của syrup caramel', 12345, '2020-08-07 07:30:35', '2020-08-07 07:30:35', 'ok', 3, 9),
(99, 'Matcha Đá Xay', 11, '5f2d65b4c0889cf01e1ea-db2f-4d87-82c2-3e38c990f985.jpeg', 63000, '1 Ngày', 'Không', 'Mới', 1, 'Ly đá xay là sự hòa quyện hoàn hảo giữa Espresso và vị ngọt dịu nhẹ của syrup caramel', 12345, '2020-08-07 07:31:16', '2020-08-07 07:31:16', 'ok', 7, 9),
(100, 'Khoai Môn Đá Xay', 11, '5f2d65d4bcb1edb494cf5-1280-4c0b-9598-20229322429c (1).jpg', 63000, '1 Ngày', 'Không', 'Mới', 1, 'Ly đá xay là sự hòa quyện hoàn hảo giữa Espresso và vị ngọt dịu nhẹ của syrup caramel', 4444, '2020-08-07 07:31:48', '2020-08-07 07:31:48', 'ok', 7, 9),
(101, 'Trà Sữa Vị Hoa Nhài', 2, '5f2d6623935f7c378e1c4-1cb2-4cc3-986b-feaaa43b0a99.jpeg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Jasmine Green milk tea', 444, '2020-08-07 07:33:07', '2020-08-07 07:33:07', 'ok', 7, 12),
(102, 'Trà Sữa Hạt Dẻ', 2, '5f2d6650c11158b63045a-040c-4889-bf83-b37590918491.jpeg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Hazelnut Milk tea', 12345, '2020-08-07 07:33:52', '2020-08-07 07:33:52', 'ok', 7, 12),
(103, 'Trà Sữa Dâu Tây', 2, '5f2d6670eee49bc0e3d13-736d-41d1-bc71-9179f6b1e111.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Strawberry milk tea', 432, '2020-08-07 07:34:24', '2020-08-07 07:34:24', 'ok', 7, 12),
(104, 'Trà Sữa Vải', 2, '5f2d6696b64b9c378e1c4-1cb2-4cc3-986b-feaaa43b0a99.jpeg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Lychee Milk tea', 76, '2020-08-07 07:35:02', '2020-08-07 07:35:02', 'ok', 7, 12),
(105, 'Trà Sữa Chanh Leo', 2, '5f2d66bdf40c6e0b11cac-3e44-428f-bb07-8a6c40c69681.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Passion Fruit Milk tea', 999, '2020-08-07 07:35:41', '2020-08-07 07:35:41', 'ok', 7, 12),
(106, 'Trà Sữa Xoài', 2, '5f2d67a8c143ec72d5097-f44c-4f5c-a668-cc2fede8d72d.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Mango Milk tea', 12345, '2020-08-07 07:39:36', '2020-08-07 07:39:36', 'ok', 7, 12),
(107, 'Trà Sữa Hokkaido', 2, '5f2d67d1afc63593038be-56b9-4e49-ab0e-b7b5f8641173.jpg', 39000, '1 Ngày', 'Không', 'Mới', 1, 'Hokkaido milk tea', 324, '2020-08-07 07:40:17', '2020-08-07 07:40:17', 'ok', 7, 12),
(108, 'Trà đen vị vải', 7, '5f2d685219bc7f9041a26-55ff-49e3-9dc7-0448d3626862.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:42:26', '2020-08-07 07:42:26', 'ok', 3, 12),
(109, 'Trà xanh vị vải', 7, '5f2d68725975898ae25dc-9fdf-46f4-9e51-a1d184c3c470.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:42:58', '2020-08-07 07:42:58', 'ok', 7, 12),
(110, 'Trà Xanh Vị Chanh Leo', 7, '5f2d688d21f4d73df52f9-0dc4-41ca-b12b-2ef42d9fa281.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:43:25', '2020-08-07 07:43:25', 'ok', 7, 12),
(111, 'Trà xanh mật ong', 2, '5f2d68b98970adf191bc1-5bea-4e5a-8778-8784895fc6ba.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:44:09', '2020-08-07 07:44:09', 'ok', 7, 12),
(112, 'Trà Đen Vị Chanh Leo', 2, '5f2d68dd0e3904e2d2e1e-8584-4f8c-b290-9af51b6b1b36.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:44:45', '2020-08-07 07:44:45', 'ok', 7, 12),
(113, 'Trà xanh vị quất', 7, '5f2d692e7d58b32cf5c21-b1a5-4abd-9645-a32c535c5ea2.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Trà thanh nhiệt chế biến từ những nguyên liệu trái cây tươi mát, để ngày dài không chùn bước đam mê', 12345, '2020-08-07 07:46:06', '2020-08-07 07:46:06', 'ok', 3, 12),
(114, 'Nước Vải Lô Hội', 6, '5f2d6963b0c83c9093634-dd58-4988-9939-a9ba12682967.jpg', 37000, '1 Ngày', 'Không', 'Mới', 1, 'Aloe Vera Lychee Juice ', 12345, '2020-08-07 07:46:59', '2020-08-07 07:46:59', 'ok', 3, 12),
(115, 'Nước Nho Lô Hội', 6, '5f2d698a7538673df52f9-0dc4-41ca-b12b-2ef42d9fa281.jpg', 37000, '1 Ngày', 'Không', 'Mới', 1, 'Aloe Vera Grape Jiuce', 12345, '2020-08-07 07:47:38', '2020-08-07 07:47:38', 'ok', 7, 12),
(116, 'Nước Chanh Leo', 6, '5f2d69b38bdec2a531344-a734-466f-8eca-1292ad58b816.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Passion Fruit Juice', 12345, '2020-08-07 07:48:19', '2020-08-07 07:48:19', 'ok', 7, 12),
(117, 'Nước Chanh Mật Ong', 6, '5f2d69d8d070c84c2febc-2e40-40c9-868f-9fe703fc5ed1.jpg', 37000, '1 Ngày', 'Không', 'Mới', 1, 'Plum Lemon juice', 12345, '2020-08-07 07:48:56', '2020-08-07 07:48:56', 'ok', 7, 12),
(118, 'Nước Mật Ong Lô Hội', 6, '5f2d6a1250561c9093634-dd58-4988-9939-a9ba12682967.jpg', 37000, '1 Ngày', 'Không', 'Mới', 1, 'Aloe Vera Honey Juice', 12345, '2020-08-07 07:49:54', '2020-08-07 07:49:54', 'ok', 7, 12),
(119, 'Nước Chanh Mận', 6, '5f2d6a3885fd032cf5c21-b1a5-4abd-9645-a32c535c5ea2.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Plum Lemon juice', 12345, '2020-08-07 07:50:32', '2020-08-07 07:50:32', 'ok', 7, 12),
(120, 'Cà Phê Nâu', 3, '5f2d6a84add900bda4469-ffe0-4358-827a-133a3395b006.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Cafe sạch nhập từ C.ty có tên tuổi thương hiệu. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe.', 12345, '2020-08-07 07:51:48', '2020-08-07 07:51:48', 'ok', 7, 10),
(121, 'Cacao nóng', 3, '5f2d6ab2188f4e2ddd43b-ebf6-44a2-9b49-dace4d15ae49.jpg', 36000, '1 Ngày', 'Không', 'Mới', 1, 'Cacao thơm, ngon nhập từ C.ty có tên tuổi thương hiệu. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe.', 12345, '2020-08-07 07:52:34', '2020-08-07 07:52:34', 'ok', 7, 10),
(122, 'Cà Phê Đen', 3, '5f2d6ae47986851b96b28-18d0-4b3c-8d52-d8e4f857c455.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Cafe sạch nhập từ C.ty có tên tuổi thương hiệu. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe.', 12345, '2020-08-07 07:53:24', '2020-08-07 07:53:24', 'ok', 7, 10),
(123, 'Cafe Mộc Nóng', 3, '5f2d6b223db46d90eff26-35cb-456b-b39e-3f228f73cf51.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Cafe mộc không đường, không sữa, nguyên mùi vị cafe thơm ngon dành cho những khách có gu nghiền cafe. Vui lòng ghi rõ giúp quán Cafe nóng hoặc lạnh tùy theo nhu cầu của quý khách hàng.', 12345, '2020-08-07 07:54:26', '2020-08-07 07:54:26', 'ok', 7, 10),
(124, 'Cafe mộc chai 500ml', 3, '5f2d6b4d31f0620e34001-80f2-4578-8c5a-98d4b9867dcb.jpeg', 120000, '1 Ngày', 'Không', 'Mới', 1, 'Cafe nguyên chất pha sẵn đóng chai 500ml. Quý khách hàng vui lòng tự pha chế theo nhu cầu của mình. Không có đường, không có sữa, không có cốc, thìa, đá & ống hút kèm theo.', 12345, '2020-08-07 07:55:09', '2020-08-07 07:55:09', 'ok', 7, 10),
(125, 'Cafe Mộc Lạnh', 3, '5f2d6b74768ce0bda4469-ffe0-4358-827a-133a3395b006.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Cafe Mộc không đường, không sữa dành cho quý khách có gu nghiền cafe nguyên chất. Vui lòng ghi chú rõ giúp quán mong muốn của quý khách uống nóng hay uống lạnh.', 12345, '2020-08-07 07:55:48', '2020-08-07 07:55:48', 'ok', 7, 10),
(126, 'Chanh Tuyết', 11, '5f2d6bff574f62a0cda1c-0af7-40a7-9025-f63bcb192475.jpg', 36000, '1 Ngày', 'Không', 'Mới', 1, 'Chanh quê tươi thơm ngon, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 07:58:07', '2020-08-07 07:58:07', 'ok', 7, 10),
(127, 'Đá Xay Oreo', 11, '5f2d6c25af9461da8d849-72e7-4b3a-9200-a51ece8665e6.jpg', 36000, '1 Ngày', 'Không', 'Mới', 1, 'Bánh Oreo chính hãng thơm ngon. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 07:58:45', '2020-08-07 07:58:45', 'ok', 7, 10),
(128, 'Đá Xay Cà Phê', 11, '5f2d6c6362fd802d899eb-f1d8-4d4a-9f43-7bc4bc4b4bd7.jpg', 36000, '1 Ngày', 'Không', 'Mới', 1, 'Bột trà xanh nhập khẩu từ Nhật đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 07:59:47', '2020-08-07 07:59:47', 'ok', 3, 10),
(129, 'Đá xay Matcha', 11, '5f2d6c97ad5f891e9852c-74d8-4476-941b-4e33d7627bd2.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Bột trà xanh nhập khẩu từ Nhật đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 08:00:39', '2020-08-07 08:00:39', 'ok', 7, 12),
(130, 'Đá Xay Cam', 11, '5f2d6cbf3b8748cd67d24-b163-4ded-8137-ac6be7ce3013.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Bột trà xanh nhập khẩu từ Nhật đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 08:01:19', '2020-08-07 08:01:19', 'ok', 3, 10),
(131, 'Đá Xay Dưa Hấu', 11, '5f2d6ce4c67139baf2bcc-edcd-4016-bfbd-1e1a2c7255c9.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Bột trà xanh nhập khẩu từ Nhật đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 08:01:56', '2020-08-07 08:01:56', 'ok', 7, 10),
(132, 'Đá Xay Chanh Leo', 11, '5f2d6d64032421cad0950-e519-45ce-9eff-d610329e2a74.jpg', 28000, '1 Ngày', 'Không', 'Mới', 1, 'Bột trà xanh nhập khẩu từ Nhật đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng.', 12345, '2020-08-07 08:04:04', '2020-08-07 08:04:04', 'ok', 3, 10),
(133, 'Nước Ép Cam', 6, '5f2d6d9515a850a14a739-ba3c-4f3b-a7ae-2cf22cc7f50d.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Cam có nhiều Vitamin C tự nhiên tăng cường hệ miễn dịch. Hãy bổ sung một cốc nước cam mỗi ngày giúp bạn tăng cường hệ miễn dịch và bổ sung vitamin phòng tránh các dịch bệnh đang tràn lan hiện nay.', 12345, '2020-08-07 08:04:53', '2020-08-07 08:04:53', 'ok', 7, 10),
(134, 'Nước Ép Dưa Hấu', 6, '5f2d6dc07051f9baf2bcc-edcd-4016-bfbd-1e1a2c7255c9.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Giúp loại bỏ lượng cholesterol thừa ra khỏi cơ thể, làm cho cơ rắn chắc, chứa các loại vitamin (B6, A, C) & chất dinh dưỡng giúp da chậm lão hóa.', 12345, '2020-08-07 08:05:36', '2020-08-07 08:05:36', 'ok', 7, 10),
(135, 'Nước ép Cóc', 6, '5f2d6dea4020e2efaedf9-0546-4218-b851-b1185249cc62.jpeg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Nước ép cóc đối với sức khỏe: Kích thích hệ tiêu hóa giúp ăn ngon miệng. Trị cảm cúm, ngăn ngừa tác nhân gây ung thư & trị tiểu đường. Bổ sung máu cho người bị thiếu máu. Nước ép cóc còn có tác dụng l', 12345, '2020-08-07 08:06:18', '2020-08-07 08:06:18', 'ok', 7, 10),
(136, 'Nước ép Dứa', 6, '5f2d6e0d828af0fec37ec-0723-4243-a783-51774e5be2fe.jpg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Dứa có đặc tính kháng viêm, chữa lành vết bầm tím và làm giảm đau viêm khớp. Dứa cũng hỗ trợ rất tốt cho việc tiêu hóa.', 12345, '2020-08-07 08:06:53', '2020-08-07 08:06:53', 'ok', 7, 10),
(137, 'Nước ép táo', 6, '5f2d6e30089653a0bd307-cadd-43ee-81a5-583bb0e5fcc2.jpg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Đối với nam giới, táo có tác dụng bổ thận tráng dương, trị rối loạn cương, di tinh, phì đại tuyến tiền liệt... Táo cũng có tác dụng phòng tăng huyết áp, xơ cứng động mạch, cũng là thức ăn lý tưởng cho', 12345, '2020-08-07 08:07:28', '2020-08-07 08:07:28', 'ok', 7, 10),
(138, 'Nước ép ổi', 2, '5f2d6e50a4ac32efaedf9-0546-4218-b851-b1185249cc62.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Ổi chứa rất nhiều vitami tốt cho hệ tiêu hóa và làm đẹp da. Uống nước ép ổi thường xuyên cũng giúp giảm cân hiệu quả.', 12345, '2020-08-07 08:08:00', '2020-08-07 08:08:00', 'ok', 3, 9),
(139, 'Nước ép chanh leo', 6, '5f2d6e79863a98cd67d24-b163-4ded-8137-ac6be7ce3013.jpg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Chanh leo tươi, thơm ngon, lọc bỏ hạt. Khách đặt mới làm + đá bào xay. Cốc nhựa của SG không phải nhựa tái sinh, đảm bảo an toàn sức khỏe', 12345, '2020-08-07 08:08:41', '2020-08-07 08:08:41', 'ok', 7, 10),
(140, 'Nước Ép Cà Rốt', 6, '5f2d6ea0cc39911b4955a-9842-4f1c-85da-5a0509a0333f.jpg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Giảm cân hiệu quả, chất sơ trong cà rốt giúp cải thiện hệ tiêu hóa, giảm mỡ bụng, mỡ đùi trong thời gian ngắn & giúp bạn tăng cường thị lực.', 12345, '2020-08-07 08:09:20', '2020-08-07 08:09:20', 'ok', 3, 10),
(141, 'Nước Ép Dưa Leo', 6, '5f2d6ec4e9c701b02ec34-4c68-4479-985e-75d06d3911e9.jpg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Ngoài tác dụng trị viêm loét dạ dày, dưa leo còn được nghiên cứu là có khả năng loại bỏ chất độc, giảm mỡ bụng nhanh chóng.', 12345, '2020-08-07 08:09:56', '2020-08-07 08:09:56', 'ok', 3, 10),
(142, 'Nước Ép Khổ Qua (Mướp Đắng)', 6, '5f2d6ee46ae3e2efaedf9-0546-4218-b851-b1185249cc62.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Chứa nhiều chất dinh dưỡng như: beta-carotene, lượng canxi, lượng potassium. Sở hữu đa dạng các vitamin, phốt pho & chất xơ giúp giảm cân hiệu quả.', 12345, '2020-08-07 08:10:28', '2020-08-07 08:10:28', 'ok', 7, 10),
(143, 'Nước Ép Cà Chua', 6, '5f2d6f0f00a3926a0ac9b-8edd-4ab0-be39-dd6328719024.jpeg', 24000, '1 Ngày', 'Không', 'Mới', 1, 'Nước ép cà chua là nguồn cung cấp vitamin A và C rất tốt, giúp vô hiệu hóa các gốc tự do gây nên bệnh ung thư, tim mạch và lão hóa da.', 12345, '2020-08-07 08:11:11', '2020-08-07 08:11:11', 'ok', 7, 10),
(144, 'Sinh Tố Chanh Leo', 4, '5f2d6fcbbf53e8cd67d24-b163-4ded-8137-ac6be7ce3013.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Chanh leo tươi ngon, sinh tố có vị thơm đặc biệt & khác biệt, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo an toàn s', 12345, '2020-08-07 08:14:19', '2020-08-07 08:14:19', 'ok', 7, 10),
(145, 'Sinh Tố Kem Tươi Xoài', 4, '5f2d6fffdc48991bace48-5fcb-48af-85cf-430ff64d09a8.jpg', 40000, '1 Ngày', 'Không', 'Mới', 1, 'Xoài cát chu xay nhuyễn với kem tươi thơm ngon.', 98878, '2020-08-07 08:15:11', '2020-08-07 08:15:11', 'ok', 7, 10),
(146, 'Việt Quất Cream', 4, '5f2d703412a1de0946ba5-8eab-4f29-b402-1616b860c6b8.jpg', 44000, '1 Ngày', 'Không', 'Mới', 1, 'Mứt Việt Quất Osternerg chính hãng thơm ngon, kem tươi Anchor, khách đặt mới làm. Cốc nhựa của C.ty Đức Anh, không phải nhựa tái chế, đảm bảo sức khỏ', 12345, '2020-08-07 08:16:04', '2020-08-07 08:16:04', 'ok', 3, 10),
(147, 'Sinh Tố Nho', 4, '5f2d70569a73f19e76c7a-0f84-4b9c-832f-4a7d2fb96565.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, 'Mứt Nho đen nhập khẩu thơm ngon, đảm bảo chất lượng, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo sức khỏe cộng đồng', 12345, '2020-08-07 08:16:38', '2020-08-07 08:16:38', 'ok', 3, 10),
(148, 'Sinh Tố Táo', 4, '5f2d7082027f6f84eca27-e753-4b94-ad4b-68576e2349d6.jpg', 32000, '1 Ngày', 'Không', 'Mới', 1, '“Một ngày một quả táo, thầy thuốc không đến nhà\". Táo giúp cải thiện vóc dáng & làn da, táo còn góp phần giảm nguy cơ mắc các bệnh tim mạch...', 12345, '2020-08-07 08:17:22', '2020-08-07 08:17:22', 'ok', 3, 10),
(149, 'Sinh Tố Cam - Sữa Chua', 2, '5f2d70b1c6a9990f07dfa-18c4-4b63-9b9f-ac3d58a12c82.jpg', 41000, '1 Ngày', 'Không', 'Mới', 1, 'Cam cung cấp vitamin C. Sữa chua là món ăn hỗ trợ tiêu hóa tốt, thích hợp trong mùa hè nóng nực hiện nay. Sữa chua cam còn giúp đẹp da nữa.', 12345, '2020-08-07 08:18:09', '2020-08-07 08:18:09', 'ok', 3, 9),
(150, 'Sinh Tố Chuối Sữa Chua', 4, '5f2d70de0b6943a0bd307-cadd-43ee-81a5-583bb0e5fcc2.jpg', 44000, '1 Ngày', 'Không', 'Mới', 1, 'Chuối tây tươi ngon + sữa chua Vinamilk,khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo an toàn sức khỏe cho cộng đồng.', 12345, '2020-08-07 08:18:54', '2020-08-07 08:18:54', 'ok', 3, 10),
(151, 'Sinh Tố Chuối Xoài Dứa', 4, '5f2d71086e3622b0be41b-16a6-467d-84bb-36aa625b5c46.jpeg', 44000, '1 Ngày', 'Không', 'Mới', 1, 'Chuối + Xoài + Dứa tươi ngon, khách đặt mới làm. Cốc đựng của SG, không phải nhựa tái chế, đảm bảo an toàn sức khỏe cho cộng đồng.', 12345, '2020-08-07 08:19:36', '2020-08-07 08:19:36', 'ok', 3, 10),
(152, 'Sinh Tố Cam - Carot - Sữa Chua', 4, '5f2d712becb014a91c357-05e5-48d8-9166-aa8a4f311688.jpg', 44000, '1 Ngày', 'Không', 'Mới', 1, 'Cam cung cấp vitamin C, cà rốt giàu vitamin A sẽ giúp bạn có một làm da đẹp. Vào ngày hè nắng nóng được thưởng thức cốc sinh tố, sữa chua như thế này thật tuyệt.', 12345, '2020-08-07 08:20:11', '2020-08-07 08:20:11', 'ok', 3, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(191) NOT NULL,
  `pro_image` varchar(191) NOT NULL,
  `pro_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_sale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`id`, `pro_name`, `pro_image`, `pro_created_at`, `pro_updated_at`, `pro_sale`) VALUES
(3, 'Khuyến Mãi 30%', '5f1a68721eabcimages.jpeg', '2020-07-23 21:49:54', '2020-08-05 06:08:14', 0.3),
(4, 'Tri Ân Khách Hàng', '5f1a6896dd1fbimages (1).jpeg', '2020-07-23 21:50:30', '2020-08-05 06:08:23', 0.1),
(5, 'Chương Trình Big Sale', '5f1a68fe8c3a5images (2).jpeg', '2020-07-23 21:52:14', '2020-08-05 06:08:38', 1),
(6, 'Chương Trình Khuyến Mãi Lớn', '5f1a695b317bddownload (4).jpeg', '2020-07-23 21:53:47', '2020-08-05 06:08:44', 0.3),
(7, 'Không', '', '2020-08-07 06:20:15', '2020-08-07 06:20:15', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademark`
--

CREATE TABLE `trademark` (
  `id` int(11) NOT NULL,
  `trade_image` varchar(191) NOT NULL,
  `trade_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trademark`
--

INSERT INTO `trademark` (`id`, `trade_image`, `trade_name`) VALUES
(9, '5f2d515e63decdownload.jpeg', 'Gong Cha'),
(10, '5f2d516bb2944download (1).jpeg', 'Huy Cafe'),
(11, '5f2d518341ca5download (1).jpeg', 'Highland Coffee'),
(12, '5f2d51a9c16addownload.jpeg', 'Ding-tea');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `trademark`
--
ALTER TABLE `trademark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
