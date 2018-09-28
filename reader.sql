/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-28 13:38:18
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
-- Records of r_admin
-- ----------------------------
INSERT INTO `r_admin` VALUES ('1', 'reader.eps.ink', '$2y$10$BNd/.HDngSIj7GaKvb.OY.I0wQU4LcaSK8POrj0BRydg8rpTX03kq', '', 'admin', '1537974053');

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
-- Records of r_author
-- ----------------------------
INSERT INTO `r_author` VALUES ('1', '耳根', '0', '0');
INSERT INTO `r_author` VALUES ('2', '天蚕土豆', '0', '0');
INSERT INTO `r_author` VALUES ('3', '我吃西红柿', '0', '0');
INSERT INTO `r_author` VALUES ('4', '忘语', '0', '0');
INSERT INTO `r_author` VALUES ('5', '圣骑士的传说(书坊)', '0', '0');
INSERT INTO `r_author` VALUES ('6', '烽火戏诸侯', '0', '0');
INSERT INTO `r_author` VALUES ('7', '高楼大厦', '0', '0');
INSERT INTO `r_author` VALUES ('8', '裴屠狗', '0', '0');
INSERT INTO `r_author` VALUES ('9', '净无痕', '0', '0');
INSERT INTO `r_author` VALUES ('10', '淡淡竹君', '0', '0');
INSERT INTO `r_author` VALUES ('11', '轻语江湖', '0', '0');
INSERT INTO `r_author` VALUES ('16', '极地风刃', '0', '0');
INSERT INTO `r_author` VALUES ('17', '风一色', '0', '0');
INSERT INTO `r_author` VALUES ('18', '莫默', '0', '0');
INSERT INTO `r_author` VALUES ('19', '乱', '0', '0');
INSERT INTO `r_author` VALUES ('20', '辰东', '0', '0');
INSERT INTO `r_author` VALUES ('21', '冬日之阳', '0', '0');
INSERT INTO `r_author` VALUES ('22', '耳东水寿', '0', '0');
INSERT INTO `r_author` VALUES ('23', '唐家三少', '0', '0');
INSERT INTO `r_author` VALUES ('24', '宅猪', '0', '0');
INSERT INTO `r_author` VALUES ('25', '梦朝南', '0', '0');
INSERT INTO `r_author` VALUES ('26', '良心', '0', '0');
INSERT INTO `r_author` VALUES ('27', '无妄虫灾', '0', '0');
INSERT INTO `r_author` VALUES ('28', '寒刀客', '0', '0');
INSERT INTO `r_author` VALUES ('29', '写字板', '0', '0');
INSERT INTO `r_author` VALUES ('30', '中华娇子大熊猫', '0', '0');
INSERT INTO `r_author` VALUES ('31', '争斤论两花花帽', '0', '0');
INSERT INTO `r_author` VALUES ('32', '潇铭', '0', '0');
INSERT INTO `r_author` VALUES ('33', '糖醋于', '0', '0');
INSERT INTO `r_author` VALUES ('34', '黄枫雨天', '0', '0');
INSERT INTO `r_author` VALUES ('35', '皇家雇佣猫', '0', '0');
INSERT INTO `r_author` VALUES ('36', '飞天鱼', '0', '0');
INSERT INTO `r_author` VALUES ('37', '夜十三', '0', '0');
INSERT INTO `r_author` VALUES ('38', '花都大少', '0', '0');
INSERT INTO `r_author` VALUES ('39', '6号鼠标', '0', '0');
INSERT INTO `r_author` VALUES ('40', '晨星LL', '0', '0');
INSERT INTO `r_author` VALUES ('41', '会说话的肘子', '0', '0');
INSERT INTO `r_author` VALUES ('42', '零九二五', '0', '0');
INSERT INTO `r_author` VALUES ('43', '高月', '0', '0');
INSERT INTO `r_author` VALUES ('44', '流浪的猴', '0', '0');
INSERT INTO `r_author` VALUES ('45', '雨天下雨', '0', '0');
INSERT INTO `r_author` VALUES ('46', '长不大的肥猫', '0', '0');
INSERT INTO `r_author` VALUES ('47', '严七官', '0', '0');
INSERT INTO `r_author` VALUES ('48', 'cuslaa', '0', '0');
INSERT INTO `r_author` VALUES ('49', '叫天', '0', '0');
INSERT INTO `r_author` VALUES ('50', '嗷世巅锋', '0', '0');
INSERT INTO `r_author` VALUES ('51', '地黄丸', '0', '0');
INSERT INTO `r_author` VALUES ('52', '牧尘客', '0', '0');
INSERT INTO `r_author` VALUES ('53', '青玉狮子', '0', '0');
INSERT INTO `r_author` VALUES ('54', '王大忽悠', '0', '0');
INSERT INTO `r_author` VALUES ('55', '浮梦流年', '0', '0');
INSERT INTO `r_author` VALUES ('56', '木士', '0', '0');
INSERT INTO `r_author` VALUES ('57', '龙人', '0', '0');
INSERT INTO `r_author` VALUES ('58', '晒着太阳的猫', '0', '0');
INSERT INTO `r_author` VALUES ('59', '北国之鸟', '0', '0');
INSERT INTO `r_author` VALUES ('60', '骑马钓鱼', '0', '0');
INSERT INTO `r_author` VALUES ('61', '风雨白鸽', '0', '0');
INSERT INTO `r_author` VALUES ('62', '黑乎乎的老妖', '0', '0');
INSERT INTO `r_author` VALUES ('63', '落尘', '0', '0');
INSERT INTO `r_author` VALUES ('64', '秦弄月', '0', '0');
INSERT INTO `r_author` VALUES ('65', '龙飞有妖气', '0', '0');
INSERT INTO `r_author` VALUES ('66', '农夫一拳', '0', '0');
INSERT INTO `r_author` VALUES ('67', '礼祐', '0', '0');
INSERT INTO `r_author` VALUES ('68', '明月地上霜', '0', '0');
INSERT INTO `r_author` VALUES ('69', '九尾玄龟', '0', '0');
INSERT INTO `r_author` VALUES ('70', '蝴蝶蓝', '0', '0');
INSERT INTO `r_author` VALUES ('71', '小小鲤鱼王', '0', '0');
INSERT INTO `r_author` VALUES ('72', '青烟一夜', '0', '0');
INSERT INTO `r_author` VALUES ('73', '机器人布里茨', '0', '0');
INSERT INTO `r_author` VALUES ('74', '那一只蚊子', '0', '0');
INSERT INTO `r_author` VALUES ('75', '天妒遗计', '0', '0');
INSERT INTO `r_author` VALUES ('76', '十年狂欢', '0', '0');
INSERT INTO `r_author` VALUES ('77', '轻泉流响', '0', '0');

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
-- Records of r_bookcase
-- ----------------------------

-- ----------------------------
-- Table structure for r_category
-- ----------------------------
DROP TABLE IF EXISTS `r_category`;
CREATE TABLE `r_category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `category_alias` varchar(50) NOT NULL COMMENT '别名',
  `category_name` varchar(50) NOT NULL COMMENT '分类名',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`),
  KEY `category_name` (`category_name`),
  KEY `category_alias` (`category_alias`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='小说分类表';

-- ----------------------------
-- Records of r_category
-- ----------------------------
INSERT INTO `r_category` VALUES ('1', '玄幻', '玄幻魔法', '1');
INSERT INTO `r_category` VALUES ('2', '武侠', '武侠修真', '1');
INSERT INTO `r_category` VALUES ('3', '都市', '都市言情', '1');
INSERT INTO `r_category` VALUES ('4', '历史', '历史军事', '1');
INSERT INTO `r_category` VALUES ('5', '侦探', '侦探推理', '1');
INSERT INTO `r_category` VALUES ('6', '网游', '网游动漫', '1');
INSERT INTO `r_category` VALUES ('7', '科幻', '科幻灵异', '1');
INSERT INTO `r_category` VALUES ('8', '其他', '其他类型', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='小说章节表';

-- ----------------------------
-- Records of r_chapter
-- ----------------------------

-- ----------------------------
-- Table structure for r_chapter_group
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter_group`;
CREATE TABLE `r_chapter_group` (
  `chapter_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '章节组id',
  `chapter_group_name` varchar(50) NOT NULL COMMENT '章节组名',
  `novel_id` int(11) unsigned NOT NULL COMMENT '小说id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`chapter_group_id`),
  KEY `sort` (`sort`),
  KEY `novel_id` (`novel_id`),
  CONSTRAINT `r_chapter_group_ibfk2` FOREIGN KEY (`novel_id`) REFERENCES `r_novel` (`novel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------

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
-- Records of r_feedback
-- ----------------------------

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
-- Records of r_friend_link
-- ----------------------------
INSERT INTO `r_friend_link` VALUES ('1', '百度', 'https://www.baidu.com', '0', '0');
INSERT INTO `r_friend_link` VALUES ('2', '胡荣的博客', 'http://www.eps.ink', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='登录日志表';

-- ----------------------------
-- Records of r_log
-- ----------------------------
INSERT INTO `r_log` VALUES ('1', '1', 'login', '{\"ip\":\"127.0.0.1\"}', '1537969376');
INSERT INTO `r_log` VALUES ('2', '1', 'login', '{\"ip\":\"127.0.0.1\"}', '1537974052');

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
-- Records of r_novel
-- ----------------------------
INSERT INTO `r_novel` VALUES ('80', '1', '2', '0', '三寸人间', 'http://www.shuquge.com/files/article/image/63/63542/63542s.jpg', '举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1537851725', '1537851726', 'http://www.shuquge.com/txt/63542/index.html');
INSERT INTO `r_novel` VALUES ('81', '2', '1', '0', '元尊', 'http://www.shuquge.com/files/article/image/5/5809/5809s.jpg', '吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1537851726', '1537851726', 'http://www.shuquge.com/txt/5809/index.html');
INSERT INTO `r_novel` VALUES ('82', '3', '2', '0', '飞剑问道', 'http://www.shuquge.com/files/article/image/8/8072/8072s.jpg', '在这个世界，有狐仙、河神、水怪、大妖，也有求长生的修行者。    修行者们，    开法眼，可看妖魔鬼怪。    炼一口飞剑，可千里杀敌。    千里眼、顺风耳，更可探查四方。    ……    秦府二公子‘秦云’，便是一位修行者……', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1537851726', '1537851726', 'http://www.shuquge.com/txt/8072/index.html');
INSERT INTO `r_novel` VALUES ('83', '4', '2', '0', '凡人修仙传仙界篇', 'http://www.shuquge.com/files/article/image/8/8400/8400s.jpg', '凡人修仙，风云再起时空穿梭，轮回逆转金仙太乙，大罗道祖三千大道，法则至尊《凡人修仙传》仙界篇，一个韩立叱咤仙界的故事，一个凡人小子修仙的不灭传说。', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1537851726', '1537851726', 'http://www.shuquge.com/txt/8400/index.html');
INSERT INTO `r_novel` VALUES ('84', '5', '3', '0', '修真聊天群', 'http://www.shuquge.com/files/article/image/30/30668/30668s.jpg', '某天，宋书航意外加入了一个仙侠中二病资深患者的交流群，里面的群友们都以‘道友’相称，群名片都是各种府主、洞主、真人、天师。连群主走失的宠物犬都称为大妖犬离家出走。整天聊的是炼丹、闯秘境、炼功经验啥的。\n    突然有一天，潜水良久的他突然发现……群里每一个群员，竟然全部是修真者，能移山倒海、长生千年的那种！\n    啊啊啊啊，世界观在一夜间彻底崩碎啦！', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '1537851727', 'http://www.shuquge.com/txt/30668/index.html');
INSERT INTO `r_novel` VALUES ('85', '6', '1', '0', '剑来', 'http://www.shuquge.com/files/article/image/8/8659/8659s.jpg', '大千世界，无奇不有。我陈平安，唯有一剑，可搬山，倒海，降妖，镇魔，敕神，摘星，断江，摧城，开天！', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '1537851726', 'http://www.shuquge.com/txt/8659/index.html');
INSERT INTO `r_novel` VALUES ('86', '7', '1', '0', '太初', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/9255/index.html');
INSERT INTO `r_novel` VALUES ('87', '8', '7', '0', '诸天投影', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/81791/index.html');
INSERT INTO `r_novel` VALUES ('88', '9', '1', '0', '伏天氏', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/8279/index.html');
INSERT INTO `r_novel` VALUES ('89', '10', '2', '0', '木仙传', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/78930/index.html');
INSERT INTO `r_novel` VALUES ('90', '11', '6', '0', '奶爸的异界餐厅', 'http://www.shuquge.com/files/article/image/79/79077/79077s.jpg', '诺兰大陆的混乱之城中，有着一家奇怪的餐厅。在这里，精灵要和矮人拼桌，兽人被严禁喧哗，巨龙只能围坐在餐厅前的小广场上，恶魔甚至需要自己带特制的凳子……但就是这么一家规矩奇葩的餐厅，门口却每天都排着长队。    精灵们不顾仪态的撸串，巨龙们握着漏勺围坐在火锅前，恶魔们吃着可爱的团子……    “这里的美食在大陆上找不到第二家！这个老板是个天才！”有客人这样评价，然后偷偷看了一眼门口的的方向：“还有，千万别想着抓走老板或者吃霸王餐，不然你会死的很惨。”    “吃饭，给钱，不然通通打死。”一个可爱的小萝莉在门口', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '1537851728', 'http://www.shuquge.com/txt/79077/index.html');
INSERT INTO `r_novel` VALUES ('91', '16', '1', '0', '都市至强者降临', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/75724/index.html');
INSERT INTO `r_novel` VALUES ('92', '17', '1', '0', '绝世药神', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/76118/index.html');
INSERT INTO `r_novel` VALUES ('93', '18', '1', '0', '武炼巅峰', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/248/index.html');
INSERT INTO `r_novel` VALUES ('94', '19', '1', '0', '全职法师', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/17684/index.html');
INSERT INTO `r_novel` VALUES ('95', '20', '1', '0', '圣墟', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/72929/index.html');
INSERT INTO `r_novel` VALUES ('96', '21', '1', '0', '崛起诸天', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/80454/index.html');
INSERT INTO `r_novel` VALUES ('97', '22', '1', '0', '民调局异闻录之勉传', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/53240/index.html');
INSERT INTO `r_novel` VALUES ('98', '23', '1', '0', '琴帝', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/74825/index.html');
INSERT INTO `r_novel` VALUES ('99', '24', '1', '0', '牧神记', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/73779/index.html');
INSERT INTO `r_novel` VALUES ('100', '1', '2', '0', '仙逆', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/74671/index.html');
INSERT INTO `r_novel` VALUES ('101', '25', '2', '0', '都市之少年仙尊', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/80111/index.html');
INSERT INTO `r_novel` VALUES ('102', '26', '2', '0', '反套路快穿', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851726', '0', 'http://www.shuquge.com/txt/78748/index.html');
INSERT INTO `r_novel` VALUES ('103', '3', '2', '0', '莽荒纪', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/343/index.html');
INSERT INTO `r_novel` VALUES ('104', '27', '2', '0', '天才传说', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/9187/index.html');
INSERT INTO `r_novel` VALUES ('105', '9', '2', '0', '太古神王', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/13306/index.html');
INSERT INTO `r_novel` VALUES ('106', '28', '2', '0', '江湖奇功录', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/79041/index.html');
INSERT INTO `r_novel` VALUES ('107', '29', '2', '0', '天神学院', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/78790/index.html');
INSERT INTO `r_novel` VALUES ('108', '30', '2', '0', '细胞修神', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/74966/index.html');
INSERT INTO `r_novel` VALUES ('109', '31', '3', '0', '我的1979', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/58724/index.html');
INSERT INTO `r_novel` VALUES ('110', '32', '3', '0', '近身狂兵', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/29752/index.html');
INSERT INTO `r_novel` VALUES ('111', '33', '3', '0', '仙药供应商', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/73894/index.html');
INSERT INTO `r_novel` VALUES ('112', '34', '3', '0', '我的冰山总裁老婆', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/67262/index.html');
INSERT INTO `r_novel` VALUES ('113', '35', '3', '0', '重塑人生三十年', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/75712/index.html');
INSERT INTO `r_novel` VALUES ('114', '36', '3', '0', '万古神帝', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/33476/index.html');
INSERT INTO `r_novel` VALUES ('115', '37', '3', '0', '特种兵在都市之诡刃', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/80976/index.html');
INSERT INTO `r_novel` VALUES ('116', '38', '3', '0', '极品全能学生', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/35077/index.html');
INSERT INTO `r_novel` VALUES ('117', '39', '3', '0', '重生之超级银行系统', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/76138/index.html');
INSERT INTO `r_novel` VALUES ('118', '40', '3', '0', '我在末世有套房', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/25294/index.html');
INSERT INTO `r_novel` VALUES ('119', '41', '3', '0', '大王饶命', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/76106/index.html');
INSERT INTO `r_novel` VALUES ('120', '42', '3', '0', '天庭小狱卒', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/67529/index.html');
INSERT INTO `r_novel` VALUES ('121', null, '4', '0', '楚臣', 'http://www.shuquge.com/files/article/image/74/74433/74433s.jpg', '唐季既没，诸侯崛起，天佑帝起于草莽之间，于江淮地区创立楚国已经十二年，与占据中原的梁国以及占据河东、幽燕地区的晋国，成为当世最为强大的三大霸主，天下征战不休、民不聊生……早年，天佑帝为制衡手握重权的大将及地方上的节度使们，在朝堂之上扶持皇后徐氏一脉的外戚势力，但到天佑十二年间，外戚势力也尾大不掉，成为危及帝朝统治的大弊。    【更俗的书迷世界，俗人部落VIP群：385122373，微信公众号：gengsu1979】', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/74433/index.html');
INSERT INTO `r_novel` VALUES ('122', '43', '4', '0', '大宋超级学霸', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/42553/index.html');
INSERT INTO `r_novel` VALUES ('123', '44', '4', '0', '重生之战神吕布', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/79296/index.html');
INSERT INTO `r_novel` VALUES ('124', '45', '4', '0', '山沟皇帝', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851727', '0', 'http://www.shuquge.com/txt/73627/index.html');
INSERT INTO `r_novel` VALUES ('125', '46', '4', '0', '三国之我是袁术', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/80303/index.html');
INSERT INTO `r_novel` VALUES ('126', '47', '4', '0', '绝对荣誉', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/76964/index.html');
INSERT INTO `r_novel` VALUES ('127', '48', '4', '0', '宰执天下', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/1647/index.html');
INSERT INTO `r_novel` VALUES ('128', '49', '4', '0', '崇祯聊天群', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/74686/index.html');
INSERT INTO `r_novel` VALUES ('129', '50', '4', '0', '红楼名侦探', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75180/index.html');
INSERT INTO `r_novel` VALUES ('130', '51', '4', '0', '寒门贵子', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/38135/index.html');
INSERT INTO `r_novel` VALUES ('131', '52', '4', '0', '帝国吃相', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/81377/index.html');
INSERT INTO `r_novel` VALUES ('132', '53', '4', '0', '乱清', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/1265/index.html');
INSERT INTO `r_novel` VALUES ('133', '54', '4', '0', '新特工学生', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/74243/index.html');
INSERT INTO `r_novel` VALUES ('134', null, '5', '0', '极灵混沌决', 'http://www.shuquge.com/files/article/image/41/41188/41188s.jpg', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/41188/index.html');
INSERT INTO `r_novel` VALUES ('135', '55', '5', '0', '劫天运', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/38478/index.html');
INSERT INTO `r_novel` VALUES ('136', '43', '5', '0', '三国之兵临天下', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/42828/index.html');
INSERT INTO `r_novel` VALUES ('137', '56', '5', '0', '情天可补', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/42939/index.html');
INSERT INTO `r_novel` VALUES ('138', '57', '5', '0', '魔兽战神', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/58449/index.html');
INSERT INTO `r_novel` VALUES ('139', '58', '5', '0', '绝世狂神', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/44292/index.html');
INSERT INTO `r_novel` VALUES ('140', '59', '5', '0', '阴阳师秘录', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/37745/index.html');
INSERT INTO `r_novel` VALUES ('141', '60', '5', '0', '麻衣神算子', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/39016/index.html');
INSERT INTO `r_novel` VALUES ('142', '61', '5', '0', '侠盗神医', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/58490/index.html');
INSERT INTO `r_novel` VALUES ('143', '62', '5', '0', '网游之剑走偏锋', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/64126/index.html');
INSERT INTO `r_novel` VALUES ('144', '63', '5', '0', '无上传承', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/41956/index.html');
INSERT INTO `r_novel` VALUES ('145', '64', '5', '0', '国师重生之都市风水师', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/73228/index.html');
INSERT INTO `r_novel` VALUES ('146', '65', '5', '0', '黄河古事', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/34092/index.html');
INSERT INTO `r_novel` VALUES ('147', '66', '6', '0', '海贼：厌世之歌', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75773/index.html');
INSERT INTO `r_novel` VALUES ('148', '67', '6', '0', '时崎狂三的位面之旅', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75881/index.html');
INSERT INTO `r_novel` VALUES ('149', '68', '6', '0', '我修的可能是假仙', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/73528/index.html');
INSERT INTO `r_novel` VALUES ('150', '69', '6', '0', '最强齐天大圣', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75907/index.html');
INSERT INTO `r_novel` VALUES ('151', '70', '6', '0', '王者时刻', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/6149/index.html');
INSERT INTO `r_novel` VALUES ('152', '71', '6', '0', '宠物小精灵之全球在线', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75036/index.html');
INSERT INTO `r_novel` VALUES ('153', '72', '6', '0', '网游之神级炼妖师', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/75850/index.html');
INSERT INTO `r_novel` VALUES ('154', '73', '6', '0', '英雄联盟之决胜巅峰', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851728', '0', 'http://www.shuquge.com/txt/44935/index.html');
INSERT INTO `r_novel` VALUES ('155', '74', '6', '0', '轮回乐园', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851729', '0', 'http://www.shuquge.com/txt/73988/index.html');
INSERT INTO `r_novel` VALUES ('156', '75', '6', '0', '火影神树之果在异界', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851729', '0', 'http://www.shuquge.com/txt/75346/index.html');
INSERT INTO `r_novel` VALUES ('157', '76', '6', '0', '网游之逍遥派大弟子', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851729', '0', 'http://www.shuquge.com/txt/70209/index.html');
INSERT INTO `r_novel` VALUES ('158', '77', '6', '0', '宠物小精灵之庭树', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1537851729', '0', 'http://www.shuquge.com/txt/74820/index.html');

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
-- Records of r_todo
-- ----------------------------

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
-- Records of r_user
-- ----------------------------

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
-- Records of r_user_visited_chapter
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='网站访问记录表';

-- ----------------------------
-- Records of r_visit
-- ----------------------------
INSERT INTO `r_visit` VALUES ('1', '2018', '9', '23', '7', '22');
INSERT INTO `r_visit` VALUES ('2', '2018', '9', '24', '1', '328');
INSERT INTO `r_visit` VALUES ('3', '2018', '9', '25', '2', '16');
INSERT INTO `r_visit` VALUES ('4', '2018', '9', '26', '3', '155');

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
-- Records of r_visitor
-- ----------------------------
INSERT INTO `r_visitor` VALUES ('1', '0', '127.0.0.1', '0', '1', '0', 'Chrome', 'WebKit', 'Windows', '10.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '1537713221', '0', '1537965816', '1799dadf9a79ff6a597220e5d7d48f2b', '521');

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

-- ----------------------------
-- Records of r_wx_pay_log
-- ----------------------------
