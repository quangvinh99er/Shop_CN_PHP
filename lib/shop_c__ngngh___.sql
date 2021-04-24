-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2021 lúc 03:34 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_côngnghệ`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', 'a906449d5769fa7361d7ecc6aa3f6d28', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(255) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'Sony'),
(3, 'Asus'),
(4, 'Samsung'),
(5, 'Qualcomm'),
(6, 'Microsoft'),
(7, 'Apple'),
(8, 'Intel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(255) NOT NULL,
  `productId` int(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `quantity`, `sId`, `image`, `price`, `productName`) VALUES
(1, 2, '4', 'dgt0nfpukimfi8elu6a1rk59fi', 'e781186ef9.jpg', '5099999', 'Snapdragon 885'),
(2, 2, '6', 'dgt0nfpukimfi8elu6a1rk59fi', 'e781186ef9.jpg', '5099999', 'Snapdragon 885'),
(3, 2, '9999', 'l9l1eb2ife32tngd46k8c38s34', 'e781186ef9.jpg', '5099999', 'Snapdragon 885'),
(4, 2, '8', 'r6cv9osg8kn5pkt5kpbcag27pg', 'e781186ef9.jpg', '5099999', 'Snapdragon 885'),
(5, 8, '1', '77dqm2kdcdofisja8c55orougl', '7f0f37b59f.jpg', '949000', 'VGA ASUS GT710'),
(33, 8, '1', 'ag3h715gb97ta8b0kdu3ve7j1d', '7f0f37b59f.jpg', '949000', 'VGA ASUS GT710'),
(41, 8, '1', '3edrg8fkpp7h7bu4d6jvkllgbo', '7f0f37b59f.jpg', '949000', 'VGA ASUS GT710');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(255) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, 'Ổ cứng'),
(4, 'Chíp xử lý'),
(5, 'Card đồ họa'),
(6, 'Mainboard'),
(7, 'Màn hình'),
(8, 'RAM'),
(9, 'Nguồn máy tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `Id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `citty` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` int(30) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`Id`, `name`, `address`, `citty`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(5, 'Nguyen Van Linh', '320/ Lê Hồng Phong Q.8', 'Tp.Thủ Dầu Một', 'TPHCM', 820001, 12346789, 'quangvinh99er@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28'),
(6, 'Trần Văn Nhớ', '213/5 Lê Hồng Phong ', 'Ninh Bình', 'TTH', 66000, 975634124, 'motthoidenho@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28'),
(7, 'nguyễn quang vinh', '320/ Lê hồng phong', 'Thủ Dầu một', 'TPHCM', 75000, 378413472, 'quangvinh99ere@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28'),
(8, 'vinh', '234 AN LINH', 'tp.hcm', 'TPHCM', 78976, 8765432, 'ABC123@GMAIL.COM', 'bbf2dead374654cbb32a917afd236656');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(18, 12, ' AcBel iPower G650 ', 7, 9, '8991000', '7104d42a19.jpg', 1, '2021-02-19 09:48:28'),
(21, 13, 'Chíp SnapDragron 885+', 8, 1, '6000000', 'fdf32497fd.png', 1, '2021-02-27 12:24:30'),
(24, 13, 'Chíp SnapDragron 885+', 5, 1, '6000000', 'fdf32497fd.png', 0, '2021-03-05 10:41:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `brandId` int(255) NOT NULL,
  `catId` int(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `brandId`, `catId`, `product_desc`, `price`, `type`, `image`) VALUES
(7, 'Intel Core i5-9400F', 8, 4, '<p><span>Bộ vi xử l&yacute; thế hệ thứ 9 mới nhất đến từ&nbsp;</span><strong>Intel Core I5-9400F</strong><span>&nbsp;Coffee Lake Refresh thuộc ph&acirc;n kh&uacute;c người d&ugrave;ng phổ th&ocirc;ng, hiệu năng mạnh mẽ, đ&aacute;p ứng đầy đủ nhu cầu chơi ', '3590000', '1', '6c64adcb47.jpg'),
(8, 'VGA ASUS GT710', 6, 5, '<p><span>Tản nhiệt độc quyền do ASUS thiết kế với diện t&iacute;ch bề mặt lớn l&agrave;m m&aacute;t hiệu quả c&aacute;c card đồ họa, do đ&oacute; ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; &acirc;m thanh n&agrave;o được tạo ra khi chạy &ndash; ho&amp;a', '949000', '1', '7f0f37b59f.jpg'),
(12, ' AcBel iPower G650 ', 4, 9, '<p><span>AcBel&nbsp;l&agrave; tập đo&agrave;n c&ocirc;ng nghệ to&agrave;n cầu c&oacute; trụ sở tại Đ&agrave;i Loan chuy&ecirc;n ph&aacute;t triển, sản xuất v&agrave; b&aacute;n h&agrave;ng h&agrave;ng đầu về c&aacute;c giải ph&aacute;p quản l&yacute; năng', '999000', '1', '7104d42a19.jpg'),
(13, 'Chíp SnapDragron 885+', 5, 4, '<p><span>Dựa tr&ecirc;n c&aacute;c th&ocirc;ng tin mới nhất, ROG Phone 2 được trang bị m&agrave;n h&igrave;nh AMOLED với tần số qu&eacute;t 120Hz v&agrave; thiết kế kh&ocirc;ng c&oacute; nhiều thay đổi so với thiết bị tiền nhiệm. B&ecirc;n cạnh đ&oacute;,', '6000000', '1', 'fdf32497fd.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_Image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_Image`, `type`) VALUES
(2, 'sl1', '8adbf08c22.jpg', 0),
(3, 'sl2', '69058a91f1.jpg', 0),
(4, 'sl3', '61908b42a9.jpg', 1),
(5, 'sl4', 'db1153fd9b.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
