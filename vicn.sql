-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 12:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicn`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_name`, `pass`, `type`, `email`) VALUES
(1, 'admin', '212361198', 1, '9b17bd813c6019332019e6b7a86d80ed'),
(7, 'Chien', '123', 0, 'leminhchien2611@gmail.com'),
(8, 'hiepdt', 'hiepdt123', 0, 'peghost9@gmail.com'),
(15, 'xuanloi', '123', 0, 'ngoxuanloi2011@gmail.com'),
(16, 'em bé', '0399346747Phuong', 0, 'hotphuong19322@gmail.com'),
(19, 'chungdi', '212361198', 0, 'nhatvichung@gmail.com'),
(21, 'bao', '1234', 0, 'legiabao.0937298830@gmail.com'),
(26, 'vi', '123', 0, 'nhatvi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `price` double(10,0) NOT NULL,
  `name_pro` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_order`, `id_pro`, `amount`, `price`, `name_pro`, `img`) VALUES
(151, 'VICN94189', 0, 1, 26000, 'Instant Milk Tea - Strawberry', 'Instant_Milk_Tea_-_Strawberry_Stawberry-Milk-Tea.jpg'),
(152, 'VICN52164', NULL, 1, 26000, 'Instant Milk Tea - Strawberry', 'Instant_Milk_Tea_-_Strawberry_Stawberry-Milk-Tea.jpg'),
(153, 'VICN52164', NULL, 1, 165000, 'Instant Milk Tea - Strawberry - Set 6 ly', 'Instant_Milk_Tea_-_Strawberry_-_Set_6_ly_6ly_hong.png'),
(154, 'VICN2677', NULL, 1, 31000, 'Trà sữa bạc hà', 'Trà_sữa_bạc_hà_Tra-Sua-Dau-Tay-2-copy.jpg'),
(155, 'VICN2677', NULL, 1, 10000, 'Instant Milk Tea - Original', 'Instant_Milk_Tea_-_Original_Original-Milk-Tea.jpg'),
(156, 'VICN2677', NULL, 2, 31000, 'Trà sữa socola', 'Trà_sữa_socola_Tra-Sua-Socola-1-copy.jpg'),
(157, 'VICN2677', NULL, 1, 31000, 'Trà dâu tằm pha lê tuyết', 'Trà_dâu_tằm_pha_lê_tuyết_Tra-Dau-Tam-Pha-Le-Tuyet-2-copy.jpg'),
(158, 'VICN2677', NULL, 1, 31000, 'Trà sữa ô long', 'Trà_sữa_ô_long_Tra-O-Long-Sua-2-copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_cate`, `status`) VALUES
(1, 'Món-nổi-bật', 1),
(2, 'Trà-sữa', 1),
(3, 'Fresh-Fruit-Tea', 1),
(4, 'Machiato-Cream-Cheese', 1),
(5, 'Sữa-chua-dẻo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `name_pro` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_name`, `name_pro`, `content`, `time`) VALUES
(37, 'admin', 'Instant Milk Tea - Strawberry', 'ádasdasdasd', '2022/10/11 at 11:42:22'),
(38, 'admin', 'Instant Milk Tea - Original', 'rất tuyệt =))\r\n', '2022/10/11 at 11:43:00'),
(39, 'admin', 'Instant Milk Tea - Original', 'ácxzczxc', '2022/10/11 at 11:53:58'),
(40, 'admin', 'Instant Milk Tea - Strawberry', 'xczxczxc', '2022/10/11 at 11:54:15'),
(41, 'admin', 'Trà sữa truyền thống', 'xzczxczxc', '2022/10/11 at 11:54:25'),
(42, 'vi', 'Instant Milk Tea - Strawberry - Set 6 ly', 'rất ngon ạ\r\n', '2022/10/11 at 16:27:35'),
(43, 'admin', 'Instant Milk Tea - Strawberry', 'ádasdasd', '2022/10/11 at 16:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_payment`
--

CREATE TABLE `order_payment` (
  `id` int(11) NOT NULL,
  `code_order` varchar(20) NOT NULL,
  `total_order` double(10,0) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number_phone` int(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_payment`
--

INSERT INTO `order_payment` (`id`, `code_order`, `total_order`, `payment_method`, `id_user`, `user_name`, `address`, `email`, `number_phone`, `status`) VALUES
(1, 'VICN2677', 165000, 'Thanh toán ngân hàng', NULL, 'Trung', 'tổ 3, khu phố 6, thị trấn Chơn Thành, huyện Chơn Thành, tỉnh Bình Phước', 'nhatvichung@gmail.com', 366858660, 0),
(2, 'VICN52164', 191000, 'Thanh toán khi nhận\r\n                        hàng', NULL, 'chung di', 'tổ 3, khu phố 6, thị trấn Chơn Thành, huyện Chơn Thành, tỉnh Bình Phước', 'nhatvichung@gmail.com', 366858660, 1),
(3, 'VICN94189', 26000, 'Thanh toán MOMO', 0, 'Chung Nhựt Vi', 'tổ 3, khu phố 6, thị trấn Chơn Thành, huyện Chơn Thành, tỉnh Bình Phước', 'nhatvichung@gmail.com', 366858660, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title_posts` varchar(100) NOT NULL,
  `content_posts` varchar(1000) NOT NULL,
  `img_posts` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title_posts`, `content_posts`, `img_posts`) VALUES
(2, 'vicn', 'sdafdvzxcvcxvsdfwefdsfsdfasdf', 'VICNanh.jpg'),
(5, 'Cau-Phu-Cuong', 'dfsdfsdfasfsdf', 'VICNIMG_7513.JPG'),
(7, 'Team-building', 'một ngày đáng nhớ\r\n', 'VICNIMG_3800.jpg'),
(8, 'Team-building-FPT-polytechnic', '10/10/2022', 'VICNNAK_3081.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name_pro` varchar(100) NOT NULL,
  `price` double(10,0) NOT NULL,
  `del` double(10,0) DEFAULT NULL,
  `name_cate` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_pro`, `price`, `del`, `name_cate`, `img`) VALUES
(68, 'Trà xanh sữa vị nhài', 31000, 0, 'Trà-sữa', 'Trà_xanh_sữa_vị_nhài_ezgif.com-gif-maker-15.jpg'),
(69, 'Trà sữa matcha', 31000, 0, 'Trà-sữa', 'Trà_sữa_matcha_Tra-Sua-Matcha-1-copy.jpg'),
(70, 'Trà sữa ô long', 31000, 0, 'Trà-sữa', 'Trà_sữa_ô_long_Tra-O-Long-Sua-2-copy.jpg'),
(71, 'Trà sữa socola', 31000, 0, 'Trà-sữa', 'Trà_sữa_socola_Tra-Sua-Socola-1-copy.jpg'),
(72, 'Trà sữa bạc hà', 31000, 0, 'Trà-sữa', 'Trà_sữa_bạc_hà_Tra-Sua-Dau-Tay-2-copy.jpg'),
(73, 'Trà sữa truyền thống', 31000, 0, 'Trà-sữa', 'Trà_sữa_truyền_thống_Tra-Sua-1-copy.jpg'),
(74, 'Ô long xoài kem cà phê', 31000, 0, 'Machiato-Cream-Cheese', 'Ô_long_xoài_kem_cà_phê_O-Long-xoai-kem-coffee.jpg'),
(75, 'Trà đào bưởi hồng trân châu baby', 31000, 0, 'Fresh-Fruit-Tea', 'Trà_đào_bưởi_hồng_trân_châu_baby_Tra-dao-buoi-hong-tran-chau-baby.jpg'),
(76, 'Trà xoài bưởi hồng', 31000, 0, 'Fresh-Fruit-Tea', 'Trà_xoài_bưởi_hồng_trà-xoài-bưởi-hồng.png'),
(77, 'Probi bưởi trân châu sương mai', 31000, 0, 'Fresh-Fruit-Tea', 'Probi_bưởi_trân_châu_sương_mai_ezgif.com-gif-maker-2.jpg'),
(78, 'Probi xoài trân châu sương mai', 31000, 0, 'Fresh-Fruit-Tea', 'Probi_xoài_trân_châu_sương_mai_ezgif.com-gif-maker-3.jpg'),
(79, 'Trà xanh xoài', 31000, 0, 'Fresh-Fruit-Tea', 'Trà_xanh_xoài_tra_xanh_xoai_35d69664c31248faaf3eeade044035ba_grande.jpg'),
(80, 'Trà dâu tằm pha lê tuyết', 31000, 0, 'Fresh-Fruit-Tea', 'Trà_dâu_tằm_pha_lê_tuyết_Tra-Dau-Tam-Pha-Le-Tuyet-2-copy.jpg'),
(81, 'Hồng trà bưởi mật ong', 31000, 0, 'Fresh-Fruit-Tea', 'Hồng_trà_bưởi_mật_ong_ezgif.com-gif-maker-7.jpg'),
(82, 'Trà xoài bưởi hồng kem phô mai', 31000, 0, 'Machiato-Cream-Cheese', 'Trà_xoài_bưởi_hồng_kem_phô_mai_trà-xoài-bưởi-hồng-kem-phô-mai.png'),
(83, 'Choco ngũ cốc kem cafe', 31000, 0, 'Machiato-Cream-Cheese', 'Choco_ngũ_cốc_kem_cafe_Hình-ảnh-sp-website_1000x1000_choco-ngũ-cốc-kem-cafe.png'),
(84, 'Hồng trà ngũ cốc kem cafe', 31000, 0, 'Machiato-Cream-Cheese', 'Hồng_trà_ngũ_cốc_kem_cafe_Hình-ảnh-sp-website_1000x1000_hồng-trà-ngũ-cốc-kem-cafe.png'),
(85, 'Dâu tằm kem phô mai', 31000, 0, 'Machiato-Cream-Cheese', 'Dâu_tằm_kem_phô_mai_Dau-Tam-Kem-Pho-Mai-2-copy.jpg'),
(86, 'Trà xanh kem phô mai', 31000, 0, 'Machiato-Cream-Cheese', 'Trà_xanh_kem_phô_mai_Tra-Xanh-Kem-Pho-Mai-2-copy.jpg'),
(87, 'Matcha kem phô mai', 31000, 0, 'Machiato-Cream-Cheese', 'Matcho_kem_phô_mai_matcha-kem-pho-mai_09b3b54997614aea86d2b61bcd7f548c_73a9e7cd539949718b13b06c5db9522f_grande.png'),
(88, 'Hồng trà kem phô mai', 31000, 0, 'Machiato-Cream-Cheese', 'Hồng_trà_kem_phô_mai_Hong-Tra-Kem-Pho-Mai-2-copy.jpg'),
(89, 'Sữa chua dâu tằm hoàng kim', 31000, 0, 'Sữa-chua-dẻo', 'Sữa_chua_dâu_tằm_hoàng_kim_sua-chua-dau-tam-hoang-kim.png'),
(90, 'Sữa chua dâu tằm hạt dẻ', 31000, 0, 'Sữa-chua-dẻo', 'Sữa_chua_dâu_tằm_hạt_dẻ_sua-chua-dau-tam-hat-de-.png'),
(91, 'Sữa chua trắng', 31000, 0, 'Sữa-chua-dẻo', 'Sữa_chua_trắng_sua-chua-trang-.png'),
(92, 'Instant Milk Tea - Strawberry - Set 6 ly', 165000, 0, 'Món-nổi-bật', 'Instant_Milk_Tea_-_Strawberry_-_Set_6_ly_6ly_hong.png'),
(93, 'Instant Milk Tea - Original - Set 6 ly', 160000, 0, 'Món-nổi-bật', 'Instant_Milk_Tea_-_Original_-_Set_6_ly_6ly_vang.png'),
(94, 'Instant Milk Tea - Strawberry', 26000, 0, 'Món-nổi-bật', 'Instant_Milk_Tea_-_Strawberry_Stawberry-Milk-Tea.jpg'),
(95, 'Instant Milk Tea - Original', 25000, 10000, 'Món-nổi-bật', 'Instant_Milk_Tea_-_Original_Original-Milk-Tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name_store` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `map` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name_store`, `address`, `province`, `map`) VALUES
(1, 'ToCo – 201 Điện Biên Phủ', '201 Điện Biên Phủ, Bình Thạnh', 'Bình Thạnh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1489645954985!2d106.70387107911776!3d10.799900692343275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ba2cacdc4d%3A0x6df89cafea0e8480!2sTocoToco!5e0!3m2!1svi!2s!4v1665475360932!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(2, 'ToCo –  302 Điện Biên Phủ', '302 Điện Biên Phủ, Bình Thạnh', 'Bình Thạnh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1547018029337!2d106.70490267911777!3d10.799460992343587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b0a1a934c5%3A0x277316efa5acf7cd!2zMzAyIMSQaeG7h24gQmnDqm4gUGjhu6csIFBoxrDhu51uZyAxNywgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1665476934418!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(3, 'ToCo – Nguyễn Duy Trinh', '537 Nguyễn Duy Trinh Quận 2', 'Quận 2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7838.579398464547!2d106.76013327398435!3d10.789109669251594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175273fce5fb86b%3A0x173ac6aad6c97353!2sToCoToCo%20537E%20Nguy%E1%BB%85n%20Duy%20Trinh!5e0!3m2!1svi!2s!4v1665477000018!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(4, 'ToCo –  51 Quốc Hương', '51 Quốc Hương, P. Thảo Điền, Quận 2, TP. HCM', 'Quận 2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0791928082763!2d106.72907291471869!3d10.805246592301984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175272044260be3%3A0x2a0fde088da15850!2zVG9Db1RvQ28gUXXhu5FjIEjGsMahbmc!5e0!3m2!1svi!2s!4v1665477030656!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(5, 'ToCo – 23 Tôn Đản', '23 Tôn Đản, P. 13, Quận 4, TP. HCM', 'Quận 4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.652462482203!2d106.70560831471835!3d10.761244992331855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fc0d3b53895%3A0x6ca386d385b55867!2zVHLDoCBz4buvYSBUb2NvVG9jbyAyMyBUw7RuIMSQ4bqjbg!5e0!3m2!1svi!2s!4v1665477057761!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(6, 'ToCo – 50 Lê Quốc Hưng', '50 Lê Quốc Hưng, P.12, Quận 4', 'Quận 4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.605373996521!2d106.7011493147183!3d10.764865992329376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ff29e538e1d%3A0x6599da75a8e72b43!2zVHLDoCBz4buvYSBUb2NvVG9jbyA1MCBMw6ogUXXhu5FjIEjGsG5n!5e0!3m2!1svi!2s!4v1665477084009!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(7, 'ToCo – 02 Đường 41', 'Số 2 Đường D41, Phường 6, Quận 4, TPHCM', 'Quận 4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6914634539507!2d106.69806201471823!3d10.758244992333871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6d33e21d43%3A0x9e08c7271f185abf!2sTocotoco%20Qu%E1%BA%ADn%204!5e0!3m2!1svi!2s!4v1665477112457!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(8, 'ToCo – 56 Nguyễn Khoái', '56 Nguyễn Khoái, Q4', 'Quận 4', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7369510058256!2d106.69239211471836!3d10.754744992336288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f0dda9d5613%3A0x5a1f5cdec7c5e8c9!2zVHLDoCBz4buvYSBUb0NvVG9DbyA1NiBOZ3V54buFbiBLaG_DoWk!5e0!3m2!1svi!2s!4v1665477136157!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(9, 'ToCo – Bàu Cát', '128 Bàu Cát, Phường 14, quận Tân Bình', 'Tân Bình', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2505587224623!2d106.6406995147185!3d10.792111892310865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f92adeac87f%3A0x7f185b74b8c0eeb!2zVHLDoCBz4buvYSBUb2NvdG9jbyAtIDEyOCBCw6B1IEPDoXQ!5e0!3m2!1svi!2s!4v1665477159230!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade'),
(10, 'ToCo – 91 Nguyễn Sơn', '91 Nguyễn Sơn, Phú Thạnh, Tân Phú, Hồ Chí Minh', 'Tân Phú', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.384686035743!2d106.62751291471838!3d10.781820392317833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ff22218be3d%3A0xf165756297c7c834!2zVG9jb1RvY28gTmd1eeG7hW4gU8ahbg!5e0!3m2!1svi!2s!4v1665477184098!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_cate` (`name_cate`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_order` (`code_order`),
  ADD KEY `code_order_2` (`code_order`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_pro` (`name_pro`),
  ADD KEY `name_cate` (`name_cate`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`name_cate`) REFERENCES `category` (`name_cate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
