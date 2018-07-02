/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-02 14:08:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for r_author
-- ----------------------------
DROP TABLE IF EXISTS `r_author`;
CREATE TABLE `r_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='作者表';

-- ----------------------------
-- Records of r_author
-- ----------------------------

-- ----------------------------
-- Table structure for r_bookcase
-- ----------------------------
DROP TABLE IF EXISTS `r_bookcase`;
CREATE TABLE `r_bookcase` (
  `user` int(11) NOT NULL,
  `novel` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user`,`novel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of r_bookcase
-- ----------------------------

-- ----------------------------
-- Table structure for r_chapter
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter`;
CREATE TABLE `r_chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novel` int(11) NOT NULL,
  `chapter_group` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `clicks` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `text_length` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of r_chapter
-- ----------------------------

-- ----------------------------
-- Table structure for r_chapter_group
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter_group`;
CREATE TABLE `r_chapter_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `novel` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `text_length` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------

-- ----------------------------
-- Table structure for r_novel
-- ----------------------------
DROP TABLE IF EXISTS `r_novel`;
CREATE TABLE `r_novel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `author` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `collects` int(11) NOT NULL,
  `text_length` int(11) NOT NULL,
  `isend` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of r_novel
-- ----------------------------

-- ----------------------------
-- Table structure for r_user
-- ----------------------------
DROP TABLE IF EXISTS `r_user`;
CREATE TABLE `r_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `salt` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` int(11) NOT NULL,
  `logintime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of r_user
-- ----------------------------
