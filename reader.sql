/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-24 15:27:47
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
  `author_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '作者id',
  `author_name` varchar(50) NOT NULL COMMENT '作者名',
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_name` (`author_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COMMENT='作者表';

-- ----------------------------
-- Records of r_author
-- ----------------------------
INSERT INTO `r_author` VALUES ('30', '6号鼠标');
INSERT INTO `r_author` VALUES ('48', 'cuslaa');
INSERT INTO `r_author` VALUES ('18', '一剑清新');
INSERT INTO `r_author` VALUES ('42', '严七官');
INSERT INTO `r_author` VALUES ('24', '中华娇子大熊猫');
INSERT INTO `r_author` VALUES ('69', '九尾玄龟');
INSERT INTO `r_author` VALUES ('31', '争斤论两花花帽');
INSERT INTO `r_author` VALUES ('22', '任我笑');
INSERT INTO `r_author` VALUES ('10', '农夫一拳');
INSERT INTO `r_author` VALUES ('9', '净无痕');
INSERT INTO `r_author` VALUES ('56', '北国之鸟');
INSERT INTO `r_author` VALUES ('73', '十年狂欢');
INSERT INTO `r_author` VALUES ('67', '半世散人');
INSERT INTO `r_author` VALUES ('41', '叫天');
INSERT INTO `r_author` VALUES ('28', '叱咤风云');
INSERT INTO `r_author` VALUES ('75', '咖啡香味');
INSERT INTO `r_author` VALUES ('49', '嗷世巅锋');
INSERT INTO `r_author` VALUES ('5', '圣骑士的传说(书坊)');
INSERT INTO `r_author` VALUES ('47', '地黄丸');
INSERT INTO `r_author` VALUES ('38', '夜十三');
INSERT INTO `r_author` VALUES ('72', '天妒遗计');
INSERT INTO `r_author` VALUES ('2', '天蚕土豆');
INSERT INTO `r_author` VALUES ('13', '妖夜');
INSERT INTO `r_author` VALUES ('51', '孑与2');
INSERT INTO `r_author` VALUES ('17', '孤单地飞');
INSERT INTO `r_author` VALUES ('23', '寒刀客');
INSERT INTO `r_author` VALUES ('68', '小小鲤鱼王');
INSERT INTO `r_author` VALUES ('15', '张家三叔');
INSERT INTO `r_author` VALUES ('4', '忘语');
INSERT INTO `r_author` VALUES ('3', '我吃西红柿');
INSERT INTO `r_author` VALUES ('66', '我是贝币');
INSERT INTO `r_author` VALUES ('32', '无冬夜');
INSERT INTO `r_author` VALUES ('14', '无敌小贝');
INSERT INTO `r_author` VALUES ('70', '明月地上霜');
INSERT INTO `r_author` VALUES ('40', '更俗');
INSERT INTO `r_author` VALUES ('54', '木士');
INSERT INTO `r_author` VALUES ('12', '极地风刃');
INSERT INTO `r_author` VALUES ('44', '流浪的猴');
INSERT INTO `r_author` VALUES ('63', '浙三爷');
INSERT INTO `r_author` VALUES ('52', '浮梦流年');
INSERT INTO `r_author` VALUES ('20', '淡淡竹君');
INSERT INTO `r_author` VALUES ('61', '清风天使');
INSERT INTO `r_author` VALUES ('36', '潇潇清枫');
INSERT INTO `r_author` VALUES ('29', '潇铭');
INSERT INTO `r_author` VALUES ('19', '烽火戏诸侯');
INSERT INTO `r_author` VALUES ('46', '牧尘客');
INSERT INTO `r_author` VALUES ('45', '王大忽悠');
INSERT INTO `r_author` VALUES ('25', '王小蛮');
INSERT INTO `r_author` VALUES ('33', '皇家雇佣猫');
INSERT INTO `r_author` VALUES ('65', '礼祐');
INSERT INTO `r_author` VALUES ('55', '秦弄月');
INSERT INTO `r_author` VALUES ('26', '突刺');
INSERT INTO `r_author` VALUES ('39', '糖醋于');
INSERT INTO `r_author` VALUES ('7', '耳东水寿');
INSERT INTO `r_author` VALUES ('1', '耳根');
INSERT INTO `r_author` VALUES ('21', '良心');
INSERT INTO `r_author` VALUES ('37', '花都大少');
INSERT INTO `r_author` VALUES ('35', '莫辰子');
INSERT INTO `r_author` VALUES ('11', '莫默');
INSERT INTO `r_author` VALUES ('58', '落尘');
INSERT INTO `r_author` VALUES ('6', '裴屠狗');
INSERT INTO `r_author` VALUES ('27', '许轩陌');
INSERT INTO `r_author` VALUES ('64', '轻语江湖');
INSERT INTO `r_author` VALUES ('50', '长不大的肥猫');
INSERT INTO `r_author` VALUES ('74', '阡之陌一');
INSERT INTO `r_author` VALUES ('43', '雨天下雨');
INSERT INTO `r_author` VALUES ('71', '青烟一夜');
INSERT INTO `r_author` VALUES ('57', '风雨白鸽');
INSERT INTO `r_author` VALUES ('60', '骑马钓鱼');
INSERT INTO `r_author` VALUES ('53', '高月');
INSERT INTO `r_author` VALUES ('8', '高楼大厦');
INSERT INTO `r_author` VALUES ('34', '黄枫雨天');
INSERT INTO `r_author` VALUES ('62', '黑乎乎的老妖');
INSERT INTO `r_author` VALUES ('16', '黑色枷锁');
INSERT INTO `r_author` VALUES ('59', '龙人');

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
  PRIMARY KEY (`chapter_id`),
  KEY `novel_id` (`novel_id`) USING BTREE,
  KEY `chapter_group_id` (`chapter_group_id`) USING BTREE,
  KEY `author_id` (`author_id`) USING BTREE,
  KEY `sort` (`sort`),
  CONSTRAINT `r_chapter_ibfk1` FOREIGN KEY (`novel_id`) REFERENCES `r_novel` (`novel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_chapter_ibfk2` FOREIGN KEY (`chapter_group_id`) REFERENCES `r_chapter_group` (`chapter_group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_chapter_ibfk3` FOREIGN KEY (`author_id`) REFERENCES `r_author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节表';

-- ----------------------------
-- Records of r_chapter
-- ----------------------------
INSERT INTO `r_chapter` VALUES ('1', '1', '1', '1', '写在连载前', '&nbsp;&nbsp;&nbsp;&nbsp;亲爱的读者大大们，说心里话，我现在心里既激动，又难过。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;激动的是，你们又可以登上我的小车，在我这个粉嫩帅气00后司机的行驶中，带你们去体验故事里的跌宕起伏，惊心动魄。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;至于难过的是……我的假期没了……我的心好痛，需要安慰。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;不过我也休息够了，感觉全身上下都精力充沛，充满了码字的力量，很多时候一想到新书，就不吐不快。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;更是想念我最最最最亲爱的读者小哥哥，读者小姐姐们，来，抱一下吧。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;然后再向大家汇报一下这几个月我的生活，假期这段时间，我是拼了老命减肥，现在看到镜子里的自己，我都觉得，天啊，此人好帅，他是谁……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;咳咳，你们想知道我的独门减肥秘诀么？\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;同时，这段日子，我在休息之余，也在完善新书的思路，新书对我来说，是一次很大很大的挑战，我始终在考虑，仙侠小说如何能开出不同的花朵。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;我曾经在之前的多本书里，加入了很多元素，也取得了一些成绩，可心里总是觉得，有些不大满意，我认为仙侠小说，是可以写出更好，更精彩，甚至不同背景的故事。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;背景这两个字，请大家划重点……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;现在已经准备很充分了，这一次的新书，我觉得很满意，尤其是故事里的主人公，你们明天就会知道，他是如何的与众不同……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;也会明白，我为了这本书，付出了多大的努力与辛酸，现在想想，为了写这本书，我真是拼了老命啊。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;友情提醒，明天开始，出现高能，请大家系好安全带……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;我们，明天中午12点，见！\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;最后，一念永恒的外传，我之前是发在了公众微信号里，有读者没看过，我在下面发一下。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;差点忘了喊一句，求收藏啊！！！！减肥秘诀换收藏！！！！！\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;####\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;岁月悠悠，一晃而过。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;永恒灵界星光璀璨，一百零八万族群繁荣昌盛，一代代强者辈出，太古也好，主宰也罢，纷纷如雨后春笋一般，在各自的时代里，成为明亮的而星辰。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;尤其是永恒仙域，更是这无尽星辰中最特殊，也是最明亮的一颗。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;白小纯的故事，已经化作了传说，随着多年后他带着亲人朋友离开了永恒仙域，他曾经的往事，在这永恒灵界内已然成为了神话，哪怕多年过去，也依旧时常别人提起，那一段时光的辉煌，似乎从某种程度上，就已经代表了永恒灵界巅峰的历史。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;没有人知道白小纯去了什么地方，只能从一些当年魁皇朝留下的典籍里找到一些蛛丝马迹，似乎当年的记录者，隐隐的告诉世人，白小纯以及他的亲人，朋友，去了一个没有人知道的地方，在那里过着幸福快乐的生活。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;这段典籍里的内容，被世人认可，接受，在整个永恒灵界内，哪怕到了现在，也都还是被所有人这么认为。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;同时每一代，都有修士试图去寻找白小纯，试图去追寻当年的历史，去亲眼看一看，曾经的最强者。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;只是无论是谁，都无法找到白小纯以及他亲人朋友的痕迹。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;此刻，在永恒灵界之外，那是一片苍茫的星空，存在了无尽的雾气，看不清太远，只能看到在那星空的尘雾内，隐隐有一个身影，正一脸感慨，甚至还带着一些激动，飞速前行。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“我终于……终于逃出来了！！”这身影看起来是个青年，白白嫩嫩，穿着一身白袍，此刻似很振奋，就仿佛从笼子里飞出，拥抱了自由的小鸟……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“她们太过分了，我就是太实在，太老实了，不然怎么会被这么欺负！”这青年长叹一声，只是他虽看似白嫩，可目中的机灵，使得他看起来虽不是蔫坏，可也绝对不是一个老实人。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;此人，正是白小纯。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;在典籍里，当年他居住在永恒仙域一段岁月后，带着亲人朋友离去，过着幸福快乐的生活，实际上虽也是如此，可时间长了后，白小纯的性子，他有些受不了，尤其是宋君婉、周紫陌、侯小妹、公孙婉儿还有杜凌菲众女对他这里，看管之严，已经到了让白小纯觉得发指的程度……\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“她们不让任何女子和我说话，更不让我一个人外出，居然说我走到哪里，就会祸害到哪里，担心我将家里都祸害崩溃了……这也罢了，就连炼丹，也都不允许！”\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“我白小纯是那种人么！”\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“不让我和女子说话可以，不让我出去玩我也忍了，不让我炼丹我也戒了，可都老夫老妻了，她们居然还时而争吵，尤其是还哄不好，讲不出道理，一个架能抄一千年……”白小纯愤愤，一想到宋君婉等人争论一件事情未果，全部看向自己，让自己选择谁对时的目光，白小纯就要抓狂。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“还是逃出来清净啊……趁着大年三十，她们都在忙，我赶紧逃出去溜达溜达。”白小纯感慨中，飞速前行，他已经想好了，这一次出来，一定要好好散散心。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;感慨中，白小纯速度飞快，每一步落下，都是跨越时空，他的目标已经选好，正是小乌龟的来源之地，未央道域。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;可就在他要踏入未央道域的瞬间，白小纯忽然神色一动，看向右侧，似在那苍茫雾气里，有所发现。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“第四步的气息……不对，这上面还有第五步的道韵！”白小纯眨了眨眼，右手抬起在那苍茫中一抓，瞬间就有一道长虹从雾气内刹那飞来，直接就落在了白小纯的手中。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;那是一个瓶子，准确说的，是一个漂流瓶。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;在这苍茫星空内，不知漂流了多久，直至方才白小纯路过时察觉，将其取来。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“有点意思。”白小纯眨了眨眼，看着手中的漂流瓶，打开后仔细一看，发现里面居然有一张纸条。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;带着好奇，白小纯将这纸条取出，打开一看，顿时乐了。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“这是谁写的啊，要成为有钱人？”白小纯正笑时，忽然神色一动，只见这纸条上竟有一丝丝因果升起，好似要与白小纯连在一起的样子。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;这一幕，让白小纯眼睛睁大，左手掐诀立刻斩断因果。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“这家伙太坏了啊，这是谁啊，他的道居然蕴含了因果，只要碰到这纸条，就会无形之中如给他写下欠条一般，在因果上欠他钱！！”白小纯神色古怪，看了看纸条后，哼了一声。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“想钱想疯了啊！”嘀咕了一句后，白小纯索性大手一挥，在这纸条上，用自己的道，在那句发财字迹的后面，添加了一句。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“发财有什么好的，长生才是最重要的！我要长生！”\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;写完后，正要塞入漂流瓶内，白小纯忽然犹豫了一下，重新打开纸条，在自己那句后面，又加了一句。\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“只找一个道侣！”\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;做完这些，白小纯心满意足，想着以后若是还有人看到这个漂流瓶，听从自己规劝的样子，他就觉得自己也算是将人生经历告诉了后来者，小袖一甩，将这漂流瓶扔入苍茫后，身体一晃，带着得意，直奔未央道域！\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;“有机会遇到那个穷疯了的家伙，一定要好好和他理论一下！居然敢让我欠他钱？我送他一嘴发情致幻丹！”\r\n<br>\r\n<br>&nbsp;&nbsp;&nbsp;&nbsp;#####\r\n<br>', '0', '0', '0', '0', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------
INSERT INTO `r_chapter_group` VALUES ('1', '《三寸人间》正文卷', '1', '1537770334', '0');

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
-- Table structure for r_novel
-- ----------------------------
DROP TABLE IF EXISTS `r_novel`;
CREATE TABLE `r_novel` (
  `novel_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '小说id',
  `author_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者id',
  `category_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
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
  PRIMARY KEY (`novel_id`),
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `author_id` (`author_id`),
  KEY `create_time` (`create_time`) USING BTREE,
  CONSTRAINT `r_novel_ibfk1` FOREIGN KEY (`author_id`) REFERENCES `r_author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_novel_ibfk2` FOREIGN KEY (`category_id`) REFERENCES `r_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='小说表';

-- ----------------------------
-- Records of r_novel
-- ----------------------------
INSERT INTO `r_novel` VALUES ('1', '1', '2', '1', '三寸人间', 'http://www.shuquge.com/files/article/image/63/63542/63542s.jpg', '举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1537770334', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='网站访问记录表';

-- ----------------------------
-- Records of r_visit
-- ----------------------------
INSERT INTO `r_visit` VALUES ('1', '2018', '9', '23', '7', '22');
INSERT INTO `r_visit` VALUES ('2', '2018', '9', '24', '1', '264');

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
INSERT INTO `r_visitor` VALUES ('1', '0', '127.0.0.1', '0', '1', '0', 'Chrome', 'WebKit', 'Windows', '10.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '1537713221', '0', '1537774036', '1799dadf9a79ff6a597220e5d7d48f2b', '286');

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
