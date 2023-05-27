-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bobtech
CREATE DATABASE IF NOT EXISTS `bobtech` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bobtech`;

-- Dumping structure for table bobtech.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.category: ~4 rows (approximately)
REPLACE INTO `category` (`id`, `category_name`) VALUES
	(4, 'RAM'),
	(5, 'PROCESSOR'),
	(6, 'SSD'),
	(10, 'MAKANAN');

-- Dumping structure for table bobtech.courier
CREATE TABLE IF NOT EXISTS `courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courier_name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.courier: ~3 rows (approximately)
REPLACE INTO `courier` (`id`, `courier_name`, `price`) VALUES
	(1, 'JNE', 9000),
	(2, 'Anter Aja', 8000),
	(3, 'J&T', 8000);

-- Dumping structure for table bobtech.income_outcome
CREATE TABLE IF NOT EXISTS `income_outcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `income` int(11) DEFAULT NULL,
  `outcome` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.income_outcome: ~1 rows (approximately)
REPLACE INTO `income_outcome` (`id`, `income`, `outcome`) VALUES
	(1, 9718750, 0);

-- Dumping structure for table bobtech.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(50) DEFAULT NULL,
  `admin_fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.payment: ~3 rows (approximately)
REPLACE INTO `payment` (`id`, `payment_method`, `admin_fee`) VALUES
	(1, 'BCA', 0),
	(2, 'BRI', 1000),
	(3, 'Mandiri', 1000);

-- Dumping structure for table bobtech.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(99) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `desc` longtext DEFAULT 'Lorem Ipsum Dolor Sit Amet',
  `category` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `imagePath` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Supplier` (`supplier`),
  KEY `Category` (`category`),
  CONSTRAINT `Category` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Supplier` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.stock: ~5 rows (approximately)
REPLACE INTO `stock` (`id`, `name`, `price`, `stock`, `desc`, `category`, `supplier`, `imagePath`) VALUES
	(23, 'SSD Adata XPG SX8200 PRO 512GB M.2 NVMe', 736250, 500, 'Lorem Ipsum Dolor Sit Amet', 6, 5, 'assets/adatassd.jpg'),
	(24, 'Kingston HyperX Impact DDR4 SODIMM 16GB - 3200', 762500, 500, 'Lorem Ipsum Dolor Sit Amet', 4, 2, 'assets/hyperx.jpg'),
	(25, ' Intel Core I3 10100F Box Comet Lake Socket LGA 1200', 1425000, 500, 'Lorem Ipsum Dolor Sit Amet', 5, 3, 'assets/inteli3.jpg'),
	(26, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 1943750, 494, 'Lorem Ipsum Dolor Sit Amet', 5, 4, 'assets/ryzen5500.jpg'),
	(27, 'Kingston SSD A400 480GB', 500000, -499500, 'Lorem Ipsum Dolor Sit Amet', 6, 2, 'assets/kingstonssd.jpg');

-- Dumping structure for table bobtech.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.suppliers: ~4 rows (approximately)
REPLACE INTO `suppliers` (`id`, `supplier_name`) VALUES
	(2, 'KINGSTON'),
	(3, 'INTEL'),
	(4, 'AMD'),
	(5, 'ADATA');

-- Dumping structure for table bobtech.supplierstocks
CREATE TABLE IF NOT EXISTS `supplierstocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(99) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `imagePath` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplierStock` (`supplier`),
  KEY `categorySupplier` (`category`),
  CONSTRAINT `categorySupplier` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `supplierStock` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.supplierstocks: ~6 rows (approximately)
REPLACE INTO `supplierstocks` (`id`, `name`, `price`, `category`, `supplier`, `imagePath`) VALUES
	(2, 'Kingston HyperX Impact DDR4 SODIMM 16GB - 3200', 610000, 4, 2, 'assets/hyperx.jpg'),
	(3, 'ADATA DDR4 3200MHz 8GB (1X8GB)\n', 275000, 4, 5, 'assets/adataram.jpg'),
	(4, 'Kingston SSD A400 480GB', 400000, 6, 2, 'assets/kingstonssd.jpg'),
	(5, 'SSD Adata XPG SX8200 PRO 512GB M.2 NVMe', 589000, 6, 5, 'assets/adatassd.jpg'),
	(6, ' Intel Core I3 10100F Box Comet Lake Socket LGA 1200', 1140000, 5, 3, 'assets/inteli3.jpg'),
	(7, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 1555000, 5, 4, 'assets/ryzen5500.jpg');

-- Dumping structure for table bobtech.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `payment_method` varchar(50) NOT NULL DEFAULT '-',
  `delivery_courier` varchar(50) NOT NULL DEFAULT '-',
  `address` longtext DEFAULT '-',
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bobtech.transactions: ~12 rows (approximately)
REPLACE INTO `transactions` (`id`, `item_name`, `quantity`, `price`, `payment_method`, `delivery_courier`, `address`, `total_price`, `status`, `created_at`, `updated_at`, `deleted_at`, `user`, `type`) VALUES
	(555, 'SSD Adata XPG SX8200 PRO 512GB M.2 NVMe', 1, 736250, 'BRI', 'JNE', 'jalan kemuning gading', 746250, 'paid', '2023-05-26 06:36:18', '2023-05-26 06:36:22', NULL, 'alman', 'sell'),
	(556, 'Kingston HyperX Impact DDR4 SODIMM 16GB - 3200', 1, 762500, 'BCA', 'JNE', 'jalan kemuning gading', 771500, 'paid', '2023-05-26 06:44:10', '2023-05-26 06:44:11', NULL, 'alman', NULL),
	(557, ' Intel Core I3 10100F Box Comet Lake Socket LGA 12', 1, 1425000, 'BCA', 'JNE', 'jalan kemuning gading', 1434000, 'paid', '2023-05-26 06:45:15', '2023-05-26 06:45:17', NULL, 'alman', NULL),
	(558, ' Intel Core I3 10100F Box Comet Lake Socket LGA 12', 1, 1425000, 'BCA', 'JNE', 'jalan kemuning gading', 1434000, 'paid', '2023-05-26 06:45:30', '2023-05-26 06:45:32', NULL, 'alman', NULL),
	(559, ' Intel Core I3 10100F Box Comet Lake Socket LGA 12', 1, 1425000, 'BCA', 'JNE', 'jalan kemuning gading', 1434000, 'paid', '2023-05-26 06:47:27', '2023-05-26 06:47:29', NULL, 'alman', NULL),
	(560, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 4, 1943750, 'BCA', 'JNE', 'jalan kemuning gading', 7784000, 'pending', '2023-05-26 06:47:42', '2023-05-26 06:47:42', NULL, 'alman', NULL),
	(561, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 1, 1943750, 'BCA', 'JNE', 'jalan kemuning gading', 1952750, 'paid', '2023-05-26 06:47:45', '2023-05-26 06:47:47', NULL, 'alman', NULL),
	(562, ' Intel Core I3 10100F Box Comet Lake Socket LGA 12', 1, 1425000, 'BCA', 'JNE', 'jalan kemuning gading', 1434000, 'paid', '2023-05-26 06:49:18', '2023-05-26 06:49:19', NULL, 'alman', NULL),
	(563, 'Kingston SSD A400 480GB', 1, 500000, 'BCA', 'JNE', 'jalan kemuning gading', 509000, 'paid', '2023-05-26 06:49:30', '2023-05-26 06:49:32', NULL, 'alman', NULL),
	(564, 'Kingston SSD A400 480GB', 1, 500000, 'BCA', 'JNE', 'jalan kemuning gading', 509000, 'paid', '2023-05-26 06:50:43', '2023-05-26 06:51:13', NULL, 'alman', NULL),
	(565, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 1, 1943750, 'BRI', 'JNE', 'jalan kemuning gading', 1953750, 'paid', '2023-05-26 06:53:30', '2023-05-26 06:53:31', NULL, 'alman', NULL),
	(566, 'AMD RYZEN 5 5500 BOX 6-Core 12-Thread', 5, 1943750, 'BCA', 'Anter Aja', 'jalan kemuning gading', 9726750, 'paid', '2023-05-26 06:54:17', '2023-05-26 06:54:43', NULL, 'alman', NULL);

-- Dumping structure for table bobtech.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` longtext NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bobtech.users: ~2 rows (approximately)
REPLACE INTO `users` (`username`, `password`, `name`, `role`, `created_at`, `updated_at`, `birth_date`, `address`) VALUES
	('admin', '$2y$10$sjWjGGF/G04V4BJXV2CT7e0tz5KIYTOLUK2Qs5fT6p7KcmpQlwWRS', 'Administrator', 'administrator', '2023-05-18 11:25:56', '2023-05-18 11:25:56', '1926-02-03', 'anon'),
	('albob', '$2y$10$Mjga/kXCpl1qNxnlMkRje.WZBicELeQ1e97sPCFzldc9fHAuu/o7m', 'alman', '', '2023-05-26 05:16:13', '2023-05-26 05:16:13', '2023-05-18', 'jalan kemuning gading');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
