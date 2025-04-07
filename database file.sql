SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_flystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `adm_name` varchar(50) NOT NULL,
  `adm_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(200) NOT NULL,
  `pro_id` int(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_id` varchar(70) NOT NULL,
  `qty` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`) VALUES
(1, 'Clothing'),
(2, 'Food'),
(3, 'Footwear'),
(4, 'Electronics'),
(5,'Home Appliances'),
(6,'Mobiles'),
(7,'Grocery'),
(8,'Cosmetics');
-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order_table` (
  `order_id` int(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `tran_id` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `ordered_pro_id` int(200) NOT NULL,
  `ordr_id` int(100) NOT NULL,
  `usr_id` int(20) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `odr_Id` int(200) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `total_Amt` varchar(200) NOT NULL,
  `card_holder_name` varchar(20) NOT NULL,
  `credit_card_no` varchar(20) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `cvv` varchar(20) NOT NULL,
  `Shipping_Add` varchar(20) NOT NULL,
  `order_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(200) NOT NULL,
  `p_category` int(255) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_category`, `p_name`, `p_price`, `p_image`) VALUES
(1, 1, 'T-Shirt', 200, 'pin1.jpg'),
(2, 2, 'Dairy Milk', 40, 'pin1.jpg'),
(3, 3, 'Shoes', 1999, 'pin1.jpg'),
(4, 4, 'Earphones', 449, 't1.jpg'),
(5, 5, 'Mixer', 2499, 'pin1.jpg'),
(6, 6, 'Samsung M32', 23499, 'pin1.jpg'),
(7, 7, 'Mazaa', 69, 'pin1.jpg'),
(8, 8, 'Eyeliner', 149, 'pin1.jpg'),
(9, 1, 'Jacket', 999, 't10.jpg'),
(10, 1, 'Suit', 2999, 't12.jpg'),
(11, 1, 'Kurti', 799, 't24.jpg'),
(12, 1, 'Frock', 999, 't14.jpg'),
(13, 1, 'One piece', 1499, 't15.jpg'),
(14, 1, 'Saree', 2499, 't18.jpg'),
(15, 1, 'Jeans', 599, 't27.jpg'),
(16, 2, 'Oreo', 35, 'c1.jpg'),
(17, 2, 'Gems', 10, 'c6.jpg'),
(18, 2, 'Lays', 20, 'c5.jpg'),
(19, 2, 'Dark Chocolate', 100, 'c8.jpg'),
(20, 2, 'Bounce', 20, 'c3.jpg'),
(21, 2, 'Kit-Kat', 25, 'c10.jpg'),
(22, 2, 'JimJam', 15, 'c4.jpg'),
(23, 3, 'Heels', 1850, 'f8.jpg'),
(24, 3, 'Slipper', 350, 'f12.jpg'),
(25, 3, 'Sandals', 650, 'f14.jpg'),
(26, 3, 'Sports Shoes', 1200, 'f3.jpg'),
(27, 3, 'Toe Flat Sandal', 150, 'f4.jpg'),
(28, 3, 'Ballet Flat', 450, 'f5.jpg'),
(29, 3, 'Crocks', 550, 'f15.jpg'),
(30, 4, 'Smart Watch', 3500, 't2.jpg'),
(31, 4, 'Router', 500, 't4.jpg'),
(32, 4, 'Security Camera', 1500, 't6.jpg'),
(33, 4, 'Sound Bar', 8000, 't8.jpg'),
(34, 4, 'USB Cable', 200, 't9.jpg'),
(35, 4, 'Headphone', 400, 't10.jpg'),
(36, 4, 'Pen Drive', 1200, 't12.jpg'),
(37, 5, 'Ceiling Fan', 1300, 't3.jpg'),
(38, 5, 'Water Purifier', 9900, 't6.jpg'),
(39, 5, 'Electric Kettle', 1000, 't7.jpg'),
(40, 5, 'Microwave', 5500, 't12.jpg'),
(41, 5, 'Sewing Machine', 3000, 't13.jpg'),
(42, 5, 'Cooler', 3800, 't4.jpg'),
(43, 5, 'Grinders', 1200, 't11.jpg'),
(44, 6, 'Realme Narzo 50', 9990, 'e1.jpg'),
(45, 6, 'Realme Narzo 50A', 16500, 'e3.jpg'),
(46, 6, 'Redmi 10 Prime', 22500, 'e2.jpg'),
(47, 6, 'OnePlus 10 Pro', 66999, 'm1.jpg'),
(48, 6, 'Xiaomi 11T Pro', 37999, 'm3.jpg'),
(49, 6, 'Apple IPhone 13 Pro Max', 139900, 'm6.jpg'),
(50, 6, 'OPPO F21 Pro', 23000, 'm8.jpg'),
(51, 7, 'Maggi', 100, 'b1.jpg'),
(52, 7, 'Jam', 70, 'b2.jpg'),
(53, 7, 'Honey', 50, 'b5.jpg'),
(54, 7, 'Flour', 90, 'b7.jpg'),
(55, 7, 'Salt', 35, 'b9.jpg'),
(56, 7, 'Oats', 250, 'b6.jpg'),
(57, 7, 'Bourbon', 40, 'b4.jpg'),
(58, 8, 'Blush', 239, 'a1.jpg'),
(59, 8, 'Lipstick', 89, 'a5.jpg'),
(60, 8, 'Maskara', 300, 'a10.jpg'),
(61, 8, 'Nail Polish', 40, 'a11.jpg'),
(62, 8, 'Eye Shadow', 597, 'a14.jpg'),
(63, 8, 'Lip Gloss', 200, 'a3.jpg'),
(64, 8, 'Kajal', 150, 'a7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`ordered_pro_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`odr_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `ordered_pro_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `odr_Id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
