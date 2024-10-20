-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 03:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(4) NOT NULL,
  `a_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `a_username` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `a_password` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_username`, `a_password`) VALUES
(1, 'เจษฎา หลงกุล', 'admin1', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'เจษฎา มาแล้ว', 'admin2', 'd93591bdf7860e1e4ee2fca799911215');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(6) NOT NULL,
  `c_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'คอมตั้งโต๊ะ'),
(2, 'คอมพิวเตอร์ประกอบ'),
(3, 'เมาส์'),
(4, 'คีย์บอร์ด'),
(5, 'แผ่นรองเมาส์'),
(6, 'หูฟัง');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `address`, `phone`, `created_at`) VALUES
(2, 'kiw', 'kiww', 'kiw123', 'kiw2566@gmail.com', '$2y$10$s92qN5sTdfpZbmeveqc6Mus/jEEJJoypTqQKXV2c0h186zFn6c7iq', 'msu', '0658707816', '2024-10-08 06:25:01'),
(3, '้้ff', 'fff', 'ff123', 'kiw25667@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 'msu', '04265362656', '2024-10-08 06:46:25'),
(4, 'mark', 'naja', 'mark112', 'marl@1253', '$2y$10$Zf1ThXP36DBp4h5BX4qzhuY2DeKpDz2p7z0EOHq6PrQ8a/5jk/64u', 'msu', '098545414564', '2024-10-08 07:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(7) UNSIGNED ZEROFILL NOT NULL,
  `ototal` int(7) NOT NULL,
  `odate` datetime NOT NULL,
  `member_id` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `ototal`, `odate`, `member_id`) VALUES
(0000034, 26980, '2024-10-11 20:12:49', 0),
(0000033, 26980, '2024-10-11 20:12:49', 0),
(0000032, 26980, '2024-10-11 20:12:48', 0),
(0000031, 26980, '2024-10-11 20:12:48', 0),
(0000030, 26980, '2024-10-11 20:12:48', 0),
(0000029, 26980, '2024-10-11 20:12:46', 0),
(0000010, 0, '2024-10-11 19:51:26', 0),
(0000009, 0, '2024-10-11 19:51:20', 0),
(0000017, 26980, '2024-10-11 20:09:21', 0),
(0000018, 26980, '2024-10-11 20:09:21', 0),
(0000019, 26980, '2024-10-11 20:09:21', 0),
(0000020, 26980, '2024-10-11 20:09:22', 0),
(0000021, 26980, '2024-10-11 20:09:22', 0),
(0000022, 26980, '2024-10-11 20:09:22', 0),
(0000023, 26980, '2024-10-11 20:11:37', 0),
(0000024, 26980, '2024-10-11 20:11:38', 0),
(0000025, 26980, '2024-10-11 20:11:38', 0),
(0000026, 26980, '2024-10-11 20:11:38', 0),
(0000027, 26980, '2024-10-11 20:11:38', 0),
(0000028, 26980, '2024-10-11 20:11:39', 0),
(0000035, 26980, '2024-10-11 20:12:49', 0),
(0000036, 26980, '2024-10-11 20:12:50', 0),
(0000037, 26980, '2024-10-11 20:12:50', 0),
(0000038, 26980, '2024-10-11 20:12:50', 0),
(0000039, 26980, '2024-10-11 20:12:51', 0),
(0000040, 26980, '2024-10-11 20:12:52', 0),
(0000041, 26980, '2024-10-11 20:12:52', 0),
(0000042, 26980, '2024-10-11 20:12:53', 0),
(0000043, 26980, '2024-10-11 20:12:53', 0),
(0000044, 26980, '2024-10-11 20:12:53', 0),
(0000045, 26980, '2024-10-11 20:21:40', 0),
(0000046, 26980, '2024-10-11 20:22:52', 0),
(0000047, 26980, '2024-10-11 20:23:15', 0),
(0000048, 10990, '2024-10-11 20:25:17', 0),
(0000049, 10990, '2024-10-11 20:26:22', 0),
(0000050, 10990, '2024-10-11 20:27:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `od_id` int(6) NOT NULL,
  `oid` int(7) UNSIGNED ZEROFILL NOT NULL,
  `pid` int(7) NOT NULL,
  `item` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`od_id`, `oid`, `pid`, `item`) VALUES
(34, 0000019, 1, 1),
(33, 0000018, 2, 1),
(32, 0000018, 1, 1),
(31, 0000017, 2, 1),
(30, 0000017, 1, 1),
(29, 0000016, 2, 1),
(28, 0000016, 1, 1),
(27, 0000015, 2, 1),
(26, 0000015, 1, 1),
(25, 0000014, 2, 1),
(24, 0000014, 1, 1),
(23, 0000013, 2, 1),
(22, 0000013, 1, 1),
(21, 0000012, 2, 1),
(20, 0000012, 1, 1),
(19, 0000011, 2, 1),
(18, 0000011, 1, 1),
(35, 0000019, 2, 1),
(36, 0000020, 1, 1),
(37, 0000020, 2, 1),
(38, 0000021, 1, 1),
(39, 0000021, 2, 1),
(40, 0000022, 1, 1),
(41, 0000022, 2, 1),
(42, 0000023, 1, 1),
(43, 0000023, 2, 1),
(44, 0000024, 1, 1),
(45, 0000024, 2, 1),
(46, 0000025, 1, 1),
(47, 0000025, 2, 1),
(48, 0000026, 1, 1),
(49, 0000026, 2, 1),
(50, 0000027, 1, 1),
(51, 0000027, 2, 1),
(52, 0000028, 1, 1),
(53, 0000028, 2, 1),
(54, 0000029, 1, 1),
(55, 0000029, 2, 1),
(56, 0000030, 1, 1),
(57, 0000030, 2, 1),
(58, 0000031, 1, 1),
(59, 0000031, 2, 1),
(60, 0000032, 1, 1),
(61, 0000032, 2, 1),
(62, 0000033, 1, 1),
(63, 0000033, 2, 1),
(64, 0000034, 1, 1),
(65, 0000034, 2, 1),
(66, 0000035, 1, 1),
(67, 0000035, 2, 1),
(68, 0000036, 1, 1),
(69, 0000036, 2, 1),
(70, 0000037, 1, 1),
(71, 0000037, 2, 1),
(72, 0000038, 1, 1),
(73, 0000038, 2, 1),
(74, 0000039, 1, 1),
(75, 0000039, 2, 1),
(76, 0000040, 1, 1),
(77, 0000040, 2, 1),
(78, 0000041, 1, 1),
(79, 0000041, 2, 1),
(80, 0000042, 1, 1),
(81, 0000042, 2, 1),
(82, 0000043, 1, 1),
(83, 0000043, 2, 1),
(84, 0000044, 1, 1),
(85, 0000044, 2, 1),
(86, 0000045, 1, 1),
(87, 0000045, 2, 1),
(88, 0000046, 1, 1),
(89, 0000046, 2, 1),
(90, 0000047, 1, 1),
(91, 0000047, 2, 1),
(92, 0000048, 1, 1),
(93, 0000049, 1, 1),
(94, 0000050, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(6) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text DEFAULT NULL,
  `p_price` float(7,2) DEFAULT NULL,
  `p_ext` varchar(50) NOT NULL,
  `c_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES
(1, 'Vivo AiO V222 รุ่น V222GAK-BA012W', 'CPU:Intel Pentium Silver J5040\r\nSPEED(GHZ):2\r\nMONITOR SIZE:21.5\r\nOPERATING SYSTEM: Windows 11 Home (64bit)\r\nPORTS/SLOTS:1x USB 2.0 Type-A, 4x USB 3.2 Gen 1 Type-A, 1x HDMI out 1.4, GIGABIT LAN\r\nWi-Fi 5(802.11ac)+Bluetooth 4.2 (Dual band) 2*2\r\nFREE Wired golden keyboard and Wired optical mouse\r\n', 10990.00, 'jpg', 1),
(2, 'Aspire C24-1100-R38G0T23Mi/T001', 'CPU : AMD Ryzen 3 7320U Processor (4-core/8-thread, 5MB cache, up to 4.1GHz max boost) with Radeon 610M Graphics\r\nMemory : 4GB*2 DDR5 Up to 8 GB of Dual-channel DDR5 MHz\r\nStorage : 512 GB M.2 2280 PCI-e Gen4 SSD\r\n23.8\" Non-Touch screen IPS LCD 1920 x 1080 FHD\r\nOS: Windows 11 Home & Microsoft Office Home & Student 2021 (Pre-installed)\r\nPower supply : 3-pin 65 W AC adapter\r\nAccessories : Wireless keyboard and mouse\r\n', 15990.00, 'jpg', 1),
(3, '(Intel Core i5, RAM 32GB, 1TB, NZXT) รุ่น EVO 01V1', 'CPU INTEL I5-13400F\r\nRAM 32GB (16*2) DDR5 RGB\r\nSSD 1TB M.2 PCIe 4.0 x 4\r\nVGA RTX 4070 12GB\r\nWindows 11 Trial License\r\nPSU 750W 80+ BRONZE\r\nขนาด(ซม):50.5 x 23.0 x 48.0\r\n', 50690.00, 'jpg', 2),
(4, '(Intel Core i5, RAM 16GB, 512TB, Thermaltake) รุ่น EVO 03V1', 'CPU INTEL I5-13400F\r\nRAM 16GB (8*2) DDR5\r\nSSD 512GB M.2 PCIe 4.0 x 4\r\nVGA RTX 4060Ti 8GB\r\nWindows 11 Trial License\r\nPSU 650W 80+ WHITE\r\nDimension(ซม.):47.7 x 21.7 x 43.0\r\n', 34990.00, 'jpg', 2),
(5, 'รุ่น M6-400 ', 'คุณสมบัติพิเศษ:Sensor Optical, Resolution 800-5000DPI 4 buttons, Available USB port\r\nWindows 7/8 or later, MAC OS X 10.7.4 or later\r\n7 color illumination breathing cycling design\r\n', 1090.00, 'jpg', 3),
(6, 'รุ่น M8-610', 'คุณสมบัติพิเศษ:Sensor Laser\r\nResolution 800-8200DPI 6 buttons, Available USB port\r\nWindows 7/8 or later, MAC OS X 10.7.4 or later\r\nErgonomic Design\r\nการรับประกัน(Year):1\r\n6.6 W x 3.9 H x12.3 D\r\nอื่นๆ:24 MACRO KEYS\r\n', 1290.00, 'jpg', 3),
(7, 'รุ่น Waffle', 'ประเภทสินค้า:คีย์บอร์ดบลูทูธ ไซส์ Compact\r\nสี:เทา\r\nวัสดุที่ใช้:พลาสติก\r\nมีปุ่มกลมเหมือนแป้นพิมพ์ดีดสมัยก่อน\r\nทำความสะอาดง่าย\r\nมีแปรงปัดฝุ่น และ สติกเกอร์แถมให้ในกล่อง\r\nการรับประกัน:1 ปี\r\n', 690.00, 'jpg', 4),
(8, 'รุ่น K120', 'ประเภท : KEYBOOARD\r\nสี : BLACK\r\nปุ่ม : 104KEYS\r\nPort : USB\r\nรองรับ : Win XP,VISTA 7,8 OR LINUX\r\nรับประกัน(ปี) : 3\r\n', 299.00, 'jpg', 4),
(9, 'รุ่น MP1000', 'ประเภทสินค้า:แผ่นรองเมาส์\r\nสี:สีดำ\r\nสำหรับ:อุปกรณ์คอมพิวเตอร์\r\nวัสดุ:ผ้าไมโครไฟเบอร์\r\nขนาด(ซม.):30 W x 24 H x 1 D\r\n', 115.00, 'jpg', 5),
(10, 'รุ่น GIGANTUS V2 SOFT', 'ประเภทสินค้า: Mouse Mat\r\nสี:Black\r\nสำหรับ:อุปกรณ์คอมพิวเตอร์\r\nวัสดุ:from\r\nUltra Large for Big SwipesOptimized for Speed and ControlThicker Than Ever\r\n', 990.00, 'jpg', 5),
(11, 'รุ่น K10', 'ประเภทสินค้า:Gaming Gear\r\nสี:Black\r\nสำหรับใส่:ครอบหัว\r\nวัสดุที่ใช้:PU\r\nมีไมโครโฟนที่ยอดเยี่ยมช่วยให้เพื่อนร่วมทีมของคุณได้ยินคำสั่งของคุณอย่างชัดเจน\r\nการออกแบบระบบขจัดเสียงรบกวนรอบข้างที่ยอดเยี่ยม\r\nแถบคาดศีรษะมีการออกแบบตามหลักสรีรศาสตร์\r\nการรับประกัน:2 ปี\r\nขนาด(ซม.):19.00 x 19.00 x 0.90\r\nอื่นๆ:USB 2.0 (7.1) ใช้งานได้หลาย Platform ทั้งบน PC, โทรศัพท์มือถือ Android และ iOS\r\n', 990.00, 'jpg', 6),
(12, 'X98', 'ประเภทสินค้า:ชุดหูฟัง\r\nสี:ดำ\r\nสำหรับใส่:ฟังเสียง\r\nสามารถขับเสียง 7.1 Surround ได้\r\nตกแต่งสวยงามด้วยไฟ LED RGB\r\nสายคาดหนังเทียม\r\nเชื่อมต่อผ่าน USB\r\nขนาด(ซม):23.70 x 21.70 x 12.50\r\n', 590.00, 'jpg', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `od_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
