-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 09:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderentry`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `qty`, `id_user`) VALUES
(17, '3', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Elektronik'),
(2, 'Transportasi'),
(3, 'Perlengkapan Wisata');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `username`, `times`, `ip`, `keterangan`) VALUES
(39, 'abraham', '2020-03-27 14:54:10', '::1', 'Menambahkan kategori 12'),
(40, 'abraham', '2020-03-28 05:06:58', '::1', 'Mengubah kategori 12 menjadi Elektronik'),
(41, 'abraham', '2020-03-28 09:53:56', '::1', 'Mengubah kategori Elektronik menjadi Elektronik'),
(42, 'abraham', '2020-03-28 09:53:58', '::1', 'Menghapus kategori Elektronik'),
(43, 'abraham', '2020-03-28 09:54:07', '::1', 'Menambahkan kategori Playstation'),
(44, 'abraham', '2020-03-28 09:54:13', '::1', 'Menambahkan kategori Kamera'),
(45, 'abraham', '2020-03-28 09:54:19', '::1', 'Menambahkan kategori Projector'),
(46, 'abraham', '2020-03-28 09:54:53', '::1', 'Menambahkan produk Playstation 3'),
(47, 'abraham', '2020-04-01 02:30:58', '::1', 'Mengubah kategori Playstation menjadi Elektronik'),
(48, 'abraham', '2020-04-01 02:31:04', '::1', 'Mengubah kategori Kamera menjadi Transportasi'),
(49, 'abraham', '2020-04-01 02:31:20', '::1', 'Mengubah kategori Projector menjadi Perlengkapan Wisata'),
(50, 'abraham', '2020-04-01 09:45:10', '::1', 'Menambahkan produk Playstation 2'),
(51, 'abraham', '2020-04-01 09:45:28', '::1', 'Mengubah produk Playstation 3'),
(52, 'abraham', '2020-04-01 09:45:34', '::1', 'Mengubah produk Playstation 3'),
(53, 'abraham', '2020-04-01 09:48:11', '::1', 'Menambahkan produk Playstation 4'),
(54, 'abraham', '2020-04-01 09:50:33', '::1', 'Menambahkan produk Televisi'),
(55, 'abraham', '2020-04-01 09:50:52', '::1', 'Menambahkan produk Mobil Bus'),
(56, 'abraham', '2020-04-01 09:51:14', '::1', 'Menambahkan produk Mobil Mini Bus');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_num` int(11) NOT NULL,
  `order_item` int(11) NOT NULL,
  `prod_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_num`, `order_item`, `prod_id`, `quantity`) VALUES
(1, 18, '6', 22),
(2, 19, '1', 1),
(3, 20, '1', 1),
(4, 21, '1', 1),
(5, 22, '1', 2),
(5, 23, '2', 2);

--
-- Triggers `orderitems`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `orderitems` FOR EACH ROW UPDATE products
    set stock = (stock - 1)
    where products.prod_id = new.prod_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_num` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cust_id` char(5) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_num`, `order_date`, `cust_id`, `status`) VALUES
(1, '2020-04-11 04:52:28', '3', 3),
(2, '2020-04-11 04:52:57', '3', 3),
(3, '2020-04-30 06:11:44', '3', 1),
(4, '2020-04-30 06:11:59', '3', 1),
(5, '2020-04-30 06:13:28', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` varchar(10) NOT NULL,
  `vend_id` char(4) NOT NULL,
  `prod_name` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `cat_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `vend_id`, `prod_name`, `stock`, `prod_price`, `prod_desc`, `prod_image`, `cat_id`) VALUES
('1', '1', 'Playstation 3', 87, 50000, 'Dua bulan', '1.jpeg', '1'),
('2', '2', 'Playstation 2', 122, 100000, 'Sebulan', '2.jpeg', '1'),
('3', '3', 'Playstation 4', 12, 200000, 'Tiga Bulan', '3.jpeg', '1'),
('4', '4', 'Televisi', 32, 20000, 'Sehari 40\"', '4.jpeg', '1'),
('5', '5', 'Mobil Bus', 43, 500000, 'Sebulan', '5.jpeg', '2'),
('6', '6', 'Mobil Mini Bus', 65, 10000, 'Sehari saja', '6.jpeg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `role`) VALUES
(1, 'nama', 'surya.saputra030090@gmail.com', 'namaa', '21d29238679218082a919b9d522ed418', 0),
(3, 'surya saputra', 'surya.saputra41@rocketmail.com', 'abraham', '3dbe00a167653a1aaee01d93e77e730e', 1),
(7, 'Surya Saputraa', 'super090hero030@gmail.com', 'lukas', '594f803b380a41396ed63dca39503542', 0),
(8, '123123', '123asd@gmail.com', 'abraham', '4297f44b13955235245b2497399d7a93', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vend_id` char(4) NOT NULL,
  `vend_name` varchar(25) NOT NULL,
  `vend_address` varchar(30) DEFAULT NULL,
  `vend_city` varchar(20) DEFAULT NULL,
  `vend_state` varchar(5) DEFAULT NULL,
  `vend_zip` varchar(7) DEFAULT NULL,
  `vend_country` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_num`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123124;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
