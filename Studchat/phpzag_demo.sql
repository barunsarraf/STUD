-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2019 at 06:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpzag_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`, `status`) VALUES
(1, 3, 1, 'j,mvbmbn,n', '2019-05-29 15:02:19', 0),
(2, 3, 1, 'mhfmhjvb', '2019-05-29 15:05:17', 0),
(3, 3, 1, 'hello2', '2019-05-29 15:05:26', 0),
(4, 1, 3, 'what is your problem?', '2019-05-29 15:05:49', 0),
(5, 1, 3, 'sbhn', '2019-05-29 15:07:47', 0),
(6, 1, 3, 'xfbxnh', '2019-05-29 15:09:08', 0),
(7, 3, 1, 'heyyyy ', '2019-05-29 15:11:03', 0),
(8, 3, 1, 'zdvxdvbxd', '2019-05-29 15:13:00', 0),
(9, 1, 3, 'xfbhhhxf', '2019-05-29 15:13:06', 1),
(10, 3, 1, 'dthshxdtrhdrshg', '2019-05-29 17:05:06', 0),
(11, 1, 3, 'kuhkjhk', '2019-05-29 17:05:16', 1),
(12, 1, 3, 'dfzdvzd', '2019-05-29 17:05:50', 1),
(13, 3, 1, 'zczsczs', '2019-05-29 17:06:07', 0),
(14, 7, 1, 'hey rose how are you', '2019-05-29 17:53:43', 0),
(15, 7, 8, 'barun tu pagal h', '2019-05-29 18:14:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

DROP TABLE IF EXISTS `chat_login_details`;
CREATE TABLE IF NOT EXISTS `chat_login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `userid`, `last_activity`, `is_typing`) VALUES
(1, 1, '2019-05-29 17:05:46', 'yes'),
(2, 3, '2019-05-29 17:06:02', 'yes'),
(3, 7, '2019-05-29 17:53:19', 'no'),
(4, 1, '2019-05-29 17:54:47', 'no'),
(5, 7, '2019-05-29 17:58:09', 'no'),
(6, 7, '2019-05-29 18:08:34', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
CREATE TABLE IF NOT EXISTS `chat_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`userid`, `username`, `password`, `avatar`, `current_session`, `online`) VALUES
(1, 'Rose', '123', 'user1.jpg', 7, 0),
(2, 'Smith', '123', 'user2.jpg', 0, 0),
(3, 'adam', '123', 'user3.jpg', 1, 1),
(4, 'Merry', '123', 'user4.jpg', 0, 0),
(5, 'katrina', '123', 'user5.jpg', 0, 0),
(6, 'Rhodes', '123', 'user6.jpg', 0, 0),
(7, 'soujanya', '123', 'soujanya.jpeg', 8, 1),
(8, 'barun', '123', 'barun.jpeg', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
