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
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `author` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `lastedit` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.announcement 的資料：~7 rows (近似值)
REPLACE INTO `announcement` (`index`, `title`, `date`, `content`, `img`, `author`, `lastedit`) VALUES
	(15, '這是測試資料1', '2023-01-01 04:22:19', '這裡可以上傳公告，公告會顯示在首頁', NULL, '管理員Y', '小美'),
	(16, '測試資料2', '2022-12-30 02:21:13', '想新增上傳圖片的功能但還沒做<3ㄏㄏ\r\n', NULL, '管理員Y', NULL),
	(17, '又是測試資料', '2022-12-29 02:26:56', '上次測試是在上次喔!!!!', NULL, '管理員Y', NULL),
	(18, '晚餐吃甚麼啊??????', '2022-12-30 10:51:30', '晚餐吃晚餐阿==\r\n不然吃早餐嗎==\r\n==', NULL, '管理員Y', '小壯'),
	(19, '早安', '2022-12-30 10:49:38', '恭喜發財!  新年快樂喔!!! 期末地獄', NULL, '小美', '小壯'),
	(20, '我是誰????', '2022-12-30 02:35:29', '皮卡丘!!!!!!', '/final project website/change.png', '小美', '小壯'),
	(21, '早安', '2022-12-30 12:18:55', '你好', NULL, '小美', NULL),
	(22, '你好', '2023-01-04 19:22:43', '我是宇宙最美的小美\r\n', NULL, '小美', '小美');

-- 傾印  資料表 finalprojectdata.refund 結構
CREATE TABLE IF NOT EXISTS `refund` (
  `account` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 正在傾印表格  finalprojectdata.refund 的資料：~0 rows (近似值)

-- 傾印  資料表 finalprojectdata.ticket record 結構
CREATE TABLE IF NOT EXISTS `ticket record` (
  `index` bigint(20) NOT NULL AUTO_INCREMENT,
  `account` varchar(10) COLLATE utf8_bin NOT NULL,
  `price` int(11) DEFAULT 100,
  `bus date` date DEFAULT NULL,
  `bus number` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT 0,
  `applyrefund` tinyint(4) DEFAULT 0,
  `refunded` tinyint(4) DEFAULT 0,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='for user\r\nstate 1 -> pay ,0->not pay';

-- 正在傾印表格  finalprojectdata.ticket record 的資料：~6 rows (近似值)
REPLACE INTO `ticket record` (`index`, `account`, `price`, `bus date`, `bus number`, `timestamp`, `state`, `applyrefund`, `refunded`, `name`) VALUES
	(1, '409430000', 100, '2022-12-30', 1, '2022-12-25 12:09:59', 0, 0, 0, '大壯'),
	(2, '409430000', 100, '2023-01-06', 2, '2022-12-29 10:46:19', 0, 0, 0, '大壯'),
	(4, 'admin123', 100, '2023-01-13', 3, '2023-01-04 21:27:06', 0, 0, 0, '小美'),
	(6, 'admin123', 100, '2023-01-06', 2, '2023-01-04 22:59:45', 0, 0, 0, '小美'),
	(7, '409430000', 100, '2023-01-13', NULL, '2023-01-05 00:54:32', 0, 0, 0, NULL),
	(8, '409430000', 100, '2023-01-06', NULL, '2023-01-05 01:00:13', 0, 0, 0, NULL),
	(9, '409430000', 100, '2023-01-20', NULL, '2023-01-05 01:02:23', 0, 0, 0, NULL);

-- 傾印  資料表 finalprojectdata.timetable 結構
CREATE TABLE IF NOT EXISTS `timetable` (
  `bus number` int(11) NOT NULL AUTO_INCREMENT,
  `remain` int(11) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT NULL,
  `departure` varchar(20) DEFAULT 'CCU',
  `dst` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bus number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- 正在傾印表格  finalprojectdata.timetable 的資料：~4 rows (近似值)
REPLACE INTO `timetable` (`bus number`, `remain`, `date`, `departure`, `dst`) VALUES
	(2, 51, '2023-01-05 13:30:00', 'CCU', '嘉義高鐵站'),
	(3, 11, '2023-01-13 16:30:00', 'CCU', '雲林高鐵站'),
	(4, 55, '2023-01-20 13:30:00', 'CCU', '嘉義高鐵站'),
	(5, 60, '2023-02-03 16:30:00', 'CCU', '雲林高鐵站');

-- 傾印  資料表 finalprojectdata.user account 結構
CREATE TABLE IF NOT EXISTS `user account` (
  `account` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `phone` varchar(10) COLLATE utf8_bin DEFAULT '',
  `email` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.user account 的資料：~3 rows (近似值)
REPLACE INTO `user account` (`account`, `name`, `phone`, `email`, `password`, `admin`) VALUES
	('409123456', '帳號名1', '0987654321', 'abcd@example.com', 'abc123', 0),
	('409430000', '大壯', '0912345678', 'cdef@example.com', 'abcd1234', 0),
	('admin123', '小美', '0912398765', 'admin@example.com', 'admin987', 1),
	('admin321', '小壯', '0900000000', '1234@example.com', 'admin987', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
