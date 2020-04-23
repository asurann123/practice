-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-04-22 11:29:56
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `learn`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `menu`
--

INSERT INTO `menu` (`id`, `item`, `price`) VALUES
(1, 'からあげ', '1000'),
(2, 'カレー', '850'),
(3, 'チキン南蛮', '1200');

-- --------------------------------------------------------

--
-- テーブルの構造 `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `taste` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `source`
--

INSERT INTO `source` (`id`, `taste`, `price`) VALUES
(1, 'チリソース', '100'),
(3, 'ペッパーソース', '100'),
(4, 'タルタルソース\r\n', '100');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- テーブルのインデックス `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
