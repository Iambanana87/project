-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `method` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`) VALUES
('7Wn3mPjfW93hJfHl4CtF', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '24', '100000', '1', '2023-12-24', 'canceled'),
('5wpp8OesrtKHXPE6dtKD', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '24', '100000', '1', '2023-12-24', ''),
('YAEFiPcoJ7iIRPiEiMV8', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '24', '100000', '1', '2023-12-24', ''),
('RE2ibb9b29RE4k13LUwX', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '34', '5000000', '1', '2023-12-25', 'canceled'),
('MPlIbWTFekFOQHrNrtqn', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '27', '1000000', '1', '2023-12-25', ''),
('MoBTrpdG4NOMTu59vWXz', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '27', '1000000', '1', '2024-01-03', 'canceled'),
('dssKd5xY4kmVcVJxYc6m', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '27', '1000000', '2', '2024-01-03', ''),
('CfC6KMOTECVw7ohmgj4G', 'UeCFqgwEh5z2R8FiKtn2', 'hoai', '0812267689', 'huyhoai830@gmail.com', '', 'home', 'cash on delivery', '28', '1000000', '1', '2024-01-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(65, 'Chó'),
(66, 'Mèo'),
(67, 'Thức ăn cho thú cưng'),
(68, 'Phụ kiện thú cưng'),
(69, 'Nhà ở thú cưng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_desc` varchar(2000) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `product_price`, `product_price_new`, `product_desc`, `product_img`, `qty`) VALUES
(27, 'Chó Husky', 65, '1000000', '9500000', 'Chó Husky là giống chó rất ưa thích vận động do tổ tiên của chúng sống ở một trong những nơi lạnh giá nhất là Siberia, ở đây chó Husky nguyên thủy được phối giống bởi người Chukchi ở Đông Bắc Á nhằm mục đích kéo xe hàng trên một quãng đường dài trong điều kiện lạnh giá khắc nghiệt. Giống chó này được đưa tới Alaska trong thời kì khai thác vàng ở Nome rồi sau đó trở nên phổ biến ở Hoa Kỳ và Canada. Ban đầu Husky được nuôi để làm chó kéo xe nhưng về sau chúng trở thành thú nuôi làm cảnh trong gia đình.', 'husky-main.jpg', ''),
(28, 'Chó Alaska', 65, '1000000', '8500000', 'Chó Alaska là một giống chó đẹp, mạnh mẽ và thích hợp cho môi trường lạnh do nguồn gốc từ Siberia. Chúng có bộ lông dày dặn và mắt thu hút, thường sử dụng để kéo xe trượt tuyết ở các khu vực lạnh. Tính cách thân thiện và hiếu động, đặc biệt là với trẻ em, nhưng cũng có tính độc lập. Chó Alaska là người bạn đồng hành tuyệt vời cho những người có lối sống năng động và yêu thương. Tuy nhiên, chúng cần môi trường sống với hoạt động thể chất đủ để thỏa mãn năng lượng lớn của chúng.', 'alaska-main.jpg', ''),
(29, 'Chó Poodle', 65, '1000000', '9600000', 'Chó Poodle là một giống chó nhỏ có bộ lông đặc trưng và thông minh cao. Với ngoại hình duyên dáng, chúng thường được biết đến với bộ lông xoăn và sáng bóng. Poodle có tính cách thân thiện, trí tuệ và dễ đào tạo, làm cho chúng trở thành người bạn đồng hành lý tưởng cho gia đình. Giống chó này có năng khiếu về nghệ thuật biểu diễn và thường tham gia các cuộc thi canh sát. Poodle cũng phổ biến với việc lai tạo, tạo ra nhiều kích thước từ siêu nhỏ đến tiêu chuẩn.', 'poodle-main.jpg', ''),
(30, 'Chó Cỏ', 65, '200000', '150000', 'Giống chó Cỏ Việt Nam, còn được biết đến là \"Phu Quoc Ridgeback,\" là một giống chó có nguồn gốc từ đảo Phú Quốc, Việt Nam. Chúng nổi tiếng với bộ lông ngắn, mảnh mai, và bản năng săn mạnh mẽ. Chó Cỏ Việt Nam thường có tính cách trung thực, trung thành, và dễ huấn luyện. Đây là giống chó thích hợp làm bạn đồng hành và bảo vệ gia đình.', 'co-sub1.jpg', ''),
(31, 'Chó Pug', 65, '1000000', '9000000', 'Chó Pug, còn được gọi là Mops, là một giống chó nhỏ gọn và đáng yêu, có nguồn gốc từ Trung Quốc. Chúng có đầu tròn, mắt lớn và mũi ngắn, tạo nên nét đặc trưng vô cùng đáng yêu. Bộ lông của Pug ngắn và mềm mại, thường có màu đen, hạt dẻo hoặc bạch kim.\r\n\r\nPug nổi tiếng với tính cách vui vẻ, thân thiện và thích hợp cho gia đình. Chúng thường thích sự chú ý và làm bạn với mọi người xung quanh. Pug cũng rất thích ngủ và làm bạn với mọi người xung quanh. Mặc dù chúng có kích thước nhỏ, nhưng Pug thường rất mạnh mẽ và có thể làm bạn đồng hành tốt trong nhiều hoàn cảnh.', 'pug-main.jpg', ''),
(32, 'Chó Golden', 65, '1000000', '9100000', 'Chó Golden Retriever, hay chó Golden, là một giống chó có nguồn gốc từ Scotland. Được biết đến với bộ lông dày mềm mại màu vàng óng, chúng là những người bạn trung thành, thân thiện, và rất thích đồng hành với con người. Golden Retriever nổi tiếng với tính cách vui vẻ, thông minh, và dễ dạy. Chúng là lựa chọn lý tưởng cho gia đình, làm việc chăm sóc, hoặc thậm chí làm chó dẫn đường. Ngoài ra, chúng thường thể hiện tình cảm mạnh mẽ và có khả năng làm việc chăm chỉ, đặc biệt là trong các nhiệm vụ cứu hộ và hỗ trợ.', 'golden-main.jpg', ''),
(33, 'Chó Samoyed', 65, '1200000', '1000000', 'Chó Samoyed là một giống chó đẹp và thân thiện, có nguồn gốc từ vùng Bắc Á. Chúng có bộ lông trắng mềm mại, đôi mắt đen sáng và đuôi cuốn vút lên lưng. Samoyed nổi tiếng với tính cách vui vẻ, thân thiện với mọi người, và đặc biệt thích trẻ em. Đây là chó lai công việc kéo xe tuyết ở Siberia, nên chúng có bộ cơ thể mạnh mẽ và khả năng làm việc độc lập. Chó Samoyed thường là thành viên gia đình trung thành và làm niềm vui cho mọi người với tính cách vui tươi và năng động.', 'samoyed-main.jpg', ''),
(34, 'Chó Shiba', 69, '5000000', '4500000', 'Chó Shiba là một giống chó Nhật Bản nhỏ gọn, có vẻ ngoại hình giống như một con cáo. Chúng có bộ lông mềm mại và đuôi cuốn lên trên lưng. Shiba là giống chó độc lập, tự tin, và rất thông minh. Chúng thường rất trung thành với gia đình, nhưng đôi khi có thể trở nên khá độc lập. Shiba cũng có tính cách hơi kiêu kỳ và thường tỏ ra thách thức, nhưng đồng thời rất sạch sẽ và tự giác về vệ sinh cá nhân. Đây là một giống chó nhỏ năng động, phù hợp cho những người có lối sống hoạt động và yêu thương các thú cưng độc lập.', 'shiba-main.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `product_img_desc`) VALUES
(15, 'z4935973193788_7afee99ea564c476561a698af052fb0a.jpg'),
(15, 'z4943166010214_f3197c5b811286edc99682c3c9c77687.jpg'),
(16, 'z4943165564139_a44ba488dfae5778ec818a09cc341957.jpg'),
(16, 'z4943165522631_7e64d7f1390b0a174bd0a309e8c0656a.jpg'),
(16, 'z4943165552005_c9b1ce66b1b67b950889d0cac07b9b75.jpg'),
(17, 'z4943165564139_a44ba488dfae5778ec818a09cc341957.jpg'),
(17, 'z4943165522631_7e64d7f1390b0a174bd0a309e8c0656a.jpg'),
(17, 'z4943165552005_c9b1ce66b1b67b950889d0cac07b9b75.jpg'),
(18, 'Samurai_-11-1536x864.jpg'),
(19, 'Samurai_-11-1536x864.jpg'),
(21, ''),
(22, ''),
(23, 'R (3).jpg'),
(20, ''),
(23, ''),
(23, ''),
(24, 'R (2).jpg'),
(25, '1.jpg'),
(25, '1.webp'),
(25, '2.jpg'),
(25, '63832057056139.png'),
(26, 'OIPa.jpg'),
(26, 'R (1).jpg'),
(26, 'R (2).jpg'),
(26, 'z4775230500500_5b475e7e34e4cec6b2d2e2fef054cb0b.jpg'),
(27, 'husky.sub.jpg'),
(27, 'husky.sub1.jpg'),
(27, 'husky.sub2.jpg'),
(27, 'husky.sub3.jpg'),
(28, 'alaska-sub.jpg'),
(28, 'alaska-sub1.jpg'),
(28, 'alaska-sub2.jpg'),
(29, 'poodle-sub.jpg'),
(29, 'poodle-sub1.jpg'),
(29, 'poodle-sub2.jpg'),
(29, 'poodle-sub3.jpg'),
(30, 'co-main.jpg'),
(30, 'co-sub.jpg'),
(30, 'co-sub2.jpg'),
(31, 'pug-main.jpg'),
(31, 'pug-sub.jpg'),
(31, 'pug-sub1.jpg'),
(32, 'golden-sub.jpg'),
(32, 'golden-sub1.jpg'),
(32, 'golden-sub2.jpg'),
(32, 'golden-sub3.jpg'),
(33, 'samoyed-sub.jpg'),
(33, 'samoyed-sub1.jpg'),
(33, 'samoyed-sub2.jpg'),
(33, 'samoyed-sub3.jpg'),
(34, 'shiba-sub2.jpg'),
(34, 'shiba-sub.jpg'),
(34, 'shiba-sub1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(3, 'hoaif', 'huyhoai830@gmail.com', '12345', 'user'),
(4, 'meo', 'sas@gmail.com', '12345', 'admin'),
(5, 'hoaif', 'huyhoai838@gmail.com', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
