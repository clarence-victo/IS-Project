SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";

-- Database: `apsi1`


-- Table structure for table `cart`
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `message`
CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `orders`
CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `products`
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create the only 'admin' account
INSERT INTO users VALUES (1, 'admin', 'admin@ad.min', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- PRE-CREATED Menus
INSERT INTO products VALUES
  (1, 'Tuyosilog', 60, 'TUYOSILOG.jpg'),
  (2, 'Bagetsilog', 90, 'BAGETSILOG.jpg'),
  (3, 'Chicksilog', 90, 'CHICKSILOG.jpg'),
  (4, 'Bacsha', 95, 'BACSHA.jpg'),
  (5, 'Shatap', 100, 'SHATAP.jpg'),
  (6, 'Hamdog', 70, 'HAMDOG.jpg'),
  (7, 'Shanghaisilog', 60, 'SHANGHAISILOG.jpg'),
  (8, 'Hotsilog', 60, 'HOTSILOG.jpg'),
  (9, 'Sisiglog', 90, 'SISIGLOG.jpg'),
  (10, 'Torikatsilog', 95, 'TORIKATSILOG.jpg'),
  (11, 'Nagetsmoba', 90, 'NAGETSMOBA.jpg'),
  (12, 'Napa-shabac', 130, 'NAPA-SHABAC.jpg'),
  (13, 'Chickfiletsilog', 95, 'CHICKFILETSILOG.jpg');



-- Indexes for dumped tables
--


-- Indexes for table `cart`
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);


-- Indexes for table `message`
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);


-- Indexes for table `orders`
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


-- Indexes for table `products`
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `cart`
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;


-- AUTO_INCREMENT for table `message`
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


-- AUTO_INCREMENT for table `orders`
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


-- AUTO_INCREMENT for table `products`
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;


-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;