/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-20 11:49:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for r_admin
-- ----------------------------
DROP TABLE IF EXISTS `r_admin`;
CREATE TABLE `r_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台管理员表';

-- ----------------------------
-- Records of r_admin
-- ----------------------------

-- ----------------------------
-- Table structure for r_admin_login_log
-- ----------------------------
DROP TABLE IF EXISTS `r_admin_login_log`;
CREATE TABLE `r_admin_login_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_place` varchar(50) NOT NULL COMMENT '登录地点',
  `login_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='登录日志表';

-- ----------------------------
-- Records of r_admin_login_log
-- ----------------------------

-- ----------------------------
-- Table structure for r_author
-- ----------------------------
DROP TABLE IF EXISTS `r_author`;
CREATE TABLE `r_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COMMENT='作者表';

-- ----------------------------
-- Records of r_author
-- ----------------------------
INSERT INTO `r_author` VALUES ('1', '耳根');
INSERT INTO `r_author` VALUES ('2', '天蚕土豆');
INSERT INTO `r_author` VALUES ('3', '我吃西红柿');
INSERT INTO `r_author` VALUES ('4', '忘语');
INSERT INTO `r_author` VALUES ('5', '圣骑士的传说(书坊)');
INSERT INTO `r_author` VALUES ('6', '裴屠狗');
INSERT INTO `r_author` VALUES ('7', '耳东水寿');
INSERT INTO `r_author` VALUES ('8', '高楼大厦');
INSERT INTO `r_author` VALUES ('9', '净无痕');
INSERT INTO `r_author` VALUES ('10', '农夫一拳');
INSERT INTO `r_author` VALUES ('11', '莫默');
INSERT INTO `r_author` VALUES ('12', '极地风刃');
INSERT INTO `r_author` VALUES ('13', '妖夜');
INSERT INTO `r_author` VALUES ('14', '无敌小贝');
INSERT INTO `r_author` VALUES ('15', '张家三叔');
INSERT INTO `r_author` VALUES ('16', '黑色枷锁');
INSERT INTO `r_author` VALUES ('17', '孤单地飞');
INSERT INTO `r_author` VALUES ('18', '一剑清新');
INSERT INTO `r_author` VALUES ('19', '烽火戏诸侯');
INSERT INTO `r_author` VALUES ('20', '淡淡竹君');
INSERT INTO `r_author` VALUES ('21', '良心');
INSERT INTO `r_author` VALUES ('22', '任我笑');
INSERT INTO `r_author` VALUES ('23', '寒刀客');
INSERT INTO `r_author` VALUES ('24', '中华娇子大熊猫');
INSERT INTO `r_author` VALUES ('25', '王小蛮');
INSERT INTO `r_author` VALUES ('26', '突刺');
INSERT INTO `r_author` VALUES ('27', '许轩陌');
INSERT INTO `r_author` VALUES ('28', '叱咤风云');
INSERT INTO `r_author` VALUES ('29', '潇铭');
INSERT INTO `r_author` VALUES ('30', '6号鼠标');
INSERT INTO `r_author` VALUES ('31', '争斤论两花花帽');
INSERT INTO `r_author` VALUES ('32', '无冬夜');
INSERT INTO `r_author` VALUES ('33', '皇家雇佣猫');
INSERT INTO `r_author` VALUES ('34', '黄枫雨天');
INSERT INTO `r_author` VALUES ('35', '莫辰子');
INSERT INTO `r_author` VALUES ('36', '潇潇清枫');
INSERT INTO `r_author` VALUES ('37', '花都大少');
INSERT INTO `r_author` VALUES ('38', '夜十三');
INSERT INTO `r_author` VALUES ('39', '糖醋于');
INSERT INTO `r_author` VALUES ('40', '更俗');
INSERT INTO `r_author` VALUES ('41', '叫天');
INSERT INTO `r_author` VALUES ('42', '严七官');
INSERT INTO `r_author` VALUES ('43', '雨天下雨');
INSERT INTO `r_author` VALUES ('44', '流浪的猴');
INSERT INTO `r_author` VALUES ('45', '王大忽悠');
INSERT INTO `r_author` VALUES ('46', '牧尘客');
INSERT INTO `r_author` VALUES ('47', '地黄丸');
INSERT INTO `r_author` VALUES ('48', 'cuslaa');
INSERT INTO `r_author` VALUES ('49', '嗷世巅锋');
INSERT INTO `r_author` VALUES ('50', '长不大的肥猫');
INSERT INTO `r_author` VALUES ('51', '孑与2');
INSERT INTO `r_author` VALUES ('52', '浮梦流年');
INSERT INTO `r_author` VALUES ('53', '高月');
INSERT INTO `r_author` VALUES ('54', '木士');
INSERT INTO `r_author` VALUES ('55', '秦弄月');
INSERT INTO `r_author` VALUES ('56', '北国之鸟');
INSERT INTO `r_author` VALUES ('57', '风雨白鸽');
INSERT INTO `r_author` VALUES ('58', '落尘');
INSERT INTO `r_author` VALUES ('59', '龙人');
INSERT INTO `r_author` VALUES ('60', '骑马钓鱼');
INSERT INTO `r_author` VALUES ('61', '清风天使');
INSERT INTO `r_author` VALUES ('62', '黑乎乎的老妖');
INSERT INTO `r_author` VALUES ('63', '浙三爷');
INSERT INTO `r_author` VALUES ('64', '轻语江湖');
INSERT INTO `r_author` VALUES ('65', '礼祐');
INSERT INTO `r_author` VALUES ('66', '我是贝币');
INSERT INTO `r_author` VALUES ('67', '半世散人');
INSERT INTO `r_author` VALUES ('68', '小小鲤鱼王');
INSERT INTO `r_author` VALUES ('69', '九尾玄龟');
INSERT INTO `r_author` VALUES ('70', '明月地上霜');
INSERT INTO `r_author` VALUES ('71', '青烟一夜');
INSERT INTO `r_author` VALUES ('72', '天妒遗计');
INSERT INTO `r_author` VALUES ('73', '十年狂欢');
INSERT INTO `r_author` VALUES ('74', '阡之陌一');
INSERT INTO `r_author` VALUES ('75', '咖啡香味');

-- ----------------------------
-- Table structure for r_bookcase
-- ----------------------------
DROP TABLE IF EXISTS `r_bookcase`;
CREATE TABLE `r_bookcase` (
  `user` int(11) NOT NULL,
  `novel` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user`,`novel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户 - 小说 表';

-- ----------------------------
-- Records of r_bookcase
-- ----------------------------

-- ----------------------------
-- Table structure for r_category
-- ----------------------------
DROP TABLE IF EXISTS `r_category`;
CREATE TABLE `r_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novel` int(11) NOT NULL,
  `chapter_group` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `reports` int(11) NOT NULL DEFAULT '0',
  `text_length` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='小说章节表';

-- ----------------------------
-- Records of r_chapter
-- ----------------------------

-- ----------------------------
-- Table structure for r_chapter_group
-- ----------------------------
DROP TABLE IF EXISTS `r_chapter_group`;
CREATE TABLE `r_chapter_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `novel` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `text_length` int(11) NOT NULL,
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------

-- ----------------------------
-- Table structure for r_feedback
-- ----------------------------
DROP TABLE IF EXISTS `r_feedback`;
CREATE TABLE `r_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '消息类型 0: 建议 1:举报',
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(4) NOT NULL COMMENT '状态 0: 未读 1:已读',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
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
  `name` varchar(30) NOT NULL,
  `url` varchar(2000) NOT NULL,
  PRIMARY KEY (`friend_link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='网站友情链接';

-- ----------------------------
-- Records of r_friend_link
-- ----------------------------
INSERT INTO `r_friend_link` VALUES ('1', '百度', 'https://www.baidu.com');
INSERT INTO `r_friend_link` VALUES ('2', '胡荣的博客', 'http://www.eps.ink');

-- ----------------------------
-- Table structure for r_novel
-- ----------------------------
DROP TABLE IF EXISTS `r_novel`;
CREATE TABLE `r_novel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `reports` int(11) NOT NULL DEFAULT '0',
  `collects` int(11) NOT NULL DEFAULT '0',
  `recommends` int(11) unsigned NOT NULL DEFAULT '0',
  `text_length` int(11) NOT NULL DEFAULT '0',
  `isend` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `introduction` varchar(255) NOT NULL DEFAULT '',
  `ishotest` tinyint(4) NOT NULL DEFAULT '0',
  `ishot` tinyint(4) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(4) NOT NULL DEFAULT '0',
  `words` int(11) NOT NULL DEFAULT '0' COMMENT '小说字数',
  `spider_urls` text NOT NULL COMMENT '爬取来源的url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COMMENT='小说表';

-- ----------------------------
-- Records of r_novel
-- ----------------------------
INSERT INTO `r_novel` VALUES ('1', '三寸人间', '1', '2', '1534685906', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/63/63542/63542s.jpg', '\n              举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。        ', '1', '0', '0', '0', 'http://www.shuquge.com/txt/63542/index.html');
INSERT INTO `r_novel` VALUES ('2', '元尊', '2', '1', '1534685906', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/5/5809/5809s.jpg', '\n              吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。        ', '1', '1', '0', '0', 'http://www.shuquge.com/txt/5809/index.html');
INSERT INTO `r_novel` VALUES ('3', '飞剑问道', '3', '2', '1534685906', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8072/8072s.jpg', '\n              在这个世界，有狐仙、河神、水怪、大妖，也有求长生的修行者。    修行者们，    开法眼，可看妖魔鬼怪。    炼一口飞剑，可千里杀敌。    千里眼、顺风耳，更可探查四方。    ……    秦府二公子‘秦云’，便是一位修行者……        ', '1', '0', '0', '0', 'http://www.shuquge.com/txt/8072/index.html');
INSERT INTO `r_novel` VALUES ('4', '凡人修仙传仙界篇', '4', '2', '1534685906', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8400/8400s.jpg', '\n              凡人修仙，风云再起时空穿梭，轮回逆转金仙太乙，大罗道祖三千大道，法则至尊《凡人修仙传》仙界篇，一个韩立叱咤仙界的故事，一个凡人小子修仙的不灭传说。        ', '1', '1', '0', '0', 'http://www.shuquge.com/txt/8400/index.html');
INSERT INTO `r_novel` VALUES ('5', '修真聊天群', '5', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/30/30668/30668s.jpg', '\n              某天，宋书航意外加入了一个仙侠中二病资深患者的交流群，里面的群友们都以‘道友’相称，群名片都是各种府主、洞主、真人、天师。连群主走失的宠物犬都称为大妖犬离家出走。整天聊的是炼丹、闯秘境、炼功经验啥的。\n    突然有一天，潜水良久的他突然发现……群里每一个群员，竟然全部是修真者，能移山倒海、长生千年的那种！\n    啊啊啊啊，世界观在一夜间彻底崩碎啦！\n        ', '0', '1', '0', '0', 'http://www.shuquge.com/txt/30668/index.html');
INSERT INTO `r_novel` VALUES ('6', '诸天投影', '6', '7', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '1', '0', '0', 'http://www.shuquge.com/txt/81791/index.html');
INSERT INTO `r_novel` VALUES ('7', '民调局异闻录之勉传', '7', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/53/53240/53240s.jpg', '\n              这是关于一个长生不老的男人跨越两千年的故事，在每一段历史的角落里都曾经留下过他的名字。他曾经是一些人心中的噩梦，也曾经把一些被噩梦困扰着的人们唤醒。故事的开始他的名字叫做吴勉，故事的结局他的名字叫做无敌\n    各位书友要是觉得《民调局异闻录之勉传》还不错的话请不要忘记向您QQ群和微博里的朋友推荐哦！\n        ', '0', '1', '0', '0', 'http://www.shuquge.com/txt/53240/index.html');
INSERT INTO `r_novel` VALUES ('8', '太初', '8', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '1', '0', '0', 'http://www.shuquge.com/txt/9255/index.html');
INSERT INTO `r_novel` VALUES ('9', '伏天氏', '9', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '1', '0', '0', 'http://www.shuquge.com/txt/8279/index.html');
INSERT INTO `r_novel` VALUES ('10', '海贼：厌世之歌', '10', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/75/75773/75773s.jpg', '\n              一颗恶魔果实，一身用血与汗换来的体术，一身用牵挂与疯狂换来的霸气。    病态，冷血，无情，偏执是他的代名词。至始至终，他只有一个目的，任何踩了他底线的人，哪怕是世界，他也会毁灭殆尽，一个不留。    其实，这只是一个平凡少年的故事。特此声明：此书与原著有些不同，至少时间有些错别，不喜欢的请路过，看不惯的请闭嘴。        ', '0', '1', '0', '0', 'http://www.shuquge.com/txt/75773/index.html');
INSERT INTO `r_novel` VALUES ('11', '武炼巅峰', '11', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '1', '0', '0', 'http://www.shuquge.com/txt/248/index.html');
INSERT INTO `r_novel` VALUES ('12', '都市至强者降临', '12', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75724/index.html');
INSERT INTO `r_novel` VALUES ('13', '不灭龙帝', '13', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/49177/index.html');
INSERT INTO `r_novel` VALUES ('14', '武破九荒', '14', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/38178/index.html');
INSERT INTO `r_novel` VALUES ('15', '异能小神农', '15', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/76020/index.html');
INSERT INTO `r_novel` VALUES ('16', '我的老千生涯', '16', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/67084/index.html');
INSERT INTO `r_novel` VALUES ('17', '神道丹尊', '17', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/41102/index.html');
INSERT INTO `r_novel` VALUES ('18', '逆剑狂神', '18', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/38287/index.html');
INSERT INTO `r_novel` VALUES ('19', '剑来', '19', '1', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/8659/index.html');
INSERT INTO `r_novel` VALUES ('20', '木仙传', '20', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/78930/index.html');
INSERT INTO `r_novel` VALUES ('21', '反套路快穿', '21', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/78748/index.html');
INSERT INTO `r_novel` VALUES ('22', '最强神话帝皇', '22', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74440/index.html');
INSERT INTO `r_novel` VALUES ('23', '莽荒纪', '3', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/343/index.html');
INSERT INTO `r_novel` VALUES ('24', '江湖奇功录', '23', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/79041/index.html');
INSERT INTO `r_novel` VALUES ('25', '细胞修神', '24', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74966/index.html');
INSERT INTO `r_novel` VALUES ('26', '盖世仙尊', '25', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/21777/index.html');
INSERT INTO `r_novel` VALUES ('27', '仙逆', '1', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74671/index.html');
INSERT INTO `r_novel` VALUES ('28', '校园寻美录', '26', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/9210/index.html');
INSERT INTO `r_novel` VALUES ('29', '大仙木', '27', '2', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/76853/index.html');
INSERT INTO `r_novel` VALUES ('30', '乡村艳妇', '28', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/43157/index.html');
INSERT INTO `r_novel` VALUES ('31', '近身狂兵', '29', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/29752/index.html');
INSERT INTO `r_novel` VALUES ('32', '重生之超级银行系统', '30', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/76138/index.html');
INSERT INTO `r_novel` VALUES ('33', '我的1979', '31', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/58724/index.html');
INSERT INTO `r_novel` VALUES ('34', '都市特种兵', '32', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/1859/index.html');
INSERT INTO `r_novel` VALUES ('35', '重塑人生三十年', '33', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75712/index.html');
INSERT INTO `r_novel` VALUES ('36', '我的冰山总裁老婆', '34', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/67262/index.html');
INSERT INTO `r_novel` VALUES ('37', '绝品透视眼', '35', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/67730/index.html');
INSERT INTO `r_novel` VALUES ('38', '重生之大娱乐家系统', '36', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75102/index.html');
INSERT INTO `r_novel` VALUES ('39', '极品全能学生', '37', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/35077/index.html');
INSERT INTO `r_novel` VALUES ('40', '特种兵在都市之诡刃', '38', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/80976/index.html');
INSERT INTO `r_novel` VALUES ('41', '仙药供应商', '39', '3', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/73894/index.html');
INSERT INTO `r_novel` VALUES ('42', '大宋超级学霸', '0', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/42/42553/42553s.jpg', '\n              那一年，大宋甲级足球联赛正热，国民老公苏东坡金榜高中。那一年，京城房价一飞冲天，老干部欧阳修买房不及时被夫人赶出家门。    就在那一年，赵官家上元夜偷窥香艳女相扑，被朝阳群众司马光当场抓获。    也是那一年，王老虎携女参加非诚勿扰，扬言非进士不嫁，金明池畔四大才子仓惶奔逃。    还是那一年，河东狮喜拜婚堂，胭脂虎相亲正忙，全国神童大赛各路少年英才开始隆重登场。        ', '0', '0', '0', '0', 'http://www.shuquge.com/txt/42553/index.html');
INSERT INTO `r_novel` VALUES ('43', '楚臣', '40', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74433/index.html');
INSERT INTO `r_novel` VALUES ('44', '崇祯聊天群', '41', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74686/index.html');
INSERT INTO `r_novel` VALUES ('45', '绝对荣誉', '42', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/76964/index.html');
INSERT INTO `r_novel` VALUES ('46', '山沟皇帝', '43', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/73627/index.html');
INSERT INTO `r_novel` VALUES ('47', '重生之战神吕布', '44', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/79296/index.html');
INSERT INTO `r_novel` VALUES ('48', '新特工学生', '45', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/74243/index.html');
INSERT INTO `r_novel` VALUES ('49', '帝国吃相', '46', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/81377/index.html');
INSERT INTO `r_novel` VALUES ('50', '寒门贵子', '47', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/38135/index.html');
INSERT INTO `r_novel` VALUES ('51', '宰执天下', '48', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/1647/index.html');
INSERT INTO `r_novel` VALUES ('52', '红楼名侦探', '49', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75180/index.html');
INSERT INTO `r_novel` VALUES ('53', '三国之我是袁术', '50', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/80303/index.html');
INSERT INTO `r_novel` VALUES ('54', '唐砖', '51', '4', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/9553/index.html');
INSERT INTO `r_novel` VALUES ('55', '极灵混沌决', '0', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/41/41188/41188s.jpg', '\n                  ', '0', '0', '0', '0', 'http://www.shuquge.com/txt/41188/index.html');
INSERT INTO `r_novel` VALUES ('56', '劫天运', '52', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/38478/index.html');
INSERT INTO `r_novel` VALUES ('57', '三国之兵临天下', '53', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/42828/index.html');
INSERT INTO `r_novel` VALUES ('58', '情天可补', '54', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/42939/index.html');
INSERT INTO `r_novel` VALUES ('59', '国师重生之都市风水师', '55', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/73228/index.html');
INSERT INTO `r_novel` VALUES ('60', '阴阳师秘录', '56', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/37745/index.html');
INSERT INTO `r_novel` VALUES ('61', '侠盗神医', '57', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/58490/index.html');
INSERT INTO `r_novel` VALUES ('62', '无上传承', '58', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/41956/index.html');
INSERT INTO `r_novel` VALUES ('63', '魔兽战神', '59', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/58449/index.html');
INSERT INTO `r_novel` VALUES ('64', '麻衣神算子', '60', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/39016/index.html');
INSERT INTO `r_novel` VALUES ('65', '随身幸福空间', '61', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/43042/index.html');
INSERT INTO `r_novel` VALUES ('66', '网游之剑走偏锋', '62', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/64126/index.html');
INSERT INTO `r_novel` VALUES ('67', '奉邪之命', '63', '5', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/39051/index.html');
INSERT INTO `r_novel` VALUES ('68', '奶爸的异界餐厅', '64', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/79077/index.html');
INSERT INTO `r_novel` VALUES ('69', '时崎狂三的位面之旅', '65', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75881/index.html');
INSERT INTO `r_novel` VALUES ('70', '一拳超人之帝王引擎', '66', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/78112/index.html');
INSERT INTO `r_novel` VALUES ('71', '绿茵人生', '67', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/76767/index.html');
INSERT INTO `r_novel` VALUES ('72', '宠物小精灵之全球在线', '68', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75036/index.html');
INSERT INTO `r_novel` VALUES ('73', '最强齐天大圣', '69', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75907/index.html');
INSERT INTO `r_novel` VALUES ('74', '我修的可能是假仙', '70', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/73528/index.html');
INSERT INTO `r_novel` VALUES ('75', '网游之神级炼妖师', '71', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75850/index.html');
INSERT INTO `r_novel` VALUES ('76', '火影神树之果在异界', '72', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/75346/index.html');
INSERT INTO `r_novel` VALUES ('77', '网游之逍遥派大弟子', '73', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/70209/index.html');
INSERT INTO `r_novel` VALUES ('78', '游戏之狩魔猎人', '74', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/78423/index.html');
INSERT INTO `r_novel` VALUES ('79', '火影之英雄历练系统', '75', '6', '1534685907', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', 'http://www.shuquge.com/txt/80261/index.html');

-- ----------------------------
-- Table structure for r_todo
-- ----------------------------
DROP TABLE IF EXISTS `r_todo`;
CREATE TABLE `r_todo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '0: 未完成 1:已完成',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台 - 代办事项表';

-- ----------------------------
-- Records of r_todo
-- ----------------------------

-- ----------------------------
-- Table structure for r_user
-- ----------------------------
DROP TABLE IF EXISTS `r_user`;
CREATE TABLE `r_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: 黑名单 1: 待审核 2: 已审核',
  `createtime` int(11) NOT NULL,
  `logintime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Records of r_user
-- ----------------------------
INSERT INTO `r_user` VALUES ('1', '', '5878c8c0dc361f8220a84209dd9f1dd8', '', '0', '1532928002', '1532928002');
INSERT INTO `r_user` VALUES ('2', '', 'a666fc9d2cad44a627125af32a7d5a77', '', '1', '1532928160', '1532928160');
INSERT INTO `r_user` VALUES ('3', '', '37cfde819fc254285286100691f33cce', '202518', '2', '1532928222', '1532928222');
INSERT INTO `r_user` VALUES ('4', '', '23c83705b0d87a676710be3856eb7b58', '840095', '2', '1532928437', '1532928437');

-- ----------------------------
-- Table structure for r_user_chapter_theme
-- ----------------------------
DROP TABLE IF EXISTS `r_user_chapter_theme`;
CREATE TABLE `r_user_chapter_theme` (
  `user_chapter_theme_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `font` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `speed` varchar(30) NOT NULL,
  `background_color` varchar(30) NOT NULL,
  `width` varchar(30) NOT NULL,
  `auto_page` varchar(30) NOT NULL,
  `night` varchar(30) NOT NULL,
  PRIMARY KEY (`user_chapter_theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户浏览章节主题';

-- ----------------------------
-- Records of r_user_chapter_theme
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='网站访问记录表';

-- ----------------------------
-- Records of r_visit
-- ----------------------------
INSERT INTO `r_visit` VALUES ('8', '2018', '8', '15', '3', '40');
INSERT INTO `r_visit` VALUES ('9', '2018', '8', '19', '7', '189');
INSERT INTO `r_visit` VALUES ('10', '2018', '8', '20', '1', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='访客表';

-- ----------------------------
-- Records of r_visitor
-- ----------------------------
INSERT INTO `r_visitor` VALUES ('5', '0', '::1', '0', '1', '0', 'Chrome', 'WebKit', 'Windows', '10.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '1534341179', '0', '1534694834', 'dab45cfa3ba24d4f55495fca8bb9b5a3', '214');
INSERT INTO `r_visitor` VALUES ('6', '0', '127.0.0.1', '0', '1', '0', 'Chrome', 'WebKit', 'Windows', '10.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '1534345488', '0', '1534346510', '7fc521cafeca64fd714b3317565c6e41', '17');

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
