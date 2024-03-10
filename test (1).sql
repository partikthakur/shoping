-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 08:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `qty`) VALUES
(64, 1, 13, 4),
(65, 1, 6, 2),
(66, 1, 2, 2),
(67, 1, 3, 2),
(68, 1, 14, 1),
(69, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `image`) VALUES
(1, 'laptop', 'lap.jpg'),
(2, 'mobile', 'mob.jpg'),
(3, 'watch', 'watch.jpg'),
(4, 'shoes', 'shoe.jpg'),
(5, 'sun glass', 'glasses.jpg'),
(6, 'bags', 'bags.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `product_id` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_prize` int(80) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`product_id`, `category`, `product_image`, `product_name`, `product_prize`, `Description`) VALUES
(1, 'laptop', 'hp.jpg', 'hp laptop', 30000, 'HP Pavilion Series: These are typically mid-range laptops offering a balance between performance and affordability.They are suitable for everyday tasks like web browsing, word processing, and multimedia consumption.'),
(2, 'laptop', 'dell.jpg', 'dell Laptop', 25000, 'Performance: Dell laptops come with a range of processors from Intel and AMD, catering to different performance needs. They offer configurations suitable for everyday tasks, multimedia consumption, business use, and gaming.'),
(3, 'laptop', 'lenovo.jpg', 'lenovo', 35000, 'Lenovo laptops are known for their reliability, performance, and sleek design. Depending on the specific model, they offer a range of features catering to different needs, from everyday computing to high-end gaming and professional work.'),
(4, 'mobile', 'iphone.jpg', 'iphone', 150000, 'As of my last update in January 2022, I can\'t provide specific details on the iPhone 15 as it\'s a product that would likely be released after that date. However, based on historical trends and the typical evolution of smartphones, we can make some educated guesses about potential features and improvements.'),
(5, 'mobile', 'redmi.jpg', 'redmi', 12500, 'Redmi is a brand of smartphones manufactured by Xiaomi Corporation, a Chinese electronics company. Redmi devices are known for offering a balance of performance, features, and affordability. Each model typically offers a range of specifications catering to different user needs, from budget-friendly options to higher-end devices.'),
(6, 'mobile', 'samsung.jpg', 'samsung', 40000, 'Samsung phones often feature sleek designs with slim profiles and curved edges, providing a premium look and feel. Depending on the model, you may find glass or plastic backs, metal frames, and vibrant color options.'),
(7, 'watch', 'w.jpg', 'rolex', 8500, 'Rolex watches typically feature a classic and sophisticated design, often characterized by clean lines, minimalistic dials, and iconic features such as the fluted bezel and the Cyclops lens (a magnifying lens above the date window). They are designed to be both functional and stylish, suitable for various occasions from formal events to outdoor adventures.'),
(8, 'watch', 'gucci.jpg', 'gucci', 5500, 'Gucci watches are renowned for their blend of Italian luxury, contemporary design, and precision craftsmanship. Typically, they feature sleek and elegant designs with attention to detail, often incorporating the iconic Gucci motifs such as the interlocking G logo or the green-red-green web stripe. Gucci offers a wide range of watch styles, including sporty chronographs, classic dress watches, and fashion-forward timepieces.'),
(9, 'watch', 'seiko.jpg', 'seiko', 12000, 'Seiko watches come in a variety of styles, ranging from classic to contemporary, and are crafted with meticulous attention to detail. They are known for their Japanese quartz or mechanical movements, which ensure accurate timekeeping. Seiko offers a wide range of collections, including the iconic Seiko 5 series, the luxurious Grand Seiko line, and the sporty Prospex models designed for outdoor and diving activities.'),
(10, 'shoes', 'shoe1.jpg', 'nike', 1500, 'Nike shoes come in a wide variety of styles, designed for various sports, activities, and casual wear. Known for their innovative designs, performance-enhancing features, and iconic branding, Nike shoes cater to athletes and fashion-conscious individuals alike.\r\n'),
(11, 'shoes', 'adidas.jpg', 'adidas', 1800, 'Adidas shoes are crafted with innovative designs and advanced technologies to meet the needs of athletes and casual wearers alike. They come in a variety of styles, including running shoes, sneakers, basketball shoes, and lifestyle footwear.'),
(12, 'shoes', 'redtape.jpg', 'redtape', 1350, 'Redtape shoes are the epitome of sophistication and craftsmanship. Meticulously crafted from premium materials, each pair exudes timeless elegance and contemporary flair. From classic Oxford styles to trendy loafers, Redtape offers a diverse range to suit every occasion and preference. Whether you\'re stepping into the boardroom or hitting the town, Redtape shoes promise unmatched comfort and style, making them a must-have addition to any discerning gentleman\'s wardrobe.\r\n\r\n\r\n\r\n\r\n'),
(13, 'sun glass', 'sun1.jpg', 'fastrack', 600, 'Fastrack sunglasses are crafted with style and functionality in mind, catering to the dynamic lifestyle of modern individuals. They come in a variety of styles, ranging from classic aviators to sporty wraparounds, ensuring there\'s something for everyone.\r\n'),
(14, 'sun glass', 'sun2.jpg', 'vincent', 900, 'With a range of styles and colors to choose from, Vincent sunglasses cater to every taste and preference. Whether you prefer classic aviators, retro-inspired round frames, or contemporary square shapes, there\'s a pair of Vincent sunglasses to suit your individual style.'),
(15, 'sun glass', 'Ray-Ban.jpg', 'ray-ban', 550, 'Each pair boasts high-quality materials, such as durable acetate frames or lightweight metal alloys, ensuring long-lasting comfort and resilience. The lenses are expertly crafted to provide 100% UV protection, shielding your eyes from harmful sun rays while maintaining crystal-clear vision.'),
(16, 'bags', 'bag1.jpg', 'Skybags', 800, 'Skybags offers a wide range of products designed to cater to the needs of modern travelers, students, and professionals. Their backpacks are known for their trendy designs, vibrant colors, and innovative features, making them a favorite among fashion-conscious individuals.'),
(17, 'bags', 'bag2.jpg', 'nike', 1100, 'Nike backpacks come in various sizes and designs to cater to different needs. They often feature multiple compartments, padded shoulder straps for comfort, and durable materials like polyester or nylon. Some may have specialized compartments for laptops or water bottles.'),
(18, 'bags', 'prolite.jpg', 'prolite', 650, 'ProLite bags are constructed from rugged materials that can withstand the rigors of outdoor use. Whether you\'re hiking through rough terrain or traveling to your next sports event, these bags are built to last.');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'partik', 'parteekthakur67@gmail.com', '123'),
(2, 'pratik', 'pratik@gmail.com', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
