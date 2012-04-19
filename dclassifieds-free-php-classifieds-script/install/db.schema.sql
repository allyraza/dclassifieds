-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 
-- Версия на сървъра: 5.1.42
-- Версия на PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `dclassifieds_v2_download`
--

-- --------------------------------------------------------

--
-- Структура на таблица `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_type_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `ad_email` varchar(255) DEFAULT NULL,
  `ad_publish_date` date DEFAULT NULL,
  `ad_ip` varchar(20) DEFAULT NULL,
  `ad_price` varchar(255) DEFAULT NULL,
  `ad_phone` varchar(255) DEFAULT NULL,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_description` text,
  `ad_tags` text,
  `ad_puslisher_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `ad_vip` tinyint(4) DEFAULT '0',
  `ad_link` varchar(255) DEFAULT NULL,
  `ad_video` varchar(255) DEFAULT NULL,
  `ad_lat` varchar(50) DEFAULT NULL,
  `ad_lng` varchar(50) DEFAULT NULL,
  `ad_skype` varchar(255) DEFAULT NULL,
  `ad_valid_until` date DEFAULT NULL,
  `ad_address` varchar(255) DEFAULT NULL,
  `ad_valid_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `category_id` (`category_id`),
  KEY `location_id` (`location_id`),
  FULLTEXT KEY `ad_title` (`ad_title`,`ad_description`,`ad_tags`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `ad`
--


-- --------------------------------------------------------

--
-- Структура на таблица `ad_ban_email`
--

CREATE TABLE IF NOT EXISTS `ad_ban_email` (
  `ban_email_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ban_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ban_email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `ad_ban_email`
--


-- --------------------------------------------------------

--
-- Структура на таблица `ad_ban_ip`
--

CREATE TABLE IF NOT EXISTS `ad_ban_ip` (
  `ban_ip_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ban_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ban_ip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `ad_ban_ip`
--


-- --------------------------------------------------------

--
-- Структура на таблица `ad_pic`
--

CREATE TABLE IF NOT EXISTS `ad_pic` (
  `ad_pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned NOT NULL,
  `ad_pic_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ad_pic_id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `ad_pic`
--


-- --------------------------------------------------------

--
-- Структура на таблица `ad_tag`
--

CREATE TABLE IF NOT EXISTS `ad_tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_text` varchar(255) DEFAULT NULL,
  `tag_frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `ad_tag`
--


-- --------------------------------------------------------

--
-- Структура на таблица `ad_type`
--

CREATE TABLE IF NOT EXISTS `ad_type` (
  `ad_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ad_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дъмп (схема) на данните в таблицата `ad_type`
--

INSERT INTO `ad_type` (`ad_type_id`, `ad_type_name`) VALUES
(1, 'Sale'),
(2, 'Buy'),
(3, 'Gift');

-- --------------------------------------------------------

--
-- Структура на таблица `ad_valid`
--

CREATE TABLE IF NOT EXISTS `ad_valid` (
  `ad_valid_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_valid_days` int(11) DEFAULT NULL,
  `ad_valid_name` varchar(255) DEFAULT NULL,
  `ad_valid_ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_valid_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дъмп (схема) на данните в таблицата `ad_valid`
--

INSERT INTO `ad_valid` (`ad_valid_id`, `ad_valid_days`, `ad_valid_name`, `ad_valid_ord`) VALUES
(1, 15, '15 Days', 1),
(2, 30, '30 Days', 2),
(3, 180, '6 Months', 3),
(4, 365, '1 Year', 4);

-- --------------------------------------------------------

--
-- Структура на таблица `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_parent_id` int(10) unsigned DEFAULT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_keywords` varchar(255) DEFAULT NULL,
  `category_active` tinyint(4) DEFAULT '1',
  `category_ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `category`
--


-- --------------------------------------------------------

--
-- Структура на таблица `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_parent_id` int(11) DEFAULT NULL,
  `location_active` tinyint(4) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `location`
--


-- --------------------------------------------------------

--
-- Структура на таблица `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_description` varchar(255) DEFAULT NULL,
  `page_keywords` varchar(255) DEFAULT NULL,
  `page_content` text NOT NULL,
  `page_active` tinyint(4) DEFAULT '1',
  `page_ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дъмп (схема) на данните в таблицата `page`
--


-- --------------------------------------------------------

--
-- Структура на таблица `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `setting_description` text NOT NULL,
  `setting_show_in_admin` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дъмп (схема) на данните в таблицата `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`, `setting_description`, `setting_show_in_admin`) VALUES
(1, 'APP_NAME', 'DClassifieds Free Classifieds Script', 'Site Name', 1),
(2, 'APP_LANG', 'en', 'Site Language', 1),
(3, 'APP_THEME', 'basic', 'Site Theme', 1),
(4, 'CONTACT_EMAIL', 'webmaster@dclassifieds.eu', 'Contact email', 1),
(5, 'NUM_CLASSIFIEDS_HOME_PAGE', '7', 'Num classifieds on home page', 1),
(6, 'NUM_CLASSIFIEDS_ON_PAGE', '10', 'Num classifieds on page', 1),
(7, 'NUM_SIMILAR_CLASSIFIEDS', '5', 'Num similar classifieds', 1),
(8, 'ADMIN_USER', 'admin', 'Admin panel user name', 1),
(9, 'ADMIN_PASS', 'admin', 'Admin panel user password', 1),
(10, 'SEND_CONTROL_MAIL', '1', 'Send Control E-Mail', 1),
(11, 'EMAIL_TYPE', 'mail', 'Email type', 1),
(12, 'EMAIL_AUTH', '', 'Email requeres authorization', 1),
(13, 'EMAIL_HOST', '', 'Email host', 1),
(14, 'EMAIL_PORT', '', 'Email port', 1),
(15, 'EMAIL_USER', '', 'Email user', 1),
(16, 'EMAIL_PASS', '', 'Email pass', 1),
(17, 'ENABLE_VISUAL_EDITOR', '1', 'Enable Visual Editor', 1),
(18, 'ENABLE_GOOGLE_MAP', '1', 'Enable Google Map', 1),
(19, 'ENABLE_TIPSY_PUBLISH', '1', 'Enable Tips on Publish', 1),
(20, 'ENABLE_VIDEO_LINK_PUBLISH', '1', 'Enable video link publish', 1),
(21, 'ENABLE_LINK_PUBLISH', '1', 'Enable link publish', 1),
(22, 'MAX_PIC_UPLOAD_SIZE', '204800', 'Maximum upload image size', 1),
(23, 'NUM_PICS_UPLOAD', '3', 'Num upload pics publish', 1),
(24, 'NUM_HISTORY_ITEMS', '5', 'Num classifieds in history box', 1),
(25, 'NUM_ITEMS_IN_RSS', '100', 'Num items in rss feed', 1),
(26, 'PRICE_CURRENCY_NAME', '&euro;', 'Site currency name', 1);
