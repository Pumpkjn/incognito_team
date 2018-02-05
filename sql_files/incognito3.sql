/*
Navicat MySQL Data Transfer

Source Server         : myDB
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : incognito

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-02-05 11:44:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for categories_ideas
-- ----------------------------
DROP TABLE IF EXISTS `categories_ideas`;
CREATE TABLE `categories_ideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_ref` (`category_id`),
  KEY `idea_ref` (`idea_id`),
  CONSTRAINT `category_ref` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories_ideas
-- ----------------------------

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_idea_ref` (`idea_id`),
  KEY `commnet_user_ref` (`user_id`),
  CONSTRAINT `comment_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `commnet_user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for deps
-- ----------------------------
DROP TABLE IF EXISTS `deps`;
CREATE TABLE `deps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deps
-- ----------------------------

-- ----------------------------
-- Table structure for deps_data
-- ----------------------------
DROP TABLE IF EXISTS `deps_data`;
CREATE TABLE `deps_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dep_id` int(11) unsigned DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deps_ref` (`dep_id`),
  CONSTRAINT `deps_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deps_data
-- ----------------------------

-- ----------------------------
-- Table structure for ideas
-- ----------------------------
DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ref` (`user_id`),
  CONSTRAINT `user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ideas
-- ----------------------------

-- ----------------------------
-- Table structure for ideas_metadata
-- ----------------------------
DROP TABLE IF EXISTS `ideas_metadata`;
CREATE TABLE `ideas_metadata` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `key` varchar(64) DEFAULT NULL,
  `value` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_idea_ref` (`idea_id`),
  CONSTRAINT `meta_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ideas_metadata
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `role` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `dep_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`) USING BTREE,
  KEY `dep_user_ref` (`dep_id`),
  CONSTRAINT `dep_user_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
