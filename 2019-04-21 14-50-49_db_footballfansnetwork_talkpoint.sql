/*
SQLyog Job Agent v11.5 (64 bit) Copyright(c) Webyog Inc. All Rights Reserved.


MySQL - 5.7.14 : Database - footballfansnetwork_talkpoint
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Database structure for database `footballfansnetwork_talkpoint` */

CREATE DATABASE /*!32312 IF NOT EXISTS*/`footballfansnetwork_talkpoint` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `footballfansnetwork_talkpoint`;

/*Table structure for table `mlf2_akismet_rating` */

DROP TABLE IF EXISTS `mlf2_akismet_rating`;

CREATE TABLE `mlf2_akismet_rating` (
  `eid` int(11) NOT NULL,
  `spam` tinyint(1) NOT NULL DEFAULT '0',
  `spam_check_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`),
  KEY `akismet_spam` (`spam`),
  KEY `spam_check_status` (`spam_check_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_akismet_rating` */

/*Table structure for table `mlf2_b8_rating` */

DROP TABLE IF EXISTS `mlf2_b8_rating`;

CREATE TABLE `mlf2_b8_rating` (
  `eid` int(11) NOT NULL,
  `spam` tinyint(1) NOT NULL DEFAULT '0',
  `training_type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`),
  KEY `b8_spam` (`spam`),
  KEY `training_type` (`training_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_b8_rating` */

/*Table structure for table `mlf2_b8_wordlist` */

DROP TABLE IF EXISTS `mlf2_b8_wordlist`;

CREATE TABLE `mlf2_b8_wordlist` (
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `count_ham` int(10) unsigned DEFAULT NULL,
  `count_spam` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_b8_wordlist` */

insert  into `mlf2_b8_wordlist` values ('b8*dbversion',3,NULL),('b8*texts',0,0);

/*Table structure for table `mlf2_banlists` */

DROP TABLE IF EXISTS `mlf2_banlists`;

CREATE TABLE `mlf2_banlists` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `list` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_banlists` */

insert  into `mlf2_banlists` values ('user_agents',''),('ips',''),('words','');

/*Table structure for table `mlf2_bookmark_tags` */

DROP TABLE IF EXISTS `mlf2_bookmark_tags`;

CREATE TABLE `mlf2_bookmark_tags` (
  `bid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`bid`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_bookmark_tags` */

/*Table structure for table `mlf2_bookmarks` */

DROP TABLE IF EXISTS `mlf2_bookmarks`;

CREATE TABLE `mlf2_bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `posting_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_uid_pid` (`user_id`,`posting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_bookmarks` */

/*Table structure for table `mlf2_categories` */

DROP TABLE IF EXISTS `mlf2_categories`;

CREATE TABLE `mlf2_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `category` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `accession` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_categories` */

/*Table structure for table `mlf2_entries` */

DROP TABLE IF EXISTS `mlf2_entries`;

CREATE TABLE `mlf2_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `uniqid` varchar(255) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_reply` timestamp NULL DEFAULT NULL,
  `edited` timestamp NULL DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `show_signature` tinyint(4) DEFAULT '0',
  `email_notification` tinyint(4) DEFAULT '0',
  `marked` tinyint(4) DEFAULT '0',
  `locked` tinyint(4) DEFAULT '0',
  `sticky` tinyint(4) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `edit_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `tid` (`tid`),
  KEY `category` (`category`),
  KEY `pid` (`pid`),
  KEY `sticky` (`sticky`),
  KEY `user_id` (`user_id`),
  KEY `time` (`time`),
  KEY `last_reply` (`last_reply`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_entries` */

/*Table structure for table `mlf2_entries_cache` */

DROP TABLE IF EXISTS `mlf2_entries_cache`;

CREATE TABLE `mlf2_entries_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_text` mediumtext NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_entries_cache` */

/*Table structure for table `mlf2_entry_tags` */

DROP TABLE IF EXISTS `mlf2_entry_tags`;

CREATE TABLE `mlf2_entry_tags` (
  `bid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`bid`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_entry_tags` */

/*Table structure for table `mlf2_logincontrol` */

DROP TABLE IF EXISTS `mlf2_logincontrol`;

CREATE TABLE `mlf2_logincontrol` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `logins` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_logincontrol` */

/*Table structure for table `mlf2_pages` */

DROP TABLE IF EXISTS `mlf2_pages`;

CREATE TABLE `mlf2_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `menu_linkname` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_pages` */

/*Table structure for table `mlf2_read_entries` */

DROP TABLE IF EXISTS `mlf2_read_entries`;

CREATE TABLE `mlf2_read_entries` (
  `user_id` int(11) unsigned NOT NULL,
  `posting_id` int(11) unsigned NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`user_id`,`posting_id`),
  KEY `user_id` (`user_id`),
  KEY `posting_id` (`posting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_read_entries` */

/*Table structure for table `mlf2_settings` */

DROP TABLE IF EXISTS `mlf2_settings`;

CREATE TABLE `mlf2_settings` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_settings` */

insert  into `mlf2_settings` values ('access_for_users_only','0'),('ajax_preview','1'),('akismet_entry_check','0'),('akismet_key',''),('akismet_mail_check','0'),('autolink','1'),('autologin','1'),('auto_delete_spam','168'),('auto_lock','0'),('auto_lock_old_threads','0'),('avatars','0'),('avatar_max_filesize','20'),('avatar_max_height','80'),('avatar_max_width','80'),('b8_auto_training','1'),('b8_entry_check','1'),('b8_spam_probability_threshold','80'),('bad_behavior','0'),('bbcode','1'),('bbcode_code','0'),('bbcode_color','1'),('bbcode_img','1'),('bbcode_latex','0'),('bbcode_latex_uri','https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS_CHTML.js'),('bbcode_size','1'),('captcha_email','0'),('captcha_posting','0'),('captcha_register','0'),('cookie_validity_days','30'),('count_users_online','10'),('count_views','1'),('daily_actions_time','3:30'),('data_privacy_agreement','0'),('data_privacy_statement_url',''),('deep_reply','15'),('default_email_contact','0'),('default_view','0'),('delete_ips','0'),('dont_reg_edit_by_admin','0'),('dont_reg_edit_by_mod','0'),('edit_delay','3'),('edit_max_time_period','60'),('edit_min_time_period','5'),('email_maxlength','70'),('email_notification_unregistered','0'),('email_subject_maxlength','100'),('email_text_maxlength','10000'),('empty_postings_possible','0'),('entries_by_users_only','0'),('flood_prevention_minutes','2'),('fold_threads','0'),('forum_address','http://localhost/footballfannetwork/talkpoint/'),('forum_description','yet another little forum'),('forum_disabled_message',''),('forum_email','gooption@yahoo.com'),('forum_enabled','1'),('forum_name','FFN Talkpoint'),('forum_readonly','0'),('home_linkaddress','../'),('home_linkname',''),('hp_maxlength','70'),('language_file','english.lang'),('last_reply_link','0'),('latest_postings','0'),('location_maxlength','40'),('location_word_maxlength','30'),('mail_parameter',''),('main_site_address','http://localhost/footballfannetwork'),('max_email_time','10800'),('max_posting_time','10800'),('max_register_time','10800'),('min_email_time','5'),('min_posting_time','5'),('min_pw_digits','0'),('min_pw_length','8'),('min_pw_lowercase_letters','0'),('min_pw_special_characters','0'),('min_pw_uppercase_letters','0'),('min_register_time','5'),('name_maxlength','70'),('name_word_maxlength','30'),('page_browse_range','10'),('page_browse_show_last','0'),('profile_maxlength','5000'),('quote_symbol','>'),('read_state_expiration_method','0'),('read_state_expiration_value','500'),('register_mode','0'),('remember_last_visit','1'),('remember_userdata','1'),('rss_feed','1'),('rss_feed_max_items','20'),('save_spam','1'),('search_results_per_page','20'),('session_prefix','mlf2_'),('show_if_edited','1'),('signature_maxlength','255'),('smilies','1'),('spam_check_registered','0'),('stop_forum_spam','0'),('subject_maxlength','60'),('subject_word_maxlength','30'),('syntax_highlighter','0'),('tags','1'),('tag_cloud','0'),('tag_cloud_day_period','30'),('tag_cloud_scale_max','6'),('tag_cloud_scale_min','0'),('temp_block_ip_after_repeated_failed_logins','10'),('terms_of_use_agreement','0'),('terms_of_use_url',''),('text_maxlength','5000'),('text_word_maxlength','90'),('theme','default'),('threads_per_page','30'),('time_difference','0'),('time_zone',''),('uploads_per_page','20'),('upload_images','0'),('upload_max_img_height','600'),('upload_max_img_size','60'),('upload_max_img_width','600'),('username_maxlength','40'),('users_per_page','20'),('user_area_public','0'),('user_edit','1'),('user_edit_if_no_replies','0'),('very_deep_reply','30');

/*Table structure for table `mlf2_smilies` */

DROP TABLE IF EXISTS `mlf2_smilies`;

CREATE TABLE `mlf2_smilies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(100) NOT NULL DEFAULT '',
  `code_1` varchar(50) NOT NULL DEFAULT '',
  `code_2` varchar(50) NOT NULL DEFAULT '',
  `code_3` varchar(50) NOT NULL DEFAULT '',
  `code_4` varchar(50) NOT NULL DEFAULT '',
  `code_5` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_smilies` */

insert  into `mlf2_smilies` values (1,1,'smile.png',':-)','','','','',''),(2,2,'wink.png',';-)','','','','',''),(3,3,'tongue.png',':-P','','','','',''),(4,4,'biggrin.png',':-D','','','','',''),(5,5,'neutral.png',':-|','','','','',''),(6,6,'frown.png',':-(','','','','','');

/*Table structure for table `mlf2_subscriptions` */

DROP TABLE IF EXISTS `mlf2_subscriptions`;

CREATE TABLE `mlf2_subscriptions` (
  `user_id` int(12) unsigned DEFAULT NULL,
  `eid` int(12) unsigned NOT NULL,
  `unsubscribe_code` varchar(36) NOT NULL,
  `tstamp` datetime DEFAULT NULL,
  UNIQUE KEY `user_thread` (`user_id`,`eid`) USING HASH,
  KEY `hash` (`unsubscribe_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_subscriptions` */

/*Table structure for table `mlf2_tags` */

DROP TABLE IF EXISTS `mlf2_tags`;

CREATE TABLE `mlf2_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_tags` */

/*Table structure for table `mlf2_temp_infos` */

DROP TABLE IF EXISTS `mlf2_temp_infos`;

CREATE TABLE `mlf2_temp_infos` (
  `name` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_temp_infos` */

insert  into `mlf2_temp_infos` values ('access_permission_checks','0',NULL),('last_changes','0',NULL),('last_version_check','2.4.19.1','2019-04-08 00:41:26'),('last_version_uri','https://github.com/ilosuna/mylittleforum/releases/tag/2.4.19.1',NULL),('next_daily_actions','1554867000','2019-04-09 08:18:35'),('version','2.4.99.0',NULL);

/*Table structure for table `mlf2_uploads` */

DROP TABLE IF EXISTS `mlf2_uploads`;

CREATE TABLE `mlf2_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uploader` int(10) unsigned DEFAULT NULL,
  `filename` varchar(64) DEFAULT NULL,
  `tstamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_uploads` */

/*Table structure for table `mlf2_userdata` */

DROP TABLE IF EXISTS `mlf2_userdata`;

CREATE TABLE `mlf2_userdata` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(4) DEFAULT '0',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `user_real_name` varchar(255) DEFAULT '',
  `gender` tinyint(4) DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `user_pw` varchar(255) DEFAULT '',
  `user_email` varchar(255) DEFAULT '',
  `email_contact` tinyint(4) DEFAULT '0',
  `user_hp` varchar(255) DEFAULT '',
  `user_location` varchar(255) DEFAULT '',
  `signature` varchar(255) DEFAULT '',
  `profile` text,
  `logins` int(11) DEFAULT '0',
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logout` timestamp NULL DEFAULT NULL,
  `user_ip` varchar(128) DEFAULT '',
  `registered` timestamp NULL DEFAULT NULL,
  `category_selection` varchar(255) DEFAULT NULL,
  `thread_order` tinyint(4) DEFAULT '0',
  `user_view` tinyint(4) DEFAULT '0',
  `sidebar` tinyint(4) DEFAULT '1',
  `fold_threads` tinyint(4) DEFAULT '0',
  `thread_display` tinyint(4) DEFAULT '0',
  `new_posting_notification` tinyint(4) DEFAULT '0',
  `new_user_notification` tinyint(4) DEFAULT '0',
  `user_lock` tinyint(4) DEFAULT '0',
  `auto_login_code` varchar(50) DEFAULT '',
  `pwf_code` varchar(50) DEFAULT NULL,
  `activate_code` varchar(50) DEFAULT '',
  `language` varchar(255) DEFAULT '',
  `time_zone` varchar(255) DEFAULT '',
  `time_difference` smallint(4) DEFAULT '0',
  `theme` varchar(255) DEFAULT '',
  `tou_accepted` datetime DEFAULT NULL,
  `dps_accepted` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_userdata` */

insert  into `mlf2_userdata` values (1,2,'Admin','',0,NULL,'a92f871baec4cf7e286cc0033b53707caf3cb1cf297ed50b2b','gooption@yahoo.com',1,'','','','',0,NULL,NULL,'','2019-04-08 00:41:14',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'',NULL,NULL),(2,0,'','',0,NULL,'24b195952b2a1b3ae3bd17d9db77c86f62a7288193302e18b7','',0,'','','','',0,NULL,'2019-04-08 14:20:13','::1','2019-04-08 14:20:13',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,0,'','',0,NULL,'24b195952b2a1b3ae3bd17d9db77c86f62a7288193302e18b7','',0,'','','','',0,NULL,'2019-04-08 14:20:13','::1','2019-04-08 14:20:13',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,0,'','',0,NULL,'f78054fbdc26d5d360737ee2fda77759ac745ea43e95309c5b','',0,'','','','',0,NULL,'2019-04-08 14:20:16','::1','2019-04-08 14:20:16',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,0,'','',0,NULL,'f78054fbdc26d5d360737ee2fda77759ac745ea43e95309c5b','',0,'','','','',0,NULL,'2019-04-08 14:20:16','::1','2019-04-08 14:20:16',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,0,'','',0,NULL,'221806e49d7dadc73023821efd7b10d78970c3daa68da94b3b','',0,'','','','',0,NULL,'2019-04-08 14:21:04','::1','2019-04-08 14:21:04',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,0,'','',0,NULL,'664870afa2f881531712f4ac4ca65c023095cfc66a250d686f','',0,'','','','',0,NULL,'2019-04-08 14:21:06','::1','2019-04-08 14:21:06',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,0,'','',0,NULL,'972f663aa9097767ddf8227478cdce4a8c885da3fcacc791ff','',0,'','','','',0,NULL,'2019-04-08 14:21:32','::1','2019-04-08 14:21:32',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,0,'phillyemon','',0,NULL,'4d72b5bf15f43c0c39104d43143fcb7a725441b35efd56c5ad','phillyemon@yahoo.com',0,'','','','',1,'2019-04-08 14:27:42','2019-04-08 20:57:40','::1','2019-04-08 14:27:07',NULL,0,0,1,0,0,0,0,0,'','','','','',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,0,'miracle1','',0,NULL,'3ff4d16b5dd766f6518cbcca1fd1b7f93919c17a212179df5f','miracleoko@gmail.com',0,'','','','',41,'2019-04-11 11:40:19','2019-04-11 11:40:19','::1','2019-04-08 20:59:23',NULL,0,1,1,0,0,0,0,0,'bXR6pftSA5DDktxD9v5YtmO7p3sYKjJJ7WtOiBivsfsL1xvrGJ','','','','',0,'','2019-04-08 20:59:23','2019-04-08 20:59:23');

/*Table structure for table `mlf2_userdata_cache` */

DROP TABLE IF EXISTS `mlf2_userdata_cache`;

CREATE TABLE `mlf2_userdata_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_signature` text NOT NULL,
  `cache_profile` text NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_userdata_cache` */

/*Table structure for table `mlf2_useronline` */

DROP TABLE IF EXISTS `mlf2_useronline`;

CREATE TABLE `mlf2_useronline` (
  `ip` char(15) NOT NULL DEFAULT '',
  `time` int(14) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `mlf2_useronline` */

insert  into `mlf2_useronline` values ('::1',1554816309,0),('uid_10',1554816440,10);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
