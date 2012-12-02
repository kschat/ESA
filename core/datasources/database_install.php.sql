-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2012 at 04:03 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esa`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(75) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_buttons`
--

CREATE TABLE IF NOT EXISTS `admin_buttons` (
  `admin_button_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `html_id` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_button_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_panels`
--

CREATE TABLE IF NOT EXISTS `admin_panels` (
  `admin_panel_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`admin_panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `column_list`
--

CREATE TABLE IF NOT EXISTS `column_list` (
  `column_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `COLUMN_NAME` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`column_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `column_options`
--

CREATE TABLE IF NOT EXISTS `column_options` (
  `col_opt_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `column_name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`col_opt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email_address` varchar(75) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`email_id`),
  KEY `contact_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `enrolled_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  PRIMARY KEY (`enrolled_id`),
  KEY `user_id` (`user_id`),
  KEY `major_id` (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `has_a`
--

CREATE TABLE IF NOT EXISTS `has_a` (
  `has_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_panel_id` int(11) NOT NULL,
  `admin_button_id` int(11) NOT NULL,
  PRIMARY KEY (`has_a_id`),
  KEY `admin_button_id` (`admin_button_id`),
  KEY `admin_panel_id` (`admin_panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(6) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_of`
--

CREATE TABLE IF NOT EXISTS `member_of` (
  `memberof_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`memberof_id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE IF NOT EXISTS `panels` (
  `panel_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_panel_id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`panel_id`),
  KEY `admin_panel_id` (`admin_panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `priviledge_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `position_id` (`position_id`,`priviledge_id`),
  KEY `priviledge_id` (`priviledge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE IF NOT EXISTS `phone_numbers` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  PRIMARY KEY (`phone_id`),
  KEY `contact_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `priviledges`
--

CREATE TABLE IF NOT EXISTS `priviledges` (
  `priviledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`priviledge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_views`
--

CREATE TABLE IF NOT EXISTS `table_views` (
  `table_view_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`table_view_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_view_columns`
--

CREATE TABLE IF NOT EXISTS `table_view_columns` (
  `table_view_col_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_view_id` int(11) NOT NULL,
  `col_opt_id` int(11) NOT NULL,
  `column_title` varchar(50) NOT NULL,
  PRIMARY KEY (`table_view_col_id`),
  KEY `table_view_id` (`table_view_id`,`col_opt_id`),
  KEY `column_list_id` (`col_opt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `grad_year` varchar(11) NOT NULL,
  `alumni` tinyint(1) NOT NULL DEFAULT '0',
  `signedISA` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'http://localhost/ESA/public_html/images/default_avatar.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `majors` (`major_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `has_a`
--
ALTER TABLE `has_a`
  ADD CONSTRAINT `has_a_ibfk_1` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panels` (`admin_panel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `has_a_ibfk_2` FOREIGN KEY (`admin_button_id`) REFERENCES `admin_buttons` (`admin_button_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_of`
--
ALTER TABLE `member_of`
  ADD CONSTRAINT `member_of_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_of_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_of_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panels`
--
ALTER TABLE `panels`
  ADD CONSTRAINT `panels_ibfk_1` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panels` (`admin_panel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`priviledge_id`) REFERENCES `priviledges` (`priviledge_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statuses_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_views`
--
ALTER TABLE `table_views`
  ADD CONSTRAINT `table_views_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_view_columns`
--
ALTER TABLE `table_view_columns`
  ADD CONSTRAINT `table_view_columns_ibfk_1` FOREIGN KEY (`table_view_id`) REFERENCES `table_views` (`table_view_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_view_columns_ibfk_2` FOREIGN KEY (`col_opt_id`) REFERENCES `column_options` (`col_opt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
