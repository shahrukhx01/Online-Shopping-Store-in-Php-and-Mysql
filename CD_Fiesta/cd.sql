-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 10:55 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_log` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `last_log`) VALUES
(1, 'amaar', 'adc513b405614eb2292c4fc44ea1b9c5', '2014-12-21 00:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mem_id` int(10) NOT NULL,
  `cart` text NOT NULL,
  `total` varchar(7) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mem_id` (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `mem_id`, `cart`, `total`, `quantity`) VALUES
(9, 8, '17', '20', 1),
(11, 6, '24', '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_name` varchar(100) NOT NULL,
  `msg_email` varchar(80) NOT NULL,
  `msg_subject` varchar(50) NOT NULL,
  `msg` mediumtext NOT NULL,
  `msg_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg_name`, `msg_email`, `msg_subject`, `msg`, `msg_date`) VALUES
(1, 'Amaar Ali', 'sk28671@gmail.com', 'Games', 'Hi Sir! \r\nDo you have games of  2014?', '2014-11-22'),
(3, 'Shahrukh', 'sk28671@gmail.com', 'Games', 'Do You Have CD Of GTA 5?', '2014-11-22'),
(4, 'Imran', 'imran@yahoo.com', 'Movies', 'Hi, How are you doing? I wanted to know that when will the CD of hobbits 3 will be available at your store? I wanted know that whats the available collection there at your store. I will be waiting for a rapid reply from you as soon as possible. Many thanks!!', '2014-11-22'),
(5, 'Amaar Ali', 'sk286@gmail.com', 'Query', 'Do you have assassin creed cd???', '2014-11-29'),
(6, 'Yameen Butt', 'ybutt@ymail.com', 'Query', 'Do you have despicable me 2 in 1080p print?', '2014-12-01'),
(7, 'Farzam', 'farzam@gmail.com', 'Query', 'Do you have GTA 5 for pc?', '2014-12-01'),
(8, 'Waleed Malik', 'sk28671@gmail.com', 'Query', 'Do you have GTA 6 CD?', '2014-12-06'),
(9, 'Nadeem Mughal', 'sk286@gmail.com', 'Query', 'Do you have latest game cds?', '2014-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `CNIC_number` varchar(15) NOT NULL,
  `verify_code` int(15) NOT NULL,
  `products` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `phone_number`, `CNIC_number`, `verify_code`, `products`, `user_id`, `paid_amount`, `status`) VALUES
(1, 'sk@gmail.com', '2147483647', '1231232134', 122311, '19,18', 8, 40, '0'),
(3, 'sk@gmail.com', '2147483647', '1231232134', 122311, '18', 8, 20, '0'),
(4, 'sk@gmail.com', '2147483647', '2147483647', 122311, '19,17', 8, 40, '0'),
(5, 'sk@gmail.com', '2147483647', '1231232134', 122311, '18,23,18,18', 8, 80, '1'),
(6, 'amaar@gmail.com', '2147483647', '1231232134', 122311, '17,17,20,18,19,19,22,25,18,25,26,18,20,24,21,28,28,28,24', 6, 355, '0'),
(7, 'amaar@gmail.com', '923451234567', '1231232134', 122311, '24', 6, 20, '0'),
(8, 'kashi@ymail.com', '923451234567', '1231232134', 122311, '21,19', 10, 40, '0'),
(9, 'shoaib@gmail.com', '923451234567', '1231232134', 122311, '23', 7, 20, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(5) NOT NULL,
  `quantity` int(7) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL,
  `category` varchar(20) NOT NULL,
  `sales` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `status`, `date_added`, `category`, `sales`) VALUES
(17, 'Salt Lake', 'Salt Lake 2002 is the official video game of the XIX Olympic Winter Games, hosted by Salt Lake City, Utah, United States in 2002. Developed by ATD and published by Eidos (DC Studios Inc./Ubisoft for the Game Boy Advance version), it was released for the PC, PlayStation 2 and Game Boy Advance.\r\n\r\nFollowing the success of Sydney 2000, Eidos trusted the Olympic license once again to ATD. The game uses the same graphic style and presentation of the previous game, only with more details. However, while Sydney 2000 managed good sales and positive reviews, Salt Lake 2002 failed to achieve either. The lack of crucial and popular events such as cross-country, biathlon, speed skating or figure skating, combined with only six events (of which 3 involve gates) turned the game into another flop based on the Winter Olympics.', '20', 19, '1', '2014-11-22 03:17:11', 'game', 0),
(18, 'Fifa 15', 'FIFA 15 is an association football simulation video game developed by EA Canada and published by Electronic Arts. It was released on 23 September 2014 in North America, 25 September in Europe and 26 September in the United Kingdom and Ireland for the PlayStation 3, PlayStation 4, PlayStation Vita, Nintendo 3DS, Wii, Xbox One, Xbox 360, Microsoft Windows, iOS, Android and Windows Phone. On PC, FIFA 15 runs on EAâ€™s Ignite engine with the same features as the PS4 and Xbox One editions.\r\n\r\nThe game features Lionel Messi on its cover, alongside a different player in different parts of the world, and is the first game in the FIFA series to be fully licensed by the Premier League. FIFA 15 received positive reviews across all platforms, although the PC version in particular was criticised for the amount of bugs that was featured at release.', '20', 15, '1', '2014-11-22 03:26:18', 'game', 2),
(19, 'MMA', 'EA Sports MMA is a fighting video game which was published by EA Sports and developed by EA Tiburon from 2008 to 2010. It was released for the PlayStation 3 and Xbox 360 on October 19, 2010 in North America and October 22, 2010 everywhere else. Online services have been shut down since April 13, 2012 for the PlayStation 3 and Xbox 360.\r\n\r\nFeatures:\r\n\r\nVenues include boxing rings, circular cages and hexagonal cages.\r\nThe game includes multiple rule sets including Japanese, Vale Tudo, and Strikeforce rules in addition to standard Unified Rules.\r\nThe game includes the ability to fight southpaw- or orthodox, execute foot stomps, soccer kicks and knees to the face on the ground, and fight on the cage, with deep clinchwork and countering.\r\nMauro Ranallo and Frank Shamrock provide commentary, but are unable to announce most custom names.', '20', 16, '1', '2014-11-22 03:27:28', 'game', 1),
(20, 'Cricket 07', 'Cricket 07 features a number of game types, including limited overs matches (50, 20, 10 or 5 overs), 4-day first-class matches and full-length test matches.You may select different pitches and different weather conditions in different venues.[1] Several international venues are available, including the Eden Gardens in India or Lord''s in England. The venues vary in conditions and pitch type, and these can be changed by the player.', '20', 19, '1', '2014-11-22 03:29:55', 'game', 0),
(21, 'Bayonetta', 'Bayonetta is a third-person Beat''em up for the PlayStation 3, Xbox 360 and Wii U, developed by Platinum Games in cooperation with publisher Sega. The game was originally released in Japan in October 2009, and in North America and Europe in January 2010 on the Xbox 360 and PlayStation 3, with the Wii U version released on September 20, 2014, in Japan, followed by worldwide release on October 24, 2014. The Wii U version contains exclusive, Nintendo-themed costumes and is bundled with every retail copy of the Wii U-exclusive Bayonetta 2, or it can be purchased separately in the Nintendo eShop (with a discounted price if bought alongside Bayonetta 2).\r\n\r\nBayonetta centers on its title character, the witch Bayonetta, who uses firearms and magical attacks to fight against angelic enemies. The game''s developers designed its characters with modern style and fashion in mind, and it is composed with a largely upbeat soundtrack.', '20', 19, '1', '2014-11-22 03:31:18', 'game', 0),
(22, 'Isolation', 'Isolation is a third-person shooter video game developed by Remedy Entertainment and published by Gathering of Developers on July 2001 for Microsoft Windows. Ports created later in the year for the PlayStation 2, Xbox and the Game Boy Advance were published by Rockstar Games. A Mac OS port was published on July 16, 2002 by MacSoft in North America and Feral Interactive in the rest of the world. ', '20', 18, '1', '2014-11-22 03:32:46', 'game', 0),
(23, 'Shadow Mordor', ' Shadow of Mordor Shadow of Mordor Shadow of Mordor Shadow of Mordor Shadow of Mordor Shadow of Mordor Shadow of Mordor Shadow of Mordor', '20', 19, '1', '2014-11-22 03:35:20', 'game', 1),
(24, 'Destiny ', 'Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny Destiny ', '20', 18, '1', '2014-11-22 03:37:14', 'game', 1),
(25, 'Minions', 'Minions is an upcoming American 3D computer-animated comedy film and a spin-off/prequel to Despicable Me (2010) and Despicable Me 2 (2013). It is being produced by Illumination Entertainment for Universal Pictures. Written by Brian Lynch, it will be directed by Pierre Coffin and Kyle Balda, and produced by Chris Meledandri and Janet Healy.', '10', 98, '1', '2014-11-29 03:21:39', 'movie', 0),
(26, 'Despicable Me', 'Minions is an upcoming American 3D computer-animated comedy film and a spin-off/prequel to Despicable Me (2010) and Despicable Me 2 (2013). It is being produced by Illumination Entertainment for Universal Pictures. Written by Brian Lynch, it will be directed by Pierre Coffin and Kyle Balda, and produced by Chris Meledandri and Janet Healy.', '15', 99, '1', '2014-11-29 03:39:42', 'movie', 0),
(28, 'Despicable Me 2', 'Despicable Me 2 is a 2013 American 3D computer-animated comedy film and the sequel to the 2010 animated film Despicable Me.[7] Produced by Illumination Entertainment for Universal Pictures, and animated by Illumination Mac Guff,[8] the film is directed by Pierre Coffin and Chris Renaud, and written by Cinco Paul and Ken Daurio. This marks the first time that Illumination Entertainment made a sequel film.', '20', 84, '1', '2014-11-29 03:46:27', 'movie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `review` text NOT NULL,
  `review_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `product_id`, `review`, `review_date`) VALUES
(1, 'Shahrukh Khan', 18, 'Really cool game....', '0000-00-00 00:00:00'),
(2, 'Shahrukh Khan', 17, 'Amaazing Graphics... Realtime game play experience.... Great Servers.... :-D', '2014-12-11 21:55:56'),
(3, 'Amaar Ali', 17, 'I really enjoyed playing this game... Some real action with some awesome graphics...\r\nI recomend this game to all the users who want some action pack game this the best stop for action based games....!!\r\nThumbs up (y)', '2014-12-11 22:24:43'),
(4, 'Amaar Ali', 23, 'yo mordo....!!', '2014-12-12 03:24:44'),
(5, 'Amaar Ali', 22, 'This game is perfect......', '2014-12-14 03:43:59'),
(6, 'Shoaib Ahmad', 18, 'Kudos Graphics... (y)', '2014-12-21 00:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `last_log` datetime NOT NULL,
  `signup` date NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `country`, `city`, `state`, `phone`, `email`, `password`, `address`, `ip`, `last_log`, `signup`, `activated`) VALUES
(2, 'Shahrukh Khan', 'Pakistan', 'Rawalpindi', 'Punjab', '2147483647', 'sk28675@gmail.com', '7f26a3192365bc989c11', 'NoAddressPlease', '::1', '0000-00-00 00:00:00', '2014-11-26', '0'),
(3, 'Amaar Khan', 'Pakistan', 'Rawalpindi', 'Punjab', '2147483647', 'sk28676@gmail.com', '7f26a3192365bc989c11', 'NoAddressPlease', '::1', '0000-00-00 00:00:00', '2014-11-26', '0'),
(4, 'Amaar Ali Khan', 'UnitedStatesofAmerica', 'Rawalpindi', 'Punjab', '2147483647', 'sk28677@gmail.com', 'cebfbd2280343a17989f', 'NoAddressPlease', '::1', '0000-00-00 00:00:00', '2014-11-26', '0'),
(5, 'Chris Gayle', 'Jamaica', 'Jumaica', 'WestIndies', '90078601', 'gayle.henry@gmail.com', '011b21b9828e96f6504dd2243874c151', 'OnlyCarribeanKnowsMe', '::1', '2014-11-26 20:54:35', '2014-11-26', '0'),
(6, 'Shahrukh Khan', 'Pakistan', 'Rawalpindi', 'Punjab', '2147483647', 'sk286@gmail.com', '011b21b9828e96f6504dd2243874c151', 'amaaraliamaaraliamaarali', '::1', '0000-00-00 00:00:00', '2014-11-26', '0'),
(7, 'Shoaib Ahmad', 'Pakistan', 'Rawalpindi', 'Punjab', '2147483647', 'shoaib@gmail.com', '011b21b9828e96f6504dd2243874c151', 'Tramrivegastoisb', '::1', '0000-00-00 00:00:00', '2014-12-01', '0'),
(8, 'Amaar Ali', 'Pakistan', 'Rawalpindi', 'Punjab', '2147483647', 'sk@gmail.com', '011b21b9828e96f6504dd2243874c151', 'Noaddressyettobepermanent', '::1', '0000-00-00 00:00:00', '2014-12-11', '0'),
(10, 'Shoaib Ahmad', 'Pakistan', 'lahore', 'Punjab', '923451234567', 'kashi@ymail.com', '011b21b9828e96f6504dd2243874c151', 'andajdnsaalkdasndklaslajdklasd', '::1', '0000-00-00 00:00:00', '2014-12-20', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
