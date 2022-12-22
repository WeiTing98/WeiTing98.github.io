-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        10.4.25-MariaDB - mariadb.org binary distribution
-- 伺服器作業系統:                      Win64
-- HeidiSQL 版本:                  12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 傾印 finalprojectdata 的資料庫結構
CREATE DATABASE IF NOT EXISTS `finalprojectdata` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `finalprojectdata`;

-- 傾印  資料表 finalprojectdata.announcement 結構
CREATE TABLE IF NOT EXISTS `announcement` (
  `index` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_bin DEFAULT '無標題',
  `date` datetime DEFAULT NULL,
  `content` text COLLATE utf8_bin DEFAULT '無內容',
  `author` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.announcement 的資料：~6 rows (近似值)
REPLACE INTO `announcement` (`index`, `title`, `date`, `content`, `author`) VALUES
	(1, '測試資料1', '2022-12-22 20:29:41', '公佈欄內容可放置於此，例如：高鐵票資訊、發車資訊等', '管理員A'),
	(2, '測試資料2', '2022-12-23 02:08:57', '本測試資料，僅供測試使用，上次測試是在上次。', '管理員B'),
	(3, '測試資料3', '2022-12-23 02:35:49', '注意看，這男人太狠了，竟然有第三筆', '管理員C'),
	(4, '測試資料4', '2022-12-23 02:36:52', 'OMG，大狀與小美發公告了！', '管理員D'),
	(5, '測試資料5', '2022-12-23 02:37:45', '看看這精美的五份公告', '管理員E'),
	(6, '測試資料6', '2022-12-23 02:38:41', '瘋了吧地六份', '管理員F');

-- 傾印  資料表 finalprojectdata.bus 結構
CREATE TABLE IF NOT EXISTS `bus` (
  `index` bigint(20) NOT NULL AUTO_INCREMENT,
  `seatnum` text COLLATE utf8_bin DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.bus 的資料：~4 rows (近似值)
REPLACE INTO `bus` (`index`, `seatnum`, `price`) VALUES
	(1, '1A', 100),
	(2, '1B', 100),
	(3, '1C', 100),
	(4, '1D', 100);

-- 傾印  資料表 finalprojectdata.ticket record 結構
CREATE TABLE IF NOT EXISTS `ticket record` (
  `index` bigint(20) NOT NULL AUTO_INCREMENT,
  `account` text COLLATE utf8_bin DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `available` tinyint(4) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `state` text COLLATE utf8_bin DEFAULT NULL,
  `applyrefund` tinyint(4) DEFAULT NULL,
  `refunded` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.ticket record 的資料：~1 rows (近似值)
REPLACE INTO `ticket record` (`index`, `account`, `price`, `available`, `timestamp`, `state`, `applyrefund`, `refunded`) VALUES
	(1, '409430000', 100, 1, '2022-12-22 11:25:13', 'Paid', 0, 0);

-- 傾印  資料表 finalprojectdata.user account 結構
CREATE TABLE IF NOT EXISTS `user account` (
  `studentID` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `phone` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.user account 的資料：~2 rows (近似值)
REPLACE INTO `user account` (`studentID`, `name`, `phone`, `email`, `password`) VALUES
	('409123456', 'test account', '987654321', 'abcd@example.com', 'abc123'),
	('409430000', 'test2', '912345678', 'cdef@example.com', 'abcd1234');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
