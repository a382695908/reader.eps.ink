/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-25 09:39:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for r_admin
-- ----------------------------
DROP TABLE IF EXISTS `r_admin`;
CREATE TABLE `r_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `account` varchar(50) NOT NULL COMMENT '管理员账号',
  `password` varchar(80) NOT NULL COMMENT '管理员密码',
  `avatar` varchar(255) NOT NULL COMMENT '管理员头像',
  `nickname` varchar(30) NOT NULL COMMENT '管理员昵称',
  `login_time` int(11) unsigned NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='后台管理员表';

-- ----------------------------
-- Table structure for r_author
-- ----------------------------
DROP TABLE IF EXISTS `r_author`;
CREATE TABLE `r_author` (
  `author_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '作者id',
  `author_name` varchar(50) NOT NULL COMMENT '作者名',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_name` (`author_name`) USING BTREE,
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COMMENT='作者表';

-- ----------------------------
-- Table structure for r_bookcase
-- ----------------------------
DROP TABLE IF EXISTS `r_bookcase`;
CREATE TABLE `r_bookcase` (
  `bookcase_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '书架id',
  `user_id` int(11) unsigned NOT NULL,
  `novel_id` int(11) unsigned NOT NULL,
  `is_deleted` tinyint(4) unsigned NOT NULL COMMENT '是否已删除 0: 未删除 1:已删除',
  PRIMARY KEY (`bookcase_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `novel_id` (`novel_id`) USING BTREE,
  CONSTRAINT `r_book_case_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `r_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_book_case_ibfk2` FOREIGN KEY (`novel_id`) REFERENCES `r_novel` (`novel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户 - 小说 表';

-- ----------------------------
-- Table structure for r_category
-- ----------------------------
DROP TABLE IF EXISTS `r_category`;
CREATE TABLE `r_category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `category_alias` varchar(50) NOT NULL COMMENT '别名',
  `category_name` varchar(50) NOT NULL COMMENT '分类名',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`),
  KEY `category_name` (`category_name`),
  KEY `category_alias` (`category_alias`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='小说分类表';

-- ----------------------------
-- Table structure for r_chapter
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter`;
CREATE TABLE `r_chapter` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '章节id',
  `novel_id` int(11) unsigned NOT NULL COMMENT '小说id',
  `chapter_group_id` int(11) unsigned NOT NULL COMMENT '章节组id',
  `author_id` int(11) unsigned NOT NULL COMMENT '作者id',
  `chapter_name` varchar(50) NOT NULL COMMENT '章节名',
  `content` text NOT NULL COMMENT '内容',
  `clicks` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `reports` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '举报量',
  `words` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '字数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `from_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源链接',
  PRIMARY KEY (`chapter_id`),
  KEY `novel_id` (`novel_id`) USING BTREE,
  KEY `chapter_group_id` (`chapter_group_id`) USING BTREE,
  KEY `author_id` (`author_id`) USING BTREE,
  KEY `sort` (`sort`),
  CONSTRAINT `r_chapter_ibfk1` FOREIGN KEY (`novel_id`) REFERENCES `r_novel` (`novel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_chapter_ibfk2` FOREIGN KEY (`chapter_group_id`) REFERENCES `r_chapter_group` (`chapter_group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_chapter_ibfk3` FOREIGN KEY (`author_id`) REFERENCES `r_author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节表';

-- ----------------------------
-- Table structure for r_chapter_group
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter_group`;
CREATE TABLE `r_chapter_group` (
  `chapter_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '章节组id',
  `chapter_group_name` varchar(50) NOT NULL COMMENT '章节组名',
  `novel_id` int(11) unsigned NOT NULL COMMENT '小说id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`chapter_group_id`),
  KEY `sort` (`sort`),
  KEY `novel_id` (`novel_id`),
  CONSTRAINT `r_chapter_group_ibfk2` FOREIGN KEY (`novel_id`) REFERENCES `r_novel` (`novel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Table structure for r_feedback
-- ----------------------------
DROP TABLE IF EXISTS `r_feedback`;
CREATE TABLE `r_feedback` (
  `feedback_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '消息类型 0: 建议 1:举报',
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(4) NOT NULL COMMENT '状态 0: 未读 1:已读',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='前台反馈表';

-- ----------------------------
-- Table structure for r_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `r_friend_link`;
CREATE TABLE `r_friend_link` (
  `friend_link_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `url` varchar(255) NOT NULL COMMENT '网络地址',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `state` tinyint(4) unsigned NOT NULL COMMENT '状态 0: 不启用 1:启用',
  PRIMARY KEY (`friend_link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='网站友情链接';

-- ----------------------------
-- Table structure for r_log
-- ----------------------------
DROP TABLE IF EXISTS `r_log`;
CREATE TABLE `r_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `admin_id` int(10) unsigned NOT NULL COMMENT '进行操作的管理员',
  `operate_title` varchar(30) NOT NULL COMMENT '操作名称',
  `operate_data` text NOT NULL COMMENT '操作的json数据',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '日志记录时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='登录日志表';

-- ----------------------------
-- Table structure for r_novel
-- ----------------------------
DROP TABLE IF EXISTS `r_novel`;
CREATE TABLE `r_novel` (
  `novel_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '小说id',
  `author_id` int(11) unsigned DEFAULT NULL COMMENT '作者id',
  `category_id` int(11) unsigned DEFAULT NULL COMMENT '分类id',
  `latest_chapter_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最近更新章节id',
  `novel_name` varchar(50) NOT NULL COMMENT '小说名',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `introduction` varchar(255) NOT NULL DEFAULT '' COMMENT '介绍',
  `clicks` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `reports` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '举报量',
  `collects` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收藏量',
  `recommends` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '推荐量',
  `words` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '小说字数',
  `is_end` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否完结',
  `novel_state` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '小说状态  0: 下架 1: 正常',
  `is_hotest` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否最热小说',
  `is_hot` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否热门小说',
  `is_recommend` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐小说',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `from_url` varchar(255) NOT NULL DEFAULT '' COMMENT '来源链接',
  PRIMARY KEY (`novel_id`),
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `author_id` (`author_id`),
  KEY `create_time` (`create_time`) USING BTREE,
  CONSTRAINT `r_novel_ibfk1` FOREIGN KEY (`author_id`) REFERENCES `r_author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_novel_ibfk2` FOREIGN KEY (`category_id`) REFERENCES `r_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COMMENT='小说表';

-- ----------------------------
-- Table structure for r_todo
-- ----------------------------
DROP TABLE IF EXISTS `r_todo`;
CREATE TABLE `r_todo` (
  `todo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '0: 未完成 1:已完成',
  PRIMARY KEY (`todo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台 - 代办事项表';

-- ----------------------------
-- Table structure for r_user
-- ----------------------------
DROP TABLE IF EXISTS `r_user`;
CREATE TABLE `r_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `account` varchar(20) NOT NULL COMMENT '账号名',
  `password` varchar(40) NOT NULL COMMENT '登录密码',
  `salt` varchar(20) NOT NULL DEFAULT '' COMMENT '随机秘钥',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '0: 黑名单 1: 待审核 2: 已审核',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`user_id`),
  KEY `account_status` (`account`,`status`),
  KEY `create_time` (`create_time`),
  KEY `account_unique` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Table structure for r_user_visited_chapter
-- ----------------------------
DROP TABLE IF EXISTS `r_user_visited_chapter`;
CREATE TABLE `r_user_visited_chapter` (
  `user_visited_chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `novel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`user_visited_chapter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户浏览章节记录';

-- ----------------------------
-- Table structure for r_visit
-- ----------------------------
DROP TABLE IF EXISTS `r_visit`;
CREATE TABLE `r_visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(10) unsigned NOT NULL,
  `month` tinyint(3) unsigned NOT NULL,
  `day` tinyint(3) unsigned NOT NULL,
  `date` tinyint(3) unsigned NOT NULL COMMENT '星期几',
  `visit` int(10) unsigned NOT NULL COMMENT '访问量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='网站访问记录表';

-- ----------------------------
-- Table structure for r_visitor
-- ----------------------------
DROP TABLE IF EXISTS `r_visitor`;
CREATE TABLE `r_visitor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '绑定的userid',
  `ip` varchar(60) NOT NULL,
  `is_phone` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `is_desktop` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `is_weixin` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `browser` varchar(60) NOT NULL DEFAULT '',
  `device` varchar(60) NOT NULL DEFAULT '',
  `platform` varchar(60) NOT NULL DEFAULT '',
  `platform_version` varchar(60) NOT NULL DEFAULT '',
  `user_agent` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_black` tinyint(4) NOT NULL DEFAULT '0' COMMENT '黑名单',
  `last_visit_time` int(11) unsigned NOT NULL DEFAULT '0',
  `visitor_token` varchar(60) NOT NULL DEFAULT '',
  `visit` int(11) NOT NULL DEFAULT '0' COMMENT '访问次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='访客表';

-- ----------------------------
-- Table structure for r_wx_pay_log
-- ----------------------------
DROP TABLE IF EXISTS `r_wx_pay_log`;
CREATE TABLE `r_wx_pay_log` (
  `id` int(11) NOT NULL,
  `open_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `xml_data` varchar(1000) NOT NULL,
  `source` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: 微信',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='微信支付日志表';
