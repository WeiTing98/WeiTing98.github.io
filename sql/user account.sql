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

-- 傾印  資料表 finalprojectdata.user account 結構
CREATE TABLE IF NOT EXISTS `user account` (
  `學號` text COLLATE utf8_bin NOT NULL,
  `姓名` text COLLATE utf8_bin NOT NULL,
  `電話` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `密碼` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  finalprojectdata.user account 的資料：~2 rows (近似值)
REPLACE INTO `user account` (`學號`, `姓名`, `電話`, `email`, `密碼`) VALUES
	('409123456', 'test account', '987654321', 'abcd@example.com', 'abc123'),
	('409430000', 'test2', '912345678', 'cdef@example.com', 'abcd1234');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
