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
  `編號` bigint(20) NOT NULL AUTO_INCREMENT,
  `標題` text COLLATE utf8_bin DEFAULT '無標題',
  `日期` datetime DEFAULT NULL,
  `內容` text COLLATE utf8_bin DEFAULT '無內容',
  `屬性` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`編號`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.announcement 的資料：~1 rows (近似值)
REPLACE INTO `announcement` (`編號`, `標題`, `日期`, `內容`, `屬性`) VALUES
	(1, '公布欄標題', '2022-12-22 20:29:41', '公佈欄內容可放置於此', '公告');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
