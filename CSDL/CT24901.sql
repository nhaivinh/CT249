-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2022 lúc 02:39 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct24901`
--
CREATE DATABASE IF NOT EXISTS `ct24901` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ct24901`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID_User` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Quyen_han` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID_User`, `Username`, `Password`, `Quyen_han`) VALUES
(1, 'minhluu2608', '123', 'Owner'),
(2, 'minhb1805890', '123', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_user`
--

CREATE TABLE `address_user` (
  `ID_User` int(11) NOT NULL,
  `Diachi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address_user`
--

INSERT INTO `address_user` (`ID_User`, `Diachi`) VALUES
(1, '18/64c Xô Viết Nghệ Tĩnh, phường Tân An, quận Ninh Kiều, TP Cần Thơ'),
(2, '18/64c Xô Viết Nghệ Tĩnh, phường Tân An, quận Ninh Kiều, TP Cần Thơ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `case`
--

CREATE TABLE `case` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(20) NOT NULL,
  `Kieu_case` varchar(11) NOT NULL,
  `Mau` varchar(20) NOT NULL,
  `Kieu_mainboard` varchar(40) NOT NULL,
  `Chat_lieu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `case`
--

INSERT INTO `case` (`ID_LK`, `HangSX`, `Kieu_case`, `Mau`, `Kieu_mainboard`, `Chat_lieu`) VALUES
(22, 'Cooler Master', 'Mini Tower', 'Đen', 'Mini-ITX, Micro-ATX', 'Thép'),
(23, 'Cooler Master', 'Mid Tower', 'Đen', 'Micro-ATX, ATX', 'Thép'),
(24, 'Golden Field', 'Full Tower', 'Đen', 'Micro-ATX, ATX, Extended-ATX, ITX', 'Thép'),
(25, 'Cooler Master', 'Mid Tower', 'Trắng', 'Mini-ITX, Micro-ATX, ATX', 'Thép'),
(26, 'Jetek', 'Mid Tower', 'Trắng', 'ATX ', 'Thép');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdh`
--

CREATE TABLE `chitietdh` (
  `ID_DH` int(11) NOT NULL,
  `ID_LK` int(11) NOT NULL,
  `So_luong` int(11) NOT NULL CHECK (`So_luong` > 0),
  `Don_gia` int(11) NOT NULL CHECK (`Don_gia` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdh`
--

INSERT INTO `chitietdh` (`ID_DH`, `ID_LK`, `So_luong`, `Don_gia`) VALUES
(1, 2, 1, 4776000),
(2, 2, 1, 4776000),
(2, 1, 1, 2680000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cpu`
--

CREATE TABLE `cpu` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(30) NOT NULL,
  `Series` int(11) NOT NULL,
  `Core` int(11) NOT NULL,
  `Xung` varchar(20) NOT NULL,
  `Socket` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cpu`
--

INSERT INTO `cpu` (`ID_LK`, `HangSX`, `Series`, `Core`, `Xung`, `Socket`) VALUES
(4, 'Intel', 8, 4, '3.6GHz', '1151-v2'),
(1, 'Intel', 7, 2, '3.9GHz', '1151'),
(2, 'Intel      ', 7, 4, '3.4GHz - 3.8GHz', '1151'),
(5, 'AMD', 1, 6, '3.2GHz - 3.6GHz', 'AM4'),
(3, 'Intel', 10, 4, '3.6GHz - 4.30GHz', '1200');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `disk`
--

CREATE TABLE `disk` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(10) NOT NULL,
  `Chuan_ket_noi` varchar(10) NOT NULL,
  `Kich_thuoc` varchar(10) NOT NULL,
  `Dung_luong` varchar(10) NOT NULL,
  `Loai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `disk`
--

INSERT INTO `disk` (`ID_LK`, `HangSX`, `Chuan_ket_noi`, `Kich_thuoc`, `Dung_luong`, `Loai`) VALUES
(12, 'WD', 'SATA 3', '3.5\"', '1TB', 'HDD'),
(18, 'SEAGATE', 'SATA 3', '3.5\"', '3TB', 'HDD'),
(19, 'TRANSCEND', 'SATA 3', '2.5\"', '120GB', 'SSD'),
(20, 'TRANSCEND', 'SATA 3', '2.5\"', '240GB', 'SSD'),
(21, 'WD', 'M.2 SATA', 'M.2 2280', '120GB', 'SSD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID_DH` int(11) NOT NULL,
  `ID_User_KH` int(11) NOT NULL,
  `ID_User_QL` int(11) DEFAULT NULL,
  `Diachi_DH` varchar(500) NOT NULL,
  `Status_DH` varchar(30) NOT NULL,
  `Ngay_Dat` date DEFAULT NULL,
  `Ngay_Giao` date DEFAULT NULL CHECK (`Ngay_Dat` <= `Ngay_Giao`),
  `Tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_DH`, `ID_User_KH`, `ID_User_QL`, `Diachi_DH`, `Status_DH`, `Ngay_Dat`, `Ngay_Giao`, `Tong_tien`) VALUES
(1, 1, NULL, '18/64c Xô Viết Nghệ Tĩnh, phường Tân An, quận Ninh Kiều, TP Cần Thơ', 'Chờ xử lý', '2022-04-23', NULL, 4776000),
(2, 1, NULL, '18/64c Xô Viết Nghệ Tĩnh, phường Tân An, quận Ninh Kiều, TP Cần Thơ', 'Chờ xử lý', '2022-04-23', NULL, 7456000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gpu`
--

CREATE TABLE `gpu` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(20) NOT NULL,
  `Chip_do_hoa` varchar(30) NOT NULL,
  `VMemory` int(11) NOT NULL,
  `The_he_bo_nho` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gpu`
--

INSERT INTO `gpu` (`ID_LK`, `HangSX`, `Chip_do_hoa`, `VMemory`, `The_he_bo_nho`) VALUES
(13, 'MSI', 'NVIDIA GeForce GTX 1060', 6, 'GDDR5'),
(14, 'MSI', 'NVIDIA GeForce GTX 1050', 2, 'GDDR5'),
(15, 'GIGABYTE', 'AMD Radeon RX Vega 56', 8, 'HBM2'),
(16, 'GIGABYTE', 'GeForce GTX 1650', 4, 'GDDR6'),
(17, 'GIGABYTE', 'GeForce RTX 2060', 6, 'GDDR6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_user`
--

CREATE TABLE `info_user` (
  `ID_User` int(11) NOT NULL,
  `Hoten_User` varchar(200) DEFAULT NULL,
  `SoDT_User` varchar(15) DEFAULT NULL,
  `Email_User` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `info_user`
--

INSERT INTO `info_user` (`ID_User`, `Hoten_User`, `SoDT_User`, `Email_User`) VALUES
(1, 'Lưu Quang Minh', '0778178360', 'minhluu2608@gmail.com'),
(2, 'Lưu Quang Minh', '0778178360', 'minhb1805890@student.ctu.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhkien`
--

CREATE TABLE `linhkien` (
  `ID_LK` int(11) NOT NULL,
  `Ten_LK` varchar(200) NOT NULL,
  `Loai_LK` varchar(50) NOT NULL,
  `Gia_LK` int(11) NOT NULL CHECK (`Gia_LK` > 0),
  `Giam_gia` float NOT NULL DEFAULT 0 CHECK (`Giam_gia` >= 0 and `Giam_gia` < 1),
  `So_luong` int(11) NOT NULL CHECK (`So_luong` > 0),
  `Hinh_anh` varchar(255) NOT NULL,
  `Sale_Status` varchar(20) NOT NULL DEFAULT 'Đang bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `linhkien`
--

INSERT INTO `linhkien` (`ID_LK`, `Ten_LK`, `Loai_LK`, `Gia_LK`, `Giam_gia`, `So_luong`, `Hinh_anh`, `Sale_Status`) VALUES
(1, 'CPU Intel Core I3-7100 (3.9GHz)', 'CPU', 3350000, 0.2, 2, '../img/CPU Intel Core I3-7100 (3.9GHz).webp', 'Đang bán'),
(2, 'CPU Intel Core I5-7500 (3.4GHz - 3.8GHz)', 'CPU', 5970000, 0.2, 2, '../img/CPU Intel Core I5-7500 (3.4GHz - 3.8GHz).webp', 'Đang bán'),
(3, 'CPU INTEL i3-10100 (4C/8T, 3.60 GHz - 4.30 GHz, 6MB) - 1200', 'CPU', 4190000, 0.2, 5, '../img/CPU INTEL i3-10100 - 1200.webp', 'Đang bán'),
(4, 'CPU Intel Core I3-8100 (3.6GHz)', 'CPU', 3290000, 0.2, 6, '../img/CPU Intel Core I3-8100 (3.6GHz).webp', 'Đang bán'),
(5, 'CPU AMD Ryzen R5 1600 (3.2GHz - 3.6GHz)', 'CPU', 4990000, 0.2, 7, '../img/CPU AMD Ryzen R5 1600 (3.2GHz - 3.6GHz).webp', 'Đang bán'),
(6, 'Mainboard ASUS ROG STRIX B350-F GAMING', 'Mainboard', 3290000, 0.2, 8, '../img/Mainboard ASUS ROG STRIX B350-F GAMING.webp', 'Đang bán'),
(7, 'RAM desktop KINGMAX (1x4GB) DDR4 2400MHz', 'RAM', 650000, 0.2, 4, '../img/RAM desktop KINGMAX (1x4GB) DDR4 2400MHz.webp', 'Đang bán'),
(8, 'RAM desktop KINGMAX Zeus Dragon (1x16GB) DDR4 3000MHz', 'RAM', 2350000, 0.2, 2, '../img/RAM desktop KINGMAX Zeus Dragon (1x16GB) DDR4 3000MHz.webp', 'Đang bán'),
(9, 'RAM desktop KINGMAX (1x8GB) DDR4 2400MHz', 'RAM', 1250000, 0.2, 1, '../img/RAM desktop KINGMAX (1x8GB) DDR4 2400MHz.webp', 'Đang bán'),
(10, 'RAM desktop KINGMAX Zeus Dragon Heatsink (1 x 32GB) DDR4 3200MHz', 'RAM', 4790000, 0.2, 5, '../img/RAM desktop KINGMAX Zeus Dragon Heatsink (1 x 32GB) DDR4 3200MHz.webp', 'Đang bán'),
(11, 'RAM desktop AVEXIR Core (1x4GB) DDR4 2400MHz', 'RAM', 1269000, 0.2, 4, '../img/RAM desktop AVEXIR Core (1x4GB) DDR4 2400MHz.webp', 'Đang bán'),
(12, 'Ổ cứng HDD Western Digital Blue 1TB 3.5\" SATA 3 - WD10EZEX', 'disk', 930000, 0.2, 3, '../img/HDD Western Digital Blue 1TB SATA 3 - WD10EZEX.webp', 'Đang bán'),
(13, 'Card màn hình MSI GeForce GTX 1060 6GB GDDR5 Gaming X (GTX-1060-GAMING-X-6G)', 'GPU', 8300000, 0.2, 10, '../img/Card màn hình MSI GeForce GTX 1060 6GB GDDR5 Gaming X (GTX-1060-GAMING-X-6G).webp', 'Đang bán'),
(14, 'Card màn hình MSI GeForce GTX 1050 2GB GDDR5 OCV1 (GTX-1050-2GT-OCV1)', 'GPU', 2890000, 0.2, 15, '../img/Card màn hình MSI GeForce GTX 1050 2GB GDDR5 OCV1 (GTX-1050-2GT-OCV1).webp', 'Đang bán'),
(15, 'Card màn hình GIGABYTE Radeon RX Vega 56 8GB HBM2 Gaming OC', 'GPU', 12950000, 0.2, 5, '../img/Card màn hình GIGABYTE Radeon RX Vega 56 8GB HBM2 Gaming OC.webp', 'Đang bán'),
(16, 'Card màn hình GIGABYTE GeForce GTX 1650 D6 OC 4G (rev. 1.0) 4GB GDDR6', 'GPU', 6390000, 0.2, 6, '../img/Card màn hình GIGABYTE GeForce GTX 1650 D6 OC 4G (rev. 1.0) 4GB GDDR6.webp', 'Đang bán'),
(17, 'Card màn hình GIGABYTE GeForce RTX 2060 D6 6G 6GB GDDR6', 'GPU', 12990000, 0.2, 7, '../img/Card màn hình GIGABYTE GeForce RTX 2060 D6 6G 6GB GDDR6.webp', 'Đang bán'),
(18, 'Ổ cứng HDD Seagate Barracuda 3TB 3.5\" SATA 3 - ST3000DM007', 'disk', 2350000, 0.2, 8, '../img/HDD Seagate Barracuda 3TB SATA 3 - ST3000DM007.webp', 'Đang bán'),
(19, 'Ổ cứng SSD Transcend 220S 120GB 2.5\" SATA 3', 'disk', 650000, 0.2, 4, '../img/SSD Transcend 220S 120GB SATA 3.webp', 'Đang bán'),
(20, 'Ổ cứng SSD Transcend 220S 240GB 2.5\" SATA 3', 'disk', 1090000, 0.2, 4, '../img/SSD Transcend 220S 240GB SATA 3.webp', 'Đang bán'),
(21, 'Ổ cứng SSD Western Digital Green 120GB M.2 2280 SATA 3 - WDS120G2G0B', 'disk', 790000, 0.2, 3, '../img/Ổ cứng SSD Western Digital Green 120GB M.2 2280 SATA 3 - WDS120G2G0B.webp', 'Đang bán'),
(22, 'Case máy tính Cooler Master RC 343', 'Case', 830000, 0.2, 2, '../img/Case máy tính Cooler Master RC 343.webp', 'Đang bán'),
(23, 'Case máy tính Cooler Master RC K380', 'Case', 999000, 0.2, 2, '../img/Case máy tính Cooler Master RC K380.webp', 'Đang bán'),
(24, 'Case Golden Field Z21 (3 fans LED Rainbow)', 'Case', 1150000, 0.2, 2, '../img/Case Golden Field Z21 (3 fans LED Rainbow).webp', 'Đang bán'),
(25, 'Case máy tính Cooler Master MasterBox 5 White', 'Case', 1660000, 0.2, 1, '../img/Case máy tính Cooler Master MasterBox 5 White.webp', 'Đang bán'),
(26, 'Case máy tính Jetek G9311W - Mid Tower (Trắng)', 'Case', 670000, 0.2, 1, '../img/Case máy tính Jetek G9311W - Mid Tower (Trắng).webp', 'Đang bán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mainboard`
--

CREATE TABLE `mainboard` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(20) NOT NULL,
  `Socket` varchar(10) NOT NULL,
  `Chipset` varchar(10) NOT NULL,
  `Chuan_kich_thuoc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mainboard`
--

INSERT INTO `mainboard` (`ID_LK`, `HangSX`, `Socket`, `Chipset`, `Chuan_kich_thuoc`) VALUES
(6, 'ASUS', 'AM4', 'B350', 'ATX');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram`
--

CREATE TABLE `ram` (
  `ID_LK` int(11) NOT NULL,
  `HangSX` varchar(11) NOT NULL,
  `DDR` varchar(10) NOT NULL,
  `Dung_luong` int(11) NOT NULL,
  `Bus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ram`
--

INSERT INTO `ram` (`ID_LK`, `HangSX`, `DDR`, `Dung_luong`, `Bus`) VALUES
(7, 'KINGMAX', '4', 4, 2400),
(8, 'KINGMAX', '4', 16, 3000),
(9, 'KINGMAX', '4', 8, 2400),
(10, 'KINGMAX', '4', 32, 3200),
(11, 'AVEXIR', '4', 4, 2400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_cart`
--

CREATE TABLE `user_cart` (
  `ID_User` int(11) NOT NULL,
  `ID_LK` int(11) NOT NULL,
  `So_luong` int(11) NOT NULL CHECK (`So_luong` > 0),
  `Don_gia` int(11) NOT NULL CHECK (`Don_gia` > 0),
  `Tong` int(11) NOT NULL CHECK (`Don_gia` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_User`);

--
-- Chỉ mục cho bảng `address_user`
--
ALTER TABLE `address_user`
  ADD KEY `ID_User` (`ID_User`);

--
-- Chỉ mục cho bảng `case`
--
ALTER TABLE `case`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD KEY `ID_DH` (`ID_DH`),
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `cpu`
--
ALTER TABLE `cpu`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `disk`
--
ALTER TABLE `disk`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_DH`),
  ADD KEY `ID_User_KH` (`ID_User_KH`),
  ADD KEY `ID_User_QL` (`ID_User_QL`);

--
-- Chỉ mục cho bảng `gpu`
--
ALTER TABLE `gpu`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `info_user`
--
ALTER TABLE `info_user`
  ADD KEY `ID_User` (`ID_User`);

--
-- Chỉ mục cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  ADD PRIMARY KEY (`ID_LK`);

--
-- Chỉ mục cho bảng `mainboard`
--
ALTER TABLE `mainboard`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `ram`
--
ALTER TABLE `ram`
  ADD KEY `ID_LK` (`ID_LK`);

--
-- Chỉ mục cho bảng `user_cart`
--
ALTER TABLE `user_cart`
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_LK` (`ID_LK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_DH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  MODIFY `ID_LK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address_user`
--
ALTER TABLE `address_user`
  ADD CONSTRAINT `address_user_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `account` (`ID_User`);

--
-- Các ràng buộc cho bảng `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD CONSTRAINT `chitietdh_ibfk_1` FOREIGN KEY (`ID_DH`) REFERENCES `donhang` (`ID_DH`),
  ADD CONSTRAINT `chitietdh_ibfk_2` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `disk`
--
ALTER TABLE `disk`
  ADD CONSTRAINT `disk_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ID_User_KH`) REFERENCES `account` (`ID_User`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`ID_User_QL`) REFERENCES `account` (`ID_User`);

--
-- Các ràng buộc cho bảng `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `info_user`
--
ALTER TABLE `info_user`
  ADD CONSTRAINT `info_user_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `account` (`ID_User`);

--
-- Các ràng buộc cho bảng `mainboard`
--
ALTER TABLE `mainboard`
  ADD CONSTRAINT `mainboard_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);

--
-- Các ràng buộc cho bảng `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `account` (`ID_User`),
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`ID_LK`) REFERENCES `linhkien` (`ID_LK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
