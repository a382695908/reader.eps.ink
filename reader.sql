/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-18 01:53:26
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='作者表';

-- ----------------------------
-- Records of r_author
-- ----------------------------
INSERT INTO `r_author` VALUES ('1', '耳根');
INSERT INTO `r_author` VALUES ('2', '天蚕土豆');
INSERT INTO `r_author` VALUES ('3', '我吃西红柿');
INSERT INTO `r_author` VALUES ('4', '忘语');
INSERT INTO `r_author` VALUES ('5', '圣骑士的传说(书坊)');
INSERT INTO `r_author` VALUES ('6', '严七官');
INSERT INTO `r_author` VALUES ('7', '若雨随风');
INSERT INTO `r_author` VALUES ('8', '半世散人');
INSERT INTO `r_author` VALUES ('9', '牵牛喂大将军');
INSERT INTO `r_author` VALUES ('10', '净无痕');
INSERT INTO `r_author` VALUES ('11', '花都大少');
INSERT INTO `r_author` VALUES ('12', '农夫一拳');
INSERT INTO `r_author` VALUES ('13', '浮梦流年');
INSERT INTO `r_author` VALUES ('14', '王大忽悠');

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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='小说分类表';

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节表';

-- ----------------------------
-- Records of r_chapter
-- ----------------------------
INSERT INTO `r_chapter` VALUES ('1', '1', '1', '1', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('2', '2', '2', '2', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('3', '3', '3', '3', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('4', '4', '4', '4', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('5', '5', '5', '5', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('6', '6', '6', '6', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('7', '7', '7', '7', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('8', '8', '8', '8', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('9', '9', '9', '9', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('10', '10', '10', '10', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');
INSERT INTO `r_chapter` VALUES ('11', '11', '11', '11', '第一章 无敌', '好无敌啊', '0', '0', '0', '0', '0');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------
INSERT INTO `r_chapter_group` VALUES ('1', '少年英雄', '1', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('2', '少年英雄', '2', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('3', '少年英雄', '3', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('4', '少年英雄', '4', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('5', '少年英雄', '5', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('6', '少年英雄', '6', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('7', '少年英雄', '7', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('8', '少年英雄', '8', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('9', '少年英雄', '9', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('10', '少年英雄', '10', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('11', '少年英雄', '11', '0', '0', '0');

-- ----------------------------
-- Table structure for r_novel
-- ----------------------------
DROP TABLE IF EXISTS `r_novel`;
CREATE TABLE `r_novel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `reports` int(11) NOT NULL DEFAULT '0',
  `collects` int(11) NOT NULL DEFAULT '0',
  `text_length` int(11) NOT NULL DEFAULT '0',
  `isend` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `ishotest` tinyint(4) NOT NULL DEFAULT '0',
  `ishot` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='小说表';

-- ----------------------------
-- Records of r_novel
-- ----------------------------
INSERT INTO `r_novel` VALUES ('1', '三寸人间', '1', '2', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/63/63542/63542s.jpg', '举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。', '1', '0');
INSERT INTO `r_novel` VALUES ('2', '元尊', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/5/5809/5809s.jpg', '吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。 ', '1', '0');
INSERT INTO `r_novel` VALUES ('3', '飞剑问道', '3', '2', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8072/8072s.jpg', '在这个世界，有狐仙、河神、水怪、大妖，也有求长生的修行者。 修行者们， 开法眼，可看妖魔鬼怪。 炼一口飞剑，可千里杀敌。 千里眼、顺风耳，更可探查四方。 …… 秦府二公子‘秦云’，便是一位修行者…… ', '1', '0');
INSERT INTO `r_novel` VALUES ('4', '凡人修仙传仙界篇', '4', '2', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8400/8400s.jpg', '凡人修仙，风云再起时空穿梭，轮回逆转金仙太乙，大罗道祖三千大道，法则至尊《凡人修仙传》仙界篇，一个韩立叱咤仙界的故事，一个凡人小子修仙的不灭传说。 ', '1', '0');
INSERT INTO `r_novel` VALUES ('5', '修真聊天群', '5', '3', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/30/30668/30668s.jpg', '某天，宋书航意外加入了一个仙侠中二病资深患者的交流群，里面的群友们都以‘道友’相称，群名片都是各种府主、洞主、真人、天师。连群主走失的宠物犬都称为大妖犬离家出走。整天聊的是炼丹、闯秘境、炼功经验啥的。 突然有一天，潜水良久的他突然发现……群里每一个群员，竟然全部是修真者，能移山倒海、长生千年的那种！ 啊啊啊啊，世界观在一夜间彻底崩碎啦！ ', '0', '1');
INSERT INTO `r_novel` VALUES ('6', '绝对荣誉', '6', '4', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76964/76964s.jpg', '这是一支没有番号的绝密部队，却是华夏最强大又最神秘的特种作战力量，每一名顶尖的特种兵都以能加入这支精英中的精英部队为荣。 上等兵秦飞第一天走进这支部队的基地时，在那堵镶嵌着红色五星的白色大理石墙前站了许久，白色的墙上镌刻着一句话：你们的名字无人知晓，你们的功绩与世长存！ 很久之后他才发现墙的背面还刻着另一句话——我唯一的遗憾，就是只有一次生命可以献给祖国！', '0', '1');
INSERT INTO `r_novel` VALUES ('7', '极灵混沌决', '7', '5', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/41/41188/41188s.jpg', '', '0', '1');
INSERT INTO `r_novel` VALUES ('8', '绿茵人生', '8', '6', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76767/76767s.jpg', '足球作为爱好兴趣是很纯粹的快乐，很多男孩子年少时都有一个足球梦，无关其他，只是追求驰骋的喜悦与满足....... ', '0', '1');
INSERT INTO `r_novel` VALUES ('9', '穿梭时空的侠客', '9', '7', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76696/76696s.jpg', '十步杀一人，千里不留行。事了拂衣去，深藏功与名......侠之大者，为国为民，侠之小者，锄奸扶弱。 穿梭诸天万界，身份角色不停变换，沈炼的堂弟、衡山最没用的弟子、靠山王的孙子、悟空的同门、通天的徒弟....... ', '0', '1');
INSERT INTO `r_novel` VALUES ('10', '伏天氏', '10', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8279/8279s.jpg', '\r\n              东方神州，有人皇立道统，有圣贤宗门传道，有诸侯雄踞一方王国，诸强林立，神州动乱千万载，执此之时，一代天骄叶青帝及东凰大帝横空出世，斩人皇，驭圣贤，诸侯臣服，东方神州一统！    然，叶青帝忽然暴毙，世间雕像尽皆被毁，于世间除名，沦为禁忌；从此神州唯东凰大帝独尊！    十五年后，东海青州城，一名为叶伏天的少年，开启了他的传奇之路…        ', '0', '1');
INSERT INTO `r_novel` VALUES ('11', '极品全能学生', '11', '3', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/35/35077/35077s.jpg', '一场车祸改变了我的屌丝人生。 各种奇遇接连而来。 考试满分，刮刮乐必中，篮球天才，游泳健将选一个？ 不，老子就是全能。 美女校花主动跟我表白，霸道女总裁做我知心大姐姐，可爱小萝莉要我做她的贴心大哥哥。 qq群：203799451 [四组://.longtengx.品，老虎座下，://.longtengx.级好书，绝对包爽] ', '0', '1');
INSERT INTO `r_novel` VALUES ('12', '海贼：厌世之歌', '12', '6', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/75/75773/75773s.jpg', '一颗恶魔果实，一身用血与汗换来的体术，一身用牵挂与疯狂换来的霸气。 病态，冷血，无情，偏执是他的代名词。至始至终，他只有一个目的，任何踩了他底线的人，哪怕是世界，他也会毁灭殆尽，一个不留。 其实，这只是一个平凡少年的故事。特此声明：此书与原著有些不同，至少时间有些错别，不喜欢的请路过，看不惯的请闭嘴。 ', '0', '1');
INSERT INTO `r_novel` VALUES ('13', '劫天运', '13', '5', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/38/38478/38478s.jpg', '我从出生前就给人算计了，五阴俱全，天生招厉鬼，懂行的先生说我活不过七岁，死后是要给人养成血衣小鬼害人的。 外婆为了救我，给我娶了童养媳，让我过起了安生日子，虽然后来我发现媳妇姐姐不是人…… 从小苟延馋喘的我能活到现在，本已习惯逆来顺受，可唯独外婆被人害死了这件事。 为此，我不顾因果报应，继承了外婆养鬼的职业，发誓要把害死她的人全都送下地狱', '0', '1');
INSERT INTO `r_novel` VALUES ('14', '新特工学生', '14', '4', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/74/74243/74243s.jpg', '【免费新书】华夏顶级特工重生回到18岁，清纯班长和美女老师竟然争相让他做这个…… ', '0', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Records of r_user
-- ----------------------------
