-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2014-10-18 17:38:10
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for tginventory
DROP DATABASE IF EXISTS `tginventory`;
CREATE DATABASE IF NOT EXISTS `tginventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tginventory`;


-- Dumping structure for table tginventory.bom
DROP TABLE IF EXISTS `bom`;
CREATE TABLE IF NOT EXISTS `bom` (
  `bom_id` int(10) NOT NULL AUTO_INCREMENT,
  `bom_name` varchar(50) DEFAULT '0',
  `bom_desc` varchar(50) DEFAULT '0',
  `company_id` int(11) DEFAULT '0',
  `create_by_id` int(11) DEFAULT '0',
  `status` varchar(10) DEFAULT 'Active',
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`bom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.bom: ~1 rows (approximately)
/*!40000 ALTER TABLE `bom` DISABLE KEYS */;
REPLACE INTO `bom` (`bom_id`, `bom_name`, `bom_desc`, `company_id`, `create_by_id`, `status`, `cdate`) VALUES
	(3, 'aasdfasdf edit 234 2', '98', 4, 0, 'Active', '2008-10-01');
/*!40000 ALTER TABLE `bom` ENABLE KEYS */;


-- Dumping structure for table tginventory.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT '0',
  `category_desc` varchar(50) DEFAULT '0',
  `company_id` int(11) DEFAULT '0',
  `status` varchar(50) DEFAULT 'Active',
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.category: ~2 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`category_id`, `category_name`, `category_desc`, `company_id`, `status`, `cdate`) VALUES
	(1, 'asdfas', '0sadf', 1, 'Active', '2014-09-30'),
	(2, 'aasdfasdf edit', '98', 4, 'Active', '2006-10-01');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table tginventory.company
DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) DEFAULT NULL,
  `create_id` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Active',
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.company: ~5 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
REPLACE INTO `company` (`company_id`, `company_name`, `create_id`, `status`, `cdate`) VALUES
	(1, 'asdfasdf', 1, 'Active', '2014-09-30'),
	(2, NULL, NULL, 'Active', '2005-10-01'),
	(3, NULL, NULL, 'Active', '2005-10-01'),
	(4, 'aasdfasdf', 98, 'Active', '2006-10-01'),
	(5, 'aasdfasdf', 98, 'Active', '2006-10-01');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;


-- Dumping structure for table tginventory.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_type` int(10) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_desc` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `tax` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `create_by_id` varchar(50) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.customer: ~1 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
REPLACE INTO `customer` (`customer_id`, `customer_type`, `customer_name`, `customer_desc`, `currency`, `tax`, `address`, `company_id`, `create_by_id`, `cdate`) VALUES
	(1, NULL, 'aasdfasdf edit 23asd4 2 1323', '98', '4', 'asda@asda.com', '9850950086', 3, '3', '2003-10-02');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Dumping structure for table tginventory.customer_type
DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE IF NOT EXISTS `customer_type` (
  `ctype_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  `type_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ctype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.customer_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;


-- Dumping structure for table tginventory.daily_stock
DROP TABLE IF EXISTS `daily_stock`;
CREATE TABLE IF NOT EXISTS `daily_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) DEFAULT NULL,
  `stock_count` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `last_update_user_id` int(11) DEFAULT NULL,
  `last_update_date` date DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.daily_stock: ~0 rows (approximately)
/*!40000 ALTER TABLE `daily_stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_stock` ENABLE KEYS */;


-- Dumping structure for table tginventory.demo
DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `data` varchar(500) DEFAULT '0',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.demo: ~4 rows (approximately)
/*!40000 ALTER TABLE `demo` DISABLE KEYS */;
REPLACE INTO `demo` (`id`, `data`, `value`) VALUES
	(1, 'asd', 'asdf'),
	(2, 'asd', 'asdf'),
	(3, '[{"id":"1","name":"gooss"},{"id":"2","name":"ss"},{"id":"3","name":"ss"}]', 'asdf'),
	(5, 'a:3:{i:0;a:2:{s:2:"id";s:1:"1";s:4:"name";s:5:"gooss";}i:1;a:2:{s:2:"id";s:1:"2";s:4:"name";s:2:"ss";}i:2;a:2:{s:2:"id";s:1:"3";s:4:"name";s:2:"ss";}}', 'asdf');
/*!40000 ALTER TABLE `demo` ENABLE KEYS */;


-- Dumping structure for table tginventory.group
DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT '0',
  `group_desc` varchar(50) DEFAULT '0',
  `company_id` int(11) DEFAULT '0',
  `create_by_id` int(11) DEFAULT '0',
  `status` varchar(10) DEFAULT 'Active',
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.group: ~2 rows (approximately)
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
REPLACE INTO `group` (`group_id`, `group_name`, `group_desc`, `company_id`, `create_by_id`, `status`, `cdate`) VALUES
	(1, 'asdf', 'sdfas', 11, 11, 'Active', '2014-09-30'),
	(2, 'aasdfasdf edit 234 2', '98', 4, 2, 'Active', '2007-10-01');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;


-- Dumping structure for table tginventory.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table tginventory.groups: ~5 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
REPLACE INTO `groups` (`id`, `name`) VALUES
	(3, 'Admin'),
	(4, 'Dataentry'),
	(5, 'Warehouse'),
	(6, 'Sales'),
	(7, 'Purchase');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table tginventory.item
DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  `cust_generate_id` int(10) DEFAULT NULL,
  `desc` varchar(50) DEFAULT NULL,
  `old_code` int(11) DEFAULT NULL,
  `purchase_name` varchar(50) DEFAULT NULL,
  `custom_name` varchar(50) DEFAULT NULL,
  `custom_code` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `part no` text,
  `customer_details` text,
  `price_per_unite` int(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `pdf` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `start_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_code` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.item: ~0 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;


-- Dumping structure for table tginventory.options
DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int(10) NOT NULL DEFAULT '0',
  `site_url` varchar(50) DEFAULT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.options: ~0 rows (approximately)
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;


-- Dumping structure for table tginventory.stock_history
DROP TABLE IF EXISTS `stock_history`;
CREATE TABLE IF NOT EXISTS `stock_history` (
  `current_id` int(10) NOT NULL AUTO_INCREMENT,
  `current_stock` int(10) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`current_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.stock_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `stock_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_history` ENABLE KEYS */;


-- Dumping structure for table tginventory.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '0',
  `password` varchar(50) DEFAULT '0',
  `group` int(11) DEFAULT '0',
  `email` varchar(50) DEFAULT '0',
  `mobileno` varchar(15) DEFAULT '0',
  `address` varchar(150) DEFAULT '0',
  `last_login` varchar(50) DEFAULT '0',
  `login_hash` varchar(50) DEFAULT '0',
  `profile_fields` varchar(50) DEFAULT '0',
  `created_at` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`user_id`, `username`, `password`, `group`, `email`, `mobileno`, `address`, `last_login`, `login_hash`, `profile_fields`, `created_at`) VALUES
	(186, 'GaurishRane2', 'iretOFwz90i7sftM/7QhH4yVP8uBk91nwcaoLA9Oe44=', 1, 'megaurishrane@gmail.com2', '9850950088', 'this is my address', '04:10:09', '0f7ae590382d5141273d9a2c9ac5951e785617cc', 'a:2:{s:9:"circle_id";s:4:"asdf";s:8:"mobileno";s:1', 1391414425),
	(188, 'asd123123', 'TX2wgbLnt9ZR33BxvY/V4yfHlm6nf4vznTmhQMRRT4M=', 3, 'as123dfa@a12312sdf.com', '9850950086', 'asdfasdf', '0', '', 'a:2:{s:9:"circle_id";N;s:8:"mobileno";s:10:"985095', 1412155201),
	(189, 'asd12312312313', 'TX2wgbLnt9ZR33BxvY/V4yfHlm6nf4vznTmhQMRRT4M=', 3, 'as112312312323dfa@a12312sdf.com', '9850950086', 'asdfasdf', '0', '', 'a:2:{s:9:"circle_id";N;s:8:"mobileno";s:10:"985095', 1412156267),
	(190, 'aasdfasdf edit 234 2', 'F4Rxs+/jujtT7U/PBkqCiSHN77DjtS/9qFryJebqtjc=', 0, 'asda@asda.com', '9850950086', '4', '0', '', 'a:2:{s:9:"circle_id";N;s:8:"mobileno";s:10:"985095', 1412191931);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table tginventory.vehical
DROP TABLE IF EXISTS `vehical`;
CREATE TABLE IF NOT EXISTS `vehical` (
  `vehical_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehical_name` varchar(50) DEFAULT '0',
  `vehical_desc` varchar(50) DEFAULT '0',
  `company_id` int(11) DEFAULT '0',
  `create_by_id` int(11) DEFAULT '0',
  `status` varchar(10) DEFAULT 'Active',
  `cdate` date DEFAULT NULL,
  PRIMARY KEY (`vehical_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tginventory.vehical: ~1 rows (approximately)
/*!40000 ALTER TABLE `vehical` DISABLE KEYS */;
REPLACE INTO `vehical` (`vehical_id`, `vehical_name`, `vehical_desc`, `company_id`, `create_by_id`, `status`, `cdate`) VALUES
	(3, 'aasdfasdf edit 234 2 editaeda', '98', 4, 2, 'Active', '2008-10-01');
/*!40000 ALTER TABLE `vehical` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
