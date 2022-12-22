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

-- 傾印  資料表 finalprojectdata.ticket record 結構
CREATE TABLE IF NOT EXISTS `ticket record` (
  `訂單編號` text COLLATE utf8_bin DEFAULT NULL,
  `訂票人(帳號)` text COLLATE utf8_bin DEFAULT NULL,
  `價格` int(11) DEFAULT NULL,
  `付款狀態` tinyint(4) DEFAULT NULL,
  `訂票時間` datetime DEFAULT NULL,
  `訂單狀態` text COLLATE utf8_bin DEFAULT NULL,
  `是否退票` tinyint(4) DEFAULT NULL,
  `已退款` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.ticket record 的資料：~0 rows (近似值)
REPLACE INTO `ticket record` (`訂單編號`, `訂票人(帳號)`, `價格`, `付款狀態`, `訂票時間`, `訂單狀態`, `是否退票`, `已退款`) VALUES
	('1', '409430000', 100, 1, '2022-12-22 11:25:13', 'Paid', 0, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
