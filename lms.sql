-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 04 月 09 日 11:53
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` text NOT NULL,
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`cid`, `name`, `content`) VALUES
(1, '熊云川', '哇，你写的好好啊'),
(2, '熊云川', '你说的太对了'),
(3, '吴翔', '我写的哟'),
(2, '吴翔', '我赞同你的看法'),
(4, '陈艳', '哈哈哈哈哈'),
(2, '陈艳', '说的的太好了');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `savename` varchar(20) NOT NULL,
  `impression` text NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  `filetime` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fid` (`fid`),
  KEY `fid_2` (`fid`),
  KEY `fid_3` (`fid`),
  KEY `fid_4` (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`id`, `filepath`, `filename`, `savename`, `impression`, `number`, `filetime`, `fid`) VALUES
(1, './Public/File/2011081156/', '$看看影院$.xlkkvd', '53410ad2441de.xlkkvd', '这是我发表的第一篇 ，修改了', 3, 1396771538, 1),
(2, './Public/File/2011081156/', '$看看影院$.xlkkvd', '53410b1420a8d.xlkkvd', ' 陈艳是个猪儿', 2, 1396771604, 1),
(3, './Public/File/2011081154/', '$看看影院$.xlkkvd', '53410b8768567.xlkkvd', '我也来发表一下', 1, 1396771719, 2),
(4, './Public/File/1234567890/', '$看看影院$.xlkkvd', '53410c573066b.xlkkvd', '我是陈艳', 0, 1396771927, 6);

-- --------------------------------------------------------

--
-- 表的结构 `praise`
--

CREATE TABLE IF NOT EXISTS `praise` (
  `pid` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `praise`
--

INSERT INTO `praise` (`pid`, `pname`) VALUES
(1, '熊云川'),
(3, '吴翔'),
(2, '吴翔'),
(1, '吴翔'),
(2, '陈艳'),
(1, '陈艳');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `specialty`, `class`, `status`) VALUES
(1, '2011081156', '熊云川', 'e10adc3949ba59abbe56e057f20f883e', 'php', '软件工程4班', 0),
(2, '2011081154', '吴翔', 'e10adc3949ba59abbe56e057f20f883e', 'PHP', '4班', 0),
(3, 'dxy', '杜小宇', 'e10adc3949ba59abbe56e057f20f883e', '', '', 1),
(4, '2011081158', '秦川东', '651346f586d001a044f29ef3829b90cb', 'java', '4班', 0),
(5, '2011081161', '付晨', 'b5e93cc2830e1ab86c6e67e5962d0472', 'java', '4班', 0),
(6, '1234567890', '陈艳', 'e807f1fcf82d132f9bb018ca6738a19f', 'java', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
