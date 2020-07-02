-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2020 at 01:31 AM
-- Server version: 8.0.16
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topbetz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `memberID` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`memberID`, `firstName`, `lastName`, `username`, `userPassword`, `email`, `imageUrl`, `description`) VALUES
(6, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$t3wJU0SkEHMHtFUr1pVsM.olf8ECQkqc43eENO6B1yDS5uNsSWPvG', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(7, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$5aUTUYAW2mYfg0.Hmn3wmukXnVp675DLlD6m5XbFcaB3xQU/TUefa', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(8, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$b.i/FQP2FRM.pCh.oCwrC.rQd3RF7WkMdnZ7nJuJLeRRvuQu7/51O', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(9, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$2VmBlHzNvzSObf82rSVK3.ePQp9CZQSP8FadJ/AR4A97/iYAQ7.mK', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(10, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$ulnzx9VRfImdl84GJyx0quCS153o0zF/kJqEzMoDX5m4ODY8VHHze', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(11, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$lLtiF1ij8Ho.1p3pbCmrO.DH3nh4OhMOdX3dGBmqUJ8QZ6FfXd6Bi', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(12, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$EKp3hAI5J/PENyj/NjdxiOqHZARhOvrfw4TRl289OLDrR21uEIQva', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(13, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$fUw40KmTi1FYCnf1j8XPluQbJxCjPWOu40rxIo8MmB8NbbId2jEsq', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(14, 'Brian', 'Kelly', 'kelllybrian', '$2y$10$N57/sNplmZtc2efFiS96t.Swk.WF2SipKdwbsP6x90NlRAcUj3G0C', 'kellybrian@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/kelllybrianScreenshot 2019-07-26 22:52:09.png', 'This is  a very wonderful and awesome stuff, utapenda. You shall love it.'),
(15, 'Crow', 'crow', 'crowmdogo', '$2y$10$VVyQd7q.03Y6Ro8qG7bMRepegELcnOnLMrsPSSnayWJWz/bM/4yJW', 'crowmdogo@gmail.com', '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/br-images/crowmdogoScreenshot 2019-07-26 22:52:09.png', 'This is the relevancy of it all, utapenda intel na the info utapata hapa. Jibambe');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `commentID` int(30) NOT NULL,
  `postID` int(30) DEFAULT NULL,
  `commentFirstName` varchar(20) DEFAULT NULL,
  `commentSecondName` varchar(20) DEFAULT NULL,
  `commentMessage` varchar(2000) DEFAULT NULL,
  `commentDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(30) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDescription` varchar(3500) DEFAULT NULL,
  `postContent` varchar(10000) DEFAULT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `authorID` int(11) DEFAULT NULL,
  `isPublished` int(1) DEFAULT '0',
  `postImage` varchar(255) DEFAULT NULL,
  `isTrending` int(1) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postDescription`, `postContent`, `authorID`, `isPublished`, `postImage`, `isTrending`, `categoryID`) VALUES
(3, 'Clear Find', 'This is a clear intel', 'This is a contradicting post of information that is found in a new and profound pool of ideas that you can look into and learn more.', 14, 1, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/878412e08e364192e7ea2d5c60a209e0Screenshot from 2019-11-07 03-42-55.png', NULL, 6),
(4, 'Cow', 'This a bull', '<p style=\"\">This a very wonderful idea that you can take up and learn more from. Look at it clearly and you will understand.<br></p>', 14, 1, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/ff68f17586f36f93dd9c8375a6dd364dScreenshot from 2019-12-18 10-29-03.png', 0, 5),
(5, 'Cow', 'This a big one', '<p style=\"\">This is a very wonderful post, go through it carefully you shall understand more about some one two things that matter a lot.<br></p>', 14, 1, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/fe0707cc476fa27a17508867b2b95d14Screenshot 2019-07-26 22:52:42.png', NULL, 3),
(7, 'Main Car', 'This is a wonderful car for you to check out', '<p style=\"\">This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. <br></p><p style=\"\"> A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&nbsp;</p>&lt;blockquote class=\"generic-blockquote\"&gt; This guys bagged a big fete come last season when they were the top \r\ngoalscorers in the league, i.e EPL and each netting 30 goals for club. \r\nIt is something considering the run and that two of them (Salah and \r\nMane) are from the same club i.e Liverpool. Utapenda aje football made \r\nin Africa if you don`t like these guys. Ian &lt;blockquote&gt;', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/9a3d173899bfeb9c32cec758cee871e1Screenshot from 2019-10-27 17-33-14.png', NULL, 2),
(8, 'BlueMan', 'This is a new and a white cow in the area', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/5be05ef49ee5aa132d182a1147babe64Screenshot from 2019-11-07 04-09-07.png', 1, 2),
(9, 'New Post Alert', 'This is a new post in the various details available for this area.', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/4348b2dfb4a7f93e823274770e9175adScreenshot from 2019-11-27 11-54-00.png', NULL, 9),
(10, 'Mambo Kangaja', 'Lorem Ipsum', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/2fa1759384c2294d3addf87157ca9cbcScreenshot from 2019-11-12 04-28-24.png', NULL, 7),
(11, 'Football Made in Kenya', 'This is an outline of football made in Kenya', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/a4f9e3911cf0fd4b6e0bb6fc49ce49dbScreenshot from 2019-12-18 10-29-03.png', 1, 3),
(12, 'Salah Joins Arsenal and says no to Man U', 'This is a shocker, utashangaa', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/33e726f16937f9fe7ff747f086dfd135Screenshot from 2019-11-12 04-38-48.png', NULL, 5),
(13, 'Frasha Details', 'This  are xquisite details on frasha', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/930dd61db295c95080ba4d3d096adb8aScreenshot from 2019-11-27 11-54-00.png', NULL, 10),
(14, 'Karachuonyo Derby', 'The derby of derbies', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/8d0d198c3bb713f12c26aa1e3aff65fcScreenshot from 2019-12-18 10-28-59.png', 1, 2),
(15, 'Turu Turu', 'This is a football song by WIllyPaul and someone', '<p>This is a simple post about the data and details provided by my team. You can check out what we are offering and the various details available for us out here. Please do read keenly and or subscribe or leave a comment. Do share in the various channels that are available and do not forget its importance. Woow! Did you look at that Maradona strike in the beginning of the match. The guy went straight for the half way line and made way straight to the penalty box. A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys. &lt;br&gt;&lt;/p&gt;&lt;p style=\"\"&gt; A straight goal man! Football is fun if you follow it closely and pay attention to what it offers and the data it avails. This is the new African trio, the likes of Mane, Salah, Aubameyang. This guys bagged a big fete come last season when they were the top goalscorers in the league, i.e EPL and each netting 30 goals for club. It is something considering the run and that two of them (Salah and Mane) are from the same club i.e Liverpool. Utapenda aje football made in Africa if you don`t like these guys.&amp;nbsp;&lt;/p&gt;&amp;lt;blockquote class=\"generic-blockquote\"&amp;gt; This guys bagged a big fete come last season when they were the top </p><p>goalscorers in the league, i.e EPL and each netting 30 goals for club. </p><p>It is something considering the run and that two of them (Salah and </p><p>Mane) are from the same club i.e Liverpool. Utapenda aje football made </p><p>in Africa if you don`t like these guys. Ian &amp;lt;blockquote&amp;gt;</p>', 14, 0, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/8aeeb74d90620ff14e6c98faea6f4fe2Screenshot from 2019-11-07 04-09-07.png', 1, 8),
(16, 'Mo Salah ditches Liverpool to join his dream team, Arsenal', 'This is wonderful', '<p style=\"\">This has left the sports world in disbelief. This has left the sports world in disbelief. This has left the sports world in disbelief. This has left the sports world in disbelief. This has left the sports world in disbelief. This has left the sports world in disbelief. This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.</p><p style=\"\">This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.v This has left the sports world in disbelief. This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief.This has left the sports world in disbelief. <br></p>', 14, 1, '/opt/lampstack-7.3.6-2/apache2/htdocs/football-blog/img/p-images/9b47d31376e17f5780b4ba334b976c58Screenshot from 2019-10-27 17-33-07.png', NULL, 9);

--
-- Triggers `blog_posts`
--
DELIMITER $$
CREATE TRIGGER `update_user_password` BEFORE UPDATE ON `blog_posts` FOR EACH ROW BEGIN
      IF OLD.isPublished <> NEW.isPublished THEN
        SET NEW.postDate = NOW();
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) DEFAULT NULL,
  `bookname` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(2, 'Europe'),
(3, 'International'),
(5, 'Africa'),
(6, 'Kenya'),
(7, 'Americas'),
(8, 'Asia'),
(9, 'England'),
(10, 'Friendlies');

-- --------------------------------------------------------

--
-- Table structure for table `session_manager`
--

CREATE TABLE `session_manager` (
  `sessionID` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_manager`
--

INSERT INTO `session_manager` (`sessionID`) VALUES
(0),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `authorID` (`authorID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `session_manager`
--
ALTER TABLE `session_manager`
  ADD PRIMARY KEY (`sessionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `commentID` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`authorID`) REFERENCES `bloggers` (`memberID`),
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
