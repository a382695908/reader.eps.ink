/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : reader

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-07 00:14:42
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
INSERT INTO `r_chapter` VALUES ('1', '1', '1', '1', '第一章 无敌', '&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;在这冰寒气息出现的瞬间，这九寸灵根骤然一步走来，速度之快，王宝乐肉眼几乎都看不清晰，下一瞬&hellip;&hellip;这九寸灵根就到了王宝乐的面\r\n前，其右手抬起，直接一掌落下！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;太快！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;王宝乐心头震动，四周金色气血之海骤然爆发，形成防护阻挡九寸灵根，轰鸣中，王宝乐全身震颤，身体蹬蹬瞪倒退，可却没有停顿，而是\r\n展开全速，猛地向一旁闪去。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;几乎在王宝乐闪去的刹那，九寸灵根一步间，直接就到了他之前所在的地方，一脚落下，山石碎裂，崩溃四溅！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;这种速度，他的力量哪怕一般，也都可以增幅太多！&rdquo;王宝乐气息有些急促，身体再次退后，眯起双眼，神色前所未有的凝重\r\n与认真。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;它不是真息！&rdquo;\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;它与我一样，都是补脉&hellip;&hellip;可补脉，竟能速度这么快？&rdquo;王宝乐深吸口气，他本以为自己已经是站在了补脉的最\r\n巅峰了，可如今看到这九寸灵根的出手，立刻意识到自己的补脉，还不是极致。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;这么快的速度，没法打啊，要想办法让他慢下来！&rdquo;王宝乐倒退时，立刻收敛金身，他之前面对众多灵根追击时，收了金身后\r\n，那些灵根就不再狂暴。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;此刻果然也不例外，在王宝乐金身收起的瞬间，那原本散出冰寒气息的九寸灵根，瞬间平静下来，不再去看王宝乐，而是身体又一次漂起，\r\n不疾不徐的向着远处离去。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;眼看金身的释放与收回，可以引动与平复这九寸灵根，王宝乐眨了眨眼，身体调整方位，急速冲出时，再次释放金身。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;就在其金身释放出的刹那，已经离去的九寸灵根，蓦然转头，冰寒气息又一次爆发，直奔王宝乐，甚至速度都比之前还要快了不少，刹那出\r\n现在王宝乐面前，右手已然抬起，向着他的脖子，一把抓来。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;甚至在他临近的同时，这四周的灵气仿佛都引动，居然形成了漩涡，欲将王宝乐凝固在原地！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;这种速度，让王宝乐心惊肉跳，可他之前已经有所准备，此刻体内噬种瞬息扩散，形成巨大的吸力扭转九寸灵根抓来的右手，使其改变方向\r\n，在这九寸灵根身体一顿，右手被其起牵引，从脖子侧一把抓空的刹那，王宝乐目中狠辣，带着拳套的手掌直接一把抓住九寸灵根的右手！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;反关节骤然一掰的同时，王宝乐左脚抬起，直接一脚踢在了这九寸灵根的肚子上，轰的一声，那九寸灵根的身体被踢的倒退开来，王宝乐抓\r\n住机会，全身气血再次扩散，借助那一脚的反震之力，这才挣脱了灵气漩涡，后退十多丈外，顾不得左腿此刻被震的酸痛，惊疑的看向那九寸灵根。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;他刚才抓来时，竟牵引四周灵气成漩将我困住！这与赵雅梦的出手有些相似，可赵雅梦是依靠阵法，此人明显偏向战武系的打法，\r\n也可以这么去战斗吗？&rdquo;王宝乐心跳加速，目露奇芒。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;掌院曾说，所有的真息灵根，极有可能都是那个未知的文明内残存之人，从自身凝聚出来，类似种子一般的存在！&rdquo;\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;那么是不是可以说，在那个充满了修士的文明里，根据不同的资质，不同的人凝聚出的灵根，也有强弱优劣之分！如果这么去判断\r\n，到是可以解释为何有一寸，又为何有九寸！&rdquo;\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;一寸若是寻常的话，那么九寸&hellip;&hellip;是不是就代表，它是那个修士文明里中的天骄所化？不过这九寸灵根最难缠的是他\r\n的速度以及诡异的操控灵气之法&hellip;&hellip;若能化解，不是不能将其碎灭！&rdquo;王宝乐念头飞速转动，目内战意攀升。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;而此刻被他一脚踢退的九寸灵根，在数丈外止步，一样抬头，面向王宝乐。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;在王宝乐凝重的目光下，这九寸灵根缓缓抬起右手，猛地一捏，居然再次引动了四周的灵气，使得整个山谷内，顿时灵气凝聚，形成了看不\r\n见的风暴漩涡，散出轰隆隆的巨响。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;这一切，让王宝乐双目蓦然收缩，之前对方出手时，灵气被牵引成漩，将他困住，已经让他惊疑，此刻再次目睹，隐隐看出对方似乎是依靠\r\n某种未知的气血技巧，做到的这一点，可具体却看不出来，于是身体立刻后退，要拉开距离。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;可就在王宝乐退后的刹那，这九寸灵根抬起的右手猛地握拳，直接隔空向着王宝乐一拳落下，明明距离足有十丈，可这一拳打在空处，好似\r\n轰在了看不见的灵气风暴的核心，使得这四周被他牵引来的灵气风暴，陡然爆发，排山倒海一般，直奔王宝乐横扫而去。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;还可以这样？&rdquo;\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;王宝乐面色大变，直接就取出法器阻挡，轰轰之声回荡间，他只觉得好似被巨浪拍击，口中溢出鲜血，身体又一次倒退，那九寸灵根蓦然追\r\n出，杀机强烈，右手更是再次抬起，一捏之下，将四周灵气再次凝聚牵引而来，山洪暴发般，直奔王宝乐。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;王宝乐呼吸急促，身体踉跄倒退，可眼睛却一下不眨。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;同样的招式，对方已施展了三次，第一次王宝乐惊疑，第二次他隐隐看出端倪，此刻第三次展开，王宝乐眼睛睁的老大，虽依旧看不明白对\r\n方的技巧，可却凭着对灵气的惊人敏锐，感知出了过程！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;牵引风暴，又打在风暴的核心上，使这无形的灵气风暴崩溃如坍塌，从而形成类似潮汐的手段，这是把灵气看成了海水一般！&rdqu\r\no;看清这一切的瞬间，王宝乐心头狂震，注意到对方的速度后，立刻明悟。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;他的速度也是与牵引灵气有关！！&rdquo;王宝乐脑海顿时清明，一切豁然开朗，心头更是无比火热，实在是对方这牵引灵气的战法\r\n，就像为王宝乐开启了一扇新的大门，直接提升了王宝乐本身的战斗意识。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;他虽到了此刻，依旧难以看穿对方使用的技巧，可对王宝乐而言，技巧不重要，这意识&hellip;&hellip;才是重点。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;哪怕他做不到完全复制，可却能通过一些其他的办法，进行模仿！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;此刻就在这九寸灵根杀来的瞬间，王宝乐目露亮光，体内噬种在这一刹那，凝聚右手，如化作黑洞，蓦然爆发，立刻这四周的灵气仿佛看不\r\n见的海洋，被他牵引过来，直奔右手。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;在这些灵气涌现来的同时，王宝乐大吼一声，右手猛地抬起，向上狠狠一掀！\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;这一掀之下，四周被他牵引来的灵气，也都无形的掀起，好似化作了一面灵气之墙，阻挡在了冲来的九寸灵根的身前。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;轰鸣中，九寸灵根的一拳，直接被阻，轰在了灵气之墙上，反震之下，身体倒退数步，王宝乐正要追击，可这九寸灵根速度太快，倒退中直\r\n接拉开数十丈的距离。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;眼看如此，王宝乐停下脚步，目中带着激动，这一战，对他来说意义极大。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;原来，古武可以这么战！&rdquo;\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;我的噬种只能吸，至于放&hellip;&hellip;就需要法器了，若能收放自如，某种程度上&hellip;&hellip;我就符合了这九寸灵根方\r\n才的技巧！&rdquo;王宝乐兴奋中，那九寸灵根身体一晃，就要再次杀来，可王宝乐右手猛地抬起，向前一按，阻挡的同时，体内金身瞬间收回。\r\n&lt;br&gt;\r\n&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&ldquo;停，等我消化消化，我们再打啊。&rdquo;     &lt;br&gt;　　http://www.shuquge.com/txt/63/63542/17474043.html\r\n     &lt;br&gt;\r\n     &lt;br&gt;　　请记住本书首发域名：www.shuquge.com。书趣阁_笔趣阁手机版阅读网址：m.shuquge.com', '0', '0', '0', '0', '0');
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
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='小说章节组表';

-- ----------------------------
-- Records of r_chapter_group
-- ----------------------------
INSERT INTO `r_chapter_group` VALUES ('1', '少年英雄', '1', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('2', '少年英雄', '2', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('3', '少年英雄', '3', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('4', '少年英雄', '4', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('5', '少年英雄', '5', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('6', '少年英雄', '6', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('7', '少年英雄', '7', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('8', '少年英雄', '8', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('9', '少年英雄', '9', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('10', '少年英雄', '10', '0', '0', '0', '0');
INSERT INTO `r_chapter_group` VALUES ('11', '少年英雄', '11', '0', '0', '0', '0');

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
  `is_read` tinyint(4) NOT NULL COMMENT '状态 0: 未读 1:已读 2:回收站 3:彻底删除',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='前台反馈表 | 后台消息通知表';

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
  `author` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `reports` int(11) NOT NULL DEFAULT '0',
  `collects` int(11) NOT NULL DEFAULT '0',
  `recommends` int(11) unsigned NOT NULL,
  `text_length` int(11) NOT NULL DEFAULT '0',
  `isend` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `ishotest` tinyint(4) NOT NULL DEFAULT '0',
  `ishot` tinyint(4) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(4) NOT NULL,
  `words` int(11) NOT NULL DEFAULT '0' COMMENT '小说字数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='小说表';

-- ----------------------------
-- Records of r_novel
-- ----------------------------
INSERT INTO `r_novel` VALUES ('1', '三寸人间', '1', '2', '0', '0', '724', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/63/63542/63542s.jpg', '举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。', '1', '0', '0', '0');
INSERT INTO `r_novel` VALUES ('2', '元尊', '2', '1', '0', '0', '100', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/5/5809/5809s.jpg', '吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。 ', '1', '0', '0', '0');
INSERT INTO `r_novel` VALUES ('3', '飞剑问道', '3', '2', '0', '0', '521', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8072/8072s.jpg', '在这个世界，有狐仙、河神、水怪、大妖，也有求长生的修行者。 修行者们， 开法眼，可看妖魔鬼怪。 炼一口飞剑，可千里杀敌。 千里眼、顺风耳，更可探查四方。 …… 秦府二公子‘秦云’，便是一位修行者…… ', '1', '0', '1', '0');
INSERT INTO `r_novel` VALUES ('4', '凡人修仙传仙界篇', '4', '2', '0', '0', '639', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8400/8400s.jpg', '凡人修仙，风云再起时空穿梭，轮回逆转金仙太乙，大罗道祖三千大道，法则至尊《凡人修仙传》仙界篇，一个韩立叱咤仙界的故事，一个凡人小子修仙的不灭传说。 ', '1', '0', '1', '0');
INSERT INTO `r_novel` VALUES ('5', '修真聊天群', '5', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/30/30668/30668s.jpg', '某天，宋书航意外加入了一个仙侠中二病资深患者的交流群，里面的群友们都以‘道友’相称，群名片都是各种府主、洞主、真人、天师。连群主走失的宠物犬都称为大妖犬离家出走。整天聊的是炼丹、闯秘境、炼功经验啥的。 突然有一天，潜水良久的他突然发现……群里每一个群员，竟然全部是修真者，能移山倒海、长生千年的那种！ 啊啊啊啊，世界观在一夜间彻底崩碎啦！ ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('6', '绝对荣誉', '6', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76964/76964s.jpg', '这是一支没有番号的绝密部队，却是华夏最强大又最神秘的特种作战力量，每一名顶尖的特种兵都以能加入这支精英中的精英部队为荣。 上等兵秦飞第一天走进这支部队的基地时，在那堵镶嵌着红色五星的白色大理石墙前站了许久，白色的墙上镌刻着一句话：你们的名字无人知晓，你们的功绩与世长存！ 很久之后他才发现墙的背面还刻着另一句话——我唯一的遗憾，就是只有一次生命可以献给祖国！', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('7', '极灵混沌决', '7', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/41/41188/41188s.jpg', '', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('8', '绿茵人生', '8', '6', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76767/76767s.jpg', '足球作为爱好兴趣是很纯粹的快乐，很多男孩子年少时都有一个足球梦，无关其他，只是追求驰骋的喜悦与满足....... ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('9', '穿梭时空的侠客', '9', '7', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/76/76696/76696s.jpg', '十步杀一人，千里不留行。事了拂衣去，深藏功与名......侠之大者，为国为民，侠之小者，锄奸扶弱。 穿梭诸天万界，身份角色不停变换，沈炼的堂弟、衡山最没用的弟子、靠山王的孙子、悟空的同门、通天的徒弟....... ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('10', '伏天氏', '10', '1', '0', '0', '20', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/8/8279/8279s.jpg', '\r\n              东方神州，有人皇立道统，有圣贤宗门传道，有诸侯雄踞一方王国，诸强林立，神州动乱千万载，执此之时，一代天骄叶青帝及东凰大帝横空出世，斩人皇，驭圣贤，诸侯臣服，东方神州一统！    然，叶青帝忽然暴毙，世间雕像尽皆被毁，于世间除名，沦为禁忌；从此神州唯东凰大帝独尊！    十五年后，东海青州城，一名为叶伏天的少年，开启了他的传奇之路…        ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('11', '极品全能学生', '11', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/35/35077/35077s.jpg', '一场车祸改变了我的屌丝人生。 各种奇遇接连而来。 考试满分，刮刮乐必中，篮球天才，游泳健将选一个？ 不，老子就是全能。 美女校花主动跟我表白，霸道女总裁做我知心大姐姐，可爱小萝莉要我做她的贴心大哥哥。 qq群：203799451 [四组://.longtengx.品，老虎座下，://.longtengx.级好书，绝对包爽] ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('12', '海贼：厌世之歌', '12', '6', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/75/75773/75773s.jpg', '一颗恶魔果实，一身用血与汗换来的体术，一身用牵挂与疯狂换来的霸气。 病态，冷血，无情，偏执是他的代名词。至始至终，他只有一个目的，任何踩了他底线的人，哪怕是世界，他也会毁灭殆尽，一个不留。 其实，这只是一个平凡少年的故事。特此声明：此书与原著有些不同，至少时间有些错别，不喜欢的请路过，看不惯的请闭嘴。 ', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('13', '劫天运', '13', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/38/38478/38478s.jpg', '我从出生前就给人算计了，五阴俱全，天生招厉鬼，懂行的先生说我活不过七岁，死后是要给人养成血衣小鬼害人的。 外婆为了救我，给我娶了童养媳，让我过起了安生日子，虽然后来我发现媳妇姐姐不是人…… 从小苟延馋喘的我能活到现在，本已习惯逆来顺受，可唯独外婆被人害死了这件事。 为此，我不顾因果报应，继承了外婆养鬼的职业，发誓要把害死她的人全都送下地狱', '0', '1', '0', '0');
INSERT INTO `r_novel` VALUES ('14', '新特工学生', '14', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'http://www.shuquge.com/files/article/image/74/74243/74243s.jpg', '【免费新书】华夏顶级特工重生回到18岁，清纯班长和美女老师竟然争相让他做这个…… ', '0', '0', '0', '0');

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
  `from` tinyint(3) unsigned NOT NULL COMMENT '0: pc 1: 移动端 2: 微信',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='网站访问记录表';

-- ----------------------------
-- Records of r_visit
-- ----------------------------

-- ----------------------------
-- Table structure for r_visitor
-- ----------------------------
DROP TABLE IF EXISTS `r_visitor`;
CREATE TABLE `r_visitor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(30) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '绑定的userid',
  `create_time` int(11) NOT NULL,
  `from` tinyint(4) NOT NULL COMMENT '0: pc 1: 移动端 2: 微信',
  `place` varchar(30) NOT NULL COMMENT '地理位置',
  `is_black` tinyint(4) NOT NULL DEFAULT '0' COMMENT '黑名单',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='访客表';

-- ----------------------------
-- Records of r_visitor
-- ----------------------------
